<?php
// Simpan data dari session
$user = session()->get('user');
$role = $user['id_role'];
?>
<?= $this->extend('layouts/templates/default'); ?>

<?= $this->section('content'); ?>
<?php

// echo $pager->links();
// dd($transaksi);
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-sm-6">
        <h1>Data Survey</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user">Home</a></li>
          <li class="breadcrumb-item active">Data Survey</li>
        </ol>
      </div>
    </div>
    <!-- MODAL -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahData">
      + Tambah Data Survey
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title" id="tambahDataLabel">Formulir Survey Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="tambahDataForm" action="" method="post">
              <div class="form-group">
                <label for="nama">Id Sales</label>
                <select class="form-control" name="idSales" id="idSales">
                  <option value="" selected>Pilih id sales...</option>
                  <?php foreach ($sales as $sale) : ?>
                    <option value="<?= $sale['id_user']; ?>"><?= $sale['id_user'] . ' - ' . $sale['nama_lengkap']; ?></option>
                  <?php endforeach; ?>
                </select>
                <small id="idSalesError" class="form-text text-danger"></small>
              </div>

              <div class="form-group">
                <label for="idTransaksi">Nomor Transaksi</label>
                <input type="text" class="form-control" id="idTransaksi" name="idTransaksi" placeholder="Masukkan Nomor Transaksi" disabled>
                <small id="idTransaksiError" class="form-text text-danger"></small>
              </div>

              <div class="form-group">
                <label>Tanggal Survey</label>
                <div class="input-group">
                  <input type="date" class="form-control" id="tglTransaksi" name="tglTransaksi">
                </div>
                <small id="tglTransaksiError" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="IdBarang">Nama Barang</label>
                <select class="custom-select" id="idBarang">
                  <option value="" selected>Pilih nama barang...</option>
                  <?php foreach ($barang as $b) : ?>
                    <option value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
                  <?php endforeach; ?>
                </select>
                <small id="idBarangError" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="IdLokasi">Lokasi</label>
                <select class="custom-select" id="idLokasi">
                  <option value="" selected>Pilih lokasi...</option>
                  <?php foreach ($lokasi as $l) : ?>
                    <option value="<?= $l['id_lokasi'] ?>"><?= $l['nama_lokasi'] ?></option>
                  <?php endforeach; ?>
                </select>
                <small id="idLokasiError" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah">
                <small id="jumlahError" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label>Status Repeat Order</label>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="repeat">
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
                <button type="button" class="btn btn-primary" id="tambahDataBtn">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- TABEL -->
    <div class="card col-md-12">
      <div class="card-header">
        <h2 class="card-title">Data Survey: <?= ($user['id_role'] == 1) ? ' Sales' : $user['nama_lengkap']; ?></h2>
        <div class="card-tools">
          <form action="" method="get">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="keyword" class="form-control float-right" style="height: 28px;" placeholder="Cari" value="<?= $katakunci; ?>">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap" id="tbl-data">
          <thead>
            <tr>
              <th>#</th>
              <th>Nomor Transaksi</th>
              <th>Nama Sales</th>
              <th>Barang</th>
              <th>Lokasi</th>
              <th>Tanggal Transaksi</th>
              <th>Jumlah Barang</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?= (!count($transaksi)) ? '<tr><td colspan="3" class="text-left">Tidak ada data</td></tr>' : ''; ?>
            <?php foreach ($transaksi as $key => $row) :
              $tgl_transaksi = date('d-m-Y', strtotime($row['tgl_transaksi']));
            ?>
              <tr>
                <td><?= $nomor++ ?></td>
                <td><?= $row['id_transaksi'] ?></td>
                <td><?= $row['nama_sales'] ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['nama_lokasi']; ?></td>
                <td><?= $tgl_transaksi ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td>
                  <form action="/user/transaksi/detail" method="post">
                    <button type="submit" class="btn btn-success btn-sm" name="id" value="<?= $row['id_transaksi'] ?>">Detail</button>
                    <button type="button" class="btn btn-primary btn-sm">Edit</button>
                    <?php if ($role == 1) : ?>
                      <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                    <?php endif ?>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <?php
        $link = $pager;
        $link = str_replace('<li class="active">', '<li class="page-item active">', $link);
        $link = str_replace('<li>', '<li class="page-item">', $link);
        $link = str_replace('<a', '<a class="page-link"', $link);
        echo '<div class="d-flex justify-content-center mt-3">' . $link . '</div>';
        ?>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>
