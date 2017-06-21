		
			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
							> <a href="/bo/administracion/"> Administración</a> 
							> <a href="/bo/bonos/index_calculo_bonos"> Bonos</a> 
								> Calculo de Bonos
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
			<legend>Calcular Bono</legend><br>
		<div class="form-group" style="width: 100rem;">
	        <div class="row" id="cross_tipo_rango">
									<header>Bonos</header><br><br>
									<div class="row">
										<div class="col col-lg-2">
										</div>
										<div class="col col-xs-12 col-sm-12 col-lg-10" id="tipo_condicion">
											<label class="select">
											<select style="max-width: 20rem;" name="id_bono" >
											<option value='0' selected>--- Seleccione Bono ---</option>
													<?php	
														foreach($bonos as $bono){
															echo "<option value='".$bono->id."'>".$bono->nombre."</option>";
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
									Fecha
								</legend>
								</fieldset>
								<br>
								<div style="margin: 1rem;">
									<section class="col col-3">
										<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
											<input required id="inicio" value="" type="text" name="fecha" placeholder="Fecha de Corte">
										</label>
									</section>
								<br><br>	
								<button style="margin: 1rem;margin-bottom: 4rem;" type="input" class="btn btn-success">Calcular</button>
			
		
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

		});

var i=1;
var j=1;

$( "#bonos" ).submit(function( event ) {
	event.preventDefault();
	enviar();
});

function enviar() {
	iniciarSpinner();
	$.ajax({
						type: "POST",
						url: "/bo/bonos/pagar_bono_calculado",
						data: $('#bonos').serialize()
						})
						.done(function( msg ) {

							bootbox.dialog({
						message: msg,
						title: 'Calculo de Bonos',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								
								location.href="/bo/bonos/historial";
								FinalizarSpinner();
								}
							}
						}
					})
					
						});//fin Done ajax
	
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
		
