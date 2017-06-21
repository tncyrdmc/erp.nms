<div id="spinner-div"></div>
<div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-right: 0px; margin-left: 0px; padding-bottom: 3rem;" class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<form action="/bo/comercial/kill_afiliado"  method="POST" id="edit" role="form" class="smart-form">
			<legend>Por favor, Elija la red en la desea eliminar a este usuario.</legend>

			<br><br>

			<div class="form-group">

				<input type="text" class="hide" name="id" id="id" value = '<?= $id; ?>' >
					<div class="row col-xs-12 col-md-6 col-sm-4 col-lg-12">
					
											
						<section style="width: 50%;" class="col col-2">
							<label class="select" for="">Redes del usuario
							<select name="red" >
								<option value="0">Todas las redes</option>
								<?php foreach ($redes as $red){
									echo '<option value="'.$red->id.'">'.$red->nombre.'</option>' ;
								}?>
							</select></label>
						</section>
						
						
				</div>
			</div>
			<button type="submit" class="btn btn-success pull-right btn-next"  >Eliminar</button>
		</form>
		
	</div>
</div>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>

<script type="text/javascript">

$( "#edit" ).submit(function( event ) {
	event.preventDefault();	
	enviar();
});

function enviar(){	
	$.ajax({
		type: "POST",
		url: "/auth/show_dialog",
		data: {message: '¿ Esta seguro que desea Eliminar el Afiliado ?'},
	})
	.done(function( msg )
	{
		bootbox.dialog({
		message: msg,
		title: 'Eliminar Afiliado',
		buttons: {
			success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
						setiniciarSpinner();
						$.ajax({
							type: "POST",
							url: "/bo/comercial/kill_afiliado",
							data: $('#edit').serialize()
						})
						.done(function( msg )
						{
							bootbox.dialog({
							message: msg,
							title: 'Eliminar Afiliado',
							buttons: {
								success: {
								label: "Aceptar",
								className: "btn-success",
								callback: function() {
										location.href="/bo/comercial/red_tabla";
										FinalizarSpinner();
										}
									}
								}
							})//fin done ajax
						});//Fin callback bootbox

					}
				},
				danger: {
					label: "Cancelar!",
					className: "btn-danger",
					callback: function() {

						}
				}
			}
		})
	});	
}



</script>
<!-- 
select U.id, UP.nombre, UP.apellido, U.username, U.email, CS.descripcion as sexo,
CEC.descripcion as estado_civil, CTU.descripcion as tipo_usuario, CE.descripcion as estudio,
CO.descripcion as ocupacion, CTD.descripcion as tiempo_dedicado, CEA.descripcion

from users U, user_profiles UP, cat_sexo CS, cat_edo_civil CEC, cat_tipo_usuario CTU,
cat_estudios CE, cat_ocupacion CO, cat_tiempo_dedicado CTD, cat_estatus_afiliado CEA
 
where UP.id_sexo = CS.id_sexo and UP.id_edo_civil = CEC.id_edo_civil and UP.id_tipo_usuario = CTU.id_tipo_usuario
and UP.id_estudio = CE.id_estudio and UP.id_ocupacion = CO.id_ocupacion and U.id = UP.user_id 
and UP.id_tiempo_dedicado = CTD.id_tiempo_dedicado and UP.id_estatus = CEA.id_estatus

 group by (U.id);
 -->
