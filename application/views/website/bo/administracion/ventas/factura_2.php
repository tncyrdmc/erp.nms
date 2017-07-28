
<style type="text/css">
.tabl {
	width: 100%;
	max-width: 100%;
	margin-bottom: 18px;
}

.pull-lef {
	float: left !important;
}

.pull-righ {
	float: right;
}

.padding-1 {
	padding: 10px !important;
}

.panel-defaul {
	border-color: #DDD;
}

.pane {
	margin-bottom: 18px;
	background-color: #FFF;
	border: 1px solid transparent;
	border-radius: 2px;
	box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05);
}

.panel-bod {
	padding: 15px;
}
</style>


<div id="facturacion<?=$id?>" class="padding-10">
	<table width="100%">
		<tr>
			<td style="text-align: left">
				<img style="height: 5rem; height: auto; padding: 1rem;" src="/logo.png" alt="">
			</td>
			<td style="text-align: center">
				<h1 class="font-300">Factura de venta</h1>
				<b><?=   "\t".$empresa[0]->nombre ?> </b>
				<br> <abbr title="Phone">Identificador tributario:</abbr><?= $empresa[0]->id_tributaria ?>
				<br> <abbr title="Phone">Dirección:</abbr><?=  $empresa[0]->direccion ?> 
				<br> <abbr title="Phone">Ciudad:</abbr><?=  $empresa[0]->ciudad ?>  
				<br> <abbr title="Phone">Tel:</abbr>&nbsp;<?=  $empresa[0]->fijo ?>  
			</td>
		</tr>
	</table>
	<div class="clearfix"></div>
	<hr/>
	<div class="clearfix"></div>
	<br>
	<div class="row">
		<div style="text-align: left">
				<strong>Facturar a:</strong> <br> <strong>Señor (a).
					<?=  $datos_afiliado[0]->nombre." ".$datos_afiliado[0]->apellido ?> </strong>
				<br> <abbr title="Phone">DNI:</abbr><?=  $datos_afiliado[0]->keyword ?> 
				<br> <abbr title="Phone">Dirección:</abbr><?=  $pais_afiliado[0]->direccion ?> 
				<br> <abbr title="Phone">País:</abbr><?=  $pais_afiliado[0]->nombrePais ?> 
				<img class="flag flag-<?=strtolower($pais_afiliado[0]->codigo)?>"> <br>
				<abbr title="Phone">Email:</abbr><?=  $datos_afiliado[0]->email ?> 
		</div>
		<div style="text-align: right">
			<div>
				<div>
					<strong>FACTURA NO :</strong> <span class="pull-right"><?=  $id ?> </span>
				</div>
				<br/> 
				<div class="">
					<abbr title="Phone"><strong>Fecha de expedición:</strong></abbr>
					<span class="pull-right"> <i></i> <?php echo $fecha;?> </span> 
					<br/> 
					<abbr title="Phone"><strong>Fecha de vencimiento:</strong></abbr>
					<span class="pull-right"> <i></i> <?php echo $fecha;?> </span>
				</div>

			</div>
			<br>

		</div>

	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<span class="center"> <?php echo $empresa[0]->resolucion;?> </span>
		</div>
	</div>
	<div class="clearfix"></div>
	<br>
	<table class="table table-hover" width="100%" border="1">
		<thead>
			<tr>
				<th style="text-align: center">CANTIDAD</th>
				<th style="text-align: center">ITEM</th>
				<th style="text-align: center">DESCRIPCION</th>
				<th style="text-align: center">PRECIO</th>
				<th style="text-align: center">IMPUESTO</th>
				<th style="text-align: center">SUBTOTAL</th>
				<th style="text-align: center"></th>
			</tr>
		</thead>
		<tbody>
			<?php  $contador=0; $total=0; 
			foreach ($mercanciaFactura as $mercancia){
			 ?> 
			<tr>
				<td style="text-align: center"><strong><?=  $mercancia->cantidad ?> </strong></td>
				<td style="text-align: center">
					<img style="height: 6rem;" src="<?=  $info_mercancia[$contador]['imagen'] ?> " alt="img">
					<br/><a href="<?=  site_url($info_mercancia[$contador]['imagen']) ?>" >
					Ver					
					</a> 
				</td>
				<td style="text-align: center">
					<?=  $info_mercancia[$contador]['nombre'] ?><br/>
					<a href="javascript:void(0);"><?=  $info_mercancia[$contador]['descripcion'] ?> </a>
				</td>
				<td style="text-align: center">
					<span>
						$ <?=  ($mercancia->costo_unidad*$mercancia->cantidad) ?>  
					</span>
				</td>
				<td style="text-align: center">$ <?=  $mercancia->impuesto_unidad*$mercancia->cantidad ?>  
					<br>
					<?=  $mercancia->nombreImpuesto ?> 
				</td>
				<td style="text-align: center">
					<strong> $ <?=  (($mercancia->costo_unidad*$mercancia->cantidad)+($mercancia->impuesto_unidad*$mercancia->cantidad)) ?> </strong>
				</td>
			</tr>
			<?php 
			$total+=(($mercancia->costo_unidad*$mercancia->cantidad)+($mercancia->impuesto_unidad*$mercancia->cantidad));
			$contador++; }  ?> 
		</tbody>
	</table>

	<div class="invoice-footer">

		<div class="row">
			<div class="col-sm-12">
				<div class="invoice-sum-total pull-right" style="text-align: right">
					<h4>
						Subtotal: <strong><span class="text-default pull-right">$ <?php echo $total;?> </span></strong>
						<br/>
						Gastos Envio: <strong><span class="text-danger pull-right">$ <?php echo $envio;?> </span></strong>
					</h4>
					<h3>
						Total a Pagar: <strong><span class="text-success pull-right">&nbsp;&nbsp;$ <?php echo $total+$envio;?> </span></strong>
					</h3>
				</div>
			</div>

		</div>

	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<abbr title="Phone">Observaciones:</abbr><span class="center"> <?php echo $empresa[0]->comentarios;?> </span>
		</div>
	</div>
</div>

<script>

$(document).after(imprimir());

function imprimir() {
	 
	  var ficha = document.getElementById('facturacion<?=$id?>');
	  var ventimp = window.open(' ', 'popimpr');
	  ventimp.document.write( ficha.innerHTML );
	  ventimp.document.close();
	  ventimp.print();
	  ventimp.close();
	  location.href='<?=$link?>';
} 

</script>
