<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
require_once APPPATH.'controllers/ov/compras.php';

class cuentasporcobrar extends compras{
	function __construct() {
		parent::__construct ();
		
		$this->load->model ( 'bo/modelo_dashboard' );
		$this->load->model ( 'ov/model_perfil_red' );
		$this->load->model ( 'bo/modelo_logistico' );
		$this->load->model ( 'cemail' );
	}
	
	function index() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		
		if(!$this->general->isAValidUser($id,"administracion"))
		{
			redirect('/auth/logout');
		}
		
		$usuario=$this->general->get_username($id);
		
		$style = $this->modelo_dashboard->get_style(1);
		
		
		$cobros = $this->modelo_historial_consignacion->ListarHistorialPendiente ();
		
		$this->template->set ( "style", $style );
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "cobros", $cobros );
		
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		$this->template->set_partial ( 'header', 'website/bo/header' );
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/administracion/CuentasCobrar/listar' );
	}
	
	function cambiar_estado(){
		
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		
		if(!$this->general->isAValidUser($id,"administracion"))
		{
			redirect('/auth/logout');
		}

		
		if(isset($_POST['id_venta'])){
			$id_venta = $_POST['id_venta'];
			
	
			$datosCuentaPagar = $this->modelo_historial_consignacion->getDatosPagoBanco($id_venta);

			if(!$datosCuentaPagar)
				echo  "No se ha podido realizar el cambio de estado de la peticion.";
			
			$id_afiliado_comprador=$datosCuentaPagar[0]->id_usuario;
			$id_historial=$datosCuentaPagar[0]->id;			
			
			$embarque = $this->modelo_logistico->setPedido($id_venta);
			
			if(!$embarque){
				echo "No se puede cambiar el estado del pedido, Una de las Mercancias esta Agotada.";
				exit();
			}			
			
			$this->pagarComisionVenta($id_venta,$id_afiliado_comprador);
			
			$this->modelo_historial_consignacion->CambiarEstadoPago($id_venta, $datosCuentaPagar[0]->id);
			
			$datos = $this->modelo_historial_consignacion->Datos_Email($id_historial);
			
			$email = $datos[0]->email;
			$username = $datos[0]->username;
			$nombres = $this->model_perfil_red->get_nombres($id_afiliado_comprador);
			
			$cobro = array(
				'id_venta' => $id_venta,	
				'fecha' => $datos[0]->fecha,
				'username' => $username,
				'email' => $email,
				'nombres' => $nombres,
				'banco' => $datos[0]->banco,
				'cuenta' => $datos[0]->cuenta,
				'valor' => $datos[0]->valor
			);
		
			$confirmacion = $this->cemail->send_email(5, $email, $cobro);
			
			echo  $confirmacion ? "...EMAIL ENVIADO..." : "...EMAIL NO ENVIADO...";
			
			echo  "La petición se ha cambiado de estado a pago y ha calculado las comisiones.";
		
		}else{
			echo  "No se ha podido realizar el cambio de estado de la peticion.";
		
		}
		
	}
	
	function cambiar_estado_cancelado(){
		$id_venta = $_POST['id_venta'];
		
		$estadoCuenta=$this->modelo_historial_consignacion->getEstadoPagoBanco($id_venta);
		
		if(!$estadoCuenta){
			echo "Ya se han eliminado todos los datos de la venta";
			return false;
		}

		$this->modelo_historial_consignacion->CambiarEstadoCancelado($id_venta);
		echo  "Se han eliminado todos los datos de la venta.";
	}
	
/*							//	   $historico
	private function ComisionBanco($datosCuentaPagar,$id_red_mercancia){
		$this->CalcularComision2($datosCuentaPagar[0]->id_venta, $id_red_mercancia,$valor_comision_por_nivel, $capacidad_red ,1,$datosCuentaPagar[0]->costo_unidad);
		
	}
	*/
	private function EnvarMail($id_historial){
		$datos = $this->modelo_historial_consignacion->Datos_Email($id_historial);
		
		$cobro['username'] = $datos[0]->username;
		$cobro['nombre'] = $datos[0]->nombre;
		$cobro['apellido'] = $datos[0]->apellido;
		$cobro['id_venta'] = $datos[0]->id_venta;
		$cobro['banco'] = $datos[0]->banco;
		$cobro['cuenta'] = $datos[0]->cuenta;
		$cobro['valor'] = $datos[0]->valor;
		$cobro['email'] = $datos[0]->email;
		$cobro['fecha'] = $datos[0]->fecha;
		
		$this->cemail->send_email(5, $cobro['email'], $cobro);
	}
}