<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'],'login', 'LogController::login');
$routes->match(['get', 'post'],'register', 'LogController::register');
$routes->get('logout', 'LogController::logout');