
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
							<form id="modprod" method="POST" action="/bo/admin/update_mercancia"  role="form">
								
									<section class="col col-6" style="display:none;">
										<label class="select"> 
											<select id="tipo_merc" required="" name="tipo_merc">
										             	<option value="1">merc</option>
										        </select>
										</label>
									</section>
									
									<section class="col col-6" style="display:none;">
										<label class="select"> 
											<select id="id_merc" required name="id_merc">
									                	<option value='<?php echo $id_mercancia?>'>merc</option>
									                </select>
									        </label>
									</section>
									
								<fieldset>
									<legend>Datos del producto</legend>
									<div id="form_mercancia">
										<div class="row">
											<fieldset>
												<section class="col col-12" style="width: 50%;">
													<label class="input">
														Nombre
														<input type="text" value='<?php echo $data_merc[0]->nombre?>' id="nombre_p" name="nombre" required="">
													</label>
												</section>
												
												<section class="col col-12" style="width: 50%;">
													<label class="input">
														Concepto
														<input required type="text" value='<?php echo $data_merc[0]->concepto?>' id="concepto" name="concepto">
													</label>
												</section>
												
												<section class="col col-12" style="width: 50%;">
													<label class="input">
														Marca
														<input type="text" value='<?php echo $data_merc[0]->marca?>' name="marca" id="marca">
													</label>
												</section>
												
												<section class="col col-12" style="width: 50%;">
													<label class="input">
														Código de barras
														<input type="text" value='<?php echo $data_merc[0]->codigo_barras?>' name="codigo_barras">
													</label>
												</section>
												
												<section class="col col-12" style="width: 50%;">Categoría
															<label class="select">
																<select name="grupo">
																<?foreach ($grupos as $key){
																	
																	if ($data_merc[0]->id_grupo == $key->id_grupo){?>
																		<option selected value='<?=$key->id_grupo?>'>
																			<?= $key->descripcion." (".$key->red.")" ?>
																		</option>
																	<? }	else{?>
																		<option value='<?=$key->id_grupo ?>'>
																			<?= $key->descripcion." (".$key->red.")" ?>
																		</option>
																	<? }?>
																<?}?>
																</select>
															</label>
												</section>
											<section class="col col-2" style="width: 50%;">
											<label class="input"><span id="labelextra">Descuento del
													producto</span> 
													<input id="precio_promo" type="number" name="descuento" value='<? echo $mercancia[0]->descuento;?>' required> 
											</label>
											</section>
												
												<div>
													<section style="padding-left: 15px; width: 100%;" class="col col-12">
														Descripcion
														<label class="textarea"> 										
															<textarea name="descripcion" rows="3" class="custom-scroll"><?php echo $data_merc[0]->descripcion?></textarea> 
														</label>
													</section>
													
													
													<section id="imagenes2" class="col col-12">
											        	<label class="label">
											        		Imágen actual
											        	</label>
															<?php foreach ($img as $key)
												                {
												                	echo '<div class="no-padding col-xs-12 col-sm-12 col-md-6 col-lg-6"><img style="max-height: 150px;" src="'.$key[0]->url.'" width="150" height="126"></div>';
												                }
												            ?>
										            </section>
													
													<!--<section id="imagenes" class="col col-12">
														<label class="label"> Imágen </label>
														<div class="input input-file">
															<span class="button"> <input id="img" name="img[]"
																onchange="this.parentNode.nextSibling.value = this.value"
																type="file" multiple>Buscar
															</span><input id="imagen_mr"
																placeholder="Agregar alguna imágen" type="text">
														</div>
														<small><cite
															title="Source Title">Para ver el archivo que va a cargar, pulse con el puntero en el boton de "Buscar"</cite>
														</small>
													</section>-->
													<section id="imagenes" class="col col-6">
														<label class="label">Imágen</label>
														<div class="input input-file">
															<span class="button">
																<input id="img" name="img" onchange="this.parentNode.nextSibling.value = this.value" type="file" multiple>Buscar</span><input id="imagen_mr" placeholder="Agregar alguna imágen" type="text">
															</div>
															<small><cite title="Source Title">Para ver el archivo que va a cargar, pulse con el puntero en el boton de "Buscar"</cite></small>
														</section>
												
												</div>
													
											</fieldset>
											
											<fieldset>
												<legend>Fisicos</legend>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Peso
															<input Required  type="number" value='<?php echo $data_merc[0]->peso?>' min="0" name="peso">
														</label>
													</section>
													
													<section id="colonia" class="col col-12" style="width: 50%;">
														<label class="input">
															Alto
															<input type="number" min="0" value='<?php echo $data_merc[0]->alto?>' name="alto">
														</label>
													</section>
													
													<section id="municipio" class="col col-12" style="width: 50%;">
														<label class="input">
															Ancho
															<input  type="number" min="0" value='<?php echo $data_merc[0]->ancho?>' name="ancho">
														</label>
													</section>
													
													<section id="municipio" class="col col-12" style="width: 50%;">
														<label class="input">
															Profundidad
															<input type="number" min="0" value='<?php echo $data_merc[0]->profundidad?>' name="profundidad">
														</label>
													</section>
													
													<section id="municipio" class="col col-12" style="width: 50%;">
														<label class="input">
															Diametro
															<input type="number" min="0" value='<?php echo $data_merc[0]->diametro?>' name="diametro">
														</label>
													</section>
											</fieldset>
											
											<fieldset id="moneda_field">
												
												<legend>Moneda y país</legend>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Cantidad mínima de venta
															<input type="number" value='<?php echo $data_merc[0]->min_venta?>' name="min_venta">
														</label>
													</section>
													
													<section  class="col col-12" style="width: 50%;">
														<label  class="input">
															Cantidad máxima de venta
															 <input type="number" value='<?php echo $data_merc[0]->max_venta?>' name="max_venta">
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Costo real
															<input required type="number" step="0.0001" value='<?php echo $mercancia[0]->real?>' onchange="calcular_precio_total()" name="real" id="real">
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Costo distribuidores
															<input required type="number" step="0.0001" value='<?php echo $mercancia[0]->costo?>' name="costo" id="costo" onchange="calcular_precio_total()">
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Costo publico
															<input required type="number" step="0.0001" value='<?php echo $mercancia[0]->costo_publico?>' name="costo_publico" id="costo_publico" onchange="calcular_precio_total()">
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Tiempo mínimo de entrega
															<input placeholder="En días" type="number" value='<?php echo $mercancia[0]->entrega?>' name="entrega" >
														</label>
													</section>
													
													<section class="col col-12" style="width: 50%;">Proveedor
														<label class="select">
															<select name="proveedor">
																<?foreach ($proveedores as $key)
																{ if ($mercancia[0]->id_proveedor == $key->user_id){?>
																		<option selected value="<?=$key->user_id?>">
																			<?=$key->nombre." ".$key->apellido?>
																		</option>	
																	<?}	else{?>
																		<option value="<?=$key->user_id?>">
																			<?=$key->nombre." ".$key->apellido?>
																		</option>
																	<?}?>
																<?}?>
															</select>
														</label>
													</section>
													
										
													
													<section class="col col-12" style="width: 50%;">
														<label class="input">
															Puntos comisionables
															<input type="number" min="0" max=""  step="0.01"  value='<?php echo $mercancia[0]->puntos_comisionables?>' name="puntos_com" id="puntos_com">
														</label>
													</section>
													</fieldset>
													<fieldset id="impuesto_field">
													<legend>Impuestos</legend>
																<section class="col col-12" style="width: 50%;">País de la mercancía
														<label class="select">
															<select id="pais2" required name="pais" onChange="select_pais()">
																<?foreach ($pais as $key)
																{	if ($mercancia[0]->pais == $key->Code){?>
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
													<?$i=0?>
													<?foreach($impuestos_merc as $merc)
													{?>	
													<section id="impuesto" name="impuesto">
														<section class="col col-6" id="<?= $i=$i+1?>">Impuesto
															<label class="select">
																<select name="id_impuesto[]" onchange="calcular_precio_total()">
																	<?foreach ($impuesto as $key){
																		if($key->id_pais==$mercancia[0]->pais){
																			?>
																		<?if($merc->id_impuesto==$key->id_impuesto)
																		{?>
																			<option selected value='<?php echo $key->id_impuesto?>' onclick="calcular_precio_total()">
																				<?php echo $key->descripcion.' '.$key->porcentaje.' % (ACTIVO)'?>
																			</option>
																				<?
																						$porcentajeContador+=$key->porcentaje;
																			}
																		else 
																		{?>
																			<option value='<?php echo $key->id_impuesto?>' onclick="calcular_precio_total()">
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
												
								
								
																	</fieldset>
																	<fieldset>
																					<section class="col col-6" style="width: 50%">
														<br>
														<br>
														<a onclick="add_impuesto()" style='cursor: pointer;'>Agregar impuesto<i class="fa fa-plus"></i></a>
													</section>
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
																	</fieldset>
																	</div>
																	<fieldset>
																	<div class="row">
																						<section class="col col-6">
														<label class="input">
															Costo real con IVA
															<input type="text" value="<? echo $valor_total_real ?>" min="1" max="" name="real_iva" id="real_iva" disabled>
														</label>
													</section>
													<section class="col col-6">
														<label class="input">
															Costo distribuidores con IVA
															<input type="text" value="<? echo $valor_total_distribuidores ?>" min="1" max="" name="distribuidores_iva" id="distribuidores_iva" disabled>
														</label>
													</section>
													</div>
													<div class="row">
													<section class="col col-6">
														<label class="input">
															Costo público con IVA
															<input type="text" value="<? echo $valor_total_publico ?>" min="1" max="" name="publico_iva" id="publico_iva" disabled>
														</label>
													</section>
									
													</div>
													</fieldset>
					
											</fieldset>
												
											<fieldset>
												<legend>Extra</legend>
													<section class="col col-12" style="width: 33.4%;">Requiere instalación
														<div class="inline-group">
															<?if($data_merc[0]->instalacion==1){?>
																<label class="radio">
															    	<input type="radio" value="1" checked name="instalacion"><i></i>Si
															    </label>
															    <label class="radio">
															    	<input type="radio" value="0" name="instalacion"><i></i>No
															    </label>
															<?}	else {?>
																<label class="radio">
															        <input type="radio" value="1" name="instalacion"><i></i>Si
															    </label>
															    <label class="radio">
															        <input type="radio" value="0" checked name="instalacion"><i></i>No
															    </label>
															<?}?> 
														</div>
													</section>

													
													<section class="col col-12" style="width: 33.3%;">Requiere especificación
														<div class="inline-group">
															<?if($data_merc[0]->especificacion==1){?>
																<label class="radio">
															    	<input type="radio" value="1" checked name="especificacion"><i></i>Si
															    </label>
															    <label class="radio">
															    	<input type="radio" value="0" name="especificacion"><i></i>No
															    </label>
															<?}	else {?>
																<label class="radio">
															        <input type="radio" value="1" name="especificacion"><i></i>Si
															    </label>
															    <label class="radio">
															        <input type="radio" value="0" checked name="especificacion"><i></i>No
															    </label>
															<?}?> 
														</div>
													</section>
													
													<section class="col col-12" style="width: 33.3%;">Requiere producción
														<div class="inline-group">
															<?if($data_merc[0]->produccion==1){?>
																<label class="radio">
															    	<input type="radio" value="1" checked name="produccion"><i></i>Si
															    </label>
															    <label class="radio">
															    	<input type="radio" value="0" name="produccion"><i></i>No
															    </label>
															<?}	else {?>
																<label class="radio">
															        <input type="radio" value="1" name="produccion"><i></i>Si
															    </label>
															    <label class="radio">
															        <input type="radio" value="0" checked name="produccion"><i></i>No
															    </label>
															<?}?> 
														</div>
													</section>
														
													<section class="col col-12" style="width: 50%; padding-left: 80px;">Producto de importación
														<div class="inline-group">
															<?if($data_merc[0]->importacion==1){?>
																<label class="radio">
															    	<input type="radio" value="1" checked name="importacion"><i></i>Si
															    </label>
															    <label class="radio">
															    	<input type="radio" value="0" name="importacion"><i></i>No
															    </label>
															<?}	else {?>
																<label class="radio">
															        <input type="radio" value="1" name="importacion"><i></i>Si
															    </label>
															    <label class="radio">
															        <input type="radio" value="0" checked name="importacion"><i></i>No
															    </label>
															<?}?> 
														</div>
													</section>
														
													<section class="col col-12" style="width: 50%; padding-right: 80px;">Producto de sobrepedido
														<div class="inline-group">
														<?if($data_merc[0]->sobrepedido==1){?>
																<label class="radio">
															    	<input type="radio" value="1" checked name="sobrepedido"><i></i>Si
															    </label>
															    <label class="radio">
															    	<input type="radio" value="0" name="sobrepedido"><i></i>No
															    </label>
															<?}	else {?>
																<label class="radio">
															        <input type="radio" value="1" name="sobrepedido"><i></i>Si
															    </label>
															    <label class="radio">
															        <input type="radio" value="0" checked name="sobrepedido"><i></i>No
															    </label>
															<?}?>
														</div>
													</section>
											</fieldset>
													

							<section class="col col-12 pull-right" >
								<button type="input" class="btn btn-success">
									Actualizar
								</button>
							</section>
							</div>
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
// DO NOT REMOVE : GLOBAL FUNCTIONS!

function add_impuesto()
{
	i=i+1;
	var code=	'<div id="'+i+'"><section class="col col-3" id="impuesto" style="width: 50%;">Impuesto'
	+'<label class="select">'
	+'<select name="id_impuesto[]" onChange="calcular_precio_total()">'
	+'</select>'
	+'</label>'
	+'<a class="txt-color-red" onclick="dell_impuesto('+i+')" style="cursor: pointer;">Eliminar <i class="fa fa-minus"></i></a>'
	+'</section></div>';
	$("#impuesto_field").append(code);
	ImpuestosPais2(i);
	calcular_precio_total();
	//i = i + 1
}

function dell_impuesto(id)
{	
	$("#"+id+"").remove();
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
				  $(this).append('<option value="'+datos[i]['id_impuesto']+'" onclick="calcular_precio_total()">'+datos[i]['descripcion']+' '+datos[i]['porcentaje']+'</option>');
			    
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
		$('#'+id+' option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var impuestos = $('#'+id);
		      $('#'+id+' select').each(function() {
				  $(this).append('<option value="'+datos[i]['id_impuesto']+'" onclick="calcular_precio_total()">'+datos[i]['descripcion']+' '+datos[i]['porcentaje']+'</option>');
			    
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
	if(porcentaje!=false || porcentaje==0){
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
		$("#real_iva").val("falta algun dato dato");
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
ImpuestosPais();	
}
/*$( "#update_merc" ).submit(function( event ) {
	event.preventDefault();
		enviar();
});

function enviar() {
	//iniciarSpinner();
	$.ajax({
						type: "POST",
						url: "/bo/admin/update_mercancia",
						data: $('#update_merc').serialize()
						})
						.done(function( msg ) {

							bootbox.dialog({
						message: "Se ha modificado el producto.",
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
	
}*/


</script>
	</html>
