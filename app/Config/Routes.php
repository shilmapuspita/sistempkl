<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/dashboard', 'DashboardController::index', ['filter' => 'authenticate']);

// routes major
$routes->get('/major', 'MajorController::showJurusan');
$routes->get('/major/create', 'MajorController::create');
$routes->post('/major/store', 'MajorController::store');
$routes->get('/major/edit/(:num)', 'MajorController::edit/$1');
$routes->post('/major/update/(:num)', 'MajorController::update/$1');
$routes->get('/major/delete/(:num)', 'MajorController::delete/$1');

// routes mentor
$routes->get('/mentor', 'MentorController::showMentor');
$routes->get('/mentor/create', 'MentorController::create');
$routes->post('/mentor/store', 'MentorController::store');
$routes->get('/mentor/edit/(:num)', 'MentorController::edit/$1');
$routes->post('/mentor/update/(:num)', 'MentorController::update/$1');
$routes->get('/mentor/delete/(:num)', 'MentorController::delete/$1');
$routes->post('/mentor/upload', 'MentorController::upload');

// routes lembaga
$routes->get('/lembaga', 'LembagaController::showLembaga');
$routes->get('/lembaga/create', 'LembagaController::create');
$routes->post('/lembaga/store', 'LembagaController::store');
$routes->get('/lembaga/edit/(:num)', 'LembagaController::edit/$1');
$routes->post('/lembaga/update/(:num)', 'LembagaController::update/$1');
$routes->get('/lembaga/delete/(:num)', 'LembagaController::delete/$1');

// routes PKL
$routes->get('siswa/PKL', 'SiswaController::showSiswaPKL');
$routes->get('siswa/PKL/create', 'SiswaController::createSiswaPKL');
$routes->post('siswa/PKL/store', 'SiswaController::storeSiswaPKL');
$routes->get('siswa/PKL/edit/(:num)', 'SiswaController::editSiswaPKL/$1');
$routes->post('siswa/PKL/update/(:num)', 'SiswaController::updateSiswaPKL/$1');
$routes->get('siswa/PKL/delete/(:num)', 'SiswaController::deleteSiswaPKL/$1');

// routes riset
$routes->get('siswa/riset', 'SiswaController::showSiswaRiset');
$routes->get('siswa/riset/create', 'SiswaController::createSiswaRiset');
$routes->post('siswa/riset/store', 'SiswaController::storeSiswaRiset');
$routes->get('siswa/riset/edit/(:num)', 'SiswaController::editSiswaRiset/$1');
$routes->post('siswa/riset/update/(:num)', 'SiswaController::updateSiswaRiset/$1');
$routes->get('siswa/riset/delete/(:num)', 'SiswaController::deleteSiswaRiset/$1');

//routes data intern
$routes->get('intern', 'InternshipController::showInternship');
$routes->get('intern/create', 'InternshipController::create');
$routes->post('intern/store', 'InternshipController::store');
$routes->get('intern/edit/(:num)', 'InternshipController::edit/$1');
$routes->post('intern/update/(:num)', 'InternshipController::update/$1');
$routes->get('intern/delete/(:num)', 'InternshipController::delete/$1');

// routes untuk  login
$routes->group('login', ['filter' => 'redirectIfAuthenticated'], function ($routes) {
    $routes->get('/', 'AdminController::login');
    $routes->post('/', 'AdminController::processLogin');
});
$routes->get('logout', 'AdminController::logout');

// routes untuk register
$routes->get('/admin/register', 'AdminController::register');
$routes->post('/admin/register', 'AdminController::processRegister');

// routes untuk profile
$routes->get('admin/profile', 'AdminController::profile');
$routes->get('admin/edit_profile', 'AdminController::editProfile'); 
$routes->post('admin/update-profil', 'AdminController::updateProfile');

// routes untuk ekspor data
$routes->post('export-siswa', 'SiswaController::exportForm');
$routes->post('/proses-ekspor', 'SiswaController::exportSiswaPKL');




