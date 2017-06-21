
			<!-- MAIN CONTENT -->
			<div id="content">

				<!-- row -->
				<div class="row">

					<!-- col -->
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER -->
						<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
						<span>
						 > Archivero
						 </span>
						 </h1>
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->

				<!-- row -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="well">

							<section id="widget-grid" class="">
							
								<!-- row -->
								<div class="row">
							
									<!-- NEW WIDGET START -->
									<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

										<!-- Widget ID (each widget will need unique ID)-->
										<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
											<!-- widget options:
											usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
							
											data-widget-colorbutton="false"
											data-widget-editbutton="false"
											data-widget-togglebutton="false"
											data-widget-deletebutton="false"
											data-widget-fullscreenbutton="false"
											data-widget-custombutton="false"
											data-widget-collapsed="true"
											data-widget-sortable="false"
							
											-->
											<header>
												<span class="widget-icon"> <i class="fa fa-table"></i> </span>
												<h2>Archivos</h2>
							
											</header>
							
											<!-- widget div-->
											<div>
							
												<!-- widget edit box -->
												<div class="jarviswidget-editbox">
													<!-- This area used as dropdown edit box -->
												</div>
												<!-- end widget edit box -->
							
												<!-- widget content -->
												<div class="widget-body no-padding">
													<?$i=1;
													if($archivos){?>
													<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
														<thead>
															<tr>
																<th data-hide="phone" >
																	<input onclick="checado()" id="todos" type="checkbox">
																</th>
																<th data-hide="phone,tablet" >Número</th>
																<th data-class="expand"><b>Nombre</b></th>
																<th data-hide="phone,tablet"><b>Fecha</b></th>
																<th data-hide="phone,tablet"><b>Tamaño</b></th>
																<th data-hide="phone,tablet"><b>Acción</b></th>
															</tr>
														</thead>
														<tbody>
															<form id="archivos">
																<?foreach ($archivos as $archivo){?>
																<!-- TR -->
																<tr>
																	<td ><input name="archivo[]" value="<?=$archivo->id_archivero?>" class="chek" type="checkbox"></td>
																	<td ><?=$i?></td>
																	<td>
																			<?=$archivo->nombre_completo?>
																	</td>
																	<td >
																		<?=$archivo->fecha?>
																	</td>
																	<td ><?=$archivo->tamano?> Kb
																	</td>
																	<td >
																		<a onclick="borrar('<?=$archivo->id_archivero?>','<?=$archivo->url?>')" class="btn btn-labeled btn-danger" href="#">
																			<span class="btn-label">
																			<i class="glyphicon glyphicon-trash"></i>
																			</span>
																			Borrar
																		</a>&nbsp;
																		<a target="_blank" class="btn btn-labeled btn-info" href="<?=$archivo->url?>">
																			<span class="btn-label">
																			<i class="glyphicon glyphicon-download"></i>
																			</span>
																			Descargar
																		</a>&nbsp;
																		<a target="_blank" onclick="compartir('<?=$archivo->id_archivero?>')" class="btn btn-labeled btn-warning" href="#">
																			<span class="btn-label">
																			<i class="glyphicon glyphicon-share"></i>
																			</span>
																			Compartir
																		</a>
																	</td>
																</tr>
																<!-- end TR -->
																<?$i++;}?>
															</form>
														</tbody>
													</table>
													<?}else{echo "<h1>No tienes archivos aún</h1>";}?>
												</div>
												<!-- end widget content -->
							
											</div>
											<!-- end widget div -->
										</div>
										<!-- end widget -->
							
									</article>
								</div>
							</section>
						<!-- end widget grid -->

						 <!-- widget grid -->
							<section id="widget-grid" class="">
							
								<!-- row -->
								<div class="row">
							
									<!-- NEW WIDGET START -->
									<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

										<!-- Widget ID (each widget will need unique ID)-->
										<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
											<!-- widget options:
											usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
							
											data-widget-colorbutton="false"
											data-widget-editbutton="false"
											data-widget-togglebutton="false"
											data-widget-deletebutton="false"
											data-widget-fullscreenbutton="false"
											data-widget-custombutton="false"
											data-widget-collapsed="true"
											data-widget-sortable="false"
							
											-->
											<header>
												<span class="widget-icon"> <i class="fa fa-table"></i> </span>
												<h2>Export to PDF / Excel</h2>
											</header>
							
											<!-- widget div-->
											<div>
												<!-- widget edit box -->
												<div class="jarviswidget-editbox">
													<!-- This area used as dropdown edit box -->
												</div>
												<!-- end widget edit box -->
							
												<!-- widget content -->
												<div class="widget-body no-padding">
													<form action="upload.php" class="dropzone dz-clickable" id="personal">
									                    <div class="dz-message">
										                    <br /><br /><br /><br /><br /><br />
										                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										                    </div>
										                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
										                        <h1>Arrastra tus archivos o da clic para buscarlos en tu computadora</h1>
										                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										                        </div><i class="fa fa-file fa-5x"></i>
										                    </div>
									                    </div>
								                	</form>
												</div>
												<!-- end widget content -->
											</div>
											<!-- end widget div -->
										</div>
										<!-- end widget -->
							
									</article>
									
							
								</div>
							</section>
						<!-- end widget grid -->
						</div>
					</div>
				<!-- row -->
				</div>
				<div class="row">
			        <div class="col-sm-12">
			            <br />
			            <br />
			        </div>
		        </div>
				<!-- end row -->

			</div>
			<!-- END MAIN CONTENT -->

		<!-- PAGE RELATED PLUGIN(S) 
		<script src="..."></script>-->
		<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>


