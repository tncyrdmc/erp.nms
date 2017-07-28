<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_reportes_logistico extends CI_Model
{
	function inventario(){
		$q = $this->db->query("SELECT i.id_inventario, a.nombre almacen, i.id_mercancia, p.nombre producto, i.cantidad, i.bloqueados, i.estatus 
				FROM inventario i, cedi a, producto p
				where i.id_almacen = a.id_cedi and p.id = i.id_mercancia order by a.nombre");
		
		$inventario = $q->result();
		return $inventario;
	}
}