<?= $this->include('layouts/templates/script.php') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function validateIdInput(idInput, errorElement, idSales) {
    // Membuat format ID Transaksi ("TRS-(id-sales)-xxxx")
    var regex = new RegExp('^TRS/' + idSales + '/\\d{4}$');

    // Memeriksa apakah input memenuhi format yang diharapkan
    if (!regex.test(idInput.val())) {
      idInput.addClass('is-invalid');
      errorElement.text('Momor Transaksi harus berupa TRS/' + idSales + '/xxxx');
      return false;
    } else {
      idInput.removeClass('is-invalid');
      errorElement.text('');
      return true;
    }
  }


  function validateJumlahInput(jumlahInput, errorElement) {
    // Memeriksa apakah input memenuhi angka dari 1-99999999999
    if (!(/^\d{1,11}$/.test(jumlahInput.val()) && parseInt(jumlahInput.val()) >= 1)) {
      jumlahInput.addClass('is-invalid');
      errorElement.text('Jumlah harus berupa angka dari 1-99999999999');
      return false;
    } else {
      jumlahInput.removeClass('is-invalid');
      errorElement.text('');
      return true;
    }
  }

  function showError(inputan, errorElement, msg) {
    inputan.addClass('is-invalid');
    errorElement.text(msg);
  }

  function resetError(inputan, errorElement) {
    inputan.removeClass('is-invalid');
    errorElement.text('');
  }

  $("#idSales").on("change", function() {
    var idSales = $("#idSales").val();
    if (idSales) {
      $("#idTransaksi").prop("disabled", false);
    } else {
      $("#idTransaksi").prop("disabled", true);
    }
  })

  function validateInput() {
    if (!$('#idSales').val()) {
      showError($('#idSales'), $('#idSalesError'), 'Sales harus dipilih')
      return false;
    } else resetError($('#idSales'), $('#idSalesError'));

    if (!$('#tglTransaksi').val()) {
      showError($('#tglTransaksi'), $('#tglTransaksiError'), 'Tgl Transaksi harus diisi')
      return false;
    } else resetError($('#tglTransaksi'), $('#tglTransaksiError'));

    if (!$('#idBarang').val()) {
      showError($('#idBarang'), $('#idBarangError'), 'Barang harus dipilih')
      return false;
    } else resetError($('#idBarang'), $('#idBarangError'));

    if (!$('#idLokasi').val()) {
      showError($('#idLokasi'), $('#idLokasiError'), 'Lokasi harus dipilih')
      return false;
    } else resetError($('#idLokasi'), $('#idLokasiError'));
    return true;
  }

  $('#idTransaksi').on('change', function() {
    validateIdInput($(this), $('#idTransaksiError'), $('#idSales').val());
  });

  $('#jumlah').on('change', function() {
    validateJumlahInput($(this), $('#jumlahError'));
  });

  $('#tambahDataBtn').on('click', function() {
    if (validateIdInput($('#idTransaksi'), $('#idTransaksiError'), $('#idSales').val()) && validateJumlahInput($('#jumlah'), $('#jumlahError')) && validateInput()) {
      var $data = {
        'idTransaksi': $('#idTransaksi').val(),
        'idBarang': $('#idBarang').val(),
        'idLokasi': $('#idLokasi').val(),
        'idSales': $('#idSales').val(),
        'jumlah': $('#jumlah').val(),
        'tglTransaksi': $('#tglTransaksi').val(),
        'catatan': $('#catatan').val(),
        'repeat': $('#repeat').prop('checked') ? 1 : 0
      };
      $.ajax({
        url: '<?= site_url("/user/transaksi/simpan"); ?>',
        type: 'POST',
        data: $data,
        success: function(data) {
          data = JSON.parse(data);
          if (data.status) {
            Swal.fire({
              icon: 'success',
              title: 'Data Berhasil ditambahkan',
              showConfirmButton: false,
              timer: 2000
            }).then(() => {
              location.reload();
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.msg
            });
          }
        }
      });
    }
  });
</script>
<?= $this->endSection(); ?>