<?php 

$checked="";

function tipos($distribucion,$canal){	
	foreach ($distribucion as $dist){
		if($dist->canal == $canal){
			return $dist->mercancia ? explode(",", $dist->mercancia) : '0,0';
		}
	}	
}

function activo($mercancias,$tipo) {	
	foreach ($mercancias as $item){		
		if($item == $tipo){
			return 'checked=""';
		}											
	}
}

?>
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
			
			
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
							> <a href="/bo/comercial"> Comercial</a>
							> <a href="/bo/comercial/mercancia"> Mercancias</a>
							> Configurar
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
				<div class="jarviswidget" id="wid-id-1"
					data-widget-editbutton="false" data-widget-custombutton="false"
					data-widget-colorbutton="false">
					<!-- widget options:
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
					<header>
						<span class="widget-icon"> <i class="fa fa-cogs "></i> 						
						</span>
						<h2>Configurar Mercancias</h2>
					</header>

					<!-- widget div-->
					<div>
						<form id="form_empresa" method="post" action="/bo/mercancia/distribuir" role="form" class="smart-form">
					 <fieldset>
						 <legend>Distribuir las mercancias</legend>
						<table id="dt_basic" class="table table-striped table-bordered table-hover" style="width: 50%">						
							<tr>
								<td>Canales de Distribución</td>
								<?php 
								foreach ($tipos as $tipo){
									echo ($tipo->id == 1) ? "<th>".$tipo->descripcion."</th>" :"";
								}								
								?>
								<td>Parámetros</td>
							</tr> 
							<?php 
							
							foreach ($canales as $canal){
								
									echo "<tr>
												<th>".$canal->nombre."</th>";
									
									$mercancias = tipos($distribucion,$canal->id);																	
									
									foreach ($tipos as $tipo){		
										$checked = $mercancias ? activo ( $mercancias,$tipo->id ) : '';	
										echo ($tipo->id == 1) ? '<td class="text-center">
												<input type="checkbox" name="'.$canal->alias.'[]" '.$checked.' value="'.$tipo->id.'" />
										</td><td><label for="" class="input">
													<i class="icon-prepend fa fa-dollar"></i>
													<input type="number" min="0" step="0.01" name="gastos[]" placeholder="Gastos Envio" value="'.$canal->gastos.'" />
												</label></td>' : '';
									}	
									
									echo "</tr>";
							}?>
							
						</table>

					 </fieldset>
					 
						<footer>
<button style="margin: 1rem;margin-bottom: 4rem;" class="btn btn-success">Actualizar</button>
							</footer>
				</form>
					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
			</article>
			<!-- END COL -->
		</div>
		<div class="row">
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<br /> <br />
			</div>
		</div>
		<!-- END ROW -->
	</section>
</div>

<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>



<script type="text/javascript">

$( "#form_empresa" ).submit(function( event ) {
	event.preventDefault();	
	iniciarSpinner();
	enviar();
});

function enviar()
{

				$.ajax({
						type: "POST",
						url: "/bo/mercancia/distribuir",
						data: $("#form_empresa").serialize()
					})
					.done(function( msg )
					{
						bootbox.dialog({
						message: msg,
						title: 'Empresa',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								FinalizarSpinner();
								location.href="/bo/mercancia/configurar";
								
							}
						}
					}
				})//fin done ajax

					});//Fin callback bootbox
}



</script>