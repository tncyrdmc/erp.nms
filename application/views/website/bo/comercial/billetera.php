<div id="spinner-div"></div>
<div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-right: 0px; margin-left: 0px; padding-bottom: 3rem;" class="row">
	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<form action="/bo/comercial/add_sub_billetera_afiliado" onmouseenter="" method="POST" id="edit" role="form" class="smart-form">
		
			<legend>Modificar Saldo del Afiliado</legend>

			<br><br>

			<div class="form-group">

				<div class="row">
							
									<!-- NEW WIDGET START -->
									<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

										<!-- Widget ID (each widget will need unique ID)-->
										<div class="" id="" data-widget-editbutton="false" data-widget-colorbutton="true">
											<!-- widget options:  jarviswidget jarviswidget-color-purity wid-id-1
											usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
							
											data-widget-colorbutton="false"
											data-widget-editbutton="false"
											data-widget-togglebutton="false"
											data-widget-deletebutton="false"
											data-widget-fullscreenbutton="false"
											data-widget-custombutton="false"
											data-widget-collapsed="true"
											data-widget-sortable="false"
							
											-->
																							<!-- widget content -->
												
												<div style='overflow-y: scroll; height: 280px;'><!-- widget-body --> 
													<div id="" class=""> <!-- myTabContent1 ; tab-content padding-50 -->
													<h1 class="text-center"></h1>
													
													<div class="table-responsive">
													<table class="table">
													<thead>
														<tr>
															<th> <i class="fa fa-sitemap"></i> Red</th>
															<th> <i class="fa fa-money"></i> Comision</th>
														</tr>
													</thead>
													<tbody>
												<?php 
													$total = 0; 
													$i = 0;
													$total_transact = 0;
													
													
													//var_dump($comision_todo);
													
													for ($i = 0 ; $i<sizeof($comision_todo["redes"]);$i++){
														
														$totales = (intval($comision_todo["ganancias"][$i][0]->valor)<>0||sizeof($comision_todo["bonos"][$i])<>0) ? 0 : 'FAIL';													
														
														//echo $totales."|";
														
														if($totales!=='FAIL'){
															echo '<tr class="success" >
																<td colspan="2"><b>'.$comision_todo["redes"][$i]->nombre.'</b></td>
															</tr>';
														}
														
														
														if($comision_todo["ganancias"][$i][0]->valor<>0){
															echo '<tr class="success" >
																<td colspan="2"><i class="fa fa-money"></i>Comisiones</td>
															</tr>';
														
															echo '<tr class="success">
															<td>&nbsp;&nbsp;Comisiones Directas</td>
																<td>$ '.number_format($comision_todo["directos"][$i][0]->valor,2).'</td>
															</tr>';
														
															echo '<tr class="success">
															<td>&nbsp;&nbsp;Comisiones Indirectas</td>
																<td>$ '.number_format($comision_todo["ganancias"][$i][0]->valor - $comision_todo["directos"][$i][0]->valor,2).'</td>
															</tr>';
														
															if($comision_todo["ganancias"][$i][0]->valor){
															/*	echo '<tr class="warning">
																<td>&nbsp;Total</td>
																<td>$ '.number_format(($comision_todo["ganancias"][$i][0]->valor),2).'</td>
															</tr>';*/
																$totales += ($comision_todo["ganancias"][$i][0]->valor);
															}else {
																/*echo '<tr class="warning">
																<td> Total </td>
																<td>$ 0</td>
															</tr>';*/
															}
														
															
														}
														
														if($comision_todo["bonos"][$i]){
															echo '<tr class="success" >
																<td colspan="2"><i class="fa fa-gift"></i>Bonos</td>
															</tr>';
															for ($k=0;$k<sizeof($comision_todo["bonos"][$i]);$k++){
																if($comision_todo["bonos"][$i][$k]->valor<>0){
																	$totales += ($comision_todo["bonos"][$i][$k]->valor);
																	echo '<tr class="success">
																<td>&nbsp;&nbsp;'.$comision_todo["bonos"][$i][$k]->nombre.'</td>
																	<td>$ '.number_format($comision_todo["bonos"][$i][$k]->valor,2).'</td>
																</tr>';
																}
															}
														}
														
														if($totales<>0){
															echo '<tr class="warning">
																<td>&nbsp; Total </td>
																<td>$ '.number_format($totales,2).'</td>
															</tr>';
															$total += ($totales);
														}
														
													}

													?>  
													<tr class="success">
														<td><h4><b>TOTAL</b></h4></td>
														<td>
														<div class="col-md-6">
															<h4><b>$ <?php echo number_format($total,2);?></b></h4>
														</div>
														<?php if($total !== 0){?>
														<div class="col-md-1">
															<a title='Ver detalles' style='cursor: pointer;' class='txt-color-green' onclick='ventas(<?=$id?>);'>
																<i class='fa fa-eye fa-3x'></i>
															</a>
														</div>		
														<?php }?>																										
														</td>
													</tr>
													
													<?php if ($transaction) { ?>	
														<tr class="warning">
															<td ><b>TRANSACCIONES EMPRESA</b></td>
															<td >
																<a title='Ver detalles' style='cursor: pointer;' class='txt-color-green' onclick='ver(<?=$id?>);'>
																				<i class='fa fa-eye fa-3x'></i>
																</a>
															</td>
														</tr>
													<?php if ($transaction['add']) {
															$total_transact+=$transaction['add'];
														?>
														<tr class="warning">
															<td ><b>Total Agregado</b></td>
															<td ><b style="color: green">$ <?php echo number_format($transaction['add'],2);?></b></td>
														</tr>
													<?php } 
													if ($transaction['sub']) {
														$total_transact-=$transaction['sub'];
														?>
														<tr class="warning" >
															<td ><b>Total Quitado</b></td>
															<td ><b style="color: red">$ <?php echo number_format($transaction['sub'],2);?></b></td>
														</tr>
													<?php } ?>
														<tr class="warning">
															<td ><b>TOTAL:</b></td>
															<td ><h4><b >$ <?php echo number_format($total_transact,2);?></b></h4></td>
														</tr>
													<?php	} ?>
													
													</tbody>
													</table>
														
													</div>

													
															<table id="dt_basic" class="table table-striped table-bordered table-hover">
																
																	<?php 
																	$retenciones_total=0;
																	foreach ($retenciones as $retencion) {?>
																	<tr class="danger">
																		<td><b>Retencion por <?php echo $retencion['descripcion']; ?></b></td>
																		<td></td>
																		<td>$ <?php 
																		$retenciones_total+=$retencion['valor'];
																		echo number_format($retencion['valor'],2); ?></td>
																	</tr>
																	<?php $total;
																	} ?>
																
																	<tr class="danger">
																		<td><b>Cobros Pendientes</b></td>
																		<td></td>
																		<td>$ <?php 
																		if($cobroPendientes==null)
																			echo "0";
																		else
																			echo number_format($cobroPendientes,2);
																		?></td> 
																	</tr>
																
																	<?php foreach ($cobro as $cobros){
																	?>
																	<tr class="danger">
																		<td><b>Cobros Pagos</b></td>
																		<td></td>
																		<td>$ 
																		<?php 
																		if($cobros->monto==null){
																		  echo '0';
																		  $cobro=0;
																		}
																		else {
																		  echo number_format($cobros->monto,2);
																		  $cobro=$cobros->monto;
																		}
																		?></td>
																	</tr>
																	<?php 
																	}?>
																	<tr class="info">
																		<td><h4><b>Saldo Neto</b></h4>
																		<td></td>
																		<td><h4><b>$ <?php echo number_format(($total-($cobro+$retenciones_total+$cobroPendientes)+($total_transact)),2); ?></b></h4></td>
																	</tr>
																</table>
														
													</div>
												
												</div>
							

											<!-- end widget div -->
										</div>
										<!-- end widget -->
									
									</article>								
									
											
									
									
								</div>
						<!-- end widget grid -->
							
						</div>
			<input required type="hidden" id="id" name="id" value="<?=$id?>">
			<div class="row">
				<div class="form-group">				
					<legend> </legend>
					<br/>
					<section class="col col-12">
						<label class="textarea"> 	
							Descripción									
							<textarea id="descripcion" name="descripcion" rows="3" cols="60" class="custom-scroll" required></textarea> 
						</label>
					</section>
					<section class="col col-3"></section>
					<section class="col col-3">Digite monto:</section>
					<section class="col col-6">		
						<label class="input">
							<i class="icon-prepend fa fa-money"></i>
							<input name="cobro" type="number" min="1" size="30" class="from-control" id="cobro" required />
						</label>
					</section>					
				</div>
			</div>			
						
			<div class="row">
				<div class="form-group">				
					<legend> </legend>
					<br/>					
					<section class="col col-8"></section>
					<section class="col col-2">
							<button type="submit" id="ADD" class="btn btn-success  btn-next"  >Agregar</button>				
					</section>
					<section class="col col-2">
							<button type="submit" id="SUB" class="btn btn-danger btn-prev"  >Quitar</button>						
					</section>						
					
				</div>
			</div>
			
						
		</form>	<!-- /form -->
	</div>
					
						
