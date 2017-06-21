<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">

function subred(id,profundidad)
{
	$("#"+id).children(".quitar").attr('onclick','');
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/get_red_afiliar",
		data: {id: id,
				red: <?php echo $_GET['id_red']; ?>,profundidad:profundidad},
	})
	.done(function( msg )
	{
		$("#"+id).append(msg);
	});
}

function botbox(nombre, id, lado)
{
	bootbox.dialog({
		message: '<div class="row fuelux">'
		+'<div id="spinner-div"></div><form id="register" class="smart-form">'
			+'<fieldset>'
			+'<legend>¿ Esta seguro de la Afiliacion ?</legend>'
				+'<section id="usuario" class="col col-6">'
					+'<label class="input">'
						+'<input type="hidden" id="username" onkeyup="use_username()" value="<?php echo $_GET['username']?>" required type="text" name="username" placeholder="Usuario">'
					+'</label>'
				+'</section>'
				+'<input class="hide" type="hidden" name="red" id="red" value="<?php echo $_GET['id_red']; ?>" placeholder="">'
				+'<input type="hidden" name="id" value="'+id+'" class="hide">'
				+'<input type="hidden"" name="lado" value="'+lado+'" class="hide">'
			+'</fieldset>'
			+'<input type="button" class="btn btn-primary" value="Afiliar" onclick="Crear()">'
		+'</form>',
		title: "Afiliar a "+nombre,
	});
	}

function Crear() {
					setiniciarSpinner();
					$.ajax({
						type: "POST",
						url: "/ov/perfil_red/AgregarUsuarioRed",
						data: $('#register').serialize()
					})
					.done(function( msg1 ) {
						FinalizarSpinner();
						$("#progress").attr('style','width: 100%');
						bootbox.dialog({
							message: msg1,
							title: "Atención",
							buttons: {
								success: {
								label: "Ok!",
								className: "btn-success",
								callback: function() {
									location.href="/bo/usuarios/afiliar_existente";
									}
								}
							}
						});
						
						var email=$("#email").val();
						$("#checkout-form").append("<input value='"+email+"' type='hidden' name='mail_important'>");
						
					});//fin Done ajax

pageSetUp();
}

function detalles(id)
{
	$.ajax({
		type: "POST",
		url: "/ov/perfil_red/detalle_usuario",
		data: {id: id},
	})
	.done(function( msg )
	{
		bootbox.dialog({
			message: msg,
			title: "Detalles",
			buttons: {
				success: {
				label: "Cerrar!",
				className: "btn-success",
				callback: function() {
					//location.href="";
					}
				}
			}
		});
	});
}

</script>
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>
					> <a href="/bo/comercial">Comercial</a> 
					> <a href="/bo/comercial/red">Red</a>
					> <a href="/bo/usuarios/afiliar">Tipo de Afiliacion</a>
					> <a href="/bo/usuarios/afiliar_existente" > Afiliar Existente</a>
					> Seleccionar Posicion
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
				<div class="jarviswidget" id="wid-id-1"
					data-widget-editbutton="false" data-widget-custombutton="false"
					data-widget-colorbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i>
						</span>
						<h2>Datos personales</h2>
					</header>

					<!-- widget div-->
					<div style="height: 35rem; overflow: auto;">

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body">
							<div id="myTabContent1" class="tab-content padding-10">
								<div class="tab-pane fade in active" id="s2">
									
									<div id="dos" class="row">
										<!--
										We will create a family tree1 using just CSS(3)
										The markup will be simple nested lists
										-->
										<div class="tree1" style="width: 10000rem;">
											<ul>
												<li><a style="background: url('<?=$img_perfil?>'); background-size: cover; background-position: center;" href="#"><div
															class="nombre">Tú</div></a>
													<ul>
													<?
													$aux = 0;
													foreach ( $afiliados as $key ) {
														$aux ++;
														$key->img ? $img = $key->img : $img = "/template/img/empresario.jpg";
														if ($key->debajo_de == $id) {
															?>
														<li id="<?=$key->id_afiliado?>"><a class="quitar" style="background: url('<?=$img?>'); background-size: cover; background-position: center;" onclick="subred(<?=$key->id_afiliado?>,1)" href="#"></a>
															<div onclick="detalles(<?=$key->id_afiliado?>)"
																class="<?=($key->directo==0) ? 'todo' : 'todo1'?>"><?=$key->afiliado?> <?=$key->afiliado_p?><br />Detalles
															</div></li>
														<?
														
}
													}
													for($i = $aux; $i < $red_frontales [0]->frontal; $i ++) {
														?>
															<li><a
															onclick='botbox("<?php echo 'Tu'; ?>","<?php echo $id; ?>","<?php echo $i; ?> ")'
															href='javascript:void(0)'>Afiliar Aqui</a></li>
														<? } ?>
													</ul></li>
											</ul>
										</div>
									</div>

								</div>
							</div>
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
				<br /> <br />
			</div>
		</div>
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
<!-- PAGE RELATED PLUGIN(S) -->
<style type="text/css">
/*Now the CSS*/
* {
	margin: 0;
	padding: 0;
}

