<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

			<h1 class="page-title txt-color-blueDark">
						<?php  if($type=='5'){?>
							<a class="backHome" href="/bol"><i class="fa fa-home"></i> Menu</a>
							<span> >  Alta </span>
						 <?php }else{?>
								<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
								<span> 
								> <a href="/bo/logistico/">Logistico</a> 
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
				<div class="jarviswidget" id="wid-id-1"
					data-widget-colorbutton="false" data-widget-editbutton="false"
					data-widget-togglebutton="false" data-widget-deletebutton="false"
					data-widget-sortable="false" data-widget-fullscreenbutton="false"
					data-widget-custombutton="false" data-widget-collapsed="false">
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
									<div class="row">
										<div class="col-sm-2"></div>
										<div class="col-sm-10">
											
											<div class="col-sm-2 link">
												<a href="/bo/almacen/index">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
														<i class="fa fa-building  fa-3x"></i>
														<h1>Almacén</h1>
														<h1>.</h1>
													</div>
												</a>
											</div>

											<div class="col-sm-2 link">
												<a href="/bo/cedis/index">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
														<i class="fa fa-globe fa-3x"></i>
														<h1>CEDI</h1>
														<h1>.</h1>
													</div>
												</a>
											</div>

											<div class="col-sm-2 link">
												<a href="/bo/proveedor_mensajeria/index">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>; padding-left:2.8em;">
														<i class="fa fa-send fa-3x"></i>
														<h1>Proveedor</h1>
														<h1>Mensajeria</h1>
													</div>
												</a>
											</div>
											<div class="col-sm-2 link">
												<a href="/bo/inventario/documento">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>; padding-left:2.8em;">
														<i class="fa fa-file-text-o fa-3x"></i>
														<h1>Tipo</h1>
														<h1>Documento</h1>
													</div>
												</a>
											</div>										
	
										<div class="col-sm-12 link"></div>

											<div class="col-sm-2 link">
												<a href="/bo/comercial/actionProveedor">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;  padding-left:2.8em;">
														<i class="fa fa-edit fa-3x"></i>
														<h1>Proveedor</h1>
														<h1>.</h1>
													</div>
												</a>
											</div>

											<div class="col-sm-2 link">
												<a href="/bo/logistico2/movimiento">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;  padding:50px 2em;">
														<i class="fa fa-file-text fa-3x"></i>
														<h1>Movimiento</h1>
														<h1>al Inventario</h1>
													</div>
												</a>
											</div>

											<div class="col-sm-2 link">
												<a href="/bo/logistico2/producto"> 
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>; padding-left:2.8em;">
														<i class="fa fa-cube fa-3x"></i>
														<h1>Producto</h1>
														<h1>Inventario</h1>
													</div>
												</a>
											</div>
											<div class="col-sm-2 link">
												<a href="/bo/logistico2/usuarios">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>; padding-left:2.8em;">
														<i class="fa fa-user fa-3x"></i>
														<h1>Usuarios</h1>
														<h1>Logístico</h1>
													</div>
												</a>
											</div>
										</div>
										

									</div>
								</div>
							</fieldset>
						</div>

					</div>

				</div>
				<!-- end widget content -->
			</article>
		</div>
		<!-- end widget div -->
	</section>


</div>
<!-- END MAIN CONTENT -->
<style>
.link {
	margin: 0.5rem;
}

.minh {
	padding: 50px;
}

.link a:hover {
	text-decoration: none !important;
}
</style>


