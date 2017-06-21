
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> <span>>
					<a href="/bo/configuracion/"> Configuracion </a> >
					<a href="/bo/configuracion/comisiones"> Comisiones </a> > Configurar 
					
				</span>
			</h1>
		</div>
	</div>
	<?php if (!isset($configuracion[0]->valor)) { ?>
		<div class="alert alert-danger fade in">
			<button class="close" data-dismiss="alert">
				×
			</button>
			<i class="fa-fw fa fa-check"></i>
			<strong>Error </strong> La red No tiene configurada las comisiones
			</div>
	<?php } ?>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
							<form class="smart-form"
								action="/bo/comisiones/actualizar_comisiones" method="POST"
								role="form" id="comision">
								<input type="text" name="categoria" value="<?php echo $_GET['id']; ?>" class="hide">
								<header> Red <?php echo $categoria[0]->id.". ".$categoria[0]->nombre; ?> </header>
								<?php if (isset($configuracion[0]->valor)) { ?>
								<div class="col col-xs-12 col-sm-6 col-md-4 col-lg-2">
									<fieldset>
										
										<section>
										<?php 
											$config = count($configuracion);
											$limite = $profundidad-1;
											
											
											for ($i = 0; $i < $limite ; $i++ ) { 
												
											if ($config <= $i){ ?>
												<label class="label"> Nivel <?php echo $i+1; ?> <p class="text-danger">(Nuevo)</p></label>
												<label class="input-group"> 
													<input name="configuracion[]" type="number" step="0.01" value="0.0" required class="form-control" step="any">
													<span class="input-group-addon">%</span>
												</label>
											<?php } else{ ?>
												<label class="label">Nivel <?php echo $configuracion[$i]->profundidad; ?></label> 
												<label class="input-group"> 
													<input name="configuracion[]" type="number" step="0.01" value="<?php echo $configuracion[$i]->valor; ?>" class="form-control" required>
													<span class="input-group-addon">%</span>
												</label>
											<?php  }
												}
											?>
										</section>

									</fieldset>
								</div>
								<?php } else { ?>
									<div class="col col-xs-12 col-sm-6 col-md-4 col-lg-2">
										<fieldset>
											
											<section>
											<?php for ($i = 1; $i < $profundidad ; $i++) { ?>
												<label class="label">Nivel <?php echo $i; ?> <p class="text-danger">(Nuevo)</p></label> 
													<label class="input-group"> 
														<span class="input-group-addon">%</span>
														<input name="configuracion[]" type="number" step="0.01" class="form-control" required>
												</label>
											<?php } ?>
											</section>
										</fieldset>
									</div>
								<?php  }?>
								
								<fieldset class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<input type="submit" class="btn btn-success" value="Actualizar Comision">
								</fieldset>
							</form>
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
		<div class="col-md-4">
			<br /> <br />
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">

$( "#comision" ).submit(function( event ) {
	event.preventDefault();
	iniciarSpinner();
	enviar();
});

function enviar(){
	$.ajax({
		type: "POST",
		url: "/bo/comisiones/actualizar_comisiones",
		data: $('#comision').serialize()
	}).done(function( msg ) {				
		bootbox.dialog({
			message: msg,
			title: 'ATENCION',
			buttons: {
				success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {
							location.href="";
							FinalizarSpinner();
					}
				}
			}
		})
	});//fin Done ajax
}

</script>
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
