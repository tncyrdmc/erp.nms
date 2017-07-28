<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mercancia extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('bo/modelo_dashboard');
		$this->load->model('bo/general');
		$this->load->model('bo/model_mercancia');
		$this->load->model('bo/model_admin');		
		$this->load->model('bo/modelo_comercial');
		$this->load->model('ov/model_perfil_red');
		$this->load->model('model_users');
		$this->load->model('model_tipo_red');
		$this->load->model('model_user_profiles');
		$this->load->model('model_coaplicante');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$Logistica = '';//$this->general->isAValidUser($id,"logistica");
		
		if(!$Comercial&&!$Logistica){
			redirect('/auth/logout');
		}

		$usuario=$this->general->get_username($id);
		$tipos = $this->model_mercancia->TiposMercancia();
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("tipos",$tipos);
		$this->template->set("type",$usuario[0]->id_tipo_usuario);
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comercial/altas/tipo_mercancia');
	}
	
	function nueva_mercancia(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		$tipoID = $_GET['id'];
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$Logistica = ($tipoID==1) ? $this->general->isAValidUser($id,"logistica") : '';
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		

		$usuario=$this->general->get_username($id);
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$proveedores = array();
		
		if($tipoID == 3 || $tipoID == 4){
			$proveedores	 = $this->model_mercancia->get_proveedor(2);
		}else{
			$proveedores	 = $this->model_mercancia->get_proveedor($tipoID);
		}
		
		$canales = $this->model_admin->getCanalesDefault($tipoID);
		$productos       = $this->model_admin->get_mercancia();
		
		$promo			 = $this->model_admin->get_promo();
		$grupos			 = $this->model_mercancia->CategoriasMercancia();
		$servicio		 = $this->model_admin->get_servicio();
		$producto		 = $this->model_admin->get_producto();
		$combinado		 = $this->model_admin->get_combinado();
		$impuesto		 = $this->model_admin->get_impuesto();
		$tipo_mercancia	 = $this->model_admin->get_tipo_mercancia();
		$tipo_proveedor	 = $this->model_admin->get_tipo_proveedor();
		$empresa	     = $this->model_admin->get_empresa();
		$regimen	     = $this->model_admin->get_regimen();
		$zona	         = $this->model_admin->get_zona();
		$tipo_paquete	 = $this->model_admin->get_tipo_paquete();
		$pais            = $this->model_admin->get_pais_activo();
		//$paquetes_actuales= $this->model_admin->get_paquetes_actuales();
		$redes           = $this->model_tipo_red->listarTodos();
		
		$this->template->set("canales",$canales);
		$this->template->set("pais",$pais);
		$this->template->set("redes",$redes);
		$this->template->set("productos",$productos);
		//$this->template->set("paquetes_actuales",$paquetes_actuales);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("proveedores",$proveedores);
		$this->template->set("promo",$promo);
		$this->template->set("grupos",$grupos);
		$this->template->set("servicio",$servicio);
		$this->template->set("producto",$producto);
		$this->template->set("combinado",$combinado);
		$this->template->set("impuesto",$impuesto);
		$this->template->set("tipo_mercancia",$tipo_mercancia);
		$this->template->set("tipo_proveedor",$tipo_proveedor);
		$this->template->set("empresa",$empresa);
		$this->template->set("regimen",$regimen);
		$this->template->set("zona",$zona);
		$this->template->set("tipo_paquete",$tipo_paquete);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		if($type==8||$type==9){
			$data2 = array("user2" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
		$this->template->set_partial('footer', 'website/bo/footer');
		if($tipoID == 1){
			$this->template->build('website/bo/comercial/altas/mercancias/producto');
		}elseif ($tipoID == 2){
			$this->template->build('website/bo/comercial/altas/mercancias/servicio');
		}elseif($tipoID == 3){
			$this->template->build('website/bo/comercial/altas/mercancias/combinado');
		}elseif($tipoID == 4){
			
			$this->template->build('website/bo/comercial/altas/mercancias/paquete');
		}else{
			$this->template->build('website/bo/comercial/altas/mercancias/membresia');
		}
		
	}
	
	private function validarMercancia($datos){
		if($datos['pais'] == "-"){
			return false;
		}
		if($datos['real'] == null){
			return false;
		}
		if($datos['costo'] == null){
			return false;
		}
		if( $datos['costo_publico'] == null){
			return false;
		}
		if($datos['nombre'] == null){
			return false;
		}
		if( $datos['red'] == null){
			return false;
		}
		if( $_POST['proveedor'] == null){
			return false;
		}
		if( $_POST['tipo_mercancia'] == null){
			return false;
		}
		return true;
	}

	function validarMercanciaMembresia($datos){
if($datos['pais'] == "-"){
			return false;
		}
		if($datos['costo'] == null){
			return false;
		}

		if($datos['nombre'] == null){
			return false;
		}
		if( $datos['red'] == null){
			return false;
		}

		if( $_POST['tipo_mercancia'] == null){
			return false;
		}
		return true;
	}
	function CrearServicio(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$id=$this->tank_auth->get_user_id();
		
	 	 if($this->general->isAValidUser($id,"comercial")||$this->general->isAValidUser($id,"logistica"))
		{
		}else{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		
		$id = $this->tank_auth->get_user_id();
		
		if(!$this->validarMercancia($_POST)){
			$error = "Datos incompletos para crear la mercancia";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=2');
		}
		if(!$this->model_mercancia->existeProveedor($_POST['proveedor'])){
			$error = "Datos incompletos para crear la mercancia, el proveedor no existe";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=1');
		}
		
		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|png';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';
		
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		
		if (!$this->upload->do_upload('img'))
		{
			$error = "El tipo de archivo que esta cargando no esta permitido como imagen para el servicio.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=2');
		}
		else
		{
			$sku = $this->model_mercancia->nuevo_servicio();
			$data = array('upload_data' => $this->upload->data());
			$this->model_mercancia->img_merc($sku , $data["upload_data"]["file_name"]);
			redirect('/bo/comercial/listarMercancia');
			
		}
		
	}
	function CrearMembresia(){
			if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$id=$this->tank_auth->get_user_id();
		
	 	 if($this->general->isAValidUser($id,"comercial")||$this->general->isAValidUser($id,"logistica"))
		{
		}else{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		
		$id = $this->tank_auth->get_user_id();
		
		if(!$this->validarMercanciaMembresia($_POST)){
			$error = "Datos incompletos para crear la mercancia";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=5');
		}
		
		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|png';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';
		
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		
		if (!$this->upload->do_upload('img'))
		{
			$error = "El tipo de archivo que esta cargando no esta permitido como imagen para la membresia.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=5');
		}
		else
		{
			$sku = $this->model_mercancia->nueva_membresia();
			$data = array('upload_data' => $this->upload->data());
			$this->model_mercancia->img_merc($sku , $data["upload_data"]["file_name"]);
			redirect('/bo/comercial/listarMercancia');
			
		}
	}
	
	function CrearProducto(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$canales = $_POST['canal'];
		
	  if($this->general->isAValidUser($id,"comercial")||$this->general->isAValidUser($id,"logistica"))
		{
		}else{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
	
		
		if(!$this->validarMercancia($_POST)){
			$error = "Datos incompletos para crear la mercancia";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=1');
		}
		if(!$this->model_mercancia->existeProveedor($_POST['proveedor'])){
			$error = "Datos incompletos para crear la mercancia, el proveedor no existe";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=1');
		}
		
		$id = $this->tank_auth->get_user_id();
	
		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|png';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';
	
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
	
		if (!$this->upload->do_upload('img'))
		{
			$error = "El tipo de archivo que esta cargando no esta permitido como imagen para el producto.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=1');
		}
		else
		{
			$sku = $this->model_mercancia->nuevo_producto();
			$this->model_admin->setComercializacion($sku,$canales);
			$data = array('upload_data' => $this->upload->data());
			$this->model_mercancia->img_merc($sku , $data["upload_data"]["file_name"]);
			redirect('/bo/comercial/listarMercancia');
		}
		
	}
	
	function CrearCombinado(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}

		if(!isset($_POST['servicio']) && !isset($_POST['producto'])){
			$error = "No existe servicios o productos para ese pais, debe darlo de alta primero.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=3');
		}

	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
	    if($this->general->isAValidUser($id,"comercial")||$this->general->isAValidUser($id,"logistica"))
		{
			
		}else{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
		
		$id = $this->tank_auth->get_user_id();
		
		$_POST['proveedor'] = '0';
		if(!$this->validarMercancia($_POST)){
			$error = "Datos incompletos para crear la mercancia";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=3');
		}
		
		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|png';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';
	
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		
		if (!$this->upload->do_upload('img'))
		{
			$error = "El tipo de archivo que esta cargando no esta permitido como imagen para el servicio.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=3');
		}
		else
		{
			$sku = $this->model_mercancia->nuevo_combinado();
			$data = array('upload_data' => $this->upload->data());
			$this->model_mercancia->img_merc($sku , $data["upload_data"]["file_name"]);
		}
		redirect('/bo/comercial/listarMercancia');
	}

	
	function CrearPaquete(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		if(!isset($_POST['servicio']) && !isset($_POST['producto'])){
			$error = "No existe servicios o productos para ese pais, debe darlo de alta primero.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=4');
		}

	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		if($this->general->isAValidUser($id,"comercial")||$this->general->isAValidUser($id,"logistica"))
		{
				
		}else{
			redirect('/auth/logout');
		}
		$style=$this->modelo_dashboard->get_style(1);
	
		$id = $this->tank_auth->get_user_id();
		
		$_POST['proveedor'] = '1';
		if(!$this->validarMercancia($_POST)){
			$error = "Datos incompletos para crear la mercancia";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=4');
		}
	
		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|png';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';
	
		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
	
		if (!$this->upload->do_upload('img'))
		{
			$error = "El tipo de archivo que esta cargando no esta permitido como imagen para el servicio.";
			$this->session->set_flashdata('error', $error);
			redirect('/bo/mercancia/nueva_mercancia?id=3');
		}
		else
		{
			$sku = $this->model_mercancia->nuevo_paquete();
			$data = array('upload_data' => $this->upload->data());
			$this->model_mercancia->img_merc($sku , $data["upload_data"]["file_name"]);
		}
		redirect('/bo/comercial/listarMercancia');
	}
	
	function ImpuestaPais(){
		$impuestos = $this->model_mercancia->ImpuestoPais($_POST['pais']);
		echo json_encode($impuestos);
		
	}
	function ProductosPorPais(){
		$impuestos = $this->model_mercancia->ProductoPorPais($_POST['pais']);
		echo json_encode($impuestos);
	}

	function ServiciosPorPais(){
			$impuestos = $this->model_mercancia->ServiciosPorPais($_POST['pais']);
		    echo json_encode($impuestos);	
	}

	function ImpuestoPaisPorId(){
		$PorcentajeImpuesto=$this->model_mercancia->ImpuestoPaisPorId($_POST['impuesto']);
		echo json_encode($PorcentajeImpuesto);
	}
	
	function new_proveedor()
	{
		if(isset($_POST)){
			if($this->ValidarProveedor()){
				
				$id=$this->tank_auth->get_user_id();
				$id_proveedor = $this->model_mercancia->new_proveedor($id);
				if(isset($_POST['ser'])){
					echo "<option value='".$id_proveedor."' selected>".$_POST['nombre']." ".$_POST['apellido']."</option>"; 
					$id_proveedor;
				}else{
					echo "El proveedor ha sido creado ".$_POST['nombre']." ".$_POST['apellido'];
				}
			} 
		}
		
		
	}
	
	function ValidarProveedor(){
		if ($_POST['email'] == null){
			echo "El proveedor debe tener email";
			return false;
		}else if($_POST['empresa'] == null){
			echo "Seleciona Un pais para el proveedor";
			return false;
		}elseif($_POST['cp'] == null){
			echo "El proveedor debe tener un codigo postal";
			return false;
		}
		$i=0;
		foreach ($_POST['banco'] as $banco){
			if($banco == null){
				echo "El proveedor debe tener un banco";
				return false;
			}
			$i++;
		}
		
		foreach ($_POST['Cuenta'] as $banco){
			if($banco == null){
				echo "El proveedor debe tener minimo una cuenta de banco";
				return false;
			}
			$i++;
		}
		
		return true;
		
	}
	
	function formProveedor(){

		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		$usuario=$this->general->get_username($id);
		$this->template->set("type",$usuario[0]->id_tipo_usuario);
		$style=$this->modelo_dashboard->get_style(1);
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$bancos = $this->model_mercancia->Bancos();
		
		$sexo            = $this->model_admin->sexo();
		$civil           = $this->model_admin->edo_civil();
		$tipo            = $this->model_admin->get_user_type();
		$tipo_fiscal     = $this->model_admin->tipo_fiscal();
		$pais            = $this->model_admin->get_pais_activo();
		$productos       = $this->model_admin->get_mercancia();
		$estudios        = $this->model_admin->get_estudios();
		$ocupacion       = $this->model_admin->get_ocupacion();
		$tiempo_dedicado = $this->model_admin->get_tiempo_dedicado();
		$proveedores	 = $this->model_admin->get_proveedor();
		$grupo			 = $this->model_admin->get_grupo();
		$impuesto		 = $this->model_admin->get_impuesto();
		$tipo_mercancia	 = $this->model_admin->get_tipo_mercancia();
		$tipo_proveedor	 = $this->model_admin->get_tipo_proveedor();
		$empresa	     = $this->model_admin->get_empresa();
		$regimen	     = $this->model_admin->get_regimen();
		$zona	         = $this->model_admin->get_zona();
		$tipo_paquete	 = $this->model_admin->get_tipo_paquete();
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("tipo",$tipo);
		$this->template->set("pais",$pais);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("proveedores",$proveedores);
		$this->template->set("grupo",$grupo);
		$this->template->set("impuesto",$impuesto);
		$this->template->set("tipo_mercancia",$tipo_mercancia);
		$this->template->set("tipo_proveedor",$tipo_proveedor);
		$this->template->set("empresa",$empresa);
		$this->template->set("regimen",$regimen);
		$this->template->set("zona",$zona);
		$this->template->set("tipo_paquete",$tipo_paquete);
		$this->template->set("bancos",$bancos);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->build('website/bo/comercial/altas/mercancias/form_proveedor');
	}
	
	function configurar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$Logistica = '';//$this->general->isAValidUser($id,"logistica");
	
		if(!$Comercial&&!$Logistica){
			redirect('/auth/logout');
		}
	
		$canales = $this->model_admin->getCanalesWHERE("estatus = 'ACT'");
		$distribucion = $this->model_admin->getDistribucion();
		$style = $this->general->get_style(1);
		$tipos = $this->model_mercancia->TiposMercancia();
		
		$this->template->set("distribucion",$distribucion);
		$this->template->set("canales",$canales);
		$this->template->set("tipos",$tipos);
		$this->template->set("id",$id);
		$this->template->set("style",$style);
		$this->template->set("type",$usuario[0]->id_tipo_usuario);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/comercial/carrito/configuracion');
	}
	
	function distribuir()
	{
		$canales = $this->model_admin->getCanalesWHERE("estatus = 'ACT'");
		
		foreach ($canales as $canal){
			$setCanal = isset($_POST[$canal->alias]) ? $_POST[$canal->alias] : false;
			
			if($setCanal){
				$this->model_admin->limpiarDistribucion($canal->id);
				$this->model_admin->setDistribucion($canal->id,$setCanal);
			}			
		}
		$gastos = $_POST['gastos'];
		for ($i=0;$i<sizeof($gastos);$i++){
			$this->model_admin->setGastosCanal($i+1,$gastos[$i]);
		}
		
		echo "Actualizado";
	
	}
	
}