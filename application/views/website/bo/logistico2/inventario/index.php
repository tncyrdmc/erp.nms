			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						<?php  if($type=='5'){?>
							<span>
							<a class="backHome" href="/bol"><i class="fa fa-home"></i> Menu</a>
							> Inventario
							</span>
						 <?php }else{?>
						<a class="backHome" href="/bol"><i class="fa fa-home"></i> Menu</a>
							<span>
								> <a href="/bol/dashboard">Logistico</a>
								> Inventario
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
						<div class="row">
							<div class="col-sm-2"></div>						
							<div class="col-sm-10">
											
												<div class="col-sm-2 link">
													<a href="/bo/inventario/entrada">
														<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-cubes fa-3x"></i><i class="fa fa-plus fa-2x"></i>
															<h1>Entrada</h1>
														</div>
													</a>
												</div>												
												<div class="col-sm-2 link">
													<a href="/bo/inventario/salida">
														<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-cubes fa-3x"></i><i class="fa fa-minus fa-2x"></i>
															<h1>Salida</h1>
														</div>
													</a>
												</div>
												
												<div class="col-sm-2 link" >
													<a href="/bo/inventario/bloqueo" id="bloqueo">
														<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:#c1c1c1; color:#999 !important;">
															<i class="fa fa-cubes fa-3x"></i><i class="fa fa-lock fa-2x"></i>
															<h1>Bloqueo</h1>
														</div>
													</a>
												</div>
												<div class="col-sm-2 link">
													<a href="/bo/inventario/historial">
														<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
															<i class="fa fa-list-alt  fa-3x"></i>
															<h1>Historial</h1>
														</div>
													</a>
												</div>								
											</div>										
									 </div>
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
			
<script>

;

</script>