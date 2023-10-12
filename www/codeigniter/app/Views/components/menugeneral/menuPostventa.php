  <nav id="mainMenu" class="mainMenu">
      <ul>
          <li> <a href='#'>CAMPAÑAS</a>
              <ul>
                  <?php foreach ($listaCampana as $Campana): ?>
                  <li><a href="/panel/postventa/campana/<?=$Campana['slug']?>"><span><?=$Campana['nombre']?></span></a>
                  </li>

                  <?php endforeach ?>
              </ul>
          </li>

          <?php   if($acualCampana['materialComunicacion']) { ?>
          <li>
              <a href="./material/<?=$acualCampana['slug']  ?>">MATERIAL DE
                  COMUNICACIÓN</a>
          </li>
          <?php } ?>

          <?php foreach ($listaMenuNuevos as $MenuNuevos): ?>
          <li>
              <?php if($MenuNuevos['ruta']!='')  { ?>
              <a href="<?php echo ($MenuNuevos['externo']==1 ? $MenuNuevos['ruta'] : '/panel/vehiculosnuevos/contenido/'.$MenuNuevos['ruta']);?>"
                  <?php echo($MenuNuevos['externo']==1 ? 'target="_blank"' : '' );  ?>>
                  <?=$MenuNuevos['nombre'] ?>
              </a>
              <?php } else { ?>
              <a href="#"> <?=$MenuNuevos['nombre']?> </a>
              <?php }  ?>
              <?php echo view_cell('\App\Controllers\web\Panel::getSubMenu' , "menu=".$MenuNuevos['codigo'].",rutaMenu=".$_SESSION['rutaModulo'] ); ?>
          </li>
          <?php endforeach ?>
      </ul>

  </nav>