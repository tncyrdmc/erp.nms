<?php
class testSetupRepartidorComisionBono extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('/bo/bonos/repartidor_comision_bono');


	}
	
	public function index(){
		$this->Before();
		$this->testSetHistorialComisionesBonoUsuario();
		$this->after();
		
		$this->Before();
		$this->testSetRepartirComisionesBonoUsuario();
		$this->after();
	}
	
	private function Before(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
	}
	
	private function after(){
		$this->repartidor_comision_bono->eliminarHistorialComisionBono();
	}
	
	public function testSetHistorialComisionesBonoUsuario(){
		$repartidorComisionBono=$this->repartidor_comision_bono;
		
		$id=900;
		$id_bono=15;
		$dia=1;
		$mes=3;
		$ano=2016;
		$fecha="2013-03-01";
		
		$repartidorComisionBono->ingresarHistorialComisionBono($id,$id_bono,$dia,$mes,$ano,$fecha);
		
		$repartidorComisionBono->setUpHistorial(900);
		
		$resultado=$repartidorComisionBono->getId();
		echo $this->unit->run(900,$resultado, 'Test Get Repartidor de Bono ID','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getIdBono();
		echo $this->unit->run(15,$resultado, 'Test Get Repartidor de Bono ID Bono','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getDia();
		echo $this->unit->run(1,$resultado, 'Test Get Repartidor de Bono Dia','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getMes();
		echo $this->unit->run(3,$resultado, 'Test Get Repartidor de Bono Mes','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getAno();
		echo $this->unit->run(2016,$resultado, 'Test Get Repartidor de Bono Ano','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getFecha();
		echo $this->unit->run("2013-03-01",$resultado, 'Test Get Repartidor de Bono Fecha','Resultado es :'.$resultado);
		
	}
	
	public function testSetRepartirComisionesBonoUsuario(){
	
		$repartidorComisionBono=$this->repartidor_comision_bono;
		
		$id=900;
		$id_bono=15;
		$dia=1;
		$mes=3;
		$ano=2016;
		$fecha="2013-03-01";
		
		$repartidorComisionBono->ingresarHistorialComisionBono($id,$id_bono,$dia,$mes,$ano,$fecha);
		$repartidorComisionBono->setUpHistorial(900);
		
		$id_transaccion=200;
		$id_usuario=10000;
		$id_bono=$repartidorComisionBono->getIdBono();
		$id_bono_historial=$repartidorComisionBono->getId();
		$valor=36.5;
		
		$repartidorComisionBono->repartirComisionBono($id_transaccion,$id_usuario,$id_bono,$id_bono_historial,$valor);
		$repartidorComisionBono->setUpReparticionComision(200);

		$resultado=$repartidorComisionBono->getIdTransaccion();
		echo $this->unit->run(200,$resultado, 'Test Get Repartidor de Bono ID Transaccion','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10000,$resultado, 'Test Get Repartidor de Bono ID Usuario','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(36.5,$resultado, 'Test Get Repartidor de Bono Valor','Resultado es :'.$resultado);

		
		$id_transaccion=201;
		$id_usuario=10001;
		$id_bono=$repartidorComisionBono->getIdBono();
		$id_bono_historial=$repartidorComisionBono->getId();
		$valor=40.96;
		
		$repartidorComisionBono->repartirComisionBono($id_transaccion,$id_usuario,$id_bono,$id_bono_historial,$valor);
		$repartidorComisionBono->setUpReparticionComision(201);
		
		$resultado=$repartidorComisionBono->getIdTransaccion();
		echo $this->unit->run(201,$resultado, 'Test Get Repartidor de Bono ID Transaccion','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10001,$resultado, 'Test Get Repartidor de Bono ID Usuario','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(40.96,$resultado, 'Test Get Repartidor de Bono Valor','Resultado es :'.$resultado);
		
		$id_transaccion=202;
		$id_usuario=10002;
		$id_bono=$repartidorComisionBono->getIdBono();
		$id_bono_historial=$repartidorComisionBono->getId();
		$valor=0.10;
		
		$repartidorComisionBono->repartirComisionBono($id_transaccion,$id_usuario,$id_bono,$id_bono_historial,$valor);
		$repartidorComisionBono->setUpReparticionComision(202);
		
		$resultado=$repartidorComisionBono->getIdTransaccion();
		echo $this->unit->run(202,$resultado, 'Test Get Repartidor de Bono ID Transaccion','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getIdUsuario();
		echo $this->unit->run(10002,$resultado, 'Test Get Repartidor de Bono ID Usuario','Resultado es :'.$resultado);
		
		$resultado=$repartidorComisionBono->getValor();
		echo $this->unit->run(0.10,$resultado, 'Test Get Repartidor de Bono Valor','Resultado es :'.$resultado);
		
		
	}
}
