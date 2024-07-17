<?= $this->extend('layouts/templates/default'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-sm-6">
        <h1>Data Pengguna</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user">Home</a></li>
          <li class="breadcrumb-item active">Data Pengguna</li>
        </ol>
      </div>
    </div>
    <!-- MODAL -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahData">
      + Tambah Data Pengguna
    </button>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahMarketing" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title" id="tambahMarketing">Formulir Pengguna Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="tambahPenggunaForm" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Marketing" autocomplete="off">
                <div class="invalid-feedback" id="invalidNama"></div>
              </div>
              <div class="form-group">
                <label for="nama">ID Pengguna</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Id Marketing">
                <div class="invalid-feedback" id="invalidId"></div>
              </div>
              <div class="form-group">
                <label for="gender">Role</label>
                <select class="custom-select" id="role" name="role">
                  <option selected value="">Pilih jenis role...</option>
                  <option value="1">Admin</option>
                  <option value="2">Sales</option>
                </select>
                <div class="invalid-feedback" id="invalidRole"></div>
              </div>
              <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="custom-select" id="gender" name="gender">
                  <option selected value="">Pilih jenis kelamin...</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <div class="invalid-feedback" id="invalidGender"></div>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group">
                  <input type="date" id="tglLahir" name="tglLahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  <div class="invalid-feedback" id="invalidTglLahir"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                <div class="invalid-feedback" id="invalidAlamat"></div>
              </div>
              <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan Nomor Telepon">
                <div class="invalid-feedback" id="invalidTelepon"></div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                <div class="invalid-feedback" id="invalidEmail"></div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" autocomplete="off">
                <div class="invalid-feedback" id="invalidPassword"></div>
              </div>
              <div class="form-group">
                <label for="repeatpassword">Ulangi Password</label>
                <input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Ulangi Password" autocomplete="off">
                <div class="invalid-feedback" id="invalidRepeatPassword"></div>
              </div>
              <div class="form-group">
                <label for="foto">Foto Profil </label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto" name="foto">
                  <label class="custom-file-label" for="foto" id="foto-label">Pilih foto profil...</label>
                  <div id="invalidFoto" class="invalid-feedback ml-2"></div>
                </div>
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editMarketing" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title" id="editMarketing">Formulir EditPengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editPenggunaForm" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="namaEdit">Nama Lengkap</label>
                <input type="text" class="form-control" id="namaEdit" name="namaEdit" placeholder="Masukkan nama pengguna" autocomplete="off">
                <div class="invalid-feedback" id="invalidNamaEdit"></div>
              </div>
              <div class="form-group">
                <label for="idEdit">ID Pengguna</label>
                <input type="text" id="currentId" name="currentId" hidden>
                <input type="text" class="form-control" id="idEdit" name="idEdit" placeholder="Id Marketing">
                <div class="invalid-feedback" id="invalidIdEdit"></div>
              </div>
              <div class="form-group">
                <label for="roleEdit">Role</label>
                <select class="custom-select" id="roleEdit" name="roleEdit">
                  <option selected value="">Pilih jenis role...</option>
                  <option value="1">Admin</option>
                  <option value="2">Sales</option>
                </select>
                <div class="invalid-feedback" id="invalidRoleEdit"></div>
              </div>
              <div class="form-group">
                <label for="genderEdit">Jenis Kelamin</label>
                <select class="custom-select" id="genderEdit" name="genderEdit">
                  <option selected value="">Pilih jenis kelamin...</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <div class="invalid-feedback" id="invalidGenderEdit"></div>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group">
                  <input type="date" id="tglLahirEdit" name="tglLahirEdit" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  <div class="invalid-feedback" id="invalidTglLahirEdit"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="alamatEdit">Alamat</label>
                <textarea class="form-control" id="alamatEdit" name="alamatEdit" rows="3"></textarea>
                <div class="invalid-feedback" id="invalidAlamatEdit"></div>
              </div>
              <div class="form-group">
                <label for="teleponEdit">Nomor Telepon</label>
                <input type="text" class="form-control" id="teleponEdit" name="teleponEdit" placeholder="Masukkan Nomor Telepon">
                <div class="invalid-feedback" id="invalidTeleponEdit"></div>
              </div>
              <div class="form-group">
                <label for="emailEdit">Email</label>
                <input type="email" class="form-control" id="emailEdit" name="emailEdit" placeholder="Masukkan Email">
                <div class="invalid-feedback" id="invalidEmailEdit"></div>
              </div>
              <div class="form-group">
                <label for="passwordEdit">Password baru</label>
                <input type="password" class="form-control" id="passwordEdit" name="passwordEdit" placeholder="Masukkan Password" autocomplete="off">
                <div class="invalid-feedback" id="invalidPasswordEdit"></div>
              </div>
              <div class="form-group">
                <label for="repeatPasswordEdit">Ulangi Password</label>
                <input type="password" class="form-control" id="repeatPasswordEdit" name="repeatPasswordEdit" placeholder="Ulangi Password" autocomplete="off">
                <div class="invalid-feedback" id="invalidRepeatPasswordEdit"></div>
              </div>
              <div class="form-group">
                <label for="fotoEdit">Foto Profil </label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="fotoEdit" name="fotoEdit">
                  <label class="custom-file-label" for="fotoEdit" id="foto-labelEdit">Pilih foto profil...</label>
                  <div id="invalidFotoEdit" class="invalid-feedback ml-2"></div>
                </div>
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="edit">Ubah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- TABEL -->
    <div class="card col-md-12">
      <div class="card-header">
        <h2 class="card-title">Tabel Data Users</h2>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" style="height: 28px;" placeholder="Cari">
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap" id='tabel-data'>
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Lengkap</th>
              <th>ID User</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $key => $user) : ?>
              <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $user['nama_lengkap']; ?></td>
                <td><?= $user['id_user']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['telepon']; ?></td>
                <td>
                  <a href="/user/data_pengguna/detail?id=<?= $user['id_user']; ?>" class="btn btn-success btn-sm">Detail</a>
                  <button type="button" class="btn btn-primary btn-sm" onclick="getEditData('<?= $user['id_user']; ?>')">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $user['id_user'] ?>')">Hapus</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>
