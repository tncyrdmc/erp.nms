<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class reportes_logistico extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('bo/modelo_dashboard');
		$this->load->model('model_tipo_red');
		$this->load->model('model_servicio');
		$this->load->model('bo/modelo_reportes_logistico');
		$this->load->model('general');
		$this->load->model('modelo_cobros');
		$this->load->model('bo/modelo_cedi');
		$this->load->model('bo/model_inventario');
		$this->load->model('bo/modelo_logistico');
                $this->load->model ( 'model_excel' );
	}

	function index()
	{
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
		
		$style=$this->modelo_dashboard->get_style(1);

		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$type = $usuario[0]->id_tipo_usuario;
		$this->template->set("type",$type);
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
		if($type==8||$type==9){
			$data2 = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
			$header = $type==8 ? 'CEDI' : 'Almacen';
			$this->template->set_partial('header', 'website/'.$header.'/header2',$data2);
		}else{
			$this->template->set_partial('header', 'website/bo/header');
		}
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/logistico2/reportes/reportes');
	}
	
	function pedidos_pendientes(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$this->template->set("type",$usuario[0]->id_tipo_usuario);
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		
		$surtidos =$this->modelo_logistico->get_surtidos();
		
		$this->template->set("style",$style);
		$this->template->set("surtidos",$surtidos);

		$this->template->build('website/bo/logistico2/embarque/historial_pendientes');
		
		
		
	}
	function  reporte_pedidos_pendiente_excel(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
                $Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
                
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$surtidos =$this->modelo_logistico->get_surtidos();
	
		$i=0;
		$this->load->library('excel');
		
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_pedidos_pendientes.xls");
		foreach ($surtidos as $row)
		{
			$i=$i+1;
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $row->id);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $row->origen);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $row->usuario);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $row->direccion);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $row->celular);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($i+8), $row->correo);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($i+8), $row->fecha);
		}
		
		$filename='pedidos_pendientes.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save('php://output');
		
	}
	function pedidos_transito(){
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		$style=$this->modelo_dashboard->get_style(1);
		$this->template->set("usuario",$usuario);
		
		
		$this->template->set("usuario",$usuario);
		$this->template->set("type",$usuario[0]->id_tipo_usuario);
		
		$surtidos = $this->modelo_logistico->get_embarque();
		
		$this->template->set("style",$style);
		$this->template->set("surtidos",$surtidos);
		

		$this->template->build('website/bo/logistico2/embarque/hisorial_transito');
	}
	
	function reporte_pedidos_transito_excel(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
                $Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
                
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		$surtidos = $this->modelo_logistico->get_embarque();
		$i=0;
		$this->load->library('excel');
		
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_pedidos_transito.xls");
		foreach ($surtidos as $row)
		{
			$i=$i+1;
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $row->id);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $row->n_guia);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $row->origen);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $row->usuario);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $row->direccion);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($i+8), $row->celular);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($i+8), $row->correo);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, ($i+8), $row->fecha_entrega);
		}
		
		$filename='pedidos_transito.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save('php://output');
	}
	function pedidos_embarcados(){

		$data=$_GET["info"];
		$data=json_decode($data,true);
		$fecha_ini=str_replace('.', '-', $data['inicio']);
		$fecha_fin=str_replace('.', '-', $data['fin']);
		$ano_ini=substr($fecha_ini, 6);
		$mes_ini=substr($fecha_ini, 3,2);
		$dia_ini=substr($fecha_ini, 0,2);
		$ano_fin=substr($fecha_fin, 6);
		$mes_fin=substr($fecha_fin, 3,2);
		$dia_fin=substr($fecha_fin, 0,2);
		$inicio=$ano_ini.'-'.$mes_ini.'-'.$dia_ini;
		$fin=$ano_fin.'-'.$mes_fin.'-'.$dia_fin;
		
		$surtidos = $this->modelo_logistico->get_embarcados($data['inicio'], $data['fin']);
		//var_dump($surtidos);
		//exit();
		$this->template->set("surtidos",$surtidos);
		
		
		$this->template->build('website/bo/logistico2/embarque/historial_embarcados');
		
			
	}
	function reporte_pedidos_embarcados_excel(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
                $Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
                
		$inicio = '2000-01-01';
		if($_GET['inicio'] != null){
			$inicio = $_GET['inicio'];
		}
		$fin = '3000-12-12';
		if($_GET['fin'] != null){
			$fin = $_GET['fin'];
		}
		
		$embarcados  =  $this->modelo_logistico->get_embarcados($inicio, $fin);
		$i=0;
		$this->load->library('excel');
		
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_pedidos_embarcados.xls");
		foreach ($embarcados as $row)
		{
			$i=$i+1;
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $row->id);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $row->n_guia);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $row->origen);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $row->usuario);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $row->direccion);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($i+8), $row->celular);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($i+8), $row->correo);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, ($i+8), $row->fecha_entrega);
		}
		
		$filename='pedidos_embarcados.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save('php://output');
	}
	
        
	function reporte_cedi()
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
					<th>Acciones</th>
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
					<td style='width: 100px'>
						<a title='Factura' style='cursor: pointer;' class='txt-color-blue' onclick='factura(".$producto->id.");'>
						<i class='fa fa-eye fa-2x'></i>
						</a>
						<a title='Eliminar' style='cursor: pointer;' class='txt-color-red' onclick='eliminar(".$producto->id.");'>
						<i class='fa fa-trash-o fa-2x'></i>
						</a>
						<a title='Imprimir' style='cursor: pointer;' class='txt-color-green' onclick='imprimir(".$producto->id.");'>
						<i class='fa fa-file-pdf-o fa-2x'></i>
						</a>
					</td>
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
					<td></td>
				</tr>";
			
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	
	
	}
               
	function reporte_cedi_excel() {
		if (! $this->tank_auth->is_logged_in ()) { // logged in
			redirect ( '/auth' );
		}
	
		$id = $this->tank_auth->get_user_id ();
		$usuario = $this->general->get_username ( $id );
	
		$Comercial = $this->general->isAValidUser($id,"comercial");
		$CEDI = $this->general->isAValidUser($id,"cedi");
		$almacen = $this->general->isAValidUser($id,"almacen");
		$Logistico = $this->general->isAValidUser($id,"logistica");
		
		if(!$CEDI&&!$almacen&&!$Logistico&&!$Comercial){
			redirect('/auth/logout');
		}
		
		$total = 0;
		$iva = 0;
		$venta = 0;
		$puntos = 0;
			
		$contador_filas = 0;
		$inicio = $_GET['inicio'] ? $_GET['inicio'] : date('Y-m').'-01';
		$fin = $_GET['fin'] ? $_GET['fin'] : date('Y-m-d');
		
		$ventas = $this->modelo_cedi->getVentasRealizadas($inicio,$fin);
			
		$this->load->library ( 'excel' );
		$this->excel = PHPExcel_IOFactory::load ( FCPATH . "/application/third_party/templates/reporte_generico.xls" );
				
		for($i = 0; $i < count ( $ventas ); $i ++) {
	
				$contador_filas = $contador_filas + 1;
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($contador_filas + 7), $ventas [$i]->id );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($contador_filas + 7), $ventas [$i]->fecha );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($contador_filas + 7), $ventas [$i]->cedi );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($contador_filas + 7), $ventas [$i]->usuario );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($contador_filas + 7), $ventas	[$i]->cliente." [".$ventas[$i]->red."]");
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($contador_filas + 7), $ventas [$i]->puntos );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, ($contador_filas + 7), "$ ".number_format(($ventas[$i]->valor-$ventas[$i]->iva),2) );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 7, ($contador_filas + 7), "$ ".number_format($ventas[$i]->iva,2) );
				$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($contador_filas + 7), "$ ".number_format($ventas[$i]->valor,2) );
	
				$total += $ventas[$i]->valor;
				$iva += $ventas[$i]->iva;
				$venta += ($ventas[$i]->valor-$ventas[$i]->iva);
				$puntos += $ventas[$i]->puntos;
		}
				
			$subtitulos = array (
					"ID",
					"Fecha",
					"CEDI",
					"Usuario",
					"Cliente",
					"Puntos",
					"Valor Venta",
					"IVA",
					"Total Venta"
			);
				
			$this->model_excel->setTemplateExcelReport ( "Ventas CEDI", $subtitulos, $contador_filas, $this->excel );
				
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, ($contador_filas + 10), "" );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, ($contador_filas + 10), "" );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, ($contador_filas + 10), "" );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, ($contador_filas + 10), "" );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, ($contador_filas + 10), "TOTALES" );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, ($contador_filas + 10), $puntos );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, ($contador_filas + 10), "$ ".number_format($venta,2) );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 7, ($contador_filas + 10), "$ ".number_format($iva,2) );
			$this->excel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, ($contador_filas + 10), "$ ".number_format($total,2) );
		
	
		$filename = 'Ventas_CEDIS_de ' . $inicio . ' al ' . $fin . '.xls'; // save our workbook as this file name
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
	
	function reporte_inventario()
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
		
		$inventario = $this->modelo_reportes_logistico->inventario();
		
		echo
		"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th>ID</th>
					<th>Almacen / CEDI</th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Bloqueo</th>
				</thead>
				<tbody>";
		foreach ($inventario as $producto){
			echo "<tr>
					<td class='sorting_1'>".$producto->id_inventario."</td>
					<td>".$producto->almacen."</td>
					<td>".$producto->producto."</td>
					<td>".$producto->cantidad."</td>
					<td>".$producto->bloqueados."</td>
				</tr>";
		}
			
		echo "</tbody>
			</table><tr class='odd' role='row'>";
	
	
	}
	
	function reporte_inventario_excel()
	{
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
		$inventario = $this->modelo_reportes_logistico->inventario();
		$i=0;
		$this->load->library('excel');
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_inventario.xls");
		foreach ($inventario as $producto)
		{ 
			$i=$i+1;
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $producto->id_inventario);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $producto->almacen);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $producto->producto);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $producto->cantidad);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $producto->bloqueados);
		}
	
		$filename='inventario.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
	
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save('php://output');
	}
	
	function reporte_entrada_excel(){
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
		
		$inicio = '2000-01-01';
		if($_GET['inicio'] != null){
			$inicio = $_GET['inicio'];
		}
		$fin = '3000-12-12';
		if($_GET['fin'] != null){
			$fin = $_GET['fin'];
		}
		$Entradas=$this->model_inventario->historial_entradas($inicio,$fin,'E');
     	$Cedis=$this->model_inventario->getAlmacenesCedi();
   	    $Documento=$this->model_inventario->getAlldocumento();
   	    $Producto=$this->model_inventario->getProductos();
		
		$i=0;
		$this->load->library('excel');
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_entrada.xls");
	foreach ($Entradas as $entrada)
		{
			$i=$i+1;
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $entrada->id_inventario_historial);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $entrada->fecha);
			foreach ($Cedis as $Cedi){
				if($Cedi->id_cedi==$entrada->id_origen){
						
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $Cedi->nombre);
				}
					
			}
			if($entrada->id_origen=='0'){
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $entrada->otro_origen);
	
			}
	
			foreach ($Cedis as $Cedi){
				if($Cedi->id_cedi==$entrada->id_destino){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $Cedi->nombre);
				}
			}
			if($entrada->id_destino=='0'){
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $entrada->otro_origen);
	
			}
			foreach ($Documento as $documento){
				if($documento->id_doc==$entrada->id_documento){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $documento->nombre);
	
	
				}
			}
			foreach ($Producto as $producto){
				if($producto->id==$entrada->id_mercancia){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($i+8), $producto->nombre);
						
				}
			}
			
			
			

		}
		
		$filename='Entradas.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save('php://output');
	}
	
