<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <h1 class="page-title txt-color-blueDark">
                <a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
                <span>> <a href="/bol/"> Logistico </a>
                    > <a href="/bo/logistico2/alta"> Alta </a>
                    > <a href="/bo/proveedor_software/"> Proveedor de Mensajería </a>
                    >	Alta
                </span>
            </h1>
        </div>
    </div>
    <?php
    if ($this->session->flashdata('error')) {
        echo '<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								<strong>Alerta </strong> ' . $this->session->flashdata('error') . '
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
                        <h2>Nuevo Proveedor de Mensajería</h2>				

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

                            <form class="smart-form" method="POST" action="/bo/proveedor_mensajeria/crear_proveedor">
                                <fieldset style="padding: 4rem;">
                                    <div class="row">
                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Nombre de empresa
                                                <input type="text" class="form-control" name="nombre" placeholder="Nombre de empresa"class="form-control" required />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Razón Social
                                                <input type="text" class="form-control" name="razon_social" placeholder="Razon social"class="form-control" required />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Idioma
                                                <input type="text" class="form-control" name="idioma" placeholder="Idioma"class="form-control" required />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label class="select">País
                                                <select id="pais" required name="pais" onChange="CiudadesPais()">
                                                    <option value="-" selected>-- Seleciona un país --</option>
                                                    <? foreach ($paises as $key) { ?>
                                                        <option value="<?= $key->Code ?>"><?= $key->Name ?></option>
<?php } ?>
                                                </select>
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="select">Estado/Departamento
                                                <select id="departamento" name="estado" onChange="CiudadesDepartamento()" required>

                                                </select>
                                            </label>
                                            <a style="cursor: pointer;" onclick="new_departamento()"> Nuevo Departamento <i class="fa fa-plus"></i></a>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="select">Municipio/Ciudad
                                                <select id="municipio" required name="municipio">

                                                </select>
                                            </label>
                                            <a style="cursor: pointer;" onclick="new_ciudad()"> Nueva Ciudad <i class="fa fa-plus"></i></a>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Colonia
                                                <input type="text" class="form-control" name="colonia" placeholder="Colonia"class="form-control" required />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Dirección
                                                <input type="text" class="form-control" name="direccion" placeholder="Direccion de empresa"class="form-control" required />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Código Postal
                                                <input type="text" class="form-control" name="codigo_postal" placeholder="Codigo Postal" class="form-control" required />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Dirección Web
                                                <input type="text" class="form-control" name="web" placeholder="URL del sitio web" class="form-control" required />
                                            </label>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <header>Contacto N° 1</header>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Nombre
                                                <input type="text" class="form-control" name="nommbre_contacto1" placeholder="Nombre de persona de contacto"class="form-control" required />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Apellido
                                                <input type="text" class="form-control" name="apellido_contacto1" placeholder="Apellido de persona de contacto" class="form-control" required />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Movil<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonomovil1[]" placeholder="Teléfono Movil 1" data-mask="999 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido"  required>
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Movil<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonomovil1[]" placeholder="Teléfono movil 2" data-mask="999 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" >
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Movil<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonomovil1[]" placeholder="Teléfono movil 3" data-mask="999 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" >
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Fijo<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonofijo1[]" placeholder="Teléfono Fijo 1" data-mask=" (999) 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido"  required>
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Fijo<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonofijo1[]" placeholder="Teléfono fijo 2" data-mask="(999) 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" >
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Fijo<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonofijo1[]" placeholder="Teléfono Fijo 3" data-mask="999 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" >
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            E-mail
                                            <label for="" class="input">
                                                <i class="icon-prepend fa fa-envelope-o"></i>
                                                <input type="email" class="form-control" name="email_contacto1" placeholder="Email de la persona de contacto"class="form-control" required />
                                            </label>
                                        </div>
                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            <label for="" class="input">Puesto
                                                <input type="text" class="form-control" name="puesto_contacto1" placeholder="Puesto de la persona de contacto"class="form-control" />
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <header>Contacto N° 2</header>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Nombre
                                                <input type="text" class="form-control" name="nommbre_contacto2" placeholder="Nombre de persona de contacto"class="form-control" />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-6">
                                            <label for="" class="input">Apellido
                                                <input type="text" class="form-control" name="apellido_contacto2" placeholder="Apellido de persona de contacto"class="form-control" />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Movil<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonomovil2[]" placeholder="Teléfono Movil 1" data-mask="999 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" >
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Movil<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonomovil2[]" placeholder="Teléfono movil 2" data-mask="999 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" >
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Movil<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonomovil2[]" placeholder="Teléfono movil 3" data-mask="999 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" >
                                            </label>
                                        </div>
                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Fijo<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonofijo2[]" placeholder="Teléfono Fijo 1" data-mask=" (999) 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" >
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Fijo<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonofijo2[]" placeholder="Teléfono fijo 2" data-mask="(999) 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" >
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Teléfono Fijo<label for="" class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input name="telefonofijo2[]" placeholder="Teléfono Fijo 3" data-mask="999 999-9999" type="tel" pattern="[0-9]{7,50}" title="Por favor digite un numero de telefono valido" >
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            E-mail<label for="" class="input">
                                                <i class="icon-prepend fa fa-envelope-o"></i>
                                                <input type="email" class="form-control" name="email_contacto2" placeholder="Email de la persona de contacto"class="form-control" />
                                            </label>
                                        </div>

                                        <div class="col col-xs-12 col-sm-6 col-lg-3">
                                            Puesto<label for="" class="input">
                                                <input type="text" class="form-control" name="puesto_contacto2" placeholder="Puesto de la persona de contacto"class="form-control" />
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row" id="tarifa">
                                        <header>Tarifas</header><br><br>
                                        <div class="row">
                                            <div class="col col-lg-3 col-xs-2">
                                            </div>
                                            <div class="col col-lg-2 col-xs-2">
                                                <a style="cursor: pointer;" onclick="add_tarifa()"> Agregar Tarifa <i class="fa fa-plus"></i></a>
                                            </div>
                                            <div class="col col-lg-2 col-xs-2">
                                                <a style="cursor: pointer;" onclick="new_ciudad()"> Nueva Ciudad <i class="fa fa-plus"></i></a>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col col-lg-2">
                                            </div>
                                            <div class="col col-xs-12 col-sm-6 col-lg-3" id="ciudad">
                                                <label class="select">Ciudad
                                                    <select name="ciudad_tarifa[]" >
                                                    </select>
                                                </label>
                                            </div>

                                            <div class="col col-xs-12 col-sm-5 col-lg-3">
                                                Tarifa<label for="" class="input">
                                                    <i class="icon-prepend fa fa-dollar"></i>
                                                    <input type="number" class="form-control" name="valor_tarifa[]" placeholder=""class="form-control" required />
                                                </label>		
                                            </div>
                                        </div>

                                    </div>

                                    <div id="tarifas">

                                    </div>

                                    </filedset>

                                    <div class="row">
                                        <section  id="div_subir" style="width: 25rem;">
                                            <div style="width: 25rem;">
                                                <input type="submit" class="btn btn-success" style=" width: 40%;" id="boton_subir" value="Ingresar">
                                            </div>
                                        </section>
                                    </div>
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
<script type="text/javascript">
                                                                                            var i = 0;
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
                                                                                                        + '<div class="col col-lg-2">'
                                                                                                        + '</div>'
                                                                                                        + '<div class="col col-xs-12 col-sm-6 col-lg-3" id="ciudad">'
                                                                                                        + '<label class="select">Ciudad'
                                                                                                        + '<select name="ciudad_tarifa[]" >'
                                                                                                        + '</select>'
                                                                                                        + '</label>'
                                                                                                        + '</div>'
                                                                                                        + '<div class="col col-xs-12 col-sm-5 col-lg-3">'
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

                                                                                            function new_ciudad() {
                                                                                                bootbox.dialog({
                                                                                                    message: '<form id="form_ciudad" method="post" class="smart-form">'
                                                                                                            + '<fieldset>'
                                                                                                            + '<legend>Datos Ciudad</legend>'
                                                                                                            + '<div  class="row">'
                                                                                                            + '<section class="col col-6">'
                                                                                                            + 'País'
                                                                                                            + '<label class="select">'
                                                                                                            + '<select id="pais2" required name="pais" onChange="Departamentos2()">'
                                                                                                            + '<? foreach ($paises as $key) { ?>'
                                                                                                                + '<option value="<?= $key->Code ?>">'
                                                                                                                + '<?= $key->Name ?>'
                                                                                                                + '</option>'
                                                                                                                + '<? } ?>'
                                                                                                            + '</select>'
                                                                                                            + '</label>'
                                                                                                            + '</section>'
                                                                                                            + '<section class="col col-6">'
                                                                                                            + '<label for="" class="select">Estado / Departamento'
                                                                                                            + '<select id="departamento2" required name="departamento">'

                                                                                                            + '</select>'
                                                                                                            + '</label>'
                                                                                                            + '</section>'
                                                                                                            + '<section class="col col-6">'
                                                                                                            + '<label class="input">'
                                                                                                            + 'Ciudad'
                                                                                                            + '<input required  type="text" id="ciudad" name="ciudad" placeholder="Ciudad">'
                                                                                                            + '</label>'
                                                                                                            + '</section>'

                                                                                                            + '</div>'
                                                                                                            + '</fieldset>'
                                                                                                            + '</form>',
                                                                                                    title: "Nueva Ciudad",
                                                                                                    buttons: {
                                                                                                        submit: {
                                                                                                            label: "Aceptar",
                                                                                                            className: "btn-success",
                                                                                                            callback: function () {

                                                                                                                $.ajax({
                                                                                                                    type: "POST",
                                                                                                                    url: "nuevaCiudad",
                                                                                                                    data: $("#form_ciudad").serialize()
                                                                                                                })
                                                                                                                        .done(function (msg)
                                                                                                                        {
                                                                                                                            CiudadesPais();
                                                                                                                            //$("#empresa").append("<option value="+empresa['id']+">"+empresa['nombre']+"</option>");
                                                                                                                            //$("#empresa").val(empresa['id']);
                                                                                                                            bootbox.dialog({
                                                                                                                                message: "Se agrego la ciudad correctamente",
                                                                                                                                title: 'Ciudades',
                                                                                                                                buttons: {
                                                                                                                                    success: {
                                                                                                                                        label: "Aceptar",
                                                                                                                                        className: "btn-success",
                                                                                                                                        callback: function () {
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            })//fin done ajax

                                                                                                                        });//Fin callback bootbox

                                                                                                            }
                                                                                                        },
                                                                                                        danger: {
                                                                                                            label: "Cancelar!",
                                                                                                            className: "btn-danger",
                                                                                                            callback: function () {

                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                })

                                                                                            }

                                                                                            function new_departamento() {
                                                                                                bootbox.dialog({
                                                                                                    message: '<form id="form_depto" method="post" class="smart-form">'
                                                                                                            + '<fieldset>'
                                                                                                            + '<legend>Datos De Estado/Departamento</legend>'
                                                                                                            + '<div class="row">'
                                                                                                            + '<section class="col col-6">'
                                                                                                            + 'País<label class="select">'
                                                                                                            + '<select id="pais" required name="pais">'
                                                                                                            + '<? foreach ($paises as $key) { ?>'
                                                                                                                + '<option value="<?= $key->Code ?>"><?= $key->Name ?></option>'
                                                                                                                + '<? } ?>'
                                                                                                            + '</select>'
                                                                                                            + '</label>'
                                                                                                            + '</section>'

                                                                                                            + '<section class="col col-6">'
                                                                                                            + '<label class="input">Nombre de departamento'
                                                                                                            + '<input required type="text" name="nombre" placeholder="Nombre del estado/departamento">'
                                                                                                            + '</label>'
                                                                                                            + '</section>'

                                                                                                            + '</div>'
                                                                                                            + '</fieldset>'
                                                                                                            + '</form>',
                                                                                                    title: "Nuevo Estado",
                                                                                                    buttons: {
                                                                                                        submit: {
                                                                                                            label: "Aceptar",
                                                                                                            className: "btn-success",
                                                                                                            callback: function () {

                                                                                                                $.ajax({
                                                                                                                    type: "POST",
                                                                                                                    url: "nuevoDepartameto",
                                                                                                                    data: $("#form_depto").serialize()
                                                                                                                })
                                                                                                                        .done(function (msg)
                                                                                                                        {
                                                                                                                            Departamentos();
                                                                                                                            //$("#empresa").append("<option value="+empresa['id']+">"+empresa['nombre']+"</option>");
                                                                                                                            //$("#empresa").val(empresa['id']);
                                                                                                                            bootbox.dialog({
                                                                                                                                message: "Se agrego el estado/departamento correctamente",
                                                                                                                                title: 'Estados / Departamentos',
                                                                                                                                buttons: {
                                                                                                                                    success: {
                                                                                                                                        label: "Aceptar",
                                                                                                                                        className: "btn-success",
                                                                                                                                        callback: function () {
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            })//fin done ajax

                                                                                                                        });//Fin callback bootbox

                                                                                                            }
                                                                                                        },
                                                                                                        danger: {
                                                                                                            label: "Cancelar!",
                                                                                                            className: "btn-danger",
                                                                                                            callback: function () {

                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                })
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

                                                                                            function Departamentos2() {
                                                                                                var pa = $("#pais2").val();
                                                                                                $.ajax({
                                                                                                    type: "POST",
                                                                                                    url: "/bo/proveedor_mensajeria/DepartamentoPais",
                                                                                                    data: {pais: pa}
                                                                                                })
                                                                                                        .done(function (msg)
                                                                                                        {

                                                                                                            $('#departamento2 option').each(function () {
                                                                                                                $(this).remove();
                                                                                                            });
                                                                                                            datos = $.parseJSON(msg);

                                                                                                            for (var i in datos) {
                                                                                                                $('#departamento2').append('<option value="' + datos[i]['id'] + '">' + datos[i]['Name'] + '</option>');
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
</script>
