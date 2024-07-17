<?php
// dd($transaksi);
$this->extend('layouts/templates/default');
$this->section('content');
?>
<style>
  tr {
    padding: 10px;
    font-size: 1.2rem;
  }

  .line {
    width: 100%;
    height: 1px;
    background-color: #000000;
    margin: 0;
  }
</style>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-sm-6">
        <h1>Detail Pengguna</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user">Home</a></li>
          <li class="breadcrumb-item active">Detail Pengguna</li>
        </ol>
      </div>
    </div>
    <div class="card">
      <div class="card-header bg-gradient-secondary">
        <h3>Detail Pengguna</h3>
      </div>
      <div class="card-body" style="background-color: #ffffffc2;">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-12">
              <div class="card mb-3">

                <h4 class="font-weight-bold card-footer">Detail Karyawan</h4>

                <div class="row no-gutters p-3">
                  <div class="col-md-3 text-center">
                    <img src="/assets/img/<?= $user['foto']; ?>" class="w-75 card-img p-3 img-fluid rounded-circle img-thumbnail mb-3">
                    <br>
                    <h4 class="font-weight-bold"><?= $user['nama_lengkap']; ?></h4>
                    <p class="text-muted"><?= $user['email']; ?></p>
                  </div>
                  <div class="col-md-9">
                    <div class="card-body mb-3" style="border-bottom: 1px solid #dee2e6; padding-bottom: 0px;">
                      <h4 class="font-weight-bold"><?= $user['nama_lengkap']; ?></h4>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">ID Pengguna</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['id_user']; ?></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Role</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['id_role'] == 1 ? 'Admin' : 'Sales'; ?></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Jenis Kelamin</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['jenis_kelamin']; ?></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Tanggal Lahir</h5>
                      <h5 class="mb-3 col-md-9">: <span id="tglLahir"><?= $user['tgl_lahir'] ?></span></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Email</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['email']; ?></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Nomor Telepon</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['telepon']; ?></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Alamat</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['alamat']; ?></h5>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="/user/data_pengguna" class="btn btn-primary float-right">Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="border-dark mb-3">
      </div>
    </div>
</section>
<?= $this->include('layouts/templates/script.php') ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk memformat tanggal
    function formatTanggal(tanggal) {
      const namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      const namaBulan = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
        'Agustus', 'September', 'Oktober', 'November', 'Desember'
      ];

      const dateObj = new Date(tanggal);
      const hari = namaHari[dateObj.getDay()];
      const tgl = dateObj.getDate();
      const bulan = namaBulan[dateObj.getMonth()];
      const tahun = dateObj.getFullYear();

      return `${hari}, ${tgl} ${bulan} ${tahun}`;
    }

    // Ambil elemen tanggal lahir
    const tglLahirElem = document.getElementById('tglLahir');

    // Ambil nilai tanggal lahir
    const tglLahir = tglLahirElem.textContent;

    // Format tanggal lahir
    const formattedTanggal = formatTanggal(tglLahir);

    // Tampilkan tanggal lahir yang sudah diformat
    tglLahirElem.textContent = formattedTanggal;
  });
</script>

<?= $this->endSection(); ?>