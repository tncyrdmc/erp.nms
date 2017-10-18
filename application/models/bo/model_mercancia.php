<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class model_mercancia extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	
	
	function TiposMercancia() {
		$categorias = $this->db->query ( "select * from cat_tipo_mercancia where estatus = 'ACT' " );
		return $categorias->result ();
	}
	
	function CategoriasMercancia() {
		$categorias = $this->db->query ( "SELECT ctg.id_grupo, ctg.descripcion, tr.nombre as red  FROM cat_grupo_producto ctg, tipo_red tr where ctg.id_red = tr.id and ctg.estatus = 'ACT' and tr.estatus = 'ACT' " );
		return $categorias->result ();
	}
	
	function CategoriasMercanciaIdRed($id_red) { 
		$categorias = $this->db->query ( "SELECT ctg.id_grupo, ctg.descripcion, tr.nombre as red  FROM cat_grupo_producto ctg, tipo_red tr where ctg.id_red = tr.id and ctg.estatus = 'ACT' and tr.estatus = 'ACT' and tr.id = '".$id_red."'" );
		return $categorias->result ();
	}
	
	function CategoriaMercancia($id) {
		$categorias = $this->db->query ( "SELECT ctg.id_grupo, ctg.descripcion, tr.nombre as red  FROM cat_grupo_producto ctg, tipo_red tr where ctg.id_red = tr.id and ctg.estatus = 'ACT' and ctg.id_grupo =".$id);
		return $categorias->result ();
	}

	function todogrupos(){
		$categorias = $this->db->query ( "SELECT * FROM cat_grupo_producto WHERE estatus='ACT'");
		return $categorias->result ();

	}
	
	function nuevo_servicio() {
		$dato_servicio = array (
				"nombre" => $_POST ['nombre'],
				"concepto" => $_POST ['concepto'],
				"descripcion" => $_POST ['descripcion'],
				"fecha_inicio" => $_POST ['fecha_inicio'],
				"fecha_fin" => $_POST ['fecha_fin'],
				"id_red" => $_POST ['red'] 
		);
		$this->db->insert ( "servicio", $dato_servicio );
		
		$sku = $this->db->insert_id ();
		
		$nombre_ini = substr ( $_POST ['nombre'], 0, 3 );
		$iva=$this->validar_iva();
		$sku_2 = $nombre_ini . $sku . $_POST ['tipo_mercancia'];
		
		$mercancia = $this->CrearMercancia ( $sku, $sku_2, $_POST ['tipo_mercancia'], $_POST ['pais'], $_POST ['proveedor'], $_POST ['real'], $_POST ['costo'], $_POST ['entrega'], $_POST ['costo_publico'], $_POST ['puntos_com'], $iva, $_POST['descuento'] );
		$this->ingresarimpuestos ( $_POST ['id_impuesto'], $mercancia );
		return $mercancia;
	}
	function nueva_membresia(){
			$dato_membresia = array (
				"nombre" => $_POST ['nombre'],
				"caducidad" => $_POST['caducidad'],
				"descripcion" => $_POST ['descripcion'],
				"id_red" => $_POST ['red'] 
		);
		$this->db->insert ( "membresia", $dato_membresia );
		
		$sku = $this->db->insert_id ();
		
		$nombre_ini = substr ( $_POST ['nombre'], 0, 3 );
		$iva=$this->validar_iva();
		$sku_2 = $nombre_ini . $sku . $_POST ['tipo_mercancia'];
		
		$mercancia = $this->CrearMercancia ( $sku, $sku_2, $_POST ['tipo_mercancia'], $_POST ['pais'], 0, 0, $_POST ['costo'], '0', 0, $_POST ['puntos_com'], $iva, $_POST['descuento'] );
		$this->ingresarimpuestos ( $_POST ['id_impuesto'], $mercancia );
		return $mercancia;	
	}
	function nuevo_producto() {
		
		$dato_producto = array (
				"nombre" => $_POST ['nombre'],
				"concepto" => $_POST ['concepto'],
				"descripcion" => $_POST ['descripcion'],
				"peso" => $_POST ['peso'],
				"alto" => $_POST ['alto'],
				"ancho" => $_POST ['ancho'],
				"id_grupo" => $_POST ['red'],
				"profundidad" => $_POST ['profundidad'],
				"diametro" => $_POST ['diametro'],
				"marca" => $_POST ['marca'],
				"codigo_barras" => $_POST ['codigo_barras'],
				"min_venta" => $_POST ['min_venta'],
				"max_venta" => $_POST ['max_venta'],
				"instalacion" => $_POST ['instalacion'],
				"especificacion" => $_POST ['especificacion'],
				"produccion" => $_POST ['produccion'],
				"importacion" => $_POST ['importacion'],
				"sobrepedido" => $_POST ['sobrepedido'],
				"inventario" => $_POST ['inventario'] 
		);
		$this->db->insert ( "producto", $dato_producto );
		
		$sku = $this->db->insert_id ();
		
		$nombre_ini = substr ( $_POST ['nombre'], 0, 3 );
		
		$sku_2 = $nombre_ini . $sku . $_POST ['tipo_mercancia'];
		$iva=$this->validar_iva();
		$mercancia = $this->CrearMercancia ( $sku, $sku_2, $_POST ['tipo_mercancia'], $_POST ['pais'], $_POST ['proveedor'], $_POST ['real'], $_POST ['costo'], $_POST ['entrega'], $_POST ['costo_publico'], $_POST ['puntos_com'], $iva, $_POST['descuento'] );
		$this->ingresarimpuestos ( $_POST ['id_impuesto'], $mercancia );
		return $mercancia;
	}
	function validar_iva(){
		if($_POST['iva']=='1'){
			return 'CON';
		}elseif($_POST['iva']=='0'){
			return 'MAS';
		}
	}
	function nuevo_combinado() {
		$dato_combinado = array (
				"nombre" => $_POST ['nombre'],
				"descripcion" => $_POST ['descripcion'],
				"descuento" => $_POST ['descuento'],
				"estatus" => 'ACT',
				"id_red" => $_POST ['red'] 
		);
		$this->db->insert ( "combinado", $dato_combinado );
		
		$combinado = $this->db->insert_id ();
		$n = 0;
		
		if (! isset ( $_POST ['n_productos'] ))
			$_POST ['n_productos'] = 0;
		if (! isset ( $_POST ['n_servicios'] ))
			$_POST ['n_servicios'] = 0;
		$productos = $_POST ['producto'];
		$servicios = $_POST ['servicio'];
		$n_productos = $_POST ['n_productos'];
		$n_servicios = $_POST ['n_servicios'];
		$producto = sizeof ( $_POST ['producto'] );
		$servicio = sizeof ( $_POST ['servicio'] );
		if (isset ( $_POST ['producto'] )){
		foreach ( $productos as $key ) {
			if($n_productos [$n]!=""){
					$dato_cross_combinado = array (
							"id_combinado" => $combinado,
							"id_mercancia" => $key,
							"cantidad" => $n_productos [$n],
							"id_red" => $_POST ['red'],
							"id_tipo_mercancia" => '1',
					);
					$this->db->insert ( "cross_combinado", $dato_cross_combinado );
					
				}else{
					$dato_cross_combinado = array (
							"id_combinado" => $combinado,
							"id_mercancia" => $key,
							"cantidad" => '0',
							"id_red" => $_POST ['red'],
							"id_tipo_mercancia" => '1'
					);
					$this->db->insert ( "cross_combinado", $dato_cross_combinado );
				}
				$n ++;
			}
			}
				$n = 0;
				if (isset ( $_POST ['servicio'] )){
				foreach ( $servicios as $key ) {
					if($n_servicios [$n]!=""){
					$dato_cross_combinado = array (
							"id_combinado" => $combinado,
							"id_mercancia" => $key,
							"cantidad" => $n_servicios [$n],
							"id_red" => $_POST ['red'],
							"id_tipo_mercancia" => '2'
					);
					$this->db->insert ( "cross_combinado", $dato_cross_combinado );
					}else{
					$dato_cross_combinado = array (
							"id_combinado" => $combinado,
							"id_mercancia" => $key,
							"cantidad" => '0',
							"id_red" => $_POST ['red'],
							"id_tipo_mercancia" => '2'
					);
					$this->db->insert ( "cross_combinado", $dato_cross_combinado );
					}
					$n ++;
				}
			}

		
		/*if ($producto < $servicio) {
			if ($n_productos [0] == 0) {
				foreach ( $servicios as $key ) {
					$dato_cross_combinado = array (
							"id_combinado" => $combinado,
							"id_servicio" => $key,
							"cantidad_servicio" => $n_servicios [$n] 
					);
					$this->db->insert ( "cross_combinado", $dato_cross_combinado );
					$n ++;
				}
			} else {
				foreach ( $servicios as $key ) {
					if ($n > $producto) {
						$productos [$n] = '';
						$n_productos [$n] = '';
					}
					$dato_cross_combinado = array (
							"id_combinado" => $combinado,
							"id_producto" => $productos [$n],
							"id_servicio" => $key,
							"cantidad_producto" => $n_productos [$n],
							"cantidad_servicio" => $n_servicios [$n] 
					);
					$this->db->insert ( "cross_combinado", $dato_cross_combinado );
					$n ++;
				}
			}
		}
		if ($producto > $servicio) {
			if ($n_servicios [0] == 0) {
				foreach ( $productos as $key ) {
					$dato_cross_combinado = array (
							"id_combinado" => $combinado,
							"id_producto" => $key,
							"cantidad_producto" => $n_productos [$n] 
					);
					$this->db->insert ( "cross_combinado", $dato_cross_combinado );
					$n ++;
				}
			} else {
				foreach ( $productos as $key ) {
					if ($n > $servicio) {
						$servicio [$n] = '';
						$n_servicios [$n] = '';
					}
					$dato_cross_combinado = array (
							"id_combinado" => $combinado,
							"id_producto" => $key,
							"id_servicio" => $servicios [$n],
							"cantidad_producto" => $n_productos [$n],
							"cantidad_servicio" => $n_servicios [$n] 
					);
					$this->db->insert ( "cross_combinado", $dato_cross_combinado );
					$n ++;
				}
			}
		}
		if ($producto == $servicio) {
			foreach ( $_POST ['producto'] as $key ) {
				$dato_cross_combinado = array (
						"id_combinado" => $combinado,
						"id_producto" => $key,
						"id_servicio" => $servicios [$n],
						"cantidad_producto" => $n_productos [$n],
						"cantidad_servicio" => $n_servicios [$n] 
				);
				$this->db->insert ( "cross_combinado", $dato_cross_combinado );
				$n ++;
			}
		}*/
		
		$sku = $combinado;
		
		$nombre_ini = substr ( $_POST ['nombre'], 0, 3 );
		//$iva=$this->validar_iva();
		$sku_2 = $nombre_ini . $sku . $_POST ['tipo_mercancia'];
		$iva=$this->validar_iva();
		$mercancia = $this->CrearMercancia ( $sku, $sku_2, $_POST ['tipo_mercancia'], $_POST ['pais'], 0, $_POST ['real'], $_POST ['costo'], $_POST ['entrega'], $_POST ['costo_publico'], $_POST ['puntos_com'],$iva, $_POST['descuento'] );
		$this->ingresarimpuestos ( $_POST ['id_impuesto'], $mercancia );
		return $mercancia;
	}
	
	function nuevo_paquete() {
		$dato_paquete = array (
				"nombre" => $_POST ['nombre'],
				"descripcion" => $_POST ['descripcion'],
				"precio" => $_POST ['costo'],
				"puntos" => $_POST ['puntos_com'],
				"estatus" => 'ACT',
				"id_red" => $_POST ['red'],
				"tipo" => $_POST['tipo'],
				"caducidad" => $_POST['caducidad']
		);
		$this->db->insert ( "paquete_inscripcion", $dato_paquete );
	
		$paquete = $this->db->insert_id ();
		$n = 0;
	
		if (! isset ( $_POST ['n_productos'] ))
			$_POST ['n_productos'] = 0;
		if (! isset ( $_POST ['n_servicios'] ))
			$_POST ['n_servicios'] = 0;
		$productos = $_POST ['producto'];
		$servicios = $_POST ['servicio'];
		$n_productos = $_POST ['n_productos'];
		$n_servicios = $_POST ['n_servicios'];
		$producto = sizeof ( $_POST ['producto'] );
		$servicio = sizeof ( $_POST ['servicio'] );

		if (isset ( $_POST ['producto'] )){
		foreach ( $productos as $key ) {
			if($n_productos [$n]!=""){
					$dato_cross_paquete = array (
							"id_paquete" => $paquete,
							"id_mercancia" => $key,
							"cantidad" => $n_productos [$n],
							"id_red" => $_POST ['red'],
							"id_tipo_mercancia" => '1',
					);
					$this->db->insert ( "cross_paquete", $dato_cross_paquete );
					
				}else{
					$dato_cross_paquete = array (
							"id_paquete" => $paquete,
							"id_mercancia" => $key,
							"cantidad" => $n_productos [$n],
							"id_red" => $_POST ['red'],
							"id_tipo_mercancia" => '1',
					);
					$this->db->insert ( "cross_paquete", $dato_cross_paquete );
				}
				$n ++;
			}
			}
				$n = 0;
				if (isset ( $_POST ['servicio'] )){
				foreach ( $servicios as $key ) {
					if($n_servicios [$n]!=""){
					$dato_cross_paquete = array (
							"id_paquete" => $paquete,
							"id_mercancia" => $key,
							"cantidad" => $n_servicios [$n],
							"id_red" => $_POST ['red'],
							"id_tipo_mercancia" => '2'
					);
					$this->db->insert ( "cross_paquete", $dato_cross_paquete );
					}else{
					$dato_cross_paquete = array (
							"id_paquete" => $paquete,
							"id_mercancia" => $key,
							"cantidad" => $n_servicios [$n],
							"id_red" => $_POST ['red'],
							"id_tipo_mercancia" => '2'
					);
					$this->db->insert ( "cross_paquete", $dato_cross_paquete );
					}
					$n ++;
				}
			}
	
		/*if ($producto < $servicio) {
			if ($n_productos [0] == 0) {
				foreach ( $servicios as $key ) {
					$dato_cross_combinado = array (
							"id_paquete" => $paquete,
							"id_servicio" => $key,
							"cantidad_servicio" => $n_servicios [$n]
					);
					$this->db->insert ( "cross_paquete", $dato_cross_combinado );
					$n ++;
				}
			} else {
				foreach ( $servicios as $key ) {
					if ($n > $producto) {
						$productos [$n] = '';
						$n_productos [$n] = '';
					}
					$dato_cross_combinado = array (
							"id_paquete" => $paquete,
							"id_producto" => $productos [$n],
							"id_servicio" => $key,
							"cantidad_producto" => $n_productos [$n],
							"cantidad_servicio" => $n_servicios [$n]
					);
					$this->db->insert ( "cross_paquete", $dato_cross_combinado );
					$n ++;
				}
			}
		}
		if ($producto > $servicio) {
			if ($n_servicios [0] == 0) {
				foreach ( $productos as $key ) {
					$dato_cross_combinado = array (
							"id_paquete" => $paquete,
							"id_producto" => $key,
							"cantidad_producto" => $n_productos [$n]
					);
					$this->db->insert ( "cross_paquete", $dato_cross_combinado );
					$n ++;
				}
			} else {
				foreach ( $productos as $key ) {
					if ($n > $servicio) {
						$servicio [$n] = '';
						$n_servicios [$n] = '';
					}
					$dato_cross_combinado = array (
							"id_paquete" => $paquete,
							"id_producto" => $key,
							"id_servicio" => $servicios [$n],
							"cantidad_producto" => $n_productos [$n],
							"cantidad_servicio" => $n_servicios [$n]
					);
					$this->db->insert ( "cross_paquete", $dato_cross_combinado );
					$n ++;
				}
			}
		}
		if ($producto == $servicio) {
			foreach ( $_POST ['producto'] as $key ) {
				$dato_cross_combinado = array (
						"id_paquete" => $paquete,
						"id_producto" => $key,
						"id_servicio" => $servicios [$n],
						"cantidad_producto" => $n_productos [$n],
						"cantidad_servicio" => $n_servicios [$n]
				);
				$this->db->insert ( "cross_paquete", $dato_cross_combinado );
				$n ++;
			}
		}*/
	
		$sku = $paquete;
	
		$nombre_ini = substr ( $_POST ['nombre'], 0, 3 );
	
		$sku_2 = $nombre_ini . $sku . $_POST ['tipo_mercancia'];
		$iva=$this->validar_iva();
		$mercancia = $this->CrearMercancia ( $sku, $sku_2, $_POST ['tipo_mercancia'], $_POST ['pais'], 0, $_POST ['real'], $_POST ['costo'], $_POST ['entrega'], $_POST ['costo_publico'], $_POST ['puntos_com'], $iva, $_POST['descuento'] );
		$this->ingresarimpuestos ( $_POST ['id_impuesto'], $mercancia );
		return $mercancia;
	}
	
	function CrearMercancia($sku, $sku2, $tipo, $pais, $proveedor, $real, $costo, $entrega, $costo_prublico, $puntos,$iva,$descuento) {
		
		$dato_mercancia = array (
				"sku" => $sku,
				"sku_2" => $sku2,
				"id_tipo_mercancia" => $tipo,
				"estatus" => 'ACT',
				"pais" => $pais,
				"id_proveedor" => $proveedor,
				"real" => $real,
				"costo" => $costo,
				"entrega" => $entrega,
				"costo_publico" => $costo_prublico,
				"puntos_comisionables" => $puntos,
				"iva" => $iva,
				"descuento" => $descuento 
		);
		$this->db->insert ( "mercancia", $dato_mercancia );
		return $this->db->insert_id ();
	}
	
	function ingresarimpuestos($impuestos, $mercancia) {
		if (isset($impuestos)){
			foreach ( $impuestos as $impuesto ) {
				$dato_impuesto = array (
						"id_mercancia" => $mercancia,
						"id_impuesto" => $impuesto 
				);
				
				$this->db->insert ( "cross_merc_impuesto", $dato_impuesto );
			}
		}
	}
	function img_merc($id, $data) {
		/*foreach ( $data as $key ) {
			$explode = explode ( ".", $key ["file_name"] );
			$nombre = $explode [0];
			$extencion = $explode [1];
			$dato_img = array (
					"url" => "/media/carrito/" . $key ["file_name"],
					"nombre_completo" => $key ["file_name"],
					"nombre" => $nombre,
					"extencion" => $extencion,
					"estatus" => "ACT" 
			);*/
			$explode = explode ( ".", $data );
			$nombre = $explode [0];
			$extencion = $explode [1];
			$dato_img = array (
					"url" => "/media/carrito/" . $data,
					"nombre_completo" => $data,
					"nombre" => $nombre,
					"extencion" => $extencion,
					"estatus" => "ACT" 
			);
			$this->db->insert ( "cat_img", $dato_img );
			
			$id_foto = $this->db->insert_id ();
			
			$dato_cross_img = array (
					"id_mercancia" => $id,
					"id_cat_imagen" => $id_foto 
			);
			$this->db->insert ( "cross_merc_img", $dato_cross_img );
		//}
	}


	function img_merc_promo($id, $data) {
		foreach ( $data as $key ) {
			$explode = explode ( ".", $key ["file_name"] );
			$nombre = $explode [0];
			$extencion = $explode [1];
			$dato_img = array (
					"url" => "/media/carrito/" . $key ["file_name"],
					"nombre_completo" => $key ["file_name"],
					"nombre" => $nombre,
					"extencion" => $extencion,
					"estatus" => "ACT" 
			);
			$this->db->insert ( "cat_img", $dato_img );
			$id_foto = $this->db->insert_id ();
			
			$dato_cross_img = array (
					"id_promo" => $id,
					"id_img" => $id_foto 
			);
			$this->db->insert ( "cross_img_promo", $dato_cross_img );
		}
	}
	function ImpuestoPais($pais) {
		$q = $this->db->query ( "SELECT * FROM cat_impuesto where id_pais = '" . $pais . "'" );
		return $q->result ();
	}
	function ProductoPorPais($pais) {
		$q=$this->db->query("Select a.nombre,a.id, b.id id_mercancia from producto a, mercancia b where a.id=b.sku 
			and b.id_tipo_mercancia=1 and b.pais='".$pais."'");
		return $q->result();
	}
	function ServiciosPorPais($pais){
			$q=$this->db->query("Select a.nombre,a.id, b.id id_mercancia from servicio a, mercancia b where a.id=b.sku 
			and b.id_tipo_mercancia=2 and b.pais='".$pais."'");
		return $q->result();

	}
	function ImpuestoPaisPorId($id_impuesto){
		$q = $this->db->query ( "SELECT porcentaje FROM cat_impuesto where id_impuesto = " . $id_impuesto . "" );
		return $q->result ();
	}
	function new_proveedor($id) {
		
		$telefonos = "";
		
		if ($_POST ["fijo"]) {
			foreach ( $_POST ["fijo"] as $fijo ) {
				$telefonos = $telefonos." - ".$fijo;
			}
		}
		if ($_POST ["movil"]) {
			foreach ( $_POST ["movil"] as $movil ) {
				$telefonos = $telefonos." - ".$movil;
			}
		}
		
		if(!isset($_POST['impuesto'])){
			$_POST['impuesto'] = 0;
		}
		$dato_proveedor = array (
				"id_empresa" => $_POST ['empresa'],
				"id_regimen" => $_POST ['regimen'],
				"id_zona" => $_POST ['zona'],
				"mercancia" => $_POST ['tipo_proveedor'],
				"razon_social" => $_POST ['razon'],
				"curp" => $_POST ['curp'],
				"rfc" => $_POST ['rfc'],
				"id_impuesto" => $_POST ['impuesto'],
				"condicion_pago" => $_POST ['condicion_pago'],
				"promedio_entrega" => $_POST ['promedio_entrega'],
				"promedio_entrega_documentacion" => $_POST ['promedio_entrega_documentacion'],
				"plazo_pago" => $_POST ['plazo_pago'],
				"plazo_suspencion" => $_POST ['plazo_suspencion'],
				"plazo_suspencion_firma" => $_POST ['plazo_suspencion_firma'],
				"interes_moratorio" => $_POST ['interes_moratorio'],
				"dia_corte" => $_POST ['dia_corte'],
				"dia_pago" => $_POST ['dia_pago'],
				"credito_autorizado" => $_POST ['credito_autorizado'],
				"credito_suspendido" => $_POST ['credito_suspendido'],
				"estatus" => 'ACT',
		);
		
		
		$this->db->insert("proveedor", $dato_proveedor );
		
		$id_nuevo = $this->db->insert_id();
		
		
		$dato_proveedor = array (
				"id_proveedor" => $id_nuevo,
				"nombre"     => $_POST['nombre'],
				"apellido"     => $_POST['apellido'],
				"pais" => $_POST['pais'],
				"provincia" => $_POST ['municipio'],
				"ciudad" => $_POST ['colonia'],
				"codigo_postal" => $_POST['cp'],
				"comision"     => $_POST['comision'],
				"email"     => $_POST['email'],
				"telefono"     => $telefonos,
				"direccion" => $_POST ['calle']
		);
		
		$this->db->insert("proveedor_datos", $dato_proveedor );
		
		$cuentas = $_POST ['Cuenta'];
		$bancos = $_POST ['banco'];
		for ($i = 0 ; $i < count($cuentas) ; $i++){
			
			$dato_cat_cuenta = array (
					"id_user" => $id_nuevo,
					"cuenta" => $cuentas[$i],
					"banco" => $bancos[$i],
					"estatus" => 'ACT' 
			);
			$this->db->insert ( "cat_cuenta", $dato_cat_cuenta );
		}
		return $id_nuevo;
	}
	function actualizarProveedor(){
		
		$telefonos = "";
		if ($_POST ["telefono"]) {
			foreach ( $_POST ["telefono"] as $fijo ) {
				$telefonos = $telefonos." - ".$fijo;
			}
		}else{
			$telefonos=$telefonos."-";
		}
		
		$datos = array(
				'nombre' => $_POST['nombre'],
				'apellido' => $_POST['apellido'],
				'pais' => $_POST['pais'],
				'telefono' => $telefonos,
				'provincia' => $_POST['provincia'],
				'ciudad' => $_POST['ciudad'],
				'comision' => $_POST['comision'],
				'direccion' => $_POST['direccion'],
				'email' => $_POST['email'],
				'codigo_postal' => $_POST['codigo_postal'],
		);
		$this->db->update("proveedor_datos",$datos,"id_proveedor = ".$_POST['id']);
		$datos2 = array(
				'razon_social' => $_POST['razonsocial'],
				'curp' => $_POST['CURP'],
				'rfc' => $_POST['RFC'],
				'id_regimen' => $_POST['regimen'],
				'id_impuesto' => $_POST['impuesto'],
				'mercancia' => $_POST['tipo_proveedor'],
				'condicion_pago' => $_POST['condicionesdepago'],
				'promedio_entrega' => $_POST['tiempoprimediodeentrega'],
				'promedio_entrega_documentacion' => $_POST['tiempodeentregadedocumentos'],
				'plazo_pago' => $_POST['plazodepago'],
				'plazo_suspencion' => $_POST['plazodesuspencion'],
				'plazo_suspencion_firma' => $_POST['palzodesuspenciondefirma'],
				'interes_moratorio' => $_POST['interesmoratorio'],
				'dia_corte' => $_POST['diadecorte'],
				'id_zona' => $_POST['zona'],
				'dia_pago' => $_POST['diadepago'],
				'id_empresa' => $_POST['empresa'],
				'credito_autorizado' => $_POST['credito_autorizado'],
				'credito_suspendido' => $_POST['credito_suspendido'],
		);
		$this->db->update("proveedor",$datos2,"id_proveedor = ".$_POST['id']);
		
		
		$cuentas = $_POST ['cuenta'];
		$bancos = $_POST ['banco'];
		$id_cuenta = $_POST ['id_cuenta'];
		for ($i = 0 ; $i < count($cuentas) ; $i++){
		
			if($id_cuenta[$i]=='0'){
				$datos3 = array(
						'id_user' => $_POST['id'],
						'cuenta' => $cuentas[$i],
						'banco' =>$bancos[$i] ,
				);
				$this->db->insert ( "cat_cuenta", $datos3 );
			}else{
				$datos3 = array(
						'cuenta' => $cuentas[$i],
						'banco' =>$bancos[$i] ,
				);
				$this->db->update("cat_cuenta",$datos3,"id = ".$id_cuenta[$i]);
			}
		
		
		}
		
		
		echo "Proveedoor actualizado con exito";
	}
	
	function Bancos(){
		$q = $this->db->query("SELECT * FROM cat_banco");
		return $q->result();
	}
	
	function get_proveedor($tipo){
		$q = $this->db->query("select p.id_proveedor as user_id, pd.nombre, pd.apellido from proveedor p, proveedor_datos pd where p.id_proveedor = pd.id_proveedor and mercancia = ".$tipo);
		return $q->result();
	}
	
	function existeProveedor($id){
		$q = $this->db->query("select id_proveedor from proveedor p where p.id_proveedor =  '".$id."'");
		
		$proveedor =  $q->result();
		if(isset($proveedor[0]->id_proveedor)){
			return true;
		}else{
			return false;
		}
	}
	
	function getProductoBy($id,$red) {
		$strID = strtolower($id);
		
		$query = "SELECT
					    m.id id_mercancia, p.*, m.*
					FROM
					    mercancia m,
					    producto p,
					    items i
					WHERE
					    p.id = m.sku AND m.id = i.id
					        AND i.red = '".$red."'
					        AND i.id_tipo_mercancia = 1
					        AND (i.id = '".$id."'
					        OR p.id = '".$id."'
					        OR LOWER(p.codigo_barras) LIKE '".$strID."%'
							OR LOWER(p.concepto) LIKE '".$strID."%'
					        OR LOWER(p.nombre) LIKE '".$strID."%'
					        OR LOWER(m.sku_2) LIKE '".$strID."%')";
		
		$q = $this->db->query ($query);
		return $q->result ();
	}
	
}