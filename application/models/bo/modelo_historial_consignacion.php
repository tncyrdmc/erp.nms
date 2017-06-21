<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modelo_historial_consignacion extends CI_Model{

	function __construct() {
		parent::__construct();
	}
	
	function ListarHistorialPendiente(){
		$q = $this->db->query("SELECT cpb.id, cpb.fecha, concat(u.id,'. ', up.nombre,' ',up.apellido) as usuario, u.email, cb.descripcion as banco, cb.clave, cb.swift,cb.otro, cb.dir_postal, cb.cuenta, (cpb.valor+c.gastos) valor, cpb.id_venta,'Pendiente' as estado, cpb.id_usuario
								FROM cuenta_pagar_banco_historial cpb, user_profiles up, users u, cat_banco cb, canal c
								where cpb.id_banco = cb.id_banco 
								and cpb.id_usuario = u.id 
								and up.user_id = u.id 
								and cpb.estatus = 'DES'
								and c.id = 1");
		$historial = $q->result();
		return $historial;
	}
	
	function ListarHistorialPagados($inicio,$fin){
		$q = $this->db->query("SELECT cpb.id, cpb.fecha, concat(u.id,'. ', up.nombre,' ',up.apellido) as usuario, u.email, cb.descripcion as banco, cb.cuenta, cpb.valor, cpb.id_venta,'Pendiente' as estado, cpb.id_usuario
								FROM cuenta_pagar_banco_historial cpb, user_profiles up, users u, cat_banco cb
								where cpb.id_banco = cb.id_banco
								and cpb.id_usuario = u.id
								and up.user_id = u.id and cpb.fecha BETWEEN '".$inicio."' AND '".$fin."'
								and cpb.estatus = 'ACT'");
		$historial = $q->result();
		return $historial;
	}
	
	function ListarPagosOnline($inicio,$fin){
		$q = $this->db->query("SELECT v.id_venta,concat(u.id,'. ', up.nombre,' ',up.apellido) as usuario, u.email,cvm.costo_total as valor,v.fecha,v.id_metodo_pago as metodo  FROM venta v , cross_venta_mercancia cvm , user_profiles up, users u
								where v.id_metodo_pago!='BANCO'
								and v.id_venta=cvm.id_venta
								and v.id_user = u.id
								and up.user_id = u.id and v.fecha BETWEEN '".$inicio."' AND '".$fin."'
								");
		$historial = $q->result();
		return $historial;
	}
	
	function CambiarEstadoPago($id_venta, $id_historial){
		$q = $this->db->query("update venta set id_estatus = 'ACT' where id_venta = ".$id_venta);
		$q = $this->db->query("update cuenta_pagar_banco_historial set estatus = 'ACT' where id = ".$id_historial);
		return true;
	}
	
	function CambiarEstadoCancelado($id_venta){
		$q = $this->db->query("delete from cuenta_pagar_banco_historial where id_venta = ".$id_venta);
		$q = $this->db->query("delete from cross_venta_mercancia where id_venta = ".$id_venta);
		$q = $this->db->query("delete from factura where id_venta = ".$id_venta);
		$q = $this->db->query("delete from venta where id_venta = ".$id_venta);
		return true;
	}
	
	function getEstadoPagoBanco($id_venta){
		$q = $this->db->query("SELECT * FROM cuenta_pagar_banco_historial 
								where id_venta=".$id_venta." 
								and estatus ='DES'");
		return  $q->result();
	}
	
	function PagoBanco($id){
		$q = $this->db->query("SELECT * FROM cuenta_pagar_banco_historial where id = ".$id);
		$historial = $q->result();
		return $historial;
	}
	
	function getDatosPagoBanco($id_venta){
		$q = $this->db->query("SELECT * FROM cuenta_pagar_banco_historial where id_venta = ".$id_venta." and estatus='DES'");
		$historial = $q->result();
		return $historial;
	}
	
	function MercanciaPago($id_venta){
		$q = $this->db->query("SELECT id_mercancia, cantidad FROM cross_venta_mercancia where id_venta = ".$id_venta);
		$venta_mercancia = $q->result();
		return $venta_mercancia;
		
	}
	
	function Datos_Email($id_historial){
		$q = $this->db->query("SELECT cpb.id_venta ,cpb.fecha, u.username , up.nombre ,up.apellido, u.email, cb.descripcion as banco, cb.cuenta, cpb.valor
FROM cuenta_pagar_banco_historial cpb, user_profiles up, users u, cat_banco cb
where cpb.id_banco = cb.id_banco and cpb.id_usuario = u.id and up.user_id = u.id and cpb.id = ".$id_historial);
		$historial = $q->result();
		return $historial;
	}
	
	function ConsultarPagosBanco($id, $inicio, $fin){
		$q = $this->db->query("SELECT cpb.id, cpb.fecha, cb.descripcion as banco, cb.cuenta, cb.clave, cb.swift, cb.otro, cb.dir_postal, cpb.valor,cpb.estatus as estado
FROM cuenta_pagar_banco_historial cpb, cat_banco cb
where cpb.id_banco = cb.id_banco and cpb.id_usuario =".$id." and fecha between '".$inicio." 00:00:00' and '".$fin." 23:59:59'");
		$historial = $q->result();
		return $historial;
	}
	
	function comprovarCompraWebPersonal($id_venta){
		$q = $this->db->query("select id_comprador from cross_comprador_venta where id_venta = ".$id_venta);
		$historial = $q->result();
		if(isset($historial[0]->id_comprador)){
			return true;
		}else{
			return false;
		}
	}
	
	function consultar_venta(){
		$q = $this->db->query("SELECT cpb.id, cpb.fecha, cb.descripcion as banco, cb.cuenta, cb.clave, cpb.valor ,cs.descripcion as estado
FROM cuenta_pagar_banco_historial cpb, cat_banco cb, cat_estatus cs
where cpb.id_banco = cb.id_banco and cs.id_estatus = cpb.estatus and cpb.id_usuario =".$id." and fecha between '".$inicio." 00:00:00' and '".$fin." 23:59:59'");
		$historial = $q->result();
		return $historial;
	}
}
