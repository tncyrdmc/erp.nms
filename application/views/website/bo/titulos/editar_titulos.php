<div id="spinner-div"></div>
<form id="nueva" name="nueva" class="smart-form" action="/bo/titulos/actualizar_titulos" method="POST"  >
	<fieldset>
		<div>
			<label style="margin: 1rem;display:none;" class="input">
				<input id="id" type="number" value="<?php echo $titulos[0]->id; ?>" class="form-control" name="id" min="0" placeholder=""class="form-control" required style="width:200px; height:30px;"/>
			</label><br>
			<label style="margin: 1rem;" class="input">(↕) Orden
				<input id="orden" type="number" value="<?php echo $titulos[0]->orden; ?>" class="form-control" name="orden" min="0" placeholder=""class="form-control" required style="width:200px; height:30px;"/>
			</label><br>
			<label style="margin: 1rem;" class="input"><i class="icon-prepend fa fa-check-circle-o"></i>
				<input id='nombre' class="form-control" value="<?php echo $titulos[0]->nombre; ?>" name="nombre" style="width:200px; height:30px;" placeholder="Nombre" type="text" required>
	        </label>
			<label style="margin: 1rem;">
				<textarea id='descripcion' class="form-control" name="descripcion" size="20" cols="20" rows="10" placeholder="Descripción" type="text" required><?php echo $titulos[0]->descripcion; ?></textarea>
	        </label>
	        		<h4>Frecuencia</h4>
			        <label class="radio">
						<input value="SIN" <?php if($titulos[0]->frecuencia == 'SIN') echo 'checked=""';?> name="frecuencia" placeholder="frecuencia"  type="radio">
					<i></i>Sin Fecuencia</label>
					<label class="radio">
						<input value="MES" <?php if($titulos[0]->frecuencia == 'MES') echo 'checked=""';?> name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Mensual</label>
					<label class="radio">
						<input value="QUI" <?php if($titulos[0]->frecuencia == 'QUI') echo 'checked=""';?> name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Quincenal</label>					
					<label class="radio">
						<input value="SEM" <?php if($titulos[0]->frecuencia == 'SEM') echo 'checked=""';?> name="frecuencia" placeholder="frecuencia" type="radio">
					<i></i>Semanal</label>
		<br>
		<p>Nota: Frecuencia con la que se cobra toman el tipo de Título.</p><br>
			<label class="select">Tipo
				<select name="tipo" style="width:200px; height:30px;">
					<option value='PUNTOSP' <?php if($titulos[0]->tipo == 'PUNTOSP') echo 'selected=""';?>>Puntos Personales</option>
					<option value='PUNTOSR' <?php if($titulos[0]->tipo == 'PUNTOSR') echo 'selected=""';?>>Puntos Red</option>
					<option value='VENTASP' <?php if($titulos[0]->tipo == 'VENTASP') echo 'selected=""';?>>Compras Personales</option>
					<option value='VENTASR' <?php if($titulos[0]->tipo == 'VENTASR') echo 'selected=""';?>>Ventas Red</option>
				</select>
			</label><br>
			<label  class="select">Condicion Red
			<select id="condicion_red_afilacion" name="condicion_red_afilacion" style="width:200px; height:30px;">
				<option value='EQU' <?php if($titulos[0]->condicion_red_afilacion == 'EQU') echo 'selected=""';?>>Equilibrada</option>
				<option value='DEB' <?php if($titulos[0]->condicion_red_afilacion == 'DEB') echo 'selected=""';?>>Pata Débil</option>
			</select>
			<p>Nota: Seleccionan todas las patas de la red (Equilibrada) o solo la pata mas débil (Débil) para cumplir la condición.</p><br>
			</label>
			<label for="" class="input">(%) Porcentaje
				<input id="porcentaje" type="number" value="<?php echo $titulos[0]->porcentaje; ?>" class="form-control" name="porcentaje" min="0" max="100" step="0.1" placeholder=""class="form-control" required style="width:200px; height:30px;"/>
			</label><br>
			<label for="" class="input">(#) Valor a Alcanzar
				<input id="valor" type="number" value="<?php echo $titulos[0]->valor; ?>" class="form-control" name="valor" min="0"  step="0.1" placeholder=""class="form-control" required style="width:200px; height:30px;"/>
			</label><br><br><br>
			<label for="" class="input">($) Ganancias
				<input id="ganancia" type="number" value="<?php echo $titulos[0]->ganancia; ?>" class="form-control" name="ganancia" min="0"  step="0.1" placeholder=""class="form-control" required style="width:200px; height:30px;"/>
			</label><br>
			</div>
		</fieldset>
		<footer>
		<button style="margin: 1rem;margin-bottom: 4rem;" type="input" class="btn btn-success">Guardar</button>

								<!--<a class="btn btn-success" onclick="enviar()">
									Guardar
								</a>-->
							</footer>


						</form>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
	$( "#nueva" ).submit(function( event ) {
	event.preventDefault();
	enviar();
});

function enviar() {

	setiniciarSpinner();
	 $.ajax({
							type: "POST",
							url: "/bo/titulos/actualizar_titulos",
							data: $('#nueva').serialize()
						})
						.done(function( msg ) {
							FinalizarSpinner();
									bootbox.dialog({
										message: msg,
										title: "Atención",
										buttons: {
											success: {
											label: "Ok!",
											className: "btn-success",
											callback: function() {
												location.href="/bo/titulos/listar";
												}
											}
										}
									});
						});//fin Done ajax

}

</script>
