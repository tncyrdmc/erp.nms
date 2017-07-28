<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class reportes extends CI_Controller {
	function __construct() {
		parent::__construct ();
		
		$this->load->helper ( array (
				'form',
				'url' 
		) );
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'security' );
		$this->load->library ( 'tank_auth' );
		$this->lang->load ( 'tank_auth' );
		$this->load->model ( 'bo/modelo_dashboard' );
		$this->load->model ( 'model_tipo_red' );
		$this->load->model ( 'model_servicio' );
		$this->load->model ( 'bo/modelo_reportes' );
		$this->load->model ( 'bo/model_bonos' );
                $this->load->model ( 'bo/modelo_cedi' );
		$this->load->model ( 'general' );
		$this->load->model ( 'modelo_cobros' );
		$this->load->model ( 'bo/modelo_historial_consignacion' );
		$this->load->model ( 'model_excel' );
	}
	function index() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		
		if (! $this->general->isAValidUser ( $id, "comercial" )) {
			redirect ( '/auth/logout' );
		}
		
		$usuario = $this->general->get_username ( $id );
		
		$style = $this->modelo_dashboard->get_style ( 1 );
		
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		$this->template->set_partial ( 'header', 'website/bo/header' );
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/reportes/main_dashboard' );
	}
	function index_actualizado_ventas_ov() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		
		if (! $this->general->isAValidUser ( $id, "comercial" )) {
			redirect ( '/auth/logout' );
		}
		
		$usuario = $this->general->get_username ( $id );
		
		$total_costo = 0;
		$total_impuesto = 0;
		$total_comision = 0;
		$total_neto = 0;
		$redes = $this->model_tipo_red->listarTodos ();
		
		$style = $this->modelo_dashboard->get_style ( $id );
		
		$servicios = $this->model_servicio->listar_todos_por_venta_y_fecha ( $_GET ['startdate'], $_GET ['finishdate'] );
		
		foreach ( $servicios as $servicio ) {
			$total_costo = $total_costo + $servicio->costo;
			$total_impuesto = $total_impuesto + $servicio->impuesto;
			$total_comision = $total_comision + $servicio->comision;
			$total_neto = $total_neto + (($servicio->costo) - ($servicio->impuesto + $servicio->comision));
		}
		
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		$this->template->set ( "redes", $redes );
		$this->template->set ( "servicios", $servicios );
		$this->template->set ( "total_costo", $total_costo );
		$this->template->set ( "total_impuesto", $total_impuesto );
		$this->template->set ( "total_comision", $total_comision );
		$this->template->set ( "total_neto", $total_neto );
		
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		$this->template->set_partial ( 'header', 'website/bo/header' );
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/reportes/main_dashboard_actualizada_ventas_ov' );
	}
	function index_actualizado_() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		
		if (! $this->general->isAValidUser ( $id, "comercial" )) {
			redirect ( '/auth/logout' );
		}
		
		$usuario = $this->general->get_username ( $id );
		
		$total_costo = 0;
		$total_impuesto = 0;
		$total_comision = 0;
		$total_neto = 0;
		$redes = $this->model_tipo_red->listarTodos ();
		
		$style = $this->modelo_dashboard->get_style ( $id );
		
		$servicios = $this->model_servicio->listar_todos_por_venta_y_fecha ( $_POST ['startdate'], $_POST ['finishdate'] );
		
		foreach ( $servicios as $servicio ) {
			$total_costo = $total_costo + $servicio->costo;
			$total_impuesto = $total_impuesto + $servicio->impuesto;
			$total_comision = $total_comision + $servicio->comision;
			$total_neto = $total_neto + (($servicio->costo) - ($servicio->impuesto + $servicio->comision));
		}
		
		$this->template->set ( "usuario", $usuario );
		$this->template->set ( "style", $style );
		$this->template->set ( "redes", $redes );
		$this->template->set ( "servicios", $servicios );
		$this->template->set ( "total_costo", $total_costo );
		$this->template->set ( "total_impuesto", $total_impuesto );
		$this->template->set ( "total_comision", $total_comision );
		$this->template->set ( "total_neto", $total_neto );
		
		$this->template->set_theme ( 'desktop' );
		$this->template->set_layout ( 'website/main' );
		$this->template->set_partial ( 'header', 'website/bo/header' );
		$this->template->set_partial ( 'footer', 'website/bo/footer' );
		$this->template->build ( 'website/bo/reportes/main_dashboard' );
	}
	function reportes_tipo() {
		switch ($_POST ['tipo']) {
			case 1 :
				$this->reporte_ventas_oficinas_virtuales ();
				break;
			case 7 :
				$this->reporte_afiliados ();
				break;
			case 8 :
				$this->reporte_afiliados_mes ();
				break;
			case 9 :
				$this->reporte_cobros_pendientes ();
				break;
			case 10 :
				$this->reporte_comisiones_pagadas ();
				break;
			case 11 :
				$this->reporte_cobros_todos ();
				break;
			case 12 :
				$this->reporte_cobros_pagados ();
				break;
			case 13 :
				$this->reporte_comisiones_por_pagar ();
				break;
			case 14 :
				$this->reporte_ventas_pagadas_online ();
				break;
			case 15 :
				$this->afiliados_activos ();
				break;
			case 16 :
				$this->afiliados_inactivos ();
				break;
			case 17 :
				$this->reporte_bonos_afiliados_todos ();
				break;
			case 18 :
				$this->reporte_todo_comisiones ();
				break;
                        case 19 :
				$this->reporte_cedi_lite ();
				break;
		}
	}
	
        function reporte_cedi_lite()
	{
		$id=$this->tank_auth->get_user_id();
	
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
	
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
	
		$usuario=$this->general->get_username($id);
		
		$inicio = $_POST['inicio'] ? $_POST['inicio'] : date('Y-m').'-01';
		$fin = $_POST['fin'] ? $_POST['fin'] : date('Y-m-d');
	
		$inventario = $this->modelo_cedi->getVentasRealizadas($inicio,$fin);
	
		echo
		"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Fecha</th>
					<th>CEDI</th>
					<th>Usuario</th>
					<th>Cliente</th>
					<th>Puntos</th>
					<th>Valor Venta</th>
					<th>IVA</th>
					<th>Total Venta</th>
				</thead>
				<tbody>";
		
		$total = 0;
		$iva = 0;
		$venta = 0;
		$puntos = 0;
		
		foreach ($inventario as $producto){
			echo "<tr>
					<td class='sorting_1'>".$producto->id."</td>
					<td>".$producto->fecha."</td>
					<td>".$producto->cedi."</td>
					<td>".$producto->usuario."</td>
					<td>".$producto->cliente." [".$producto->red."]</td>
					<td>".$producto->puntos."</td>
					<td>$ ".number_format(($producto->valor-$producto->iva),2)."</td>
					<td>$ ".number_format($producto->iva,2)."</td>
					<td>$ ".number_format($producto->valor,2)."</td>
				</tr>";
			$total += $producto->valor;
			$iva += $producto->iva;
			$venta += ($producto->valor-$producto->iva);
			$puntos += $producto->puntos;
		}
		
		echo "<tr>
					<td class='sorting_1'></td>
					<td></td>
					<td></td>
					<td></td>
					<td><b>TOTALES</b></td>
					<td><b>".$puntos."</b></td>
					<td><b>$ ".number_format($venta,2)."</b></td>
					<td><b>$ ".number_format($iva,2)."</b></td>
					<td><b>$ ".number_format($total,2)."</b></td>
				</tr>";
			
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	
	
	}
        
	function reporte_bonos_afiliados_todos() {
		
		$inicio = $_POST ['startdate'];
		$fin = $_POST ['finishdate'];
		
		$total = 0;
		
		echo
		"<table id='datatable_fixed_column1'
				class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>". 
					"<th>ID historial</th>" . 
					"<th>Usuario</th>" . 
					"<th data-hide='phone'>Nombre Completo</th>" . 
					"<th data-hide='phone,tablet'>Fecha</th>" . 
					"<th data-hide='phone,tablet'>Bono</th>" . 
					"<th data-hide='phone,tablet'>Valor</th>" . 
				"</thead>
				<tbody>";
		
		$bonos = $this->model_bonos->getBonosPagadosTodos( $inicio, $fin );
		
		foreach ( $bonos as $bono ) {
			
				$total += $bono->valor;
				
				echo "<tr>" . "<td class='sorting_1'>" . $bono->id . "</td>" 
						. "<td>" . $bono->usuario . "</td>" 
						. "<td>" . $bono->afiliado . "</td>"								
						. "<td> " . $bono->fecha . "</td>" 
						. "<td> " . $bono->bono . "</td>" 								
						. "<td>$ " . $bono->valor . 
				// ."|".$total
				"</td>" . "</tr>";
		}
		
		/*
		 * <td class='sorting_1'></td>
		 * <td></td>
		 * <td></td>
		 * <td></td>
		 * <td></td>
		 * <td></td>
		 * </tr>";
		 */
		
		echo "<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class='sorting_1'><b>TOTAL:</b></td>
			<td><b> $	" . number_format ( $total, 2 ) . "</b></td>
			</tr>";
		
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	
	function reporte_todo_comisiones() {
	
		$inicio = $_POST ['startdate'];
		$fin = $_POST ['finishdate'];
	
	
		echo
		"<table id='datatable_fixed_column1'
				class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>".					
					"<th data-hide='phone'>Ventas</th>" .
					"<th data-hide='phone,tablet'>Impuestos</th>" .
					"<th data-hide='phone,tablet'>Total Ventas</th>" .
					"<th data-hide='phone,tablet'>Comisiones</th>" .
					"<th data-hide='phone,tablet'>Bonos</th>" .
					"<th data-hide='phone,tablet'>Total Comisiones</th>" .
					"<th data-hide='phone,tablet'>Transacciones</th>" .
					"<th data-hide='phone,tablet'>Comisiones Pagadas</th>" .
					"<th>Total Neto</th>" .
					"</thead>
				<tbody>";
	
		$totales = $this->modelo_reportes->getTodoComisiones( $inicio, $fin );
	
		echo "<tr>" 
					. "<td>$ " . $totales['ventas'] . "</td>"
					. "<td>$ " . $totales['impuestos'] . "</td>"
					. "<td>$ " . $totales['ventast'] . "</td>"
					. "<td>$ " . $totales['comisiones'] . "</td>"
					. "<td>$ " . $totales['bonos'] . "</td>"
					. "<td>$ " . $totales['comisionest'] ."</td>"
					. "<td>$ " . $totales['transacciones'] . "</td>"
					. "<td>$ " . $totales['pagos'] ."</td>"
					. "<td>$ " . $totales['neto'] ."</td>" 
				. "</tr>";
	
	
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	
	function reporte_afiliados() {
		$id = $this->tank_auth->get_user_id ();
		
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$usuario = $this->general->get_username ( $id );
		
		$afiliados = $this->modelo_reportes->reporte_afiliados ( $_POST ['startdate'], $_POST ['finishdate'] );
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>ID Sponsor</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>DNI</th>
					<th>Fecha de Nacimiento</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Direccion</th>
				</thead>
				<tbody>";
		for($i = 0; $i < sizeof ( $afiliados ); $i ++) {
			echo "<tr>
					<td class='sorting_1'>" . $afiliados [$i]->id . "</td>
					<td class='sorting_1'>" . $afiliados [$i]->id_sponsor . "</td>
					<td>" . $afiliados [$i]->usuario . "</td>
					<td>" . $afiliados [$i]->nombre . "</td>
					<td>" . $afiliados [$i]->apellido . "</td>
					<td>" . $afiliados [$i]->dni . "</td>
					<td>" . $afiliados [$i]->fecha_nacimiento . "</td>
					<td>" . $afiliados [$i]->email . "</td>
					<td>" . $afiliados [$i]->telefono . "</td>
					<td>" . $afiliados [$i]->direccion . "</td>
				</tr>";
		}
		
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	function reporte_afiliados_excel() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		
		if (! $this->general->isAValidUser ( $id, "comercial" )) {
			redirect ( '/auth/logout' );
		}
		
		$usuario = $this->general->get_username ( $id );
		
		$id = $this->tank_auth->get_user_id ();
		$inicio = "2000-01-01";
		if ($_GET ['inicio'] != null) {
			$inicio = $_GET ['inicio'];
		}
		
		$fin = "2200-12-31";
		if ($_GET ['fin'] != null) {
			$fin = $_GET ['fin'];
		}
		
		$afiliados = $this->modelo_reportes->reporte_afiliados ( $inicio, $fin );
		
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
		$contador_filas = 0;
		
		for($i = 0; $i < count ( $afiliados ); $i ++) {
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($i + 8), $afiliados [$i]->id );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($i + 8), $afiliados [$i]->id_sponsor );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($i + 8), $afiliados [$i]->usuario );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($i + 8), $afiliados [$i]->nombre );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($i + 8), $afiliados [$i]->apellido );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($i + 8), $afiliados [$i]->dni );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, ($i + 8), $afiliados [$i]->fecha_nacimiento );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 7, ($i + 8), $afiliados [$i]->email );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($i + 8), $afiliados [$i]->telefono );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 9, ($i + 8), $afiliados [$i]->direccion );
			$contador_filas ++;
		}
		
		$subtitulos = array (
				"ID",
				"ID Sponsor",
				"Usuario",
				"Nombre",
				"Apellido",
				"DNI",
				"Fecha de Nacimiento",
				"Email",
				"Telefono",
				"Direccion" 
		);
		$this->model_excel->setTemplateExcelReport ( "Afiliados", $subtitulos, $contador_filas, $this->excel );
		
		$filename = 'Afiliados.xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		// $objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save ( 'php://output' );
	}
	function reporte_afiliados_mes() {
		$id = $this->tank_auth->get_user_id ();
		$afiliados = $this->modelo_reportes->reporte_afiliados_mes ();
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
				</thead>
				<tbody>";
		for($i = 0; $i < sizeof ( $afiliados ); $i ++) {
			echo "<tr>
					<td class='sorting_1'>" . $afiliados [$i]->id . "</td>
					<td>" . $afiliados [$i]->usuario . "</td>
					<td>" . $afiliados [$i]->nombre . "</td>
					<td>" . $afiliados [$i]->apellido . "</td>
					<td>" . $afiliados [$i]->email . "</td>
				</tr>";
		}
		
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	function reporte_afiliados_mes_excel() {
		$id = $this->tank_auth->get_user_id ();
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		
		if (! $this->general->isAValidUser ( $id, "comercial" )) {
			redirect ( '/auth/logout' );
		}
		
		$usuario = $this->general->get_username ( $id );
		
		$afiliados = $this->modelo_reportes->reporte_afiliados_mes ();
		
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
		$contador_filas = 0;
		
		for($i = 0; $i < count ( $afiliados ); $i ++) {
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($i + 8), $afiliados [$i]->id );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($i + 8), $afiliados [$i]->usuario );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($i + 8), $afiliados [$i]->nombre );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($i + 8), $afiliados [$i]->apellido );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($i + 8), $afiliados [$i]->email );
			$contador_filas ++;
		}
		
		$subtitulos = array (
				"ID",
				"Usuario",
				"Nombre",
				"Apellido",
				"Email" 
		);
		$this->model_excel->setTemplateExcelReport ( "Afiliados", $subtitulos, $contador_filas, $this->excel );
		
		$filename = 'AfiliadosMes.xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		// $objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save ( 'php://output' );
	}
	function afiliados_activos() {
		$id = $this->tank_auth->get_user_id ();
		
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth' );
		}
		
		$afiliados = $this->modelo_reportes->reporte_afiliados_activos ( date ( 'Y-m-d' ) );
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
					<th>Actividad</th>
				</thead>
				<tbody>";
		for($i = 0; $i < sizeof ( $afiliados ); $i ++) {
			echo "<tr>
					<td class='sorting_1'>" . $afiliados [$i]->id . "</td>
					<td>" . $afiliados [$i]->usuario . "</td>
					<td>" . $afiliados [$i]->nombre . "</td>
					<td>" . $afiliados [$i]->apellido . "</td>
					<td>" . $afiliados [$i]->email . "</td>
					<td><div class='widget-body'>
						<h2 class='alert alert-success'><i class='fa fa-thumbs-o-up'></i></h2>
						</div></td>
				</tr>";
		}
		
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	function afiliados_activos_excel() {
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth' );
		}
		
		$afiliados = $this->modelo_reportes->reporte_afiliados_activos ( date ( 'Y-m-d' ) );
		
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
		$contador_filas = 0;
		
		for($i = 0; $i < count ( $afiliados ); $i ++) {
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($i + 8), $afiliados [$i]->id );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($i + 8), $afiliados [$i]->usuario );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($i + 8), $afiliados [$i]->nombre );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($i + 8), $afiliados [$i]->apellido );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($i + 8), $afiliados [$i]->email );
			$contador_filas ++;
		}
		
		$subtitulos = array (
				"ID",
				"Usuario",
				"Nombre",
				"Apellido",
				"Email" 
		);
		$this->model_excel->setTemplateExcelReport ( "Afiliados", $subtitulos, $contador_filas, $this->excel );
		
		$filename = 'AfiliadosActivos.xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		// $objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save ( 'php://output' );
	}
	function afiliados_inactivos() {
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth' );
		}
		
		$afiliados = $this->modelo_reportes->reporte_afiliados_inactivos ( date ( 'Y-m-d' ) );
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
					<th>Actividad</th>
				</thead>
				<tbody>";
		for($i = 0; $i < sizeof ( $afiliados ); $i ++) {
			echo "<tr>
					<td class='sorting_1'>" . $afiliados [$i]->id . "</td>
					<td>" . $afiliados [$i]->usuario . "</td>
					<td>" . $afiliados [$i]->nombre . "</td>
					<td>" . $afiliados [$i]->apellido . "</td>
					<td>" . $afiliados [$i]->email . "</td>
					<td><div class='widget-body'>
						<h2 class='alert alert-danger'><i class='fa fa-thumbs-o-down '></i></h2>
						</div></td>
				</tr>";
		}
		
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	function afiliados_inactivos_excel() {
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth' );
		}
		
		$afiliados = $this->modelo_reportes->reporte_afiliados_inactivos ( date ( 'Y-m-d' ) );
		
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
		$contador_filas = 0;
		
		for($i = 0; $i < count ( $afiliados ); $i ++) {
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($i + 8), $afiliados [$i]->id );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($i + 8), $afiliados [$i]->usuario );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($i + 8), $afiliados [$i]->nombre );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($i + 8), $afiliados [$i]->apellido );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($i + 8), $afiliados [$i]->email );
			$contador_filas ++;
		}
		
		$subtitulos = array (
				"ID",
				"Usuario",
				"Nombre",
				"Apellido",
				"Email" 
		);
		$this->model_excel->setTemplateExcelReport ( "Afiliados", $subtitulos, $contador_filas, $this->excel );
		
		$filename = 'AfiliadosInActivos.xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		// $objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save ( 'php://output' );
	}
	function reporte_ventas_oficinas_virtuales() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		
		if (! $this->general->isAValidUser ( $id, "comercial" )) {
			redirect ( '/auth/logout' );
		}
		
		$total_venta = 0;
		$total_costo = 0;
		$total_impuesto = 0;
		$total_comision = 0;
		$total_neto = 0;
		
		$ventas = $this->model_servicio->listar_todos_por_venta_y_fecha ( $_POST ['startdate'], $_POST ['finishdate'] );
		
		$id = $this->tank_auth->get_user_id ();
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th data-class='expand'>ID Venta</th>
					<th data-hide='phone,tablet'>Username</th>
					<th data-hide='phone,tablet'>Nombre</th>
					<th data-hide='phone,tablet'>Apellido</th>
					<th data-hide='phone,tablet'>Subtotal</th>
					<th data-hide='phone,tablet'>Impuestos</th>
					<th data-hide='phone,tablet'>Total Venta</th>
					<th data-hide='phone,tablet'>Total Comisiones</th>
					<th data-hide='phone,tablet'>Total Neto</th>
				</thead>
				<tbody>";
		
		if ($_POST ['startdate'] != "") {
			foreach ( $ventas as $venta ) {
				echo "<tr>
			<td class='sorting_1'>" . $venta->id_venta . "</td>
			<td>" . $venta->username . "</td>
			<td>" . $venta->name . "</td>
			<td>" . $venta->lastname . "</td>		
			<td> $	" . number_format ( ($venta->costo - $venta->impuestos), 2, '.', '' ) . "</td>
			<td> $	" . number_format ( $venta->impuestos, 2, '.', '' ) . "</td>
			<td> $	" . number_format ( $venta->costo, 2, '.', '' ) . "</td>
			<td> $	" . number_format ( $venta->comision, 2, '.', '' ) . "</td>
			<td> $	" . number_format ( (($venta->costo) - ($venta->impuestos + $venta->comision)), 2, '.', '' ) . "</td>
			</tr>";
				
				$total_costo = $total_costo + ($venta->costo - $venta->impuestos);
				$total_impuesto = $total_impuesto + $venta->impuestos;
				$total_venta = $total_venta + $venta->costo;
				$total_comision = $total_comision + $venta->comision;
				$total_neto = $total_neto + (($venta->costo) - ($venta->impuestos + $venta->comision));
			}
			
			echo "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
			
			echo "<tr>
			<td class='sorting_1'><b>TOTALES</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b> $	" . number_format ( $total_costo, 2, '.', '' ) . "</b></td>
			<td><b> $	" . number_format ( $total_impuesto, 2, '.', '' ) . "</b></td>
			<td><b> $	" . number_format ( $total_venta, 2, '.', '' ) . "</b></td>
			<td><b> $	" . number_format ( $total_comision, 2, '.', '' ) . "</b></td>
			<td><b> $	" . number_format ( $total_neto, 2, '.', '' ) . "</b></td>
			</tr>";
		}
		echo "</tbody>
		</table><tr class='odd' role='row'>";
	}
	function reporte_ventas_oficinas_virtuales_excel() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
		
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
		
		if ($usuario [0]->id_tipo_usuario != 1) {
			redirect ( '/auth/logout' );
		}
		$total_venta = 0;
		$total_costo = 0;
		$total_impuesto = 0;
		$total_comision = 0;
		$total_neto = 0;
		
		if ($_GET ['inicio'] != "") {
			$contador_filas = 0;
			$ventas = $this->model_servicio->listar_todos_por_venta_y_fecha ( $_GET ['inicio'], $_GET ['fin'] );
			
			$this->load->library ( 'excel' );
			$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
			
			for($i = 0; $i < count ( $ventas ); $i ++) {
				
				$contador_filas = $contador_filas + 1;
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($contador_filas + 7), $ventas [$i]->id_venta );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($contador_filas + 7), $ventas [$i]->username );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($contador_filas + 7), $ventas [$i]->name );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($contador_filas + 7), $ventas [$i]->lastname );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($contador_filas + 7), $ventas [$i]->costo - $ventas [$i]->impuestos );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($contador_filas + 7), $ventas [$i]->impuestos );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, ($contador_filas + 7), $ventas [$i]->costo );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 7, ($contador_filas + 7), $ventas [$i]->comision );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($contador_filas + 7), (($ventas [$i]->costo) - ($ventas [$i]->impuestos + $ventas [$i]->comision)) );
				
				$total_costo = $total_costo + ($ventas [$i]->costo - $ventas [$i]->impuestos);
				$total_impuesto = $total_impuesto + $ventas [$i]->impuestos;
				$total_venta = $total_venta + $ventas [$i]->costo;
				$total_comision = $total_comision + $ventas [$i]->comision;
				$total_neto = $total_neto + (($ventas [$i]->costo) - ($ventas [$i]->impuestos + $ventas [$i]->comision));
			}
			
			$subtitulos = array (
					"ID Venta",
					"Username",
					"Nombre",
					"Apellido",
					"Subtotal",
					"Impuestos",
					"Total Venta",
					"Total Comisiones",
					"Total Neto" 
			);
			
			$this->model_excel->setTemplateExcelReport ( "Ventas Oficina Virtual", $subtitulos, $contador_filas, $this->excel );
			
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($contador_filas + 10), "TOTALES" );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($contador_filas + 10), "" );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($contador_filas + 10), "" );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($contador_filas + 10), "" );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($contador_filas + 10), $total_costo );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($contador_filas + 10), $total_impuesto );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, ($contador_filas + 10), $total_venta );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 7, ($contador_filas + 10), $total_comision );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($contador_filas + 10), $total_neto );
		}
		
		$filename = 'Ventas_Oficina_virtual_de ' . $_GET ['inicio'] . ' al ' . $_GET ['fin'] . '.xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		// $objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save ( 'php://output' );
		/*
		 * if ($_GET['inicio']!=""){
		 *
		 *
		 * $contador_filas = 0;
		 * for($i = 0;$i < count($ventas);$i++)
		 * {
		 * echo "<tr>
		 * <td class='sorting_1'>".$venta->id_venta."</td>
		 * <td>".$venta->username."</td>
		 * <td>".$venta->name."</td>
		 * <td>".$venta->lastname."</td>
		 * <td> $ ".($venta->costo-$venta->impuestos)."</td>
		 * <td> $ ".$venta->impuestos."</td>
		 * <td> $ ".$venta->costo."</td>
		 * <td> $ ".$venta->comision."</td>
		 * <td> $ ".(($venta->costo)-($venta->impuestos+$venta->comision))."</td>
		 * </tr>";
		 */
		/*
		 * $contador_filas = $contador_filas+1;
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($contador_filas+8), $ventas[$i]->id_venta);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($contador_filas+8), $ventas[$i]->username);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($contador_filas+8), $ventas[$i]->lastname);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($contador_filas+8), $ventas[$i]->costo-$ventas[$i]->impuestos);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($contador_filas+8), $ventas[$i]->impuestos);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($contador_filas+8), $ventas[$i]->costo);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($contador_filas+8), (($ventas[$i]->costo)-($ventas[$i]->impuestos+$ventas[$i]->comision)));
		 *
		 * $total_costo = $total_costo + ($ventas[$i]->costo-$ventas[$i]->impuestos);
		 * $total_impuesto = $total_impuesto + $ventas[$i]->impuestos;
		 * $total_venta = $total_venta + $ventas[$i]->costo;
		 * $total_comision = $total_comision + $ventas[$i]->comision;
		 * $total_neto = $total_neto + (($ventas[$i]->costo)-($ventas[$i]->impuestos+$ventas[$i]->comision));
		 *
		 * }
		 * }
		 *
		 * if ($_GET['inicio']!=""){
		 * $total_costo = 0;
		 * $total_impuesto = 0;
		 * $total_comision = 0;
		 * $total_neto = 0;
		 * $redes = $this->model_tipo_red->listarTodos();
		 *
		 * $style=$this->modelo_dashboard->get_style($id);
		 *
		 * $servicios = $this->model_servicio->listar_todos_por_venta_y_fecha($_GET['inicio'],$_GET['fin']);
		 *
		 * $this->load->library('excel');
		 * $this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_ventas_oficinas_virtuales.xls");
		 *
		 * foreach ($servicios as $servicio){
		 * $total_costo = $total_costo + $servicio->costo;
		 * $total_impuesto = $total_impuesto + $servicio->impuesto;
		 * $total_comision = $total_comision + $servicio->comision;
		 * $total_neto = $total_neto + (($servicio->costo)-($servicio->impuesto+$servicio->comision));
		 * }
		 * $contador_filas = 0;
		 * for($i = 0;$i < count($servicios);$i++)
		 * {
		 * $contador_filas = $contador_filas+1;
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($contador_filas+8), $servicios[$i]->nombre_red);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($contador_filas+8), $servicios[$i]->nombre);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($contador_filas+8), $servicios[$i]->cantidad);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($contador_filas+8), $servicios[$i]->costo);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($contador_filas+8), $servicios[$i]->impuesto);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($contador_filas+8), $servicios[$i]->comision);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($contador_filas+8), (($servicios[$i]->costo)-($servicios[$i]->impuesto+$servicios[$i]->comision)));
		 * }
		 * $contador_filas = $contador_filas+1;
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($contador_filas+8), "TOTALES");
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($contador_filas+8), "");
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($contador_filas+8), "");
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($contador_filas+8), $total_costo);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($contador_filas+8), $total_impuesto);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($contador_filas+8), $total_comision);
		 * $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($contador_filas+8), $total_neto);
		 *
		 *
		 * $filename='Ventas_Oficina_virtual_de '.$_GET['inicio'].' al '.$_GET['fin'].'.xls'; //save our workbook as this file name
		 * header('Content-Type: application/vnd.ms-excel'); //mime type
		 * header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		 * header('Cache-Control: max-age=0'); //no cache
		 *
		 * //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		 * //if you want to save it as .XLSX Excel 2007 format
		 * $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		 * //force user to download the Excel file without writing it to server's HD
		 * //$objWriter->save(getcwd()."/media/reportes/".$filename);
		 * $objWriter->save('php://output');
		 */
	}
	function reporte_proveedores() {
		$proveedor_p = $this->modelo_reportes->proveedores_prod ();
		$proveedor_s = $this->modelo_reportes->proveedores_serv ();
		$proveedor_c = $this->modelo_reportes->proveedores_comb ();
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Empresa</th>
					<th>Regimen</th>
					<th>Zona</th>
					<th>Mercancia</th>
					<th>Razon Social</th>
					<th>CURP</th>
					<th>RFC</th>
					<th>Impuesto</th>
					<th>Condicion Pago</th>
					<th>Promedio Pago</th>
					<th>Plazo Pago</th>
					<th>Plazo Suspension</th>
					<th>Interes Moratorio</th>
					<th>Dia Corte</th>
					<th>Dia Pago</th>
				</thead>
				<tbody>";
		$j = 0;
		for($i = 0; $i < sizeof ( $proveedor_p ); $i ++) {
			echo "<tr>
					<td class='sorting_1'>" . ($j + 1) . "</td>
					<td>" . $proveedor_p [$i]->emp . "</td>
					<td>" . $proveedor_p [$i]->abreviatura . " (" . $proveedor_p [$i]->reg . ")</td>
					<td>" . $proveedor_p [$i]->zona . "</td>
					<td>" . $proveedor_p [$i]->merc . "</td>
					<td>" . $proveedor_p [$i]->razon_social . "</td>
					<td>" . $proveedor_p [$i]->curp . "</td>
					<td>" . $proveedor_p [$i]->rfc . "</td>
					<td>" . $proveedor_p [$i]->imp . "</td>
					<td>" . $proveedor_p [$i]->condicion_pago . "</td>
					<td>" . $proveedor_p [$i]->promedio_pago . "</td>
					<td>" . $proveedor_p [$i]->plazo_pago . "</td>
					<td>" . $proveedor_p [$i]->plazo_suspencion . "</td>
					<td>" . $proveedor_p [$i]->interes_moratorio . "</td>
					<td>" . $proveedor_p [$i]->dia_corte . "</td>
					<td>" . $proveedor_p [$i]->dia_pago . "</td>
				</tr>";
			$j ++;
		}
		for($i = 0; $i < sizeof ( $proveedor_s ); $i ++) {
			echo "<tr>
					<td class='sorting_1'>" . ($j + 1) . "</td>
					<td>" . $proveedor_s [$i]->emp . "</td>
					<td>" . $proveedor_s [$i]->abreviatura . " (" . $proveedor_p [$i]->reg . ")</td>
					<td>" . $proveedor_s [$i]->zona . "</td>
					<td>" . $proveedor_s [$i]->merc . "</td>
					<td>" . $proveedor_s [$i]->razon_social . "</td>
					<td>" . $proveedor_s [$i]->curp . "</td>
					<td>" . $proveedor_s [$i]->rfc . "</td>
					<td>" . $proveedor_s [$i]->imp . "</td>
					<td>" . $proveedor_s [$i]->condicion_pago . "</td>
					<td>" . $proveedor_s [$i]->promedio_pago . "</td>
					<td>" . $proveedor_s [$i]->plazo_pago . "</td>
					<td>" . $proveedor_s [$i]->plazo_suspencion . "</td>
					<td>" . $proveedor_s [$i]->interes_moratorio . "</td>
					<td>" . $proveedor_s [$i]->dia_corte . "</td>
					<td>" . $proveedor_s [$i]->dia_pago . "</td>
				</tr>";
			$j ++;
		}
		for($i = 0; $i < sizeof ( $proveedor_c ); $i ++) {
			echo "<tr>
					<td class='sorting_1'>" . ($j + 1) . "</td>
					<td>" . $proveedor_c [$i]->emp . "</td>
					<td>" . $proveedor_c [$i]->abreviatura . " (" . $proveedor_p [$i]->reg . ")</td>
					<td>" . $proveedor_c [$i]->zona . "</td>
					<td>" . $proveedor_c [$i]->merc . "</td>
					<td>" . $proveedor_c [$i]->razon_social . "</td>
					<td>" . $proveedor_c [$i]->curp . "</td>
					<td>" . $proveedor_c [$i]->rfc . "</td>
					<td>" . $proveedor_c [$i]->imp . "</td>
					<td>" . $proveedor_c [$i]->condicion_pago . "</td>
					<td>" . $proveedor_c [$i]->promedio_pago . "</td>
					<td>" . $proveedor_c [$i]->plazo_pago . "</td>
					<td>" . $proveedor_c [$i]->plazo_suspencion . "</td>
					<td>" . $proveedor_c [$i]->interes_moratorio . "</td>
					<td>" . $proveedor_c [$i]->dia_corte . "</td>
					<td>" . $proveedor_c [$i]->dia_pago . "</td>
				</tr>";
			$j ++;
			$j ++;
		}
		
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	function reporte_usuarios() {
		$usuarios = $this->modelo_reportes->reporte_usuarios ();
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Username</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Sexo</th>
					<th>Estado Civil</th>
					<th>Tipo Usuario</th>
					<th>Estudio</th>
					<th>Ocupacion</th>
					<th>Tiempo Dedicado</th>
					<th>Tipo Fiscal</th>
					<th>Fecha Nacimiento</th>
					<th>Ultima Sesion</th>
				</thead>
				<tbody>";
		for($i = 0; $i < sizeof ( $usuarios ); $i ++) {
			echo "<tr>
					<td class='sorting_1'>" . $usuarios [$i]->id . "</td>
					<td>" . $usuarios [$i]->username . "</td>
					<td>" . $usuarios [$i]->nombre . " " . $usuarios [$i]->apellido . "</td>
					<td>" . $usuarios [$i]->email . "</td>
					<td>" . $usuarios [$i]->sexo . "</td>
					<td>" . $usuarios [$i]->estado_civil . "</td>
					<td>" . $usuarios [$i]->tipo_usuario . "</td>
					<td>" . $usuarios [$i]->estudio . "</td>
					<td>" . $usuarios [$i]->ocupacion . "</td>
					<td>" . $usuarios [$i]->tiempo_dedicado . "</td>
					<td>" . $usuarios [$i]->fiscal . "</td>
					<td>" . $usuarios [$i]->fecha_nacimiento . "</td>
					<td>" . $usuarios [$i]->ultima_sesion . "</td>
				</tr>";
		}
		
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	}
	function reporte_cobros_pendientes() {
		$cobros = $this->modelo_historial_consignacion->ListarHistorialPendiente ();
		
		$totalCobros = 0;
		
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID Venta</th>
					<th>Afiliado</th>
					<th>Email</th>
					<th>Banco</th>
					<th>N° Cuenta</th>
					<th>Valor</th>
					<th>Fecha</th>
					<th>Estado</th>
				</thead>
				<tbody>";
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			echo "<tr>
			<td class='sorting_1'>" . $cobros [$i]->id_venta . "</td>
			<td>" . $cobros [$i]->usuario . "</td>
			<td>" . $cobros [$i]->email . "</td>
			<td>" . $cobros [$i]->banco . "</td>
			<td>" . $cobros [$i]->cuenta . "</td>
			<td>" . $cobros [$i]->valor . "</td>
			<td>" . $cobros [$i]->fecha . "</td>
			<td>Pendiente</td>
			</tr>";
			$totalCobros = $totalCobros + $cobros [$i]->valor;
		}
		
		echo "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
		
		echo "<tr>
			<td class='sorting_1'><b>TOTAL</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b></b></td>
			<td><b> $	" . number_format ( $totalCobros, 2, '.', '' ) . "</b></td>
			<td><b></b></td>
			<td><b></b></td>
			<td><b></b></td>
			</tr>";
		
		echo "</tbody> </table> <tr class='odd' role='row'>";
	}
	function reporte_cobros_pagados() {
		$cobros = $this->modelo_historial_consignacion->ListarHistorialPagados ( $_POST ['startdate'], $_POST ['finishdate'] );
		
		$totalCobros = 0;
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID Venta</th>
					<th>Afiliado</th>
					<th>Email</th>
					<th>Banco</th>
					<th>N° Cuenta</th>
					<th>Valor</th>
					<th>Fecha</th>
					<th>Estado</th>
				</thead>
				<tbody>";
		
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			echo "<tr>
			<td class='sorting_1'>" . $cobros [$i]->id_venta . "</td>
			<td>" . $cobros [$i]->usuario . "</td>
			<td>" . $cobros [$i]->email . "</td>
			<td>" . $cobros [$i]->banco . "</td>
			<td>" . $cobros [$i]->cuenta . "</td>
			<td>$ " . $cobros [$i]->valor . "</td>
			<td>" . $cobros [$i]->fecha . "</td>
			<td>Pagado</td>
			</tr>";
			$totalCobros = $totalCobros + $cobros [$i]->valor;
		}
		
		echo "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
		
		echo "<tr>
			<td class='sorting_1'><b>TOTAL</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b></b></td>
			<td><b> $	" . number_format ( $totalCobros, 2, '.', '' ) . "</b></td>
			<td><b></b></td>
			<td><b></b></td>
			<td><b></b></td>
			</tr>";
		
		echo "</tbody> </table> <tr class='odd' role='row'>";
	}
	function reporte_ventas_pagadas_online() {
		$cobros = $this->modelo_historial_consignacion->ListarPagosOnline ( $_POST ['startdate'], $_POST ['finishdate'] );
		
		$totalCobros = 0;
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID Venta</th>
					<th>Afiliado</th>
					<th>Email</th>
					<th>Fecha</th>
					<th>Valor</th>
					<th>Tipo PagoOnline</th>
				</thead>
				<tbody>";
		
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			echo "<tr>
			<td class='sorting_1'>" . $cobros [$i]->id_venta . "</td>
			<td>" . $cobros [$i]->usuario . "</td>
			<td>" . $cobros [$i]->email . "</td>
			<td>" . $cobros [$i]->fecha . "</td>
			<td>$ " . $cobros [$i]->valor . "</td>
			<td>" . $cobros [$i]->metodo . "</td>
			</tr>";
			$totalCobros = $totalCobros + $cobros [$i]->valor;
		}
		
		echo "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
		
		echo "<tr>
			<td class='sorting_1'><b>TOTAL</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b> $	" . number_format ( $totalCobros, 2, '.', '' ) . "</b></td>
			<td><b></b></td>
			<td><b></b></td>
			</tr>";
		
		echo "</tbody> </table> <tr class='odd' role='row'>";
	}
	function reporte_ventas_pagadas_online_excel() {
		$inicio = '2000-01-01';
		if ($_GET ['inicio'] != null) {
			$inicio = $_GET ['inicio'];
		}
		$fin = '3000-12-12';
		if ($_GET ['fin'] != null) {
			$fin = $_GET ['fin'];
		}
		
		$cobros = $this->modelo_historial_consignacion->ListarPagosOnline ( $inicio, $fin );
		
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
		$contador_filas = 0;
		
		$total = 0;
		$ultima_fila = 0;
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($i + 8), $cobros [$i]->id_venta );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($i + 8), $cobros [$i]->usuario );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($i + 8), $cobros [$i]->email );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($i + 8), $cobros [$i]->fecha );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($i + 8), $cobros [$i]->valor );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($i + 8), $cobros [$i]->metodo );
			// $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($i+8), $cobros[$i]->fecha);
			$total = $total + $cobros [$i]->valor;
			$ultima_fila = $i + 8;
			$contador_filas ++;
		}
		
		$subtitulos = array (
				"ID Venta",
				"Afiliado",
				"Email",
				"Fecha",
				"Valor",
				"Metodo" 
		);
		$this->model_excel->setTemplateExcelReport ( "Pagos Online", $subtitulos, $contador_filas, $this->excel );
		
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($ultima_fila + 2), "Total" );
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($ultima_fila + 2), $total );
		
		$filename = 'Pagos Online .xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		$objWriter->save ( 'php://output' );
	}
	function reporte_cobros_pendientes_excel() {
		$cobros = $this->modelo_historial_consignacion->ListarHistorialPendiente ();
		
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
		$contador_filas = 0;
		
		$total = 0;
		$ultima_fila = 0;
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($i + 8), $cobros [$i]->id_venta );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($i + 8), $cobros [$i]->usuario );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($i + 8), $cobros [$i]->email );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($i + 8), $cobros [$i]->banco );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($i + 8), $cobros [$i]->cuenta );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($i + 8), $cobros [$i]->valor );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, ($i + 8), $cobros [$i]->fecha );
			$total = $total + $cobros [$i]->valor;
			$ultima_fila = $i + 8;
			$contador_filas ++;
		}
		
		$subtitulos = array (
				"ID Venta",
				"Afiliado",
				"Email",
				"Banco",
				"N° Cuenta",
				"Valor",
				"Fecha" 
		);
		$this->model_excel->setTemplateExcelReport ( "Cuentas Por Cobrar", $subtitulos, $contador_filas, $this->excel );
		
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($ultima_fila + 2), "Total" );
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($ultima_fila + 2), $total );
		
		$filename = 'Cuentas Por Cobrar.xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		$objWriter->save ( 'php://output' );
	}
	function reporte_cobros_pagados_excel() {
		$cobros = $this->modelo_historial_consignacion->ListarHistorialPagados ( $_GET ['inicio'], $_GET ['fin'] );
		
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
		$contador_filas = 0;
		
		$total = 0;
		$ultima_fila = 0;
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($i + 8), $cobros [$i]->id_venta );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($i + 8), $cobros [$i]->usuario );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($i + 8), $cobros [$i]->email );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($i + 8), $cobros [$i]->banco );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($i + 8), $cobros [$i]->cuenta );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($i + 8), $cobros [$i]->valor );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, ($i + 8), $cobros [$i]->fecha );
			$total = $total + $cobros [$i]->valor;
			$ultima_fila = $i + 8;
			$contador_filas ++;
		}
		
		$subtitulos = array (
				"ID Venta",
				"Afiliado",
				"Email",
				"Banco",
				"N° Cuenta",
				"Valor",
				"Fecha" 
		);
		$this->model_excel->setTemplateExcelReport ( "Cuentas Pagadas", $subtitulos, $contador_filas, $this->excel );
		
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($ultima_fila + 2), "Total" );
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($ultima_fila + 2), $total );
		
		$filename = 'Cuentas Pagadas .xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		$objWriter->save ( 'php://output' );
	}
	/*
	 * function reporte_cobros_pagos_excel(){
	 *
	 * $inicio = '2000-01-01';
	 * if(isset($_POST['inicio'])){
	 * $inicio = $_POST['inicio'];
	 * }
	 * $fin = '3000-12-12';
	 * if(isset($_POST['fin'])){
	 * $fin = $_POST['fin'];
	 * }
	 *
	 * $cobros = $this->modelo_cobros->listarCobrosPagados($inicio, $fin);
	 * $totalCobros=0;
	 *
	 * echo
	 * "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
	 * <thead id='tablacabeza'>
	 * <th>ID</th>
	 * <th>Usuario</th>
	 * <th>Fecha Solicitud</th>
	 * <th>Fecha Pago</th>
	 * <th>Metodo de Pago</th>
	 * <th>Banco</th>
	 * <th>N° Cuenta</th>
	 * <th>Titular</th>
	 * <th>CLABE</th>
	 * <th>Monto</th>
	 * <th>Estado</th>
	 * </thead>
	 * <tbody>";
	 * for($i=0;$i < sizeof($cobros);$i++)
	 * {
	 * echo "<tr>
	 * <td class='sorting_1'>".$cobros[$i]->id_cobro."</td>
	 * <td>".$cobros[$i]->usuario."</td>
	 * <td>".$cobros[$i]->fecha."</td>
	 * <td>".$cobros[$i]->fecha_pago."</td>
	 * <td>".$cobros[$i]->metodo_pago."</td>
	 * <td>".$cobros[$i]->banco."</td>
	 * <td>".$cobros[$i]->cuenta."</td>
	 * <td>".$cobros[$i]->titular."</td>
	 * <td>".$cobros[$i]->clabe."</td>
	 * <td>$ ".number_format($cobros[$i]->monto,2)."</td>
	 * <td>".$cobros[$i]->estado."</td>
	 * </tr>";
	 * $totalCobros = $totalCobros + $cobros[$i]->monto;
	 * }
	 *
	 *
	 * echo "<tr>
	 * <td class='sorting_1'></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * </tr>";
	 *
	 * echo "<tr>
	 * <td class='sorting_1'><b>TOTAL</b></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td></td>
	 * <td><b></b></td>
	 * <td><b> $ ".number_format($totalCobros, 2, '.', '')."</b></td>
	 * <td><b></b></td>
	 * <td></td>
	 * <td><b></b></td>
	 * </tr>";
	 *
	 * echo "</tbody> </table> <tr class='odd' role='row'>";
	 * }
	 *
	 */
	function reporte_comisiones_por_pagar() {
		$inicio = '2000-01-01';
		if (isset ( $_POST ['inicio'] )) {
			$inicio = $_POST ['inicio'];
		}
		$fin = '3000-12-12';
		if (isset ( $_POST ['fin'] )) {
			$fin = $_POST ['fin'];
		}
		
		$cobros = $this->modelo_cobros->listarCobrosPendientesPorPagar ( $inicio, $fin );
		$totalCobros = 0;
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Fecha Solicitud</th>
					<th>Metodo de Pago</th>
					<th>Banco</th>
					<th>N° Cuenta</th>
					<th>Titular</th>
					<th>CLABE</th>
					<th>Monto</th>
					<th>Estado</th>
				</thead>
				<tbody>";
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			echo "<tr>
			<td class='sorting_1'>" . $cobros [$i]->id_cobro . "</td>
			<td>" . $cobros [$i]->usuario . "</td>
			<td>" . $cobros [$i]->fecha . "</td>
			<td>" . $cobros [$i]->metodo_pago . "</td>
			<td>" . $cobros [$i]->banco . "</td>
			<td>" . $cobros [$i]->cuenta . "</td>
			<td>" . $cobros [$i]->titular . "</td>
			<td>" . $cobros [$i]->clabe . "</td>
			<td>$ " . number_format ( $cobros [$i]->monto, 2 ) . "</td>
			<td>" . $cobros [$i]->estado . "</td>
			</tr>";
			$totalCobros = $totalCobros + $cobros [$i]->monto;
		}
		
		echo "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
		
		echo "<tr>
			<td class='sorting_1'><b>TOTAL</b></td>
			<td></td>
			<td></td>
			<td><b></b></td>
			<td></td>
			<td><b></b></td>
			<td><b></b></td>
			<td><b></b></td>
			<td><b> $	" . number_format ( $totalCobros, 2, '.', '' ) . "</b></td>
			<td></td>
			<td></td>
			</tr>";
		
		echo "</tbody> </table> <tr class='odd' role='row'>";
	}
	function reporte_comisiones_por_pagar_excel() {
		$inicio = '2000-01-01';
		if ($_GET ['inicio'] != null) {
			$inicio = $_GET ['inicio'];
		}
		$fin = '3000-12-12';
		if ($_GET ['fin'] != null) {
			$fin = $_GET ['fin'];
		}
		
		$cobros = $this->modelo_cobros->listarCobrosPendientesPorPagar ( $inicio, $fin );
		$totalCobros = 0;
		
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
		$contador_filas = 0;
		
		$total = 0;
		$ultima_fila = 0;
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($i + 8), $cobros [$i]->id_cobro );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($i + 8), $cobros [$i]->usuario );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($i + 8), $cobros [$i]->fecha );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($i + 8), $cobros [$i]->metodo_pago );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($i + 8), $cobros [$i]->banco );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($i + 8), $cobros [$i]->cuenta );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, ($i + 8), $cobros [$i]->titular );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 7, ($i + 8), $cobros [$i]->clabe );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($i + 8), $cobros [$i]->monto );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 9, ($i + 8), $cobros [$i]->estado );
			$total = $total + $cobros [$i]->monto;
			$ultima_fila = $i + 8;
			$totalCobros ++;
			$contador_filas ++;
		}
		
		$subtitulos = array (
				"ID",
				"Usuario",
				"Fecha de Solicitud",
				"Metodo",
				"Banco",
				"N° Cuenta",
				"Titular",
				"CLABE",
				"Valor",
				"Estado" 
		);
		$this->model_excel->setTemplateExcelReport ( "Cuentas Por Cobrar", $subtitulos, $contador_filas, $this->excel );
		
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 7, ($ultima_fila + 2), "Total" );
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($ultima_fila + 2), $total );
		
		$filename = 'Comisiones por Pagar de ' . $inicio . ' al ' . $fin . '.xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		$objWriter->save ( 'php://output' );
	}
	function reporte_comisiones_pagadas() {
		$inicio = '2000-01-01';
		if (isset ( $_POST ['inicio'] )) {
			$inicio = $_POST ['inicio'];
		}
		$fin = '3000-12-12';
		if (isset ( $_POST ['fin'] )) {
			$fin = $_POST ['fin'];
		}
		
		$totalCobros = 0;
		
		$cobros = $this->modelo_cobros->listarCobrosPagados ( $inicio, $fin );
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Fecha Solicitud</th>
					<th>Fecha Pago</th>
					<th>Metodo de Pago</th>
					<th>Banco</th>
					<th>N° Cuenta</th>
					<th>Titular</th>
					<th>CLABE</th>
					<th>Monto</th>
					<th>Estado</th>
				</thead>
				<tbody>";
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			echo "<tr>
			<td class='sorting_1'>" . $cobros [$i]->id_cobro . "</td>
			<td>" . $cobros [$i]->usuario . "</td>
			<td>" . $cobros [$i]->fecha . "</td>
			<td>" . $cobros [$i]->fecha_pago . "</td>
			<td>" . $cobros [$i]->metodo_pago . "</td>
			<td>" . $cobros [$i]->banco . "</td>
			<td>" . $cobros [$i]->cuenta . "</td>
			<td>" . $cobros [$i]->titular . "</td>
			<td>" . $cobros [$i]->clabe . "</td>
			<td>$ " . number_format ( $cobros [$i]->monto, 2 ) . "</td>
			<td>" . $cobros [$i]->estado . "</td>
			</tr>";
			$totalCobros = $totalCobros + $cobros [$i]->monto;
		}
		
		echo "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
		
		echo "<tr>
			<td class='sorting_1'><b>TOTAL</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b></b></td>
			<td></td>
			<td><b> $	" . number_format ( $totalCobros, 2, '.', '' ) . "</b></td>
			<td><b></b></td>
			<td><b></b></td>
			</tr>";
		
		echo "</tbody> </table> <tr class='odd' role='row'>";
	}
	function reporte_comisiones_pagadas_excel() {
		$inicio = '2000-01-01';
		if ($_GET ['inicio'] != null) {
			$inicio = $_GET ['inicio'];
		}
		$fin = '3000-12-12';
		if ($_GET ['fin'] != null) {
			$fin = $_GET ['fin'];
		}
		
		$cobros = $this->modelo_cobros->listarCobrosPagados ( $inicio, $fin );
		
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
		$contador_filas = 0;
		
		$total = 0;
		$ultima_fila = 0;
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($i + 8), $cobros [$i]->id_cobro );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($i + 8), $cobros [$i]->usuario );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($i + 8), $cobros [$i]->fecha );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($i + 8), $cobros [$i]->fecha_pago );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($i + 8), $cobros [$i]->metodo_pago );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($i + 8), $cobros [$i]->banco );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, ($i + 8), $cobros [$i]->cuenta );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 7, ($i + 8), $cobros [$i]->titular );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($i + 8), $cobros [$i]->clabe );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 9, ($i + 8), $cobros [$i]->monto );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 10, ($i + 8), $cobros [$i]->estado );
			$total = $total + $cobros [$i]->monto;
			$ultima_fila = $i + 8;
			$contador_filas ++;
		}
		
		$subtitulos = array (
				"ID",
				"Usuario",
				"Fecha Solicitud",
				"Fecha Pago",
				"Metodo de Pago",
				"Banco",
				"N° Cuenta",
				"Titular",
				"CLABE",
				"Monto",
				"Estado" 
		);
		$this->model_excel->setTemplateExcelReport ( "Comisiones Pagadas", $subtitulos, $contador_filas, $this->excel );
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($ultima_fila + 2), "Total" );
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 9, ($ultima_fila + 2), $total );
		
		$filename = 'Comisiones Pagadas de ' . $inicio . ' al ' . $fin . '.xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		$objWriter->save ( 'php://output' );
	}
	function reporte_cobros_todos() {
		$inicio = '2000-01-01';
		if (isset ( $_POST ['inicio'] )) {
			$inicio = $_POST ['inicio'];
		}
		$fin = '3000-12-12';
		if (isset ( $_POST ['fin'] )) {
			$fin = $_POST ['fin'];
		}
		
		$totalCobros = 0;
		
		$cobros = $this->modelo_cobros->listarTodos ( $inicio, $fin );
		echo "<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Usuario</th>
					<th>Fecha Solicitud</th>
					<th>Fecha Pago</th>
					<th>Metodo de Pago</th>
					<th>Banco</th>
					<th>N° Cuenta</th>
					<th>Titular</th>
					<th>CLABE</th>
					<th>Monto</th>
					<th>Estado</th>
				</thead>
				<tbody>";
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			echo "<tr>
			<td class='sorting_1'>" . $cobros [$i]->id_cobro . "</td>
			<td>" . $cobros [$i]->usuario . "</td>
			<td>" . $cobros [$i]->fecha . "</td>
			<td>" . $cobros [$i]->fecha_pago . "</td>
			<td>" . $cobros [$i]->metodo_pago . "</td>
			<td>" . $cobros [$i]->banco . "</td>
			<td>" . $cobros [$i]->cuenta . "</td>
			<td>" . $cobros [$i]->titular . "</td>
			<td>" . $cobros [$i]->clabe . "</td>
			<td>$ " . number_format ( $cobros [$i]->monto, 2 ) . "</td>
			<td>" . $cobros [$i]->estado . "</td>
			</tr>";
			$totalCobros = $totalCobros + $cobros [$i]->monto;
		}
		
		echo "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
		
		echo "<tr>
			<td class='sorting_1'><b>TOTAL</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b></b></td>
			<td></td>
			<td><b> $	" . number_format ( $totalCobros, 2, '.', '' ) . "</b></td>
			<td><b></b></td>
			<td><b></b></td>
			</tr>";
		
		echo "</tbody> </table> <tr class='odd' role='row'>";
	}
	function reporte_cobros_todos_excel() {
		$inicio = '2000-01-01';
		if ($_GET ['inicio'] != null) {
			$inicio = $_GET ['inicio'];
		}
		$fin = '3000-12-12';
		if ($_GET ['fin'] != null) {
			$fin = $_GET ['fin'];
		}
		
		$cobros = $this->modelo_cobros->listarTodos ( $inicio, $fin );
		
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
		$contador_filas = 0;
		
		$total = 0;
		$ultima_fila = 0;
		for($i = 0; $i < sizeof ( $cobros ); $i ++) {
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($i + 8), $cobros [$i]->id_cobro );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($i + 8), $cobros [$i]->usuario );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($i + 8), $cobros [$i]->fecha );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($i + 8), $cobros [$i]->fecha_pago );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($i + 8), $cobros [$i]->metodo_pago );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($i + 8), $cobros [$i]->banco );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, ($i + 8), $cobros [$i]->cuenta );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 7, ($i + 8), $cobros [$i]->titular );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($i + 8), $cobros [$i]->clabe );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 9, ($i + 8), $cobros [$i]->monto );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 10, ($i + 8), $cobros [$i]->estado );
			$total = $total + $cobros [$i]->monto;
			$ultima_fila = $i + 8;
			$contador_filas ++;
		}
		
		$subtitulos = array (
				"ID",
				"Usuario",
				"Fecha Solicitud",
				"Fecha Pago",
				"Metodo de Pago",
				"Banco",
				"N° Cuenta",
				"Titular",
				"CLABE",
				"Monto",
				"Estado" 
		);
		$this->model_excel->setTemplateExcelReport ( "Comisiones Pagadas y Por pagar", $subtitulos, $contador_filas, $this->excel );
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($ultima_fila + 2), "Total" );
		$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 9, ($ultima_fila + 2), $total );
		
		$filename = 'CuentasPagadas de ' . $inicio . ' al ' . $fin . '.xls'; // save our workbook as this file name
		header ( 'Content-Type: application/vnd.ms-excel' ); // mime type
		header ( 'Content-Disposition: attachment;filename="' . $filename . '"' ); // tell browser what's the file name
		header ( 'Cache-Control: max-age=0' ); // no cache
		                                    
		// save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		                                    // if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter ( $this->excel, 'Excel5' );
		// force user to download the Excel file without writing it to server's HD
		$objWriter->save ( 'php://output' );
	}
}
