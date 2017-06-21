<?

$ci = &get_instance ();
$ci->load->model ( "model_permissions" );
?>
<!-- MAIN CONTENT -->
<div id="content">
	<?php  if($usuario[0]->id_tipo_usuario=='1'){?>
	<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span> 
								> Logistico
							</span>
						</h1>
					</div>
					
				</div>
	<?php } ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="well well-sm">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-4"
						style="margin-top: 8rem;">
						<div class="well well-light well-sm no-margin no-padding">
							<div class="row">
								<div class="col col-sm-12">
									<div id="myCarousel" class="carousel fade profile-carousel">
										<div class="air air-top-left padding-10">
											<h4 class="txt-color-white font-md"></h4>
										</div>
										<div class="carousel-inner">
											<!-- Slide 1 -->
											<div class="item active">
												<img src="/template/img/demo/m4.jpg" alt="demo user">
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-8">
						<!--Inica la secciion de la perfil y red-->
						<div class="well"
							style="box-shadow: 0px 0px 0px !important; border-color: transparent;">
							<fieldset>
								<legend>
									<b>Sistema Integral de Operaciones Soporte Logistico</b>
								</legend>
								<div class="row">
									<div class="col-sm-4 link">
										<a href="/bo/logistico2/alta">
											<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
												<i class="fa fa-edit fa-3x"></i>
												<h1>
													 Alta
												</h1>
											</div>
										</a>
									</div>
									
									<div class="col-sm-4 link">
										<a href="/bo/inventario/index">
											<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
												<i class="fa fa-cubes fa-3x"></i>
												<h1>
													Inventario
												</h1>
											</div>
										</a>
									</div>
									<div class="col-sm-4 link">
										<a href="/bo/reportes_logistico/">
											<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
												<i class="fa fa-book fa-3x"></i>
												<h1>
													Reportes
												</h1>
											</div>
										</a>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4 link">
										<a href="/bo/logistico2/pedidos">
											<div
												class="minh well well-sm txt-color-white text-center link_dashboard"
												style="background: #2086bf;">
												<i class="fa fa-edit fa-3x"></i>
												<h1>Embarque</h1>
											</div>
										</a>
									</div>
									<div class="col-sm-4 link">
										<a href="/bo/premios/index">
											<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
												<i class="fa fa-trophy fa-3x"></i>
												<h1>
													Premios
												</h1>
											</div>
										</a>
									</div>
								
									<div class="col-sm-4 link">
										<a href="/bo/logistico/archivero">
											<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
												<i class="fa fa-folder fa-3x"></i>
												<h1>
													Archivero
												</h1>
											</div>
										</a>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->
		<div></div>
	</div>
	<div class="row">
		<!-- a blank row to get started -->
		<div class="col-sm-12">
			<br /> <br />
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->
<style>
.minh {
	padding: 50px;
}

.link a:hover {
	text-decoration: none !important;
}
</style>
