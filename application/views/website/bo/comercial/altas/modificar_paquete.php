
<!-- MAIN CONTENT -->
<?
$valor_iva_real=0;
$valor_iva_distribuidores=0;
$valor_iva_publico=0;
$valor_total_real=0;
$valor_total_distribuidores=0;
$valor_total_publico=0;
$porcentajeContador=0;
?>
<div id="content">

	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->

				<!-- widget div-->
				<div>
					<div class="widget-body">

						<form method="POST" enctype="multipart/form-data"
							action="/bo/admin/update_mercancia" class="smart-form">

							<section class="col col-6" style="display: none;">
								<label class="select"> <select id="tipo_merc" required
									name="tipo_merc">
										<option value="4">merc</option>
								</select>
								</label>
							</section>

							<section class="col col-6" style="display: none;">
								<label class="select"> <select id="id_merc" required
									name="id_merc">
										<option value='<?php echo $id_mercancia?>'>merc</option>
								</select>
								</label>
							</section>

							<fieldset>
							<legend>País</span></legend>
							<fieldset>
											<section class="col col-12" style="width: 50%;">
											País de la mercancía <label class="select"> <select
												id="pais2" required name="pais" onChange="select_pais()">
													<? foreach ( $pais as $key ) {
														if ($mercancia [0]->pais == $key->Code) {
															?>
															<option selected value="<?=$key->Code?>">
																<?=$key->Name?>
															</option>
														<?}else{?>
															<option value="<?=$key->Code?>">
																<?=$key->Name?>
															</option>
														<?}?>
													<?}?>
												</select>
											</label>
										</section>
										</fieldset>
								<legend>Datos del Paquete de inscripcion</legend>
								<fieldset>

									<section class="col col-6" style="width: 50%">
										<label class="input">Nombre <input required type="text" name="nombre"
											id="nombre_pr" value='<?php echo $data_merc[0]->nombre?>'>
										</label>
									</section>
													<section class="col col-6" style="width: 50%">
														<label class="input">Tiempo de caducidad
															<input required placeholder="En días" type="text" id="caducidad" name="caducidad" value='<?php echo $data_merc[0]->caducidad?>'>
														</label>
														<p class="note">
															<strong>Nota:</strong>
															Si no tiene tiempo de caducidad, por favor coloque un 0 (cero)
														</p>
													</section>

									<section class="col col-12" style="width: 50%">
										Categoría <label class="select"> <select name="red">
														<? foreach ( $grupos as $key ) {
															if ($data_merc [0]->id_red == $key->id_grupo) { ?>
																<option selected value='<?=$key->id_grupo?>'>
																<?= $key->descripcion." (".$key->red.")"?>
															<? }else{?>
																<option value='<?=$key->id_grupo ?>'>
																<?= $key->descripcion." (".$key->red.")"?>
															<? }?>
														<?}?>
											</select>
										</label>
									</section>
									<section class="col col-2" style="width: 50%;">
											<label class="input"><span id="labelextra">Descuento del
													paquete</span> 
													<input required id="precio_promo" type="number" name="descuento" value='<? echo $mercancia[0]->descuento;?>' required/> 
											</label>
										</section>
								</fieldset>
								<fieldset>
								<?$i1=0;?>
													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"
										id="prods">
<?
																		foreach ( $prods as $key_1 ) {
																			?>
								
										<div id="<?= $i1=$i1+1?>a">
										<section class="col col-8" style="width: 50%" id="ProductosPais" name="ProductosPais">
											Productos <label class="select"> <select
												class="custom-scroll" name="producto[]">
												                   	<?
																			
foreach ( $producto as $key ) {
																				if ($key_1->id == $key->id) {
																					?>
												                        	<option selected
														value='<? echo $key->id_mercancia?>'>
												                            	<? echo $key->nombre?> (ACTIVO)
												                            </option>
												                        <?
																				
} else {
																					?>
																			<option value='<? echo $key->id_mercancia?>'>
												                            	<? echo $key->nombre?>
												                            </option>
																		<?
																				
}
																			}
																			?>
																				
											                	</select>
											</label>
										</section>

										<section class="col col-4" style="width: 50%">
											<label class="input">Cantidad de productos <input
												required type="number" min="1" name="n_productos[]" id="prod_qty"
												value='<? echo $key_1->cantidad?>'>
											</label>
										</section>
										<div class=" text-center row">

										<a class='txt-color-red' onclick="delete_product(<?=$i1?>)" style='cursor: pointer;'>Eliminar
											producto <i class="fa fa-minus"> </i>
										</a>
									</div>	
									</div>
									
												<?}?>
												</div>

												<div id="agregar" class=" text-center row">

										<a onclick="new_product(<?=$i1?>)" style='cursor: pointer;'>Agregar
											producto <i class="fa fa-plus"> </i>
										</a>
									</div>		
										<?$i2=0;?>
																			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"
										id="servs">
