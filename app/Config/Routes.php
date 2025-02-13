<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/dashboard', 'AdminController::index');

// $routes->group('admin', function ($routes) {
//     $routes->get('dashboard', 'Admin\Dashboard::index');
// });
// $routes->group('admin', function ($routes) {
//     $routes->get('/', 'Admin\AdminController::index'); // Redirect ke dashboard
//     $routes->get('dashboard', 'Admin\Dashboard::index'); // Dashboard utama
// });



