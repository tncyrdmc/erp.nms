<link href="/cart/HTML/assets/css/style.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/skin-3.css" rel="stylesheet">

<!-- css3 animation effect for this template -->
<link href="/cart/HTML/assets/css/animate.min.css" rel="stylesheet">

<!-- styles needed by carousel slider -->
<link href="/cart/HTML/assets/css/owl.carousel.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/owl.theme.css" rel="stylesheet">

<!-- styles needed by checkRadio -->
<link href="/cart/HTML/assets/css/ion.checkRadio.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/ion.checkRadio.cloudy.css" rel="stylesheet">

<!-- styles needed by mCustomScrollbar -->
<link href="/cart/HTML/assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">
<div id="content" class="container main-container" style="background-color: #fff;min-height: auto ! important;padding-top: 5rem;padding-bottom: 10rem;"> 
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation" id="cart_cont" style="background: #2980b9 ! important;">
    <div class="navbar-header">
      <a style="color : #fff;margin-left:4rem;" class="navbar-brand titulo_carrito" href="/ov/compras/carrito"> <i class="fa fa-arrow-circle-left"></i> Atras &nbsp;</a> 
      
      <!-- this part for mobile -
      <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
        <div class="input-group">
          <button class="btn btn-nobg getFullSearch" type="button"> <i class="fa fa-search"> </i> </button>
        </div>
        <! /input-group >
        
      </div> -->
    </div>
    
    <!-- this part is duplicate from cartMenu  keep it for mobile -->
    <div class="navbar-cart  collapse">
      <!--/.cartMenu--> 
    </div>
    <!--/.navbar-cart-->
    
    <div class="navbar-collapse collapse">
    </div>
    <!--/.nav-collapse --> 
