<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class inventario extends CI_Controller {
	function __construct() {
		parent::__construct ();
		
		$this->load->helper ( array (
				'form',
				'url' 
		) );
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'security' );
		$this->load->library ( 'tank_auth' );
		$this->lang->load ( 'tank_auth' );
		$this->load->model ( 'bo/modelo_dashboard' );
		$this->load->model ( 'bo/general' );
		$this->load->model ( 'bo/modelo_cedi' );
		$this->load->model ( 'bo/model_inventario' );
		$this->load->model('bo/model_admin');
		$this->load->model('bo/model_mercancia');
	}
	function index() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		
		$style = $this->modelo_dashboard->get_style ( 1 );
		$this->template->set ( "type", $usuario [0]->id_tipo_usuario );
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		$this->template->set_partial ( 'header', 'website/bo/header' );
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/inventario/index' );
	}
	// /Documento///
	function documento() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		
		$style = $this->modelo_dashboard->get_style ( 1 );
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		
		if($type==8||$type==9){
			$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
		
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/documento/index' );
	}
	function documentoAlta() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		$style = $this->modelo_dashboard->get_style ( 1 );
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		
		if($type==8||$type==9){
			$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/documento/altadocumento' );
	}
	function nuevoDocumento() {
		if ($_POST ['nombre'] != null) {
			$this->model_inventario->setDocumento ();
			redirect ( '/bo/inventario/listarDocumento' );
		} else {
			$error = "Digite el nombre de documento";
			$this->session->set_flashdata ( 'error', $error );
			redirect ( '/bo/inventario/documentoAlta' );
		}
	}
	function listarDocumento() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		
		$documento = $this->model_inventario->getAlldocumento ();
		$style = $this->modelo_dashboard->get_style ( 1 );
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		
		$this->template->set ( "documento", $documento );
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		
		if($type==8||$type==9){
			$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/documento/listardocumento' );
	}
	function cambiar_estado_documento() {
		$this->model_inventario->updateEstatusdocumento ();
	}
	function killDocumento() {
		$this->model_inventario->kill_Documento ();
		echo "Documento eliminado con Exito";
	}
	function editar_documento() {
		$datosDocumento = $this->model_inventario->getDocumento ( $_POST ['id'] );
		$id = $this->tank_auth->get_user_id ();
		$style = $this->general->get_style ( 1 );
		
		$this->template->set ( "datosDocumento", $datosDocumento );
		$this->template->build ( 'website/bo/logistico2/documento/editardocumento' );
	}
	function update_documento() {
		if ($_POST ['nombre'] != null) {
			$this->model_inventario->update_Documento ();
			redirect ( '/bo/inventario/listarDocumento' );
		} else {
			$error = "Digite el nombre de documento";
			$this->session->set_flashdata ( 'error', $error );
			redirect ( '/bo/inventario/listarDocumento' );
		}
	}
	// //Inventario///
	function entradaInventario() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
		
		if ($this->general->isAValidUser ( $id, "comercial" ) || $this->general->isAValidUser ( $id, "logistica" )) {
		} else {
			redirect ( '/auth/logout' );
		}
		$style = $this->modelo_dashboard->get_style ( 1 );
		$this->template->set ( "type", $usuario [0]->id_tipo_usuario );
		
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		$this->template->set_partial ( 'header', 'website/bo/header' );
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/inventario/indexentrada' );
	}
	function bloqueo() {
		redirect('/bo/inventario');
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
		
		if ($this->general->isAValidUser ( $id, "comercial" ) || $this->general->isAValidUser ( $id, "logistica" )) {
		} else {
			redirect ( '/auth/logout' );
		}
		$style = $this->modelo_dashboard->get_style ( 1 );
		$this->template->set ( "type", $usuario [0]->id_tipo_usuario );
		
		$cedis = $this->modelo_cedi->all ();
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		$this->template->set ( "cedis", $cedis );
		
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		$this->template->set_partial ( 'header', 'website/bo/header' );
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/inventario/bloqueo' );
	}
	function mercanciaDeCedis() {
		$cedis = $this->modelo_cedi->get_mercancia_cedi ( $_POST ['id_cedi'] );
		echo json_encode ( $cedis );
	}
	function cant_disp_y_bloq_cedi() {
		$cedis = $this->modelo_cedi->get_cant_disp_y_bloq_cedi ( $_POST ['id_prod'], $_POST ['id_cedi'] );
		echo json_encode ( $cedis );
	}
	function bloquear() {
		if ($_POST ['bloqueados'] < $_POST ['disponible']) {
			$this->model_inventario->update_bloqueados ();
			
			$success = "Se ha actualizado el bloqueo del producto en el inventario.";
			$this->session->set_flashdata ( 'success', $success );
			redirect ( '/bo/inventario/bloqueo' );
		} else {
			$error = "La cantidad de productos que vaya ha bloquear debe ser menor que la disponible.";
			$this->session->set_flashdata ( 'error', $error );
			redirect ( '/bo/inventario/bloqueo' );
		}
	}
	function entrada() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		$style = $this->modelo_dashboard->get_style ( 1 );
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		$productos = $this->model_inventario->getProductos ();
		$documento = $this->model_inventario->getAlldocumento ();
		$almacenesCedi = $this->model_inventario->getAlmacenesCedi ();
		
		$this->template->set ( "productos", $productos );
		$this->template->set ( "documento", $documento );
		$this->template->set ( "almacenesCedi", $almacenesCedi );
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		
		if($type==8||$type==9){
			$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
		
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/inventario/entrada_alta' );
	}
	
	function tipoAlmacen() {
		$almacen = ($_POST ['tipo']=='P') ? 
		$this->model_inventario->Obtener_Proveedor ( $_POST ['tipo'] ) :
		$this->model_inventario->Obtener_Almacen ( $_POST ['tipo'] );
		echo json_encode ( $almacen );
	}
	
	function productos_en_Almacen() {
		$productos = $this->model_inventario->Obtener_Productos_Almacen ( $_POST ['almacen'] );
		echo json_encode ( $productos );
	}
	
	function new_entrada() {
		
		$origen_in = $_POST ['origen_in'];
		$origen = $_POST ['origen'];		
		
		if (isset($origen_in) || isset($origen)) {
			$id_inventario = 0;
			
			$mercancia_in = $_POST ['mercancia_in'];
			$destino_in = $_POST ['destino_in'];
			
			$existe_en_inventario = $this->model_inventario->consultar_en_inventario ( $mercancia_in, $destino_in );
			$existe_traspaso = $this->model_inventario->consultar_en_inventario ( $mercancia_in, $origen );
			
			$cantidad_in = $_POST ['cantidad_in'];			
			
			if (count($existe_traspaso)>0) {
				$existeCantidad = $existe_traspaso [0]->cantidad;
				if ($cantidad_in <= $existeCantidad) {
					$this->inventarioExistente ( $existe_traspaso , -$cantidad_in );
				}else{
					echo "Digite una cantidad Menor a : ".$existeCantidad;
					exit();
				}					
			}
			
			if (count($existe_en_inventario)>0) {
				$existeID = $this->inventarioExistente ( $existe_en_inventario , $cantidad_in );
				$id_inventario = $existeID;				
			} else {				
				$datos_inventario = array (
						
						"id_almacen" => $destino_in,
						"id_mercancia" => $mercancia_in,
						"cantidad" => $cantidad_in,
						"bloqueados" => "0",
						"estatus" => 'ACT' 
				);
				
				$id_inventario = $this->model_inventario->ingresar_inventario ( $datos_inventario );
			}						
			
			$documento = $_POST ['documento'];
			$n_documento = $_POST ['n_documento'];
			
			$datos = $this->setDatosHistorialEntrada ( $origen_in, $origen, $id_inventario, $mercancia_in, $destino_in, $cantidad_in, $documento, $n_documento );
			
			$this->model_inventario->ingresar_inventario_historial ( $datos );
			
			echo "la entrada a sido registrada";
			
		} else {
			
			echo "Complete los datos del formulario";
			//$error = "Complete los datos del formulario";
			//$this->session->set_flashdata ( 'error', $error );
			//redirect ( '/bo/inventario/inventarioEntradaAlta' );
		}
		//redirect ( '/bo/inventario/index' );
	}
	
	private function inventarioExistente($existente,$cantidad) {
		$existeCantidad = $existente[0]->cantidad;
		$datos = array (
				"cantidad" => $cantidad + $existeCantidad 
		);
		$existeID = $existente[0]->id_inventario;
		$this->db->where ( 'id_inventario', $existeID );
		$this->db->update ( 'inventario', $datos );
		return $existeID;
	}

	 
	private function setDatosHistorialEntrada($origen_in, $origen, $id_inventario, $mercancia_in, $destino_in, $cantidad_in, $documento, $n_documento) {
		if ($origen_in != null) {
			$datos = array (
					
					"id_origen" => '0',
					"id_destino" => $destino_in,
					"id_documento" => $documento,
					"cantidad" => $cantidad_in,
					"id_mercancia" => $mercancia_in,
					"otro_origen" => $origen_in,
					"n_documento" => $n_documento,
					"id_inventario" => $id_inventario,
					"tipo" => 'E' 
			);
		} else {
			$datos = array (
					
					"id_origen" => $origen,
					"id_destino" => $destino_in,
					"id_documento" => $documento,
					"cantidad" => $cantidad_in,
					"id_mercancia" => $mercancia_in,
					"otro_origen" => '0',
					"n_documento" => $n_documento,
					"id_inventario" => $id_inventario,
					"tipo" => 'E' 
			);
		}
		return $datos;
	}

	function salida() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		
		$style = $this->modelo_dashboard->get_style ( 1 );
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		$productos = $this->model_inventario->getProductos_en_inventario ();
		$documento = $this->model_inventario->getAlldocumento ();
		$almacenesCedi = $this->model_inventario->getAlmacen_en_inventario ();
		
		$this->template->set ( "productos", $productos );
		$this->template->set ( "documento", $documento );
		$this->template->set ( "almacenesCedi", $almacenesCedi );
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		
		if($type==8||$type==9){
			$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
		
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/inventario/salida_alta' );
	}
	function new_salida() {
		
		$destino_in = $_POST ['destino_in'];
		$destino = $_POST ['destino'];
		$documento = $_POST ['documento'];
		$mercancia_in = $_POST ['mercancia_in'];
		$n_documento = $_POST ['n_documento'];
		
		$cantidad_in = $_POST ['cantidad_in'];
		if (! ($destino_in == null) || 
				! ($destino == null) &&
				(! ($documento == null) &&
						! ($mercancia_in == null) &&
						! ($cantidad_in == null) &&
						! ($n_documento == null)
				)
			) {
					
			$id_inventario = 0;
			
			$origen = $_POST ['origen_in'];
			
			$existe_en_inventario = $this->model_inventario->consultar_en_inventario ( $mercancia_in, $origen );
			$existe_traspaso = $this->model_inventario->consultar_en_inventario ( $mercancia_in, $destino );
			
			if (count($existe_en_inventario)>0) {
				$existeCantidad = $existe_en_inventario [0]->cantidad;
				if ($cantidad_in <= $existeCantidad) {
					$existeID = $this->inventarioExistente ( $existe_en_inventario , -$cantidad_in );
					$id_inventario = $existeID;
				}else{
					echo "Digite una cantidad Menor a : ".$existeCantidad;
					exit();
				}
			} 
			
			if (count($existe_traspaso)>0) {
				$this->inventarioExistente ( $existe_traspaso , $cantidad_in );
			}
			
			$datos = $this->setDatosHistorialSalida ( $destino_in, $destino, $documento, $mercancia_in, $n_documento, $cantidad_in, $id_inventario, $origen );
			
			$this->model_inventario->ingresar_inventario_historial ( $datos );
			
			echo ($id_inventario>0) ? "la salida a sido registrada" : "El Origen no posee inventario de esta mercancia.";
			
		} else {
			
			echo "Complete los datos del formulario";
			//$error = "Complete los datos de formulario";
			//$this->session->set_flashdata ( 'error', $error );
			//redirect ( '/bo/inventario/inventarioEntradaAlta' );
		}
		
		//redirect ( '/bo/inventario/index' );
	}
	

	private function setDatosHistorialSalida($destino_in, $destino, $documento, $mercancia_in, $n_documento, $cantidad_in, $id_inventario, $origen) {
		if ($destino_in != null) {
			$datos = array (
					
					"id_origen" => $origen,
					"id_destino" => '0',
					"id_documento" => $documento,
					"cantidad" => $cantidad_in,
					"id_mercancia" => $mercancia_in,
					"otro_origen" => $destino_in,
					"n_documento" => $n_documento,
					"id_inventario" => $id_inventario,
					"tipo" => 'S' 
			);
		} else {
			$datos = array (
					
					"id_origen" => $origen,
					"id_destino" => $destino,
					"id_documento" => $documento,
					"cantidad" => $cantidad_in,
					"id_mercancia" => $mercancia_in,
					"otro_origen" => '0',
					"n_documento" => $n_documento,
					"id_inventario" => $id_inventario,
					"tipo" => 'S' 
			);
		}
		
		return $datos;
	}

	function historial() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		$style = $this->general->get_style ( $id );
		$this->template->set ( "style", $style );
		$this->template->set ( "usuario", $usuario );
		$type = $usuario[0]->id_tipo_usuario;
	$this->template->set("type",$type);
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		
		if($type==8||$type==9){
			$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
		
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/inventario/historial_inventario' );
	}
	function historial_entrada() {
		$id = $this->tank_auth->get_user_id ();
		$data = $_GET ["info"];
		$data = json_decode ( $data, true );
		$Entradas = $this->model_inventario->historial_entradas ( $data ['inicio'], $data ['fin'], 'E' );
		$Cedis = $this->model_inventario->getAlmacenesCediProveedores ();
		$Documento = $this->model_inventario->getAlldocumento ();
		$Producto = $this->model_inventario->getProductos ();
		
		$this->template->set ( "Entradas", $Entradas );
		$this->template->set ( "Documento", $Documento );
		$this->template->set ( "Producto", $Producto );
		$this->template->set ( "Cedis", $Cedis );
		$this->template->set_theme ( 'desktop' );
		$this->template->build ( 'website/bo/logistico2/inventario/historial_detalles_entrada' );
	}
	function historial_salida() {
		$id = $this->tank_auth->get_user_id ();
		$data = $_GET ["info"];
		$data = json_decode ( $data, true );
		$Entradas = $this->model_inventario->historial_entradas ( $data ['inicio'], $data ['fin'], 'S' );
		$Cedis = $this->model_inventario->getAlmacenesCedi ();
		$Documento = $this->model_inventario->getAlldocumento ();
		$Producto = $this->model_inventario->getProductos ();
		
		$this->template->set ( "Entradas", $Entradas );
		$this->template->set ( "Documento", $Documento );
		$this->template->set ( "Producto", $Producto );
		$this->template->set ( "Cedis", $Cedis );
		$this->template->set_theme ( 'desktop' );
		$this->template->build ( 'website/bo/logistico2/inventario/historial_detalles_entrada' );
	}
	function historial_entrada_salida() {
		$id = $this->tank_auth->get_user_id ();
		$data = $_GET ["info"];
		$data = json_decode ( $data, true );
		$Entradas = $this->model_inventario->historial_entradas_salida ( $data ['inicio'], $data ['fin'] );
		$Cedis = $this->model_inventario->getAlmacenesCediProveedores ();
		$Documento = $this->model_inventario->getAlldocumento ();
		$Producto = $this->model_inventario->getProductos ();
		
		$this->template->set ( "Entradas", $Entradas );
		$this->template->set ( "Documento", $Documento );
		$this->template->set ( "Producto", $Producto );
		$this->template->set ( "Cedis", $Cedis );
		$this->template->set_theme ( 'desktop' );
		$this->template->build ( 'website/bo/logistico2/inventario/historial_entrada_salida' );
	}
	function altaMovimiento() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
	
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		$style = $this->modelo_dashboard->get_style ( 1 );
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
	
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		if($type==8||$type==9){
			$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/movimiento/alta' );
	}
	function nuevoMovimiento() {
		if ($_POST ['nombre'] != null) {
			$this->model_inventario->setMovimiento ();
			redirect ( '/bo/inventario/listarMovimiento' );
		} else {
			$error = "Digite el nombre de documento";
			$this->session->set_flashdata ( 'error', $error );
			redirect ( '/bo/inventario/altaMovimiento' );
		}
	}
	function listarMovimiento() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
	
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		$documento = $this->model_inventario->getMovimientos();
		$style = $this->modelo_dashboard->get_style ( 1 );
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
	
		$this->template->set ( "documento", $documento );
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		if($type==8||$type==9){
			$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/logistico2/movimiento/listar' );
	}
	
	function estadoMovimiento() {
		$this->model_inventario->statusMovimiento ();
	}
	
	function killMovimiento() {
		$this->model_inventario->killMovimiento ();
		echo "Documento eliminado con Exito";
	}
	
	function editarMovimiento() {
		$datosDocumento = $this->model_inventario->getMovimiento ( $_POST ['id'] );
		$id = $this->tank_auth->get_user_id ();
		$style = $this->general->get_style ( 1 );
	
		$this->template->set ( "datosDocumento", $datosDocumento );
		$this->template->build ( 'website/bo/logistico2/movimiento/editar' );
	}
	
	function updateMovimiento() {
		if ($_POST ['nombre'] != null) {
			$this->model_inventario->updateMovimiento ();
			redirect ( '/bo/inventario/listarMovimiento' );
		} else {
			$error = "Digite el nombre de documento";
			$this->session->set_flashdata ( 'error', $error );
			redirect ( '/bo/inventario/listarMovimiento' );
		}
	}
	
	function productos(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
	
		$usuario=$this->general->get_username($id);
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$grupos1         = $this->model_mercancia->todogrupos();
		$proveedores	 = $this->model_admin->get_proveedor();
		$grupo			 = $this->model_admin->get_grupo();
		$impuesto		 = $this->model_admin->get_impuesto();
		$tipo_mercancia	 = $this->model_admin->get_tipo_mercancia();
		$tipo_proveedor	 = $this->model_admin->get_tipo_proveedor();
		$empresa	     = $this->model_admin->get_empresa();
		$regimen	     = $this->model_admin->get_regimen();
		$zona	         = $this->model_admin->get_zona();
		$tipo_paquete	 = $this->model_admin->get_tipo_paquete();
		$pais            = $this->model_admin->get_pais();
	
	
		$productos       = $this->model_admin->get_productos();
		//$servicios		 = $this->model_admin->get_servicios();
		//var_dump($servicios);exit();
		//$promo			 = $this->model_admin->get_promo();
		//$combinados		 = $this->model_admin->get_combinados();
		//$paquete		 = $this->model_admin->get_paquetes();
		//$membresias      = $this->model_admin->get_membresias();
		$imp_merc=$this->model_admin->impuestos_por_mercancia();
	
		$this->template->set("imp_merc",$imp_merc);
		$this->template->set("pais",$pais);
		$this->template->set("productos",$productos);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("proveedores",$proveedores);
		//$this->template->set("promo",$promo);
		$this->template->set("grupo",$grupo);
		//$this->template->set("servicios",$servicios);
		//		$this->template->set("producto",$producto);
		//$this->template->set("combinados",$combinados);
		$this->template->set("impuesto",$impuesto);
		$this->template->set("tipo_mercancia",$tipo_mercancia);
		$this->template->set("tipo_proveedor",$tipo_proveedor);
		$this->template->set("empresa",$empresa);
		$this->template->set("regimen",$regimen);
		$this->template->set("zona",$zona);
		$this->template->set("tipo_paquete",$tipo_paquete);
		//$this->template->set("paquetes",$paquete);
		//$this->template->set("membresias",$membresias );
		$this->template->set("grupos1",$grupos1 );
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		
		if($type==8||$type==9){
			$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/producto/listar');
	}
	
}