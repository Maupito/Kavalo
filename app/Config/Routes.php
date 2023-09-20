<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'],'login', 'Home::login');
$routes->match(['get', 'post'],'register', 'Home::register');