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
<div class="row">
    <form id="actualizar" class="smart-form" method="POST" action="/bo/cedis/actualizar_cedi">
        <fieldset class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="input">Nombre
                <input style="width: 25rem;" type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" value="<?php echo $cedi[0]->nombre; ?>" required>
            </label>

            <div class="row" style="width: 28rem;">
                <section class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="busquedatodos" >
                    <label class="label">Descripción</label>
                    <label class="textarea">								
                        <textarea required rows="3" class="custom-scroll" name="descripcion" id="descripcion"><?php echo $cedi[0]->descripcion; ?></textarea>
                    </label>
                </section>
            </div>


            <label class="input">Dirección
                <input style="width: 25rem;" type="text" name="direccion" id="direccion" placeholder="Direeccion" class="form-control" value="<?php echo $cedi[0]->direccion; ?>"required>
            </label>

            <label class="input">Teléfono
                <input style="width: 25rem;" type="number" name="telefono" id="telefono" placeholder="Telefono" class="form-control" value="<?php echo $cedi[0]->telefono; ?>" required>
            </label>


            <div style="width: 25rem;">
                <label class="select">País 
                    <select id="pais" required name="pais" onChange="Departamentos()">
                        <option value="-" selected>-- Seleciona un país --</option>
                        <? foreach ($pais as $key) {
                            if ($PaisCiudad[0]->CountryCode == $key->Code) {
                                ?>
                                <option selected value="<?= $key->Code ?>"><?= $key->Name ?></option>

                            <?php } else { ?>
                                <option value="<?= $key->Code ?>"><?= $key->Name ?></option>
    <? }
} ?>
                    </select>
                </label>
            </div>

            <div style="width: 25rem;">
                <label for="" class="select">Estado/Departamento <select
                        id="departamento" name="estado" onChange="CiudadesDepartamento()"
                        required>
                            <?
                            foreach ($departamentos as $key) {
                                if ($ciudad_actual[0]->id_estate == $key->id) {
                                    ?>

                                <option selected value="<?= $key->id ?>"><?= utf8_decode($key->Nombre) ?></option>
                            <?php } else { ?>

                                <option value="<?= $key->id ?>"><?= utf8_decode($key->Nombre) ?></option>
    <? }
} ?>
                    </select>
                </label>
            </div>

            <div style="width: 25rem;">
                <label for="" class="select">Municipio/Ciudad <select
                        id="ciudad" required name="ciudad" >
                        <?
                        foreach ($ciudades as $key) {
                            if ($cedi[0]->ciudad == $key->ID) {
                                ?>
                                <option selected value="<?= $key->ID ?>"><?= utf8_decode($key->Name) ?></option>
    <?php } else { ?>
                                <option value="<?= $key->ID ?>"><?= utf8_decode($key->Name) ?></option>
    <? }
} ?>
                    </select>
                </label>
            </div>
            <label class="input">Código Postal
                <input style="width: 25rem;" type="text" name="codigo_postal" id="codigo_postal" placeholder="Codigo Postal" class="form-control" value="<?php echo $cedi[0]->codigo_postal; ?>" required>
            </label>

            <br>
            <input type="text" id="id" name="id" value="<?php echo $cedi[0]->id_cedi; ?>" class="hide">
            <div class="row">
                <section  id="div_subir" style="width: 25rem;">
                    <div style="width: 25rem;">
                        <input type="submit" class="btn btn-success" style="margin-left: 66% ! important; width: 40%;" id="boton_subir" value="Actualizar" onclick="actualizar_almacen()">
                    </div>
                </section>
            </div>	

        </fieldset>

    </form>
</div>
<script type="text/javascript">
    function new_ciudad() {
        bootbox.dialog({
            message: '<form id="form_ciudad" method="post" class="smart-form">'
                    + '<fieldset>'
                    + '<legend>Datos Ciudad</legend>'
                    + '<div  class="row">'
                    + '<section class="col col-6">'
                    + 'País'
                    + '<label class="select">'
                    + '<select id="pais" required name="pais">'
                    + '<? foreach ($pais as $key) { ?>'
                        + '<option value="<?= $key->Code ?>">'
                        + '<?= $key->Name ?>'
                        + '</option>'
                        + '<? } ?>'
                    + '</select>'
                    + '</label>'
                    + '</section>'
                    + '<section class="col col-6">'
                    + '<label class="input">'
                    + 'Ciudad'
                    + '<input required  type="text" id="ciudad" name="ciudad" placeholder="Ciudad">'
                    + '</label>'
                    + '</section>'
                    + '<section class="col col-6">'
                    + '<label class="input">'
                    + 'Departamento'
                    + '<input required  type="text" id="departamento" name="departamento" placeholder="Departamento">'
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
                            url: "/bo/cedis/nuevaCiudad",
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


</script>					
<script>
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
                    $('#departamento').append('<option value="0">-- Seleciona un Estado / Departamento --</option>');
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
                    $('#ciudad option').each(function () {
                        $(this).remove();
                    });
                    datos = $.parseJSON(msg);
                    $('#ciudad').append('<option value="">-- Seleciona una ciudad / municipio </option>');
                    for (var i in datos) {
                        $('#ciudad').append('<option value="' + datos[i]['id'] + '">' + datos[i]['Name'] + '</option>');
                    }
                });
    }

</script>				
