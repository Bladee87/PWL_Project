<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Route Dashboard
$routes->get('/dashboard', 'Admin\Dashboard::index');

// Rout Login
$routes->get('/login', 'Admin\Auth::index');
