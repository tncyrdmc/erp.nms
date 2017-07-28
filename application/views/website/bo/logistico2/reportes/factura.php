
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

<section class="col-md-12 col-xs-12">

    <div id="facturacion<?=$id?>" style="font-size: 12px">
        <br />
        <!-- <iframe frameborder="0" height="100" width="300" src="></iframe> -->
        <table id="<?= "ficha" . $items[0]->id_venta ?>" width="100%" border="0" >
            <tr>
                <td colspan="3" >
                    <div align="center">
                        <img src="/logo.png" alt="" width="200px"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br /><strong><?= $empresa[0]->nombre ?></strong>
                    <br />Nit: <?= $empresa[0]->id_tributaria ?>																		
                    <br/>
                    <br /> <?php
$guion = (($empresa[0]->fijo) && ($empresa[0]->movil)) ? ' - ' : '';
echo "Tel: " . $empresa[0]->fijo . $guion . $empresa[0]->movil
?>
                    <br><?= $empresa[0]->provincia . ", " . $empresa[0]->ciudad ?>
                </td>
                <td>
                    <div align="right">ID Cliente: <?= $cliente[0]->user_id ?><br/>
<?= strtoupper($cliente[0]->nombre . "<br/>" . $cliente[0]->apellido) ?></div>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td colspan="2"><div align="right"><?= $items[0]->fecha_venta ?></div></td>
            </tr>
            <tr>
                <td colspan="3">CAJERO: <?= $cajero ?></td>
            </tr>
            <tr>
                <td colspan="3"><br/><br/></td>
            </tr>																														
            <tr>
                <td colspan="3">
                    <table width="100%">
                        <tr>
                            <td style="text-align:left; min-width:100px">DESCRIPCION</td>																	
                            <td style="text-align:right; min-width:100px">CANT</td>																	
                            <td style="text-align:right; min-width:100px">IMPORTE</td>
                        </tr>																																						
<?php
$neto = 0;
foreach ($items as $item) {
    $neto += $item->valor;
    ?>
                            <tr>
                                <td colspan="3"><hr style="padding: 0 !important;margin: 0 !important;" /></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; min-width:100px"><?= $item->nombre . " " . $item->codigo_barras ?></td>
                                <td style="text-align:right; min-width:100px"><?= $item->cantidad ?></td>																	
                                <td style="text-align:right; min-width:100px">$ <?= number_format($item->valor, 2) ?></td>
                            </tr>
<?php } ?>
                        <tr>
                            <td colspan="3"><hr style="padding: 0 !important;margin: 0 !important;" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><hr style="padding: 0 !important;margin: 0 !important;" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:right">TOTAL SUMA:</td>
                            <td style="text-align:right"><strong>$ <?= number_format($neto, 2) ?></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3"><br/></td>
            </tr>	
<?php
$articulos = 0;
foreach ($items as $item) {
    $articulos += $item->cantidad;
}
?>
            <tr >
                <td colspan="3">
                    <table width="100%">
                        <td style="text-align:center">
                            NO. DE ARTICULOS: <strong><?= $articulos ?></strong><br/>
                            PUNTOS: <strong><?= $item->total_puntos ?></strong>
                        </td>
                        <td style="text-align:center">
                            SUBTOTAL: <strong>$ <?= number_format(($item->valor_total - $item->iva), 2) ?></strong><br/>
                            IVA: <strong>$ <?= number_format($item->iva, 2) ?></strong><br/>
                            TOTAL: <strong>$ <?= number_format($item->valor_total, 2) ?></strong>
                        </td>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div style="text-align:center">
                        <br/><br/>
                        <strong>* VENTA AL <?= $items[0]->costo ?> *</strong>
                        <br/><br/>
                        FIRMA DEL CLIENTE

                        <br/><br/><br/>
                        ________________________________________
                        <br/><br/>
                        GRACIAS POR SU COMPRA
                        <br/>
<?= $item->id_venta ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3"><br/><br/></td>
            </tr>	
        </table>
        <table width="310px" border="0" >
            <tr>
                <td colspan="3" class="text-center">
                    <a onclick="imprimir('<?= "ficha" . $item->id_venta ?>')" class="btn">
                        <i class="fa fa-print"></i> Imprimir Factura</a>
                </td>
            </tr>
        </table>
        <br>
        <p>

        </p> <!-- fin del codigo factura -->

    </div>

</section>

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