</div>
<div class="padding-10">
											<div class="pull-left">
												<img style="width: 18rem; height: auto; padding: 1rem;" src="/logo.png" alt="">
				
												<address>
													<h4 class="semi-bold"><?=$empresa[0]->nombre?></h4>
													<abbr title="Phone">Identificador tributario:</abbr><?="\t".$empresa[0]->id_tributaria?>
													<br>
													<abbr title="Phone">Dirección:</abbr><?=$empresa[0]->direccion?>
													<br>
													<abbr title="Phone">Ciudad:</abbr><?=$empresa[0]->ciudad?>
													<br>
													<abbr title="Phone">Tel:</abbr>&nbsp;<?=$empresa[0]->fijo?>
												</address>
											</div>
											<div class="pull-right">
												<h1 class="font-400">Recibo de pago</h1>
											</div>
											<div class="clearfix"></div>
											<br>
											<div class="row">
												<div class="col-sm-9">
													<address>
														<strong>Facturar a:</strong>
														<br>
														<strong>Señor (a). <?php echo $datos_afiliado[0]->nombre." ".$datos_afiliado[0]->apellido;?></strong>
														<br>
														<abbr title="Phone">Número de identificación:</abbr> <?php echo $datos_afiliado[0]->keyword;?>
														<br>
														<abbr title="Phone">Dirección:</abbr> <?php echo $pais_afiliado[0]->direccion;?>
														<br>
														<abbr title="Phone">País:</abbr> <?php echo $pais_afiliado[0]->nombrePais;?> <img class="flag flag-<?=strtolower($pais_afiliado[0]->codigo)?>">
														<br>
														<abbr title="Phone">Email:</abbr> <?php echo $datos_afiliado[0]->email;?>
													</address>
												</div>
												<div class="col-sm-3">

													<div>
														<div class="font-md">

															<abbr title="Phone"><strong>Fecha de expedición:</strong></abbr><span class="pull-right"> <i></i> <?php echo date("Y-m-d");?> </span>
															<br>
															<br>
															<abbr title="Phone"><strong>Fecha de vencimiento:</strong></abbr><span class="pull-right"> <i></i> <?php echo date("Y-m-d");?> </span>
														</div>
				
													</div>
													<hr class="col-md-12" />
													<div class="col-md-12 well well-sm  bg-color-darken txt-color-white no-border">
														<div class="fa-lg">
															Precio :
															<span class="pull-right">$ <?php echo $this->cart->total(); ?> ** </span>
														</div>
													</div>
													<div class="col-md-12 well well-sm  bg-color-green txt-color-white no-border">
														<div class="fa-lg">
															Puntos :
															<span class="pull-right">** <?php echo $puntos; ?> ** </span>
														</div>
													</div>
												</div>
											</div>
																							<div class="panel panel-default">
  													<div class="panel-body">
														<span class="center"> <?php echo $empresa[0]->resolucion;?> </span>
  													</div>
												</div>
											<table class="table table-hover">
												<thead>
													<tr>
														<th class="text-center">Cantidad</th>
														<th>ITEM</th>
														<th>DESCRIPCION</th>
														<th>PUNTOS</th>
														<th>PRECIO</th>
														<th>IMPUESTO</th>
														<th>SUBTOTAL</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
												 <?php
												 
												 $contador=0;
												 $total=0;
												 
								                  	if($this->cart->contents())
													{
														foreach ($this->cart->contents() as $items) 
														{
														
															
															$costoImpuesto=0;
															$nombreImpuestos="";
															$precioUnidad=0;
															$cantidad=$items['qty'];
															
															$precioUnidad=$compras[$contador]['costos'][0]->costo;
															
															foreach ($compras[$contador]['costos'] as $impuesto){
																$costoImpuesto+=$impuesto->costoImpuesto;
																$nombreImpuestos.="".$impuesto->nombreImpuesto."<br>";
															}
															
															if($compras[$contador]['costos'][0]->iva!='MAS'){
																$precioUnidad-=$costoImpuesto;
															}
															
															echo '<tr> 
																	<td class="text-center"><strong>'.$items['qty'].'</strong></td>
																	<td class="miniCartProductThumb"><img style="width: 8rem;" src="'.$compras[$contador]['imagen'].'" alt="img">'.$compras[$contador]['nombre'].'</td>
																	<td style="max-width: 25rem;"><a href="javascript:void(0);">'.$compras[$contador]['descripcion'].'</a></td>
																	<td>
												                        <span> '.($compras[$contador]['puntos']*$cantidad).' </span>
																	</td>
      																<td>
												                        <span>$ '.($precioUnidad*$cantidad).' </span>
																	</td>
																	<td>
																	$ '.($costoImpuesto*$cantidad).'
        															<br>'.$nombreImpuestos.'
      																<br>
																	</td>
																	<td><strong>$ '.number_format(($precioUnidad*$cantidad)+($costoImpuesto*$cantidad),2).'</strong></td>
												                    <td  style="width:5%" class="delete"><a onclick="quitar_producto(\''.$items['rowid'].'\')"> <i class="txt-color-red fa fa-trash-o fa-3x "></i> </a></td>
																</tr>'; 
														$total+=round(($precioUnidad*$cantidad)+($costoImpuesto*$cantidad),2);
														$contador++;
														} 
														
													}
								                  
								                   ?>
											<!--	<tr>
														<td></td>
														<td></td>
														<td></td>
														<td colspan="2">Total</td>
														<td><strong>$ </strong></td>
													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td colspan="2">HST/GST</td>
														<td><strong>13%</strong></td>
													</tr>   -->
												</tbody>
											</table>
															<div class="panel panel-default">
  												<div class="panel-body">
													<abbr title="Phone">Observaciones:</abbr><span class="center"> <?php echo $empresa[0]->comentarios;?> </span>
  												</div>
											</div>
											<div class="invoice-footer">
				
												<div class="row">
				
													<div class="col-sm-8">
														<div class="payment-methods">
															<h1 class="font-300">Metodos de Pago</h1>
															<a onclick="consignacion()" style="margin-left: 1rem;" class="btn btn-success txt-color-blueLight">
																<img src="/template/img/payment/deposito-bancario.jpg" alt="Banco" height="60" width="240">
															</a>
															<?php if($payulatam[0]->estatus=='ACT') {?>
															<a onclick="payuLatam()" style="margin-left: 1rem;" class="btn btn-success txt-color-blueLight">
																<img src="/template/img/payment/payu.jpg" alt="american express" height="60" width="100">
															</a>
															<?php } if($paypal[0]->estatus=='ACT') {?>
															<a onclick="payPal()" style="margin-left: 1rem;" class="btn btn-success txt-color-blueLight">
																<img src="/template/img/payment/paypal.png" alt="paypal" height="60" width="80">
															</a>
															<?php } if($tucompra[0]->estatus=='ACT') {?>
															<a onclick="tucompra()" style="margin-left: 1rem;" class="btn btn-success txt-color-blueLight">
																<img src="/template/img/payment/tucompra.png" alt="tucompra" style="background: #fff" height="60" width="160">
															</a>
															<?php } if($compropago[0]->estatus=='ACT') {?>
															<a onclick="compropago()" style="margin-left: 1rem;" class="btn btn-success txt-color-blueLight">
																<img src="/template/img/payment/compropago.png" alt="compropago" style="background: #fff" height="60" width="160">
															</a>
															<?php }?>
														</div>
													</div>
													
													<div class="col-sm-4">
														<div class="invoice-sum-total pull-right">
															<h4><strong>Subtotal: <span class="text-default pull-right">$ <?php echo $total;?> </span></strong></h4>
															<h4><strong>Gastos Envio: <span class="text-danger pull-right">$ <?php echo $envio;?> </span></strong></h4>															
															<h3><strong>Total a Pagar: <span class="text-success pull-right">&nbsp;&nbsp;$ <?php echo $total+$envio;?> </span></strong></h3>
														</div>
													</div>
				
												</div>
												
												<div class="row">
													<div class="col-sm-12">
														<p class="note">**Para evitar cargos por exceso de penalización , por favor, hacer pagos dentro de los 30 días siguientes a la fecha de vencimiento. Habrá un cargo de interés del 2 % mensual sobre todas las facturas finales.</p>
													</div>
												</div>
				
											</div>

										</div>
