<?php
class testBonosMoneyMobile extends CI_Controller {

	private $idBonoDeInicioRapido=56;
	private $idBonoDeBinario=57;

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
		$this->load->model('/bo/bonos/clientes/mobileMoney/bono_mobile_money');

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

   /* 	$this->before();
		$this->pruebaProduccion();
		
		$this->testValidarSiElBonoYaCobroFalso();
		$this->after();

		$this->before();
		$this->testCalcularComisionesAfiliadosBonoBinario();
		$this->testGetTotalDeDineroARepartir();
		$this->testARecibir();
		$this->testRepartirComisiones();
		$this->testValidarSiElBonoYaCobroVerdadero($this->idBonoDeBinario);
		
		$this->before();
		$this->testCalcularComisionesAfiliadosBonoDeInicioRapido();
		$this->testValidarSiElBonoYaCobroVerdadero($this->idBonoDeInicioRapido);
		$this->after(); */

	}
	
	public function pruebaProduccion(){
		$this->ingresarBonos();

	}

	public function testValidarSiElBonoYaCobroFalso(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		
		$fechaActual=date('Y-m-d');
		
		$calculadorBono=new $this->calculador_bono();

		$id_bono=$this->idBonoDeInicioRapido;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fechaActual);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono no sea pagado','Resultado es :'.$resultado);

		$id_bono=$this->idBonoDeBinario;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fechaActual);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono no sea pagado','Resultado es :'.$resultado);
		
	}

	public function testCalcularComisionesAfiliadosBonoDeInicioRapido(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$this->afiliado->eliminarRemanentes();
		$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$fecha=date('Y-m-d');
		$id_bono=$this->idBonoDeInicioRapido;
		
		$calculadorBono=new $this->calculador_bono();
		$calculadorBono->calcularComisionesPorBono($id_bono,$fecha);

		//BONO De Inicio Rapido

		$id_usuario=10000;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(600,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10001;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(600,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10002;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10003;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(100,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

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
		echo $this->unit->run(200,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10008;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10009;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10010;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(200,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10011;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10012;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(200,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10013;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10014;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(200,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10015;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10016;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(200,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10017;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(200,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10018;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10019;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(200,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10020;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(100,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10021;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10022;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(200,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

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
		echo $this->unit->run(100,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10027;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(200,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

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

	public function testCalcularComisionesAfiliadosBonoBinario(){
		$this->modelo_bono->limpiarTodosLosBonos();
		$this->afiliado->eliminarUsuarios();
		$this->afiliado->eliminarRemanentes();
		$this->red->eliminarRed();
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
		$this->venta->eliminarVentas();
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$this->ingresarBonos();
		$this->ingresarRedDeAfiliacion2();
		$this->ingresarVentas2();
		
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$this->afiliado->eliminarRemanentes();
		$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$fecha=date('Y-m-d');
		$id_bono=$this->idBonoDeBinario;
		
		$calculadorBono=new $this->calculador_bono();
		$calculadorBono->calcularComisionesPorBono($id_bono,$fecha);
		
		//BONO De Inicio Rapido
		
		$id_usuario=10000;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run("2,162.5",number_format($resultado,1), 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.number_format($resultado,1));
		
		$id_usuario=10001;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(92.4,number_format($resultado,1), 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
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
		echo $this->unit->run(432.5,number_format($resultado,1), 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10007;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);

		$id_usuario=10008;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(432.5,number_format($resultado,1), 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10009;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10010;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10012;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		
	}

	public function testGetTotalDeDineroARepartir(){
		$this->modelo_bono->limpiarTodosLosBonos();
		$this->afiliado->eliminarUsuarios();
		$this->afiliado->eliminarRemanentes();
		$this->red->eliminarRed();
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
		$this->venta->eliminarVentas();
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$this->ingresarBonos();
		$this->ingresarRedDeAfiliacion2();
		$this->ingresarVentas2();
	
		$bono=$this->bono_mobile_money;
	
		$id_red=300;
		
		$fecha=date('Y-m-d');
		$fecha_inicio=$fecha;
		$fecha_fin=$fecha;
		
		$id_usuario=2;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(0,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10000;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(5,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10001;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(2,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10002;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(0,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10003;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(0,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10004;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(0,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10005;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(0,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10006;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(1,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10007;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(0,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10008;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(1,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10009;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(0,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10010;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(0,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10011;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(0,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10012;
		$resultado=$bono->getAfiliadosPataDebil($id_red,$id_usuario);
		echo $this->unit->run(0,$resultado, 'Test get Total de Afiliados Activos por Afiliacion en la red '.$id_usuario,'Resultado es :'.$resultado);
		
		
		$id_usuario=2;
		$resultado=$bono->getTotalARepartir($id_red,$id_usuario,$fecha_inicio,$fecha_fin);
		echo $this->unit->run(3120,$resultado, 'Test total de monto a repartir en la red','Resultado es :'.$resultado);
	
		$id_usuario=2;
		$resultado=$bono->getTotalIgualaciones($id_red,$id_usuario);
		echo $this->unit->run(9,$resultado, 'Test get Total de igualaciones en la red ','Resultado es :'.$resultado);

		$resultado=$bono->getTotalPorIgualacion($id_red,$fecha_inicio,$fecha_fin);

		echo $this->unit->run(346.7,number_format($resultado,1), 'Test total de monto a repartir para cada afiliado','Resultado es :'.number_format($resultado,1));
		
		$totalRepartirPorIgualacion=$bono->getTotalPorIgualacion($id_red,$fecha_inicio,$fecha_fin);
		$resultado=$bono->getTotalAfiliadosBono3Puntos($id_red,$totalRepartirPorIgualacion,$fecha_inicio,$fecha_fin);

		echo $this->unit->run(600.9,number_format($resultado["valor"],1), 'Test total de afiliados con solo 3 puntos que pueden cobrar','Resultado es :'.number_format($resultado["valor"],1));
		echo $this->unit->run(2,$resultado["numero_igualaciones"], 'Test total de afiliados con solo 3 puntos que pueden cobrar','Resultado es :'.$resultado["numero_igualaciones"]);
		
		$resultado=$bono->getTotalPorIgualacionQueSobra($id_red,$fecha_inicio,$fecha_fin);
		echo $this->unit->run(85.8,number_format($resultado,1), 'Test total de afiliados con solo 3 puntos que pueden cobrar','Resultado es :'.$resultado);

	}

	public function testARecibir(){
		$this->modelo_bono->limpiarTodosLosBonos();
		$this->afiliado->eliminarUsuarios();
		$this->afiliado->eliminarRemanentes();
		$this->red->eliminarRed();
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
		$this->venta->eliminarVentas();
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$this->ingresarBonos();
		$this->ingresarRedDeAfiliacion2();
		$this->ingresarVentas2();
		
		$bono=$this->bono_mobile_money;
		
		$id_red=300;
		
		$fecha=date('Y-m-d');
		$fecha_inicio=$fecha;
		$fecha_fin=$fecha;
		
		$bono->setUpBono($id_red, $fecha_inicio, $fecha_fin);
		
		$id_usuario=10000;
		$resultado=$bono->getTotalARecibirAfiliado($id_red,$id_usuario);
		echo $this->unit->run("2,162.5",number_format($resultado,1), 'Test get Total a recibir por el afiliado '.$id_usuario,'Resultado es :'.number_format($resultado,1));
		
		$id_usuario=10001;
		$resultado=$bono->getTotalARecibirAfiliado($id_red,$id_usuario);
		echo $this->unit->run(92.4,number_format($resultado,1), 'Test get Total a recibir por el afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10006;
		$resultado=$bono->getTotalARecibirAfiliado($id_red,$id_usuario);
		echo $this->unit->run(432.5,number_format($resultado,1), 'Test get Total a recibir por el afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10008;
		$resultado=$bono->getTotalARecibirAfiliado($id_red,$id_usuario);
		echo $this->unit->run(432.5,number_format($resultado,1), 'Test get Total a recibir por el afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		
	}

	public function testRepartirComisiones(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$fecha=date('Y-m-d');
		$id_bono=$this->idBonoDeBinario;
		
		$calculadorBono=new $this->calculador_bono();
		$calculadorBono->calcularComisionesPorBono($id_bono,$fecha);
		
		$id_usuario=10000;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run("2,162.5",number_format($resultado,1), 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10001;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(92.4,number_format($resultado,1), 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
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
		echo $this->unit->run(432.5,number_format($resultado,1), 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10007;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
		$id_usuario=10008;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(432.5,number_format($resultado,1), 'Test validar si entrega comisiones bono en red al afiliado '.$id_usuario,'Resultado es :'.$resultado);
		
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
		
	}
	
	public function testValidarSiElBonoYaCobroVerdadero($id_bono){
		
		$calculadorBono=new $this->calculador_bono();
		$fecha=date('Y-m-d');
		$bono=new $this->bono();$bono->setUpBono($id_bono);
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
		
		
		//----------------------------BONO DE Inicio Rapido ------------------------------------------------
		

		$rangos=array();

		
		$puntosPersonales=4;
		$cualquiera=0;
		
		$datosRango = array(
				'id_rango' => 57,
				'nombre_rango'   => "Inicio Rapido",
				'descripcion_rango'    => "Inicio Rapido",
				'id_tipo_rango' => $puntosPersonales,
				'valor'   => 3,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 1,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "DEB",
				'condicion1'    => $cualquiera,
				'condicion2'	=> $cualquiera,
				'calificado'    => "DOS",
				'estatus_rango'	=> 'ACT'
		);
		
	
		array_push($rangos,$datosRango);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => $this->idBonoDeInicioRapido,
				'nombre_bono'   => "Bono Inicio rapido",
				'descripcion_bono'    => "Bono inicio rapido",
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
				'id_valor' => 7,
				'id_rango'   => $this->idBonoDeInicioRapido,
				'nivel'    => 0,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "ASC",
				'valor'	=> 0
		);
		
		$datosValoresBonoAfiliado = array(
				'id_valor' => 8,
				'id_rango'   => $this->idBonoDeInicioRapido,
				'nivel'    => 1,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "ASC",
				'valor'	=> 100
		);
	
		array_push($datosValoresBono, $datosValoresBonoAfiliado);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBonoVariosRangos ($rangos,$datosBono,$datosValoresBono);

		//----------------------------BONO Binario ------------------------------------------------
		
		
		$rangos=array();
		
		
		$afiliados=1;
		$cualquiera=0;
		
		$datosRango = array(
				'id_rango' => 58,
				'nombre_rango'   => "Binario",
				'descripcion_rango'    => "Binario",
				'id_tipo_rango' => $afiliados,
				'valor'   => 0,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 2,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "DEB",
				'condicion1'    => $cualquiera,
				'condicion2'	=> $cualquiera,
				'calificado'    => "DOS",
				'estatus_rango'	=> 'ACT'
		);
		
		
		array_push($rangos,$datosRango);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => $this->idBonoDeBinario,
				'nombre_bono'   => "Bono Binario",
				'descripcion_bono'    => "Bono Binario",
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
				'id_valor' => 10,
				'id_rango'   => $this->idBonoDeBinario,
				'nivel'    => 0,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "RDESC",
				'valor'	=> 0
		);
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBonoVariosRangos ($rangos,$datosBono,$datosValoresBono);
		
	}

	private function ingresarRedDeAfiliacion(){
		
		$id_red=300;
		
		$red=$this->red;
		$infinito=0;
		$datosRed = array(
				'id_red' => $id_red,
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

		$this->ingresarAfiliado($id_red,10000,"giovanny",2,2,0);
		$this->ingresarAfiliado($id_red,10001,"carlos",10000,10000,0);
		$this->ingresarAfiliado($id_red,10002,"pedro",10000,10000,1);
		$this->ingresarAfiliado($id_red,10003,"camilo",10001,10001,0);
		$this->ingresarAfiliado($id_red,10004,"Nicolas",10001,10001,1);
		$this->ingresarAfiliado($id_red,10005,"esperanza",10002,10000,0);
		$this->ingresarAfiliado($id_red,10006,"maria",10002,10000,1);
		$this->ingresarAfiliado($id_red,10007,"pepe",10003,10003,0);
		$this->ingresarAfiliado($id_red,10008,"dario",10003,10001,1);
		$this->ingresarAfiliado($id_red,10009,"diego",10006,10000,0);
		$this->ingresarAfiliado($id_red,10010,"andres",10006,10000,1);
		$this->ingresarAfiliado($id_red,10011,"ricardo",10007,10007,0);
		$this->ingresarAfiliado($id_red,10012,"miguel",10007,10007,1);
		$this->ingresarAfiliado($id_red,10013,"paola",10010,10010,0);
		$this->ingresarAfiliado($id_red,10014,"fernando",10010,10010,1);
		$this->ingresarAfiliado($id_red,10015,"laura",10012,10012,0);
		$this->ingresarAfiliado($id_red,10016,"david",10012,10012,1);
		$this->ingresarAfiliado($id_red,10017,"mario",10014,10014,0);
		$this->ingresarAfiliado($id_red,10018,"andrea",10014,10014,1);
		$this->ingresarAfiliado($id_red,10019,"joan",10016,10016,0);
		$this->ingresarAfiliado($id_red,10020,"alejandro",10016,10001,1);
		$this->ingresarAfiliado($id_red,10021,"marcel",10017,10017,0);
		$this->ingresarAfiliado($id_red,10022,"daniel",10017,10017,1);
		$this->ingresarAfiliado($id_red,10023,"julian",10019,10019,0);
		$this->ingresarAfiliado($id_red,10024,"german",10019,10019,1);
		$this->ingresarAfiliado($id_red,10025,"luis",10020,10016,0);
		$this->ingresarAfiliado($id_red,10026,"alberto",10020,10020,1);
		$this->ingresarAfiliado($id_red,10027,"carolina",10022,10022,0);
		$this->ingresarAfiliado($id_red,10028,"haroll",10022,10022,1);
		$this->ingresarAfiliado($id_red,10029,"ruben",10023,10001,0);
		$this->ingresarAfiliado($id_red,10030,"marcela",10024,10001,0);
		$this->ingresarAfiliado($id_red,10031,"nelly",10026,10026,0);
		$this->ingresarAfiliado($id_red,10032,"jose",10027,10027,0);
		$this->ingresarAfiliado($id_red,10033,"johana",10027,10027,1);
	}

	private function ingresarRedDeAfiliacion2(){
	
		$id_red=300;
		
		$red=new $this->red;
		$infinito=0;
		$datosRed = array(
				'id_red' => $id_red,
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
		 *           	               	     |    TU    |
		 *           					     | ID:10000 |
		 *        	   	                     |_Spr:_2___|
		 *                  	   __________/           \____________
		 *           	          |     Z    |        	  |   PEDRO  |
		 *           	          | ID:10001 |   		  | ID:10002 |
		 *        	   	          |_Spr:10000|            |_Spr:10000|
		 *              __________/       _____\____    			\_________
		 *             |   CAMILO |      | NICOLAS  |    			|   MARIA  |
		 *             | ID:10003 |   	 | ID:10004 |   			| ID:10005 |
		 *        	   |_Spr:10001|      |_Spr:10001|    			|_Spr:10002|
		 *		    ___/_____   				_\_______           ______|____
		 *         |    Y     | 				| DARIO    |        |  X       |  
		 *         | ID:10006 | 				| ID:10007 |        | ID:10008 |
		 *         |_Spr:10003| 				|_Spr:10004|        |_Spr:10005|
		 *	 _______/__   _____\____                              ____/____     _\________
		 *	| LAURA    | | DAVID    |                            |  MARIO   |  | ANDREA   |
		 *	| ID:10009 | | ID:10010 |                            | ID:10011 |  | ID:10012 |
		 *	|_Spr:10006| |_Spr:10006|                            |_Spr:10008|  |_Spr:10008|
		*/
		
		$this->ingresarAfiliado($id_red,10000,"Tu",2,2,0);
		$this->ingresarAfiliado($id_red,10001,"Z",10000,10000,0);
		$this->ingresarAfiliado($id_red,10002,"pedro",10000,10000,1);
		$this->ingresarAfiliado($id_red,10003,"camilo",10001,10001,0);
		$this->ingresarAfiliado($id_red,10004,"Nicolas",10001,10001,1);
		$this->ingresarAfiliado($id_red,10005,"Maria",10002,10002,0);
		$this->ingresarAfiliado($id_red,10006,"Y",10003,10003,0);
		$this->ingresarAfiliado($id_red,10007,"dario",10004,10004,0);
		$this->ingresarAfiliado($id_red,10008,"X",10005,10005,0);
		$this->ingresarAfiliado($id_red,10009,"laura",10006,10006,0);
		$this->ingresarAfiliado($id_red,10010,"david",10006,10006,1);
		$this->ingresarAfiliado($id_red,10011,"mario",10008,10008,0);
		$this->ingresarAfiliado($id_red,10012,"andrea",10008,10008,1);
		
	}
	
	private function ingresarAfiliado($id_red,$id,$nombre,$debajo_de,$sponsor,$lado){
		$afiliador=new $this->modelo_bono();
		$afiliador->crearNuevoUsuario ($id,$nombre,"2016-03-17",$id,$id_red,$debajo_de,$sponsor,$lado);
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
		
		$producto=1;
		$servicio=2;
		$membresia=5;

		
		$id=500;$costo=410;$puntos=3;
		$this->ingresarMercancia($id,"Membresia (3 puntos)",$id_categoria,$membresia,$costo,$puntos);
		
		$id=501;$costo=1230;$puntos=9;
		$this->ingresarMercancia($id,"Membresia (9 puntos)",$id_categoria,$membresia,$costo,$puntos);
		
		$id=502;$costo=410;$puntos=3;
		$this->ingresarMercancia($id,"Briut",$id_categoria,$producto,$costo,$puntos);
		
		$id=503;$costo=510;$puntos=3;
		$this->ingresarMercancia($id,"Reset DNA",$id_categoria,$producto,$costo,$puntos);
		
		$id=504;$costo=300;$puntos=3;
		$this->ingresarMercancia($id,"Movistar",$id_categoria,$servicio,$costo,$puntos);
		

/*							RED DE AFILIACION
*           	            			 ____________
*           	            			| GIOVANNY   |
*           							| ID:10000   | 
*        	   	           				|  Spr:_2    |
*        			  					|Merc:0,1,2,3|
*               	   					|Total:$2560 |
*        			  					|Puntos: 18  |
*        _______/__    ___/______  __\________  _____\____    ___\______     ___\_____
*       |  CARLOS  | |   PEDRO  | |   CAMILO | | NICOLAS  |  | ESPERANZA|   |   MARIA  | 
*       | ID:10001 | | ID:10002 | | ID:10003 | | ID:10004 |  | ID:10005 |   | ID:10006 |
*       | Spr:10000| |Spr:10000 | |_Spr:10001| |_Spr:10001|  |_Spr:10000|   |_Spr:10000|
*       |Merc: 0,3 | |Merc: 1,3 | |Merc:  0  | |Merc:  0  |  |Merc:  0  |   |Merc:  0  |
*       |Total:    | |Total:	| |Total:    | |Total:    |  |Total:    |   |Total:    |
*       |Puntos:   | |Puntos: 	| |Puntos:   | |Puntos:   |  |Puntos:   |   |Puntos:   |      
*             
*             
*             
*        	  
*        	  
*        	  
*        	  
*		    ___/_____   __\_______                      _____/____     __\_______
*         | PEPE     | | DARIO    |                    |  DIEGO   |   |  ANDRES  |
*         | ID:10007 | | ID:10008 |                    | ID:10009 |   | ID:10010 |
*         |_Spr:10003| |_Spr:10001|                    |_Spr:10000|   |_Spr:10000|
*         |Merc:  0  | |Merc:  2  |                    |Merc : 1  |   |Merc :   0|
*         |Total:$410| |Total:$410|                    |Total:1230|   |Total:$410|
*         |Puntos: 3 | |Puntos: 3 |                    |Puntos: 9 |   |Puntos: 3 |
*  _______/__   _____\____                                       _____/____    __\_______
* | RICARDO  | | MIGUEL   |                                     |  PAOLA   |   | FERNANDO |
* | ID:10011 | | ID:10012 |                                     | ID:10013 |   | ID:10014 |
* |_Spr:10007| |_Spr:10007|                                     |_Spr:10010|   |_Spr:10010|
* |Merc: 0   | |Merc:   0 |                                     |Merc:  0  |   |Merc:   0 |
* |Total:$410| |Total:$410|                                     |Total:$410|   |Total:$410|
* |Puntos: 3 | |Puntos: 3 |                                     |Puntos:  3|   |Puntos: 3 |
*        _______/__   _____\____                                            ____/____     _\_________
*       | LAURA    | | DAVID    |                                          |  MARIO   |   | ANDREA   |
*       | ID:10015 | | ID:10016 |                                          | ID:10017 |   | ID:10018 |
*       |_Spr:10012| |_Spr:10012|                                          |_Spr:10014|   |_Spr:10014|
*       |Merc:  2  | |Merc:0,1,4|                                          |Merc: 0,0 |   |Merc: 0   |
*       |Total:$410| |Total:1940|                                          |Total:$820|   |Total:$410|
*       |Puntos: 3 | |Puntos:15 |                                          |Puntos: 6 |   |Puntos: 3 |
*              _______/___  _____\____                                 ____/____      _\________
*             | JOAN     | |ALEJANDRO |                               | MARCEL   |   | DANIEL   |
*             | ID:10019 | | ID:10020 |                               | ID:10021 |   | ID:10022 |
*             |_Spr:10016| |_Spr:10001|                               |_Spr:10017|   |_Spr:10017|
*             |Merc:  0  | |Merc:  0  |                               |Merc:   0 |   |Merc:   0 |
*             |Total:$410| |Total:$410|                               |Total:$410|   |Total:$410|
*             |Puntos: 3 | |Puntos: 3 |\                              |Puntos: 3 |   |Puntos: 3 |
* __________/  _____\____   _/________  \__________                          ___________/ ___\______
*| JULIAN   | | GERMAN   | |  LUIS    | |ALBERTO   |                        | CAROLINA | | HAROLL   |
*| ID:10023 | | ID:10024 | | ID:10025 | | ID:10026 |                        | ID:10027 | | ID:10028 |
*|_Spr:10019| |_Spr:10019| |_Spr:10016| |_Spr:10020|                        |_Spr:10022| |_Spr:10022|
*|Merc:   1 | |Merc:  0  | |Merc:  0  | |Merc:  1  |                        |Merc:   1 | |Merc:  1  |
*|Total:1230| |Total:$410| |Total:$410| |Total:1230|                        |Total:1230| |Total:1230|
*|Puntos: 9 | |Puntos: 3 | |Puntos: 3 | |Puntos: 9 |                        |Puntos: 9 | |Puntos: 9 |
*_____|_____     ____|_____               ____|_____             __________/   ____\______
*|  RUBEN   |   |   MARCELA|             |  NELLY   |    	     |  JOSE    | | JOHANA   |
*| ID:10029 |   | ID:10030 |       	     | ID:10031 |            | ID:10032 | | ID:10033 |
*|Spr:10001 |   |Spr:10001 |             |Spr:10026 |            |_Spr:10027| |_Spr:10027|
*|Merc:   0 |   |Merc:  0  |             |Merc:  0  |            |Merc:  0  | |Merc:   0 | 
*|Total:$410|   |Total:$410|             |Total:$410|            |Total:$410| |Total:$410|
*|Puntos: 3 |   |Puntos: 3 |             |Puntos: 3 |            |Puntos: 3 | |Puntos: 3 |
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
	
	private function ingresarVentas2(){
	/*
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
	/*
		$producto=1;
		$servicio=2;
		$membresia=5;
	
	
		$id=500;$costo=410;$puntos=3;
		$this->ingresarMercancia($id,"Membresia (3 puntos)",$id_categoria,$membresia,$costo,$puntos);
	
		$id=501;$costo=1230;$puntos=9;
		$this->ingresarMercancia($id,"Membresia (9 puntos)",$id_categoria,$membresia,$costo,$puntos);
	
		$id=502;$costo=410;$puntos=3;
		$this->ingresarMercancia($id,"Briut",$id_categoria,$producto,$costo,$puntos);
	
		$id=503;$costo=510;$puntos=3;
		$this->ingresarMercancia($id,"Reset DNA",$id_categoria,$producto,$costo,$puntos);
	
		$id=504;$costo=300;$puntos=3;
		$this->ingresarMercancia($id,"Movistar",$id_categoria,$servicio,$costo,$puntos);
	*/
		/*										Ventas
		 *           	                      __________
		 *           	               	     |    TU    |
		 *           					     | ID:10000 |
		 *        	   	                     | Spr: 2   |
		 *        	   	                     |Puntos: 9 |
		 *                  	   __________/           \____________
		 *           	          |     Z    |        	  |   PEDRO  |
		 *           	          | ID:10001 |   		  | ID:10002 |
		 *        	   	          |_Spr:10000|            |_Spr:10000|
		 *        	   	          |Puntos: 3 |            |Puntos: 9 |
		 *              __________/       _____\____    			\_________
		 *             |   CAMILO |      | NICOLAS  |    			|   MARIA  |
		 *             | ID:10003 |   	 | ID:10004 |   			| ID:10005 |
		 *        	   |_Spr:10001|      |_Spr:10001|    			|_Spr:10002|
		 *        	   |Puntos: 3 |      |Puntos: 3 |    			|Puntos: 9 |
		 *		    ___/_____   				_\_______           ______|____
		 *         |    Y     | 				| DARIO    |        |  X       |
		 *         | ID:10006 | 				| ID:10007 |        | ID:10008 |
		 *         |_Spr:10003| 				|_Spr:10004|        |_Spr:10005|
		 *         |Puntos: 9 | 				|Puntos: 9 |        |Puntos: 9 |
		 *	 _______/__   _____\____                              ____/____     _\________
		 *	| LAURA    | | DAVID    |                            |  MARIO   |  | ANDREA   |
		 *	| ID:10009 | | ID:10010 |                            | ID:10011 |  | ID:10012 |
		 *	|_Spr:10006| |_Spr:10006|                            |_Spr:10008|  |_Spr:10008|
		 *	|Puntos: 9 | |Puntos: 9 |                            |Puntos: 9 |  |Puntos: 9 |
		 */
		
		$fecha=date('Y-m-d');
	
		$this->ingresarVentaMercanciaUsuario(800,10000,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(801,10001,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(802,10002,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(803,10003,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(804,10004,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(805,10005,$fecha,array(500,500,500));
		$this->ingresarVentaMercanciaUsuario(806,10006,$fecha,array(500,502,503));
		$this->ingresarVentaMercanciaUsuario(807,10007,$fecha,array(500,500,500));
		$this->ingresarVentaMercanciaUsuario(808,10008,$fecha,array(503,500,504));
		$this->ingresarVentaMercanciaUsuario(809,10009,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(810,10010,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(811,10011,$fecha,array(501));
		$this->ingresarVentaMercanciaUsuario(812,10012,$fecha,array(501));

	
	}
	
	private function ingresarVentasFecha($fecha){

	
/*							RED DE AFILIACION
*           	                      ____________
*           	               	     | GIOVANNY   |
*           					     | ID:10000   | 
*        	   	                     |  Spr:_2    |
*        							 |Merc:0,1,2,3|
*               					 |Total:$2560 |
*        							 |Puntos: 18  |
*                  	       __________/           \___________
*           	          |  CARLOS  |        	  |   PEDRO  |
*           	          | ID:10001 |   		  | ID:10002 |
*        	   	          | Spr:10000|			  |Spr:10000 |
*        				  |Merc: 0,3 |            |Merc: 1,3 |
*        				  |Total:$920|            |Total:1740|
*        				  |Puntos: 6 |            |Puntos:12 |      
*              __________/       _____\____    ___/_______    \_________
*             |   CAMILO |      | NICOLAS  |  | ESPERANZA|   |   MARIA  |
*             | ID:10003 |   	| ID:10004 |  | ID:10005 |   | ID:10006 |
*        	  |_Spr:10001|      |_Spr:10001|  |_Spr:10000|   |_Spr:10000|
*        	  |Merc:  0  |      |Merc:  0  |  |Merc:  0  |   |Merc:  0  |
*        	  |Total:$410|      |Total:$410|  |Total:$410|   |Total:$410|
*        	  |Puntos: 3 |      |Puntos: 3 |  |Puntos: 3 |   |Puntos: 3 |
*		    ___/_____   __\_______                      _____/____     __\_______
*         | PEPE     | | DARIO    |                    |  DIEGO   |   |  ANDRES  |
*         | ID:10007 | | ID:10008 |                    | ID:10009 |   | ID:10010 |
*         |_Spr:10003| |_Spr:10001|                    |_Spr:10000|   |_Spr:10000|
*         |Merc:  0  | |Merc:  2  |                    |Merc : 1  |   |Merc :   0|
*         |Total:$410| |Total:$410|                    |Total:1230|   |Total:$410|
*         |Puntos: 3 | |Puntos: 3 |                    |Puntos: 9 |   |Puntos: 3 |
*  _______/__   _____\____                                       _____/____    __\_______
* | RICARDO  | | MIGUEL   |                                     |  PAOLA   |   | FERNANDO |
* | ID:10011 | | ID:10012 |                                     | ID:10013 |   | ID:10014 |
* |_Spr:10007| |_Spr:10007|                                     |_Spr:10010|   |_Spr:10010|
* |Merc: 0   | |Merc:   0 |                                     |Merc:  0  |   |Merc:   0 |
* |Total:$410| |Total:$410|                                     |Total:$410|   |Total:$410|
* |Puntos: 3 | |Puntos: 3 |                                     |Puntos:  3|   |Puntos: 3 |
*        _______/__   _____\____                                            ____/____     _\_________
*       | LAURA    | | DAVID    |                                          |  MARIO   |   | ANDREA   |
*       | ID:10015 | | ID:10016 |                                          | ID:10017 |   | ID:10018 |
*       |_Spr:10012| |_Spr:10012|                                          |_Spr:10014|   |_Spr:10014|
*       |Merc:  2  | |Merc:0,1,4|                                          |Merc: 0,0 |   |Merc: 0   |
*       |Total:$410| |Total:1940|                                          |Total:$820|   |Total:$410|
*       |Puntos: 3 | |Puntos:15 |                                          |Puntos: 6 |   |Puntos: 3 |
*              _______/___  _____\____                                 ____/____      _\________
*             | JOAN     | |ALEJANDRO |                               | MARCEL   |   | DANIEL   |
*             | ID:10019 | | ID:10020 |                               | ID:10021 |   | ID:10022 |
*             |_Spr:10016| |_Spr:10001|                               |_Spr:10017|   |_Spr:10017|
*             |Merc:  0  | |Merc:  0  |                               |Merc:   0 |   |Merc:   0 |
*             |Total:$410| |Total:$410|                               |Total:$410|   |Total:$410|
*             |Puntos: 3 | |Puntos: 3 |\                              |Puntos: 3 |   |Puntos: 3 |
* __________/  _____\____   _/________  \__________                          ___________/ ___\______
*| JULIAN   | | GERMAN   | |  LUIS    | |ALBERTO   |                        | CAROLINA | | HAROLL   |
*| ID:10023 | | ID:10024 | | ID:10025 | | ID:10026 |                        | ID:10027 | | ID:10028 |
*|_Spr:10019| |_Spr:10019| |_Spr:10016| |_Spr:10020|                        |_Spr:10022| |_Spr:10022|
*|Merc:   1 | |Merc:  0  | |Merc:  0  | |Merc:  1  |                        |Merc:   1 | |Merc:  1  |
*|Total:1230| |Total:$410| |Total:$410| |Total:1230|                        |Total:1230| |Total:1230|
*|Puntos: 9 | |Puntos:   | |Puntos:   | |Puntos:   |                        |Puntos:   | |Puntos:   |
*_____|_____     ____|_____               ____|_____             __________/   ____\______
*|  RUBEN   |   |   MARCELA|             |  NELLY   |    	     |  JOSE    | | JOHANA   |
*| ID:10029 |   | ID:10030 |       	     | ID:10031 |            | ID:10032 | | ID:10033 |
*|Spr:10001 |   |Spr:10001 |             |Spr:10026 |            |_Spr:10027| |_Spr:10027|
*|Merc:   0 |   |Merc:  0  |             |Merc:  0  |            |Merc:  0  | |Merc:   0 | 
*|Total:$410|   |Total:$410|             |Total:$410|            |Total:$410| |Total:$410|
*|Puntos: 3 |   |Puntos: 3 |             |Puntos: 3 |            |Puntos: 3 | |Puntos: 3 |
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
