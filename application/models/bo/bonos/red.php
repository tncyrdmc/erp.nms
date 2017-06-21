<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class red extends CI_Model
{


	//Usuario
	private $id_red;
	private $nombre;
	private $descripcion;

	//Afiliacion
	private $frontal;
	private $profundidad;
	private $valor_punto;
	private $estatus;
	private $plan;


	function setUpRed($id_red){
		$q=$this->db->query("SELECT id as id_red,nombre,descripcion,frontal,profundidad,valor_punto,estatus,plan FROM tipo_red where id=".$id_red);
		$datosRed=$q->result();
		
		$this->setIdRed($datosRed[0]->id_red);
		$this->setNombre($datosRed[0]->nombre);
		$this->setDescripcion($datosRed[0]->descripcion);
		$this->setFrontal($datosRed[0]->frontal);
		$this->setProfundidad($datosRed[0]->profundidad);
		$this->setValorPunto($datosRed[0]->valor_punto);
		$this->setEstatus($datosRed[0]->estatus);
		$this->setPlan($datosRed[0]->plan);
	}
	
	function  nuevaRed($datosRed){

		$this->setIdRed($datosRed["id_red"]);
		$this->setNombre($datosRed["nombre"]);
		$this->setDescripcion($datosRed["descripcion"]);
		$this->setFrontal($datosRed["frontal"]);
		$this->setProfundidad($datosRed["profundidad"]);
		$this->setValorPunto($datosRed["valor_punto"]);
		$this->setEstatus($datosRed["estatus"]);
		$this->setPlan($datosRed["plan"]);

	}
	
	function ingresarRed() {
		$this->insertarRed($this->id_red,$this->nombre,
										  $this->descripcion,$this->frontal,$this->profundidad,
										  $this->valor_punto,$this->estatus,$this->plan);
	}
	
	function limpiarRed() {
		$this->eliminarRed();
	}
	
	function insertarRed($id_red,$nombre,$descripcion,$frontal,$profundidad,$valor_punto,$estatus,$plan){
		$datos = array(
				'id' => $id_red,
				'nombre'   => $nombre,
				'descripcion'    => $descripcion,
				'frontal'=>$frontal,
				'profundidad'=>$profundidad,
				'valor_punto'=>$valor_punto,
				'estatus'=>$estatus,
				'plan'=>$plan
				
		);
		$this->db->insert('tipo_red',$datos);
	}

	function eliminarRed(){
		$this->db->query('delete from tipo_red where id >= 1');
	}
	public function getIdRed() {
		return $this->id_red;
	}
	public function setIdRed($id_red) {
		$this->id_red = $id_red;
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
	public function getFrontal() {
		return $this->frontal;
	}
	public function setFrontal($frontal) {
		$this->frontal = $frontal;
		return $this;
	}
	public function getProfundidad() {
		return $this->profundidad;
	}
	public function setProfundidad($profundidad) {
		$this->profundidad = $profundidad;
		return $this;
	}
	public function getValorPunto() {
		return $this->valor_punto;
	}
	public function setValorPunto($valor_punto) {
		$this->valor_punto = $valor_punto;
		return $this;
	}
	public function getEstatus() {
		return $this->estatus;
	}
	public function setEstatus($estatus) {
		$this->estatus = $estatus;
		return $this;
	}
	public function getPlan() {
		return $this->plan;
	}
	public function setPlan($plan) {
		$this->plan = $plan;
		return $this;
	}
	
}
