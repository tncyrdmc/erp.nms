<div id="spinner-div"></div>
<form id="form" method="POST" role="form" >
	<input type="hidden" name="item" id="item" value="<?=$item?>">
	<div class="padding-10 text-center">
		<h4>Nuevo Precio o % Descuento:</h4>
	</div>
	<div class="padding-10">
		<label class="col-md-12 input text-center">
		<input type="number" name="descuento"
			id="descuento" min="0" value="0" step="0.01" autocomplete="off">
		</label>
	</div>
	<div class="" style="padding-bottom: 5em">
		<div class="col-md-2"></div>
		<div class="col-md-4">
			[ <input type="radio" name="tipo" id="tipo" value="%"
				checked> Descuento % ]
		</div>
		<div class="col-md-5">
			[ <input type="radio" name="tipo" id="tipo" value="$"
				checked> Nuevo Precio $ ]
		</div>
	</div>
	<div class="padding-10 text-center">
		<input id="enviar" type="submit" class="btn btn-success" value="Procesar" />
	</div>
</form>

<script>

$( "#form" ).submit(function( event ) {
	event.preventDefault();
	setiniciarSpinner();
	enviar();
});		

function enviar(){

	
	$.ajax({
		type: "POST",
		url: "POS/descontar",
		data: $("#form").serialize(),
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: "Se han actualizado los cambios",
			title: "Descuento al Producto",
			buttons: {
				success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
						FinalizarSpinner();
						$('#pedidos').html(msg);
						neto();art();
						$('.modal-footer > .btn-danger').click();
					}
				}
			}
		})//fin done ajax
	});//Fin callback bootbox
	
}


</script>