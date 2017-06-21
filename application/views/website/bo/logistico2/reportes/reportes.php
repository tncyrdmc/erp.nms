
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
			
			<?php  if($type=='5'){?>
						<a class="backHome" href="/bol"><i class="fa fa-home"></i> Menu</a>
						<span>
							> Reportes	
						</span>
							 <?php }else if($type=='8'||$type=='9'){
						 	$index= ($type=='8') ? '/CEDI' : '/Almacen';?>
						<a class="backHome" href="<?=$index?>"><i class="fa fa-home"></i> Menu</a>
						<span>
							> Reportes		
						</span>
							 <?php }else{?>
						
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
						<span>
							> <a href="/bol/dashboard">Logistico</a>
							> Reportes
						</span>
							
							<?php }?>
			
					
			</h1>
		</div>
	</div>
	
		<!-- START ROW -->
	<div class="row">
			<!-- NEW COL START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well">
				<div class="row">
					<form class="smart-form" id="reporte-form" method="post">
						<div class="row">			
							<section class="col col-lg-3 col-md-3 col-sm-12 col-xs-12">
									
								<label class="select">
									<select id="tipo-reporte" >
                                                                                <option value="8" >Ventas CEDIS</option>
										<option value="1" >Inventario</option>
										<option value="2" >Entradas</option>
										<option value="3" >Salidas</option>
										<option value="4" >Entradas/Salidas</option>
										<option value="5" >Pedidos por entregar</option>
										<option value="6" >Pedidos en transito</option>
										<option value="7" >Pedidos embarcados</option>
										
									</select> 
									<i></i> 
								</label>
							</section>
								
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
									<a id="genera-reporte" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12" onClick = "tipo_reporte()">Generar Reporte</a>
								</label>
							</section>
							<section class="col col-lg-2 col-md-2 col-sm-12 col-xs-12">
									<label class="input">
											<a id="imprimir-2" onclick="reporte_excel()" class="btn btn-primary col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Crear excel</a>
									</label>
							</section>
						</div>
							
						<div class="row" id="row-print" style="display: none;">
							<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
									
							</section>
							
							<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="input">
									<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
								</label>
							</section>
						</div>
						
						<div class="row" id="row-print-af" style="display: none;">
							<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
								
							</section>
							
							<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
								
								<label class="input">
									<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
								</label>
							</section>
						</div>
						
						<div class="row" id="row-print-usr" style="display: none;">
							<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
								
							</section>
							
							<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
								
								<label class="input">
									<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
								</label>
							</section>
						</div>
						
						<div class="row" id="row-print-red" style="display: none;">
							<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
								
							</section>
							
							<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
								
								<label class="input">
									<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
								</label>
							</section>
						</div>
						
						<div class="row" id="row-print-web" style="display: none;">
							<section class="col col-lg-9 col-md-9 col-sm-6 hidden-xs">
								
							</section>
							
							<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
								
								<label class="input">
									<a id="imprimir-1" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
								</label>
							</section>
						</div>
					</form>
				</div>
			</div>
							<!-- Widget ID (each widget will need unique ID)-->
							
							
							
			<!-- comienzo de tabla -->
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
					<h2>Reportes</h2>
	
				</header>
				
						
					<!-- widget div-->
				<div>
							
									<!-- widget edit box -->
					<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
					</div>
							<!-- end widget edit box -->
							
							<!-- widget content -->
					<div class="widget-body no-padding" id="reporte_div">
						
						
						
						
					</div>
						<!-- end widget content -->
		
				</div>
						<!-- end widget div -->
			</div>
			<!-- finalizacion de tabla -->
			
			
					<!-- end widget -->
			<div class="well" id="well-print-af" style="display: none;">
				<div class="row">
					<form class="smart-form" id="reporte-form" method="post">
								
						<div class="row" >
									<section class="col col-lg-6 col-md-6 hidden-sm hidden-xs">
										
									</section>
									<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
										
										<label class="input">
											<a id="imprimir-2" onclick="reporte_excel()" class="btn btn-primary col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Crear excel</a>
										</label>
									</section>
									<section class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
										
										<label class="input">
											<a id="imprimir-2" onclick="window.print()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12"><i class="fa fa-print"></i>&nbsp;Imprimir</a>
										</label>
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
			                    
                        function imprimir(id){
				$.ajax({
                                    type: "POST",
                                    url: "/bo/logistico2/facturaImprimir",//imprimirfactura
                                    data: {id: id,link: '/bo/reportes_logistico/'},
                                })
				.done(function( msg )
				{
                                    bootbox.dialog({
					message: msg,
					title: "Factura",
					className: "",
                                        buttons: {
                                            success: {
                                                label: "Aceptar",
                                                className: "hide",
                                                callback: function() {

                                                }
                                            }
                                        }									
                                    })
				});

                        }
                        
                        function factura(id) {
				iniciarSpinner();
				$.ajax({
					data:{
						id : id
					},
					type:"post",
					url:"/bo/logistico2/factura",
				})
				.done(function( msg )
				{
						FinalizarSpinner();
						bootbox.dialog({
                                                    message: msg,
                                                    title: "Factura",
                                                    className: "",
                                                    buttons: {
							success: {
                                                            label: "Aceptar",
                                                            className: "hide",
                                                            callback: function() {
                                                            
                                                            }
                                                        }
                                                    }
						})
					
				});

                        }
			
                        function eliminar(id) {

				$.ajax({
					type: "POST",
					url: "/auth/show_dialog",
					data: {message: '¿ Esta seguro que desea Eliminar la Venta?'},
				})
				.done(function( msg )
				{
                                    bootbox.dialog({
					message: msg,
					title: 'Eliminar Ventas',
					buttons: {
						success: {
						label: "Aceptar",
						className: "btn-success",
						callback: function() {
							iniciarSpinner();
								$.ajax({
									type: "POST",
									url: "/bo/logistico2/kill_venta",
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
                                                                                            tipo_reporte();
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
		
				
		function tipo_reporte(){
			switch($("#tipo-reporte").val()){
                                case "8" : 
					iniciarSpinner();
					var startdate = $('#startdate').val();
					var finishdate = $('#finishdate').val();
					
					$.ajax({
						type: "POST",
						url: "reporte_cedi",
						data: {inicio:startdate,fin:finishdate}
						
					})
					.done(function( msg ) {
						FinalizarSpinner();
						$("#reporte_div").html(msg);
						
					});
				break;
				case "1" : 
					iniciarSpinner();
					var startdate = $('#startdate').val();
					var finishdate = $('#finishdate').val();
					
					$.ajax({
						type: "POST",
						url: "reporte_inventario",
						data: {startdate:startdate,finishdate:finishdate}
						
					})
					.done(function( msg ) {
						FinalizarSpinner();
						$("#reporte_div").html(msg);
						
					});
				break;
				case '2':
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
							var datos={'inicio':inicio,'fin':fin};
							$.ajax({
								 data: {info : JSON.stringify(datos)},
						         type: "get",
						         url: "/bo/inventario/historial_entrada",
								success: function( msg )
								{
									$("#reporte_div").html(msg);
								}
							});
						}
					}	
					
					
					break;
				case '3':
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
							var datos={'inicio':inicio,'fin':fin};
							$.ajax({
								 data: {info:JSON.stringify(datos)},
						         type: "get",
						         url: "/bo/inventario/historial_salida",
								success: function( msg )
								{
									$("#reporte_div").html(msg);
									  // custom toolbar
							    
								}
							});
							
						}
					}	
					
					
					break;
				case '4':
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
							var datos={'inicio':inicio,'fin':fin};
							$.ajax({
								 data: {info:JSON.stringify(datos)},
						         type: "get",
						         url: "/bo/inventario/historial_entrada_salida",
								success: function( msg )
								{
									$("#reporte_div").html(msg);
									// custom toolbar
							    
								}
							});
							
						}
					}	
					
					
					break;
				case '5':
					
							$("#nuevos_afiliados").show();
							var datos={'inicio':inicio,'fin':fin};
							$.ajax({
								 data: {info:JSON.stringify(datos)},
						         type: "get",
						         url: "/bo/reportes_logistico/pedidos_pendientes",
								success: function( msg )
								{
									$("#reporte_div").html(msg);
									// custom toolbar
							    
								}
							});
							
					
					
					break;
				case '6':
					var inicio=$("#startdate").val();
					var fin=$("#finishdate").val();
					
							$("#nuevos_afiliados").show();
							var datos={'inicio':inicio,'fin':fin};
							$.ajax({
								 data: {info:JSON.stringify(datos)},
						         type: "get",
						         url: "/bo/reportes_logistico/pedidos_transito",
								success: function( msg )
								{
									$("#reporte_div").html(msg);
									// custom toolbar
							    
								}
							});
							
						
						
					
					
					break;
				case '7':
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
							var datos={'inicio':inicio,'fin':fin};
							$.ajax({
								 data: {info:JSON.stringify(datos)},
						         type: "get",
						         url: "/bo/reportes_logistico/pedidos_embarcados",
								success: function( msg )
								{
									$("#reporte_div").html(msg);
									// custom toolbar
							    
								}
							});
							
						}
					}	
					
					
					break;
			}
		}

		function reporte_excel(){
			switch($("#tipo-reporte").val()){
			case "1" :
				window.location="reporte_inventario_excel";
				break;
                        case "8" :
				var inicio=$("#startdate").val();
				var fin=$("#finishdate").val();
				window.location="reporte_cedi_excel?inicio="+inicio+"&&fin="+fin;
				break;
			case "2" :
				var inicio=$("#startdate").val();
				var fin=$("#finishdate").val();
				window.location="reporte_entrada_excel?inicio="+inicio+"&&fin="+fin;
				break;
			
		case "3" :
			var inicio=$("#startdate").val();
			var fin=$("#finishdate").val();
			window.location="reporte_salida_excel?inicio="+inicio+"&&fin="+fin;
			break;
		
		case "4" :
			var inicio=$("#startdate").val();
			var fin=$("#finishdate").val();
			window.location="reporte_entrada_salida_excel?inicio="+inicio+"&&fin="+fin;
			break;
       case "5" :
			
			window.location="reporte_pedidos_pendiente_excel";
			break;
		case "6" :
			
			window.location="reporte_pedidos_transito_excel";
			break;
		case "7" :
			var inicio=$("#startdate").val();
			var fin=$("#finishdate").val();
			window.location="reporte_pedidos_embarcados_excel?inicio="+inicio+"&&fin="+fin;
			break;
		}
		}
		</script>
