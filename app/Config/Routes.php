<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->post('/login', 'Login::login');
$routes->group('user', function ($routes) {
  $routes->get('', 'User::index');
  $routes->group('transaksi', function ($routes) {
    $routes->get('', 'Transaksi::index');
    $routes->add('simpan', 'Transaksi::simpan');
    $routes->add('cari', 'Transaksi::cari');
    $routes->add('edit', 'Transaksi::edit');
    $routes->add('hapus', 'Transaksi::hapus');
    $routes->add('detail', 'Transaksi::detail');
    $routes->add('cetak', 'Transaksi::cetakToPDF');
  });
  $routes->group('data_barang', function ($routes) {
    $routes->get('', 'Data_Barang::index');
    $routes->add('simpan', 'Data_Barang::simpan');
    $routes->add('cari', 'Data_Barang::cari');
    $routes->add('edit', 'Data_Barang::edit');
    $routes->add('hapus', 'Data_Barang::hapus');
  });
  $routes->group('data_pengguna', function ($routes) {
    $routes->get('', 'Data_Pengguna::index');
  });
  $routes->group('data_lokasi', function ($routes) {
    $routes->get('', 'Data_Lokasi::index');
    $routes->add('simpan', 'Data_Lokasi::simpan');
    $routes->add('edit', 'Data_Lokasi::edit');
    $routes->add('cari', 'Data_Lokasi::cari');
    $routes->add('hapus', 'Data_Lokasi::hapus');
  });
  $routes->group('profile', function ($routes) {
    $routes->get('', 'Profile::index');
  });
});
