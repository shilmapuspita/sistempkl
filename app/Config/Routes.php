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

$routes->get('/lembaga', 'LembagaController::showLembaga');
$routes->get('/mentor', 'MentorController::showMentor');

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