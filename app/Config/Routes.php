<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/user', 'User::index');
$routes->get('/user/survey', 'User::survey');
$routes->get('/user/data_pengguna', 'User::data_pengguna');
// $routes->get('/admin/dashboard', 'Admin::dashboard');
// $routes->get('/admin/admin', 'Admin::admin');
// $routes->get('/admin/marketing', 'Admin::marketing');
// $routes->get('/user/dashboard', 'User::dashboard');