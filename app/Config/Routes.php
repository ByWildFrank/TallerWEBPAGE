<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('quienesSomos', 'QuienesSomos::index');
$routes->get('principal', 'Principal::index');
$routes->get('contacto', 'Contacto::index');
$routes->get('comercializacion', 'Comercializacion::index');
$routes->get('terminosCondiciones', 'TerminosCondiciones::index');

