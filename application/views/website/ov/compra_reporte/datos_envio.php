<link href="/cart/HTML/assets/css/style.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/skin-3.css" rel="stylesheet">

<!-- css3 animation effect for this template -->
<link href="/cart/HTML/assets/css/animate.min.css" rel="stylesheet">

<!-- styles needed by carousel slider -->
<link href="/cart/HTML/assets/css/owl.carousel.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/owl.theme.css" rel="stylesheet">

<!-- styles needed by checkRadio -->
<link href="/cart/HTML/assets/css/ion.checkRadio.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/ion.checkRadio.cloudy.css"
	rel="stylesheet">

<!-- styles needed by mCustomScrollbar -->
<link href="/cart/HTML/assets/css/jquery.mCustomScrollbar.css"
	rel="stylesheet">

<!-- Just for debugging purposes. -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- include pace script for automatic web page progress bar  -->

<script>
    paceOptions = {
      elements: true
    };
</script>
<script src="/cart/HTML/assets/js/pace.min.js"></script>
<div class="row">
	<!-- a blank row to get started -->
	<div class="col-sm-12">
		<br /> <br /> <br /> <br />
	</div>
	<div class="col-sm-12"></div>
</div>

<div class="navbar navbar-tshop navbar-fixed-top megamenu"
	role="navigation" id="cart_cont">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
			data-target=".navbar-collapse">
			<span class="sr-only"> Toggle navigation </span> <span
				class="icon-bar"> </span> <span class="icon-bar"> </span> <span
				class="icon-bar"> </span>
		</button>
		<button type="button" class="navbar-toggle" data-toggle="collapse"
			data-target=".navbar-cart">
			<i class="fa fa-shopping-cart colorWhite fa-2x"> </i> <span
				class="cartRespons colorWhite"> Cart (<?php echo $this->cart->total_items(); ?> ) </span>
		</button>
		<a style="color: #263569; margin-left: 3rem;"
			class="navbar-brand titulo_carrito" href="/ov/dashboard"> <i
			class="fa fa-home"></i> Menu &nbsp;
		</a>

		<!-- this part for mobile -
      <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
        <div class="input-group">
          <button class="btn btn-nobg getFullSearch" type="button"> <i class="fa fa-search"> </i> </button>
        </div>
        <!-- /input-group --
        
      </div> -->
	</div>

	<!-- this part is duplicate from cartMenu  keep it for mobile -->
	<div class="navbar-cart  collapse">
		<div class="cartMenu  hidden-lg col-xs-12 hidden-md hidden-sm">
			<div class="w100 miniCartTable scroll-pane">
				<table>
					<tbody>
            	  <?php
															if ($this->cart->contents ()) {
																$cantidad = 0;
																foreach ( $this->cart->contents () as $items ) {
																	$total = $items ['qty'] * $items ['price'];
																	echo '<tr class="miniCartProduct"> 
									<td style="width:20%" class="miniCartProductThumb"><div> <a href=""> <img src="' . $compras [$cantidad] ['imagen'] . '" alt="img"> </a> </div></td>
									<td style="width:40%"><div class="miniCartDescription">
				                        <h4> <a href=""> ' . $compras [$cantidad] ['nombre'] . '</a> </h4>
				                        <div class="price"> <span> ' . $items ['price'] . ' </span> </div>
				                      </div></td>
				                    <td  style="width:10%" class="miniCartQuantity"><a > X ' . $items ['qty'] . ' </a></td>
				                    <td  style="width:15%" class="miniCartSubtotal"><span>' . $total . '</span></td>
				                    <td  style="width:5%" class="delete"><a onclick="quitar_producto(\'' . $items ['rowid'] . '\')"> x </a></td>
								</tr>';
																	$cantidad ++;
																}
															}
															?>
             
            </tbody>
				</table>
			</div>
			<!--/.miniCartTable-->

			<div class="miniCartFooter  miniCartFooterInMobile text-right">
				<h3 class="text-right subtotal"> Subtotal: $<?php echo $this->cart->total(); ?> </h3>
				<a class="btn btn-sm btn-danger" onclick="ver_cart()"> <i 
					
					class="fa fa-shopping-cart"> </i> VER CARRITO
				</a> <a class="btn btn-sm btn-primary" onclick="a_comprar()">
					COMPRAR! </a>
			</div>
			<!--/.miniCartFooter-->

		</div>
		<!--/.cartMenu-->
	</div>
	<!--/.navbar-cart-->

	<div class="navbar-collapse collapse">
		<!--   <ul class="nav navbar-nav">
        <li class="active"> <a onclick="show_todos()"> Todos </a> </li>
        <li class="dropdown megamenu-fullwidth"> <a data-toggle="dropdown" class="dropdown-toggle" onclick="show_prod()"> Productos </a></li>
        
        change width of megamenu = use class > megamenu-fullwidth, megamenu-60width, megamenu-40width 
        <li class="dropdown megamenu-80width "> <a data-toggle="dropdown" class="dropdown-toggle" onclick="show_serv()"> Servicios </a></li>
        <li class="dropdown megamenu-fullwidth"> <a data-toggle="dropdown" class="dropdown-toggle" onclick="show_comb()"> Combinados </a></li>
        <li class="dropdown megamenu-fullwidth"> <a data-toggle="dropdown" class="dropdown-toggle" onclick="show_prom()"> Promociones </a></li>
      </ul>
      -->
		<!--- this part will be hidden for mobile version -->
		<div class="nav navbar-nav navbar-right hidden-xs">
			<div class="dropdown  cartMenu ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
					class="fa fa-shopping-cart fa-2x"> </i> <span class="cartRespons"> Cart (<?php echo $this->cart->total_items(); ?> ) </span>
					<b class="caret"> </b>
				</a>
				<div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
					<div class="w100 miniCartTable scroll-pane">
						<table>
							<tbody>
                  <?php
																		if ($this->cart->contents ()) {
																			$cantidad = 0;
																			foreach ( $this->cart->contents () as $items ) {
																				$total = $items ['qty'] * $items ['price'];
																				echo '<tr class="miniCartProduct"> 
									<td style="width:20%" class="miniCartProductThumb"><div> <a href=""> <img src="' . $compras [$cantidad] ['imagen'] . '" alt="img"> </a> </div></td>
									<td style="width:40%"><div class="miniCartDescription">
				                        <h4> <a href=""> ' . $compras [$cantidad] ['nombre'] . '</a> </h4>
				                        <div class="price"> <span> ' . $items ['price'] . ' </span> </div>
				                      </div></td>
				                    <td  style="width:10%" class="miniCartQuantity"><a > X ' . $items ['qty'] . ' </a></td>
				                    <td  style="width:15%" class="miniCartSubtotal"><span>' . $total . '</span></td>
				                    <td  style="width:5%" class="delete"><a onclick="quitar_producto(\'' . $items ['rowid'] . '\')"> x </a></td>
								</tr>';
																				$cantidad ++;
																			}
																		}
																		
																		?>
                </tbody>
						</table>
					</div>
					<!--/.miniCartTable-->

					<div class="miniCartFooter text-right">
						<h3 class="text-right subtotal"> Subtotal: $<?php echo $this->cart->total(); ?> </h3>
						<a class="btn btn-sm btn-danger" onclick="ver_cart()"> <i
							class="fa fa-shopping-cart"> </i> VER CARRITO
						</a> <a class="btn btn-sm btn-primary" onclick="a_comprar()">
							COMPRAR! </a>
					</div>
					<!--/.miniCartFooter-->

				</div>
				<!--/.dropdown-menu-->
			</div>
			<!--/.cartMenu-->
			<!--  
        <div class="search-box">
          <div class="input-group">
            <button class="btn btn-nobg getFullSearch" type="button"> <i class="fa fa-search"> </i> </button>
          </div>
          <!-- /input-group 
          
        </div>
        <!--/.search-box -->
			<div class=" transparent pull-right" id="logout">
				<span> <a
					style="color: rgb(255, 255, 255); background: rgb(206, 53, 44) none repeat scroll 0% 0%;"
					class="btn btn-default btn-circle btn-lg"
					href="/index.php/auth/logout" title="Salir"
					data-action="userLogout" data-logout-msg="¿Realmente desea salir?">
						<i style="font-size: 3rem;" class="fa fa-sign-out"></i>
				</a>
				</span>
			</div>
		</div>
		<!--/.navbar-nav hidden-xs-->
	</div>
	<!--/.nav-collapse -->
