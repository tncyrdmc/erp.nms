			<!-- MAIN CONTENT -->
			<div id="content" >
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
						<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a> 
							<span>>
								<a href="/bo/oficinaVirtual/"> Oficina Virtual</a> 
								> <a href="/bo/notificaciones"> Notificaciones</a> > Alta
							</span>
						</h1>
					</div>
				</div>
<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Error </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>				
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
                <fieldset>
                  <div class="contenidoBotones">
										<div class="row">
<div class="row">
	
	<form class="smart-form col-xs-12 col-sm-6 col-md-7 col-lg-6" method="POST" id="nueva" action="/bo/notificaciones/ingresar_notify" role="form" >
		
		<div class="row">
			<section class="col col-lg-1 col-md-12 col-sm-12 col-xs-12" id="" style="padding-right: 100px ! important;">
				
			</section>
			<section class="col col-lg-10 col-md-12 col-sm-12 col-xs-12" id="" style="padding-right: 100px ! important;">
				<legend><i class="fa fa-comments fa-1x"></i> &nbsp;Nueva Notificación</legend><br>
			</section>
		</div>
		
		
		<div class="row">
			<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-12" id="" style="padding-right: 100px ! important;">
				<label class="label" style="padding-left: 50px;">
					Fecha de Inicio
				</label>
				
				<label class="input" style="padding-left: 50px;">	
					<input required name="fecha_inicio" placeholder=Inicio type="text" id="fecha_inicio">
				</label>	
			</section>
		
			<section class="col col-lg-6 col-md-6 col-sm-6 col-xs-12" id="" style="padding-right: 100px ! important;">
				<label class="label" style="padding-left: 50px;">
					Fecha de Finalizacion
				</label>
				<label class="input" style="padding-left: 50px;">	
					<input required name="fecha_fin" placeholder="Finalizacion" type="text" id="fecha_fin">
				</label>
			</section>
		</div>		
		
		<div class="row">
			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="" style="padding-right: 100px ! important;">
				<label class="label" style="padding-left: 50px;">
					Nombre
				</label>
				
				<label class="input" style="padding-left: 50px;">	
					<input required name="nombre" placeholder="Nombre" type="text" id="nombre">
				</label>	
			</section>
		</div>
		
		<div class="row">
			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="" style="padding-right: 100px ! important;">
				<label class="label" style="padding-left: 50px;">
					Descripcion
				</label>
				<label class="textarea" style="padding-left: 50px;">							
					<textarea required rows="3" class="custom-scroll" name="descripcion"></textarea>
				</label>
			</section>
		</div>		
		
		
		<div class="row">
			<section class="col col-lg-12 col-md-12 col-sm-12 col-xs-6" id="div_subir" style="padding-right: 100px ! important;">
																			
				<div class="col col-lg-6 col-md-6 col-sm-7 col-xs-9" style="padding-left: 50px;">
					<input type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12" id="boton_subir" value="Crear Notificacion">
				</div>
			</section>
		</div>
		
	</form>
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
				<div class="row">         
			        <!-- a blank row to get started -->
			        <div class="col-sm-12">
			            <br />
			            <br />
			        </div>
		        </div>
			</div>
			<!-- END MAIN CONTENT -->
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
		
<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script src="/template/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
		<script src="/template/js/plugin/bootbox/bootbox.min.js"></script>
		<script src="/template/js/plugin/dropzone/dropzone.min.js"></script>
		<script src="/template/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
		<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>

<script type="text/javascript">	

$(function()
		 {
		 	a = new Date();
			año = a.getFullYear()+20;
			$( "#fecha_inicio" ).datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			maxDate: año+"-12-31",
			dateFormat:"yy-mm-dd",
			changeYear: true,
			yearRange: "-0:+99",
			});
		});

$(function()
		 {
		 	a = new Date();
			año = a.getFullYear()+20;
			$( "#fecha_fin" ).datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			maxDate: año+"-12-31",
			dateFormat:"yy-mm-dd",
			changeYear: true,
			yearRange: "-0:+99",
			});
		});

$( "#nueva" ).submit(function( event ) {
	event.preventDefault();
	enviar();
});

function enviar(){
	iniciarSpinner();
	$.ajax({
		type: "POST",
		url: "/bo/notificaciones/ingresar_notify",
		data: $('#nueva').serialize()
	}).done(function( msg ) {
		bootbox.dialog({
			message: msg,
			title: 'ATENCION',
			buttons: {
				success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {										
							location.href="/bo/notificaciones/listar";
							FinalizarSpinner();
					}
				}					
			}
		})
	});//fin Done ajax
}

</script>
