<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Route Dashboard
$routes->get('/dashboard', 'Dashboard::index');
