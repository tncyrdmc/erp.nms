
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
		
			<h1 class="page-title txt-color-blueDark">
				
					<?php  if($type=='5'){?>
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> 
					<span>
					
						> <a href="/bo/logistico2/alta"> Alta </a>
						> <a href="/bo/cedis/index"> Cedi </a>
						> listar
					</span>
					 <?php }else{?>
					 	<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> 
					<span>
						> <a href="/bol/dashboard/"> Logistico</a>
						> <a href="/bo/logistico2/alta"> Alta </a>
						> <a href="/bo/cedis/index"> Cedi </a>
						> listar
					</span>
					 
					 <?php }?>
					
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
	}else if($this->session->flashdata('correcto')) {
		echo '<div class="alert alert-succes fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('correcto').'
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
							<table  id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-hide="phone">ID</th>
										<th data-class="expand">Nombre</th>
										<th data-hide="phone">Descripcion</th>
										<th data-hide="phone, tablet">Ciudad</th>
										<th data-hide="phone, tablet">Dirección</th>
										<th data-hide="phone, tablet">Telefono</th>
									
										<th>Acciones</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach ($cedi as $row) {?>
									<tr>
										<td><?php echo $row->id_cedi; ?></td>
										<td><?php echo $row->nombre; ?></td>
										<td><?php echo $row->descripcion; ?></td>
										<td><?php echo utf8_decode($row->Name) ?></td>
										<td><?php echo $row->direccion; ?></td>
										<td><?php echo $row->telefono; ?></td>
									
										<td class='text-center'>
											<a class='txt-color-red' style='cursor: pointer;' onclick='eliminar_cedi("<?php echo $row->id_cedi; ?> ")' title='Eliminar'><i class='fa fa-trash-o fa-3x'></i></a>
											<a class='txt-color-blue' style='cursor: pointer;' onclick='editar_cedi(<?php echo $row->id_cedi; ?>)' title='Editar'><i class='fa fa-pencil fa-3x'></i></a>
											<?php if ($row->estatus == 'ACT') {?>
												<a title="Desactivar" style='cursor: pointer;' onclick="estado_almacen('DES','<?php echo $row->id_cedi; ?>')" class="txt-color-green"><i class="fa fa-check-square-o fa-3x"></i></a>
											<?php }else {?>
												<a title="Activar" style='cursor: pointer;' onclick="estado_almacen('ACT','<?php echo $row->id_cedi; ?>')" class="txt-color-green"><i class="fa fa-square-o fa-3x"></i></a>
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
	
function estado_almacen(estatus, id)
{
	var msg = "¿Desea desactivar el cedi?";
	var titulo;
	if(estatus == "DES"){
		msg = "¿Desea desactivar el cedi?";
		titulo = "Desactivar almacen";
	}else{
		msg = "¿Desea activar el cedi?";
		titulo = "Activarcedi";
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
					url: "cambiar_estado_cedi",
					data: {
						id:id, 
						estado: estatus
					},
					}).done(function( msg )
							{
							
								location.href = "listarCedis";
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

	function editar_cedi(id){
		$.ajax({
			type: "POST",
			url: "/bo/cedis/editar_cedi",
			data: {
				id: id
				}
			
		})
		.done(function( msg ) {
			bootbox.dialog({
				message: msg,
				title: 'Modificar Cedi',
					});
		});//fin Done ajax
	}

	function eliminar_cedi(id) {

		$.ajax({
			type: "POST",
			url: "/auth/show_dialog",
			data: {message: '¿ Esta seguro que desea Eliminar el cedi ?'},
		})
		.done(function( msg )
		{
			bootbox.dialog({
			message: msg,
			title: 'Eliminar Cedi',
			buttons: {
				success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
					
						$.ajax({
							type: "POST",
							url: "eliminar_cedi",
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
									location.href="listarCedis";
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

	function ValidarVacio(nombre, direccion, telefono){
		if(nombre == ''){
			alert('Campo Nombre del cedi es requerido');
			return false;
		}else if(direccion == ''){
			alert('El cambo direccion del cedi es requerido');
			return false;
		}else if(telefono == ''){
			alert('El cambo telefono del cedi es requerido');
			return false;
		}else{
			return true;
		}
		
	}

	function actualizar_almacen()
	{
		
		var nombre = $("#nombre").val();
		var descripcion = $("#descripcion").val();
	
		var direccion = $("#direccion").val();
		var telefono = $("#telefono").val();
		
		if(ValidarVacio(nombre, direccion, telefono)){
			$.ajax({
				 data: $('#actualizar').serialize(),
		         type: "post",
		         url: "actualizar_almacen"
				}).done(function( msg )
						{
					
					bootbox.dialog({
					message: msg,
					title: 'Atención !!',
					buttons: {
						success: {
						label: "Aceptar",
						className: "btn-success",
						callback: function() {
							//location.href="listar";
							}
						}
					}
				})
				
				});//Fin callback bootbox
		}
			
	}
</script>
