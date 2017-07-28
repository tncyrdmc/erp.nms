<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_tipo_red extends CI_Model{

	function __construct() {
		parent::__construct();


	}
	
	
	function insertar($nombre, $descripcion, $frontal, $profundidad, $plan, $punto){
		$datos = array('id' => 0,
						'nombre' => $nombre,
						'descripcion' => $descripcion,
						'frontal' => $frontal,
						'profundidad' => $profundidad,
						'plan' => $plan,
						'valor_punto' => $punto
		);
		$this->db->insert("tipo_red",$datos);
		$id_red = $this->db->insert_id();
		$datos = array('id_red' => $id_red,'id_afiliado' => 2,'debajo_de' => 1,'directo' => 1,'lado' => 0);
		$this->db->insert("afiliar",$datos);
		$datos = array('id_red' => $id_red,'id_usuario' => 2,'profundidad' => 0,'estatus' => 'ACT','premium' => 2);
		$this->db->insert("red",$datos);
		
		return true;
	}

	function listarTodos()
	{
		$q=$this->db->query('select * from tipo_red group by id');
		return $q->result();
	}
	
	function listarActivos()
	{
		$q=$this->db->query("select * from tipo_red where estatus = 'ACT' group by id");
		return $q->result();
	}
	
	function RedesUsuario($id)
	{
		$q=$this->db->query("select tr.id, tr.nombre, tr.descripcion, tr.profundidad from tipo_red tr, afiliar a where tr.id = a.id_red and a.id_afiliado = ".$id." and tr.estatus = 'ACT' group by tr.id");
		return $q->result();
	}
	
	function traerRed($idRed)
	{
		$q=$this->db->query('select * from tipo_red where id = '.$idRed);
		return $q->result();
	}
	
	function traerValorPuntoComisionableRed($idRed)
	{
		$q=$this->db->query('select valor_punto from tipo_red where id = '.$idRed);
		return $q->result()[0]->valor_punto;
	}
	
	function traer_nombre_red($idRed)
	{
		$q=$this->db->query('select nombre from tipo_red where id = '.$idRed);
		return $q->result();
	}
	
	function ObtenerFrontales()
	{
		$q=$this->db->query('select frontal from tipo_red where 1');
		return $q->result();
	}
	
	function ObtenerFrontalesRed($id)
	{
		$q=$this->db->query('select frontal, profundidad from tipo_red where id='.$id);
		return $q->result();
	}
				
	function traerCapacidadRed()
	{
		$q = $this->db->query('select frontal,profundidad from tipo_red where 1');
		
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
	
	function actualizar($id, $nombre, $descripcion,  $frontal,$profundidad, $plan , $punto){
		$datos = array(
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'frontal' => $frontal,
				'profundidad' => $profundidad,
				'plan' => $plan,
				'valor_punto' => $punto
		);
		$this->db->update("tipo_red",$datos,"id = ".$id);
		return true; 
	}
	
	function cambiar_estado(){
		$this->db->query("update tipo_red set estatus = '".$_POST['estado']."' where id=".$_POST["id"]);
		return true;
	}
	
	function CapacidadRed($id_red)
	{
		$q = $this->db->query('select id,frontal,profundidad from tipo_red where id = '.$id_red);
	
		return $q->result();
	}
	
	function cantidadRedes()
	{
		$q=$this->db->query("SELECT id FROM tipo_red where estatus = 'ACT' ");
		return $q->result();
	}
	
	function cantidadRedesUsuario($id)
	{
		$q=$this->db->query("SELECT af.id_red as id , r.nombre as nombre FROM afiliar af, tipo_red r where id_afiliado = '".$id."' and r.id = af.id_red group by id_red");
		return $q->result();
	}
	
	function validarUsuarioRed($id,$id_red)
	{
		$q=$this->db->query("SELECT id_red as id FROM afiliar where id_afiliado= '".$id."' and id_red='".$id_red."'");
		return $q->result();
	}
}