<?
												foreach ( $servs as $key_1 ) {
													?>
				
										<div id="<?= $i2=$i2+1?>b">
										<section class="col col-8" style="width: 50%" id="ServicioPais" name="ServicioPais">
											Servicios <label class="select"> <select
												class="custom-scroll" name="servicio[]">
												                        <?
													
foreach ( $servicio as $key ) {
														if ($key_1->id == $key->id) {
															?>
														                        <option selected
														value='<? echo $key->id_mercancia?>'>
														                            <? echo $key->nombre?> (ACTIVO)
														                        </option>
													                        <?
														
} else {
															?>
																				<option value='<? echo $key->id_mercancia?>'>
													                            	<? echo $key->nombre?>
													                            </option>
																			<?
														
}
													}
													?>
													            </select>
											</label>
										</section>

										<section class="col col-4" style="width: 50%">
											<label class="input">Cantidad de servicios <input
												required type="number" min="1" name="n_servicios[]" id="serv_qty"
												value='<? echo $key_1->cantidad?>'>
											</label>
										</section>
										<div class=" text-center row">

										<a class='txt-color-red' onclick="delete_service(<?=$i2?>)" style='cursor: pointer;'>Eliminar
											servicio <i class="fa fa-minus"> </i>
										</a>
									</div>
									</div>
									
												<?}?>
												</div>
												
												<div id="agregar1" class=" text-center row">

										<a onclick="new_service(<?=$i1?>)" style='cursor: pointer;'>Agregar
											servicio <i class="fa fa-plus"> </i>
										</a>
									</div>

								</fieldset>

								<div id="moneda">
									<fieldset id="moneda_field">

										<legend>Moneda</legend>

										<section class="col col-2" style="width: 50%;">
											<label class="input"> Costo real <input required type="number"
												name="real" id="real" value='<? echo $mercancia[0]->real?>' onchange="calcular_precio_total()">
											</label>
										</section>

										<section class="col col-2" style="width: 50%;">
											<label class="input">Costo distribuidores <input required type="number"
												name="costo" id="costo"
												value='<? echo $mercancia[0]->costo?>' onchange="calcular_precio_total()">
											</label>
										</section>

										<section class="col col-2" style="width: 50%;">
											<label class="input">Costo publico <input required type="number"
												name="costo_publico" id="costo_publico"
												value='<? echo $mercancia[0]->costo_publico?>' onchange="calcular_precio_total()">
											</label>
										</section>

										<section class="col col-2" style="width: 50%;">
											<label class="input"> Tiempo mínimo de entrega <input
												placeholder="En días" type="number" name="entrega"
												id="entrega" value='<? echo $mercancia[0]->entrega?>'>
											</label>
										</section>

		

										<section class="col col-3" style="width: 50%;">
											<label class="input"> Puntos comisionables <input
												type="number" min="0" max="" name="puntos_com"
												id="puntos_com"
												value='<? echo $mercancia[0]->puntos_comisionables?>'>
											</label>
										</section>
										<?$i=0?>
										
										

									</fieldset>
								</div>
									<fieldset>
									<legend>Impuestos</legend>
										
											<div class="row" id="impuesto_agregar">
														<section class="col col-6">Requiere especificación
																<div class="inline-group">
																	<label class="radio">
																		<input type="radio" value="1" name="iva" onchange="calcular_precio_total()" <?if($mercancia[0]->iva=="CON"){ echo "checked"; }?>>
																		<i></i>con IVA</label>
																		<label class="radio">
																			<input type="radio" value="0" onchange="calcular_precio_total()" name="iva" <?if($mercancia[0]->iva=="MAS"){ echo "checked"; }?>>
																			<i></i>más IVA</label>
																		</div>
																	</section>
										<section class="col col-6" style="width: 50%">
											<br>
											<br>
											<a onclick="add_impuesto()" style='cursor: pointer;'>Agregar impuesto<i class="fa fa-plus"></i></a>
										</section>
																		
															<?$i=0?>
													<?foreach($impuestos_merc as $merc)
													{?>	
													<section id="impuesto" name="impuesto">
														<section class="col col-6" id="<?= $i=$i+1?>">Impuesto
															<label class="select">
																<select name="id_impuesto[]" onclick="calcular_precio_total()">
																	<?foreach ($impuesto as $key){
																		if($key->id_pais==$mercancia[0]->pais){

																			?>
																		
																		
																		<?if($merc->id_impuesto==$key->id_impuesto)
																		{?>
																			<option selected value='<?php echo $key->id_impuesto?>'>
																				<?php echo $key->descripcion.' '.$key->porcentaje.' % (ACTIVO)'?>
																			</option>
																				<? $porcentajeContador+=$key->porcentaje;}
																		else 
																		{?>
																			<option value='<?php echo $key->id_impuesto?>'>
																				<?php echo $key->descripcion.' '.$key->porcentaje.' %'?>
																			</option>
																		<?}?>
																		
																	
																
														<?}
																	}?>	

																	</select>
																		<a class='txt-color-red' onclick="dell_impuesto(<?=$i?>)" style='cursor: pointer;'>Eliminar <i class="fa fa-minus"></i></a>
																	</label>
															
														</section>
														</section>
													<?}?>
													</div>
																				
													</fieldset>	
																										<?
													if($porcentajeContador!=0){
																		$valor_iva_real=($mercancia[0]->real*$porcentajeContador)/100;
																			$valor_iva_distribuidores=($mercancia[0]->costo*$porcentajeContador)/100;
																			$valor_iva_publico=($mercancia[0]->costo_publico*$porcentajeContador)/100;

																		if($mercancia[0]->iva=="CON"){  
																			$valor_total_real=	$mercancia[0]->real/*-$valor_iva_real*/;
																			$valor_total_distribuidores= $mercancia[0]->costo/*-$valor_iva_distribuidores*/;
																			$valor_total_publico=	$mercancia[0]->costo_publico/*-$valor_iva_publico*/;
																		}
																			if($mercancia[0]->iva=="MAS"){
																			$valor_total_real=	$mercancia[0]->real+$valor_iva_real;
																			$valor_total_distribuidores=$mercancia[0]->costo+$valor_iva_distribuidores;
																			$valor_total_publico=	$mercancia[0]->costo_publico+$valor_iva_publico;
																		}}else{
																			$valor_total_real=$mercancia[0]->real;
																			$valor_total_distribuidores=$mercancia[0]->costo;
																			$valor_total_publico=$mercancia[0]->costo_publico;
																		}
													?>	
													<div class="row">	
													<fieldset>							
													<section class="col col-4" style="width: 50%">
														<label class="input">
															Costo real con IVA
															<input type="text" value="<? echo $valor_total_real ?>" min="1" max="" name="real_iva" id="real_iva" disabled>
														</label>
													</section>
													<section class="col col-4" style="width: 50%">
														<label class="input">
															Costo distribuidores con IVA
															<input type="text" value="<? echo $valor_total_distribuidores ?>" min="1" max="" name="distribuidores_iva" id="distribuidores_iva" disabled>
														</label>
													</section>
													</div>
													<section class="col col-4" style="width: 50%">
														<label class="input">
															Costo público con IVA
															<input type="text" value="<? echo $valor_total_publico ?>" min="1" max="" name="publico_iva" id="publico_iva" disabled>
														</label>
													</section>
													</fieldset>	
													

								<div>
									<section style="padding-left: 15px; width: 100%;"
										class="col col-12">
										Descripcion <label class="textarea"> <textarea
												name="descripcion" rows="3" class="custom-scroll"><?php echo $data_merc[0]->Descripcion?></textarea>
										</label>
									</section>


									<section id="imagenes2" class="col col-12">
										<label class="label"> Imágen actual </label>
															<?php
															
															foreach ( $img as $key ) {
																echo '<div class="no-padding col-xs-12 col-sm-12 col-md-6 col-lg-6"><img style="max-height: 150px;" src="' . $key [0]->url . '" width="150" height="126"></div>';
															}
															?>
										            </section>

									<section id="imagenes" class="col col-12">
										<label class="label"> Imágen </label>
										<div class="input input-file">
											<span class="button"> <input id="img" name="img"
												onchange="this.parentNode.nextSibling.value = this.value"
												type="file" multiple>Buscar
											</span><input id="imagen_mr"
												placeholder="Agregar alguna imágen" type="text">
										</div>
										<small><cite title="Source Title">Para ver el archivo que va a
												cargar, pulse con el puntero en el boton de "Buscar"</cite>
										</small>
									</section>


								</div>
							</fieldset>

							<section class="col col-12 pull-right">
								<button type="submit" class="btn btn-success">Actualizar</button>
							</section>

						</form>
					</div>

				</div>
				<!-- end widget div -->

			</article>
			<!-- END COL -->
		</div>

	</section>
	<!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->

