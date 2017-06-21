<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_tipo_usuario extends CI_Model{

	function __construct() {
		parent::__construct();


	}
	
	function getTipoUsuarios(){
		$tipos=$this->db->query("select * from cat_tipo_usuario where id_tipo_usuario >2");
		return $tipos->result();
	}
	
	function getTipoUsuariosId($id)
	{
		$q=$this->db->query('SELECT u.id as id,u.username as username,u.email as email ,up.nombre as nombre,
							up.apellido,cu.descripcion as tipo,cu.id_tipo_usuario as tipoId
							FROM users u , user_profiles up ,cat_tipo_usuario cu
							where(u.id=up.user_id)
							and (up.id_tipo_usuario=cu.id_tipo_usuario)
							and (cu.id_tipo_usuario>2)
							and(u.id='.$id.')');
		return $q->result();
	}
	
	function getUsuarioCediId($id)
	{
		$q=$this->db->query('SELECT u.id as id, u.username as username, u.email as email , up.nombre,
							 up.apellido, C.id_cedi as cedi, UC.dni, UC.telefono_fijo, UC.id_pais
							
							FROM users u , user_profiles up ,cat_tipo_usuario cu, users_cedi UC, cedi C
							
							where(u.id=up.user_id) and (up.id_tipo_usuario=cu.id_tipo_usuario) and (cu.id_tipo_usuario=8)
							and(u.id='.$id.') and UC.username = u.username and UC.id_cedi = C.id_cedi group by u.id;');
		return $q->result();
	}
	
	function actualizar_user(){
		$this->db->query('UPDATE users SET username="'.$_POST['username'].'",email="'.$_POST['email'].'" WHERE id="'.$_POST['id'].'"');
		$this->db->query('UPDATE user_profiles SET nombre="'.$_POST['nombre'].'",apellido="'.$_POST['apellido'].'",id_tipo_usuario="'.$_POST['tipo'].'" WHERE user_id="'.$_POST['id'].'"');
		
		return true;
	}
	
	function actualizar_user_cedi(){
		$username = $this->db->query('SELECT username from users WHERE id = "'.$_POST['id'].'"');
		$username = $username->result();
		$username = $username[0]->username;
		$this->db->query('UPDATE users_cedi SET id_cedi = "'.$_POST['id_cedi'].'", dni="'.$_POST['dni'].'", nombres="'.$_POST['nombre'].'",apellido_uno="'.$_POST['apellido'].'",telefono_fijo="'.$_POST['telefono'].'",email="'.$_POST['email'].'",id_pais="'.$_POST['id_pais'].'" WHERE username = "'.$username.'"');
		
		$this->db->query('UPDATE users SET email = "'.$_POST['email'].'" WHERE id="'.$_POST['id'].'"');
		$this->db->query('UPDATE user_profiles SET nombre = "'.$_POST['nombre'].'",apellido="'.$_POST['apellido'].'" WHERE user_id="'.$_POST['id'].'"');
		
		
		return true;
	}
	
	function newUser($nombre,$apellido,$tipo){
		$id=$this->db->query("select id from users order by id desc limit 1");
		$idUser=$id->result();
		
		$dato=array(
				"user_id"     => $idUser[0]->id,
				"id_tipo_usuario"   => $tipo,
				"nombre"   => $nombre,
				"apellido"     => $apellido
            );
		
        $this->db->insert("user_profiles",$dato);
        $id_nuevo=$this->db->insert_id();
	}
	
	function get_all_users()
	{
		$q=$this->db->query('SELECT u.id as id,u.username as username,u.email as email ,up.nombre as nombre,
							up.apellido,cu.descripcion as tipo
							FROM users u , user_profiles up ,cat_tipo_usuario cu
							where(u.id=up.user_id)
							and (up.id_tipo_usuario=cu.id_tipo_usuario)
							and (cu.id_tipo_usuario>2);');
		return $q->result();
	}
	
function get_all_users_cedi()
	{
		$q=$this->db->query('SELECT u.id, u.username, u.email, up.nombre, up.apellido, C.nombre as cedi
							
FROM users u , user_profiles up, cat_tipo_usuario cu, users_cedi UC, cedi C
							
where(u.id = up.user_id) and (up.id_tipo_usuario = cu.id_tipo_usuario) and (cu.id_tipo_usuario = 8) 
and UC.username = u.username and UC.id_cedi = C.id_cedi');
		return $q->result();
	}

	function listarTodos(){
		$tipos = $this->db->get('cat_perfil_permiso');
		return $tipos->result();
	}
	
}
