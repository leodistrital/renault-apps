<?php

namespace Config;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();
// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}
/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

/** RUTAS PARA EL GENERADOR DE CODIGO */
$routes->get('/dev/generador', 'dev::generador');
$routes->get('/dev/generador/(:any)', 'dev::operaciones/$1');
$routes->get('/dev/modelo/(:any)', 'dev::crearModelo/$1');
$routes->get('/dev/modeloweb/(:any)', 'dev::crearModeloweb/$1');
$routes->get('/dev/controlador/(:any)', 'dev::crearControlador/$1');
$routes->get('/dev/controladorweb/(:any)', 'dev::crearControladorweb/$1');

// $routes->post('country', 'Country::create');


// $routes->resource('actors');
// $routes->resource('country');
// $routes->resource('genre');
// $routes->resource('director');
// $routes->resource('movie');

// $routes->post('country');

// $routes->post('products', 'Product::feature');



/** RUTAS PARA LA WEB */
$routes->get('/', 'Web\Login::index');
$routes->post('/', 'Web\Login::autenticacion');
$routes->get('/registro', 'Web\Login::nuevo');
$routes->post('/registro', 'Web\Login::registro');
// $routes->get('/panel', 'Web\Panel::index');



$routes->group('panel', ['filter' => 'authFilter'], function ($routes) {
	$routes->get('/', 'Web\Panel::index');

	$routes->get('iframe/files/(:any)', 'Web\Panel::iframe/$1');
	$routes->get('iframe/iconos/(:any)', 'Web\Panel::simplex/$1');
	$routes->get('iframe/descargar/(:any)', 'Web\Panel::descargar/$1');
	
	$routes->get('vehiculosnuevos', 'Web\Panel::panleNuevos');
	$routes->get('vehiculosnuevos/contenido/(:num)/(:num)', 'Web\Panel::contenido/$1/$2');
	$routes->get('vehiculosnuevos/contenido/(:num)', 'Web\Panel::contenido/$1');


	$routes->group('postventa', function ($routes) {
		$routes->get('', 'Web\Panel::panlePosventa');
		// $routes->get('campana/material/(:any)', 'Web\Campanas::material/$1');
		$routes->get('campana/material/(:any)/(:any)', 'Web\Campanas::material/$1/$2');
		$routes->get('campana/(:any)', 'Web\Campanas::index/$1');
		$routes->get('(:any)', 'Web\Panel::panlePosventa/$1');
		$routes->get('postventa/contenido/(:num)', 'Web\Panel::contenido/$1');
	});



	$routes->post('/updateuser', 'Web\Panel::updateuser');
	$routes->get('salir', 'Web\Panel::salir');
});








// /*** home */
// $routes->get('/', 'Web\Home::index');
// /** Menu 1 */
// $routes->get('/bam/(:any)', 'Web\Internas::contenidos/$1');
// /** Menu 2 */
// $routes->get('/convocatorias/(:any)', 'Web\Convocatorias::mostar/$1');
// /** Menu 3 */
// $routes->get('/seleccionados/(:any)/(:any)/', 'Web\Seleccionados::proyectos/$1/$2');
// /** Menu 4  programacion*/
// $routes->get('/programacion/(:any)/(:any)/', 'Web\Programacion::programacion/$1/$2');
// /** Menu 5  regiones */
// $routes->get('/regiones', 'Web\Regiones::contenidos');
// /** submenu  region */
// $routes->get('/region/(:any)', 'Web\Region::contenidos/$1');
// /** Menu 6  comunicados */
// $routes->get('/prensa', 'Web\Prensa::contenidos');
// /** Menu 6  historico */
// $routes->get('/ediciones', 'Web\Ediciones::contenidos');
// $routes->get('/ediciones/(:any)', 'Web\Ediciones::contenidos/$1');
// /** Menu 7  comunicados */
// $routes->get('/contacto', 'Web\Contacto::contenidos');
// //carga ventada flotante
// $routes->get('/seleccionado/resumen-persona/(:any)', 'Web\Seleccionados::resumenpersona/$1'); //carga ventada flotante
// $routes->get('/seleccionado/resumen-proyecto/(:any)', 'Web\Seleccionados::resumenproyecto/$1');
// $routes->get('/acreditaciones', 'Web\Acreditaciones::index');



/** RUTAS PARA EL API */
// $routes->group('api', ['namespace' => 'App\Controllers\API'], ['filter' => 'authFilter'], function ($routes) {
// 	$routes->resource('aliados');
// 	$routes->get('banners/grupo/(:num)', 'Banners::grupoBanner/$1');
// 	$routes->resource('banners');
// 	$routes->resource('categorias');
// 	$routes->resource('cifras');
// 	$routes->resource('contenidos');
// 	$routes->resource('ediciones');
// 	$routes->resource('equipos');
// 	$routes->resource('faq');
// 	$routes->resource('galeriaimagenes');
// 	$routes->resource('galeriaimagenesdetalle');
// 	$routes->resource('menuprincipal');
// 	$routes->get('noticias/grupo/(:num)', 'Noticias::gruponoticias/$1');
// 	$routes->resource('noticias');
// 	$routes->resource('sedes');
// 	$routes->resource('sitio');
// 	$routes->resource('videohome');
// 	$routes->resource('aliados');
// 	$routes->resource('categoriasconvocatoria');
// 	$routes->resource('comiteevaluador');
// 	$routes->resource('proyectos');
// 	$routes->resource('menueventos');
// 	$routes->resource('agendaeventos');
// 	$routes->resource('prensa');
// 	$routes->get('speakerseventos/grupo/(:num)', 'Speakerseventos::grupospeakeers/$1');
// 	$routes->resource('speakerseventos');
// 	$routes->resource('regionesbam');
// 	$routes->resource('label');
// 	$routes->resource('participanbam');
// 	$routes->resource('agendaeventosregiones');

// 	$routes->group('parametros', ['namespace' => 'App\Controllers\API'], function ($routes) {
// 		$routes->get('tipoaliado', 'Aliados::parametros');
// 		$routes->get('tipoacifras', 'Cifras::parametros');
// 		$routes->get('ediciones', 'Ediciones::parametros');
// 		$routes->get('categorias', 'Categorias::parametros');
// 		$routes->get('menueventos', 'Menueventos::parametros');
// 		$routes->get('galeriaimagenes', 'Galeriaimagenes::parametros');
// 		$routes->get('agendaeventos', 'Agendaeventos::parametros');
// 		$routes->get('galeriaimagenesdetalle/(:any)', 'Galeriaimagenesdetalle::parametros/$1');
// 		$routes->get('regionesbam', 'Regionesbam::parametros');
// 		$routes->get('agendaeventosregiones', 'Agendaeventosregiones::parametros');
// 		//para la tabla parametros
// 		$routes->get('parametros/(:any)', 'Parametros::filtro/$1');
// 	});
// });

// $routes->post('upload/(:any)', 'API\Archivos::upload/$1');
// // $routes->get('upload/(:any)', 'API\Archivos::upload/$1');
// $routes->post("login", "Login::index");


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}