.nombre {
	background: rgba(255, 255, 255, .3);
	width: 100px;
	margin-top: -5px;
	margin-left: -11px;
}

.todo {
	font-size: 11px;
	width: 100%;
	background: rgba(0, 0, 0, .5);
	margin-top: -4px;
	color: #FFF;
	cursor: pointer;
}

.todo1 {
	font-size: 11px;
	width: 100%;
	background: rgba(70, 120, 250, .8);
	margin-top: -4px;
	color: #FFF;
	cursor: pointer;
}

.todo:hover {
	font-size: 11px;
	text-decoration: underline;
	width: 100%;
	margin-top: -4px;
	background: rgba(0, 0, 0, .7);
	color: #FFF;
	cursor: pointer;
}

.todo1:hover {
	font-size: 11px;
	text-decoration: underline;
	width: 100%;
	margin-top: -4px;
	background: rgba(70, 120, 250, 1);
	color: #FFF;
	cursor: pointer;
}

.tree1 ul {
	padding-top: 20px;
	position: relative;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree1 li {
	float: left;
	text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/
.tree1 li::before, .tree1 li::after {
	content: '';
	position: absolute;
	top: 0;
	right: 50%;
	border-top: 3px solid #ccc;
	width: 50%;
	height: 20px;
}

.tree1 li::after {
	right: auto;
	left: 50%;
	border-left: 3px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree1 li:only-child::after, .tree1 li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree1 li:only-child {
	padding-top: 0;
}

/*Remove left connector from first child and 
right connector from last child*/
.tree1 li:first-child::before, .tree1 li:last-child::after {
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree1 li:last-child::before {
	border-right: 3px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}

.tree1 li:first-child::after {
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree1 ul ul::before {
	content: '';
	position: absolute;
	top: 0;
	left: 50%;
	border-left: 3px solid #ccc;
	width: 0;
	height: 20px;
}

.tree1 li a {
	height: 100px;
	width: 100px;
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #000;
	font-size: 13px;
	display: inline-block;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree1 li a:hover, .tree1 li a:hover+ul li a {
	background: #c8e4f8;
	color: #000;
	border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree1 li a:hover+ul li::after, .tree1 li a:hover+ul li::before, .tree1 li a:hover+ul::before,
	.tree1 li a:hover+ul ul::before {
	border-color: #94a0b4;
}

.packselected {
	border-top: solid 5px #CCC;
	border-bottom: solid 5px #CCC;
	-webkit-box-shadow: 0px 0px 10px #CCC;
	-moz-box-shadow: 0px 0px 10px #CCC;
	box-shadow: 0px 0px 10px #CCC;
}
/*Thats all. I hope you enjoyed it.
Thanks :)*/
</style>
