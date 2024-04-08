<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/admin', 'Admin::admin');
$routes->get('/admin/marketing', 'Admin::marketing');
$routes->get('/user/dashboard', 'User::dashboard');
$routes->get('/user/survey', 'User::survey');
