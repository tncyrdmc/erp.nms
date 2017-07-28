<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class red extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('ov/general');
		$this->load->model('ov/model_perfil_red');
		$this->load->model('ov/model_afiliado');
		$this->load->model('model_tipo_red');
		$this->load->model('bo/model_tipo_usuario');
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		

	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}

		$id = $this->tank_auth->get_user_id();
		

		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}
		
		$style         = $this->general->get_style($id);
		
		$cantidadRedes = $this->model_tipo_red->RedesUsuario($id);
		
		if(sizeof($cantidadRedes)==0)
			redirect('/');
		if(sizeof($cantidadRedes)==1)
			redirect('/ov/red/mi_red?id='.$cantidadRedes[0]->id);
		
		$redes = $this->model_tipo_red->RedesUsuario($id);
		
		$this->template->set("id",$id);
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/redes_ver');
	}

	function mi_red()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id            = $this->tank_auth->get_user_id();
		
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}
		
		$style         = $this->general->get_style($id);

		$this->template->set("style",$style);
		$this->template->set("id",$id);
		
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/arboles/red');		
	}

	function red_genealogico()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id            = $this->tank_auth->get_user_id();
		
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}
		
		$id_red        = $_GET['id'];
		$frontales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);
		$frontales = $frontales[0]->frontal;

		$style         = $this->general->get_style($id);

		
		$afiliados     = $this->model_perfil_red->get_afiliados($id_red, $id);
		
	
		$image=$this->model_perfil_red->get_images($id);
		$user="/template/img/empresario.jpg";
		foreach ($image as $img) {
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$user=$img->url;
			}
		}
		
		$this->template->set("user",$user);
		$this->template->set("style",$style);
		$this->template->set("id",$id);
		$this->template->set("frontales",$frontales);
		$this->template->set("afiliados",$afiliados);
		//$this->template->set("afiliadostree",$afiliadostree);
		$this->template->set("img_perfil",$user);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/arboles/genealogico');
	}
	
	function red_arbol1()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id            = $this->tank_auth->get_user_id();
		
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}
		
		$id_red        = $_GET['id'];
		$frontales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);
		$frontales = $frontales[0]->frontal;

		$style         = $this->general->get_style($id);
		//$afiliados     = $this->model_perfil_red->get_afiliados_($id_red, $id);
		$afiliadostree = $this->model_perfil_red->get_afiliados($id_red, $id);
	
		$image=$this->model_perfil_red->get_images($id);
		$user="/template/img/empresario.jpg";
		foreach ($image as $img) {
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$user=$img->url;
			}
		}
	
		$this->template->set("user",$user);
		$this->template->set("style",$style);
		$this->template->set("id",$id);
		$this->template->set("frontales",$frontales);
		//$this->template->set("afiliados",$afiliados);
		$this->template->set("afiliadostree",$afiliadostree);
		$this->template->set("img_perfil",$user);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/arboles/arbol1');
	}
	
	function red_arbol2()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id            = $this->tank_auth->get_user_id();
		
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}
		
		$id_red        = $_GET['id'];
		$frontales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red);
		$frontales = $frontales[0]->frontal;
		$style         = $this->general->get_style($id);
		//$afiliados     = $this->model_perfil_red->get_afiliados_($id_red, $id);
		$afiliadostree = $this->model_perfil_red->get_afiliados($id_red, $id);
	
		$image=$this->model_perfil_red->get_images($id);
		$user="/template/img/empresario.jpg";
		foreach ($image as $img) {
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$user=$img->url;
			}
		}
	
		$this->template->set("user",$user);
		$this->template->set("style",$style);
		$this->template->set("id",$id);
		$this->template->set("frontales",$frontales);
		//$this->template->set("afiliados",$afiliados);
		$this->template->set("afiliadostree",$afiliadostree);
		$this->template->set("img_perfil",$user);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/arboles/arbol2');
	}
	
	function red_arbol_frontales()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id            = $this->tank_auth->get_user_id();
	
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}
	
		$id_red        = $_GET['id'];
		$style         = $this->general->get_style($id);
		//$afiliados     = $this->model_perfil_red->get_afiliados_($id_red, $id);
		$afiliadostree = $this->model_perfil_red->get_afiliados_directos($id_red, $id);
	
		$image=$this->model_perfil_red->get_images($id);
		$user="/template/img/empresario.jpg";
		foreach ($image as $img) {
			$cadena=explode(".", $img->img);
			if($cadena[0]=="user")
			{
				$user=$img->url;
			}
		}
	
		$this->template->set("user",$user);
		$this->template->set("style",$style);
		$this->template->set("id",$id);
		//$this->template->set("afiliados",$afiliados);
		$this->template->set("afiliadostree",$afiliadostree);
		$this->template->set("img_perfil",$user);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/perfil_red/arboles/arbol_frontales');
	}

}
