<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class condiciones_bono extends CI_Model
{

	private $id_condicion;
	private $id_bono;
	private $id_rango;
	private $id_tipo_rango;
	private $id_red;
	private $condicion_red;
	private $nivel_red;
	private $valor;
	private $condicion_afiliados_red;
	private $condicion_bono1;
	private $condicion_bono2;
	
	function __construct()
	{
		parent::__construct();
	}
	public function getIdCondicion() {
		return $this->id_condicion;
	}
	public function setIdCondicion($id_condicion) {
		$this->id_condicion = $id_condicion;
		return $this;
	}
	public function getIdBono() {
		return $this->id_bono;
	}
	public function setIdBono($id_bono) {
		$this->id_bono = $id_bono;
		return $this;
	}
	public function getIdRango() {
		return $this->id_rango;
	}
	public function setIdRango($id_rango) {
		$this->id_rango = $id_rango;
		return $this;
	}
	public function getIdTipoRango() {
		return $this->id_tipo_rango;
	}
	public function setIdTipoRango($id_tipo_rango) {
		$this->id_tipo_rango = $id_tipo_rango;
		return $this;
	}
	public function getIdRed() {
		return $this->id_red;
	}
	public function setIdRed($id_red) {
		$this->id_red = $id_red;
		return $this;
	}
	public function getCondicionRed() {
		return $this->condicion_red;
	}
	public function setCondicionRed($condicion_red) {
		$this->condicion_red = $condicion_red;
		return $this;
	}
	public function getNivelRed() {
		return $this->nivel_red;
	}
	public function setNivelRed($nivel_red) {
		$this->nivel_red = $nivel_red;
		return $this;
	}
	public function getValor() {
		return $this->valor;
	}
	public function setValor($valor) {
		$this->valor = $valor;
		return $this;
	}
	public function getCondicionBono1() {
		return $this->condicion_bono1;
	}
	public function setCondicionBono1($condicion_bono1) {
		$this->condicion_bono1 = $condicion_bono1;
		return $this;
	}
	public function getCondicionBono2() {
		return $this->condicion_bono2;
	}
	public function setCondicionBono2($condicion_bono2) {
		$this->condicion_bono2 = $condicion_bono2;
		return $this;
	}
	public function getCondicionAfiliadosRed() {
		return $this->condicion_afiliados_red;
	}
	public function setCondicionAfiliadosRed($condicion_afiliados_red) {
		$this->condicion_afiliados_red = $condicion_afiliados_red;
		return $this;
	}
	
	

}
