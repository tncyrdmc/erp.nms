
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>> 
					Reportes
				</span>
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
										<option value="" selected="" disabled="">Selecciona Reporte </option>
										<option value="7" >Afiliados</option>
										<option value="8" onclick="tipo_reporte()">Afiliados nuevos en el mes</option>
										<option value="15" onclick="tipo_reporte()" >Afiliados Activos</option>
										<option value="16" onclick="tipo_reporte()" >Afiliados InActivos</option>
										<option value="1" >Ventas por Oficinas Virtuales</option>
                                                                                <option value="19" >Ventas por CEDIS</option>
										<option value="9" onclick="tipo_reporte()">Ventas Por Cobrar Bancos</option>
										<option value="12">Ventas Pagadas Bancos</option>
										<option value="14">Ventas Pagos Enlinea</option>
										<option value="13" >Comisiones Por Pagar</option>
										<option value="10" >Comisiones Pagadas</option>
										<option value="17" >Bonos Pagados</option>
										<option value="18" >Total Comisiones y Bonos</option>
										<option value="11" >Comisiones Pagadas y Por Pagar</option>
										<!--  	
											<option value="6" >Facturacion / Pedidos cobrados</option>
											<option value="0" >Ventas empresa</option>
											<option value="2" >Ventas por telemarketing</option>
											<option value="3" >Ventas por CEDIs</option>
											<option value="4" >Ventas web personales</option>
											<option value="5" >Pedidos / Ctas x cobrar</option>
											<option value="1">Usuarios SIO</option>
											<option value="2">Usuarios Telemarketing</option>
											<option value="3">Usuario CEDI</option>
											<option value="4">Proveedores</option>
											<option value="5">Productos y Servicios</option>
											<option value="6">Almacenes</option>
											<option value="7">CEDI's</option>
											<option value="8">Embarques</option>
											<option value="9">Afiliados / Distribuidores</option>
											<option value="10">Bancos</option>
											<option value="11">Orden de compra - Proveedores</option>
											<option value="12">Requisici&oacute;n de compra</option>
											<option value="13">Pedidos</option>
											<option value="14">Facturas Emitidas</option>
											<option value="15">Pagos</option>
											<option value="16">Comisiones</option>
											<option value="17">Usuarios</option>
											<option value="18">Ventas por Empresa</option>
											<option value="19">Ventas por Oficina Virtual</option>
											<option value="20">Ventas por Telemarkwting</option>
											<option value="21">Ventas por CEDI's</option>
											<option value="22">Ventas webs personales</option>
											<option value="23">Pedidos / Cuentas por cobrar</option>
											<option value="24">Facturacion / Pedidos Cobrados</option>
											<option value="25">Afiliados</option>
											<option value="26">Afiliados nuevos del Mes</option> -->
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
									<a id="genera-reporte" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12" >Generar Reporte</a>
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
		</script>
		
		<script type="text/javascript" id="script_fila">
			function nueva_fila()
			{
				alert("hola");
			}
		</script>
		
		<script type="text/javascript">

			
			
			function tipo_reporte(){
			
				var tipo=$("#tipo-reporte").val();
				
				$("#nuevos-afiliados").show();
				iniciarSpinner();
				$.ajax({
			         type: "post",
			         url: "/bo/reportes/reportes_tipo",
			         data: {
				         	tipo : tipo,
				         	startdate :'2016-01-01',
				         	finishdate :'2026-01-01'
				         }
				}).done(function( msg )
					{
					
					$("#reporte_div").html(msg);
					setTableConfig();
					FinalizarSpinner();
					
					});
			}
		
			function validarsifecha(tipo,inicio,fin){
				var tiposfecha = [1,7,10,11,12,13,14,17,18];
				for (i = 0; i < tiposfecha.length; i++)  {
					if(tipo == tiposfecha[i]){
						return (inicio == '' || fin == '') ? true : false;						
					}			
				}					
			}
		
			$("#genera-reporte").click(function()
			{
				
				var tipo=$("#tipo-reporte").val();
				var inicio=$("#startdate").val();
				var fin=$("#finishdate").val();
				if (!validarsifecha(tipo,inicio,fin)){
					$("#nuevos-afiliados").show();
					iniciarSpinner();
					$.ajax({
				         type: "post",
				         url: "/bo/reportes/reportes_tipo",
				         data: {
					         	tipo : tipo,
					         	startdate :inicio,
					         	finishdate :fin
					         }
			         }).done(function (msg){
							$("#reporte_div").html(msg);
							setTableConfig();
							FinalizarSpinner();
							});
				}else{
					FinalizarSpinner();
					alert('Introduzca las fechas para buscar');
				}
			
			});
						
			
		
			
			function reporte_excel_comprar_usr()
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
								var datos={'inicio':inicio,'fin':fin};
								$.ajax({
							         type: "get",
							         url: "reporte_compras_excel/"+inicio+fin,
								});
							}
						}	
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
		

		function reporte_excel(){
			
			switch($("#tipo-reporte").val()){
			case "0" : location.href="/bo/comercial/red_tabla";
			break;
			case "1" : {
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/reporte_ventas_oficinas_virtuales_excel?inicio="+startdate+"&&fin="+finishdate;
			}
                        break;
                        case "19" : {
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes_logistico/reporte_cedi_excel?inicio="+startdate+"&&fin="+finishdate;
			}
			break;
			case "7" :{
				//Afiliados
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/reporte_afiliados_excel?inicio="+startdate+"&&fin="+finishdate;
			}
			break;
			case "8" :{
				//Afiliados en el mes
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/reporte_afiliados_mes_excel?inicio="+startdate+"&&fin="+finishdate;
			}
			break;

			case "9" :{
				// ventas por cobrar
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/reporte_cobros_pendientes_excel";
			}
			break;

			case "10" :{
				// Comisiones pagadas
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/reporte_comisiones_pagadas_excel?inicio="+startdate+"&&fin="+finishdate;
			}
			break;
			case "12" :{
				// Ventas Pagadas
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/reporte_cobros_pagados_excel?inicio="+startdate+"&&fin="+finishdate;
			}
			break;
			case "13" :{
				// Comisiones Por pagar
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/reporte_comisiones_por_pagar_excel?inicio="+startdate+"&&fin="+finishdate;
			}
			break;
			case "11" :{
				// Comisiones por pagar y pagadas
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/reporte_cobros_todos_excel?inicio="+startdate+"&&fin="+finishdate;
			}
			break;

			case "14" :{
				// Comisiones por pagar y pagadas
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/reporte_ventas_pagadas_online_excel?inicio="+startdate+"&&fin="+finishdate;
			}
			break;
			
			case "15" :{
				// Comisiones por pagar y pagadas
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/afiliados_activos_excel?inicio="+startdate+"&&fin="+finishdate;
			}
			break;

			case "16" :{
				// Comisiones por pagar y pagadas
				var startdate = $('#startdate').val();
				var finishdate = $('#finishdate').val();
				window.location="/bo/reportes/afiliados_inactivos_excel?inicio="+startdate+"&&fin="+finishdate;
			}
			break;
		}

		}

		function setTableConfig(){
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};
			var otable = $('#datatable_fixed_column1').DataTable({
	    	"bFilter": true,
	    	"bFilter": true,
	    	//"bInfo": false,
	    	//"bLengthChange": false
	    	//"bAutoWidth": false,
	    	"bPaginate": true,
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
	    	$("div.toolbar").html('<div class="text-right"><img src="" alt="" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
	    	   
		    // Apply the filter
		    $("#datatable_fixed_column1 thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );
		   
	    // custom toolbar
		/*	 var obj = '<a onclick="reporte_excel()" class="btn btn-success col-xs-12 col-lg-12 col-md-12 col-sm-12 " ><i class="fa fa-print"></i>&nbsp;Crear excel</a>'
					$("#remplazar").html(obj);*/
		}
			
		</script>
