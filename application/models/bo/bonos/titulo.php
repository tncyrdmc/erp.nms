<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class titulo extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->model('/bo/bonos/afiliado');
		$this->load->model('/bo/bonos/calculador_bono');
		$this->load->model('/ov/model_titulos');
	
	}

	private $id;
	private $orden;
	private $nombre;
	private $descripcion;
	private $frecuencia;
	private $tipo;
	private $condicion_red_afiliacion;
	private $porcentaje;
	private $valor;
	private $ganancia;
	
	function setUpTitulo($id_Titulo){
		$q=$this->db->query("SELECT *  FROM cat_titulo where id=".$id_Titulo);
		$datosTitulo=$q->result();
		
		$this->setId($datosTitulo[0]->id);
		$this->setOrden($datosTitulo[0]->orden);
		$this->setNombre($datosTitulo[0]->nombre);
		$this->setDescripcion($datosTitulo[0]->descripcion);
		$this->setFrecuencia($datosTitulo[0]->frecuencia);
		$this->setTipo($datosTitulo[0]->tipo);
		$this->setCondicionRedAfiliacion($datosTitulo[0]->condicion_red_afilacion);
		$this->setPorcentaje($datosTitulo[0]->porcentaje);
		$this->setValor($datosTitulo[0]->valor);
		$this->setGanancia($datosTitulo[0]->ganancia);
		
	}
	
	function nuevoTitulo($datosTitulo){

		$this->setId($datosTitulo["id"]);
		$this->setOrden($datosTitulo["orden"]);
		$this->setNombre($datosTitulo["nombre"]);
		$this->setDescripcion($datosTitulo["descripcion"]);
		$this->setFrecuencia($datosTitulo["frecuencia"]);
		$this->setTipo($datosTitulo["tipo"]);
		$this->setCondicionRedAfiliacion($datosTitulo["condicion_red_afiliacion"]);
		$this->setPorcentaje($datosTitulo["porcentaje"]);
		$this->setValor($datosTitulo["valor"]);
		$this->setGanancia($datosTitulo["ganancia"]);
		
	}
	
	function ingresarTitulo() {
		$this->insertarTitulo($this->id,$this->orden,$this->nombre,$this->descripcion,
										  $this->frecuencia,$this->tipo,$this->porcentaje,$this->valor,$this->ganancia);
	}

	function limpiarTitulo() {
		$this->eliminarTitulo();
	}
	
	function eliminarTitulo(){
		$this->db->query('delete from cat_titulo where id >= 1');
	}
	
	function insertarTitulo($id,$orden,$nombre,$descripcion,$frecuencia,$tipo,$porcentaje,$valor,$ganancia){
	$datos = array(
				'id' => $id,
				'orden' => $orden,
				'nombre' => $nombre,
				'descripcion'   => $descripcion,
				'frecuencia' => $frecuencia,
				'tipo' => $tipo,
				'porcentaje' => $porcentaje,
				'valor'    => $valor,
				'ganancia'    => $ganancia
				
		);
		
		$this->db->insert('cat_titulo',$datos);
	}
	
	function getPuntosPersonalesFrecuencia($id_afiliado,$frecuencia,$fechaActual){
		
		$afiliado=new $this->afiliado;
		$calculador_bono=new $this->calculador_bono;
		
		$fechaInicio=$calculador_bono->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		$fechaFin=$calculador_bono->getFechaFinPagoDeBono($frecuencia,$fechaActual);
		
		$totalPuntosPersonales=0;
		$cualquiera="0";
		
		$q=$this->db->query("SELECT id  FROM tipo_red ");
		$redes= $q->result();
		
		foreach ($redes as $red){

			$totalPuntosPersonales=$totalPuntosPersonales+$afiliado->getPuntosTotalesPersonalesIntervalosDeTiempo($id_afiliado,$red->id,$cualquiera,$cualquiera,$fechaInicio,$fechaFin)[0]->total;
		}

		return $totalPuntosPersonales ;
	}
	
	function getComprasPersonalesFrecuencia($id_afiliado,$frecuencia,$fechaActual){
	
		$afiliado=new $this->afiliado;
		$calculador_bono=new $this->calculador_bono;
	
		$fechaInicio=$calculador_bono->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		$fechaFin=$calculador_bono->getFechaFinPagoDeBono($frecuencia,$fechaActual);
	
		$totalComprasPersonales=0;
		$cualquiera="0";
	
		$q=$this->db->query("SELECT id  FROM tipo_red ");
		$redes= $q->result();
	
		foreach ($redes as $red){
	
			$totalComprasPersonales=$totalComprasPersonales+$afiliado->getValorTotalDelasComprasPersonalesIntervalosDeTiempo($id_afiliado,$red->id,$cualquiera,$cualquiera,$fechaInicio,$fechaFin)[0]->total;
		}
	
		return $totalComprasPersonales ;
	}
	
	function getPuntosRedFrecuencia($id_afiliado,$frecuencia,$condicion_red,$fechaActual){
	
		$afiliado=new $this->afiliado;
		$calculador_bono=new $this->calculador_bono;
	
		$fechaInicio=$calculador_bono->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		$fechaFin=$calculador_bono->getFechaFinPagoDeBono($frecuencia,$fechaActual);
	
		$totalPuntosPersonales=0;
		$cualquiera="0";
	
		$q=$this->db->query("SELECT id , profundidad  FROM tipo_red ");
		$redes= $q->result();
	
		foreach ($redes as $red){
	
			$totalPuntosPersonales=$totalPuntosPersonales+$afiliado->getVentasTodaLaRed($id_afiliado,$red->id,"RED",$condicion_red,$red->profundidad,$fechaInicio,$fechaFin,$cualquiera,$cualquiera,"PUNTOS");
			
		}

		return $totalPuntosPersonales ;
	}
	
	function getComprasRedFrecuencia($id_afiliado,$frecuencia,$condicion_red,$fechaActual){
	
		$afiliado=new $this->afiliado;
		$calculador_bono=new $this->calculador_bono;
	
		$fechaInicio=$calculador_bono->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		$fechaFin=$calculador_bono->getFechaFinPagoDeBono($frecuencia,$fechaActual);
	
		$totalPuntosPersonales=0;
		$cualquiera="0";
	
		$q=$this->db->query("SELECT id , profundidad  FROM tipo_red ");
		$redes= $q->result();
	
		foreach ($redes as $red){
	
			$totalPuntosPersonales=$totalPuntosPersonales+$afiliado->getVentasTodaLaRed($id_afiliado,$red->id,"RED",$condicion_red,$red->profundidad,$fechaInicio,$fechaFin,$cualquiera,$cualquiera,"COSTO");
		}
	
		return $totalPuntosPersonales;
	}
	
	function getTituloAlcanzadoAfiliado($id_afiliado,$orden,$fechaActual){
		
		$titulo=$this->getTituloPorOrden($orden);
		$valorTitulo=$titulo[0]->valor;
		$idValorTitulo=$titulo[0]->id;
		
		$titulo_siguiente=$this->getTituloPorOrden($orden+1);
		$valorTituloAfiliado=$this->getTipoDeValorTitulo($id_afiliado,$titulo[0]->frecuencia,$titulo[0]->condicion_red_afilacion, $fechaActual, $titulo[0]->tipo);
		$valorTituloAfiliado=(($valorTituloAfiliado*$titulo[0]->porcentaje)/100);
		
		if(!isset($titulo_siguiente[0])){
			return $valorTitulo>$valorTituloAfiliado ? 0 : $titulo[0]->id;
		}
		
		$valorTituloSiguiente=$titulo_siguiente[0]->valor;		
		
		if($valorTitulo>$valorTituloAfiliado)
			return 0;

		if(($valorTitulo<=$valorTituloAfiliado)&&($valorTituloAfiliado<$valorTituloSiguiente))
			return $idValorTitulo;
		
		return $this->getTituloAlcanzadoAfiliado($id_afiliado,($orden+1),$fechaActual);
	}
	
	function getTipoDeValorTitulo($id_afiliado, $frecuencia, $condicion_red, $fechaActual,$tipoValor){
		
		if($tipoValor=="PUNTOSR")
			return $this->getPuntosRedFrecuencia($id_afiliado, $frecuencia, $condicion_red, $fechaActual);
		else if($tipoValor=="PUNTOSP")
			return $this->getPuntosPersonalesFrecuencia($id_afiliado, $frecuencia, $fechaActual);
		else if($tipoValor=="COMPRASR")
			return $this->getComprasRedFrecuencia($id_afiliado,$frecuencia,$condicion_red,$fechaActual);
		else if($tipoValor=="COMPRASP")
			return $this->getComprasPersonalesFrecuencia($id_afiliado, $frecuencia, $fechaActual);
	}

	function getTituloPorOrden($orden){
		$q=$this->db->query("SELECT *  FROM cat_titulo where orden=".$orden);
		return $q->result();
	}
	
	function getNombreTituloAlcanzadoAfiliado($id_usuario,$fechaActual){
		$id_titulo=$this->getTituloAlcanzadoAfiliado($id_usuario,1,$fechaActual);		
		$this->model_titulos->actualizar($id_usuario,$id_titulo);
		return $this->getNombreTitulo($id_titulo);
	}
	function getNombreTitulo($id){

		$q=$this->db->query("SELECT nombre  FROM cat_titulo where id=".$id);
		$titulo=$q->result();
		if($titulo==NULL)
			return NULL;
		return $titulo[0]->nombre;
	}
	
	function eliminarTitulos(){
		$this->db->query('delete from mercancia where id >= 500');
		$this->db->query('delete from producto where id >= 500');
		$this->db->query('delete from servicio where id >= 500');
		$this->db->query('delete from combinado where id >= 500');
		$this->db->query('delete from paquete_inscripcion where id_paquete >= 500');
		$this->db->query('delete from membresia where id >= 500'); 
		$this->db->query('delete from cross_merc_img where id_mercancia >= 500');
	}
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getOrden() {
		return $this->orden;
	}
	public function setOrden($orden) {
		$this->orden = $orden;
		return $this;
	}
	public function getNombre() {
		return $this->nombre;
	}
	public function setNombre($nombre) {
		$this->nombre = $nombre;
		return $this;
	}
	public function getDescripcion() {
		return $this->descripcion;
	} 
	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
		return $this;
	}
	public function getFrecuencia() {
		return $this->frecuencia;
	}
	public function setFrecuencia($frecuencia) {
		$this->frecuencia = $frecuencia;
		return $this;
	}
	public function getTipo() {
		return $this->tipo;
	}
	public function setTipo($tipo) {
		$this->tipo = $tipo;
		return $this;
	}
	public function getCondicionRedAfiliacion() {
		return $this->condicion_red_afiliacion;
	}
	public function setCondicionRedAfiliacion($condicion_red_afiliacion) {
		$this->condicion_red_afiliacion = $condicion_red_afiliacion;
		return $this;
	}
	public function getPorcentaje() {
		return $this->porcentaje;
	}
	public function setPorcentaje($porcentaje) {
		$this->porcentaje = $porcentaje;
		return $this;
	}
	public function getValor() {
		return $this->valor;
	}
	public function setValor($valor) {
		$this->valor = $valor;
		return $this;
	}
	public function getGanancia() {
		return $this->ganancia;
	}
	public function setGanancia($ganancia) {
		$this->ganancia = $ganancia;
		return $this;
	}
	
	
}
