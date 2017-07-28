<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class activacion_bono extends CI_Model
{

	private $id_bono;
	private $inicio;
	private $fin;
	private $mes_desde_afiliacion_afiliado;
	private $mes_desde_activacion_afiliado;
	private $estado;
	private $frecuencia;
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function getIdBono() {
		return $this->id_bono;
	}
	public function setIdBono($id_bono) {
		$this->id_bono = $id_bono;
		return $this;
	}
	public function getInicio() {
		return $this->inicio;
	}
	public function setInicio($inicio) {
		$this->inicio = $inicio;
		return $this;
	}
	public function getFin() {
		return $this->fin;
	}
	public function setFin($fin) {
		$this->fin = $fin;
		return $this;
	}
	public function getMesDesdeAfiliacionAfiliado() {
		return $this->mes_desde_afiliacion_afiliado;
	}
	public function setMesDesdeAfiliacionAfiliado($mes_desde_afiliacion_afiliado) {
		$this->mes_desde_afiliacion_afiliado = $mes_desde_afiliacion_afiliado;
		return $this;
	}
	public function getMesDesdeActivacionAfiliado() {
		return $this->mes_desde_activacion_afiliado;
	}
	public function setMesDesdeActivacionAfiliado($mes_desde_activacion_afiliado) {
		$this->mes_desde_activacion_afiliado = $mes_desde_activacion_afiliado;
		return $this;
	}
	public function getEstado() {
		return $this->estado;
	}
	public function setEstado($estado) {
		$this->estado = $estado;
		return $this;
	}
	public function getFrecuencia() {
		return $this->frecuencia;
	}
	public function setFrecuencia($frecuencia) {
		$this->frecuencia = $frecuencia;
		return $this;
	}
	
}
