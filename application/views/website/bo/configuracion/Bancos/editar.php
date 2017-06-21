<div id="spinner-div"></div>
<section id="widget-grid" class="">
	<!-- START ROW -->
	<div class="row">
		<form id="add-event-form"
			class="smart-form col-sm-10 col-md-10 col-lg-8">
			<input type="hidden" name="id_banco" id="id_banco" value="<?php echo $banco[0]->id_banco; ?>">
			<fieldset>
				<div class="form-group">
					<b>Nombre de Banco</b> <input class="form-control" id="banco"
						name="banco" type="text" placeholder="Nombre del banco" value="<?php echo $banco[0]->descripcion?>">
				</div>
				<br>
				<div class="form-group">
					<label class="label">Pais</label> <label class="select"> 
						<select name="pais" id="pais" required>
							
							<?php foreach ($paices as $pais) {
								if($banco[0]->id_pais == $pais->Code){?>
									<option value="<?php echo $pais->Code; ?>" selected><?php echo $pais->Name; ?></option>
								<?php }else{?>
									<option value="<?php echo $pais->Code; ?>"><?php echo $pais->Name; ?></option>
							<?php } 
							}?>
						</select>
					</label>
				</div>
				<br>
				<div class="form-group">
					<b>N° de Cuenta</b>
					<input class="form-control" id="cuenta"
						name="cuenta" type="number" placeholder="Numero de cuenta"
						onChange="validarSiNumero(this.value);"
						value="<?php echo $banco[0]->cuenta?>">
				</div>
				<br>
				<div class="form-group">
				<!-- ABA/IBAN/OTRO -->	<b>Titular</b> <input class="form-control" id="otro" name="otro"
						type="text"
						value="<?php echo $banco[0]->otro?>">
				</div>
				<br>
				<div class="form-group">
					<b>CLABE</b> <input class="form-control" id="clabe" name="clabe"
						type="number" onChange="validarSiNumero(this.value);"
						value="<?php echo $banco[0]->clave?>">
				</div>
				<br>
				<div class="form-group">
					<b>SWIFT</b> <input class="form-control" id="swift" name="swift"
						type="number"
						value="<?php echo $banco[0]->swift?>">
				</div>				
				<br>
				<div class="form-group">
					<b>Dirección postal</b> <input class="form-control" id="dir_postal" name="dir_postal"
						type="number"
						value="<?php echo $banco[0]->dir_postal?>">
				</div>
				<br>
			</fieldset>

			<button style="margin-left: 3rem;" class="btn btn-success"
				type="submit" id="new_evento" >Actualizar
				Banco</button>
		</form>
	</div>
</section>
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
<script type="text/javascript">
$( "#add-event-form" ).submit(function( event ) {
	event.preventDefault();	
	enviar();
});

function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero)){
      alert("El valor " + numero + " no es un número");
      
    }
  }
function ValidarVacio(banco, pais, cuenta){
	if(banco == ''){
		alert('Campo Nombre de Banco es requerido');
		return false;
	}else if(pais == '0'){
		alert('Seleciona un pais');
		return false;
	}else if(cuenta == ''){
		
		alert('Campo Numero de Cuenta es requerido y debe ser un numero');
		return false;
	}else{
		return true;
	}
	
}

function enviar()
{
	var id_banco = $("#id_banco").val();
	var banco = $("#banco").val();
	var cuenta = $("#cuenta").val();
	var pais = $("#pais").val();
	var clabe = $("#clabe").val();
	var swift = $("#swift").val();
	var otro = $("#otro").val();
	var dir_postal = $("#dir_postal").val();
	
	
	if(ValidarVacio(banco, pais, cuenta)){
		setiniciarSpinner();
		$.ajax({
			 data:{
				 id: id_banco,
				 banco: banco,
				 pais: pais,
				 cuenta: cuenta,
				 clabe: clabe,
				 swift:swift,
				 otro:otro,
				 dir_postal:dir_postal
				},
	         type: "post",
	         url: "actualizar_banco",
	         success: function(msg){
	        	 bootbox.dialog({
						message: msg,
						title: 'Felicitaciones',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								location.href="listar";
								FinalizarSpinner();
								}
							}
						}
					})//fin done ajax
	             
	         }
		});
	}
}

</script>
