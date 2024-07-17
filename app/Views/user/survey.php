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
    <div class="col-md-12 mb-2">
      <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahData" id="ModalTambahBtn">
        + Tambah Data Survey
      </button>
      <div class="float-right">
        <a href="/user/transaksi/export_pdf" class="btn btn-primary mb-2" target="_blank"><i class="fas fa-file-pdf mr-2"></i>Download PDF</a>
        <a href="/user/transaksi/export_excel" class="btn btn-primary mb-2" target="_blank"><i class="fas fa-file-excel mr-2"></i>Download Excel</a>
      </div>
    </div>

    <!-- Modal Tambah Data-->
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

    <!-- Modal Edit Data-->
    <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title" id="editDataLabel">Edit Survey</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editDataForm" action="" method="post">
              <div class="form-group">
                <label for="nama">Id Sales</label>
                <select class="form-control" name="idSalesEdit" id="idSalesEdit" disabled>
                  <option value="" selected>Pilih id sales...</option>
                  <?php foreach ($sales as $sale) : ?>
                    <option value="<?= $sale['id_user']; ?>"><?= $sale['id_user'] . ' - ' . $sale['nama_lengkap']; ?></option>
                  <?php endforeach; ?>
                </select>
                <small id="idSalesEditError" class="form-text text-danger"></small>
              </div>

              <div class="form-group">
                <label for="idTransaksiEdit">Nomor Transaksi</label>
                <input type="text" class="form-control" id="idTransaksiEdit" name="idTransaksiEdit" placeholder="Masukkan nomor transaksi...">
                <small id="idTransaksiEditError" class="form-text text-danger"></small>
              </div>

              <div class="form-group">
                <label>Tanggal Survey</label>
                <div class="input-group">
                  <input type="date" class="form-control" id="tglTransaksiEdit" name="tglTransaksiEdit">
                </div>
                <small id="tglTransaksiEditError" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="IdBarangEdit">Nama Barang</label>
                <select class="custom-select" id="idBarangEdit">
                  <option value="" selected>Pilih nama barang...</option>
                  <?php foreach ($barang as $b) : ?>
                    <option value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
                  <?php endforeach; ?>
                </select>
                <small id="idBarangEditError" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="IdLokasiEdit">Lokasi</label>
                <select class="custom-select" id="idLokasiEdit">
                  <option value="" selected>Pilih lokasi...</option>
                  <?php foreach ($lokasi as $l) : ?>
                    <option value="<?= $l['id_lokasi'] ?>"><?= $l['nama_lokasi'] ?></option>
                  <?php endforeach; ?>
                </select>
                <small id="idLokasiEditError" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="jumlahEdit">Jumlah</label>
                <input type="text" class="form-control" id="jumlahEdit" name="jumlahEdit" placeholder="Masukkan jumlah...">
                <small id="jumlahEditError" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label>Status Repeat Order</label>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="repeatEdit">
                  <label class="form-check-label ml-2" for="repeatEdit">Repeat Order</label>
                </div>
              </div>
              <div class="form-group">
                <label for="catatanEdit">Hasil Survey</label>
                <textarea class="form-control" id="catatanEdit" rows="3"></textarea>
              </div>

              <!-- Modal Footer -->
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="simpanEditDataBtn">Edit</button>
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
                    <button type="button" class="btn btn-primary btn-sm" onclick="getEditData('<?= $row['id_transaksi'] ?>')">Edit</button>
                    <?php if ($role == 1) : ?>
                      <button type="button" class="btn btn-danger btn-sm" onclick="deleteData('<?= $row['id_transaksi'] ?>')">Hapus</button>
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
  var currentIdTransaksi = ''

  function resetForm() {
    $('#tambahDataForm')[0].reset();
    $('#idTransaksi').removeClass('is-invalid');
    $('#idTransaksiError').text('');
    $('#idSales').removeClass('is-invalid');
    $('#idSalesError').text('');
    $('#tglTransaksi').removeClass('is-invalid');
    $('#tglTransaksiError').text('');
    $('#idBarang').removeClass('is-invalid');
    $('#idBarangError').text('');
    $('#idLokasi').removeClass('is-invalid');
    $('#idLokasiError').text('');
    $('#jumlah').removeClass('is-invalid');
    $('#jumlahError').text('');
  }

  function validateIdInput(idInput, errorElement, idSales) {
    if (idSales == '') {
      idInput.addClass('is-invalid');
      errorElement.text('Sales harus dipilih');
      return false;
    }
    // Membuat format ID Transaksi ("TRS-(id-sales)-xxxx")
    var regex = new RegExp('^TRS/' + idSales + '/\\d{4}$');

    // Memeriksa apakah input memenuhi format yang diharapkan
    if (!regex.test(idInput.val())) {
      idInput.addClass('is-invalid');
      errorElement.text('Momor Transaksi harus berupa TRS/' + idSales + '/xxxx');
      idInput.val('TRS/' + idSales + '/');
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
      $("#idTransaksi").val('TRS/' + idSales + '/');
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

  function validateEditInput() {
    hasil = true;
    if (!$('#tglTransaksiEdit').val()) {
      showError($('#tglTransaksiEdit'), $('#tglTransaksiEditError'), 'Tgl Transaksi harus diisi')
      hasil = false;
    } else resetError($('#tglTransaksiEdit'), $('#tglTransaksiEditError'));

    if (!$('#idBarangEdit').val()) {
      showError($('#idBarangEdit'), $('#idBarangEditError'), 'Barang harus dipilih')
      hasil = false;
    } else resetError($('#idBarangEdit'), $('#idBarangEditError'));

    if (!$('#idLokasiEdit').val()) {
      showError($('#idLokasiEdit'), $('#idLokasiEditError'), 'Lokasi harus dipilih')
      hasil = false;
    } else resetError($('#idLokasiEdit'), $('#idLokasiEditError'));
    return hasil;
  }

  $('#idTransaksi').on('change', function() {
    validateIdInput($(this), $('#idTransaksiError'), $('#idSales').val());
  });

  $('#idTransaksiEdit').on('change', function() {
    validateIdInput($(this), $('#idTransaksiEditError'), $('#idSalesEdit').val());
  });

  $('#jumlah').on('change', function() {
    validateJumlahInput($(this), $('#jumlahError'));
  });

  $('#jumlahEdit').on('change', function() {
    validateJumlahInput($(this), $('#jumlahEditError'));
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
        url: '/user/transaksi/simpan',
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
              $('#tambahData').modal('hide');
              resetForm();
              $('#tbl-data').load(location.href + ' #tbl-data');
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

  $('#simpanEditDataBtn').on('click', function() {
    if (validateIdInput($('#idTransaksiEdit'), $('#idTransaksiEditError'), $('#idSalesEdit').val()) && validateJumlahInput($('#jumlahEdit'), $('#jumlahEditError')) && validateEditInput()) {
      var $data = {
        'lastId': currentIdTransaksi,
        'idTransaksi': $('#idTransaksiEdit').val(),
        'idBarang': $('#idBarangEdit').val(),
        'idLokasi': $('#idLokasiEdit').val(),
        'idSales': $('#idSalesEdit').val(),
        'jumlah': $('#jumlahEdit').val(),
        'tglTransaksi': $('#tglTransaksiEdit').val(),
        'catatan': $('#catatanEdit').val(),
        'repeat': $('#repeatEdit').prop('checked') ? 1 : 0
      };
      $.ajax({
        url: '/user/transaksi/edit',
        type: 'POST',
        data: $data,
        success: function(data) {
          data = JSON.parse(data);
          if (data.status) {
            Swal.fire({
              icon: 'success',
              title: 'Data Berhasil diedit',
              showConfirmButton: false,
              timer: 2000
            }).then(() => {
              $('#editData').modal('hide');
              $('#tbl-data').load(location.href + ' #tbl-data');
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
  })

  function deleteData(id) {
    Swal.fire({
      title: 'Hapus Data?',
      text: 'Data yang dihapus tidak dapat dikembalikan',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '/user/transaksi/hapus',
          type: 'POST',
          data: {
            'id': id
          },
          success: function(data) {
            data = JSON.parse(data);
            if (data.status) {
              Swal.fire({
                icon: 'success',
                title: 'Data Berhasil dihapus',
              }).then(() => {
                $('#tbl-data').load(location.href + ' #tbl-data');
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
    })
  }

  function getEditData(id) {
    $('#editData').modal('show');

    $.ajax({
      url: '/user/transaksi/cari',
      type: 'POST',
      data: {
        'id': id
      },
      success: function(data) {
        data = JSON.parse(data);
        $('#idTransaksiEdit').val(data.transaksi['id_transaksi']);
        currentIdTransaksi = data.transaksi['id_transaksi'];
        $('#idBarangEdit').val(data.transaksi['id_barang']);
        $('#idLokasiEdit').val(data.transaksi['id_lokasi']);
        $('#idSalesEdit').val(data.transaksi['id_user']);
        $('#jumlahEdit').val(data.transaksi['jumlah']);
        $('#tglTransaksiEdit').val(data.transaksi['tgl_transaksi']);
        $('#catatanEdit').val(data.transaksi['hasil_transaksi']);
        $('#repeatEdit').prop('checked', data.transaksi['isRepeatOrder'] == 1 ? true : false);
      }
    })
  };
</script>
<?= $this->endSection(); ?>