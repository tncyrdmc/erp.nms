<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mercancia extends CI_Model
{


	private $id_mercancia;
	private $sku;
	private $id_tipo_mercancia;
	private $costo;
	private $puntos_comisionables;
	
	private $id_categoria;
	private $id_red;

	function setUpMercancia($id_Mercancia){
		$q=$this->db->query("SELECT id as id_mercancia,id_tipo_mercancia,costo,puntos_comisionables  FROM mercancia where id=".$id_Mercancia);
		$datosMercancia=$q->result();
		
		$this->setIdMercancia($datosMercancia[0]->id_mercancia);
		$this->setSku($datosMercancia[0]->id_mercancia);
		$this->setIdTipoMercancia($datosMercancia[0]->id_tipo_mercancia);
		$this->setCosto($datosMercancia[0]->costo);
		$this->setPuntosComisionables($datosMercancia[0]->puntos_comisionables);

		$q=$this->db->query("SELECT categoria,red  FROM items where id=".$datosMercancia[0]->id_mercancia);
		$datosTipoMercancia=$q->result();
		
		$this->setIdCategoria($datosTipoMercancia[0]->categoria);
		$this->setIdRed($datosTipoMercancia[0]->red);
		
	}
	
	function  nuevaMercancia($datosMercancia){

		$this->setIdMercancia($datosMercancia["id_mercancia"]);
		$this->setSku($datosMercancia["id_mercancia"]);
		$this->setIdTipoMercancia($datosMercancia["id_tipo_mercancia"]);
		$this->setCosto($datosMercancia["costo"]);
		$this->setPuntosComisionables($datosMercancia["puntos_comisionables"]);
		$this->setIdCategoria($datosMercancia["id_categoria"]);
		$this->setIdRed($datosMercancia["id_red"]);
	}
	
	function ingresarMercancia() {
		$this->insertarMercancia($this->id_mercancia,$this->id_tipo_mercancia,$this->id_categoria,$this->id_red,
										  $this->costo,$this->puntos_comisionables);
	}
	
	function ingresarCategoria($datosCategoria) {
		$datos = array(
				'id_grupo' => $datosCategoria["id_categoria"],
				'id_red'   => $datosCategoria["id_red"],
				'descripcion'=>'Categoria Mercancias',
				'estatus'=>'ACT'
				
		);
		$this->db->insert('cat_grupo_producto',$datos);
	}
	
	function limpiarMercancia() {
		$this->eliminarMercancia();
	}
	
	function insertarMercancia($id_mercancia,$id_tipo_mercancia,$id_categoria,$id_red,$costo,$puntos_comisionables){
	$datos = array(
				'id' => $id_mercancia,
				'sku' => $id_mercancia,
				'sku_2' => $id_mercancia,
				'id_tipo_mercancia'   => $id_tipo_mercancia,
				'pais' => "AAA",
				'estatus' => "ACT",
				'id_proveedor' => "0",
				'real'    => $costo,
				'costo'    => $costo,
				'costo_publico'    => $costo,
				'entrega'    =>0,
				'iva'    =>"MAS",
				'descuento'    =>"0",
				'puntos_comisionables'=>$puntos_comisionables
				
		);
		
		$this->ingresarTipoMercancia ( $id_mercancia, $id_tipo_mercancia, $id_categoria);

		
		$this->db->insert('mercancia',$datos);
		
		
		$datos = array(
				'id_mercancia' => $id_mercancia,
				'id_cat_imagen' => "10000",
		
		);
		
		$this->db->insert('cross_merc_img',$datos);
	}

	private function ingresarTipoMercancia($id_mercancia, $id_tipo_mercancia, $id_categoria) {
		if($id_tipo_mercancia==1){
			$datos = array(
					'id' => $id_mercancia,
					'id_grupo'   => $id_categoria
			
			);
			$this->db->insert('producto',$datos);
			
		}else if($id_tipo_mercancia==2){
			$datos = array(
					'id' => $id_mercancia,
					'id_red'   => $id_categoria
			
			);
			$this->db->insert('servicio',$datos);
		}else if($id_tipo_mercancia==3){
			$datos = array(
					'id' => $id_mercancia,
					'id_red'   => $id_categoria
			
			);
			$this->db->insert('combinado',$datos);
		}else if($id_tipo_mercancia==4){
			$datos = array(
					'id_paquete' => $id_mercancia,
					'id_red'   => $id_categoria
			
			);
			$this->db->insert('paquete_inscripcion',$datos);
		}else if($id_tipo_mercancia==5){
			$datos = array(
					'id' => $id_mercancia,
					'id_red'   => $id_categoria
			
			);
			$this->db->insert('membresia',$datos);
		}
	 }


	function eliminarMercancias(){
		$this->db->query('delete from mercancia where id >= 1');
		$this->db->query('delete from producto where id >= 1');
		$this->db->query('delete from servicio where id >= 1');
		$this->db->query('delete from combinado where id >= 1');
		$this->db->query('delete from paquete_inscripcion where id_paquete >= 1');
		$this->db->query('delete from membresia where id >= 1'); 
		$this->db->query('delete from cross_merc_img where id_mercancia >= 1');
	}
	function eliminarCategorias(){
		$this->db->query('delete from cat_grupo_producto where id_grupo >= 1');
	}
	
	public function getIdMercancia() {
		return $this->id_mercancia;
	}
	public function setIdMercancia($id_mercancia) {
		$this->id_mercancia = $id_mercancia;
		return $this;
	}
	public function getIdTipoMercancia() {
		return $this->id_tipo_mercancia;
	}
	public function setIdTipoMercancia($id_tipo_mercancia) {
		$this->id_tipo_mercancia = $id_tipo_mercancia;
		return $this;
	}
	public function getCosto() {
		return $this->costo;
	}
	public function setCosto($costo) {
		$this->costo = $costo;
		return $this;
	}
	public function getPuntosComisionables() {
		return $this->puntos_comisionables;
	}
	public function setPuntosComisionables($puntos_comisionables) {
		$this->puntos_comisionables = $puntos_comisionables;
		return $this;
	}
	public function getIdCategoria() {
		return $this->id_categoria;
	}
	public function setIdCategoria($id_categoria) {
		$this->id_categoria = $id_categoria;
		return $this;
	}
	public function getIdRed() {
		return $this->id_red;
	}
	public function setIdRed($id_red) {
		$this->id_red = $id_red;
		return $this;
	}
	public function getSku() {
		return $this->sku;
	}
	public function setSku($sku) {
		$this->sku = $sku;
		return $this;
	}

}
