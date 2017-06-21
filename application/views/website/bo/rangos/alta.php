<?php 
	$rangos="";
	foreach($tipo_rango as $categoria){
		$rangos=$rangos."<option value=\'".$categoria->id."\'>".$categoria->nombre."</option>";
	}
?>

	<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>>
								<a href="/bo/configuracion/">Configuración</a> > 
								<a href="/bo/configuracion/compensacion/">Plan de compensacion</a> >
								<a href="/bo/rangos/">Rangos</a>
								> Nuevo rango
							</span>
						</h1>
					</div>
				</div>
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false"
          data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-sortable="false"
          data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false">
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->

						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body no-padding smart-form">
<div>
    <fieldset id="pswd">
		<form id="rangos" action="/bo/rangos/ingresar_rango/" method="POST" role="form">
			<legend>Nuevo Rango</legend><br>
			
			<label style="margin: 1rem;" class="input"><i class="icon-prepend fa fa-check-circle-o"></i>
				<input id='nombre' class="form-control" name="nombre" style="width:200px; height:30px;" placeholder="Nombre" type="text" required>
	        </label>
			<label style="margin: 1rem;">
				<textarea id='desc' class="form-control" name="desc" size="20" cols="20" rows="10" placeholder="Descripción" type="text" required></textarea>
	        </label>
		<div class="form-group" style="width: 100rem;">
	        <div class="row" id="cross_tipo_rango">
									<header>Condiciones</header><br><br>
									<label style="margin: 1rem;width: 50rem;" class="select">Condicion Red
										<select id="condicion_red_afilacion" name="condicion_red_afilacion" style="margin: 1rem;width: 10rem;">
											<option value='EQU'>Equilibrada</option>
											<option value='DEB'>Pata Débil</option>
										</select>
									<p>Nota: Seleccionan todas las patas de la red (Equilibrada) o solo la pata mas débil (Débil) para cumplir la condición.</p><br>
									</label>
									
									<div class="row">
										<div class="col col-lg-3 col-xs-2">
										</div>																	
									</div>

									<div class="row" id="rango">
									<div class="row">
										<div class="col col-lg-3 col-xs-2">
										</div>
									<!-- <div class="col col-lg-2 col-xs-2">
											<a style="cursor: pointer;" onclick="add_rango()"> Agregar Condición <i class="fa fa-plus"></i></a>
										</div>
										-->
									</div>
									<div class="row">
										<div class="col col-lg-2">
										</div>
										<div class="col col-xs-12 col-sm-6 col-lg-2" id="tipo_condicion">
											<label class="select">Tipo Condicion
											<select name="id_tipo_condicion[]" >
													<?php	
														foreach($tipo_rango as $categoria){
															echo "<option value='".$categoria->id."'>".$categoria->nombre."</option>";
														}
													?>
											</select>
											</label>
										</div>
										
										<div class="col col-xs-12 col-sm-5 col-lg-2">
											Valor<label for="" class="input">
												<i class="icon-prepend fa fa-sort"></i>
												<input id="valor_rango[]" type="number" class="form-control" name="valor_rango[]" placeholder=""class="form-control" required />
											</label>		
										</div>
										<div class="col col-xs-12 col-sm-6 col-lg-2" id="tipo_condicion">
											<label class="select">Condición Red
											<select name="condicion_red[]" >
												<option value='DIRECTOS'>Directos Afiliado</option>
												<option value='RED'>Toda La red</option>
											</select>
											</label>
										</div>
										<div class="col col-xs-12 col-sm-6 col-lg-2" id="tipo_condicion">
											<label class="select">Niveles Red
											<select name="nivel_red[]" >
												<option value='0'>0</option>
												<option value='1'>1</option>
												<option value='2'>2</option>
												<option value='3'>3</option>
												<option value='4'>4</option>
												<option value='5'>5</option>
												<option value='6'>6</option>
												<option value='7'>7</option>
												<option value='8'>8</option>
												<option value='9'>9</option>
												<option value='10'>10</option>
											</select>
											</label>
										</div>
										
									</div>
						
								</div>
								<div id="rangos">
								
								</div>

			<button style="margin: 1rem;margin-bottom: 4rem;" type="input" class="btn btn-success">Crear</button>
			<br>
			<p style="margin: 1.5rem;">Nota:
				<br><b>Tipo Condición :</b> 
					<br>&nbsp&nbsp-(Afiliados en la red) Numero de Afiliados En toda la red del afiliado.
					<br>&nbsp&nbsp-(Ventas en la red) Valor total en $ de las ventas de red del afiliado.
					<br>&nbsp&nbsp-(Compras Personales) Valor total en $ de las compras personales del afiliado.
					<br>&nbsp&nbsp-(Puntos Comisionables) Valor total de los puntos comisionables personales del afiliado.
					<br>&nbsp&nbsp-(Puntos de la Red) Valor total de los puntos comisionables de la red del afiliado.
				<br><b>Condición Red:</b> 
					<br>&nbsp&nbsp-(Directos Afiliados) Selecciona solo los directos del afiliado.
					<br>&nbsp&nbsp-(Toda la Red) Selecciona todos los afiliados de la red Directos e Indirectos.
			</p>
		</form>
    </fieldset>
	</div>
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
			            <br />
			            <br />
			        </div>
		        </div>
			</div>
			<!-- END MAIN CONTENT -->

<script type="text/javascript">
var i=0;

$( "#rangos" ).submit(function( event ) {
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
		iniciarSpinner();
	$.ajax({
						type: "POST",
						url: "/bo/rangos/ingresar_rango",
						data: $('#rangos').serialize()
						})
						.done(function( msg ) {
							
							bootbox.dialog({
						message: "Se ha creado el rango."+msg,
						title: 'Felicitaciones',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								location.href="/bo/rangos/listar";
								FinalizarSpinner();
								}
							}
						}
					})
						});//fin Done ajax
	}else{
		alert("Ha repetido alguna condición del rango");
	}
}

function add_rango()
{

	var code=	'<div id="'+i+'" class="row">'
	+'<div class="col col-lg-2">'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-6 col-lg-2">'
		+'<label class="select">Tipo Condición'
		+'<select name="id_tipo_condicion[]" >'
		+'<?php	echo $rangos; ?>'
	+'</select>'
	+'</label>'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-5 col-lg-2">'
		+'Valor<label for="" class="input">'
			+'<i class="icon-prepend fa fa-sort"></i>'
			+'<input type="number" class="form-control" name="valor_rango[]" placeholder=""class="form-control" required />'
			+'<a style="color: red;cursor: pointer;" onclick="delete_rango('+i+')">Eliminar Rango <i class="fa fa-minus"></i></a>'
		+'</label>'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-6 col-lg-2">'
	+'<label class="select">Condición Red'
	+'<select name="condicion_red[]" >'
		+'<option value="DIRECTOS">Directos Afiliado</option>'
		+'<option value="RED">Toda La red</option>'
	+'</select>'
	+'</label>'
	+'</div>'
	+'<div class="col col-xs-12 col-sm-6 col-lg-2">'
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
	+'</div>';
	$("#rango").append(code);
	i = i + 1
}

function delete_rango(id)
{	
	$("#"+id+"").remove();
	
}


</script>
	


<style>
.link
{
	margin: 0.5rem;
}
.minh
{
	padding: 50px;
}
.link a:hover
{
	text-decoration: none !important;
}
</style>
			
