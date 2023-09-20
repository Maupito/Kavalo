<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/','HomeController::index');
$routes->get('occasion', 'FicheController::occasion');
$routes->get('neuf', 'FicheController::neuf');
$routes->match(['get', 'post'],'neuf/import', 'ImportController::index');
$routes->match(['get', 'post'],'neuf/add', 'VoitureController::add');
$routes->get('voitures', 'HomeController::voitures');
$routes->match(['get', 'post'],'login', 'LogController::login');
$routes->match(['get', 'post'],'register', 'LogController::register');
$routes->post('occasion/delete/(:num)', 'VoitureController::deleteCar/$1');
$routes->get('occasion/voitures', 'VoitureController::index');
$routes->get('occasion/voiture(:num)', 'VoitureController::voiture/$1');
$routes->match(['get', 'post'], 'occasion/voiture(:segment)/edit', 'VoitureController::edit/$1');
$routes->match(['get', 'post'],'occasion/import', 'ImportController::index');
$routes->match(['get', 'post'],'occasion/add', 'VoitureController::add');
$routes->get('logout', 'LogController::logout');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
