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
						<img style="width: 20rem; height: auto; padding: 1rem;" src="/logo.png" alt="Networksoft">
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
								<a href="/CEDI/altas">
								<i style="font-size: 2rem;" class="fa fa-edit "></i><br/>Altas </a>
							</li>
							<li class="text-center">
								<a href="/CEDI/inventario">
								<i style="font-size: 2rem;" class="fa fa-cubes"></i><br/>Inventario </a>
							</li>
							<li class="text-center">
								<a href="/CEDI/embarques">
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
								<a href="/CEDI/perfil">
								<i style="font-size: 2rem;" class="fa fa-user"></i><br/><?=$user2;?></a>
							</li>
							<li class="dropdown">
							<div id="logout" class="btn-header transparent" style="background: rgb(206, 53, 44);">
								<span> 
									<a style="width: 6rem !important; height: 8rem;color: rgb(255, 255, 255); background: rgb(206, 53, 44) none repeat scroll 0% 0%;border: none" 
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