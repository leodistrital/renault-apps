  <ul>
      <?php foreach ($listaTipoDocumentos as $subMenu): ?>
      <li>
          <a href="<?=current_url().'/'.$subMenu['cod_tip_doc']?>"><?=$subMenu['nombredocumento']?></a>
      </li>
      <?php endforeach ?>
  </ul>