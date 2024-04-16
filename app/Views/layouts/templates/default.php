<?php
// Simpan data dari session
$user = session()->get('user');
$role = $user['id_role'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Market Surveyor</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div class="d-flex col-md-12 mt-2" style="margin-left: -20px;">
        <div class="col-md-5 text-center">
          <img src="/dist/img/logo-abadi-utama.png" alt="AdminLTE Logo" class="nav-icon img-circle w-50">
        </div>
        <div class="col-md-9" style="margin-left: -25px;">
          <p class="brand-text font-weight-bold text-yellow">E-MARKETING SURVEYOR</p>
          <p class="brand-text font-weight-light text-light" style="margin-top: -10px;">PT.ABADI SURVEYOR</p>
        </div>
      </div>
      <div class="brand-link" style="margin-top: -25px;"></div>
      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="/user" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <?php if ($role == 1) : ?>
              <li class="nav-header">DATA MANAGER</li>
              <div class="brand-link" style="margin-top: -20px;"></div>
              <li class="nav-item">
                <a href="/user/data_pengguna" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>
                    Data Pengguna
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/user/data_barang" class="nav-link">
                  <i class="fas fa-boxes nav-icon"></i>
                  <p>
                    Data Barang
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/user/data_lokasi" class="nav-link">
                  <i class="fas fa-map nav-icon"></i>
                  <p>
                    Data Lokasi
                  </p>
                </a>
              </li>
            <?php endif; ?>
            <li class="nav-header">TRANSAKSI</li>
            <div class="brand-link" style="margin-top: -20px;"></div>
            <li class="nav-item">

              <a href="/user/survey" class="nav-link">
                <i class="fas fa-calendar nav-icon"></i>
                <p>
                  Data Transaksi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-file-export nav-icon"></i>
                <p>
                  Laporan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/top-nav.html" class="nav-link">
                    <i class="fas fa-file-excel nav-icon"></i>
                    <p>Cetak Data Transaksi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/top-nav.html" class="nav-link">
                    <i class="fas fa-file-pdf nav-icon"></i>
                    <p>Cetak Bukti Transaksi</p>
                  </a>
                </li>
              </ul>
            </li>
            <div class="brand-link"></div>
            <li class="nav-item">
              <a href="/logout" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p> Logout</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?= $this->renderSection('content'); ?>
    </div>
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>E-Marketing Surveyor</b>
      </div>
      <strong>Copyright &copy; <?= date('Y'); ?> All rights reserved.
    </footer>

  </div>
  <!-- ./wrapper -->
</body>

</html>