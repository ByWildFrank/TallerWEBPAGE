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

// Carrito
$routes->get('carrito', 'CarritoController::ver');
$routes->get('carrito/ver', 'CarritoController::ver');
$routes->get('carrito/agregar/(:num)', 'CarritoController::agregar/$1');
$routes->post('carrito/actualizar', 'CarritoController::actualizar');
$routes->get('carrito/eliminar/(:num)', 'CarritoController::eliminar/$1');

// Orden 
$routes->post('/orden/procesar', 'OrdenController::procesar');
$routes->get('/orden/completar/(:num)', 'OrdenController::completar/$1');
$routes->get('/orden/finalizar/(:num)', 'OrdenController::finalizar/$1');

// User
$routes->get('mi-cuenta', 'UserController::miCuenta', ['filter' => 'auth']);

$routes->get('register', 'Auth::register');
$routes->post('auth/registerPost', 'Auth::registerPost');

// Acceso admin
$routes->get('admin/panel', 'Admin::panel', ['filter' => 'auth:admin']);
$routes->get('admin', 'AdminController::index', ['filter' => 'auth:admin']);
$routes->get('admin/productos', 'AdminController::productos', ['filter' => 'auth:admin']);
$routes->post('admin/productos/guardar', 'AdminController::guardar', ['filter' => 'auth:admin']);
$routes->get('admin/consultas', 'AdminController::consultas', ['filter' => 'auth:admin']);
$routes->get('admin/consultas/cambiarEstado/(:num)', 'AdminController::cambiarEstadoConsulta/$1', ['filter' => 'auth:admin']); // Nueva ruta

$routes->get('/orden/imprimirFactura/(:num)', 'OrdenController::imprimirFactura/$1');

// Contacto
$routes->get('/contacto', 'ContactController::contacto');
$routes->get('/contacto_logueado', 'ContactController::contacto_logueado');
$routes->post('/contact/submit', 'ContactController::submit');

// Gestión de usuarios
$routes->get('admin/usuarios', 'AdminController::usuarios', ['filter' => 'auth:admin']);
$routes->get('admin/usuarios/nuevo', 'AdminController::nuevoUsuario', ['filter' => 'auth:admin']);
$routes->post('admin/usuarios/guardar', 'AdminController::guardarUsuario', ['filter' => 'auth:admin']);
$routes->get('admin/usuarios/editar/(:num)', 'AdminController::editarUsuario/$1', ['filter' => 'auth:admin']);
$routes->post('admin/usuarios/actualizar/(:num)', 'AdminController::actualizarUsuario/$1', ['filter' => 'auth:admin']);
$routes->get('admin/usuarios/desactivar/(:num)', 'AdminController::desactivarUsuario/$1', ['filter' => 'auth:admin']);
$routes->get('admin/usuarios/activar/(:num)', 'AdminController::activarUsuario/$1', ['filter' => 'auth:admin']);

// Dashboard
$routes->get('/admin/dashboard', 'AdminController::dashboard', ['filter' => 'auth:admin']);