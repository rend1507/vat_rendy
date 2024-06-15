<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');


$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/pesan', 'AdminController::createReservation');
$routes->post('/admin/store_reservation', 'AdminController::storeReservation');
$routes->get('/admin/remove_reservation/(:num)', 'AdminController::removeReservation/$1');

$routes->get('/admin/vehicles', 'VehicleController::index');
$routes->get('/admin/vehicles/tambah', 'VehicleController::form');
$routes->get('/admin/vehicles/edit/(:num)', 'VehicleController::form/$1');
$routes->post('/admin/vehicles/create', 'VehicleController::create');
$routes->post('/admin/vehicles/update/(:num)', 'VehicleController::update/$1');
$routes->get('/admin/vehicles/delete/(:num)', 'VehicleController::delete/$1');

$routes->get('/approver', 'ApproverController::index');
$routes->get('/approver/laporan', 'ReportController::index');
$routes->get('/approver/approve_reservation/(:num)', 'ApproverController::approveReservation/$1');
$routes->get('/approver/reject_reservation/(:num)', 'ApproverController::rejectReservation/$1');

