<?php 
	$rangos="";
	foreach($rangosActivos as $categoria){
		$rangos=$rangos."<option value=\'".$categoria->id_rango."\'>".$categoria->nombre_rango."</option>";
	}
?>
		
			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
								> <a href="/bo/configuracion/"> Configuración</a> 
								> <a href="/bo/configuracion/compensacion"> Plan de compensación</a> 
								> <a href="/bo/bonos"> Bonos</a>
								> Alta
							</span>
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
			<div>
			<div class="widget-body">
			<form id="bonos" action="/bo/bonos/nuevo_bono" method="POST" role="form">
			<legend>Nuevo Bono</legend><br>
			
			<label style="margin: 1rem;" class="input"><i class="icon-prepend fa fa-check-circle-o"></i>
				<input id="nombre" class="form-control" name="nombre" style="width:200px; height:30px;" placeholder="Nombre" required="" type="text">
	        </label>
			<label style="margin: 1rem;">
				<textarea id="mymarkdown" name="descripcion" class="form-control" name="desc" size="20" cols="20" rows="10" placeholder="Descripción" type="text" required=""></textarea>
	        </label>
		<div style="margin: 1rem;">
		<h4>Frecuencia</h4>
			        <label class="radio">
						<input value="SIN" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Sin Fecuencia</label>
	        		<label class="radio">
						<input value="UNI" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Unica</label>
					<label class="radio">
						<input value="ANO" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Anual</label>
					<label class="radio">
						<input checked="" value="MES" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Mensual</label>
					<label class="radio">
						<input value="QUI" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Quincenal</label>					
					<label class="radio">
						<input value="SEM" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Semanal</label>
					<label class="radio">
						<input value="DIA" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Diario</label>
		<br>
		<p>Nota: Frecuencia con la que se cobra el bono.</p><br>
		<br>
		<b>Remanente</b>
		<label class="toggle" style="width: 4rem;">
			<input name="plan" type="checkbox">
			<i data-swchon-text="SI" data-swchoff-text="NO"></i>
		</label>
		<br><br>
		<p>Nota: El remanente guarda un historial de la resta de la pata mas debil con la pata mas fuerte y guarda el resultado para el proximo corte.</p>
		</div>
		<div class="form-group" style="width: 100rem;">
	        <div class="row" id="cross_tipo_rango">
									<header>Condiciones</header><br><br>
									<div class="row">
										<div class="col col-lg-3 col-xs-2">
										</div>																	
									</div>

									<div class="row" id="rango">
									<div class="row">
										<div class="col col-lg-3 col-xs-2">
										</div>
										<div class="col col-lg-2 col-xs-2">
											<a style="cursor: pointer;" onclick="add_rango()"> Agregar Condicion <i class="fa fa-plus"></i></a>
										</div>
										
									</div>
									<div class="row">
										<div class="col col-lg-2">
										</div>
										<div class="col col-xs-12 col-sm-12 col-lg-10" id="tipo_condicion">
											<label class="select">Nombre Condicion
											<select style="max-width: 20rem;" name="id_rango[]" onChange="set_rango($(this).val(),'rango0');" >
											<option value='0' selected>--- Seleccione Rango ---</option>
													<?php	
														foreach($rangosActivos as $categoria){
															echo "<option value='".$categoria->id_rango."'>".$categoria->nombre_rango."</option>";
														}
													?>
											</select>
											</label>
											<div id="rango0" style="margin: 1rem;">
	        								</div>
										</div>
										<div class="col col-xs-12 col-sm-5 col-lg-3">
										</div>
									</div>
								</div>
								<br>
								<fieldset style="margin: 2rem;">
								<legend>
									Intervalos de Tiempo
								</legend>
									<div class="row">
										<div class="col-sm-12 col-md-2 col-lg-2">
											<div class="form-group">
												<label>Meses de Afiliacion</label>
												<input class="form-control spinner-both"  id="mesDesdeAfiliacion" name="mesDesdeAfiliacion" value="0">
											</div>
										</div>
										<div class="col-sm-12 col-md-2 col-lg-2">
										</div>
										<div class="col-sm-12 col-md-2 col-lg-2">
											<div class="form-group">
												<label>Meses Activo</label>
												<input class="form-control spinner-both"  id="mesDesdeActivacion" name="mesDesdeActivacion" value="0">
											</div>
										</div>
									</div>
								</fieldset>
								<br>
								<p>Nota: Intervalo de tiempo desde que el afiliado esta afiliado en la red.</p>
								<br>
								<label style="margin: 1rem;"><h2>Fecha de Activacion</h2></label>
								<div style="margin: 1rem;">
									<section class="col col-2">
										<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
											<input required id="inicio" value="" type="text" name="inicio" placeholder="Fecha de Inicio">
										</label>
									</section>
									<section class="col col-2">
										<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
											<input required id="fin" value="" type="text" name="fin" placeholder="Fecha de Fin">
										</label>
									</section><br><br><br>
								<h4></h4>
								
								<header>Bonos Por Nivel</header><br><br>
									<div class="row">
										<div class="col col-lg-3 col-xs-2">
										</div>																	
									</div>

									<div class="row" id="niveles">
									<div class="row">
										<div class="col col-lg-2 col-xs-2">
										</div>
										<div class="col col-lg-2 col-xs-2">
											<a style="cursor: pointer;" onclick="add_nivel()"> Agregar Nivel <i class="fa fa-plus"></i></a>
											<a style="cursor: pointer;" onclick="reload_niveles()">&nbsp&nbsp&nbsp<i style="font-size: 2rem;color: #60A917 !important;" class="fa fa-refresh"></i></a>
										</div>
										
									</div>
									<div class="row">
										<div class="col col-lg-1">
										</div>
										
										<div class="col col-lg-2">
										<span style="margin: 2rem;">Afiliado</span>
		        							<label style="margin: 0.2rem;" class="input"><i class="icon-prepend fa fa-sitemap"></i>
												<input class="form-control" style="width:200px; height:30px;" name="id_niveles_bonos[]" size="20" value="0" required type="number" readonly>
											</label>
										</div>
										<div class="col col-lg-1">
										</div>
										<div class="col col-xs-12 col-sm-6 col-lg-2" id="v_condicion">
											<label class="select">Forma de Repartir
											<select name="verticalidad_red[]">
												<option value="ASC">$ Hacia Arriba</option>
												<option value="DESC">$ Hacia Abajo</option>
												<option value="PASC">%(Puntos) Hacia Arriba</option>
												<option value="RDESC">%(Puntos)Residual Abajo</option>
											</select>
											</label>
										</div>
										<div class="col col-xs-12 col-sm-6 col-lg-2" id="tipo_condicion">
											<label class="select">Condición Red
											<select name="condicion_red[]">
												<option value="RED">Toda La red</option>
												<option value="DIRECTOS">Directos Afiliado</option>
											</select>
											</label>
										</div>
										<div class="col col-lg-2">
		        							<label style="margin: 2rem;" class="input"><i class="icon-prepend fa fa-money"></i>
												<input class="form-control" style="width:200px; height:30px;" name="valor[]" size="20" placeholder="Valor del Bono" required type="number" step="any">
											</label>
										</div>
									</div>

								<div id="niveles">
								</div>
								</div>
								<br>
								<button style="margin: 1rem;margin-bottom: 4rem;" type="input" class="btn btn-success">Crear</button>
								<br>
								<p style="margin: 1.5rem;">Nota:
									<br><b>Forma de Repartir Comisión :</b> 
										<br>&nbsp&nbsp-($ Hacia Arriba) Monto en $ que se reparte del afiliado hacia arriba de su red.
										<br>&nbsp&nbsp-($ Hacia Abajo) Monto en $ que se reparte del afiliado hacia abajo de su red.
										<br>&nbsp&nbsp-(% Puntos Hacia Arriba) Se toma el porcentaje de los puntos totales que se va a entragar.
										<br>&nbsp&nbsp-(% Puntos Residual Abajo) Bono a la medida que reparte dividiendo el total de puntos comisionables dividiendo el numero de igualaciones de la red.
									<br><b>Condición Red:</b> 
										<br>&nbsp&nbsp-(Directos Afiliados) Selecciona solo los directos del afiliado.
										<br>&nbsp&nbsp-(Toda la Red) Selecciona todos los afiliados de la red Directos e Indirectos.
								</p>
		
    	</div>
    </div>
    </form>
	</div>
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
				<div>         
			        <!-- a blank row to get started -->
			        <div class="col-sm-12">
			            <br />
			            <br />
			        </div>
		        </div>
			</div>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>   
