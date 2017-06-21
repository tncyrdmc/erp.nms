<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<h1 class="page-title txt-color-blueDark">
					<a class="backHome" href="/ov"><i class="fa fa-home"></i> Menu</a> 
				<span>>
					Bonos
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
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false"	>
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
						<span class="widget-icon"> <i class="fa fa-gift"></i> </span>
						<h2>Bonos</h2>				
						
					</header>

					<!-- widget div-->
					<div>
						
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							
						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
						<div class="widget-body">
							<ul id="myTab1" class="nav nav-tabs bordered">
								<li  class="active">
									<a href="#s1" data-toggle="tab">Bonos</a>
								</li>
								<li >
									<a href="#s2" data-toggle="tab">Planes</a>
								</li>
							</ul>
							<div id="myTabContent1" class="tab-content padding-10">
								<div class="tab-pane fade in active" id="s1">
									<div class="row"> 
										<?php if ($bonos) { foreach ($bonos as $bono){ if($bono){?>
										<div class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">			
							<!-- Widget ID (each widget will need unique ID)-->
							
							<!-- end widget -->
				
						<div role="widget" style="" class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-10<?= $bono->id?>" data-widget-editbutton="false"
data-widget-deletebutton="false">
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
								<header role="heading">
								
									<span class="widget-icon"> <i class="fa fa-gift fa-2x"></i> </span>
									<h2>&nbsp; <?= $bono->nombre?> </h2>
				
								<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
				
								<!-- widget div-->
								<div role="content">
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body">
				
										<div class="row">
											<!-- form -->
												<div id="bootstrap-wizard-1" class="col-sm-12">
													<div class="form-bootstrapWizard">
														<ul class="bootstrapWizard form-wizard">
															<li class="active" data-target="#step1">
																<a href="#bono<?= $bono->id?>tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">General</span> </a>
															</li>
															<li data-target="#step2">
																<a href="#bono<?= $bono->id?>tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Condiciones</span> </a>
															</li>
															<!--<li data-target="#step3">
																  <a href="#bono<?= $bono->id?>tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Condiciones</span> </a>
															</li>-->
															<li data-target="#step4">
																<a href="#bono<?= $bono->id?>tab4" data-toggle="tab"> <span class="step">3</span> <span class="title">Valor</span> </a>
															</li>
														</ul>
														<div class="clearfix"></div>
													</div>
													<div class="tab-content">
														<div class="tab-pane active" id="bono<?= $bono->id?>tab1">
															<br><br>
															<div class="well bg-color-teal">
																<div class="jumbotron ">
																	<div class="row">
																		<div class="col-md-4">
																			<h1><i class="fa fa-gift fa-2x"></i></h1>
																		</div>
																		<div class="col-md-8">
																			<h2><strong><?= $bono->nombre?></strong></h2>	
																			<p>
																				<?= $bono->descripcion?>
																			</p>
																		</div>
																	</div>
																	</div>	
																</div>													
														</div> <!-- step1 -->
														<div class="tab-pane" id="bono<?= $bono->id?>tab2">
															<br><br>
															
																<div class="jumbotron ">
																	<div class="row">
															<?php 
															foreach ($condicionesBono as $condicion){
																	
																	if($condicion['id_bono']==$bono->id){
																		
																		echo '<div class="alert alert-warning alert-block">
																		<h4 class="alert-heading">'.$condicion['tipoRango'].'</h4>';
																		echo "Completar el rango <b>".$condicion['nombreRango']."</b> cuando genera <b>".$condicion['condicionRango']."</b> <b>".$condicion['tipoRango']."</b> ";
																		echo "en la red <b>".$condicion['nombreRed']."</b> en";
																		foreach($condicion['condicion1'] as $con){
																			echo ",<b> ".$con."</b>";
																		}
																		foreach($condicion['condicion2'] as $con){
																			echo ",<b> ".$con."</b>";
																		}
																	    echo "<br>";
																		echo "</div>";
																		
																}
															}
															?>
																	</div>
																	
																</div>
														</div><!-- step 2 -->
														<div class="tab-pane" id="bono<?= $bono->id?>tab3">
															<br>
															<h3> condiciones </h3>
														</div><!-- step 3 -->
														<div class="tab-pane" id="bono<?= $bono->id?>tab4">
															<br><br>
																	<div class="row">
																	
															<?php foreach ($valorNiveles as $valorNivel){
																		if($valorNivel->id_bono==$bono->id){
																			echo '<div class="col-md-4">
																				<div class="alert alert-success alert-block">
																			<h4 class="alert-heading">Nivel '.$valorNivel->nivel.'</h4>';
																			
																			echo "<h2>$ ".$valorNivel->valor."</h2><br>";

																			echo "</div></div>";
																			
																		}
																	}
																	?>
																	
																	</div>
														</div><!-- step 4 -->
				
														</div>
												</div>
												<!-- no form -->
										</div>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div></div>
									<?php } } 
									}else{
										echo '<div class="well bg-color-teal ">
																<div class="jumbotron ">
																	<div class="row">
																		<div class="col-md-12 text-center">
																			<h1>--- No hay Bonos disponibles ---</h1>
																		</div>
																	</div>
																	
																</div>
															</div>	';}?>
									</div>
								</div>
								<div class="tab-pane fade" id="s2">
									
									<div class="row">
										<?php if ($planes) { foreach ($planes as $plan){ if($plan){ ?>
										<div class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
				
							<!-- Widget ID (each widget will need unique ID)-->
							
							<!-- end widget -->
				
						<div role="widget" style="" class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-20<?= $plan->id?>" data-widget-editbutton="false" data-widget-deletebutton="false">
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
								<header role="heading">
								
									<span class="widget-icon"> <i class="fa fa-gift"></i> </span>
									<span class="widget-icon"> <i class="fa fa-gift fa-2x"></i> </span>
									<span class="widget-icon"> <i class="fa fa-gift"></i> </span>
									<h2> <?= $plan->nombre?> </h2>
				
								<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
				
								<!-- widget div-->
								<div role="content">
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body">
				
										<div class="row">
											<!-- form -->
												<div id="bootstrap-wizard-1" class="col-sm-12">
													<div class="form-bootstrapWizard">
														<ul class="bootstrapWizard form-wizard">
															<li class="active" data-target="#step1">
																<a href="#plan<?= $plan->id?>tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">General</span> </a>
															</li>
															<li data-target="#step2">
																<a href="#plan<?= $plan->id?>tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Bonos</span> </a>
															</li>
															<!--  <li data-target="#step3">
																<a href="#plan<?= $plan->id?>tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Bonos</span> </a>
															</li>-->
															<li data-target="#step4">
																<a href="#plan<?= $plan->id?>tab4" data-toggle="tab"> <span class="step">3</span> <span class="title">Valor</span> </a>
															</li>
														</ul>
														<div class="clearfix"></div>
													</div>
													<div class="tab-content">
														<div class="tab-pane active" id="plan<?= $plan->id?>tab1">
															<br><br>
															<div class="well bg-color-pinkDark">
																<div class="jumbotron">
																	<div class="row">
																		<div class="col-md-4">
																			<h2><i class="fa fa-gift fa-2x"></i><i class="fa fa-gift fa-3x"></i><i class="fa fa-gift fa-2x"></i></h2>
																		</div>
																		<div class="col-md-8">
																			<h2><strong><?= $plan->nombre?></strong></h2>	
																			<p>
																				<?= $plan->descripcion?>
																			</p>
																		</div>
																	</div>																
																	
																</div>
															</div>																	
														</div> <!-- step1 -->
														<div class="tab-pane" id="plan<?= $plan->id?>tab2">
															<br><br>
															
																	<div class="row">
																	
																	<div class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div role="widget" class="jarviswidget jarviswidget-color-teal" id="wid-id-30<?= $plan->id ?>" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
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
								<header role="heading">
									<span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
									<h2>Bonos del plan</h2>			
									
				
								<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
				
								<!-- widget div-->
								<div role="content">
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				
										<div class="panel-group smart-accordion-default" id="accordion-1">
											<?php foreach ($cross_plan_bonos as $cross){ if($cross->id_plan == $plan->id){?>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapseOne-<?= $plan->id."0".$cross->id_bono; ?>"> 
															<i class="fa fa-fw fa-plus-circle txt-color-green"></i>
															<i class="fa fa-fw fa-minus-circle txt-color-red"></i> 
															<span class="widget-icon"> <i class="fa fa-gift"></i> </span>
																				<?php foreach ($bonos as $bono){ ?>
																					<?= ($bono->id == $cross->id_bono) ? $bono->nombre : ''?>
																				<?php }?> 
														</a>
													</h4>
												</div>
												<div style="height: 0px;" id="collapseOne-<?= $plan->id."0".$cross->id_bono ?>" class="panel-collapse collapse">
													<div class="panel-body">
														<div class="jumbotron ">
																	<div class="row">
															<?php 
															foreach ($plan_bonos as $plan_bono){
																	
																	if($plan_bono['id_plan']==$cross->id_plan&&$plan_bono['id_bono']==$cross->id_bono){
																		
																		echo '<div class="alert alert-warning alert-block">
																		<h4 class="alert-heading">'.$plan_bono['tipoRango'].'</h4>';
																		echo "Completar el rango <b>".$plan_bono['nombreRango']."</b> cuando genera <b>".$plan_bono['condicionRango']."</b> <b>".$plan_bono['tipoRango']."</b> ";
																		echo "en la red <b>".$plan_bono['nombreRed']."</b> en";
																		foreach($plan_bono['condicion1'] as $con){
																			echo ",<b> ".$con."</b>";
																		}
																		foreach($plan_bono['condicion2'] as $con){
																			echo ",<b> ".$con."</b>";
																		}
																	    echo "<br>";
																		echo "</div>";
																		
																}
															}
															?>
																	</div>
																	
																</div>
													</div>
												</div>
											</div>
											<?php } } ?>
										</div>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
				
						</div>
															
																	
																	
																</div>
														</div><!-- step 2 -->
														<div class="tab-pane" id="plan<?= $plan->id?>tab3">
															<br>
															<h3> bonos </h3>
														</div><!-- step 3 -->
														<div class="tab-pane" id="plan<?= $plan->id?>tab4">
															<br><br>
																	<div class="row">
																	
																	<div class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div role="widget" class="jarviswidget jarviswidget-color-teal" id="wid-id-40<?= $plan->id ?>" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
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
								<header role="heading">
									<span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
									<h2>Valores del plan</h2>			
									
				
								<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
				
								<!-- widget div-->
								<div role="content">
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				
										<div class="panel-group smart-accordion-default" id="accordion-2">
											<?php foreach ($cross_plan_bonos as $cross){ if($cross->id_plan == $plan->id){ ?>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="collapsed" data-toggle="collapse" data-parent="#accordion-2" href="#collapseTwo-<?= $plan->id."0".$cross->id_bono; ?>"> 
															<i class="fa fa-fw fa-plus-circle txt-color-green"></i>
															<i class="fa fa-fw fa-minus-circle txt-color-red"></i>
															<span class="widget-icon"> <i class="fa fa-gift"></i> </span>
																				<?php foreach ($bonos as $bono){ ?>
																					<?= ($bono->id == $cross->id_bono) ? $bono->nombre : ''?>
																				<?php }?> 
														</a>
													</h4>
												</div>
												<div style="height: 0px;" id="collapseTwo-<?= $plan->id."0".$cross->id_bono; ?>" class="panel-collapse collapse">
													<div class="panel-body">
													<div class="jumbotron ">
														<div class="row">
																	
															<?php foreach ($valorNiveles as $valorNivel){
																		if($valorNivel->id_bono==$cross->id_bono){
																			echo '<div class="col-md-4">
																				<div class="alert alert-success alert-block">
																			<h4 class="alert-heading">Nivel '.$valorNivel->nivel.'</h4>';
																			
																			echo "<h2>$ ".$valorNivel->valor."</h2><br>";

																			echo "</div></div>";
																			
																		}
																	}
																	?>
																</div>	
														</div>
													</div>
												</div>
											</div>
											<?php } } ?>
										</div>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
				
						</div>
																	
																	</div>
														</div><!-- step 4 -->
				
														</div>
												</div>
												<!-- no form -->
										</div>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div></div>
									<?php } }
										}else{
										echo '<div class="well bg-color-pinkDark ">
																<div class="jumbotron ">
																	<div class="row">
																		<div class="col-md-12 text-center">
																			<h1>--- No hay Planes disponibles ---</h1>
																		</div>
																	</div>
																	
																</div>
															</div>	';}?>
									</div>
																		
								</div>
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
	
	<script src="/template/js/plugin/superbox/superbox.min.js"></script>

	<script type="text/javascript">
		
			// DO NOT REMOVE : GLOBAL FUNCTIONS!
			
			$(document).ready(function() {
				
				pageSetUp();

			});
</script>
