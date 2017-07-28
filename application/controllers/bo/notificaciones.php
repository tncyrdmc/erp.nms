<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notificaciones extends CI_Controller
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
		$this->load->model('bo/model_admin');
		$this->load->model('bo/general');
	}
	
	function index()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario = $this->general->get_username($id);
	
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/notificaciones/index');
	}
	
	function alta()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/notificaciones/alta');
	}
	
	function listar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$style=$this->modelo_dashboard->get_style(1);
	
		$notifies=$this->model_admin->get_notify();
		$this->template->set("notifies",$notifies);	
	
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/oficinaVirtual/notificaciones/listar');
	}
	
	function kill_notify(){
				
			$validar=$this->model_admin->kill_notify($_POST['id']);
			if($validar){				
				echo "Se ha eliminado la Notificación.";
			}else{
				echo "No se ha podido eliminar la Notificación.";
			}
			
	}
	
	function cambiar_estado(){
		if(isset($_POST['estado'])&&isset($_POST['id']))
			$this->model_admin->estado_notify($_POST['estado'],$_POST['id']);
	
	}
	
	function ingresar_notify(){
	
		$q = $this->model_admin->insert_notify();	
		echo $q ? "Se ha creado la Notificación." : "No se ha podido crear la Notificación.";
		
	}
	
	function editar_notify(){
		$notify=$this->model_admin->get_notify_id($_POST['id']);
		$this->template->set("notify",$notify);
	
		$this->template->build('website/bo/oficinaVirtual/notificaciones/editar');
		
	
	}
	
	function actualizar_notify(){
	
		$q = $this->model_admin->actualizar_notify();
		echo $q ? "Se ha actualizado la Notificación." : "No se ha podido actualizar la Notificación.";
	
	}
	
}
