<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//header('Content-Type: text/html; charset-utf-8');
//header('Content-Type: text/html; charset=ISO-8859-1');
class model_inventario extends CI_Model
{
	function setDocumento()
	{
		$dato_documento=array(
				"nombre"     => $_POST['nombre'],
				"estatus"     => 'ACT',
            );
             $this->db->insert("documento_inventario",$dato_documento);
	}
	function setMovimiento()
	{
		$dato_documento=array(
				"nombre"     => $_POST['nombre'],
				"estatus"     => 'ACT',
		);
		$this->db->insert("movimiento_inventario",$dato_documento);
	}
	function Obtener_Almacen($almacen){
		$q=$this->db->query('select * from cedi where tipo  = "'.$almacen.'"');
		return $q->result();
	}
	function Obtener_Proveedor($almacen){
		$q=$this->db->query('select p.id_proveedor id_cedi,concat(p.nombre," ",p.apellido) nombre from proveedor_datos p group by p.id_proveedor');
		return $q->result();
	}
	
	function Obtener_Producto_Almacen($almacen,$item){
		
		$query = "SELECT
						    m.id item, p.*, i.*, m.`real`, m.costo, m.costo_publico
						FROM
						    mercancia m,
						    producto p,
						    inventario i
						WHERE
								i.id_mercancia = m.sku
								AND p.id = m.sku
						        AND m.id = '".$item."'
						        AND i.id_almacen = '".$almacen."'
						GROUP BY p.id , p.nombre";
		
		$q=$this->db->query($query);
		return $q->result();
	}
	
	function Obtener_Productos_Almacen($almacen){
		$query="SELECT
								    m.id item,
								    p.*,
								    i.*,
								    m.`real`,
								    m.costo,
								    m.costo_publico,
								    t.id id_red,
								    t.nombre red
								FROM
								    inventario i,
								    mercancia m,
								    producto p,
								    items vi,
								    tipo_red t
								WHERE
								    i.id_mercancia = m.sku
								    	AND p.id = m.sku
								        AND vi.id = m.id
								        AND t.id = vi.red
								        AND m.id_tipo_mercancia = 1
								        AND i.id_almacen = ".$almacen."
								GROUP BY p.id , p.nombre
								ORDER BY p.id";
		$q=$this->db->query($query);
		return $q->result();
	}
	
