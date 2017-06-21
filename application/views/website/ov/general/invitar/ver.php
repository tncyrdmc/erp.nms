<div id="spinner-div"></div>
<div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-right: 0px; margin-left: 0px; padding-bottom: 3rem;" class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<form action="/ov/cgeneral/enviar_invitacion"  method="POST" id="edit" role="form" class="smart-form">

			

			<fieldset>
				<legend>Por favor, Digite Correo Electronico del invitado.</legend>
				<div class="form-group">

				<input type="text" class="hide" name="debajo_de" id="debajo_de" value = '<?= $debajo_de; ?>' >
				<input type="text" class="hide" name="lado" id="lado" value = '<?= $lado; ?>' >
				<input type="text" class="hide" name="red" id="red" value = '<?= $red; ?>' >
					<div class="row col-xs-12 col-md-6 col-sm-4 col-lg-12">
						<section id="correo" class="col col-6">
								<label class="input"><i class="icon-prepend fa fa-envelope-o"></i>
									<input id="email" onkeydown="use_mail()" onmouseenter="use_mail()" pattern="[A-z0-9_\-.]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{1,}" required name="email" placeholder="Email" type="email">
								</label>
						</section>
					</div>
				</div>
			</fieldset>
					 <fieldset>
							
							<div class="row">
								<section class="col col-6">
								<legend>Titulo del banner</legend>
									 <label class="input">
										 
										 <input required readonly="readonly" type="text" id="titulo" name="titulo" value="<?=$img[0]->titulo?>" required>
									 </label>
								 </section>
								 <section class="col col-6">
								 <legend>Descripción del banner</legend>
														<label class="textarea"> 	
																							
															<textarea id="descripcion" readonly="readonly" name="descripcion" rows="3" class="custom-scroll" required><?=$img[0]->descripcion?></textarea> 
														</label>
														</section>
								 </div>						
						 
						
					 </fieldset>
					 <fieldset>
						 <legend>Imagen del banner</legend>
							 <div id="dir" class="row">
																					<section id="imagenes2" class="col col-12">
											        	<label class="label">
											        		Imágen actual
											        	</label>
															<?
												            if($img[0]->nombre_banner!=""){
												           	echo '<div class="no-padding col-xs-12 col-sm-12 col-md-6 col-lg-6"><img style="max-height: 150px;" src="/media/Empresa/'.$img[0]->nombre_banner.'" width="390px" height="150px"></div>';
												           }else{
												           	echo "No hay imagen";
												           }   
												            ?>
									
										            </section>
													

							</div>
						</fieldset>
			<button type="submit" class="btn btn-success pull-right btn-next"  >Enviar</button>
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

function use_mail()
{
	var mail=$("#email").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_mail",
		data: {mail: mail},
	})
	.done(function( msg )
	{
		$("#msg_correo").remove();
		$("#correo").append("<div id='msg_correo'>"+msg+"</div>")
	});
}

function enviar(){	
	$.ajax({
		type: "POST",
		url: "/auth/show_dialog",
		data: {message: '¿ Esta seguro que desea enviar la Invitación?'},
	})
	.done(function( msg )
	{
		bootbox.dialog({
		message: msg,
		title: 'Enviar Invitacion',
		buttons: {
			success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
						setiniciarSpinner();
						$.ajax({
							type: "POST",
							url: "/ov/cgeneral/enviar_invitacion",
							data: $('#edit').serialize()
						})
						.done(function( msg )
						{
							FinalizarSpinner();
							bootbox.dialog({
							message: msg,
							title: 'Enviando..',
							buttons: {
								success: {
								label: "Aceptar",
								className: "btn-success",
								callback: function() {
										location.href="/ov/cgeneral/invitacion_afiliar";
										
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
