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
$routes->get('/admin/tables', 'Admin\Dashboard::tables');

// Route Data Tables (CRUD)
$routes->get('/admin/detail-transaksi', 'Admin\Dashboard::detailTransaksi');
$routes->post('/admin/detail-transaksi/save', 'Admin\Dashboard::saveDetailTransaksi');
$routes->post('/admin/detail-transaksi/update', 'Admin\Dashboard::updateDetailTransaksi');
$routes->get('/admin/detail-transaksi/delete/(:num)', 'Admin\Dashboard::deleteDetailTransaksi/$1');

$routes->get('/admin/kendaraan', 'Admin\Dashboard::kendaraan');
$routes->post('/admin/kendaraan/save', 'Admin\Dashboard::saveKendaraan');
$routes->post('/admin/kendaraan/update', 'Admin\Dashboard::updateKendaraan');
$routes->get('/admin/kendaraan/delete/(:num)', 'Admin\Dashboard::deleteKendaraan/$1');

$routes->get('/admin/pelanggan', 'Admin\Dashboard::pelanggan');
$routes->post('/admin/pelanggan/save', 'Admin\Dashboard::savePelanggan');
$routes->post('/admin/pelanggan/update', 'Admin\Dashboard::updatePelanggan');
$routes->get('/admin/pelanggan/delete/(:num)', 'Admin\Dashboard::deletePelanggan/$1');

$routes->get('/admin/transaksi', 'Admin\Dashboard::transaksi');
$routes->post('/admin/transaksi/save', 'Admin\Dashboard::saveTransaksi');
$routes->post('/admin/transaksi/update', 'Admin\Dashboard::updateTransaksi');
$routes->get('/admin/transaksi/delete/(:num)', 'Admin\Dashboard::deleteTransaksi/$1');

$routes->get('/admin/user', 'Admin\Dashboard::user');
$routes->post('/admin/user/save', 'Admin\Dashboard::saveUser');
$routes->post('/admin/user/update', 'Admin\Dashboard::updateUser');
$routes->get('/admin/user/delete/(:num)', 'Admin\Dashboard::deleteUser/$1');
$routes->get('/admin/admin', 'Admin\Dashboard::admin');

// Route Login and Register
$routes->post('/admin/saveLogin', 'Admin\Auth::saveLogin');
$routes->post('/admin/saveRegister', 'Admin\Auth::saveRegister');
$routes->get('/admin/login', 'Admin\Auth::login');
$routes->get('/admin/register', 'Admin\Auth::register');
$routes->get('/admin/logout', 'Admin\Auth::logout');