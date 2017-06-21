<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <h1 class="page-title txt-color-blueDark">

                <!-- PAGE HEADER -->
                <a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
                <span> 
                    > <a href="/bo/configuracion/">Configuración</a>
                    > <a href="/bo/configuracion/soporte_tecnico">Soporte Técnico</a>
                    > Ver Redes
                </span>
            </h1>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row"
             style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-bottom: 2rem;">
            <div class="well">
                <fieldset>
                    <legend>Tipos de Red</legend>
                    <div class="row">
                        <? foreach ($redes as $red) { ?>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <!-- <a href="/bo/comercial/mi_red?id_red=<? //= $red->id  ?>"> -->
                                <a href="/bo/configuracion/videos?id_red=<?= $red->id ?>">
                                    <div
                                        class="well well-sm txt-color-white text-center link_dashboard"
                                        style="background: <?= $style[0]->btn_2_color ?>">
                                        <i class="fa fa-sitemap fa-3x"></i>
                                        <h5><?= $red->nombre; ?></h5>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </fieldset>
            </div>
        </div>
    </section>
</div>
