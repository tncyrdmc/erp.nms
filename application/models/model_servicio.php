<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_servicio extends CI_Model{

	function __construct() {
		parent::__construct();


	}

	function listarTodos()
	{
		$q=$this->db->query('select * from servicio');
		return $q->result();
	}
	
	function listar_todos_por_red()
	{
		$q=$this->db->query('select S.id, S.nombre,S.id_red,TP.nombre nombre_red from servicio S, tipo_red TP where S.id_red = TP.id order by (TP.id)');
		return $q->result();
	}
	
	function listar_todos_por_venta_y_fecha($inicio, $fin)
	{
		
		$q=$this->db->query('select V.id_venta,U.id as id_usuario,U.username,UP.nombre as name,UP.apellido as lastname,sum(CVM.costo_total) as costo
							,sum(CVM.impuesto_unidad*CVM.cantidad) as impuestos,(select sum(valor) from comision where id_venta=V.id_venta)as comision
							from venta V, cross_venta_mercancia CVM, mercancia M,users U , user_profiles UP
							where M.id = CVM.id_mercancia 
							and CVM.id_venta = V.id_venta
							and UP.user_id = U.id 
							and V.id_user = U.id 
							and(V.id_estatus="ACT")
							and DATE(V.fecha) BETWEEN "'.$inicio.'" AND "'.$fin.'"
							group by (V.id_venta)
							order by (V.id_venta)');
		return $q->result();
		
	}
	
	function listar_cobros_comisiones($inicio, $fin)
	{
	
		$q=$this->db->query("SELECT c.id_cobro,c.fecha,concat(u.id,'. ', up.nombre,' ',up.apellido) as usuario, u.email
							,c.banco,c.cuenta,c.titular,c.clabe,c.id_metodo,c.id_estatus,c.monto FROM cobro c,users u ,user_profiles up
							where u.id=c.id_user
							and up.user_id=u.id
							and DATE(c.fecha) BETWEEN '".$inicio."' AND '".$fin."' order by c.id_cobro
							"); 
		return $q->result();
	
	}
	
        function listar_cedi_personales($inicio,$fin,$id){
            
            $query = "SELECT 
                            V.id_venta,
                            V.fecha AS fecha,
                            U.username,
                            UP.nombre AS name,
                            UP.apellido AS lastname,
                            (C.costo - C.iva)  AS costo,
                            C.iva AS impuestos,
                            C.puntos
                        FROM
                            venta V,
                            pos_venta C,
                            mercancia M,
                            users U,
                            user_profiles UP
                        WHERE
                                C.id_venta = V.id_venta
                                AND UP.user_id = U.id
                                AND V.id_user = U.id
                                AND V.id_metodo_pago = 'CEDI'
                                AND (V.id_estatus = 'ACT')
                                AND (U.id = ".$id.")
                                AND DATE(V.fecha) BETWEEN '".$inicio." 00:00:00' AND '".$fin." 23:59:59'
                        GROUP BY (V.id_venta)
                        ORDER BY (V.id_venta)";
            $q=$this->db->query($query);
            return $q->result();
        }
        
	function listar_todos_por_venta_y_fecha_usuario($inicio, $fin,$id_usuario)
	{
	
		$q=$this->db->query('select V.id_venta,V.fecha as fecha,U.username,UP.nombre as name,UP.apellido as lastname,sum(CVM.costo_total) as costo
							,sum(CVM.impuesto_unidad*CVM.cantidad) as impuestos,(select sum(valor) from comision where id_venta=V.id_venta)as comision
							from venta V, cross_venta_mercancia CVM, mercancia M,users U , user_profiles UP
							where M.id = CVM.id_mercancia
							and CVM.id_venta = V.id_venta
							and UP.user_id = U.id
							and V.id_user = U.id
							and(V.id_estatus="ACT")
							and(U.id='.$id_usuario.')
							and DATE(V.fecha) BETWEEN "'.$inicio.'" AND "'.$fin.'"
							group by (V.id_venta)
							order by (V.id_venta)');
		return $q->result();
	
	}
	
	function listar_todos_por_venta_y_fecha_por_red_usuario($inicio, $fin,$id_usuario)
	{
	
		$q=$this->db->query('select U.id as id_usuario,V.id_venta,U.username,UP.nombre as name,UP.apellido as lastname,CVM.costo_total as costo
							,CVM.impuesto_unidad*CVM.cantidad as impuestos,sum(C.valor) as comision
							from venta V, cross_venta_mercancia CVM, mercancia M, comision C ,users U , user_profiles UP, afiliar e
							where M.id = CVM.id_mercancia
							and CVM.id_venta = V.id_venta
							and C.id_venta = V.id_venta
							and UP.user_id = U.id
							and V.id_user = U.id
							and C.id_venta = V.id_venta
							and (C.id_afiliado != 0) and (C.id_afiliado != 1)
							and(V.id_estatus="ACT")
							and DATE(V.fecha) BETWEEN "'.$inicio.'" AND "'.$fin.'"
							and e.id_afiliado=a.id and tr.id=e.id_red and e.debajo_de='.$id_usuario.'
							group by (V.id_venta)
							order by (V.id_venta)');
		return $q->result();
	
	}
	
	function listar_todos_por_venta()
	{
	
		$q=$this->db->query('select S.id, S.nombre, S.id_red, TP.nombre nombre_red, CVM.cantidad, V.costo, V.impuesto, sum(C.valor) comision
	
							from servicio S, tipo_red TP, venta V, cross_venta_mercancia CVM, mercancia M, comision C
				
							where S.id_red = TP.id and S.id = M.sku and M.id = CVM.id_mercancia and CVM.id_venta = V.id_venta
							 and C.id_venta = V.id_venta 
				
							group by (V.id_venta)
				
							order by (V.id_venta) ');
		return $q->result();
	
	}
	
}
