<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/dashboard', 'AdminController::index', ['filter' => 'authenticate']);

// routes major
$routes->get('/major', 'MajorController::showJurusan');
$routes->get('/major/create', 'MajorController::create');
$routes->post('/major/store', 'MajorController::store');

// routes mentor
$routes->get('/mentor', 'MentorController::showMentor'); 
$routes->get('/mentor/create', 'MentorController::create'); 
$routes->post('/mentor/store', 'MentorController::store'); 

$routes->get('/mentor/edit/(:num)', 'MentorController::edit/$1'); 
$routes->post('/mentor/update/(:num)', 'MentorController::update/$1');
$routes->get('/mentor/delete/(:num)', 'MentorController::delete/$1');

// routes lembaga
$routes->get('/lembaga', 'LembagaController::showLembaga');

// Routes Data Siswa
$routes->get('/siswa', 'SiswaController::showSiswa');
$routes->get('/siswaPKL', 'SiswaController::showSiswaPKL');
$routes->get('/siswaRiset', 'SiswaController::showSiswaRiset');
$routes->get('/intern', 'InternshipController::showInternship');

// routes untuk  login
$routes->group('login', ['filter' => 'redirectIfAuthenticated'], function ($routes) {
    $routes->get('/', 'AdminController::login');
    $routes->post('/', 'AdminController::processLogin');
});
$routes->get('logout', 'AdminController::logout');

// routes untuk register
$routes->get('/admin/register', 'AdminController::register');
$routes->post('/admin/register', 'AdminController::processRegister');