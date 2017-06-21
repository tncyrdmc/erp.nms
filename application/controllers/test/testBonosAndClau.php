<?php
class testBonosAndClau extends CI_Controller {

	private $idBonoDeEquipo=56;
	private $idBonoDeActividad=57;
	private $idBonoDeIgualacion=58;

	public function __construct() {
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('/bo/bonos/activacion_bono');
		$this->load->model('/bo/bonos/afiliado');
		$this->load->model('/bo/bonos/bono');
		$this->load->model('/bo/bonos/calculador_bono');
		$this->load->model('/bo/bonos/condiciones_bono');
		$this->load->model('/bo/bonos/mercancia');
		$this->load->model('/bo/bonos/red');
		$this->load->model('/bo/bonos/valores_bono');
		$this->load->model('/bo/bonos/venta');
		$this->load->model('/bo/bonos/modelo_bono');

	}

	private function before(){
		$this->modelo_bono->limpiarTodosLosBonos();
		$this->afiliado->eliminarUsuarios();
		$this->afiliado->eliminarRemanentes();
		$this->red->eliminarRed();
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
		$this->venta->eliminarVentas();
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$this->ingresarBonos();
		$this->ingresarRedDeAfiliacion();
		$this->ingresarVentas();
	}
	
	private function after(){
		$this->modelo_bono->limpiarTodosLosBonos();
		$this->afiliado->eliminarUsuarios();
		$this->afiliado->eliminarRemanentes();
		$this->red->eliminarRed();
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
		$this->venta->eliminarVentas();
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();

	}
	
	public function index(){
		
	//	$this->pruebaProduccion();
		$this->before();
		$this->testValidarSiElBonoYaCobroFalso();
		$this->after();
	
		$this->before();
		$this->testCalcularComisionesAfiliadosBonoDeEquipo();
	/*	$this->testCalcularComisionesAfiliadosBonoDeEquipoRemanente();
		$this->testValidarSiElBonoYaCobroVerdadero();
		$this->testCalcularComisionesAfiliadosBonoDeActividad();
		$this->testCalcularComisionesAfiliadosBonoDeIgualacion();*/
	//	$this->after();

	}
	
	public function pruebaProduccion(){
		$this->before();
		
		$fecha=date('Y-m-d');
		$effectiveDate = strtotime("+1 weeks", strtotime($fecha));
		$fecha = strftime ( '%Y-%m-%d' , $effectiveDate );
		
		$this->ingresarVentasFecha($fecha);
	}

