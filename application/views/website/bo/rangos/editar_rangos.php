
<?php 
	$j=0;
	$j=count($RangoVentas);
	$rangos1="";
	foreach($tipo_rango as $categoria){
		$rangos1=$rangos1."<option value=\'".$categoria->id."\'>".$categoria->nombre."</option>";
	}
?>
<div id="spinner-div"></div>
<form id="nueva" name="nueva" class="smart-form" action="/bo/rangos/actualizar_rangos" method="POST"  >
							<fieldset>
								<input type="text" class="hide" name="id" value="<?php echo $_POST['id']; ?>" id="id">
								<label class="input"> Nombre
								<input type="text" name="nombre" required placeholder="Nombre" id="nombre" style="width: 50%;" class="form-control" value="<?php echo $rangos[0]->nombre; ?>" required>
								<label class="input"> Descripción
								<textarea type="text" name="descripcion" required placeholder="Descripción" id="descripcion" style="width: 50%;" class="form-control" value="" required><?php echo $rangos[0]->descripcion; ?></textarea>
								<label class="input"> Condiciones
								<br><br><br>
								</label>
									<label style="width: 10rem;" class="select">Condicion Red
										<select id="condicion_red_afilacion" name="condicion_red_afilacion" style="margin: 1rem;width: 10rem;">
											<?php 
											if($rangos[0]->condicion_red_afilacion=="EQU")
												echo "<option value='EQU' selected>Equilibrada</option>";
											else 
												echo "<option value='EQU'>Equilibrada</option>";
											
											if($rangos[0]->condicion_red_afilacion=="DEB")
												echo "<option value='DEB' selected>Pata Débil</option>";
											else
												echo "<option value='DEB'>Pata Débil</option>";
												
											?>
										</select>
									</label>
								<div class="row" id="rango">
										<div class="row">
										<div class="col col-lg-3 col-xs-2">
										</div>
								<!--  <div class="col col-lg-2 col-xs-2">
											<a style="cursor: pointer;" onclick="add_rango('.<?php echo $j ?>.')"> Agregar Condición <i class="fa fa-plus"></i></a>
										</div> -->
									</div>
		
								<?php
								$i=1;
									foreach ($RangoVentas as $rangoventas) {
										echo '<div class="row">';
										echo '<div id="'.$i.'" class="row">';

										echo '<div class="col col-xs-12 col-sm-6 col-lg-3" id="id_tipo_condicion[]">'.
											'<label class="select">Tipo Condicion</label>'.
											'<label class="select">'.
											'<select id="id_tipo_condicion[]" name="id_tipo_condicion[]" >';
										foreach ($tipo_rango as $categoria) {

											if($rangoventas->id_tipo_rango==$categoria->id){
												echo '<option value="'.$categoria->id.'" selected>'.$categoria->nombre.'</option>';
											}else{
												echo '<option value="'.$categoria->id.'">'.$categoria->nombre.'</option>';
											}

											
										}

												echo '</select>'.'</label>'.'</div>';
												echo '<div class="col col-xs-12 col-sm-3 col-lg-3">Valor<label for="" class="input">'.'<i class="icon-prepend fa fa-sort"></i>'.'<input id="valor_rango[]" type="number" class="form-control" name="valor_rango[]" placeholder=""class="form-control" value="'.$rangoventas->valor.'" required /></div>';
												echo '<div class="col col-xs-12 col-sm-3 col-lg-3">
											<label class="select">Condición Red
											<select id="condicion_red'.$i.'" name="condicion_red[]" >
												<option value="DIRECTOS">Directos Afiliado</option>
												<option value="RED">Toda La red</option>
											</select>
											</label>
										</div>
										<div class="col col-xs-12 col-sm-3 col-lg-3">
											<label class="select">Niveles Red
											<select id="nivel_red'.$i.'" name="nivel_red[]" >
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
											</select>
											</label>
										</div>';
										if($i>1){
											echo '<a style="cursor: pointer; color: red;" onclick="delete_rango('.$i.')">Eliminar Rango <i class="fa fa-minus"></i></a>';
										}
										
										echo ''.'</label>'.'</div>'.'</div>';

										echo '</div>';
										echo '<script>$("#condicion_red'.$i.'").val("'.$rangoventas->condicion_red.'");</script>
											  <script>$("#nivel_red'.$i.'").val("'.$rangoventas->nivel_red.'");</script>';
										$i++;
									}
								?>
									
								</div>
							</fieldset>
							<footer>