</div>
<div class="row">

	<div class="container main-container" style="background-color: #fff;">
		<header>Datos de envio</header>
		<form class="smart-form" method="POST" action="guardarEnvio">
			<fieldset>
					<div class="col col-xs-12 col-md-6 col-lg-6">
						<label class="input">Nombre
							<input required type="text" id="nombre" name="nombre" value="<?php echo $datos[0]->nombre; ?>">
						</label>
					</div>
					<div class="col col-xs-12 col-md-6 col-lg-6">
						<label class="input">Apellido
							<input required type="text" id="apellido" name="apellido" value="<?php echo $datos[0]->apellido; ?>">
						</label>
					</div>
					
					<div class="col col-xs-12 col-md-6 col-lg-6">
					<label class="select">Pais 
						<select id="pais" required name="pais" onChange="Departamentos()">
							<option value="-" selected>-- Seleciona un pais --</option>
							<?foreach ($paises as $key){ ?>
								<option value="<?=$key->Code?>"><?=$key->Name?></option>
							<? }?>
						</select>
					</label>
				</div>

				<div class="col col-xs-12 col-md-6 col-lg-6">
					<label for="" class="select">Estado/Departamento <select
						id="departamento" name="estado" onChange="CiudadesDepartamento()"
						required>

					</select>
					</label>
				</div>

				<div class="col col-xs-12 col-md-6 col-lg-6">
					<label for="" class="select">Municipio/Ciudad <select
						id="municipio" required name="municipio" onChange="BuscarProveedores()">

					</select>
					</label>
				</div>
				<div class="col col-xs-12 col-md-6 col-lg-6">
					<label class="input">Colonia / Barrio
						<input required type="text" id="colonia" name="colonia" value="<?php echo $datos[0]->colonia; ?>">
					</label>
				</div>
				
				<div class="col col-xs-12 col-md-6 col-lg-6">
					<label class="input">Dirección
						<input required type="text" id="direccion" name="direccion" value="<?php echo $datos[0]->calle; ?>">
					</label>
				</div>
					
				<div class="col col-xs-12 col-md-6 col-lg-6">
					<label class="input">Codigo Postal
						<input type="text" id="codigo" name="codigo" value="<?php echo $datos[0]->cp; ?>">
					</label>
				</div>
				
				<div class="col col-xs-12 col-md-6 col-lg-6">
					<label class="input">Email
						<input required type="text" id="email" name="email" value="<?php echo $datos[0]->email; ?>">
					</label>
				</div>
					
				<div class="col col-xs-12 col-md-6 col-lg-6">
					<label class="input">Numero Telefonico
						<input required id="telefono" name="telefono"  type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido">
					</label>
				</div>
				
				<div class="col col-xs-12 col-md-6 col-lg-6">
					<label for="" class="select">Tarifa 
					<select
						id="tarifa" required name="tarifa">

					</select>
					</label>
				</div>
			</fieldset>
			
			<footer class="col col-12 pull-right" >
					<button type="submit" class="btn btn-success" onclick="CrearComprador()">
						Siguiente
					</button>
					<a class="btn btn-danger" href="/ov/compras/carrito?tipo=1">
						Atras
					</a>
					
			</footer>
		</form>
	</div>

