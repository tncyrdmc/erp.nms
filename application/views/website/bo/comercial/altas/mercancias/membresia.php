
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
			
								<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>&gt;
								<a href="/bo/comercial">Comercial</a> > <a href="/bo/comercial/carrito_de_compras?co=c"> Carrito de Compras </a>
								> <a href="/bo/mercancia/index?co=c" >Alta</a> > Membresía
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
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>
					
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Mercancia</h2>				
						
					</header>

					<!-- widget div-->
					
						<div class="widget-body">
							<form method="POST" enctype="multipart/form-data"  action="/bo/mercancia/CrearMembresia" class="smart-form" name="form_service">
								<input type="text" class="hide" value="<?php echo $_GET['id']; ?>" name="tipo_mercancia">
									
								<fieldset>
									<legend>Datos de la Membresía</legend>
									<div id="form_mercancia">
										<div class="row">
												<fieldset>
													<section class="col col-2">
														<label class="input">Nombre
															<input required type="text" id="nombre_s" name="nombre">
														</label>
													</section>
														<section class="col col-2">
														<label class="input">Tiempo de caducidad
															<input required placeholder="En días" type="number"  id="caducidad" name="caducidad">
														</label>
													</section>
													<section class="col col-3">Categoria
															<label class="select">
																<select name="red">
																<?foreach ($grupos as $grupo){?>
																	<option value="<?=$grupo->id_grupo?>">
																	<?= $grupo->descripcion." (".$grupo->red.")" ?>
																	</option>
																<?}?>
																</select>
															</label>
													</section>
													<section class="col col-2">
														<label class="input"><span id="labelextra">Descuento de la membresía</span>
														<input required id="precio_promo" type="number" min="0" name="descuento">
														</label>
													</section>
													<div>
														<section style="padding-left: 0px;" class="col col-6">Descripcion
															<textarea name="descripcion" style="max-width: 96%" id="mymarkdown"></textarea>
														</section>
														
														<section id="imagenes" class="col col-6">
														<label class="label">Imágen</label>
														<div class="input input-file">
															<span class="button">
																<input id="img" name="img" onchange="this.parentNode.nextSibling.value = this.value" type="file" multiple>Buscar</span><input id="imagen_mr" placeholder="Agregar alguna imágen" type="text" required>
															</div>
															<small>Para cargar múltiples archivos, presione la tecla ctrl y sin soltar selecione sus archivos.<br /><cite title="Source Title">Para ver los archivos que va a cargar, deje el puntero sobre el boton de "Buscar"</cite></small>
														</section>
													</div>
														
												</fieldset>
												<fieldset id="moneda_field">
													<legend>Moneda y país</legend>
													<section class="col col-2">
														<label class="input">
														Costo distribuidores
														<input required type="number" min="1" name="costo" id="costo" onchange="calcular_precio_total()" required >
														</label>
													</section>			
													<section class="col col-3">
														<label class="input">
														Puntos comisionables
															<input type="number" min="0" max="" name="puntos_com" id="puntos_com" required>
														</label>
													</section>
													<legend>Impuestos</legend>

													<fieldset>
													<div class="row" id="impuesto_agregar">
														<section class="col col-2">País de la membresía
														<label class="select">
															<select id="pais" required name="pais" onChange="select_pais()">
															<option value="-" selected>-- Seleciona un pais --</option>
															<?foreach ($pais as $key){?>
																<option value="<?=$key->Code?>">
																<?=$key->Name?></option>
															<?}?>
															</select>
														</label>
													</section>
																<section class="col col-2">Requiere especificación
																<div class="inline-group">
																	<label class="radio">
																		<input type="radio" value="1" name="iva" onchange="calcular_precio_total()" >
																		<i></i>con IVA</label>
																		<label class="radio">
																			<input type="radio" value="0" onchange="calcular_precio_total()" name="iva" checked="">
																			<i></i>más IVA</label>
																		</div>
																	</section>
																	<!--<section class="col col-2" id="impuesto">Impuesto
														<label class="select">
															<select name="id_impuesto[]" onclick="calcular_precio_total()">
															
															</select>
															
														</label>-->
														<a style="cursor: pointer;" onclick="add_impuesto()">Agregar impuesto<i class="fa fa-plus"></i></a>
													<!--</section>-->
																	</div>
																	<div class="row">

													<section class="col col-2">
														<label class="input">
															Costo distribuidores con IVA
															<input type="text" min="1" max="" name="distribuidores_iva" id="distribuidores_iva" disabled>
														</label>
													</section>
													</div>
													</fieldset>
												</fieldset>
											</div>
										</div>
									</fieldset>
									<footer>
										<button type="submit" class="btn btn-primary">
											Agregar
										</button>
									</footer>
								</form>
							</div>
						</div>
					</article>
				</div>
			
		</section>
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
var i = 0;
$(document).ready(function() {
	
	$("#mymarkdown").markdown({
		autofocus:false,
		savable:false
	})

	$('#startdate').datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat:"yy-mm-dd",
			changeYear: true,
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#finishdate').datepicker('option', 'minDate', selectedDate);
			}
		});

		$('#finishdate').datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat:"yy-mm-dd",
			changeYear: true,
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#startdate').datepicker('option', 'maxDate', selectedDate);
			}
		});
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

});

