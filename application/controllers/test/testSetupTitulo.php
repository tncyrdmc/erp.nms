<?php
class testSetupTitulo extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('/bo/bonos/activacion_bono');
		$this->load->model('/bo/bonos/afiliado');
		$this->load->model('/bo/bonos/bono');
		$this->load->model('/bo/bonos/titulo');
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
		$this->titulo->eliminarTitulo();
		$this->ingresarRedDeAfiliacion(true);
		$this->ingresarVentasFecha(date('Y-m-d'),true,700);
		$frecuencia="SEM";$tipo="PUNTOSR";$condicion_red_afiliacion="EQU";$porcentaje=100;
		$this->ingresarTitulosPuntos($frecuencia,$tipo,$condicion_red_afiliacion,$porcentaje);
	}
	
	private function after(){
		$this->afiliado->eliminarUsuarios();
		$this->afiliado->eliminarRemanentes();
		$this->red->eliminarRed();
		$this->mercancia->eliminarMercancias();
		$this->mercancia->eliminarCategorias();
		$this->venta->eliminarVentas();
		$this->titulo->eliminarTitulo();

	}
	
	public function index(){

		$this->after();
		$this->testSetTitulo();
		$this->testIngresarTitulo();
		$this->before();
		$this->testGetValoresAfiliadoTieneParaTitulo();
		$this->testGetBuscarTituloAlcanzadoPorElAfiliadoPuntosRed();
		$this->testGetBuscarTituloAlcanzadoPorElAfiliadoPuntosPersonales();
		$this->testGetBuscarTituloAlcanzadoPorElAfiliadoComprasRed();
		$this->testGetBuscarTituloAlcanzadoPorElAfiliadoComprasPersonales();
		$this->testGetNombreTituloAlcanzadoAfiliado();
		$this->after();


	}

	public function testSetTitulo(){
		$titulo=new $this->titulo;

		$datosTitulo = array(
				'id' => 1,
				'orden'   =>1,
				'nombre'=>'Bronce',
				'descripcion'=>'Titulo Bronce',
				'frecuencia' => 'MES',
				'tipo'   => 'PUNTOSP',
				'condicion_red_afiliacion'=>'EQU',
				'porcentaje'=>50,
				'valor'=>1000,
				'ganancia'=>20
		
		);
		
		$titulo->nuevoTitulo($datosTitulo);
		
		$resultado=$titulo->getId();
		echo $this->unit->run(1,$resultado, 'Test retornar id Titulo','Resultado es :'.$resultado);

		$resultado=$titulo->getOrden();
		echo $this->unit->run(1,$resultado, 'Test retornar orden Titulo','Resultado es :'.$resultado);
		
		$resultado=$titulo->getNombre();
		echo $this->unit->run('Bronce',$resultado, 'Test retornar nombre Titulo','Resultado es :'.$resultado);
		
		$resultado=$titulo->getDescripcion();
		echo $this->unit->run('Titulo Bronce',$resultado, 'Test retornar Descripcion Titulo','Resultado es :'.$resultado);
		
		$resultado=$titulo->getFrecuencia();
		echo $this->unit->run('MES',$resultado, 'Test retornar Frecuencia Titulo','Resultado es :'.$resultado);
		
		$resultado=$titulo->getTipo();
		echo $this->unit->run('PUNTOSP',$resultado, 'Test retornar Tipo Titulo','Resultado es :'.$resultado);
		
		$resultado=$titulo->getCondicionRedAfiliacion();
		echo $this->unit->run('EQU',$resultado, 'Test retornar Condicon Red de Afiliacion Titulo','Resultado es :'.$resultado);
		
		$resultado=$titulo->getPorcentaje();
		echo $this->unit->run(50,$resultado, 'Test retornar Porcentaje Titulo','Resultado es :'.$resultado);
		
		$resultado=$titulo->getValor();
		echo $this->unit->run(1000,$resultado, 'Test retornar Valor Titulo','Resultado es :'.$resultado);
		
		$resultado=$titulo->getGanancia();
		echo $this->unit->run(20,$resultado, 'Test retornar Ganancias Titulo','Resultado es :'.$resultado);
	}

	public function testIngresarTitulo(){
		$titulo=new $this->titulo;
	
		$datosTitulo = array(
				'id' => 1,
				'orden'   =>1,
				'nombre'=>'Bronce',
				'descripcion'=>'Titulo Bronce',
				'frecuencia' => 'MES',
				'tipo'   => 'PUNTOSP',
				'condicion_red_afiliacion'=>'EQU',
				'porcentaje'=>50,
				'valor'=>1000,
				'ganancia'=>20
	
		);
	
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();
		
		$titulo=new $this->titulo;
		$titulo->setUpTitulo(1);
	
		$resultado=$titulo->getId();
		echo $this->unit->run(1,$resultado, 'Test retornar id Titulo','Resultado es :'.$resultado);
	
		$resultado=$titulo->getOrden();
		echo $this->unit->run(1,$resultado, 'Test retornar orden Titulo','Resultado es :'.$resultado);
	
		$resultado=$titulo->getNombre();
		echo $this->unit->run('Bronce',$resultado, 'Test retornar nombre Titulo','Resultado es :'.$resultado);
	
		$resultado=$titulo->getDescripcion();
		echo $this->unit->run('Titulo Bronce',$resultado, 'Test retornar Descripcion Titulo','Resultado es :'.$resultado);
	
		$resultado=$titulo->getFrecuencia();
		echo $this->unit->run('MES',$resultado, 'Test retornar Frecuencia Titulo','Resultado es :'.$resultado);
	
		$resultado=$titulo->getTipo();
		echo $this->unit->run('PUNTOSP',$resultado, 'Test retornar Tipo Titulo','Resultado es :'.$resultado);
	
		$resultado=$titulo->getCondicionRedAfiliacion();
		echo $this->unit->run('EQU',$resultado, 'Test retornar Condicon Red de Afiliacion Titulo','Resultado es :'.$resultado);
	
		$resultado=$titulo->getPorcentaje();
		echo $this->unit->run(50,$resultado, 'Test retornar Porcentaje Titulo','Resultado es :'.$resultado);
	
		$resultado=$titulo->getValor();
		echo $this->unit->run(1000,$resultado, 'Test retornar Valor Titulo','Resultado es :'.$resultado);
	
		$resultado=$titulo->getGanancia();
		echo $this->unit->run(20,$resultado, 'Test retornar Ganancias Titulo','Resultado es :'.$resultado);
	}
	
	public function testGetValoresAfiliadoTieneParaTitulo(){
		$titulo=new $this->titulo;
		
		//Puntos Personales
		$id_usuario=10000;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getPuntosPersonalesFrecuencia($id_usuario,$frecuencia,$fechaActual);
		$esperado=200;
		echo $this->unit->run($esperado,$resultado, 'Test get Puntos Personales semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10017;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getPuntosPersonalesFrecuencia($id_usuario,$frecuencia,$fechaActual);
		$esperado=35;
		echo $this->unit->run($esperado,$resultado, 'Test get Puntos Personales semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10019;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getPuntosPersonalesFrecuencia($id_usuario,$frecuencia,$fechaActual);
		$esperado=0;
		echo $this->unit->run($esperado,$resultado, 'Test get Puntos Personales semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		
		//Compras Personales
		$id_usuario=10000;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getComprasPersonalesFrecuencia($id_usuario,$frecuencia,$fechaActual);
		$esperado=278000;
		echo $this->unit->run($esperado,$resultado, 'Test get Puntos Personales semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10017;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getComprasPersonalesFrecuencia($id_usuario,$frecuencia,$fechaActual);
		$esperado=110000;
		echo $this->unit->run($esperado,$resultado, 'Test get Puntos Personales semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10019;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getComprasPersonalesFrecuencia($id_usuario,$frecuencia,$fechaActual);
		$esperado=0;
		echo $this->unit->run($esperado,$resultado, 'Test get Puntos Personales semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		
		//Puntos Red
		$id_usuario=10000;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getPuntosRedFrecuencia($id_usuario,$frecuencia,"EQU",$fechaActual);
		$esperado=2928;
		echo $this->unit->run($esperado,$resultado, 'Test get Puntos Red semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);

		$id_usuario=10017;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getPuntosRedFrecuencia($id_usuario,$frecuencia,"EQU",$fechaActual);
		$esperado=635;
		echo $this->unit->run($esperado,$resultado, 'Test get Puntos Red semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10000;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getPuntosRedFrecuencia($id_usuario,$frecuencia,"DEB",$fechaActual);
		$esperado=34;
		echo $this->unit->run($esperado,$resultado, 'Test get Puntos Red semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
	
		//Compras Red
		$id_usuario=10000;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getComprasRedFrecuencia($id_usuario,$frecuencia,"EQU",$fechaActual);
		$esperado=5191000;
		echo $this->unit->run($esperado,$resultado, 'Test get Compras Red semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10017;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getComprasRedFrecuencia($id_usuario,$frecuencia,"EQU",$fechaActual);
		$esperado=944000;
		echo $this->unit->run($esperado,$resultado, 'Test get Compras Red semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10000;$frecuencia="SEM";$fechaActual=date('Y-m-d');
		$resultado=$titulo->getComprasRedFrecuencia($id_usuario,$frecuencia,"DEB",$fechaActual);
		$esperado=45000;
		echo $this->unit->run($esperado,$resultado, 'Test get Compras Red semanalmente '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		
	}
	
	public function testGetBuscarTituloAlcanzadoPorElAfiliadoPuntosRed(){
		$this->titulo->eliminarTitulo();
		$frecuencia="SEM";$tipo="PUNTOSR";$condicion_red_afiliacion="EQU";$porcentaje=100;
		$this->ingresarTitulosPuntos($frecuencia,$tipo,$condicion_red_afiliacion,$porcentaje);
		$fechaActual=date('Y-m-d');
		
		$ninguno=0;
		$bronce=1;
		$plata=2;
		$oro=3;
		$platino=4;
		$diamante=5;
		
		$titulo=new $this->titulo;

		$id_usuario=10000;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$diamante;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10001;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$diamante;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10002;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10003;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$bronce;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10004;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10005;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10006;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$diamante;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10007;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$diamante;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10008;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10022;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$platino;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10032;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$platino;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		
		$this->titulo->eliminarTitulo();
	}
	
	public function testGetBuscarTituloAlcanzadoPorElAfiliadoPuntosPersonales(){
		$this->titulo->eliminarTitulo();
		$frecuencia="SEM";$tipo="PUNTOSP";$condicion_red_afiliacion="EQU";$porcentaje=100;
		$this->ingresarTitulosPuntos($frecuencia,$tipo,$condicion_red_afiliacion,$porcentaje);
		$fechaActual=date('Y-m-d');
		
		$ninguno=0;
		$bronce=1;
		$plata=2;
		$oro=3;
		$platino=4;
		$diamante=5;
		
		$titulo=new $this->titulo;
		
		$id_usuario=10000;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$oro;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10001;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$bronce;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10002;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$bronce;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10003;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10004;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$oro;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10005;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10006;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$bronce;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10007;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$bronce;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10008;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$bronce;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10022;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$oro;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10032;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$plata;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		
		$this->titulo->eliminarTitulo();
	}
	
	public function testGetBuscarTituloAlcanzadoPorElAfiliadoComprasRed(){
		$this->titulo->eliminarTitulo();
		$frecuencia="SEM";$tipo="COMPRASR";$condicion_red_afiliacion="EQU";$porcentaje=100;
		$this->ingresarTitulosCompras($frecuencia,$tipo,$condicion_red_afiliacion,$porcentaje);
		$fechaActual=date('Y-m-d');
	
		$ninguno=0;
		$bronce=1;
		$plata=2;
		$oro=3;
		$platino=4;
		$diamante=5;
	
		$titulo=new $this->titulo;
	
		$id_usuario=10000;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$diamante;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10001;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$platino;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10002;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10003;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$plata;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10004;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10005;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10006;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$platino;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10007;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$platino;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10008;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10022;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$oro;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10032;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$oro;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
	
		$this->titulo->eliminarTitulo();
	}
	
	public function testGetBuscarTituloAlcanzadoPorElAfiliadoComprasPersonales(){
		$this->titulo->eliminarTitulo();
		$frecuencia="SEM";$tipo="COMPRASP";$condicion_red_afiliacion="EQU";$porcentaje=100;
		$this->ingresarTitulosCompras($frecuencia,$tipo,$condicion_red_afiliacion,$porcentaje);
		$fechaActual=date('Y-m-d');
		
		$ninguno=0;
		$bronce=1;
		$plata=2;
		$oro=3;
		$platino=4;
		$diamante=5;
		
		$titulo=new $this->titulo;
		
		$id_usuario=10000;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$oro;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10001;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$plata;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10002;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$plata;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10003;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$bronce;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10004;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$oro;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10005;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$bronce;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10006;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$plata;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10007;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$plata;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
	
		$id_usuario=10008;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$plata;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10019;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		
		$id_usuario=10022;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$oro;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10032;
		$resultado=$titulo->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);
		$esperado=$bronce;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		
		$this->titulo->eliminarTitulo();
	}
	
	public function testGetNombreTituloAlcanzadoAfiliado(){
		$this->titulo->eliminarTitulo();
		$frecuencia="SEM";$tipo="PUNTOSR";$condicion_red_afiliacion="EQU";$porcentaje=100;
		$this->ingresarTitulosPuntos($frecuencia,$tipo,$condicion_red_afiliacion,$porcentaje);
		$fechaActual=date('Y-m-d');
		
		$ninguno=null;
		$bronce='Bronce';
		$plata='Plata';
		$oro='Oro';
		$platino='Platino';
		$diamante='Diamante';
		
		$titulo=new $this->titulo;
		
		$id_usuario=10000;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$diamante;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10001;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$diamante;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10002;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10003;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$bronce;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10004;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10005;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10006;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$diamante;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10007;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$diamante;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10008;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$ninguno;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10022;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$platino;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		$id_usuario=10032;
		$resultado=$titulo->getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual);
		$esperado=$platino;
		echo $this->unit->run($esperado,$resultado, 'Test get titulo alcanzado por el afiliado '.$id_usuario,'Deberia ser : '.$esperado.'<br>Resultado es :'.$resultado);
		
		
		$this->titulo->eliminarTitulo();
	}
	
	private function ingresarTitulosPuntos($frecuencia,$tipo,$condicion_red_afiliacion,$porcentaje){
		$titulo=new $this->titulo;
		$datosTitulo = array(
				'id' => 1,
				'orden'   =>1,
				'nombre'=>'Bronce',
				'descripcion'=>'Titulo Bronce',
				'frecuencia' => $frecuencia,
				'tipo'   => $tipo,
				'condicion_red_afiliacion'=>$condicion_red_afiliacion,
				'porcentaje'=>$porcentaje,
				'valor'=>35,
				'ganancia'=>5
		
		);
		
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();
		
		$titulo=new $this->titulo;
		$datosTitulo = array(
				'id' => 2,
				'orden'   =>2,
				'nombre'=>'Plata',
				'descripcion'=>'Titulo Plata',
				'frecuencia' => $frecuencia,
				'tipo'   => $tipo,
				'condicion_red_afiliacion'=>$condicion_red_afiliacion,
				'porcentaje'=>$porcentaje,
				'valor'=>80,
				'ganancia'=>10
		
		);
		
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();
		
		$titulo=new $this->titulo;
		$datosTitulo = array(
				'id' => 3,
				'orden'   =>3,
				'nombre'=>'Oro',
				'descripcion'=>'Titulo Oro',
				'frecuencia' => $frecuencia,
				'tipo'   => $tipo,
				'condicion_red_afiliacion'=>$condicion_red_afiliacion,
				'porcentaje'=>$porcentaje,
				'valor'=>200,
				'ganancia'=>20
		
		);
		
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();
		
		$titulo=new $this->titulo;
		$datosTitulo = array(
				'id' => 4,
				'orden'   =>4,
				'nombre'=>'Platino',
				'descripcion'=>'Titulo Platino',
				'frecuencia' => $frecuencia,
				'tipo'   => $tipo,
				'condicion_red_afiliacion'=>$condicion_red_afiliacion,
				'porcentaje'=>$porcentaje,
				'valor'=>235,
				'ganancia'=>30
		
		);
		
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();
		
		$titulo=new $this->titulo;
		$datosTitulo = array(
				'id' => 5,
				'orden'   =>5,
				'nombre'=>'Diamante',
				'descripcion'=>'Titulo Diamante',
				'frecuencia' => $frecuencia,
				'tipo'   => $tipo,
				'condicion_red_afiliacion'=>$condicion_red_afiliacion,
				'porcentaje'=>$porcentaje,
				'valor'=>300,
				'ganancia'=>40
		
		);
		
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();

	}
	
	private function ingresarTitulosCompras($frecuencia,$tipo,$condicion_red_afiliacion,$porcentaje){
		$titulo=new $this->titulo;
		$datosTitulo = array(
				'id' => 1,
				'orden'   =>1,
				'nombre'=>'Bronce',
				'descripcion'=>'Titulo Bronce',
				'frecuencia' => $frecuencia,
				'tipo'   => $tipo,
				'condicion_red_afiliacion'=>$condicion_red_afiliacion,
				'porcentaje'=>$porcentaje,
				'valor'=>45000,
				'ganancia'=>5
	
		);
	
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();
	
		$titulo=new $this->titulo;
		$datosTitulo = array(
				'id' => 2,
				'orden'   =>2,
				'nombre'=>'Plata',
				'descripcion'=>'Titulo Plata',
				'frecuencia' => $frecuencia,
				'tipo'   => $tipo,
				'condicion_red_afiliacion'=>$condicion_red_afiliacion,
				'porcentaje'=>$porcentaje,
				'valor'=>110000,
				'ganancia'=>10
	
		);
	
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();
	
		$titulo=new $this->titulo;
		$datosTitulo = array(
				'id' => 3,
				'orden'   =>3,
				'nombre'=>'Oro',
				'descripcion'=>'Titulo Oro',
				'frecuencia' => $frecuencia,
				'tipo'   => $tipo,
				'condicion_red_afiliacion'=>$condicion_red_afiliacion,
				'porcentaje'=>$porcentaje,
				'valor'=>278000,
				'ganancia'=>20
	
		);
	
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();
	
		$titulo=new $this->titulo;
		$datosTitulo = array(
				'id' => 4,
				'orden'   =>4,
				'nombre'=>'Platino',
				'descripcion'=>'Titulo Platino',
				'frecuencia' => $frecuencia,
				'tipo'   => $tipo,
				'condicion_red_afiliacion'=>$condicion_red_afiliacion,
				'porcentaje'=>$porcentaje,
				'valor'=>1000000,
				'ganancia'=>30
	
		);
	
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();
	
		$titulo=new $this->titulo;
		$datosTitulo = array(
				'id' => 5,
				'orden'   =>5,
				'nombre'=>'Diamante',
				'descripcion'=>'Titulo Diamante',
				'frecuencia' => $frecuencia,
				'tipo'   => $tipo,
				'condicion_red_afiliacion'=>$condicion_red_afiliacion,
				'porcentaje'=>$porcentaje,
				'valor'=>3000000,
				'ganancia'=>40
	
		);
	
		$titulo->nuevoTitulo($datosTitulo);
		$titulo->ingresarTitulo();
	
	}
	
	private function ingresarRedDeAfiliacion($ingresar_red){
		
		
		$id_red=1;
		
		if($ingresar_red){
			$red=$this->red;
			$datosRed = array(
					'id_red' => $id_red,
					'nombre'   => "WoW CONEXION",
					'descripcion'    => "Construye un equipo, para darle alas a tus emprendimientos.",
					'frontal' => 6,
					'profundidad'   => 10,
					'valor_punto'    => 1000,
					'estatus'   => 'ACT',
					'plan' => 'BIN'
			);
			
			$red->nuevaRed($datosRed);
			$red->ingresarRed();
		}
		$this->ingresarAfiliado($id_red,10000,"giovanny",2,2,0);
		$this->ingresarAfiliado($id_red,10001,"carlos",10000,10000,0);
		$this->ingresarAfiliado($id_red,10002,"pedro",10000,10000,1);
		$this->ingresarAfiliado($id_red,10003,"camilo",10000,10000,2);
		$this->ingresarAfiliado($id_red,10004,"Nicolas",10000,10000,3);
		$this->ingresarAfiliado($id_red,10005,"esperanza",10000,10000,4);
		$this->ingresarAfiliado($id_red,10006,"maria",10000,10000,5);
		$this->ingresarAfiliado($id_red,10007,"pepe",10001,10001,0);
		$this->ingresarAfiliado($id_red,10008,"dario",10003,10003,1);
		$this->ingresarAfiliado($id_red,10009,"diego",10006,10006,0);
		$this->ingresarAfiliado($id_red,10010,"andres",10006,10006,1);
		$this->ingresarAfiliado($id_red,10011,"ricardo",10007,10007,0);
		$this->ingresarAfiliado($id_red,10012,"miguel",10007,10007,1);
		$this->ingresarAfiliado($id_red,10013,"paola",10009,10009,0);
		$this->ingresarAfiliado($id_red,10014,"fernando",10009,10009,1);
		$this->ingresarAfiliado($id_red,10015,"laura",10012,10012,0);
		$this->ingresarAfiliado($id_red,10016,"david",10012,10012,1);
		$this->ingresarAfiliado($id_red,10017,"mario",10014,10006 ,0);
		$this->ingresarAfiliado($id_red,10018,"andrea",10014,10006,1);
		$this->ingresarAfiliado($id_red,10019,"joan",10016,10016,0);
		$this->ingresarAfiliado($id_red,10020,"alejandro",10016,10016,1);
		$this->ingresarAfiliado($id_red,10021,"marcel",10017,10017,0);
		$this->ingresarAfiliado($id_red,10022,"daniel",10017,10017,1);
		$this->ingresarAfiliado($id_red,10023,"julian",10019,10019,0);
		$this->ingresarAfiliado($id_red,10024,"german",10019,10019,1);
		$this->ingresarAfiliado($id_red,10025,"luis",10020,10020,0);
		$this->ingresarAfiliado($id_red,10026,"alberto",10020,10020,1);
		$this->ingresarAfiliado($id_red,10027,"carolina",10022,10022,0);
		$this->ingresarAfiliado($id_red,10028,"haroll",10022,10022,1);
		$this->ingresarAfiliado($id_red,10029,"ruben",10023,10023,0);
		$this->ingresarAfiliado($id_red,10030,"marcela",10024,10024,0);
		$this->ingresarAfiliado($id_red,10031,"nelly",10026,10026,0);
		$this->ingresarAfiliado($id_red,10032,"jose",10030,10030,0);
		$this->ingresarAfiliado($id_red,10033,"johana",10030,10030,1);
		$this->ingresarAfiliado($id_red,10034,"pablo",10032,10032,0);
		$this->ingresarAfiliado($id_red,10035,"daniel",10032,10032,1);
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

	private function ingresarVentasFecha($fecha,$categoria,$ids){

		if($categoria){
				
				$id_categoria=250;
				
				$datosCategoria = array(
						'id_categoria' => 250,
						'id_red'   => 1,
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
				
				
				$id=1;$costo=68000;$puntos=0;
				$this->ingresarMercancia($id,"Kit de Afiliación(Winner)",$id_categoria,$membresia,$costo,$puntos);
				
				$id=4;$costo=80000;$puntos=80;
				$this->ingresarMercancia($id,"Plan Educativo Anual",$id_categoria,$membresia,$costo,$puntos);
				
				$id=7;$costo=130000;$puntos=120;
				$this->ingresarMercancia($id,"Paquete Mensual (Telefonía + Plan Educativo) Winner",$id_categoria,$producto,$costo,$puntos);
				
				$id=6;$costo=30000;$puntos=0;
				$this->ingresarMercancia($id,"Kit de Afiliación (Basic)",$id_categoria,$producto,$costo,$puntos);
				
				$id=8;$costo=80000;$puntos=35;
				$this->ingresarMercancia($id,"Paquete Mensual (Telefonía + Plan Educativo) Basic",$id_categoria,$servicio,$costo,$puntos);
		
				$id=505;$costo=60000;$puntos=3;
				$this->ingresarMercancia($id,"Recarga Telefonía 60000",$id_categoria,$producto,$costo,$puntos);
				
				$id=506;$costo=45000;$puntos=34;
				$this->ingresarMercancia($id,"Plan Educativo Basic",$id_categoria,$servicio,$costo,$puntos);
				
		
		
		}
	
/*							RED DE AFILIACION
*           	            			 ____________
*           	            			| GIOVANNY   |
*           							| ID:10000   | 
*        	   	           				|  Spr:_2    |
*        			  					|Merc:  W    |
*               	   					|Total:278000|
*        			  					|Puntos:200  |
*        _______/__    ___/______  __\________  _____\____    ___\______     ___\_____
*       |  CARLOS  | |   PEDRO  | |   CAMILO | | NICOLAS  |  | ESPERANZA|   |   MARIA  | 
*       | ID:10001 | | ID:10002 | | ID:10003 | | ID:10004 |  | ID:10005 |   | ID:10006 |
*       | Spr:10000| |Spr:10000 | |_Spr:10000| |_Spr:10000|  |_Spr:10000|   |_Spr:10000|
*       |Merc: B   | |Merc: B   | |Merc:     | |Merc:  W  |  |Merc:     |   |Merc:  B  |
*       |To:110000 | |To:110000	| |To:60000  | |To:278000 |  |To:45000  |   |To:110000 |
*       |Puntos: 35| |Puntos: 35| |Puntos: 3 | |Puntos:200|  |Puntos:34 |   |Puntos: 35|      
*		    ___/_____              __|_______                           _____/____     __\_______
*         | PEPE     |             | DARIO    |                        |  DIEGO   |   |  ANDRES  |
*         | ID:10007 |             | ID:10008 |                        | ID:10009 |   | ID:10010 |
*         |_Spr:10003|             |_Spr:10001|                        |_Spr:10000|   |_Spr:10000|
*         |Merc:  B  |             |Merc:  B  |                        |Merc : B  |   |Merc : W  |
*         |To:110000 |             |To:110000 |                        |To:110000 |   |To:278000 |
*         |Puntos: 35|             |Puntos: 35|                        |Puntos: 35|   |Puntos:200|
*  _______/__   _____\____                                       _____/____    __\_______
* | RICARDO  | | MIGUEL   |                                     |  PAOLA   |   | FERNANDO |
* | ID:10011 | | ID:10012 |                                     | ID:10013 |   | ID:10014 |
* |_Spr:10007| |_Spr:10007|                                     |_Spr:10010|   |_Spr:10010|
* |Merc:     | |Merc: W   |                                     |Merc:  B  |   |Merc:     |
* |To:60000  | |To:278000 |                                     |To:110000 |   |To: 60000 |
* |Puntos: 3 | |Puntos:200|                                     |Puntos: 35|   |Puntos: 3 |
*        _______/__   _____\____                                            ____/____     _\_________
*       | LAURA    | | DAVID    |                                          |  MARIO   |   | ANDREA   |
*       | ID:10015 | | ID:10016 |                                          | ID:10017 |   | ID:10018 |
*       |_Spr:10012| |_Spr:10012|                                          |_Spr:10006|   |_Spr:10006|
*       |Merc:  W  | |Merc:  W  |                                          |Merc:  B  |   |Merc: B   |
*       |To:278000 | |To:278000 |                                          |Tot:110000|   |Tot:110000|
*       |Puntos:200| |Puntos:200|                                          |Puntos: 35|   |Puntos: 35|
*              _______/___  _____\____                                 ____/____      _\________
*             | JOAN     | |ALEJANDRO |                               | MARCEL   |   | DANIEL   |
*             | ID:10019 | | ID:10020 |                               | ID:10021 |   | ID:10022 |
*             |_Spr:10016| |_Spr:10001|                               |_Spr:10017|   |_Spr:10017|
*             |Merc:     | |Merc: B   |                               |Merc:  W  |   |Merc:  W  |
*             |To:    0  | |To:110000 |                               |To:278000 |   |To: 278000|
*             |Puntos: 0 | |Puntos: 35|\                              |Puntos:200|   |Puntos:200|
* __________/  _____\____   _/________  \__________                          ___________/ ___\______
*| JULIAN   | | GERMAN   | |  LUIS    | |ALBERTO   |                        | CAROLINA | | HAROLL   |
*| ID:10023 | | ID:10024 | | ID:10025 | | ID:10026 |                        | ID:10027 | | ID:10028 |
*|_Spr:10019| |_Spr:10019| |_Spr:10016| |_Spr:10020|                        |_Spr:10022| |_Spr:10022|
*|Merc:  B  | |Merc:  W  | |Merc:  W  | |Merc:     |                        |Merc:  B  | |Merc: W   |
*|To:110000 | |to:278000 | |To:278000 | |To: 68000 |                        |To: 110000| |To:278000 |
*|Puntos: 35| |Puntos:200| |Puntos:200| |Puntos: 0 |                        |Puntos:35 | |Puntos:200|
*_____|_____     ____|_____               ____|_____            
*|  RUBEN   |   |   MARCELA|             |  NELLY   |    	     
*| ID:10029 |   | ID:10030 |       	     | ID:10031 |            
*|Spr:10001 |   |Spr:10001 |             |Spr:10026 |            
*|Merc:  B  |   |Merc:     |             |Merc:  B  |            
*|To: 110000|   |To: 80000 |             |To: 110000|            
*|Puntos: 35|   |Puntos:80 |             |Puntos: 35|            
*         __________/   ____\____
*        |  JOSE    | | JOHANA   |
*        | ID:10032 | | ID:10033 |
*		 |_Spr:10030| |_Spr:10030|
*        |Merc:     | |Merc:     | 
*        |To: 80000 | |To: 30000 |
*        |Puntos:80 | |Puntos: 0 |
      _____/_____  \__________
*     |  PABLO   | | DANIEL   |
*     | ID:10034 | | ID:10035 |
*     |_Spr:10032| |_Spr:10032|
*     |Merc:  B  | |Merc: W   |
*     |To:110000 | |To: 278000|
*     |Puntos: 35| |Puntos:200|   
*     
*     
*/
	
		$this->ingresarVentaMercanciaUsuario($ids,10000,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+1,10001,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+2,10002,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+3,10003,$fecha,array(505));
		$this->ingresarVentaMercanciaUsuario($ids+4,10004,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+5,10005,$fecha,array(506));
		$this->ingresarVentaMercanciaUsuario($ids+6,10006,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+7,10007,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+8,10008,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+9,10009,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+10,10010,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+11,10011,$fecha,array(505));
		$this->ingresarVentaMercanciaUsuario($ids+12,10012,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+13,10013,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+14,10014,$fecha,array(505));
		$this->ingresarVentaMercanciaUsuario($ids+15,10015,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+16,10016,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+17,10017,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+18,10018,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+20,10020,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+21,10021,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+22,10022,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+23,10023,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+24,10024,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+25,10025,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+26,10026,$fecha,array(1));
		$this->ingresarVentaMercanciaUsuario($ids+27,10027,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+28,10028,$fecha,array(1,7,4));//Winner
		$this->ingresarVentaMercanciaUsuario($ids+29,10029,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+30,10030,$fecha,array(4));
		$this->ingresarVentaMercanciaUsuario($ids+31,10031,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+32,10032,$fecha,array(4));
		$this->ingresarVentaMercanciaUsuario($ids+33,10033,$fecha,array(6));
		$this->ingresarVentaMercanciaUsuario($ids+34,10034,$fecha,array(6,8));//Basic
		$this->ingresarVentaMercanciaUsuario($ids+35,10035,$fecha,array(1,7,4));//Winner

	}
}
