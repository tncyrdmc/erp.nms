<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class calculador_bono extends CI_Model
{
	private $usuariosRed=array();
	private $valorCondicion;
	private $id_bono_historial=0;
	private $isSetBonoRepartir=false;

	private $fechaCalculoBono; 
	/*
	 * Estado
	 * El Afiliado Es Cobrando El bono Para Repartir :DAR
	 * El Afilido Esta Recibiendo La comision Bono   : REC
	 */
	private $estado="DAR";
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('/bo/bonos/bono');
		$this->load->model('/bo/bonos/condiciones_bono');
		$this->load->model('/bo/bonos/valores_bono');
		$this->load->model('/bo/bonos/activacion_bono');
		$this->load->model('/bo/bonos/repartidor_comision_bono');
		$this->load->model('/bo/bonos/afiliado');
		$this->load->model('/bo/bonos/clientes/mobileMoney/bono_mobile_money');
		
		$this->setFechaCalculoBono(date('Y-m-d'));
	}
	
	public function calcularComisionesBonos(){

		$bonos=$this->getTodosLosBonos();
		foreach ($bonos as $datosBono){
			$bono=new $this->bono();
			$bono->setUpBono($datosBono->getId());
			if($this->isDisponibleCobrar($bono)){
				$this->pagarComisionesBono($bono);
			}
		}
	}
	
	public function calcularComisionesPorBono($id_bono,$fechaCalculo){
	
		$bono=new $this->bono();
		$bono->setUpBono($id_bono);
			
		if($this->isActivo($bono)&&$this->isVigentePorFecha($bono,$fechaCalculo)&&($this->isPagado($bono, $fechaCalculo)==false)){
			log_message('DEV',"pagarComisionesBonoPorFecha : $id_bono");
			$this->pagarComisionesBonoPorFecha($bono,$fechaCalculo);
			return true;
		}
		
		return false;
	}
	
	private function pagarComisionesBono($bono) {
		$id_bono=$bono->getId();
		$red=$bono->getIdRed();
		$usuarios=$this->getUsuariosRed($red);

		$repartidorComisionBono=new $this->repartidor_comision_bono();
		
		$frecuencia=$bono->getActivacionBono()->getFrecuencia();
		$fechaActual=date('Y-m-d');
		$this->setFechaCalculoBono($fechaActual);
		
		$fechaInicio=$this->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		$ano= date('Y',strtotime($fechaInicio));		
		$mes= date('m',strtotime($fechaInicio));
		$dia= date('d',strtotime($fechaInicio));
		
		$id_historial_pago_bono=$repartidorComisionBono->ingresarHistorialComisionBono($repartidorComisionBono->getIdHistorialTransaccion(),
															   $id_bono,$dia,$mes,$ano,
															   $fechaActual);
		
		$this->setIdBonoHistorial($id_historial_pago_bono);

		foreach ($usuarios as $usuario){
			$id_afiliado=$usuario->id_afiliado;
			$this->darComisionRedDeAfiliado($bono,$id_historial_pago_bono,$id_afiliado,$fechaActual);
		}
	}
	
	private function pagarComisionesBonoPorFecha($bono,$fecha) {
		$id_bono=$bono->getId();
		$red=$bono->getIdRed(); 
		$usuarios=$this->getUsuariosRed($red);
	
		$repartidorComisionBono=new $this->repartidor_comision_bono();
	
		$frecuencia=$bono->getActivacionBono()->getFrecuencia();

		$fechaActual=$fecha;
		$this->setFechaCalculoBono($fechaActual);

		$fechaInicio=$this->getFechaInicioPagoDeBono($frecuencia,$fechaActual);

		$ano= date('Y',strtotime($fechaInicio));
		$mes= date('m',strtotime($fechaInicio));
		$dia= date('d',strtotime($fechaInicio));
		

		$id_historial_pago_bono=$repartidorComisionBono->ingresarHistorialComisionBono($repartidorComisionBono->getIdHistorialTransaccion(),
				$id_bono,$dia,$mes,$ano,
				$fechaActual);
	
		$this->setIdBonoHistorial($id_historial_pago_bono);
		
		foreach ($usuarios as $usuario){
			$id_afiliado=$usuario->id_afiliado;
			$this->darComisionRedDeAfiliado($bono,$id_historial_pago_bono,$id_afiliado,$fechaActual);
		}
		
		return true;
	}
	
	public function getTodosLosBonos(){
		$q=$this->db->query("SELECT id FROM bono order by id");
		$bonosBaseDeDatos=$q->result();
		$todosLosBonos=array();
		foreach ($bonosBaseDeDatos as $bonoBaseDeDatos){
			$bono=new $this->bono();
			$bono->setUpBono($bonoBaseDeDatos->id);
			array_push($todosLosBonos, $bono);
		}

		return $todosLosBonos;
	}
	
	public function isActivo($bono){
		$estadoBono=$bono->getActivacionBono()->getEstado();

		if($estadoBono=='ACT')
			return true;
		return false;
	}
	
	public function isVigente($bono){
		$fechaActual=date('Y-m-d');
		
		$fechaInicio=$bono->getActivacionBono()->getInicio();
		$fechaFin=$bono->getActivacionBono()->getFin();
		
		if($fechaActual>=$fechaInicio&&$fechaActual<=$fechaFin)
			return true;
		return false;
	}
	
	public function isVigentePorFecha($bono,$fecha){
	
		$fechaInicio=$bono->getActivacionBono()->getInicio();
		$fechaFin=$bono->getActivacionBono()->getFin();
	
		if($fecha>=$fechaInicio&&$fecha<=$fechaFin)
			return true;
		return false;
	}

	public function isDisponibleCobrar($bono){
		$fecha=date('Y-m-d');
		
		if($this->isActivo($bono)&&$this->isVigente($bono)&&($this->isPagado($bono, $fecha)==false)){
			return true;
		}
		return false;
	}

	public function isBonoBinario($tipo_bono){
		if($tipo_bono=='SI')
			return true;
		return false;
	}
	
	public function isPagado($bono,$fecha){
		$id_bono=$bono->getId();

		$frecuencia=$bono->getActivacionBono()->getFrecuencia();
		$fechaActual=$fecha;
		
		$fechaInicio=$this->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		$ano= date('Y',strtotime($fechaInicio));
		$mes= date('m',strtotime($fechaInicio));
		$dia= date('d',strtotime($fechaInicio));
		
		$q=$this->db->query("SELECT * FROM comision_bono_historial
								where id_bono=".$id_bono."
								and dia=".$dia."
								and mes=".$mes."
								and ano=".$ano."");


		$idTransaccion=$q->result();

		if($idTransaccion==NULL)
			return false;
		
		return true;	
		
	}
	
	public function darComisionRedDeAfiliado($bono,$id_bono_historial,$id_usuario,$fecha){
		$id_bono=$bono->getId();

		if($this->usuarioPuedeCobrarBono($id_bono,$id_usuario,$fecha)){

			$red=$bono->getIdRed();

			$valores=$bono->getValoresBono();
			
			foreach ($valores as $valor){
				
				$this->repartirComisionSegunTipoDeReparticion( $id_bono,$id_bono_historial,$id_usuario,$red,$valor->getNivel(),$valor->getValor(),$valor->getCondicionRed(),$valor->getVerticalidad() );
			}
		}
	}
	
	private function repartirComisionSegunTipoDeReparticion($id_bono,$id_bono_historial,$id_usuario,$red,$nivel,$valor,$condicion_red,$verticalidad) {
		$fecha=$this->getFechaCalculoBono();
		
		/* Repartir valor en $ hacia arriba o hacia abajo de la red */
		
		if(($verticalidad=="ASC")||($verticalidad=="DESC")){
			$this->repartirAscendenteODesendente ($id_bono,$id_bono_historial,$red,$condicion_red,$verticalidad,$id_usuario,$fecha,$nivel,$valor);
	
		}
		/* Repartir valor en % hacia arriba la red */
		
		else if($verticalidad=="PASC"){
			$this->repartirPorcentajeAscendente ( $id_bono,$id_bono_historial,$red,$condicion_red,$verticalidad,$id_usuario,$fecha,$nivel,$valor );

		}
		
		/* (Bono a la medida) Repartir valor total de igualaciones dividido numero de compras por puntos (Money Mobile) */
		else if($verticalidad=="RDESC"){
			$bonoMoneyMobile=$this->bono_mobile_money;
			$this->repartirComisionesBonoPorIgualacionesPorCompras ($bonoMoneyMobile, $id_bono,$id_bono_historial,$id_usuario,$red,$nivel,$valor,$condicion_red,$verticalidad,$fecha);
		}
	}
	
	private function repartirPorcentajeAscendente($id_bono,$id_bono_historial,$red,$condicion_red,$verticalidad,$id_usuario,$fecha,$nivel,$valor) {
		
	    if($valor==0)
	        return;
	    
	    if($nivel==0){
			if($this->usuarioPuedeRecibirBono($id_bono, $id_usuario, $fecha)){
				$repartidorComisionBono=new $this->repartidor_comision_bono();
				$valorTotal=(($this->valorCondicion*$valor)/100);
				$repartidorComisionBono->repartirComisionBono($repartidorComisionBono->getIdTransaccionPagoBono(),$id_usuario,$id_bono,$id_bono_historial,$valorTotal);
			}
		}else {

			$this->repartirComisionesBonoEnLaRedPorcentaje ( $id_bono,$id_bono_historial,$id_usuario,$red,$nivel,$valor,$condicion_red,$verticalidad);

		}
	}

	private function repartirAscendenteODesendente($id_bono,$id_bono_historial,$red,$condicion_red,$verticalidad,$id_usuario,$fecha,$nivel,$valor) {
		
	    if($valor==0)
	        return;
	    
	    if($nivel==0){
			if($this->usuarioPuedeRecibirBono($id_bono, $id_usuario, $fecha)){
				$repartidorComisionBono=new $this->repartidor_comision_bono();
				$repartidorComisionBono->repartirComisionBono($repartidorComisionBono->getIdTransaccionPagoBono(),$id_usuario,$id_bono,$id_bono_historial,$valor);
			}
		}else {
			$this->repartirComisionesBonoEnLaRed ( $id_bono,$id_bono_historial,$id_usuario,$red,$nivel,$valor,$condicion_red,$verticalidad);
		}
	}

	private function repartirComisionesBonoEnLaRedPorcentaje($id_bono,$id_bono_historial,$id_usuario,$red,$nivel,$valor,$condicionRed,$verticalidad) {
		$repartidorComisionBono=new $this->repartidor_comision_bono();
		$usuario=new $this->afiliado();
		
		if($verticalidad=="PASC")
			$verticalidad="ASC";
		
		$usuario->getAfiliadosPorNivel($id_usuario,$red,$nivel,$condicionRed,1,$verticalidad);
		$afiliados=$usuario->getIdAfiliadosRed();

		foreach ($afiliados as $idAfiliado){

			if($this->usuarioPuedeRecibirBono($id_bono, $idAfiliado, $this->getFechaCalculoBono())){
				$valorTotal=(($this->valorCondicion*$valor)/100);
				$repartidorComisionBono->repartirComisionBono($repartidorComisionBono->getIdTransaccionPagoBono(),$idAfiliado,$id_bono,$id_bono_historial,$valorTotal);
	
			}
		}
	}
	
	private function repartirComisionesBonoEnLaRed($id_bono,$id_bono_historial,$id_usuario,$red,$nivel,$valor,$condicionRed,$verticalidad) {
		$repartidorComisionBono=new $this->repartidor_comision_bono();
		$usuario=new $this->afiliado();
		$usuario->getAfiliadosPorNivel($id_usuario,$red,$nivel,$condicionRed,1,$verticalidad);
		$afiliados=$usuario->getIdAfiliadosRed();
		
		foreach ($afiliados as $idAfiliado){
			if($this->usuarioPuedeRecibirBono($id_bono, $idAfiliado, $this->getFechaCalculoBono())){
				$repartidorComisionBono->repartirComisionBono($repartidorComisionBono->getIdTransaccionPagoBono(),$idAfiliado,$id_bono,$id_bono_historial,$valor);
	
			}
		}
	}
	
	private function repartirComisionesBonoPorIgualacionesPorCompras($bonoMoneyMobile,$id_bono,$id_bono_historial,$id_usuario,$red,$nivel,$valor,$condicionRed,$verticalidad,$fecha) {
		
		if(!$this->getIsSetBonoRepartir()){
						
			$bono=$this->bono;
			$bono->setUpBono($id_bono);
			$this->setEstado("REC");
	
			$frecuencia=$bono->getActivacionBono()->getFrecuencia();
			
			$fecha_inicio=$this->getFechaInicioPagoDeBono($frecuencia,$fecha);
			$fecha_fin=$this->getFechaFinPagoDeBono($frecuencia,$fecha);
	
			$bonoMoneyMobile->setUpBono($red, $fecha_inicio, $fecha_fin);
			$this->setIsSetBonoRepartir(true);
		}
		
		$valor=0;
		$valor=$bonoMoneyMobile->getTotalARecibirAfiliado($red,$id_usuario);
		$repartidorComisionBono=new $this->repartidor_comision_bono();
		
			if($valor!=0)
				$repartidorComisionBono->repartirComisionBono($repartidorComisionBono->getIdTransaccionPagoBono(),$id_usuario,$id_bono,$id_bono_historial,$valor);

	}
	
	public function usuarioPuedeRecibirBono($id_bono,$id_usuario,$fechaActual){
		$bono=$this->bono;
		$bono->setUpBono($id_bono);
		$this->setEstado("REC");
		
		$esUnPlanBinario=$bono->getTipoBono();

		$frecuencia=$bono->getActivacionBono()->getFrecuencia();
		
		if($frecuencia=="UNI"){
			if($this->buscarSiUsuarioYaReclamoBono($id_bono,$id_usuario)){
				return false;
			}
		}
		
	
		$fechaInicio=$this->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		$fechaFin=$this->getFechaFinPagoDeBono($frecuencia,$fechaActual);

		$resultadoBinario=true;

		foreach ($bono->getCondicionesBonoRecibir() as $condicionBono){
	
			$red=$condicionBono->getIdRed();
			$profundidadRed=$condicionBono->getNivelRed();
			$tipoDeAfiliados=$condicionBono->getCondicionRed();
			$tipoDeCondicion=$condicionBono->getIdTipoRango();
			$valorCondicion=$condicionBono->getValor();
			$tipoDeBusquedaEnLaRed=$condicionBono->getCondicionAfiliadosRed();
			$condicion1=$condicionBono->getCondicionBono1();
			$condicion2=$condicionBono->getCondicionBono2();

			$valor = $this->getValorCondicionUsuario ($id_bono,$esUnPlanBinario, $tipoDeCondicion,$id_usuario,$red,$tipoDeAfiliados,$tipoDeBusquedaEnLaRed,$profundidadRed,$fechaInicio,$fechaFin ,$condicion1,$condicion2);

			if($esUnPlanBinario=="SI"){
				if($valor<$valorCondicion&&$resultadoBinario==true)
					$resultadoBinario=false;
			}else {
				if($valor<$valorCondicion)
					
					return false;
			}

		}

		if($esUnPlanBinario=="SI"){
			return $resultadoBinario;
		}
		
		return true;
	}
	
	public function usuarioPuedeCobrarBono($id_bono,$id_usuario,$fechaActual){
		$bono=$this->bono;
		$bono->setUpBono($id_bono);
		$esUnPlanBinario=$bono->getTipoBono();
		$this->setEstado("DAR");
	
		$frecuencia=$bono->getActivacionBono()->getFrecuencia();
	
		if($frecuencia=="UNI"){
			if($this->buscarSiUsuarioYaReclamoBono($id_bono,$id_usuario)){
				return false;
			}
		}
	
	
		$fechaInicio=$this->getFechaInicioPagoDeBono($frecuencia,$fechaActual);
		$fechaFin=$this->getFechaFinPagoDeBono($frecuencia,$fechaActual);
	
		foreach ($bono->getCondicionesBonoDar() as $condicionBono){

			$red=$condicionBono->getIdRed();
			$profundidadRed=$condicionBono->getNivelRed();
			$tipoDeAfiliados=$condicionBono->getCondicionRed();
			$tipoDeCondicion=$condicionBono->getIdTipoRango();
			$valorCondicion=$condicionBono->getValor();
			$tipoDeBusquedaEnLaRed=$condicionBono->getCondicionAfiliadosRed();
			$condicion1=$condicionBono->getCondicionBono1();
			$condicion2=$condicionBono->getCondicionBono2();
				
			$valor = $this->getValorCondicionUsuario ($id_bono,$esUnPlanBinario, $tipoDeCondicion,$id_usuario,$red,$tipoDeAfiliados,$tipoDeBusquedaEnLaRed,$profundidadRed,$fechaInicio,$fechaFin ,$condicion1,$condicion2);

			if($valor<$valorCondicion)
					return false;
		}

		return true;
	}
	
	
	public function buscarSiUsuarioYaReclamoBono($id_bono,$id_usuario){
		$q=$this->db->query("SELECT * FROM comision_bono where id_bono=".$id_bono." and id_usuario=".$id_usuario."");
		$datosBonoCobrado=$q->result();
		
		if($datosBonoCobrado==NULL)
			return false;
		
		return true;
	}
	
	public function getFechaInicioPagoDeBono($frecuencia,$fechaActual){
		if($frecuencia=="SEM")
			return $this->getInicioSemana($fechaActual);
		else if($frecuencia=="QUI")
			return $this->getInicioQuincena($fechaActual);
		else if($frecuencia=="MES")
			return $this->getInicioMes($fechaActual);
		else if($frecuencia=="ANO")
			return $this->getInicioAno($fechaActual);
		else if($frecuencia=="UNI")
			return "2016-01-01";
	}
	
	public function getFechaFinPagoDeBono($frecuencia,$fechaActual){
		if($frecuencia=="SEM")
			return $this->getFinSemana($fechaActual);
		else if($frecuencia=="QUI")
			return $this->getFinQuincena($fechaActual);
		else if($frecuencia=="MES")
			return $this->getFinMes($fechaActual);
		else if($frecuencia=="ANO")
			return $this->getFinAno($fechaActual);
		else if($frecuencia=="UNI")
			return "2090-01-01";
	}
	
	private function getValorCondicionUsuario($id_bono,$esUnPlanBinario,$tipoDeCondicion,$id_usuario,$red,$tipoDeAfiliados,$tipoDeBusquedaEnLaRed,$profundidadRed,$fechaInicio,$fechaFin,$condicion1,$condicion2) {
		$usuario= new $this->afiliado ();
		$usuario->setTipoDeBono($esUnPlanBinario);
		$usuario->setIdBono($id_bono);

		$usuario->setIdBonoHistorial($this->getIdBonoHistorial());

		$usuario->setEstado($this->getEstado());

		$valor=0;
		
		
		/* Afiliados a la red   =1;
		 * Ventas de la red     =2;
		 * Compras Personales   =3;
		 * Puntos Comisionables =4;
		 * Puntos  red          =5
		 */
		switch ($tipoDeCondicion){
			case 1:{
				$valor=$usuario->getAfiliadosIntervaloDeTiempo($id_usuario,$red,"DIRECTOS",$tipoDeBusquedaEnLaRed,0,$fechaInicio,$fechaFin);
				break;
			}
			case 2:{
				$valor=$usuario->getVentasTodaLaRed($id_usuario,$red,$tipoDeAfiliados,$tipoDeBusquedaEnLaRed,$profundidadRed,$fechaInicio,$fechaFin,$condicion1,$condicion2,"COSTO");

				if($this->getEstado()=="DAR")
					$this->setValorCondicion($valor);
				break;
			}
			case 3:{
				$valor=$usuario->getComprasPersonalesIntervaloDeTiempo($id_usuario,$red,$fechaInicio,$fechaFin,$condicion1,$condicion2,"COSTO");

				if($this->getEstado()=="DAR")
					$this->setValorCondicion($valor);
				break;
			}
			case 4:{
				$valor=$usuario->getComprasPersonalesIntervaloDeTiempo($id_usuario,$red,$fechaInicio,$fechaFin,$condicion1,$condicion2,"PUNTOS");
				if($this->getEstado()=="DAR")
					$this->setValorCondicion($valor);

				break;
			}
			case 5:{
				$valor=$usuario->getVentasTodaLaRed($id_usuario,$red,$tipoDeAfiliados,$tipoDeBusquedaEnLaRed,$profundidadRed,$fechaInicio,$fechaFin,$condicion1,$condicion2,"PUNTOS");

				if($this->getEstado()=="DAR")
					$this->setValorCondicion($valor);
				break;
			}
		}

		return $valor;
	}
	
	public function getFinSemana($date) {
		$offset = strtotime($date);

		if(date('w',$offset) == 0){
			return $date;
		}
		else{
			return date("Y-m-d", strtotime('next Sunday', strtotime($date)));
		}
	}
	
	public function getInicioSemana($date) {
		$offset = strtotime($date);

		if(date('w',$offset) == 1)
		{
			return $date;
		}
		else{
			return date("Y-m-d", strtotime('last Monday', strtotime($date)));
		}
	}
	
	public function getInicioQuincena($date) {
		$dateAux = new DateTime();
		
		if(date('d',strtotime($date))<=15){
			$dateAux->setDate(date('Y',strtotime($date)),date('m',strtotime($date)), 1);
			return date_format($dateAux, 'Y-m-d');
		}else {
			$dateAux->setDate(date('Y',strtotime($date)),date('m',strtotime($date)), 16);
			return date_format($dateAux, 'Y-m-d');
		}
	}

	public function getFinQuincena($date) {
		
		$dateAux = new DateTime();
		
		if(date('d',strtotime($date))<=15){
			$dateAux->setDate(date('Y',strtotime($date)),date('m',strtotime($date)), 15);
			return date_format($dateAux, 'Y-m-d');
		}else {
			return date('Y-m-t',strtotime($date));
		}
	}
	
	public function getInicioMes($date) {
		$dateAux = new DateTime();
		$dateAux->setDate(date('Y',strtotime($date)),date('m',strtotime($date)), 1);
		return date_format($dateAux, 'Y-m-d');
	}
	
	public function getFinMes($date) {
		return date('Y-m-t',strtotime($date));
	}
	
	public function getInicioAno($date) {
		$year = new DateTime($date);
		$year->setDate($year->format('Y'), 1, 1);
		return date_format($year, 'Y-m-d');
	}
	
	public function getFinAno($date) {
		$year = new DateTime($date);
		$year->setDate($year->format('Y'), 12, 31);
		return date_format($year, 'Y-m-d');
	}
	
	public function getUsuariosRed($id_red) {
		$q=$this->db->query("SELECT u.id as id_afiliado,u.username,u.created,a.debajo_de,a.directo,a.lado FROM users u,afiliar a
								where (u.id=a.id_afiliado) and a.id_afiliado>2 and id_red=".$id_red);
		$datosAfiliado=$q->result();
		$this->setUsuariosRed($datosAfiliado);

		return $this->usuariosRed;
	}
	
	public function setUsuariosRed($usuariosRed) {
		$this->usuariosRed = $usuariosRed;
		return $this;
	}
	
	public function getValorCondicion() {

		return $this->valorCondicion;
	}
	
	public function setValorCondicion($valorCondicion) {
		$this->valorCondicion = $valorCondicion;
		return $this;
	}

	public function getIdBonoHistorial() {
		return $this->id_bono_historial;
	}
	public function setIdBonoHistorial($id_bono_historial) {
		$this->id_bono_historial = $id_bono_historial;
		return $this;
	}
	public function getFechaCalculoBono() {
		return $this->fechaCalculoBono;
	}
	public function setFechaCalculoBono($fechaCalculoBono) {
		$this->fechaCalculoBono = $fechaCalculoBono;
		return $this;
	}
	public function getEstado() {
		return $this->estado;
	}
	public function setEstado($estado) {
		$this->estado = $estado;
		return $this;
	}
	public function getIsSetBonoRepartir() {
		return $this->isSetBonoRepartir;
	}
	public function setIsSetBonoRepartir($isSetBonoRepartir) {
		$this->isSetBonoRepartir = $isSetBonoRepartir;
		return $this;
	}
	

	
}