function add_impuesto()
{
	var code=	'<div id="'+i+'"><section class="col col-3" id="impuesto">Impuesto'
	+'<label class="select">'
	+'<select name="id_impuesto[]" id="id_impuesto[]" onclick="calcular_precio_total()">'
	+'</select>'
	+'</label>'
	+'<a class="txt-color-red" style="cursor: pointer;" onclick="dell_impuesto('+i+')">Eliminar <i class="fa fa-minus"></i></a>'
	+'</section></div>';
	$("#impuesto_agregar").append(code);
	ImpuestosPais2(i);
	calcular_precio_total();
	i = i + 1
}

function dell_impuesto(id)
{	
	$("#"+id+"").remove();
	calcular_precio_total();
	
}
function ImpuestosPais(){
	var pa = $("#pais").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/mercancia/ImpuestaPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#impuesto option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var impuestos = $('#impuesto');
		      $('#impuesto select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_impuesto']+'">'+datos[i]['descripcion']+' '+datos[i]['porcentaje']+'</option>');
			    
			});
	    	  
	        
	      }
	});
}
function add_proveedor(){

	$.ajax({
		type: "POST",
		url: "formProveedor",
		data: { i : 0 }
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: "Nuevo proveedor",
			buttons: {
				submit: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
					new_proveedor()
					}
				},
					danger: {
					label: "Cancelar",
					className: "btn-danger",
					callback: function() {

						}
				}
			}
		})
	});
}

function new_proveedor()
{
		var ids = new Array( 
			"#nombre",
		 	"#apellido",
		 	"#pais",
		 	"#cp",
		 	"#tipo_proveedor",
		 	"#email",
		 	"#empresa"
		 );
		var mensajes = new Array( 
			"Por favor ingresa tu nombre",
		 	"Por favor ingresa tu apellido",
		 	"Por favor seleciona un pais",
		 	"Por favor ingresa tu código postal",
		 	"Por favor seleciona el tipo de proveedor",
		 	"Por favor ingresa un correo",
		 	"Por favor seleciona una empresa"
		 );
		
		var validacion = valida_vacios(ids,mensajes);
		
		if(validacion)
		{
			
			$.ajax({
				type: "POST",
				url: "/bo/mercancia/new_proveedor",
				data: $('#proveedor').serialize()
			})
			.done(function( msg1) {
				$("#proveedor_select").append(msg1);
					bootbox.dialog({
						message: "El proveedor ha sido creado",
						title: "Atención",
						buttons: {
							success: {
								label: "Ok!",
								className: "btn-success",
								callback: function() {
									
								}
							}
						}
					});
				
			});
		}else{
			$.smallBox({
			      title: "<h1>Atención</h1>",
			      content: "<h3>Por favor reviza que todos los datos estén correctos</h3>",
			      color: "#C46A69",
			      icon : "fa fa-warning fadeInLeft animated",
			      timeout: 4000
			    });
			}

}
function validar_impuesto(){
	var  Impuesto = new Array();
$('select[name="id_impuesto[]"]').each(function() {	
	Impuesto.push($(this).val());
});	
return Impuesto[0];
}
function validar_tipo_iva(porcentaje, tipo, valor){
	var valor_iva=0;
	valor_iva=((valor)*parseFloat(porcentaje))/(100);
if(tipo=="1"){
	precio_con_iva=valor/*-valor_iva*/;
	return precio_con_iva;
}
if(tipo=="0"){
	precio_con_iva=parseFloat(valor)+valor_iva;
	return precio_con_iva;
}
}