<script type="text/javascript">
var i = <?= $i?>;
var ia=0;
var ib=0;
// DO NOT REMOVE : GLOBAL FUNCTIONS!

function new_product(i)
{
	
	$('#prods').append('<div id="'+ia+'aj">'
		+'<section class="col col-8" style="width: 50%" id="ProductosPais'+ia+'" name="ProductosPais'+ia+'">Productos'
		+'<label class="select">'
		+'<select class="custom-scroll"  name="producto[]">'
		+'<?foreach ($producto as $key){?>'
		+'<option value="<? echo $key->id_mercancia?>">'
		+'<? echo $key->nombre?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		+'<section class="col col-4" style="width: 50%">'
		+'<label class="input">Cantidad de productos'
		+'<input type="number" min="1" name="n_productos[]" id="prod_qty" >'
		+'</label>'
		+'</section>'
		+'<div  class=" text-center row">'
		+'<a class="txt-color-red" onclick="delete_product_adicional('+ia+')" style="cursor: pointer;">Eliminar producto' 
		+'<i class="fa fa-minus">'
		+'</i>'
		+'</a>'  
		+'</div>'
		+'</div>');
	ProductoPorPaisAgregado(ia);
	ia = parseInt(ia) + 1;
}

function delete_product(id){
		if((validar_productos()==1 && validar_servicios()==0)||(validar_productos()==0 && validar_servicios()==1)){
	alert("Debe haber al menos un producto o servicio asociado al paquete.");
}else{
$("#"+id+"a").remove();
}
}

