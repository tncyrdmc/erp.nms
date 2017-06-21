<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class cedis extends CI_Controller
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
		$this->load->model('bo/modelo_cedi');
		$this->load->model('bo/general');
		$this->load->model('bo/model_admin');
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
		$this->template->build('website/bo/logistico2/cedis/index');
	}
	
	function altaCedis(){
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
		$pais            = $this->model_admin->get_pais();
		$this->template->set("pais",$pais);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("type",$usuario[0]->id_tipo_usuario);
		$this->template->set("pais",$pais);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/cedis/altaCedis');
		
	}
	
	function listarCedis(){
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
		
		$cedi=$this->modelo_cedi->all_cedi();
		$this->template->set("cedi",$cedi);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		
		$this->template->build('website/bo/logistico2/cedis/listaCedi');
	}
	
	function crear_cedis(){
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
		$cedi = array(
				'nombre' => $_POST['nombre'],
				'descripcion' => $_POST['descripcion'],
				'ciudad' => $_POST['ciudad'],
				'direccion' => $_POST['direccion'],
				'telefono' => $_POST['telefono'],
				'estatus' => 'ACT',
				'tipo' => 'C',
				'codigo_postal' => $_POST['codigo_postal']
		);
		
		
		if($this->validar_cedi($cedi)){	
			
			$this->modelo_cedi->crear_cedi($cedi);
			
			}
		redirect('/bo/cedis/listarCedis');
		
		
	}
	
	function validar_cedi($cedi){
		$error = '';
		if($cedi['nombre'] == ''){
			$error = "El nombre del cedi es obligatorio";
		}elseif ($cedi['descripcion'] == ''){
			$error = "La descripción del cedi es obligatoria";
		}elseif ($cedi['ciudad'] == ''){
			$error = "La ciudad del cedi es obligatoria";
		}elseif ($cedi['telefono'] == ''){
			$error = "El telefono del cedi es obligatorio";
		}elseif ($cedi['direccion'] == ''){
			$error = "La dirección del cedi es obligatoria";
		}
		elseif ($cedi['codigo_postal'] == ''){
			$error = "El codigo postal  del cedi es obligatoria";
		}
		if($error == ''){
			return true;
		}else{
			$this->session->set_flashdata('error', $error);
			redirect('/bo/cedis/altaCedis');
		}
	}

	
	function nuevaCiudad(){
		$this->modelo_cedi->nuevaCiudad();
		
	}
	
   function cambiar_estado_cedi(){
   	if (!$this->tank_auth->is_logged_in()){																		// logged in
   		redirect('/auth');
   	}
	
		$id = $_POST['id'];
		$estado = $_POST['estado'];
	
		$this->modelo_cedi->cambiar_estado_cedi($id,$estado);
		
	}
	function eliminar_cedi(){
		if (!$this->tank_auth->is_logged_in()){																		// logged in
			redirect('/auth');
		}
	
		$id = $_POST['id'];
	
		$this->modelo_cedi->eliminar_cedi($id);
		echo  'El cedi a sido eliminado corectamente';
	}
	function editar_cedi(){
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
		$this->template->build('website/bo/logistico2/cedis/editarCedis');
	}
    function actualizar_cedi(){
    	$cedi = array(
    			'nombre' => $_POST['nombre'],
    			'descripcion' => $_POST['descripcion'],
    			'ciudad' => $_POST['ciudad'],
    			'direccion' => $_POST['direccion'],
    			'telefono' => $_POST['telefono'],
    			'codigo_postal' => $_POST['codigo_postal']
    			
    	);
    	
    	if($this->validar_cedi($cedi)){
    	
    		$this->modelo_cedi->actualizar_cedi($cedi,$_POST['id']);
    			
    	}
    	redirect('/bo/cedis/listarCedis');
    }
}
