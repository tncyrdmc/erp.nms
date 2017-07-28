<?php
class testActivacionBono extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('/bo/bonos/modelo_bono');
		$this->load->model('/bo/bonos/bono');
		$this->load->model('/bo/bonos/calculador_bono');

	}
	
	public function index(){
		$this->Before();
		$this->testBonoDesactivado();
		$this->testBonoActivado();
		$this->testBonoVigente();
		$this->testBonoNoVigente();
		$this->testBonoDisponibleCobrar();
		$this->testBonoNoDisponibleCobrar();
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
				'condicion_red_afilacion'=>"EQU",
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

	private function after(){
		$this->modelo_bono->limpiarBono ();
	}

	public function testBonoActivado(){
		$bono=$this->bono;
		$bono->setUpBono(50);
		$bono->getActivacionBono()->setEstado('ACT');
	
		$resultado=$this->calculador_bono->isActivo($bono);
		echo $this->unit->run(true,$resultado, 'Test validar estado Activado','Resultado es :'.$resultado);
			
	}
	
	public function testBonoDesactivado(){
		$bono=$this->bono;
		$bono->setUpBono(50);
		$bono->getActivacionBono()->setEstado('DES');
	
		$resultado=$this->calculador_bono->isActivo($bono);
		echo $this->unit->run(false,$resultado, 'Test validar estado Desactivado','Resultado es :'.$resultado);
			
	}
	
	public function testBonoVigente(){
		$bono=$this->bono;
		$bono->setUpBono(50);
		
		$bono->getActivacionBono()->setInicio('2010-01-01');
		$bono->getActivacionBono()->setFin('2100-01-01');
	
		$resultado=$this->calculador_bono->isVigente($bono);
		echo $this->unit->run(true,$resultado, 'Test validar estado Vigente','Resultado es :'.$resultado);
			
		$bono->getActivacionBono()->setInicio(date('Y-m-d'));
		$bono->getActivacionBono()->setFin(date('Y-m-d'));
		
		$resultado=$this->calculador_bono->isVigente($bono);
		echo $this->unit->run(true,$resultado, 'Test validar estado Vigente fecha de Inicio y fin igual ','Resultado es :'.$resultado);
			
		$bono->getActivacionBono()->setInicio(date('Y-m-d', strtotime(date('Y-m-d'). ' - 1 days')));
		$bono->getActivacionBono()->setFin(date('Y-m-d'));
		
		$resultado=$this->calculador_bono->isVigente($bono);
		echo $this->unit->run(true,$resultado, 'Test validar estado Vigente fecha de Inicio 1 dia antes Fin mismo dia','Resultado es :'.$resultado);
			
		$bono->getActivacionBono()->setInicio(date('Y-m-d'));
		$bono->getActivacionBono()->setFin(date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days')));
		
		$resultado=$this->calculador_bono->isVigente($bono);
		echo $this->unit->run(true,$resultado, 'Test validar estado Vigente fecha de Inicio mismo dia fin 1 dias mas','Resultado es :'.$resultado);
			
	}
	
	public function testBonoNoVigente(){
		$bono=$this->bono;
		$bono->setUpBono(50);
		$bono->getActivacionBono()->setInicio('2099-01-01');
		$bono->getActivacionBono()->setFin('2100-01-01');
	
		$resultado=$this->calculador_bono->isVigente($bono);
		echo $this->unit->run(false,$resultado, 'Test validar estado Vigente','Resultado es :'.$resultado);
			
		$bono->getActivacionBono()->setInicio(date('Y-m-d', strtotime(date('Y-m-d'). ' - 1 days')));
		$bono->getActivacionBono()->setFin(date('Y-m-d', strtotime(date('Y-m-d'). ' - 1 days')));
		
		$resultado=$this->calculador_bono->isVigente($bono);
		echo $this->unit->run(false,$resultado, 'Test validar estado No Vigente fecha de Inicio y fin igual ','Resultado es :'.$resultado);
			
		$bono->getActivacionBono()->setInicio(date('Y-m-d', strtotime(date('Y-m-d'). ' - 10 days')));
		$bono->getActivacionBono()->setFin(date('Y-m-d', strtotime(date('Y-m-d'). ' - 1 days')));
		
		$resultado=$this->calculador_bono->isVigente($bono);
		echo $this->unit->run(false,$resultado, 'Test validar estado No Vigente por 1 dia de fin','Resultado es :'.$resultado);

		$bono->getActivacionBono()->setInicio(date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days')));
		$bono->getActivacionBono()->setFin(date('Y-m-d', strtotime(date('Y-m-d'). ' + 10 days')));
		
		$resultado=$this->calculador_bono->isVigente($bono);
		echo $this->unit->run(false,$resultado, 'Test validar estado No Vigente falta 1 dia de inicio','Resultado es :'.$resultado);
		
	/*	
		$resultado=$this->calculador_bono->isVigente($bono);
		echo $this->unit->run(true,$resultado, 'Test validar estado Vigente fecha de Inicio 1 dia antes Fin mismo dia','Resultado es :'.$resultado);
			
		$bono->getActivacionBono()->setInicio(date('Y-m-d'));
		$bono->getActivacionBono()->setFin(date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days')));
		
		$resultado=$this->calculador_bono->isVigente($bono);
		echo $this->unit->run(true,$resultado, 'Test validar estado Vigente fecha de Inicio mismo dia fin 1 dias mas','Resultado es :'.$resultado);
		*/
	}

	public function testBonoDisponibleCobrar(){
		$bono=new $this->bono ();
		$bono->setUpBono(50);

		$resultado=$this->calculador_bono->isDisponibleCobrar($bono);
		echo $this->unit->run(true,$resultado, 'Test validar si esta disponble para cobrar','Resultado es :'.$resultado);
		
	}
	
	public function testBonoNoDisponibleCobrar(){
		$bono=new $this->bono ();
		$bono->setUpBono(50);
	
		$resultado=$this->calculador_bono->isDisponibleCobrar($bono);;
		echo $this->unit->run(true,$resultado, 'Test validar si no esta disponble para cobrar','Resultado es :'.$resultado);
	
		$bono->getActivacionBono()->setInicio('2099-01-01');
		$bono->getActivacionBono()->setFin('2100-01-01');
		
		$resultado=$this->calculador_bono->isDisponibleCobrar($bono);
		echo $this->unit->run(false,$resultado, 'Test validar no esta disponble para cobrar estado fecha todavia no es la fecha','Resultado es :'.$resultado);
			
		$bono=new $this->bono ();
		$bono->setUpBono(50);
		$bono->getActivacionBono()->setEstado('DES');
		
		$resultado=$this->calculador_bono->isDisponibleCobrar($bono);
		echo $this->unit->run(false,$resultado, 'Test validar no esta disponble para cobrar estado Desactivado','Resultado es :'.$resultado);
			
	}
}
