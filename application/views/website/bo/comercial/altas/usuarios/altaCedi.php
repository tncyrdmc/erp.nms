			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/administracion">Administración </a>
							</span>
							
							<span>>
								<a href="/bo/usuarios">Usuarios </a>
							</span>
							<span>>
								<a href="/bo/usuarios/menuAltaUsuarioCedi">CEDI </a> > Alta
							</span>
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
							
							<form method="POST" enctype="multipart/form-data"   action="/bo/usuarios/guardarCedi" class="smart-form">
									<section>
										<div>
											<?php
											if ($use_username) {
												$username = array(
													'name'	=> 'username',
													'id'	=> 'username',
													'value' => set_value('username'),
													'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
													'size'	=> 30,
												);
												
											}
											$email = array(
												'name'	=> 'email',
												'id'	=> 'email',
												'value'	=> set_value('email'),
												'maxlength'	=> 80,
												'size'	=> 30,
											);
											$password = array(
												'name'	=> 'password',
												'id'	=> 'password',
												'value' => set_value('password'),
												'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
												'size'	=> 30,
													
											);
											$confirm_password = array(
												'name'	=> 'confirm_password',
												'id'	=> 'confirm_password',
												'value' => set_value('confirm_password'),
												'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
												'size'	=> 30,
											);
											?>
											<?php echo form_open($this->uri->uri_string()); ?>
											<label class="select">
												<label class="label">Seleccione el CEDI al que pertenecerá</label>
												<select name="id_cedi" id="id_cedi" required="">
													<?foreach ($cedis as $cedi) {?>
														<option value="<?php echo $cedi->id_cedi; ?>">
															<?php echo $cedi->nombre; ?>
														</option>
													<?}?>
												</select>
											</label>
											
												<br>
											
											<section class="input">
												<label class="input">DNI
												<input required type="text" name="dni" id="dni"  /> </label>
											</section>
											
												<br>
											
											<section class="input">
												<label class="input">username
												<input required type="text" name="username" id="username"  /> </label>
											</section>
											
												<br>
											
											<section class="input">
												<label class="input">Nombres
												<input required type="text" name="nombres" id="nombres"  /> </label>
											</section>
											
												<br>
												
											<section class="input">
												<label class="input">Apellido Paterno
												<input required type="text" name="apellido1" id="apellido1"  /> </label>
											</section>
											
												<br>
												
											<section class="input">
												<label class="input">Apellido Materno
												<input required type="text" name="apellido2" id="apellido2"  /> </label>
											</section>
											
											<br>
											
											<section class="input">
												<label class="input">Telefono fijo
												<input required type="phone" name="telefono_fijo" id="telefono_fijo"  /> </label>
											</section>
											
											<br>
											
											<section class="input">
												<label class="input">Telefono movil
												<input required type="tel" name="telefono_movil" id="telefono_movil"  /> </label>
											</section>
											
											<br>
											
											<section class="input">
												<label class="input">email
												<input required type="email" name="email" id="email"  /> </label>
											</section>
											
											<br>
											
											<section class="input">
												<label class="input">ocupación
												<input required type="text" name="ocupacion" id="ocupacion"  /> </label>
											</section>
											
											<br>
											
											<label class="select">
												<label class="label">País</label>
												<select name="id_pais" id="id_pais" required="">
													<?foreach ($paises as $pais) {?>
														<option value="<?php echo $pais->Code; ?>">
															<?php echo $pais->Name; ?>
														</option>
													<?}?>
												</select>
											</label>
											
											<br>
											
											<section class="input">
												<label class="input">Idioma
												<input required type="text" name="idioma" id="idioma"  /> </label>
											</section>
											
											<br>
											
											<section class="input">
												<label class="input">Fecha de inicio
												<input required type="text" name="fecha_alta" id="startdate"  /> </label>
											</section>
											
											<section class="input">
												<label class="input">Password
												<input required type="password" name="password" id="startdate"  /> </label>
											</section>
											
											<section class="input">
												<label class="input">Contraseña
													<?php echo form_password($password); ?>
													><?php echo form_error($password['name']); ?>
											
												
											<section class="input">
												<label class="input">Confirmar contraseña
												<?php echo form_password($confirm_password); ?>
												<input required type="password" name="password" id="startdate"  /> </label>
											</section>
													<td></td>
													<td style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
												</tr>
											
											<br>
											<input name="register" value="Crear Usuario" type="submit" class="btn-success">
											<?php echo form_close(); ?>
										</div>
									</section>
								</form>
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
			
