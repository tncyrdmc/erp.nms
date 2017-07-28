<!-- MAIN CONTENT -->
<div id="content">

	<section id="widget-grid">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-colorbutton="false" data-widget-editbutton="false"
					data-widget-togglebutton="false" data-widget-deletebutton="false"
					data-widget-sortable="false" data-widget-fullscreenbutton="false"
					data-widget-custombutton="false" data-widget-collapsed="false">
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
									<div class="row">

										<div class="col-sm-11 link" style="padding-left: 2em">
											<!--<section class="col-md-3" style="padding-left: 2em">
												<a href="#" class="btn" onclick="crear_item()"> <i
													class="fa fa-tag"></i> Agregar Producto
												</a>
											</section>-->
											<section class="col-md-3 col-xs-6" style="padding-left: 2em">
												<div class="control-group info">
													<label> 
														<input type="text" autofocus class="input-xlarge"
														id="usuario" name="usuario" list="customers"
														placeholder="ID o Nombre del Afiliado"
														autocomplete="off"> 
														<datalist id="customers">

														</datalist>
													</label>
												</div>
											</section>
											<section class="col-md-5 col-xs-5" style="padding-left: 2em">
												<pre style="padding: 2em" class="pull-right">Nombre del Cajero/a : <?=$cajero?></pre>
											</section>
											<section class="col-md-3 col-xs-6" style="padding-left: 2em">
												<div class="control-group info">
													<label> 
														<input type="text" autofocus class="input-xlarge"
														id="codigo" name="codigo" list="characters"
														placeholder="Codigo de barra o Nombre del producto"
														autocomplete="off"> 
														<datalist id="characters">

														</datalist>
													</label>
												</div>
											</section>
											
											
											<section class="col-md-12" style="padding-left: 2em"></section>
											<section id="existeProducto" class="col-md-3"
												style="padding-left: 2em">
												<!--  <div id="noRegistrado" class="alert alert-error" align="center">
												<button type="button" class="close" data-dismiss="alert">x</button>
												<strong>Producto no Registrado<br>
												<a href="#" class="btn btn-success"	onclick="crear_item($(`#codigo).val())">Crear Este Producto </a></strong>
											</div> -->
											</section>
											

											<hr class="col-md-12 col-xs-12" />

											<div class="col-md-12 col-xs-6" style="OVERFLOW: scroll; MIN-HEIGHT: 200px; MAX-HEIGHT: 300px">
												<table style="width: 100%" id="dt_basic" class="table table-striped table-bordered table-hover">
													<thead>
														<tr class="info">
															<th data-class="expand"><strong>Codigo</strong></th>
															<th data-hide="phone,tablet"><strong>Producto</strong></th>
															<th data-hide="phone,tablet"><strong>Valor Unitario</strong></th>
															<th data-hide="phone,tablet"><strong>Cant.</strong></th>
															<th data-hide="phone,tablet"><strong>Puntos</strong></th>
															<th data-hide="phone,tablet"><strong>Importe</strong></th>
															<th data-hide="phone,tablet"><strong>Existencia</strong></th>
															<th data-hide="phone,tablet">Acciones</th>
														</tr>
													</thead>
													<tbody id="pedidos">
													</tbody>
												</table>

											</div>
											
											<hr class="col-md-12 col-xs-12" />
											<section class="col-md-2  text-center" style=""></section>

											<section class="col-md-4 col-xs-5 text-center" style="padding: 2em">
												<!-- <form name="form2" method="get" action="php_caja_act.php">
													<input type="hidden" name="xcodigo" id="xcodigo" value="46">
													<div class="padding-10">
														<h4>Nuevo Precio o % Descuento:</h4>
													</div>
													<div class="padding-10">
														<div class="col-md-3 "></div>
														<label class="col-md-6 input"> <input type="number"
															name="xdes" id="xdes" value="0" autocomplete="off">
														</label>
													</div>
													<div class="" style="padding-bottom: 5em">
														<div class="col-md-6">
															[ <input type="radio" name="tipo" id="optionsRadios1"
																value="p" checked> Descuento % ]
														</div>
														<div class="col-md-6">
															[ <input type="radio" name="tipo" id="optionsRadios1"
																value="d" checked> Nuevo Precio $ ]
														</div>
													</div>
													<div class="padding-10">
														<button type="submit" class="btn btn-success">Procesar</button>
													</div>
												</form> -->
											</section>
											
											<section class="col-md-5 col-xs-5" style="padding-left: 2em">
												<div class="pull-right">
													<h5>Tipo de Compra:</h5>
													<br />
													<button type="button" class="btn btn-primary"
														onclick="tipo_venta('DETAL')">P.
														Publico</button>
													<button type="button" class="btn btn-primary"
														onclick="tipo_venta('MAYOR')">P.
														Mayoreo</button>

												</div>
											</section>

											<!--  <hr class="col-md-12 col-xs-12" />

											

											<section class="col-md-4 col-xs-5 text-center" style="padding: 2em">
												<form name="form2" method="get" action="php_caja.php">
													<input type="hidden" name="xcodigo" id="xcodigo" value="34">
													<div class="" style="padding-bottom: 2.5em">
														<h4>Cantidad:</h4>
													</div>
													<div class="" style="padding-bottom: 4em">
														<div class="col-md-3 "></div>
														<label class="col-md-6 input"> <input type="text"
															name="cantidad" id="cantidad" value="0"
															autocomplete="off">
														</label>
													</div>
													<div class="padding-10">
														<button type="submit" class="btn btn-success">Procesar</button>
													</div>
												</form>
											</section> -->

											<hr class="col-md-12 col-xs-12" />


											<section class="col-md-4 col-xs-7">
												<pre class="pull-left" style="padding: 1em; font-size: 24px" id="art">0 Articulos en venta</pre>
											</section>
											<section class="col-md-4 col-xs-6 text-center">
												<div style="padding: 0.5em;">

													  <!--  <form name="form3" method="get" action="caja.php">-->

														<div class="padding-10">
															<h4>Descuento al Neto:</h4>
														</div>
														<div class="padding-10">
															<div class="col-md-2 "></div>
															<label class="input-prepend input-append col-md-8 input">
																<input type="number" class="span1" min="0" step="0.01" max="99"
																name="cifra" id="cifra" value=""> <span
																class="add-on">%</span>
															</label>
														</div>
														<div class="padding-10">
															<button onclick="descuento_neto()" class="btn btn-mini">Aplicar
																Descuento</button>
														</div>
													<!--  </form> --> 

												</div>
											</section>
											<section class="col-md-4 col-xs-7">
												<pre class="" id="neto"
													style="padding: 1em; font-size: 24px">Neto: $ 0.00</pre>
											</section>


											<hr class="col-md-12 col-xs-12" />


											<div class="well col-md-12 col-xs-5">
												<section class="col-md-4"></section>
												<section class="col-md-4">

													<div class="text-center" style="padding: 1em;">
														<a href="#" class="btn btn-success"	onclick="ver_compra()">
															<i class="fa fa-shopping-cart"></i>
															V. Contado
														</a>
													</div>

												</section>
											</div>




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
	</section>
	<div class="row">
		<!-- a blank row to get started -->
		<div class="col-sm-12">
			<br /> <br />
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->
<style>
.link {
	margin: 0.5rem;
}