</div>

<script>
    paceOptions = {
      elements: true
    };

	function quitar_producto(id)
	{
		
		$.ajax({
			type: "POST",
			url: "/auth/show_dialog",
			data: {message: '¿ Esta seguro que desea Eliminar la mercancia ?'},
		})
		.done(function( msg )
		{
			bootbox.dialog({
				message: msg,
				title: 'Eliminar Mercancia',
				buttons: {
					success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {
						
							$.ajax({
								type: "POST",
								url: "/ov/compras/quitar_producto",
								data: {id:id}
							})
							.done(function( msg )
							{
								window.location.href='/ov/compras/comprar'
							});//Fin callback bootbox
						}
			
					},
						danger: {
						label: "Cancelar!",
						className: "btn-danger",
						callback: function() {

							}
					}
				}
			})
		});
		
	}

	function consignacion(){
		
		$.ajax({
				data:{
					/*id_mercancia : id,
					cantidad : cant*/
				},
					type:"post",
					url:"/ov/compras/SelecioneBanco",
					success: function(msg){
							
							bootbox.dialog({
								message: msg,
								title: "Seleccione Banco",
								className: "",
								buttons: {
									success: {
									label: "Aceptar",
									className: "hide",
									callback: function() {
										 window.location="/ov/dashboard";
										}
									}
								}
							})
						}
					});
					
	}

	function compropago(){
		//alert('Medio de Pago en Desarrollo');
		iniciarSpinner();
		$.ajax({
			type:"post",
			url:"Compropago",
			success: function(msg){
				FinalizarSpinner();
				bootbox.dialog({
					message: msg,
					title: "Pago Via Compropago",
					className: "",
					buttons: {
						success: {
						label: "Cancelar",
						className: "btn-danger",
						callback: function() {
							}
						}
					}
				})
			}
		});	
	}


	function tucompra(){
		//alert('Medio de Pago en Desarrollo');
		iniciarSpinner();
		$.ajax({
			type:"post",
			url:"pagarVentaTucompra",
			success: function(msg){
				FinalizarSpinner();
				bootbox.dialog({
					message: msg,
					title: "Pago Tu Compra",
					className: "",
					buttons: {
						success: {
						label: "Cancelar",
						className: "btn-danger",
						callback: function() {
							}
						}
					}
				})
			}
		});	
	}

	function payuLatam(){
		iniciarSpinner();
		$.ajax({
			type:"post",
			url:"pagarVentaPayuLatam",
			success: function(msg){
				FinalizarSpinner();
				bootbox.dialog({
					message: msg,
					title: "Pago PayuLatam",
					className: "",
					buttons: {
						success: {
						label: "Cancelar",
						className: "btn-danger",
						callback: function() {
							}
						}
					}
				})
			}
		});	
	}

	function payPal(){
		iniciarSpinner();
		$.ajax({
			type:"post",
			url:"pagarVentaPayPal",
			success: function(msg){
				FinalizarSpinner();
				bootbox.dialog({
					message: msg,
					title: "Pago PayPal",
					className: "",
					buttons: {
						success: {
						label: "Cancelar",
						className: "btn-danger",
						callback: function() {
							}
						}
					}
				})
			}
		});	
	}
</script>