<script>
function checado()
{
	if ($("#todos").is(":checked"))
	{
		$(".chek").attr("checked","checked")
	}
	else
	{
		$(".chek").removeAttr("checked")
	}
}
function borrar(id,link)
{
	$.ajax({
		type: "POST",
		url: "/ov/cabecera/del_file",
		data: {id_archivero: id, url: link}
		})
		.done(function( msg ) {
		alert( "Data Saved: " + msg );
		location.href='';
	});
}
function borrar_multiple()
{
	$.ajax({
		type: "POST",
		url: "/ov/cabecera/del_file_multiple",
		data: $("#archivos").serialize()
		})
		.done(function( msg ) {
		alert( "Data Saved: " + msg );
	});
}
function compartir(id)
{
	$.ajax({
		type: "POST",
		url: "/ov/cabecera/comparte_archivo",
		data: {id_archivero: id}
		})
		.done(function( msg ) {
		alert( "Data Saved: " + msg );
		location.href='';
	});
}
</script>
<script>
	$(document).ready(function() {
			
			pageSetUp();
			
			/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
			*/	

			/* BASIC ;*/
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};
				 pageSetUp();

				  Dropzone.autoDiscover = false;
			    $("#personal").dropzone({
			        paramName: "foto",
			        url: "/ov/cabecera/sube_archivo",
			        addRemoveLinks : true,
			        maxFilesize: 150,
			        dictResponseError: 'Error uploading file!',
			    });
	
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
			
			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    var otable = $('#datatable_fixed_column1').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column1'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    var otable = $('#datatable_fixed_column2').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column2'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    // custom toolbar
		    $("div.toolbar").html('<div class="text-right"></div>');
		    	   
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );
		    /* END COLUMN FILTER */   
	    
			/* COLUMN SHOW - HIDE */
			$('#datatable_col_reorder').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_col_reorder) {
						responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_col_reorder.respond();
				}			
			});
			
			/* END COLUMN SHOW - HIDE */
	
			/* TABLETOOLS */
			$('#datatable_tabletools').dataTable({
				
				// Tabletools options: 
				//   https://datatables.net/extensions/tabletools/button_options
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		        "oTableTools": {
		        	 "aButtons": [
		             "copy",
		             "csv",
		             "xls",
		                {
		                    "sExtends": "pdf",
		                    "sTitle": "SmartAdmin_PDF",
		                    "sPdfMessage": "SmartAdmin PDF Export",
		                    "sPdfSize": "letter"
		                },
		             	{
	                    	"sExtends": "print",
	                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
	                	}
		             ],
		            "sSwfPath": "/template/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        },
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_tabletools) {
						responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools.respond();
				}
			});
			
			/* END TABLETOOLS */
		
		})
</script>
