	<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/configuracion/">Configuración</a> > 
								<a href="/bo/configuracion/compensacion/">Plan de compensacion</a> >
								<a href="/bo/titulos/">Títulos</a>
								> Nuevo Título
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
		<form id="titulos" method="POST" role="form">
			<legend>Nuevo Titulo</legend><br>
			<label style="margin: 1rem;" class="input">(↕) Orden
				<input id="orden" type="number" class="form-control" name="orden" min="0" placeholder=""class="form-control" required style="width:200px; height:30px;"/>
			</label><br>
			<label style="margin: 1rem;" class="input"><i class="icon-prepend fa fa-check-circle-o"></i>
				<input id='nombre' class="form-control" name="nombre" style="width:200px; height:30px;" placeholder="Nombre" type="text" required>
	        </label>
			<label style="margin: 1rem;">
				<textarea id='descripcion' class="form-control" name="descripcion" size="20" cols="20" rows="10" placeholder="Descripción" type="text" required></textarea>
	        </label>
	        		<h4>Frecuencia</h4>
			        <label class="radio">
						<input value="SIN" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Sin Fecuencia</label>
					<label class="radio">
						<input checked="" value="MES" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Mensual</label>
					<label class="radio">
						<input value="QUI" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Quincenal</label>					
					<label class="radio">
						<input value="SEM" name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Semanal</label>
		<br>
		<p>Nota: Frecuencia con la que se cobra toman el tipo de Título.</p><br>
			<label class="select">Tipo
				<select name="tipo" style="width:200px; height:30px;">
					<option value='PUNTOSP'>Puntos Personales</option>
					<option value='PUNTOSR'>Puntos Red</option>
					<option value='VENTASP'>Compras Personales</option>
					<option value='VENTASR'>Ventas Red</option>
				</select>
			</label><br>
			<label  class="select">Condicion Red
			<select id="condicion_red_afilacion" name="condicion_red_afilacion" style="width:200px; height:30px;">
				<option value='EQU'>Equilibrada</option>
				<option value='DEB'>Pata Débil</option>
			</select>
			<p>Nota: Seleccionan todas las patas de la red (Equilibrada) o solo la pata mas débil (Débil) para cumplir la condición.</p><br>
			</label>
			<label for="" class="input">(%) Porcentaje
				<input id="porcentaje" type="number" class="form-control" name="porcentaje" min="0" max="100" step="0.1" placeholder=""class="form-control" required style="width:200px; height:30px;"/>
			</label><br>
			<label for="" class="input">(#) Valor a Alcanzar
				<input id="valor" type="number" class="form-control" name="valor" min="0"  step="0.1" placeholder=""class="form-control" required style="width:200px; height:30px;"/>
			</label><br><br><br>
			<label for="" class="input">($) Ganancias
				<input id="ganancia" type="number" class="form-control" name="ganancia" min="0"  step="0.1" placeholder=""class="form-control" required style="width:200px; height:30px;"/>
			</label><br>
			<button style="margin: 1rem;margin-bottom: 4rem;" type="input" class="btn btn-success">Crear</button>
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

<script type="text/javascript">
var i=0;

$( "#titulos" ).submit(function( event ) {
	event.preventDefault();
	enviar();
});

function enviar() {

		iniciarSpinner();
			$.ajax({
						type: "POST",
						url: "/bo/titulos/ingresar_Titulo",
						data: $('#titulos').serialize()
						})
						.done(function( msg ) {
							
						bootbox.dialog({
						message: "Se ha creado el Titulo."+msg,
						title: 'Felicitaciones',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								location.href="/bo/titulos/listar";
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
			