function calcular_dependiendo_tipo_iva(tipo,valor){
		var  Impuesto=validar_impuesto();
		var resultado=0;
		var porcentaje=0;
		var recibir="";
		var precio_con_iva=0;
	if( ( typeof(Impuesto) != "undefined" && typeof(valor) != "undefined" && typeof(tipo) != "undefined") && (Impuesto != "" && valor!="" && tipo!="") && (Impuesto!=null && tipo!=null && valor!=null)){	
	$.ajax({
		async: false,
		type: "POST",
		url: "/bo/mercancia/ImpuestoPaisPorId",
		data: {impuesto: Impuesto}
	})
	.done(function( msg )
	{
		recibir=$.parseJSON(msg);
		porcentaje=recibir[0]["porcentaje"];
	});
resultado=validar_tipo_iva(porcentaje,tipo,valor);
return resultado;
}else{
	return "Falta algun dato";
}
}
function calcular_iva_real_radio(resultado){
	var tipo_iva=$("input:radio[name=iva]:checked").val();
	var valor_real=$("#real").val();
	var valor_distribuidor=$("#costo").val();
	var valor_publico=$("#costo_publico").val();
	var Resultado_Final=0;
	    for(i=0;i<resultado.length;i++){
        	if(resultado[i].checked){
        	Resultado_Final= calcular_dependiendo_tipo_iva(resultado[i].value,valor_distribuidor);
        	$("#distribuidores_iva").val(Resultado_Final);
        }
	    }

}

function Resultado_ConSin_iva(id_dato,id_modificar){
var tipo_iva = $("input:radio[name=iva]:checked").val();
var valor=$("#"+id_dato).val();
Resultado_Final= calcular_dependiendo_tipo_iva(tipo_iva,valor);
$("#"+id_modificar).val(Resultado_Final);
}

function ImpuestosPais2(id){
	var pa = $("#pais").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/mercancia/ImpuestaPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#'+id+' option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var impuestos = $('#'+id);
		      $('#'+id+' select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_impuesto']+'">'+datos[i]['descripcion']+' '+datos[i]['porcentaje']+'</option>');
			    
			});  
	      }
	});
	calcular_precio_total();
}
function validar_impuesto(){
	var  Impuesto = new Array();
$('select[name="id_impuesto[]"]').each(function() {	
	Impuesto.push($(this).val());
});	
return Impuesto;
}
function validar_tipo_iva(porcentaje, tipo, valor){
	var valor_iva=0;
	valor_iva=((valor)*parseFloat(porcentaje))/(100);
if(tipo=="1"){
	precio_con_iva=valor/*-valor_iva*/;
	return precio_con_iva;
}
if(tipo=="0"){
	precio_con_iva=parseFloat(valor)+valor_iva;
	return precio_con_iva;
}
}


function calcular_porcentaje_total(){
		var  Impuesto=validar_impuesto();
		var resultado=0;
		var porcentaje=0;
		if(Impuesto){
		for(i=0;i<Impuesto.length;i++){
	
	$.ajax({
		async: false,
		type: "POST",
		url: "/bo/mercancia/ImpuestoPaisPorId",
		data: {impuesto: Impuesto[i]}
	})
	.done(function( msg )
	{
		recibir=$.parseJSON(msg);
		porcentaje+=parseInt(recibir[0]["porcentaje"]);
	});
}

return porcentaje;
}else{
	return false;
}
}
function calcular_precio_total(){
var tipo_iva=$("input:radio[name=iva]:checked").val();
var porcentaje=calcular_porcentaje_total();
var Resultado_Final=0;
	var valor_distribuidor=$("#costo").val();
	var validar_distribuidor=validar_campos_vacios(valor_distribuidor);
	if(porcentaje!=false || porcentaje==0){
	if(validar_distribuidor==true){
	Resultado_Final=validar_tipo_iva(porcentaje, tipo_iva, valor_distribuidor);
	$("#distribuidores_iva").val(Resultado_Final);
						}
			else{$("#distribuidores_iva").val("falta algun dato");}
	}else{

		$("#distribuidores_iva").val("falta un dato");

	}
}
function validar_campos_vacios(campo){
if(campo=="undefined"){
return false;
}
if(campo==null){
return false;
}
if(campo==""){
return false;
}
return true;
}
function select_pais(){
calcular_precio_total();
ImpuestosPais();	
}

</script>
