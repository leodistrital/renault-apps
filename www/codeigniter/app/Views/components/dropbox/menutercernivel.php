<ul>
    <li> aca ba <?=$codigocontenido.$_SESSION['modulo']  ?>
    </li>
    <?=view_cell('\App\Libraries\ViewSitio::getMaterailComunicacionmenu', 'idcampana=0,idcontenido='.$codigocontenido) ?>
    <li <?php foreach ($listaMenutercerNivel as $MenutercerNivel): ?> <li>
        <a href="#" onclick="recargatercernivel('<?=$MenutercerNivel['ruta']  ?>')">
            <span><?=$MenutercerNivel['nombre']  ?></span>
        </a>
    </li>
    <?php endforeach ?>
</ul>