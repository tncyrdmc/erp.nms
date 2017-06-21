<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
			
			
						<a class="backHome" href="/ov/dashboard"><i class="fa fa-home"></i> Menu</a>


							<span>>
							Autoresponder
							</span>
							</h1>
		</div>
	</div>
		<?php if($this->session->flashdata('mensaje')) {
			if($this->session->flashdata('mensaje')=="Hubo un error al enviar uno de los correos."){
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('mensaje').'
			</div>'; 
			}else{
				echo '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>completado </strong> '.$this->session->flashdata('mensaje').'
			</div>'; 
			}
		}
	
	?>	
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">

			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1"
					data-widget-editbutton="false" data-widget-custombutton="false"
					data-widget-colorbutton="false">
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
						<span class="widget-icon"> <i class="fa fa-bookmark"></i>
						</span>
						<h2>Datos del banner</h2>
					</header>

					<!-- widget div-->
					<div>
					<div class="widget-body">
						<form  class="" name="form_banner"  method="post" action="/ov/cgeneral/Enviar_correos_autoresponder" enctype="multipart/form-data">
						<fieldset>
							<legend>Titulo del banner</legend>
							<div class="row">
								<section class="col-md-3">
									 <label class="input">
										 Titulo
										 <input  readonly="readonly" class="form-control" type="text"  value="<?=$img[0]->titulo?>" >
									 </label>
								 </section>
								 </div>
						</fieldset>
					 <fieldset>
						 <legend>Descripción del banner</legend>
						 <div class="row">
						 													<!--<section style="padding-left: 0px;" class="col col-6">Descripcion
														<textarea name="descripcion" style="max-width: 96%" id="mymarkdown" value="" required><?//echo $img[0]->descripcion?></textarea>
													</section>-->
														<section class="col-md-3">
														<label class="textarea"> 	
														Descripción									
															<textarea  readonly="readonly"  rows="3" class="form-control" ><?=$img[0]->descripcion?></textarea> 
														</label>
														</section>
														</div>
					 </fieldset>
					 <fieldset>
						 <legend>Imagen del banner</legend>
																					<section id="imagenes2" class="col-md-12">
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
						<fieldset>
						<legend>Enviar Email</legend>
												
													
													<div class="col-sm-6">
														<div class="form-group">
															<label>Correos Electrónicos</label>
															<input onchange="validar_correo()" class="form-control tagsinput" name="correos" id="correos" value="" data-role="tagsinput" required>
														</div>
													</div>
													
												
						</fieldset>
						<footer>
<button style="margin: 1rem;margin-bottom: 4rem;" id="botonsave" type="input" class="btn btn-success">Enviar</button>
							</footer>
				</form>
					</div>
					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
			</article>
			<!-- END COL -->
		</div>
		<div class="row">
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<br /> <br />
			</div>
		</div>
		<!-- END ROW -->
	</section>
</div>

		<script src="/template/js/plugin/bootstrap-tags/bootstrap-tagsinput.min.js"></script>
		<script src="/template/js/plugin/typeahead/typeahead.min.js"></script>
		<script src="/template/js/plugin/typeahead/typeaheadjs.min.js"></script>

											
											<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
											<script src="/template/js/plugin/markdown/markdown.min.js"></script>
											<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
											<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>
											<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
											<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
											<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
											<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
											<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">


function validar_correo(){
var correo=$('#correos').val();

				$.ajax({
					type: "POST",
					url: "/ov/cgeneral/validar_correo",
					data: {correos:correo}
				})
				.done(function( msg )
		{
				$('html').append(msg);
		});

}


/*$( "#form_banner" ).submit(function( event ) {
	event.preventDefault();	
	//iniciarSpinner();
	enviar();
});

function enviar()
{	

				$.ajax({
					type: "POST",
					url: "/bo/configuracion/crear_banner",
					data: $("form_banner").serialize()
				})
				.done(function( msg )
		{
			bootbox.dialog({
			message: msg,
			title: 'Atención !!!',
			buttons: {
				success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
					location.href="/bo/configuracion/banner";
					//FinalizarSpinner();
				}
			}
			}
			})//fin done ajax
	});
}*/
</script>

<style>
label{
display: inside;

}
</style>

