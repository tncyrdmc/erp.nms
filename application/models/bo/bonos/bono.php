<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class bono extends CI_Model
{

	private $id;
	private $nombre;
	private $descripcion;
	private $tipo_bono;
	private $condiciones;
	private $valores;
	private $activacion;
	
	private $condicionesBonoDar;
	private $condicionesBonoRecibir;
	private $valoresBono=array();
	private $activacionBono;
	
	private $id_red;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('/bo/bonos/condiciones_bono');
		$this->load->model('/bo/bonos/valores_bono');
		$this->load->model('/bo/bonos/activacion_bono');
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

	public function getValoresBono() {
		return $this->valoresBono;
	}
	public function setValoresBono($valoresBono) {
		$this->valoresBono = $valoresBono;
		return $this;
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
	
	public function setUpBono($id_bono){
		$this->setDatosBono($id_bono);
		$this->setDatosCondicionesBono($id_bono);
		$this->setDatosValorBono($id_bono);
		$this->setDatosActivacionBono($id_bono);
	}
	
	public function setDatosBono($id_bono){
		$q=$this->db->query("SELECT id,nombre,descripcion,plan FROM bono where id=".$id_bono);
		$datosBono=$q->result();
		
		$this->setId(intval($datosBono[0]->id));
		$this->setNombre($datosBono[0]->nombre);
		$this->setDescripcion($datosBono[0]->descripcion);
		$this->setTipoBono($datosBono[0]->plan);

	}

	public function setDatosCondicionesBono($id_bono){
		
		$this->setDatosCondicionesDar ($id_bono);
		$this->setDatosCondicionesRecibir($id_bono);


	}
	
	private function setDatosCondicionesDar($id_bono) {
		$q=$this->db->query("SELECT cbc.id as id_condicion,cbc.id_bono,cbc.id_rango,cbc.id_tipo_rango,
							cbc.id_red,crt.condicion_red,crt.nivel_red,cbc.condicion_rango as valor,cbc.condicion1,
							cbc.condicion2  
							FROM cat_bono_condicion cbc,cross_rango_tipos crt
							where cbc.id_rango=crt.id_rango 
							and cbc.id_tipo_rango=crt.id_tipo_rango and (cbc.calificado='DAR' or cbc.calificado='DOS') and cbc.id_bono=".$id_bono);
		$datosCondicioneBono=$q->result();
		$condiciones=array();
		foreach ($datosCondicioneBono as $condicion){
			$condicionesBono=new $this->condiciones_bono();
			$condicionesBono->setIdCondicion(intval($condicion->id_condicion));
			$condicionesBono->setIdBono(intval($condicion->id_bono));
			$condicionesBono->setIdRango(intval($condicion->id_rango));
			$condicionesBono->setIdTipoRango(intval($condicion->id_tipo_rango));
			$condicionesBono->setIdRed(intval($condicion->id_red));
			$this->setIdRed($condicion->id_red);
			
			$q=$this->db->query("SELECT condicion_red_afilacion FROM cat_rango where id_rango=".$condicion->id_rango);
			$datosCondicionRedAfiliacionRango=$q->result();
			$condicionesBono->setCondicionAfiliadosRed($datosCondicionRedAfiliacionRango[0]->condicion_red_afilacion);

			$condicionesBono->setCondicionRed($condicion->condicion_red);
			$condicionesBono->setNivelRed(intval($condicion->nivel_red));
			$condicionesBono->setValor(intval($condicion->valor));
			$condicionesBono->setCondicionBono1(($condicion->condicion1));
			$condicionesBono->setCondicionBono2(($condicion->condicion2));
			
			array_push($condiciones, $condicionesBono);

		}

		$this->setCondicionesBonoDar($condiciones);
	}
	
	private function setDatosCondicionesRecibir($id_bono) {
		$q=$this->db->query("SELECT cbc.id as id_condicion,cbc.id_bono,cbc.id_rango,cbc.id_tipo_rango,
							cbc.id_red,crt.condicion_red,crt.nivel_red,cbc.condicion_rango as valor,
							GROUP_CONCAT(DISTINCT cbc.condicion1 SEPARATOR ', ' ) as condicion1,
							GROUP_CONCAT(DISTINCT cbc.condicion2 SEPARATOR ', ' ) as condicion2
							FROM cat_bono_condicion cbc,cross_rango_tipos crt
							where cbc.id_rango=crt.id_rango
							and cbc.id_tipo_rango=crt.id_tipo_rango and (cbc.calificado='REC' or cbc.calificado='DOS') and cbc.id_bono=".$id_bono." group by cbc.id_tipo_rango order by cbc.id_tipo_rango DESC");
		$datosCondicioneBono=$q->result();
		$condiciones=array();
		foreach ($datosCondicioneBono as $condicion){
			$condicionesBono=new $this->condiciones_bono();
			$condicionesBono->setIdCondicion(intval($condicion->id_condicion));
			$condicionesBono->setIdBono(intval($condicion->id_bono));
			$condicionesBono->setIdRango(intval($condicion->id_rango));
			$condicionesBono->setIdTipoRango(intval($condicion->id_tipo_rango));
			$condicionesBono->setIdRed(intval($condicion->id_red));
			$this->setIdRed($condicion->id_red);
				
			$q=$this->db->query("SELECT condicion_red_afilacion FROM cat_rango where id_rango=".$condicion->id_rango);
			$datosCondicionRedAfiliacionRango=$q->result();
			$condicionesBono->setCondicionAfiliadosRed($datosCondicionRedAfiliacionRango[0]->condicion_red_afilacion);
	
			$condicionesBono->setCondicionRed($condicion->condicion_red);
			$condicionesBono->setNivelRed(intval($condicion->nivel_red));
			$condicionesBono->setValor(intval($condicion->valor));
			$condicionesBono->setCondicionBono1(($condicion->condicion1));
			$condicionesBono->setCondicionBono2(($condicion->condicion2));
				
			array_push($condiciones, $condicionesBono);
	
		}
	
		$this->setCondicionesBonoRecibir($condiciones);
	}

	public function setDatosValorBono($id_bono){
		
		$q=$this->db->query("SELECT id,id_bono,condicion_red,nivel,valor,verticalidad FROM cat_bono_valor_nivel where id_bono=".$id_bono);
		$datosValoresBono=$q->result();

		
		foreach ($datosValoresBono as $valorNivel){
			$valoresBono=new $this->valores_bono();
			$valoresBono->setId($valorNivel->id);
			$valoresBono->setIdBono($valorNivel->id_bono);
			$valoresBono->setCondicionRed($valorNivel->condicion_red);
			$valoresBono->setNivel($valorNivel->nivel);
			$valoresBono->setValor($valorNivel->valor);
			$valoresBono->setVerticalidad($valorNivel->verticalidad);
			$myArray[] = $valoresBono;
			$this->setValoresBono($myArray);
		}
		
		
	}
	
	public function setDatosActivacionBono($id_bono){
		$q=$this->db->query("SELECT id,inicio,fin,mes_desde_afiliacion,mes_desde_activacion,frecuencia,estatus FROM bono where id=".$id_bono);
		$datosActivacionBono=$q->result();
		
		foreach ($datosActivacionBono as $activacionBono){
			$activacion=new $this->activacion_bono();
			$activacion->setIdBono(intval($activacionBono->id));
			$activacion->setInicio($activacionBono->inicio);
			$activacion->setFin($activacionBono->fin);
			$activacion->setMesDesdeAfiliacionAfiliado($activacionBono->mes_desde_afiliacion);
			$activacion->setMesDesdeActivacionAfiliado($activacionBono->mes_desde_activacion);
			$activacion->setFrecuencia($activacionBono->frecuencia);
			$activacion->setEstado($activacionBono->estatus);

		
		}
		
		$this->setActivacionBono($activacion);
	}
	public function getCondicionesBonoDar() {
		return $this->condicionesBonoDar;
	}
	public function setCondicionesBonoDar($condicionesBonoDar) {
		$this->condicionesBonoDar = $condicionesBonoDar;
		return $this;
	}
	public function getCondicionesBonoRecibir() {
		return $this->condicionesBonoRecibir;
	}
	public function setCondicionesBonoRecibir($condicionesBonoRecibir) {
		$this->condicionesBonoRecibir = $condicionesBonoRecibir;
		return $this;
	}
	public function getIdRed() {
		return $this->id_red;
	}
	public function setIdRed($id_red) {
		$this->id_red = $id_red;
		return $this;
	}
	
	
	
}
