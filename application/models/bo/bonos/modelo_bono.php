<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_bono extends CI_Model
{


	//Rango
	private $id_rango;
	private $nombre_rango;
	private $descripcion_rango;
	private $estatus_rango;
	
	// Rango Condiciones
	private $id_tipo_rango;
	private $condicion_red;
	private $nivel_red;
	private $valor;
	
	//Bono
	private $id_bono;
	private $nombre_bono;
	private $descripcion_bono;
	private $plan;
	
	//Bono Activacion
	private $inicio;
	private $fin;
	private $frecuencia;
	private $estatus_bono;
	private $mes_desde_afiliacion;
	private $mes_desde_activacion;
	
	//Bono Condiciones
	private $id_condicion;
	private $condicion_1;
	private $condicion_2;
	private $condicion_afiliados_red;
	private $id_red;
	
	//Bono Valor
	private $valoresBono=array();

	function __construct()
	{
		parent::__construct();
		$this->load->model('/bo/bonos/afiliado');
	}
	
	function  nuevoBono($datosRango,$datosBono,$datosValoresBono){
		$this->setIdRango($datosRango["id_rango"]);
		$this->setNombreRango($datosRango["nombre_rango"]);
		$this->setDescripcionRango($datosRango["descripcion_rango"]);
		$this->setIdTipoRango($datosRango["id_tipo_rango"]);
		$this->setValor($datosRango["valor"]);
		$this->setCondicionRed($datosRango["condicion_red"]);
		$this->setNivelRed($datosRango["nivel_red"]);
		$this->setIdCondicion($datosRango["id_condicion"]);
		$this->setIdRed($datosRango["id_red"]);
		$this->setCondicionAfiliadosRed($datosRango["condicion_red_afilacion"]);
		$this->setCondicion1($datosRango["condicion1"]);
		$this->setCondicion2($datosRango["condicion2"]);
		$this->setEstatusRango($datosRango["estatus_rango"]);

		$this->setIdBono($datosBono["id_bono"]);
		$this->setNombreBono($datosBono["nombre_bono"]);
		$this->setDescripcionBono($datosBono["descripcion_bono"]);
		$this->setPlan($datosBono["plan"]);
		$this->setInicio($datosBono["inicio"]);
		$this->setFin($datosBono["fin"]);
		$this->setFrecuencia($datosBono["frecuencia"]);
		$this->setMesDesdeAfiliacion($datosBono["mes_desde_afiliacion"]);
		$this->setMesDesdeActivacion($datosBono["mes_desde_activacion"]);
		$this->setEstatusBono($datosBono["estatus_bono"]);

		foreach ($datosValoresBono as $valorBono){
			$this->setValoresBono(intval($valorBono["id_valor"]),intval($valorBono["id_rango"]),
				$valorBono["condicion_red"],intval($valorBono["nivel"]),$valorBono["valor"],$valorBono["verticalidad"]);
		}
	}
	
	function nuevoBonoVariosRangos($datosTodosLosRangos,$datosBono,$datosValoresBono){

	$this->modelo_bono->insertarBono($datosBono["id_bono"],$datosBono["nombre_bono"],$datosBono["descripcion_bono"],
				$datosBono["inicio"],$datosBono["fin"],$datosBono["mes_desde_afiliacion"],
				$datosBono["mes_desde_activacion"],
				$datosBono["frecuencia"],$datosBono["plan"],$datosBono["estatus_bono"]);
		
		foreach ($datosTodosLosRangos as $datosRango){

			$this->modelo_bono->insertarRango($datosRango["id_rango"],$datosRango["nombre_rango"],$datosRango["descripcion_rango"],$datosRango["condicion_red_afilacion"],$datosRango["estatus_rango"]);
			$this->modelo_bono->insertarRangoTipo($datosRango["id_rango"],$datosRango["id_tipo_rango"],$datosRango["valor"],$datosRango["condicion_red"],$datosRango["nivel_red"]);
			
			if(!isset($datosRango["calificado"]))
				$datosRango["calificado"]="DOS";
			
			$this->modelo_bono->insertarBonoCondicion($datosRango["id_condicion"],$datosBono["id_bono"],$datosRango["id_rango"],$datosRango["id_tipo_rango"],$datosRango["valor"],$datosRango["id_red"],$datosRango["condicion1"],$datosRango["condicion2"],$datosRango["calificado"]);
		}
		
		foreach ($datosValoresBono as $valorBono){
			
			$this->setValoresBono(intval($valorBono["id_valor"]),intval($valorBono["id_rango"]),
					$valorBono["condicion_red"],intval($valorBono["nivel"]),$valorBono["valor"],$valorBono["verticalidad"]);
		}
		$this->modelo_bono->insertarBonoValor($this->getValoresBono());
	}
	
	function ingresarBono() {
		$this->modelo_bono->insertarRango($this->id_rango,$this->nombre_rango,$this->descripcion_rango,$this->condicion_afiliados_red,$this->estatus_rango);
		$this->modelo_bono->insertarRangoTipo($this->id_rango,$this->id_tipo_rango,$this->valor,$this->condicion_red,$this->nivel_red);
		$this->modelo_bono->insertarBono($this->id_bono,$this->nombre_bono,$this->descripcion_bono,$this->inicio,$this->fin,$this->mes_desde_afiliacion,$this->mes_desde_activacion,$this->frecuencia,$this->plan,$this->estatus_bono);
		$this->modelo_bono->insertarBonoCondicion($this->id_condicion,$this->id_bono,$this->id_rango,$this->id_tipo_rango,$this->valor,$this->id_red,$this->condicion_1,$this->condicion_2,"DOS");
		$this->modelo_bono->insertarBonoValor($this->getValoresBono());
	}
	
	function limpiarBono() {
		$this->modelo_bono->eliminarRango($this->id_rango);
		$this->modelo_bono->eliminarRangoTipo($this->id_rango);
		$this->modelo_bono->eliminarBono($this->id_bono);
		$this->modelo_bono->eliminarBonoCondicion($this->id_condicion);
		$this->modelo_bono->eliminarBonoValor($this->id_bono);
	}
	
	function limpiarTodosLosBonos() {
		$this->db->query('delete from cat_rango where id_rango >= 1');
		$this->db->query('delete from cross_rango_tipos where id_rango >= 1');
		$this->db->query('delete from bono where id >= 1');
		$this->db->query('delete from cat_bono_condicion where id >= 1');
		$this->db->query('delete from cat_bono_valor_nivel where id >= 1');
		
	}
	
	function insertarRango($id_rango,$nombre_rango,$descripcion_rango,$condicion_red_afiliacion,$estatus_rango){
		$datos = array(
				'id_rango' => $id_rango,
				'nombre'   => $nombre_rango,
				'descripcion'    => $descripcion_rango,
				'condicion_red_afilacion' =>$condicion_red_afiliacion,
				'estatus'	=> $estatus_rango
		);
		$this->db->insert('cat_rango',$datos);
		return $this->db->insert_id();
	}
	
	function insertarRangoTipo($id_rango,$id_tipo_rango,$valor,$condicion_red,$nivel_red){
		$datos = array(
				'id_rango' => $id_rango,
				'id_tipo_rango'   => $id_tipo_rango,
				'valor'    => $valor,
				'condicion_red'	=> $condicion_red,
				'nivel_red'	=> $nivel_red
		);
		$this->db->insert('cross_rango_tipos',$datos);
		return $this->db->insert_id();
	}
	
	function insertarBono($id_bono,$nombre_bono,$descripcion_bono,$inicio,$fin,$mes_desde_afiliacion,$mes_desde_activacion,$frecuencia,$plan,$estatus_bono){
		$datos = array(
				'id' => $id_bono,
				'nombre'   => $nombre_bono,
				'descripcion'    => $descripcion_bono,
				'inicio'	=> $inicio,
				'fin'	=> $fin,
				'mes_desde_afiliacion'   => $mes_desde_afiliacion,
				'mes_desde_activacion'    => $mes_desde_activacion,
				'frecuencia'	=> $frecuencia,
				'plan'	=> $plan,
				'estatus'	=> $estatus_bono
		);
		$this->db->insert('bono',$datos);
		return $this->db->insert_id();
	}
	
	function insertarBonoCondicion($id_condicion,$id_bono,$id_rango,$id_tipo_rango,$valor,$id_red,$condicion_1,$condicion_2,$calificado){
		$datos = array(
				'id' => $id_condicion,
				'id_bono'   => $id_bono,
				'id_rango'    => $id_rango,
				'id_tipo_rango'	=> $id_tipo_rango,
				'condicion_rango'	=> $valor,
				'id_red'   => $id_red,
				'condicion1'	=> $condicion_1,
				'condicion2'	=> $condicion_2,
				'calificado'	=> $calificado
		);
		$this->db->insert('cat_bono_condicion',$datos);
		return $this->db->insert_id();
	}
	
	function insertarBonoValor($valores){
		foreach ($valores as $valor){
			$datos = array(
					'id' => $valor['id_condicion'],
					'id_bono'   => $valor['id_bono'],
					'condicion_red'    => $valor['condicion_red'],
					'nivel'    => $valor['nivel'],
					'valor'	=> $valor['valor'],
					'verticalidad'	=> $valor['verticalidad']
			);
			$this->db->insert('cat_bono_valor_nivel',$datos);
		}
	}
	
	function eliminarRango($id_rango){
		$this->db->query('delete from cat_rango where id_rango = '.$id_rango);
	}
	
	function eliminarRangoTipo($id_rango){
		$this->db->query('delete from cross_rango_tipos where id_rango = '.$id_rango);
	}
	
	function eliminarBono($id_bono){
		$this->db->query('delete from bono where id = '.$id_bono);
	}
	
	function eliminarBonoCondicion($id_codicion){
		$this->db->query('delete from cat_bono_condicion where id = '.$id_codicion);
	}
	
	function eliminarBonoValor($id_bono){
		$this->db->query('delete from cat_bono_valor_nivel where id_bono = '.$id_bono);
	}
	
	function crearNuevoUsuario($id_usuario,$username,$created,$id_afiliacion,$id_red,$id_padre,$id_sponsor,$lado_red) {
		$datosUsuario = array(
				'id_usuario' => $id_usuario,
				'username'   => $username,
				'created'    => $created,
				'id_afiliacion' => $id_afiliacion,
				'id_red'   => $id_red,
				'id_padre'    => $id_padre,
				'id_sponsor'   => $id_sponsor,
				'lado_red' => $lado_red
		);

		$this->afiliado->nuevoAfiliado ($datosUsuario);
		$this->afiliado->ingresarUsuario ();
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getNombre() {
		return $this->nombre;
	}
	public function setNombre($nombre) {
		$this->nombre = $nombre;
		return $this;
	}
	public function getDescripcion() {
		return $this->descripcion;
	}
	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
		return $this;
	}
	public function getTipoBono() {
		return $this->tipo_bono;
	}
	public function setTipoBono($tipo_bono) {
		$this->tipo_bono = $tipo_bono;
		return $this;
	}
	public function getCondiciones() {
		return $this->condiciones;
	}
	public function getCondicionesBono() {
		return $this->condicionesBono;
	}
	public function setCondicionesBono($condicionesBono) {
		$this->condicionesBono = $condicionesBono;
		return $this;
	}
	public function getValoresBono() {
		return $this->valoresBono;
	}

	public function getActivacionBono() {
		return $this->activacionBono;
	}
	public function setActivacionBono($activacionBono) {
		$this->activacionBono = $activacionBono;
		return $this;
	}
	public function setCondiciones($id_bono,$rango,$id_red,$condicion_1,$condicion_2) {
	
		$this->condiciones = array('id_bono' => $id_bono,'rango' => $rango,
				'id_red' => $id_red,'condicion_1' => $condicion_1,
				'condicion_2' => $condicion_2
		);
		return $this;
	}
	public function getValores() {
		return $this->valores;
	}
	public function setValores($id_bono,$condicion_red,$nivel,$valor) {
		$this->valores = array('id_bono' => $id_bono,'condicion_red'=>$condicion_red,'nivel' => $nivel,
				'valor' => $valor
		);
		return $this;
	}
	public function getActivacion() {
		return $this->activacion;
	}
	public function setActivacion($id_bono,$inicio,$fin,$mes_desde_afiliacion_afiliado,$mes_desde_activacion_afiliado,
			$estado,$frecuencia) {
		$this->activacion = array('id_bono' => $id_bono,'inicio' => $inicio,
				'fin' => $fin,'mes_desde_afiliacion_afiliado' => $mes_desde_activacion_afiliado,
				'mes_desde_activacion_afiliado' => $mes_desde_activacion_afiliado,
				'estado' => $estado,'frecuencia' => $frecuencia
		);
		return $this;
	}

	public function getIdRango() {
		return $this->id_rango;
	}
	public function setIdRango($id_rango) {
		$this->id_rango = $id_rango;
		return $this;
	}
	public function getNombreRango() {
		return $this->nombre_rango;
	}
	public function setNombreRango($nombre_rango) {
		$this->nombre_rango = $nombre_rango;
		return $this;
	}
	public function getDescripcionRango() {
		return $this->descripcion_rango;
	}
	public function setDescripcionRango($descripcion_rango) {
		$this->descripcion_rango = $descripcion_rango;
		return $this;
	}
	public function getEstatusRango() {
		return $this->estatus_rango;
	}
	public function setEstatusRango($estatus_rango) {
		$this->estatus_rango = $estatus_rango;
		return $this;
	}
	public function getIdTipoRango() {
		return $this->id_tipo_rango;
	}
	public function setIdTipoRango($id_tipo_rango) {
		$this->id_tipo_rango = $id_tipo_rango;
		return $this;
	}
	public function getCondicionRed() {
		return $this->condicion_red;
	}
	public function setCondicionRed($condicion_red) {
		$this->condicion_red = $condicion_red;
		return $this;
	}
	public function getNivelRed() {
		return $this->nivel_red;
	}
	public function setNivelRed($nivel_red) {
		$this->nivel_red = $nivel_red;
		return $this;
	}
	public function getIdBono() {
		return $this->id_bono;
	}
	public function setIdBono($id_bono) {
		$this->id_bono = $id_bono;
		return $this;
	}
	public function getNombreBono() {
		return $this->nombre_bono;
	}
	public function setNombreBono($nombre_bono) {
		$this->nombre_bono = $nombre_bono;
		return $this;
	}
	public function getDescripcionBono() {
		return $this->descripcion_bono;
	}
	public function setDescripcionBono($descripcion_bono) {
		$this->descripcion_bono = $descripcion_bono;
		return $this;
	}
	public function getInicio() {
		return $this->inicio;
	}
	public function setInicio($inicio) {
		$this->inicio = $inicio;
		return $this;
	}
	public function getFin() {
		return $this->fin;
	}
	public function setFin($fin) {
		$this->fin = $fin;
		return $this;
	}
	public function getPlan() {
		return $this->plan;
	}
	public function setPlan($plan) {
		$this->plan = $plan;
		return $this;
	}
	public function getFrecuencia() {
		return $this->frecuencia;
	}
	public function setFrecuencia($frecuencia) {
		$this->frecuencia = $frecuencia;
		return $this;
	}
	public function getEstatusBono() {
		return $this->estatus_bono;
	}
	public function setEstatusBono($estatus_bono) {
		$this->estatus_bono = $estatus_bono;
		return $this;
	}
	public function getIdCondicion() {
		return $this->id_condicion;
	}
	public function setIdCondicion($id_condicion) {
		$this->id_condicion = $id_condicion;
		return $this;
	}
	public function getCondicion1() {
		return $this->condicion_1;
	}
	public function setCondicion1($condicion_1) {
		$this->condicion_1 = $condicion_1;
		return $this;
	}
	public function getCondicion2() {
		return $this->condicion_2;
	}
	public function setCondicion2($condicion_2) {
		$this->condicion_2 = $condicion_2;
		return $this;
	}
	
	public function getMesDesdeAfiliacion() {
		return $this->mes_desde_afiliacion;
	}
	public function setMesDesdeAfiliacion($mes_desde_afiliacion) {
		$this->mes_desde_afiliacion = $mes_desde_afiliacion;
		return $this;
	}
	public function getMesDesdeActivacion() {
		return $this->mes_desde_activacion;
	}
	public function setMesDesdeActivacion($mes_desde_activacion) {
		$this->mes_desde_activacion = $mes_desde_activacion;
		return $this;
	}
	public function getIdRed() {
		return $this->id_red;
	}
	public function setIdRed($id_red) {
		$this->id_red = $id_red;
		return $this;
	}
	
	public function setValoresBono($id_condicion,$id_bono,$condicion_red,$nivel,$valor,$verticalidad) {
		$datos = array(
				'id_condicion' => $id_condicion,
				'id_bono'   => $id_bono,
				'condicion_red'    => $condicion_red,
				'nivel'    => $nivel,
				'verticalidad'    => $verticalidad,
				'valor'	=> $valor
		);
	
		array_push($this->valoresBono, $datos);
		return $this;
	}
	public function getValor() {
		return $this->valor;
	}
	public function setValor($valor) {
		$this->valor = $valor;
		return $this;
	}
	public function getCondicionAfiliadosRed() {
		return $this->condicion_afiliados_red;
	}
	public function setCondicionAfiliadosRed($condicion_afiliados_red) {
		$this->condicion_afiliados_red = $condicion_afiliados_red;
		return $this;
	}
	
	
}
