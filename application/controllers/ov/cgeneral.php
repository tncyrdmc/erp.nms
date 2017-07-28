<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class cgeneral extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('ov/modelo_general');
		$this->load->model('general');
		$this->load->model('ov/general');
		$this->load->model('ov/model_perfil_red');
		$this->load->model('ov/model_afiliado');
		$this->load->model('model_tipo_red');
		$this->load->model('model_planes');
		$this->load->model('model_datos_generales_soporte_tecnico');
		$this->load->model('model_cat_grupo_soporte_tecnico');
		$this->load->model('model_archivo_soporte_tecnico');
		$this->load->model('model_user_webs_personales');
			$this->load->model('bo/model_admin');
			$this->load->model('bo/modelo_dashboard');
		$this->load->model('bo/model_soporte_tecnico');
		$this->load->model('ov/model_cabecera');
		
		$this->load->model('ov/model_web_personal_reporte');
		$this->load->model('cemail');

	}
	function soporte_tecnico_ver_redes()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);
		
		$redes = $this->model_tipo_red->listarActivos();
		
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/soporte_tecnico_ver_redes');
	}
	
 function soporte_tecnico()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);
		$redes = $this->model_tipo_red->listarTodos();
		$id_red = $_GET['id_red'];
		
		$datos_generales = $this->model_datos_generales_soporte_tecnico->traer_por_red($id_red);
		
	
		$consultar_red=$this->model_soporte_tecnico->consultar_asignacion_de_soporte_a_usuario($id);
		
		if($consultar_red!=null){
			$this->model_soporte_tecnico->actualizar_asignacion_de_red_a_usuario($id);
		}else{
			$this->model_soporte_tecnico->asignar_red_de_soporte_a_usuario($id);
		}
		
		$this->template->set("style",$style);
		$this->template->set("redes",$redes);
		$this->template->set("id_red",$id_red);
		$this->template->set("datos_generales",$datos_generales);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/soporte_tecnico');
	}
	
	function listar_videos()
	{
		$id_red = $_GET['id_red'];
	
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
		$videos=$this->model_archivo_soporte_tecnico->get_video_usuarios();
		$grupos = $this->model_cat_grupo_soporte_tecnico->get_groups("VID", $id_red);
		$comentarios=$this->model_archivo_soporte_tecnico->get_comments();
		$data['videos']=$videos;
		$data['grupos']=$grupos;
		$data['comentarios']=$comentarios;
		$this->template->set("style",$style);
		$this->template->set("id_red",$id_red);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/ov/soporteTecnico/videos/listar',$data);
	}
	
	function listar_informacion()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
		$id_red = $_GET['id_red'];
		$archivos = $this->model_archivo_soporte_tecnico->Archivos_usuarios($id_red);
	
		$this->template->set("id_red",$id_red);
		$this->template->set("style",$style);
		$this->template->set("archivos",$archivos);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/ov/soporteTecnico/informacion/listar');
	}
	
	function chat()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		
		if($this->general->isAValidUser($id,"OV") == false)
		{
			redirect('/ov/compras/carrito');
		}
		
		$style=$this->general->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/menu_chat');
	}

	function chat_soporte(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		 
		$var=$_GET['id'];
		if (!($_COOKIE['red1']=="2")){
			header("Refresh:0;url='/ov/cgeneral/chat_soporte?id=red_soporte'");
		}
	
		include_once("cometchat/model_soporte_chat.php");
		$chat_r=new Red_chat;
		$chat_r->red_soporte();
	
		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);
	
		$this->template->set("style",$style);
		 
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		 
		 
		$this->template->build('website/ov/general/chat_red');
	}
	
		function chat_red()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/chat_red');
	}
	
	function redes_afiliado_chat(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
			
		$id=$this->tank_auth->get_user_id();
		
		if($this->general->isAValidUser($id,"OV") == false)
		{
			redirect('/ov/compras/carrito');
		}
		
		$style=$this->general->get_style($id);
		$this->template->set("style",$style);
	
			
		$redes_de_usuario = $this->model_tipo_red->RedesUsuario($id);
	
		$this->template->set("style",$style);
		$this->template->set("redes_de_usuario",$redes_de_usuario);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/seleccion_red');
	}
	
	function chat_social()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/chat_social');
	}
	
	/*function videollamada()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/videollamada');
	}*/

	function web_personal()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		
		if($this->general->isAValidUser($id,"OV") == false)
		{
			redirect('/ov/compras/carrito');
		}
		
		$style=$this->general->get_style($id);
		$username = 0;
		
		$afiliado= $this->model_user_webs_personales->traer_afiliado($id);
		$username = $afiliado[0]->username;
		$datos_web_personal = $this->model_user_webs_personales->listar_por_afiliado($username);
		
	    $consultar_datos_compra=$this->model_web_personal_reporte->consultar_ventas_web_personal_listar($id);
		
	    $this->template->set("style",$style);
		$this->template->set("username",$username);
		$this->template->set("datos_web_personal",$datos_web_personal);
		
	    $this->template->set("datos_compra",$consultar_datos_compra);
	    
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/web_personal');
	}
	
	
	function actualizar_clave_web_personal()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		
		if($this->general->isAValidUser($id,"OV") == false)
		{
			redirect('/ov/compras/carrito');
		}
		
		$usuario=$this->general->get_username($id);
			
		$trimmed = $_POST['clave'];
		
		if ($_POST['vacio']==1){
			$this->model_user_webs_personales->insertar($_POST['username'], $trimmed);
		}
		else $this->model_user_webs_personales->actualizar($_POST['username'], $trimmed);
	
		$success = "El cambio se ha efectuado satisfactoriamente.";
		$this->session->set_flashdata('success', $success);
	
		redirect('/ov/cgeneral/web_personal');
	}
	
	function envia_mail_invitacion_web_personal()
	{
		$this->load->library('Email');
	
		$id=$this->tank_auth->get_user_id();
		
		if($this->general->isAValidUser($id,"OV") == false)
		{
			redirect('/ov/compras/carrito');
		}
		
		$email = $this->model_cabecera->get_mail($id);
		$email = $email[0]->email;
	
		$usuario = $this->general->get_username($id);
		$nombre = $usuario[0]->nombre." ".$usuario[0]->apellido;
		$username = 0;
		
		$afiliado= $this->model_user_webs_personales->traer_afiliado($id);
		$username = $afiliado[0]->username;
		
		$this->email->from($email, $nombre);
			
		$this->email->to($_POST['email_receptor']);
		
		$acceso = $this->model_user_webs_personales->traer_acceso_web_personal_afiliado($username);
		
		$mensaje = "Para tener acceso a mi tienda virtual debes acceder por medio de los siguientes datos:<br><br>
				 Username: ".$acceso[0]->username."<br>
				  Clave: ".$acceso[0]->clave;
		
		$this->email->message($mensaje);
		
		$this->email->subject("Invitación a mi tienda virtual en pekcell gold");
	
		if($this->email->send()){
			$success = "Se ha enviado el email Exitosamente .";

			$this->session->set_flashdata('success', $success);
			
			redirect('/ov/cgeneral/web_personal');
		}else{
			$error = "Por favor verificar la informacion e intentar nuevamente .";
		$this->session->set_flashdata('error', $error);
	
		redirect('/ov/cgeneral/web_personal');

		}
	}
	
	function encuestas()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);

		$this->template->set("style",$style);
		$encuestas=$this->modelo_general->get_encuestas();
		$data['encuestas']=$encuestas;
		$contestadas=$this->modelo_general->get_encuestas_contestadas($id);
		$data['contestadas']=$contestadas;
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/encuestas',$data);
	}
	function contestar_encuesta()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);

		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		if(isset($_GET['id']))
		{
			$id_encuesta=urldecode($_GET['id']);
			$encuesta=$this->modelo_general->get_encuesta($id_encuesta);
			$data['encuesta']=$encuesta;
			$preguntas=$this->modelo_general->get_preguntas($id_encuesta);
			$data['pregunta']=$preguntas;
			$respuestas=$this->modelo_general->get_respuestas($id_encuesta);
			$data['respuesta']=$respuestas;
			$this->template->build('website/ov/general/contestar_encuesta',$data);
		}
		else
		{
			$this->template->build('website/ov/general/contestar_encuesta');
		}
		
	}
	function guardar_encuesta()
	{
		$data=$_GET["info"];
		$data=json_decode($data,true);
		$id=$this->tank_auth->get_user_id();
		$this->db->query("insert into encuesta_contestada (id_encuesta,id_usuario) values (".$data['id'].",".$id.")");
		$encuesta_contestada=$this->db->insert_id();
		array_pop($data);
		foreach($data as $respuesta)
		{
			$pregunta=$this->modelo_general->get_pregunta($respuesta);
			$this->db->query("insert into encuesta_resultado (id_encuesta_contestada,id_pregunta,id_respuesta) 
			values (".$encuesta_contestada.",".$pregunta[0]->id_pregunta.",".$respuesta.")");

		}
	}
	function ver_resultados()
	{
		$respuestas=$this->modelo_general->get_resultados_encuesta($_GET['id']);
		for($j=0;$j<sizeof($respuestas);$j++)
		{
			echo '<tr>
					<td class="text-center" style="width: 40px;"><i class="fa fa-asterisk fa-2x text-muted"></i></td>
					<td>
						<h4>'
							.$respuestas[$j]->pregunta.
						'</a>
							
						</h4>
					</td>
					<td class="text-center hidden-xs hidden-sm">
						'.$respuestas[$j]->respuesta.'
					</td>
				</tr>';
		}
	}
	function se_contesto()
	{
		$user=$this->tank_auth->get_user_id();
		$contesto=$this->modelo_general->get_se_contesto($_POST["id"],$user);
		if(!isset($contesto[0]))
		{
			echo "no";
		}
		else {
			echo "si";
		}
	}
	function social_network()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);

		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/social');
	}
	function mensajes()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$style=$this->general->get_style($id);
		$mensaje=$this->modelo_general->get_mensaje($id);
		$afiliados=$this->modelo_general->get_afiliados($id);

		$this->template->set("style",$style);
		$this->template->set("mensaje",$mensaje);
		$this->template->set("afiliados",$afiliados);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/ov/header');
        $this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/mensajes');
	}
	function envia_sms()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}

		$id=$this->tank_auth->get_user_id();
		$this->modelo_general->envia_sms($id);
	}
	function del_sms()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$this->modelo_general->del_sms();
	}
	function get_sms()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		$mensaje=$this->modelo_general->get_sms();
		echo $mensaje[0]->mensaje;
	}
	function autoresponder(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
	
		$style=$this->modelo_dashboard->get_style($id);
		//$datos_banner=$this->model_admin->datos_banner();
			$img = $this->model_admin->img_banner();
		$this->template->set("style",$style);
	
		$empresa  = $this->model_admin->val_empresa_multinivel();
		$this->template->set("empresa",$empresa);
		$this->template->set("img",$img);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/view_autoresponder');

	}

	function Enviar_correos_autoresponder(){

		$correos=explode(",", $_POST['correos']);
		$i=0;
		
		$banner = $this->model_admin->img_banner();
		$empresa = $this->model_admin->val_empresa_multinivel();
		
		$data = array(
					'b_img' => $banner[0]->nombre_banner,
					'b_desc' => $banner[0]->descripcion,
					'b_link' => $empresa[0]->web,
					'email' => ''
			);
		
		foreach ($correos as $correo) {
			$data['email'] = $correo;
			(!$this->cemail->send_email(9,$correo,$data)) ? $i++ : '';
		}

		if($i>0){
			$mensaje = "Hubo un error al enviar uno de los correos.";
			$this->session->set_flashdata('mensaje', $mensaje);
			redirect('/ov/cgeneral/autoresponder');

		}

			$mensaje = "Los correos se han enviado correctamente";
			$this->session->set_flashdata('mensaje', $mensaje);
			redirect('/ov/cgeneral/autoresponder');

	}

	function validar_correo(){
		$correos=explode(",", $_POST['correos']);
		$i=0;
		foreach ($correos as $correo) {
			$email = preg_match(
				'/^[A-z0-9_\-.]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{1,}$/', $correo
			);
					if(!$email){
						$i++;
					}
		}

		if($i>0){
			echo "<script>
				  $('#botonsave').attr('disabled','disabled');
				  </script>
				";
		}else{
			echo "<script>
				  $('#botonsave').removeAttr('disabled');
				  </script>
				";
		}


	}
	
	function invitacion_afiliar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
		
		$id = $this->tank_auth->get_user_id();
		$style = $this->general->get_style($id);
		$this->template->set("id",$id);
		$this->template->set("style",$style);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
	
	
		if($id<=2)
			$cantidadRedes = $this->model_tipo_red->cantidadRedes();
			else
				$cantidadRedes = $this->model_tipo_red->cantidadRedesUsuario($id);
	
				if(sizeof($cantidadRedes)==0)
					redirect('/');
					if(sizeof($cantidadRedes)==1)
						redirect('/ov/cgeneral/invitar_red?id='.$cantidadRedes[0]->id);
	
						$redes = $this->model_tipo_red->RedesUsuario($id);
						$this->template->set("redes",$redes);
	
						$this->template->build('website/ov/general/invitar/redes');
	}
	
	function invitar_red()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id              = $this->tank_auth->get_user_id();
	
		
	
		$id_red          = $_GET['id'];
	
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
	
		if($id>2){
			$estaEnRed 	 = $this->model_tipo_red->validarUsuarioRed($id,$id_red);
	
			if(!$estaEnRed)
				redirect('/');
	
		}
	
		//$premium         = $red[0]->premium;
		$afiliados       = $this->model_perfil_red->get_afiliados($id_red, $id);
		$planes 		 = $this->model_planes->Planes();
	
		$image 			 = $this->model_perfil_red->get_images($id);
		$red_forntales 	 = $this->model_tipo_red->ObtenerFrontalesRed($id_red );
	
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
		$this->template->set("afiliados",$afiliados);
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("pais",$pais);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("img_perfil",$img_perfil);
		$this->template->set("red_frontales",$red_forntales);
		//$this->template->set("premium",$premium);
		$this->template->set("planes",$planes);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/general/invitar/afiliar_red');
	}
	
	function nuevo_invitado(){
	    //echo "dentro de botbox ";	
		
		//$datos_banner=$this->model_admin->datos_banner();
		$img = $this->model_admin->img_banner();
	
		$empresa  = $this->model_admin->val_empresa_multinivel();
		$this->template->set("empresa",$empresa);
		$this->template->set("img",$img);
		$this->template->set("debajo_de",$_POST['id_debajo']);
		$this->template->set("lado",$_POST['lado']);
		$this->template->set("red",$_POST['red']);
		
		$this->template->build('website/ov/general/invitar/ver');
		
	}
	
	function enviar_invitacion(){
		
		//echo "dentro de enviar";
		
		$red = $_POST['red'];
		$debajo_de = $_POST['debajo_de'];
		$lado = $_POST['lado'];
		$email = $_POST['email'];	
		$id = $this->tank_auth->get_user_id();
		
		$token = $this->general->new_invitacion($email,$red,$id,$debajo_de,$lado);
		
		$banner = $this->model_admin->img_banner(); 
		$sponsor = array(
				'name' => $this->model_perfil_red->get_nombres($id),
				'email' => $this->model_perfil_red->get_email($id),
				'tel' => $this->model_perfil_red->telefonos_group($id)
		);
		
		$data = array(
				'token' => $token,
				'email' => $email,
				'b_img' => $banner[0]->nombre_banner,
				'b_desc' => $banner[0]->descripcion,
				'sponsor_name' => $sponsor['name'],
				'sponsor_email' => $sponsor['email'],
				'sponsor_tel' => $sponsor['tel']
		);
		
		//$img = site_url(($data['b_img']) ? '/media/Empresa/'.$data['b_img'] : '/logo.png');
		echo ($this->cemail->send_email(8, $email, $data)) ? "Invitación Realizada con Exito. " : "Error al Enviar Invitación.";
		
	}


	
}
