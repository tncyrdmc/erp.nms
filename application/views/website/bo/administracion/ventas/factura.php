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
											</br>
											<div class="pull-right">
												<h1 class="font-300">Factura de venta</h1>
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
														<abbr title="Phone">DNI:</abbr><?php echo $datos_afiliado[0]->keyword;?>
														<br>
														<abbr title="Phone">Dirección:</abbr><?php echo $pais_afiliado[0]->direccion;?>
														<br>
														<abbr title="Phone">País:</abbr><?php echo $pais_afiliado[0]->nombrePais;?> <img class="flag flag-<?=strtolower($pais_afiliado[0]->codigo)?>">
														<br>
														<abbr title="Phone">Email:</abbr> <?php echo $datos_afiliado[0]->email;?>
													</address>
												</div>
												<div class="col-sm-3">
													<div>
														<div>
															<strong>FACTURA NO :</strong>
															<span class="pull-right"> <?php echo $_POST['id'];?> </span>
														</div>
				
													</div>
													<div>
														<div class="">
															<abbr title="Phone"><strong>Fecha de expedición:</strong></abbr><span class="pull-right"> <i ></i> <?php echo $fecha;?> </span>
															<br>
															<br>
															<abbr title="Phone"><strong>Fecha de vencimiento:</strong></abbr><span class="pull-right"> <i ></i> <?php echo $fecha;?> </span>
														</div>
				
													</div>
													<br>

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
												foreach ($mercanciaFactura as $mercancia){										
															echo '<tr> 
																	<td class="text-center"><strong>'.$mercancia->cantidad.'</strong></td>
																	<td class="miniCartProductThumb"><img style="width: 8rem;" src="'.$info_mercancia[$contador]['imagen'].'" alt="img">'.$info_mercancia[$contador]['nombre'].'</td>
																	<td style="max-width: 25rem;"><a href="javascript:void(0);">'.$info_mercancia[$contador]['descripcion'].'</a></td>
																	<td>
												                        <span>$ '.($mercancia->costo_unidad*$mercancia->cantidad).' </span>
																	</td>
																	<td>
																	$ '.$mercancia->impuesto_unidad*$mercancia->cantidad.'
        															<br>'.$mercancia->nombreImpuesto.'
      																<br>
																	</td>
																	<td><strong>$ '.(($mercancia->costo_unidad*$mercancia->cantidad)+($mercancia->impuesto_unidad*$mercancia->cantidad)).'</strong></td>
																</tr>'; 
														$total+=(($mercancia->costo_unidad*$mercancia->cantidad)+($mercancia->impuesto_unidad*$mercancia->cantidad));
														$contador++;
												}
								                   ?>
												</tbody>
											</table>
				
											<div class="invoice-footer">
				
												<div class="row">
													<div class="col-sm-12">
														<div class="invoice-sum-total pull-right">
															<h3><strong>Total a Pagar: <span class="text-success">$ <?php echo $total;?></span></strong></h3>
														</div>
													</div>
				
												</div>
			
											</div>
											<div class="panel panel-default">
  												<div class="panel-body">
													<abbr title="Phone">Observaciones:</abbr><span class="center"> <?php echo $empresa[0]->comentarios;?> </span>
  												</div>
											</div>
										</div>
</div>
