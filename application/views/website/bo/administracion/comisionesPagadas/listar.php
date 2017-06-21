
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row hidden-print">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/administracion">Administracion</a> > Comisiones Pagadas
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
	


		<!-- START ROW -->

		<div class="row">
			


			<!-- NEW COL START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="well">
					<div class="row">
						<form class="smart-form" id="reporte-form" method="post">
							<div class="row hidden-print">		
								<section class="col col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="startdate" id="startdate" placeholder="Del">
									</label>
								</section>
								<section class="col col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="finishdate" id="finishdate" placeholder="Al">
									</label>
								</section>
								<section class="col col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<label class="input">
										<a id="genera-reporte" class="btn btn-primary col-xs-12 col-lg-12 col-md-12 col-sm-12">Consultar</a>
									</label>
								</section>
							</div>
							
						</form>
					</div>
					
				</div>
							<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blueDark" id="nuevos_afiliados" data-widget-editbutton="false">
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
						<h2>Cobros</h2>
	
					</header>
				
						
					<!-- widget div-->
						<div>
							
									<!-- widget edit box -->
							<div class="jarviswidget-editbox">
.										<!-- This area used as dropdown edit box -->
.				
							</div>
							<!-- end widget edit box -->
							
							<!-- widget content -->
							<div class="widget-body no-padding" id="reporte_div">
				
								
		
							</div>
						<!-- end widget content -->
		
						</div>
						<!-- end widget div -->
					</div>
					
					<!-- end widget -->
					<div class="well" id="well-print-af" style="display: none;">
						<div class="row">
							<form class="smart-form" id="reporte-form" method="post">
								
								<div class="row" >
				
									
								</div>
							</form>
						</div>
					</div>
					<div class="well" id="well-print-usr" style="display: none;">
						<div class="row">
							<form class="smart-form" id="reporte-form" method="post">
								
								<div class="row" >
									<section class="col col-lg-9 col-md-9 hidden-sm hidden-xs">
										
									</section>
				
									
								</div>
							</form>
						</div>
					</div>
					
				
		
				</article>
				
				<!-- NEW WIDGET START -->
						<!-- WIDGET END -->
		


			</div>
		</div>
		<div class="row">         
         <!-- a blank row to get started -->
	    	<div class="col-sm-12">
	        	<br />
	        	<br />
	        </div>
        </div>
<!-- END MAIN CONTENT -->

<!-- PAGE RELATED PLUGIN(S) -->
		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/spin.js"></script>
		
		<script type="text/javascript">
			$("#tipo-reporte").change(function()
			{
				if($("#tipo-reporte").val()==24)
				{
					$("#startdate").prop( "disabled", true );
					$("#finishdate").prop( "disabled", true );
				}
				else
				{
					$("#startdate").prop( "disabled", false);
					$("#finishdate").prop( "disabled", false );
				}
			});
		</script>
		<script type="text/javascript">
			$("#genera-reporte").click(function()
			{
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
								$("#nuevos_afiliados").show();
								//iniciarSpinner();
								$.ajax({
									type: "POST",
									url: "reporte_comisionesPagadas",
									data: {
										startdate : inicio,
										finishdate : fin
										},
									success: function( msg )
									{
										FinalizarSpinner();
										$("#reporte_div").html(msg);
							    
									}
								});
								
							}
						}
			
			});

			function eliminar(id) {

				$.ajax({
					type: "POST",
					url: "/auth/show_dialog",
					data: {message: '¿ Esta seguro que desea Eliminar la venta con sus respectivas comisiones ?'},
				})
				.done(function( msg )
				{
					bootbox.dialog({
					message: msg,
					title: 'Eliminar Cobro',
					buttons: {
						success: {
						label: "Aceptar",
						className: "btn-success",
						callback: function() {
							iniciarSpinner();
								$.ajax({
									type: "POST",
									url: "/bo/comisionesPagadas/kill_cobros",
									data: {id: id}
								})
								.done(function( msg )
								{
									FinalizarSpinner();
									bootbox.dialog({
									message: msg,
									title: 'Atención',
									buttons: {
										success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function() {
											location.href="/bo/comisionesPagadas/index";
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
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
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
		    
		    // custom toolbar
		    $("div.toolbar").html('<div class="text-right"><img src="/template/img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
		    	   
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
			/* END TABLETOOLS */
		
		})

		</script>
