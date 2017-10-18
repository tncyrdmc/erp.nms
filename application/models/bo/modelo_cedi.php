<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_cedi extends CI_Model
{
	function crear_cedi($cedi){
		$this->db->insert('cedi',$cedi);
		return $this->db->insert_id();
	}
	
	function consultar_departamento_activo($city){
		$q = $this->db->query("select * from estate where id=(Select id_estate from City where ID =  '".$city." ')");
		$departamento = $q->result();
		return $departamento;
	}
	
	function consultar_ciudad_actual($city){
		$q = $this->db->query("select * from City where ID = ".$city );
		$ciudades = $q->result();
		return $ciudades;
		
	}
	function nuevaCiudad(){
		$ciudad = array (
				"Name" => $_POST ['ciudad'],
				"CountryCode" => $_POST ['pais'],
				"District" => $_POST ['departamento']
		);
		$this->db->insert ( "City", $ciudad );
	}
	function  consultar_departamento($city){
		$q = $this->db->query("select * from estate where id_pais=(Select CountryCode from City where ID =  '".$city." ')");
		$departamento = $q->result();
		return $departamento;
	}
	function all_cedi(){
		$q = $this->db->query("SELECT p.id_cedi,p.nombre,p.descripcion,p.ciudad,p.direccion,p.telefono,p.estatus,c.Name
                               FROM cedi p ,City c where p.ciudad = c.ID and p.tipo= 'C' ");
	    return  $q->result();
	}
	
	function get_mercancia_cedi($id_cedi){
		$q = $this->db->query("SELECT p.id, p.nombre FROM inventario i, producto p where i.id_mercancia = p.id and i.id_almacen = '".$id_cedi."'");
	    return  $q->result();
	}
	
	function get_mercancia_id($id){
		$q = $this->db->query("SELECT 
								    p.id, p.nombre, p.min_venta, m.costo, m.costo_publico,m.puntos_comisionables
								FROM
								    producto p,
								    mercancia m
								where
								    p.id = m.sku
										and m.id = '".$id."'");
		return  $q->result();
	}
	
	function get_cant_disp_y_bloq_cedi($id_prod, $id_cedi){
		$q = $this->db->query("SELECT i.cantidad, i.bloqueados FROM inventario i, producto p where i.id_mercancia = '".$id_prod."' and i.id_mercancia = p.id and i.id_almacen = '".$id_cedi."'");
	    return  $q->result();
	}
	
	function all(){
		$q = $this->db->query("SELECT p.id_cedi,p.nombre,p.descripcion,p.ciudad,p.direccion,p.telefono,p.estatus,c.Name, co.Name pais

FROM cedi p , City c, Country co where p.ciudad = c.ID and c.CountryCode = co.Code");
	    return  $q->result();
	}
	
	function cambiar_estado_cedi($id,$estado){
		$this->db->query("update cedi set estatus = '".$estado."' where id_cedi = ".$id);
		
	}
	function eliminar_cedi($id){
		$this->db->query("delete from cedi where id_cedi = ".$id);
	}
	function consultar_cedi($id){
		$q = $this->db->query('select * from cedi where id_cedi ='.$id);
		$cedi = $q->result();
		return $cedi;
	}
	function consultar_ciudades($city){
		$q = $this->db->query("select * from City where id_estate =(Select id_estate from City where ID =  '".$city." ') ");
		$ciudades = $q->result();
		return $ciudades;
	}
	
	function consultar_PaisCiudad($city){
		$q = $this->db->query("Select * from City where ID = ".$city);
		$ciudades = $q->result();
		return $ciudades;
	}
	function actualizar_cedi($cedi, $id){
		$this->db->update('cedi', $cedi, array('id_cedi' => $id));
	}
	function getUsuarioId($id)
	{
		$q=$this->db->query('SELECT
								    u.id as id,
								    u.username as username,
								    u.email as email,
								    up.nombre,
								    up.apellido,
								    C.id_cedi as cedi,
								    UC.dni,
								    UC.telefono_fijo,
								    UC.id_pais
								FROM
								    users u,
								    user_profiles up,
								    cat_tipo_usuario cu,
								    users_cedi UC,
								    cedi C
								WHERE
								    (u.id = up.user_id)
								        and (up.id_tipo_usuario = cu.id_tipo_usuario)
								        and (cu.id_tipo_usuario = 8)
								        and (u.id = '.$id.')
								        and UC.username = u.username
								        and UC.id_cedi = C.id_cedi
								group by u.id');
		return $q->result();
	}
	
	/**
	 * Point of Sale (POS)	 
	 */
	
	function setItemPOS ($mercancia,$id,$cedi){
		
		$items = $this->getTemporalID ($id);
		$id_temporal = $this->setIdTemporal ( $id, $cedi );		
		$temporal =  $items ? $items[0]->id_temporal : 0;				
		
		if ($temporal==$id_temporal){	
			
			$cantidad = 0;
			foreach ($items as $item){
				if($item->item == $mercancia){					
					$cantidad += $item->cantidad;
				}
			}
			echo $cantidad;
			($cantidad>0) 
			? $this->updateTemporalItem ( $mercancia, $id_temporal, 'cantidad' ,$cantidad+1 )
			: $this->insertTemporal ( $id, $id_temporal ,$mercancia);
			
		}else{
			$this->insertTemporal ( $id, $id_temporal ,$mercancia);		
		}	
		
		return $this->getTemporal ($id_temporal);

		
	}
	
	function setIdTemporal($id, $cedi) {
		
		$venta = $this->getUltimaVenta ();
		$id_temporal = $venta."_".$cedi."_".$id;
		
		return $id_temporal;
	}

	private function insertCliente( $id_temporal,  $valor) {
	    
	    $dato = array (
	        "id_temporal" => $id_temporal,
	        "id_user" => $valor
	    );
	    
	    $this->db->insert ( "pos_temporal", $dato );
	    
	}

	function setCliente( $id_temporal,  $valor) {
	    
	    $exist = $this->getTemporalCliente($id_temporal);
	    
	    if(!$exist)
	       $this->insertCliente($id_temporal, $valor);
	    else
	       $this->updateCliente($id_temporal, $valor);
	}
    
	private function updateCliente($id_temporal, $valor)
    {
        $query = 'update pos_temporal
					set id_user  = "'.$valor.'"
					where id_temporal = "'.$id_temporal.'"';
	    
	    $this->db->query($query);
	    
	    $this->updateTemporal($id_temporal, 'cliente', $valor);
    }

	
	function getTemporalCliente( $id_temporal) {
	    
	    $query = 'SELECT id_user 
                    FROM pos_temporal
					WHERE id_temporal = "'.$id_temporal.'"';
	    
	    $q=$this->db->query($query);
	    $q=$q->result();
	    
	    if(!$q)
	        return false;
	    
	    return $q[0]->id_user;    
	    
	}
	
	function updateTemporalItem($mercancia, $id_temporal, $campo, $valor) {
		
		$query = 'update pos_venta_temporal 
					set '.$campo.'  = "'.$valor.'" 
					where id_temporal = "'.$id_temporal.'" 
						and item = '.$mercancia;
		
		$this->db->query($query);
	}

	function updateTemporal($id_temporal, $campo, $valor) {
	
		$query = 'update pos_venta_temporal
					set '.$campo.'  = "'.$valor.'"
					where id_temporal = "'.$id_temporal.'"';
	
		$this->db->query($query);
	}
	
	function deleteTemporal( $id_temporal) {
	
		$query = 'delete from pos_venta_temporal
					where id_temporal = "'.$id_temporal.'"';
	
	    $this->db->query($query);
	    
	    $query = 'delete from pos_temporal
					where id_temporal = "'.$id_temporal.'"';
	    
	    $this->db->query($query);
	}
	
	function deleteTemporalItem($mercancia, $id_temporal) {
	
		$query = 'delete from pos_venta_temporal
					where id_temporal = "'.$id_temporal.'"
						and item = '.$mercancia;
	
		$this->db->query($query);
	}	
	
	function getTotalNeto($temporal){
		
		$temporal = $this->getTemporal($temporal);
		
		$valor = 0;
		foreach ($temporal as $items){
			
			$precio = $this->calcularPrecio($items);
			
			$valor+= $precio * $items->cantidad;
		}
		
		return $valor;
		
	}
	
	function setDescuento($temporal,$item,$descuento,$tipo){
		if($tipo == '%' && $descuento>99){
			$descuento = 99;
		}
		$this->updateTemporalItem($item, $temporal, 'descuento', $descuento);
		$this->updateTemporalItem($item, $temporal, 'tipo_descuento', $tipo);
		
	}
	
	function getTotalArticulos($temporal){
	
		$temporal = $this->getTemporal($temporal);
	
		$valor = 0;
		foreach ($temporal as $items){
			$valor+= $items->cantidad;
		}
	
		return $valor;
	
	}
	function getVenta($id) {
		$query = "select 
					    v.fecha fecha_venta,v.*,i.*,p.*,h.*,
						c.costo valor_total, 
						c.descuento descuento_neto ,
						c.iva,
						c.puntos total_puntos
					from
					    venta v,
						pos_venta c,
						pos_venta_item i,
						pos_venta_historial h,
						producto p,
						mercancia m
					where
						p.id = m.sku
						and m.id = i.item
						and h.id_venta = v.id_venta
						and h.item = i.item
						and c.id_venta = v.id_venta
						and i.id_venta = v.id_venta
					    and v.id_venta = '".$id."'
						and v.id_estatus = 'ACT'
						and v.id_metodo_pago= 'CEDI' 
					group by i.item";
		
		$q = $this->db->query($query);
		return $q->result();
	}
        
        function getVentasRealizadasID($inicio,$fin,$id) {
		$query = "SELECT 
					    v.id_venta id,
					    v.fecha,
					    w.nombre cedi,
					    CONCAT(p.nombre, ' ', p.apellido) usuario,
					    CONCAT(p2.nombre, ' ', p2.apellido) cliente,
					    (CASE
					        WHEN
					            ((SELECT 
					                    t.id
					                FROM
					                    afiliar a,
					                    tipo_red t
					                WHERE
					                    t.id = a.id_red
					                        AND a.id_afiliado = v.id_user
					                        AND a.id_red = 1))
					        THEN
					            'Emprendedor'
					        ELSE 'Cliente Distinguido'
					    END) red,
					    c.costo valor,
					    c.iva,
					    c.puntos
					FROM
					    venta v,
					    pos_venta c,
					    pos_venta_item i,
					    pos_venta_historial h,
					    user_profiles p,
					    user_profiles p2,
					    users_cedi x,
					    cedi w,
					    users u,
					    mercancia m
					WHERE
							p.user_id = c.id_user 
                                                        AND c.id_user = ".$id."
							AND p2.user_id = v.id_user 
							AND x.id_cedi = x.id_cedi
							AND x.username = u.username
							AND u.id = c.id_user
							AND m.id = i.item
					        AND h.id_venta = v.id_venta
					        AND h.item = i.item
					        AND c.id_venta = v.id_venta
					        AND i.id_venta = v.id_venta
					        AND v.id_estatus = 'ACT'
					        AND v.id_metodo_pago = 'CEDI'
							AND v.fecha between '".$inicio." 00:00:00' and '".$fin." 23:59:59'
					GROUP BY v.id_venta";
	
		$q = $this->db->query($query);
		return $q->result();
	}
        
	function getVentasRealizadas($inicio,$fin) {
		$query = "SELECT 
					    v.id_venta id,
					    v.fecha,
					    w.nombre cedi,
					    CONCAT(p.nombre, ' ', p.apellido) usuario,
					    CONCAT(p2.nombre, ' ', p2.apellido) cliente,
					    (CASE
					        WHEN
					            ((SELECT 
					                    t.id
					                FROM
					                    afiliar a,
					                    tipo_red t
					                WHERE
					                    t.id = a.id_red
					                        AND a.id_afiliado = v.id_user
					                        AND a.id_red = 1))
					        THEN
					            'Emprendedor'
					        ELSE 'Cliente Distinguido'
					    END) red,
					    c.costo valor,
					    c.iva,
					    c.puntos
					FROM
					    venta v,
					    pos_venta c,
					    pos_venta_item i,
					    pos_venta_historial h,
					    user_profiles p,
					    user_profiles p2,
					    users_cedi x,
					    cedi w,
					    users u,
					    mercancia m
					WHERE
							p.user_id = c.id_user 
							AND p2.user_id = v.id_user 
							AND x.id_cedi = x.id_cedi
							AND x.username = u.username
							AND u.id = c.id_user
							AND m.id = i.item
					        AND h.id_venta = v.id_venta
					        AND h.item = i.item
					        AND c.id_venta = v.id_venta
					        AND i.id_venta = v.id_venta
					        AND v.id_estatus = 'ACT'
					        AND v.id_metodo_pago = 'CEDI'
							AND v.fecha between '".$inicio." 00:00:00' and '".$fin." 23:59:59'
					GROUP BY v.id_venta";
	
		$q = $this->db->query($query);
		return $q->result();
	}
	
	function getTemporal($id) {
		$query = "SELECT
					    p.codigo_barras,
					    p.nombre,
					    (CASE
					        WHEN (v.costo = 'DETAL') THEN m.costo_publico
					        ELSE m.costo
					    END) unidad,
					    m.puntos_comisionables,
					    i.cantidad inventario,
					    p.inventario minimo,
					    v.*
					FROM
					    pos_venta_temporal v,
					    producto p,
					    mercancia m,
					    users_cedi UC,
					    users u,
					    inventario i
					WHERE
					    p.id = m.sku AND i.id_mercancia = m.sku
					        AND m.id = v.item
					        AND i.id_almacen = UC.id_cedi
					        AND UC.username = u.username
					        AND u.id = v.id_user
					        AND v.id_temporal = '".$id."'
					        AND v.estatus = 'ACT'
					GROUP BY
							v.item";
		
		$q = $this->db->query($query);
		return $q->result();
	}

	function getTemporalItem($id,$mercancia) {
		$query = 'select
										    p.codigo_barras,
										    p.nombre,
										    (case
										        when (v.costo = "DETAL")
												then m.costo_publico
										        else m.costo
										    end) unidad,
											m.puntos_comisionables,
										   	i.cantidad inventario,
										   	p.inventario minimo,
										   	v . *
										from
										    pos_venta_temporal v,
										    producto p,
										    mercancia m,
											users_cedi UC,
											users u,
											inventario i
										where
										    p.id = m.sku
												AND i.id_mercancia = m.sku
					        					AND m.id = v.item
												and v.item = '.$mercancia.'
												and i.id_almacen = UC.id_cedi
												and UC.username = u.username
												and u.id = v.id_user
										        and v.id_temporal = "'.$id.'"
										        and v.estatus = "ACT"';
	
		$q = $this->db->query($query);
		return $q->result();
	}
	
	private function insertTemporal($id, $id_temporal,$item) {
		$mercancia = $this->get_mercancia_id($item);
		$puntos = $mercancia[0]->puntos_comisionables*$mercancia[0]->min_venta;
		$Cliente = $this->getTemporalCliente($id_temporal);
        $dato = array (
				"id_temporal" => $id_temporal,
				"id_user" => $id,
				"item" => $item,
				"fecha" => date('Y-m-d'),
				"cantidad" => $mercancia[0]->min_venta,
				"puntos" => $puntos,
				"costo" => 'MAYOR',
				"descuento" => 0,
				"tipo_descuento" => "$",
				"estatus" => "ACT",
		        "cliente" => $Cliente
		);
                
		$this->db->insert ( "pos_venta_temporal", $dato );
                
	}

	
	private function getTemporalID($id) {
		$q = $this->db->query("SELECT
								    *, REPLACE(id_temporal, '_', '') id
								FROM
								    pos_venta_temporal
								WHERE
								    id_user = ".$id." AND estatus = 'ACT'
								ORDER BY id DESC");
		
		return $q->result(); 
	}

	
	function getUltimaVenta() {
		$q = $this->db->query('select max(id_venta) id from venta where id_estatus = "ACT"');
		$q = $q->result();
		$q = $q ? $q[0]->id : 0;
		$q+=1;
		return $q;
	}

	function registrarVenta($temporal,$pago,$id,$descuento,$iva){
		
		$temp = $this->getTemporal ($temporal);
		
		$venta = $this->insertVenta ( $id );
		
		$this->insertVentaPOS ( $pago, $venta , $temp[0]->id_user ,$descuento,$iva,$temporal);
		
		$cedi = $this->getUsuarioId($temp[0]->id_user);

		$id_cedi = $cedi[0]->cedi;
		
		foreach ($temp as $item){
			
			$this->insertVentaPOSItem ( $venta , $item);
			$this->insertHistorial ( $id, $temp[0]->id_user, $venta ,$item);			
			$this->updateInventarioPOS ( $id_cedi,$item );
			
		}			
		
		$id_temporal = $venta."_".$id_cedi."_".$temp[0]->id_user;
		
		$this->deleteTemporal($id_temporal);
		
		return $this->getVenta($venta);
	}
	
	private function updateInventarioPOS($id_cedi,$item) {
		$cantidad = ($item->inventario - $item->cantidad);
		
		$query = "update inventario 
					set cantidad = ".$cantidad." 
					where id_almacen = ".$id_cedi." 
						and id_mercancia = ".$item->item."";
		$this->db->query($query);
	}

	
	private function insertHistorial($id, $user, $venta, $item) {
		$date = date('Y-m-d');
		
		$valor = $this->calcularPrecio ($item);
		
		$dato_venta=array(
				"id_venta" 	=> $venta,
				"id_user"	=> $user,
				"cliente"	=> $id,
				"fecha"	=> $date,
				"item"	=> $item->item,
				"cantidad" 	=> $item->cantidad,
				"puntos" 	=> $item->puntos,
				"costo" 	=> $item->costo,
				"descuento" 	=> $item->descuento,
				"tipo_descuento" 	=> $item->tipo_descuento,
				"total" => $valor*$item->cantidad
		);
		$this->db->insert("pos_venta_historial",$dato_venta);
	}

	
	function calcularPrecio($item) {
		$percent = ($item->unidad*$item->descuento)/100;
		$percent = ($percent>$item->unidad) ? $item->unidad : $item->unidad-$percent;
			
		$cifra = ($item->descuento>0) ? $item->descuento : $item->unidad;
			
		$valor = ($item->tipo_descuento == '%') ? $percent : $cifra;
		return $valor;
	}

	
	private function insertVentaPOSItem($venta,$item) {
		
		$valor = $this->calcularPrecio($item);
		
		$dato_venta=array(
				"id_venta" 	=> $venta,
				"item"	=> $item->item,
				"cantidad" 	=> $item->cantidad,
				"valor" => $valor*$item->cantidad,
				"puntos" => $item->puntos
		);
		$this->db->insert("pos_venta_item",$dato_venta);
		return $this->db->insert_id();
	}

	
	private function insertVentaPOS($pago, $venta, $id,$desc,$iva,$temp) {
		
		$puntos = $this->sumaPuntosTemporal ($temp);
		
		$dato_venta=array(
				"id_venta" 	=> $venta,
				"id_user"	=> $id,
				"descuento" 	=> $desc,
				"iva" 	=> $iva,
				"costo" 	=> $pago,
				"puntos" 	=> $puntos
		);
		$this->db->insert("pos_venta",$dato_venta);
		return $this->db->insert_id();
	}
	
	function sumaPuntosTemporal($temp) {
		$q = $this->db->query('select sum(puntos) puntos
								from pos_venta_temporal 
								where id_temporal = "'.$temp.'" 
									and estatus = "ACT"');
		$q = $q->result();
		$puntos = $q ? $q[0]->puntos : 0;
		return $puntos;
	}


	
	private function insertVenta($id) {
		$date = date('Y-m-d h:i:s');
		
		$dato_venta=array(
				"id_user" 			=> $id,
				"id_estatus"		=> 'ACT',
				"id_metodo_pago" 	=> 'CEDI',
				"fecha" 			=> $date
		);
		$this->db->insert("venta",$dato_venta);
		return $this->db->insert_id();
	}

	function getClientes(){
		
		$query = "select 
					    u.*,group_concat(t.nombre) red
					from
					    user_profiles u,
						tipo_red t,
						afiliar a
					where
						t.id = a.id_red	
						and a.id_afiliado = u.user_id
						and u.user_id != 1
						and u.id_tipo_usuario in (2 , 10)
					group by u.user_id";
		$q = $this->db->query($query);
		return $q->result();
	}
	
	function getCliente($id){
	
		$query = "select
					    p.*,t.id id_red,t.nombre red,u.email
					from
					    user_profiles p,
						users u,
						tipo_red t,
						afiliar a
					where
						t.id = a.id_red
						and a.id_afiliado = p.user_id
						and u.id = p.user_id
						and p.user_id != 1
						and p.user_id = ".$id."
						and p.id_tipo_usuario in (2 , 10) 
					group by p.user_id";
		$q = $this->db->query($query);
		return $q->result();
	}
	
	function getClienteBy($id){
	
		$query = "select
					    p.*,/*group_concat(*/t.nombre/*)*/ red,u.email
					from
					    user_profiles p,
						users u,
						tipo_red t,
						afiliar a
					where
						t.id = a.id_red
						and a.id_afiliado = p.user_id
						and u.id = p.user_id
						and p.user_id != 1
						and p.id_tipo_usuario in (2 , 10) 
						and (u.id = '".$id."' ". 
						//"or p.user_id like '".$id."%' ". 
						"or lower(p.nombre) like '".strtolower($id)."%' 
						or lower(p.apellido) like '".strtolower($id)."%')
					group by p.user_id";
		$q = $this->db->query($query);
		return $q->result();
	}
	
	function setImpuesto($id_pais,$neto){
	
		$impuestos = $this->getImpuestosPais($id_pais);
		$impuesto = 0;
		foreach ($impuestos as $valor){
			$impuesto += $valor->porcentaje;
		}
		return ($neto*$impuesto)/100;
	}
	
	private function getImpuestosPais($id_pais){
		$query = "SELECT * FROM cat_impuesto where id_pais='".$id_pais."'";
		$q = $this->db->query($query);
		return  $q->result();
	}
	
}



