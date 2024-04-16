<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->post('/login', 'Login::login');
$routes->get('/user', 'User::index');
$routes->get('/user/survey', 'User::survey');
$routes->get('/user/data_pengguna', 'User::data_pengguna');
$routes->get('/user/data_barang', 'User::data_barang');
$routes->get('/user/data_lokasi', 'User::data_lokasi');
$routes->post('/user/data_barang/simpan', 'Data_Barang::simpan');
$routes->post('/user/data_barang/edit', 'Data_Barang::edit');
$routes->post('/user/data_barang/cari', 'Data_Barang::cari');
$routes->post('/user/data_barang/hapus', 'Data_Barang::hapus');

// $routes->get('/admin/dashboard', 'Admin::dashboard');
// $routes->get('/admin/admin', 'Admin::admin');
// $routes->get('/admin/marketing', 'Admin::marketing');
// $routes->get('/user/dashboard', 'User::dashboard');