	function getAlldocumento(){
		$q=$this->db->query('select * from documento_inventario ');
		return $q->result();
	}
	function getMovimientos(){
		$q=$this->db->query('select * from movimiento_inventario');
		return $q->result();
	}
	function getAlmacenesCedi(){
		$q=$this->db->query("select
								    id_cedi,
								    nombre,
								    (case
								        when (tipo = 'C') then 'CEDI'
								        else 'Almacén'
								    end) tipo
								from
								    cedi");
		return $q->result();
	}
	function getAlmacenesCediProveedores(){
		$q=$this->db->query("select
								    id_cedi,
								    nombre,
								    (case
								        when (tipo = 'C') then 'CEDI'
								        else 'Almacén'
								    end) tipo
								from
								    cedi
								union select
								    id_proveedor, concat(nombre, ' ', apellido), 'Proveedor'
								from
								    proveedor_datos
								group by id_proveedor");
		return $q->result();
	}
	function updateEstatusdocumento(){
		$datos = array(
				'estatus' => $_POST['estado'],
				
		);
		$this->db->where('id_doc', $_POST['id']);
		$this->db->update('documento_inventario', $datos);
	}
	function statusMovimiento(){
		$datos = array(
				'estatus' => $_POST['estado'],
	
		);
		$this->db->where('id_doc', $_POST['id']);
		$this->db->update('movimiento_inventario', $datos);
	}
   function kill_Documento(){
      	$q=$this->db->query('delete from documento_inventario where id_doc ='.$_POST['id']);
   }
   function killMovimiento(){
      	$q=$this->db->query('delete from movimiento_inventario where id_doc ='.$_POST['id']);
   }
   function getDocumento($id){
       	$q=$this->db->query('select * from documento_inventario where id_doc ='.$_POST['id']);
     	return $q->result();
   }
   function getMovimiento($id){
   	$q=$this->db->query('select * from movimiento_inventario where id_doc ='.$_POST['id']);
   	return $q->result();
   }
   function getProductos(){
   	$q=$this->db->query('select m.id, p.*,t.nombre red 
   							from producto p, mercancia m ,tipo_red t,items i 
   							where p.id = m.sku 
   								and m.id = i.id 
   								and t.id = i.red');
   	return $q->result();
   }
   
   function update_Documento(){
   	$datos = array(
   			'nombre' => $_POST['nombre'],
   	
   	);
   	$this->db->where('id_doc', $_POST['id']);
   	$this->db->update('documento_inventario', $datos);
   }
   function updateMovimiento(){
   	$datos = array(
   			'nombre' => $_POST['nombre'],
   
   	);
   	$this->db->where('id_doc', $_POST['id']);
   	$this->db->update('movimiento_inventario', $datos);
   }
   function ingresar_inventario($datos){
   	$this->db->insert("inventario",$datos);
   	return $this->db->insert_id();
   }
   function ingresar_inventario_historial($datos){
   	$this->db->insert("inventario_historial",$datos);
  }
  
  function consultar_en_inventario($mercancia,$destino){
  	$query = "SELECT 
                        i.*
                    FROM
                        inventario i ,
                    	mercancia m
                    WHERE
                        i.id_almacen = $destino 
                        AND i.id_mercancia = m.sku  
						AND m.id_tipo_mercancia = 1 
                    	AND m.id = ".$mercancia;
	$q=$this->db->query($query);
  	return $q->result();
  }

  function getProductos_en_inventario(){
  	$q=$this->db->query('select m.id,p.nombre ,t.nombre red 
  								from producto p ,inventario n,mercancia m, tipo_red t,items i 
  								where p.id=m.sku 
  									and m.id = n.id_mercancia 
  									and m.id = i.id 
   									and t.id = i.red
  								group by p.id,p.nombre ');
  	return $q->result();
  }
  function getAlmacen_en_inventario(){
  	$q=$this->db->query("SELECT 
  								c.id_cedi,c.nombre,c.descripcion,c.estatus,c.tipo,
  									(case
								        when (tipo = 'C') then 'CEDI'
								        else 'Almacén'
								    end) tipo_nombre 
  							FROM inventario n,cedi c 
  							where c.id_cedi=n.id_almacen group by c.id_cedi,c.nombre");
  	return $q->result();
  }

	function update_bloqueados(){
	   	$this->db->query('update inventario set bloqueados = '.$_POST['bloqueados'].' where id_almacen = '.$_POST['id_cedi'].' and id_mercancia = '.$_POST['mercancia'].'');
  	}
  	function historial_entradas($inicio,$fin,$tipo){
  	$q=$this->db->query("select i.id_inventario_historial,i.fecha,i.otro_origen,
 			i.id_destino,i.id_origen,i.cantidad,i.id_documento,i.id_mercancia
 			from inventario_historial i
             where i.fecha between '".$inicio." 00:00:00' and '".$fin." 23:59:59' and i.tipo = '".$tipo."' ");
  	return $q->result();
  	}
  	
  	function consultar_almacen($id){
  		$q=$this->db->query('SELECT * from cedi where id_cedi='.$id);
  		return $q->result();
  	}
  	
  	function historial_entradas_salida($inicio,$fin){
  		$query = "select i.id_inventario_historial,i.fecha,i.otro_origen,
 			i.id_destino,i.id_origen,i.cantidad,i.id_documento,i.id_mercancia,i.tipo
 			from inventario_historial i
             where i.fecha between '".$inicio." 00:00:00' and '".$fin." 23:59:59' ";
  		$q=$this->db->query($query);
  		return $q->result();
  	}

}