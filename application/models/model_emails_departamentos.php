<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_emails_departamentos extends CI_Model{

	function __construct() {
		parent::__construct();


	}
	
	function get_departamento_email($id){
		$q = $this->db->query("select e.email from emails_departamentos e, mails d where e.id = d.id_emails and d.id = ".$id);
		$dpto = $q->result();
		return $dpto[0]->email;
	}
	
	function get_tema($id){
		$q = $this->db->query("select nombre from mails where id = ".$id);
		$dpto = $q->result();
		return $dpto[0]->nombre;
	}
	
	function buscar(){
		$q = $this->db->query("select * from emails_departamentos");
		return $q->result();
	}
	
	function insertar($nombre, $email){
		$this->db->query("insert into emails_departamentos (nombre, email) values ('".$nombre."','".$email."')");
	}
	
	function eliminar(){
		$this->db->query("delete from emails_departamentos");
	}
}
