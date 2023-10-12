  <ul>
      <?php foreach ($listasubMenu as $subMenu): ?>
      <li>
          <a href="<?=$rutaMenu.$subMenu['codigo']?>"><?=$subMenu['nombre']?></a>
      </li>
      <?php endforeach ?>
  </ul>