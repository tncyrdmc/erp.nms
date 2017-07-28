<?php
class testSetupBonoBaseDeDatos extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('/bo/bonos/modelo_bono');
		$this->load->model('/bo/bonos/bono');

	}
	
	public function index(){
		$this->Before();
		$this->after();
	}
	
	private function Before(){

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
				'nivel_red'   => $infinito,
				'id_condicion' => 1,
				'id_red'   => 26,
				'condicion_red_afilacion'    => "EQU",
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
				'condicion_red'    => "DIRECTOS",
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
				'condicion_red'    => "DIRECTOS",
				'verticalidad'    => "ASC",
				'valor'	=> 0.8
		);
		
		array_push($datosValoresBono, $datosValoresBonoAfiliado , $datosValoresBonoPadreAfiliado ,$datosValoresBonoAbueloAfiliado ,$datosValoresBonoBisAbueloAfiliado);
		
		$this->modelo_bono->nuevoBono ($datosRango,$datosBono,$datosValoresBono);
		$this->modelo_bono->limpiarBono ();
		$this->modelo_bono->ingresarBono ();
		$this->testSetValoresBonoBaseDeDatos();
		$this->testSetValoresCondicionesBonoBaseDeDatos();
		$this->testSetValoresValorBonoBaseDeDatos();
		$this->testSetValoresActivacionBonoBaseDeDatos();
		$this->testSetBono();
	}

	private function after(){
		$this->modelo_bono->limpiarBono ();
	}


	public function testSetValoresBonoBaseDeDatos(){
		$bono=$this->bono;
	
		$this->bono->setDatosBono(50);
		
		$resultado=$bono->getId();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getNombre();
		echo $this->unit->run("Bono Bluetooth",$resultado, 'Test set Base de datos Nombre Bono','Resultado es :'.$resultado);

		$resultado=$bono->getDescripcion();
		echo $this->unit->run("Bono Bluetooth",$resultado, 'Test set Base de datos Descripcion Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getTipoBono();
		echo $this->unit->run("NO",$resultado, 'Test set Base de datos Plan Bono','Resultado es :'.$resultado);
		
	}
	
	public function testSetValoresCondicionesBonoBaseDeDatos(){
		$bono=$this->bono;
	
		$this->bono->setDatosCondicionesBono(50);
	
		$resultado=$bono->getCondicionesBono()->getIdCondicion();
		echo $this->unit->run(1,$resultado, 'Test set Base de datos Condiciones ID Condicion','Resultado es :'.$resultado);

		$resultado=$bono->getCondicionesBono()->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Condiciones ID Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getIdRango();
		echo $this->unit->run(60,$resultado, 'Test set Base de datos Condiciones ID Rango','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getIdTipoRango();
		echo $this->unit->run(4,$resultado, 'Test set Base de datos Condiciones ID Tipo Rango','Resultado es :'.$resultado);
	
		$resultado=$bono->getCondicionesBono()->getIdRed();
		echo $this->unit->run(26,$resultado, 'Test set Base de datos Condiciones ID Red','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getCondicionRed();
		echo $this->unit->run("RED",$resultado, 'Test set Base de datos Condiciones Condicion Red','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getNivelRed();
		echo $this->unit->run(0,$resultado, 'Test set Base de datos Condiciones Nivel Red','Resultado es :'.$resultado);
	
		$resultado=$bono->getCondicionesBono()->getValor();
		echo $this->unit->run(110,$resultado, 'Test set Base de datos Condiciones Valor','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getCondicionBono1();
		echo $this->unit->run(2,$resultado, 'Test set Base de datos Condicion1','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getCondicionBono2();
		echo $this->unit->run(145,$resultado, 'Test set Base de datos Condicion2','Resultado es :'.$resultado);
		
	}
	
	public function testSetValoresValorBonoBaseDeDatos(){
		$bono=$this->bono;
		
		$this->bono->setDatosValorBono(50);

		// Nivel 3
		$resultado=$bono->getValoresBono()[3]->getId();
		echo $this->unit->run(4,$resultado, 'Test set Base de datos Id Valor','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[3]->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[3]->getCondicionRed();
		echo $this->unit->run("RED",$resultado, 'Test set Base de datos Condicion Red','Resultado es :'.$resultado);

		$resultado=$bono->getValoresBono()[3]->getNivel();
		echo $this->unit->run(0,$resultado, 'Test set Base de datos Nivel','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[3]->getValor();
		echo $this->unit->run(0,$resultado, 'Test set Base de datos Valor','Resultado es :'.$resultado);

		$resultado=$bono->getValoresBono()[3]->getVerticalidad();
		echo $this->unit->run("ASC",$resultado, 'Test set Base de datos Verticalidad','Resultado es :'.$resultado);
		
		// Nivel 2
		$resultado=$bono->getValoresBono()[2]->getId();
		echo $this->unit->run(3,$resultado, 'Test set Base de datos Id Valor','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[2]->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
	
		$resultado=$bono->getValoresBono()[2]->getCondicionRed();
		echo $this->unit->run("DIRECTOS",$resultado, 'Test set Base de datos Condicion Red','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[2]->getNivel();
		echo $this->unit->run(1,$resultado, 'Test set Base de datos Nivel','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[2]->getValor();
		echo $this->unit->run(1.6,$resultado, 'Test set Base de datos Valor','Resultado es :'.$resultado);
	
		$resultado=$bono->getValoresBono()[2]->getVerticalidad();
		echo $this->unit->run("ASC",$resultado, 'Test set Base de datos Verticalidad','Resultado es :'.$resultado);
		
		
		// Nivel 1
		$resultado=$bono->getValoresBono()[1]->getId();
		echo $this->unit->run(2,$resultado, 'Test set Base de datos Id Valor','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[1]->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[1]->getCondicionRed();
		echo $this->unit->run("RED",$resultado, 'Test set Base de datos Condicion Red','Resultado es :'.$resultado);
				
		$resultado=$bono->getValoresBono()[1]->getNivel();
		echo $this->unit->run(2,$resultado, 'Test set Base de datos Nivel','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[1]->getValor();
		echo $this->unit->run(0.8,$resultado, 'Test set Base de datos Valor','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[1]->getVerticalidad();
		echo $this->unit->run("ASC",$resultado, 'Test set Base de datos Verticalidad','Resultado es :'.$resultado);
		
		// Nivel 0
		$resultado=$bono->getValoresBono()[0]->getId();
		echo $this->unit->run(1,$resultado, 'Test set Base de datos Id Valor','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[0]->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[0]->getCondicionRed();
		echo $this->unit->run("DIRECTOS",$resultado, 'Test set Base de datos Condicion Red','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[0]->getNivel();
		echo $this->unit->run(3,$resultado, 'Test set Base de datos Nivel','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[0]->getValor();
		echo $this->unit->run(0.8,$resultado, 'Test set Base de datos Valor','Resultado es :'.$resultado);
	
		$resultado=$bono->getValoresBono()[0]->getVerticalidad();
		echo $this->unit->run("ASC",$resultado, 'Test set Base de datos Verticalidad','Resultado es :'.$resultado);
		
	}
	
	public function testSetValoresActivacionBonoBaseDeDatos(){
		$bono=$this->bono;
		
		$this->bono->setDatosActivacionBono(50);
		
		$resultado=$bono->getActivacionBono()->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getInicio();
		echo $this->unit->run("2016-03-01",$resultado, 'Test set Base de datos Inicio','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getFin();
		echo $this->unit->run("2026-03-01",$resultado, 'Test set Base de datos Fin','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getMesDesdeAfiliacionAfiliado();
		echo $this->unit->run(0,$resultado, 'Test set Base de datos Mes desde afiliacion','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getMesDesdeActivacionAfiliado();
		echo $this->unit->run(0,$resultado, 'Test set Base de datos Mes desde Activacion','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getFrecuencia();
		echo $this->unit->run('MES',$resultado, 'Test set Base de datos Frecuencia','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getEstado();
		echo $this->unit->run('ACT',$resultado, 'Test set Base de datos Frecuencia','Resultado es :'.$resultado);
		
		
	}
	
	public function testSetBono(){
		
		$bono=new $this->bono ();
		$bono->setUpBono(50);
		
		$resultado=$bono->getId();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getNombre();
		echo $this->unit->run("Bono Bluetooth",$resultado, 'Test set Base de datos Nombre Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getDescripcion();
		echo $this->unit->run("Bono Bluetooth",$resultado, 'Test set Base de datos Descripcion Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getTipoBono();
		echo $this->unit->run("NO",$resultado, 'Test set Base de datos Plan Bono','Resultado es :'.$resultado);
		
		
		$resultado=$bono->getCondicionesBono()->getIdCondicion();
		echo $this->unit->run(1,$resultado, 'Test set Base de datos Condiciones ID Condicion','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Condiciones ID Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getIdRango();
		echo $this->unit->run(60,$resultado, 'Test set Base de datos Condiciones ID Rango','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getIdTipoRango();
		echo $this->unit->run(4,$resultado, 'Test set Base de datos Condiciones ID Tipo Rango','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getIdRed();
		echo $this->unit->run(26,$resultado, 'Test set Base de datos Condiciones ID Red','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getCondicionRed();
		echo $this->unit->run("RED",$resultado, 'Test set Base de datos Condiciones Condicion Red','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getNivelRed();
		echo $this->unit->run(0,$resultado, 'Test set Base de datos Condiciones Nivel Red','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getValor();
		echo $this->unit->run(110,$resultado, 'Test set Base de datos Condiciones Valor','Resultado es :'.$resultado);
		

		$resultado=$bono->getCondicionesBono()->getCondicionAfiliadosRed();
		echo $this->unit->run('EQU',$resultado, 'Test set Base de datos Condicion Red Afiliacion','Resultado es :'.$resultado);
		
		
		$resultado=$bono->getCondicionesBono()->getCondicionBono1();
		echo $this->unit->run(2,$resultado, 'Test set Base de datos Condicion1','Resultado es :'.$resultado);
		
		$resultado=$bono->getCondicionesBono()->getCondicionBono2();
		echo $this->unit->run(145,$resultado, 'Test set Base de datos Condicion2','Resultado es :'.$resultado);
		
		
		
		// Nivel 3
		$resultado=$bono->getValoresBono()[3]->getId();
		echo $this->unit->run(4,$resultado, 'Test set Base de datos Id Valor','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[3]->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[3]->getCondicionRed();
		echo $this->unit->run("RED",$resultado, 'Test set Base de datos Condicion Red','Resultado es :'.$resultado);

		$resultado=$bono->getValoresBono()[3]->getNivel();
		echo $this->unit->run(0,$resultado, 'Test set Base de datos Nivel','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[3]->getValor();
		echo $this->unit->run(0,$resultado, 'Test set Base de datos Valor','Resultado es :'.$resultado);

		// Nivel 2
		$resultado=$bono->getValoresBono()[2]->getId();
		echo $this->unit->run(3,$resultado, 'Test set Base de datos Id Valor','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[2]->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
	
		$resultado=$bono->getValoresBono()[2]->getCondicionRed();
		echo $this->unit->run("DIRECTOS",$resultado, 'Test set Base de datos Condicion Red','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[2]->getNivel();
		echo $this->unit->run(1,$resultado, 'Test set Base de datos Nivel','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[2]->getValor();
		echo $this->unit->run(1.6,$resultado, 'Test set Base de datos Valor','Resultado es :'.$resultado);
	
		// Nivel 1
		$resultado=$bono->getValoresBono()[1]->getId();
		echo $this->unit->run(2,$resultado, 'Test set Base de datos Id Valor','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[1]->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[1]->getCondicionRed();
		echo $this->unit->run("RED",$resultado, 'Test set Base de datos Condicion Red','Resultado es :'.$resultado);
				
		$resultado=$bono->getValoresBono()[1]->getNivel();
		echo $this->unit->run(2,$resultado, 'Test set Base de datos Nivel','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[1]->getValor();
		echo $this->unit->run(0.8,$resultado, 'Test set Base de datos Valor','Resultado es :'.$resultado);
		
		// Nivel 0
		$resultado=$bono->getValoresBono()[0]->getId();
		echo $this->unit->run(1,$resultado, 'Test set Base de datos Id Valor','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[0]->getIdBono();
		echo $this->unit->run(50,$resultado, 'Test set Base de datos Id Bono','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[0]->getCondicionRed();
		echo $this->unit->run("DIRECTOS",$resultado, 'Test set Base de datos Condicion Red','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[0]->getNivel();
		echo $this->unit->run(3,$resultado, 'Test set Base de datos Nivel','Resultado es :'.$resultado);
		
		$resultado=$bono->getValoresBono()[0]->getValor();
		echo $this->unit->run(0.8,$resultado, 'Test set Base de datos Valor','Resultado es :'.$resultado);
	
		$resultado=$bono->getActivacionBono()->getInicio();
		echo $this->unit->run("2016-03-01",$resultado, 'Test set Base de datos Inicio','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getFin();
		echo $this->unit->run("2026-03-01",$resultado, 'Test set Base de datos Fin','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getMesDesdeAfiliacionAfiliado();
		echo $this->unit->run(0,$resultado, 'Test set Base de datos Mes desde afiliacion','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getMesDesdeActivacionAfiliado();
		echo $this->unit->run(0,$resultado, 'Test set Base de datos Mes desde Activacion','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getFrecuencia();
		echo $this->unit->run('MES',$resultado, 'Test set Base de datos Frecuencia','Resultado es :'.$resultado);
		
		$resultado=$bono->getActivacionBono()->getEstado();
		echo $this->unit->run('ACT',$resultado, 'Test set Base de datos Frecuencia','Resultado es :'.$resultado);
		
	}


}
