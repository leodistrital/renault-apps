 <!--Fin Main Menu-->
 <nav class="menuRightBottom mainMenu">
     <ul>
         <li>
             <div class="usuario_info" id="nombreUsuario" onclick="openForm()&closePreg()">
                 <b><?= $_SESSION['usuario']['nombre'] ?></b>
             </div>
         </li>
         <li>
             <div class="concesionario_info" id="nombreUsuario" onclick="openForm()&closePreg()">
                 <?= $_SESSION['usuario']['nombreConcesionario']  ?>
             </div>
         </li>
         <li>
             <a href="./" class="btnCot ">SALIR</a>
         </li>
     </ul>
 </nav>
 <!--Fin Main Menu-->
 <?php echo  $this->include('components/formularios/usuario'); ?>
 <?php echo $this->include('components/formularios/preguntas'); ?>