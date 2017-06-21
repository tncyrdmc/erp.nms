<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class almacen extends CI_Controller
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
		$this->load->model('bo/modelo_almacen');
		$this->load->model('bo/general');
		$this->load->model('bo/model_admin');
		$this->load->model('bo/modelo_cedi');
		
		
	}
	
	function index() {
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($this->general->isAValidUser($id,"comercial")||$this->general->isAValidUser($id,"logistica"))
		{
		}else{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("type",$usuario[0]->id_tipo_usuario);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/almacen/index');
	}
	
	function alta() {
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		$pais            = $this->model_admin->get_pais();
		$this->template->set("pais",$pais);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("type",$usuario[0]->id_tipo_usuario);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/almacen/alta');
	}
	
	function crear_almacen() {
		$almacen = array(
				'nombre' => $_POST['nombre'],
				'descripcion' => $_POST['descripcion'],
				'ciudad' => $_POST['ciudad'],
				'direccion' => $_POST['direccion'],
				'telefono' => $_POST['telefono'],
				'estatus' => 'ACT',
				'tipo' => 'A',
				'codigo_postal' => $_POST['codigo_postal']
		);
		
		if($this->validar_almacen($almacen)){
			
			$this->modelo_almacen->crear_almacen($almacen);
		}
		redirect('/bo/almacen/listar');
	}
	
	function validar_almacen($almacen){
		$error = '';
		if($almacen['nombre'] == ''){
			$error = "El nombre del almacen es obligatorio";
		}elseif ($almacen['descripcion'] == ''){
			$error = "La descripción del almacen es obligatoria";
		}elseif ($almacen['ciudad'] == ''){
			$error = "La ciudad del almacen es obligatoria";
		}elseif ($almacen['telefono'] == ''){
			$error = "El telefono del almacen es obligatorio";
		}elseif ($almacen['direccion'] == ''){
			$error = "La dirección del almacen es obligatoria";
		}
		elseif ($almacen['codigo_postal'] == ''){
			$error = "El codigo postal  del almacen es obligatoria";
		}
		
		if($error == ''){
			return true;
		}else{
			$this->session->set_flashdata('error', $error);
			redirect('/bo/almacen/alta');
		}
	}
	
	function validar_almacen_actualizar($almacen){
		$error = '';
		if($almacen['nombre'] == ''){
			$error = "El nombre del almacen es obligatorio";
		}elseif ($almacen['descripcion'] == ''){
			$error = "La descripción del almacen es obligatoria";
		}elseif ($almacen['ciudad'] == ''){
			$error = "La ciudad del almacen es obligatoria";
		}elseif ($almacen['telefono'] == ''){
			$error = "El telefono del almacen es obligatorio";
		}elseif ($almacen['direccion'] == ''){
			$error = "La dirección del almacen es obligatoria";
		}
		elseif ($almacen['codigo_postal'] == ''){
			$error = "EL codigo postal del almacen es obligatoria";
		}
	
		if($error == ''){
			return true;
		}else{
			echo $error;
			return false;
		}
	}
	
	function listar() {
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if(!$this->general->isAValidUser($id,"logistica"))
		{
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		
		$almacenes = $this->modelo_almacen->obtenerAlmacenes();
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("cedi",$almacenes);
		$this->template->set("type",$usuario[0]->id_tipo_usuario);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/almacen/listar');
	}
	
	function eliminar_almacen(){
		if (!$this->tank_auth->is_logged_in()){																		// logged in
			redirect('/auth');
		}
		
		$id = $_POST['id'];
		
		$this->modelo_almacen->eliminar_almacen($id);
		echo  'El almacen a sido eliminado corectamente';
	}
	
	function cambiar_estado_almacen(){
		if (!$this->tank_auth->is_logged_in()){																		// logged in
			redirect('/auth');
		}
	
		$id = $_POST['id'];
		$estado = $_POST['estado'];
	
		$this->modelo_almacen->cambiar_estado_almacen($id,$estado);
		
	}
	
	function editar_almacen(){
		if (!$this->tank_auth->is_logged_in()){																		// logged in
			redirect('/auth');
		}
		$pais            = $this->model_admin->get_pais();
		$cedi = $this->modelo_cedi->consultar_cedi($_POST['id']);
		
		$PaisCiudad = $this->modelo_cedi->consultar_PaisCiudad($cedi[0]->ciudad);
		$ciudades = $this->modelo_cedi->consultar_ciudades($cedi[0]->ciudad);
		$ciudad_actual = $this->modelo_cedi->consultar_ciudad_actual($cedi[0]->ciudad);
		$departamentos = $this->modelo_cedi->consultar_departamento($cedi[0]->ciudad);
		$departamento_activo = $this->modelo_cedi->consultar_departamento_activo($cedi[0]->ciudad);
		$this->template->set("pais",$pais);
		$this->template->set("cedi",$cedi);
		$this->template->set("ciudades",$ciudades);
		$this->template->set("departamentos",$departamentos);
		$this->template->set("ciudad_actual",$ciudad_actual);
		$this->template->set("departamento_activo",$departamento_activo);
		$this->template->set("PaisCiudad",$PaisCiudad);
		
		$this->template->build('website/bo/logistico2/almacen/editar_almacen');
	}
	
	function actualizar_almacen(){
		
		if(!isset($_POST['web'])){
			$_POST['web'] = 0;
		}
		$almacen = array(
				'nombre' => $_POST['nombre'],
				'descripcion' => $_POST['descripcion'],
				'ciudad' => $_POST['ciudad'],
				'direccion' => $_POST['direccion'],
				'telefono' => $_POST['telefono'],
				'codigo_postal' => $_POST['codigo_postal']
		);
		
		if($this->validar_almacen($almacen)){
				
			$this->modelo_almacen->actualizar_almacen($almacen,$_POST['id']);
			
		}
		redirect('/bo/almacen/listar');
	}
}
