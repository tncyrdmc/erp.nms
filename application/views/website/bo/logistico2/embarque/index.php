			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						
							<?php  if($type=='5'){?>
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>							
								> Pedidos / Embarques
							</span>
						<?php }else{?>
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
								> <a href="/bol/dashboard/"> Logistico</a>
								> Pedidos / Embarques
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
											
											<div class="col-sm-2 link">
											</div>
											<div class="col-sm-8 link">
												<div class="col-sm-3 link">
												<a href="/bo/logistico2/pedidos_pendientes">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>;">
														<i class="fa fa-clipboard fa-3x"></i>
														<h1>Pedidos a Embarcar</h1>
													</div>
												</a>
												</div>
												<div class="col-sm-3 link">
												<a href="/bo/logistico2/pedidos_transito">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
														<i class="fa fa-truck fa-3x"></i>
														<h1>Pedidos en Transito</h1>
													</div>
												</a>
												</div>
												<div class="col-sm-3 link">
												<a href="/bo/logistico2/pedidos_embarcados">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
														<i class="fa fa-check fa-3x"></i>
														<h1>Pedidos Embarcados </h1>
													</div>
												</a>
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
			
