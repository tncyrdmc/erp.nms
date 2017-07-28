<!-- MAIN CONTENT -->
<div id="content">

	<section id="widget-grid">
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

										<div class="col-sm-11 link" style="padding-left: 2em">
											
											
												
												<section class="col-md-5 col-xs-2">
												
												<section class="text-center" style="padding-top: 2em">
												<a onclick="location.href='/CEDI/POS'" class="btn">
													<i class="fa fa-backward"></i> Regresar </a> 
												<a onclick="imprimir('<?="ficha".$items[0]->id_venta?>')" class="btn">
													<i class="fa fa-print"></i> Imprimir Factura</a> 
												</section> 												
												<br>
												<div class="text-center">
													<h5>Total a Pagar</h5><h3>$ <?=number_format($pago,2)?></h3>
													<br/><br/><h5 >Dinero Recibido</h5><h3>$ <?=number_format($saldo,2)?></h3>
													<br/><br/><h5 >Cambio</h5><h3>$ <?=number_format(($saldo-$pago),2)?></h3>
												</div>
												
												<br>
												<section class="text-center" style="padding-top: 2em">
												<form action="emailFactura" method="POST">
													<input type="hidden" name="venta" id="venta" value="<?=$items[0]->id_venta;?>">
													<input type="email" name="email" value="<?=$cliente[0]->email;?>" id="email" required /> 
													<input type="submit" value="Enviar E-Mail" class="btn fa fa-envelope">																									
												</form>
												
												</section> 
												<br/>
												<div class="alert alert-success text-center">
													<strong>Pago realizado con exito</strong><br>
													<a onclick="location.href='/CEDI/POS'">Regresar a la caja</a>
												</div>
														
											</section>
														
														
											<section class="col-md-1 col-xs-12"></section>
														
														
											<section class="col-md-5 col-xs-12">
											
											<div id="Imprime" style="font-size: 12px">
															<br />
															<!-- <iframe frameborder="0" height="100" width="300" src="></iframe> -->
															<table id="<?="ficha".$items[0]->id_venta?>" width="310px" border="0" >
																<tr>
																	<td colspan="3" >
																		<div align="center">
																			<img src="/logo.png" alt="" width="200px"/>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td colspan="2">
																		<br /><strong><?=$empresa[0]->nombre?></strong>
																		<br />Nit: <?=$empresa[0]->id_tributaria?>																		
																		<br/>
																		<br /> <?php 
																		$guion = (($empresa[0]->fijo)&&($empresa[0]->movil))
																			? ' - ' : '';
																		echo "Tel: ".$empresa[0]->fijo.$guion.$empresa[0]->movil
																		?>
																		<br><?=$empresa[0]->provincia.", ".$empresa[0]->ciudad?>
																	</td>
																	<td ><div align="right">
																		ID Cliente: <?=$cliente[0]->user_id?>
																		<br/>
																		<?=$cliente[0]->nombre?><br/><?=$cliente[0]->apellido?>					
																	</div></td>
																</tr>
																<tr>
																	<td ></td>
																	<td colspan="2"><div align="right"><?=date('Y-m-d h:i:s')?></div></td>
																</tr>
																<tr>
																	<td colspan="3">CAJERO: <?=$cajero?></td>
																</tr>
																<tr>
																	<td colspan="3"><br/><br/></td>
																</tr>																														
																<tr>
																	<td colspan="3">
																		<table width="100%">
																			<tr>
																				<td style="text-align:left; min-width:100px">DESCRIPCION</td>																	
																				<td style="text-align:right; min-width:100px">CANT</td>																	
																				<td style="text-align:right; min-width:100px">IMPORTE</td>
																			</tr>																																						
																			<?php 
																			$neto = 0;
																			foreach ($items as $item){
																			$neto += $item->valor;
																			?>
																			<tr>
																				<td colspan="3"><hr style="padding: 0 !important;margin: 0 !important;" /></td>
																			</tr>
																			<tr>
																				<td style="text-align:left; min-width:100px"><?=$item->nombre." ".$item->codigo_barras?></td>
																				<td style="text-align:right; min-width:100px"><?=$item->cantidad?></td>																	
																				<td style="text-align:right; min-width:100px">$ <?=number_format($item->valor,2)?></td>
																			</tr>
																			<?php }?>
																			<tr>
																				<td colspan="3"><hr style="padding: 0 !important;margin: 0 !important;" /></td>
																			</tr>
																			<tr>
																				<td colspan="3"><hr style="padding: 0 !important;margin: 0 !important;" /></td>
																			</tr>
																			<tr>
																				<td colspan="2" style="text-align:right">TOTAL SUMA:</td>
																				<td style="text-align:right"><strong>$ <?=number_format($neto,2)?></strong></td>
																			</tr>
																		</table>
																	</td>
																</tr>
																<tr>
																	<td colspan="3"><br/></td>
																</tr>	
																<?php 
																$articulos = 0;
																foreach ($items as $item){
																	$articulos += $item->cantidad;
																}
																?>
																<tr >
																	<td colspan="3">
																		<table width="100%">
																			<td style="text-align:center">
																				NO. DE ARTICULOS: <strong><?=$articulos?></strong><br/>
																				PUNTOS: <strong><?=$item->total_puntos?></strong>
																			</td>
																			<td style="text-align:center">
																				SUBTOTAL: <strong>$ <?=number_format(($item->valor_total-$item->iva),2)?></strong><br/>
																				IVA: <strong>$ <?=number_format($item->iva,2)?></strong><br/>
																				TOTAL: <strong>$ <?=number_format($item->valor_total,2)?></strong>
																			</td>
																		</table>
																	</td>
																</tr>
																<tr>
																	<td colspan="3">
																		<div style="text-align:center">
																			<br/><br/>
																			<strong>* VENTA AL <?=$items[0]->costo?> *</strong>
																			<br/><br/>
																			FIRMA DEL CLIENTE
																			
																			<br/><br/><br/>
																			________________________________________
																			<br/><br/>
																			GRACIAS POR SU COMPRA
																			<br/>
																			<?=$item->id_venta?>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td colspan="3"><br/><br/></td>
																</tr>	
															</table>
															<table width="310px" border="0" >
																<tr>
																	<td colspan="3" class="text-center">
																		<a onclick="imprimir('<?="ficha".$item->id_venta?>')" class="btn">
																		<i class="fa fa-print"></i> Imprimir Factura</a>
																	</td>
																</tr>
															</table>
															<br>
															<p>
															
															</p> <!-- fin del codigo factura -->
															
														</div>
											
											</section>
												
											
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
	</section>
	<div class="row">
		<!-- a blank row to get started -->
		<div class="col-sm-12">
			<br /> <br />
		</div>
	</div>
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

<script>


function imprimir(nombre) {
	
	  var ficha = document.getElementById(nombre);
	  var ventimp = window.open(' ', 'popimpr');
	  ventimp.document.write( ficha.innerHTML );
	  ventimp.document.close();
	  ventimp.print();
	  ventimp.close();
} 

function email(nombre,mail) {
	
	  //var ficha = document.getElementById(nombre);/*ficha.innerHTML*/
	  
	  var email = prompt("Proporciona Correo Eléctronico:", mail);
	  
	  	$.ajax({
	  		type: "POST",
	  		url: "POS/emailFactura",
	  		data: {
		  		ficha:nombre,
		  		email:email
		  		},
	  	})
	  	.done(function( msg )
	  	{
	  		bootbox.dialog({
	  			message: msg,
	  			title: 'Atención',
	  			buttons: {
	  				success: {
	  					label: "Aceptar!",
	  					className: "btn-success",
	  					callback: function() {
	  	
	  					}
	  				}
	  			}
	  		})
	  		
	  	});
	  
	  
} 
</script>
