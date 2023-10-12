<?php

namespace App\Libraries;

use App\Models\web\ConcesionariosWebModel;
use App\Models\web\DocumentocampamaWebModel;
use App\Models\web\MenugeneralWebModel;
// use CodeIgniter\Session\Session;

class ViewSitio
{

    public function getConsesionarios()
    {
        $concesionarios = new ConcesionariosWebModel();
		$array = ['concesionarios.id', "concat(ciudades.nombre , ' - ', concesionarios.nombre ) as concesionario"];
		$listaconcesionarios = $concesionarios->select($array)->join('ciudades', 'id_ciudad=ciudades.id')->orderBy('ciudades.nombre')->findAll();
        return view('components/formularios/consesionarios', ['listaconcesionarios' => $listaconcesionarios]);
    }


     public function getMenutercerNivel($nenuPadre=0)
    {
        // echo $nenuPadre;
        $menuGenral = new MenugeneralWebModel();
		$array = ["nom_men as nombre", 'rut_men as ruta', 'cod_men as codigo'];
		$wherearray = ["cod_mod" => 1, 'des_men' => 1, ' pad_men' => $nenuPadre];
		$listaMenutercerNivel = $menuGenral->select($array)->where($wherearray)->orderBy('ord_men')->findAll();
        return view('components/dropbox/menutercernivel', ['listaMenutercerNivel' => $listaMenutercerNivel]);
    }


    public function getMaterailComunicacionmenu($idcampana=0 , $idcontenido=0)
    {

        $documentocampamaWebModel= new DocumentocampamaWebModel();
        $array = ['cod_tip_doc', 'nom_op_para as nombredocumento'];
        $wherearray = ["cod_cod_cam" => $idcampana , 'nom_para' => 'tipodocumentocampana' ];
        $listaTipoDocumentos = $documentocampamaWebModel->select($array)->join('parametros','val_op_para=cod_tip_doc','left' )->where($wherearray)->orderBy('cod_tip_doc', 'ASC')->groupBy('cod_tip_doc')->find();
        // var_dump($listaTipoDocumentos);


        //  if($idcontenido == 35  AND $_SESSION['modulo']==1  ){
        //     echo "matediral de comunicanion";
        // }
// var_dump($idcampana);

        // foreach ($listaTipoDocumentos  as $iipoDocumentos) {
        //     var_dump($iipoDocumentos);
        // }
        // echo current_url();

        // MenuCampana
        // return '<ul>
        //         <li><a href="editables.php"><span>Editables campaña</span></a></li>
        //         <li><a href="fichas.php"><span>Fichas porta precio</span></a></li>
        //         <li><a href="cotizadores.php"><span>Cotizadores</span></a></li>
        //         <li><a href="catalogos.php"><span>Catálogos</span></a></li>
        //         </ul>
        //     ';
        return view('components/menugeneral/Menucampana', ['listaTipoDocumentos' => $listaTipoDocumentos]);
    }


   
}  