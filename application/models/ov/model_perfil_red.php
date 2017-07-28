<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_perfil_red extends CI_Model
{
	
	function __construct() {
		parent::__construct();
	
		$this->load->model('ov/model_afiliado');
	}
	
	
	function datos_perfil($id)
	{
		$q=$this->db->query('SELECT 
							    `profile`.keyword keyword,
							    (select 
							            email
							        from
							            users
							        where
							            id = `profile`.user_id) email,
							    `profile`.id_edo_civil,
							    `profile`.user_id,
							    `profile`.nombre nombre,
							    `profile`.apellido apellido,
							    `profile`.fecha_nacimiento nacimiento,
							    `profile`.id_estudio id_estudio,
							    `profile`.id_ocupacion id_ocupacion,
							    `profile`.id_tiempo_dedicado id_tiempo_dedicado,
							    `profile`.id_fiscal id_fiscal,
							    sexo.descripcion sexo,
							    edo_civil.descripcion edo_civil,
							    estilos.bg_color,
							    estilos.btn_1_color,
							    estilos.btn_2_color
							from
							    user_profiles `profile`
							        left join
							    cat_sexo sexo ON `profile`.id_sexo = sexo.id_sexo
							        left join
							    estilo_usuario estilos ON `profile`.user_id = estilos.id_usuario
							        left join
							    cat_edo_civil edo_civil ON `profile`.id_edo_civil = edo_civil.id_edo_civil
							where
							    `profile`.user_id = '.$id);
		return $q->result();
	}
	function tipo_fiscal()
	{
		$q=$this->db->query('select * from cat_usuario_fiscal');
		return $q->result();
	}
	function get_images($id)
	{
		$q=$this->db->query('select (select nombre_completo from cat_img b where a.id_img=b.id_img) img, (select url from cat_img b where a.id_img=b.id_img) url from cross_img_user a where id_user = '.$id);
		return $q->result();
	}
	function get_images_users()
	{
		$q=$this->db->query('select id_user,(select nombre_completo from cat_img b where a.id_img=b.id_img) img, (select url from cat_img b where a.id_img=b.id_img) url from cross_img_user a');
		return $q->result();
	}
	function get_estudios()
	{
		$q=$this->db->query('select * from cat_estudios');
		return $q->result();
	}
	function get_ocupacion()
	{
		$q=$this->db->query('select * from cat_ocupacion');
		return $q->result();
	}
	function get_tiempo_dedicado()
	{
		$q=$this->db->query('select * from cat_tiempo_dedicado');
		return $q->result();
	}
	function get_id()
	{
		$q=$this->db->query('select id from users where email like "'.$_POST['mail_important'].'"');
		return $q->result();
	}
	
	function get_id_by_username($username)
	{
		$q=$this->db->query('select id from users where username = "'.$username.'"');
		return $q->result();
	}
	
	function get_name($id)
	{
		$q=$this->db->query('select nombre, apellido from user_profiles where user_id='.$id);
		return $q->result();
	}
	
	function get_sponsor_id($id,$id_red)
	{
		$q=$this->db->query('SELECT directo FROM afiliar where id_afiliado='.$id.' and id_red='.$id_red);
		return $q->result();
	}
	
	function get_email($id)
	{
		$q=$this->db->query('select email from users where id='.$id);
		$q2 = $q->result();
		return $q2[0]->email;
	}
	
	function get_username($id)
	{
		$q=$this->db->query('select username from users where id='.$id);
		$q2 = $q->result();
		return $q2[0]->username;
	}
	
	function get_nombres($id)
	{
		$q=$this->db->query('select nombre, apellido from user_profiles where user_id='.$id);
		$q2 = $q->result();
		return $q2[0]->nombre." ".$q2[0]->apellido;
	}
	function afiliar_nuevo($id)
	{

		$id_afiliador= $this->db->query('select id from users where email like "'.$_POST['mail_important'].'"');

		$id_afiliador = $id_afiliador->result();
		
		
			if($id_afiliador[0]->id)
				$id_nuevo=$id_afiliador[0]->id;
			else
				$id_nuevo=$id_afiliador->id;
		
		$existe_mail=$this->db->query('select id from user_profiles where id='.$id_nuevo);
		$existe_mail=$existe_mail->result();
		
		
		if($existe_mail == null)
		{
			
			$directo=0;
			
			if(!isset($_POST['afiliados']))
			{
				$_POST['afiliados']=$id;
				$directo=1;
			}
			
			$this->model_afiliado->EstiloUsuaio($id_nuevo);

			if(!isset($_POST['tipo_afiliado']))
			{
				$_POST['tipo_afiliado']=2;
			}

			/*################ PERFIL DEL USUARIO #########################*/
			if(!isset($_POST['tipo_plan']))
				$_POST['tipo_plan']=0;

			($_POST['tipo_plan']==0) ? $estatus=3 : $estatus=1;

			$dato_profile=array(
						"user_id"            => $id_nuevo,
						"id_sexo"            => $_POST['sexo'],
						"id_edo_civil"       => $_POST['civil'],
						"id_tipo_usuario"    => $_POST['tipo_afiliado'],
						"nombre"             => $_POST['nombre'],
						"apellido"           => $_POST['apellido'],
						"fecha_nacimiento"   => $_POST['nacimiento'],
						"id_estudio"         => $_POST['estudios'],
						"id_ocupacion"       => $_POST['ocupacion'],
						"id_fiscal"       	 => $_POST['fiscal'],
						"id_tiempo_dedicado" => $_POST['tiempo_dedicado'],
						"paquete"			 => $_POST['tipo_plan'],
						"keyword"            => $_POST['keyword'],
						'id_estatus'         => $estatus

		            );
			$this->db->insert("user_profiles",$dato_profile);
			/*############# FIN PERFIL DEL USUARIO #########################*/

			/*################### DATO PERMISO #########################*/
			($_POST['tipo_plan']==0) ? $perfil=3 : $perfil=2;
			$dato_permiso=array(
						"id_user"   => $id_nuevo,
						"id_perfil" => $perfil
		            );
		    $this->db->insert("cross_perfil_usuario",$dato_permiso);
		    /*################### FIN DATO PERMISO #########################*/

		    /*################### DATO COPALICANTE #########################*/
			$dato_coaplicante=array(
						"id_user"   => $id_nuevo,
						"nombre" => $_POST['nombre_co'],
						"apellido"   => $_POST['apellido_co'],
						"keyword"   => $_POST['keyword_co']
		            );
		    $this->db->insert("coaplicante",$dato_coaplicante);
		    /*################### FIN DATO COPALICANTE #########################*/

			/*################### DATO RED #########################*/
			$dato_red=array(
						'id_red'        => $_GET['id'],
		                "id_usuario"	=> $id_nuevo,
		                "profundidad"	=> "0",
		                "estatus"		=> "ACT"
		            );
		    $this->db->insert("red",$dato_red);
		    /*################### FIN DATO RED #########################*/

		     /*################### DATO AFILIAR #########################*/
		    $mi_red=$_GET['id'];

		    if(isset($_POST['sponsor']))
		    {
		    	$directo=$_POST['sponsor'];
		    }else{
		    	$directo=$_POST['afiliados'];
		    }
		    
		    if(!isset($_POST['lado']))
		    	$lado=0;
		    else
		    	$lado=$_POST['lado'];

			$dato_afiliar=array(
						"id_red"      => $mi_red,
						"id_afiliado" => $id_nuevo,
						"debajo_de"   => $_POST['afiliados'],
						"directo"     => $directo,
						"lado"        => $lado
		            );
			$this->db->insert("afiliar",$dato_afiliar);

			$ids=array();
			$id_=$id;
			for($i=0;$i<=99999990;$i++)
			{
				if($i>0)
					$id_=$ids[$i-1];
				$query=$this->db->query('select id_red from afiliar where id_afiliado='.$id_);
				$query=$query->result();
				if(isset($query[0]->id_red))
				{
					foreach ($query as $key)
					$ids[]=$key->id_red;
				}

				else
					$i=99999991;

			}
		    foreach ($ids as $key)
		    {
		    	$query2=$this->db->query('select * from afiliar where debajo_de='.$id.' and id_red='.$key.' and id_afiliado='.$id_nuevo);
		    	$query2=$query2->result();
		    	if($query2)
				{
				}
				else
				{
					$dato_afiliar=array(
						"id_red"		=> $key,
		                "id_afiliado"	=> $id_nuevo,
		                "debajo_de"		=> $id,
		                "directo"		=> 0,
		                "lado"        => $lado
		            );
					$this->db->insert("afiliar",$dato_afiliar);
				}
			}

		    /*################### FIN DATO AFILIAR #########################*/

		    /*################### DATO TELEFONOS #########################*/
			//tipo_tel 1=fijo 2=movil
			if($_POST["fijo"])
			{
				foreach ($_POST["fijo"] as $fijo)
				{
					$dato_tel=array(
		                "id_user"		=> $id_nuevo,
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
			            "id_user"		=> $id_nuevo,
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
					"id_user"   => $id_nuevo,
					"cp"        => $_POST['cp'],
					"calle"     => $_POST['calle'],
					"colonia"   => $_POST['colonia'],
					"municipio" => $_POST['municipio'],
					"estado"    => $_POST['municipio'],
					"pais"      =>$_POST['pais']
	            );
	            $this->db->insert("cross_dir_user",$dato_dir);
	        /*################### FIN DATO DIRECCION #########################*/

	        /*################### DATO BILLETERA #########################*/
	            $dato_billetera=array(
		                "id_user"	=> $id_nuevo,
		                "estatus"		=> "DES",
		                "activo"		=> "No"
		            );
		    $this->db->insert("billetera",$dato_billetera);
		    /*################### FIN DATO BILLETERA #########################*/

		    /*################### FIN DATO COBRO #########################*/
		    

		     /*################### FIN DATO COBRO #########################*/

		     /*################### DATO RANGO #########################*/
	            $dato_rango=array(
		                "id_user"	=> $id_nuevo,
		                "id_rango"		=> 1,
		                "entregado"		=> 1,
		                "estatus"		=> "ACT"
		            );
		    $this->db->insert("cross_rango_user",$dato_rango);
		    /*################### FIN DATO RANGO #########################*/

		    return true;
		}//FIN EXISTE MAIL
		else
		{
			return false;
		}

	}
	
	function AgregarUsuarioRed($id_usuario, $id_red){
		
	}
	
	function actualiza_directo($id_,$id)
	{
		$q=$this->db->query("select id_red from red where id_usuario=".$id_);
		$q=$q->result();
		$mi_red=$q[0]->id_red;

		$q=$this->db->query("update afiliar set directo=1 where id_red=".$mi_red." and debajo_de=".$id);
	}
	function get_red($id)
	{
		$q=$this->db->query("select * from red where id_usuario = ".$id."");
		return $q->result();
	}
	function get_pais()
	{
		/*7= español 3=inglés*/
		$q=$this->db->query("select Code, Name, Code2 from Country where Code !='AAA'");
		return $q->result();
	}
	function get_pais_Afiliado($id)
	{
		/*7= español 3=inglés*/
		$q=$this->db->query("SELECT pais as codigoPais FROM cross_dir_user where id_user='".$id."'");
		return $q->result();
	}

	function get_afiliados($id, $id_afiliado)
	{
		
		$q=$this->db->query("select *,(select nombre from user_profiles where user_id=id_afiliado) afiliado,
			(select apellido from user_profiles where user_id=id_afiliado) afiliado_p,
			(select nombre from user_profiles where user_id=debajo_de) debajo_de_n,
			(select apellido from user_profiles where user_id=debajo_de) debajo_de_p,
			(select (select url from cat_img b where a.id_img=b.id_img) url from cross_img_user a where id_user = id_afiliado) img
			from afiliar where id_red=".$id." and debajo_de=".$id_afiliado." order by lado");
		return $q->result();
	}
	
	function get_afiliados_directos($id, $id_afiliado)
	{
	
		$q=$this->db->query("select *,(select nombre from user_profiles where user_id=id_afiliado) afiliado,
			(select apellido from user_profiles where user_id=id_afiliado) afiliado_p,
			(select nombre from user_profiles where user_id=directo) directo_n,
			(select apellido from user_profiles where user_id=directo) directo_p,
			(select (select url from cat_img b where a.id_img=b.id_img) url from cross_img_user a where id_user = id_afiliado) img
			from afiliar where id_red=".$id." and directo=".$id_afiliado." order by lado");
		return $q->result();
	}
	
	function get_afiliado_por_posicion($id, $id_afiliado,$lado)
	{
	
		$q=$this->db->query("select *,(select nombre from user_profiles where user_id=id_afiliado) afiliado,
			(select apellido from user_profiles where user_id=id_afiliado) afiliado_p,
			(select nombre from user_profiles where user_id=debajo_de) debajo_de_n,
			(select apellido from user_profiles where user_id=debajo_de) debajo_de_p,
			(select (select url from cat_img b where a.id_img=b.id_img) url from cross_img_user a where id_user = id_afiliado) img
			from afiliar where id_red=".$id." and debajo_de=".$id_afiliado." and lado=".$lado." order by lado");
		return $q->result();
	}
	
	function get_cantidad_de_frontales($id_afiliado,$id_red)
	{
		
		$q=$this->db->query("SELECT count(*) as frontales FROM afiliar where debajo_de=".$id_afiliado." and id_red=".$id_red." order by lado");
		return $q->result();
	}
	
	function get_directos_by_id($id)
	{
		$q=$this->db->query("select U.id, U.username, U.email,UP.nombre, UP.apellido, CTU.descripcion ,CEA.descripcion estatus , AF.directo ,
				
			(select distinct tr.nombre from tipo_red tr where tr.id in (select af.id_red from afiliar af where af.id_red=  AF.id_red)) as redes

				from users U, user_profiles UP, cat_tipo_usuario CTU, cat_estatus_afiliado CEA ,afiliar AF

				where U.id = UP.user_id and UP.user_id = AF.id_afiliado and AF.directo = ".$id." 
				
				and CTU.id_tipo_usuario = UP.id_tipo_usuario and CEA.id_estatus = UP.id_estatus and UP.id_tipo_usuario = 2 
				
				order by   AF.id_red , AF.lado asc,(U.id) limit 1000");
		return  $q->result();
	}
	
	function get_directos_by_id_ultimos_cinco($id)
	{
		$q=$this->db->query("select U.id, U.username, U.email,UP.nombre, UP.apellido, CTU.descripcion ,CEA.descripcion estatus , AF.directo ,
	
			(select distinct  group_concat(tr.nombre) from tipo_red tr where tr.id in (select af.id_red from afiliar af where af.id_red=  AF.id_red)) as redes
	
				from users U, user_profiles UP, cat_tipo_usuario CTU, cat_estatus_afiliado CEA ,afiliar AF
	
				where U.id = UP.user_id and UP.user_id = AF.id_afiliado and AF.directo = ".$id."
	
				and CTU.id_tipo_usuario = UP.id_tipo_usuario and CEA.id_estatus = UP.id_estatus and UP.id_tipo_usuario = 2
	
				order by   U.id , AF.lado asc,(U.id) limit 5");
		return  $q->result();
	}
	
	function get_tabla()
	{
		$q=$this->db->query("select U.id, U.username, U.email,U.recovery,(select group_concat(distinct directo) from afiliar where id_afiliado = U.id) sponsor, UP.nombre, UP.apellido, CTU.descripcion ,CEA.descripcion estatus , 
				
			(select distinct group_concat(tr.nombre) from tipo_red tr where tr.id in (select af.id_red from afiliar af where af.id_afiliado = U.id)) redes

from users U, user_profiles UP, cat_tipo_usuario CTU, cat_estatus_afiliado CEA 

where U.id = UP.user_id  and CTU.id_tipo_usuario = UP.id_tipo_usuario and CEA.id_estatus = UP.id_estatus and UP.id_tipo_usuario = 2 order by (U.id) limit 1000");
		return  $q->result();
		}
		
	function get_tabla_por_id_buscado($id_buscado, $id_red)
	{
			$q=$this->db->query("select U.id, U.username,U.recovery,(select group_concat(distinct directo) from afiliar where id_afiliado = U.id) sponsor, U.email,UP.nombre, UP.apellido, CTU.descripcion ,CEA.descripcion estatus , 
				
			(select distinct group_concat(tr.nombre) from tipo_red tr where tr.id in (select af.id_red from afiliar af where af.id_afiliado = U.id)) redes

from users U, user_profiles UP, cat_tipo_usuario CTU, cat_estatus_afiliado CEA 

where U.id = UP.user_id  and CTU.id_tipo_usuario = UP.id_tipo_usuario and CEA.id_estatus = UP.id_estatus and UP.id_tipo_usuario = 2 and U.id like ".$id_buscado." 

group by (U.id) 
order by (U.id);");
			return  $q->result();
	}
	
	function get_tabla_por_nombre_buscado($nombre_buscado, $id_red)
	{
		$q=$this->db->query("select U.id, U.username,U.recovery,(select group_concat(distinct directo) from afiliar where id_afiliado = U.id) sponsor, U.email,UP.nombre, UP.apellido, CTU.descripcion ,CEA.descripcion estatus , 
				
			(select distinct group_concat(tr.nombre) from tipo_red tr where tr.id in (select af.id_red from afiliar af where af.id_afiliado = U.id)) redes

from users U, user_profiles UP, cat_tipo_usuario CTU, cat_estatus_afiliado CEA 

where U.id = UP.user_id  and CTU.id_tipo_usuario = UP.id_tipo_usuario and CEA.id_estatus = UP.id_estatus and UP.id_tipo_usuario = 2  and upper(UP.nombre) like upper('%".$nombre_buscado.'%'."') 

group by (U.id) 
order by (U.id);");
		return  $q->result();
	}
	
	function get_tabla_por_apellido_buscado($apellido_buscado, $id_red)
	{
		$q=$this->db->query("select U.id, U.username,U.recovery,(select group_concat(distinct directo) from afiliar where id_afiliado = U.id) sponsor, U.email,UP.nombre, UP.apellido, CTU.descripcion ,CEA.descripcion estatus , 
				
			(select distinct group_concat(tr.nombre) from tipo_red tr where tr.id in (select af.id_red from afiliar af where af.id_afiliado = U.id)) redes

from users U, user_profiles UP, cat_tipo_usuario CTU, cat_estatus_afiliado CEA 

where U.id = UP.user_id  and CTU.id_tipo_usuario = UP.id_tipo_usuario and CEA.id_estatus = UP.id_estatus and UP.id_tipo_usuario = 2 and upper(UP.apellido) like upper('".$apellido_buscado.'%'."')  

group by (U.id) 
order by (U.id);");
		return  $q->result();
	}
	
	function get_tabla_por_username_buscado($username_buscado, $id_red)
	{
		$q=$this->db->query("select U.id, U.username,U.recovery, (select group_concat(distinct directo) from afiliar where id_afiliado = U.id) sponsor, U.email,UP.nombre, UP.apellido, CTU.descripcion ,CEA.descripcion estatus , 
				
			(select distinct group_concat(tr.nombre) from tipo_red tr where tr.id in (select af.id_red from afiliar af where af.id_afiliado = U.id)) redes

from users U, user_profiles UP, cat_tipo_usuario CTU, cat_estatus_afiliado CEA 

where U.id = UP.user_id  and CTU.id_tipo_usuario = UP.id_tipo_usuario and CEA.id_estatus = UP.id_estatus and UP.id_tipo_usuario = 2  and upper(U.username) like upper('".$username_buscado.'%'."') 
group by (U.id) 
order by (U.id);");
		return  $q->result();
	}
	
	function get_tabla_por_email_buscado($email_buscado, $id_red)
	{
		$q=$this->db->query("select U.id, U.username, U.email,U.recovery,(select group_concat(distinct directo) from afiliar where id_afiliado = U.id) sponsor,UP.nombre, UP.apellido, CTU.descripcion ,CEA.descripcion estatus , 
				
			(select distinct group_concat(tr.nombre) from tipo_red tr where tr.id in (select af.id_red from afiliar af where af.id_afiliado = U.id)) redes

from users U, user_profiles UP, cat_tipo_usuario CTU, cat_estatus_afiliado CEA 

where U.id = UP.user_id  and CTU.id_tipo_usuario = UP.id_tipo_usuario and CEA.id_estatus = UP.id_estatus and UP.id_tipo_usuario = 2 and upper(U.email) like upper('".$email_buscado.'%'."') 

group by (U.id) 
order by (U.id);");
		return  $q->result();
	}
	
	function use_mail()
	{
		$q=$this->db->query("select * from users where lower(email) like '".strtolower($_POST['mail'])."'");
		return $q->result();
	}
	
	function exist_mail($mail)
	{
		$q=$this->db->query("select * from users where lower(email) like '".strtolower($mail)."'");
		return $q->result();
	}
	
	function use_mail_modificar_perfil($id)
	{
		$q=$this->db->query("select * from users where lower(email) like '".strtolower($_POST['mail'])."' and id!= '".$id."'");
		return $q->result();
	}
	
	function use_mail_modificar()
	{
		$q=$this->db->query("select * from users where lower(email) like '".strtolower($_POST['mail'])."' and id != '".$_POST['id']."'");
		
		return $q->result();
	}
	
	function use_username()
	{
		$q=$this->db->query("select * from users where lower(username) = '".strtolower($_POST['username'])."'");
		return $q->result();
	}
	
	function use_username_red($id_afiliado)
	{
		$q=$this->db->query("select * from  afiliar where id_afiliado = '$id_afiliado' and id_red = '".$_POST['red']."'");
		return $q->result();
	}
	
	function use_username_modificar()
	{
		$q=$this->db->query("select * from users where lower(username) like '".strtolower($_POST['username'])."' and id!= '".$_POST['id']."'");
		return $q->result();
	}
	
	function use_password_modificar()
	{
		return ($_POST['password']==$_POST['confirm_password']) ? false : true;
	}
	
	function use_keyword()
	{
		$q=$this->db->query("select * from user_profiles where keyword = '".$_POST['keyword']."'");
		return $q->result();
	}
	function telefonos($id)
	{
		$q=$this->db->query("select (select descripcion from cat_tipo_tel A where A.id_tipo_tel=B.id_tipo_tel) tipo, numero from cross_tel_user B where id_user=".$id);
		return $q->result();
	}
	function telefonos_group($id)
	{
		$q=$this->db->query("select group_concat(numero) as tels from cross_tel_user B where id_user=".$id." order by B.id_tipo_tel");
		$q2 = $q->result();
		return $q2[0]->tels;
	}
	function edad($id)
	{
		$q=$this->db->query("select (YEAR(CURDATE())-YEAR(fecha_nacimiento)) - (RIGHT(CURDATE(),5)<RIGHT(fecha_nacimiento,5)) edad from user_profiles where user_id=".$id);
		return $q->result();
	}
	function sexo()
	{
		$q=$this->db->query("select * from cat_sexo");
		return $q->result();
	}
	function edo_civil()
	{
		$q=$this->db->query("select * from cat_edo_civil");
		return $q->result();
	}
	function actualizar($id,$pais)
	{
		$this->db->query("delete from cross_tel_user where id_user=".$id);
		$this->db->query("delete from cross_dir_user where id_user=".$id);

		if(isset($_POST["fijo"]))
		{
			foreach ($_POST["fijo"] as $fijo)
			{
				$dato_tel=array(
					"id_user"     =>$id,
					"id_tipo_tel" =>1,
					"numero"      =>$fijo,
					"estatus"     =>"ACT"
	            );
	            $this->db->insert("cross_tel_user",$dato_tel);
			}
		}
		if(isset($_POST["movil"]))
		{
			foreach ($_POST["movil"] as $movil)
			{
				$dato_tel=array(
					"id_user"     =>$id,
					"id_tipo_tel" =>2,
					"numero"      =>$movil,
					"estatus"     =>"ACT"
		        );
		        $this->db->insert("cross_tel_user",$dato_tel);
			}
		}
		$dato_dir=array(
				"id_user"   =>$id,
				"cp"        =>$_POST['cp'],
				"calle"     =>$_POST['calle'],
				"colonia"   =>$_POST['colonia'],
				"municipio" =>$_POST['municipio'],
				"estado"    =>$_POST['estado'],
				"pais"      =>$pais
            );
            $this->db->insert("cross_dir_user",$dato_dir);

        $this->db->query ( 'update users set email="' . $_POST ['email'] . '" where id=' . $id );
		$this->db->query ( "update user_profiles 
										set id_sexo=" . $_POST ['sexo'] 
										. ", id_fiscal='" . $_POST ['tipo_fiscal'] 
										. "', keyword='" . $_POST ['rfc'] 
										. "' ,id_edo_civil='" . $_POST ['civil'] 
										. "', id_estudio=" . $_POST ['estudios'] 
										. ", id_ocupacion=" . $_POST ['ocupacion'] 
										. " , id_tiempo_dedicado=" . $_POST ['tiempo_dedicado'] 
										. " ,nombre='" . $_POST ['nombre'] 
										. "',apellido='" . $_POST ['apellido'] 
										. "',fecha_nacimiento='" . $_POST ['nacimiento']. "' 
										where user_id=" . $id );
		$this->db->query ( "update estilo_usuario 
								set bg_color='" . $_POST ['bg_color'] 
								. "', btn_1_color='" . $_POST ['color_1'] 
								. "', btn_2_color='" . $_POST ['color_2'] . "' 
								where id_usuario=" . $id );
		$this->actualizar_cuenta_banco($id);
	}
	function cp()
	{
		$q=$this->db->query("select colonia, municipio, id_estado from sepomex where cp like '%".$_POST['cp']."%'");
		return $q->result();
	}
	function estado($id)
	{
		$q=$this->db->query("select descripcion from cat_estado where id_estado =".$id);
		return $q->result();
	}
	function dir($id)
	{
		$q=$this->db->query("select * from cross_dir_user where id_user=".$id);
		return $q->result();
	}
	function img_user($id,$data)
	{
		
		$q = $this->db->query("select ci.id_img from cat_img ci, cross_img_user ciu where ci.id_img = ciu.id_img and ciu.id_user = ".$id);
		$id_img = $q->result();
		
		$explode=explode(".",$data["file_name"]);
		$nombre=$explode[0];
		$extencion=$explode[1];
		$dato_img=array(
                "url"				=>	"/media/".$id."/".$data["file_name"],
                "nombre_completo"	=>	$data["file_name"],
                "nombre"			=>	$nombre,
                "extencion"			=>	$extencion,
                "estatus"			=>	"ACT"
            );
		$this->db->update("cat_img",$dato_img,"id_img = ".$id_img[0]->id_img);
	}

  	function img_user_tomar($id)
	{

		$q = $this->db->query("select ci.id_img from cat_img ci, cross_img_user ciu where ci.id_img = ciu.id_img and ciu.id_user = ".$id);
		$id_img = $q->result();
		$dato_img=array(
                "url"				=>	"/media/".$id."/user.png",
                "nombre_completo"	=> "user.png",
                "nombre"			=>	"user",
                "extencion"			=>	"png",
                "estatus"			=>	"ACT"
            );
		$this->db->update("cat_img",$dato_img,"id_img = ".$id_img[0]->id_img);

	}
	function del($id,$tipo)
	{
		if($tipo==0)
		{
			$q=$this->db->query("select id_img from cat_img where nombre='user'");
			$q=$q->result();
			foreach ($q as $id_img)
			{
				$this->db->query("delete from cross_img_user where id_img=".$id_img->id_img." and id_user=".$id);
			}
		}
		if($tipo==1)
		{
			$q=$this->db->query("select id_img from cat_img where nombre='fondo'");
			$q=$q->result();
			foreach ($q as $id_img)
			{
				$this->db->query("delete from cross_img_user where id_img=".$$id_img->id_img." and id_user=".$id);
			}
		}
	}
	function get_coaplicante($id)
	{
		$q=$this->db->query("select * from coaplicante where id_user=".$id);
		return $q->result();
	}
	
	function val_cuenta_banco($id)
	{
		$val=$this->get_cuenta_banco($id);
		if(!$val){
			$dato=array(
					"id_user" =>	$id
			);
			$this->db->insert("cross_user_banco",$dato);
			$val=$this->get_cuenta_banco($id);
		}
		return $val;
	}
	
	function get_cuenta_banco($id)
	{
		$q=$this->db->query("select * from cross_user_banco where id_user=".$id." and estatus ='ACT'");
		return $q->result();
	}
	
	function actualizar_cuenta_banco($id)
	{
		$dato=array(
				"cuenta"     => $_POST['c_cuenta'] ? $_POST['c_cuenta'] : "Your account",
				"titular"     		=> $_POST['c_titular'] ? $_POST['c_titular'] : "You",
				"banco"       		=> $_POST['c_banco'] ? $_POST['c_banco'] : "Your bank",
				"pais"         		=> $_POST['c_pais'] ? $_POST['c_pais'] : "COL",
				"swift"      		=> $_POST['c_swift'],
				"otro"         		=> $_POST['c_otro'] ,
				"clabe"       		=> $_POST['c_clabe'] ,
				"dir_postal"        => $_POST['c_postal']
		);
	
		$this->db->where('id_user', $id);
		$this->db->update('cross_user_banco', $dato);
	
		return true;
	}
	
	function ConsultarIdPadre($id , $id_red_padre){
		$q = $this->db->query("select debajo_de,lado from afiliar where id_afiliado=".$id." and id_red = ".$id_red_padre." group by debajo_de");
		$id_padre = $q->result();
		return $id_padre;
	}
	
	function ConsultarPadre($id , $id_red_padre){
		$q = $this->db->query("select debajo_de from afiliar where id_afiliado=".$id." and id_red = ".$id_red_padre);
		$id_padre = $q->result();
		return $id_padre[0]->debajo_de;
	}
	
	function ConsultarPadres($id ){
		$q = $this->db->query("select debajo_de from afiliar where id_afiliado=".$id);
		$id_padre = $q->result();
		return $id_padre[0]->debajo_de;
	}

	function Consultar_nivel_red($id_user){
		$q = $this->db->query("select u.user_id,u.nivel_en_red from user_profiles u
 where   u.user_id=".$id_user);
		return $q->result();
	}
	
	function ConsultarFechaInscripcion($id){
		$q = $this->db->query("select created from users where id=".$id);
		$id_padre = $q->result();
		return $id_padre;
	}
	
	function ConsultarIdRedPadre($id){
		$q = $this->db->query("select id_red from afiliar where id_afiliado=".$id);
		$id_padre = $q->result();
		return $id_padre[0]->id_red;
	}
	
	function ConsultarRedAfiliado($id){
		$q = $this->db->query("select id_red from afiliar where id_afiliado=".$id);		
		return $q->result();
	}
	
	function ConsultarRedDebajo($id,$red){
		$q = $this->db->query("select group_concat(id_afiliado) as hijos from afiliar where debajo_de=".$id." and id_red = ".$red);
		return $q->result();
	}
	
	function ConsultarHijos($id,$red){
		$q = $this->db->query("select id_afiliado from afiliar where debajo_de=".$id." and id_red = ".$red);
		return $q->result();
	}

	function ObtenerRetencioFase(){
		$q = $this->db->query("select porcentaje from cat_retencion where duracion= 'UNI'");
		$retencion = $q->result();
		return $retencion[0]->porcentaje;
	}
	
	function ConsultarFrontales($id,$red){
		$q = $this->db->query("select lado from afiliar where debajo_de = ".$id." and id_red = ".$red);
		return $q->result();
	}
	
	function consultarVacio($id,$espacio,$red,$i){
		$debajo = $this->ConsultarIdPadre($id , $red);
		if($debajo[0]->debajo_de==$espacio){
			return $debajo[0]->lado;
		}else{
			return $i;
		}
	}
	
	function actualizarHijos($id,$espacio,$setHijos,$red,$hijos){
		
		$i = count($this->ConsultarHijos($espacio,$red));		
		$j = $this->consultarVacio($id,$espacio,$red,$i);
		//echo "dentro de actualizarHijos	:".$i."	cupos: ".$j." setHijos: ".$setHijos."	";
		$this->db->query("update afiliar set debajo_de = ".$espacio." where id_afiliado in (".$setHijos.") and id_red = ".$red);
		foreach($hijos as $hijo){
			if($j==$i){				
				$this->db->query("update afiliar set lado = ".$i." where id_afiliado = ".$hijo->id_afiliado." and id_red = ".$red);		
			}else{
				$this->db->query("update afiliar set lado = ".$j." where id_afiliado = ".$hijo->id_afiliado." and id_red = ".$red);	
			}							
			$j=$i;	
			$i++;		
		}
		return true;
	}
	
	function kill_afiliado($id){
		$this->db->query("delete from users where id = ".$id);
		$this->db->query("delete from user_profiles where user_id not in (select id from users)");
		$this->db->query("delete from afiliar where id_afiliado not in (select id from users)");
		$this->db->query("delete from cross_perfil_usuario where id_user not in (select id from users)");
		$this->db->query("delete from estilo_usuario where id_usuario not in (select id from users)");
		$this->db->query("delete from coaplicante where id_user not in (select id from users)");
		$this->db->query("delete from cross_tel_user where id_user not in (select id from users)");
		$this->db->query("delete from cross_dir_user where id_user not in (select id from users)");
		$this->db->query("delete from billetera where id_user not in (select id from users)");
		$this->db->query("delete from cross_rango_user where id_user not in (select id from users)");
		$this->db->query("delete from cross_img_user where id_user not in (select id from users)");
		$this->db->query("delete from cat_img where id_img not in (select id_img from cross_img_user union select id_cat_imagen from cross_merc_img)");
		//$this->db->query("delete from red where id_usuario = ".$id);
		return true;
	}
	function kill_afiliadonred($id,$red){
		$this->db->query("delete from afiliar where id_afiliado = ".$id." and id_red = ".$red);
		//$this->db->query("delete from red where id_usuario = ".$id." and id_red = ".$red);
	}
	
	function ocupado($temp){
		$q=$this->db->query("select * from afiliar 
							where id_red = ".$temp[0]->red." 
								and debajo_de = ".$temp[0]->padre./*" 
								and directo = ".$temp[0]->sponsor.*/" 
								and lado = ".$temp[0]->lado);
		$q2=$q->result();
		return $q2 ? true: false;
	}
	
	function trash_token($token)
	{
		$this->db->query("update temp_invitacion set estatus = 'DES' where id = '".$token."'");
		$this->db->query("delete from temp_invitacion where id <= ".$token);
		$this->db->query("truncate table temp_invitacion");
		return true;
	}
	
	
}