<?= $this->include('layouts/templates/script.php') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  var valid = true;

  $(' #role').on('change', function() {
    Cek();
  });

  $(' #roleEdit').on('change', function() {
    CekEdit();
  });

  $('#idEdit').on('change', function() {
    CekEdit();
  })

  $('#id').on('change', function() {
    Cek();
  });

  $("#foto").on("change", function() {
    $("#foto-label").text(this.files[0].name);
  });

  $("#fotoEdit").on("change", function() {
    $("#foto-labelEdit").text(this.files[0].name);
  });

  $('tambahData').on('hidden.bs.modal', function() {
    clearForm();
  });

  $('#editData').on('hidden.bs.modal', function() {
    clearEditForm();
  });

  function Cek() {
    $('#id').val($('#id').val().toUpperCase());
    var id = $('#id').val();
    if ($('#role').val() == '2') {
      if (!(/^SLS-\d{3}$/.test(id))) {
        $('#id').addClass('is-invalid');
        $('#invalidId').text('ID user harus berupa SLS-xxx');
        valid = false;
      } else {
        $('#id').removeClass('is-invalid');
        $('#invalidId').text('');
        valid = true;
      }
    } else if ($('#role').val() == '1') {
      if (!(/^ADM-\d{3}$/.test(id))) {
        $('#id').addClass('is-invalid');
        $('#invalidId').text('ID user harus berupa ADM-xxx');
        valid = false;
      } else {
        $('#id').removeClass('is-invalid');
        $('#invalidId').text('');
        valid = true;
      }
    }
  }

  function CekEdit() {
    $('#idEdit').val($('#idEdit').val().toUpperCase());
    var id = $('#idEdit').val();
    if ($('#roleEdit').val() == '2') {
      if (!(/^SLS-\d{3}$/.test(id))) {
        $('#idEdit').addClass('is-invalid');
        $('#invalidIdEdit').text('ID user harus berupa SLS-xxx');
        valid = false;
      } else {
        $('#idEdit').removeClass('is-invalid');
        $('#invalidIdEdit').text('');
        valid = true;
      }
    } else if ($('#roleEdit').val() == '1') {
      if (!(/^ADM-\d{3}$/.test(id))) {
        $('#idEdit').addClass('is-invalid');
        $('#invalidIdEdit').text('ID user harus berupa ADM-xxx');
        valid = false;
      } else {
        $('#idEdit').removeClass('is-invalid');
        $('#invalidIdEdit').text('');
        valid = true;
      }
    }
  }

  function errorSimpan(data) {
    data.nama ? showError(data.nama, 'nama', 'invalidNama') : hideError('nama', 'invalidNama');
    data.id ? showError(data.id, 'id', 'invalidId') : hideError('id', 'invalidId');
    data.role ? showError(data.role, 'role', 'invalidRole') : hideError('role', 'invalidRole');
    data.gender ? showError(data.gender, 'gender', 'invalidGender') : hideError('gender', 'invalidGender');
    data.email ? showError(data.email, 'email', 'invalidEmail') : hideError('email', 'invalidEmail');
    data.alamat ? showError(data.alamat, 'alamat', 'invalidAlamat') : hideError('alamat', 'invalidAlamat');
    data.tglLahir ? showError(data.tglLahir, 'tglLahir', 'invalidTglLahir') : hideError('tglLahir', 'invalidTglLahir');
    data.telepon ? showError(data.telepon, 'telepon', 'invalidTelepon') : hideError('telepon', 'invalidTelepon');
    data.password ? showError(data.password, 'password', 'invalidPassword') : hideError('password', 'invalidPassword');
    data.repeatpassword ? showError(data.repeatpassword, 'repeatpassword', 'invalidRepeatPassword') : hideError('repeatpassword', 'invalidRepeatPassword');
    data.foto ? showError(data.foto, 'foto', 'invalidFoto') : hideError('foto', 'invalidFoto');
  }

  function errorEdit(data) {
    data.namaEdit ? showError(data.namaEdit, 'namaEdit', 'invalidNamaEdit') : hideError('namaEdit', 'invalidNamaEdit');
    data.idEdit ? showError(data.idEdit, 'idEdit', 'invalidIdEdit') : hideError('idEdit', 'invalidIdEdit');
    data.roleEdit ? showError(data.roleEdit, 'roleEdit', 'invalidRoleEdit') : hideError('roleEdit', 'invalidRoleEdit');
    data.genderEdit ? showError(data.genderEdit, 'genderEdit', 'invalidGenderEdit') : hideError('genderEdit', 'invalidGenderEdit');
    data.emailEdit ? showError(data.emailEdit, 'emailEdit', 'invalidEmailEdit') : hideError('emailEdit', 'invalidEmailEdit');
    data.alamatEdit ? showError(data.alamatEdit, 'alamatEdit', 'invalidAlamatEdit') : hideError('alamatEdit', 'invalidAlamatEdit');
    data.tglLahirEdit ? showError(data.tglLahirEdit, 'tglLahirEdit', 'invalidTglLahirEdit') : hideError('tglLahirEdit', 'invalidTglLahirEdit');
    data.teleponEdit ? showError(data.teleponEdit, 'teleponEdit', 'invalidTeleponEdit') : hideError('teleponEdit', 'invalidTeleponEdit');
    data.passwordEdit ? showError(data.passwordEdit, 'passwordEdit', 'invalidPasswordEdit') : hideError('passwordEdit', 'invalidPasswordEdit');
    data.repeatPasswordEdit ? showError(data.repeatPasswordEdit, 'repeatPasswordEdit', 'invalidRepeatPasswordEdit') : hideError('repeatPasswordEdit', 'invalidRepeatPasswordEdit');
    data.fotoEdit ? showError(data.fotoEdit, 'fotoEdit', 'invalidFotoEdit') : hideError('fotoEdit', 'invalidFotoEdit');
  }

  function showError(msg, e1, e2) {
    $('#' + e1).addClass('is-invalid');
    $('#' + e2).text(msg);
  }

  function hideError(e1, e2) {
    $('#' + e1).removeClass('is-invalid');
    $('#' + e2).text('');
  }

  function clearForm() {
    $('#tambahPenggunaForm')[0].reset();
    hideError('nama', 'invalidNama');
    hideError('id', 'invalidId');
    hideError('role', 'invalidRole');
    hideError('gender', 'invalidGender');
    hideError('email', 'invalidEmail');
    hideError('alamat', 'invalidAlamat');
    hideError('tglLahir', 'invalidTglLahir');
    hideError('telepon', 'invalidTelepon');
    hideError('password', 'invalidPassword');
    hideError('repeatpassword', 'invalidRepeatPassword');
    hideError('foto', 'invalidFoto');
    $('#simpan').prop('disabled', false);
  }

  function clearEditForm() {
    $('#editPenggunaForm')[0].reset();
    hideError('namaEdit', 'invalidNamaEdit');
    hideError('idEdit', 'invalidIdEdit');
    hideError('roleEdit', 'invalidRoleEdit');
    hideError('genderEdit', 'invalidGenderEdit');
    hideError('emailEdit', 'invalidEmailEdit');
    hideError('alamatEdit', 'invalidAlamatEdit');
    hideError('tglLahirEdit', 'invalidTglLahirEdit');
    hideError('teleponEdit', 'invalidTeleponEdit');
    hideError('passwordEdit', 'invalidPasswordEdit');
    hideError('repeatPasswordEdit', 'invalidRepeatPasswordEdit');
    hideError('fotoEdit', 'invalidFotoEdit');
    $('#edit').prop('disabled', false);
  }

  $('#simpan').on('click', function() {
    if (!valid) return
    var formData = new FormData($('#tambahPenggunaForm')[0])
    $('#simpan').prop('disabled', true)
    $.ajax({
      url: '/user/data_pengguna/simpan',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(data) {
        data = JSON.parse(data);
        if (data.status === true) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Data Berhasil ditambahkan',
            showConfirmButton: false,
            timer: 2000
          }).then(() => {
            $('#tambahData').modal('hide');
            $('#tabel-data').load(location.href + ' #tabel-data');
          });
        } else {
          $('#simpan').prop('disabled', false)
          errorSimpan(data)
        }
      }
    });
  });

  $('#edit').on('click', function() {
    if (!valid) return;
    var formData = new FormData($('#editPenggunaForm')[0]);
    $('#edit').prop('disabled', true);

    $.ajax({
      url: '/user/data_pengguna/edit',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(data) {
        data = JSON.parse(data);
        if (data.status === true) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Data Berhasil diubah',
            showConfirmButton: false,
            timer: 2000
          }).then(() => {
            $('#editData').modal('hide');
            $('#tabel-data').load(location.href + ' #tabel-data');
          });
        } else {
          $('#edit').prop('disabled', false);
          errorEdit(data);
        }
      }
    });
  });

  function hapus(id) {
    Swal.fire({
      title: 'Hapus Data?',
      text: "Data yang dihapus tidak dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '/user/data_pengguna/hapus/',
          type: 'POST',
          data: {
            'id': id
          },
          success: function(data) {
            data = JSON.parse(data);
            if (data.status === true) {
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data Berhasil dihapus',
                showConfirmButton: false,
                timer: 2000
              }).then(() => {
                $('#tabel-data').load(location.href + ' #tabel-data');
              });
            } else {
              Swal.fire({
                position: 'center',
                icon: 'error',
                title: data.error + ', silahkan coba lagi',
                showConfirmButton: false,
                timer: 2000
              })
            }
          }
        })
      }
    })
  }

  function getEditData(id) {
    $('#editData').modal('show');
    $.ajax({
      url: '/user/data_pengguna/cari/',
      type: 'POST',
      data: {
        'id': id
      },
      success: function(data) {
        data = JSON.parse(data);
        $('#idEdit').val(data.user['id_user']);
        $('#namaEdit').val(data.user['nama_lengkap']);
        $('#roleEdit').val(data.user['id_role']);
        $('#genderEdit').val(data.user['jenis_kelamin']);
        $('#emailEdit').val(data.user['email']);
        $('#alamatEdit').val(data.user['alamat']);
        $('#tglLahirEdit').val(data.user['tgl_lahir']);
        $('#teleponEdit').val(data.user['telepon']);
        $('#foto-labelEdit').text(data.user['foto']);
        $('#currentId').val(data.user['id_user']);
      }
    })
  }
</script>
<?= $this->endSection(); ?>