<link href="/template/cedi/css/bootstrap.css" rel="stylesheet">
    <link href="/template/cedi/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/template/cedi/css/docs.css" rel="stylesheet">
    <link href="/template/cedi/js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="/template/cedi/js/jquery.js"></script>
    <script src="/template/cedi/js/bootstrap-transition.js"></script>
    <script src="/template/cedi/js/bootstrap-alert.js"></script>
    <script src="/template/cedi/js/bootstrap-modal.js"></script>
    <script src="/template/cedi/js/bootstrap-dropdown.js"></script>
    <script src="/template/cedi/js/bootstrap-scrollspy.js"></script>
    <script src="/template/cedi/js/bootstrap-tab.js"></script>
    <script src="/template/cedi/js/bootstrap-tooltip.js"></script>
    <script src="/template/cedi/js/bootstrap-popover.js"></script>
    <script src="/template/cedi/js/bootstrap-button.js"></script>
    <script src="/template/cedi/js/bootstrap-collapse.js"></script>
    <script src="/template/cedi/js/bootstrap-carousel.js"></script>
    <script src="/template/cedi/js/bootstrap-typeahead.js"></script>
    <script src="/template/cedi/js/bootstrap-affix.js"></script>
    <script src="/template/cedi/js/holder/holder.js"></script>
    <script src="/template/cedi/js/google-code-prettify/prettify.js"></script>
    <script src="/template/cedi/js/application.js"></script>

<header style="height: 60px;background-color: #FAFAFA;">
<article class="col-sm-12" style="z-index: 1000;">

			<div class="navbar navbar-default" style="border-color: rgb(255, 255, 255);">
				
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img style="width: 10rem; height: auto; padding: 1rem;" src="/logo.png" alt="Networksoft">
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="text-center">
								<a href="/">
								<i style="font-size: 2rem;" class="fa fa-home"></i><br/>Inicio</a>
							</li>
							<li class="text-center">
								<a href="/CEDI/POS">
								<i style="font-size: 2rem;" class="fa fa-desktop"></i><br/>Punto de Venta </a>
							</li>
							<li class="text-center">
								<a href="altas">
								<i style="font-size: 2rem;" class="fa fa-edit "></i><br/>Altas </a>
							</li>
							<li class="text-center">
								<a href="inventario">
								<i style="font-size: 2rem;" class="fa fa-cubes"></i><br/>Inventario </a>
							</li>
							<li class="text-center">
								<a href="embarques">
								<i style="font-size: 2rem;" class="fa fa-truck "></i><br/>Embarques</a>
							</li>							
							<li class="text-center">
								<a href="/bo/reportes_logistico/"><!-- reportes-->
								<i style="font-size: 2rem;" class="fa fa-book  "></i> <br/>Reportes</a>
							</li>
							<li class="text-center">
								<a href="/bo/logistico/archivero"><!-- archivero -->
								<i style="font-size: 2rem;" class="fa fa-folder"></i> <br/>Archivero </a>
							</li>

						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="text-center">
								<a href="perfil">
								<i style="font-size: 2rem;" class="fa fa-user"></i><br/><?=$user;?></a>
							</li>
							<li class="dropdown">
							<div id="logout" class="btn-header transparent" style="background: rgb(206, 53, 44);">
								<span> 
									<a style="width: 6rem !important; height: 4rem;color: rgb(255, 255, 255); background: rgb(206, 53, 44) none repeat scroll 0% 0%;border: none" 
									href="/auth/logout" title="Salir" data-action="userLogout" 
									data-logout-msg="¿ Realmente desea salir ?">
									<i class="fa fa-sign-out fa-3x"></i>
									</a> 
									</span>
							</div>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				
			</div>
		</article>
</header>