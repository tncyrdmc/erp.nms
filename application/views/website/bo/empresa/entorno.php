
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
			
			
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
							<a href="/bo/configuracion">Configuración</a>
							</span>
							<span>>
							<a href="/bo/configuracion/empresa">Empresa</a>
							</span>
							<span>
							>Actividad Usuario
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
				<div class="jarviswidget" id="wid-id-1"
					data-widget-editbutton="false" data-widget-custombutton="false"
					data-widget-colorbutton="false">
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
						<span class="widget-icon"> <i class="fa fa-wrench "></i> 						
						</span>
						<h2>Configurar Actividad Usuario</h2>
					</header>

					<!-- widget div-->
					<div>
						<form id="form_empresa" method="post" action="/bo/admin/entorno_empresa" role="form" class="smart-form">
					 <fieldset>
						 <legend>Compras obligatorias</legend>
						 <input type="hidden" value="<?=$empresa[0]->id_tributaria;?>" name="id" >
						 <section id="usuario" class="col col-3">
							 <label><h4>Membresia</h4>
								 <input style="margin-left: 4rem;" type="checkbox" name="membresia" <?=$empresa[0]->membresia == 'ACT' ? "checked" : "";?> > 
							 </label>
						 </section>
						 <section id="usuario" class="col col-3">
							 <label ><h4>Paquete</h4>
								 <input style="margin-left: 4rem;" type="checkbox" name="paquete" <?=$empresa[0]->paquete == 'ACT' ? "checked" : "";?>>
							 </label> 
						 </section>
						 <section id="usuario" class="col col-3">
							 <label><h4>Producto / Servicio / Combinado</h4>
								 <input style="margin-left: 4rem;" type="checkbox" name="item" <?=$empresa[0]->item == 'ACT' ? "checked" : "";?> >
							 </label>
						 </section>
					 </fieldset>
					 
					 <fieldset>
						 <legend>Afiliaciones Directas</legend>
						 <label style="margin: 1rem;width: 50rem;" class="select">
							<select id="afiliados_directos" name="afiliados_directos" style="margin: 1rem;width: 10rem;">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
						</label>
					 </fieldset>
					 
					 <fieldset>
						 <legend>Puntos Comisionables personales en el MES</legend>
						 <label style="margin: 1rem;width: 10rem;" for="" class="input">
							<i class="icon-prepend fa fa-sort-numeric-asc"></i>
							<input id="puntos_personales" class="form-control" name="puntos_personales" placeholder="" required="" type="number" value="<?=$empresa[0]->puntos_personales;?>">
						</label>
					 </fieldset>
					 
						<footer>
<button style="margin: 1rem;margin-bottom: 4rem;" type="input" class="btn btn-success">Guardar</button>
							</footer>
				</form>
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
				<br /> <br />
			</div>
		</div>
		<!-- END ROW -->
	</section>
</div>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">

$( "#form_empresa" ).submit(function( event ) {
	event.preventDefault();	
	iniciarSpinner();
	enviar();
});

function enviar()
{
	

					$.ajax({
						type: "POST",
						url: "/bo/admin/entorno_empresa",
						data: $("#form_empresa").serialize()
					})
					.done(function( msg )
					{
						bootbox.dialog({
						message: msg,
						title: 'Empresa',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								location.href="/bo/configuracion/entorno";
								FinalizarSpinner();
							}
						}
					}
				})//fin done ajax

					});//Fin callback bootbox
}

$("#afiliados_directos").val("<?=$empresa[0]->afiliados_directos;?>");

</script>
