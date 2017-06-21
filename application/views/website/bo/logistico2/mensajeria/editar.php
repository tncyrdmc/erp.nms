<form class="smart-form" method="POST" action="/bo/proveedor_mensajeria/actualizar_proveedor">
    <fieldset>
        <input type="text" name="id" class="hide" value="<?php echo $proveedor[0]->id; ?>"/>
        <div class="row">
            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Nombre de empresa
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de empresa"class="form-control" value="<?php echo $proveedor[0]->nombre_empresa; ?>" required />
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Razón Social
                    <input type="text" class="form-control" name="razon_social" placeholder="Razon social"class="form-control" value="<?php echo $proveedor[0]->razon_social; ?>" required />
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Idioma
                    <input type="text" class="form-control" name="idioma" placeholder="Idioma"class="form-control" value="<?php echo $proveedor[0]->idioma; ?>" required />
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label class="select">País
                    <select id="pais" required name="pais" onChange="CiudadesPais()">
                        <option value="-" selected>-- Seleciona un país --</option>
                        <? foreach ($paises as $key) {
                            if ($proveedor[0]->id_pais == $key->Code) {
                                ?>
                                <option value="<?= $key->Code ?>" selected><?= $key->Name ?></option>
                            <?php } else { ?>
                                <option value="<?= $key->Code ?>"><?= $key->Name ?></option>
                            <? }
                        }
                        ?>
                    </select>
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="select">Estado/Departamento
                    <select id="departamento" name="estado" onChange="CiudadesDepartamento()" required>
                        <? foreach ($departamentos as $key) {
                            if ($proveedor[0]->estado == $key['id']) {
                                ?>
                                <option value="<?= $key['id'] ?>" selected><?= $key['Name'] ?></option>
                            <?php } else { ?>
                                <option value="<?= $key['id'] ?>"><?= $key['Name'] ?></option>
    <? }
}
?>
                    </select>
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="select">Municipio/Ciudad
                    <select id="municipio" required name="municipio">
                        <? foreach ($ciudades2 as $key) {
                            if ($proveedor[0]->municipio == $key['id']) {
                                ?>
                                <option value="<?= $key['id'] ?>" selected><?= $key['Name'] ?></option>
    <?php } else { ?>
                                <option value="<?= $key['id'] ?>"><?= $key['Name'] ?></option>
    <? }
}
?>
                    </select>
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Colonia
                    <input type="text" class="form-control" name="colonia" placeholder="Colonia"class="form-control" value="<?php echo $proveedor[0]->colonia; ?>" required />
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Dirección
                    <input type="text" class="form-control" name="direccion" placeholder="Direccion de empresa"class="form-control" value="<?php echo $proveedor[0]->direccion; ?>" required />
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Código Postal
                    <input type="text" class="form-control" name="codigo_postal" placeholder="Codigo Postal" class="form-control" value="<?php echo $proveedor[0]->codigo_postal; ?>" required />
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Dirección Web
                    <input type="text" class="form-control" name="web" placeholder="URL del sitio web" class="form-control" value="<?php echo $proveedor[0]->direccion_web; ?>" required />
                </label>
            </div>
        </div>


        <div class="row">
            <header>Contacto N° 1</header>
            <input type="text" name="id_contacto1" class="hide" value="<?php echo $contactos[0]->id; ?>" />
            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Nombre
                    <input type="text" class="form-control" name="nommbre_contacto1" placeholder="Nombre de persona de contacto" class="form-control" value="<?php echo $contactos[0]->nombre; ?>" required />
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Apellido
                    <input type="text" class="form-control" name="apellido_contacto1" placeholder="Apellido de persona de contacto" class="form-control" value="<?php echo $contactos[0]->apellido; ?>" required />
                </label>
            </div>