function delete_product_adicional(id){
	if((validar_productos()==1 && validar_servicios()==0)||(validar_productos()==0 && validar_servicios()==1)){
		alert("Debe haber al menos un producto o servicio asociado al combinado.");
}else{
	$("#"+id+"aj").remove();
	}
}

function new_service(i)
{

	$('#servs').append('<div id="'+ib+'bj">'
		+'<section class="col col-8" style="width: 50%" id="ServicioPais'+ib+'" name="ServicioPais'+ib+'">Servicios'
		+'<label class="select">'
		+'<select class="custom-scroll" name="servicio[]">'
		+'<?foreach ($servicio as $key){?>'
		+'<option value="<?=$key->id_mercancia?>">'
		+'<?=$key->nombre?></option>'
		+'<?}?>'
		+'</select>'
		+'</label>'
		+'</section>'
		
		+'<section class="col col-4" style="width: 50%">'
		+'<label class="input">Cantidad de servicios'
		+'<input type="number" min="1" name="n_servicios[]" id="serv_qty" >'
		+'</label>'
		+'</section>'
		+'<div  class=" text-center row">'
		+'<a class="txt-color-red" onclick="delete_service_adicional('+ib+')" style="cursor: pointer;">Eliminar servicio' 
		+'<i class="fa fa-minus">'
		+'</i>'
		+'</a>'  
		+'</div>'
		+'</div>');
	ServicioPorPaisAgregado(ib);
	ib = parseInt(ib) + 1;
}
function delete_service(id){
		if((validar_productos()==1 && validar_servicios()==0)||(validar_productos()==0 && validar_servicios()==1)){
	alert("Debe haber al menos un producto o servicio asociado al paquete.");
}else{
$("#"+id+"b").remove();
}
}

function delete_service_adicional(id){
	if((validar_productos()==1 && validar_servicios()==0)||(validar_productos()==0 && validar_servicios()==1)){
	alert("Debe haber al menos un producto o servicio asociado al combinado.");
}else{
	$("#"+id+"bj").remove();
	}
}

function add_impuesto()
{
	var code=	'<div id="imp'+i+'"><section class="col col-3" id="impuesto" style="width: 50%">Impuesto'
	+'<label class="select">'
	+'<select name="id_impuesto[]" onclick="calcular_precio_total();">'
	+'</select>'
	+'</label>'
	+'<a class="txt-color-red" onclick="dell_impuesto_agregado('+i+')" style="cursor: pointer;">Eliminar <i class="fa fa-minus"></i></a>'
	+'</section></div>';
	$("#impuesto_agregar").append(code);
	ImpuestosPais2(i);
	calcular_precio_total();
	i = i + 1
}

