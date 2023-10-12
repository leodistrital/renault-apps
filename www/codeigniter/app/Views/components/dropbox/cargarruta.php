<?php
$rutaDropbox = $contenidoDirectorio['ruta'];
$rutaDropbox = str_replace('/', '@@@', $rutaDropbox);
?>
<!--Contenido general-->
<div class="gContPage">
    <!-- Menu User -->
    <section class="rdiv contMUser">
        <div class="maxW">
            <nav class="menuUser">
                <div class=camp>
                    <span class="campana"><?= $_SESSION['dropbox']['nombre']?></span>
                </div>
                <?=view_cell('\App\Libraries\ViewSitio::getMenutercerNivel', 'nenuPadre='.$codigocontenido) ?>
            </nav>
        </div>
    </section><!-- End Menu User -->
    <article class="rdiv gNIntern">
        <div class="maxW">
            <div class="rdiv contWhite">
                <!--Interna-->
                <article class="gIntern sFour">
                    <div class="content">
                        <!-- <?=$rutaDropbox.'+++' ?> -->
                        <h2><?=$_SESSION['dropbox']['titulo']?> </h2>
                        <p><?=$_SESSION['dropbox']['entredilla']?></p>
                        <br>
                        <iframe id='iframedropbox' frameborder="0" scrolling="no"
                            src="/panel/iframe/files/<?= $rutaDropbox ?>" style="width:100%; border:none; height:500px"
                            onload="resizeIframe(this)"> </iframe>
                    </div>
            </div>
    </article>
    <!--Fin Interna-->
</div>
<!--Fin Contenido general-->