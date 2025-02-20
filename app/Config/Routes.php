<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/dashboard', 'AdminController::index');
$routes->get('/major', 'MajorController::showJurusan');
$routes->get('/lembaga', 'LembagaController::showLembaga');
$routes->get('/mentor', 'MentorController::showMentor');
$routes->get('/admin/login', 'AdminController::login');
$routes->get('/admin/register', 'AdminController::register');