function reporte_salida_excel(){
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
		
		$inicio = '2000-01-01';
		if($_GET['inicio'] != null){
			$inicio = $_GET['inicio'];
		}
		$fin = '3000-12-12';
		if($_GET['fin'] != null){
			$fin = $_GET['fin'];
		}
		$Entradas=$this->model_inventario->historial_entradas($inicio,$fin,'S');
     	$Cedis=$this->model_inventario->getAlmacenesCedi();
   	    $Documento=$this->model_inventario->getAlldocumento();
   	    $Producto=$this->model_inventario->getProductos();
		
		$i=0;
		$this->load->library('excel');
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_salida.xls");
foreach ($Entradas as $entrada)
		{
			$i=$i+1;
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $entrada->id_inventario_historial);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $entrada->fecha);
			foreach ($Cedis as $Cedi){
				if($Cedi->id_cedi==$entrada->id_origen){
						
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $Cedi->nombre);
				}
					
			}
			if($entrada->id_origen=='0'){
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $entrada->otro_origen);
	
			}
	
			foreach ($Cedis as $Cedi){
				if($Cedi->id_cedi==$entrada->id_destino){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $Cedi->nombre);
				}
			}
			if($entrada->id_destino=='0'){
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $entrada->otro_origen);
	
			}
			foreach ($Documento as $documento){
				if($documento->id_doc==$entrada->id_documento){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $documento->nombre);
	
	
				}
			}
			foreach ($Producto as $producto){
				if($producto->id==$entrada->id_mercancia){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($i+8), $producto->nombre);
						
				}
			}
			
			
			

		}
		
		$filename='Salidas.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save('php://output');
	}
	
	function reporte_entrada_salida_excel(){
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
	
		$inicio = '2000-01-01';
		if($_GET['inicio'] != null){
			$inicio = $_GET['inicio'];
		}
		$fin = '3000-12-12';
		if($_GET['fin'] != null){
			$fin = $_GET['fin'];
		}
		$Entradas=$this->model_inventario->historial_entradas_salida($inicio,$fin);
		$Cedis=$this->model_inventario->getAlmacenesCedi();
		$Documento=$this->model_inventario->getAlldocumento();
		$Producto=$this->model_inventario->getProductos();
	
		$i=0;
		$this->load->library('excel');
		$this->excel=PHPExcel_IOFactory::load(FCPATH."/application/third_party/templates/reporte_entrada_salida.xls");
		foreach ($Entradas as $entrada)
		{
			$i=$i+1;
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, ($i+8), $entrada->id_inventario_historial);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, ($i+8), $entrada->fecha);
			foreach ($Cedis as $Cedi){
				if($Cedi->id_cedi==$entrada->id_origen){
						
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $Cedi->nombre);
				}
					
			}
			if($entrada->id_origen=='0'){
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, ($i+8), $entrada->otro_origen);
	
			}
	
			foreach ($Cedis as $Cedi){
				if($Cedi->id_cedi==$entrada->id_destino){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $Cedi->nombre);
				}
			}
			if($entrada->id_destino=='0'){
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, ($i+8), $entrada->otro_origen);
	
			}
			foreach ($Documento as $documento){
				if($documento->id_doc==$entrada->id_documento){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, ($i+8), $documento->nombre);
	
	
				}
			}
			foreach ($Producto as $producto){
				if($producto->id==$entrada->id_mercancia){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, ($i+8), $producto->nombre);
						
				}
			}
			if ($entrada->tipo=='S'){
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($i+8), 'Salida');
				
			}else{
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, ($i+8),'Entrada');
				
			}	
				
				
	
		}
	
		$filename='Entradas_Salidas.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
	
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(getcwd()."/media/reportes/".$filename);
		$objWriter->save('php://output');
	}
}
