<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Key extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('general');
		$this->load->model('cemail');
		
		
	}

	function invitacion(){
		$key	= $this->uri->segment(3);
		$token = $this->general->get_temp_invitacion_ACT($key);
	
		if (!$token){
			//echo $token[0]->id;
			redirect("/auth/login");
		}
	
		//echo "hola";
		
		$id              = $token[0]->sponsor;
		
		$id_red          = $token[0]->red;
		
		$usuario         = $this->model_perfil_red->datos_perfil($id);
		$telefonos       = $this->model_perfil_red->telefonos($id);
		$sexo            = $this->model_perfil_red->sexo();
		$pais            = $this->model_perfil_red->get_pais();
		$style           = $this->general->get_style($id);
		$dir             = $this->model_perfil_red->dir($id);
		$civil           = $this->model_perfil_red->edo_civil();
		$tipo_fiscal     = $this->model_perfil_red->tipo_fiscal();
		$estudios        = $this->model_perfil_red->get_estudios();
		$ocupacion       = $this->model_perfil_red->get_ocupacion();
		$tiempo_dedicado = $this->model_perfil_red->get_tiempo_dedicado();
		$red 			 = $this->model_afiliado->RedAfiliado($id, $id_red);

		$afiliados       = $this->model_perfil_red->get_afiliados($id_red, $id);
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);

		$img_perfil="/template/img/empresario.jpg";
		foreach ($image as $img)
		{
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$img_perfil=$img->url;
			}
		}
		
		$this->template->set("id",$id);
		$this->template->set("style",$style);
		$this->template->set("contar",count($afiliados));
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("img_perfil",$img_perfil);
		$this->template->set("red_frontales",$red_forntales);
		$this->template->set("debajo_de",$token[0]->padre);
		$this->template->set("lado",$token[0]->lado);
		$this->template->set("email",$token[0]->email);
		$this->template->set("red",$id_red);
		$this->template->set("token",$token[0]->id);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/afiliar_invitado');
	}
	
	function check_espacio_invite(){
		$token = $this->general->get_temp_invitacion_ACT_id($_POST['token']);
		echo ($this->general->checkespacio($token)) ? "FAIL" : "OK";
	}
	
	function done_invitacion(){
		$this->general->trash_temp($_POST['token']);
	}	
	
}
