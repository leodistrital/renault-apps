<div class="gLPage"></div>
<!--Page Header-->
<header class="pageHeader">
    <div>
        <h1>
            <a href="/panel">
                <span class="gHidden">RENAULT D-NET</span>
                <img src="/images/site/renault_2021_simbolo.svg" alt="RENAULT D-NET">
            </a>
        </h1>
        <!--Main Menu-->
        <?php 
        echo ($_SESSION['menusuperior']=='nuevos' ?  $this->include('components/menugeneral/menuNuevos') : '' ) ; ?>
        <?php  
        echo ($_SESSION['menusuperior']=='postventa' ?  $this->include('components/menugeneral/menuPostventa') : '' ) ; 
        ?>
        <?php  echo $this->include('components/menugeneral/menuenviapregunta'); ?>
        <?php echo $this->include('components/menugeneral/menuUusuario'); ?>
    </div>
</header>
<!--Fin Page Header-->