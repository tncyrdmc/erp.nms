<?php

require_once BASEPATH . "../template/cedi/dompdf/dompdf_config.inc.php";

$logo = BASEPATH.'../logo.png'; 

$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$hoy = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');

$codigoHTML = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte</title>
<style type="text/css">
.text {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
</style>
<link href="/template/cedi/css/bootstrap.css" rel="stylesheet">
    <link href="/template/cedi/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/template/cedi/css/docs.css" rel="stylesheet">
    <link href="/template/cedi/js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="/template/cedi/js/jquery.js"></script>
    <script src="/template/cedi/js/bootstrap-transition.js"></script>
    <script src="/template/cedi/js/bootstrap-alert.js"></script>
    <script src="/template/cedi/js/bootstrap-modal.js"></script>
    <script src="/template/cedi/js/bootstrap-dropdown.js"></script>
    <script src="/template/cedi/js/bootstrap-scrollspy.js"></script>
    <script src="/template/cedi/js/bootstrap-tab.js"></script>
    <script src="/template/cedi/js/bootstrap-tooltip.js"></script>
    <script src="/template/cedi/js/bootstrap-popover.js"></script>
    <script src="/template/cedi/js/bootstrap-button.js"></script>
    <script src="/template/cedi/js/bootstrap-collapse.js"></script>
    <script src="/template/cedi/js/bootstrap-carousel.js"></script>
    <script src="/template/cedi/js/bootstrap-typeahead.js"></script>
    <script src="/template/cedi/js/bootstrap-affix.js"></script>
    <script src="/template/cedi/js/holder/holder.js"></script>
    <script src="/template/cedi/js/google-code-prettify/prettify.js"></script>
    <script src="/template/cedi/js/application.js"></script>
		
</head>

<body>
<div align="center" class="text" >
    <table width="100%"  >
		<caption class="text"><strong>Listado de Existencias/Inventario</strong></caption>
		  <tr>
			<td colspan="2"><img src="'.$logo.'" width="200px" alt="logo"></td>
		  </tr>
		  <tr>
			<td width="100%" colspan="2">
			  <div align="center">
				<span class="text">' . $empresa[0]->nombre . ' Nit. ' . $empresa[0]->id_tributaria . '</span><br />
				<span class="text">Ciudad: ' . $empresa[0]->ciudad . ' Direccion: ' . $empresa[0]->direccion . ' </span><br />
				<span class="text">TEL: ' . $empresa[0]->fijo . ' TEL2: ' . $empresa[0]->movil . '</span><br />
				<span class="text">Reporte Impreso el ' . $hoy . ' por ' . $user . '</span>
			  </div>
			</td>
		  </tr>
		</table>
<br /><br />
    <table width="100%" border="1" class="table table-striped table-bordered table-hover">
          <tr>
            <td colspan="7"><strong>Ultimas Ventas Realizadas</strong></td>
          </tr>
          <tr>
            <td width="15%"><strong>Codigo</strong></td>
            <td width="15%"><strong>Fecha</strong></td>
            <td width="26%"><strong>Cliente</strong></td>
            <td width="13%"><div ><strong>Costo</strong></div></td>
            <td width="16%"><div ><strong>IVA</strong></div></td>
            <td width="16%"><div ><strong>Total</strong></div></td>
            <td width="14%"><strong>Puntos</strong></td>
          </tr>';


if ($ventas) {

    $costo = 0;
    $puntos= 0;
    $iva = 0;
    $total = 0;

    foreach ($ventas as $producto){
	$costo += floatval($producto->valor-$producto->iva);
	$iva += floatval($producto->iva );
	$total += floatval($producto->valor);
	$puntos += intval($producto->puntos);

            $codigoHTML.= '<tr>
																			<td>' . $producto->id . '</td>
																			<td>' . $producto->fecha . '</td>'
                    . '                                                                                                                                 <td><a href="#">'.$producto->cliente.' ('.$producto->red.')</a></td>
																			<td><div >$ '.number_format(($producto->valor-$producto->iva ),2).'</div></td>
																			<td><div >$ '.number_format($producto->iva,2).'</div></td>
																			<td><div >$ '.number_format($producto->valor,2).'</div></td>
																			<td><span class="badge badge-success">'.$producto->puntos.'</span></td>
																		</tr>';
        
    }

    $codigoHTML.= '<tr>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
                                                                                                                                <td>
																	<div >
																		<strong>Totales:</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ ' . number_format($costo, 2) . '</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ ' . number_format($iva, 2) . '</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ ' . number_format($total, 2) . '</strong>
																	</div>
																</td>
																<td><span class="badge badge-warning"><b>' . $puntos . '</b></span></td>
															</tr>';
}

$codigoHTML.='</table>
<br /><br />
    <table width="100%" border="1" class="table table-striped table-bordered table-hover">
          <tr>
            <td colspan="6"><strong>Productos de Baja Existencia</strong></td>
          </tr>
          <tr>
            <td width="15%"><strong>Codigo</strong></td>
            <td width="26%"><strong>Descripcion del Producto</strong></td>
            <td width="13%"><div ><strong>Costo</strong></div></td>
            <td width="16%"><div ><strong>Venta a por Mayor</strong></div></td>
            <td width="16%"><div ><strong>Valor Venta</strong></div></td>
            <td width="14%"><strong>Existencia</strong></td>
          </tr>';


if ($productos) {

    $costo = 0;
    $venta = 0;
    $publico = 0;
    $total = 0;

    foreach ($productos as $producto) {
        $code = ($producto->codigo_barras) ? $producto->codigo_barras : $producto->id_mercancia;
        $span = ($producto->cantidad > $producto->inventario) ? 'success' : 'important';
        if ($producto->cantidad <= $producto->inventario) {
            $costo += floatval($producto->real);
            $venta += floatval($producto->costo);
            $publico += floatval($producto->costo_publico);
            $total += intval($producto->cantidad);

            $codigoHTML.= '<tr>
																			<td>' . $code . '</td>
																			<td>' . $producto->nombre . ' (' . $producto->red . ')</td>
																			<td><div >$ '.number_format($producto->real,2).'</div></td>
																			<td><div >$ '.number_format($producto->costo,2).'</div></td>
																			<td><div >$ '.number_format($producto->costo_publico,2).'</div></td>
																			<td><span class="badge badge-' . $span . '">' . $producto->cantidad . '</span></td>
																		</tr>';
        }
    }

    $codigoHTML.= '<tr>
																<td>&nbsp;</td>
																<td>
																	<div >
																		<strong>Totales:</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ ' . number_format($costo, 2) . '</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ ' . number_format($venta, 2) . '</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ ' . number_format($publico, 2) . '</strong>
																	</div>
																</td>
																<td><span class="badge badge-warning"><b>' . $total . '</b></span></td>
															</tr>';
}

$codigoHTML.='</table>

	 <br><br>

        <table width="100%" border="1" class="table table-striped table-bordered table-hover">
          <tr>
            <td colspan="6"><strong>Listado y Totales de Productos</strong></td>
            </tr>
          <tr>
            <td width="15%"><strong>Codigo</strong></td>
            <td width="26%"><strong>Descripcion del Producto</strong></td>
            <td width="13%"><div ><strong>Costo</strong></div></td>
            <td width="16%"><div ><strong>Venta a por Mayor</strong></div></td>
            <td width="16%"><div ><strong>Valor Venta</strong></div></td>
            <td width="14%"><strong>Existencia</strong></td>
          </tr>';
if ($productos) {

    $costo = 0;
    $venta = 0;
    $publico = 0;
    $total = 0;

    foreach ($productos as $producto) {
        $code = ($producto->codigo_barras) ? $producto->codigo_barras : $producto->id_mercancia;
        $span = ($producto->cantidad > $producto->inventario) ? 'success' : 'important';

        $costo += floatval($producto->real);
        $venta += floatval($producto->costo);
        $publico += floatval($producto->costo_publico);
        $total += intval($producto->cantidad);

        $codigoHTML.='<tr>
																	<td>' . $code . '</td>
																	<td>' . $producto->nombre . ' (' . $producto->red . ')</td>
																	<td><div >$ '.number_format($producto->real,2).'</div></td>
																	<td><div >$ '.number_format($producto->costo,2).'</div></td>
																	<td><div >$ '.number_format($producto->costo_publico,2).'</div></td>
																	<td><span class="badge badge-' . $span . '">' . $producto->cantidad . '</span></td>
																</tr>';
    }

    $codigoHTML.='<tr>
																<td>&nbsp;</td>
																<td>
																	<div >
																		<strong>Totales:</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ ' . number_format($costo, 2) . '</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ ' . number_format($venta, 2) . '</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ ' . number_format($publico, 2) . '</strong>
																	</div>
																</td>
																<td><span class="badge badge-warning"><b>' . $total . '</b></span></td>
															</tr>';
}
$codigoHTML.='</table>

</div>
</body>
</html>';

$codigoHTML = utf8_decode($codigoHTML);
$fech = date('Ymdhis');
$dompdf = new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit", "128M");
$dompdf->render();
$dompdf->stream("EstadoInventario_" . $fech . ".pdf");
?>
