<?= $this->extend('layouts/templates/default'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-sm-6">
        <h1>Data Barang</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user">Home</a></li>
          <li class="breadcrumb-item active">Data Barang</li>
        </ol>
      </div>
    </div>
    <!-- MODAL -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahData">
      + Tambah Data Barang
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahMarketing" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title" id="tambahMarketing">Formulir Barang Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="id_barang">Id Barang</label>
                <input type="text" class="form-control" id="id_barang" name="id" placeholder="Masukkan ID barang...">
              </div>
              <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama" placeholder="Masukan nama barang...">
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
    <!-- TABEL -->
    <div class="card col-md-12">
      <div class="card-header">
        <h2 class="card-title">Tabel Data Barang</h2>
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
              <th>ID Barang</th>
              <th>Nama Barang</th>
            </tr>
          </thead>
          <tbody>
            <?= (!count($barang)) ? '<tr><td colspan="3" class="text-left">Tidak ada data</td></tr>' : ''; ?>
            <?php foreach ($barang as $key => $brg) : ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $brg['id_barang'] ?></td>
                <td><?= $brg['nama_barang'] ?></td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm" value="<?= $brg['id_barang']; ?>">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm" value="<?= $brg['id_barang']; ?>">Hapus</button>
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
<script>
  $('#simpan').on('click', function() {
    $id_barang = $('#id_barang').val();
    $nama_barang = $('#nama_barang').val();
    $.ajax({
      url: '<?= site_url("/user/data_barang/simpan"); ?>',
      type: 'POST',
      data: {
        'id_barang': $id_barang,
        'nama_barang': $nama_barang
      },
      success: function(data) {
        alert(data);
        // location.reload();
      }
    });
  })
</script>
<?= $this->endSection(); ?>