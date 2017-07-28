
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		
			
			
				<?php  if($type=='5'){?>
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>
				> <a href="/bo/logistico2/alta"> Alta </a>
				> <a href="/bo/almacen/index"> ALmacen </a>
				>	Alta
				</span>
				</h1>
				</div>
				 <?php }else{?>
				 	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>> <a href="/bol/dashboard/"> Logistico </a>
				> <a href="/bo/logistico2/alta"> Alta </a>
				> <a href="/bo/almacen/index"> Almacen </a>
				>	Alta
				</span>
				</h1>
				</div>
					<?php }?>
			
		
	</div>
	<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Alerta </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>	
	
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				
			<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
				<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
					
					data-widget-colorbutton="false"	
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true" 
					data-widget-sortable="false"
					
				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Nuevo Almacen</h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form id="nueva" class="smart-form" method="POST" action="/bo/almacen/crear_almacen" enctype="multipart/form-data">
							<fieldset>
								<label class="input">Nombre
									<input style="width: 25rem;" type="text" name="nombre" placeholder="Nombre"class="form-control" required>
								</label>
								
								<div class="row" style="width: 28rem;">
									<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos" >
										<label class="label">Descripcion</label>
										<label class="textarea">								
											<textarea required rows="3" class="custom-scroll" name="descripcion">
											</textarea>
										</label>
									</section>
								</div>
								
				
						
				<div style="width: 25rem;">
					<label class="select">Pais 
						<select id="pais" required name="pais" onChange="Departamentos()">
							<option value="-" selected>-- Seleciona un pais --</option>
							<?foreach ($pais as $key){ ?>
								<option value="<?=$key->Code?>"><?=$key->Name?></option>
							<? }?>
						</select>
					</label>
				</div>

				<div style="width: 25rem;">
					<label for="" class="select">Estado/Departamento <select
						id="departamento" name="estado" onChange="CiudadesDepartamento()"
						required>

					</select>
					</label>
				</div>

				<div style="width: 25rem;">
					<label for="" class="select">Municipio/Ciudad <select
						id="ciudad" required name="ciudad" onChange="BuscarProveedores()">

					</select>
					</label>
				</div>
                  <label class="input">Codigo Postal
									<input style="width: 25rem;" type="text" name="codigo_postal" placeholder="Codigo Postal" class="form-control" required>
				   </label>		
		
							
								
								<label class="input">Dirección
									<input style="width: 25rem;" type="text" name="direccion" placeholder="Direccion" class="form-control" required>
								</label>
								
								<label class="input">Telefono
									<input style="width: 25rem;" type="text" name="telefono" placeholder="Telefono" >
								</label>
								<br>
								<div class="row">
									<section  id="div_subir" style="width: 25rem;">
										<div style="width: 25rem;">
											<input type="submit" class="btn btn-success" style="margin-left: 66% ! important; width: 40%;" id="boton_subir" value="Agregar">
										</div>
									</section>
								</div>	
									
							</fieldset>
							
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->	
		</div>
		<div class="row">         
	        <!-- a blank row to get started -->
	        <div class="col-sm-12">
	            <br />
	            <br />
	        </div>
        </div>            
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
function new_ciudad(){
	bootbox.dialog({
		message: '<form id="form_ciudad" method="post" class="smart-form">'
					+'<fieldset>'
						+'<legend>Datos Ciudad</legend>'
							+'<div  class="row">'
								+'<section class="col col-6">'
									+'País'
									+'<label class="select">'
										+'<select id="pais" required name="pais">'
										+'<?foreach ($pais as $key){?>'
											+'<option value="<?=$key->Code?>">'
												+'<?=$key->Name?>'
											+'</option>'
										+'<?}?>'
										+'</select>'
									+'</label>'
								+'</section>'
								+'<section class="col col-6">'
									+'<label class="input">'
										+'Ciudad'
										+'<input required  type="text" id="ciudad" name="ciudad" placeholder="Ciudad">'
									+'</label>'
								+'</section>'
								+'<section class="col col-6">'
								+'<label class="input">'
									+'Departamento'
									+'<input required  type="text" id="departamento" name="departamento" placeholder="Departamento">'
								+'</label>'
							+'</section>'
							+'</div>'
						+'</fieldset>'
				+'</form>',
				title: "Nueva Ciudad",
				buttons: {
					submit: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {

							$.ajax({
								type: "POST",
								url: "/bo/cedis/nuevaCiudad",
								data: $("#form_ciudad").serialize()
							})
							.done(function( msg )
							{
								CiudadesPais();
								//$("#empresa").append("<option value="+empresa['id']+">"+empresa['nombre']+"</option>");
								//$("#empresa").val(empresa['id']);
								bootbox.dialog({
								message: "Se agrego la ciudad correctamente",
								title: 'Ciudades',
								buttons: {
									success: {
									label: "Aceptar",
									className: "btn-success",
									callback: function() {
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


			
}

</script>
<script>
function Departamentos(){
	var pa = $("#pais").val();
	$.ajax({
		type: "POST",
		url: "/bo/proveedor_mensajeria/DepartamentoPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		
		$('#departamento option').each(function() {   
		        $(this).remove();
		});
		datos=$.parseJSON(msg);
		$('#departamento').append('<option value="0">-- Seleciona un Estado / Departamento --</option>');
	      for(var i in datos){
		      $('#departamento').append('<option value="'+datos[i]['id']+'">'+datos[i]['Name']+'</option>'); 		        
	      }
	});
}

function CiudadesDepartamento(){
	var pa = $("#departamento").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/proveedor_mensajeria/CiudadDepartamento",
		data: {departamento: pa}
	})
	.done(function( msg )
	{
		$('#ciudad option').each(function() {   
		        $(this).remove();
		});
		datos=$.parseJSON(msg);
		$('#ciudad').append('<option value="">-- Seleciona una ciudad / municipio </option>');
	      for(var i in datos){
		      $('#ciudad').append('<option value="'+datos[i]['id']+'">'+datos[i]['Name']+'</option>');
	      }
	});
}

</script>
