<div id="spinner-div"></div>
<div class="well">
    <fieldset>
        <div class="row">
            <? foreach ($bancos as $banco) { ?>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <a onclick="Enviar(<?= $banco->id_banco ?>)">
                        <div class="well well-sm txt-color-white text-center link_dashboard" style="background:#60a917">
                            <i class="fa fa-bank fa-3x"></i>
                            <h5><?= $banco->descripcion; ?></h5>
                        </div>	
                    </a>
                </div>
            <?php } ?>
        </div>
    </fieldset>
</div>
<script type="text/javascript">
    function Enviar(banco) {
        bootbox.dialog({
            message: "Estas Seguro(a) <br> El pago tendrá un plazo de 24 horas para ser realizado de lo contrarió deberá realizar de nuevo la petición.",
            title: "Pago",
            className: "",
            buttons: {
                success: {
                    label: "Aceptar",
                    className: "btn-success",
                    callback: function () {
                        setiniciarSpinner();
                        Registrar(banco);
                    }
                },
                cancelar: {
                    label: "Cancelar",
                    className: "btn-danger",
                    callback: function () {
                    }
                }
            }
        })
    }
    function Registrar(banco) {
        $.ajax({
            data: {
                banco: banco,
            },
            type: "post",
            url: "RegistrarVentaConsignacion",
            success: function (msg) {
                FinalizarSpinner();
                bootbox.dialog({
                    message: msg,
                    title: "Pago",
                    className: "",
                    buttons: {
                        success: {
                            label: "Aceptar",
                            className: "btn-success",
                            callback: function () {
                                window.location = "/ov/dashboard";
                            }
                        }
                    }
                })
            }
        });
    }
</script>
