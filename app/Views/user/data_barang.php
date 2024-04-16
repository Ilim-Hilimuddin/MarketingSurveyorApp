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

    <!-- Modal TAMBAH DATA -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahBarang" aria-hidden="true">
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
                <div id="invalidIdBarang" class="invalid-feedback ml-2"></div>
              </div>
              <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama" placeholder="Masukan nama barang...">
                <div id="invalidNamaBarang" class="invalid-feedback ml-2"></div>
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
    <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editBarang" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title" id="editBarang">Formulir Barang Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="idEdit">Id Barang</label>
                <input type="text" class="form-control" id="idEdit" name="id" placeholder="Masukkan ID barang...">
                <div id="invalidEditId" class="invalid-feedback ml-2"></div>
              </div>
              <div class="form-group">
                <label for="namaEdit">Nama Barang</label>
                <input type="text" class="form-control" id="namaEdit" name="nama" placeholder="Masukan nama barang...">
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
              <th>Aksi</th>
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
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editData" value="<?= $brg['id_barang']; ?>">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="deleteData('<?= $brg['id_barang']; ?>')">Hapus</button>
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
  var last_id = ''
  var last_nama = '';
  $('#id_barang').on('change', function() {
    var id_barang = $('#id_barang').val();
    // Memeriksa apakah input memenuhi format yang diharapkan ("BRG-xxx")
    if (!(/^BRG-\d{3}$/.test(id_barang))) {
      $('#id_barang').val('');
      $('#id_barang').addClass('is-invalid');
      $('#invalidIdBarang').text('ID Barang harus berupa BRG-xxx');
    } else {
      $('#id_barang').removeClass('is-invalid');
      $('#invalidIdBarang').text('');
    }
  });

  $('#idEdit').on('change', function() {
    var idEdit = $('#idEdit').val();
    // Memeriksa apakah input memenuhi format yang diharapkan ("BRG-xxx")
    if (!(/^BRG-\d{3}$/.test(idEdit))) {
      $('#idEdit').val(last_id);
      $('#idEdit').addClass('is-invalid');
      $('#invalidEditId').text('ID Barang harus berupa BRG-xxx');
    } else {
      $('#idEdit').removeClass('is-invalid');
      $('#invalidEditId').text('');
    }
  });

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
        data = JSON.parse(data);
        if (data.status == true) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Data Berhasil ditambahkan',
            showConfirmButton: false,
            timer: 2000
          }).then(() => {
            location.reload();
          });
        } else {
          if (data.invalidId) {
            $('#id_barang').addClass('is-invalid');
            $('#invalidIdBarang').text(data.invalidId);
          } else {
            $('#id_barang').removeClass('is-invalid');
            $('#invalidIdBarang').text('');
          }
          if (data.invalidNama) {
            $('#nama_barang').addClass('is-invalid');
            $('#invalidNamaBarang').text(data.invalidNama);
          } else {
            $('#nama_barang').removeClass('is-invalid');
            $('#invalidNamaBarang').text('');
          }
        }
      }
    });
  })

  $('#editData').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.val();
    var modal = $(this);
    $.ajax({
      url: '<?= site_url("/user/data_barang/cari"); ?>',
      type: 'POST',
      data: {
        'id': id
      },
      success: function(data) {
        data = JSON.parse(data);
        $('#idEdit').val(data.id_barang);
        $('#namaEdit').val(data.nama_barang);
        last_nama = data.nama_barang;
        last_id = data.id_barang;
      }
    });
  });

  $('#edit').on('click', function() {
    $idEdit = $('#idEdit').val();
    $namaEdit = $('#namaEdit').val();
    $.ajax({
      url: '<?= site_url("/user/data_barang/edit"); ?>',
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
            location.reload();
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
          url: '<?= site_url("/user/data_barang/hapus"); ?>',
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
                location.reload();
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
</script>
<?= $this->endSection(); ?>