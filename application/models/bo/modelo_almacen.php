<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_almacen extends CI_Model
{
	
	function __construct() {
		parent::__construct();
	
		$this->load->model('ov/model_perfil_red');
	}
	
	function obtenerAlmacenes(){
		$q = $this->db->query("SELECT p.id_cedi,p.nombre,p.descripcion,p.ciudad,p.direccion,p.telefono,p.estatus,c.Name
                               FROM cedi p ,City c where p.ciudad = c.ID and p.tipo= 'A' ");
	    return  $q->result();
		
	}
	
	function crear_almacen($almacen){
		$this->db->insert('cedi',$almacen);
		return $this->db->insert_id();
	}
	
	function eliminar_almacen($id){
		$this->db->query("delete from cedi where id_cedi = ".$id);
	}
	
	function cambiar_estado_almacen($id,$estado) {
		$this->db->query("update almacen set estatus = '".$estado."' where id_almacen = ".$id);
	}
	
	function consultar_almacen($id){
		$q = $this->db->query('select * from almacen where id_almacen ='.$id);
		$almacenes = $q->result();
		return $almacenes;
	}
	
	function actualizar_almacen($almacen, $id){
		$this->db->update('cedi', $almacen, array('id_cedi' => $id));
	}
	
	function insertarUsuario(){
		
				$datos = array(
						'id_cedi' => $_POST['id_cedi'],
						'dni' => $_POST['dni'], 
						'username' => $_POST['username'],
						'nombres' => $_POST['nombre'],
						'apellidos' => $_POST['apellido'],
						'telefono' => $_POST['telefono'],
						'email' => $_POST['email'],
						'pais' => $_POST['id_pais'],
						'status' => 'ACT'						
				);
				
				$this->db->insert("users_almacen",$datos);
	
	}
	
	function actualizarUsuario(){
		
		$username = $this->model_perfil_red->get_username($_POST['id']);
		
		$dato_users = array(
				'email' => $_POST['email']
		);
		$this->db->update('users', $dato_users, array('id' => $_POST['id']));
		
		$dato_almacen = array(
				'id_cedi' => $_POST['id_cedi'],
				'dni' => $_POST['dni'],
				'nombres' => $_POST['nombre'],
				'apellidos' => $_POST['apellido'],
				'telefono' => $_POST['telefono'],
				'email' => $_POST['email'],
				'pais' => $_POST['id_pais']
		);
		$this->db->update('users_almacen', $dato_almacen, array('username' => $username));
		
		$dato_profile = array(
				'keyword' => $_POST['dni'],
				'nombre' => $_POST['nombre'],
				'apellido' => $_POST['apellido']
		);
		$this->db->update('user_profiles', $dato_profile, array('user_id' => $_POST['id']));
			
		return true;
	}
	
	function getUsuarios()
	{
		$q=$this->db->query('SELECT 
								    u.id,
								    u.username,
								    u.email,
								    up.nombre,
								    up.apellido,
								    C.nombre as cedi
								FROM
								    users u,
								    user_profiles up,
								    cat_tipo_usuario cu,
								    users_almacen UC,
								    cedi C
								WHERE
								    (u.id = up.user_id)
								        and (up.id_tipo_usuario = cu.id_tipo_usuario)
								        and (cu.id_tipo_usuario = 9)
								        and UC.username = u.username
								        and UC.id_cedi = C.id_cedi');
		return $q->result();
	}
	
	function getUsuarioId($id)
	{
		$q=$this->db->query('SELECT 
								    u.id as id,
								    u.username as username,
								    u.email as email,
								    up.nombre,
								    up.apellido,
								    C.id_cedi as cedi,
								    UC.dni,
								    UC.telefono,
								    UC.pais
								FROM
								    users u,
								    user_profiles up,
								    cat_tipo_usuario cu,
								    users_almacen UC,
								    cedi C
								WHERE
								    (u.id = up.user_id)
								        and (up.id_tipo_usuario = cu.id_tipo_usuario)
								        and (cu.id_tipo_usuario = 9)
								        and (u.id = '.$id.')
								        and UC.username = u.username
								        and UC.id_cedi = C.id_cedi
								group by u.id');
		return $q->result();
	}
	
}