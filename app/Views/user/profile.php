<?= $this->extend('layouts/templates/default'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <!-- Foto Profile -->
        <div class="card">
          <div class="card-body">
            <img src="<?= base_url('path/to/profile_picture.jpg'); ?>" class="img-fluid" alt="Foto Profil">
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <!-- Fitur Lihat Profile dan Edit Profile -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Profile Information</h3>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-md-6">
                <a href="<?= site_url('user/view_profile'); ?>" class="btn btn-primary">Lihat Profile</a>
              </div>
              <div class="col-md-6">
                <a href="<?= site_url('user/edit_profile'); ?>" class="btn btn-info">Edit Profile</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Fitur Info -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Info</h3>
          </div>
          <div class="card-body">
            <a href="<?= site_url('user/info'); ?>" class="btn btn-success">Info</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->include('layouts/templates/script.php') ?>
<?= $this->endSection(); ?>