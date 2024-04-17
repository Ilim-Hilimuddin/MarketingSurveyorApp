<?= $this->extend('layouts/templates/default'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-sm-6">
        <h1>Data Lokasi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user">Home</a></li>
          <li class="breadcrumb-item active">Data Lokasi</li>
        </ol>
      </div>
    </div>
    <!-- MODAL -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalTambah">
      + Tambah Data Lokasi
    </button>

    <!-- Modal TAMBAH DATA -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="tambahlokasi" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title" id="tambahMarketing">Formulir Lokasi Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="tambahLokasiForm" action="" method="post">
              <div class="form-group">
                <label for="id_lokasi">Id Lokasi</label>
                <input type="text" class="form-control" id="id_lokasi" name="id" placeholder="Masukkan ID lokasi...">
                <div id="invalidIdlokasi" class="invalid-feedback ml-2"></div>
              </div>
              <div class="form-group">
                <label for="nama">Nama Lokasi</label>
                <input type="text" class="form-control" id="nama_lokasi" name="nama" placeholder="Masukan nama lokasi...">
                <div id="invalidNamalokasi" class="invalid-feedback ml-2"></div>
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
    <!-- MODAL EDIT DATA -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="editlokasi" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title" id="editlokasi">Formulir lokasi Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editLokasiForm" action="" method="post">
              <div class="form-group">
                <label for="idEdit">Id lokasi</label>
                <input type="text" class="form-control" id="idEdit" name="id" placeholder="Masukkan ID lokasi...">
                <div id="invalidEditId" class="invalid-feedback ml-2"></div>
              </div>
              <div class="form-group">
                <label for="namaEdit">Nama Lokasi</label>
                <input type="text" class="form-control" id="namaEdit" name="nama" placeholder="Masukan nama lokasi...">
                <div id="invalidEditNama" class="invalid-feedback ml-2"></div>
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="edit">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- TABEL -->
    <div class="card col-md-12">
      <div class="card-header">
        <h2 class="card-title">Tabel Data Lokasi</h2>
        <div class="card-tools">
          <form action="" method="get">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="katakunci" class="form-control float-right" style="height: 28px;" placeholder="Cari" value="<?= $katakunci; ?>">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- TABEL DATA -->
      <div class="card-body table-responsive p-0">
        <table id="tabel-data" class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>#</th>
              <th>ID Lokasi</th>
              <th>Nama Lokasi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?= (!count($lokasi)) ? '<tr><td colspan="3" class="text-left">Tidak ada data</td></tr>' : ''; ?>
            <?php foreach ($lokasi as $key => $lksi) : ?>
              <tr>
                <td><?= $nomor++ ?></td>
                <td><?= $lksi['id_lokasi'] ?></td>
                <td><?= $lksi['nama_lokasi'] ?></td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit" value="<?= $lksi['id_lokasi']; ?>">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="deleteData('<?= $lksi['id_lokasi']; ?>')">Hapus</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php
        $link = $pager->links();
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
  var last_id = ''
  var last_nama = ''
  $('#id_lokasi').on('change', function() {
    var id_lokasi = $('#id_lokasi').val();
    // Memeriksa apakah input memenuhi format yang diharapkan ("LOK-xxx")
    if (!(/^LOK-\d{3}$/.test(id_lokasi))) {
      $('#id_lokasi').addClass('is-invalid');
      $('#invalidIdlokasi').text('ID lokasi harus berupa LOK-xxx');
    } else {
      $('#id_lokasi').removeClass('is-invalid');
      $('#invalidIdlokasi').text('');
    }
  });

  $('#idEdit').on('change', function() {
    var idEdit = $('#idEdit').val();
    // Memeriksa apakah input memenuhi format yang diharapkan ("LOK-xxx")
    if (!(/^LOK-\d{3}$/.test(idEdit))) {
      $('#idEdit').val(last_id);
      $('#idEdit').addClass('is-invalid');
      $('#invalidEditId').text('ID lokasi harus berupa LOK-xxx');
    } else {
      $('#idEdit').removeClass('is-invalid');
      $('#invalidEditId').text('');
    }
  });

  $('#tambahData').on('hidden.bs.modal', function() {
    clearForm();
  });

  $('#simpan').on('click', function() {
    $id_lokasi = $('#id_lokasi').val();
    $nama_lokasi = $('#nama_lokasi').val();
    $.ajax({
      url: '<?= site_url("/user/data_lokasi/simpan"); ?>',
      type: 'POST',
      data: {
        'id_lokasi': $id_lokasi,
        'nama_lokasi': $nama_lokasi
      },
      success: function(data) {
        data = JSON.parse(data);
        if (data.status == true) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Data Berhasil ditambahkan',
            showConfirmButton: false,
            timer: 2000
          }).then(() => {
            clearForm();
            $('#tabel-data').load(location.href + ' #tabel-data');
          });
        } else {
          if (data.invalidId) {
            $('#id_lokasi').addClass('is-invalid');
            $('#invalidIdlokasi').text(data.invalidId);
          } else {
            $('#id_lokasi').removeClass('is-invalid');
            $('#invalidIdlokasi').text('');
          }
          if (data.invalidNama) {
            $('#nama_lokasi').addClass('is-invalid');
            $('#invalidNamalokasi').text(data.invalidNama);
          } else {
            $('#nama_lokasi').removeClass('is-invalid');
            $('#invalidNamalokasi').text('');
          }
        }
      }
    });
  })

  $('#modalEdit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.val();
    var modal = $(this);
    $.ajax({
      url: '<?= site_url("/user/data_lokasi/cari"); ?>',
      type: 'POST',
      data: {
        'id': id
      },
      success: function(data) {
        data = JSON.parse(data);
        $('#idEdit').val(data.id_lokasi);
        $('#namaEdit').val(data.nama_lokasi);
        last_nama = data.nama_lokasi;
        last_id = data.id_lokasi;
      }
    });
  });

  $('#edit').on('click', function() {
    $idEdit = $('#idEdit').val();
    $namaEdit = $('#namaEdit').val();
    $.ajax({
      url: '<?= site_url("/user/data_lokasi/edit"); ?>',
      type: 'POST',
      data: {
        'id': $idEdit,
        'idLama': last_id,
        'namaLama': last_nama,
        'nama': $namaEdit
      },
      success: function(data) {
        data = JSON.parse(data);
        if (data.status == true) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Data Berhasil diedit',
            showConfirmButton: false,
            timer: 2000
          }).then(() => {
            $('#modalEdit').modal('hide');
            $('#tabel-data').load(location.href + ' #tabel-data')
          });
        } else {
          if (data.invalidId) {
            $('#idEdit').addClass('is-invalid');
            $('#invalidEditId').text(data.invalidId);
          } else {
            $('#idEdit').removeClass('is-invalid');
            $('#invalidEditId').text(last_id);
          }
          if (data.invalidNama) {
            $('#namaEdit').addClass('is-invalid');
            $('#invalidEditNama').text(data.invalidNama);
          } else {
            $('#namaEdit').removeClass('is-invalid');
            $('#invalidEditNama').text(last_nama);
          }
        }
      }
    });
  });


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
          url: '<?= site_url("/user/data_lokasi/hapus"); ?>',
          type: 'POST',
          data: {
            'id': id
          },
          success: function(data) {
            data = JSON.parse(data);
            if (data.status == true) {
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
                icon: 'error',
                title: 'Oops...',
                text: 'Data gagal dihapus'
              })
            }
          }
        });
      }
    })
  }

  function clearForm() {
    $('#modalTambah').modal('hide');
    $('#tambahLokasiForm')[0].reset();
    $('#id_lokasi').removeClass('is-invalid');
    $('#invalidIdlokasi').text('');
    $('#nama_lokasi').removeClass('is-invalid');
    $('#invalidNamalokasi').text('');
    $('#editLokasiForm')[0].reset();
    $('#idEdit').removeClass('is-invalid');
    $('#invalidEditId').text('');
    $('#namaEdit').removeClass('is-invalid');
    $('#invalidEditNama').text('');
  }
</script>
<?= $this->endSection(); ?>