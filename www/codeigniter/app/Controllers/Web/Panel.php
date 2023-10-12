<?php

namespace App\Controllers\web;

use App\Models\web\ConcesionariosWebModel;


use App\Controllers\MyApiRest;
use App\Models\web\BannersaplicacionWebModel;
use App\Models\web\BotonesaplicacionesWebModel;
use App\Models\web\CampaniasWebModel;
use App\Models\web\MenugeneralWebModel;


class Panel extends  MyApiRest
{
	protected $format    = 'json';

	public function index()
	{
		$session = session();
		$this->getModuloPrametros(0);
		$botonesPanelLista = $this->getBotones('inicio');
		return view('panel', [ 'menusuperior' => '', 'botonesPanelLista' => $botonesPanelLista]);
	}


	public function salir()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/');
	}


	public function panleNuevos()
	{
		$tipocontenido = 'inicio';
		$rutaModulo = '/panel/vehiculosnuevos/contenido/';
		$this->getModuloPrametros(1);

		$menuGenral = new MenugeneralWebModel();
		$array = ["nom_men as nombre", 'rut_men as ruta', 'cod_men as codigo'];
		$wherearray = ["cod_mod" => 1, 'des_men' => 1, ' pad_men' => 0];
		$listaMenuNuevos = $menuGenral->select($array)->where($wherearray)->orderBy('ord_men')->findAll();

		$botonesPanelLista = $this->getBotones();
		$bannersPanelLista = $this->getBanners();
		
		return view('panelnuevos', [ 'listaMenuNuevos' => $listaMenuNuevos, 'tipocontenido' => $tipocontenido, 'botonesPanelLista' => $botonesPanelLista, 'bannersPanelLista' => $bannersPanelLista, 'rutaModulo' => $rutaModulo]);
		
	}


	public function panlePosventa($sluCampana = '')
	{
		$session = session();
		$this->getModuloPrametros(2);
		$acualCampana['materialComunicacion']=''; // no se tiene ninguna campana seleccionada
		$tipocontenido = '';
		
		
		$menuGenral = new MenugeneralWebModel();
		$array = ["nom_men as nombre", 'rut_men as ruta', 'cod_men as codigo', 'ext_men as externo', 'box_men as dropbox'];
		$wherearray = ["cod_mod" => 2, 'des_men' => 1, 'pad_men' => 0];
		$listaMenuNuevos = $menuGenral->select($array)->where($wherearray)->orderBy('ord_men')->findAll();
		
		$Campanas  = new CampaniasWebModel();
		$array = ['slu_cam as slug', 'nom_cam as nombre'];
		$wherearray = ["act_cam" => 1];
		$listaCampana = $Campanas->select($array)->where($wherearray)->orderBy('cod_cam', 'DESC')->find();


		$botonesPanelLista = $this->getBotones();
		$bannersPanelLista = $this->getBanners();

		// return '';
		return view('panelpostventa', [
			'datosUsuario' => $session->usuario, 'menusuperior' => $_SESSION['menusuperior'], 'listaMenuNuevos' => $listaMenuNuevos,  'botonesPanelLista' => $botonesPanelLista, 'bannersPanelLista' => $bannersPanelLista, 'tipocontenido' => $tipocontenido , 'listaCampana' =>$listaCampana, 'acualCampana' =>$acualCampana
		]);
	}


	public function getSubMenu($menu, $rutaMenu = '')
	{
		// echo $menu;
		// echo "leo";	
		// return '';
		// echo $rutaMenu;
		$menuGenral = new MenugeneralWebModel();
		$array = ["nom_men as nombre", 'rut_men as ruta', 'cod_men as codigo'];
		$wherearray = ["pad_men" => $menu, 'des_men' => 1];
		$subMenu = $menuGenral->select($array)->where($wherearray)->orderBy('ord_men')->findAll();
		if (count($subMenu))  return view('components/menugeneral/subMenuNuevos', ['listasubMenu' => $subMenu, 'rutaMenu' => $rutaMenu]);
		else return '';
	}

	public function contenido($codigocontenido, $codigoPadre=0)
	{
		// echo $codigocontenido;
		$session = session();
		$tipocontenido = 'rutadirectorio';

		$menuGenral = new MenugeneralWebModel();
		$array = ["nom_men as nombre", 'rut_men as ruta', 'cod_men as codigo'];
		$wherearray = ["cod_mod" => 1, 'des_men' => 1, ' pad_men' => 0];
		$listaMenuNuevos = $menuGenral->select($array)->where($wherearray)->orderBy('ord_men')->findAll();

		$array = ["nom_men as nombre", 'rut_men as ruta', 'rut_men as navegacion', 'cod_men as codigo', 'tit_men as titulo', 'ent_men as entredilla'];
		$wherearray = ["cod_men" => $codigocontenido];
		
		$contenidoDirectorio = $menuGenral->select($array)->where($wherearray)->find();

		$_SESSION['dropbox'] =  $contenidoDirectorio[0];

		return view('panelnuevos', [
			'datosUsuario' => $session->usuario,  'listaMenuNuevos' => $listaMenuNuevos, 'tipocontenido' => $tipocontenido, 'contenidoDirectorio' => $contenidoDirectorio[0] , 'codigocontenido' => $codigocontenido 
		]);
	}


	public function iframe($rutafreame)
	{
		$session = session();
		// var_dump($_SESSION['dropbox']);
		$rutafreame = str_replace('@@@', '/', $rutafreame);
		return view('components/dropbox/iframe/dropbox/dropbox', ['result' => '', 'access_token' => '', 'dir' => '',  'datos' => '', 'contenidoDirectorio' => $rutafreame]);
	}


	public function simplex($img)
	{
		return view('components/dropbox/iframe/dropbox/iconos', ['imgicono' => $img]);
	}

	public function descargar($id)
	{
		$file = $id;
		// Prepare new cURL resource
		$ch = curl_init('https://api.dropbox.com/oauth2/token');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&refresh_token=od00fBC88yEAAAAAAAAAAdWt_VAE6iGDeY9xZfP3dR_5AGGcyf5ocNxbfwVGmKW-");
		// // Set HTTP Header for POST request 
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Authorization: Basic MDBmb24xcnlieDllZHZ5OnRyMjJwdDlwcmEwNnZwMA==', 'Content-Type: application/x-www-form-urlencoded'
			)
		);

		$result = curl_exec($ch);
		// var_dump($result);
		$arr = $this->JSON2Array($result);
		curl_close($ch);
		$tokenConsulta = $arr['access_token'];
		$tokenConsulta = "Bearer $tokenConsulta";
		$parameters = array('path' => "$file");
		$headers = array(
			"Authorization: $tokenConsulta",
			'Content-Type: application/json'
		);
		$curlOptions = array(
			CURLOPT_HTTPHEADER => $headers,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => json_encode($parameters),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_VERBOSE => true
		);
		$ch = curl_init('https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings');
		curl_setopt_array($ch, $curlOptions);
		$response = curl_exec($ch);
		$response = curl_exec($ch);
		$inforlink = $this->JSON2Array($response);
		$urlDescarga = $inforlink['url'];
		$urlDescarga =  str_replace("?dl=0", "?dl=1", $urlDescarga);
		curl_close($ch);
		return redirect()->to($urlDescarga);
	}

	public function JSON2Array($data)
	{
		return  (array) json_decode(stripslashes($data));
	}

	public function getBotones()
	{
		// $session = session();
		// echo print_r($_SESSION);
		$BotonesAplicacion = new  BotonesaplicacionesWebModel();
		$campos = ['tit_btn as titulo', ' sti_btn  as subtitulo',  'lin_btn as link', 'img_btn as imagen'];
		return $botonesPanelLista = $BotonesAplicacion->select($campos)->where('tip_btn', $_SESSION['menusuperior'])->orderBy('ord_btn')->findAll();
	}


	public function getBanners()
	{
		$datos = new  BannersaplicacionWebModel();
		$campos = ['nom_ban as titulo', ' sub_ban  as subtitulo',  'lin_ban as link', 'img_ban as imagen'];
		return $datos->select($campos)->where('tip_ban', $_SESSION['menusuperior'])->orderBy('ord_ban')->findAll();
	}


	public function getModuloPrametros($modulo)
	{

		$session = session();

		if ($modulo == 0) {
			$_SESSION['modulo'] = $modulo;
			$_SESSION['menusuperior'] = 'inicio';
			$_SESSION['rutaModulo'] = '';
		}

		if ($modulo == 1) {
			$_SESSION['modulo'] = $modulo;
			$_SESSION['menusuperior'] = 'nuevos';
			$_SESSION['rutaModulo'] = '/panel/vehiculosnuevos/contenido/';
		}

		if ($modulo == 2) {
			$_SESSION['modulo'] = $modulo;
			$_SESSION['menusuperior'] = 'postventa';
			$_SESSION['rutaModulo'] = '/panel/postventa/contenido/';
		}

		// echo $_SESSION['menusuperior'].' las session ';

	}
}