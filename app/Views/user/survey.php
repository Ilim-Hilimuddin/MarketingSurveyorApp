<?= $this->extend('layouts/user/default'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Survey</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>user/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Data Survey</li>
        </ol>
      </div>
    </div>
    <p class="mb3" style="font-size: 16px;">Nama Marketing: <span class="text-primary">Maulana</span></p>
    <!-- MODAL -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahData">
      + Tambah Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title" id="tambahDataLabel">Tambah Data Survey</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="nama">Nama Marketing</label>
                <input type="text" class="form-control" id="nama" disabled value="Maulana">
              </div>
              <div class="form-group">
                <label>Tanggal Survey</label>
                <div class="input-group">
                  <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                </div>
              </div>
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <select class="custom-select" id="nama_barang">
                  <option selected>Pilih nama barang...</option>
                  <option value="1">Beras Pandan</option>
                  <option value="2">Gula ABC</option>
                  <option value="3">Terigu Cap Kaki Tiga</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nama_barang">Lokasi</label>
                <select class="custom-select" id="nama_barang">
                  <option selected>Pilih lokasi...</option>
                  <option value="1">PT. Makmur Jaya</option>
                  <option value="2">PT. Adi Daya</option>
                  <option value="3">CV. Surya</option>
                </select>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" placeholder="Masukkan Jumlah">
              </div>
              <div class="form-group">
                <label>Status Repeat Order</label>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="repeat" value="No">
                  <label class="form-check-label ml-2" for="repeat">Repeat Order</label>
                </div>
              </div>
              <div class="form-group">
                <label for="catatan">Hasil Survey</label>
                <textarea class="form-control" id="catatan" rows="3"></textarea>
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
        <h2 class="card-title">Data Survey: Maulana</h2>
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
              <th>Nama Marketing</th>
              <th>Tanggal</th>
              <th>Barang</th>
              <th>Lokasi</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Maulana</td>
              <td>12-01-2021</td>
              <td>Beras Super Pandan</td>
              <td>PT. Makmur Jaya</td>
              <td>1000</td>
              <td>
                <button type="button" class="btn btn-success btn-sm">Detail</button>
                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-danger btn-sm">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Maulana</td>
              <td>15-06-2021</td>
              <td>terigu Cap Segi Tiga</td>
              <td>PT. Makmur Jaya</td>
              <td>20000</td>
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