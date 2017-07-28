<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class billetera2 extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('cart');
		$this->lang->load('tank_auth');
		$this->load->model('ov/general');
		$this->load->model('ov/modelo_billetera');
		$this->load->model('ov/modelo_dashboard');
		$this->load->model('bo/model_bonos');
		$this->load->model('model_tipo_red');
		$this->load->model('ov/model_perfil_red');
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
	/*	if($this->general->isAValidUser($id,"OV") == false)
		{
			redirect('/ov/compras/carrito');
		}*/
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}

		$id              = $this->tank_auth->get_user_id();
		
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}


		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);

		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);

		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		#$this->template->build('website/ov/billetera/dashboard');
		$this->template->build('website/ov/billetera/index');
	}
	
	function index_estado()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id              = $this->tank_auth->get_user_id();
		
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}
	 
	
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		#$this->template->build('website/ov/billetera/dashboard');
		$this->template->build('website/ov/billetera/index_estado');
	}
	
	function historial_cuenta()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id              = $this->tank_auth->get_user_id();
		
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}
	
	
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$historial=$this->modelo_billetera->get_historial_cuenta($id);
		$ganancias=$this->modelo_billetera->get_monto($id);
		$ganancias=$ganancias[0]->monto;
		$años = $this->modelo_billetera->anosCobro($id);

	/*	foreach ($historial as $comision){
				if($comision->fecha == $mes->fecha){
					$mes->valor+=$comision->valor;
				}
		}*/
		$this->template->set("historial",$historial);
		
		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
		//$this->template->set("historial",$historial);
		$this->template->set("ganancias",$ganancias);
		$this->template->set("años",$años);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		#$this->template->build('website/ov/billetera/dashboard');
		$this->template->build('website/ov/billetera/historial_cuenta');
	}
	
	function historial()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id              = $this->tank_auth->get_user_id();
		
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}
	
	
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$historial=$this->modelo_billetera->get_historial($id);
		$ganancias=$this->modelo_billetera->get_monto($id);
		$ganancias=$ganancias[0]->monto;
		$cobro=$this->modelo_billetera->get_cobro($id);
		$metodo_cobro=$this->modelo_billetera->get_metodo();
		$datatable=$this->modelo_billetera->datable($id);
		$años = $this->modelo_billetera->anosCobro($id);
		
		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
		$this->template->set("historial",$historial);
		$this->template->set("ganancias",$ganancias);
		$this->template->set("datatable",$datatable);
		$this->template->set("metodo_cobro",$metodo_cobro);
		$this->template->set("años",$años);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		#$this->template->build('website/ov/billetera/dashboard');
		$this->template->build('website/ov/billetera/historial');
	}

	function pedir_pago()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id              = $this->tank_auth->get_user_id();
		
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}	
	
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$redes = $this->model_tipo_red->listarTodos();
		$redesUsuario = $this->model_tipo_red->RedesUsuario($id);
		
		$ganancias=array();
		$comision_directos = array();
		$bonos = array();		
		
		foreach ($redesUsuario as $red){
			array_push($bonos,$this->model_bonos->ver_total_bonos_id_red($id,$red->id));
			array_push($ganancias,$this->modelo_billetera->get_comisiones($id,$red->id));
			array_push($comision_directos,$this->modelo_billetera->getComisionDirectos($id, $red->id));
		}
		
		$comision_todo= array(
				'directos' => $comision_directos,
				'ganancias' => $ganancias,
				'bonos' => $bonos,
				'redes' => $redesUsuario
		);
		
		$total_bonos = $this->model_bonos->ver_total_bonos_id($id);
		
		$comisiones = $this->modelo_billetera->get_total_comisiones_afiliado($id);
		$cobro=$this->modelo_billetera->get_cobros_total($id);
		$cobroPendientes=$this->modelo_billetera->get_cobros_pendientes_total_afiliado($id);
		$retenciones = $this->modelo_billetera->ValorRetencionesTotales($id);
		$pais            = $this->model_perfil_red->get_pais();
		$cuenta			 = $this->model_perfil_red->val_cuenta_banco($id);
		
		$transaction = $this->modelo_billetera->get_total_transacciones_id($id);
		
		$this->template->set("style",$style);
		$this->template->set("pais",$pais);
		$this->template->set("cuenta",$cuenta);
		$this->template->set("comisiones",$comisiones);
		$this->template->set("usuario",$usuario);
		$this->template->set("ganancias",$ganancias);
		$this->template->set("transaction",$transaction);
		$this->template->set("redes",$redesUsuario);
		$this->template->set("bonos",$bonos);
		$this->template->set("id",$id);
		$this->template->set("total_bonos",$total_bonos);
		$this->template->set("comision_todo",$comision_todo);
		$this->template->set("comisiones_directos",$comision_directos);
		$this->template->set("cobro",$cobro);
		$this->template->set("cobroPendientes",$cobroPendientes);
		$this->template->set("retenciones",$retenciones);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/billetera/pago');
	}
	
	function cobrar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		
		if($_POST['cobro']<=0){
			echo "ERROR <br>Valor del cobro invalido.";
			exit();
		}
	
		if($_POST['ctitular']==""){
			echo "ERROR <br>Falta ingresar el nombre del titular de la cuenta.";
			exit();
		}
		
		if(is_numeric($_POST['ctitular'])){
			echo "ERROR <br>El titular de la cuenta no debe contener valores numericos.";
			exit();
		}
		
		if($_POST['cbanco']==""){
			echo "ERROR <br>Falta ingresar el banco de la cuenta.";
			exit();
		}
		
		if(intval($_POST['ncuenta'])==0){
			echo "ERROR <br>El numero de la cuenta debe ser un numero valido.";
			exit();
		}
	
		
		$id=$this->tank_auth->get_user_id();
		
		$comisiones = $this->modelo_billetera->get_total_comisiones_afiliado($id);
		$retenciones = $this->modelo_billetera->ValorRetencionesTotalesAfiliado($id);
		$cobrosPagos=$this->modelo_billetera->get_cobros_total_afiliado($id);
		$cobroPendientes=$this->modelo_billetera->get_cobros_pendientes_total_afiliado($id);
		$total_transact = $this->modelo_billetera->get_total_transact_id($id);
		$total_bonos = $this->model_bonos->ver_total_bonos_id($id);
		
	/*	echo $comisiones."<br>";
	 * 	echo $total_bonos."<br>";
		echo $retenciones."<br>";
		echo $cobrosPagos."<br>";
		echo $cobroPendientes."<br>";
*/
		
 
		if((($comisiones-($retenciones+$cobrosPagos+$_POST['cobro']+$cobroPendientes))+($total_transact)+$total_bonos)>0){
			$this->modelo_billetera->cobrar($id,$_POST['ncuenta'],$_POST['ctitular'],$_POST['cbanco'],$_POST['cclabe']);
			echo "Felicitaciones<br> Tu cobro se esta procesando.";
		}else {
			echo "ERROR <br>No hay saldo para realizar el cobro.";
		}

	}
	
	function estado()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id              = $this->tank_auth->get_user_id();
		
		if($this->general->isActived($id)!=0){
			redirect('/ov/compras/carrito');
		}
	
	
		$usuario=$this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$redes = $this->model_tipo_red->listarTodos();
		$redesUsuario = $this->model_tipo_red->RedesUsuario($id);
		
		$ganancias=array();
		$comision_directos = array();
		$bonos = array();		
		
		foreach ($redesUsuario as $red){
			//$array_bono = $this->model_bonos->ver_total_bonos_id($id,$red->id,'');
			//$array_ganancias = $this->modelo_billetera->get_comisiones($id,$red->id);
			//$array_comision = $this->modelo_billetera->getComisionDirectos($id, $red->id);

			array_push($bonos,$this->model_bonos->ver_total_bonos_id_red($id,$red->id));
			array_push($ganancias,$this->modelo_billetera->get_comisiones($id,$red->id));
			array_push($comision_directos,$this->modelo_billetera->getComisionDirectos($id, $red->id));
		}
		
		$comision_todo= array(
				'directos' => $comision_directos,
				'ganancias' => $ganancias,
				'bonos' => $bonos,
				'redes' => $redesUsuario
		);
		
		$comisiones = $this->modelo_billetera->get_total_comisiones_afiliado($id);
		$cobro=$this->modelo_billetera->get_cobros_total($id);
		$cobroPendientes=$this->modelo_billetera->get_cobros_pendientes_total_afiliado($id);
		$retenciones = $this->modelo_billetera->ValorRetencionesTotales($id);
		$total_bonos = $this->model_bonos->ver_total_bonos_id($id);
		
		$transaction = $this->modelo_billetera->get_total_transacciones_id($id);	
		
		
		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
		$this->template->set("id",$id);
		$this->template->set("redes",$redesUsuario);
		$this->template->set("bonos",$bonos);
		$this->template->set("total_bonos",$total_bonos);
		$this->template->set("comisiones",$comisiones);
		$this->template->set("comision_todo",$comision_todo);
		$this->template->set("ganancias",$ganancias);
		$this->template->set("transaction",$transaction);
		$this->template->set("comisiones_directos",$comision_directos);
		$this->template->set("cobro",$cobro);
		$this->template->set("cobroPendientes",$cobroPendientes);
		$this->template->set("retenciones",$retenciones);
		
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		$this->template->build('website/ov/billetera/estadoCuenta');
	}
	
	function estado_historial()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
	
		$usuario= $this->general->get_username($id);
		$style=$this->general->get_style($id);
	
		$redes = $this->model_tipo_red->listarTodos();
		$redesUsuario = $this->model_tipo_red->RedesUsuario($id);
		
		$ganancias=array();
		$comision_directos = array();
		$bonos = array();		
		
		foreach ($redesUsuario as $red){
			array_push($bonos,$this->model_bonos->ver_total_bonos_id_red_fecha($id,$red->id,$_GET['fecha']));
			array_push($ganancias,$this->modelo_billetera->get_comisiones_mes($id,$red->id,$_GET['fecha']));
			array_push($comision_directos, $this->modelo_billetera->getComisionDirectosMes($id, $red->id, $_GET['fecha']));
		}
		
		$comision_todo= array(
				'directos' => $comision_directos,
				'ganancias' => $ganancias,
				'bonos' => $bonos,
				'redes' => $redesUsuario
		);		

		$retenciones = $this->modelo_billetera->ValorRetenciones_historial($_GET['fecha'],$id);
		$cobro=$this->modelo_billetera->get_cobros_afiliado_mes($id,$_GET['fecha']);
		$cobroPendiente=$this->modelo_billetera->get_cobros_afiliado_mes_pendientes($id,$_GET['fecha']);

		$total_bonos = $this->model_bonos->ver_total_bonos_id_fecha($id,$_GET['fecha']);
		
		/*echo date("Y-m", strtotime($_GET['fecha'])) ;
		exit();*/
		
		$transaction = $this->modelo_billetera->get_total_transacciones_id_fecha($id,$_GET['fecha']);
		
		$this->template->set("style",$style);
		$this->template->set("usuario",$usuario);
		$this->template->set("id",$id);
		$this->template->set("redes",$redesUsuario);
		$this->template->set("bonos",$bonos);
		$this->template->set("total_bonos",$total_bonos);
		$this->template->set("comision_todo",$comision_todo);
		$this->template->set("ganancias",$ganancias);
		$this->template->set("retenciones",$retenciones);
		$this->template->set("transaction",$transaction);
		$this->template->set("cobro",$cobro);
		$this->template->set("fecha",$_GET['fecha']);
		$this->template->set("cobroPendientes",$cobroPendiente);
		$this->template->set("comisiones_directos",$comision_directos);
	
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/ov/header');
		$this->template->set_partial('footer', 'website/ov/footer');
		#$this->template->build('website/ov/billetera/dashboard');
		$this->template->build('website/ov/billetera/estado');
	}
	
	function historial_transaccion(){
	
		
		$id=$_POST['id'];
	
		//echo "dentro de historial : ".$id;
		
		$transactions = $this->modelo_billetera->get_transacciones_id($id);
		
		echo
		"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='80%'>
				<thead id='tablacabeza'>
					<th data-class='expand'>ID</th>
					<th data-hide='phone,tablet'>Fecha</th>
					<th data-hide='phone,tablet'>Tipo de Transacción</th>
					<th data-hide='phone,tablet'>Motivo</th>
					<th data-hide='phone,tablet'>Valor</th>
				</thead>
				<tbody>";
		
		
			foreach($transactions as $transaction)
			{
				$color = ($transaction->tipo=="plus") ? "green" : "red";
				echo "<tr>
			<td class='sorting_1'>".$transaction->id."</td>
			<td>".$transaction->fecha."</td>
			<td style='color: ".$color.";'><i class='fa fa-".$transaction->tipo."-circle fa-3x'></i></td>
			<td>".$transaction->descripcion."</td>
			<td> $	".number_format($transaction->monto, 2)."</td>			
			</tr>";
					
				
			}		
			
		
		echo "</tbody>
		</table><tr class='odd' role='row'>";
	
	}
	
	function ventas_comision(){
	
		$ventas = $this->ventas_comisiones();
		$bonos = $this->bonos_comisiones();
		
		echo "<legend><b>Ventas</b></legend></br>";
		echo $ventas;
		
		echo "<hr/>";
		
		echo "<legend><b>Bonos</b></legend></br>";
		echo $bonos;
	
	}
	
	function ventas_comisiones(){
	
	
		$id=$_POST['id'];
		$fecha =isset($_POST['fecha']) ? $_POST['fecha'] : null;
	
		//echo "dentro de historial : ".$id;
	
		$ventas = ($fecha)
		? $this->modelo_billetera->get_ventas_comision_fecha($id,$fecha)
		: $this->modelo_billetera->get_ventas_comision_id($id);
	
		$total = 0 ;
		$ventas_table = "";
	
		if(!$ventas){return "<div class=''>No existen ventas registradas</div>";}
	
		$ventas_table .=
		"<div style='overflow-y: scroll; height: 100px;'><table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='80%'>
				<thead id='tablacabeza'>
					<th data-class='expand'>ID Venta</th>
					<th data-hide='phone,tablet'>Afiliado</th>
					<th data-hide='phone,tablet'>Red</th>
					<th data-hide='phone,tablet'>Items</th>
					<th data-hide='phone,tablet'>Total</th>
					<th data-hide='phone,tablet'>Comision</th>
				</thead>
				<tbody>";
	
	
		foreach($ventas as $venta)
		{
				
			$ventas_table .= "<tr>
			<td class='sorting_1'>".$venta->id_venta."</td>
			<td>".$venta->nombres."</td>
			<td>".$venta->red."</td>
			<td>".$venta->items."</td>
			<td>".number_format($venta->total, 2)."</td>
			<td> $	".number_format($venta->comision, 2)."</td>
			</tr>";
	
			$total += ($venta->comision);
	
		}
			
		$ventas_table .= "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
	
		$ventas_table .= "<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class='sorting_1'><b>TOTAL:</b></td>
			<td><b> $	".number_format($total, 2)."</b></td>
			</tr>";
	
		$ventas_table .= "</tbody>
		</table><tr class='odd' role='row'></div>";
	
		return $ventas_table;
	
	}
	
	function bonos_comisiones(){
	
	
		$id=$_POST['id'];
		$fecha =isset($_POST['fecha']) ? $_POST['fecha'] : null;
	
		//echo "dentro de historial : ".$id;
	
		$bonos = ($fecha) 
		 	? $this->model_bonos->detalle_bono_fecha($id,$fecha) 
		 	: $this->model_bonos->detalle_bono_id($id);
		 
		##return var_dump($bonos); 	
		 	
		$total = 0 ;
		$bonos_table = "";
		
		if(!$bonos||$bonos[0]->valor==0){return "<div class=''>No hay Bonos registrados o no ha aplicado ninguno</div>";}
	
		$bonos_table .=
		"<div style='overflow-y: scroll; height: 100px;'><table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='80%'>
				<thead id='tablacabeza'>
					<th data-class='expand'>ID Historial</th>
					<th data-hide='phone,tablet'>Bono</th>
					<th data-hide='phone,tablet'>Descripcion</th>
					<th data-hide='phone,tablet'>Dia</th>
					<th data-hide='phone,tablet'>Mes</th>
					<th data-hide='phone,tablet'>Año</th>
					<th data-hide='phone,tablet'>Fecha</th>
					<th data-hide='phone,tablet'>Valor</th>
				</thead>
				<tbody>";
	
	
		foreach($bonos as $bono)
		{
			
			$bonos_table .= "<tr>
			<td class='sorting_1'>".$bono->id."</td>
			<td>".$bono->bono."</td>
			<td>".$bono->descripcion."</td>
			<td>".$bono->dia."</td>
			<td>".$bono->mes."</td>
			<td>".$bono->ano."</td>
			<td>".$bono->fecha."</td>
			<td> $	".number_format($bono->valor, 2)."</td>
			</tr>";
	
			$total += ($bono->valor);
	
		}
			
		$bonos_table .= "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
	
		$bonos_table .= "<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class='sorting_1'><b>TOTAL:</b></td>
			<td><b> $	".number_format($total, 2)."</b></td>
			</tr>";
	
		$bonos_table .= "</tbody>
		</table><tr class='odd' role='row'></div>";
		
		return $bonos_table;
	
	}
	
}
