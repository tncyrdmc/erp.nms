
<!-- MAIN CONTENT -->
<div id="content">

	<section id="widget-grid">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12" style="padding: 0">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-colorbutton="false" data-widget-editbutton="false"
					data-widget-togglebutton="false" data-widget-deletebutton="false"
					data-widget-sortable="false" data-widget-fullscreenbutton="false"
					data-widget-custombutton="false" data-widget-collapsed="false">
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
							<fieldset>
								<div class="contenidoBotones" style="overflow-y: scroll;height: 300px;">
									<div class="row">
										<div class="col-md-11 col-xs-8 link" style="padding-left: 3em">

											<!--  	<div class="btn-group" data-toggle="buttons-checkbox"
												align="center">
												<button type="button" class="btn btn-primary"
													onClick="window.location='dato_empresa.php'">Actualizar
													Datos de la Empresa</button>
												<button type="button" class="btn btn-primary"
													onClick="window.location='seccion.php'">Administrar
													Secciones de Inventarios</button>
												<button type="button" class="btn btn-primary"
													onClick="window.location='caja.php?ddes=0'">Ventas</button>
											</div>
											<hr /> --><!-- Button to trigger modal -->
											<div class="col-md-12">
												<h4>Productos de Baja Existencia</h4>
												<br/>	
												<section class="row well">																						
												<table style="width: 100%" id="dt_basic" class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th data-class="expand"><strong>Código</strong></th>
																<th data-hide="phone,tablet"><strong>Descripción</strong></th>
																<th data-hide="phone,tablet"><div >
																		<strong>Costo</strong>
																	</div></th>
																<th data-hide="phone,tablet"><div >
																		<strong>Venta por Mayor</strong>
																	</div></th>
																<th data-hide="phone,tablet"><div >
																		<strong>Valor Venta</strong>
																	</div></th>
																<th data-hide="phone,tablet"><strong>Existencia</strong></th>
														</tr>
													</thead>
													<tbody>																										
														<?php 
														if ($productos){
													
															$costo = 0;
															$venta= 0;
															$publico = 0;
															$total = 0;
															
														foreach ($productos as $producto){
															$code = ($producto->codigo_barras) ? $producto->codigo_barras : $producto->id_mercancia;
															$span = ($producto->cantidad >  $producto->inventario) ? 'success' : 'important';
																if ($producto->cantidad <= $producto->inventario){
																	$costo += floatval($producto->real);
																	$venta += floatval($producto->costo);
																	$publico += floatval($producto->costo_publico);
																	$total += intval($producto->cantidad);
																	
																	echo '<tr>
																			<td>'.$code.'</td>
																			<td><a href="#">'.$producto->nombre.' ('.$producto->red.')</a></td>
																			<td><div >$ '.$producto->real.'</div></td>
																			<td><div >$ '.$producto->costo.'</div></td>
																			<td><div >$ '.$producto->costo_publico.'</div></td>
																			<td><span class="badge badge-'.$span.'">'.$producto->cantidad.'</span></td>
																		</tr>';
																}
															}
															
															echo '<tr>
																<td>&nbsp;</td>
																<td>
																	<div >
																		<strong>Totales:</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ '.number_format($costo,2).'</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ '.number_format($venta,2).'</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ '.number_format($publico,2).'</strong>
																	</div>
																</td>
																<td><span class="badge badge-warning">'.$total.'</span></td>
															</tr>';
															
														}/*else{
															echo '<tr>
																		<td colspan="6">
																			<div class="alert alert-error">
																				<strong>No hay Articulos actualmente</strong>
																			</div>
																		</td>
																	</tr>';
														}*/
														?>

													</tbody>
												</table>
												</section>
												<br />
												<!-- <section class="row pull-right">
													<div class="col-md-12 ">
														<span class="badge badge-important">100</span> <span
															class="badge badge-success">20</span>
													</div>
												</section> -->
												</div>
												<div class="col-md-12"></div>
												<div class="col-md-12">
												<h4>Listado y Totales de Productos</h4>
												<br/>
												<section class="row well">
													<table style="width: 100%" id="dt_basic2" class="table table-striped table-bordered table-hover">
														<thead>
															<tr>
																<th data-class="expand"><strong>Código</strong></th>
																<th data-hide="phone,tablet"><strong>Descripción</strong></th>
																<th data-hide="phone,tablet"><div >
																		<strong>Costo</strong>
																	</div></th>
																<th data-hide="phone,tablet"><div >
																		<strong>Venta por Mayor</strong>
																	</div></th>
																<th data-hide="phone,tablet"><div >
																		<strong>Valor Venta</strong>
																	</div></th>
																<th data-hide="phone,tablet"><strong>Existencia</strong></th>
															</tr>
														</thead>
														<tbody>
														
														<?php 
														if ($productos){
													
															$costo = 0;
															$venta= 0;
															$publico = 0;
															$total = 0;
															
														foreach ($productos as $producto){
															$code = ($producto->codigo_barras) ? $producto->codigo_barras : $producto->id_mercancia;
															$span = ($producto->cantidad >  $producto->inventario) ? 'success' : 'important';
															
															$costo += floatval($producto->real);
															$venta += floatval($producto->costo);
															$publico += floatval($producto->costo_publico);
															$total += intval($producto->cantidad);
															
															echo '<tr>
																	<td>'.$code.'</td>
																	<td><a href="#">'.$producto->nombre.' ('.$producto->red.')</a></td>
																	<td><div >$ '.$producto->real.'</div></td>
																	<td><div >$ '.$producto->costo.'</div></td>
																	<td><div >$ '.$producto->costo_publico.'</div></td>
																	<td><span class="badge badge-'.$span.'">'.$producto->cantidad.'</span></td>
																</tr>';
																
															}
															
															echo '<tr>
																<td>&nbsp;</td>
																<td>
																	<div >
																		<strong>Totales:</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ '.number_format($costo,2).'</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ '.number_format($venta,2).'</strong>
																	</div>
																</td>
																<td>
																	<div >
																		<strong>$ '.number_format($publico,2).'</strong>
																	</div>
																</td>
																<td><span class="badge badge-warning">'.$total.'</span></td>
															</tr>';
															
														}/*else{
															echo '<tr>
																		<td colspan="6">
																			<div class="alert alert-error">
																				<strong>No hay Articulos actualmente</strong>
																			</div>
																		</td>
																	</tr>';
														}*/
														?>

														</tbody>
													</table>
												</section>
												

												

											</div>
											
											

										</div>
									</div>
								</div>
								<footer class="col-md-11 col-xs-12">
												<a href="home/PDF"
													class="pull-right btn"><i class="fa fa-print"></i>
													Reporte PDF</a>
								</footer>
							</fieldset>
						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
			</article>
			<!-- END COL -->
		</div>
	</section>
	<div class="row">
		<!-- a blank row to get started -->
		<div class="col-sm-12">
			<br /> <br />
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->
<style>
.link {
	margin: 0.5rem;
}

.minh {
	padding: 50px;
}

.link a:hover {
	text-decoration: none !important;
}
</style>
<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
	<script src="/template/js/plugin/markdown/markdown.min.js"></script>
	<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
	<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>
	<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
	<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
	<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
	<script src="/template/js/validacion.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
	$("#mymarkdown").markdown({
					autofocus:false,
					savable:false
				})


	/* BASIC ;*/
		var responsiveHelper_dt_basic = undefined;
		var responsiveHelper_datatable_fixed_column = undefined;
		var responsiveHelper_datatable_col_reorder = undefined;
		var responsiveHelper_datatable_tabletools = undefined;
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		$('#dt_basic').dataTable({
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : false,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) {
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic.respond();
			}
		});

	/* END BASIC */

	/* BASIC2 ;*/
		var responsiveHelper_dt_basic = undefined;
		var responsiveHelper_datatable_fixed_column = undefined;
		var responsiveHelper_datatable_col_reorder = undefined;
		var responsiveHelper_datatable_tabletools = undefined;
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		$('#dt_basic2').dataTable({
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : false,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) {
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic2'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic.respond();
			}
		});

	/* END BASIC2 */

	pageSetUp();

})
</script>
