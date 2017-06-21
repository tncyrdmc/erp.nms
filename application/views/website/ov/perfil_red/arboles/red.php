
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span> 
				> <a href="/ov/red/index">Redes</a>
				> Arbol
				</span>
			</h1>
		</div>
	</div>
	<div class="well">
				<fieldset>
					<legend>Red</legend>
										<div class="row">
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<a href="/ov/red/red_arbol1?id=<?php echo $_GET['id']; ?>">
								<div
									class="well well-sm txt-color-white text-center link_dashboard"
									style="background: <?=$style[0]->btn_1_color?>">
									<i class="fa fa-sitemap fa-3x"></i>
									<h5>Arbol de mi red</h5>
								</div>
							</a>
						</div>		
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<a href="/ov/red/red_arbol_frontales?id=<?php echo $_GET['id']; ?>">
								<div
									class="well well-sm txt-color-white text-center link_dashboard"
									style="background: <?=$style[0]->btn_1_color?>">
									<i class="fa fa-sitemap fa-3x"></i>
									<h5>Frontalidad de mi red</h5>
								</div>
							</a>
						</div>				
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<a href="/ov/red/red_genealogico?id=<?php echo $_GET['id']; ?>">
								<div
									class="well well-sm txt-color-white text-center link_dashboard"
									style="background: <?=$style[0]->btn_1_color?>">
									<i class="fa fa-sitemap fa-3x"></i>
									<h5>Profundidad de mi red</h5>
								</div>
							</a>
						</div>
					</div>
				</fieldset>
</div>
</div>
