<script src="/template/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="/template/js/validacion.js"></script>
<script src="/template/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

    var codigo = <?= $token; ?>;

    $(document).ready(function () {
        //Para local /ov/perfil_red/crear_user
        //Produccion /auth/register
        // fuelux 

        var wizard = $('.wizard').wizard();

        wizard.on('finished', function (e, data) {

            $(".invalid").remove();

            var ids = new Array(
                    "#nombre",
                    "#apellido",
                    "#datepicker",
                    "#keyword",
                    "#username",
                    "#email",
                    "#password",
                    "#confirm_password"

                    );
            var mensajes = new Array(
                    "Por favor ingresa tu nombre",
                    "Por favor ingresa tu apellido",
                    "Por favor ingresa tu fecha de nacimiento",
                    "Por favor ingresa tu DNI",
                    "Por favor ingresa un nombre de usuario",
                    "Por favor ingresa un correo",
                    "Por favor ingresa una contraseña",
                    "Por favor confirma tu contraseña"
                    );

            var idss = new Array(
                    "#username"
                    );
            var mensajess = new Array(
                    "El nombre de usuario no puede contener espacios en blanco"
                    );
            var validacion_ = valida_espacios(idss, mensajess);
            var validacion = valida_vacios(ids, mensajes);

            if (validacion && validacion)
            {
                var email_ = $("#email").val();
                $.ajax({
                    type: "POST",
                    url: "/key/check_espacio_invite",
                    data: {token: codigo, email: email_}
                })
                        .done(function (msg)
                        {
                            if (msg === "FAIL") {
                                //alert(msg);
                                $.smallBox({
                                    title: "<h1>Ups!</h1>",
                                    content: "<h3>Lamentamos Informarle que este espacio ha sido ocupado por otro afiliado</h3>" +
                                            "<p>Comuniquese con su Sponsor para más información</p> ",
                                    color: "#00b4cd",
                                    icon: "fa fa-warning fadeInLeft animated",
                                    timeout: 4000
                                });
                                location.href = "/auth/login";
                            } else {

                                $(".steps").slideUp();
                                $(".steps").remove();
                                $(".actions").slideUp();
                                $(".actions").remove();
                                $("#myWizard").append('<div class="progress progress-sm progress-striped active"><div id="progress" class="progress-bar bg-color-darken"  role="progressbar" style=""></div></div>');

                                iniciarSpinner();

                                $.ajax({
                                    type: "POST",
                                    url: "/auth/register",
                                    data: $('#register').serialize()
                                })
                                        .done(function (msg1) {

                                            $("#progress").attr('style', 'width: 40%');
                                            var email = $("#email").val();
                                            $("#checkout-form").append("<input value='" + email + "' type='hidden' name='mail_important'>");
                                            $("#checkout-form").append("<input value='" + codigo + "' type='hidden' name='token'>");
                                            $.ajax({
                                                type: "POST",
                                                url: "/ov/perfil_red/afiliar_nuevo",
                                                data: $('#checkout-form').serialize()
                                            })
                                                    .done(function (msg) {
                                                        $("#progress").attr('style', 'width: 100%');
                                                        bootbox.dialog({
                                                            message: msg,
                                                            title: "Atención",
                                                            buttons: {
                                                                success: {
                                                                    label: "Ok!",
                                                                    className: "btn-success",
                                                                    callback: function () {
                                                                        //trashToken();
                                                                        location.href = "/auth/login";
                                                                        FinalizarSpinner();
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    });
                                        });//fin Done ajax

                            }

                        });//fin validar invitacion

            } else
            {
                $.smallBox({
                    title: "<h1>Atención</h1>",
                    content: "<h3>Por favor revisa que todos los datos estén correctos</h3>",
                    color: "#C46A69",
                    icon: "fa fa-warning fadeInLeft animated",
                    timeout: 4000
                });
            }

        });

        //pageSetUp();
    });


    $("#remove_step").click(function () {
        $("#tipo_plan").attr("name", "tipo_plan");
        $('.wizard').wizard('selectedItem', {
            step: 4
        });
        $("#step4").slideUp();
        $("#step4").remove();
        $("#paso4").slideUp();
        $("#paso4").remove();
        $(this).slideUp();
        $(this).remove();
    });





    /*
     CODIGO PARA QUITAR ELEMENTO HACIENDO CLICK EN ELLOS
     $("input").click(function() {
     $( this ).slideUp();
     $( this ).remove();
     });
     */
    function codpos()
    {

    }
    function clickme()
    {
    }

    function trashToken() {
        $.ajax({
            type: "POST",
            url: "/key/done_invitacion",
            data: {token: codigo},
        })
                .done(function (msg)
                {

                });
    }

    function checkespacio() {
        $.ajax({
            type: "POST",
            url: "/key/check_espacio_invite",
            data: {token: codigo}
        })
                .done(function (msg)
                {
                    if (msg === "FAIL") {

                    }
                });
    }

    function use_username()
    {
        $('#username').val($('#username').val().replace(" ", ""));
        var username = $("#username").val();
        $.ajax({
            type: "POST",
            url: "/ov/perfil_red/use_username",
            data: {username: username, token: codigo},
        })
                .done(function (msg)
                {
                    $("#msg_usuario").remove();
                    $("#usuario").append("<div id='msg_usuario'>" + msg + "</div>")
                });
        validate_user_data();
    }
    function use_mail()
    {
        var mail = $("#email").val();
        $.ajax({
            type: "POST",
            url: "/ov/perfil_red/use_mail",
            data: {mail: mail, token: codigo},
        })
                .done(function (msg)
                {
                    $("#msg_correo").remove();
                    $("#correo").append("<div id='msg_correo'>" + msg + "</div>")
                });
        validate_user_data()
    }


    function confirm_pass()
    {
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();
        $.ajax({
            type: "POST",
            url: "/ov/perfil_red/confirm_password",
            data: {password: password, confirm_password: confirm_password, token: codigo},
        })
                .done(function (msg)
                {
                    $("#msg_confirm_password").remove();
                    $("#confirmar_password").append("<div id='msg_confirm_password'>" + msg + "</div>")
                });
        validate_user_data()
    }

    function validate_user_data()
    {
        var username = $("#username").val();
        var mail = $("#email").val();

        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();

        $("#validate_user_data").remove();

        $.ajax({
            type: "POST",
            url: "/ov/perfil_red/validate_user_data",
            data: {mail: mail, username: username, password: password, confirm_password: confirm_password, token: codigo},
        })
                .done(function (msg)
                {
                    $("#validate_user_data").remove();
                    $("#register").append("<div id='validate_user_data'>" + msg + "</div>")
                });
    }

    function otra()
    {
        if ($("#otro:checked").val() == "on")
        {
            $("#b_persona").removeClass("hidden");
            $("#afiliado_value").attr("name", "afiliados");
        } else
        {
            $("#b_persona").addClass("hidden");
            $("#afiliado_value").attr("name", "");
        }
    }

    function agregar_red(tipo)
    {
        if (tipo == 1)
        {
            $("#tel_red").append("<section class='col col-6'><label class='input'> <i class='icon-prepend fa fa-mobile'></i><input type='tel' name='movil[]' placeholder='(999) 99-99-99-99-99'></label></section>");
        } else
        {
            $("#tel_red").append("<section class='col col-6'><label class='input'> <i class='icon-prepend fa fa-phone'></i><input type='tel' name='fijo[]' placeholder='(999) 99-99-99-99-99'></label></section>");
        }
    }
    $(function ()
    {
        a = new Date();
        año = a.getFullYear() - 18;
        $("#datepicker").datepicker({
            changeMonth: true,
            numberOfMonths: 2,
            maxDate: año + "-12-31",
            dateFormat: "yy-mm-dd",
            changeYear: true,
            yearRange: "-99:+0",
        });
    });



    function check_keyword()
    {
        $("#msg_key").remove();
        $("#key_").append('<i id="ajax_" class="icon-append fa fa-spinner fa-spin"></i>');

        var keyword = $("#keyword").val();
        $.ajax({
            type: "POST",
            url: "/ov/perfil_red/use_keyword",
            data: {keyword: keyword, token: codigo},
        })
                .done(function (msg)
                {
                    $("#msg_key").remove();
                    $("#key").append("<p id='msg_key'>" + msg + "</msg>");
                    $("#ajax_").remove();
                });
    }
    function check_keyword_co()
    {
        $("#msg_key_co").remove();
        $("#key_1").append('<i id="ajax_1" class="icon-append fa fa-spinner fa-spin"></i>');
        var keyword = $("#keyword_co").val();
        $.ajax({
            type: "POST",
            url: "/ov/perfil_red/use_keyword",
            data: {keyword: keyword, token: codigo},
        })
                .done(function (msg)
                {
                    $("#msg_key_co").remove();
                    $("#key_co").append("<p id='msg_key_co'>" + msg + "</msg>");
                    $("#ajax_1").remove();
                });
    }

    function codpos_red()
    {
        var pais = $("#pais_red").val();
        if (pais == "MEX")
        {
            var cp = $("#cp_red").val();
            $.ajax({
                type: "POST",
                url: "/ov/perfil_red/cp_red",
                data: {cp: cp, token: codigo},
            })
                    .done(function (msg)
                    {
                        $("#colonia_red").remove();
                        $("#municipio_red").remove();
                        $("#estado_red").remove();
                        $("#dir_red").append(msg);
                    })
        }
    }

</script>
<!-- MAIN CONTENT -->
<div id="content" style="height: 1000px">

    <section id="widget-grid" class="">
        <!-- START ROW -->
        <div class="row">

            <!-- NEW COL START -->
            <article class="col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false">
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
                        <h2>Datos personales</h2>
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
                            <div id="myTabContent1" class="tab-content padding-10">
                                <div class="tab-pane fade in active" id="s1">
                                    <div id="uno" class="row fuelux">
                                        <div id="myWizard" class="wizard">

                                            <ul class="steps">

                                                <li data-target="#step1" class="active">
                                                    <span class="badge badge-info">1</span>Datos del registro<span class="chevron"></span>
                                                </li>
                                                <li data-target="#step2">
                                                    <span class="badge">2</span>Datos personales<span class="chevron"></span>
                                                </li>
                                                <?php /* ocultar afiliado ?><li data-target="#step3">
                                                  <span class="badge">3</span>Selección del plan<span class="chevron"></span>
                                                  </li>
                                                  <li id="paso4" data-target="#step4">
                                                  <span class="badge">4</span>Método de pago<span class="chevron"></span>
                                                  </li>
                                                  <?php */ ?>
                                            </ul>
                                            <div id="acciones" class="actions">
                                                <button type="button" class="final btn btn-sm btn-primary btn-prev">
                                                    <i class="fa fa-arrow-left"></i>Anterior
                                                </button>
                                                <button type="button" class="final btn btn-sm btn-success btn-next" data-last="Afiliar" disabled="disabled">
                                                    Siguiente<i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="step-content">
                                            <div class="form-horizontal" id="fuelux-wizard" >
                                                <div class="step-pane active" id="step1">
                                                    <form id="register" class="smart-form">
                                                        <fieldset>

                                                            <legend>Información de cuenta</legend>
                                                            <section id="usuario" class="col col-6">
                                                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                                    <input id="username" onkeyup="use_username()" required type="text" name="username" placeholder="Usuario">
                                                                </label>
                                                            </section>
                                                            <section id="correo" class="col col-6">
                                                                <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                                                    <input id="email" onkeyup="use_mail()" required type="email" name="email" value="<?= $email ?>" placeholder="Email">
                                                                </label>
                                                            </section>
                                                            <section class="col col-6">
                                                                <label class="input"> <i class="icon-prepend fa fa-lock"></i>
                                                                    <input id="password" onkeyup="confirm_pass()" required type="password" name="password" placeholder="Contraseña">
                                                                </label>
                                                            </section>
                                                            <section id="confirmar_password" class="col col-6">
                                                                <label class="input"> <i class="icon-prepend fa fa-lock"></i>
                                                                    <input id="confirm_password" onkeyup="confirm_pass()" required type="password" name="confirm_password" placeholder="Repite contraseña">
                                                                </label>
                                                            </section>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                <div class="step-pane" id="step2">
                                                    <form method="POST" action="/perfil_red/afiliar_nuevo" id="checkout-form" class="smart-form" novalidate="novalidate">
                                                        <fieldset>
                                                            <legend>Datos personales del afiliado</legend>
                                                            <input required type="hidden" id="afiliados" name="afiliados" value="<?= $debajo_de ?>">
                                                            <input id="lado" required type="hidden" name="lado" value="<?= $lado ?>">
                                                            <div class="row">
                                                                <section class="col col-3">
                                                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                                        <input id="nombre" required type="text" name="nombre" placeholder="Nombre">
                                                                    </label>
                                                                </section>
                                                                <section class="col col-3">
                                                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                                                        <input id="apellido" required type="text" name="apellido" placeholder="Apellido">
                                                                    </label>
                                                                </section>
                                                                <section class="col col-3">
                                                                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                                                                        <input required id="datepicker" type="text" name="nacimiento" placeholder="Fecha de nacimiento" readonly="readonly">
                                                                    </label>
                                                                </section>
                                                                <section class="col col-3" id="key">
                                                                    <label id="key_" class="input"> <i class="icon-prepend fa fa-barcode"></i>
                                                                        <input id="keyword" onkeyup="check_keyword()" placeholder="DNI" type="text" name="keyword">
                                                                    </label>
                                                                </section>
                                                                <section class="col col-2">
                                                                    Tipo de persona
                                                                    <label class="select">
                                                                        <select id="tipo_fiscal" required name="fiscal">
                                                                            <?foreach ($tipo_fiscal as $key)
                                                                            {?>
                                                                            <option value="<?= $key->id ?>">
                                                                                <?= $key->descripcion ?>
                                                                            </option>
                                                                            <?}?>
                                                                        </select>
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <input type="hidden" name="tipo_plan" id="tipo_plan">
                                                            <div class="row">
                                                                <div id="tel" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <section class="col col-3">
                                                                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                                            <input required name="fijo[]" placeholder="(99) 99-99-99-99" type="tel">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-3">
                                                                        <label class="input"> <i class="icon-prepend fa fa-mobile"></i>
                                                                            <input required name="movil[]" placeholder="(999) 99-99-99-99-99" type="tel">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <section class="col col-3">
                                                                    <button type="button" onclick="agregar('1')" class="btn btn-primary">
                                                                        &nbsp;Agregar <i class="fa fa-mobile"></i>&nbsp;
                                                                    </button>
                                                                    <button type="button" onclick="agregar('2')" class="btn btn-primary">
                                                                        &nbsp;Agregar <i class="fa fa-phone"></i>&nbsp;
                                                                    </button>
                                                                </section>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset>
                                                            <legend>Datos co-aplicante</legend>
                                                            <div class="row">
                                                                <section class="col col-4">
                                                                    <label class="input">
                                                                        <input placeholder="Nombre" type="text" name="nombre_co">
                                                                    </label>
                                                                </section>
                                                                <section class="col col-4">
                                                                    <label class="input"> 
                                                                        <input placeholder="Apellido" type="text" name="apellido_co">
                                                                    </label>
                                                                </section>
                                                                <section class="col col-4" id="key_co">
                                                                    <label id="key_1" class="input"> <i class=" icon-prepend fa fa-barcode"></i>
                                                                        <input onkeyup="check_keyword_co()" placeholder="CURP o RFC" type="text" name="keyword_co" id="keyword_co">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <legend>Dirección del afiliado</legend>
                                                            <div id="dir" class="row">
                                                                <section class="col col-2">
                                                                    <div class="">País
                                                                        <label class="select">
                                                                            <select style=""  id="pais" required name="pais">
                                                                                <?foreach ($pais as $key)
                                                                                {?>
                                                                                <option value="<?= $key->Code ?>">
                                                                                    <?= $key->Name ?>
                                                                                </option>
                                                                                <?}?>
                                                                            </select>
                                                                        </label>
                                                                    </div>
                                                                </section>
                                                                <section id="municipio" class="col col-2">
                                                                    <label class="input">
                                                                        Estado
                                                                        <input type="text" name="estado" >
                                                                    </label>
                                                                </section>

                                                                <section id="municipio" class="col col-2">
                                                                    <label class="input">
                                                                        Municipio
                                                                        <input type="text" name="municipio" >
                                                                    </label>
                                                                </section>

                                                                <section id="colonia" class="col col-2">
                                                                    <label class="input">
                                                                        Colonia
                                                                        <input type="text" name="colonia" >
                                                                    </label>
                                                                </section>

                                                                <section class="col col-2">
                                                                    <label class="input">
                                                                        Dirección de domicilio
                                                                        <input required type="text" name="calle">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-2">
                                                                    <label class="input">
                                                                        Código postal
                                                                        <input required type="text" id="cp" name="cp">
                                                                    </label>
                                                                </section>

                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <legend>Estadistica</legend>
                                                            <div class="row">
                                                                <section class="col col-3">Estado civil
                                                                    <label class="select">
                                                                        <select name="civil">
                                                                            <?foreach ($civil as $key)
                                                                            {
                                                                            if($key->id_edo_civil==$usuario[0]->id_edo_civil)
                                                                            echo '<option selected value="'.$key->id_edo_civil.'">'.$key->descripcion.'</option>';
                                                                            else
                                                                            echo '<option value="'.$key->id_edo_civil.'">'.$key->descripcion.'</option>';

                                                                            }?>
                                                                        </select>
                                                                    </label>
                                                                </section>
                                                                <section class="col col-2">Sexo&nbsp;
                                                                    <div class="inline-group">
                                                                        <?
                                                                        foreach ($sexo as $value)
                                                                        {?>
                                                                        <label class="radio">
                                                                            <input <?= ($value->id_sexo == 1) ? 'checked' : '' ?> type="radio" value="<?= $value->id_sexo ?>" name="sexo" placeholder="sexo">
                                                                            <i></i><?= $value->descripcion ?></label>
                                                                        <?}?>
                                                                    </div>
                                                                </section>
                                                                <section class="col col-2">Estudio&nbsp;
                                                                    <div class="inline-group">
                                                                        <?
                                                                        foreach ($estudios as $value)
                                                                        {?>
                                                                        <label class="radio">
                                                                            <input <?= ($value->id_estudio == 1) ? 'checked' : '' ?> type="radio" value="<?= $value->id_estudio ?>" name="estudios">
                                                                            <i></i><?= $value->descripcion ?></label>
                                                                        <?}?>
                                                                    </div>
                                                                </section>
                                                                <section class="col col-2">Ocupación&nbsp;
                                                                    <div class="inline-group">
                                                                        <?
                                                                        foreach ($ocupacion as $value)
                                                                        {?>
                                                                        <label class="radio">
                                                                            <input <?= ($value->id_ocupacion == 1) ? 'checked' : '' ?> type="radio" value="<?= $value->id_ocupacion ?>" name="ocupacion">
                                                                            <i></i><?= $value->descripcion ?></label>
                                                                        <?}?>
                                                                    </div>
                                                                </section>
                                                                <section class="col col-2">Tiempo dedicado&nbsp;
                                                                    <div class="inline-group">
                                                                        <?
                                                                        foreach ($tiempo_dedicado as $value)
                                                                        {?>
                                                                        <label class="radio">
                                                                            <input <?= ($value->id_tiempo_dedicado == 1) ? 'checked' : '' ?> type="radio" value="<?= $value->id_tiempo_dedicado ?>" name="tiempo_dedicado">
                                                                            <i></i><?= $value->descripcion ?></label>
                                                                        <?}?>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </fieldset>
                                                        <input class='hide' type="text" name="red" id='red' value="<?= $red ?>" placeholder="">
                                                        <input type="text" name="directo" value="<?= $id; ?>" class="hide">

                                                    </form>
                                                </div>


                                            </div>
                                        </div>
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
<!-- END MAIN CONTENT -->
<!-- PAGE RELATED PLUGIN(S) -->
<script>
    var id = 0;
    use_username();
    function agregar(tipo)
    {
        if (tipo == 1)
        {
            $("#tel").append("<section id='tel_" + id + "' class='col col-3'><label class='input'> <i class='icon-prepend fa fa-mobile'></i><input type='tel' name='movil[]' placeholder='(999) 99-99-99-99-99'></label><a style='cursor: pointer;color: red;' onclick='delete_telefono(" + id + ")'>Eliminar <i class='fa fa-minus'></i></a></section>");
        } else
        {
            $("#tel").append("<section id='tel_" + id + "' class='col col-3'><label class='input'> <i class='icon-prepend fa fa-phone'></i><input type='tel' name='fijo[]' placeholder='(999) 99-99-99-99-99'></label><a style='cursor: pointer;color: red;' onclick='delete_telefono(" + id + ")'>Eliminar <i class='fa fa-minus'></i></a></section>");
        }

        id++;
    }
    function delete_telefono(id) {
        $("#tel_" + id + "").remove();
    }

</script>
<style type="text/css">
    /*Now the CSS*/
    * {margin: 0; padding: 0;}
    .nombre{background: rgba(255,255,255,.3); width: 100px; margin-top: -5px; margin-left: -11px;}
    .todo{font-size: 11px; width: 100%; background: rgba(0,0,0,.5); margin-top: -4px; color: #FFF; cursor: pointer;}
    .todo1{font-size: 11px; width: 100%; background: rgba(70, 120, 250, .8); margin-top: -4px; color: #FFF; cursor: pointer;}
    .todo:hover{font-size: 11px; text-decoration: underline; width: 100%; margin-top:-4px; background: rgba(0,0,0,.7); color: #FFF; cursor: pointer;}
    .todo1:hover{font-size: 11px; text-decoration: underline; width: 100%; margin-top:-4px; background: rgba(70, 120, 250, 1); color: #FFF; cursor: pointer;}
    .tree1 ul {
        padding-top: 20px; position: relative;

        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    .tree1 li {
        float: left; text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;

        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*We will use ::before and ::after to draw the connectors*/

    .tree1 li::before, .tree1 li::after{
        content: '';
        position: absolute; top: 0; right: 50%;
        border-top: 3px solid #ccc;
        width: 50%; height: 20px;
    }
    .tree1 li::after{
        right: auto; left: 50%;
        border-left: 3px solid #ccc;
    }

    /*We need to remove left-right connectors from elements without 
    any siblings*/
    .tree1 li:only-child::after, .tree1 li:only-child::before {
        display: none;
    }

    /*Remove space from the top of single children*/
    .tree1 li:only-child{ padding-top: 0;}

    /*Remove left connector from first child and 
    right connector from last child*/
    .tree1 li:first-child::before, .tree1 li:last-child::after{
        border: 0 none;
    }
    /*Adding back the vertical connector to the last nodes*/
    .tree1 li:last-child::before{
        border-right: 3px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }
    .tree1 li:first-child::after{
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }

    /*Time to add downward connectors from parents*/
    .tree1 ul ul::before{
        content: '';
        position: absolute; top: 0; left: 50%;
        border-left: 3px solid #ccc;
        width: 0; height: 20px;
    }

    .tree1 li a{

        height: 100px;
        width: 100px;
        border: 1px solid #ccc;
        padding: 5px 10px;
        text-decoration: none;
        color: #000;
        font-size: 13px;
        display: inline-block;

        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*Time for some hover effects*/
    /*We will apply the hover effect the the lineage of the element also*/
    .tree1 li a:hover, .tree1 li a:hover+ul li a {
        background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
    }
    /*Connector styles on hover*/
    .tree1 li a:hover+ul li::after, 
    .tree1 li a:hover+ul li::before, 
    .tree1 li a:hover+ul::before, 
    .tree1 li a:hover+ul ul::before{
        border-color:  #94a0b4;
    }

    .packselected
    {
        border-top: solid 5px #CCC;
        border-bottom: solid 5px #CCC;
        -webkit-box-shadow: 0px 0px 10px #CCC;
        -moz-box-shadow: 0px 0px 10px #CCC;
        box-shadow: 0px 0px 10px #CCC;
    }
    /*Thats all. I hope you enjoyed it.
    Thanks :)*/
</style>
