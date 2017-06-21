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
<div class="row">
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
			

				<!-- widget div-->
				
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					
						
						<form id="nueva" class="smart-form" method="POST" action="/bo/inventario/update_documento" enctype="multipart/form-data">
							<fieldset>
<input type="text" id="id" name="id" value="<?php echo $datosDocumento[0]->id_doc; ?>" class="hide">
								<label class="input">Editar documento
									<input style="width: 25rem;" type="text" value="<?php echo $datosDocumento[0]->nombre; ?>" name="nombre" placeholder="Nombre Documento" class="form-control" required>
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

			
					<!-- end widget content -->
					
	
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
<script type="text/javascript">



</script>					
						