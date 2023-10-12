<?php
echo $this->include('components/menugeneral/menu');
// var_dump($botonesPanelLista);
?>
<!--Contenido general-->
<div class="gContPage">
    <div class="maxW">
        <div class="rdiv contWhite">
            <!--Interna -->
            <div class="gIntern sFive">
                <div class="content_intro">
                    <div class="fondoIntro">
                        <div class="bvLogin">
                            Bienvenido
                            <div class="marcaIntro">RENAULT D-Net</div>
                            <div class="textoIntro">Renaultv es una herramienta interna de comunicación entre Renault,
                                la Red de concesionarios y el cliente final.</div>
                            <div class="btnsIntro">
                                <?php foreach ($botonesPanelLista as $botonesPanel): ?>
                                <a href="<?=$botonesPanel['link']?>">
                                    <div class="cajaIntro">
                                        <img src="./images/site/<?=$botonesPanel['imagen']?>" alt="Renaultv">
                                        <div class="tpeqIntro"><?=$botonesPanel['subtitulo']?></div>
                                        <div target="_new">
                                            <p class="btnIntro"><b><?=$botonesPanel['titulo']?></b></p>
                                        </div>
                                    </div>
                                </a>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End componente Videos -->
        </div>
        <!--Fin Interna-->
    </div>
    <!--Fin Contenido general-->