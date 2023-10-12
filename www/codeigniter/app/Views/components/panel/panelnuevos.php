<?php
echo $this->include('components/menugeneral/menu');
if($_SESSION['menusuperior']=='nuevos' && $tipocontenido=='inicio'  ) echo $this->include('components/panel/homeNueno');
if($tipocontenido=='rutadirectorio') echo $this->include('components/dropbox/cargarruta');
?>