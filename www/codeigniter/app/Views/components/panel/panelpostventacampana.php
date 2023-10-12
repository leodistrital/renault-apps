<?php
echo $this->include('components/menugeneral/menu');

if($tipocontenido=='rutadirectorio') echo $this->include('components/dropbox/cargarrutapostventa');



if($tipocontenido=='presentacion') echo $this->include('components/panel/campanapresentacion');

//ruta para documentos pdf
//if($tipocontenido=='pdf') echo $this->include('components/panel/campanapresentacion');



?>