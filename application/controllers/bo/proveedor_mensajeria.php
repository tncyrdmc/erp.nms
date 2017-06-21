<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class proveedor_mensajeria extends CI_Controller
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
		$this->load->model('bo/model_admin');
		$this->load->model('bo/modelo_proveedor_mensajeria');
	}
	
	function index(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico){
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		
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
		$this->template->build('website/bo/logistico2/mensajeria/index');
	}
	
	function alta(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico){
			redirect('/auth/logout');
		}
	
		$style=$this->modelo_dashboard->get_style(1);
		$pais = $this->model_admin->get_pais_activo();
	
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("paises",$pais);
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
	
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
		$this->template->build('website/bo/logistico2/mensajeria/alta');
	}
	
	function crear_proveedor() {
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		
		$proveedor = array(
				'razon_social' => $_POST['razon_social'],
				'nombre_empresa' => $_POST['nombre'],
				'idioma' => $_POST['idioma'],
				'id_pais' => $_POST['pais'],
				'direccion' => $_POST['direccion'],
				'colonia' => $_POST['colonia'],
				'municipio' => $_POST['municipio'],
				'estado' => $_POST['estado'],
				'codigo_postal' => $_POST['codigo_postal'],
				'direccion_web' => $_POST['web'],
				'estatus' => 'ACT',
		);
		
		$id_proveedor = 0;
		if($this->validarProveedor($proveedor)){
			$id_proveedor = $this->modelo_proveedor_mensajeria->crear_proveedor_mensajeria($proveedor);
		}
		
		$contacto1 = array(
				'id_proveedor' => $id_proveedor,
				'nombre' => $_POST['nommbre_contacto1'],
				'apellido' => $_POST['apellido_contacto1'],
				'telefono_movil' => $this->ConcaternarTelefonos($_POST['telefonomovil1']),
				'telefono_fijo' => $this->ConcaternarTelefonos($_POST['telefonomovil1']),
				'mail' => $_POST['email_contacto1'],
				'puesto' => $_POST['puesto_contacto1'],
		);
		
		$contacto2 = array(
				'id_proveedor' => $id_proveedor,
				'nombre' => $_POST['nommbre_contacto2'],
				'apellido' => $_POST['apellido_contacto2'],
				'telefono_movil' => $this->ConcaternarTelefonos($_POST['telefonomovil2']),
				'telefono_fijo' => $this->ConcaternarTelefonos($_POST['telefonomovil2']),
				'mail' => $_POST['email_contacto2'],
				'puesto' => $_POST['puesto_contacto2'],
		);
		
		//$tarifas = $this->CrearTarifas_proveedor();
		
		if($this->validarContacto($contacto1)){
			$this->modelo_proveedor_mensajeria->crear_contacto_mensajeria($contacto1);			
			//$this->for_tarifas($tarifas);
		}
		
		if($this->validarContacto2($contacto2)){
			$this->modelo_proveedor_mensajeria->crear_contacto_mensajeria($contacto2);		
			//$this->for_tarifas($tarifas);
		}
		redirect('/bo/proveedor_mensajeria/listar');
	}
	
	private function CrearTarifas_proveedor() {
		
		$ciudades = $_POST['ciudad_tarifa'];
		$valores = $_POST['valor_tarifa'];
		
		$tarifas = $this->CrearTarifas($ciudades, $valores, $id_proveedor);
		return $tarifas;
	}

	private function for_tarifas($tarifas){
		foreach ($tarifas as $tarifa){
			$this->modelo_proveedor_mensajeria->crear_tarifa_mensajeria($tarifa);
		}
	}
	
	private function for_tarifas_actualizar($tarifas,$id_proveedor){
			foreach ($tarifas as $tarifa){
				$this->modelo_proveedor_mensajeria->actualizar_tarifa_mensajeria($tarifa, $id_proveedor);
			}
	}
	private function CrearTarifas($ciudades, $valores, $id_proveedor){
		$tarifas = array();
		$i = 0;
		foreach ($ciudades as $ciudad){
			if($valores[$i] != ''){
				$tarifa = array(
						'id_proveedor' => $id_proveedor,
						'ciudad' => $ciudad,
						'tarifa' => $valores[$i],
				);
				array_push($tarifas, $tarifa);
				$i = $i + 1;
			}
		}
		return $tarifas;
	}
	
	private function ConcaternarTelefonos($telefonos){
		$telefonos_concatenados = "";
		
		foreach ( $telefonos as $telefono ) {
			if($telefonos_concatenados == ''){
				$telefonos_concatenados = $telefono;
			}else{
				$telefonos_concatenados = $telefonos_concatenados."/".$telefono;
			}
		}
		return $telefonos_concatenados;
	}
	
	private function validarProveedor($proveedor){
		
		$error = '';
		if($proveedor['nombre_empresa'] == ''){
			$error = "El nombre de la empresa proveedora es obligatorio";
		}elseif ($proveedor['razon_social'] == ''){
			$error = "La Razon Social de la empresa proveedora es obligatoria";
		}elseif ($proveedor['direccion'] == ''){
			$error = "La direccion de la empresa proveedora es obligatoria";
		}elseif ($proveedor['codigo_postal'] == ''){
			$error = "El Codigo Postal  de la empresa proveedora es obligatorio";
		}elseif ($proveedor['idioma'] == ''){
			$error = "El idioma de la empresa proveedora es obligatoria";
		}
		
		if($error == ''){
			return true;
		}else{
			$this->session->set_flashdata('error', $error);
			redirect('/bo/proveedor_mensajeria/alta');
			return false;
		}
	}
	
	private function validarContacto($contacto){
		$error = '';
		if($contacto['nombre'] == ''){
			$error = "El nombre del contacto es obligatorio";
		}elseif ($contacto['apellido'] == ''){
			$error = "El apellido del contacto es obligatoria";
		}elseif ($contacto['telefono_movil'] == ''){
			$error = "Debe tener minimo un telefono de contacto";
		}elseif ($contacto['telefono_fijo'] == ''){
			$error = "Debe tener minimo un telefono fijo de contacto";
		}elseif ($contacto['mail'] == ''){
			$error = "El email de contacto es obligatoria";
		}
		
		if($error == ''){
			return true;
		}else{
			$this->session->set_flashdata('error', $error);
			redirect('/bo/proveedor_mensajeria/alta');
			return false;
		}
	}
	
	private function validarContacto2($contacto){
		$error = '';
		if($contacto['nombre'] == ''){
			$error = "El nombre del contacto es obligatorio";
		}elseif ($contacto['apellido'] == ''){
			$error = "El apellido del contacto es obligatoria";
		}elseif ($contacto['telefono_movil'] == ''){
			$error = "Debe tener minimo un telefono de contacto";
		}elseif ($contacto['telefono_fijo'] == ''){
			$error = "Debe tener minimo un telefono fijo de contacto";
		}elseif ($contacto['mail'] == ''){
			$error = "El email de contacto es obligatoria";
		}
	
		if($error == ''){
			return true;
		}else{			
			return false;
		}
	}
	
	function listar(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico){
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		$proveedores = $this->modelo_proveedor_mensajeria->obtenerProveedores();
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("proveedores",$proveedores);
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		
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
		$this->template->build('website/bo/logistico2/mensajeria/listar');
	}
	
	function cambiar_estado(){
		if (!$this->tank_auth->is_logged_in()){																		// logged in
			redirect('/auth');
		}
	
		$id = $_POST['id'];
		$estado = $_POST['estado'];
	
		$this->modelo_proveedor_mensajeria->cambiar_estado_proveedor_mensajeria($id,$estado);
	
	}
	
	function eliminar_proveedor(){
		if (!$this->tank_auth->is_logged_in()){																		// logged in
			redirect('/auth');
		}
	
		$id = $_POST['id'];
		if(!$this->modelo_proveedor_mensajeria->consultar_envios_mensajeria($id)){
			$this->modelo_proveedor_mensajeria->eliminar_proveedor_mensajeria($id);
			echo  'El proveedor de mensajeria a sido eliminado corectamente';
		}else{
			echo  'El proveedor de mensajeria no a sido eliminado 
					debido a que tiene un historial con nosotros.
					Te recomiendo que lo desactives';
		}
		
	}
	
	function editar_proveedor(){
		$_POST['id'] = (!$_POST['id']) ? $_GET['id'] : $_POST['id'];
		if (!$this->tank_auth->is_logged_in()){																		// logged in
			redirect('/auth');
		}
		//$almacen = $this->modelo_almacen->consultar_almacen($_POST['id']);
	
		//$this->template->set("almacen",$almacen);
		$pais = $this->model_admin->get_pais_activo();
		$proveedor = $this->modelo_proveedor_mensajeria->consultar_proveedor_mensajeria($_POST['id']);
		$contactos = $this->modelo_proveedor_mensajeria->consultar_contactos_mensajeria($_POST['id']);
		//$tarifas = $this->modelo_proveedor_mensajeria->consultar_tarifas_mensajeria($_POST['id']);
		$departamentos = $this->modelo_proveedor_mensajeria->ObtenerDepartamentosPais($proveedor[0]->id_pais);
		$ciudades = $this->modelo_proveedor_mensajeria->ObtenerCiudadesPais($proveedor[0]->id_pais);
		$ciudades2 = $this->modelo_proveedor_mensajeria->ObtenerCiudadesDepartamento($proveedor[0]->estado);
		
		
		$this->template->set("paises",$pais);
		$this->template->set("proveedor",$proveedor);
		$this->template->set("contactos",$contactos);
		//$this->template->set("tarifas",$tarifas);
		$this->template->set("ciudades",$ciudades);
		$this->template->set("ciudades2",$ciudades2);
		$this->template->set("departamentos",$departamentos);
		
		$this->template->build('website/bo/logistico2/mensajeria/editar');
	}
	
	function actualizar_proveedor() {
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
	
		$proveedor = array(
				'razon_social' => $_POST['razon_social'],
				'nombre_empresa' => $_POST['nombre'],
				'idioma' => $_POST['idioma'],
				'id_pais' => $_POST['pais'],
				'direccion' => $_POST['direccion'],
				'colonia' => $_POST['colonia'],
				'municipio' => $_POST['municipio'],
				'estado' => $_POST['estado'],
				'codigo_postal' => $_POST['codigo_postal'],
				'direccion_web' => $_POST['web'],
				'estatus' => 'ACT',
		);
	
		$id_proveedor = $_POST['id'];
		if($this->validarProveedor($proveedor)){
			$this->modelo_proveedor_mensajeria->actualizar_proveedor_mensajeria($proveedor,$id_proveedor);
		}
	
		$contacto1 = array(
				'nombre' => $_POST['nommbre_contacto1'],
				'apellido' => $_POST['apellido_contacto1'],
				'telefono_movil' => $this->ConcaternarTelefonos($_POST['telefonomovil1']),
				'telefono_fijo' => $this->ConcaternarTelefonos($_POST['telefonomovil1']),
				'mail' => $_POST['email_contacto1'],
				'puesto' => $_POST['puesto_contacto1'],
		);
	
		$contacto2 = array(
				'id_proveedor' => $id_proveedor,
				'nombre' => $_POST['nommbre_contacto2'],
				'apellido' => $_POST['apellido_contacto2'],
				'telefono_movil' => $this->ConcaternarTelefonos($_POST['telefonomovil2']),
				'telefono_fijo' => $this->ConcaternarTelefonos($_POST['telefonomovil2']),
				'mail' => $_POST['email_contacto2'],
				'puesto' => $_POST['puesto_contacto2'],
		);
	
		//$tarifas = $this->CrearTarifas_proveedor();
		
		if($this->validarContacto($contacto1)){
			$this->modelo_proveedor_mensajeria->actualizar_contacto_mensajeria($contacto1,$_POST['id_contacto1']);
			//$this->modelo_proveedor_mensajeria->eliminar_tarifas($id_proveedor);
			//$this->for_tarifas_actualizar($tarifas,$id_proveedor);		
		}
		if($this->validarContacto2($contacto2)){
			$_POST['id_contacto2'] 
			? $this->modelo_proveedor_mensajeria->actualizar_contacto_mensajeria($contacto1,$_POST['id_contacto2'])
			: $this->modelo_proveedor_mensajeria->crear_contacto_mensajeria($contacto2);
			//$this->modelo_proveedor_mensajeria->eliminar_tarifas($id_proveedor);
			//$this->for_tarifas_actualizar($tarifas,$id_proveedor);		
		}
		redirect('/bo/proveedor_mensajeria/listar');
	}
	
	function CiudadPais() {
		$ciudades = $this->modelo_proveedor_mensajeria->ObtenerCiudadesPais($_POST['pais']);
		echo json_encode($ciudades);
	}
	
	function DepartamentoPais() {
		$departamentos = $this->modelo_proveedor_mensajeria->ObtenerDepartamentosPais($_POST['pais']);
		echo json_encode($departamentos);
	}
	
	function CiudadDepartamento() {
		$ciudades = $this->modelo_proveedor_mensajeria->ObtenerCiudadesDepartamento($_POST['departamento']);
		echo json_encode($ciudades);
	}
	
	function nuevoDepartameto() {
		$departamento = array(
				'Nombre' => $_POST['nombre'],
				'id_pais' => $_POST['pais'],
		);
		$this->modelo_proveedor_mensajeria->crear_departamento($departamento);
	}
	
	function nuevoCiudad() {
		$ciudad = array(
				'Name' => $_POST['ciudad'],
				'CountryCode' => $_POST['pais2'],
				'id_estate' => $_POST['departamento2'],
				'District' => $_POST['departamento2'],
		);
		$this->modelo_proveedor_mensajeria->crear_ciudad($ciudad);
	}
}