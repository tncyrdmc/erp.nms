			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						<?php  if($type=='5'){?>
						<a class="backHome" href="/bol"><i class="fa fa-home"></i> Menu</a>
						<span>
								> <a href="/bo/logistico2/alta"> Alta</a>
								> <a href="/bo/logistico2/usuarios">  Usuarios Logístico</a>
								> <a href="/bo/usuarios/CEDI"> CEDI </a>
								> Listar
							</span>
							<?php }else if($type=='8'||$type=='9'){
						 	$index= ($type=='8') ? '/CEDI' : '/Almacen';
						 	?>
							<a class="backHome" href="<?=$index?>"><i class="fa fa-home"></i> Menu</a>
							<span> 
								> <a href="<?=$index?>/altas"> Altas</a>
								> <a href="/bo/logistico2/usuarios"> Usuarios Logístico</a>
								> <a href="/bo/usuarios/CEDI"> CEDI </a>
								> Listar
							</span>
							 <?php }else{?>
						
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
								> <a href="/bo/administracion">Administración </a>
								> <a href="/bo/usuarios">Usuarios </a>
								> <a href="/bo/usuarios/CEDI">CEDI </a>
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
									</div>

									<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
											<thead>			                
												<tr>
													<th>ID</th>
													<th data-class="expand">Username</th>
													<th data-hide="phone">Nombre(s)</th>
													<th data-hide="phone">Apellido(s)</th>
													<th data-hide="phone">Email</th>
													<th>CEDI</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>
												
												<?foreach ($users as $user) {?>
													<tr>
														<td><?php echo $user->id; ?></td>
														<td><?php echo $user->username; ?></td>
														<td><?php echo $user->nombre; ?></td>
														<td><?php echo $user->apellido; ?></td>
														<td><?php echo $user->email; ?></td>
														<td><?php echo $user->cedi; ?></td>
														<td>
															<a title="Editar" href="#" class="txt-color-blue" onclick="editar('<?php echo $user->id; ?>');"><i class="fa fa-pencil fa-3x"></i></a>
															<a title="Eliminar" href="#"  class="txt-color-red" onclick="eliminar('<?php echo $user->id; ?>');"><i class="fa fa-trash-o fa-3x"></i></a>
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
		url: "/bo/usuarios/editarCEDI",
		data: {
			id: id
			}
		
	})
	.done(function( msg ) {
		bootbox.dialog({
			message: msg,
			title: 'Modificar Usuario',
				});
	});//fin Done ajax
}

function eliminar(id) {

	$.ajax({
		type: "POST",
		url: "/auth/show_dialog",
		data: {message: '¿ Esta seguro que desea Eliminar El usuario ?'},
	})
	.done(function( msg )
	{
		
		bootbox.dialog({
		message: msg,
		title: 'Eliminar Usuario',
		buttons: {
			success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
				iniciarSpinner();
				$.ajax({
					type: "POST",
					url: "/bo/usuarios/killCEDI",
					data: {id: id}
				})
				.done(function( msg )
					{
					FinalizarSpinner();
					location.href="/bo/usuarios/listarCEDI";
						
					});//Fin callback bootbox

				}
			},
				danger: {
				label: "Cancelar!",
				className: "btn-danger",
				callback: function() {
					FinalizarSpinner();
				}
			}
		}
	})
	});
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
			
