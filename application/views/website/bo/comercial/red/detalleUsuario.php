<div id="spinner-div"></div>
<div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-right: 0px; margin-left: 0px; padding-bottom: 3rem;" class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<form action="/bo/comercial/actualizar_afiliado" onmouseenter="validate_user_data()" method="POST" id="edit" role="form" class="smart-form">
			<legend>Modificar Datos del Afiliado</legend>

			<br><br>

			<div class="form-group">

				<input type="text" class="hide" name="id" id="id" value = '<?= $detalle[0]->id; ?>' >
					<div class="row col-xs-12 col-md-6 col-sm-4 col-lg-12">
					
						<section id="usuario" style="width: 50%;" class="col col-2">
							<label for="">Usuario</label>
							<input onkeyup="use_username()" type="text" class="form-control" name="username" id="username" value = '<?= $detalle[0]->username; ?>'>
						</section>
						
						<section id="correo" style="width: 50%;" class="col col-2">
							<label for="">e-mail</label>
							<input onkeyup="use_mail()" type="text" class="form-control" name="mail" id="mail" value = '<?= $detalle[0]->email; ?>'>
						</section>
						
						<section id="password_" style="width: 50%;" class="col col-2">
							<label for="">Contraseña</label>
							<input onkeyup="confirm_pass()" type="password" class="form-control" name="password" id="password" >
						</section>
						
						<section id="confirmar_password" style="width: 50%;" class="col col-2">
							<label for="">Repita Contraseña</label>
							<input onkeyup="confirm_pass()" type="password" class="form-control" name="confirm_password" id="confirm_password" >
						</section>
						
						
						<section style="width: 50%;" class="col col-2">
							<label style="width: 100%">Nombre <br>
								<input type="text" class="form-control" name="nombre" id="nombre" required value = '<?= $detalle[0]->nombre; ?>'>
							</label>
						</section>
						
						<section style="width: 50%;" class="col col-2">
							<label for="">Apellido</label>
							<input type="text" class="form-control" name="apellido" id="apellido" value = '<?= $detalle[0]->apellido; ?>'>
						</section>
						
						<section style="width: 50%;" class="col col-2">
							<label class="select" for="">Pais
							<select name="pais" >
								<?php foreach ($pais as $c){
									echo ($c->Code ==$detalle[0]->pais) 
										? '<option selected value="'.$c->Code.'">'.$c->Name.'</option>' 
										: '<option value="'.$c->Code.'">'.$c->Name.'</option>';
								}?>
							</select></label>
						</section>
						
						
				</div>
			</div>
			<button type="submit" class="btn btn-success pull-right btn-next"  disabled="disabled">Actualizar</button>
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
	setiniciarSpinner();	
	$.ajax({
		type: "POST",
		url: "/bo/comercial/actualizar_afiliado",
		data: $('#edit').serialize()
	}).done(function( msg ) {				
		bootbox.dialog({
			message: msg,
			title: 'ATENCION',
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
		})
	});//fin Done ajax	
}

$(function()
{
	var a = new Date();
 	año = a.getFullYear()-19;
	$( "#datepicker" ).datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		maxDate: año+"-12-31",
		changeYear: true
	});
});

/*function mensaje_notificacion(){
	bootbox.dialog({
		  message: "La modificación del afiliado ha sido exitosa.",
		  title: "Modificación del afiliado",
		  buttons: {
		    success: {
		      label: "Ok",
		      className: "hide",
		      callback: function() {
		    	  location.href="/bo/comercial/red_tabla?id_red";
		      }
		    }
		  }
		})
}*/

function use_username()
{
	$("#msg_usuario").remove();
	var username=$("#username").val();
	var id=$("#id").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_username_modificar",
		data: {username: username,id: id},
	})
	.done(function( msg )
	{
		$("#msg_usuario").remove();
		$("#usuario").append("<p id='msg_usuario'>"+msg+"</msg>")
	});
	validate_user_data()
}
function use_mail()
{
	$("#msg_correo").remove();
	var mail=$("#mail").val();
	var id=$("#id").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/use_mail_modificar",
		data: {mail: mail, id:id},
	})
	.done(function( msg )
	{
		$("#msg_correo").remove();
		$("#correo").append("<p id='msg_correo'>"+msg+"</msg>")
	});
	validate_user_data()
}

function confirm_pass()
{
	var password=$("#password").val();
	var confirm_password=$("#confirm_password").val();
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/confirm_password",
		data: {password: password,confirm_password: confirm_password},
	})
	.done(function( msg )
	{
		$("#msg_confirm_password").remove();
		$("#confirmar_password").append("<div id='msg_confirm_password'>"+msg+"</div>")
	});
	validate_user_data()
}

function validate_user_data()
{
	var id=$("#id").val();
	var nombre=$("#nombre").val();
	var mail=$("#mail").val();
	var username=$("#username").val();

	var password=$("#password").val();
	var confirm_password=$("#confirm_password").val();

	$("#validate_user_data").remove();

	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/validate_user_data2",
		data: {id: id,nombre: nombre,mail: mail,username: username,password: password,confirm_password: confirm_password},
	})
	.done(function( msg )
	{
		$("#validate_user_data").remove();
		$("#edit").append("<div id='validate_user_data'>"+msg+"</div>")
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
