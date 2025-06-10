<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('principal', 'Principal::index');
$routes->get('quienesSomos', 'QuienesSomos::index');
$routes->get('contacto', 'Contacto::index');
$routes->get('comercializacion', 'Comercializacion::index');
$routes->get('terminosCondiciones', 'TerminosCondiciones::index');
$routes->get('catalogo', 'ProductController::index');
$routes->get('product/detalle/(:num)', 'ProductController::detalle/$1');

$routes->get('login', 'Auth::login');
$routes->post('auth/loginPost', 'Auth::loginPost');
$routes->get('logout', 'Auth::logout');
$routes->get('auth/login', 'Auth::login');



/*
$routes->get('login', 'Auth::login');
$routes->post('auth/loginPost', 'Auth::loginPost');
$routes->get('logout', 'Auth::logout');
*/
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
