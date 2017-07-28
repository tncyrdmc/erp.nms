<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cemail extends CI_Model
{
	
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('config');
		$this->lang->load('tank_auth');
		$this->load->model('general');
		$this->load->model('bo/model_admin');
		$this->load->model('model_emails_departamentos');
		
		$this->load->library('email');		
		
	}
	
	function send_email($type, $email, $data)
	{
		$message = $this->setMessage($type,$data);
		$tema = $message['tema'];
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject($tema);
		$this->email->message($this->load->view('email/template-html', $message, TRUE));
		$this->email->set_alt_message($this->load->view('email/template-txt', $message, TRUE));
		$this->email->send();
		
		return true;
	}
	
	function setMessage($type,$data){
		
		$empresa = $this->model_admin->val_empresa_multinivel();		
		$cuerpo = $this->get_cuerpo_mensaje($type,$data);		
		$tema = $this->model_emails_departamentos->get_tema($type);
		$email = $this->config->item('webmaster_email', 'tank_auth');
				//$this->model_emails_departamentos->get_departamento_email($type);		
		
		$message = array (
				'tema' => $tema,
				'asunto' => $cuerpo['asunto'],
				'contenido' => $cuerpo['contenido'],
				'sumario' => $cuerpo['sumario'],
				'fijo' => $empresa[0]->fijo,
				'movil' => $empresa[0]->movil,
				'email' => $email,
				'web' => $empresa[0]->web
		);
		
		return $message;
	}
	
	function get_cuerpo_mensaje($type,$data){		
		
		$type--;
		 
		$asunto = $this->Asuntos($type);
		$contenido = $this->Contenidos($type,$data);
		$sumario = $this->Sumarios($type,$data);
		
		$cuerpo = array(
				'asunto' => $asunto,
				'contenido' => $contenido,
				'sumario' => $sumario
		);
		
		return $cuerpo;
	}
	
	function Asuntos ($type){		
		$q = array(
				"TE DAMOS LA BIENVENIDA", //welcome
				"ACTIVACIÓN", //activate
				"CONFIRMACIÓN NUEVO EMAIL", //change-email
				"PAGO DE SOLICITUD DE DINERO", //cobros
				"CONFIRMACIÓN DE PAGO POR BANCO", //cuentas-cobrar
				"RECUPERACIÓN DE CONTRASEÑA", //forgot-password
				"CONFIRMACIÓN DE NUEVA CONTRASEÑA", //reset-password
				"INVITACION AL MULTINIVEL", //invitacion
				"BANNER PROMOCIONAL", //autoresponder
				"TRANSACCION DE BILLETERA", //transaccion-empresa
				"RECIBO DE COMPRA DESDE CEDI" //compra-cedi
		);
		
		return $q[$type]; 		
	}
	
	function Sumarios ($type,$data){
		$q = array(
				($type==0) ? "Hola ".$data['username'].", te damos la bienvenida a tu oficina virtual de ".$data['site_name']."." : "", //welcome 
				($type==1) ? "Bienvenido, ".$data['username']." Ha sido registrado en nuestro sistema." : "", //activate
				($type==2) ? "Your new email address on ".$data['site_name']."." : "", //change-email
				($type==3) ? "Hola ".$data['username'].", Su peticion de pago esta siendo procesada." : "", //cobros
				($type==4) ? "Hola ".$data['username'].", Su pago se ha recibido." : "", //cuentas-cobrar
				($type==5) ? "Hi, ".$data['username']."." : "", //forgot-password
				($type==6) ? "Tu nueva contraseña en ".$data['site_name']."." : "", //reset-password
				($type==7) ? "Hola, ".$data['email'].", Te han invitado a afiliarte." : "", //invitacion
				($type==8) ? "Gusto en Conocerte, ".$data['email']."." : "" , //autoresponder
				($type==9) ? "Apreciado ".$data['username'].", Se ha realizado una transacción por parte de la Empresa." : "", //transaccion-empresa
				($type==10) ? "Apreciado ".$data['nombres'].", Se ha realizado una Compra desde nuestros CEDI." : "" //compra-cedi
		);
	
		return $q[$type];
	}
	
	function Contenidos ($type,$data){		
		
		$sitios = array(
				site_url(''),
				site_url('/auth/login/'),
				site_url((isset($data['user_id'])&&isset($data['new_email_key'])) ? '/auth/activate/'.$data['user_id'].'/'.$data['new_email_key'] : ''),
				site_url((isset($data['user_id'])&&isset($data['new_email_key'])) ? '/auth/reset_email/'.$data['user_id'].'/'.$data['new_email_key'] : ''),
				site_url((isset($data['user_id'])&&isset($data['new_pass_key'])) ?'/auth/reset_password/'.$data['user_id'].'/'.$data['new_pass_key'] : ''),				
				site_url(isset($data['token']) ? '/key/invitacion/'.$data['token'] : ''),
				site_url(isset($data['b_img']) ? '/media/Empresa/'.$data['b_img'] : '/logo.png')
		);
		
		$validar = array (
				'username' 	=>isset($data['username']) ? "Nombre de usuario: ".$data['username'] : "",
				'password' 	=>isset($data['password']) ? "Contraseña: ".$data['password'] : "",
				'id_cobro'	=>isset($data['id_cobro']) ? "ID de Cobro: ".$data['id_cobro'] : "",
				'id_venta'	=>isset($data['id_venta']) ? "ID venta: ".$data['id_venta'] : "",
				'id_transaccion'	=>isset($data['id_transaccion']) ? "ID de Transacción: ".$data['id_transaccion'] : "",
				'fecha'		=>isset($data['fecha']) ? "Fecha de Solicitud: ".$data['fecha'] : "",
				'nombres'	=>isset($data['nombre']) &&  ($data['apellido'])  ? "Nombre y apellido: ".$data['nombre']." ".$data['apellido'] : "",
				'banco'		=>isset($data['banco']) ? "Banco: ".$data['banco'] : "",
				'cuenta'	=>isset($data['cuenta']) ? "Numero de Cuenta: ".$data['cuenta'] : "",
				'titular'	=>isset($data['titular']) ? "Titular de cuenta: ".$data['titular'] : "",
				'clave'		=>isset($data['clave']) ? "CLABE: ".$data['clave'] : "",
				'monto'		=>isset($data['monto']) ? "Valor de Cobro: $ ".$data['monto'] : "",
				'monto_t'		=>isset($data['monto_t']) ? "Valor de la transacción: $ ".$data['monto_t'] : "",
				'descripcion_t'		=>isset($data['descripcion_t']) ? "Motivo la transacción: <br/><em class='callout'> ".$data['descripcion_t']."<em/>" : "",
				'valor'		=>isset($data['valor']) ? "Valor de pago: $ ".$data['valor'] : "",
				'sponsor_tel'	=>isset($data['sponsor_tel']) ? "Telefonos fijos y/o moviles: ".$data['sponsor_tel'] : "",
				'tipo_t'	=>isset($data['tipo_t']) ? "Informamos que la empresa le ha <strong>".$data['tipo_t']." Dinero</strong> a su billetera," : "",
				'factura'	=>isset($data['factura']) ? "Se anexa recibo de compra: <br/><br/>".$data['factura'] : ""
		);
		
		$welcome = ($type==0) ? '<p class="callout">
								Para ingresar al sitio de clic <a class="btn" href="'.$sitios[1].'">Aqui!</a>
						</p><!-- /Callout Panel -->						
						<p>Si el link no funciona copie y pegue la siguiente direccion en su navegador 
						<a href="'.$sitios[1].'"></a>'.$sitios[1].'</p>						
						<p>'.$validar['username'].'<br /></p>
						<p>Correo: '.$data['email'].'</p>
						<p>'.$validar['password'].'<br /></p>
						<p>Id del Usuario: '.$data['lst_id'][0]->id.'</p>' : '';
		
		$activate = ($type==1) ? '<p class="callout">
							Para completar tu registro ingresa a este link 
						<a class="btn" href="'.$sitios[2].'"><h3>Aqui!</h3></a>
						</p><!-- /Callout Panel -->						
						<p>Si el link no funciona copie y pegue la siguiente direccion en su navegador 
							<a href="'.$sitios[2].'"></a>
						'.$sitios[2].'</p>						
						<p class="callout">El link funcionara durante '.$data['activation_period'].' horas, 
						de no ser activada su cuenta tu registro sera invalido y deberas ser afiliado por otro usuario nuevamente.</p>
						<p>'.$validar['username'].'<br/></p>
						<p>Correo: '.$data['email'].'</p><br />
						<p>'.$validar['password'].'<br/></p>' : '';
		
		$change_email = ($type==2) ? 'You have changed your email address for '.$data['site_name'].'<br />
						Follow this link to confirm your new email address:<br />
						<br />
						<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b>
						<a href="'.$sitios[3].'" >
						Confirm your new email</a></b></big><br />
						<br />
						Link doesn`t work? Copy the following link to your browser address bar:<br />
						<nobr><a href="'.$sitios[3].'">
						'.$sitios[3].'</a></nobr><br />
						<br />
						<br />
						Your email address: '.$data['new_email'].'<br />
						<br />
						<br />
						You received this email, because it was requested by a <a href="'.$sitios[0].'" >'.$data['site_name'].'
						</a> user. If you have received this by mistake, please DO NOT click the confirmation link, and simply delete this email. 
						After a short time,the request will be removed from the system.<br />' : '';
		
		$cobros = ($type==3) ? '<p class="callout">
							El pago se realizara en las proximas 24 horas con los siguientes datos:
						</p><!-- /Callout Panel -->						
						<p>'. $validar['id_cobro'].'<br /></p>
						<p>'. $validar['fecha'].'<br /></p>
						<p>'. $validar['username'].'<br /></p>
						<p>Correo: '.$data['email'].'</p><br/>
						<p>'. $validar['nombres'].'<br /></p>	
						<p>'. $validar['banco'].'<br /></p>
						<p>'. $validar['cuenta'].'<br /></p>
						<p>'. $validar['titular'].'<br /></p>
						<p>'. $validar['clave'].'<br /></p><br/>
						<p>'. $validar['monto'].'<br /></p>' : '';
		
		$cuentas_cobrar = ($type==4) ? '<p class="callout">
							Recibimos su confirmacion sobre la transaccion con los siguientes datos:
						</p><!-- /Callout Panel -->						
						<p>'. $validar['id_venta'].'<br /></p>
						<p>'. $validar['fecha'].'<br /></p>
						<p>'. $validar['username'].'<br /></p>
						<p>Correo: '.$data['email'].'</p><br/>
						<p>'. $validar['nombres'].'<br /></p>	
						<p>'. $validar['banco'].'<br /></p>
						<p>'. $validar['cuenta'].'<br /></p>
						<p>'. $validar['valor'].'<br /></p> ' : '';
		
		$forgot_password = ($type==5) ? '<a href="'.$sitios[4].'" >
						<h5>Da click aquí para recuperar tu contraseña</h5></a><br />
						<br />
						¿El link no funciona? Copia y pega en la barra de direcciones de tu navegador el siguiente link.<br />
						El link solo funciona una sola vez.<br />
						<nobr><a href="'.$sitios[4].'">
						'.$sitios[4].'></a></nobr><br />
						Has recibido este correo desde <a href="'.$sitios[0].'" >
						'.$data['site_name'].'</a> como solicitud de una recuperación de contraseña, si no has sido tú, puedes ignorarlo.<br />': '';
		
		$reset_password = ($type==6) ? '<p>Has cambiado tu contraseña.<br />
						Por favor , mantenga en sus registros para que no se olvide.<br />
						<br />
						'.$validar['username'].'<br />
						Tu correo: '.$data['email'].'<br />
						Tu nueva contraseña: '.$data['new_password'].'<br /></p>': '';
		
		$invitacion = ($type==7) ? '<img src="'.$sitios[6].'" alt="" width="100%"/> <br/><hr/>
						<p class="lead">'.$data['b_desc'].'</p>
						<p class="callout">
								Para afiliarse al sitio de clic <a class="btn" href="'.$sitios[5].'">Aqui!</a>
						</p><!-- /Callout Panel -->
						<p>Si el link no funciona copie y pegue la siguiente direccion en su navegador
						<a href="'.$sitios[5].'">'.$sitios[5].'</a></p><br /><br />
						<h4>Datos del Sponsor</h4><br />
						<p>Nombre Completo: '.$data['sponsor_name'].'<br /></p>
						<p>Correo: '.$data['sponsor_email'].'<br /></p>
						<p>'.$validar['sponsor_tel'].'<br /></p>': '';
		
		$autoresponder = ($type==8) ? '<img src="'.$sitios[6].'" alt="" width="100%"/> <br/><hr/>
						<p class="lead">'.$data['b_desc'].'</p>
						<p class="callout">
								Para mas informacion de click <a class="btn" href="'.$data['b_link'].'">Aqui!</a>
						</p><!-- /Callout Panel -->
						<p>Si el link no funciona copie y pegue la siguiente direccion en su navegador
						<a href="'.$data['b_link'].'">'.$data['b_link'].'</a></p><br /><br />': '';
		
		$transaccion = ($type==9) ? '<p class="callout">
							'.$validar['tipo_t'].' los siguientes son los datos de la transacción:
						</p><!-- /Callout Panel -->
						<p>'. $validar['id_transaccion'].'<br /></p>
						<p>'. $validar['descripcion_t'].'<br /></p>
						<p>'. $validar['monto_t'].'<br /></p>' : '';
		
		$compra_cedi = ($type==10) ? $validar['factura'] : '';
		
		$q = array(			//welcome
						$welcome, 
							//activate
						$activate,
							//change-email
						$change_email, 
							//cobros
						$cobros, 
							//cuentas-cobrar
						$cuentas_cobrar,
							//forgot password 
						$forgot_password, 
							//reset password
						$reset_password, 
							//invitacion
						$invitacion, 
							//autoresponder
						$autoresponder, 
							//transaccion-empresa
						$transaccion, 
							//compra-cedi
						$compra_cedi
		);
	
		return $q[$type];
	}
}
