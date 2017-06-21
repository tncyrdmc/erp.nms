<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_rangos extends CI_Model
{

function get_tipo_rango(){

		$q=$this->db->query("select * from cat_tipo_rango where estatus='ACT'");
		return $q->result();
}

function get_tipo_rango_not_in($id){

		$q=$this->db->query("select * from cat_tipo_rango where id not in (".$id.")");
		return $q->result();
}
function ingresar_rango(){
		$rango = array(
				'nombre' => $_POST['nombre'],
				'descripcion' => $_POST['desc'],
				'condicion_red_afilacion' => $_POST['condicion_red_afilacion'],
				'estatus' => 'ACT'
		);

	$this->db->insert("cat_rango",$rango);
	$q=$this->get_rango_max();
	return $q[0]->max;
}

function get_rango_max(){

	$g=$this->db->query("select max(id_rango) as max from cat_rango");
	return $g->result();
}
function ingresar_condicion_rango($id_rango,$condiciones,$valores,$condicion_red,$nivel_red){
		
		$condicionRango = array();
		$i = 0;
		foreach ($condiciones as $condicion){
			if($valores[$i] != ''){
				$condicion = array(
						'id_rango' => intval($id_rango),
						'id_tipo_rango' => intval($condicion),
						'valor' => intval($valores[$i]),
						'condicion_red' => $condicion_red[$i],
						'nivel_red' => intval($nivel_red[$i]),
				);
				array_push($condicionRango, $condicion);
				$i = $i + 1;
			}
		}		
	foreach ($condicionRango as $condicion) {
		$this->db->insert("cross_rango_tipos",$condicion);
	}
}
function actualizar_condicion_rango($id_rango,$condiciones,$valores,$condicion_red,$nivel_red){
		$this->kill_cross_rango();
		$condicionRango = array();
		$i = 0;
		foreach ($condiciones as $condicion){
			if($valores[$i] != ''){
				$condicion = array(
						'id_rango' => intval($id_rango),
						'id_tipo_rango' => intval($condicion),
						'valor' => intval($valores[$i]),
						'condicion_red' => $condicion_red[$i],
						'nivel_red' => intval($nivel_red[$i]),
				);
				array_push($condicionRango, $condicion);
				$i = $i + 1;
			}
		}		
	foreach ($condicionRango as $condicion) {
		$this->db->insert("cross_rango_tipos",$condicion);
	}
}


function get_cat_rangos(){
			$q=$this->db->query("select * from cat_rango");
		return $q->result();
}
function get_rangos_id($id){
	$rangos=$this->db->query('select * from cat_rango where id_rango='.$id.'');
	return $rangos->result();
}
function actualizar_rangos(){
	$datos=array('nombre' =>$_POST['nombre'] ,
				 'descripcion' =>$_POST['descripcion'],
				 'condicion_red_afilacion' =>$_POST['condicion_red_afilacion']
	 );
		$this->db->where('id_rango', $_POST['id']);
		$this->db->update('cat_rango', $datos);
		return true;
}
function validar_rango_bono($id_rango){
	$query = $this->db->query('select * from cat_bono_condicion where id_rango='.$id_rango.'');

return $query->result();
}
function kill_rangos(){
	$this->db->query("delete from cat_rango where id_rango=".$_POST["id"]);
}
function kill_cross_rango(){
$this->db->query("delete from cross_rango_tipos where id_rango=".$_POST["id"]);
}
function cambiar_estado_rangos(){
	$this->db->query("update cat_rango set estatus = '".$_POST['estado']."' where id_rango=".$_POST["id"]);
		return true;
}
function get_cross_rango($id_rangos){
	$rangos=$this->db->query('select * from cross_rango_tipos where id_rango='.intval($id_rangos).'');
	return $rangos->result();
}
function get_cross_rango_tipos(){
$ObtenerCrossRangoTipos=$this->db->query('select * from cross_rango_tipos');
return $ObtenerCrossRangoTipos->result();
}
function get_cat_tipo_rango(){
$ObtenerCatTipoRango=$this->db->query('select * from cat_tipo_rango');
return $ObtenerCatTipoRango->result();
} 
function eliminar_condiciones_rango($condiciones){
	
	$this->db->query('delete from cross_rango_tipos where id_rango='.$_POST["id"].' and id_tipo_rango not in ('.$condiciones.')');

}
}
