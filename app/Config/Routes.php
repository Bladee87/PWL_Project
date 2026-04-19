<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return view('admin/index');
});

// Route Dashboard
$routes->get('/admin/dashboard', 'Admin\Dashboard::index');

// Route Login and Register
$routes->post('/admin/saveLogin', 'Admin\Auth::saveLogin');
$routes->post('/admin/saveRegister', 'Admin\Auth::saveRegister');
$routes->get('/admin/login', 'Admin\Auth::login');
$routes->get('/admin/register', 'Admin\Auth::register');
$routes->get('/admin/logout', 'Admin\Auth::logout');