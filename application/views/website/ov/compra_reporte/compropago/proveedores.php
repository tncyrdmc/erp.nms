<div id="spinner-div"></div>
<div class="well">
    <fieldset>
        <div class="row">
            <? foreach ($providers as $provider) { ?>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <a onclick="Enviar('<?= $provider->internal_name ?>', '<?= $provider->name ?>')">
                        <div class="well well-sm txt-color-white text-center link_dashboard" style="background:#3498db">
                            <img src="<?= $provider->image_medium; ?>" alt="<?= $provider->name; ?>">
                            <h5><?= substr($provider->name, 0, 12) ?></h5>
                        </div>	
                    </a>
                </div>
            <?php } ?>
        </div>
    </fieldset>
</div>
<script type="text/javascript">
    function Enviar(id, nombre) {
        bootbox.dialog({
            message: "Estas Seguro(a) que desea pagar desde " + nombre+" ?",
            title: "Pago",
            className: "",
            buttons: {
                success: {
                    label: "Aceptar",
                    className: "btn-success",
                    callback: function () {
                        setiniciarSpinner();
                        Registrar(id);
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
    function Registrar(id) {
        $.ajax({
            data: {
                prov: id,
            },
            type: "post",
            url: "CompropagoRegistrar",
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