<?php
$telefono_movil = explode("/", $contactos[0]->telefono_movil);
foreach ($telefono_movil as $telefono) {
    ?>
                <div class="col col-xs-12 col-sm-6 col-lg-6">
                    Teléfono Movil<label for="" class="input">
                        <i class="icon-prepend fa fa-phone"></i>
                        <input name="telefonomovil1[]" placeholder="Teléfono Movil" data-mask="999 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" value="<?php echo $telefono; ?>">
                    </label>
                </div>
<?php } ?>
<?php
$telefono_movil = explode("/", $contactos[0]->telefono_fijo);
foreach ($telefono_movil as $telefono) {
    ?>
                <div class="col col-xs-12 col-sm-6 col-lg-6">
                    Teléfono Fijo<label for="" class="input">
                        <i class="icon-prepend fa fa-phone"></i>
                        <input name="telefonofijo1[]" placeholder="Teléfono Fijo" data-mask=" (999) 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" value="<?php echo $telefono; ?>">
                    </label>
                </div>
<?php } ?>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                E-mail
                <label for="" class="input">
                    <i class="icon-prepend fa fa-envelope-o"></i>
                    <input type="email" class="form-control" name="email_contacto1" placeholder="Email de la persona de contacto"class="form-control" value="<?php echo $contactos[0]->mail; ?>" required />
                </label>
            </div>
            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Puesto
                    <input type="text" class="form-control" name="puesto_contacto1" placeholder="Puesto de la persona de contacto" class="form-control" value="<?php echo $contactos[0]->puesto; ?>" />
                </label>
            </div>
        </div>

        <div class="row">
            <header>Contacto N° 2</header>

            <input type="text" name="id_contacto2" class="hide" value="<?php echo count($contactos) == 2 ? $contactos[1]->id : ''; ?>" />
            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Nombre
                    <input type="text" class="form-control" name="nommbre_contacto2" placeholder="Nombre de persona de contacto"class="form-control" value="<?php echo count($contactos) == 2 ? $contactos[1]->nombre : ''; ?>" />
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                <label for="" class="input">Apellido
                    <input type="text" class="form-control" name="apellido_contacto2" placeholder="Apellido de persona de contacto"class="form-control" value="<?php echo count($contactos) == 2 ? $contactos[1]->apellido : ''; ?>" />
                </label>
            </div>
            <?php
            $telefono_movil = explode("/", count($contactos) == 2 ? $contactos[1]->telefono_movil : '0/0/0');
            foreach ($telefono_movil as $telefono) {
                ?>
                <div class="col col-xs-12 col-sm-6 col-lg-6">
                    Teléfono Movil<label for="" class="input">
                        <i class="icon-prepend fa fa-phone"></i>
                        <input name="telefonomovil2[]" placeholder="Teléfono Movil" data-mask="999 999-9999" type="tel" pattern="[0-9]{7,50}" value="<?php echo $telefono == 0 ? '' : $telefono; ?>">
                    </label>
                </div>
            <?php } ?>
            <?php
            $telefono_movil = explode("/", count($contactos) == 2 ? $contactos[1]->telefono_fijo : '0/0/0');
            foreach ($telefono_movil as $telefono) {
                ?>
                <div class="col col-xs-12 col-sm-6 col-lg-6">
                    Teléfono Fijo<label for="" class="input">
                        <i class="icon-prepend fa fa-phone"></i>
                        <input name="telefonofijo2[]" placeholder="Teléfono Fijo" data-mask=" (999) 999-9999" type="tel" pattern="[0-9]{7,50}" value="<?php echo $telefono == 0 ? '' : $telefono; ?>">
                    </label>
                </div>
<?php } ?>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                E-mail<label for="" class="input">
                    <i class="icon-prepend fa fa-envelope-o"></i>
                    <input type="email" class="form-control" name="email_contacto2" placeholder="Email de la persona de contacto" class="form-control" value="<?php echo count($contactos) == 2 ? $contactos[1]->mail : ''; ?>" />
                </label>
            </div>

            <div class="col col-xs-12 col-sm-6 col-lg-6">
                Puesto<label for="" class="input">
                    <input type="text" class="form-control" name="puesto_contacto2" placeholder="Puesto de la persona de contacto"class="form-control" value="<?php echo count($contactos) == 2 ? $contactos[1]->puesto : ''; ?>" />
                </label>
            </div>
        </div>

<?php $i = 0; ?>


    </fieldset>

    <div class="row">
        <section  id="div_subir" class="pull-right" style="margin: 2rem">
            <div >
                <input type="submit" class="btn btn-success" id="boton_subir" value="Actualizar">
            </div>
        </section>
    </div>
</form>
<script type="text/javascript">
    var i =<?php echo $i; ?>;
    function enviar() {

        $.ajax({
            type: "POST",
            url: "/bo/proveedor_mensajeria/crear_proveedor",
            data: $('#nueva').serialize()
        })
                .done(function (msg) {
                    location.href = "/bo/proveedor_mensajeria/listar";
                });//fin Done ajax

    }

    function add_tarifa()
    {
        var code = '<div id="' + i + '" class="row">'

                + '<div class="col col-xs-12 col-sm-6 col-lg-6" id="ciudad">'
                + '<label class="select">Ciudad'
                + '<select name="ciudad_tarifa[]" >'
                + '</select>'
                + '</label>'
                + '</div>'
                + '<div class="col col-xs-12 col-sm-5 col-lg-6">'
                + 'Tarifa<label for="" class="input">'
                + '<i class="icon-prepend fa fa-dollar"></i>'
                + '<input type="number" class="form-control" name="valor_tarifa[]" placeholder=""class="form-control" required />'
                + '<a style="cursor: pointer;" onclick="delete_tarifa(' + i + ')">Eliminar Tarifa <i class="fa fa-minus"></i></a>'
                + '</label>'
                + '</div>'
                + '</div>';
        $("#tarifa").append(code);
        i = i + 1
        CiudadesPais();
    }

    function delete_tarifa(id)
    {
        $("#" + id + "").remove();

    }

    function Departamentos() {
        var pa = $("#pais").val();
        $.ajax({
            type: "POST",
            url: "/bo/proveedor_mensajeria/DepartamentoPais",
            data: {pais: pa}
        })
                .done(function (msg)
                {

                    $('#departamento option').each(function () {
                        $(this).remove();
                    });
                    datos = $.parseJSON(msg);

                    for (var i in datos) {
                        $('#departamento').append('<option value="' + datos[i]['id'] + '">' + datos[i]['Name'] + '</option>');
                    }
                });
    }

    function CiudadesDepartamento() {
        var pa = $("#departamento").val();

        $.ajax({
            type: "POST",
            url: "/bo/proveedor_mensajeria/CiudadDepartamento",
            data: {departamento: pa}
        })
                .done(function (msg)
                {
                    $('#municipio option').each(function () {
                        $(this).remove();
                    });
                    datos = $.parseJSON(msg);
                    for (var i in datos) {
                        $('#municipio').append('<option value="' + datos[i]['id'] + '">' + datos[i]['Name'] + '</option>');
                    }
                });
    }

    function CiudadesPais() {
        var pa = $("#pais").val();

        $.ajax({
            type: "POST",
            url: "/bo/proveedor_mensajeria/CiudadPais",
            data: {pais: pa}
        })
                .done(function (msg)
                {
                    $('#ciudad option').each(function () {
                        $(this).remove();
                    });
                    datos = $.parseJSON(msg);
                    for (var i in datos) {
                        var impuestos = $('#ciudad');
                        $('#ciudad select').each(function () {
                            $(this).append('<option value="' + datos[i]['ID'] + '">' + datos[i]['Name'] + '</option>');

                        });


                    }
                });
        Departamentos()

    }
</script>
