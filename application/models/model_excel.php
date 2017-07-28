<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_excel extends CI_Model{

	function __construct() {
		parent::__construct();


	}
	
	
		function setTemplateExcelReport($titulo,$subtitulos,$filas,$excel) {

	 	$letters = array_combine(range(1,26), range('A', 'Z'));

	
	 	$filasConfiguracion='A5:'.$letters[count($subtitulos)].'6';

		$excel->getActiveSheet()->mergeCells($filasConfiguracion);
		$excel->getActiveSheet()->getStyle($filasConfiguracion)->getFont()->setBold(true);
		$excel->getActiveSheet()->setCellValueByColumnAndRow(0,(5),$titulo);
		$excel->getActiveSheet()->getStyle($filasConfiguracion)->getFont()->setSize(16);
		$excel->getActiveSheet()->getStyle($filasConfiguracion)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle($filasConfiguracion)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00B4DC');

		
		$excel->getActiveSheet()->getStyle('A7:'.$letters[count($subtitulos)].'7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F4F2F3');
		$excel->getActiveSheet()->getStyle('A7:'.$letters[count($subtitulos)].'7')->getFont()->setBold(true);
		$excel->getActiveSheet()->getStyle('A7:'.$letters[count($subtitulos)].'7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$i=0;
		foreach ($subtitulos as $subtitulo){
		
			$excel->getActiveSheet()->setCellValueByColumnAndRow($i,(7),$subtitulo);
			$i++;
		}

		$excel->getActiveSheet()->getStyle('A7:'.$letters[count($subtitulos)].''.($filas+10))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	}

}
