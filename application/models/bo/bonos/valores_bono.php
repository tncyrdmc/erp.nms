<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class valores_bono extends CI_Model
{

	private $id;
	private $id_bono;
	private $condicion_red;
	private $verticalidad;
	private $nivel;
	private $valor;
	
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
	public function getNivel() {
		return $this->nivel;
	}
	public function setNivel($nivel) {
		$this->nivel = $nivel;
		return $this;
	}
	public function getValor() {
		return $this->valor;
	}
	public function setValor($valor) {
		$this->valor = $valor;
		return $this;
	}
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getCondicionRed() {
		return $this->condicion_red;
	}
	public function setCondicionRed($condicion_red) {
		$this->condicion_red = $condicion_red;
		return $this;
	}
	public function getVerticalidad() {
		return $this->verticalidad;
	}
	public function setVerticalidad($verticalidad) {
		$this->verticalidad = $verticalidad;
		return $this;
	}
	
	
	
	
	
}
