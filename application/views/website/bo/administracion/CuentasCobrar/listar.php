
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> <span>>
					<a href="/bo/administracion/"> Administración</a> > Cuentas Por Cobrar
				</span>
			</h1>
		</div>
	</div>
	<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>	 
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-editbutton="false" data-widget-custombutton="false"
					data-widget-colorbutton="false">


					<!-- widget div-->


					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body">
						<div class="tab-pane">
						<div style="margin-top: 1rem; margin-bottom: 1rem;" class="row col-xs-12 col-md-6 col-sm-4 col-lg-3 pull-right">
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
											<center>
											<a title="Pagado" class="txt-color-green" href="#"><i class="fa fa-check fa-3x"></i></a>
											<br>Confirmar Pago</center>
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
										<center>	
											<a title="Eliminar" href="#" class="txt-color-red"><i class="fa fa-times fa-3x"></i></a>
											<br>Cancelar Pago</center>
										</div>
							</div>
							<table  id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-hide="phone">ID Venta</th>
										<th data-class="expand">Afiliado</th>
										<th data-hide="phone">Email</th>	
										<th data-hide="phone">Banco</th>
										<th data-hide="phone,tablet">N° Cuenta</th>
										<th data-hide="phone,tablet">Titular</th>
										<th data-hide="phone,tablet">CLABE</th>
										<th data-hide="phone,tablet">SWIFT</th>										
										<th data-hide="phone,tablet">Dirección postal</th>
										<th data-hide="phone,tablet" style="width: 70px !important">Valor</th>
										<th data-hide="phone,tablet">Fecha</th>
										<th data-hide="phone,tablet">Estado</th>
										<th>Acciones</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach ($cobros as $cobro) {?>
									<tr>
										<td><?php echo $cobro->id_venta; ?></td>
										<td><?php echo $cobro->usuario; ?></td>
										<td><?php echo $cobro->email; ?></td>
										<td><?php echo $cobro->banco; ?></td>
										<td><?php echo $cobro->cuenta; ?></td>
										<td><?php echo $cobro->otro; ?></td>
										<td><?php echo $cobro->clave; ?></td>
										<td><?php echo $cobro->swift; ?></td>										
										<td><?php echo $cobro->dir_postal; ?></td>
										<td>$ <?php echo number_format($cobro->valor,2); ?></td>
										<td><?php echo $cobro->fecha; ?></td>
										<td><?php echo $cobro->estado; ?></td>
										<td class='text-center'>
											<a  style='cursor: pointer;' onclick="estado_cobro('<?php echo $cobro->id_venta; ?>','<?php echo $cobro->id; ?>')"  title = "Cambiar a Pago" class="txt-color-green"><i class="fa fa-check fa-3x"></i></a>
											<a  style='cursor: pointer;' onclick="cancelar_cobro('<?php echo $cobro->id_venta; ?>')" title = "Cancelar Pago" class="txt-color-red"><i class="fa fa-times fa-3x"></i></a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
			</article>
		</div>
		<!-- end widget -->

		<!-- END COL -->

		<div class="row">
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<br /> <br />
			</div>
		</div>
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
<script src="/template/js/plugin/markdown/markdown.min.js"></script>
<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>
<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
<script
	src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script
	src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script type="text/javascript">
$(document).ready(function() {

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
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : true,
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

	/* BASIC ;*/
		var responsiveHelper_dt_basic = undefined;
		var responsiveHelper_datatable_fixed_column = undefined;
		var responsiveHelper_datatable_col_reorder = undefined;
		var responsiveHelper_datatable_tabletools = undefined;
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		$('#dt_basic_paquete').dataTable({
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : true,
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
	
		
	pageSetUp();

})
	
function estado_cobro(venta,historial, usuario)
{
	var msg = "¿Esta seguro de confirmar el pago?";
	var	titulo = "Confirmacion de pago";

	bootbox.dialog({
		message: msg,
		title: titulo,
		buttons: {
			success: {
			label: "Aceptar",
			className: "btn-success",
			callback: function() {
				iniciarSpinner();
				$.ajax({
					type: "POST",
					url: "/bo/cuentasporcobrar/cambiar_estado",
					data: {
						id_venta:venta, 
						id_historial: historial
					},
					}).done(function( msg )
							{
						FinalizarSpinner();
								bootbox.dialog({
									message: msg,
									title: "Felicitaciones",
									buttons: {
										success: {
										label: "Ok!",
										className: "btn-success",
										callback: function() {
											
											window.location="/bo/cuentasporcobrar/";
											}
										}
									}
								});
							
						})

				}
			},
				danger: {
				label: "Cancelar!",
				className: "btn-danger",
				callback: function() {

					}
			}
		}
	})
	
	
	}

function cancelar_cobro(venta)
{
	var msg = "¿Esta seguro de eliminar los datos de la venta?";
	var	titulo = "Eliminar Cobro";

	bootbox.dialog({
		message: msg,
		title: titulo,
		buttons: {
			success: {
			label: "Aceptar",
			className: "btn-success",
			callback: function() {
				iniciarSpinner();
				$.ajax({
					type: "POST",
					url: "/bo/cuentasporcobrar/cambiar_estado_cancelado",
					data: {
						id_venta:venta, 
					},
					}).done(function( msg )
							{
							FinalizarSpinner();
								bootbox.dialog({
									message: msg,
									title: "Felicitaciones",
									buttons: {
										success: {
										label: "Ok!",
										className: "btn-success",
										callback: function() {
											window.location="/bo/cuentasporcobrar/index";
											}
										}
									}
								});
							
						})

				}
			},
				danger: {
				label: "Cancelar!",
				className: "btn-danger",
				callback: function() {

					}
			}
		}
	})
	
	
	}
</script>
