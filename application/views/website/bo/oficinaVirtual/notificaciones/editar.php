<div id="spinner-div"></div>
<div class="row">
	
	<form class="smart-form" method="POST" id="nueva" action="/bo/notificaciones/actualizar_notify" >
		
		
				<input name="id" type="hidden" id="id" value="<?=$notify[0]->id?>">
			
		
		
		<div class="row">
			<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-12" id="" style="padding-right: 100px ! important;">
				<label class="label" style="padding-left: 50px;">
					Fecha de Inicio
				</label>
				
				<label class="input" style="padding-left: 50px;">	
					<input required name="fecha_inicio" placeholder=Inicio type="text" id="fecha_inicio" value="<?=$notify[0]->fecha_inicio?>">
				</label>	
			</section>
		
			<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-12" id="" style="padding-right: 100px ! important;">
				<label class="label" style="padding-left: 50px;">
					Fecha de Finalizacion
				</label>
				<label class="input" style="padding-left: 50px;">	
					<input required name="fecha_fin" placeholder="Finalizacion" type="text" id="fecha_fin" value="<?=$notify[0]->fecha_fin?>">
				</label>
			</section>
		</div>		
		
		<div class="row">
			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="" style="padding-right: 100px ! important;">
				<label class="label" style="padding-left: 50px;">
					Nombre
				</label>
				
				<label class="input" style="padding-left: 50px;">	
					<input required name="nombre" placeholder="Nombre" type="text" id="nombre" value="<?=$notify[0]->nombre?>">
				</label>	
			</section>
		</div>
		
		<div class="row">
			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="" style="padding-right: 100px ! important;">
				<label class="label" style="padding-left: 50px;">
					Descripcion
				</label>
				<label class="textarea" style="padding-left: 50px;">							
					<textarea required rows="3" class="custom-scroll" name="descripcion" ><?=$notify[0]->descripcion?></textarea>
				</label>
			</section>
		</div>		
		
		
		<div class="row">
			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-6" id="div_subir" style="padding-right: 100px ! important;">
																			
				<div class="col col-lg-6 col-md-6 col-sm-7 col-xs-9" style="padding-left: 50px;">
					<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Actualizar Notificacion">
				</div>
			</section>
		</div>
		
	</form>
</div>
										
<style>
.link
{
	margin: 0.5rem;
}
.minh
{
	padding: 50px;
}
.link a:hover
{
	text-decoration: none !important;
}
</style>
		
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>

<script type="text/javascript">	

$(function()
		 {
		 	a = new Date();
			año = a.getFullYear()+20;
			$( "#fecha_inicio" ).datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			maxDate: año+"-12-31",
			dateFormat:"yy-mm-dd",
			changeYear: true,
			yearRange: "-0:+99",
			});
		});

$(function()
		 {
		 	a = new Date();
			año = a.getFullYear()+20;
			$( "#fecha_fin" ).datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			maxDate: año+"-12-31",
			dateFormat:"yy-mm-dd",
			changeYear: true,
			yearRange: "-0:+99",
			});
		});

$( "#nueva" ).submit(function( event ) {
	event.preventDefault();
	enviar();
});

function enviar(){
	iniciarSpinner();
	$.ajax({
		type: "POST",
		url: "/bo/notificaciones/actualizar_notify",
		data: $('#nueva').serialize()
	}).done(function( msg ) {
		bootbox.dialog({
			message: msg,
			title: 'ATENCION',
			buttons: {
				success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {										
							location.href="/bo/notificaciones/listar";
							FinalizarSpinner();
					}
				}					
			}
		})
	});//fin Done ajax
}

</script>
