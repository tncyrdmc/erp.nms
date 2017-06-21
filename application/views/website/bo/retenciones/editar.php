<div id="spinner-div"></div>
<form id="nueva" action="/bo/configuracion/actualizar_retencion" class="smart-form"  role="form" >
							<fieldset>
								<input type="text" class="hide" value="<?php echo $_POST['id']; ?>" name="id">
								<label class="input"> Nombre
								<input type="text" name="nombre" required placeholder="Nombre" style="width: 50%;" class="form-control" value="<?php echo $retencion[0]->descripcion; ?>" required>
								<label class="input"> Valor
								<input type="number" name="porcentaje" required placeholder="valor" style="width: 50%;" class="form-control" value="<?php echo $retencion[0]->porcentaje; ?>" required>
								<br><div class="inline-group">
										<label class="radio">
											<input <?php if($retencion[0]->duracion == 'UNI') echo 'checked=""';?> 
											value="UNI" name="duracion" placeholder="duracion" type="radio">
										<i></i>Unica</label>
										<label class="radio">
											<input <?php if($retencion[0]->duracion == 'ANO') echo 'checked=""';?> 
											value="ANO" name="duracion" placeholder="duracion" type="radio">
										<i></i>Anual</label>
										<label class="radio">
											<input <?php if($retencion[0]->duracion == 'MES') echo 'checked=""';?>
											value="MES" name="duracion" placeholder="duracion" type="radio">
										<i></i>Mensual</label>
										<label class="radio">
											<input <?php if($retencion[0]->duracion == 'SEM') echo 'checked=""';?> 
											value="SEM" name="duracion" placeholder="duracion" type="radio">
										<i></i>Semanal</label>
										<label class="radio">
											<input <?php if($retencion[0]->duracion == 'DIA') echo 'checked=""';?> 
											value="DIA" name="duracion" placeholder="duracion" type="radio">
										<i></i>Diario</label>
								</div>

							</fieldset>
							<footer>
								<button style="margin: 1rem;margin-bottom: 4rem;" type="input" class="btn btn-success">Guardar</button>
								
							</footer>
						</form>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">

$( "#nueva" ).submit(function( event ) {
	event.preventDefault();
	setiniciarSpinner();
	enviar();
});

function enviar() {
	 $.ajax({
							type: "POST",
							url: "/bo/configuracion/actualizar_retencion",
							data: $('#nueva').serialize()
						})
						.done(function( msg ) {
							
									bootbox.dialog({
										message: msg,
										title: "Atención",
										buttons: {
											success: {
											label: "Ok!",
											className: "btn-success",
											callback: function() {
												location.href="/bo/configuracion/listar_retenciones";
												FinalizarSpinner();
												}
											}
										}
									});
						});//fin Done ajax
		
}
</script>
