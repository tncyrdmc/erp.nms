 <!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
				<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span> 
				> Afiliar
				</span>
			</h1>
		</div>
	</div>
<div class="well">
				<fieldset>
					<legend>Nuevo Afiliado</legend>
					<div class="row">
						<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"></div>
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<a href="/ov/perfil_red/afiliar_frontal?id=<?php echo $_GET['id']; ?>">
								<div
									class="well well-sm txt-color-white text-center link_dashboard"
									style="background: <?=$style[0]->btn_1_color?>">
									<i class="fa fa-sitemap fa-3x"></i>
									<h5>Afiliar en Frontal</h5>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<a href="/ov/perfil_red/afiliar_red?id=<?php echo $_GET['id']; ?>">
								<div
									class="well well-sm txt-color-white text-center link_dashboard"
									style="background: <?=$style[0]->btn_1_color?>">
									<i class="fa fa-sitemap fa-3x"></i>
									<h5>Afiliar en Red</h5>
								</div>
							</a>
						</div>
					</div>
				</fieldset>
</div>
</div>
