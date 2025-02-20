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

// Routes Data Siswa
$routes->get('/siswa', 'SiswaController::showSiswa');
$routes->get('/siswaPKL', 'SiswaController::showSiswaPKL');
$routes->get('/siswaRiset', 'SiswaController::showSiswaRiset');
$routes->get('/intern', 'InternshipController::showInternship');


$routes->get('/admin/login', 'AdminController::login');
$routes->get('/admin/register', 'AdminController::register');

