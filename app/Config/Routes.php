<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
//  */
// $routes->get('/', 'Home::index');
// $routes->get('/pegawai', 'PegawaiController::index');
// $routes->get('/pegawai/(:num)', 'PegawaiController::show/$1');
// $routes->post('/pegawai', 'PegawaiController::create');
// $routes->put('/pegawai/(:num)', 'PegawaiController::update/$1');
// $routes->delete('/pegawai/(:num)', 'PegawaiController::delete/$1');

//! routes untuk mempermudah
$routes->resource('pegawai', [
  'controller' => 'pegawaiController'
]);