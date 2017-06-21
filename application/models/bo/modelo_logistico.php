<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_logistico extends CI_Model
{
	function __construct() {
		parent::__construct();	
		$this->load->model('ov/modelo_compras');
		$this->load->model('ov/model_perfil_red');
		$this->load->model('bo/model_inventario');
		
	}	
	
	
	function setPedido($venta){
		
		$mercancia = $this->modelo_compras->get_mercancia_venta_inventario($venta);
		$inventario = $this->calcularInventario ( $mercancia );
		$totalPedido = count($mercancia);
		$numeroInventario = count($inventario);
		/*var_dump($mercancia);
		echo "<hr/>";
		var_dump($inventario);
		echo "<hr/>";
		echo $totalPedido."|".$numeroInventario;
		echo "<hr/>";*/

		if(!$mercancia){
			return true;
		}
		
		if($numeroInventario<$totalPedido){
			return false;
		}
		
		$Count = $this->soloUnAlmacen ( $inventario );		
		//var_dump($Count);
		//echo "<hr/>";
		if ($Count[0]<$totalPedido||!$Count[1]){
			return false;
		}
		
		$this->cargarPedido($Count[1],$venta,$mercancia);
		
		return true;
	}
	
	function setPedidoOnline($venta){
	
		$mercancia = $this->modelo_compras->get_mercancia_venta_inventario($venta);
		
		$items = array();
		
		foreach ($mercancia as $item){
			array_push($items, $item->id_mercancia);
		}
		
		$Count = $this->groupAlmacenes ( $items );		
		//if ($Count[0]<$totalPedido){
		//	return false;
		//}
	
		$this->cargarPedido($Count,$venta,$mercancia);
	
		return true;
	}
	
	private function groupAlmacenes($items) {
	 
		$grupos = implode(',', $items); 
		
		$query = "SELECT 
										    id_almacen,sum(cantidad) c
										from
										    inventario
										where
										    id_mercancia in (".$grupos.")
										        and estatus = 'ACT'
										group by
											id_almacen
										order by 
											c desc";
		$q = $this->db->query($query);
		$q=$q->result();
		
		
		//$inventario = $this->calcularInventario ( $mercancia );
		//$totalPedido = count($mercancia);
		//$numeroInventario = count($inventario);
	
		//if($numeroInventario<$totalPedido){
		//	return false;
		//}
	
		return $q ? array($q[0]->id_almacen) : array(1);//$this->soloUnAlmacen ( $inventario );

	}

	  
	function cargarPedido($almacenes,$pedido,$mercancia){	
		
		$almacen = $this->elegirAlmacen ($almacenes, $mercancia);
		//echo $almacen;
		$venta =  $this->modelo_compras->get_venta($pedido);
		$id = $venta[0]->id_user;
		$user = $this->model_perfil_red->get_username($id);			
		$keyword=$this->setKeyword ( $pedido, $user );
		
		$valor = 0;
		
		
		foreach ($mercancia as $item){
			
			$id_mercancia = $item->id_mercancia;
			$cantidad = $item->cantidad;
			$estado = $this->crearEmbalaje($almacen,$pedido, $keyword, $user, $id_mercancia, $cantidad, $valor);
			if (!$estado){
				echo "FALLO: ".$id_mercancia."<br/>";exit();
			}
		}
		
	}
	
	private function setKeyword($pedido, $user) {
		
		//$fecha =  substr($venta[0]->fecha, 2,2);
		//$fecha.=  substr($venta[0]->fecha, 5,2);
		//$fecha.=  substr($venta[0]->fecha, 8,2);		
		
		$abbr = substr($user, 0,3);
		
		return $pedido."V".$abbr;
	}

	
	private function crearEmbalaje($id,$venta,$clave,$destino,$mercancia,$cant,$valor)
	{
		
		$origen = $this->getNombreAlmacen ($id);
		
		$tipo = 2;
		$isEntrada = 0;
		$impuesto = 1;
		$subtotal = $valor;
		$importe = 0;
		$total = 0;
		$estatus = 1;
	
		$mov = $this->insertMovimiento ( $origen, $tipo, $isEntrada, $clave, $destino, $mercancia, $cant, $impuesto, $subtotal, $importe, $total, $estatus );
		
		$dato_surtido=array(
				"id_almacen_origen"	=> $id,
				"id_movimiento"		=> $mov,
				"estatus"			=> 1,
				"id_venta"			=> $venta
		);
	
		$this->db->insert("surtido",$dato_surtido);
		
		$inventario = $this->getTodoInventariobyMercancia ($mercancia,$id);
	
		$id_inventario = $inventario[0]->id_inventario;
		
		/*if(isset($id_inventario))
		{
			$cantidadIn = $inventario[0]->cantidad;
			$actual=$cantidadIn*1;
			$mas=$cant*1;
			$cantidad=$actual-$mas;
			$this->db->query("update inventario
									set cantidad=".$cantidad."
									where id_inventario=".$id_inventario);
		}*/
		
		return true;
	}

	private function elegirAlmacen($almacenes, $mercancia) {
		$elegido = 0;
		$primero = 0;
		foreach ($almacenes as $almacen){
			$suma = 0;
			foreach ($mercancia as $item){
				$id_mercancia = $item->id_mercancia;
				$q = $this->model_inventario->consultar_en_inventario($id_mercancia,$almacen);
				$cantidad = $q ? $q[0]->cantidad : 0;
				$suma += $cantidad;
			}	
			if ($suma>$primero){
				$elegido = $almacen;
				$primero = $suma;
			}
		}
		return $elegido;
	}

	
	private function soloUnAlmacen($inventario) {
		$A = array();
		$Count = 1;
		$C = array();
		foreach ($inventario as $almacenes){
			$B = $A;			
			$A = $almacenes;
			$C = (count($C)==0) ? $A : array_intersect($B, $A);
			(count($C)>0) ? $Count++ : '';	
			//var_dump($almacenes);echo "<hr/>";
		}
		return array($Count,$C);
	}
	
	private function calcularInventario($mercancia) {
		$ordenar = array();
		for ($i=0;$i<sizeof($mercancia);$i++){
			array_push($ordenar, 0);
		}
		$ordenar = $this->setExistencias ( $mercancia, $ordenar );
		$items=array();
		foreach ($ordenar as $orden){
			if($orden){
				array_push($items, $orden);
			}
		}
		return $items;
	}
	  
	private function setExistencias($mercancia, $ordenar) {
		$f=0;
		foreach ($mercancia as $item){
			$ordenar[$f]=array();
			$cantidad = $item->cantidad;
			$inventario = $this->get_existencias($item->id_mercancia);			
			$minimo = $this->modelo_compras->getMinimoInventario($item->id_mercancia);
			foreach ($inventario as $almacen){
				$valor = $almacen[1];
				$valor -= $cantidad;
				if($valor>=$minimo){
					array_push($ordenar[$f], $almacen[0]);
				}
			}	
			$f++;
		}
		return $ordenar;
	}


	function get_impuestos()
	{
		$q=$this->db->query("select * from cat_impuesto where estatus like 'ACT'");
		return $q->result();
	}
	function get_mercancias()
	{
		$q=$this->db->query("select * from mercancia where estatus like 'ACT'");
		return $q->result();
	}
	function get_almacen()
	{
		$q=$this->db->query("select * from almacen where estatus like 'ACT'");
		return $q->result();
	}
	function get_tipo_mov($i)
	{
		$q=$this->db->query("select * from cat_movimiento where estatus like 'ACT' and id_tipo_movimiento=".$i);
		return $q->result();
	}
	function insert_movimiento_in()
	{
		$id = $_POST["destino_in"];
		$destino=$this->getNombreAlmacen($id);
		
		$tipo = $_POST["tipo_movimiento_in"];
		$isEntrada = 1;		
		$clave = $_POST["clave_in"];
		
		$origen = $_POST["origen_in"];
		$mercancia = $_POST["mercancia_in"];
		$cant = $_POST["cantidad_in"];
		$impuesto = $_POST["impuesto_in"];
		$subtotal = $_POST["subtotal_in"];
		$importe = $_POST["importe_in"];
		$total = $_POST["total_in"];
		$estatus = 1;
		
		$mov = $this->insertMovimiento ( $origen, $tipo, $isEntrada, $clave, $destino, $mercancia, $cant, $impuesto, $subtotal, $importe, $total, $estatus );		
		
		$id_inventario = $this->getInventariobyMercancia ($mercancia,$id);
		
		if(isset($id_inventario))
		{
			$actual=$inventario_res[0]->cantidad*1;
			$mas=$cant*1;
			$cantidad=$actual+$mas;
			$this->db->query("update inventario set cantidad=".$cantidad." where id_inventario=".$id_inventario);
		}
		else
		{
			$dato_inventario=array(
				"id_mercancia"	=> $mercancia,
				"id_almacen"	=> $id,
				"cantidad"		=> $cant,
				"bloqueados"	=> 0,
				"estatus"		=> "ACT"
			);
			$this->db->insert("inventario",$dato_inventario);
		}
	}
	
	private function getInventariobyMercancia($mercancia,$id) {
		$inventario_q=$this->db->query("Select * from inventario where id_mercancia=".$mercancia." and id_almacen=".$id);
		$inventario_res=$inventario_q->result();
		return $inventario_res[0]->id_inventario;
	}

	private function getTodoInventariobyMercancia($mercancia,$id) {
		$inventario_q=$this->db->query("Select * from inventario where id_mercancia=".$mercancia." and id_almacen=".$id);
		$inventario_res=$inventario_q->result();
		return $inventario_res;
	}
	
	
	function insert_movimiento_out()
	{
		$id = $_POST["origen_out"];		
		$origen = $this->getNombreAlmacen ($id);
		
		$tipo = $_POST["tipo_movimiento_out"];
		$isEntrada = 0;
		$clave = $_POST["clave_out"];
		$destino = $_POST["destino_out"];
		$mercancia = $_POST["mercancia_out"];
		$cant = $_POST["cantidad_out"];
		$impuesto = $_POST["impuesto_out"];
		$subtotal = $_POST["subtotal_out"];
		$importe = $_POST["importe_out"];
		$total = $_POST["total_out"];		
		$estatus = 2;
		
		$mov = $this->insertMovimiento ( $origen, $tipo, $isEntrada, $clave, $destino, $mercancia, $cant, $impuesto, $subtotal, $importe, $total, $estatus );
		
		$dato_surtido=array(
			"id_almacen_origen"	=> $id,
			"id_movimiento"		=> $mov,
			"estatus"			=> 1,
			"id_venta"			=> 0
		);
		
		$this->db->insert("surtido",$dato_surtido);
		
		$id_inventario = $this->getInventariobyMercancia ($mercancia,$id);
		
		if(isset($id_inventario))
		{
			$actual=$inventario_res[0]->cantidad*1;
			$mas=$cant*1;
			$cantidad=$actual-$mas;
			$this->db->query("update inventario set cantidad=".$cantidad." where id_inventario=".$inventario_res[0]->id_inventario);
		}
	}
	
	private function insertMovimiento($origen, $tipo, $isEntrada, $clave, $destino, $mercancia, $cant, $impuesto, $subtotal, $importe, $total, $estatus) {
		
		$dato_mov=array(
			"id_tipo"		=> $tipo,
			"entrada"		=> $isEntrada,
			"keyword"		=> $clave,
			"origen"		=> $origen,
			"destino"		=> $destino,
			"id_mercancia"	=> $mercancia,
			"cantidad"		=> $cant,
			"id_impuesto"	=> $impuesto,
			"subtotal"		=> $subtotal,
			"importe"		=> $importe,
			"total"			=> $total,
			"id_estatus"	=> $estatus
		);
		
		$this->db->insert("movimiento",$dato_mov);
		return $this->db->insert_id();
	}

	  
	private function getNombreAlmacen($id) {
		$q=$this->db->query("select nombre from cedi where id_cedi=".$id);
		$res=$q->result();
		return $res[0]->nombre;
	}

	function get_costo_real($id)
	{
		$q=$this->db->query("SELECT a.real FROM mercancia a WHERE id=".$id);
		return $q->result();
	}
	function get_impuesto_espec($id)
	{
		$q=$this->db->query("select porcentaje from cat_impuesto where id_impuesto=".$id);
		return $q->result();
	}
	function get_movimientos($i)
	{
		$q=$this->db->query("SELECT a.id_movimiento, a.keyword, a.origen, a.destino, a.fecha, c.descripcion estatus, b.descripcion tipo FROM movimiento a, cat_movimiento b, 
		cat_estatus_movimiento c WHERE a.id_tipo=b.id_movimiento and entrada=".$i." and a.id_estatus=c.id_estatus order by fecha DESC");
		return $q->result();
	}
	function get_detalle_movimiento($id)
	{
		$q=$this->db->query("SELECT a.id_movimiento, a.origen, a.destino, a.keyword, a.cantidad, a.subtotal, a.importe, a.total, a.fecha, 
		b.descripcion tipo, c.descripcion impuesto, c.porcentaje, d.descripcion estatus, e.sku_2 FROM movimiento a, cat_movimiento b, cat_impuesto c, 
		cat_estatus_movimiento d, mercancia e WHERE a.id_tipo=b.id_movimiento and a.id_impuesto=c.id_impuesto and a.id_estatus=d.id_estatus 
		and a.id_mercancia=e.id and a.id_movimiento=".$id);
		return $q->result();
	}
	function ver_existentes($merca,$almacen,$qty)
	{
		$inventario_q=$this->db->query("Select * from inventario where id_mercancia=".$merca." and id_almacen=".$almacen);
		$inventario_res=$inventario_q->result();
		if(isset($inventario_res[0]->id_inventario))
		{
			if($inventario_res[0]->cantidad<$qty)
			{
				$mensaje="La cantidad de salida es mayor que la existene en almacen";
			}
			else
			{
				$mensaje="El movimiento se ha hecho con exito";
			}
		}
		else
		{
			$mensaje="Esta mercancia aun no tiene existencias en almacen";
		}
		return $mensaje;	
	}
	/*function get_surtidos()
	{
		$q=$this->db->query("SELECT s.*, m.keyword, a.nombre as origen,m.destino,  e.descripcion estatus_e, m.id_mercancia, m.cantidad, cve.correo
FROM surtido s, movimiento m, cat_estatus_surtido e, cross_venta_envio cve, almacen a, venta v
WHERE s.id_movimiento = m.id_movimiento and s.estatus=e.id_estatus and cve.id_venta = s.id_venta and a.id_almacen = m.origen and v.id_venta = cve.id_venta and v.id_estatus = 2 and s.estatus<>2");
		
		return $q->result();
	}
	*/
	
	function getSurtidos()
	{
		$q=$this->db->query("SELECT 
							    s.id_surtido as id,
							    v.id_venta,
							    m.keyword as id_transaccion,
							    c.nombre as origen,
							    concat(co.Name,
							            ' ',
							            es.Nombre,
							            ' ',
							            ci.Name,
							            ' ',
							            cve.colonia,
							            ' ',
							            cve.calle) as direccion,
							    concat(cve.nombre, ' ', cve.apellido) as usuario,
							    cve.celular,
							    cve.correo,
							    s.fecha
							FROM
							    surtido s,
							    movimiento m,
							    cedi c,
							    cross_venta_envio cve,
							    venta v,
							    Country co,
							    estate es,
							    City ci
							WHERE
							    s.id_almacen_origen = c.id_cedi
							        and s.id_movimiento = m.id_movimiento
							        and s.id_venta = v.id_venta
							        and s.estatus = 1
							        and c.id_cedi = m.origen
							        and cve.id_venta = s.id_venta
							        and co.Code = cve.id_pais
							        and es.id = cve.estado
							        and ci.ID = cve.municipio
							        and v.id_venta = cve.id_venta
							        and v.id_estatus = 2
							group by (s.id_surtido)");
		
		return $q->result();
	}
	
	function get_surtidos()
	{
		$q=$this->db->query("SELECT 
							    s.id_surtido as id,
							    v.id_venta,
							    m.keyword as id_transaccion,
							    c.nombre as origen,
								concat(p.nombre, ' ', p.apellido) as usuario,
							    concat(co.Name,
							            ' ',
							            d.estado,
							            ' ',
							            d.municipio,
							            ' ',
							            d.colonia,
							            ' ',
							            d.calle) as direccion,
							    group_concat(t.numero) celular,
							    u.email correo,
							    s.fecha
							FROM
								users u,
								user_profiles p,
							    surtido s,
							    movimiento m,
							    cedi c,
								cross_dir_user d,
								cross_tel_user t,
							    venta v,
							    Country co
							WHERE
									s.id_almacen_origen = c.id_cedi
							        and s.id_movimiento = m.id_movimiento
							        and s.id_venta = v.id_venta
							        and s.estatus = 1
							        and p.user_id = v.id_user
									and u.id = v.id_user
									and d.id_user =  v.id_user
									and t.id_user =  v.id_user
									and co.Code = d.pais
							        and v.id_estatus = 'ACT'
							group by (s.id_surtido)");
		
		return $q->result();
	}
	function getDetalleProductoPendiente($id){
		$q=$this->db->query("SELECT 
									s.id_surtido,
								    p.nombre as producto,
								    cvm.cantidad,
								    g.descripcion as red,
									'Sin Asignar' nombre_empresa,
									ch.gastos tarifa,
								    concat(co.Name,
								            ' ',
								            d.estado,
								            ' ',
								            d.municipio,
								            ' ',
								            d.colonia,
								            ' ',
								            d.calle) as ciudad
								FROM
								    surtido s,
									movimiento o,
								    cross_venta_mercancia cvm,
								    mercancia m,
								    producto p,
									cat_grupo_producto g,
								    tipo_red tr,
									users u,
									cross_dir_user d,
								    Country co,
									canal ch
								WHERE
										p.id = m.sku         
								        and m.id = o.id_mercancia
										and cvm.id_mercancia = o.id_mercancia
										and cvm.id_venta = s.id_venta
										and o.id_movimiento = s.id_movimiento
								        and m.id_tipo_mercancia = 1
								        and tr.id = g.id_red
										and g.id_grupo = p.id_grupo
										and ch.id = 1
								        and co.`Code` = d.pais
										and d.id_user = u.id
										and u.username = o.destino
										and s.id_surtido = ".$id);
		
		return $q->result();
	}
	
	function getDetalleProductoTransito($id){
		$q=$this->db->query("SELECT
									s.id_surtido,
								    p.nombre as producto,
								    cvm.cantidad,
								    g.descripcion as red,
									pm.nombre_empresa,
									ch.gastos tarifa,
								    concat(co.Name,
								            ' ',
								            d.estado,
								            ' ',
								            d.municipio,
								            ' ',
								            d.colonia,
								            ' ',
								            d.calle) as ciudad
								FROM
								    surtido s,
									movimiento o,
								    cross_venta_mercancia cvm,
								    mercancia m,
								    producto p,
									cat_grupo_producto g,
								    tipo_red tr,
									users u,
									cross_dir_user d,
								    Country co,
									proveedor_mensajeria pm,
									cross_surtido_embarque se,
									embarque e,
									canal ch
								WHERE
										p.id = m.sku
								        and m.id = o.id_mercancia
										and cvm.id_mercancia = o.id_mercancia
										and cvm.id_venta = s.id_venta
										and o.id_movimiento = s.id_movimiento
								        and m.id_tipo_mercancia = 1
								        and tr.id = g.id_red
										and g.id_grupo = p.id_grupo
										and ch.id = 1
								        and co.`Code` = d.pais
										and d.id_user = u.id
										and u.username = o.destino
										and s.id_surtido = se.id_surtido
										and e.id_embarque = se.id_embarque
										and pm.id = e.id_mensajeria
										and se.id_surtido = ".$id);
	
		return $q->result();
	}
	
	function getDetalleVentaProducto($id){
		$q=$this->db->query("SELECT p.nombre as producto, cvm.cantidad, tr.nombre as red, pm.nombre_empresa, pt.tarifa,
							concat(co.Name,' ',es.Nombre,' ',ci.Name,' ',pm.colonia,' ',pm.direccion) as ciudad
							
							FROM surtido s, cross_venta_mercancia cvm, mercancia m, producto p, tipo_red tr, cross_venta_envio cve,
							proveedor_mensajeria pm, proveedor_tarifas pt, Country co, estate es, City ci 
							
							WHERE s.id_surtido = ".$id." and s.id_venta = cvm.id_venta and s.id_venta = cve.id_venta and cvm.id_mercancia = m.id
							and m.sku = p.id and m.id_tipo_mercancia = 1 and p.id_grupo = tr.id and cve.proveedor_mensajeria = pm.id and pt.id_proveedor = pm.id and 
							pt.id = cve.id_tarifa and co.Code = pm.id_pais and pm.estado = es.id and pm.municipio = ci.ID ");
		
		return $q->result();
	}
	
	function getDetalleVentaServicio($id){
		$q=$this->db->query("SELECT se.nombre as servicio, cvm.cantidad, tr.nombre as red, pm.nombre_empresa, pt.tarifa,
concat(co.Name,' ',es.Nombre,' ',ci.Name,' ',pm.colonia,' ',pm.direccion) as ciudad

FROM surtido s, cross_venta_mercancia cvm, mercancia m, servicio se, tipo_red tr, cross_venta_envio cve,
proveedor_mensajeria pm, proveedor_tarifas pt, Country co, estate es, City ci 

WHERE s.id_surtido = ".$id." and s.id_venta = cvm.id_venta and s.id_venta = cve.id_venta and cvm.id_mercancia = m.id and m.id_tipo_mercancia = 2
and m.sku = se.id and m.id_tipo_mercancia = 2 and se.id_red = tr.id and cve.proveedor_mensajeria = pm.id and pt.id_proveedor = pm.id and 
pt.id = cve.id_tarifa and co.Code = pm.id_pais and pm.estado = es.id and pm.municipio = ci.ID");
		
		return $q->result();
	}
	
	function getDetalleVentaCombinado($id){
		$q=$this->db->query("SELECT se.nombre as combinado, cvm.cantidad, tr.nombre as red, pm.nombre_empresa, pt.tarifa,
concat(co.Name,' ',es.Nombre,' ',ci.Name,' ',pm.colonia,' ',pm.direccion) as ciudad

FROM surtido s, cross_venta_mercancia cvm, mercancia m, combinado se, tipo_red tr, cross_venta_envio cve,
proveedor_mensajeria pm, proveedor_tarifas pt, Country co, estate es, City ci

WHERE s.id_surtido = ".$id." and s.id_venta = cvm.id_venta and cvm.id_mercancia = m.id 
and m.sku = se.id and m.id_tipo_mercancia = 3 and se.id_red = tr.id and s.id_venta = cve.id_venta and cve.proveedor_mensajeria = pm.id 
and pt.id_proveedor = pm.id and pt.id = cve.id_tarifa and co.Code = pm.id_pais and pm.estado = es.id and 
pm.municipio = ci.ID");
		
		return $q->result();
	}
	
function getDetalleVentaPaquete($id){
		$q=$this->db->query("SELECT se.nombre as paquete, cvm.cantidad, tr.nombre as red, pm.nombre_empresa, pt.tarifa,
concat(co.Name,' ',es.Nombre,' ',ci.Name,' ',pm.colonia,' ',pm.direccion) as ciudad

FROM surtido s, cross_venta_mercancia cvm, mercancia m, paquete_inscripcion se, tipo_red tr, cross_venta_envio cve,
proveedor_mensajeria pm, proveedor_tarifas pt, Country co, estate es, City ci 

WHERE s.id_surtido = ".$id." and s.id_venta = cvm.id_venta and s.id_venta = cve.id_venta and cvm.id_mercancia = m.id and m.id_tipo_mercancia = 4
and m.sku = se.id_paquete and se.id_red = tr.id and cve.proveedor_mensajeria = pm.id and pt.id_proveedor = pm.id and 
pt.id = cve.id_tarifa and co.Code = pm.id_pais and pm.estado = es.id and pm.municipio = ci.ID");
		
		return $q->result();
	}
	
	function ObtenerMercancia($id_mercancia){
		$q = $this->db->query("select id_tipo_mercancia, sku from mercancia where id =".$id_mercancia);
		$mercancia = $q->result();
		
		if(!isset($mercancia[0]->id_tipo_mercancia)){
			return 0;
		}elseif($mercancia[0]->id_tipo_mercancia == 1){
			$q = $this->db->query("SELECT * FROM producto where id =".$mercancia[0]->sku);
		}elseif ($mercancia[0]->id_tipo_mercancia == 2){
			$q = $this->db->query("SELECT * FROM servicio where id=".$mercancia[0]->sku);
		}else{
			$q = $this->db->query("SELECT * FROM combinado where id=".$mercancia[0]->sku);
		}
		$mercancia2 = $q->result();
		return $mercancia2;
	}
	
	function surtir()
	{
		$venta = $_POST["venta"];
		$unico = $_POST["unico"];
		$fecha = $_POST["fecha"];
		$n_guia = $_POST["n_guia"];
		$id_surtido = $_POST["surtido"];
		$proveedor = $_POST["proveedor"];
		
		$embarque = $this->insertEmbarque ( $fecha, $n_guia,$proveedor );		
		
		if($venta==0 || $unico==1)
		{	
			$this->surtidoEmbarque ( $id_surtido, $embarque );		
			$this->estatusSurtido (2,$id_surtido);
		}
		else
		{
			$surtidos = $this->getSurtidoNoEmbarcado ($venta);
			
			foreach($surtidos as $surtido)
			{
				$this->surtidoEmbarque ( $surtido->id_surtido, $embarque );
			}
			
			$this->embarcarbyid($embarque);
			$this->estatusSurtidobyVenta (2,$venta);
		}
		
		$productos = $this->productoSurtido ($embarque);
		
		foreach($productos as $producto)
		{
			$almacen = $producto->id_almacen_origen;
			$mercancia = $producto->id;
			
			$inventario = $this->getTodoInventariobyMercancia($mercancia,$almacen);
			
			$cantidad = $producto->cantidad;
			$cantidad_total = $inventario[0]->cantidad - $cantidad;
			$this->updateInventario ($cantidad_total,$almacen,$mercancia);
			
			$otro = $producto->otro_destino;			
			$id_inventario = $inventario[0]->id_inventario;
			$destino = 0;			
			$documento = 9;			
			$n_documento = $venta.'V'.date('Ymd');
			
			$this->historialInventario ( $almacen, $mercancia, $cantidad, $otro, $id_inventario, $destino, $documento, $n_documento );
			
		}
		
		$this->db->query("delete from carrito_temporal where id_venta = ".$venta);
		
		echo ($venta==0 || $unico==1) ? "El Pedido ha sido enviado a transito!" : "El Pedido ha sido Embarcado!";
	}
	
	private function historialInventario($almacen, $mercancia, $cantidad, $otro, $id_inventario, $destino, $documento, $n_documento) {
		$dato_mov=array(
			"id_origen"		=> $almacen,
			"otro_origen"	=> $otro,
			"id_destino"	=> $destino,
			"id_documento"	=> $documento,
			"cantidad"		=> $cantidad,
			"id_inventario"	=> $id_inventario,
			"id_mercancia"	=> $mercancia,
			"tipo"			=> 'S',
			"n_documento"	=> $n_documento
		);
		
		$this->db->insert("inventario_historial",$dato_mov);
	}

	
	private function updateInventario($cantidad,$almacen,$mercancia) {
		$this->db->query("update inventario set cantidad=".$cantidad." where id_almacen = ".$almacen." and id_mercancia = ".$mercancia);
	}

	
	private function productoSurtido($id) {
		$q = $this->db->query("SELECT 
									    p.id,
									    s.id_almacen_origen,
									    cvm.cantidad,
									    concat(f.nombre,
									            ' ',
												f.apellido,
									            '\n',
												co.`Name`,
									            ' ',
									            d.estado,
									            ' ',
									            d.municipio,
									            ' ',
									            d.colonia,
									            ' ',
									            d.calle) as otro_destino
									FROM
									    surtido s,
										movimiento o,
									    cross_venta_mercancia cvm,
									    mercancia m,
									    producto p,
										users u,
										user_profiles f,
										cross_dir_user d,
									    Country co,
										cross_surtido_embarque e
									WHERE
											p.id = m.sku         
									        and m.id = o.id_mercancia
									        and cvm.id_mercancia = o.id_mercancia
											and cvm.id_venta = s.id_venta
											and o.id_movimiento = s.id_movimiento
											and m.id_tipo_mercancia = 1
									        and co.`Code` = d.pais
											and d.id_user = u.id
											and f.user_id = u.id
											and u.username = o.destino
									        and s.id_surtido = e.id_surtido
											and e.id_embarque = ".$id);  
		$productos = $q->result();
		return $productos;
	}

	
	private function estatusSurtidobyVenta($estatus,$venta) {
		$this->db->query("update surtido set estatus=".$estatus." where id_venta=".$venta);
	}

	
	private function getSurtidoNoEmbarcado($venta) {
		$surtidos_q=$this->db->query("SELECT * from surtido where id_venta=".$venta." and estatus <> 2");
		return $surtidos_q->result();
	}

	
	private function estatusSurtido($estatus,$id) {
		$this->db->query("update surtido set estatus = ".$estatus." where id_surtido=".$id);
	}

	
	private function surtidoEmbarque($id_surtido, $embarque) {
		$dato_cross=array(
			"id_surtido"	=> $id_surtido,
			"id_embarque"	=> $embarque
		);
		$this->db->insert("cross_surtido_embarque",$dato_cross);
	}

	
	private function insertEmbarque($fecha, $n_guia, $proveedor) {
		$dato_embarque=array(
			"fecha_entrega"	=> $fecha,
			"id_estatus"	=> 1,			
			"n_guia"		=> $n_guia,
			"id_mensajeria"	=> $proveedor
		);
		$this->db->insert("embarque",$dato_embarque);
		return $this->db->insert_id();
	}


	function get_embarque()
	{
		$embarques = $this->getEmbarquesEstatus(1);
		$embarques_array=array();
		$dato=0;
		foreach($embarques as $embarque)
		{
			$dato_embarque = $this->getEmbarquesTransito ($embarque->id_embarque);
			
			array_push($embarques_array, $dato_embarque);
			$dato++;
		} 
		return $embarques_array;
	}
	

	private function getEmbarquesTransito($id) {
		/*$q2=$this->db->query("SELECT a.*, b.keyword, b.destino, c.descripcion tipo, d.nombre origen, e.descripcion estatus_e, f.id_embarque,f.fecha_entrega, 
		h.descripcion estado_e, b.id_mercancia, b.cantidad, cve.correo
		FROM surtido a, movimiento b, cat_movimiento c, almacen d, cat_estatus_surtido e, embarque f, cross_surtido_embarque g, cross_venta_envio cve,
		cat_estatus_embarque h WHERE a.id_movimiento=b.id_movimiento and a.id_almacen_origen=d.id_almacen and f.id_embarque=g.id_embarque and a.id_surtido=g.id_surtido 
		and b.id_tipo=c.id_movimiento and a.estatus=e.id_estatus and h.id_estatus=f.id_estatus and cve.id_venta = a.id_venta and f.id_embarque=".$embarque->id_embarque." limit 1");
		*/
		$query = "SELECT 
					    s.id_surtido as id,
					    m.keyword as id_transaccion,
					    e.n_guia,
					    e.id_embarque,
					    c.nombre as origen,
					    e.fecha_entrega,
					    concat(co.Name,
					            ' ',
					            d.estado,
					            ' ',
					            d.municipio,
					            ' ',
					            d.colonia,
					            ' ',
					            d.calle) as direccion,
					    concat(p.nombre, ' ', p.apellido) as usuario,
					    group_concat(t.numero) celular,
					    u.email correo
					FROM
					    surtido s,
					    movimiento m,
					    cedi c,
					    embarque e,
					    cross_surtido_embarque g,
					    cross_dir_user d,
						cross_tel_user t,
					    Country co,
					    users u,
						user_profiles p
					WHERE
							c.id_cedi = s.id_almacen_origen 
							and m.id_movimiento = s.id_movimiento
					        and s.id_surtido = g.id_surtido
							and e.id_embarque = g.id_embarque
					        and co.`Code` = d.pais
							and d.id_user = u.id
							and t.id_user = u.id
							and p.user_id = u.id
							and u.username = m.destino
					        and e.id_estatus = 1
					        and g.id_embarque = ".$id."
					group by s.id_surtido
					limit 10";
		
		$q2=$this->db->query($query);
		$dato_embarque=$q2->result();
		return $dato_embarque;
	}

	private function getEmbarquesEstatus($estatus) {
		$q=$this->db->query("SELECT * from embarque where id_estatus=".$estatus);
		$embarques=$q->result();
		return $embarques;
	}
 
	function get_embarcados($inicio, $fin)
	{
		$embarques = $this->getEmbarquesEstatus(2);
		//$embarques_array=array();
		$dato=array();
		foreach($embarques as $embarque)
		{
			$id = $embarque->id_embarque;		
			
			//$dato_embarque = $this->getEmbarquesHechos ( $inicio, $fin, $id );
			
			//if(isset($dato_embarque[0]->id_embarque)){
				array_push($dato, $id);
			//}
			//$dato++;
		}
		
		$embarques_array = implode(',', $dato);
		
		return $this->getEmbarquesHechos ( $inicio, $fin, $embarques_array);
	}
	
	private function getEmbarquesHechos($inicio, $fin, $id) {
		
		/*$q2=$this->db->query("SELECT a.*, b.keyword, b.destino, c.descripcion tipo, d.nombre origen, e.descripcion estatus_e, f.id_embarque,f.fecha_entrega,
		 h.descripcion estado_e, b.id_mercancia, b.cantidad, cve.correo
		 FROM surtido a, movimiento b, cat_movimiento c, almacen d, cat_estatus_surtido e, embarque f, cross_surtido_embarque g, cross_venta_envio cve,
		 cat_estatus_embarque h WHERE a.id_movimiento=b.id_movimiento and a.id_almacen_origen=d.id_almacen and f.id_embarque=g.id_embarque and a.id_surtido=g.id_surtido
		 and b.id_tipo=c.id_movimiento and a.estatus=e.id_estatus and h.id_estatus=f.id_estatus and cve.id_venta = a.id_venta and f.id_embarque=".$embarque->id_embarque." limit 1");
		*/				
		
		$query = "SELECT 
					    s.id_surtido as id,
					    m.keyword as id_transaccion,
					    e.n_guia,
					    e.id_embarque,
					    c.nombre as origen,
					    e.fecha_entrega,
					    concat(co.`Name`,
					            ' ',
					            d.estado,
					            ' ',
					            d.municipio,
					            ' ',
					            d.colonia,
					            ' ',
					            d.calle) as direccion,
					    concat(p.nombre, ' ', p.apellido) as usuario,
					    group_concat(t.numero) celular,
					    u.email correo,
						s.id_venta
					FROM
					    surtido s,
					    movimiento m,
					    cedi c,
					    embarque e,
					    cross_surtido_embarque g,
					    cross_dir_user d,
						cross_tel_user t,
						users u,
						user_profiles p,
					    Country co
					WHERE
							c.id_cedi = s.id_almacen_origen 
					        and m.id_movimiento = s.id_movimiento       
					        and s.id_surtido = g.id_surtido
							and e.id_embarque = g.id_embarque
					        and co.`Code` = d.pais
							and d.id_user = u.id
							and t.id_user = u.id
							and p.user_id = u.id
							and u.username = m.destino
					        and e.id_estatus = 2
					        and g.id_embarque in (".$id.")
					        and e.fecha_entrega > '".$inicio."'
					        and e.fecha_entrega <= '".$fin."'
					group by e.id_embarque
					limit 10";
		$q2=$this->db->query($query);
		
		$dato_embarque=$q2->result();
		return $dato_embarque;
	}
 
	function embarcar()
	{
		$this->db->query("UPDATE embarque set id_estatus=2 where id_embarque=".$_POST["id"]);
	}
	
	function embarcarbyid($id)
	{
		$this->db->query("UPDATE embarque set id_estatus=2 where id_embarque=".$id);
	}
	
	function existe_almacen_web()
	{
		$q=$this->db->query("SELECT * from almacen where web=1");
		$res=$q->result();
		if(isset($res[0]))
		{
			$existe=1;
		}
		else
		{
			$existe=0;
		}
		return $existe;
	}
	function new_almacen()
	{
		if($_POST["activo"]==1)
		{
			$estatus="ACT";
		}
		else 
		{
			$estatus="DES";
		}
		$dato_almacen=array(
			"nombre"	=> $_POST["nombre"],
			"descripcion"	=> $_POST["descripcion"],
			"web"			=> $_POST["web"],
			"estatus"		=> $estatus
		);
		$this->db->insert("almacen",$dato_almacen);			
	}
	function get_almacenes()
	{
		$q=$this->db->query("select * from almacen");
		return $q->result();
	}
	function estatus_almacen()
	{
		$estatus = ($_POST["estatus"]==1) ? "DES" : "ACT";
		
		$this->db->query("UPDATE almacen set estatus='".$estatus."' where id_almacen=".$_POST["id"]);
	}
	function eliminar_almacen()
	{
		$this->db->query("DELETE FROM almacen where id_almacen=".$_POST["id"]);
	}
	function editar_almacen()
	{
		$this->db->query("UPDATE almacen set nombre='".$_POST['nombre']."', descripcion='".$_POST['descripcion']."', web=".$_POST['web']." where id_almacen=".$_POST["id"]);
	}
	function get_almacen_especifico($id)
	{
		$q=$this->db->query("select * from almacen where id_almacen=".$id);
		return $q->result();
	}
	function get_files($id)
	{
		$q=$this->db->query(' SELECT * from archivero_cedi');
		return $q->result();
	}
	function del_file_multiple()
	{
		foreach ($_post["archivo"] as $file) 
		{
			$this->db->query('delete form archivero_cedi where id_archivero='.$file);
		}
	}
	function del_file()
	{
		$this->db->query('delete from archivero_cedi where id_archivero='.$_POST["id_archivero_cedi"]);
	}
	function get_mercancia_almacen($id)
	{
		$q=$this->db->query('SELECT a.*, b.id_inventario, c.id, c.sku_2 from almacen a, inventario b, mercancia c 
		where a.id_almacen=b.id_almacen and b.id_mercancia=c.id and a.id_almacen='.$id);
		return $q->result();
	}
	function get_existencia($id)
	{
		$q=$this->db->query('SELECT * from inventario where id_inventario='.$id);
		$res=$q->result();
		$existencia=$res[0]->cantidad;
		return $existencia;
	}
	function get_existencias($id)
	{	
		$q=$this->db->query('SELECT * from inventario where id_mercancia = '.$id.' and estatus = "ACT"');
		$res=$q->result();
		$existencias = array();
		foreach ($res as $inventario){
			$almacen = array(
					$inventario->id_almacen,
					$inventario->cantidad
			); 
			array_push($existencias, $almacen);
		}
		return $existencias;
	}
	function bloquear_mercancia($id,$cantidad)
	{
		$this->db->query("UPDATE inventario set bloqueados=".$cantidad." where id_inventario=".$id);
	}
	function file_user($id,$data)
	{
		$explode=explode(".",$data["file_name"]);
		$nombre=$explode[0];
		$extencion=$explode[1];
		$dato_file=array(
				"id_user"			=>	$id,
				"nombre"			=>	$nombre,
				"extension"			=>	$extencion,
				"nombre_completo"	=>	$data["file_name"],
                "url"				=>	"/media/".$id."/".$data["file_name"],
                "tamano"			=>	$data["file_size"]
            );
		$this->db->insert("archivero_cedi",$dato_file);
	}
	function reporte_usuarios_sio($inicio,$fin)
	{
		$q=$this->db->query("SELECT a.id, a.username usuario, a.created creacion, b.nombre nombre, b.apellido apellido, b.fecha_nacimiento nacimiento, 
		c.descripcion sexo, d.descripcion edo_civil, e.descripcion estudio, f.descripcion ocupacion, g.descripcion tiempo, h.descripcion estatus 
		FROM users a, user_profiles b, cat_sexo c, cat_edo_civil d , cat_estudios e, cat_ocupacion f, cat_tiempo_dedicado g, cat_estatus_afiliado h 
		WHERE a.id=b.user_id and b.id_sexo=c.id_sexo and b.id_edo_civil=d.id_edo_civil and b.id_estudio=e.id_estudio and b.id_ocupacion=f.id_ocupacion 
		and b.id_tiempo_dedicado=g.id_tiempo_dedicado and b.id_estatus=h.id_estatus and b.id_tipo_usuario=1 and a.created>='".$inicio."' and a.created<='".$fin."'");
		return $q->result();
	}
	function reporte_almacenes($inicio,$fin)
	{
		$q=$this->db->query("SELECT * FROM almacen WHERE creacion>='".$inicio."' and creacion<='".$fin."'");
		return $q->result();
	}
	function reporte_proveedores()
	{
		$q=$this->db->query('SELECT a.*, b.nombre, c.descripcion regimen, d.descripcion zona, e.descripcion impuesto 
		FROM proveedor a, empresa b, cat_regimen c, cat_zona d, cat_impuesto e WHERE a.id_empresa=b.id_empresa 
		and a.id_regimen=c.id_regimen and a.id_zona=d.id_zona and a.id_impuesto=e.id_impuesto');
		return $q->result();
	}
	function reporte_ventas_empresa($inicio,$fin)
	{
		$q=$this->db->query("SELECT count(a.id_venta) total_ventas, sum(c.costo) costo_total, e.id_empresa, e.nombre empresa 
		FROM venta a, cross_venta_mercancia b, mercancia c, proveedor d, empresa e WHERE a.id_venta=b.id_venta and b.id_mercancia=c.id 
		and c.id_proveedor=d.id_proveedor and d.id_empresa=e.id_empresa and a.fecha>='".$inicio."' and a.fecha<='".$fin."' group by e.id_empresa");
		return $q->result();
	}
}