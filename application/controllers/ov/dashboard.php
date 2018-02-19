<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->isViewBonos();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('ov/modelo_dashboard');
		$this->load->model('ov/general');
		$this->load->model('ov/modelo_compras');
		$this->load->model('modelo_premios');
		$this->load->model('model_tipo_red');
		$this->load->model('bo/model_admin');
		$this->load->model('bo/bonos/titulo');
		
		
	}

	private $afiliados = array();
	
	private function VerificarCompras($id_afiliado,$id_red,$nivel, $profundidad, $frecuencia){
		
		if ($nivel<$profundidad){
		$afiliados = $this->modelo_compras->traer_afiliados_red($id_afiliado, $id_red);
		
		$contador = 0;
		$siCompro = 0;
		$this->afiliados[$nivel]=0;
				foreach ($afiliados as $afiliado2){
					$siCompro = 0;
					if($this->modelo_compras->ComprovarCompraProducto($afiliado2->id_afiliado, $id_red, $frecuencia)){
						$siCompro = 1;
					}
					if($this->afiliados[$nivel]!=0){
						$this->afiliados[$nivel] =  $siCompro + $this->afiliados[$nivel];
					}else{
						$this->afiliados[$nivel] = $siCompro;
					}
					
					$this->VerificarCompras($afiliado2->id_afiliado, $id_red,$nivel+1,$profundidad, $frecuencia);
					
				}
				
		}
		
	}
	
	private function DeterminarPremio($id_afiliado,$id_red){
		
		$premios = $this->modelo_premios->getPremiosActivos($id_red);
		
		foreach ($premios as $premio){
	
			$this->VerificarCompras($id_afiliado, $id_red, 0, $premio->nivel, $premio->frecuencia);
			//var_dump($this->afiliados); exit;
			
			$i=1;
			foreach ($this->afiliados as $num_afiliados){
				
				
				$ganoPremio = 0;
					if($premio->nivel == $i && $num_afiliados >= $premio->num_afiliados){
						$ganoPremio = 1;
					}
					
				$i++;
				if($ganoPremio != 0){
					$enviar = $this->RegistrarPremioAfiliado($id_afiliado,$premio->id, $premio->frecuencia);
					if($enviar){
						$this->EnviarMail($id_afiliado, $premio->id);
					}
				}
			}
			$i=0;
			foreach ($this->afiliados as $num_afiliados){
				$this->afiliados[$i] = 0;
				$i++;
			}
			
			unset($GLOBALS['afiliados']);
		}
	}

	private function RegistrarPremioAfiliado($id_afiliado, $id_premio, $frecuencia){
		return $this->modelo_premios->InsertarPremioAfiliado($id_premio,$id_afiliado, $frecuencia);
	}
	
	private function EnviarMail($id_afiliado, $id_premio){
	
		$datos = $this->modelo_premios->datosEmail($id_afiliado, $id_premio);
		$premio['usuario'] = $datos[0]->nombre;
		$premio['premio'] = $datos[0]->premio;
		$premio['descripcion'] = $datos[0]->descripcion;
		$premio['imagen'] = $datos[0]->imagen;
		//$this->load->view('email/Premio', $premio);
	
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($datos[0]->email);
		$this->email->subject('Confirmacion de pago por Banco');
		$this->email->message($this->load->view('email/Premio', $premio, TRUE));
		//$this->email->set_alt_message($this->load->view('email/activate-txt', $data, TRUE));
		$this->email->send();
	
	}
	
	function index()
	{	
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		
		$this->getAfiliadosRed($id);
		$numeroAfiliadosRed=count($this->afiliados);
		
		$style=$this->modelo_dashboard->get_style($id);

		$id_sponsor=$this->modelo_dashboard->get_red($id);
		$ultima=$this->modelo_dashboard->get_ultima($id);
	    $telefono=$this->modelo_dashboard->get_user_phone($id);
	    $email=$this->modelo_dashboard->get_user_email($id);
	    $username=$this->modelo_dashboard->get_user_name($id);
	    $pais=$this->modelo_dashboard->get_user_country_code($id);
	    
	    $cuentasPorPagar=$this->modelo_dashboard->get_cuentas_por_pagar_banco($id);
	    $notifies = $this->model_admin->get_notify_activos();


	     $name_sponsor= ($id_sponsor) ? $this->general->get_username($id_sponsor[0]->id_usuario) : '';

		$image=$this->modelo_dashboard->get_images($id);
		$fondo="/template/img/portada.jpg";
		$user="/template/img/avatars/male.png";
		
		foreach ($image as $img) {
			$url=getcwd().$img->url;
			if(file_exists($url)){
				$user=$img->url;
			}
		}
		
		$style=$this->modelo_dashboard->get_style($id);
		
		$actividad=$this->modelo_compras->is_afiliado_activo($id,date('Y-m-d'));

		$puntos_semana=$this->modelo_dashboard->get_puntos_personales_semana($id);
		$puntos_mes=$this->modelo_dashboard->get_puntos_personales_mes($id);
		$puntos_total=$this->modelo_dashboard->get_puntos_personales_total($id);
		
		$puntos_red_semana=$this->modelo_dashboard->get_puntos_red_semana($id);
		$puntos_red_mes=$this->modelo_dashboard->get_puntos_red_mes($id);
		$puntos_red_total=$this->modelo_dashboard->get_puntos_red_total($id);
		
		$ultimos_auspiciados=$this->modelo_dashboard->get_ultimos_auspiciados($id);
		
		$titulo=$this->titulo->getNombreTituloAlcanzadoAfiliado($id,date('Y-m-d'));
		
		$this->template->set("id",$id);
		$this->template->set("usuario",$usuario);
	    $this->template->set("telefono",$telefono);
	    $this->template->set("email",$email);
	    $this->template->set("username",$username);
	    $this->template->set("pais",$pais);
		$this->template->set("style",$style);
		$this->template->set("user",$user);
		$this->template->set("fondo",$fondo);
		$this->template->set("id_sponsor",$id_sponsor);
		$this->template->set("name_sponsor",$name_sponsor);
		$this->template->set("ultima",$ultima);
		$this->template->set("cuentasPorPagar",$cuentasPorPagar);
		$this->template->set("notifies",$notifies);
		$this->template->set("actividad",$actividad);
		
		$this->template->set("puntos_semana",$puntos_semana);
		$this->template->set("puntos_mes",$puntos_mes);
		$this->template->set("puntos_total",$puntos_total);
		$this->template->set("puntos_red_semana",$puntos_red_semana);
		$this->template->set("puntos_red_mes",$puntos_red_mes);
		$this->template->set("puntos_red_total",$puntos_red_total);
		
		$this->template->set("titulo",$titulo);
		
		$this->template->set("ultimos_auspiciados",$ultimos_auspiciados);
		
		$this->template->set("numeroAfiliadosRed",$numeroAfiliadosRed);
		
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/view_dashboard');
	}
	/**
	 * 
	 */private function getAfiliadosRed($id) {
		$redesUsuario=$this->model_tipo_red->cantidadRedesUsuario($id);
			
		foreach ($redesUsuario as $redUsuario){
			$red = $this->model_tipo_red->ObtenerFrontalesRed($redUsuario->id );
		
			if($red){
					
				if($red[0]->profundidad==0)
					$this->preOrdenRedProfundidadInfinita($id,$redUsuario->id,$red[0]->frontal);
				else
					$this->preOrdenRed($id,$redUsuario->id,$red[0]->frontal,$red[0]->profundidad);
			}
		}
	}

	
	function ConsultarPremio(){
		$id=$this->tank_auth->get_user_id();
		$infoPremios = $this->modelo_premios->verEstadoPremio($id);
		
		if($this->general->isAValidUser($id,"OV") == false)
		{
			redirect('/ov/compras/carrito');
		}
		
		$this->template->set("infoPremios",$infoPremios);
		$this->template->build('website/ov/perfil_red/premio');
	}
	
	function preOrdenRed($id,$id_red,$frontalidad,$profundidad){
	
		$datos = $this->modelo_compras->traer_afiliados_red_frontalidad_profundidad($id,$id_red,$frontalidad);
	
		foreach ($datos as $dato){
				
			if (($dato!=NULL)&&($profundidad>0)){
				array_push($this->afiliados, $dato);
				$this->preOrdenRed($dato->id_afiliado,$id_red,$frontalidad,$profundidad-1);
			}
		}
		$profundidad++;
	}
	
	function preOrdenRedProfundidadInfinita($id,$id_red,$frontalidad){
	
		$datos = $this->modelo_compras->traer_afiliados_red_frontalidad_profundidad($id,$id_red,$frontalidad);
	
		foreach ($datos as $dato){
			if (($dato!=NULL)){
				array_push($this->afiliados, $dato);
				$this->preOrdenRedProfundidadInfinita($dato->id_afiliado,$id_red,$frontalidad);
			}
		}
	}

	private function isViewBonos() {
		$query = "SELECT * FROM information_schema.TABLES
					WHERE table_name like 'vb_%'";
		
		$q=$this->db->query($query);
		$q= $q->result();
		
		if($q){
			echo "Se estan calculando los Bonos, Puedes Ingresar despues de unos minutos ...";
			sleep(3); 
			echo "<script>window.location.href='/auth/logout';</script>";		
			exit();
		}
		
	}	

}
