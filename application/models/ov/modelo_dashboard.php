<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_dashboard extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('/bo/bonos/afiliado');
		$this->load->model('/bo/bonos/calculador_bono');
		$this->load->model('/ov/model_perfil_red');
	
	}
	function get_style($id)
	{
		$q=$this->db->query('select * from estilo_usuario where id_usuario = '.$id);
		return $q->result();
	}
	function get_images($id)
	{
		$q=$this->db->query('select (select nombre_completo from cat_img b where a.id_img=b.id_img) img, (select url from cat_img b where a.id_img=b.id_img) url from cross_img_user a where id_user = '.$id);
		return $q->result();
	}
	function get_red($id)
	{
		$q=$this->db->query('select id_red, directo id_usuario from afiliar where id_afiliado ='.$id.'');
		$q=$q->result();
		return $q;

	}
	function get_ultima($id)
	{
		$q=$this->db->query('select ultima_sesion from user_profiles where user_id = '.$id);
		$q=$q->result();
		return $q[0]->ultima_sesion;
	}

  function get_user_phone($id){
		$q=$this->db->query('select numero from cross_tel_user where id_user = '.$id);
    $q=$q->result();
		return $q ? $q[0]->numero : '';
  }

  function get_user_email($id){
		$q=$this->db->query('select email from users where id = '.$id);
    $q=$q->result();
		return $q[0]->email;
  }

  function get_user_name($id){
		$q=$this->db->query('select username from users where id = '.$id);
    $q=$q->result();
		return $q[0]->username;
  }

   function get_user_country_code($id){
		$q=$this->db->query('SELECT code2 FROM cross_dir_user u ,Country c
                          where u.pais=c.code
                          and u.id_user='.$id.';
                        ');
    $q=$q->result();
		return $q[0]->code2;
  }
  
  function get_user_country($id){
  	$q=$this->db->query('SELECT pais FROM cross_dir_user where id_user='.$id.';
                        ');
  	$q=$q->result();
  	return $q[0]->pais;
  }
  
  function get_cuentas_por_pagar_banco($id){
  	$q=$this->db->query('SELECT cb.descripcion as nombreBanco,cb.cuenta as cuenta,cb.clave as clabe,cb.swift,cb.otro,cb.dir_postal,
  						(cbh.valor+c.gastos) as valor,cbh.fecha as fecha FROM canal c, cuenta_pagar_banco_historial cbh , cat_banco cb
  						where(cbh.id_banco=cb.id_banco)and(cbh.estatus="DES") and(cbh.id_usuario='.$id.') and c.id = 1 ');
	return $q->result();
  }

  function get_puntos_personales_semana($id){
  	$usuario=new $this->afiliado;
  	$calculador=new $this->calculador_bono;
  	
  	$cualquiera="0";
  	$fechaActual=date('Y-m-d');
  	$fechaInicio=$calculador->getInicioSemana($fechaActual);
  	$fechaFin=$calculador->getFinSemana($fechaActual);

  	$q=$this->db->query("select id from tipo_red where estatus = 'ACT' group by id");
  	$redes= $q->result();
  	
  	$puntos=0;
  	
  	foreach ($redes as $red){
  		$puntos+=$usuario->getPuntosTotalesPersonalesIntervalosDeTiempo($id,$red->id,$cualquiera,$cualquiera,$fechaInicio,$fechaFin)[0]->total;
  		if($puntos==null)
  			$puntos+=0;
  	}
  	
  	
	return $puntos;
  }
  function get_puntos_personales_mes($id){
	$usuario=new $this->afiliado;
  	$calculador=new $this->calculador_bono;
  	
  	$cualquiera="0";
  	$fechaActual=date('Y-m-d');
  	$fechaInicio=$calculador->getInicioMes($fechaActual);
  	$fechaFin=$calculador->getFinMes($fechaActual);

  	$q=$this->db->query("select id from tipo_red where estatus = 'ACT' group by id");
  	$redes= $q->result();
  	
  	$puntos=0;
  	
  	foreach ($redes as $red){
  		$puntos+=$usuario->getPuntosTotalesPersonalesIntervalosDeTiempo($id,$red->id,$cualquiera,$cualquiera,$fechaInicio,$fechaFin)[0]->total;
  		if($puntos==null)
  			$puntos+=0;
  	}
  	
  	
	return $puntos;
  }
  function get_puntos_personales_total($id){
	$usuario=new $this->afiliado;
  	
  	$cualquiera="0";
  	$fechaInicio="2016-01-01";
  	$fechaFin="2026-01-01";

  	$q=$this->db->query("select id from tipo_red where estatus = 'ACT' group by id");
  	$redes= $q->result();
  	
  	$puntos=0;
  	
  	foreach ($redes as $red){
  		$puntos+=$usuario->getPuntosTotalesPersonalesIntervalosDeTiempo($id,$red->id,$cualquiera,$cualquiera,$fechaInicio,$fechaFin)[0]->total;
  		if($puntos==null)
  			$puntos+=0;
  	}
  	
  	
	return $puntos;
  }

  function get_puntos_red_semana($id){
  	$usuario=new $this->afiliado;
  	$calculador=new $this->calculador_bono;
  	 
  	$cualquiera="0";
  	$fechaActual=date('Y-m-d');
  	$fechaInicio=$calculador->getInicioSemana($fechaActual);
  	$fechaFin=$calculador->getFinSemana($fechaActual);
  
  	$q=$this->db->query("select id , profundidad from tipo_red where estatus = 'ACT' group by id");
  	$redes= $q->result();
  	 
  	$puntos=0;
  	 
  	foreach ($redes as $red){
  		$puntos+=$usuario->getVentasTodaLaRed($id,$red->id,"RED","EQU",$red->profundidad,$fechaInicio,$fechaFin,$cualquiera,$cualquiera,"PUNTOS");
  		if($puntos==null)
  			$puntos+=0;
  	}
  	 
  	 
  	return $puntos;
  }

  function get_puntos_red_mes($id){
  	$usuario=new $this->afiliado;
  	$calculador=new $this->calculador_bono;
  	 
  	$cualquiera="0";
  	$fechaActual=date('Y-m-d');
  	$fechaInicio=$calculador->getInicioMes($fechaActual);
  	$fechaFin=$calculador->getFinMes($fechaActual);
  
  	$q=$this->db->query("select id , profundidad from tipo_red where estatus = 'ACT' group by id");
  	$redes= $q->result();
  	 
  	$puntos=0;
  	 
  	foreach ($redes as $red){
  		$puntos+=$usuario->getVentasTodaLaRed($id,$red->id,"RED","EQU",$red->profundidad,$fechaInicio,$fechaFin,$cualquiera,$cualquiera,"PUNTOS");
  		if($puntos==null)
  			$puntos+=0;
  	}
  	 
  	 
  	return $puntos;
  }

  function get_puntos_red_total($id){
  	$usuario=new $this->afiliado;
  	 
  	$cualquiera="0";
  	$fechaInicio="2016-01-01";
  	$fechaFin="2026-01-01";
  
  	$q=$this->db->query("select id , profundidad from tipo_red where estatus = 'ACT' group by id");
  	$redes= $q->result();
  	 
  	$puntos=0;
  	 
  	foreach ($redes as $red){
  		$puntos+=$usuario->getVentasTodaLaRed($id,$red->id,"RED","EQU",$red->profundidad,$fechaInicio,$fechaFin,$cualquiera,$cualquiera,"PUNTOS");
  		if($puntos==null)
  			$puntos+=0;
  	}
  	 
  	 
  	return $puntos;
  }
  
  function get_ultimos_auspiciados($id){

  	$afiliados = $this->model_perfil_red->get_directos_by_id_ultimos_cinco($id);
  	$image=$this->model_perfil_red->get_images_users();
  	$ultimos_auspiciados=array();
  	foreach ($afiliados as $afiliado)
  	{
  		$afiliados_imagen="/template/img/avatars/male.png";
  		foreach ($image as $img) {
  			if($img->id_user==$afiliado->id){
  				$url=getcwd().$img->url;
  				if(file_exists($url)){
  					$afiliados_imagen=$img->url;
  				}
  			}
  		}
  		$afiliado_datos = array(
				'id' =>$afiliado->id,
				'foto'   => $afiliados_imagen
		);
  		array_push($ultimos_auspiciados, $afiliado_datos);
  	}
  	
  	return $ultimos_auspiciados;
  }
}
