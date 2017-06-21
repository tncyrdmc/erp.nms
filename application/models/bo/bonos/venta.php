<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class venta extends CI_Model
{


	private $id_venta;
	private $id_usuario;
	private $estatus;
	private $fecha;
	private $mercancia;

	function setUpVenta($id_venta){
		$q=$this->db->query("SELECT id_venta,id_mercancia,costo_total FROM cross_venta_mercancia where id_venta=".$id_venta);
		$datosMercancias=$q->result();

		$datosVentaMercancia=array();
		foreach ($datosMercancias as $valores){
			
			$q=$this->db->query("SELECT puntos_comisionables  FROM mercancia where id=".$valores->id_mercancia);
			$datosMercanciaPuntos=$q->result();
			
			$datosMercancias = array(
					'id_mercancia' => $valores->id_mercancia,
					'costo_total'   => $valores->costo_total,
					'puntos_comisionables'=>$datosMercanciaPuntos[0]->puntos_comisionables
					
			);
			array_push($datosVentaMercancia,$datosMercancias);
		}


		
		$q=$this->db->query("SELECT id_venta,id_user as id_usuario,id_estatus as estatus,fecha  FROM venta where id_venta=".$id_venta);
		$datosVenta=$q->result();
		
		$this->setIdVenta($datosVenta[0]->id_venta);
		$this->setIdUsuario($datosVenta[0]->id_usuario);
		$this->setEstatus($datosVenta[0]->estatus);
		$this->setFecha($datosVenta[0]->fecha);
		$this->setMercancia($datosVentaMercancia);

	}
	
	function  nuevaVenta($datosVenta){

		$this->setIdVenta($datosVenta["id_venta"]);
		$this->setIdUsuario($datosVenta["id_usuario"]);
		$this->setEstatus($datosVenta["estatus"]);
		$this->setFecha($datosVenta["fecha"]);
		$this->setMercancia($datosVenta["mercancia"]);
	}
	
	function ingresarVenta() {
		$this->insertarVenta($this->id_venta,$this->id_usuario,
										  $this->estatus,$this->fecha,$this->mercancia);
	}
	
	function limpiarVenta() {
		$this->eliminarVentas();
	}
	
	function insertarVenta($id_venta,$id_usuario,$estatus,$fecha,$mercancia){
		$datos = array(
				'id_venta' => $id_venta,
				'id_user' => $id_usuario,
				'id_estatus'    => $estatus,
				'fecha'=>$fecha
				
		);
		$this->db->insert('venta',$datos);

		foreach ($mercancia as $merca){
			$datos = array(
					'id_venta' => $id_venta,
					'id_mercancia' => $merca["id_mercancia"],
					'costo_total'    => $merca["costo_total"]
			
			);
			$this->db->insert('cross_venta_mercancia',$datos);
		}
	}

	function eliminarVentas(){
		$this->db->query('delete from venta where id_venta >= 700');
		$this->db->query('delete from cross_venta_mercancia where id_venta >= 700');
	}
	public function getIdVenta() {
		return $this->id_venta;
	}
	public function setIdVenta($id_venta) {
		$this->id_venta = $id_venta;
		return $this;
	}
	public function getIdUsuario() {
		return $this->id_usuario;
	}
	public function setIdUsuario($id_usuario) {
		$this->id_usuario = $id_usuario;
		return $this;
	}
	public function getEstatus() {
		return $this->estatus;
	}
	public function setEstatus($estatus) {
		$this->estatus = $estatus;
		return $this;
	}
	public function getFecha() {
		return $this->fecha;
	}
	public function setFecha($fecha) {
		$this->fecha = $fecha;
		return $this;
	}
	public function getMercancia() {
		return $this->mercancia;
	}
	public function setMercancia($mercancia) {
		$this->mercancia = $mercancia;
		return $this;
	}
	
	
}
