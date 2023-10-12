<div class="gContPage">

    <!-- Menu User -->
    <section class="rdiv contMUser">
        <div class="maxW">
            <nav class="menuUser">
                <div class="camp">
                    <span class="campana"><?=$acualCampana['nombre']?></span>
                </div>
                <ul>
                    <?php foreach ($listaSeccionescampana as $Seccionescampana) : ?>
                    <li>
                        <a href="/panel/postventa/campana/<?=$acualCampana['slug']?>/<?=$Seccionescampana['codigo'] ?>">
                            <?=$Seccionescampana['nombre'] ?></a>
                    </li>
                    <?php endforeach ?>

                </ul>
            </nav>
        </div>
    </section><!-- End Menu User -->

    <article class="rdiv gNIntern">
        <div class="maxW">
            <div class="rdiv contWhite">
                <section class="intBanner">
                    <div id="intSlider" class="intSlider">
                        <?php foreach ($listaImagenesSeccion as $imagenesSeccion) : ?>
                        <article>
                            <figure
                                style="background-image:url(/images/secciones_camapana/<?=$imagenesSeccion['imagen'] ?>);"
                                class="mImage">
                                <img src="/images/secciones_camapana/<?=$imagenesSeccion['imagen'] ?>"
                                    alt="Nombre banner">
                            </figure>
                        </article>
                        <?php endforeach ?>
                    </div>
                </section>
            </div>
        </div>
        <!--Fin Banner Nuevo Principal-->
    </article>


</div>