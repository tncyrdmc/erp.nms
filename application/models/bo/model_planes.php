<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_planes extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('bo/model_bonos');
	}
	
	function get_bonos_plan(){
	
		$q=$this->db->query("select * from bono where estatus='ACT' and plan='SI'");
		return $q->result();
	}
	
	function get_planes(){
	
		$q=$this->db->query("select * from plan");
		return $q->result();
	}
	
	function get_planes_activos(){
	
		$q=$this->db->query("select p.*, c.id_bono, b.estatus 
								from plan p, cross_plan_bonos c, bono b 
								where p.id = c.id_plan and b.id = c.id_bono and p.estatus = 'ACT' and b.estatus = 'ACT' group by p.id");
		return $q->result();
	}
	
	function get_cross_plan_bonos(){
	
		$q=$this->db->query("select * from cross_plan_bonos order by id_plan , `order` asc");
		return $q->result();
	}
	
	function get_cross_plan_bonos_activos(){
	
		$q=$this->db->query("select c.* , b.estatus from cross_plan_bonos c, bono b where b.id = c.id_bono and b.estatus = 'ACT' order by id_plan , `order` asc");
		return $q->result();
	}
	
	function ingresar_plan(){
		$plan = array(
				'nombre' => $_POST['nombre'],
				'descripcion' => $_POST['desc'],
				'estatus' => 'ACT'
		);
	
		$this->db->insert("plan",$plan);
		$q=$this->get_plan_max();
		return $q[0]->max;
	}
	
	function get_plan_max(){
	
		$g=$this->db->query("select max(id) as max from plan");
		return $g->result();
	}
	
	function ingresar_plan_bonos($id,$bonos){
	
		$bonosPlan = array();
		$i = 0;
		foreach ($bonos as $bono){
				$bono = array(
						'id_plan' => intval($id),
						'id_bono' => intval($bono),
						'order' => $i,
				);
				array_push($bonosPlan, $bono);
				$i = $i + 1;
		}
		foreach ($bonosPlan as $bonoPlan) {
			$this->db->insert("cross_plan_bonos",$bonoPlan);
		}
		return true;
	}
	
	function get_planes_id($id){
		$q=$this->db->query('select * from plan where id ='.$id.'');
		return $q->result();
	}
	
	function get_plan_bonos_by_id($id){
		$rangos=$this->db->query('select * from cross_plan_bonos where id_plan = '.$id.' order by `order` asc');
		return $rangos->result();
	}
	
	function eliminar_plan_bonos($condiciones){	
		$this->db->query('delete from cross_plan_bonos where id_plan='.$_POST["id"].' and id_bono not in ('.$condiciones.')');	
	}
	
	function actualizar_plan_bonos($id_plan,$bonos){
		$this->kill_cross_plan_bonos();
		$bonosPlan = array();
		$i = 0;
		foreach ($bonos as $condicion){
				$condicion = array(
						'id_plan' => $id_plan,
						'id_bono' => $condicion,
						'order' => $i
				);
				array_push($bonosPlan, $condicion);
				$i++;
		}
		foreach ($bonosPlan as $condicion) {
			$this->db->insert("cross_plan_bonos",$condicion);
		}
	}
	
	function kill_plan(){
		return $this->db->query("delete from plan where id =".$_POST["id"]) ? true : false;
		
	}
	
	function kill_cross_plan_bonos(){
		return $this->db->query("delete from cross_plan_bonos where id_plan=".$_POST["id"]) ? true : false;
	}
	
	function actualizar_plan(){
		
		//echo "dentro de modelo plan";
		
		$datos=array(
				'nombre' =>$_POST['nombre'] ,
				'descripcion' =>$_POST['descripcion']
		);
		$this->db->where('id', $_POST['id']);
		$this->db->update('plan', $datos);
		return true;
	}
	function cambiar_estado(){
		$this->db->query("update plan set estatus = '".$_POST['estado']."' where id=".$_POST["id"]);
		return true;
	}
	
	function load_planes_bonos(){
		$q=$this->db->query("SELECT 
								PL.id_plan, CBC.id , CBC.id_bono as id_bono,CR.nombre as nombreRango,
								CTR.nombre as nombreTipoRango ,CBC.id_tipo_rango as id_tipo_rango,CBC.condicion_rango as condicionRango ,
								GROUP_CONCAT(DISTINCT TR.nombre) as nombreRedes ,
								GROUP_CONCAT(DISTINCT CBC.condicion1)as condicion1,
								GROUP_CONCAT(DISTINCT CBC.condicion2)as condicion2 
							FROM
								cross_plan_bonos PL, bono B,cat_bono_condicion CBC,cat_bono_valor_nivel CBN ,
								cat_rango CR,cat_tipo_rango CTR,tipo_red TR							
							WHERE
								(B.id=CBC.id_bono)	
								and(B.id=CBN.id_bono)
								and(B.id=PL.id_bono)
								and(CBC.id_bono=PL.id_bono)
								and(CBN.id_bono=PL.id_bono)
								and(CBC.id_rango=CR.id_rango)
								and(CBC.id_tipo_rango=CTR.id)
								and B.estatus = 'ACT'
								and B.plan = 'SI'
							GROUP BY 					
								B.id,PL.id_plan,CBC.id_rango,CBC.id_tipo_rango
							ORDER BY					
								PL.id_plan,PL.`order`,PL.id_bono");
		return $q->result();
	}
	
	function get_planes_bonos(){
		
		//echo "dentro de get planes bonos";
		
		$resultado=array();
		$condiciones_bono = $this->load_planes_bonos();
	
		foreach ($condiciones_bono as $condicion_bono){
	
			$bonoCondiciones = array(
					'id_plan' => $condicion_bono->id_plan,
					'id_bono' => $condicion_bono->id_bono,
					'nombreRango' => $condicion_bono->nombreRango,
					'tipoRango' => $condicion_bono->nombreTipoRango,
					'nombreRed' => $condicion_bono->nombreRedes,
					'condicionRango' => $condicion_bono->condicionRango,
					'condicion1' => $this->model_bonos->get_nombre_condicion_bono($condicion_bono->id_tipo_rango,$condicion_bono->condicion1,1),
					'condicion2' => $this->model_bonos->get_nombre_condicion_bono($condicion_bono->id_tipo_rango,$condicion_bono->condicion2,2),
			);
	
			array_push($resultado, $bonoCondiciones);
		}
	
		return $resultado ;
	}
}
