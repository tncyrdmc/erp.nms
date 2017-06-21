<!-- <h3 align="center">
	<strong>Forma de Pago<br/>"Contado"</strong>
</h3>-->
<div class="col-md-6">
<h4 align="center" class="text-info">Cobro</h4>
<p align="center" class="text-info">	
	<b>Neto</b> : $ <?=number_format($valor,2);?>
	<br/>
	<b>IVA</b> : $ <?=number_format($iva,2);?>
</p>
</div>
<div class="col-md-6">
<pre class="text-center" style="font-size: 30px"><strong>Total</strong>
<br/>$ <?=number_format($total,2);?>
</pre>
</div>
<br/>
<div class="col-md-12 col-xs-6 text-center" style="font-size: 20px">
Puntos : <strong><?=$puntos;?></strong>
</div>
<hr class="col-md-12"/>
<div align="center">
	<form id="canjeo" class="smart-form" method="POST" role="form" action="POS/facturar">
		<!-- <section class="col-md-3"></section>
		<section class="col-md-6">
			<label>Cliente Registrado</label>
			<label class="select">
				<select id="user" required name="user">
					<option value="">Elije un Cliente</option>
	            <?foreach ($users as $key){?>
					<option value="<?=$key->id?>"><?=$key->nombre." ".$key->apellido." (".$key->red.")"?></option>
				<?}?>
				</select>
			</label>
		</section>
		<section class="col-md-12"></section>-->
		<section class="col-md-3"></section>
		<section class="col-md-6"><label for="ccpago">Dinero Recibido</label> 
			<input type="hidden" name="pago" id="pago" value="<?=$total;?>">
			<input type="hidden" name="desc" id="desc" value="<?=$descuento;?>">
			<input type="hidden" name="iva" id="iva" value="<?=$iva;?>">
			<div class="input-prepend input-append">
				<span class="add-on" style="height: 30px">$</span> 
				<input type="number" name="saldo" min="<?=$total;?>"
					id="saldo" autocomplete="on" step="0.0001" required /> 
				<span class="add-on" style="height: 30px">.00</span>
			</div>
		</section>				
		<br> 
		<?php if($valor>0){?>
		<input type="submit" class="btn btn-success" value="Cobrar Dinero Recibido" />
		<?php } ?>
	</form>
</div>

<script>
/*
$( "#canjeo" ).submit(function( event ) {
	event.preventDefault();
	enviar();
});		

function enviar(){

	$.ajax({
		type: "POST",
		url: "POS/canjear",
		data: $("#canjeo").serialize(),
	})
	.done(function( msg2 )
	{
		bootbox.dialog({
			message: "Se han Realizado la Venta # ".msg2,
			title: "Descuento al Producto",
			buttons: {
				success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {
						FinalizarSpinner();
						location.href='POS/factura?id='.msg2;
					}
				}
			}
		})//fin done ajax
	});//Fin callback bootbox
	
	
}*/


</script>
