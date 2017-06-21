<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//header('Content-Type: text/html; charset-utf-8');
//header('Content-Type: text/html; charset=ISO-8859-1');
class modelo_proveedor_mensajeria extends CI_Model
{
	function ObtenerCiudadesPais($code){
		$q = $this->db->query('select * from City where CountryCode = "'.$code.'"');
		$ciudades = $q->result();
		$ciudades_dec = array();
		foreach ($ciudades as $ciudad){
			$ciu = array(
					'ID' => $ciudad->ID,
					'Name' => utf8_decode($ciudad->Name)
			);
			array_push($ciudades_dec, $ciu);
		}
		return $ciudades_dec;
	}
	
	function ObtenerDepartamentosPais($code){
		$q = $this->db->query('select * from estate where id_pais = "'.$code.'"');
		$departamentos = $q->result();
		$departamentos_dec = array();
		foreach ($departamentos as $departamento){
			$ciu = array(
					'id' => $departamento->id,
					'Name' => utf8_decode($departamento->Nombre)
			);
			array_push($departamentos_dec, $ciu);
		}
		return $departamentos_dec;
	}
	
	function ObtenerCiudadesDepartamento($code){
		$q = $this->db->query('select * from City where id_estate = '.$code);
		$ciudades = $q->result();
		$ciudades_dec = array();
		foreach ($ciudades as $ciudad){
			$ciu = array(
					'id' => $ciudad->ID,
					'Name' => utf8_decode($ciudad->Name)
			);
			array_push($ciudades_dec, $ciu);
		}
		return $ciudades_dec;
	}
	
	function obtenerProveedores(){
		$q = $this->db->query('select pm.id, pm.nombre_empresa, pm.razon_social, c.Name as pais, pm.id_pais ,pm.direccion, pm.direccion_web, pm.estatus
				from proveedor_mensajeria pm, Country c where pm.id_pais = c.Code');
		$proveedor = $q->result();
		return $proveedor;
	}
	
	function crear_proveedor_mensajeria($proveedor){
		$this->db->insert('proveedor_mensajeria',$proveedor);
		return $this->db->insert_id();
	}
	
	function crear_contacto_mensajeria($contacto){
		$this->db->insert('proveedor_contacto',$contacto);
		
	}
	
	function crear_tarifa_mensajeria($tarifa){
		$this->db->insert('proveedor_tarifas',$tarifa);
		return $this->db->insert_id();
	}
	
	function eliminar_proveedor_mensajeria($id){
		$this->db->query("delete from proveedor_mensajeria where id = ".$id);
		$this->db->query("delete from proveedor_contacto where id_proveedor = ".$id);
		//$this->db->query("delete from proveedor_tarifas where id_proveedor = ".$id);
	}
	
	function cambiar_estado_proveedor_mensajeria($id,$estado) {
		$this->db->query("update proveedor_mensajeria set estatus = '".$estado."' where id = ".$id);
	}
	
	function consultar_proveedor_mensajeria($id){
		$q = $this->db->query('select * from proveedor_mensajeria where id ='.$id);
		$proveedor = $q->result();
		return $proveedor;
	}
	
	function consultar_contactos_mensajeria($id){
		$q = $this->db->query('select * from proveedor_contacto where id_proveedor = '.$id.' order by id asc');
		$contactos = $q->result();
		return $contactos;
	}
	
	function consultar_tarifas_mensajeria($id){
		$q = $this->db->query('select pt.id, pt.id_proveedor, pt.ciudad, pt.tarifa 
				from proveedor_tarifas pt, City c 
			 	where pt.ciudad = c.ID and pt.id_proveedor ='.$id);
		$tarifas = $q->result();
		return $tarifas;
	}
	
	function actualizar_proveedor_mensajeria($proveedor, $id){
		
		$this->db->update('proveedor_mensajeria', $proveedor, array('id' => $id));
	}
	
	function actualizar_contacto_mensajeria($proveedor, $id){
		$this->db->update('proveedor_contacto', $proveedor, array('id' => $id));
	}
	
	function actualizar_tarifa_mensajeria($tarifa, $id){
		$this->crear_tarifa_mensajeria($tarifa);
	}
	
	function eliminar_tarifas($id){
		$this->db->query("delete from proveedor_tarifas where id_proveedor = ".$id);
	}
	
	function crear_departamento($departamento){
		$this->db->insert('estate',$departamento);
		return $this->db->insert_id();
	}
	
	function crear_ciudad($ciudad){
		$this->db->insert('City',$ciudad);
		return $this->db->insert_id();
	}
	
	function consultar_envios_mensajeria($id){
		$q = $this->db->query('select proveedor_mensajeria
				from cross_venta_envio
			 	where proveedor_mensajeria ='.$id);
		$proveedores = $q->result();
		if(isset($proveedores[0]->proveedor_mensajeria)){
			return true;
		}else{
			return false;
		}
	}
}
