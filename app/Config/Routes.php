<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pegawai', 'PegawaiController::index');
$routes->post('/pegawai', 'PegawaiController::create');
$routes->put('/pegawai/(:num)', 'PegawaiController::update/$1');
