<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class repartidor_comision_bono extends CI_Model
{

	private $id;
	private $id_bono;
	private $dia;
	private $mes;
	private $ano;
	private $fecha;

	private $id_transaccion;
	private $id_usuario;
	private $valor;

	
	function setUpHistorial($id_historial){
		$q=$this->db->query("SELECT * FROM comision_bono_historial where id=".$id_historial);
		$datosHistorial=$q->result();
		
		$this->setId(intval($datosHistorial[0]->id));
		$this->setIdBono(intval($datosHistorial[0]->id_bono));
		$this->setDia(intval($datosHistorial[0]->dia));
		$this->setMes(intval($datosHistorial[0]->mes));
		$this->setAno(intval($datosHistorial[0]->ano));
		$this->setFecha($datosHistorial[0]->fecha);
	}
	
	function setUpReparticionComision($id_transaccion){
		$q=$this->db->query("SELECT * FROM comision_bono where id=".$id_transaccion);
		$datosReparticion=$q->result();
		
		$this->setIdTransaccion(intval($datosReparticion[0]->id));
		$this->setIdUsuario(intval($datosReparticion[0]->id_usuario));
		$this->setValor($datosReparticion[0]->valor);

	}
	
	function ingresarHistorialComisionBono($id,$id_bono,$dia,$mes,$ano,$fecha){

		$datos = array(
				'id' => $id,
				'id_bono'   => $id_bono,
				'dia'    => $dia,
				'mes'    => $mes,
				'ano' => $ano,
				'fecha' => $fecha
		);
		$this->db->insert('comision_bono_historial',$datos);
		return $this->db->insert_id();;
	}
	
	function repartirComisionBono($id_transaccion,$id_usuario,$id_bono,$id_bono_historial,$valor){
		$datos = array(
				'id' => $id_transaccion,
				'id_usuario'   => $id_usuario,
				'id_bono'    => $id_bono,
				'id_bono_historial'    => $id_bono_historial,
				'valor' => $valor
		);
		$this->db->insert('comision_bono',$datos);
	}

	
	function eliminarHistorialComisionBono(){
		$this->db->query('delete from comision_bono_historial where id >= 1');
		$this->db->query('delete from comision_bono where id >= 1');
	}
	
	function getValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario){
		$q=$this->db->query("SELECT * FROM comision_bono where id_bono=".$id_bono." and id_usuario=".$id_usuario);
		$datosTransaccion=$q->result();
		return $datosTransaccion;
	}
	
	function getTotalValoresTransaccionPorBonoYUsuario($id_bono,$id_usuario){
		$q=$this->db->query("SELECT sum(valor) as total,id_usuario FROM comision_bono where id_bono=".$id_bono." and id_usuario=".$id_usuario);
		$datosTransaccion=$q->result();
		return $datosTransaccion;
	}
	

	public function getIdTransaccionPagoBono(){
		$q=$this->db->query("SELECT id FROM comision_bono order by id desc limit 0,1");
		$idTransaccion=$q->result();
		if($idTransaccion==NULL)
			return 1;
		return $idTransaccion[0]->id+1;
	
	}
	
	public function getIdHistorialTransaccion(){
		$q=$this->db->query("SELECT id FROM comision_bono_historial order by id desc limit 0,1");
		$idTransaccion=$q->result();
		if($idTransaccion==NULL)
			return 1;
		return $idTransaccion[0]->id+1;
	
	}

	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getIdBono() {
		return $this->id_bono;
	}
	public function setIdBono($id_bono) {
		$this->id_bono = $id_bono;
		return $this;
	}
	public function getDia() {
		return $this->dia;
	}
	public function setDia($dia) {
		$this->dia = $dia;
		return $this;
	}
	public function getMes() {
		return $this->mes;
	}
	public function setMes($mes) {
		$this->mes = $mes;
		return $this;
	}
	public function getAno() {
		return $this->ano;
	}
	public function setAno($ano) {
		$this->ano = $ano;
		return $this;
	}
	public function getFecha() {
		return $this->fecha;
	}
	public function setFecha($fecha) {
		$this->fecha = $fecha;
		return $this;
	}
	public function getIdTransaccion() {
		return $this->id_transaccion;
	}
	public function setIdTransaccion($id_transaccion) {
		$this->id_transaccion = $id_transaccion;
		return $this;
	}
	public function getIdUsuario() {
		return $this->id_usuario;
	}
	public function setIdUsuario($id_usuario) {
		$this->id_usuario = $id_usuario;
		return $this;
	}
	public function getValor() {
		return $this->valor;
	}
	public function setValor($valor) {
		$this->valor = $valor;
		return $this;
	}
}