<script src="/template/js/plugin/markdown/markdown.min.js"></script>
<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script> 	
<script src="/template/js/spin.js"></script>


		
			<!-- END MAIN CONTENT -->
<script type="text/javascript">
$(document).ready(function() {

	pageSetUp();

	$("#mesDesdeAfiliacion").spinner({
	    min: 0,
	    max: 36,
	    step: 1,
	    start: 1000,
	    numberFormat: "C"
	});

	$("#mesDesdeActivacion").spinner({
	    min: 0,
	    max: 36,
	    step: 1,
	    start: 1000,
	    numberFormat: "C"
	});
	
});

$("#mymarkdown").markdown({
	autofocus:false,
	savable:false
})


$(function()
		 {
	$('#inicio').datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		changeYear: true,
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {
			$('#fin').datepicker('option', 'minDate', selectedDate);
		}
	});

	$('#fin').datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		changeYear: true,
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {
			$('#inicio').datepicker('option', 'maxDate', selectedDate);
		}
	});
		});

var i=1;
var j=1;

$( "#bonos" ).submit(function( event ) {
	event.preventDefault();
	if(validarRedes())
		enviar();
});

function validarRedes(){
	if ( $("#divRedes")[0] ) {
		return true;
		}
	alert("Seleccione Algun Rango");
	return false;
}

