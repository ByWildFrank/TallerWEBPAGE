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


$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

// Carrito
$routes->get('carrito', 'CarritoController::ver');
$routes->get('carrito/ver', 'CarritoController::ver');
$routes->get('carrito/agregar/(:num)', 'CarritoController::agregar/$1');
$routes->post('carrito/actualizar', 'CarritoController::actualizar');
$routes->get('carrito/eliminar/(:num)', 'CarritoController::eliminar/$1');

// orden 
$routes->post('/orden/procesar', 'OrdenController::procesar');
$routes->get('/orden/completar/(:num)', 'OrdenController::completar/$1');
$routes->get('/orden/finalizar/(:num)', 'OrdenController::finalizar/$1');

//User
$routes->get('mi-cuenta', 'UserController::miCuenta', ['filter' => 'auth']);

$routes->get('register', 'Auth::register');
$routes->post('auth/registerPost', 'Auth::registerPost');

//Acceso admin
$routes->get('admin/panel', 'Admin::panel', ['filter' => 'auth:admin']);

