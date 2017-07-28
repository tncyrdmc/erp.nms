<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_titulos extends CI_Model
{

function ingresar_titulo(){

		$titulo = array(
				'orden' => $_POST['orden'],
				'nombre' => $_POST['nombre'],
				'descripcion' => $_POST['descripcion'],
				'frecuencia' => $_POST['frecuencia'],
				'tipo' => $_POST['tipo'],
				'condicion_red_afilacion' => $_POST['condicion_red_afilacion'],
				'porcentaje' => $_POST['porcentaje'],
				'valor' => $_POST['valor'],
				'ganancia' => $_POST['ganancia']
		);

	$this->db->insert("cat_titulo",$titulo);

}

function get_cat_titulos(){
			$q=$this->db->query("select * from cat_titulo");
		return $q->result();
}
function get_titulos_id($id){
	$titulos=$this->db->query('select * from cat_titulo where id='.$id.'');
	return $titulos->result();
}
function actualizar_titulos(){
		$titulo = array(
				'orden' => $_POST['orden'],
				'nombre' => $_POST['nombre'],
				'descripcion' => $_POST['descripcion'],
				'frecuencia' => $_POST['frecuencia'],
				'tipo' => $_POST['tipo'],
				'condicion_red_afilacion' => $_POST['condicion_red_afilacion'],
				'porcentaje' => $_POST['porcentaje'],
				'valor' => $_POST['valor'],
				'ganancia' => $_POST['ganancia']
		);
		$this->db->where('id', $_POST['id']);
		$this->db->update('cat_titulo', $titulo);
		return true;
}

function kill_titulos(){
	$this->db->query("delete from cat_titulo where id=".$_POST["id"]);
}
}
