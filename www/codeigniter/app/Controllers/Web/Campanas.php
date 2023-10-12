<?php
namespace App\Controllers\web;
use App\Models\web\ConcesionariosWebModel;
use App\Controllers\MyApiRest;
use App\Models\web\CampaniasWebModel;
use App\Models\web\MenugeneralWebModel;
use App\Models\web\SeccionescampanaimagenesWebModel;
use App\Models\web\SeccionescampanaWebModel;

class Campanas extends  MyApiRest
{
	protected $format    = 'json';

	public function index($slugCampana='' , $seccion=0 )
	{
		$session = session();
		$tipocontenido = 'presentacion';
		$Campanas  = new CampaniasWebModel();
		$seccionescampana = new SeccionescampanaWebModel();
		$seccionescampanaimagenes = new SeccionescampanaimagenesWebModel();
		
		// echo $slugCampana.'slugCampana';
		// echo $seccion.'seccion';
		
		// $concesionarios = new ConcesionariosWebModel();
		// $array = ['concesionarios.id', "concat(ciudades.nombre , ' - ', concesionarios.nombre ) as concesionario"];
		// $listaconcesionarios = $concesionarios->select($array)->join('ciudades', 'id_ciudad=ciudades.id')->orderBy('ciudades.nombre')->findAll();

		$menuGenral = new MenugeneralWebModel();
		$array = ["nom_men as nombre", 'rut_men as ruta', 'cod_men as codigo', 'ext_men as externo', 'box_men as dropbox'];
		$wherearray = ["cod_mod" => 2, 'des_men' => 1, 'pad_men' => 0];
		$listaMenuNuevos = $menuGenral->select($array)->where($wherearray)->orderBy('ord_men')->findAll();


		$array = ['slu_cam as slug', 'nom_cam as nombre'];
		$wherearray = ["act_cam" => 1];
		$listaCampana = $Campanas->select($array)->where($wherearray)->orderBy('cod_cam', 'DESC')->find();


		$array = ['slu_cam as slug', 'nom_cam as nombre', 'cod_cam as codigo', 'mat_cam as materialComunicacion' ];
		$wherearray = ["act_cam" => 1 , 'slu_cam' => $slugCampana ];
		$acualCampana = $Campanas->select($array)->where($wherearray)->orderBy('cod_cam', 'DESC')->find();

		$array = ['cod_sca as codigo', ' nom_sca as nombre'];
		$wherearray = [" cod_cam_sca " => $acualCampana[0]['codigo']  ];
		$listaSeccionescampana = $seccionescampana->select($array)->where($wherearray)->orderBy('ord_sca', 'ASC')->find();

		// echo gettype($listaSeccionescampana[0]);
		// var_dump($listaSeccionescampana);
		
		if($seccion==0){
			$seccionActual= reset($listaSeccionescampana[0]);
		} else {
			$seccionActual=$seccion;
		}
		
		$array = ['ima_csi as imagen'];
		$wherearray = ["cod_sca_csi" => $seccionActual  ];
		$listaImagenesSeccion = $seccionescampanaimagenes->select($array)->where($wherearray)->orderBy('ord_csi', 'ASC')->find();

// return '';


		return view('panelcampana', [ 'listaMenuNuevos' => $listaMenuNuevos, 'tipocontenido' => $tipocontenido , 'listaCampana' =>$listaCampana , 'acualCampana' => $acualCampana[0] , 'listaSeccionescampana' =>$listaSeccionescampana , 'listaImagenesSeccion' =>$listaImagenesSeccion ]);

	}

	public function material($slugCampana='', $tipodocumento=0 )
	{
		$session = session();
		$tipocontenido = 'rutadirectorio';
		$Campanas  = new CampaniasWebModel();
		// $seccionescampana = new SeccionescampanaWebModel();
		
		$menuGenral = new MenugeneralWebModel();
		$array = ["nom_men as nombre", 'rut_men as ruta', 'cod_men as codigo', 'ext_men as externo', 'box_men as dropbox'];
		$wherearray = ["cod_mod" => 2, 'des_men' => 1, 'pad_men' => 0];
		$listaMenuNuevos = $menuGenral->select($array)->where($wherearray)->orderBy('ord_men')->findAll();


		$array = ['slu_cam as slug', 'nom_cam as nombre'];
		$wherearray = ["act_cam" => 1];
		$listaCampana = $Campanas->select($array)->where($wherearray)->orderBy('cod_cam', 'DESC')->find();


		$array = ['slu_cam as slug', 'nom_cam as nombre', 'cod_cam as codigo', 'mat_cam as materialComunicacion' ];
		$wherearray = ["act_cam" => 1 , 'slu_cam' => $slugCampana ];
		$acualCampana = $Campanas->select($array)->where($wherearray)->orderBy('cod_cam', 'DESC')->find();

		// var_dump($acualCampana);
		// return '';
		
		return view('panelcampana', [  'listaMenuNuevos' => $listaMenuNuevos, 'tipocontenido' => $tipocontenido , 'listaCampana' =>$listaCampana , 'acualCampana' => $acualCampana[0]	]);

	}

	
}