
<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		
			
			
				<?php  if($type=='5'){?>
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>
				> <a href="/bo/inventario/index"> Inventario </a>
				> Bloqueo
				</span>
				</h1>
				</div>
				 <?php }else{?>
				 	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
				<span>> <a href="/bol/dashboard/"> Logistico </a>
				> <a href="/bo/inventario/index"> Inventario </a>
				> Bloqueo
				</span>
				</h1>
				</div>
					<?php }?>
			
		
	</div>
	<?php if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Alerta </strong> '.$this->session->flashdata('error').'
			</div>'; 
	}
?>	

<?php if($this->session->flashdata('success')) {
		echo '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Alerta </strong> '.$this->session->flashdata('success').'
			</div>'; 
	}
?>	
	
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				
			<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
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
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Bloqueo</h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form id="nueva" class="smart-form" method="POST" action="/bo/inventario/bloquear" enctype="multipart/form-data">
							<fieldset>
							
                              <fieldset>
                                <legend>Datos de Entrada</legend>
                                
                                <section  class="col col-3">
                                  <label class="select">Almacen / CEDI
                                    <select id="id_cedi" required type="text" name="id_cedi" onChange="mercanciaDeCedis()">
                                                <option selected value="0">-- Seleciona un Almacen / CEDI --</option>
												<?foreach ($cedis as $cedi){?>
													<option value="<?=$cedi->id_cedi?>"><?=$cedi->nombre." ".$cedi->Name." ".$cedi->pais?></option>
												<?}?>
												
												    </select>
                                  </label>
                                </section>
                                
                                <section class="col col-3">
                                  <label class="select">Mercancia
                                    <select id="mercancia" required type="text" name="mercancia" onChange="cant_disp_y_bloq_cedi()">
                                    </select>  
                                  </label>
                                </section>
                                
                                <section class="col col-3">Disponibles
                                  <label class="input"> <i class="icon-prepend fa fa-unsorted  "></i>
                                    <input id="disponible" value=0 required type="number" min="0" name="disponible" placeholder="Cantidad" readonly>
                                  </label>
                                </section>
                              
                                <section class="col col-3">Bloquear
                                  <label class="input"> <i class="icon-prepend fa fa-unsorted  "></i>
                                    <input id="bloqueados" value=0 required type="number" min="0" name="bloqueados" placeholder="Cantidad">
                                  </label>
                                </section>
                              </fieldset>
                            
                              <footer>
                                <button type="submit" class="btn btn-warning pull-right">
                                  Bloquear
                                </button>
                              </footer>
							 		
							</fieldset>
							
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->	
		</div>
		<div class="row">         
	        <!-- a blank row to get started -->
	        <div class="col-sm-12">
	            <br />
	            <br />
	        </div>
        </div>            
		<!-- END ROW -->
	</section>
	<!-- end widget grid -->
</div>
<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<<script type="text/javascript">

	function mercanciaDeCedis(){
		var cedi = $("#id_cedi").val();
		$.ajax({
			type: "POST",
			url: "/bo/inventario/mercanciaDeCedis",
			data: {id_cedi: cedi}
		})
		.done(function( msg )
		{
			$('#mercancia option').each(function() {   
			        $(this).remove();
			});
			datos=$.parseJSON(msg);
			$('#mercancia').append('<option value="0">-- Seleciona un Producto --</option>');
		      for(var i in datos){
			      $('#mercancia').append('<option value="'+datos[i]['id']+'">'+datos[i]['nombre']+'</option>'); 		        
		      }
		});
	}

	function cant_disp_y_bloq_cedi(){
		var cedi = $("#id_cedi").val();
		var mercancia = $("#mercancia").val();
		$.ajax({
			type: "POST",
			url: "/bo/inventario/cant_disp_y_bloq_cedi",
			data: {id_cedi: cedi, id_prod: mercancia}
		})
		.done(function( msg )
		{
			datos=$.parseJSON(msg);
			//alert(datos[0]['cantidad']);
			      $('#disponible').val(datos[0]['cantidad']); 
			      $('#bloqueados').val(datos[0]['bloqueados']); 		        
		      
		});
	}

function CiudadesPais(){
	var pa = $("#origen").val();
	
	$.ajax({
		type: "POST",
		url: "/bo/proveedor_mensajeria/CiudadPais",
		data: {pais: pa}
	})
	.done(function( msg )
	{
		$('#ciudad option').each(function() {
		    
		        $(this).remove();
		    
		});
		datos=$.parseJSON(msg);
	      for(var i in datos){
		      var impuestos = $('#');
		      $('#ciudad select').each(function() {
				  $(this).append('<option value="'+datos[i]['ID']+'">'+datos[i]['Name']+'</option>');
			    
			});
	    	  
	        
	      }
	});
}
</script>


