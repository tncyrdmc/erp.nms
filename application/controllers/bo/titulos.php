<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class titulos extends CI_Controller
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
		$this->load->model('bo/model_titulos');
	}
	function index(){

				if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/titulos/index');

	}

	function alta(){
			if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}

		$style=$this->modelo_dashboard->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/titulos/alta');


	}

	function listar(){
			if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

			$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}
		$cat_titulos=$this->model_titulos->get_cat_titulos();

		$style=$this->modelo_dashboard->get_style($id);
		$this->template->set("cat_titulos",$cat_titulos);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/titulos/listar');



	}

	function ingresar_Titulo(){

		$this->model_titulos->ingresar_titulo();

	}

	function editar_titulos(){

		$titulos= $this->model_titulos->get_titulos_id($_POST['id']);
		$this->template->set("titulos",$titulos);
		$this->template->build('website/bo/titulos/editar_titulos');

	}
	function actualizar_titulos(){

		$correcto = $this->model_titulos->actualizar_titulos();

		if($correcto){
			echo "Título Actualizado";
		}
		else{
			echo "No se logro actualizar el Título";
		}
	}

	function kill_titulos(){
		$this->model_titulos->kill_titulos();
		echo "Se ha eliminado el titulo.";
		
	}

}
