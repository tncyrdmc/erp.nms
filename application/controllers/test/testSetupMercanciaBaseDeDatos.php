<?php
class testSetupMercanciaBaseDeDatos extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('/bo/bonos/mercancia');

	}
	
	public function index(){
		$this->Before();
		$this->testSetValoresMercancia();
		$this->testSetValoresMercanciaBaseDeDatos();
		$this->testSetValoresProductoBaseDeDatos();
		$this->testSetValoresCombinadoBaseDeDatos();
		$this->testSetValoresPaqueteDeIncripcionBaseDeDatos();
		$this->testSetValoresMembresiaBaseDeDatos();
		$this->after();
	}
	
	private function Before(){
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
		
		$datosCategoria = array(
				'id_categoria' => 250,
				'id_red'   => 300,
		);
		
		$this->mercancia->ingresarCategoria ($datosCategoria);
		
		$servicios=2;
		
		$datosMercancia = array(
				'id_mercancia' => 500,
				'id_tipo_mercancia'   => $servicios,
				'costo'    => 150,
				'puntos_comisionables' => 100,
				'id_categoria' => 250,
				'id_red' => 300
		);
		
		$this->mercancia->nuevaMercancia ($datosMercancia);
		$this->mercancia->ingresarMercancia ();

	}

	private function after(){
		$this->mercancia->eliminarMercancias();
	}


	public function testSetValoresMercancia(){
		$mercancia=$this->mercancia;
		
		$resultado=$mercancia->getIdMercancia();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos Id Mercancia','Resultado es :'.$resultado);

		$resultado=$mercancia->getIdTipoMercancia();
		echo $this->unit->run(2,$resultado, 'Test set Base de datos Id Tipo Mercancia','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getCosto();
		echo $this->unit->run(150,$resultado, 'Test set Base de datos Costo','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
		
	}
	
	public function testSetValoresMercanciaBaseDeDatos(){

		$mercancia=new $this->mercancia ();
		$mercancia->setUpMercancia(500);
		
		$resultado=$mercancia->getIdMercancia();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos Id Mercancia','Resultado es :'.$resultado);

		$resultado=$mercancia->getSku();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos sku','Resultado es :'.$resultado);
		
		
		$resultado=$mercancia->getIdTipoMercancia();
		echo $this->unit->run(2,$resultado, 'Test set Base de datos Id Tipo Mercancia','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getCosto();
		echo $this->unit->run(150,$resultado, 'Test set Base de datos Costo','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getIdRed();
		echo $this->unit->run(300,$resultado, 'Test set Base de datos Puntos id red','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getIdCategoria();
		echo $this->unit->run(250,$resultado, 'Test set Base de datos Puntos id categoria','Resultado es :'.$resultado);
		
		
	}

	public function testSetValoresProductoBaseDeDatos(){
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
		
		$datosCategoria = array(
				'id_categoria' => 250,
				'id_red'   => 300,
		);
		
		$this->mercancia->ingresarCategoria ($datosCategoria);
		
		$producto=1;
		
		$datosMercancia = array(
				'id_mercancia' => 500,
				'id_tipo_mercancia'   => $producto,
				'costo'    => 150,
				'puntos_comisionables' => 100,
				'id_categoria' => 250,
				'id_red' => 300
		);
		
		$this->mercancia->nuevaMercancia ($datosMercancia);
		$this->mercancia->ingresarMercancia ();
		
		$mercancia=new $this->mercancia ();
		$mercancia->setUpMercancia(500);
		
		$resultado=$mercancia->getIdMercancia();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos Id Mercancia','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getSku();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos sku','Resultado es :'.$resultado);
		
		
		$resultado=$mercancia->getIdTipoMercancia();
		echo $this->unit->run(1,$resultado, 'Test set Base de datos Id Tipo Mercancia','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getCosto();
		echo $this->unit->run(150,$resultado, 'Test set Base de datos Costo','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getIdRed();
		echo $this->unit->run(300,$resultado, 'Test set Base de datos Puntos id red','Resultado es :'.$resultado);
		
		$resultado=$mercancia->getIdCategoria();
		echo $this->unit->run(250,$resultado, 'Test set Base de datos Puntos id categoria','Resultado es :'.$resultado);
		
	}
	
	public function testSetValoresCombinadoBaseDeDatos(){
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
	
		$datosCategoria = array(
				'id_categoria' => 250,
				'id_red'   => 300,
		);
	
		$this->mercancia->ingresarCategoria ($datosCategoria);
	
		$combinado=3;
	
		$datosMercancia = array(
				'id_mercancia' => 500,
				'id_tipo_mercancia'   => $combinado,
				'costo'    => 150,
				'puntos_comisionables' => 100,
				'id_categoria' => 250,
				'id_red' => 300
		);
	
		$this->mercancia->nuevaMercancia ($datosMercancia);
		$this->mercancia->ingresarMercancia ();
	
		$mercancia=new $this->mercancia ();
		$mercancia->setUpMercancia(500);
	
		$resultado=$mercancia->getIdMercancia();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos Id Mercancia','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getSku();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos sku','Resultado es :'.$resultado);
	
	
		$resultado=$mercancia->getIdTipoMercancia();
		echo $this->unit->run(3,$resultado, 'Test set Base de datos Id Tipo Mercancia','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getCosto();
		echo $this->unit->run(150,$resultado, 'Test set Base de datos Costo','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getIdRed();
		echo $this->unit->run(300,$resultado, 'Test set Base de datos Puntos id red','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getIdCategoria();
		echo $this->unit->run(250,$resultado, 'Test set Base de datos Puntos id categoria','Resultado es :'.$resultado);
	
	}

	public function testSetValoresPaqueteDeIncripcionBaseDeDatos(){
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
	
		$datosCategoria = array(
				'id_categoria' => 250,
				'id_red'   => 300,
		);
	
		$this->mercancia->ingresarCategoria ($datosCategoria);
	
		$paquete=4;
	
		$datosMercancia = array(
				'id_mercancia' => 500,
				'id_tipo_mercancia'   => $paquete,
				'costo'    => 150,
				'puntos_comisionables' => 100,
				'id_categoria' => 250,
				'id_red' => 300
		);
	
		$this->mercancia->nuevaMercancia ($datosMercancia);
		$this->mercancia->ingresarMercancia ();
	
		$mercancia=new $this->mercancia ();
		$mercancia->setUpMercancia(500);
	
		$resultado=$mercancia->getIdMercancia();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos Id Mercancia','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getSku();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos sku','Resultado es :'.$resultado);
	
	
		$resultado=$mercancia->getIdTipoMercancia();
		echo $this->unit->run(4,$resultado, 'Test set Base de datos Id Tipo Mercancia','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getCosto();
		echo $this->unit->run(150,$resultado, 'Test set Base de datos Costo','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getIdRed();
		echo $this->unit->run(300,$resultado, 'Test set Base de datos Puntos id red','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getIdCategoria();
		echo $this->unit->run(250,$resultado, 'Test set Base de datos Puntos id categoria','Resultado es :'.$resultado);
	
	}
	
	public function testSetValoresMembresiaBaseDeDatos(){
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
	
		$datosCategoria = array(
				'id_categoria' => 250,
				'id_red'   => 300,
		);
	
		$this->mercancia->ingresarCategoria ($datosCategoria);
	
		$membresia=5;
	
		$datosMercancia = array(
				'id_mercancia' => 500,
				'id_tipo_mercancia'   => $membresia,
				'costo'    => 150,
				'puntos_comisionables' => 100,
				'id_categoria' => 250,
				'id_red' => 300
		);
	
		$this->mercancia->nuevaMercancia ($datosMercancia);
		$this->mercancia->ingresarMercancia ();
	
		$mercancia=new $this->mercancia ();
		$mercancia->setUpMercancia(500);
	
		$resultado=$mercancia->getIdMercancia();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos Id Mercancia','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getSku();
		echo $this->unit->run(500,$resultado, 'Test set Base de datos sku','Resultado es :'.$resultado);
	
	
		$resultado=$mercancia->getIdTipoMercancia();
		echo $this->unit->run(5,$resultado, 'Test set Base de datos Id Tipo Mercancia','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getCosto();
		echo $this->unit->run(150,$resultado, 'Test set Base de datos Costo','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getPuntosComisionables();
		echo $this->unit->run(100,$resultado, 'Test set Base de datos Puntos Comisionables','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getIdRed();
		echo $this->unit->run(300,$resultado, 'Test set Base de datos Puntos id red','Resultado es :'.$resultado);
	
		$resultado=$mercancia->getIdCategoria();
		echo $this->unit->run(250,$resultado, 'Test set Base de datos Puntos id categoria','Resultado es :'.$resultado);
	
	}
}