.minh {
	padding: 50px;
}

.link a:hover {
	text-decoration: none !important;
}
</style>
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
<script>
var total = 0;
$(document).ready(function() {
	
	$("#mymarkdown").markdown({
					autofocus:false,
					savable:false
				})


	//setTabla();
	
})

function setTabla(){
	
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
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
			"t"+
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : false,
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
}

$(document).ready(function(){
	existeUser();
	existeProducto();	
})

$('#usuario').keyup(function(){	
	existeUser();
})

$('#usuario').mouseenter(function(){	
	existeUser();
})

$('#usuario').mouseover(function(){	
	existeUser();
})

$('#usuario').focus(function(){	
	existeUser();
})

$('#usuario').change(function(){	
	addUser();
})

$('#codigo').keyup(function(){	
	existeProducto();
})

$('#codigo').mouseenter(function(){	
	existeProducto();
})

$('#codigo').mouseover(function(){	
	existeProducto();
})

$('#codigo').focus(function(){	
	existeProducto();
})

$('#codigo').change(function(){		
	addProducto();
	addUser();
	
})

function addProducto(){
	 var item = $("#codigo").val(); 
	 var user = $("#usuario").val(); 
	 
	 if(item!=''&&user!=''){
		 
		 $.ajax({
				type: "POST",
				url: "POS/cargarProducto",
				data: {
					item : item
				},
			})
			.done(function( msg )
			{
				/*bootbox.dialog({
					message: msg,
				})*/
				if(msg){
					$('#pedidos').html(msg);
					neto(total);art();
					$("#codigo").val('');
				}
                                //
			});//Fin callback bootbox*/

	}
}

