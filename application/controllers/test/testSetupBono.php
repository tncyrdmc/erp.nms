<?php
class testSetupBono extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('/bo/bonos/calculador_bono');
		$this->load->model('/bo/bonos/condiciones_bono');
		$this->load->model('/bo/bonos/valores_bono');
		$this->load->model('/bo/bonos/activacion_bono');
		$this->load->model('/bo/bonos/bono');
		$this->load->model('/bo/bonos/red');
		$this->load->model('/bo/bonos/modelo_bono');

	}
	
	public function index(){
		$this->modelo_bono->limpiarTodosLosBonos();
		
		$this->ingresarBono ();
		$this->ingresarRedDeAfiliacion();
		
		$this->testGetTipoDeBono();
		$this->testBuscarUsuariosRed();
		$this->testGetDiasInicioYFinSemana();
		$this->testGetDiasInicioYFinQuincena();
		$this->testGetDiasInicioYFinMes();
		$this->testGetDiasInicioYFinAno();
		
		$this->testgetFechaInicioPagoDeBono();
		$this->testgetFechaFinPagoDeBono();
		
		$this->afiliado->eliminarUsuarios();
		$this->red->eliminarRed();
		$this->modelo_bono->limpiarBono ();
	}
	
	public function testGetTipoDeBono(){
		$calculadorBono=$this->calculador_bono;
	
		$bono=new $this->bono ();
		$bono->setUpBono(50);
	
		$resultado=$calculadorBono->isBonoBinario($bono->getTipoBono());
		echo $this->unit->run(false,$resultado, 'Test set Base de datos Tipo de Bono','Resultado es :'.$resultado);
	
		$calculadorBono=$this->calculador_bono;
	
		$bono=new $this->bono ();
		$bono->setUpBono(50);
		$bono->setTipoBono('SI');
	
		$resultado=$calculadorBono->isBonoBinario($bono->getTipoBono());
		echo $this->unit->run(true,$resultado, 'Test set Base de datos Tipo de Bono','Resultado es :'.$resultado);
	
	}
	
	public function testBuscarUsuariosRed(){
		$calculadorBono=$this->calculador_bono;
	
		$resultado=$calculadorBono->getUsuariosRed(300)[0]->id_afiliado;
		echo $this->unit->run(10000,$resultado, 'Test get todos los afiliados de la red','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getUsuariosRed(300)[1]->id_afiliado;
		echo $this->unit->run(10001,$resultado, 'Test get todos los afiliados de la red','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getUsuariosRed(300)[2]->id_afiliado;
		echo $this->unit->run(10002,$resultado, 'Test get todos los afiliados de la red','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getUsuariosRed(300)[3]->id_afiliado;
		echo $this->unit->run(10003,$resultado, 'Test get todos los afiliados de la red','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getUsuariosRed(300)[4]->id_afiliado;
		echo $this->unit->run(10004,$resultado, 'Test get todos los afiliados de la red','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getUsuariosRed(300)[5]->id_afiliado;
		echo $this->unit->run(10005,$resultado, 'Test get todos los afiliados de la red','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getUsuariosRed(300)[6]->id_afiliado;
		echo $this->unit->run(10006,$resultado, 'Test get todos los afiliados de la red','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getUsuariosRed(300)[7]->id_afiliado;
		echo $this->unit->run(10007,$resultado, 'Test get todos los afiliados de la red','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getUsuariosRed(300)[8]->id_afiliado;
		echo $this->unit->run(10008,$resultado, 'Test get todos los afiliados de la red','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getUsuariosRed(300)[9]->id_afiliado;
		echo $this->unit->run(10009,$resultado, 'Test get todos los afiliados de la red','Resultado es :'.$resultado);
	
	
	}

	public function testGetDiasInicioYFinSemana(){
		$calculadorBono=$this->calculador_bono;
	
		//INicio de Semana
		$resultado=$calculadorBono->getInicioSemana('2016-03-28');
		echo $this->unit->run('2016-03-28',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getInicioSemana('2016-03-29');
		echo $this->unit->run('2016-03-28',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getInicioSemana('2016-03-30');
		echo $this->unit->run('2016-03-28',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getInicioSemana('2016-03-31');
		echo $this->unit->run('2016-03-28',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getInicioSemana('2016-04-01');
		echo $this->unit->run('2016-03-28',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getInicioSemana('2016-04-02');
		echo $this->unit->run('2016-03-28',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getInicioSemana('2016-04-03');
		echo $this->unit->run('2016-03-28',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getInicioSemana('2016-04-04');
		echo $this->unit->run('2016-04-04',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
		
		//Fin de Semana
		$resultado=$calculadorBono->getFinSemana('2016-03-28');
		echo $this->unit->run('2016-04-03',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getFinSemana('2016-03-29');
		echo $this->unit->run('2016-04-03',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getFinSemana('2016-03-30');
		echo $this->unit->run('2016-04-03',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getFinSemana('2016-03-31');
		echo $this->unit->run('2016-04-03',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getFinSemana('2016-04-01');
		echo $this->unit->run('2016-04-03',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getFinSemana('2016-04-02');
		echo $this->unit->run('2016-04-03',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getFinSemana('2016-04-03');
		echo $this->unit->run('2016-04-03',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
		$resultado=$calculadorBono->getFinSemana('2016-04-04');
		echo $this->unit->run('2016-04-10',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
		
		
		// Los Dos
		
		$resultado=$calculadorBono->getInicioSemana('2016-03-13');
		echo $this->unit->run('2016-03-07',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinSemana('2016-03-13');
		echo $this->unit->run('2016-03-13',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioSemana('2016-03-01');
		echo $this->unit->run('2016-02-29',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinSemana('2016-03-01');
		echo $this->unit->run('2016-03-06',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioSemana('2016-06-27');
		echo $this->unit->run('2016-06-27',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinSemana('2016-07-03');
		echo $this->unit->run('2016-07-03',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
	
	
		$resultado=$calculadorBono->getInicioSemana('2016-03-10');
		echo $this->unit->run('2016-03-07',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinSemana('2016-03-10');
		echo $this->unit->run('2016-03-13',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
		
		$resultado=$calculadorBono->getInicioSemana('2016-04-04');
		echo $this->unit->run('2016-04-04',$resultado, 'Test Inicio de Semana','Resultado es :'.$resultado);
	
	}
	
	public function testGetDiasInicioYFinQuincena(){
		$calculadorBono=$this->calculador_bono;
	
		$resultado=$calculadorBono->getInicioQuincena('2016-03-13');
		echo $this->unit->run('2016-03-01',$resultado, 'Test Inicio de Quincena','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinQuincena('2016-03-13');
		echo $this->unit->run('2016-03-15',$resultado, 'Test Fin de Quincena','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioQuincena('2016-03-16');
		echo $this->unit->run('2016-03-16',$resultado, 'Test Inicio de Quincena','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinQuincena('2016-03-16');
		echo $this->unit->run('2016-03-31',$resultado, 'Test Fin de Quincena','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioQuincena('2016-03-21');
		echo $this->unit->run('2016-03-16',$resultado, 'Test Inicio de Quincena','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinQuincena('2016-03-21');
		echo $this->unit->run('2016-03-31',$resultado, 'Test Fin de Quincena','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioQuincena('2016-03-01');
		echo $this->unit->run('2016-03-01',$resultado, 'Test Inicio de Quincena','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinQuincena('2016-03-01');
		echo $this->unit->run('2016-03-15',$resultado, 'Test Fin de Quincena','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioQuincena('2016-02-16');
		echo $this->unit->run('2016-02-16',$resultado, 'Test Inicio de Quincena','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinQuincena('2016-02-16');
		echo $this->unit->run('2016-02-29',$resultado, 'Test Fin de Quincena','Resultado es :'.$resultado);
	
	}
	
	public function testGetDiasInicioYFinMes(){
		$calculadorBono=$this->calculador_bono;
	
		$resultado=$calculadorBono->getInicioMes('2016-03-13');
		echo $this->unit->run('2016-03-01',$resultado, 'Test Inicio de Mes','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinMes('2016-03-13');
		echo $this->unit->run('2016-03-31',$resultado, 'Test Fin de mes','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioMes('2016-02-01');
		echo $this->unit->run('2016-02-01',$resultado, 'Test Inicio de Mes','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinMes('2016-02-01');
		echo $this->unit->run('2016-02-29',$resultado, 'Test Fin de Mes','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioMes('2016-02-01');
		echo $this->unit->run('2016-02-01',$resultado, 'Test Inicio de Mes','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinMes('2016-02-01');
		echo $this->unit->run('2016-02-29',$resultado, 'Test Fin de Mes','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioMes('2016-08-31');
		echo $this->unit->run('2016-08-01',$resultado, 'Test Inicio de Mes','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinMes('2016-08-31');
		echo $this->unit->run('2016-08-31',$resultado, 'Test Fin de Mes','Resultado es :'.$resultado);
	
	}
	
	public function testGetDiasInicioYFinAno(){
		$calculadorBono=$this->calculador_bono;
	
		$resultado=$calculadorBono->getInicioAno('2016-03-13');
		echo $this->unit->run('2016-01-01',$resultado, 'Test Inicio de Ano','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinAno('2016-03-13');
		echo $this->unit->run('2016-12-31',$resultado, 'Test Fin de Ano','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioAno('2016-02-01');
		echo $this->unit->run('2016-01-01',$resultado, 'Test Inicio de Ano','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinAno('2016-02-01');
		echo $this->unit->run('2016-12-31',$resultado, 'Test Fin de Ano','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioAno('2015-02-01');
		echo $this->unit->run('2015-01-01',$resultado, 'Test Inicio de Ano','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinAno('2015-02-01');
		echo $this->unit->run('2015-12-31',$resultado, 'Test Fin de Ano','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getInicioAno('2018-08-31');
		echo $this->unit->run('2018-01-01',$resultado, 'Test Inicio de Ano','Resultado es :'.$resultado);
	
		$resultado=$calculadorBono->getFinAno('2018-08-31');
		echo $this->unit->run('2018-12-31',$resultado, 'Test Fin de Ano','Resultado es :'.$resultado);
	
	}
	
	public function testgetFechaInicioPagoDeBono(){
		$calculadorBono=$this->calculador_bono;
		$fechaActual='2016-03-29';$frecuencia="MES";
		$resultado=$calculadorBono->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-03-01',$resultado, 'Test Inicio de Mes','Resultado es :'.$resultado);
		
		$fechaActual='2016-03-29';$frecuencia="QUI";
		$resultado=$calculadorBono->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-03-16',$resultado, 'Test inicio de Quincena','Resultado es :'.$resultado);
		
		$fechaActual='2016-03-29';$frecuencia="SEM";
		$resultado=$calculadorBono->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-03-28',$resultado, 'Test inicio de Semana','Resultado es :'.$resultado);

		
		$fechaActual='2016-04-2';$frecuencia="MES";
		$resultado=$calculadorBono->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-04-01',$resultado, 'Test Inicio de Mes','Resultado es :'.$resultado);
		
		$fechaActual='2016-04-2';$frecuencia="QUI";
		$resultado=$calculadorBono->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-04-01',$resultado, 'Test inicio de Quincena','Resultado es :'.$resultado);
		
		$fechaActual='2016-04-2';$frecuencia="SEM";
		$resultado=$calculadorBono->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-03-28',$resultado, 'Test inicio de Semana','Resultado es :'.$resultado);
		
	}

	public function testgetFechaFinPagoDeBono(){
		$calculadorBono=$this->calculador_bono;
		$fechaActual='2016-03-29';$frecuencia="MES";
		$resultado=$calculadorBono->getFechaFinPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-03-31',$resultado, 'Test Fin de Mes','Resultado es :'.$resultado);
	
		$fechaActual='2016-03-29';$frecuencia="QUI";
		$resultado=$calculadorBono->getFechaFinPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-03-31',$resultado, 'Test Fin de Quincena','Resultado es :'.$resultado);
	
		$fechaActual='2016-03-29';$frecuencia="SEM";
		$resultado=$calculadorBono->getFechaFinPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-04-03',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
	
	
		$fechaActual='2016-04-2';$frecuencia="MES";
		$resultado=$calculadorBono->getFechaFinPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-04-30',$resultado, 'Test Fin de Mes','Resultado es :'.$resultado);
	
		$fechaActual='2016-04-2';$frecuencia="QUI";
		$resultado=$calculadorBono->getFechaFinPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-04-15',$resultado, 'Test Fin de Quincena','Resultado es :'.$resultado);
	
		$fechaActual='2016-04-2';$frecuencia="SEM";
		$resultado=$calculadorBono->getFechaFinPagoDeBono($frecuencia,$fechaActual);
		echo $this->unit->run('2016-04-03',$resultado, 'Test Fin de Semana','Resultado es :'.$resultado);
	
	}
	
	private function ingresarBono() {
		$puntosComisionables=4;
		$infinito=0;
		$servicios=2;
		$id_mercancia=145;
	
		$datosRango = array(
				'id_rango' => 60,
				'nombre_rango'   => "Bluetooth",
				'descripcion_rango'    => "Bluetooth",
				'id_tipo_rango' => $puntosComisionables,
				'valor'   => 110,
				'condicion_red'    => "RED",
				'condicion_red_afilacion'    => "EQU",
				'nivel_red'   => $infinito,
				'id_condicion' => 1,
				'id_red'   => 26,
				'condicion1'    => $servicios,
				'condicion2'	=> $id_mercancia,
				'estatus_rango'	=> "ACT"
		);

		$inicioAfiliacion=0;
		$fechaActual=0;
	
		$datosBono = array(
				'id_bono' => 50,
				'nombre_bono'   => "Bono Bluetooth",
				'descripcion_bono'    => "Bono Bluetooth",
				'plan'	=> "NO",
				'inicio' => '2016-03-01',
				'fin'   => '2026-03-01',
				'frecuencia'    => "MES",
				'mes_desde_afiliacion'	=> $inicioAfiliacion,
				'mes_desde_activacion'	=> $fechaActual,
				'estatus_bono' => 'ACT'
		);
	
	
		$datosValoresBono=array();
	
		$datosValoresBonoAfiliado = array(
				'id_valor' => 4,
				'id_rango'   => 50,
				'nivel'    => 0,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 0
		);
	
		$datosValoresBonoPadreAfiliado = array(
				'id_valor' => 3,
				'id_rango'   => 50,
				'nivel'    => 1,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 1.6
		);
	
		$datosValoresBonoAbueloAfiliado = array(
				'id_valor' => 2,
				'id_rango'   => 50,
				'nivel'    => 2,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 0.8
		);
	
		$datosValoresBonoBisAbueloAfiliado = array(
				'id_valor' => 1,
				'id_rango'   => 50,
				'nivel'    => 3,
				'condicion_red'    => "RED",
				'verticalidad'    => "ASC",
				'valor'	=> 0.8
		);
	
		array_push($datosValoresBono, $datosValoresBonoAfiliado , $datosValoresBonoPadreAfiliado ,$datosValoresBonoAbueloAfiliado ,$datosValoresBonoBisAbueloAfiliado);
	
		$this->modelo_bono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$this->modelo_bono->limpiarBono ();
		$this->modelo_bono->ingresarBono ();
	}
	
	private function ingresarRedDeAfiliacion() {
		$this->afiliado->eliminarUsuarios();
		$this->red->eliminarRed();
	
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
	
		/*							RED DE AFILIACION PRUEBA
		 *           	                 __________
		 *           	               	|  10000   |
		 *        	   	               /| giovanny | \
		 *           	              / |_____2____|  \
		 *           	        _____/__             __\___
		 *           	       | 10001  |   	    | 10002 |
		 *       	           | carlos |   	    | pedro |\
		 *       	           |_10000__|   	    |_10000_| \
		 *  	          ______ /  	   _\_____    __/_____     \_______
		 *  	         |10003 |   	  | 10004 | |   10005 |   	|10006 |
		 * 	         |camilo|   	  |nicolas| |esperanza|   	|pedro |
		 * 	         |10001_|   	  |_10001_| |__10002__|   	|_10002|
		 *       ____/___    __\____         ____/__
		 *  	   |10007 	|  | 10008 |       |10009  |
		 * 	   |fernando|  |andres |       |ricardo|
		 * 	   |10003___|  |_10003_|       |_10002_|
		*/
	
	
		$this->modelo_bono->crearNuevoUsuario (10000,"giovanny","2016-03-17",20000,300,2,2,0);
		$this->modelo_bono->crearNuevoUsuario (10001,"carlos","2016-03-17",20001,300,10000,10000,0);
		$this->modelo_bono->crearNuevoUsuario (10002,"pedro","2016-03-17",20002,300,10000,10000,1);
		$this->modelo_bono->crearNuevoUsuario (10003,"camilo","2016-03-17",20003,300,10001,10001,0);
		$this->modelo_bono->crearNuevoUsuario (10004,"nicolas","2016-03-17",20004,300,10001,10001,1);
		$this->modelo_bono->crearNuevoUsuario (10005,"esperanza","2016-03-17",20005,300,10002,10000,0);
		$this->modelo_bono->crearNuevoUsuario (10006,"maria","2016-03-17",20006,300,30002,10002,1);
		$this->modelo_bono->crearNuevoUsuario (10007,"fernando","2016-03-17",20007,300,10003,10003,0);
		$this->modelo_bono->crearNuevoUsuario (10008,"andres","2016-03-17",20008,300,10003,10003,1);
		$this->modelo_bono->crearNuevoUsuario (10009,"ricardo","2016-03-17",20009,300,10005,10002,0);
	
	}
}
