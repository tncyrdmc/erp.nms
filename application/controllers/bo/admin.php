<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller
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
		$this->load->model('bo/model_bonos');
		$this->load->model('bo/model_mercancia');
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
		$this->template->build('website/bo/admin/main_dashboard');
	}
	function altas()
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
		
		$style           = $this->modelo_dashboard->get_style($id);
		$sexo            = $this->model_admin->sexo();
		$civil           = $this->model_admin->edo_civil();
		$tipo            = $this->model_admin->get_user_type();
		$tipo_fiscal     = $this->model_admin->tipo_fiscal();
		$pais            = $this->model_admin->get_pais();
		$productos       = $this->model_admin->get_mercancia();
		$estudios        = $this->model_admin->get_estudios();
		$ocupacion       = $this->model_admin->get_ocupacion();
		$tiempo_dedicado = $this->model_admin->get_tiempo_dedicado();
		$proveedores	 = $this->model_admin->get_proveedor();
		$promo			 = $this->model_admin->get_promo();
		$grupo			 = $this->model_admin->get_grupo();
		//$servicio		 = $this->model_admin->get_servicio();
		//$producto		 = $this->model_admin->get_producto();
		$combinado		 = $this->model_admin->get_combinado();
		$impuesto		 = $this->model_admin->get_impuesto();
		$tipo_mercancia	 = $this->model_admin->get_tipo_mercancia();
		$tipo_proveedor	 = $this->model_admin->get_tipo_proveedor();
		$empresa	     = $this->model_admin->get_empresa();
		$regimen	     = $this->model_admin->get_regimen();
		$zona	         = $this->model_admin->get_zona();
		$inscripcion	 = $this->model_admin->get_paquete();
		$tipo_paquete	 = $this->model_admin->get_tipo_paquete();

		$this->template->set("productos",$productos);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set("sexo",$sexo);
		$this->template->set("civil",$civil);
		$this->template->set("tipo",$tipo);
		$this->template->set("pais",$pais);
		$this->template->set("estudios",$estudios);
		$this->template->set("ocupacion",$ocupacion);
		$this->template->set("tiempo_dedicado",$tiempo_dedicado);
		$this->template->set("tipo_fiscal",$tipo_fiscal);
		$this->template->set("proveedores",$proveedores);
		$this->template->set("promo",$promo);
		$this->template->set("grupo",$grupo);
		$this->template->set("servicio",$servicio);
		$this->template->set("producto",$producto);
		$this->template->set("combinado",$combinado);
		$this->template->set("impuesto",$impuesto);
		$this->template->set("tipo_mercancia",$tipo_mercancia);
		$this->template->set("tipo_proveedor",$tipo_proveedor);
		$this->template->set("empresa",$empresa);
		$this->template->set("regimen",$regimen);
		$this->template->set("zona",$zona);
		$this->template->set("inscripcion",$inscripcion);
		$this->template->set("tipo_paquete",$tipo_paquete);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/bo/header');
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/admin/altas');
	}
	
	function paises()
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
		
		
		$id=$this->tank_auth->get_user_id();
		$style = $this->modelo_dashboard->get_style($id);
		$pais = $this->model_admin->get_pais();
		$this->template->set("pais",$pais);
		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/admin/paises');
	}
	
	function dato_pais_multiple()
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
		
		
		if(isset($_POST['pais_check']))
		{
			foreach ($_POST['pais_check'] as $key){

				$dato_pais=$this->model_admin->get_dato_pais_($key);
				echo "<h1>".$dato_pais[0]->Name."</h1>";
				echo '<form id="'.$key.'"  class="smart-form"><div class="row">
				<input name="pais" type="hidden" value="'.$key.'">
				<section class="col col-6">
					<label class="label">Idioma</label>';
				
				foreach ($dato_pais as $idioma)
				{
					echo '<label class="checkbox">';
					if($idioma->estatus=='ACT')
					{
						echo '<input type="checkbox" value="'.$idioma->Language.'" checked="checked" name="idioma[]">
						<i></i>'.utf8_decode($idioma->Language).'</label></li>';
					}
					else
					{
						echo '<input value="'.$idioma->Language.'" type="checkbox" name="idioma[]">
						<i></i>'.utf8_decode($idioma->Language).'</label></li>';
					}
				}
				echo '</section><section class="col col-6">';
				if($dato_pais[0]->estado_pais=="ACT")
				{
					echo '<label class="toggle">
						<input type="checkbox" checked="checked" name="estado_pais">
						<i data-swchoff-text="DES" data-swchon-text="ACT"></i>El país está</label>';
				}
				else
				{
					echo '<label class="toggle">
					<input type="checkbox" name="estado_pais" >
					<i data-swchoff-text="DES" data-swchon-text="ACT"></i>El país está</label>';
				}
				echo '</section><section class="col col-6">';
				if($dato_pais[0]->estatus_m=="ACT")
				{
					echo '<label class="toggle">
					<input type="checkbox" checked="checked" name="estado_moneda">
					<i data-swchoff-text="DES" data-swchon-text="ACT"></i> Moneda: '.$dato_pais[0]->moneda.'</label>';
				}
				else
				{
					echo '<label class="toggle">
					<input type="checkbox" name="estado_moneda">
					<i data-swchoff-text="DES" data-swchon-text="ACT"></i> Moneda: '.$dato_pais[0]->moneda.'</label>';
				}
				echo '</section></div></form>';
				echo "<hr />";
			}
			
		}
	}
	
	function use_keyword()
	{
		$use_keyword=$this->model_admin->use_keyword();
		if($use_keyword)
		{
			echo "La identificación no está disponible";
		}
	}
	function cuenta()
	{
		$cuenta = $this->model_admin->get_banco();
	}
	function new_user()
	{
		$id=$this->tank_auth->get_user_id();
		$this->model_admin->new_user($id);
	}
	function new_empresa()
	{
		
		$empresa = $this->model_admin->new_empresa();
		echo json_encode($empresa);
	}
	
	function empresa_multinivel()
	{	
		$empresa = $this->model_admin->empresa_multinivel();
		echo $empresa 
		? "Se ha actualizado los datos de la Empresa Multinivel" 
		: "No se ha podido actualizar los datos de la Empresa Multinivel";
	}
	
	function entorno_empresa()
	{
		$empresa = $this->model_admin->entorno_empresa();
		echo $empresa
		? "Se ha actualizado los datos de configuración"
		: "No se ha podido actualizar los datos de configuración";
	}

	function new_proveedor()
	{
		$id=$this->tank_auth->get_user_id();
		$this->model_admin->new_proveedor($id);
	}
	function estado_mercancia()
	{
		$this->model_admin->estado_mercancia();
	}
	
	function del_merc()
	{
		$id = $_POST['id'];
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
			
		$idu=$this->tank_auth->get_user_id();
		
		if($this->general->isAValidUser($idu,"comercial")||$this->general->isAValidUser($idu,"logistica"))
		{
		}else{
			redirect('/auth/logout');
		}
		$validar_venta=$this->model_admin->validar_venta($id);
		$validar_actividad=$this->model_admin->validar_actividad($id);
		$esta = $this->model_admin->ver_si_merc_ha_sido_vendida($id);

		if($validar_venta==null && $validar_actividad==null){
		if ($esta == NULL){
			
			$datos = $this->model_admin->del_merc($id);
			
			if(unlink($_SERVER['DOCUMENT_ROOT'].$datos[0]->url)){
				//echo "File Deleted.";
			}
			
			$this->model_admin->del_tipo_merc($datos[0]->id_tipo_mercancia, $datos[0]->sku);
			$this->model_admin->del_imagen($datos[0]->id_img);
			$this->model_admin->del_cross_imagen_merc($datos[0]->id_img);
			
			echo "Se ha eliminado la mercancia.";
		}
		else {
			echo "Ha ocurrido un error eliminando la mercancia, debido a que la mercancia tiene un historial de ventas.
					<br> Lo mas recomendable es que desactive la mercancia del carrito de compras.";
		}
		}else{
			echo "No se puede eliminar la mercancia, debido a que esta asociado a un bono.
			<br> Lo mas recomendable es que desactive la mercancia del carrito de compras.";
		}
	}
	
	function new_grupo()
	{
		$this->model_admin->new_grupo();
	}
	function edit_merc()
	{
		/*if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
			
		$id=$this->tank_auth->get_user_id();
		
	 	if($this->general->isAValidUser($id,"comercial")||$this->general->isAValidUser($id,"logistica"))
		{
		
		}else{
			redirect('/auth/logout');
		}*/
		
		//$style = $this->modelo_dashboard->get_style(1);
		//$usuario = $this->general->get_username($id);
		
		$promo          = $this->model_admin->get_promo();
		$grupos         = $this->model_mercancia->CategoriasMercancia();
		$servicio       = $this->model_admin->get_servicio();
		$producto       = $this->model_admin->get_producto();
		$combinado      = $this->model_admin->get_combinado();
		$impuesto       = $this->model_admin->get_impuesto();
		$tipo_mercancia = $this->model_admin->get_tipo_mercancia();
		$tipo_proveedor = $this->model_admin->get_tipo_proveedor();
		$empresa        = $this->model_admin->get_empresa();
		$regimen        = $this->model_admin->get_regimen();
		$zona           = $this->model_admin->get_zona();
		$merc           = $this->model_admin->mercancia_by_id();
		$pais           = $this->model_admin->get_pais_activo();
		$id_merc 		= $merc[0]->id_tipo_mercancia;
		$sku			= $merc[0]->sku;
		$red          = $this->model_admin->get_red();
		$data_merc 		= $this->model_admin->get_data_mercancia($id_merc,$sku);
		$img       		= $this->model_admin->get_img_merc();
		$mercancia 		= $this->model_admin->get_mercancia_espec($_POST['id']);
		$impuestos_merc	= $this->model_admin->get_impuestos_mercancia($_POST['id']);
		
		
		$this->template->set("grupos",$grupos);
		echo '<div class="row">
				<form class="smart-form" id="update_merc" name="update_merc" method="post" action="/bo/admin/update_mercancia" enctype="multipart/form-data" >  
			<h3><center><b>Editar mercancía '.$data_merc[0]->nombre.'</b></center></h3>';
		if($id_merc==1)
		{
			
			$id=$this->tank_auth->get_user_id();
			
			$id_mercancia = $_POST['id'];
			$proveedores    = $this->model_admin->get_proveedor2(1);
			
			$this->template->set("id_mercancia",$id_mercancia);
			$this->template->set("data_merc",$data_merc);
			//$this->template->set("grupo",$grupo);
			$this->template->set("img",$img);
			$this->template->set("mercancia",$mercancia);
			$this->template->set("proveedores",$proveedores);
			$this->template->set("pais",$pais);
			$this->template->set("impuestos_merc",$impuestos_merc);
			$this->template->set("impuesto",$impuesto);
			//$this->template->set("style",$style);
			$this->template->build('website/bo/comercial/altas/modificar_producto');
		}elseif($id_merc==2)
		{
			$id_mercancia = $_POST['id'];
			
			$proveedores    = $this->model_admin->get_proveedor2(2);
			$this->template->set("id_mercancia",$id_mercancia);
			$this->template->set("data_merc",$data_merc);
			//$this->template->set("red",$red);
			$this->template->set("img",$img);
			$this->template->set("mercancia",$mercancia);
			$this->template->set("proveedores",$proveedores);
			$this->template->set("pais",$pais);
			$this->template->set("impuestos_merc",$impuestos_merc);
			$this->template->set("impuesto",$impuesto);
			//$this->template->set("style",$style);
			$this->template->build('website/bo/comercial/altas/modificar_servicio');
			}elseif($id_merc==3)
			{
				$prods=$this->model_admin->get_prod_combinado($_POST['id']);
				$servs=$this->model_admin->get_serv_combinado($_POST['id']);
				$proveedores    = $this->model_admin->get_proveedor2(3);
				$servicioPorPais= $this->model_admin->get_servicio_pais($_POST['pais']);
				$productoPorPais=$this->model_admin->get_producto_pais($_POST['pais']);
				//$prods=0;
				$id_mercancia = $_POST['id'];
				
				
				$this->template->set("id_mercancia",$id_mercancia);
				$this->template->set("data_merc",$data_merc);
				$this->template->set("red",$red);
				$this->template->set("img",$img);
				$this->template->set("mercancia",$mercancia);
				$this->template->set("proveedores",$proveedores);
				$this->template->set("pais",$pais);
				$this->template->set("impuestos_merc",$impuestos_merc);
				$this->template->set("impuesto",$impuesto);
				$this->template->set("prods",$prods);
				$this->template->set("servs",$servs);
				$this->template->set("producto",$productoPorPais);
				$this->template->set("servicio",$servicioPorPais);
				//$this->template->set("style",$style);
				$this->template->build('website/bo/comercial/altas/modificar_combinado');	
		}elseif($id_merc==4)
		{
				$prods=$this->model_admin->get_prod_paquete($_POST['id']);
				$servs=$this->model_admin->get_serv_paquete($_POST['id']);
				$servicioPorPais= $this->model_admin->get_servicio_pais($_POST['pais']);
				$productoPorPais=$this->model_admin->get_producto_pais($_POST['pais']);
				$id_mercancia = $_POST['id'];
				
				
				$this->template->set("id_mercancia",$id_mercancia);
				$this->template->set("data_merc",$data_merc);
				$this->template->set("red",$red);
				$this->template->set("img",$img);
				$this->template->set("mercancia",$mercancia);
				$this->template->set("pais",$pais);
				$this->template->set("impuestos_merc",$impuestos_merc);
				$this->template->set("impuesto",$impuesto);
				$this->template->set("prods",$prods);
				$this->template->set("servs",$servs);
				$this->template->set("producto",$productoPorPais);
				$this->template->set("servicio",$servicioPorPais);
				//$this->template->set("style",$style);
				$this->template->build('website/bo/comercial/altas/modificar_paquete');	
		}elseif($id_merc==5){
			$id_mercancia = $_POST['id'];
			$proveedores    = $this->model_admin->get_proveedor2(1);
			$proveedores    = $this->model_admin->get_proveedor2(2);
			$this->template->set("id_mercancia",$id_mercancia);
			$this->template->set("data_merc",$data_merc);
			//$this->template->set("red",$red);
			$this->template->set("img",$img);
			$this->template->set("mercancia",$mercancia);
			$this->template->set("proveedores",$proveedores);
			$this->template->set("pais",$pais);
			$this->template->set("impuestos_merc",$impuestos_merc);
			$this->template->set("impuesto",$impuesto);
			$this->template->build('website/bo/comercial/altas/modificar_membresia');	
		}
	}
	
	function new_mercancia()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}

		$usuario=$this->general->get_username($id);

		if(!isset($_POST['proveedor']))
			$_POST['proveedor']='Ninguno';
		
		$id=$this->tank_auth->get_user_id();
		$sku=$this->model_admin->new_mercancia();

		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';

		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_multi_upload('img'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->get_multi_upload_data());
			if($_POST['tipo_mercancia']==3&&$_POST['tipo']==2)
				$this->model_admin->img_merc_promo($sku,$data["upload_data"]);
			else
				$this->model_admin->img_merc($sku,$data["upload_data"]);
		}
		redirect('/bo/comercial/index');
	}
	function use_mail()
	{
		$use_mail=$this->model_admin->use_mail();
		if($use_mail)
		{
			echo "La cuenta de correo ya no está disponible";
		}
	}
	function actualiza_pais()
	{
		$this->model_admin->update_pais();
	}
	function afiliar_nuevo()
	{
		$id=$this->tank_auth->get_user_id();
		$this->model_admin->afiliar_nuevo($id);
	}
	function use_username()
	{
		$use_username=$this->model_admin->use_username();
		if($use_username)
		echo "El usuario no está disponible";
	}
	function dato_pais()
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
		
		$dato_pais=$this->model_admin->get_dato_pais();
		
		if(!isset($dato_pais[0]->estado_pais)){
			return 0;
		}
		
		echo '<form id="'.$_POST['pais'].'"  class="smart-form"><div class="row">
		<input name="pais" type="hidden" value="'.$_POST['pais'].'">
		<section class="col col-6">
			<label class="label">Idioma</label>';
		
		$activado = '';
		
		foreach ($dato_pais as $idioma)
		{
			
			$activado = ($idioma->estatus=='ACT') ? 'checked="checked"' : '';
			
			echo '<label class="checkbox">
					<input type="checkbox" value="'.$idioma->Language.'" '.$activado.' name="idioma[]">
			<i></i>'.$idioma->Language.'
					</label>';
			
		}
		echo '</section><section class="col col-6">';
		
		$activado = ($dato_pais[0]->estado_pais=="ACT") ? 'checked="checked"' : '';
		
		echo '<label class="toggle">
				<input type="checkbox" '.$activado.' name="estado_pais">
				<i data-swchoff-text="DES" data-swchon-text="ACT"></i>El país está</label>';
		
		echo '</section><section class="col col-6">';
		
		$activado = ($dato_pais[0]->estatus_m=="ACT") ? 'checked="checked"' : '';
		
		echo '<label class="toggle">
			<input type="checkbox" '.$activado.' name="estado_moneda">
			<i data-swchoff-text="DES" data-swchon-text="ACT"></i> Moneda: '.$dato_pais[0]->moneda.'</label>';
		
		echo '</section></div></form>';

	}
	function cp()
	{
		if(strlen($_POST['cp'])>3)
		{
			$busqueda=$this->model_admin->cp();
			if($busqueda)
			{
				$id_estado=$busqueda[0]->id_estado;
				$estado=$this->model_admin->estado($id_estado);

				echo '<section id="colonia" class="col col-2">Colonia
						<label class="select">
						<select name="colonia">';
				foreach ($busqueda as $key)
				{
					echo' <option value="'.$key->colonia.'">'.$key->colonia.'</option>';
				}
				echo '</select> <i></i> </label>
					</section>
					<section id="municipio" class="col col-2">Municipio
						<label class="select">
						<select name="municipio">';
				foreach ($busqueda as $key)
				{
					echo '<option value="'.$key->municipio.'">'.$key->municipio.'</option>';
						
				}
				echo '</select> <i></i> </label>
					</section>
					<section id="estado" class="col col-2">Estado
						<label class="select">
						<select name="estado">';
				foreach ($estado as $key)
				{
					echo'<option value="'.$key->id_estado.'">'.$key->descripcion.'</option>';
				}
				echo '</select> <i></i> </label>
					</section>';
			}
			else
			{
				echo'<section id="colonia" class="col col-2">
					<label class="input">
						Colonia
						<input type="text" name="colonia" >
					</label>
				</section>
				<section id="municipio" class="col col-2">
					<label class="input">
						Municipio
						<input type="text" name="municipio" >
					</label>
				</section>
				<section id="estado" class="col col-2">
					<label class="input">
						Estado
						<input type="text" name="estado">
					</label>
				</section>';
			}
		}
	}
	function cp_proveedor()
	{
		if(strlen($_POST['cp'])>3)
		{
			$busqueda=$this->model_admin->cp();
			if($busqueda)
			{
				$id_estado=$busqueda[0]->id_estado;
				$estado=$this->model_admin->estado($id_estado);

				echo '<section id="colonia_proveedor" class="col col-2">Colonia
						<label class="select">
						<select name="colonia">';
				foreach ($busqueda as $key)
				{
					echo' <option value="'.$key->colonia.'">'.$key->colonia.'</option>';
				}
				echo '</select> <i></i> </label>
					</section>
					<section id="municipio_proveedor" class="col col-2">Municipio
						<label class="select">
						<select name="municipio">';
				foreach ($busqueda as $key)
				{
					echo '<option value="'.$key->municipio.'">'.$key->municipio.'</option>';
						
				}
				echo '</select> <i></i> </label>
					</section>
					<section id="estado_proveedor" class="col col-2">Estado
						<label class="select">
						<select name="estado">';
				foreach ($estado as $key)
				{
					echo'<option value="'.$key->id_estado.'">'.$key->descripcion.'</option>';
				}
				echo '</select> <i></i> </label>
					</section>';
			}
			else
			{
				echo '<section id="colonia_proveedor" class="col col-2">
					<label class="input">
						Colonia
						<input type="text" name="colonia" >
					</label>
				</section>
				<section id="municipio_proveedor" class="col col-2">
					<label class="input">
						Municipio
						<input type="text" name="municipio" >
					</label>
				</section>
				<section id="estado_proveedor" class="col col-2">
					<label class="input">
						Estado
						<input type="text" name="estado">
					</label>
				</section>';
			}
		}
	}
	function kill_grupo()
	{
		$this->model_admin->kill_grupo();
	}
	function new_impuesto()
	{
		$this->model_admin->new_impuesto();
	}
	
	function new_retencion()
	{
		$this->model_admin->new_retencion($_POST['desc'],$_POST['porc'],$_POST['duracion']);
		echo "Se ha creado la Retencion";
		//redirect('/bo/configuracion/listar_retenciones');
	}
	
	function new_impuestos()
	{
		$this->model_admin->new_impuestos($_POST['desc'],$_POST['porc'],$_POST['pais']);
		echo "Se ha creado el Impuesto";
		//redirect('/bo/configuracion/listar_impuestos');
	}
	
	function kill_impuesto()
	{
		$siseelimino = $this->model_admin->kill_impuesto();
		
		if($siseelimino){
			echo "Se ha eliminado el impuesto.";
		}else{
			echo "No se ha logrado eliminar el impuesto debido a que hay productos con este impuesto asignado.";
		}
	}
	
	function kill_retencion()
	{
		$this->model_admin->kill_retencion();
	}
	
	function kill_tipo_red()
	{
		$id = $_POST['id'];
		
		$esta = $this->model_admin->ver_si_red_tiene_categorias($id);
		$afiliados = $this->model_admin->ver_afiliados_red($id);
		$validar=$this->model_bonos->validar_bono_red($id);
		
		if ($validar == null && $esta == NULL && $afiliados == 0){
			
			$this->model_admin->kill_tipo_red($id);
			echo "Se ha eliminado la red.";
		}
		else if($afiliados == 1){
			echo "Ha ocurrido un error eliminando la red, debido a que tiene afiliados.";
		}else if($validar){
			echo "Ha ocurrido un error eliminando la red, debido a que tiene bonos asociados.";
		}else{
			echo "Ha ocurrido un error eliminando la red, debido a que tiene categorias creadas.
					<br> Lo mas recomendable es que elimine las categorias.";
		}
		
	}
	
	function update_mercancia()
	{		
		$this->model_admin->update_mercancia();
		
		$ruta="/media/carrito/";
		//definimos la ruta para subir la imagen
		$config['upload_path'] 		= getcwd().$ruta;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_width']  		= '4096';
		$config['max_height']   	= '3112';

		//Cargamos la libreria con las configuraciones de arriba
		$this->load->library('upload', $config);
		//Preguntamos si se pudo subir el archivo "foto" es el nombre del input del dropzone
		if (!$this->upload->do_upload('img'))
		{
			/*$error = array('error' => $this->upload->display_errors());
			print_r($error);*/
		}
		else
		{	
			$sku = $_POST['id_merc'];
			
			$id_img = $this->model_admin->traer_id_imagen_merc($sku);
			
			$datos = $this->model_admin->traer_foto($sku);
			
		/*	if(unlink($_SERVER['DOCUMENT_ROOT'].$datos[0]->url)){
				//echo "File Deleted.";
			}
			*/
			
			$this->model_admin->del_imagen($id_img[0]->id_cat_imagen);
			
			
			
			$data = array('upload_data' => $this->upload->data());
			$this->model_admin->img_merc($sku,$data["upload_data"]["file_name"]);
		}
			$msj = "Se ha modificado la mercancia.";
			$this->session->set_flashdata('msj', $msj);
		redirect("/bo/comercial/listarMercancia");
	}
	
	function detalle_paquete()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		if($usuario[0]->id_tipo_usuario!=1)
		{
			redirect('/auth/logout');
		}
		
		
		$id_paquete   = $_POST['id'];
		$paquete_merc = $this->model_admin->get_paquete_mercancia($id_paquete);
		$detalles     = $this->model_admin->detalle_paquete($id_paquete);

		$this->template->set("tipo_paquete",$tipo_paquete);
		$this->template->set("paquete_merc",$paquete_merc);
	}
	function alta_paquete()
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
		
		
		echo "Por favor sea paciente estamos trabajando en actualizar esta sección";

	}
}