function addUser(){
	 var item = $("#usuario").val(); 
	 if(item!=''){
		 
		 $.ajax({
				type: "POST",
				url: "POS/cargarUser",
				data: {
					item : item
				},
			})
			.done(function( msg )
			{
				/*bootbox.dialog({
					message: msg,
				})*/
				if(msg){
					//$('#pedidos').html(msg);
					//neto(total);art();
					$("#codigo").val('');
				}
			});//Fin callback bootbox*/

	}
}

function neto(valor){

	
	$.ajax({
		type: "POST",
		url: "POS/setNeto",
		data: {valor:valor},
	})
	.done(function( msg )
	{
		/*bootbox.dialog({
			message: msg,
		})*/
		$('#neto').html(msg);
		
	})
}

function art(){
	$.ajax({
		type: "POST",
		url: "POS/setArt",
		data: {},
	})
	.done(function( msg )
	{
		/*bootbox.dialog({
			message: msg,
		})*/
		$('#art').html(msg);
		
	})
}

function tipo_venta(i){

	 $.ajax({
			type: "POST",
			url: "POS/setCosto",
			data: {
				costo : i
			},
		})
		.done(function( msg )
		{
			/*bootbox.dialog({
				message: msg,
			})*/
			$('#pedidos').html(msg);
			neto(total);art();
		})

}

function cantidad(i,f){

		 $.ajax({
				type: "POST",
				url: "POS/setCantidad",
				data: {
					item : i,
					factor : f
				},
			})
			.done(function( msg )
			{
				/*bootbox.dialog({
					message: msg,
				})*/
				$('#pedidos').html(msg);
				neto(total);art();
			})
	
}

function existeProducto(){
	 var item = $("#codigo").val(); 
	 var user = $("#usuario").val(); 
	 
	 if(item!=''&&user!=''){
		 
		 $.ajax({
				type: "POST",
				url: "POS/existeProducto",
				data: {
					item : item,
					user : user
				},
			})
			.done(function( msg )
			{
				/*
				bootbox.dialog({
					message: msg,
				})
				*/
				if(msg){
					$('#characters').html(msg);
					$('#characters').show();
				}
				//
			});//Fin callback bootbox*/

	}
}

function existeUser(){
	 var item = $("#usuario").val(); 
	 if(item!=''){
		 
		 $.ajax({
				type: "POST",
				url: "POS/existeUser",
				data: {
					item : item
				},
			})
			.done(function( msg )
			{
				/*
				bootbox.dialog({
					message: msg,
				})
				*/
				if(msg){
					$('#customers').html(msg);
					$('#customers').show();
				}
				//
			});//Fin callback bootbox*/

	}
}

function descuento_neto()
{
	total = $('#cifra').val();
	neto(total);
}

function descuento(i)
{
	$.ajax({
		type: "POST",
		url: "POS/descuento",
		data: {item : i},
	})
	.done(function( msg )
	{
		bootbox.dialog({
		message: msg,
		title: 'Descuento al Producto',
		buttons: {			
			danger: {
				label: "Cancelar!",
				id : 'cerrar',
				className: "btn-danger cerrar",
				callback: function() {

					}
			}
		}
	})
	});
}

function crear_item()
{

	var code = $("#codigo").val(); 
	
	$.ajax({
		type: "POST",
		url: "POS/new_item",
		data: {code : code},
	})
	.done(function( msg )
	{
		bootbox.dialog({
		message: msg,
		title: 'Crear Producto',
		buttons: {
			success: {
			label: "Aceptar",
			className: "btn-success",
			callback: function() {
					/*
					$.ajax({
						type: "POST",
						url: "",
						data: $("#"+codigo).serialize(),
					})
					.done(function( msg )
					{
						bootbox.dialog({
						message: "Se han actualizado los cambios",
						title: nombre,
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								}
							}
						}
					})//fin done ajax
					});//Fin callback bootbox
						*/
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

function ver_compra()
{
	$.ajax({
		type: "POST",
		url: "POS/ver_cobro",
		data: {desc:total},
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: 'Cobrar al Contado',
			buttons: {
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
