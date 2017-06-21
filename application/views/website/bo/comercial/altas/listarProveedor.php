			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						
						<?php  if($type=='5'){?>
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
							> <a href="/bo/logistico2/alta">Alta</a>
							> <a href="/bo/comercial/actionProveedor">Proveedor </a>
							> Listar
							</span>
		   <?php } else if($type=='4'){?>		
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							
							<span>
							> <a class="" href="/bo/comercial/altas/"><i class=""></i> Comercial</a>
							> <a class="" href="/bo/comercial/actionProveedor/"><i class=""></i> Proveedor</a>
							> Listar
							</span>
					
			<?php }else if($type=='8'||$type=='9'){
						 	$index= ($type=='8') ? '/CEDI' : '/Almacen';
						 	?>
							<a class="backHome" href="<?=$index?>"><i class="fa fa-home"></i> Menu</a>
							<span> 
								> <a href="<?=$index?>/altas"> Altas</a>
								> <a href="/bo/comercial/actionProveedor">Proveedor </a>
								> Listar
							</span>						
			<?php }else{?>
				      <a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
							 	 > <a href="/bol/"> Logistico </a>
								 > <a class="" href="/bo/logistico2/alta/"><i class=""></i> Alta</a>
								 > <a href="/bo/comercial/actionProveedor">Proveedor </a>
								 > Listar
							</span>
			<?php }?>	
								
						</h1>
					</div>
				</div>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false"
          data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-sortable="false"
          data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false">
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
                <fieldset>
                  <div class="contenidoBotones">
						<div class="widget-body">
							<div class="tab-pane">
									<div class="row col-xs-12 col-md-6 col-sm-4 col-lg-3 pull-right">
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
											<center>
											<a title="Editar" href="#" class="txt-color-blue"><i class="fa fa-pencil fa-3x"></i></a>
											<br>Editar
											</center>
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
										<center>	
											<a title="Eliminar" href="#" class="txt-color-red"><i class="fa fa-trash-o fa-3x"></i></a>
											<br>Eliminar
											</center>
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
										<center>	
											<a title="Eliminar" href="#" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
											<br>Activar/Desactivar
											</center>
										</div>
									</div>

									<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
											<thead>			                
												<tr>
													<th data-hide="phone">ID</th>
													<th data-class="expand">Nombre</th>
													<th data-hide="phone">Apellido</th>
													<th data-hide="phone">Pais</th>
													<th data-hide="phone">Email</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												
												<?foreach ($proveedor as $row) {?>
													<tr>
													    <td><?php echo $row->id_proveedor; ?></td>
														<td><?php echo $row->nombre; ?></td>
														<td><?php echo $row->apellido; ?></td>
														<td><?php echo $row->pais; ?></td>
														<td><?php echo $row->email; ?></td>
													
														<td class='text-center'>
															<a title="Editar" style='cursor: pointer;' class="txt-color-blue" onclick="editar('<?php echo $row->id_proveedor; ?>');"><i class="fa fa-pencil fa-3x"></i></a>
													     	<a title="Eliminar" style='cursor: pointer;' class="txt-color-red" onclick="eliminarProveedor('<?php echo $row->id_proveedor; ?>');"><i class="fa fa-trash-o fa-3x"></i></a>
														
														
										                    <?php if ($row->estatus == 'ACT') {?>
												              <a title="Desactivar" style='cursor: pointer;' onclick="estado('DES','<?php echo $row->id_proveedor; ?>')" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
											               <?php }else {?>
												            <a title="Activar" style='cursor: pointer;' onclick="estado('ACT','<?php echo $row->id_proveedor; ?>')" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
											               <?php } ?>
										                </td>
													</tr>
												<?}?>
											</tbody>
										</table>
								</div>
								
							</div>
									</div>
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
				<div class="row">         
			        <!-- a blank row to get started -->
			        <div class="col-sm-12">
			            <br />
			            <br />
			        </div>
		        </div>
			</div>
			<!-- END MAIN CONTENT -->
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

// DO NOT REMOVE : GLOBAL FUNCTIONS!

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

function editar(id){
	$.ajax({
		type: "POST",
		url: "/bo/comercial/editarProveedor",
		data: {
			id: id
			}
		
	})
	.done(function( msg ) {
		bootbox.dialog({
			message: msg,
			title: 'Modificar Proveedor',
				});
	});//fin Done ajax
}

function eliminarProveedor(id) {

	$.ajax({
		type: "POST",
		url: "/auth/show_dialog",
		data: {message: '¿ Esta seguro que desea Eliminar El proveedor ?'},
	})
	.done(function( msg )
	{
		bootbox.dialog({
		message: msg,
		title: 'Eliminar Proveedor',
		buttons: {
			success: {
			label: "Aceptar",
			className: "btn-success",
			callback: function() {

					$.ajax({
						type: "POST",
						url: "/bo/comercial/kill_proveedor",
						data: {id: id}
					})
					.done(function( msg )
					{
						bootbox.dialog({
						message: msg,
						title: 'Proveedor',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								location.href="/bo/comercial/listarProveedor";
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

function estado(estatus, id)
{
		


	var msg = "¿Desea desactivar el Proveedor?";
	var titulo;
	if(estatus == "DES"){
		msg = "¿Desea desactivar el Proveedor?";
		titulo = "Desactivar Proveedor";
	}else{
		msg = "¿Desea activar el Proveedor?";
		titulo = "Activar Proveedor";
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
					url: "/bo/comercial/cambiar_estado_proveedor",
					data: {
						id:id, 
						estado: estatus
					},
					}).done(function( msg )
							{
							
								location.href = "/bo/comercial/listarProveedor";
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
<style>
.link
{
	margin: 0.5rem;
}
.minh
{
	padding: 50px;
}
.link a:hover
{
	text-decoration: none !important;
}
</style>
			
