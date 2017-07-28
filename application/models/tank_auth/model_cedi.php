<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_cedi extends CI_Model{

	function __construct() {
		parent::__construct();


	}
	
	
	function insertar($id_cedi, $dni, $username, $nombres, $apellido1, $apellido2, $telefono_fijo, 
					  $telefono_movil, $email, $ocupacion, $id_pais, $idioma, $fecha_alta){
		
		$datos = array('id_cedi' => $id_cedi, 
					   'dni' => $dni, 'username' => $username,
					   'nombres' => $nombres, 
					   'apellido_uno' => $apellido1, 
					   'apellido_dos' => $apellido2, 
					   'telefono_fijo' => $telefono_fijo, 
					   'telefono_movil' => $telefono_movil, 
					   'email' => $email,
					   'ocupacion' => $ocupacion, 
					   'id_pais' => $id_pais, 
					   'idioma' => $idioma, 
					   'fecha_alta' => $fecha_alta, 
					   'status' => 'ACT');
		//var_dump($datos);exit();
		$this->db->insert("users_cedi",$datos);
		
	}

	function listarTodos()
	{
		$q=$this->db->query('select * from cedi where tipo = "C" and estatus = "ACT"');
		return $q->result();
	}
	/*
	function RedesUsuario($id)
	{
		$q=$this->db->query('select tr.id, tr.nombre, tr.descripcion, tr.profundidad from tipo_red tr, afiliar a where tr.id = a.id_red and a.id_afiliado = '.$id." group by tr.id");
		return $q->result();
	}
	
	function traerRed($idRed)
	{
		$q=$this->db->query('select * from tipo_red where id = '.$idRed);
		return $q->result();
	}
	
	function traer_nombre_red($idRed)
	{
		$q=$this->db->query('select nombre from tipo_red where id = '.$idRed);
		return $q->result();
	}
	
	function ObtenerFrontales()
	{
		$q=$this->db->query('select frontal from tipo_red where id=1');
		return $q->result();
	}
	
	function ObtenerFrontalesRed($id)
	{
		$q=$this->db->query('select frontal from tipo_red where id='.$id);
		return $q->result();
	}
				
	function traerCapacidadRed()
	{
		$q = $this->db->query('select frontal,profundidad from tipo_red where id = 1');
		
		return $q->result();
	}
	
	function getCapacidadRed($id)
	{
		$q = $this->db->query('select frontal,profundidad from tipo_red where id = '.$id);
	
		return $q->result();
	}
	function actualizarCapacidadRed($id_red, $frontal, $profundidad){
		$datos = array(	'frontal' => $frontal,
						'profundidad' => $profundidad);
		
		$this->db->update('tipo_red', $datos, array('id' => $id_red));
	}
	
	function actualizar($id, $nombre, $descripcion, $profundidad, $frontal){
		$datos = array(
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'frontal' => $frontal,
				'profundidad' => $profundidad);
		$this->db->update("tipo_red",$datos,"id = ".$id);
	}
	
	function CapacidadRed($id_red)
	{
		$q = $this->db->query('select id,frontal,profundidad from tipo_red where id = '.$id_red);
	
		return $q->result();
	}*/
}
