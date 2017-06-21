<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class perfil extends CI_Controller
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
		$this->load->model('bo/model_mercancia');
		$this->load->model('bo/model_inventario');
		$this->load->model('bo/modelo_logistico');
		$this->load->model('bo/modelo_cedi');
		$this->load->model('model_cedi');
		$this->load->model('bo/model_tipo_usuario');
		$this->load->model('bo/general');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$almacen  = $this->modelo_cedi->getUsuarioId($id);
		$style          = 	$this->general->get_style(1);
		
		$user	 	 	=	$this->model_tipo_usuario->getUsuarioCediId($id);
		
		$cedis = $this->model_cedi->listarTodos();
		
		$this->template->set("cedis",$cedis);
		
		$paises = $this->model_admin->get_pais_activo();
		$this->template->set("paises",$paises);
	
		$this->template->set("user",$user);
		
		$this->template->set("style",$style);
		$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/CEDI/header2',$data);
        $this->template->set_partial('footer', 'website/bo/footer');
        $this->template->build('website/bo/comercial/altas/usuarios/editarC');
		//$this->template->build('website/CEDI/home/index');
	}
	
	function PDF()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$style=$this->modelo_dashboard->get_style($id);
		$almacen  = $this->modelo_cedi->getUsuarioId($id);
		$empresa=$this->model_admin->get_empresa_multinivel();
	
		$productos = $this->model_inventario->Obtener_Productos_Almacen($almacen[0]->cedi);
	
		$this->template->set("style",$style);
		$this->template->set("empresa",$empresa);
		$this->template->set("user",$usuario[0]->nombre." ".$usuario[0]->apellido);
		$this->template->set("productos",$productos);
	
		$this->template->build('website/CEDI/home/PDFdashboard');
	}
}