	public function testValidarSiElBonoYaCobroFalso(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		
		$fechaActual=date('Y-m-d');
		
		$calculadorBono=new $this->calculador_bono();

		$id_bono=$this->idBonoDeEquipo;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fechaActual);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono no sea pagado','Resultado es :'.$resultado);

	}

	public function testCalcularComisionesAfiliadosBonoDeEquipo(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$this->afiliado->eliminarRemanentes();
		$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$fecha=date('Y-m-d');
		$id_bono=$this->idBonoDeEquipo;
		
		$calculadorBono=new $this->calculador_bono();
		$calculadorBono->calcularComisionesPorBono($id_bono,$fecha);

		$usuario=new $this->afiliado();
		//BONO De Equipo

		$id_usuario=10000;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(15,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(20,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);

		
		$id_usuario=10001;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0.5,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(145,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10002;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(110,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10003;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(125,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10004;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10005;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10006;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(70,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10007;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0.5,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(120,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10008;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10009;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10010;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0.5,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10011;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10012;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(1,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(100,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10013;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10014;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0.5,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(65,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10015;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10016;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(3.5,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(5,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10017;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0.5,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(50,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10018;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10019;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(1,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(15,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10020;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(20,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10021;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10022;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(2,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(10,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10023;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10024;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10025;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10026;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10027;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0.5,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10028;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10029;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10030;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10031;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10032;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

	}
	
	public function testCalcularComisionesAfiliadosBonoDeEquipoRemanente(){

		$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$fecha=date('Y-m-d');
		$id_bono=$this->idBonoDeEquipo;
		
		$effectiveDate = strtotime("+1 weeks", strtotime($fecha));
		$fecha = strftime ( '%Y-%m-%d' , $effectiveDate );
		
		$this->ingresarVentasFecha($fecha);

		$calculadorBono=new $this->calculador_bono();

		$calculadorBono->calcularComisionesPorBono($id_bono,$fecha);
		
		$usuario=new $this->afiliado();
		//BONO De Equipo
		
		$id_usuario=10000;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(30,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(40,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10001;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(1,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(290,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10002;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(220,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10003;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(250,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10004;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10005;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10006;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(140,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10007;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(1,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(240,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10008;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10009;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10010;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(1,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10011;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10012;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(2,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(200,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10013;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10014;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(1,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(130,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10015;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10016;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(7,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(10,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10017;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(1,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(100,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10018;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10019;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(2,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(30,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10020;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(40,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10021;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10022;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(4,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(20,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10023;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10024;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10025;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10026;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10027;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(1,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$resultado=$usuario->getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega Remanente pata mas fuerte '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=10028;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10029;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10030;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10031;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10032;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		
	}
	
	public function testCalcularComisionesAfiliadosBonoDeActividad(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$repartidorComisionBono=new$this->repartidor_comision_bono();
	
		$fecha=date('Y-m-d');
		$id_bono=$this->idBonoDeActividad;
	
		$calculadorBono=new $this->calculador_bono();
		$calculadorBono->calcularComisionesPorBono($id_bono,$fecha);

		//BONO De Actividad
	
		$id_usuario=10000;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(3,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10001;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10002;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10003;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10004;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10005;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10006;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10007;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10008;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10009;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10010;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10011;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10012;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10013;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10014;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10015;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10016;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10017;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10018;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10019;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10020;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10021;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10022;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10023;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10024;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10025;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10026;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10027;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10028;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10029;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10030;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10031;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10032;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
	}
	
	public function testCalcularComisionesAfiliadosBonoDeIgualacion(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$this->afiliado->eliminarRemanentes();
		$repartidorComisionBono=new$this->repartidor_comision_bono();
	
		$fecha=date('Y-m-d');
		$id_bono=$this->idBonoDeIgualacion;
	
		$calculadorBono=new $this->calculador_bono();
		$calculadorBono->calcularComisionesPorBono($id_bono,$fecha);
	
		//BONO De Igualacion
	
		$id_usuario=10000;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0.250,number_format($resultado,3), 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10001;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10002;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10003;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10004;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10005;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10006;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10007;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10008;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10009;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10010;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10011;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10012;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10013;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10014;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10015;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10016;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0.30,number_format($resultado,2), 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10017;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10018;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10019;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10020;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10021;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10022;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10023;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10024;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10025;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10026;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10027;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10028;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10029;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10030;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10031;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10032;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
	
	}
	
	public function testValidarSiElBonoYaCobroVerdadero(){
		
		$calculadorBono=new $this->calculador_bono();
		$fecha=date('Y-m-d');
		$id_bono=$this->idBonoDeEquipo;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);

		$fecha=date('Y-m-d');
		$id_bono=$this->idBonoDeEquipo;
		
		$effectiveDate = strtotime("+1 weeks", strtotime($fecha));
		$fecha = strftime ( '%Y-%m-%d' , $effectiveDate );
		
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
		
	}
	
	private function ingresarBonos(){
		$this->modelo_bono->limpiarTodosLosBonos();
		
		/*------------------------------------------------------------------------------- 
		 * [ id_tipo_rango ]= Tipo de condicion que se debe cumplir.
		 * 					  	1.Afiliaciones
		 * 					  	2.Ventas Red
		 * 					  	3.Compras Personales
		 * 					  	4.Puntos Comisionables Personales
		 * 					  	5.Puntos Comisionables Red
		 * 
		 * [condicion1]= (Afiliados) Red (Los demas) Tipo de Mercancia
		 * 												1.Productos
		 * 												2.Servicios
		 * 												3.Combinado
		 * 												4.Paquete de Inscripcion
		 * 												5.Membresia
		 * 
		 * [condicion2]= (Afiliados) Nivel (Los demas) ID Mercancia
		 * 
		 */
		
		
		//----------------------------BONO DE EQUIPO ------------------------------------------------
		
		$afiliaciones=1;
		$red=300;
		$nivel=0;
		
		$rangos=array();
		
		$datosRango = array(
				'id_rango' => 66,
				'nombre_rango'   => "Afiliaciones",
				'descripcion_rango'    => "Afiliaciones",
				'id_tipo_rango' => $afiliaciones,
				'valor'   => 1,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 1,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "DEB",
				'condicion1'    => $red,
				'condicion2'	=> $nivel,
				'calificado'    => "REC",
				'estatus_rango'	=> 'ACT'
		);
		
		$puntosRed=5;
		$cualquiera=0;
		$id_mercancia=0;
		
		$datosRango2 = array(
				'id_rango' => 67,
				'nombre_rango'   => "Puntos Red",
				'descripcion_rango'    => "Puntos Red",
				'id_tipo_rango' => $puntosRed,
				'valor'   => 0,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 2,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "DEB",
				'condicion1'    => $cualquiera,
				'condicion2'	=> $id_mercancia,
				'calificado'    => "DOS",
				'estatus_rango'	=> 'ACT'
		);
		
		array_push($rangos,$datosRango,$datosRango2);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => $this->idBonoDeEquipo,
				'nombre_bono'   => "Bono Binario",
				'descripcion_bono'    => "Bono Binario",
				'plan'	=> "SI",
				'inicio' => '2016-03-01',
				'fin'   => '2026-03-25',
				'frecuencia'    => "SEM",
				'mes_desde_afiliacion'	=> $inicioAfiliacion,
				'mes_desde_activacion'	=> $fechaActual,
				'estatus_bono' => "ACT"
		);
		
		
		$datosValoresBono=array();
		
		$datosValoresBonoAfiliado = array(
				'id_valor' => 7,
				'id_rango'   => $this->idBonoDeEquipo,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "PASC",
				'valor'	=> 10
		);
	
		array_push($datosValoresBono, $datosValoresBonoAfiliado);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBonoVariosRangos ($rangos,$datosBono,$datosValoresBono);
		
		
		/* ------------------- BONO DE ACTIVIDAD ------------*/
		
		$afiliaciones=1;
		$red=300;
		$nivel=0;
		
		$rangos=array();
		
		$datosRango = array(
				'id_rango' => 68,
				'nombre_rango'   => "Afiliaciones",
				'descripcion_rango'    => "Afiliaciones",
				'id_tipo_rango' => $afiliaciones,
				'valor'   => 1,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 3,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "DEB",
				'condicion1'    => $red,
				'condicion2'	=> $nivel,
				'calificado'    => "REC",
				'estatus_rango'	=> 'ACT'
		);
		
		$comprasPersonales=3;
		$paqueteInscripcion=4;
		$id_mercancia=0;
		
		$datosRango2 = array(
				'id_rango' => 69,
				'nombre_rango'   => "Compra de Paquete",
				'descripcion_rango'    => "Compra de Paquete",
				'id_tipo_rango' => $comprasPersonales,
				'valor'   => 50,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 4,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $paqueteInscripcion,
				'condicion2'	=> $id_mercancia,
				'calificado'    => "DOS",
				'estatus_rango'	=> 'ACT'
		);
		
		array_push($rangos,$datosRango,$datosRango2);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => $this->idBonoDeActividad,
				'nombre_bono'   => "Bono Actividad",
				'descripcion_bono'    => "Bono Actividad",
				'plan'	=> "NO",
				'inicio' => '2016-03-01',
				'fin'   => '2026-03-25',
				'frecuencia'    => "MES",
				'mes_desde_afiliacion'	=> $inicioAfiliacion,
				'mes_desde_activacion'	=> $fechaActual,
				'estatus_bono' => "ACT"
		);
		
		
		$datosValoresBono=array();
		
		$datosValoresBonoAfiliado = array(
				'id_valor' => 8,
				'id_rango'   => $this->idBonoDeActividad,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 0
		);
		
		$datosValoresBonoPadre = array(
				'id_valor' => 9,
				'id_rango'   => $this->idBonoDeActividad,
				'nivel'    => 1,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 1
		);
		
		$datosValoresBonoAbuelo = array(
				'id_valor' => 10,
				'id_rango'   => $this->idBonoDeActividad,
				'nivel'    => 2,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 1
		);
		
		$datosValoresBonoBisAbuelo = array(
				'id_valor' => 12,
				'id_rango'   => $this->idBonoDeActividad,
				'nivel'    => 3,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 1
		);
		
		$datosValoresBonoTataraAbuelo = array(
				'id_valor' => 13,
				'id_rango'   => $this->idBonoDeActividad,
				'nivel'    => 4,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 1
		);
		
		$datosValoresBonoTataraTataraAbuelo = array(
				'id_valor' => 14,
				'id_rango'   => $this->idBonoDeActividad,
				'nivel'    => 5,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 1
		);
		
		$datosValoresBonoTataraTataraTataraAbuelo = array(
				'id_valor' => 15,
				'id_rango'   => $this->idBonoDeActividad,
				'nivel'    => 6,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 1
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado,$datosValoresBonoPadre,$datosValoresBonoAbuelo,$datosValoresBonoBisAbuelo,$datosValoresBonoTataraAbuelo,$datosValoresBonoTataraTataraAbuelo,$datosValoresBonoTataraTataraTataraAbuelo);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBonoVariosRangos ($rangos,$datosBono,$datosValoresBono);
		
		//----------------------------BONO DE Igualacion ------------------------------------------------

		$afiliaciones=1;
		$red=300;
		$nivel=0;
		
		$rangos=array();
		
		$datosRango = array(
				'id_rango' => 70,
				'nombre_rango'   => "Afiliaciones",
				'descripcion_rango'    => "Afiliaciones",
				'id_tipo_rango' => $afiliaciones,
				'valor'   => 1,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 5,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "DEB",
				'condicion1'    => $red,
				'condicion2'	=> $nivel,
				'calificado'    => "DOS",
				'estatus_rango'	=> 'ACT'
		);
		
		$puntosRed=5;
		$cualquiera=0;
		$id_mercancia=0;
		
		$datosRango2 = array(
				'id_rango' => 71,
				'nombre_rango'   => "puntosRed",
				'descripcion_rango'    => "puntosRed",
				'id_tipo_rango' => $puntosRed,
				'valor'   => 0,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 6,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "DEB",
				'condicion1'    => $cualquiera,
				'condicion2'	=> $id_mercancia,
				'calificado'    => "DAR",
				'estatus_rango'	=> 'ACT'
		);
		
		
		$puntosPersonales=4;
		$paqueteInscripcion=4;
		$id_mercancia=502;
		
		$datosRango3 = array(
				'id_rango' => 72,
				'nombre_rango'   => "puntosPersonales",
				'descripcion_rango'    => "puntosPersonales",
				'id_tipo_rango' => $puntosPersonales,
				'valor'   => 10,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 7,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "DEB",
				'condicion1'    => $paqueteInscripcion,
				'condicion2'	=> $id_mercancia,
				'calificado'    => "REC",
				'estatus_rango'	=> 'ACT'
		);
		
		$id_mercancia=504;
		
		$datosRango4 = array(
				'id_rango' => 73,
				'nombre_rango'   => "puntosPersonales",
				'descripcion_rango'    => "puntosPersonales",
				'id_tipo_rango' => $puntosPersonales,
				'valor'   => 10,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 8,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "DEB",
				'condicion1'    => $paqueteInscripcion,
				'condicion2'	=> $id_mercancia,
				'calificado'    => "REC",
				'estatus_rango'	=> 'ACT'
		);
		
		array_push($rangos,$datosRango,$datosRango2,$datosRango3,$datosRango4);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => $this->idBonoDeIgualacion,
				'nombre_bono'   => "Bono Igualacion",
				'descripcion_bono'    => "Bono Igualacion",
				'plan'	=> "NO",
				'inicio' => '2016-03-01',
				'fin'   => '2026-03-25',
				'frecuencia'    => "MES",
				'mes_desde_afiliacion'	=> $inicioAfiliacion,
				'mes_desde_activacion'	=> $fechaActual,
				'estatus_bono' => "ACT"
		);
		
		
		$datosValoresBono=array();
		
		$datosValoresBonoAfiliado = array(
				'id_valor' => 16,
				'id_rango'   => $this->idBonoDeIgualacion,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "PASC",
				'valor'	=> 0
		);
	
		$datosValoresBonoPadre = array(
				'id_valor' => 17,
				'id_rango'   => $this->idBonoDeIgualacion,
				'nivel'    => 1,
				'condicion_red'    => "RED",
				'verticalidad'    => "PASC",
				'valor'	=> 1.5
		);
		
		$datosValoresBonoAbuelo = array(
				'id_valor' => 18,
				'id_rango'   => $this->idBonoDeIgualacion,
				'nivel'    => 2,
				'condicion_red'    => "RED",
				'verticalidad'    => "PASC",
				'valor'	=> 1
		);
		
		$datosValoresBonoBisAbuelo = array(
				'id_valor' => 19,
				'id_rango'   => $this->idBonoDeIgualacion,
				'nivel'    => 3,
				'condicion_red'    => "RED",
				'verticalidad'    => "PASC",
				'valor'	=> 0.5
		);
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado,$datosValoresBonoPadre,$datosValoresBonoAbuelo,$datosValoresBonoBisAbuelo);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBonoVariosRangos ($rangos,$datosBono,$datosValoresBono);
		
	}

	private function ingresarRedDeAfiliacion(){
		
		$red=$this->red;
		$infinito=0;
		$datosRed = array(
				'id_red' => "300",
				'nombre'   => "Binario",
				'descripcion'    => "Test de Red Binaria",
				'frontal' => 2,
				'profundidad'   => $infinito,
				'valor_punto'    => 1,
				'estatus'   => 'ACT',
				'plan' => 'BIN'
		);
		
		$red->nuevaRed($datosRed);
		$red->ingresarRed();
		
/*							RED DE AFILIACION
*           	                      __________
*           	               	     | GIOVANNY |
*           					     | ID:10000 |
*        	   	                     |_Spr:_2___|
*                  	       __________/           \____________
*           	          |  CARLOS  |        	  |   PEDRO  |
*           	          | ID:10001 |   		  | ID:10002 |
*        	   	          |_Spr:10000|            |_Spr:10000|       
*              __________/       _____\____    ___/_______    \_________ 
*             |   CAMILO |      | NICOLAS  |  | ESPERANZA|   |   MARIA  |
*             | ID:10003 |   	| ID:10004 |  | ID:10005 |   | ID:10006 |
*        	  |_Spr:10001|      |_Spr:10001|  |_Spr:10000|   |_Spr:10000|       
*		    ___/_____   __\_______                      _____/____     __\_______
*         | PEPE     | | DARIO    |                    |  DIEGO   |   |  ANDRES  |
*         | ID:10007 | | ID:10008 |                    | ID:10009 |   | ID:10010 |
*         |_Spr:10003| |_Spr:10001|                    |_Spr:10000|   |_Spr:10000| 
*  _______/__   _____\____                                       _____/____    __\_______
* | RICARDO  | | MIGUEL   |                                     |  PAOLA   |   | FERNANDO |
* | ID:10011 | | ID:10012 |                                     | ID:10013 |   | ID:10014 |
* |_Spr:10007| |_Spr:10007|                                     |_Spr:10010|   |_Spr:10010| 
*        _______/__   _____\____                                            ____/____     _\_________
*       | LAURA    | | DAVID    |                                          |  MARIO   |   | ANDREA   |
*       | ID:10015 | | ID:10016 |                                          | ID:10017 |   | ID:10018 |
*       |_Spr:10012| |_Spr:10012|                                          |_Spr:10014|   |_Spr:10014| 
*              _______/___  _____\____                                 ____/____      _\________
*             | JOAN     | |ALEJANDRO |                               | MARCEL   |   | DANIEL   |
*             | ID:10019 | | ID:10020 |                               | ID:10021 |   | ID:10022 |
*             |_Spr:10016| |_Spr:10001|\                              |_Spr:10017|   |_Spr:10017| 
* __________/  _____\____   _/________  \__________                          ___________/ ___\______
*| JULIAN   | | GERMAN   | |  LUIS    | |ALBERTO   |                        | CAROLINA | | HAROLL   |
*| ID:10023 | | ID:10024 | | ID:10025 | | ID:10026 |                        | ID:10027 | | ID:10028 |
*|_Spr:10019| |_Spr:10019| |_Spr:10016| |_Spr:10020|                        |_Spr:10022| |_Spr:10022| 
*_____|_____     ____|_____               ____|_____             __________/   ____\______
*|  RUBEN   |   |   MARCELA|             |  NELLY   |    	     |  JOSE    | | JOHANA   |
*| ID:10029 |   | ID:10030 |       	     | ID:10031 |            | ID:10032 | | ID:10033 |
*|Spr:10001 |   |Spr:10001 |             |Spr:10026 |            |_Spr:10027| |_Spr:10027| 
*/
		$this->ingresarAfiliado(10000,"giovanny",2,2,0);
		$this->ingresarAfiliado(10001,"carlos",10000,10000,0);
		$this->ingresarAfiliado(10002,"pedro",10000,10000,1);
		$this->ingresarAfiliado(10003,"camilo",10001,10001,0);
		$this->ingresarAfiliado(10004,"Nicolas",10001,10001,1);
		$this->ingresarAfiliado(10005,"esperanza",10002,10000,0);
		$this->ingresarAfiliado(10006,"maria",10002,10000,1);
		$this->ingresarAfiliado(10007,"pepe",10003,10003,0);
		$this->ingresarAfiliado(10008,"dario",10003,10001,1);
		$this->ingresarAfiliado(10009,"diego",10006,10000,0);
		$this->ingresarAfiliado(10010,"andres",10006,10000,1);
		$this->ingresarAfiliado(10011,"ricardo",10007,10007,0);
		$this->ingresarAfiliado(10012,"miguel",10007,10007,1);
		$this->ingresarAfiliado(10013,"paola",10010,10010,0);
		$this->ingresarAfiliado(10014,"fernando",10010,10010,1);
		$this->ingresarAfiliado(10015,"laura",10012,10012,0);
		$this->ingresarAfiliado(10016,"david",10012,10012,1);
		$this->ingresarAfiliado(10017,"mario",10014,10014,0);
		$this->ingresarAfiliado(10018,"andrea",10014,10014,1);
		$this->ingresarAfiliado(10019,"joan",10016,10016,0);
		$this->ingresarAfiliado(10020,"alejandro",10016,10001,1);
		$this->ingresarAfiliado(10021,"marcel",10017,10017,0);
		$this->ingresarAfiliado(10022,"daniel",10017,10017,1);
		$this->ingresarAfiliado(10023,"julian",10019,10019,0);
		$this->ingresarAfiliado(10024,"german",10019,10019,1);
		$this->ingresarAfiliado(10025,"luis",10020,10016,0);
		$this->ingresarAfiliado(10026,"alberto",10020,10020,1);
		$this->ingresarAfiliado(10027,"carolina",10022,10022,0);
		$this->ingresarAfiliado(10028,"haroll",10022,10022,1);
		$this->ingresarAfiliado(10029,"ruben",10023,10001,0);
		$this->ingresarAfiliado(10030,"marcela",10024,10001,0);
		$this->ingresarAfiliado(10031,"nelly",10026,10026,0);
		$this->ingresarAfiliado(10032,"jose",10027,10027,0);
		$this->ingresarAfiliado(10033,"johana",10027,10027,1);
	}

	private function ingresarAfiliado($id,$nombre,$debajo_de,$sponsor,$lado){
		$afiliador=new $this->modelo_bono();
		$afiliador->crearNuevoUsuario ($id,$nombre,"2016-03-17",$id,300,$debajo_de,$sponsor,$lado);
	}
	
	private function ingresarMercancia($id_mercancia,$nombre,$id_categoria,$id_tipo_mercancia,$costo,$puntos_comisionables){
		$datos = array(
				'id' => $id_mercancia,
				'sku' => $id_mercancia,
				'sku_2' => $id_mercancia,
				'id_tipo_mercancia'   => $id_tipo_mercancia,
				'pais' => "AAA",
				'estatus' => "ACT",
				'id_proveedor' => "0",
				'real'    => $costo,
				'costo'    => $costo,
				'costo_publico'    => $costo,
				'entrega'    =>0,
				'iva'    =>"MAS",
				'descuento'    =>"0",
				'puntos_comisionables'=>$puntos_comisionables
		
		);
		$this->db->insert('mercancia',$datos);
		
		$datos = array(
				'id_mercancia' => $id_mercancia,
				'id_cat_imagen' => "10000",
		
		);
		
		$this->db->insert('cross_merc_img',$datos);
		
		if($id_tipo_mercancia==1){
			$datos = array(
					'id' => $id_mercancia,
					'nombre'=>$nombre,
					'id_grupo'   => $id_categoria
						
			);
			$this->db->insert('producto',$datos);
				
		}else if($id_tipo_mercancia==2){
			$datos = array(
					'id' => $id_mercancia,
					'nombre'=>$nombre,
					'id_red'   => $id_categoria
						
			);
			$this->db->insert('servicio',$datos);
		}else if($id_tipo_mercancia==3){
			$datos = array(
					'id' => $id_mercancia,
					'nombre'=>$nombre,
					'id_red'   => $id_categoria
						
			);
			$this->db->insert('combinado',$datos);
		}else if($id_tipo_mercancia==4){
			$datos = array(
					'id_paquete' => $id_mercancia,
					'nombre'=>$nombre,
					'id_red'   => $id_categoria
						
			);
			$this->db->insert('paquete_inscripcion',$datos);
		}else if($id_tipo_mercancia==5){
			$datos = array(
					'id' => $id_mercancia,
					'nombre'=>$nombre,
					'id_red'   => $id_categoria
						
			);
			$this->db->insert('membresia',$datos);
		}
	}

	private function ingresarVentaMercanciaUsuario($id_venta,$id_usuario,$fecha,$mercanciasVendidas){
		
		$datosMercanciasVendidas=array();
		
		foreach ($mercanciasVendidas as $mercanciaId){
			$mercancia=new $this->mercancia ();
			$mercancia->setUpMercancia($mercanciaId);
			
			$datosMercancia = array(
					'id_mercancia' => $mercancia->getIdMercancia(),
					'costo_total'   => $mercancia->getCosto(),
					'puntos_comisionables'    => $mercancia->getPuntosComisionables(),
			);
			
			array_push($datosMercanciasVendidas,$datosMercancia);
		}

		
		$datosVenta = array(
				'id_venta' =>$id_venta,
				'id_usuario'   => $id_usuario,
				'estatus'    => 'ACT',
				'fecha' => $fecha,
				'mercancia'=>$datosMercanciasVendidas
		);
		
		$this->venta->nuevaVenta ($datosVenta);
		$this->venta->ingresarVenta ();
	}

	private function ingresarVentas(){

		$id_categoria=250;
		
		$datosCategoria = array(
				'id_categoria' => 250,
				'id_red'   => 300,
		);
		
		$this->mercancia->ingresarCategoria ($datosCategoria);
		
		/*  TIPO DE MERCANCIA
		 *  Producto  = 1
		 *  Servicios = 2
		 * 	Combinado = 3
		 *  Paquete.I = 4
		 * 	Membresia = 5
		 * 
		 */
		
		$membresia=5;
		$paqueteDeInscripcion=4;
		$servicios=2;
		
		$id=500;$costo=35;$puntos=5;
		$this->ingresarMercancia($id,"Membresia Asociado",$id_categoria,$membresia,$costo,$puntos);
		
		$id=501;$costo=80;$puntos=20;
		$this->ingresarMercancia($id,"Membresia Infrarojo",$id_categoria,$membresia,$costo,$puntos);
		
		$id=502;$costo=50;$puntos=10;
		$this->ingresarMercancia($id,"Paquete Streaming",$id_categoria,$paqueteDeInscripcion,$costo,$puntos);
		
		$id=503;$costo=5;$puntos=10;
		$this->ingresarMercancia($id,"Recarga",$id_categoria,$servicios,$costo,$puntos);
		
		$id=504;$costo=50;$puntos=10;
		$this->ingresarMercancia($id,"Paquete router",$id_categoria,$paqueteDeInscripcion,$costo,$puntos);
		

/*							RED DE AFILIACION
*           	                      __________
*           	               	     | GIOVANNY |
*           					     | ID:10000 |
*        	   	                     |  Spr:_2  |
*        							 |Total:$175|
*        							 |Puntos: 35|
*                  	       __________/           \____________
*           	          |  CARLOS  |        	  |   PEDRO  |
*           	          | ID:10001 |   		  | ID:10002 |
*        	   	          | Spr:10000|			  |Spr:10000 |
*        				  |Total:$45 |            |Total:$90 |
*        				  |Puntos: 15|            |Puntos:30 |      
*              __________/       _____\____    ___/_______    \_________
*             |   CAMILO |      | NICOLAS  |  | ESPERANZA|   |   MARIA  |
*             | ID:10003 |   	| ID:10004 |  | ID:10005 |   | ID:10006 |
*        	  |_Spr:10001|      |_Spr:10001|  |_Spr:10000|   |_Spr:10000|
*        	  |Total:$35 |      |Total:$35 |  |Total:$35 |   |Total:$35 |
*        	  |Puntos: 5 |      |Puntos: 5 |  |Puntos: 5 |   |Puntos: 5 |
*		    ___/_____   __\_______                      _____/____     __\_______
*         | PEPE     | | DARIO    |                    |  DIEGO   |   |  ANDRES  |
*         | ID:10007 | | ID:10008 |                    | ID:10009 |   | ID:10010 |
*         |_Spr:10003| |_Spr:10001|                    |_Spr:10000|   |_Spr:10000|
*         |Total:$35 | |Total:$50 |                    |Total:$80 |   |Total:$35 |
*         |Puntos: 5 | |Puntos:10 |                    |Puntos:20 |   |Puntos: 5 |
*  _______/__   _____\____                                       _____/____    __\_______
* | RICARDO  | | MIGUEL   |                                     |  PAOLA   |   | FERNANDO |
* | ID:10011 | | ID:10012 |                                     | ID:10013 |   | ID:10014 |
* |_Spr:10007| |_Spr:10007|                                     |_Spr:10010|   |_Spr:10010|
* |Total:$35 | |Total:$35 |                                     |Total:$35 |   |Total:$35 |
* |Puntos: 5 | |Puntos: 5 |                                     |Puntos: 5 |   |Puntos: 5 |
*        _______/__   _____\____                                            ____/____     _\_________
*       | LAURA    | | DAVID    |                                          |  MARIO   |   | ANDREA   |
*       | ID:10015 | | ID:10016 |                                          | ID:10017 |   | ID:10018 |
*       |_Spr:10012| |_Spr:10012|                                          |_Spr:10014|   |_Spr:10014|
*       |Total:$50 | |Total:$165|                                          |Total:$ 70|   |Total:$35 |
*       |Puntos:10 | |Puntos:35 |                                          |Puntos: 10|   |Puntos: 5 |
*              _______/___  _____\____                                 ____/____      _\________
*             | JOAN     | |ALEJANDRO |                               | MARCEL   |   | DANIEL   |
*             | ID:10019 | | ID:10020 |                               | ID:10021 |   | ID:10022 |
*             |_Spr:10016| |_Spr:10001|                               |_Spr:10017|   |_Spr:10017|
*             |Total:$ 35| |Total:$35 |\                              |Total:$35 |   |Total:$35 |
*             |Puntos: 5 | |Puntos: 5 |\                              |Puntos: 5 |   |Puntos: 5 |
* __________/  _____\____   _/________  \__________                          ___________/ ___\______
*| JULIAN   | | GERMAN   | |  LUIS    | |ALBERTO   |                        | CAROLINA | | HAROLL   |
*| ID:10023 | | ID:10024 | | ID:10025 | | ID:10026 |                        | ID:10027 | | ID:10028 |
*|_Spr:10019| |_Spr:10019| |_Spr:10016| |_Spr:10020|                        |_Spr:10022| |_Spr:10022|
*|Total:$ 80| |Total:$35 | |Total:$ 35| |Total:$80 |                        |Total:$80 | |Total:$80 |
*|Puntos: 20| |Puntos: 5 | |Puntos:  5| |Puntos:20 |                        |Puntos:20 | |Puntos:20 |
*_____|_____     ____|_____               ____|_____             __________/   ____\______
*|  RUBEN   |   |   MARCELA|             |  NELLY   |    	     |  JOSE    | | JOHANA   |
*| ID:10029 |   | ID:10030 |       	     | ID:10031 |            | ID:10032 | | ID:10033 |
*|Spr:10001 |   |Spr:10001 |             |Spr:10026 |            |_Spr:10027| |_Spr:10027|
*|Total:$35 |   |Total:$35 |             |Total:$35 |            |Total:$35 | |Total:$35 |
*|Puntos: 5 |   |Puntos: 5 |             |Puntos: 5 |            |Puntos: 5 | |Puntos: 5 |
*/

		$fecha=date('Y-m-d');
		
		$this->ingresarVentaMercanciaUsuario(700,10000,$fecha,array(500,501,502,503));
		$this->ingresarVentaMercanciaUsuario(701,10001,$fecha,array(500,503));
		$this->ingresarVentaMercanciaUsuario(702,10002,$fecha,array(501,503));
		$this->ingresarVentaMercanciaUsuario(703,10003,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(704,10004,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(705,10005,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(706,10006,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(707,10007,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(708,10008,$fecha,array(502));
		$this->ingresarVentaMercanciaUsuario(709,10009,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(710,10010,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(711,10011,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(712,10012,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(713,10013,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(714,10014,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(715,10015,$fecha,array(502));
		$this->ingresarVentaMercanciaUsuario(716,10016,$fecha,array(500,501,504));
		$this->ingresarVentaMercanciaUsuario(717,10017,$fecha,array(500,500));
		$this->ingresarVentaMercanciaUsuario(718,10018,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(719,10019,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(720,10020,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(721,10021,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(722,10022,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(723,10023,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(724,10024,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(725,10025,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(726,10026,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(727,10027,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(728,10028,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(729,10029,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(730,10030,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(731,10031,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(732,10032,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(733,10033,$fecha,array(500));
		
	}
	
	private function ingresarVentasFecha($fecha){

		/*  TIPO DE MERCANCIA
		 *  Producto  = 1
		 *  Servicios = 2
		 * 	Combinado = 3
		 *  Paquete.I = 4
		 * 	Membresia = 5
		 *
		*/
	
		/*							RED DE AFILIACION
		 *           	                      __________
		 *           	               	     | GIOVANNY |
		 *           					     | ID:10000 |
		 *        	   	                     |  Spr:_2  |
		 *        							 |Total:$165|
		 *        							 |Puntos: 35|
		 *                  	   __________/         \____________
		 *           	          |  CARLOS  |        	  |   PEDRO  |
		 *           	          | ID:10001 |   		  | ID:10002 |
		 *        	   	          | Spr:10000|			  |Spr:10000 |
		 *        				  |Total:$35 |            |Total:$80 |
		 *        				  |Puntos: 5 |            |Puntos:20 |
		 *             __________/       _____\____    ___/_______    \_________
		 *            |   CAMILO |      | NICOLAS  |  | ESPERANZA|   |   MARIA  |
		 *            | ID:10003 |   	| ID:10004 |  | ID:10005 |   | ID:10006 |
		 *        	  |_Spr:10001|      |_Spr:10001|  |_Spr:10000|   |_Spr:10000|
		 *        	  |Total:$35 |      |Total:$35 |  |Total:$35 |   |Total:$35 |
		 *        	  |Puntos: 5 |      |Puntos: 5 |  |Puntos: 5 |   |Puntos: 5 |
		 *		    ___/_____   __\_______                      _____/____     __\_______
		 *         | PEPE     | | DARIO    |                    |  DIEGO   |   |  ANDRES  |
		 *         | ID:10007 | | ID:10008 |                    | ID:10009 |   | ID:10010 |
		 *         |_Spr:10003| |_Spr:10001|                    |_Spr:10000|   |_Spr:10000|
		 *         |Total:$35 | |Total:$50 |                    |Total:$80 |   |Total:$35 |
		 *         |Puntos: 5 | |Puntos:10 |                    |Puntos:20 |   |Puntos: 5 |
		 *  _______/__   _____\____                                       _____/____    __\_______
		 * | RICARDO  | | MIGUEL   |                                     |  PAOLA   |   | FERNANDO |
		 * | ID:10011 | | ID:10012 |                                     | ID:10013 |   | ID:10014 |
		 * |_Spr:10007| |_Spr:10007|                                     |_Spr:10010|   |_Spr:10010|
		 * |Total:$35 | |Total:$35 |                                     |Total:$35 |   |Total:$35 |
		 * |Puntos: 5 | |Puntos: 5 |                                     |Puntos: 5 |   |Puntos: 5 |
		 *        _______/__   _____\____                                            ____/____     _\_________
		 *       | LAURA    | | DAVID    |                                          |  MARIO   |   | ANDREA   |
		 *       | ID:10015 | | ID:10016 |                                          | ID:10017 |   | ID:10018 |
		 *       |_Spr:10012| |_Spr:10012|                                          |_Spr:10014|   |_Spr:10014|
		 *       |Total:$50 | |Total:$165|                                          |Total:$ 70|   |Total:$35 |
		 *       |Puntos:10 | |Puntos:35 |                                          |Puntos: 10|   |Puntos: 5 |
		 *              _______/___  _____\____                                 ____/____      _\________
		 *             | JOAN     | |ALEJANDRO |                               | MARCEL   |   | DANIEL   |
		 *             | ID:10019 | | ID:10020 |                               | ID:10021 |   | ID:10022 |
		 *             |_Spr:10016| |_Spr:10001|                               |_Spr:10017|   |_Spr:10017|
		 *             |Total:$ 35| |Total:$35 |\                              |Total:$35 |   |Total:$35 |
		 *             |Puntos: 5 | |Puntos: 5 |\                              |Puntos: 5 |   |Puntos: 5 |
		 * __________/  _____\____   _/________  \__________                          ___________/ ___\______
		 *| JULIAN   | | GERMAN   | |  LUIS    | |ALBERTO   |                        | CAROLINA | | HAROLL   |
		 *| ID:10023 | | ID:10024 | | ID:10025 | | ID:10026 |                        | ID:10027 | | ID:10028 |
		 *|_Spr:10019| |_Spr:10019| |_Spr:10016| |_Spr:10020|                        |_Spr:10022| |_Spr:10022|
		 *|Total:$ 80| |Total:$35 | |Total:$ 35| |Total:$80 |                        |Total:$80 | |Total:$80 |
		 *|Puntos: 20| |Puntos: 5 | |Puntos:  5| |Puntos:20 |                        |Puntos:20 | |Puntos:20 |
		 *_____|_____     ____|_____               ____|_____              __________/   ____\______
		 *|  RUBEN   |   |   MARCELA|             |  NELLY   |    	      |  JOSE    | | JOHANA   |
		 *| ID:10029 |   | ID:10030 |       	  | ID:10031 |            | ID:10032 | | ID:10033 |
		 *|Spr:10001 |   |Spr:10001 |             |Spr:10026 |            |_Spr:10027| |_Spr:10027|
		 *|Total:$35 |   |Total:$35 |             |Total:$35 |            |Total:$35 | |Total:$35 |
		 *|Puntos: 5 |   |Puntos: 5 |             |Puntos: 5 |            |Puntos: 5 | |Puntos: 5 |
		*/
	
		$this->ingresarVentaMercanciaUsuario(800,10000,$fecha,array(500,501,502,503));
		$this->ingresarVentaMercanciaUsuario(801,10001,$fecha,array(500,503));
		$this->ingresarVentaMercanciaUsuario(802,10002,$fecha,array(501,503));
		$this->ingresarVentaMercanciaUsuario(803,10003,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(804,10004,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(805,10005,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(806,10006,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(807,10007,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(808,10008,$fecha,array(502));
		$this->ingresarVentaMercanciaUsuario(809,10009,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(810,10010,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(811,10011,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(812,10012,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(813,10013,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(814,10014,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(815,10015,$fecha,array(502));
		$this->ingresarVentaMercanciaUsuario(816,10016,$fecha,array(500,501,504));
		$this->ingresarVentaMercanciaUsuario(817,10017,$fecha,array(500,500));
		$this->ingresarVentaMercanciaUsuario(818,10018,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(819,10019,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(820,10020,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(821,10021,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(822,10022,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(823,10023,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(824,10024,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(825,10025,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(826,10026,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(827,10027,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(828,10028,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(829,10029,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(830,10030,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(831,10031,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(832,10032,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(833,10033,$fecha,array(500));

	}
}
