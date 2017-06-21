<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class general extends CI_Model
{
	
	function isAValidUser($id,$modulo){

		$q=$this->db->query('SELECT cu.id_tipo_usuario as tipoId
							FROM users u , user_profiles up ,cat_tipo_usuario cu
							where(u.id=up.user_id)
							and (up.id_tipo_usuario=cu.id_tipo_usuario)
							and(u.id='.$id.')');
		$tipo=$q->result();
	
		$idTipoUsuario=$tipo[0]->tipoId;
	
		$perfiles = array(
			
				// "OV" => $this->IsActivedPago($id),
				"comercial" => ($idTipoUsuario==4) ? true : false,
				"soporte" => ($idTipoUsuario==3) ? true : false,
				"logistica" => ($idTipoUsuario==5) ? true : false,
				"oficina" => ($idTipoUsuario==6) ? true : false,
				"administracion" => ($idTipoUsuario==7) ? true : false,
				"cedi" => ($idTipoUsuario==8) ? true : false,
				"almacen" => ($idTipoUsuario==9) ? true : false,
				
		);
		
		return ($idTipoUsuario==1) ? true :$perfiles[$modulo];
		
	}
	
	function get_username($id)
	{
		$q=$this->db->query('select * from user_profiles where user_id = '.$id);
		return $q->result();
	}
	function get_groups()
	{
		$q=$this->db->query('select * from cat_grupo');
		return $q->result();
	}
	function get_tipo_archivo($ext)
	{
		$q=$this->$this->db->query('select id from cat_tipo_archivo where descripcion= '.$ext);
		return $q->result();
	}
	function get_video()
	{
		$q=$this->db->query('select * from archivo where id_tipo=2');
		return $q->result();
	}
	
	function get_style($id)
	{
		$q=$this->db->query('select * from estilo_usuario where id_usuario = '.$id);
		return $q->result();
	}
	function totalAfiliados()
	{
		$q=$this->db->query('SELECT count(*)as total FROM users u , user_profiles up
								where u.id=up.user_id 
								and up.id_tipo_usuario=2
								and u.id!=2;');
		return $q->result();
	}
}