
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<h1 class="page-title txt-color-blueDark">
				<?php  if($type=='5'){?>
					
					<a class="backHome" href="/bol"><i class="fa fa-home"></i> Menu</a>
				<span>
				> <a href="/bo/logistico2/alta">Alta </a>
				> <a href="/bo/logistico2/movimiento">Movimiento al Inventario</a>
				> Listar
				</span>
				<?php }else if($type=='8'||$type=='9'){
					$index= ($type=='8') ? '/CEDI' : '/Almacen'; ?>
					<a class="backHome" href="<?=$index?>"><i class="fa fa-home"></i> Menu</a>
					<span> 
						> <a href="<?=$index?>/altas"> Altas</a>
						> <a href="/bo/logistico2/movimiento">Movimiento al Inventario</a>
						> Listar
					</span>
				 <?php }else{?>
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>> <a href="/bol/dashboard/"> Logistico </a>
				> <a href="/bo/logistico2/alta"> Alta </a>
				> <a href="/bo/logistico2/movimiento">Movimiento al Inventario</a>
				> Listar
				</span>
				
					<?php }?>
			</h1>
				</div>
</div>
<?php

if ($this->session->flashdata ( 'error' )) {
	echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> ' . $this->session->flashdata ( 'error' ) . '
			</div>';
} else if ($this->session->flashdata ( 'correcto' )) {
	echo '<div class="alert alert-succes fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> ' . $this->session->flashdata ( 'correcto' ) . '
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

						<div class="row col-xs-12 col-md-12 col-sm-8 col-lg-5 pull-right">
							<div class="col-xs-2 col-md-2 col-sm-2 col-lg-2">
								<center>
									<a title="Editar" href="#" class="txt-color-blue"><i
										class="fa fa-pencil fa-3x"></i></a> <br>Editar
								</center>
							</div>
							<div class="col-xs-6 col-md-2 col-sm-2 col-lg-2">
								<center>
									<a title="Eliminar" href="#" class="txt-color-red"><i
										class="fa fa-trash-o fa-3x"></i></a> <br>Eliminar
								</center>
							</div>
							<div class="col-xs-6 col-md-2 col-sm-2 col-lg-2">
								<center>
									<a title="Desactivar" href="#" class="txt-color-green"><i
										class="fa fa-square-o fa-3x"></i></a> <br>Desactivado
								</center>
							</div>
							<div class="col-xs-6 col-md-2 col-sm-2 col-lg-2">
								<center>
									<a title="Activar" href="#" class="txt-color-green"><i
										class="fa fa-check-square-o fa-3x"></i></a> <br>Activado
								</center>
							</div>
						</div>
						<br>
						<table id="dt_basic"
							class="table table-striped table-bordered table-hover"
							width="100%">
							<thead>
								<tr>
									<th data-hide="phone">ID</th>
									<th data-class="expand">Nombre</th>

									<th>Acciones</th>

								</tr>
							</thead>
							<tbody>
									<?php foreach ($documento as $row) {?>
									<tr>
									<td><?php echo $row->id_doc; ?></td>
									<td><?php echo $row->nombre; ?></td>

									<td class='text-center'><a class='txt-color-red'
										style='cursor: pointer;'
										onclick='eliminar("<?php echo $row->id_doc; ?> ")'
										title='Eliminar'><i class='fa fa-trash-o fa-3x'></i></a> <a
										class='txt-color-blue' style='cursor: pointer;'
										onclick='editar(<?php echo $row->id_doc; ?>)' title='Editar'><i
											class='fa fa-pencil fa-3x'></i></a>
											<?php if ($row->estatus == 'ACT') {?>
												<a title="Desactivar" style='cursor: pointer;'
										onclick="estado('DES','<?php echo $row->id_doc; ?>')"
										class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
											<?php }else {?>
												<a title="Activar" style='cursor: pointer;'
										onclick="estado('ACT','<?php echo $row->id_doc; ?>')"
										class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
											<?php } ?>
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
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
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
	
function estado(estatus, id)
{
	var msg = "¿Desea desactivar el Documento?";
	var titulo;
	if(estatus == "DES"){
		msg = "¿Desea desactivar el Documento?";
		titulo = "Desactivar Documento";
	}else{
		msg = "¿Desea activar el Documento?";
		titulo = "Activar Documento";
	}
		
	bootbox.dialog({
		message: msg,
		title: titulo,
		buttons: {
			success: {
			label: "Aceptar",
			className: "btn-success",
			callback: function() {
				
				$.ajax({
					type: "POST",
					url: "/bo/inventario/estadoMovimiento",
					data: {
						id:id, 
						estado: estatus
					},
					}).done(function( msg )
							{
							
								location.href = "/bo/inventario/listarMovimiento";
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

	function editar(id){
		$.ajax({
			type: "POST",
			url: "/bo/inventario/editarMovimiento",
			data: {
				id: id
				}
			
		})
		.done(function( msg ) {
			bootbox.dialog({
				message: msg,
				title: 'Modificar Documento',
					});
		});//fin Done ajax
	}

	function eliminar(id) {

		$.ajax({
			type: "POST",
			url: "/auth/show_dialog",
			data: {message: '¿ Esta seguro que desea eliminar el documento ?'},
		})
		.done(function( msg )
		{
			bootbox.dialog({
			message: msg,
			title: 'Eliminar Documento',
			buttons: {
				success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
					
						$.ajax({
							type: "POST",
							url: "/bo/inventario/killMovimiento",
							data: {id: id}
						}).done(function( msg )
						{
							
							bootbox.dialog({
							message: msg,
							title: 'Felicitaciones',
							buttons: {
								success: {
								label: "Aceptar",
								className: "btn-success",
								callback: function() {
									location.href = "/bo/inventario/listarMovimiento";
									}
								}
							}
						})//fin done ajax
						});//Fin callback bootbox

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
		});
}

	
</script>
