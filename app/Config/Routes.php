<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/dashboard', 'AdminController::index');

// routes major
$routes->get('/major', 'MajorController::showJurusan');
$routes->get('/major/create', 'MajorController::create');

$routes->get('/lembaga', 'LembagaController::showLembaga');
$routes->get('/mentor', 'MentorController::showMentor');

// Routes Data Siswa
$routes->get('/siswa', 'SiswaController::showSiswa');
$routes->get('/siswaPKL', 'SiswaController::showSiswaPKL');
$routes->get('/siswaRiset', 'SiswaController::showSiswaRiset');
$routes->get('/intern', 'InternshipController::showInternship');


// routes untuk register dan login
$routes->group('login', ['filter' => 'redirectIfAuthenticated'], function ($routes) {
    $routes->get('/', 'AdminController::login');
    $routes->post('/', 'AdminController::processLogin');
});
// $routes->get('/admin/login', 'AdminController::login');
// $routes->post('/admin/login', 'AdminController::processLogin');

$routes->get('/admin/register', 'AdminController::register');
$routes->post('/admin/register', 'AdminController::processRegister');