function dell_impuesto(id)
{	
	$("#"+id+"").remove();
	calcular_precio_total();
	
}
function dell_impuesto_agregado(id)
{	
	$("#imp"+id+"").remove();
	calcular_precio_total();
	
}

function ImpuestosPais(){
	var pa = $("#pais2").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/mercancia/ImpuestaPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#impuesto option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var impuestos = $('#impuesto');
		      $('#impuesto select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_impuesto']+'">'+datos[i]['descripcion']+' '+datos[i]['porcentaje']+'</option>');
			    
			});
	    	  
	        
	      }
	});
}
function ImpuestosPais2(id){
	var pa = $("#pais2").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/mercancia/ImpuestaPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#imp'+id+' option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var impuestos = $('#imp'+id);
		      $('#imp'+id+' select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_impuesto']+'">'+datos[i]['descripcion']+' '+datos[i]['porcentaje']+'</option>');
			    
			});  
	      }
	});
}

function validar_productos(){
	var  Impuesto = new Array();
	var contador=0;
$('select[name="producto[]"]').each(function() {	
	Impuesto.push($(this).val());
	contador=contador+1;
});	
return contador;
}
function validar_servicios(){
	var  Impuesto = new Array();
	var contador=0;
$('select[name="servicio[]"]').each(function() {	
	Impuesto.push($(this).val());
	contador=contador+1;
});	
return contador;
}

function ProductoPorPaisTodo(){
	var pa = $("#pais2").val();
	var contadorprod=ia;
	var h=0;
	for(h=contadorprod;h>=0;h--){
		
if(document.getElementsByTagName("ProductosPais"+h)){
	
	$.ajax({
		async: false, 
		type: "POST",
		url: "/bo/mercancia/ProductosPorPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#ProductosPais'+h+' option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var ProductosPais = $('#ProductosPais'+h);
		      $('#ProductosPais'+h+' select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_mercancia']+'">'+datos[i]['nombre']+'</option>');
			    
			});
	    	  
	        
	      }
	});

	}}
	ServicioPorPaisTodo();
	ServicioPorPais();
	ProductoPorPais();
}
function ProductoPorPais(){
	var pa = $("#pais2").val();

	
	$.ajax({
		type: "POST",
		url: "/bo/mercancia/ProductosPorPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#ProductosPais option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var ProductosPais = $('#ProductosPais');
		      $('#ProductosPais select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_mercancia']+'">'+datos[i]['nombre']+'</option>');
			    
			});
	    	  
	        
	      }
	});
	ServicioPorPais();
}
function ProductoPorPaisAgregado(id){
	var pa = $("#pais2").val();
	
	
	$.ajax({
		type: "POST",
		url: "/bo/mercancia/ProductosPorPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#ProductosPais'+id+' option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var ProductosPais = $('#ProductosPais'+id);
		      $('#ProductosPais'+id+' select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_mercancia']+'">'+datos[i]['nombre']+'</option>');
			    
			});
	    	  
	        
	      }
	});
	//ServicioPorPais();
}

function ServicioPorPaisTodo(){
	var pa = $("#pais2").val();
	var contadorser=ib;
	var h=0;
	for(h=contadorser;h>=0;h--){
		
if(document.getElementsByTagName("ServicioPais"+h)){
	
	$.ajax({
		async: false, 
		type: "POST",
		url: "/bo/mercancia/ServiciosPorPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#ServicioPais'+h+' option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var ServicioPais = $('#ServicioPais'+h);
		      $('#ServicioPais'+h+' select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_mercancia']+'">'+datos[i]['nombre']+'</option>');
			    
			});
	    	  
	        
	      }
	});

	}}
	ServicioPorPais();
	ProductoPorPais();
}
function ServicioPorPais(){
	var pa = $("#pais2").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/mercancia/ServiciosPorPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#ServicioPais option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var ServicioPais = $('#ServicioPais');
		      $('#ServicioPais select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_mercancia']+'">'+datos[i]['nombre']+'</option>');
			    
			});
	    	  
	        
	      }
	});
}