</div>

<div class="row">
	<!-- a blank row to get started -->
	<div class="col-sm-12">
		<br /> <br />
	</div>
</div>
<script type="text/javascript" src="/cart/HTML/assets/js/smoothproducts.min.js"></script>
<script src="js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript" charset="charset">
function Departamentos(){
	var pa = $("#pais").val();
	$.ajax({
		type: "POST",
		url: "/bo/proveedor_mensajeria/DepartamentoPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		
		$('#departamento option').each(function() {   
		        $(this).remove();
		});
		datos=$.parseJSON(msg);
		$('#departamento').append('<option value="0">-- Seleciona un Estado / Departamento --</option>');
	      for(var i in datos){
		    
		     
		      $('#departamento').append('<option value="'+datos[i]['id']+'">'+datos[i]['Name']+'</option>'); 		        
	      }
	});
}

function CiudadesDepartamento(){
	var pa = $("#departamento").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/proveedor_mensajeria/CiudadDepartamento",
		data: {departamento: pa}
	})
	.done(function( msg )
	{
		$('#municipio option').each(function() {   
		        $(this).remove();
		});
		datos=$.parseJSON(msg);
		$('#municipio').append('<option value="">-- Seleciona una ciudad / municipio </option>');
	      for(var i in datos){
		      $('#municipio').append('<option value="'+datos[i]['id']+'">'+datos[i]['Name']+'</option>');
	      }
	});
}

function BuscarProveedores(){
	var pa = $("#municipio").val();
	
	$.ajax({
		type: "POST",
		url: "/ov/compras/buscarProveedores",
		data: {id_ciudad: pa}
	})
	.done(function( msg )
	{
		$('#tarifa option').each(function() {   
		        $(this).remove();
		});
		
		datos=$.parseJSON(msg);
		
		$('#tarifa').append('<option value="">-- Seleciona una Tarifa --</option>');
	      for(var i in datos){
		      $('#tarifa').append('<option value="'+datos[i]['id']+'">'+datos[i]['razon_social']+' - $'+datos[i]['tarifa']+'</option>');
	      }
	});
}
</script>
