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
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <?php ($user['foto'] == '') ? $img = 'default.jpg' : $img = $user['foto']; ?>
            <img src="<?= base_url('assets/img/') . $img; ?>" alt="Profile Picture" id="profile-picture" class="img-fluid mb-3 rounded-circle w-75">
            <h3><?= $user['nama_lengkap']; ?></h3>
            <p class="text-muted"><?= $user['email']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <!-- Profile Information -->
        <div class="card shadow-sm mb-4" id="profile-info">
          <div class="card-header bg-info text-white">
            <h3 class="card-title">Profile Information</h3>
          </div>
          <div class="card-body">
            <p><strong>Id User: </strong><?= $user['id_user']; ?></p>
            <p><strong>Nama: </strong><?= $user['nama_lengkap']; ?></p>
            <p><strong>Email: </strong><?= $user['email']; ?></p>
            <p><strong>Telepon: </strong><?= $user['telepon']; ?></p>
            <p><strong>Jenis Kelamin: </strong><?= $user['jenis_kelamin']; ?></p>
            <p><strong>Tgl. Lahir: </strong><?= $user['tgl_lahir']; ?></p>
            <p><strong>Alamat: </strong><?= $user['alamat']; ?></p>
            <div style="text-align: right;" class="col-md-12">
              <a href="javascript:void(0);" onclick="showEditForm()" class="btn btn-info btn-lg col-md-2">Edit Profile</a>
            </div>
          </div>
        </div>

        <!-- Edit Profile Form -->
        <div class="card shadow-sm mb-4" id="edit-profile-form" style="display:none;">
          <div class="card-header bg-primary text-white">
            <h3 class="card-title">Edit Profile</h3>
          </div>
          <div class="card-body">
            <form id="profile-form" action="/user/updateProfile" method="post" enctype="multipart/form-data">
              <?= csrf_field() ?>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $user['nama_lengkap']; ?>" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?= $user['email']; ?>" required>
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" class="form-control" name="password">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control-file" name="image" accept="image/*">
              </div>
              <div class="row">
                <div style="text-align: right;" class="col-md-12">
                  <button type="button" onclick="showProfileInfo()" class="btn btn-secondary btn-lg col-md-2">Back</button>
                  <button type="submit" class="btn btn-primary btn-lg col-md-2 mr-2">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function showEditForm() {
    document.getElementById('profile-info').style.display = 'none';
    document.getElementById('edit-profile-form').style.display = 'block';
  }

  function showProfileInfo() {
    document.getElementById('profile-info').style.display = 'block';
    document.getElementById('edit-profile-form').style.display = 'none';
  }
</script>

<?= $this->include('layouts/templates/script.php') ?>
<?= $this->endSection(); ?>