function enviar() {
	iniciarSpinner();
	$.ajax({
						type: "POST",
						url: "/bo/bonos/ingresar_bono",
						data: $('#bonos').serialize()
						})
						.done(function( msg ) {

							bootbox.dialog({
						message: "Se ha creado el Bono."+msg,
						title: 'Felicitaciones',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								
								location.href="/bo/bonos/listar";
								FinalizarSpinner();
								}
							}
						}
					})
					
						});//fin Done ajax
	
}

function add_rango()
{
	var code=	'<div id="'+i+'" class="row">'
	+'<div class="col col-lg-2">'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-12 col-lg-10">'
		+'<label class="select">Nombre Condicion'
		+'<select style="max-width: 20rem;" name="id_rango[]" onChange="set_rango($(this).val(),\'rango'+i+'\');">'
		+'<option value="0">--- Seleccione Rango ---</option>'
		+'<?php	echo $rangos; ?>'
	+'</select>'
	+'</label>'
	+'<div id="rango'+i+'" style="margin: 1rem;">'
	+'</div>'
	+'<a style="cursor: pointer;color: red;" onclick="delete_rango('+i+')">Eliminar Rango <i class="fa fa-minus"></i></a>'
	+'</div>'
	+'</div>';
	$("#rango").append(code);
	i = i + 1
}

function add_nivel()
{
	var code=	'<div id="nivel'+j+'" class="row"><br>'
	+'<div class="col col-lg-1">'
	+'</div>'
	+'<div class="col col-lg-2">'
	+'<span style="margin: 2rem;">Siguiente Nivel</span>'
		+'<label style="margin: 0.2rem;" class="input"><i class="icon-prepend fa fa-sitemap"></i>'
		+'<input class="form-control" style="width:200px; height:30px;" name="id_niveles_bonos[]" size="20" value="'+j+'" required="" type="number" min="1" >'
		+'</label>'
	+' </div>'
	+'<div class="col col-lg-1">'
	+' </div>'
	+'<div class="col col-xs-12 col-sm-6 col-lg-2" id="v_condicion">'
	+'<label class="select">Forma de Repartir'
		+'<select name="verticalidad_red[]">'
			+'<option value="ASC">$ Hacia Arriba</option>'
			+'<option value="DESC">$ Hacia Abajo</option>'
			+'<option value="PASC">%(Puntos) Hacia Arriba</option>'
			+'<option value="RDESC">%(Puntos)Residual Abajo</option>'
		+'</select>'
	+'</label>'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-6 col-lg-2" id="tipo_condicion">'
	+'<label class="select">Condición Red'
		+'<select name="condicion_red[]">'
			+'<option value="RED">Toda La red</option>'
			+'<option value="DIRECTOS">Directos Afiliado</option>'
		+'</select>'
	+'</label>'
	+'</div>'
	+'<div class="col col-lg-2">'
	+'	<label class="input" style="margin: 2rem;"><i class="icon-prepend fa fa-money"></i>'
	+'		<input class="form-control" style="width:200px; height:30px;" name="valor[]" size="20" placeholder="Valor del Bono" required="" type="number" step="any">'
	+'	</label>'
	+'<a style="cursor: pointer;color: red;" onclick="delete_nivel('+j+')">Eliminar Nivel <i class="fa fa-minus"></i></a>'
	+'</div>'
	+'</div>';
	$("#niveles").append(code);
	j = j + 1;
}

