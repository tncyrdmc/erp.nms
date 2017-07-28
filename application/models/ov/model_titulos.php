<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class model_titulos extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertar($id, $titulo) {
        $dato_rango = array(
            "id_user" => $id,
            "id_rango" => $titulo ? $titulo : 0,
            "entregado" => 1,
            "estatus" => "ACT"
        );

        $this->db->insert("cross_rango_user", $dato_rango);
    }

    function getTitulo($id) {
        $titulos = $this->db->query('select * from cross_rango_user where id_user=' . $id . '');
        $titulo = $titulos->result();
        return isset($titulo)||isset($titulo[0]->id_rango) ? 0 : $titulo[0]->id_rango;
    }

    function actualizar($id, $id_titulo) {
        
        $isTitulo=$this->getTitulo($id);
        
        if ($isTitulo>=0) {
            $titulo = array(
                "id_user" => $id,
                "id_rango" => $id_titulo,
                "entregado" => 1,
                "estatus" => "ACT"
            );

            $this->db->where('id_user', $id);
            $this->db->update('cross_rango_user', $titulo);
        } else {
            $this->insertar($id, $id_titulo);
        }
        
        return true;
        
    }

}
