<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Rangos extends CI_Controller
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
		$this->load->model('bo/model_rangos');
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
		$this->template->build('website/bo/rangos/index');

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

		$tipo_rango=$this->model_rangos->get_tipo_rango();
		$this->template->set("tipo_rango",$tipo_rango);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/rangos/alta');


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
		$cat_rangos=$this->model_rangos->get_cat_rangos();
		$cross_rango_tipos=$this->model_rangos->get_cross_rango_tipos();
		$cat_rango_tipo=$this->model_rangos->get_cat_tipo_rango();
		$style=$this->modelo_dashboard->get_style($id);
		$this->template->set("cat_rangos",$cat_rangos);
		$this->template->set("cross_rango_tipos",$cross_rango_tipos);
		$this->template->set("cat_rango_tipo",$cat_rango_tipo);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/rangos/listar');



	}
	function set_tipo_rango(){
	$code="";
		if(isset($_POST['id'])){
			$ids=$_POST['id'];
			$tipo_rango=$this->model_rangos->get_tipo_rango_not_in($ids);
			foreach ($tipo_rango as $tipo) {
				$code=+"<option value='".$tipo->id."'>".$tipo->descripcion."</option>";
				

			}
			
		
			echo $code;

		}
	}
	function ingresar_rango(){
		$condiciones = $_POST['id_tipo_condicion'];
		$valores = $_POST['valor_rango'];
		
		$condicion_red = $_POST['condicion_red'];
		$nivel_red = $_POST['nivel_red'];

		$id_rango=$this->model_rangos->ingresar_rango();

		$this->model_rangos->ingresar_condicion_rango($id_rango,$condiciones,$valores,$condicion_red,$nivel_red);
	}

	function IngTipRango($q,$valor){
		$this->model_rangos->IngTipRango($q,$valor,'1');

	}
	function ingresar_tipo_rango(){
		
		$id_tipos=$_POST['id_tipos'];
		$valores=$_POST['valores'];
		$this->model_rangos->IngTipRango($id_tipos,$valores,'');


	}

	function editar_rangos(){

		$id= $this->tank_auth->get_user_id();
		$style= $this->general->get_style($id);
		$rangos= $this->model_rangos->get_rangos_id($_POST['id']);
		$RangoVentas=$this->model_rangos->get_cross_rango($_POST['id']);
		$tipo_rango=$this->model_rangos->get_tipo_rango();
		$this->template->set("RangoVentas",$RangoVentas);
		$this->template->set("tipo_rango",$tipo_rango);
		$this->template->set("rangos",$rangos);
		$this->template->build('website/bo/rangos/editar_rangos');

	}
	function actualizar_rangos(){
		$noEliminar="";
		$contador=0;
		if(isset($_POST['id_tipo_condicion'])){
			$contador=count($_POST['id_tipo_condicion']);
			$condiciones=$_POST["id_tipo_condicion"];
			for($i=0;$i<$contador;$i++){
				$noEliminar.=$condiciones[$i];
				if($i!=$contador-1){
					$noEliminar.=",";
				}
			}
		}
		
		if(isset($_POST['id_tipo_condicion']) && isset($_POST['valor_rango'])){
			$this->model_rangos->eliminar_condiciones_rango($noEliminar);
		}
		if(isset($_POST['id_tipo_condicion']) && isset($_POST['valor_rango'])){
			$this->model_rangos->actualizar_condicion_rango($_POST['id'],$_POST['id_tipo_condicion'],$_POST['valor_rango'],$_POST['condicion_red'],$_POST['nivel_red']);
		}
		$correcto = $this->model_rangos->actualizar_rangos();

		if($correcto){
			echo "Rango Actualizado";
		}
		else{
			echo "No se logro actualizar el rango";
		}
	}

	function kill_rangos(){
	$id_rango=$_POST['id'];
	$validar_cat_bono_condicion=$this->model_rangos->validar_rango_bono($id_rango);
	if($validar_cat_bono_condicion==null){
		$kill_rangos=$this->model_rangos->kill_rangos();
		$this->model_rangos->kill_cross_rango();
		echo "Se ha eliminado el rango.";
	}else{
		echo "No se ha podido eliminar el rango, esta asociado a un bono.";
		}
		
	}


	function cambiar_estado_rangos(){

		$correcto=$this->model_rangos->cambiar_estado_rangos();
		echo "";

	}
}