function delete_rango(id)
{	
	$("#"+id+"").remove();
	
}

function delete_nivel(id)
{	
	$("#nivel"+id+"").remove();
}

function reload_niveles(){
var code='<div class="row">'
	+'<div class="col col-lg-2 col-xs-2">'
	+'</div>'
	+'<div class="col col-lg-2 col-xs-2">'
	+'<a style="cursor: pointer;" onclick="add_nivel()"> Agregar Nivel <i class="fa fa-plus"></i></a>'
	+'<a style="cursor: pointer;" onclick="reload_niveles()">&nbsp&nbsp&nbsp<i style="font-size: 2rem;color: #60A917 !important;" class="fa fa-refresh"></i></a>'
	+'</div>'
	+'</div>'
	+'<div class="row">'
	+'<div class="col col-lg-1">'
	+'</div>'
	+'<div class="col col-lg-2">'
	+'<span style="margin: 2rem;">Afiliado</span>'
	+'<label style="margin: 0.2rem;" class="input"><i class="icon-prepend fa fa-sitemap"></i>'
	+'<input class="form-control" style="width:200px; height:30px;" name="id_niveles_bonos[]" size="20" value="0" required="" type="number" readonly>'
	+'</label>'
	+'</div>'
	+'<div class="col col-lg-1">'
	+' </div>'
	+'<div class="col col-xs-12 col-sm-6 col-lg-2" id="v_condicion">'
	+'<label class="select">Forma de Repartir'
		+'<select name="verticalidad_red[]">'
			+'<option value="ASC">$ Hacia Arriba</option>'
			+'<option value="DESC">$ Hacia Abajo</option>'
			+'<option value="PASC">%(Puntos) Hacia Arriba</option>'
			+'<option value="RDESC">%(Puntos)Residual Abajo</option>'
		+'</select>'
	+'</label>'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-6 col-lg-2" id="tipo_condicion">'
	+'<label class="select">Condición Red'
		+'<select name="condicion_red[]">'
			+'<option value="RED">Toda La red</option>'
			+'<option value="DIRECTOS">Directos Afiliado</option>'
		+'</select>'
	+'</label>'
	+'</div>'
	+'<div class="col col-lg-2">'
	+'<label style="margin: 2rem;" class="input"><i class="icon-prepend fa fa-money"></i>'
	+'<input class="form-control" style="width:200px; height:30px;" name="valor[]" size="20" placeholder="Valor del Bono" required="" type="number" step="any">'
	+'</label>'
	+'</div>'
	+'</div>'
	+'<div id="niveles">'
	+'</div>'
	+'</div>';
$("#niveles").html(code);
j=1;
}

function set_rango(idRango,idDivRango)
{	
	$.ajax({
		type: "POST",
		url: "/bo/bonos/set_Rango",
		data: {idRango : idRango}
		})
		.done(function( msg ) {
			$('#'+idDivRango+'').html(msg);
		});
}

function cargar_niveles_red(idRed,idDivRango,idRangoDiv)
{	
	$.ajax({
		type: "POST",
		url: "/bo/bonos/set_Frontalidad_Profundidad_Red",
		data: {idRed : idRed,idRangoDiv: idRangoDiv}
		})
		.done(function( msg ) {
			$('#'+idDivRango+'').html(msg);
		});
}

function cargar_mercancia_red(idRed,idDivRango,idRangoDiv)
{	
	$.ajax({
		type: "POST",
		url: "/bo/bonos/set_tipos_mercancia",
		data: {idRed : idRed,idRangoDiv: idRangoDiv}
		})
		.done(function( msg ) {
			$('#'+idDivRango+'').html(msg);
		});
}

function set_mercancia(idTipoMercancia,idDivRango,idRedes,idRangoDiv)
{	

	$.ajax({
		type: "POST",
		url: "/bo/bonos/set_mercancia",
		data: {idTipoMercancia : idTipoMercancia,
			   idRedes: idRedes,idRangoDiv:idRangoDiv}
		})
		.done(function( msg ) {
			$('#'+idDivRango+'').html(msg);
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
		