function ServicioPorPaisAgregado(id){
	var pa = $("#pais2").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/mercancia/ServiciosPorPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#ServicioPais'+id+' option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var ServicioPais = $('#ServicioPais'+id);
		      $('#ServicioPais'+id+' select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_mercancia']+'">'+datos[i]['nombre']+'</option>');
			    
			});
	    	  
	        
	      }
	});
}

function validar_impuesto(){
	var  Impuesto = new Array();
$('select[name="id_impuesto[]"]').each(function() {	
	Impuesto.push($(this).val());
});	
return Impuesto;
}
function validar_tipo_iva(porcentaje, tipo, valor){
	var valor_iva=0;
	valor_iva=((valor)*parseFloat(porcentaje))/(100);
if(tipo=="1"){
	precio_con_iva=valor/*-valor_iva*/;
	return precio_con_iva;
}
if(tipo=="0"){
	precio_con_iva=parseFloat(valor)+valor_iva;
	return precio_con_iva;
}
}


function calcular_porcentaje_total(){
		var  Impuesto=validar_impuesto();
		var resultado=0;
		var porcentaje=0;
		if(Impuesto){
		for(i=0;i<Impuesto.length;i++){
	
	$.ajax({
		async: false,
		type: "POST",
		url: "/bo/mercancia/ImpuestoPaisPorId",
		data: {impuesto: Impuesto[i]}
	})
	.done(function( msg )
	{
		recibir=$.parseJSON(msg);
		porcentaje+=parseInt(recibir[0]["porcentaje"]);
	});
}

return porcentaje;
}else{
	return false;
}
}
function calcular_precio_total(){
var tipo_iva=$("input:radio[name=iva]:checked").val();
var porcentaje=calcular_porcentaje_total();
var Resultado_Final=0;
	var valor_real=$("#real").val();
	var valor_distribuidor=$("#costo").val();
	var valor_publico=$("#costo_publico").val();
	var validar_real=validar_campos_vacios(valor_real);
	var validar_distribuidor=validar_campos_vacios(valor_distribuidor);
	var validar_publico=validar_campos_vacios(valor_publico);
	if(porcentaje!=false){
	if(validar_real==true){
	Resultado_Final=validar_tipo_iva(porcentaje, tipo_iva, valor_real);
	$("#real_iva").val(Resultado_Final);	
		}
		else{$("#real_iva").val("falta algun dato");}
	if(validar_distribuidor==true){
	Resultado_Final=validar_tipo_iva(porcentaje, tipo_iva, valor_distribuidor);
	$("#distribuidores_iva").val(Resultado_Final);
						}
			else{$("#distribuidores_iva").val("falta algun dato");}
	if(validar_publico==true){
	Resultado_Final=validar_tipo_iva(porcentaje, tipo_iva, valor_publico);
	$("#publico_iva").val(Resultado_Final);
						}
		else{$("#publico_iva").val("falta algun dato");}
	}else{
		$("#real_iva").val("falta un dato");
		$("#distribuidores_iva").val("falta un dato");
		$("#publico_iva").val("falta un dato");
	}
}
function validar_campos_vacios(campo){
if(campo=="undefined"){
return false;
}
if(campo==null){
return false;
}
if(campo==""){
return false;
}
return true;
}
function select_pais(){
calcular_precio_total();
ProductoPorPaisTodo()
ImpuestosPais();	
}
/*$( "#update_merc" ).submit(function( event ) {
	event.preventDefault();
	if(contar_producto() || contar_servicio()){
		enviar();

	}else{
		alert("No hay ningun producto o servicio para este pais, debe darlo de alta primero");
	}

});*/
function contar_producto(){
	var contador=0;
$('select[name="producto[]"]').each(function() {	
	if($(this).val()==null){
contador++;
	}
});	
if(contador!=0){
return false;
}
return true;
}

function contar_servicio(){
	var contador=0;

$('select[name="servicio[]"]').each(function() {

		if($(this).val()==null){
contador++;
	}
});	
if(contador!=0){
return false;
}
return true;
}


function enviar() {

	//iniciarSpinner();
	$.ajax({
						type: "POST",
						url: "/bo/admin/update_mercancia",
						data: $('#update_merc').serialize()
						})
						.done(function( msg ) {

							bootbox.dialog({
						message: "Se ha modificado el paquete.",
						title: 'Felicitaciones',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								
								location.href="/bo/comercial/carrito";
								//FinalizarSpinner();
								}
							}
						}
					})
					
						});//fin Done ajax
	
}
</script>
