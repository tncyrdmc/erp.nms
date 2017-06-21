			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/configuracion/">Configuración</a> > 
								<a href="/bo/configuracion/retenciones">Retenciones</a>
								> Nueva Retención
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
<div>
    <fieldset id="pswd">
		<form class="smart-form" action="/bo/admin/new_retencion" method="POST" id="retencion" role="form">
			<legend>Nueva Retención </legend><br>
			<div class="form-group" style="width: 20rem;">
			<label style="margin: 1rem;" class="input"><i class="icon-prepend fa fa-check-circle-o"></i>
				<input id='desc' class="form-control" name="desc" size="20" placeholder="Nombre" type="text" required>
	        </label>
			<label style="margin: 1rem;" class="input"><i class="icon-prepend fa fa-check-circle-o"></i>
				<input id='porc' class="form-control" name="porc" size="20" placeholder="Valor" type="number" required>
	        </label>
	        <div class="">
	        		<label class="radio">
						<input value="UNI" name="duracion" placeholder="duracion" type="radio">
					<i></i>Única</label>
					<label class="radio">
						<input value="ANO" name="duracion" placeholder="duracion" type="radio">
					<i></i>Anual</label>
					<label class="radio">
						<input checked="" value="MES" name="duracion" placeholder="duracion" type="radio">
					<i></i>Mensual</label>
					<label class="radio">
						<input value="SEM" name="duracion" placeholder="duracion" type="radio">
					<i></i>Semanal</label>
					<label class="radio">
						<input value="DIA" name="duracion" placeholder="duracion" type="radio">
					<i></i>Diario</label>
			</div>
			<button style="margin: 1rem;margin-bottom: 4rem;" type="submit" class="btn btn-success">Crear</button>
			</div>
		</form>
    </fieldset>
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
	</section>	
				<div class="row">         
			        <!-- a blank row to get started -->
			        <div class="col-sm-12">
			            <br />
			            <br />
			        </div>
		        </div>
			</div>
			<!-- END MAIN CONTENT -->
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
$( "#retencion" ).submit(function( event ) {
	event.preventDefault();
	iniciarSpinner();
	enviar();
});

function enviar(){
	$.ajax({
		type: "POST",
		url: "/bo/admin/new_retencion",
		data: $('#retencion').serialize()
	}).done(function( msg ) {				
		bootbox.dialog({
			message: msg,
			title: 'ATENCION',
			buttons: {
				success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {
							location.href="/bo/configuracion/listar_retenciones";
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
			
