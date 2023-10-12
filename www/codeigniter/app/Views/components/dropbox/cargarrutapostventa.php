<?php
// echo "+++++++++++++";
// var_dump($acualCampana);
$rutaDropbox = $acualCampana['materialComunicacion'];
echo $rutaDropbox = str_replace('@@@', '/', $rutaDropbox);


// echo $rutaDropbox = str_replace('/', '@@@', $rutaDropbox);
// $rutaDropbox= 'PV/T%201%20-%202023';
// exit
// echo "++++++++++++++++++";
// echo $acualCampana['codigo'];
// return '';

?>
<!--Contenido general-->
<div class="gContPage">
    <!-- Menu User -->
    <section class="rdiv contMUser">
        <div class="maxW">
            <nav class="menuUser">
                <div class=camp>
                    <span class="campana"><?= $acualCampana['nombre']?></span>
                </div>
                <?=view_cell('\App\Libraries\ViewSitio::getMaterailComunicacionmenu', 'idcampana='.$acualCampana['codigo']) ?>
            </nav>
        </div>
    </section><!-- End Menu User -->
    <article class="rdiv gNIntern">
        <div class="maxW">
            <div class="rdiv contWhite">
                <!--Interna-->
                <article class="gIntern sFour">
                    <div class="content">
                        <?=$rutaDropbox.'+++' ?>
                        <h2>Material editable de campaña </h2>
                        <p>En esta sección vas a encontrar todo el material editable que necesitas para hacer difusión
                            de las campañas y acciones comerciales de Renault Servicios, aquí vas a encontrar los key
                            visual, las cuñas, las cortinillas, banners en diferentes formatos, comerciales, etc.
                        </p>
                        <br>
                        <!-- <iframe id='iframedropbox' frameborder="0" scrolling="no"
                            src="/panel/iframe/files/<?= $rutaDropbox ?>" style="width:100%; border:none; height:500px"
                            onload="resizeIframe(this)"> </iframe> -->
                    </div>
            </div>
    </article>
    <!--Fin Interna-->
</div>
<!--Fin Contenido general-->