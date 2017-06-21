<div id="spinner-div"></div>
<form id="edit" class="smart-form" role="form">
	<fieldset>
		<div class="contenidoBotones">
			<div class="row col-xs-10 col-sm-8 col-md-8 col-lg-11"
				style="margin: 2rem;">
				<div class="">
					<section class="col-md-5 padding-5">
						<label class="input"> 
						<i class="icon-append fa fa-calendar"></i> 
						<input required class="col col-6" id="datepicker" type="text"
							name="nacimiento" placeholder="Fecha de entrega">
						</label>
					</section>

					<section class="col-md-6 padding-5">
						<label class="input">
						<i class="icon-append fa fa-paste"></i>  
						<input required class="col col-6" id="n_guia" type="text" 
							name="n_guia" placeholder="número de guia">
						</label>
					</section>
					
					<section class="col-md-3"></section>
					<section class="col-md-6">
						<label class="select">Proveedor de mensajería
							<select id="proveedor" required name="proveedor">
								<option value="" >Elije un Proveedor de mensajería</option>
                              	<?php 
                              	foreach ($proveedores as $proveedor){
                              		echo "<option value='".$proveedor->id."'>".$proveedor->nombre_empresa."</option>";
                              	}
                              	?>
							 </select>
						</label>
					</section>
				</div>
			</div>
		</div>
	</fieldset>
	<footer>
		<input type="submit" class="btn btn-success" value="Embarcar" />
	</footer>
</form>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">

var fecha = new Date();

$( "#datepicker" ).datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat:"yy-mm-dd",
			//defaultDate: "1970-01-01",
			minDate: fecha.getFullYear() + "-" + (fecha.getMonth() +1) + "-" + fecha.getDate() ,
			changeYear: true
});

$( "#edit" ).submit(function( event ) {
	event.preventDefault();	
	enviar();
});

function enviar() {
	
	var fecha=$("#datepicker").val();
	var n_guia=$("#n_guia").val();
	var proveedor=$("#proveedor").val();
	var id_surtido=<?=$surtido?>;
	var id_venta=<?=$venta?>;
	
	if(fecha==""){
		alert("Especifique una fecha de entrega");
	}else if(n_guia==""){
		alert("Especifique un número de guia");
	}else{
		bootbox.dialog({
				message: "¿Desea surtir toda la venta ahora?",
				title: "Surtir",
				className: "",
				buttons: {
					success: {
						label: "Aceptar",
						className: "btn-success",
						callback: function() {
							setiniciarSpinner();
							$.ajax({
								type: "post",
								data: {
										surtido:id_surtido, 
										venta:id_venta, 
										fecha:fecha, 
										n_guia:n_guia,
										unico:0,
										proveedor:proveedor
									},
								url: "surtir"
							}).done(function(msg){
								bootbox.dialog({
									message: msg,//"Se ha enviado este producto a embarques exitosamente.",
									title: "Exito",
									className: "",
									buttons: {
										success: {
											label: "Aceptar",
											className: "btn-success",
											callback: function(){
												FinalizarSpinner();
												window.location.href="pedidos_pendientes";
											}
										}
									}
								})
							});
						}
					},
					danger:{
						label: "Cancelar",
						className: "btn-danger",
						callback: function(){
							
						}
					}
				}
			});
		
	}
		
}

function envio (id_surtido,id_venta,fecha,n_guia,$proveedor){
	
	$.ajax({
		type: "post",
		data: {
				surtido:id_surtido, 
				venta:id_venta, 
				fecha:fecha, 
				n_guia:n_guia,
				unico:0,
				proveedor:proveedor
			},
		url: "surtir"
	}).done(function(msg){
		bootbox.dialog({
			message: "Se ha enviado este producto a embarques exitosamente.",
			title: "Exito",
			className: "",
			buttons: {
				success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function(){
						window.location.href="pedidos_pendientes";
					}
				}
			}
		})
	});
}


</script>