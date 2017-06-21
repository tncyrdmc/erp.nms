			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
					<span>> <a href="/bo/configuracion/"> Configuración </a>
					> Plan de compensación
				</span>
						</h1>
					</div>
				</div>
		<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}elseif ($this->session->flashdata('correcto')) {
		echo '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Correcto </strong> '.$this->session->flashdata('correcto').'
			</div>';
	}
	?>		
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false">
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
											
											<div class="col-sm-1 link">
											</div>
											<div class="col-sm-10 link">
												<div class="col-sm-2 link">
												<a href="/bo/configuracion/comisiones">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
														<i class="fa fa-money fa-3x"></i>
														<h1>Comisiones<br/><br/></h1>
													</div>
												</a>
												</div>
												<div class="col-sm-2 link">
												<a href="/bo/titulos">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
														<i class="fa fa-trophy fa-3x"></i>
														<h1>Títulos<br/><br/></h1>
													</div>
												</a>
												</div>
												<div class="col-sm-2 link">
												<a href="/bo/rangos">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
														<i class="fa fa-road fa-3x"></i>
														<h1>Condiciones<br/><br/></h1>
													</div>
												</a>
												</div>
												<div class="col-sm-2 link">
												<a href="/bo/bonos">
													<div class="minh well well-sm txt-color-white text-center link_dashboard" style="background:<?=$style[0]->btn_2_color?>">
														<i class="fa fa-gift fa-3x"></i>
														<h1>Bonos <br/><br/></h1>
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
			            <br>
			            <br>
			        </div>
		        </div>
			</section>
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