<button style="margin: 1rem;margin-bottom: 4rem;" type="input" class="btn btn-success">Guardar</button>

								<!--<a class="btn btn-success" onclick="enviar()">
									Guardar
								</a>-->
							</footer>


						</form>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
	$( "#nueva" ).submit(function( event ) {
	event.preventDefault();
	enviar();
});

	function validar_rangos_repetidos(){
		var  rangos = new Array();
		var rango_repetido=false;
$('select[name="id_tipo_condicion[]"]').each(function() {	
	rangos.push($(this).val());
});	

   for(i=0;i<(rangos.length-1);i++){
     for(j=i+1;j<(rangos.length);j++){
          if(rangos[i]==rangos[j]){
          	rango_repetido=true;
          }
 
     }
 }
     return rango_repetido;
}
function enviar() {
	var verificar_rango=false;
	verificar_rango=validar_rangos_repetidos();
	if(verificar_rango!=true){

		setiniciarSpinner();
	 $.ajax({
							type: "POST",
							url: "/bo/rangos/actualizar_rangos",
							data: $('#nueva').serialize()
						})
						.done(function( msg ) {
							FinalizarSpinner();
									bootbox.dialog({
										message: msg,
										title: "Atención",
										buttons: {
											success: {
											label: "Ok!",
											className: "btn-success",
											callback: function() {
												location.href="/bo/rangos/listar";
												}
											}
										}
									});
						});//fin Done ajax
		}else{
			alert("Ha repetido alguna condición del rango");
		}
}
var i=0;
function add_rango(id)
{

	var code=	'<div class="row">'
	+'<div id="A'+i+'" class="row">'
	+'<div class="col col-xs-12 col-sm-6 col-lg-3">'
		+'<label class="select">Tipo Condición'
		+'<select name="id_tipo_condicion[]" >'
		+'<?php	echo $rangos1; ?>'
	+'</select>'
	+'</label>'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-5 col-lg-3">'
	+'Valor<label for="" class="input">'
		+'<i class="icon-prepend fa fa-sort"></i>'
		+'<input type="number" class="form-control" name="valor_rango[]" placeholder=""class="form-control" required />'
		+'<a style="cursor: pointer; color:red;" onclick="delete_rango1('+i+')">Eliminar Rango <i class="fa fa-minus"></i></a>'
	+'</label>'
+'</div>'
	+'<div class="col col-xs-12 col-sm-6 col-lg-3">'
	+'<label class="select">Condición Red'
	+'<select name="condicion_red[]" >'
		+'<option value="DIRECTOS">Directos Afiliado</option>'
		+'<option value="RED">Toda La red</option>'
	+'</select>'
	+'</label>'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-6 col-lg-3">'
	+'<label class="select">Niveles Red'
	+'<select name="nivel_red[]" >'
	+'<option value="0">0</option>'
	+'<option value="1">1</option>'
	+'<option value="2">2</option>'
	+'	<option value="3">3</option>'
	+'	<option value="4">4</option>'
	+'	<option value="5">5</option>'
	+'	<option value="6">6</option>'
	+'	<option value="7">7</option>'
	+'	<option value="8">8</option>'
	+'	<option value="9">9</option>'
	+'	<option value="10">10</option>'
	+'</select>'
	+'</label>'
	+'</div>'
	+'</div>'
	+'</div>';
	$("#rango").append(code);
	i = i + 1
}
function delete_rango(id)
{	
	$("#"+id+"").remove();
	
}
function delete_rango1(id)
{	
	$("#A"+id+"").remove();
	
}

</script>
