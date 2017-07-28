<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">


				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> <span>>
					<a href="/bo/configuracion">Configuración</a>
				</span> <span>> <a href="/bo/configuracion/formaspago">Formas de
						Pago</a>
				</span> <span>> tucompra </span>
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
						<span class="widget-icon"> <i class="fa fa-bookmark"></i>
						</span>
						<h2>tucompra</h2>
					</header>

					<!-- widget div-->
					<div>
						<form id="form_tucompra" method="post"
							action="/bo/configuracion/actualizartucompra" role="form"
							class="smart-form">
							<fieldset>
								<legend>Configuracion tucompra</legend>
								<input type="hidden" value="<?=$tucompra[0]->email;?>" name="id" >
						 <section id="usuario" class="col col-6">
							 <label class="input">Id Sistema Tu Compra
								 <input required type="cuenta" name="cuenta" placeholder="cuenta" value="<?=$tucompra[0]->cuenta;?>" > 
							 </label>
						 </section> 
						 <section id="usuario" class="col col-6">
							 <label class="input">Email Cuenta Tu Compra
								 <input required type="email" name="email" placeholder="Email" value="<?=$tucompra[0]->email;?>" > 
							 </label>
						 </section> 
						 <section id="usuario" class="col col-6">
							 <label class="input">Llave Encripción
								 <input required type="llave" name="llave" placeholder="Key" value="<?=$tucompra[0]->llave;?>" > 
							 </label>
						 </section>
						 <section  class="col col-3">
							 <label class="select">Moneda
							 	<select id="moneda" name="moneda">
									<option value="COP">COP</option>
									<option value="USD">USD</option>
								</select>
							 </label>
							 <div class="note">
								<strong> </strong>
							</div>
						 </section>
								<section id="usuario" class="col col-6">
									<label class="checkbox"> <input name="test"
										<?php if($tucompra[0]->test == '1') echo "checked='checked'";?>
										type="checkbox"> <i></i>Test
									</label>
								</section>
								<section id="usuario" class="col col-6">
									<label class="checkbox"> <input name="estatus"
										<?php if($tucompra[0]->estatus == 'ACT') echo "checked='checked'";?>
										type="checkbox"> <i></i>Mostrar en Carrito de Compras
									</label>
								</section>
							</fieldset>
							<footer>
								<button style="margin: 1rem; margin-bottom: 4rem;" type="input"
									class="btn btn-success">Guardar</button>
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

$( "#form_tucompra" ).submit(function( event ) {
	event.preventDefault();	
	iniciarSpinner();
	enviar();
});



function enviar()
{
	

					$.ajax({
						type: "POST",
						url: "/bo/configuracion/actualizarTucompra",
						data: $("#form_tucompra").serialize()
					})
					.done(function( msg )
					{
						FinalizarSpinner();
						bootbox.dialog({
						message: msg,
						title: 'tucompra',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								location.href="/bo/configuracion/tucompra";
								
							}
						}
					}
				})//fin done ajax

					});//Fin callback bootbox
}


</script>
