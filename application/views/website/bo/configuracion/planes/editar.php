
<?php 
	$j=0;
	$j=count($bonos_plan);
	$select_bonos="";
	foreach($bonos as $categoria){
		$select_bonos.="<option value=\'".$categoria->id."\'>".$categoria->nombre."</option>";
	}
?>
<div id="spinner-div"></div>
<form id="planes" name="planes" class="smart-form"  method="POST" action="/bo/planes/actualizar_plan" role="form" > <!--  -->
							<fieldset>
								<input type="text" class="hide" name="id" value="<?php echo $_POST['id']; ?>" id="id">
								<label class="input"> Nombre
								<input type="text" name="nombre" required placeholder="Nombre" id="nombre" style="width: 50%;" class="form-control" value="<?=$plan[0]->nombre; ?>" required>
								</label>
								<label class="input"> Descripcion
								<textarea name="descripcion" placeholder="Descripción" id="descripcion" style="width: 50%;" class="form-control" required ><?=$plan[0]->descripcion; ?></textarea>
								</label>
								<label class="input"> Bonos
								<br>
								</label>

								<div class="row" id="bono">
										<div class="row">
										<div class="col col-lg-3 col-xs-2">
										</div>
										<div class="col col-lg-2 col-xs-2">
											<a style="cursor: pointer;" onclick="add_bono('<?php echo $j+1 ?>')"> Agregar Bono <i class="fa fa-plus"></i></a>
										</div>
									</div>
		
								<?php
								$i=1;
									foreach ($bonos_plan as $bono_plan) {
										echo '<div class="row">';
										
										echo '<div id="'.$i.'" class="row">
										<div class="col col-lg-2">
										</div>';
											echo '<div class="col col-xs-12 col-sm-6 col-lg-3" id="id_bono_plan[]">'.
											'<label class="select">Seleccione Bono</label>'.
											'<label class="select">'.
											'<select id="id_bono_plan[]" name="id_bono_plan[]" onmouseenter="set_bono($(this).val(),\'bono'.$i.'\');" onchange="set_bono($(this).val(),\'bono'.$i.'\');">';
										foreach ($bonos as $categoria) {

											if($bono_plan->id_bono==$categoria->id){
												echo '<option value="'.$categoria->id.'" selected>'.$categoria->nombre.'</option>';
											}else{
												echo '<option value="'.$categoria->id.'">'.$categoria->nombre.'</option>';
											}
											
										}

												echo '</select>'.'</label>'.'';
										if($i>2){
												echo '<a style="cursor: pointer; color: red;" onclick="delete_bono('.$i.')">Suprimir bono <i class="fa fa-minus"></i></a>';
										}
										echo '</div>'.'
											<div id="bono'.$i.'" class="col col-xs-12 col-sm-6 col-lg-7">	
	        								</div>	';											
										
										
										echo ''.'</label>'.'</div>';
										$i++;

										echo '</div><hr/><br/>';

									}
								?>
									
								</div>
							</fieldset>
							<footer>
<button style="margin: 1rem;margin-bottom: 4rem;" type="input" class="btn btn-success">Guardar</button>

							<!-- 	<a class="btn btn-success" onclick="enviar()">
									Guardar
								</a> -->
							</footer>


						</form>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
$( "#planes" ).submit(function( event ) {
	event.preventDefault();	
	enviar();
});

function validar_bonos_repetidos(){
		var bonos = new Array();
		var bono_repetido=false;
$('select[name="id_bono_plan[]"]').each(function() {	
	bonos.push($(this).val());
});	

   for(i=0;i<(bonos.length-1);i++){
     for(j=i+1;j<(bonos.length);j++){
          if(bonos[i]==bonos[j]||!bonos[i]){
          	bono_repetido=true;
          }
 
     }
 }
     return bono_repetido;
}

function enviar() {

		var verificar_plan = false;
		verificar_plan = validar_bonos_repetidos();
		if(verificar_plan!=true){	
			setiniciarSpinner();	
			$.ajax({
				type: "POST",
				url: "/bo/planes/actualizar_plan",
				data: $('#planes').serialize()
			}).done(function( msg ) {				
				bootbox.dialog({
					message: msg,
					title: 'ATENCION',
					buttons: {
						success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
									location.href="/bo/planes/listar";
									FinalizarSpinner();
							}
						}
					}
				})
			});//fin Done ajax			
		}else{
			alert("Ha repetido algun Bono del Plan");
		}
}
var i=1;

function set_bono(idBono,idDivBono)
{	
	$.ajax({
		type: "POST",
		url: "/bo/planes/set_bono",
		data: {idBono : idBono}
		})
		.done(function( msg ) {
			$('#'+idDivBono+'').html(msg);
		});
}

function add_bono(id)
{

	var code=	'<div class="row">'
	+'<div id="A'+i+'" class="row">'
	+'<div class="col col-lg-2">'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-6 col-lg-3">'
		+'<label class="select">Seleccione bono'
		+'<select id="id_bono_plan[]" name="id_bono_plan[]" onmouseenter="set_bono($(this).val(),\'bono'+id+'\');" onChange="set_bono($(this).val(),\'bono'+id+'\');">'		
		+'<?php	echo $select_bonos; ?>'
	+'</select>'
	+'</label>'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-5 col-lg-3">'
			+'<a style="cursor: pointer; color:red;" onclick="delete_bono1('+i+')">Suprimir bono <i class="fa fa-minus"></i></a>'		
	+'</div>'
	+'<div id="bono'+id+'" class="col col-xs-12 col-sm-6 col-lg-7">'
	+'</div>'	
	+'</div>'
	+'</div><hr/><br/>';
	$("#bono").append(code);
	i = i + 1
}
function delete_bono(id)
{	
	$("#"+id+"").remove();
	
}
function delete_bono1(id)
{	
	$("#A"+id+"").remove();
	
}

</script>
