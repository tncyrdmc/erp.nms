<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_afiliado extends CI_Model{

	function __construct() {
		parent::__construct();

		$this->load->library('tank_auth');
		$this->load->model('ov/general');
	}
	
	private function EstiloUsuario($id){
		
		$estilo = $this->getEstiloUsuario();
		
		$dato_style=array(
				/*"id_usuario"		=> */$id,
				/*"bg_color"			=> */$estilo[0]->bg_color,
				/*"btn_1_color"		=> */$estilo[0]->btn_1_color,
				/*"btn_2_color"		=> */$estilo[0]->btn_2_color
		);
		#$this->db->insert("estilo_usuario",$dato_style);
		return $dato_style;
	}
	
	function getEstiloUsuario() {
		
		$q = $this->db->query("SELECT * FROM estilo_usuario where id_usuario = 1");		
		return $q->result();
	}

	
	private function Perfil($id){ #CrearPerfil
		$_POST['tipo_afiliado'] = 2;
		
		if(!isset($_POST['tipo_plan']))
			$_POST['tipo_plan'] = 1;
		
		if(!isset($_POST['fiscal'])){
			$_POST['fiscal']=1;
		}
		#$profile = array();
		
		$dato_profile = array(
			/*"user_id"            => */$id,
			/*"id_sexo"            => */$_POST['sexo'],
			/*"id_edo_civil"       => */$_POST['civil'],
			/*"id_tipo_usuario"    => */$_POST['tipo_afiliado'],
			/*"id_estudio"         => */$_POST['estudios'],
			/*"id_ocupacion"       => */$_POST['ocupacion'],
			/*"id_tiempo_dedicado" => */$_POST['tiempo_dedicado'],
			/*'id_estatus'         => */1,
			/*"id_fiscal"       	 => */$_POST['fiscal'],
			/*"keyword"            => */$_POST['keyword'],
			/*"paquete"			 => $_POST['tipo_plan']*/0,
			/*"nombre"             => */$_POST['nombre'],
			/*"apellido"           => */$_POST['apellido'],
			/*"fecha_nacimiento"   => */$_POST['nacimiento']
			);
		#array_push($profile, $dato_profile);
		#$this->db->insert("user_profiles",$dato_profile);
		
		#$perfil=2;
		/*if($_POST['tipo_plan']==0){
			$perfil=3;
// 		}*/
		return $dato_profile;
	}
		
		
	private function Permiso($id){ #CrearPerfil
		$dato_permiso=array(
			/*"id_user"   => */$id,
			/*"id_perfil" => */2//$perfil
			);
		#$this->db->insert("cross_perfil_usuario",$dato_permiso);
		#array_push($profile, $dato_permiso);
		return $dato_permiso;
	}
	
	private function Coaplicante($id){ #CrearCoaplicante
		if(isset($_POST['nombre_co'])){

			$dato_coaplicante=array(
				/*"id_user"   => */$id,
				/*"nombre" => */$_POST['nombre_co'],
				/*"apellido"   => */$_POST['apellido_co'],
				/*"keyword"   => */$_POST['keyword_co']
				);
			#$this->db->insert("coaplicante",$dato_coaplicante);
			return $dato_coaplicante;
			
		}		
	}
	
	function afiliar_procedure(
				$id,
				$dato_perfil,
				$dato_afiliar,
				$dato_estilo,
				$dato_coaplicante,
				#$dato_red,
				#$dato_tels,
				$dato_dir,
				$dato_billetera,
				$dato_rango,
				$dato_img
			){
		
		
		$dato_perfil = $this->general->setArrayVarchar($dato_perfil);	
		$dato_afiliar = $this->general->setArrayVarchar($dato_afiliar);
		$dato_estilo = $this->general->setArrayVarchar($dato_estilo);
		$dato_coaplicante = $this->general->setArrayVarchar($dato_coaplicante);
		#$dato_tels = $this->general->setArrayVarchar($dato_tels);
		$dato_dir = $this->general->setArrayVarchar($dato_dir);
		$dato_billetera = $this->general->setArrayVarchar($dato_billetera);
		$dato_rango = $this->general->setArrayVarchar($dato_rango);
		$dato_img = $this->general->setArrayVarchar($dato_img);
		
				
		$query = $this->db->query('CALL afiliar('.$id.',"'.$dato_perfil.'","'.$dato_afiliar.'","'.
				$dato_estilo.'","'.$dato_coaplicante./*'","'.$dato_tels.*/'","'.
				$dato_dir.'","'.$dato_billetera.'","'.$dato_rango.'","'.$dato_img.'")');
		

		$res = $query->result();
		
		//$query->next_result(); // Dump the extra resultset.
		//$query->free_result(); //Does what it says.
		
		return  true;# '1|'.$dato_perfil.'2|'.$dato_afiliar.'3|'.
				# $dato_estilo.'4|'.$dato_coaplicante.'5|'./*$dato_tels.'6|'.*/
				# $dato_dir.'7|'.$dato_billetera.'8|'.$dato_rango.'9|'.$dato_img;#$q->result();
	}
	
	function crearUsuario(){	
		
		$id = $this->obtenrIdUser($_POST['mail_important']);
		
		if (!$id){
			return false;
		}
		
		$mi_red=$_POST['red'];		
		$id_debajo = $this->definir_debajo ();				
		$lado = $this->definir_lado ($id_debajo,$mi_red);		
		$directo = $this->definir_sponsor ($id_debajo);
		
		$fijos = $_POST["fijo"];
		$moviles = $_POST["movil"];
		
		/*echo "red : ".$mi_red
		." 	afiliado: ".$_POST['mail_important']
		."	padre: ".$id_debajo
		."	sponsor: ".$directo
		."	lado: ".$lado;
		
		return true;*/				
		
		$existe_perfil = $this->perfil_existe($id);
		if($existe_perfil){
			return true;
		}
		
		($fijos&&$moviles) ? $this->insert_dato_tels($id,$fijos,$moviles) : '' ; 
		
		$dato_perfil=$this->Perfil($id); # USER_PROFILES
		$dato_afiliar=$this->dato_afiliar ( $id, $mi_red, $id_debajo, $lado, $directo ); # AFILIAR 
		//$dato_permiso=$this->Perfil($id); # USER_PERMISSIONS
		$dato_estilo=$this->EstiloUsuario($id);	# ESTILO_USUARIO
		$dato_coaplicante=$this->Coaplicante($id);# COAPLICANTE
		#$dato_red=$this->dato_red ( $id );# RED	#!DEPRECATED			
		$dato_dir=$this->dato_dir ( $id );# DIRECCION
		$dato_billetera=$this->dato_billetera ( $id ); # BILLETERA 				
		$dato_rango=$this->dato_rango ( $id ); # RANGO 				
		$dato_img=$this->dato_img ( $id ); # IMAGEN 
		
		$afiliar = $this->afiliar_procedure(
			$id,
			$dato_perfil,
			$dato_afiliar,
			$dato_estilo,
			$dato_coaplicante,
			#$dato_red,
			#$dato_tels,
			$dato_dir,
			$dato_billetera,
			$dato_rango,
			$dato_img
		);	
		
		
		# TELEFONOS $dato_tels dato_tels($id)
		
		return $afiliar ? $id /*var_dump()."|".var_dump($_POST["movil"])*/ : null;#; #;
	}
	
	private function dato_img($id) { #insert_dato_img
		
		$dato_img=array(
				/*"url"		=> */"/template/img/empresario.jpg",
				/*"nombre_completo"		=> */"empresario.jpg",
				/*"nombre"		=> */"empresario",
				/*"extencion"		=> */"jpg",
				/*"estatus"		=> */"ACT"
		#);
		
		#$this->db->insert("cat_img",$dato_rango);
		#$id_img = $this->db->insert_id();
		
		#$dato_rango=array(
				#"id_user"	=> $id,
				#"id_img"	=> $id_img
		);
		#$this->db->insert("cross_img_user",$dato_rango);
		return $dato_img;#true;
		#echo "img si|";
	}

	
	private function dato_rango($id) { #insert_dato_rango
		$dato_rango=array(
			/*"id_user"	=> */$id,
			/*"id_rango"		=> */1,
			/*"entregado"		=> */1,
			/*"estatus"		=> */"ACT"
			);
		
		#$this->db->insert("cross_rango_user",$dato_rango);
		return $dato_rango;#true;
		#echo "rango si|";
	}

	
	private function dato_billetera($id) { #insert_dato_billetera
		
		$dato_billetera=array(
			/*"id_user"	=> */$id,
			/*"estatus"		=> */"DES",
			/*"activo"		=> */"No"
			);
		#$this->db->insert("billetera",$dato_billetera);
		return $dato_billetera;#true;
		#echo "bill si|";
	}

	

	private function dato_dir($id) {#insert_dato_dir
		
		$dato_dir=array(
			/*"id_user"   => */$id,
			/*"cp"        => */$_POST['cp'],
			/*"calle"     => */$_POST['calle'],
			/*"colonia"   => */$_POST['colonia'],
			/*"municipio" => */$_POST['municipio'],
			/*"estado"    => */$_POST['estado'],
			/*"pais"      => */$_POST['pais']
			);
		#$this->db->insert("cross_dir_user",$dato_dir);
		return $dato_dir;#true;
		#echo "dir si|";
	}

	
	private function insert_dato_tels($id,$fijos,$moviles) { #dato_tels
		
		//tipo_tel 1=fijo 2=movil
		#$dato_tels =array();
		#if(isset($_POST["fijo"])){
			foreach ($fijos as $fijo){
				$dato_tel=array(
					"id_user"		=> $id,
					"id_tipo_tel"	=> 1,
					"numero"		=> $fijo ? $fijo : "",
					"estatus"		=> "ACT"
					);
				#array_push($dato_tels, $dato_tel);
				$this->db->insert("cross_tel_user",$dato_tel);
			}
		#}
		
		#if(isset($_POST["movil"])){
			foreach ($moviles as $movil){
				$dato_tel=array(
					"id_user"		=> $id,
					"id_tipo_tel"	=> 2,
					"numero"		=> $movil ? $movil : "",
					"estatus"		=> "ACT"
					);
				#array_push($dato_tels, $dato_tel);
				$this->db->insert("cross_tel_user",$dato_tel);
			}
		#}
		
		return true;#$dato_tels;
		#echo "tels si|";
	}

	
	private function dato_afiliar($id, $mi_red, $id_debajo, $lado, $directo) { #insert_dato_afiliar
		$dato_afiliar =array(
			/*"id_red"      => */$mi_red,
			/*"id_afiliado" => */$id,
			/*"debajo_de"   => */$id_debajo,
			/*"directo"     => */$directo,
			/*"lado"        => */$lado
			);
		
		//var_dump($dato_afiliar); exit;
 		#$this->db->insert("afiliar",$dato_afiliar); 		
 		return $dato_afiliar;#true;
 		#echo "afiliar si|";
	}

	private function insert_dato_afiliar($id, $mi_red, $id_debajo, $lado, $directo) { #insert_dato_afiliar
		$dato_afiliar =array(
			"id_red"      => $mi_red,
			"id_afiliado" => $id,
			"debajo_de"   => $id_debajo,
			"directo"     => $directo,
			"lado"        => $lado
			);
		
		//var_dump($dato_afiliar); exit;
 		$this->db->insert("afiliar",$dato_afiliar); 		
 		return true;
 		#echo "afiliar si|";
	}
	
	private function definir_sponsor($id_debajo) {
		if(isset($_POST['sponsor']))
		{
			$directo=intval($this->tank_auth->get_user_id());
			return ($directo==1) ? 2 : $directo;
		}else{
			return intval(isset($_POST['directo']) ? $_POST['directo'] : $id_debajo);
		}
		echo "sponsor si|";
	}
	
	private function definir_lado($id_debajo,$mi_red) {
		
		if(isset($_POST['lado'])){
			return $_POST['lado'];
		}else {
			return $this->consultarFrontalDisponible($id_debajo, $mi_red);
		}
		echo "lado si|";
	}
	
	private function dato_red($id) { #insert_dato_red
		
		$redes = $this->db->get('tipo_red');
		$redes = $redes->result();
		$dato_red = array();
		foreach ($redes as $red){
			$dato=array(
					/*'id_red'        => */$red->id,
					/*"id_usuario"	=> */$id,
					/*"profundidad"	=> */"0",
					/*"estatus"		=> */"ACT",
					/*"premium"		=> */'2'
			);
			array_push($dato_red, $dato);
			#$this->db->insert("red",$dato_red);
		}		
		return $dato_red;#true;
		#echo "red si|";
	}

	
	private function activar_user($id) {
		$this->db->query('update users set activated="1" where id="'.$id.'"');
		echo "activar si|";
	}
	
	private function perfil_existe($id) {
		$q = $this->db->query("select * from user_profiles where user_id=".$id);
		$perfil = $q->result();
		return ($perfil) ? $perfil[0]->user_id : null;
		echo "perfil si|";
	}

	private function definir_debajo(){
		$d=intval($this->tank_auth->get_user_id());
		$d = ($d==1) ? 2 : $d;
		if(isset($_POST['afiliados']))
		{
			return $_POST['afiliados'];
		}else{
			return intval(isset($_POST['id']) ? $_POST['id'] : $d);
		}
		echo "debajo si|";
	}

	
	function obtenrIdUser($email){
	    
	    $lastId = $this->obtenrIdLastUser();
	    
	    $q= $this->db->query("SELECT
                                    id
                                FROM
                                    users
                                WHERE
                                    email LIKE '$email'
                                        AND id NOT IN
                                        (SELECT user_id FROM user_profiles)");
	    $q = $q->result();
	    
	    if(!$q)
	        return $lastId;
	        
	        foreach ($q as $dato){
	            $id_dato = $dato->id;
	            if($id_dato>0)
	                return $id_dato;
	        }
	        
	        return $lastId;
	}
	
	function obtenrIdLastUser(){
	    $q= $this->db->query("SELECT
                                    id
                                FROM
                                    users
                                WHERE
                                    id NOT IN
                                        (SELECT user_id FROM user_profiles)");
	    $q = $q->result();
	    
	    if(!$q)
	        return false;
	        
	        return $q[0]->id;
	}
	
	function obtenrIdUsername($username){
		$id_afiliador= $this->db->query('select id from users where username like "'.$username.'"');
	
		$id_afiliador = $id_afiliador->result();
		return $id_afiliador[0]->id;
	}
	
	function obtenrIdUserby($usuario){
		$id_afiliador= $this->db->query('select id from users where username ="'.$usuario.'"');
		$id_afiliador = $id_afiliador->result();
		return $id_afiliador[0]->id;
	}

	function consultarFrontalDisponible($id_debajo, $red){
		
		$query = $this->db->query('select * from afiliar where debajo_de = '.$id_debajo.' and id_red = '.$red.' order by lado');
		
		$lados = $query->result();
		$lado_disponible=0;
		
		if(isset($lados[0]->id)){
			$aux=0;
			foreach ($lados as $filaLado){
				if($filaLado->lado!=$aux){
					$lado_disponible = $aux;
					return $lado_disponible;
				}
			$aux++;
			$lado_disponible++;
			}
		}
		return $lado_disponible;
	}
	
	function ObtenerRetencioFase(){
		$q = $this->db->query("select porcentaje from cat_retencion where duracion= 'UNI'");
		$retencion = $q->result();
		return $retencion[0]->porcentaje;
	}
	
	function CambiarFase($id, $red, $fase){
		if($id == 0 || $id == null){
			return false;
		}
		if($fase == '2'){
			$mes = date('m');
			$año = date('Y');
			$valor = $this->ObtenerRetencioFase();
			$datos = array(
					'descripcion' => 'Cambio Fase a B',
					'valor'       => $valor,
					'mes'		  =>$mes,
					'ano'		  => $año,
					'id_afiliado' => $id
			);
			$this->db->insert('cat_retenciones_historial', $datos);
			
		}
		
		$query = $this->db->query('select * from red where id_usuario = '.$id.' and id_red = '.$red.' ');
		
		$red = $query->result();
		
		if($red[0]->premium == 0){
			$this->db->query("update red set premium = '".$fase."' where id_red =".$red[0]->id_red." and id_usuario=".$id);
			return true;
		}
		
			
	}
	
	function crearUsuarioAdmin($id_debajo){
	
		$id = $this->obtenrIdUser($_POST['mail_important']);
		
		$this->db->query('update users set activated="1" where id="'.$id.'"');
		$this->EstiloUsuaio($id);
		$directo=1;
		$q = $this->db->query("select * from user_profiles where user_id=".$id);
		$perfil = $q->result();
		if(isset($perfil[0]->user_id)){
			return true;
		}else
			$this->CrearPerfil($id);
	
		$this->CrearCoaplicante($id);
	
		$mi_red=$_POST['red'];
		
		/*################### DATO RED #########################*/
	
		$redes = $this->db->get('tipo_red');
		$redes = $redes->result();
		foreach ($redes as $red){
			$dato_red=array(
					'id_red'        => $red->id,
					"id_usuario"	=> $id,
					"profundidad"	=> "0",
					"estatus"		=> "ACT",
					"premium"			=> '2'
			);
			$this->db->insert("red",$dato_red);
		}
	
		/*################### FIN DATO RED #########################*/
	
		/*################### DATO AFILIAR #########################*/
	
		$directo = 1;
		if(isset($_POST['sponsor']))
		{
			$directo = 0;
		}
		
		$lado = $this->consultarFrontalDisponible($id_debajo, $mi_red);
		
		$dato_afiliar=array(
				"id_red"      => $mi_red,
				"id_afiliado" => $id,
				"debajo_de"   => $id_debajo,
				"directo"     => $directo,
				"lado"        => $lado
		);
	
		
		$this->db->insert("afiliar",$dato_afiliar);
			
			
		/*################### DATO TELEFONOS #########################*/
		//tipo_tel 1=fijo 2=movil
		if($_POST["fijo"])
		{
			foreach ($_POST["fijo"] as $fijo)
			{
				$dato_tel=array(
						"id_user"		=> $id,
						"id_tipo_tel"	=> 1,
						"numero"		=> $fijo,
						"estatus"		=> "ACT"
				);
	
				$this->db->insert("cross_tel_user",$dato_tel);
			}
	
		}
		if($_POST["movil"])
		{
			foreach ($_POST["movil"] as $movil)
			{
				$dato_tel=array(
						"id_user"		=> $id,
						"id_tipo_tel"	=> 2,
						"numero"		=> $movil,
						"estatus"		=> "ACT"
				);
				$this->db->insert("cross_tel_user",$dato_tel);
			}
		}
	
		/*################### FIN DATO TELEFONOS #########################*/
		/*################### DATO DIRECCION #########################*/
		$dato_dir=array(
				"id_user"   => $id,
				"cp"        => $_POST['cp'],
				"calle"     => $_POST['calle'],
				"colonia"   => $_POST['colonia'],
				"municipio" => $_POST['municipio'],
				"estado"    => $_POST['estado'],
				"pais"      =>$_POST['pais']
		);
		$this->db->insert("cross_dir_user",$dato_dir);
		/*################### FIN DATO DIRECCION #########################*/
	
		/*################### DATO BILLETERA #########################*/
		$dato_billetera=array(
				"id_user"	=> $id,
				"estatus"		=> "DES",
				"activo"		=> "No"
		);
		$this->db->insert("billetera",$dato_billetera);
		/*################### FIN DATO BILLETERA #########################*/
	
		/*################### FIN DATO COBRO #########################*/
		$plan = 1;
		if(!isset($_POST['tipo_plan'])){
			$plan = $_POST['tipo_plan'];
		}
		$query = $this->db->query("select * from paquete_inscripcion where id_paquete=".$plan);
		$plan = $query->result();
		
		
	
		/*################### DATO RANGO #########################*/
		$dato_rango=array(
				"id_user"	=> $id,
				"id_rango"		=> 1,
				"entregado"		=> 1,
				"estatus"		=> "ACT"
		);
		$this->db->insert("cross_rango_user",$dato_rango);
		/*################### FIN DATO RANGO #########################*/
		$dato_rango=array(
				"url"		=> "/template/img/empresario.jpg",
				"nombre_completo"		=> "empresario.jpg",
				"nombre"		=> "empresario",
				"extencion"		=> "jpg",
				"estatus"		=> "ACT"
		);
		$this->db->insert("cat_img",$dato_rango);
		$id_img = $this->db->insert_id();
		$dato_rango=array(
				"id_user"	=> $id,
				"id_img"	=> $id_img
		);
		$this->db->insert("cross_img_user",$dato_rango);
		return true;
	}
	
	function crearUsuarioProveedor($id_debajo){
	
		$id = $this->obtenrIdUser($_POST['mail_important']);
		
		$this->db->query('update users set activated="1" where id="'.$id.'"');
		$this->EstiloUsuaio($id);
		$directo=1;
		
		$this->CrearPerfil($id);
	
		$this->CrearCoaplicante($id);
	
		$mi_red=$_POST['red'];
		
		/*################### DATO RED #########################*/
	
		$redes = $this->db->get('tipo_red');
		$redes = $redes->result();
		foreach ($redes as $red){
			$dato_red=array(
					'id_red'        => $red->id,
					"id_usuario"	=> $id,
					"profundidad"	=> "0",
					"estatus"		=> "ACT",
					"premium"			=> '2'
			);
			$this->db->insert("red",$dato_red);
		}
	
		/*################### FIN DATO RED #########################*/
	
		/*################### DATO AFILIAR #########################*/
	
		$directo = 1;
		if(isset($_POST['sponsor']))
		{
			$directo = 0;
		}
		
		$lado = $this->consultarFrontalDisponible($id_debajo, $mi_red);
		
		$dato_afiliar=array(
				"id_red"      => $mi_red,
				"id_afiliado" => $id,
				"debajo_de"   => $id_debajo,
				"directo"     => $directo,
				"lado"        => $lado
		);
	
		
		$this->db->insert("afiliar",$dato_afiliar);
			
			
		/*################### DATO TELEFONOS #########################*/
		//tipo_tel 1=fijo 2=movil
		if($_POST["fijo"])
		{
			foreach ($_POST["fijo"] as $fijo)
			{
				$dato_tel=array(
						"id_user"		=> $id,
						"id_tipo_tel"	=> 1,
						"numero"		=> $fijo,
						"estatus"		=> "ACT"
				);
	
				$this->db->insert("cross_tel_user",$dato_tel);
			}
	
		}
		if($_POST["movil"])
		{
			foreach ($_POST["movil"] as $movil)
			{
				$dato_tel=array(
						"id_user"		=> $id,
						"id_tipo_tel"	=> 2,
						"numero"		=> $movil,
						"estatus"		=> "ACT"
				);
				$this->db->insert("cross_tel_user",$dato_tel);
			}
		}
	
		/*################### FIN DATO TELEFONOS #########################*/
		/*################### DATO DIRECCION #########################*/
		$dato_dir=array(
				"id_user"   => $id,
				"cp"        => $_POST['cp'],
				"calle"     => $_POST['calle'],
				"colonia"   => $_POST['colonia'],
				"municipio" => $_POST['municipio'],
				"estado"    => $_POST['estado'],
				"pais"      =>$_POST['pais']
		);
		$this->db->insert("cross_dir_user",$dato_dir);
		/*################### FIN DATO DIRECCION #########################*/
	
		/*################### DATO BILLETERA #########################*/
		$dato_billetera=array(
				"id_user"	=> $id,
				"estatus"		=> "DES",
				"activo"		=> "No"
		);
		$this->db->insert("billetera",$dato_billetera);
		/*################### FIN DATO BILLETERA #########################*/
	
 	
 		/*################### DATO RANGO #########################*/
 		$dato_rango=array(
 				"id_user"	=> $id,
 				"id_rango"		=> 1,
 				"entregado"		=> 1,
 				"estatus"		=> "ACT"
 		);
 		$this->db->insert("cross_rango_user",$dato_rango);
 		/*################### FIN DATO RANGO #########################*/
 		
 		return true;
 	}

	function RedAfiliado($id, $red){
		$query = $this->db->query('select * from afiliar where id_red = "'.$red.'" and id_afiliado = "'.$id.'" ');
		return $query->result();
	}
	
	function ComprasUsuario($id){
		$q = $this->db->query("SELECT sum(cvm.costo_unidad*cvm.cantidad) as compras 
								FROM cross_venta_mercancia cvm , venta v
								where v.id_user=".$id."
								and cvm.id_venta=v.id_venta
								and v.id_estatus='ACT'");
		$costos = $q->result();
		return $costos[0]->compras;
	}
	
	function PuntosUsuario($id){
		$q = $this->db->query("SELECT sum(c.puntos) as puntos FROM comision c, venta v where c.id_venta = v.id_venta and v.id_user = ".$id.";");
		$puntos = $q->result();
		return $puntos[0]->puntos;
	}
	
	function ComisionUsuario($id){
		$q = $this->db->query("SELECT sum(valor) as comision FROM comision where id_afiliado = ".$id.";");
		$comision = $q->result();
		return $comision[0]->comision;
	}
	
	function AgregarAfiliadoRed($id_debajo, $red, $usuario){
		$mi_red= $red;
		$id = $this->obtenrIdUserby($usuario);

		if(!$id){
			echo "No se pudo hacer la afiliacion.";
			return false;
		}

		$lado = 1;
		if(!isset($_POST['lado']))
			$lado = $this->consultarFrontalDisponible($id_debajo, $mi_red);
		else{
			$lado = $_POST['lado'];
		}
		
		$dato_afiliar =array(
				"id_red"      => $mi_red,
				"id_afiliado" => $id,
				"debajo_de"   => $id_debajo,
				"directo"     => $this->tank_auth->get_user_id(),
				"lado"        => $lado
		);
		$this->db->insert("afiliar",$dato_afiliar);
		
		$q = $this->db->query("select estatus from red where id_red = ".$mi_red." and id_usuario = ".$id);
		$red = $q->result();
		
		if(isset($red[0]->estatus)){
			$this->db->query("update red set estatus = 'ACT' where id_red = ".$mi_red." and id_usuario = ".$id);
		}else{
			$dato_red=array(
					'id_red'        => $mi_red,
					"id_usuario"	=> $id,
					"profundidad"	=> "0",
					"estatus"		=> "ACT",
					"premium"			=> '2'
			);
			$this->db->insert("red",$dato_red);
		}
		return true;
	}
	
	function ConprobarUsuario($username,$email,$red, $id){
		$q = $this->db->query("select id_afiliado from afiliar where id_afiliado = ".$id." and id_red = ".$red);
		$padre = $q->result();
		
		if(isset($padre[0]->id_afiliado)){
			$q = $this->db->query("select id from users where username = '".$username."' and email = '".$email."'");
			$afiliado = $q->result();
			
			if(isset($afiliado[0]->id)){
				$q = $this->db->query("select id_red from afiliar where id_afiliado = ".$afiliado[0]->id." and id_red = ".$red);
				$afiliado1 = $q->result();
				if(!isset($afiliado1[0]->id_red)){
					return true;
				}else{
					echo "<div id='msg_usuario' class='alert alert-danger fade in'>
							 UPS¡ lo sentimos, los datos ingresados pertenecen a un afiliado que ya pertenece a esta red
						</div>";
					return false;
				}
			}else{
				echo "<div id='msg_usuario' class='alert alert-danger fade in'>
						!UPS¡ lo sentimos, los datos ingresados no pertenecen al afiliado, comprueba que el email y username esten correctos
					</div>";
				return false;
			}
		}else{
			echo "<div id='msg_usuario' class='alert alert-danger fade in'>
					!UPS¡ lo sentimos, no podemos afiliar al usuario a esta red
				</div>";
			return false;
		}
	}
}
