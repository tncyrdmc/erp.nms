			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						<?php  if($type=='5'){?>
						<a class="backHome" href="/bol"><i class="fa fa-home"></i> Menu</a>
						<span>
								> <a href="/bo/logistico2/alta"> Alta</a>
								> <a href="/bo/logistico2/usuarios">  Usuarios Logístico</a>
								> <a href="/bo/usuarios/almacen"> Almacén </a>
								> Alta
							</span>
							<?php }else if($type=='8'||$type=='9'){
						 	$index= ($type=='8') ? '/CEDI' : '/Almacen';
						 	?>
							<a class="backHome" href="<?=$index?>"><i class="fa fa-home"></i> Menu</a>
							<span> 
								> <a href="<?=$index?>/altas"> Altas</a>
								> <a href="/bo/logistico2/usuarios"> Usuarios Logístico</a>
								> <a href="/bo/usuarios/almacen"> Almacén </a>
								> Alta
							</span>
							 <?php }else{?>
						
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
								> <a href="/bo/administracion">Administración </a>
								> <a href="/bo/usuarios">Usuarios </a>
								> <a href="/bo/usuarios/almacen">Almacén </a>
								> Alta
							</span>
							
							<?php }?>
							
						</h1>
					</div>
				</div>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false"
          data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-sortable="false"
          data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false">
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
                <fieldset>
	                <div class="contenidoBotones">
						<div class="row col-xs-8 col-sm-6 col-md-4 col-lg-4" style="margin: 4rem;">
							<div class="">
									<section>
										<div>
											<?php
											if(count($almacenes)>0){
												if ($use_username) {
													$username = array(
														'name'	=> 'username',
														'id'	=> 'username',
														'value' => set_value('username'),
														'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
														'size'	=> 30,
														'required' => 'required' 
													);												
												}
												
												$email = array(
													'name'	=> 'email',
													'id'	=> 'email',
													'value'	=> set_value('email'),
													'maxlength'	=> 80,
													'size'	=> 30,
													'required' => 'required',
													'type' => 'email'
												);
												
												$password = array(
													'name'	=> 'password',
													'id'	=> 'password',
													'value' => set_value('password'),
													'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
													'size'	=> 30,
													'required' => 'required',
													'type' => 'password'
														
												);
												
												$confirm_password = array(
													'name'	=> 'confirm_password',
													'id'	=> 'confirm_password',
													'value' => set_value('confirm_password'),
													'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
													'size'	=> 30,
													'required' => 'required',
													'type' => 'password'
												);
											
											echo form_open($this->uri->uri_string()); ?>
											<legend>Nuevo Agente Almacén</legend>
											<fieldset>
												<label class="label">Seleccione el Almacén al que pertenecerá</label>
												<label class="select">
													<select name="id_cedi" id="id_cedi" required>
														<?foreach ($almacenes as $almacen) {?>
															<option value="<?php echo $almacen->id_cedi; ?>">
																<?php echo $almacen->nombre; ?>
															</option>
														<?}?>
													</select>
												</label>
												<br>
												<label class="label">País</label>
												<label class="select">
													<select name="id_pais" id="id_pais" required>
														<?foreach ($paises as $pais) {
															if($pais->Code!='AAA'){?>
															<option value="<?php echo $pais->Code; ?>">
																<?php echo $pais->Name; ?>
															</option>
														<?}}?>
													</select>
												</label>
											</fieldset>
											<fieldset>
												<?php if ($use_username) { ?>
												<label class="label">Nombre de Usuario</label>
												<label class="input">
													<?php echo form_input($username); ?>
												</label>
												<label class="txt-color-red">
													<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
												</label>
												<br/>
												<?php } ?>
												<label class="label">Dirección de Correo Electrónico</label>
												<label class="input">
													<?php echo form_input($email); ?>
												</label>
												<label class="txt-color-red">
													<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
												</label>
											</fieldset>
											<fieldset>
												<label class="label">Número de Identificación</label>
												<label class="input">
													<input name="dni" value="" id="dni" maxlength="60" size="30" type="text" required /> 
												</label>
												<label class="txt-color-red"></label>
												<br/>
												<label class="label">Nombre(s)</label>
												<label class="input">
													<input name="nombre" value="" id="username" maxlength="60" size="30" type="text" required>
												</label>
												<label class="txt-color-red"></label>
												<br/>
												<label class="label">Apellido(s)</label>
												<label class="input">
													<input name="apellido" value="" id="username" maxlength="60" size="30" type="text" required> 
												</label>
												<label class="txt-color-red"></label>
												<br/>
												<label class="label">Teléfono (fijo o Movil)</label>
												<label class="input">
													<input name="telefono" value="" id="telefono" maxlength="60" size="30" type="tel" pattern="[0-9-(-)---+]+" required>
												</label>
												<label class="txt-color-red"></label>
											</fieldset>
											<fieldset>
												<label class="label">Contraseña</label>
												<label class="input">
													<?php echo form_password($password); ?>
												</label>
												<label class="txt-color-red">
													<?php echo form_error($password['name']); ?>
												</label>
												<br/>
												<label class="label">Confirmar contraseña</label>
												<label class="input">
													<?php echo form_password($confirm_password); ?>
												</label>
												<label class="txt-color-red">
													<?php echo form_error($confirm_password['name']); ?>
												</label>
											</fieldset>
											<br>
											<input name="register" value="Crear Usuario" type="submit" class="btn-success">
											<?php echo form_close(); 
											
											}else{
												
												echo 
												"
													<div class='callout'>
														Atención, No se ha hallado ningún Almacén disponible. 
														<br/>
														<hr/>
														<br/>
														<a class='btn btn-primary pull-right' href='/bo/almacen/alta'>
															<span><i class='fa fa-building'></i></span> Alta Almacén
														</a>
													</div>
												";
												
											}
											
											?>
										</div>
									</section>
							</div>
						</div>
					</div>
				</fieldset>
						</div>
						<!-- end widget content -->

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
			            <br />
			            <br />
			        </div>
		        </div>
			</div>
			<!-- END MAIN CONTENT -->
<<script type="text/javascript">
function new_user()
{
	var tipo=$("#tipo").val();
	if(tipo!="")
	{
		$.ajax({
			data: {tipo: tipo},
			type: "post",
			url: "newUser",
			success: function(){
				location.href="/bo/usuarios/listarTipoDeUsuarioAcceso"
			}
		});
	}
}
</script>
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
			
		<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
			<script src="/template/js/plugin/markdown/markdown.min.js"></script>
			<script src="/template/js/plugin/markdown/to-markdown.min.js"></script>
			<script src="/template/js/plugin/markdown/bootstrap-markdown.min.js"></script>
			<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
			<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
			<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
			<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
			<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
			<script src="/template/js/validacion.js"></script>
			<script type="text/javascript">

				$('#startdate').datepicker({
					changeMonth: true,
					numberOfMonths: 2,
					dateFormat:"yy-mm-dd",
					changeYear: true,
					prevText : '<i class="fa fa-chevron-left"></i>',
					nextText : '<i class="fa fa-chevron-right"></i>'
				});
				
				function new_user()
				{
					var tipo=$("#tipo").val();
					if(tipo!="")
					{
						$.ajax({
							data: {tipo: tipo},
							type: "post",
							url: "newUser",
							success: function(){
								location.href="/bo/usuarios/listarTipoDeUsuario"
							}
						});
					}
				}
				</script>
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