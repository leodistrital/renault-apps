 <select type="select">
     <?php foreach ($listaconcesionarios as $concesionario) : ?>
     <option value="<?= $concesionario['id'] ?>"
         <?= ($concesionario['id'] == $_SESSION['usuario']['id_concesionario'] ? 'selected' : ''); ?>>
         <?= $concesionario['concesionario'] ?></option>
     <?php endforeach; ?>
 </select>