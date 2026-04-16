<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return view('admin/index');
});

// Route Dashboard
$routes->get('/dashboard', 'Admin\Dashboard::index');

// Route Login and Register
$routes->get('login', 'Admin\Auth::login');
$routes->get('register', 'Admin\Auth::register');
