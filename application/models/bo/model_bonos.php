<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_bonos extends CI_Model
{

function setUp($nombre,$descripcion,$inicio,$fin,$mes_desde_afiliacion,$mes_desde_activacion,$frecuencia,$estatus,$plan){

	$bono = array(
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'inicio' => $inicio,
			'fin' => $fin,
			'mes_desde_afiliacion' => $mes_desde_afiliacion,
			'mes_desde_activacion' => $mes_desde_activacion,
			'frecuencia' => $frecuencia,
			'plan' => $plan,
			'estatus' => $estatus,
	);
	return $bono;
}

function setUpValoresBones($idBono,$nivel,$condicion_red,$valor,$verticalidad){

	$bono_valores = array(
			'id_bono' => $idBono,
			'nivel' => $nivel,
			'valor' => $valor,
			'condicion_red'=>$condicion_red,
			'verticalidad'=>$verticalidad
	);
	return $bono_valores;
}

function setUpCondicion($idBono,$idRango,$idTipoRango,$red,$condicion1,$condicion2,$calificado){
	$rango=$this->get_rangos_id_tipo($idRango, $idTipoRango);
	$bonoCondiciones = array(
			'id_bono' => $idBono,
			'id_rango' => $idRango,
			'id_tipo_rango' => $idTipoRango,
			'condicion_rango' => $rango[0]->valor,
			'id_red' => $red,
			'condicion1' => $condicion1,
			'condicion2' => $condicion2,
			'calificado' => $calificado,
	);
	return $bonoCondiciones;
}

function insert_bono($bono){
	$this->db->insert("bono",$bono);
	$q=$this->db->query("SELECT id FROM bono order by id desc  limit 0,1 ");
	$q=$q->result();
	return $q[0]->id;
}

function actualizar_bono($idBono,$datosBono){

	$this->db->where('id',$idBono);
	$this->db->update('bono', $datosBono);
	return true;
}

function kill_bono($id){
	$this->db->query("DELETE FROM cat_bono_valor_nivel where id_bono='".$id."'");
	$this->db->query("DELETE FROM cat_bono_condicion where id_bono='".$id."'");
	$this->db->query("DELETE FROM bono where id='".$id."'");
}

function cambiar_estado_bono($estado,$id_bono){
	$this->db->query("update bono set estatus = '".$estado."' where id=".$id_bono);
	return true;
}

function insert_bono_valor_niveles($valoresBono){

	$this->db->insert("cat_bono_valor_nivel",$valoresBono);

}

function kill_bono_valor_nivel($idBono){
	$this->db->query("DELETE FROM cat_bono_valor_nivel where id_bono='".$idBono."'");
}

function kill_bono_condicion($idBono){
	$this->db->query("DELETE FROM cat_bono_condicion where id_bono='".$idBono."'");
}

function actualizar_bono_valor_niveles($idBono,$valoresBono){

	$this->db->insert("cat_bono_valor_nivel",$valoresBono);

}

function insert_condicion_bono($condicion){
	$this->db->insert("cat_bono_condicion",$condicion);
}

function get_rangos(){

		$q=$this->db->query("SELECT cr.id_rango as id_rango,cr.nombre as nombre_rango,cr.descripcion as descripcion,
								ct.id as tipo_rango,ct.nombre as nombre_tipo_rango,crt.valor as valor,cr.estatus
								FROM cat_rango cr,cat_tipo_rango ct,cross_rango_tipos crt
								where (cr.id_rango=crt.id_rango)
								and (ct.id=crt.id_tipo_rango)and cr.estatus='ACT'
								group by id_rango ");
		return $q->result();
}
function get_rangos_id($id){

	$q=$this->db->query("SELECT cr.id_rango as id_rango,cr.nombre as nombre_rango,cr.descripcion as descripcion,
								ct.id as tipo_rango,ct.nombre as nombre_tipo_rango,crt.valor as valor,cr.estatus
								FROM cat_rango cr,cat_tipo_rango ct,cross_rango_tipos crt
								where (cr.id_rango=crt.id_rango)
								and (ct.id=crt.id_tipo_rango)and cr.estatus='ACT'
								and(cr.id_rango=".$id.") ");
	return $q->result();
}
function get_rangos_bono($id){
	$q=$this->db->query("SELECT * FROM cat_bono_condicion where id_bono=".$id." group by id_rango");
	return $q->result();
}
function get_tipo_rangos_bono($id){
	$q=$this->db->query("SELECT * FROM cat_bono_condicion where id_bono=".$id." group by id_rango,id_tipo_rango");
	return $q->result();
}
function get_rangos_id_tipo($id,$tipoRango){

	$q=$this->db->query("SELECT cr.id_rango as id_rango,cr.nombre as nombre_rango,cr.descripcion as descripcion,
								ct.id as tipo_rango,ct.nombre as nombre_tipo_rango,crt.valor as valor,cr.estatus
								FROM cat_rango cr,cat_tipo_rango ct,cross_rango_tipos crt
								where (cr.id_rango=crt.id_rango)
								and (ct.id=crt.id_tipo_rango)and cr.estatus='ACT'
								and(cr.id_rango=".$id.") and(ct.id=".$tipoRango.")");
	return $q->result();
}

function get_mercancia_tipos(){

	$q=$this->db->query("SELECT * FROM cat_tipo_mercancia;");
	return $q->result();
}
function get_productos_red($idRed){
	$q=$this->db->query("select M.id,P.nombre, CTM.descripcion, TR.nombre red,C.Name
							from mercancia M, producto P, cat_tipo_mercancia CTM, 
							cat_grupo_producto CGP, tipo_red TR, Country C
							where M.sku = P.id and CTM.id = M.id_tipo_mercancia 
							and M.id_tipo_mercancia=1 
							and P.id_grupo = CGP.id_grupo 
							and CGP.id_red = TR.id 
							and C.Code = M.pais
							and TR.id=".$idRed."");
	return $q->result();
}
function get_producto_por_id($idproducto){
	$q=$this->db->query("select M.id,P.nombre, CTM.descripcion, TR.nombre red,C.Name
							from mercancia M, producto P, cat_tipo_mercancia CTM,
							cat_grupo_producto CGP, tipo_red TR, Country C
							where M.sku = P.id and CTM.id = M.id_tipo_mercancia
							and M.id_tipo_mercancia=1
							and P.id_grupo = CGP.id_grupo
							and CGP.id_red = TR.id
							and C.Code = M.pais
							and M.id=".$idproducto."");
	return $q->result();
}
function get_servicios_red($idRed){
	$q=$this->db->query("select M.id, M.sku, M.fecha_alta, M.real, M.costo, M.costo_publico, M.estatus , S.nombre, CI.url, CTM.descripcion, TR.nombre red, M.pais, C.Name, C.Code2
							from mercancia M, servicio S, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI, tipo_red TR, cat_grupo_producto CGP, Country C
							where M.sku = S.id and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia=2 and CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and CGP.id_grupo = S.id_red and CGP.id_red = TR.id and C.Code = M.pais
							and TR.id=".$idRed."");
	return $q->result();
}
function get_servicio_por_id($idServicio){
	$q=$this->db->query("select M.id, M.sku, M.fecha_alta, M.real, M.costo, M.costo_publico, M.estatus , S.nombre, CI.url, CTM.descripcion, TR.nombre red, M.pais, C.Name, C.Code2
							from mercancia M, servicio S, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI, tipo_red TR, cat_grupo_producto CGP, Country C
							where M.sku = S.id and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia=2 and CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and CGP.id_grupo = S.id_red and CGP.id_red = TR.id and C.Code = M.pais
							and M.id=".$idServicio."");
	return $q->result();
}
function get_combinados_red($idRed){
	$q=$this->db->query("select M.id,C.nombre, CTM.descripcion, TR.nombre red,CO.Name
							 from mercancia M, combinado C, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI, 
								  tipo_red TR, cat_grupo_producto CGP, Country CO
							
							where M.sku = C.id and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia=3 and 
							CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and CGP.id_grupo = C.id_red and
							CGP.id_red = TR.id and CO.Code = M.pais
							and TR.id=".$idRed."");
	return $q->result();
}
function get_combinado_por_id($idCombinado){
	$q=$this->db->query("select M.id,C.nombre, CTM.descripcion, TR.nombre red,CO.Name
							 from mercancia M, combinado C, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI,
								  tipo_red TR, cat_grupo_producto CGP, Country CO
				
							where M.sku = C.id and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia=3 and
							CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and CGP.id_grupo = C.id_red and
							CGP.id_red = TR.id and CO.Code = M.pais
							and M.id=".$idCombinado."");
	return $q->result();
}
function get_paquetes_red($idRed){
	$q=$this->db->query("select M.id,P.nombre, CTM.descripcion, TR.nombre red,CO.Name
						from mercancia M, paquete_inscripcion P, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI, tipo_red TR, cat_grupo_producto CGP, Country CO
						where M.sku = P.id_paquete and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia= 4 
						and CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and CGP.id_grupo = P.id_red and
						CGP.id_red = TR.id and CO.Code = M.pais
							and TR.id=".$idRed."");
	return $q->result();
}
function get_paquete_por_id($idPaquete){
	$q=$this->db->query("select M.id,P.nombre, CTM.descripcion, TR.nombre red,CO.Name
						from mercancia M, paquete_inscripcion P, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI, tipo_red TR, cat_grupo_producto CGP, Country CO
						where M.sku = P.id_paquete and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia= 4
						and CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and CGP.id_grupo = P.id_red and
						CGP.id_red = TR.id and CO.Code = M.pais
							and M.id=".$idPaquete."");
	return $q->result();
}

function get_membresia_red($idRed){
	$q=$this->db->query("select M.id, M.sku, M.fecha_alta, M.real, M.costo, M.costo_publico, M.estatus , S.nombre, CI.url, CTM.descripcion, TR.nombre red, M.pais, C.Name, C.Code2
							from mercancia M, membresia S, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI, tipo_red TR, cat_grupo_producto CGP, Country C
							where M.sku = S.id and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia=5 and CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and CGP.id_grupo = S.id_red and CGP.id_red = TR.id and C.Code = M.pais
							and TR.id=".$idRed."");
	return $q->result();
}
function get_membresia_por_id($idMembresia){
	$q=$this->db->query("select M.id, M.sku, M.fecha_alta, M.real, M.costo, M.costo_publico, M.estatus , S.nombre, CI.url, CTM.descripcion, TR.nombre red, M.pais, C.Name, C.Code2
							from mercancia M, membresia S, cat_tipo_mercancia CTM, cat_img CI, cross_merc_img CMI, tipo_red TR, cat_grupo_producto CGP, Country C
							where M.sku = S.id and CTM.id = M.id_tipo_mercancia and M.id_tipo_mercancia=5 and CI.id_img = CMI.id_cat_imagen and M.id = CMI.id_mercancia and CGP.id_grupo = S.id_red and CGP.id_red = TR.id and C.Code = M.pais
							and M.id=".$idMembresia."");
	return $q->result();
}

function get_bonos(){
	$q=$this->db->query("SELECT b.id,b.nombre,b.descripcion,b.inicio,b.fin,b.frecuencia,b.estatus
						FROM bono b
						
			"); //where b.plan='NO'
	return $q->result();
}

function get_bonos_activos(){
	$q=$this->db->query("SELECT b.id,b.nombre,b.descripcion,b.inicio,b.fin,b.frecuencia,b.estatus
						FROM bono b where b.estatus = 'ACT'");
	return $q->result();
}

function get_bono_id($id){
	$q=$this->db->query("SELECT b.id,b.nombre,b.descripcion,b.inicio,b.fin,b.frecuencia,b.plan,b.estatus,b.mes_desde_afiliacion,b.mes_desde_activacion
						FROM bono b
						where id=".$id."
			");//b. plan='NO'and
	return $q->result();
}

function get_bono_by_id($id){
	$q=$this->db->query("SELECT * FROM bono WHERE id=".$id);
	return $q->result();
}

function get_valor_niveles(){
	$q=$this->db->query("SELECT * FROM cat_bono_valor_nivel order by nivel;
			");
	return $q->result();
}

function get_valor_niveles_id_bono($id){
	$q=$this->db->query("SELECT * FROM cat_bono_valor_nivel where id_bono=".$id." order by nivel;
			");
	return $q->result();
}


function get_condiciones_bonos(){
	$q=$this->db->query("SELECT CBC.id , CBC.id_bono as id_bono,CR.nombre as nombreRango,
							CTR.nombre as nombreTipoRango ,CBC.id_tipo_rango as id_tipo_rango,CBC.condicion_rango as condicionRango ,
							GROUP_CONCAT(DISTINCT TR.nombre) as nombreRedes ,
							GROUP_CONCAT(DISTINCT CBC.condicion1)as condicion1,
							GROUP_CONCAT(DISTINCT CBC.condicion2)as condicion2 FROM 
							bono B,cat_bono_condicion CBC,cat_bono_valor_nivel CBN ,
							cat_rango CR,cat_tipo_rango CTR,tipo_red TR
							where(B.id=CBC.id_bono)
							
							and(B.id=CBN.id_bono)
							and(CBC.id_rango=CR.id_rango)
							and(CBC.id_tipo_rango=CTR.id)
							group by CBC.id_bono,CBC.id_rango,CBC.id_tipo_rango");
	$condiciones_bono=$q->result();//and(B.plan='NO')
	$resultado=array();
	
	foreach ($condiciones_bono as $condicion_bono){

		$bonoCondiciones = array(
				'id_bono' => $condicion_bono->id_bono,
				'nombreRango' => $condicion_bono->nombreRango,
				'tipoRango' => $condicion_bono->nombreTipoRango,
				'nombreRed' => $condicion_bono->nombreRedes,
				'condicionRango' => $condicion_bono->condicionRango,
				'condicion1' => $this->get_nombre_condicion_bono($condicion_bono->id_tipo_rango,$condicion_bono->condicion1,1),
				'condicion2' => $this->get_nombre_condicion_bono($condicion_bono->id_tipo_rango,$condicion_bono->condicion2,2),
		);
		
		array_push($resultado, $bonoCondiciones);
	}
	
	return $resultado ;
}

function get_condiciones_bonos_id_bono($id_bono){
	$q=$this->db->query("SELECT * FROM cat_bono_condicion where id_bono=".$id_bono." order by id_tipo_rango");
	return $q->result();
}

function get_red_condiciones_bonos_id_bono($id_bono){
	$q=$this->db->query("SELECT * FROM cat_bono_condicion where id_bono=".$id_bono." group by id_rango,id_tipo_rango,id_red order by id_red");
	return $q->result();
}

function get__condicioneses_bonos_id_bono($id_bono){
	$q=$this->db->query("SELECT * FROM cat_bono_condicion where id_bono=".$id_bono." group by id_rango,id_tipo_rango,id_red,condicion1,condicion2 order by id_red");
	return $q->result();
}

	function get_nombre_rango($id_rango){
		$q=$this->db->query("SELECT nombre FROM cat_rango where id_rango='".$id_rango."'");
		$nombreRango=$q->result();
		return $nombreRango[0]->nombre;
	}
	
	function get_nombre_red_bono($id_red) {
		$nombreRed="";
		if($id_red==0){
			$nombreRed="Todas";
		}else {
			$q1=$this->db->query("SELECT nombre FROM tipo_red where id='".$id_red."'");
			$nombreRed=$q1->result();
			$nombreRed=$nombreRed[0]->nombre;
		}
		return $nombreRed;
	}
	
	function get_nombre_tipo_rango($id_tipo_rango) {
		$tipoRango="";
		
		if($id_tipo_rango==1)
			$tipoRango="Afiliaciones";
		if($id_tipo_rango==2)
			$tipoRango="Ventas";
		if($id_tipo_rango==3)
			$tipoRango="Compras";
		
		return $tipoRango;
	}

	function get_nombre_condicion_bono($id_tipo_rango,$condiciones,$tipoCondicion){
		$condiciones = explode(',', $condiciones);
		
		$nombreCondicion=array();
		foreach ($condiciones as $condicion){
			if($id_tipo_rango==1){
					
				if ($condicion==0)
					array_push($nombreCondicion,"Todos");
				else 
					array_push($nombreCondicion,$condicion);
					
			}else{
				$con ="Todos";
				
				if (!$condicion=='0'){
					
					if($tipoCondicion==1){
					$con=$this->get_nombre_tipo_mercancia($condicion);
					}
					else{
					$con=$this->get_mercancia_por_id($condicion);
					}
				}
				array_push($nombreCondicion,$con);
			}
		}
		return $nombreCondicion;
	}
	
	function get_nombre_tipo_mercancia($id_tipo_mercancia){
		$q=$this->db->query("SELECT * FROM cat_tipo_mercancia where id=".$id_tipo_mercancia."");
		$nombre=$q->result();
		if(isset($nombre[0]->descripcion))
			return $nombre[0]->descripcion;
		return "";
	}
	
	function get_mercancia_por_id($id_mercancia){
		
		$q=$this->db->query("SELECT id_tipo_mercancia FROM mercancia where id=".$id_mercancia."");
		$idTipoMercancia=$q->result();
		$mercancia=array();
		if(!isset($idTipoMercancia[0]))
			return "";
		
			if($idTipoMercancia[0]->id_tipo_mercancia==1){
				$mercancia=$this->get_producto_por_id($id_mercancia);
				
			}else if($idTipoMercancia[0]->id_tipo_mercancia==2){
				$mercancia=$this->get_servicio_por_id($id_mercancia);
				
			}else if($idTipoMercancia[0]->id_tipo_mercancia==3){
				$mercancia=$this->get_combinado_por_id($id_mercancia);
				
			}else if($idTipoMercancia[0]->id_tipo_mercancia==4){
				$mercancia=$this->get_paquete_por_id($id_mercancia);
			}else if($idTipoMercancia[0]->id_tipo_mercancia==5){
				$mercancia=$this->get_membresia_por_id($id_mercancia);
			}
		if(isset($mercancia[0]->nombre))
			return $mercancia[0]->nombre;
		return "";
	}
	
	function validar_bono_plan($id_bono){
		$query = $this->db->query('select * from cross_plan_bonos where id_bono='.$id_bono.'');	
		return $query->result();
	}
	
	function validar_bono_red($id_red){
		$query = $this->db->query('select * from cat_bono_condicion where id_red='.$id_red.'');
		return $query->result();
	}
	
	function ver_total_bonos_id_red($id,$red){
		$query = $this->db->query('select 
										c.id_red, t.nombre red, b.id_bono, o.nombre,  
										(select sum(valor) 
											from comision_bono 
											where id_bono = b.id_bono and id_usuario = b.id_usuario) valor
									from 
										comision_bono b, cat_bono_condicion c , tipo_red t, bono o
									where 
										b.id_usuario = '.$id.' 
										and b.id_bono = c.id_bono
										and t.id = c.id_red and o.id = b.id_bono
										and c.id_red = '.$red.'				
									group by b.id_bono');		#in (select id_red from afiliar where id_afiliado = $id)
		return $query->result();
	}
	
	function ver_total_bonos_id_red_fecha($id,$red,$fecha){
		$query = $this->db->query('select 
										h.id, h.dia, h.mes, h.ano, c.id_red, t.nombre red, b.id_bono, o.nombre,  
										sum(b.valor) valor
									from 
										comision_bono b, cat_bono_condicion c , tipo_red t, bono o, comision_bono_historial h
									where 
										b.id_usuario = '.$id.' 
										and b.id_bono = c.id_bono
										and b.id_bono_historial = h.id
										and b.id_bono = h.id_bono
									    and date_format(h.fecha,"%Y-%m") = "'.date("Y-m", strtotime($fecha)).'"
										and t.id = c.id_red and o.id = b.id_bono
										and c.id_red = '.$red.'	
									group by  b.id_bono');	
		return $query->result();
	}
	
	function ver_total_bonos_id_fecha($id,$fecha){
		$query = $this->db->query('select
										h.id, h.dia, h.mes, h.ano, c.id_red, t.nombre red, b.id_bono, o.nombre,
										sum(b.valor) valor
									from
										comision_bono b, cat_bono_condicion c , tipo_red t, bono o, comision_bono_historial h
									where
										b.id_usuario = '.$id.'
										and b.id_bono = c.id_bono
										and b.id_bono_historial = h.id
										and b.id_bono = h.id_bono
									    and date_format(h.fecha,"%Y-%m") = "'.date("Y-m", strtotime($fecha)).'"
										and t.id = c.id_red and o.id = b.id_bono
										and c.id_red in (select id_red from afiliar where id_afiliado = '.$id.')
									group by  b.id_bono');
		return $query->result();
	}
	
	function ver_total_bonos_id_red_Range($id,$red,$inicio,$fin){
		$query = $this->db->query('select
										h.id, h.dia, h.mes, h.ano, c.id_red, t.nombre red, b.id_bono, o.nombre,
										sum(b.valor) valor
									from
										comision_bono b, cat_bono_condicion c , tipo_red t, bono o, comision_bono_historial h
									where
										b.id_usuario = '.$id.'
										and b.id_bono = c.id_bono
										and b.id_bono_historial = h.id
										and b.id_bono = h.id_bono
									    and h.fecha between "'.$inicio.' 00:00:00" and "'.$fin.' 23:59:59" 
										and t.id = c.id_red and o.id = b.id_bono
										and c.id_red = '.$red.'
									group by  b.id_bono');
		return $query->result();
	}
	
	function ver_total_bonos_id_Range($id,$inicio,$fin){
		$query = $this->db->query('select
										h.id, h.dia, h.mes, h.ano, c.id_red, t.nombre red, b.id_bono, o.nombre,
										sum(b.valor) valor
									from
										comision_bono b, cat_bono_condicion c , tipo_red t, bono o, comision_bono_historial h
									where
										b.id_usuario = '.$id.'
										and b.id_bono = c.id_bono
										and b.id_bono_historial = h.id
										and b.id_bono = h.id_bono
									    and h.fecha between "'.$inicio.' 00:00:00" and "'.$fin.' 23:59:59"
										and t.id = c.id_red and o.id = b.id_bono
										and c.id_red in (select id_red from afiliar where id_afiliado = '.$id.')
									group by  b.id_bono');
		$bono=$query->result();
		return $bono ? $bono[0]->valor: 0 ;
	}
	
	function ver_total_bonos_id($id){
		$query = $this->db->query('select sum(valor) valor from comision_bono where id_usuario = '.$id);		
		$q=$query->result();
		return $q[0]->valor;
	}
	
	function get_historial_fecha($inicio,$fin){
		$q=$this->db->query("SELECT 
									h.id ,  h.fecha, h.id_bono,
									b.nombre bono ,
									(select 
            count(distinct id_usuario)
        from
            comision_bono
        where
            id_bono_historial = h.id and valor > 0) afiliados,
									(select sum(valor) from comision_bono where id_bono_historial = h.id) total
								FROM comision_bono_historial h , bono b 
								WHERE 
									fecha between '".$inicio." 00:00:00' and '".$fin." 23:59:59' 
									and b.id = h.id_bono
								ORDER BY
									h.id asc");
		$q2=$q->result();
	
		return $q2;
	}
	
	function detalle_historial_id($id){
		$q=$this->db->query("SELECT c.id, h.id, c.id_usuario,
									concat(p.nombre,' ',p.apellido) as nombres,
									c.id_bono,
									b.nombre bono, 
									h.dia,
									h.mes,
									h.ano,
									h.fecha,
									sum(c.valor) as valor
									FROM 
				comision_bono c,users u,user_profiles p,bono b,comision_bono_historial h 
									WHERE c.id_bono_historial = ".$id."
								and p.user_id = c.id_usuario
								and u.id = c.id_usuario
								and b.id = c.id_bono
								and c.valor > 0
								and h.id = id_bono_historial group by c.id_usuario");
		$q2=$q->result();
	
		return $q2;
	}
	
	function detalle_historial_fecha($id,$fecha){
		$q=$this->db->query("SELECT c.id, h.id, c.id_usuario,
									#concat(p.nombre,' ',p.apellido) as nombres,
									u.username nombres,
									c.id_bono,
									b.nombre bono, 
									h.dia,
									h.mes,
									h.ano,
									h.fecha,
									c.valor
									FROM 
				comision_bono c,users u,/*user_profiles p,*/bono b,comision_bono_historial h 
									WHERE c.id_bono_historial = ".$id."
								#and p.user_id = c.id_usuario
								and u.id = c.id_usuario
								and b.id = c.id_bono
								and h.id = id_bono_historial
								and date_format(h.fecha,'%Y-%m') = '".date("Y-m", strtotime($fecha))."'
							ORDER BY c.id ");
		$q2=$q->result();
	
		return $q2;
	}
	
	function detalle_bono_id($id){
		$q=$this->db->query("SELECT c.id, h.id, 
									c.id_bono,
									b.nombre bono, 
									b.descripcion, 
									h.dia,
									h.mes,
									h.ano,
									h.fecha,
									sum(c.valor) as valor
									FROM 
				comision_bono c,users u,user_profiles p,bono b,comision_bono_historial h 
									WHERE p.user_id = c.id_usuario
								and u.id = c.id_usuario
								and b.id = c.id_bono
								and c.valor > 0
								and c.id_usuario = ".$id."
								and c.id_bono_historial = h.id group by h.id order by h.fecha desc");
		$q2=$q->result();
	
		return $q2;
	}
	
	function detalle_bono_fecha($id,$fecha){
		$q=$this->db->query("SELECT c.id, h.id, -- c.id_usuario,
									-- concat(p.nombre,' ',p.apellido) as nombres,
									c.id_bono,
									b.nombre bono, 
									b.descripcion, 
									h.dia,
									h.mes,
									h.ano,
									h.fecha,
									sum(c.valor) as valor
									FROM 
				comision_bono c,users u,user_profiles p,bono b,comision_bono_historial h 
									WHERE p.user_id = c.id_usuario
								and u.id = c.id_usuario
								and b.id = c.id_bono
								and c.valor > 0
								and c.id_usuario = ".$id."
								and c.id_bono_historial = h.id 
								and date_format(h.fecha,'%Y-%m') = '".date("Y-m", strtotime($fecha))."'
							group by h.id
							ORDER BY h.id ");
		$q2=$q->result();
	
		return $q2;
	}
	
	function getBonosPagadosRed($id,$inicio,$fin){
		$q=$this->db->query("SELECT -- c.id, 
									h.id, -- c.id_usuario,
									concat(p.nombre,' ',p.apellido) as afiliado,
									u.username as usuario,
									c.id_bono,
									b.nombre bono, 
									b.descripcion, 
									h.dia,
									h.mes,
									h.ano,
									h.fecha,
									sum(c.valor) as valor
									FROM 
				comision_bono c,users u,user_profiles p,bono b,comision_bono_historial h 
									WHERE p.user_id = c.id_usuario
								and u.id = c.id_usuario
								and b.id = c.id_bono
								and c.valor > 0
								and c.id_usuario  = ".$id."
								and c.id_bono_historial = h.id 
								and h.fecha between '".$inicio." 00:00:00' and '".$fin." 23:59:59' 
							group by h.id
							ORDER BY h.id ");
		$q2=$q->result();
	
		return $q2;
	}
	
	function getBonosPagadosTodos($inicio,$fin){
		$q=$this->db->query("SELECT -- c.id,
									h.id, -- c.id_usuario,
									concat(p.nombre,' ',p.apellido) as afiliado,
									u.username as usuario,
									c.id_bono,
									b.nombre bono,
									b.descripcion,
									h.dia,
									h.mes,
									h.ano,
									h.fecha,
									sum(c.valor) as valor
									FROM
				comision_bono c,users u,user_profiles p,bono b,comision_bono_historial h
									WHERE p.user_id = c.id_usuario
								and u.id = c.id_usuario
								and b.id = c.id_bono
								and c.valor > 0
								and c.id_usuario in (select id from users)
								and c.id_bono_historial = h.id
								and h.fecha between '".$inicio." 00:00:00' and '".$fin." 23:59:59'
							group by c.id_usuario, h.id
							ORDER BY h.id ");
		$q2=$q->result();
	
		return $q2;
	}
	
	function kill_historial($id){
		$this->db->query("delete from comision_bono_historial where id = ".$id);
		$this->db->query("delete from comision_bono where id_bono_historial = ".$id);
		$this->db->query("delete from comisionPuntosRemanentes where id_bono_historial = ".$id);
		return true ;
	}
	
}
