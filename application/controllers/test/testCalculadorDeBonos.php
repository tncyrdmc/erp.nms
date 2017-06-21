<?php
class testCalculadorDeBonos extends CI_Controller {


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
		$this->red->eliminarRed();
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
		$this->venta->eliminarVentas();
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();

	}
	
	public function index(){

		$this->before();
		$this->testGetAfiliadosPorNivel();
		$this->after();
		
		
		$this->before();
		$this->testGetBonosActivosPorCobrar();
		$this->after();
	
		$this->before();
		$this->testGetUsuariosDeLaRedtestGetUsuariosDeLaRed();
		$this->after();
		
		
		$this->before();
		$this->testGetUsuarioCumpleCondicionAfiliacionesBono();
		$this->after();

		$this->before();
		$this->testGetUsuarioCumpleCondicionVentasRedBono();
		$this->after();

		$this->before();
		$this->testGetUsuarioCumpleCondicionComprasPersonalesBono();
		$this->after();
	
		$this->before();
		$this->testGetUsuarioCumpleCondicionPuntosComisionablesPersonalesBono();
		$this->after();

		$this->before();
		$this->testGetUsuarioCumpleCondicionPuntosRedBono();
		$this->after();

		$this->before();
		$this->testRepartirComisionBonoRedHaciaAbajo();
		$this->after();

		$this->before();
		$this->testRepartirComisionBonoDirectosHaciaAbajo();
		$this->after();
		
		$this->before();
		$this->testRepartirComisionBonoRedHaciaArriba();
		$this->after();
		 
		$this->before();
		$this->testRepartirComisionBonoDirectosHaciaArriba();
		$this->after();

		$this->before();
		$this->testValidarSiUsuarioYaCobroBonoUnicoFalso();
		$this->after();
		
		$this->before();
		$this->testValidarSiElBonoYaCobroFalso();
		$this->after();

	}

	public function testUsuarioActivo(){
		$afiliados=new $this->afiliado();
		$afiliados->isActivo(10000,300,1,"RED",1,"DESC");
	}
	 
	public function testGetAfiliadosPorNivel(){
		$fecha=date('Y-m-d');
		// TODA LA RED
		//Nivel 1
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,1,"RED",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10001,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10002,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		//Nivel 2
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,2,"RED",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10003,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10004,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[2];
		echo $this->unit->run(10005,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[3];
		echo $this->unit->run(10006,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		//Nivel 3
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,3,"RED",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10007,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10008,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[2];
		echo $this->unit->run(10009,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[3];
		echo $this->unit->run(10010,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		//Nivel 4
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,4,"RED",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10011,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10012,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[2];
		echo $this->unit->run(10013,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[3];
		echo $this->unit->run(10014,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		
		//Nivel 5
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,5,"RED",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10015,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10016,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[2];
		echo $this->unit->run(10017,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[3];
		echo $this->unit->run(10018,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		
		// DIRECTOS
		//Nivel 1
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,1,"DIRECTOS",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10001,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10002,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[2];
		echo $this->unit->run(10005,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[3];
		echo $this->unit->run(10006,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[4];
		echo $this->unit->run(10009,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[5];
		echo $this->unit->run(10010,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		//Nivel 2
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,2,"DIRECTOS",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10003,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10004,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[2];
		echo $this->unit->run(10008,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[3];
		echo $this->unit->run(10020,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[4];
		echo $this->unit->run(10029,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[5];
		echo $this->unit->run(10030,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[6];
		echo $this->unit->run(10013,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[7];
		echo $this->unit->run(10014,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);

		
		//Nivel 3
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,3,"DIRECTOS",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10007,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10026,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[2];
		echo $this->unit->run(10017,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[3];
		echo $this->unit->run(10018,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);

		//Nivel 4
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,4,"DIRECTOS",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10011,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10012,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[2];
		echo $this->unit->run(10031,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[3];
		echo $this->unit->run(10021,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[4];
		echo $this->unit->run(10022,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		//Nivel 5
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,5,"DIRECTOS",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10015,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10016,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[2];
		echo $this->unit->run(10027,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[3];
		echo $this->unit->run(10028,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);

		//Nivel 6
		$afiliados=new $this->afiliado();
		$afiliados->getAfiliadosPorNivel(10000,300,6,"DIRECTOS",1,"DESC");
		
		$resultado=$afiliados->getIdAfiliadosRed()[0];
		echo $this->unit->run(10019,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[1];
		echo $this->unit->run(10025,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[2];
		echo $this->unit->run(10032,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$afiliados->getIdAfiliadosRed()[3];
		echo $this->unit->run(10033,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
	}
	
	public function testGetBonosActivosPorCobrar(){
		$calculadorBono=new $this->calculador_bono();
		$bono=$this->bono;
		
		$this->bono->setUpBono(50);
		$resultado=$calculadorBono->isDisponibleCobrar($bono);
		echo $this->unit->run(true,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);

		$this->bono->setUpBono(51);
		$resultado=$calculadorBono->isDisponibleCobrar($bono);
		echo $this->unit->run(false,$resultado, 'Test set Base de datos No Esta disponible Para Cobrar porque esta desactivado','Resultado es :'.$resultado);
		
		$this->bono->setUpBono(52);
		$resultado=$calculadorBono->isDisponibleCobrar($bono);
		echo $this->unit->run(false,$resultado, 'Test set Base de datos No Esta disponible Para Cobrar porque no esta vigente','Resultado es :'.$resultado);
		
		$bonos=$calculadorBono->getTodosLosBonos();

		$resultado=$calculadorBono->isDisponibleCobrar($bonos[0]);
		echo $this->unit->run(true,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->isDisponibleCobrar($bonos[1]);
		echo $this->unit->run(false,$resultado, 'Test set Base de datos No Esta disponible Para Cobrar porque esta desactivado','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->isDisponibleCobrar($bonos[2]);
		echo $this->unit->run(false,$resultado, 'Test set Base de datos No Esta disponible Para Cobrar porque no esta vigente','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->isDisponibleCobrar($bonos[3]);
		echo $this->unit->run(true,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
	}

	public function testGetUsuariosDeLaRedtestGetUsuariosDeLaRed(){
		$calculadorBono=new $this->calculador_bono();

		$usuarios=$calculadorBono->getUsuariosRed(300);
		
		$resultado=$usuarios[0]->id_afiliado;
		echo $this->unit->run(10000,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[1]->id_afiliado;
		echo $this->unit->run(10001,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[2]->id_afiliado;
		echo $this->unit->run(10002,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[3]->id_afiliado;
		echo $this->unit->run(10003,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[4]->id_afiliado;
		echo $this->unit->run(10004,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[5]->id_afiliado;
		echo $this->unit->run(10005,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[6]->id_afiliado;
		echo $this->unit->run(10006,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[7]->id_afiliado;
		echo $this->unit->run(10007,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[8]->id_afiliado;
		echo $this->unit->run(10008,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[9]->id_afiliado;
		echo $this->unit->run(10009,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[10]->id_afiliado;
		echo $this->unit->run(10010,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[11]->id_afiliado;
		echo $this->unit->run(10011,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[12]->id_afiliado;
		echo $this->unit->run(10012,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[13]->id_afiliado;
		echo $this->unit->run(10013,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[14]->id_afiliado;
		echo $this->unit->run(10014,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[15]->id_afiliado;
		echo $this->unit->run(10015,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[16]->id_afiliado;
		echo $this->unit->run(10016,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[17]->id_afiliado;
		echo $this->unit->run(10017,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[18]->id_afiliado;
		echo $this->unit->run(10018,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[19]->id_afiliado;
		echo $this->unit->run(10019,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[20]->id_afiliado;
		echo $this->unit->run(10020,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[21]->id_afiliado;
		echo $this->unit->run(10021,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[22]->id_afiliado;
		echo $this->unit->run(10022,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[23]->id_afiliado;
		echo $this->unit->run(10023,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[24]->id_afiliado;
		echo $this->unit->run(10024,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[25]->id_afiliado;
		echo $this->unit->run(10025,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[26]->id_afiliado;
		echo $this->unit->run(10026,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[27]->id_afiliado;
		echo $this->unit->run(10027,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[28]->id_afiliado;
		echo $this->unit->run(10028,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[29]->id_afiliado;
		echo $this->unit->run(10029,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[30]->id_afiliado;
		echo $this->unit->run(10030,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[31]->id_afiliado;
		echo $this->unit->run(10031,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[32]->id_afiliado;
		echo $this->unit->run(10032,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		$resultado=$usuarios[33]->id_afiliado;
		echo $this->unit->run(10033,$resultado, 'Test set Base de datos Esta disponible Para Cobrar','Resultado es :'.$resultado);
		
		
	
	}

	public function testGetUsuarioCumpleCondicionAfiliacionesBono(){
		$calculadorBono=new $this->calculador_bono();
		$id_red=300;
		$id_bono=54;
		$usuarios=$calculadorBono->getUsuariosRed($id_red);
		$fecha=date('Y-m-d');
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[0]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[1]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[2]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[3]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[4]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[5]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[6]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[7]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[8]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[9]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[10]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[11]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[12]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[13]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[14]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[15]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[16]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[17]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[18]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[19]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[20]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[21]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[22]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[23]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[24]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[25]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[26]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[27]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[28]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[29]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[30]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[31]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[32]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[33]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Afiliaciones Directas','Resultado es :'.$resultado);
		
	}
	
	public function testGetUsuarioCumpleCondicionVentasRedBono(){
		
		$fecha=date('Y-m-d');
		$calculadorBono=new $this->calculador_bono();
		$id_red=300;
		$id_bono=55;
		$usuarios=$calculadorBono->getUsuariosRed($id_red);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[0]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);

		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[1]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[2]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[3]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[4]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[5]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[6]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[7]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[8]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[9]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[10]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[11]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[12]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[13]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[14]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[15]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[16]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[17]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[18]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[19]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[20]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[21]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[22]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[23]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[24]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[25]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[26]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[27]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[28]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[29]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[30]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[31]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[32]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[33]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);

	}
	
	public function testGetUsuarioCumpleCondicionComprasPersonalesBono(){
		
		$calculadorBono=new $this->calculador_bono();
		$id_red=300;
		$id_bono=50;
		$usuarios=$calculadorBono->getUsuariosRed($id_red);
		$fecha=date('Y-m-d');
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[0]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[1]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[2]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[3]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[4]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[5]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[6]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[7]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[8]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[9]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[10]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[11]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[12]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[13]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[14]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[15]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[16]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[17]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[18]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[19]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[20]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[21]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[22]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[23]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[24]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[25]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[26]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[27]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[28]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[29]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[30]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[31]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[32]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[33]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por compras personales','Resultado es :'.$resultado);
		
	}
	
	public function testGetUsuarioCumpleCondicionPuntosComisionablesPersonalesBono(){
	
		$calculadorBono=new $this->calculador_bono();
		$id_red=300;
		$id_bono=53;
		$usuarios=$calculadorBono->getUsuariosRed($id_red);
		$fecha=date('Y-m-d');
	

		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[0]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales '.$usuarios[0]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[1]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[1]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[2]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[2]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[3]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[3]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[4]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[4]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[5]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[5]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[6]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[6]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[7]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[7]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[8]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[8]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[9]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[9]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[10]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[10]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[11]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[11]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[12]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[12]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[13]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[13]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[14]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[14]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[15]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[15]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[16]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[16]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[17]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[17]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[18]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[18]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[19]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[19]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[20]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[20]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[21]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[21]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[22]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[22]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[23]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[23]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[24]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[24]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[25]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[25]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[26]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[26]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[27]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[27]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[28]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[28]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[29]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[29]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[30]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[30]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[31]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[31]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[32]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[32]->id_afiliado.'','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[33]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por puntos Comisionables personales'.$usuarios[33]->id_afiliado.'','Resultado es :'.$resultado);
	
	}
	
	public function testGetUsuarioCumpleCondicionPuntosRedBono(){
	
		$calculadorBono=new $this->calculador_bono();
		$id_red=300;
		$id_bono=56;
		$usuarios=$calculadorBono->getUsuariosRed($id_red);
		$fecha=date('Y-m-d');
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[0]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[1]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[2]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[3]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[4]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[5]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[6]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[7]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[8]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[9]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[10]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[11]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[12]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[13]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[14]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[15]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[16]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[17]->id_afiliado,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[18]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[19]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[20]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[21]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[22]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[23]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[24]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[25]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[26]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[27]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[28]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[29]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[30]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[31]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[32]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->usuarioPuedeCobrarBono($id_bono,$usuarios[33]->id_afiliado,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si Esta disponible Para Cobrar por Ventas en la red Equilibrada','Resultado es :'.$resultado);
	
	}
	
	public function testRepartirComisionBonoRedHaciaAbajo(){
		
		$calculadorBono=new $this->calculador_bono();
		$repartidorComisionBono=new$this->repartidor_comision_bono();
		$id_bono=56;
		$bono=new $this->bono();
		$bono->setUpBono($id_bono);
		$id_bono_historial=1;
		$fecha=date('Y-m-d');

		$calculadorBono->darComisionRedDeAfiliado($bono,$id_bono_historial,10000,$fecha);
		
		// Nivel 0
		
		$id_usuario=10000;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
		// Nivel 1
		$id_usuario=10001;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(30,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
		$id_usuario=10002;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(30,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);

		// Nivel 2
		
		$id_usuario=10003;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(20,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
		$id_usuario=10006;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(20,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		


		// Nivel 3
		$id_usuario=10007;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(10,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
				
		$id_usuario=10010;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(10,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);



	}
	
	public function testRepartirComisionBonoDirectosHaciaAbajo(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$repartidorComisionBono=new$this->repartidor_comision_bono();
		$calculadorBono=new $this->calculador_bono();
		$id_bono=57;
		$bono=new $this->bono();
		$bono->setUpBono($id_bono);
		$id_bono_historial=1;
		$fecha=date('Y-m-d');

		$calculadorBono->darComisionRedDeAfiliado($bono,$id_bono_historial,10000,$fecha);
		
		// Nivel 0
		
		$id_usuario=10000;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(5,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
		// Nivel 1
		
		$id_usuario=10001;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(30,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
	
		$id_usuario=10002;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(30,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);

		$id_usuario=10006;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(30,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);

		$id_usuario=10010;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(30,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
		
		// Nivel 2
		$id_usuario=10003;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(20,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);

		$id_usuario=10014;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(20,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);

		
		// Nivel 3
		$id_usuario=10007;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(10,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
		$id_usuario=10017;
		$resultado=$repartidorComisionBono->getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario)[0]->total;
		echo $this->unit->run(10,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);

	}
	
	public function testRepartirComisionBonoRedHaciaArriba(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$calculadorBono=new $this->calculador_bono();
		$id_bono=58;
		$bono=new $this->bono();
		$bono->setUpBono($id_bono);
		$id_bono_historial=1;
		$fecha=date('Y-m-d');
		
		$calculadorBono->darComisionRedDeAfiliado($bono,$id_bono_historial,10007,$fecha);
		
		// Nivel 3
		$transaccion=1;$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$repartidorComisionBono->setUpReparticionComision($transaccion);
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(10,$resultado, 'Test validar si entrega comisiones bono en red Hacia Arriba $','Resultado es :'.$resultado);
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10000,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
		// Nivel 2
		$transaccion=2;$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$repartidorComisionBono->setUpReparticionComision($transaccion);
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(20,$resultado, 'Test validar si entrega comisiones bono en red Hacia Arriba $','Resultado es :'.$resultado);
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10001,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
		// Nivel 1
		
		$transaccion=3;$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$repartidorComisionBono->setUpReparticionComision($transaccion);
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(30,$resultado, 'Test validar si entrega comisiones bono en red Hacia Arriba $','Resultado es :'.$resultado);
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10003,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);

		// Nivel 0
		
		$transaccion=4;$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$repartidorComisionBono->setUpReparticionComision($transaccion);
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en red Hacia Arriba $','Resultado es :'.$resultado);
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10007,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
	}
	
	public function testRepartirComisionBonoDirectosHaciaArriba(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$calculadorBono=new $this->calculador_bono();
		$id_bono=59;
		$bono=new $this->bono();
		$bono->setUpBono($id_bono);
		$id_bono_historial=1;
		$fecha=date('Y-m-d');
		
		$calculadorBono->darComisionRedDeAfiliado($bono,$id_bono_historial,10007,$fecha);
		
		// Nivel 3
		$transaccion=1;$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$repartidorComisionBono->setUpReparticionComision($transaccion);
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(10,$resultado, 'Test validar si entrega comisiones bono en Directos Hacia Arriba $','Resultado es :'.$resultado);
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10000,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);

		// Nivel 2
		$transaccion=2;$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$repartidorComisionBono->setUpReparticionComision($transaccion);
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(20,$resultado, 'Test validar si entrega comisiones bono en Directos Hacia Arriba $','Resultado es :'.$resultado);
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10001,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
		// Nivel 1
		$transaccion=3;$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$repartidorComisionBono->setUpReparticionComision($transaccion);
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(30,$resultado, 'Test validar si entrega comisiones bono en Directos Hacia Arriba $','Resultado es :'.$resultado);
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10003,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
		// Nivel 0
		$transaccion=4;$repartidorComisionBono=new$this->repartidor_comision_bono();
		
		$repartidorComisionBono->setUpReparticionComision($transaccion);
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(0,$resultado, 'Test validar si entrega comisiones bono en Directos Hacia Arriba $','Resultado es :'.$resultado);
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10007,$resultado, 'Test validar si entrega comisiones bono en red','Resultado es :'.$resultado);
		
	}
	
	public function testValidarSiElBonoYaCobroFalso(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
		$fecha=date('Y-m-d');
		$calculadorBono=new $this->calculador_bono();

		$id_bono=50;$bono=new $this->bono();$bono->setUpBono($id_bono,$fecha);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono no sea pagado','Resultado es :'.$resultado);
	
		$id_bono=53;$bono=new $this->bono();$bono->setUpBono($id_bono,$fecha);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono no sea pagado','Resultado es :'.$resultado);
		
		$id_bono=56;$bono=new $this->bono();$bono->setUpBono($id_bono,$fecha);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono no sea pagado','Resultado es :'.$resultado);
	
		$id_bono=57;$bono=new $this->bono();$bono->setUpBono($id_bono,$fecha);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono no sea pagado','Resultado es :'.$resultado);
	
		$id_bono=58;$bono=new $this->bono();$bono->setUpBono($id_bono,$fecha);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono no sea pagado','Resultado es :'.$resultado);
	
		$id_bono=59;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono no sea pagado','Resultado es :'.$resultado);
	
	}
	
	public function testValidarSiUsuarioYaCobroBonoUnicoFalso(){
		$calculadorBono=new $this->calculador_bono();
		
		$id_bono=54;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->buscarSiUsuarioYaReclamoBono($id_bono,10000);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
		
		$id_bono=54;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->buscarSiUsuarioYaReclamoBono($id_bono,10001);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
		
		$id_bono=54;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->buscarSiUsuarioYaReclamoBono($id_bono,10003);
		echo $this->unit->run(false,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
		
	}

	public function testValidarSiElBonoYaCobroVerdadero(){
		
		$calculadorBono=new $this->calculador_bono();
		$fecha=date('Y-m-d');
		$id_bono=50;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
		
		$id_bono=53;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
		
		$id_bono=56;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);

		$id_bono=57;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
		
		$id_bono=58;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
		
		$id_bono=59;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->isPagado($bono,$fecha);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
		
	}
	
	public function testValidarSiUsuarioYaCobroBonoUnicoVerdadero(){
		$calculadorBono=new $this->calculador_bono();
	
		$id_bono=54;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->buscarSiUsuarioYaReclamoBono($id_bono,10000);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
	
		$id_bono=54;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->buscarSiUsuarioYaReclamoBono($id_bono,10001);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
	
		$id_bono=54;$bono=new $this->bono();$bono->setUpBono($id_bono);
		$resultado=$calculadorBono->buscarSiUsuarioYaReclamoBono($id_bono,10007);
		echo $this->unit->run(true,$resultado, 'Test validar si el bono ya se pago','Resultado es :'.$resultado);
	
	}
	
	private function ingresarBonos(){
		$this->modelo_bono->limpiarTodosLosBonos();
		
//----------------------------BONO 1 ------------------------------------------------
		$comprasPersonales=3;
		$infinito=0;
		$servicios=2;
		$id_mercancia=500;
		
		$datosRango = array(
				'id_rango' => 60,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $comprasPersonales,
				'valor'   => 250,
				'condicion_red'    => "RED",
				'nivel_red'   => $infinito,
				'id_condicion' => 1,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $servicios,
				'condicion2'	=> $id_mercancia,
				'calificado'	=> "DAR",
				'estatus_rango'	=> 'ACT'
		);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => 50,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
				'plan'	=> "NO",
				'inicio' => '2015-01-01',
				'fin'   => '2026-01-01',
				'frecuencia'    => "SEM",
				'mes_desde_afiliacion'	=> $inicioAfiliacion,
				'mes_desde_activacion'	=> $fechaActual,
				'estatus_bono' => "ACT"
		);
		
		
		$datosValoresBono=array();
		
		$datosValoresBonoAfiliado = array(
				'id_valor' => 1,
				'id_rango'   => 50,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 25
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$nuevoBono->ingresarBono ();
		
		
		
		//----------------------------BONO 2 ------------------------------------------------
		$puntosComisionables=4;
		$infinito=0;
		$servicios=2;
		$id_mercancia=145;
		
		$datosRango = array(
				'id_rango' => 61,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $puntosComisionables,
				'valor'   => 110,
				'condicion_red'    => "RED",
				'nivel_red'   => $infinito,
				'id_condicion' => 2,
				'id_red'   => 26,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $servicios,
				'condicion2'	=> $id_mercancia,
				'estatus_rango'	=> 'ACT'
		);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => 51,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
				'plan'	=> "NO",
				'inicio' => '2015-01-01',
				'fin'   => '2026-01-01',
				'frecuencia'    => "MES",
				'mes_desde_afiliacion'	=> $inicioAfiliacion,
				'mes_desde_activacion'	=> $fechaActual,
				'estatus_bono' => "DES"
		);
		
		
		$datosValoresBono=array();
		
		$datosValoresBonoAfiliado = array(
				'id_valor' => 2,
				'id_rango'   => 51,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 0
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$nuevoBono->ingresarBono ();

		
		//----------------------------BONO 3 ------------------------------------------------
		$puntosComisionables=4;
		$infinito=0;
		$servicios=2;
		$id_mercancia=250;
		
		$datosRango = array(
				'id_rango' => 62,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $puntosComisionables,
				'valor'   => 25,
				'condicion_red'    => "RED",
				'nivel_red'   => $infinito,
				'id_condicion' => 3,
				'id_red'   => 26,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $servicios,
				'condicion2'	=> $id_mercancia,
				'estatus_rango'	=> 'ACT'
		);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => 52,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
				'plan'	=> "NO",
				'inicio' => '2015-01-01',
				'fin'   => '2016-03-25',
				'frecuencia'    => "MES",
				'mes_desde_afiliacion'	=> $inicioAfiliacion,
				'mes_desde_activacion'	=> $fechaActual,
				'estatus_bono' => "ACT"
		);
		
		
		$datosValoresBono=array();
		
		$datosValoresBonoAfiliado = array(
				'id_valor' => 3,
				'id_rango'   => 52,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 0
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$nuevoBono->ingresarBono ();
		
		//----------------------------BONO 4 ------------------------------------------------
		$puntosComisionables=4;
		$infinito=0;
		$servicios=2;
		$id_mercancia=500;
		
		$datosRango = array(
				'id_rango' => 63,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $puntosComisionables,
				'valor'   => 25,
				'condicion_red'    => "RED",
				'nivel_red'   => $infinito,
				'id_condicion' => 4,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $servicios,
				'condicion2'	=> $id_mercancia,
				'calificado'	=> 'DAR',
				'estatus_rango'	=> 'ACT'

		);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => 53,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
				'plan'	=> "NO",
				'inicio' => '2016-03-01',
				'fin'   => '2026-03-25',
				'frecuencia'    => "QUI",
				'mes_desde_afiliacion'	=> $inicioAfiliacion,
				'mes_desde_activacion'	=> $fechaActual,
				'estatus_bono' => "ACT"
		);
		
		
		$datosValoresBono=array();
		
		$datosValoresBonoAfiliado = array(
				'id_valor' => 4,
				'id_rango'   => 53,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 0
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$nuevoBono->ingresarBono ();
		
		//----------------------------BONO 5 ------------------------------------------------
		$afiliaciones=1;
		$infinito=0;
		$infinito=0;
		$id_mercancia=500;
		
		$datosRango = array(
				'id_rango' => 64,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $afiliaciones,
				'valor'   => 2,
				'condicion_red'    => "DIRECTOS",
				'nivel_red'   => $infinito,
				'id_condicion' => 5,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $infinito,
				'condicion2'	=> $infinito,
				'estatus_rango'	=> 'ACT'
		);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => 54,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
				'plan'	=> "NO",
				'inicio' => '2016-03-01',
				'fin'   => '2026-03-25',
				'frecuencia'    => "UNI",
				'mes_desde_afiliacion'	=> $inicioAfiliacion,
				'mes_desde_activacion'	=> $fechaActual,
				'estatus_bono' => "ACT"
		);
		
		
		$datosValoresBono=array();
		
		$datosValoresBonoAfiliado = array(
				'id_valor' => 5,
				'id_rango'   => 54,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 0
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$nuevoBono->ingresarBono ();
		
		//----------------------------BONO 6 ------------------------------------------------
		$ventasRed=2;
		$infinito=0;
		$servicios=2;
		$id_mercancia=500;
		
		$datosRango = array(
				'id_rango' => 65,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $ventasRed,
				'valor'   => 1000,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 6,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $servicios,
				'condicion2'	=> $id_mercancia,
				'estatus_rango'	=> 'ACT'
		);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => 55,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
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
				'id_valor' => 6,
				'id_rango'   => 55,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 0
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$nuevoBono->ingresarBono ();
		
		//----------------------------BONO 7 ------------------------------------------------
		$puntosRed=5;
		$infinito=0;
		$servicios=2;
		$id_mercancia=500;
		
		$datosRango = array(
				'id_rango' => 66,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $puntosRed,
				'valor'   => 100,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 7,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $servicios,
				'condicion2'	=> $id_mercancia,
				'calificado'=>'DOS',
				'estatus_rango'	=> 'ACT'
		);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => 56,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
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
				'id_rango'   => 56,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "DESC",
				'valor'	=> 0
		);
		
		$datosValoresBonoHijo = array(
				'id_valor' => 8,
				'id_rango'   => 56,
				'nivel'    => 1,
				'condicion_red'    => "RED",
				'verticalidad'    => "DESC",
				'valor'	=> 30
		);
		
		$datosValoresBonoNieto = array(
				'id_valor' => 9,
				'id_rango'   => 56,
				'nivel'    => 2,
				'condicion_red'    => "RED",
				'verticalidad'    => "DESC",
				'valor'	=> 20
		);
		
		$datosValoresBonoBisNieto = array(
				'id_valor' => 10,
				'id_rango'   => 56,
				'nivel'    => 3,
				'condicion_red'    => "RED",
				'verticalidad'    => "DESC",
				'valor'	=> 10
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado,$datosValoresBonoHijo,$datosValoresBonoNieto,$datosValoresBonoBisNieto);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$nuevoBono->ingresarBono ();
		
		
		//----------------------------BONO 8 ------------------------------------------------
		$puntosRed=5;
		$infinito=0;
		$servicios=2;
		$id_mercancia=500;
		
		$datosRango = array(
				'id_rango' => 67,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $puntosRed,
				'valor'   => 100,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 8,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $servicios,
				'condicion2'	=> $id_mercancia,
				'estatus_rango'	=> 'ACT'
		);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => 57,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
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
				'id_valor' => 11,
				'id_rango'   => 57,
				'nivel'    => 0,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "DESC",
				'valor'	=> 5
		);
		
		$datosValoresBonoHijo = array(
				'id_valor' => 12,
				'id_rango'   => 57,
				'nivel'    => 1,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "DESC",
				'valor'	=> 30
		);
		
		$datosValoresBonoNieto = array(
				'id_valor' => 13,
				'id_rango'   => 57,
				'nivel'    => 2,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "DESC",
				'valor'	=> 20
		);
		
		$datosValoresBonoBisNieto = array(
				'id_valor' => 14,
				'id_rango'   => 57,
				'nivel'    => 3,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "DESC",
				'valor'	=> 10
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado,$datosValoresBonoHijo,$datosValoresBonoNieto,$datosValoresBonoBisNieto);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$nuevoBono->ingresarBono ();
		
		//----------------------------BONO 9 ------------------------------------------------
		$puntosRed=5;
		$infinito=0;
		$servicios=2;
		$id_mercancia=500;
		
		$datosRango = array(
				'id_rango' => 68,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $puntosRed,
				'valor'   => 100,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 9,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $servicios,
				'condicion2'	=> $id_mercancia,
				'estatus_rango'	=> 'ACT'
		);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => 58,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
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
				'id_valor' => 15,
				'id_rango'   => 58,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 0
		);
		
		$datosValoresBonoHijo = array(
				'id_valor' => 16,
				'id_rango'   => 58,
				'nivel'    => 1,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 30
		);
		
		$datosValoresBonoNieto = array(
				'id_valor' => 17,
				'id_rango'   => 58,
				'nivel'    => 2,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 20
		);
		
		$datosValoresBonoBisNieto = array(
				'id_valor' => 18,
				'id_rango'   => 58,
				'nivel'    => 3,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 10
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado,$datosValoresBonoHijo,$datosValoresBonoNieto,$datosValoresBonoBisNieto);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$nuevoBono->ingresarBono ();
		
		//----------------------------BONO 10 ------------------------------------------------
		$puntosRed=5;
		$infinito=0;
		$servicios=2;
		$id_mercancia=500;
		
		$datosRango = array(
				'id_rango' => 69,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $puntosRed,
				'valor'   => 100,
				'condicion_red'    => "RED",
				'nivel_red'   => 0,
				'id_condicion' => 10,
				'id_red'   => 300,
				'condicion_red_afilacion'    => "EQU",
				'condicion1'    => $servicios,
				'condicion2'	=> $id_mercancia,
				'estatus_rango'	=> 'ACT'
		);
		
		$inicioAfiliacion=0;
		$fechaActual=0;
		
		$datosBono = array(
				'id_bono' => 59,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
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
				'id_valor' => 19,
				'id_rango'   => 59,
				'nivel'    => 0,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "ASC",
				'valor'	=> 0
		);
		
		$datosValoresBonoHijo = array(
				'id_valor' => 20,
				'id_rango'   => 59,
				'nivel'    => 1,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "ASC",
				'valor'	=> 30
		);
		
		$datosValoresBonoNieto = array(
				'id_valor' => 21,
				'id_rango'   => 59,
				'nivel'    => 2,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "ASC",
				'valor'	=> 20
		);
		
		$datosValoresBonoBisNieto = array(
				'id_valor' => 22,
				'id_rango'   => 59,
				'nivel'    => 3,
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "ASC",
				'valor'	=> 10
		);
		
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado,$datosValoresBonoHijo,$datosValoresBonoNieto,$datosValoresBonoBisNieto);
		$nuevoBono=new $this->modelo_bono();
		$nuevoBono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$nuevoBono->ingresarBono ();
		
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
	
	private function ingresarMercancia($id,$tipo,$costo,$puntos){
		
		$datosMercancia = array(
				'id_mercancia' => $id,
				'id_tipo_mercancia'   => $tipo,
				'costo'    => $costo,
				'puntos_comisionables' => $puntos,
				'id_categoria' => 250,
				'id_red' => 300
		);
		
		$this->mercancia->nuevaMercancia ($datosMercancia);
		$this->mercancia->ingresarMercancia ();
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

		$datosCategoria = array(
				'id_categoria' => 250,
				'id_red'   => 300,
		);
		
		$this->mercancia->ingresarCategoria ($datosCategoria);
		
		$this->ingresarMercancia(500,2,250,25);
		$this->ingresarMercancia(501,2,450,45);
		$this->ingresarMercancia(502,2,1000,10);
		

/*							RED DE AFILIACION
*           	                      __________
*           	               	     | GIOVANNY |
*           					     | ID:10000 |
*        	   	                     |  Spr:_2  |
*        							 |Comp:$1700|
*                  	       __________/           \____________
*           	          |  CARLOS  |        	  |   PEDRO  |
*           	          | ID:10001 |   		  | ID:10002 |
*        	   	          | Spr:10000|			  |Spr:10000 |
*        				  |Comp:$250 |            |Comp:$450 |
*              __________/       _____\____    ___/_______    \_________
*             |   CAMILO |      | NICOLAS  |  | ESPERANZA|   |   MARIA  |
*             | ID:10003 |   	| ID:10004 |  | ID:10005 |   | ID:10006 |
*        	  |_Spr:10001|      |_Spr:10001|  |_Spr:10000|   |_Spr:10000|
*        	  |Comp:$250 |      |Comp:$250 |  |Comp:$250 |   |Comp:$250 |
*		    ___/_____   __\_______                      _____/____     __\_______
*         | PEPE     | | DARIO    |                    |  DIEGO   |   |  ANDRES  |
*         | ID:10007 | | ID:10008 |                    | ID:10009 |   | ID:10010 |
*         |_Spr:10003| |_Spr:10001|                    |_Spr:10000|   |_Spr:10000|
*         |_Comp:$250| |Comp:$1000|                    |Comp:$450 |   |Comp:$250 |
*  _______/__   _____\____                                       _____/____    __\_______
* | RICARDO  | | MIGUEL   |                                     |  PAOLA   |   | FERNANDO |
* | ID:10011 | | ID:10012 |                                     | ID:10013 |   | ID:10014 |
* |_Spr:10007| |_Spr:10007|                                     |_Spr:10010|   |_Spr:10010|
* |_Comp:$250| |_Comp:$250|                                     |_Comp:$250|   |_Comp:$250|
*        _______/__   _____\____                                            ____/____     _\_________
*       | LAURA    | | DAVID    |                                          |  MARIO   |   | ANDREA   |
*       | ID:10015 | | ID:10016 |                                          | ID:10017 |   | ID:10018 |
*       |_Spr:10012| |_Spr:10012|                                          |_Spr:10014|   |_Spr:10014|
*       |Comp:$1000| |Comp:$1700|                                          |Comp:$500 |   |Comp:$250 |
*              _______/___  _____\____                                 ____/____      _\________
*             | JOAN     | |ALEJANDRO |                               | MARCEL   |   | DANIEL   |
*             | ID:10019 | | ID:10020 |                               | ID:10021 |   | ID:10022 |
*             |_Spr:10016| |_Spr:10001|                               |_Spr:10017|   |_Spr:10017|
*             |Comp:$250 | |Comp:$250 |\                              |Comp:$250 |   |Comp:$250 |
* __________/  _____\____   _/________  \__________                          ___________/ ___\______
*| JULIAN   | | GERMAN   | |  LUIS    | |ALBERTO   |                        | CAROLINA | | HAROLL   |
*| ID:10023 | | ID:10024 | | ID:10025 | | ID:10026 |                        | ID:10027 | | ID:10028 |
*|_Spr:10019| |_Spr:10019| |_Spr:10016| |_Spr:10020|                        |_Spr:10022| |_Spr:10022|
*|Comp:$450 | |Comp:$250 | |Comp:$250 | |Comp:$450 |                        |Comp:$450 | |Comp:$450 |
*_____|_____     ____|_____               ____|_____             __________/   ____\______
*|  RUBEN   |   |   MARCELA|             |  NELLY   |    	     |  JOSE    | | JOHANA   |
*| ID:10029 |   | ID:10030 |       	     | ID:10031 |            | ID:10032 | | ID:10033 |
*|Spr:10001 |   |Spr:10001 |             |Spr:10026 |            |_Spr:10027| |_Spr:10027|
*|Comp:$250 |   |Comp:$250 |             |Comp:$250 |            |Comp:$250 | |Comp:$250 |
*/

		$fecha=date('Y-m-d');
		
		$this->ingresarVentaMercanciaUsuario(700,10000,$fecha,array(500,501,502));
		$this->ingresarVentaMercanciaUsuario(701,10001,$fecha,array(500));
		$this->ingresarVentaMercanciaUsuario(702,10002,$fecha,array(501));
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
		$this->ingresarVentaMercanciaUsuario(716,10016,$fecha,array(500,501,502));
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
}
