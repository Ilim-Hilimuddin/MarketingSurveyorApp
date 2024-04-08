<?= $this->extend('layouts/admin/default'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-sm-6">
        <h1>Data Admin</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Data Admin</li>
        </ol>
      </div>
    </div>
    <!-- MODAL -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahData">
      + Tambah Data Admin
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahMarketing" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title" id="tambahMarketing">Formulir Data Admin Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="nama">Nama Admin</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Marketing">
              </div>
              <div class="form-group">
                <label for="nama">Id Admin</label>
                <input type="text" class="form-control" id="nama" placeholder="Id Marketing">
              </div>
              <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="custom-select" id="gender">
                  <option selected>Pilih jenis kelamin...</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group">
                  <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="text" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
              </div>
              <div class="form-group">
                <label for="repeatpassword">Ulangi Password</label>
                <input type="password" class="form-control" id="repeatpassword" placeholder="Ulangi Password">
              </div>
              <div class="form-group">
                <label for="foto">Pilih Foto</label>
                <input type="file" class="form-control-file" id="foto">
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- TABEL -->
    <div class="card col-md-12">
      <div class="card-header">
        <h2 class="card-title">Tabel Data Admin</h2>
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
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Id Admin</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Ferry</td>
              <td>ADM-001</td>
              <td>ferry@gmail.com</td>
              <td>081238832244</td>
              <td>
                <button type="button" class="btn btn-success btn-sm">Detail</button>
                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-danger btn-sm">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Dea Anindia</td>
              <td>ADM-002</td>
              <td>dea@gmail.com</td>
              <td>0812435454545</td>
              <td>
                <button type="button" class="btn btn-success btn-sm">Detail</button>
                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-danger btn-sm">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>


</div>
<?= $this->endSection(); ?>