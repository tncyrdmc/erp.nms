<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_carrito_temporal extends CI_Model{

	function __construct() {
		parent::__construct();

	}
	
	function insertar($id_venta){
		$datos = array('id_venta' => $id_venta);
		$this->db->insert("carrito_temporal",$datos);
	}
}