</div>
									
		
		




<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>

<script type="text/javascript">
var tipo = "";
$( "#ADD" ).click(function( event ) {
	tipo = "ADD";
});

$( "#SUB" ).click(function( event ) {
	tipo = "SUB";
});

$( "#edit" ).submit(function( event ) {
	event.preventDefault();	
	enviar();
});

function enviar(){
	$.ajax({
		type: "POST",
		url: "/auth/show_dialog",
		data: {message: '¿ Esta seguro que desea Realizar la Transacción ?'},
	})
	.done(function( msg )
	{
		bootbox.dialog({
		message: msg,
		title: 'Eliminar Afiliado',
		buttons: {
			success: {
				label: "Aceptar",
				className: "btn-success",
				callback: function() {
						setiniciarSpinner();	
						$("#edit").append("<input value='"+tipo+"' type='hidden' name='tipo'>");
						$.ajax({
							type: "POST",
							url: "/bo/comercial/add_sub_billetera_afiliado",
							data: $('#edit').serialize()
						}).done(function( msg ) {				
							bootbox.dialog({
								message: msg,
								title: 'ATENCION',
								buttons: {
									success: {
										label: "Aceptar",
										className: "btn-success",
										callback: function() {
												location.href="/bo/comercial/red_tabla";
												FinalizarSpinner();
										}
									}
								}
							})
						});//fin Done ajax	
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

function ventas(id){
	$.ajax({
		type: "POST",
		url: "/ov/billetera2/ventas_comision",
		data: {id: id}
	})
	.done(function( msg )
	{					
		bootbox.dialog({
			message: msg,
			title: 'Detalles de la Comisiones',
			buttons: {
				danger: {
					label: "Cerrar",
					className: "btn-danger",
					callback: function() {

						}
			}
		}})//fin done ajax
	});//Fin callback bootbox
}

</script>
<!-- 
select U.id, UP.nombre, UP.apellido, U.username, U.email, CS.descripcion as sexo,
CEC.descripcion as estado_civil, CTU.descripcion as tipo_usuario, CE.descripcion as estudio,
CO.descripcion as ocupacion, CTD.descripcion as tiempo_dedicado, CEA.descripcion

from users U, user_profiles UP, cat_sexo CS, cat_edo_civil CEC, cat_tipo_usuario CTU,
cat_estudios CE, cat_ocupacion CO, cat_tiempo_dedicado CTD, cat_estatus_afiliado CEA
 
where UP.id_sexo = CS.id_sexo and UP.id_edo_civil = CEC.id_edo_civil and UP.id_tipo_usuario = CTU.id_tipo_usuario
and UP.id_estudio = CE.id_estudio and UP.id_ocupacion = CO.id_ocupacion and U.id = UP.user_id 
and UP.id_tiempo_dedicado = CTD.id_tiempo_dedicado and UP.id_estatus = CEA.id_estatus

 group by (U.id);
 -->
