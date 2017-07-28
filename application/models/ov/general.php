<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class general extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('/bo/bonos/calculador_bono');
		$this->load->model('/bo/bonos/afiliado');
	
	}
	
	function IsActivedPago($id){
		$q = $this->db->query('select estatus from user_profiles where user_id = '.$id);
		$estado = $q->result();
	
		if($estado[0]->estatus == 'ACT'){
			return true;
		}else{
			if($this->VerificarCompraPaquete($id)){
				$this->actualizarEstadoAfiliado($id);
				return true;
			}else{
				return false;
			}
		}
	}
	
	function actualizarEstadoAfiliado($id){
		$q = $this->db->query("UPDATE user_profiles SET estatus = 'ACT' WHERE user_id = ".$id);
	}
	
	function VerificarCompraPaquete($id){
		$q = $this->db->query("SELECT m.id FROM cross_venta_mercancia cvm, venta v, mercancia m
		where v.id_estatus = 2 and cvm.id_venta = v.id_venta and cvm.id_mercancia = m.id and m.id_tipo_mercancia = 4 and v.id_user = ".$id);
	
		$mercnacias_id = $q->result();
	
		if(isset($mercnacias_id[0]->id)){
			return true;
		}else{
			return false;
		}
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
	
	function isActived($id){
	
		if($id==2)
			return 0;
		
		return $this->validarMembresias($id);

	}
	
	function isActivedAfiliacionesPuntosPersonales($id_afiliado,$fecha){
	$cualquiera="0";
		
	$numeroAfiliadosDirectos=$this->getAfiliadosDirectos($id_afiliado);
	$afiliadosParaEstarActivo=$this->getAfiliadosParaEstarActivo();
	
	if($afiliadosParaEstarActivo>$numeroAfiliadosDirectos)
		return false;
	
	$fechaInicio=$this->calculador_bono->getInicioMes($fecha);
	$fechaFin=$this->calculador_bono->getFinMes($fecha);
	
	$puntosParaEstarActivo=$this->getPuntosParaEstarActivo();
	$puntosComisionablesMes=0;
	
	$q=$this->db->query('select id from tipo_red');
	$redes= $q->result();
	
	foreach ($redes as $red){
		$puntos=$this->afiliado->getPuntosTotalesPersonalesIntervalosDeTiempo($id_afiliado,$red->id,$cualquiera,$cualquiera,$fechaInicio,$fechaFin)[0]->total;
		$puntosComisionablesMes=$puntosComisionablesMes+$puntos;
		
	}
	
	if($puntosParaEstarActivo>$puntosComisionablesMes)
		return false;

	return true;
	}
	
	private function getAfiliadosDirectos($id_afiliado){
		$q=$this->db->query('SELECT count(*) as directos FROM users u,afiliar a
		where u.id=a.id_afiliado and a.directo = '.$id_afiliado); 
		$numeroAfiliados=$q->result();
		
		if($numeroAfiliados[0]->directos==null)
			return 0;
		
		return $numeroAfiliados[0]->directos;
		
	}
	
	private function getAfiliadosParaEstarActivo(){
		$q=$this->db->query('SELECT afiliados_directos as directos FROM empresa_multinivel');
		$afiliadosDirectos=$q->result();
		
		if($afiliadosDirectos[0]->directos==null)
			return 0;
		
		return $afiliadosDirectos[0]->directos;
	}
	
	private function getPuntosParaEstarActivo(){
		$q=$this->db->query('SELECT puntos_personales as puntos FROM empresa_multinivel');
		$afiliadosDirectos=$q->result();
	
		if($afiliadosDirectos[0]->puntos==null)
			return 0;
	
		return $afiliadosDirectos[0]->puntos;
	}
	
	private function validarMembresias($id){
		$membresia=1;
		
		if($this->compraObligatoria ($membresia)&&$this->hayTipoDeMercancia ($membresia)){
			if($this->compraDeUsuarioEstaActiva($membresia,$id)){
				// validar Paquetes
				return $this->validarPaqueteInscripcion($id);
			}
			else{
				//Mostrar Membresias
				return 1;
			}
		}else {
			//validarPaquetes
			
			return $this->validarPaqueteInscripcion($id);
		
		}
	}
	
	private function validarPaqueteInscripcion($id){
		$paqueteDeInscripcion=2;
	
		if($this->compraObligatoria ($paqueteDeInscripcion)&&$this->hayTipoDeMercancia ($paqueteDeInscripcion)){
			if($this->compraDeUsuarioEstaActiva($paqueteDeInscripcion,$id)){
					// validar Items
				return $this->validarItems($id);
			}
			else{
				//Mostrar Paquetes
				return 2;
			}
		}else {
			// validar Items
			return $this->validarItems($id);
		}
	}
	
	private function validarItems($id){
		$item=3;
	
		if($this->compraObligatoria ($item)&&$this->hayTipoDeMercancia ($item)){
			if($this->compraDeUsuarioEstaActiva($item,$id)){
				// Acceso
				return 0;
			}
			else{
				//Mostrar Item
				return 3;
			}
		}else {
			// Acceso
			return 0;
		}
	}
	
	
	private function compraObligatoria($id_tipo_mercancia) {
	 
		if($id_tipo_mercancia == 1){
			$q = $this->db->query("SELECT membresia as estado FROM empresa_multinivel;");
		}elseif ($id_tipo_mercancia == 2){
			$q = $this->db->query("SELECT paquete as estado FROM empresa_multinivel;");
		}elseif($id_tipo_mercancia == 3) {
			$q = $this->db->query("SELECT item as estado FROM empresa_multinivel;");
		}else{
			return false;
		}
		$estado=$q->result();
		
		if($estado[0]->estado=='ACT')
			return true;
		
		
		return false;

	}
	
	private function hayTipoDeMercancia($id_tipo_mercancia) {
	
		if($id_tipo_mercancia == 1){
			$q = $this->db->query("SELECT * FROM mercancia where id_tipo_mercancia=5");
		}elseif ($id_tipo_mercancia == 2){
			$q = $this->db->query("SELECT * FROM mercancia where id_tipo_mercancia=4");
		}elseif($id_tipo_mercancia == 3) {
			$q = $this->db->query("SELECT * FROM mercancia where id_tipo_mercancia=1 or id_tipo_mercancia=2 or id_tipo_mercancia=3");
		}else{
			return false;
		}

		$mercancia=$q->result();
		
		if($mercancia)
			return true;

		return false;
	
	}

	
	private function compraDeUsuarioEstaActiva($id_tipo_mercancia,$id) {
	
		$membresia = "SELECT v.id_venta,v.fecha,me.caducidad,DATEDIFF(now(),v.fecha) as dias_activacion
													FROM venta v,cross_venta_mercancia cvm,mercancia m,membresia me
													WHERE v.id_estatus='ACT'
														and v.id_venta=cvm.id_venta
														and m.id=cvm.id_mercancia
														and m.id_tipo_mercancia=5
														and v.id_user='".$id."'
														and m.sku=me.id
														and (DATEDIFF(now(),v.fecha)<=me.caducidad or me.caducidad=0)";
		
		$paquete = "SELECT v.id_venta,v.fecha,pa.caducidad,DATEDIFF(now(),v.fecha)as dias_activacion
													FROM venta v,cross_venta_mercancia cvm,mercancia m,paquete_inscripcion pa
													WHERE v.id_estatus='ACT'
														and v.id_venta=cvm.id_venta
														and m.id=cvm.id_mercancia
														and m.id_tipo_mercancia=4
														and v.id_user='".$id."'
														and m.sku=pa.id_paquete
														and (DATEDIFF(now(),v.fecha)<=pa.caducidad or pa.caducidad=0)";
		
		$item = "SELECT v.id_venta,v.fecha
													FROM venta v,cross_venta_mercancia cvm,mercancia m
													WHERE v.id_estatus='ACT'
														and v.id_venta=cvm.id_venta
														and m.id=cvm.id_mercancia
														and m.id_tipo_mercancia not in (4,5)
														and v.id_user='".$id."'";
		
		$query = array( 
				1 => $membresia,
				2 => $paquete,
				3 => $item 				
		);		
		
		if($id_tipo_mercancia > sizeof($query) || $id_tipo_mercancia <= 0){
			return false;
		}
		
		$q = $this->db->query($query[$id_tipo_mercancia]);
		
		$activacion=$q->result();
	
		if($activacion)
			return true;
	
		return false;
	
	}
	
	function get_username($id)
	{
		$q=$this->db->query('select * from user_profiles where user_id = "'.$id.'"');
		return $q->result();
	}
	function get_style($id)
	{
	  	$q=$this->db->query('select * from estilo_usuario where id_usuario = '.$id);
	 	return $q->result();
	}

	function get_email($id)
	{
		$q=$this->db->query('select email from users where id = '.$id);
		return $q->result();
	}
	
	function get_pais($id)
	{
		$q=$this->db->query("select cu.pais as pais,c.Name as nombrePais,c.Code2 as codigo,concat(cu.calle,' ',cu.colonia,' ',cu.municipio,' ',cu.estado)as direccion
								,cu.cp as codigo_postal,cu.estado as estado,cu.municipio as municipio,cu.colonia as colonia,cu.calle as calle
								from cross_dir_user cu,Country c
								where c.Code=cu.pais and cu.id_user = ".$id."");
		return $q->result();
	}
	
	function username($id)
	{
		$q=$this->db->query('select username from users where id = '.$id);
		return $q->result();
	}
	function emailPagos()
	{
		$q=$this->db->query(' SELECT email FROM emails_departamentos LIMIT 0 , 1');
		return $q->result();
	}
	
	function setArrayVarchar($array){ 
		$ArrayVarchar = array();
		foreach ($array as $key){
			if(!preg_match('/^[0-9]{1,}$/', $key)){
				$key = '\''.$key.'\'';
			}
			array_push($ArrayVarchar, $key);
		}
		return implode(',',$ArrayVarchar);
	}
	
}
