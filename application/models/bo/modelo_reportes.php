<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_reportes extends CI_Model
{
	
	private $inicio, $fin;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('/ov/general');
		$this->load->model('/ov/modelo_billetera');
		$this->load->model('/bo/model_bonos'); 
		$this->load->model('model_tipo_red');
		
	}
	
	function reporte_afiliados($inicio,$fin)
	{
		$q=$this->db->query('SELECT a.id as id,af.debajo_de as id_sponsor,a.username as usuario,b.nombre as nombre,a.email as email,b.apellido as apellido,
								concat(ctu.numero) as telefono,cdu.cp as codigo_postal,
								concat(cdu.calle," ",cdu.colonia," ",cdu.municipio," ",cdu.estado," ",c.Name) as direccion,
								b.keyword as dni,b.fecha_nacimiento as fecha_nacimiento 
								FROM users a, user_profiles b,cross_tel_user ctu,cross_dir_user cdu,Country c ,afiliar af 
								where(a.id=b.user_id) 
								and(ctu.id_user=a.id)
								and(cdu.id_user=a.id)
								and(c.Code=cdu.pais)
								and(af.id_afiliado=a.id)
								and b.id_tipo_usuario=2
							 	and DATE(a.created) BETWEEN "'.$inicio.'" AND "'.$fin.'" group by a.id order by a.id');
		return $q->result();
	}
	
	function reporte_afiliados_activos($fecha)
	{
		$q=$this->db->query('SELECT a.id, a.username usuario, b.nombre nombre, b.apellido apellido,a.email 
FROM users a, user_profiles b WHERE a.id=b.user_id and b.id_tipo_usuario=2 and a.id>2');
		
		$afiliados=$q->result();
		$afiliadosActivos=array();
		
		foreach ($afiliados as $afiliado){

			if(($this->general->isActived($afiliado->id)==0)&& 
					(($this->general->isActivedAfiliacionesPuntosPersonales($afiliado->id,$fecha))==true)){

				array_push($afiliadosActivos,$afiliado);
			}
			
		}

		return $afiliadosActivos;
	}
	
	function reporte_afiliados_inactivos($fecha)
	{
		$q=$this->db->query('SELECT a.id, a.username usuario, b.nombre nombre, b.apellido apellido,a.email
FROM users a, user_profiles b WHERE a.id=b.user_id and b.id_tipo_usuario=2 and a.id>2');
	
		$afiliados=$q->result();
		$afiliadosActivos=array();
	
		foreach ($afiliados as $afiliado){
	
			if(($this->general->isActived($afiliado->id)==0)&& 
					(($this->general->isActivedAfiliacionesPuntosPersonales($afiliado->id,$fecha))==true)){

				
			}else {
				array_push($afiliadosActivos,$afiliado);
			}
				
		}
	
		return $afiliadosActivos;
	}
	
	
	function reporte_afiliados_mes()
	{
		$q=$this->db->query('SELECT a.id, a.username usuario, b.nombre nombre, b.apellido apellido,a.email 
FROM users a, user_profiles b WHERE a.created>=NOW() - INTERVAL 1 MONTH and a.id=b.user_id and b.id_tipo_usuario=2');
		return $q->result();
	}
	function proveedores_prod()
	{
		$q=$this->db->query('SELECT b.nombre emp, c.abreviatura, c.descripcion reg, d.descripcion zona, f.nombre merc, g.descripcion imp, a.razon_social, a.curp, a.rfc, 
		a.condicion_pago, a.promedio_entrega, a.plazo_pago, a.plazo_suspencion, a.interes_moratorio, a.dia_corte, a.dia_pago FROM proveedor a, empresa b, 
		cat_regimen c, cat_zona d, mercancia e, producto f, cat_impuesto g WHERE a.id_empresa=b.id_empresa and a.id_regimen=c.id_regimen and a.id_zona=d.id_zona 
		and e.id=a.mercancia and e.id_tipo_mercancia=1 and e.sku=f.id and a.id_impuesto=g.id_impuesto and a.estatus like "ACT"');
		return $q->result();
	}
	function proveedores_serv()
	{
		$q=$this->db->query('SELECT b.nombre emp, c.abreviatura, c.descripcion reg, d.descripcion zona, f.nombre merc, g.descripcion imp, a.razon_social, a.curp, a.rfc, 
		a.condicion_pago, a.promedio_entrega, a.plazo_pago, a.plazo_suspencion, a.interes_moratorio, a.dia_corte, a.dia_pago FROM proveedor a, empresa b, 
		cat_regimen c, cat_zona d, mercancia e, servicio f, cat_impuesto g WHERE a.id_empresa=b.id_empresa and a.id_regimen=c.id_regimen and a.id_zona=d.id_zona 
		and e.id=a.mercancia and e.id_tipo_mercancia=1 and e.sku=f.id and a.id_impuesto=g.id_impuesto and a.estatus like "ACT"');
		return $q->result();
	}
	function proveedores_comb()
	{
		$q=$this->db->query('SELECT b.nombre emp, c.abreviatura, c.descripcion reg, d.descripcion zona, f.nombre merc, g.descripcion imp, a.razon_social, a.curp, a.rfc, 
		a.condicion_pago, a.promedio_entrega, a.plazo_pago, a.plazo_suspencion, a.interes_moratorio, a.dia_corte, a.dia_pago FROM proveedor a, empresa b, 
		cat_regimen c, cat_zona d, mercancia e, combinado f, cat_impuesto g WHERE a.id_empresa=b.id_empresa and a.id_regimen=c.id_regimen and a.id_zona=d.id_zona 
		and e.id=a.mercancia and e.id_tipo_mercancia=3 and e.sku=f.id and a.id_impuesto=g.id_impuesto and a.estatus like "ACT"');
		return $q->result();
	}
	function reporte_usuarios()
	{
		$q=$this->db->query('
		Select U.id, U.username, 
		U.email, 
		CS.descripcion sexo, 
		CEC.descripcion estado_civil, 
		TU.descripcion tipo_usuario, 
		CE.descripcion estudio, 
		CO.descripcion ocupacion, 
		CTD.descripcion tiempo_dedicado, 
		CUF.descripcion fiscal, 
		UP.nombre, 
		UP.apellido, 
		UP.rfc, 
		CEF.descripcion, 
		UP.fecha_nacimiento, 
		(select (YEAR(CURDATE())-YEAR(fecha_nacimiento)) - (RIGHT(CURDATE(),5)<RIGHT(fecha_nacimiento,5)) edad from user_profiles where user_id=U.id) edad, 
		UP.ultima_sesion, 
		CC.cuenta, 
		CC.banco, 
		(select url from cat_img CIMG where CIMG.id_img=(select CUI.id_img from cross_img_user CUI where CUI.id_user=U.id)) url, 
		CC.estatus
		from users U 
		left join user_profiles UP on UP.user_id=U.id  
		left join cat_sexo CS on UP.id_sexo=CS.id_sexo 
		left join cat_edo_civil CEC on CEC.id_edo_civil=UP.id_edo_civil 
		left join cat_tipo_usuario TU on TU.id_tipo_usuario=UP.id_tipo_usuario 
		left join cat_estudios CE on CE.id_estudio=UP.id_estudio 
		left join cat_ocupacion CO on CO.id_ocupacion=UP.id_ocupacion 
		left join cat_tiempo_dedicado CTD on CTD.id_tiempo_dedicado=UP.id_tiempo_dedicado 
		left join cat_usuario_fiscal CUF on CUF.id=UP.id_fiscal 
		left join cat_estatus_afiliado CEF on CEF.id_estatus=UP.id_estatus 
		left join cat_cuenta CC on CC.id_user=U.id');
		return $q->result();
	}
	
	private function setComisiones(){
		
		$afiliados_q = $this->db->query('select id from users where id > 1');
		$afiliados = $afiliados_q->result();
		
		$billeteras = array();
		
		foreach ($afiliados as $afiliado){
			array_push ($billeteras,$this->getbilleteraVirtual($afiliado->id));
		}
		
		return $billeteras;
	}
	
	function getTodoComisiones($inicio, $fin){
		
		$this->setInicio($inicio);
		$this->setFin($fin);
		
		$ventas = $this->getVentas ($inicio, $fin);
		
		//echo $this->inicio."|".$this->fin;exit();
		
		$impuestos = $this->getImpuestos ($inicio, $fin);		
		
		$billeteras = $this->setComisiones();
		
		$comision = 0;
		$bono = 0;
		$neto = 0;
		$transacciones = 0;
		$pagos = 0;
		
		foreach ($billeteras as $todo){
			$comision += $todo['comisiones'];
			$bono += $todo['bonos'];
			$transacciones += $todo['transacciones'];
			$pagos += $todo['pagos'];
			$neto += $todo['total'];
		}
		
		//echo "ventas: ".$ventas." impuestos: ".$impuestos." total_ventas: ".($ventas+$impuestos);exit();
		
		$totales = array(
				
				'ventas' => $ventas,
				'impuestos' => $impuestos,
				'ventast' => $ventas+$impuestos,
				'comisiones' => $comision,
				'bonos' => $bono,
				'comisionest' => $comision+$bono,
				'transacciones' => $transacciones,
				'pagos' => $pagos,
				'neto' => $neto
				
		);
		
		return $totales;
		
	}
	
	private function getVentas($inicio, $fin) {
		$ventas_q = $this->db->query("SELECT 
										    sum((case
										        when (cvm.cantidad = 0) then 1
										        else cvm.cantidad
										    end) * (select 
										            (case
										                    when (m.iva = 'MAS') then m.costo
										                    else round(m.costo * (1 - (select 
										                                    concat('0.', i.porcentaje)
										                                from
										                                    cat_impuesto i
										                                where
										                                    i.id_pais = m.pais)),
										                            2)
										                end)
										        from
										            mercancia m
										        where
										            m.id = cvm.id_mercancia)) ventas
										FROM
										    venta v,
										    cross_venta_mercancia cvm
										WHERE
										    cvm.id_venta = v.id_venta
										        and v.id_estatus = 'ACT'
										        and date(v.fecha) between '".$inicio."' and '".$fin."'
										-- GROUP BY v.id_venta
										-- ORDER BY v.id_venta");
		
		$ventas = $ventas_q->result();
		$ventas = $ventas[0]->ventas;
		return $ventas;
	}
	
	private function getImpuestos($inicio, $fin) {
		$ventas_q = $this->db->query("SELECT 
									    round(sum((case
									                when (cvm.cantidad = 0) then 1
									                else cvm.cantidad
									            end) * (case
									                when
									                    (cvm.impuesto_unidad = 0)
									                then
									                    round((select 
									                                    m.costo * (select 
									                                                concat('0.', i.porcentaje)
									                                            from
									                                                cat_impuesto i
									                                            where
									                                                i.id_pais = m.pais)
									                                from
									                                    mercancia m
									                                where
									                                    m.id = cvm.id_mercancia),
									                            2)
									                else cvm.impuesto_unidad
									            end)),
									            2) impuestos
									FROM
									    venta v,
									    cross_venta_mercancia cvm,
									    mercancia m
									WHERE
									    m.id = cvm.id_mercancia
									        and cvm.id_venta = v.id_venta
									        and v.id_estatus = 'ACT'
									        and date(v.fecha) between '".$inicio."' and '".$fin."'
										-- GROUP BY v.id_venta
										-- ORDER BY v.id_venta");
	
		$ventas = $ventas_q->result();
		$ventas = $ventas[0]->impuestos;
		return $ventas;
	}

	function getbilleteraVirtual($id){
	
		$comision_todo = $this->getObjetoComision ($id);
		
		$bonos = $this->model_bonos->ver_total_bonos_id_Range ( $id ,$this->inicio, $this->fin);	
		$comisiones = $this->modelo_billetera->get_total_comisiones_afiliado_Range ( $id, $this->inicio, $this->fin );
		$cobro = $this->modelo_billetera->get_cobros_total_Range ( $id , $this->inicio, $this->fin );
		$cobroPendientes = $this->modelo_billetera->get_cobros_pendientes_total_afiliado_Range ( $id, $this->inicio, $this->fin );
		$retenciones = $this->modelo_billetera->ValorRetencionesTotales_Range ( $id , $this->inicio, $this->fin);	
		$transaction = $this->modelo_billetera->get_total_transacciones_id_Range ( $id , $this->inicio, $this->fin);
		
		$total = $this->CalcularComisionTodo ( $comision_todo );
		
		$total_transact = $this->setTransacciones ( $transaction );
	
		$retenciones_total = $this->setRetenciones ( $retenciones );
	
		$cobro = $this->setCobros ( $cobro );
		
		$saldo_neto = ($total - ($cobro + $retenciones_total + $cobroPendientes) + ($total_transact));
	
		$EstadoTodo = array(
			'comisiones' => $comisiones,
			'bonos' => $bonos,
			'transacciones' => $total_transact,
			'pagos' => $cobro,
			'total' => $saldo_neto	
		);
		
		return $EstadoTodo;
	
	}
	
	private function setCobros($cobro){
		foreach ( $cobro as $cobros ) {
		
			if ($cobros->monto == null) {
				$cobro = 0;
			} else {
				$cobro = $cobros->monto;
			}
		}
		
		return  $cobro;
	}
	
	private function setRetenciones($retenciones){
		
		$retenciones_total = 0;
		
		foreach ( $retenciones as $retencion ) {
			$retenciones_total += $retencion ['valor'];
		}
		
		return $retenciones_total;
	}
	
	private function setTransacciones($transaction) {
	 
		$total_transact = 0;
			 
		if ($transaction) {
			if ($transaction ['add']) {
				$total_transact += $transaction ['add'];
			}
			if ($transaction ['sub']) {
				$total_transact -= $transaction ['sub'];
			}
		}
		
		return $total_transact;
	}

	

	private function CalcularComisionTodo($comision_todo) {
	 
		 $total = 0;
		 $i = 0;
	 
		// var_dump($comision_todo);
		for($i = 0; $i < sizeof ( $comision_todo ["redes"] ); $i ++) {
				
			$totales = (intval ( $comision_todo ["ganancias"] [$i] [0]->valor ) != 0 || sizeof ( $comision_todo ["bonos"] [$i] ) != 0) ? 0 : 'FAIL';
				
			// echo $totales."|";
				
			if ($totales !== 'FAIL') {
	
				if ($comision_todo ["ganancias"] [$i] [0]->valor != 0) {
						
					if ($comision_todo ["ganancias"] [$i] [0]->valor) {
						$totales += ($comision_todo ["ganancias"] [$i] [0]->valor);
					}
				}
	
				if ($comision_todo ["bonos"] [$i]) {
						
					for($k = 0; $k < sizeof ( $comision_todo ["bonos"] [$i] ); $k ++) {
						if ($comision_todo ["bonos"] [$i] [$k]->valor != 0) {
							$totales += ($comision_todo ["bonos"] [$i] [$k]->valor);
						}
					}
				}
	
				if ($totales != 0) {
					$total += ($totales);
				}
			}
		}
		
		return $total;
	}

	

	private function getObjetoComision($id) {
		//echo $id;exit();
		$redesUsuario = $this->model_tipo_red->RedesUsuario ( $id );
	
		$ganancias = array ();
		$comision_directos = array ();
		$bonos = array ();
	
		foreach ( $redesUsuario as $red ) {
			array_push ( $bonos, $this->model_bonos->ver_total_bonos_id_red_Range ( $id, $red->id, $this->inicio, $this->fin ) );
			array_push ( $ganancias, $this->modelo_billetera->get_comisiones_Range ( $id, $red->id , $this->inicio, $this->fin ) );
			array_push ( $comision_directos, $this->modelo_billetera->getComisionDirectos_Range ( $id, $red->id, $this->inicio, $this->fin ) );
		}
	
		$comision_todo = array (
				'directos' => $comision_directos,
				'ganancias' => $ganancias,
				'bonos' => $bonos,
				'redes' => $redesUsuario
		);
		
		return $comision_todo;
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
	

	
	
}
