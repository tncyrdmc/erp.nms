<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class tipo_red extends CI_Controller{
	
	var $id_red;
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('ov/general');
		$this->load->model('bo/model_bonos');
		$this->load->model('model_tipo_red');
	}

	public function crear_red()
	{
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
		
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
	
		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/TipoRed/nuevo');	
	}

	public function modificar_red(){
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
		
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
		$id_red = $_POST['id'];
		$datosDeRed = $this->model_tipo_red->traerRed($id_red);
		//echo $id_red;
		$this->template->set("id_red",$id_red);
		$this->template->set("datosDeRed",$datosDeRed);
		$this->template->set("style",$style);
		$this->template->build('website/bo/TipoRed/modificarRed');
	}
	
	public function actualizar_red()
	{
		$id_red = $_POST['id'];
		$nombre_red = $_POST['nombre'];
		$descripcion_red = $_POST['descripcion'];
		//$capacidadRed = $this->model_tipo_red->getCapacidadRed($id_red);

		echo ($this->model_tipo_red->actualizar($_POST['id'],$_POST['nombre'],$_POST['descripcion'],$_POST['frontal'],$_POST['profundidad'],$_POST['tipo_plan'],$_POST['valor_punto']))
		 ? "Se han Actualizado los datos" : "No se pudo Actualizar los datos";
		//$this->session->set_flashdata('exito', 'Se han Actualizado los datos');
		//redirect("/bo/tipo_red/mostrar_redes");
	}
	
	function cambiar_estado(){
		
		$validar = null;
		
		if($_POST['estado']=='DES'){
			$validar=$this->model_bonos->validar_bono_red($_POST['id']);
		}		
		
		if(isset($_POST['id'])){				
			
			if($validar==null){
				echo $this->model_tipo_red->cambiar_estado() ?
				"Se ha cambiado el estado de la Red" :
				"No se ha podido cambiar el estado de la Red";
			}else{
				echo "No se ha podido desactivar la red, esta asociado a un Bono.";
			}
				
		}
	
	}
	
	public function guardar_red(){
			//$capacidadRed = $this->model_tipo_red->traerCapacidadRed();
			
			echo ($this->model_tipo_red->insertar($_POST['nombre'],$_POST['descripcion'],$_POST['frontal'],$_POST['profundidad'],$_POST['tipo_plan'],$_POST['valor_punto']))
			? "La red se ha creado correctamente" : "No se pudo crear la red" ;
			
			
	}

	public function mostrar_redes()
	{
		
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
		
		$redes = $this->model_tipo_red->listarTodos();
		$id              = $this->tank_auth->get_user_id();
		$style           = $this->general->get_style($id);
			
		$this->template->set("redes", $redes);
		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
        $this->template->build('website/bo/TipoRed/mostrarRedes');
	}

}
