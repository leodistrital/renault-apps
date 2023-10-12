<div class="gContPage">
    <!--Banner Principal nuevo -->
    <section class="mainBanner">
        <h2 class="gHidden">Destacados</h2>
        <div id="mainSlider" class="mainSlider">
            <?php foreach ($bannersPanelLista as $bannersPanel) : ?>
            <article>
                <figure
                    style="background-image:url(<?= $_ENV['urlProduccion']; ?>/images/site/banner/<?= $bannersPanel['imagen'] ?>"
                    class="mImage">
                    <img src="<?= $_ENV['urlProduccion']; ?>/images/site/banner/<?= $bannersPanel['imagen'] ?>"
                        alt="banner">
                </figure>
            </article>
            <?php endforeach ?>
        </div>
    </section>
    <!--Fin Banner Nuevo Principal-->
    <!--tres botones home-->
    <section>
        <div class="listAp">
            <?php foreach ($botonesPanelLista as $botonesPanel) : ?>
            <article>
                <header>
                    <div class="gScroll dScroll">
                        <h2><?= $botonesPanel['titulo'] ?></h2>
                        <div>
                            <a href="<?= $botonesPanel['link'] ?>">
                                <img src="<?= $_ENV['urlProduccion']; ?>/images/site/<?= $botonesPanel['imagen']?>">
                            </a>
                        </div>
                    </div>
                </header>
            </article>
            <?php endforeach ?>
        </div>
    </section>
    <!--Fin tres botones -->
</div>