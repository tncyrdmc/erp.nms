<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class general extends CI_Model
{
	
	function __construct() {
		parent::__construct();
	
		$this->load->model('ov/model_perfil_red');
	}
	
	
	function isAValidUser($id,$modulo){
	
		$q=$this->db->query('SELECT cu.id_tipo_usuario as tipoId
							FROM users u , user_profiles up ,cat_tipo_usuario cu
							where(u.id=up.user_id)
							and (up.id_tipo_usuario=cu.id_tipo_usuario)
							and(u.id='.$id.')');
		$tipo=$q->result();
	
		$idTipoUsuario=$tipo[0]->tipoId;

		$perfiles = array(
			
				"OV" => $this->IsActivedPago($id),
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
	function get_status($id)
	{
		$q=$this->db->query('select id_estatus from user_profiles where user_id = '.$id);
		return $q->result();
	}

	function IsActivedPago($id){
		$q = $this->db->query('select estatus from user_profiles where user_id = '.$id);
		$estado = $q->result();
		
		if($estado[0]->estatus == 'ACT'){
			return true;
		}else{
			return false;
		}	
	}
	function get_tipo($id)
	{
		$q=$this->db->query('select id_tipo_usuario from user_profiles where user_id = '.$id);
		return $q->result();
	}
  	function get_password($id)
	{
		$q=$this->db->query('select password from users where id = '.$id);
		return $q->result();
	}
	function get_style($id)
	{
	  	$q=$this->db->query('select * from estilo_usuario where id_usuario = '.$id);
	 	return $q->result();
	}
	function get_username($id)
	{
		$q=$this->db->query('select * from user_profiles where user_id = '.$id);
		return $q->result();
	}
	function get_user($id)
	{
		$q=$this->db->query('select username from users where id = '.$id);
		return $q->result();
	}
	function get_last_id()
	{
		$q=$this->db->query("SELECT id from users order by id desc limit 1");
		return $q->result();
	}
	function dato_usuario($email)
	{
		$q=$this->db->query('
			SELECT profile.user_id, profile.nombre nombre, profile.apellido apellido,
			profile.fecha_nacimiento nacimiento, profile.id_estudio id_estudio,
			profile.id_ocupacion id_ocupacion,
			profile.id_tiempo_dedicado id_tiempo_dedicado,
			sexo.descripcion sexo,
			edo_civil.descripcion edo_civil,
			estilos.bg_color, estilos.btn_1_color, estilos.btn_2_color
			from user_profiles profile
			left join cat_sexo sexo
			on profile.id_sexo=sexo.id_sexo
			left join estilo_usuario estilos on
			profile.user_id=estilos.id_usuario
			left join cat_edo_civil edo_civil on
			profile.id_edo_civil=edo_civil.id_edo_civil
			left join users on profile.user_id=users.id
			where users.email="'.$email.'"');
		return $q->result();
	}
	function update_login($id)
	{
		if(isset($id)){
		$q=$this->db->query('select last_login from users where id = '.$id);
		$q=$q->result();

		$this->db->query('update user_profiles set ultima_sesion="'.$q[0]->last_login.'" where user_id='.$id);
		}
	}

	function getRetenciones(){
		$q=$this->db->query('SELECT * FROM cat_retencion where estatus="ACT" and duracion !="UNI"');
		return $q=$q->result();
	}
	
	function getRetencionesMes(){
		$q=$this->db->query('SELECT * FROM cat_retenciones_historial where month(now())=mes and year(now())=ano and id_afiliado=0');
		return $q=$q->result();
	}
	
	function isBlocked(){
 
		if($this->isBlockedExpired())
			return false;
		
		$q=$this->db->query('SELECT blocked FROM users_attempts where ip = "'.$this->input->ip_address().'"');
		$blocked=$q->result();
		
		if(!isset($blocked[0]->blocked))
			return false;

		if($blocked[0]->blocked==1)
			return true;
		return false;
	}
	
	function isBlockedExpired(){
		$q=$this->db->query('SELECT ip FROM users_attempts where ip = "'.$this->input->ip_address().'" and (attempts>=5) and ("'.date('Y-m-d H:i:s').'") > (last_login + INTERVAL 30 MINUTE)');
		
		$intentos=$q->result();
		
		if(!isset($intentos[0]->ip))
			return false;
		
		if($intentos[0]->ip){
			$this->unlocked();
		}
		return false;
	}
	
	function addAttempts(){
		$q=$this->db->query('SELECT attempts , ip FROM users_attempts where ip = "'.$this->input->ip_address().'"');
		$intentos=$q->result();
		
		if(!isset($intentos[0]->ip)){
			$datos = array(
					'ip' => $this->input->ip_address(),
					'last_login'   => date('Y-m-d H:i:s'),
					'attempts'    => '1',
			);
			$this->db->insert('users_attempts',$datos);
			return "5";
		}else if($intentos[0]->attempts>=5){
			$this->locked(); 
			return "ninguno";
		}
		else {
			$this->db->query('update users_attempts set attempts ="'.(($intentos[0]->attempts)+1).'" , last_login ="'.date('Y-m-d H:i:s').'" where ip = "'.$this->input->ip_address().'"');
			return "".(6-(($intentos[0]->attempts)+1));
		}
	}
	
	function locked(){
		$this->db->query('update users_attempts set blocked ="1" where ip = "'.$this->input->ip_address().'"');
	}
	
	function unlocked(){
		$this->db->query('update users_attempts set blocked ="0",attempts ="1" where ip = "'.$this->input->ip_address().'"');
		return true;
	}
	
	function get_temp_invitacion($token)
	{
		$q=$this->db->query("select * from temp_invitacion where token = '".$token."'");
		$token = $q->result();
		return $token;
	}
	
	function get_temp_invitacion_ACT($token)
	{
		$q=$this->db->query("select * from temp_invitacion where token = '".$token."' and estatus = 'ACT'");
		$token = $q->result();
		return $token;
	}
	
	function get_temp_invitacion_ACT_id($token)
	{
		$q=$this->db->query("select * from temp_invitacion where id = '".$token."' and estatus = 'ACT'");
		$token = $q->result();
		return $token;
	}
	
	function new_invitacion($email,$red,$sponsor,$debajo_de,$lado){
		
		//$time = time();
		$token = md5(/*$time."~".*/$red."~".$email."~".$sponsor."~".$debajo_de."~".$lado);	
		
			$dato=array(
					"token" =>	$token,
					"email" =>	$email,
					"red" =>	$red,
					"sponsor" =>	$sponsor,
					"padre" =>	$debajo_de,
					"lado" =>	$lado,
			);
			$this->db->insert("temp_invitacion",$dato);
		
		return ($this->get_temp_invitacion($token)) ?  $token : false;
		
	}
	
	function checkespacio ($temp){
		
		$exist = $this->model_perfil_red->exist_mail($_POST['email']);
		
		if ($exist){
			return  true;
		}
		$ocupado = $this->model_perfil_red->ocupado($temp);
		($ocupado) ? $this->model_perfil_red->trash_token($temp[0]->id) : ''; 
		return ($ocupado) ? true : false;
	}
	
	
}
