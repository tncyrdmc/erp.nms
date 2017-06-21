<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						
							<?php  if($type=='5'){?>
								<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
							
								> <a href="/bo/premios/index">Premios / Entrega</a>
								> Premios Entregados
							</span>
							<?php }else{?>
								<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
								> <a href="/bol/dashboard/">Log&iacute;stico</a> 
								> <a href="/bo/premios/index">Premios / Entrega</a>
								> Premios Entregados
							</span>
							
							<?php }?>
						</h1>
					</div>
				</div>
				<div>
					<section id="widget-grid" class="">
						<!-- START ROW -->
						<div class="row">
							<!-- NEW COL START -->
							<article class="col-sm-12 col-md-12 col-lg-12">
								<!-- Widget ID (each widget will need unique ID)-->
								<div class="jarviswidget"  data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>
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
										<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
										<!--<h2>Datos personales</h2>-->				
										
									</header>
				
									<!-- widget div-->
									<div>
										
										<!-- widget edit box -->
										<div class="jarviswidget-editbox">
											<!-- This area used as dropdown edit box -->
											
										</div>
										<!-- end widget edit box -->
										<!-- widget content -->
										<div class="widget-body">
											<div id="myTabContent1" class="tab-content padding-10">
												<div class="tab-pane fade in active" id="s1">
													<section id="widget-grid" class="">
				
														<!-- row -->
														<div class="row">
													
															<!-- NEW WIDGET START -->
															<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									
																<!-- Widget ID (each widget will need unique ID)-->
																<div class="jarviswidget jarviswidget-color-blueDark"  data-widget-editbutton="false">
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
																	
													
																	<!-- widget div-->
																	<div>
													
																		<!-- widget edit box -->
																		<div class="jarviswidget-editbox">
																			<!-- This area used as dropdown edit box -->
																			
																		</div>
																		<!-- end widget edit box -->
																
																		<!-- widget content -->
																		<div class="widget-body no-padding">	
																			<div class="col col-xs-12 col-lg-12">
																				<form class="smart-form" id="reporte-form" method="post">
																					<div class="row">			
																						<section class="col col-lg-2 col-md-2 col-sm-12 col-xs-12">
																							<label class="input"> <i class="icon-append fa fa-calendar"></i>
																								<input type="text" name="startdate" id="startdate" placeholder="">
																							</label>
																						</section>
																							
																						<section class="col col-lg-2 col-md-2 col-sm-12 col-xs-12">
																							<label class="input"> <i class="icon-append fa fa-calendar"></i>
																								<input type="text" name="finishdate" id="finishdate" placeholder="" >
																							</label>
																						</section>
																							
																						<section class="col col-lg-2 col-md-2 col-sm-12 col-xs-12">
																							<label class="input">
																								<a id="genera-reporte" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12" onClick = "Consultar()">Buscar</a>
																							</label>
																						</section>
																						
																					</div>
																						
																					
																					<div class="row" id="row-print-af" style="display: none;">
																						<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
																							
																							<label class="input">
																								<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
																							</label>
																						</section>
																					</div>
																					
																				</form>
																			</div>
																			<div id="tabla">
																			</div>
																			
													
																		</div>
																		<!-- end widget content -->
													
																	</div>
																	<!-- end widget div -->
																</div>
																<!-- end widget -->
													
															</article>
															
															
															<!-- WIDGET END -->
													
														</div>
													
													</section>		
												</div>
											</div>
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
						<!-- END ROW -->
					</section>
				</div>
			</div>
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
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

			$('#startdate').datepicker({
				dateFormat : 'yy-mm-dd',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});
			
			$('#finishdate').datepicker({
				dateFormat : 'yy-mm-dd',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#startdate').datepicker('option', 'maxDate', selectedDate);
				}
			});
		
		})

	function Consultar(){
		var inicio=$("#startdate").val();
		var fin=$("#finishdate").val();
		if(inicio=='')
		{
			alert('Introduzca fecha de inicio');
		}
		else
		{
			if(fin=='')
			{
				alert('Introduzca fecha de fin');
			}
			else
			{
				$.ajax({
					 data: {inicio: inicio, fin:fin},
			         type: "post",
			         url: "embarcados",
					success: function( msg )
					{
						$("#tabla").html(msg);
						
				    
					}
				});
			}
		}	
	}		
</script>
