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
        <h1>Detail Survey</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user">Home</a></li>
          <li class="breadcrumb-item active">Detail Survey</li>
        </ol>
      </div>
    </div>
    <div class="card">
      <div class="card-header bg-gradient-secondary">
        <h3>Detail Survey</h3>
      </div>
      <div class="card-body" style="background-color: #ffffffc2;">
        <div id="content">
          <div class="text-center mx-auto width-100">
            <h3 class="text-center mb-0">PT. ABADI SURVEYOR</h3>
            <p class="text-center mb-0">Jl. Cempaka No. 22, Cempaka, Cempaka Putih, Jakarta Pusat, DKI Jakarta 10510</p>
            <p class="text-center mb-0">Telp. 021 - 319 9999 / Fax. 021 - 319 9999</p>
            <p class="text-center">Email. sales@abdi.com / www.abadi.co.id</p>
            <hr class="border-bottom border-3 border-dark">
          </div>
          <div style="padding:0 30px ;">
            <img style="width: 25%;" src="/dist/img/main-logo.png" alt="">
            <h2 class="text-center">LAPORAN HASIL SURVEY</h2>
            <hr>
            <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold w-25">Hari/tanggal</td>
                  <td class="font-weight-bold">:</td>
                  <?php
                  $timestamp = strtotime($transaksi['tgl_transaksi']);
                  $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                  $date = $formatter->format($timestamp);
                  ?>
                  <td class="w-75"><?= $date; ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Nomor Transaksi</td>
                  <td class="font-weight-bold">:</td>
                  <td><?= $transaksi['id_transaksi']; ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Nama Sales</td>
                  <td class="font-weight-bold">:</td>
                  <td><?= $transaksi['nama_sales']; ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold">ID Sales</td>
                  <td class="font-weight-bold">:</td>
                  <td><?= $transaksi['id_user']; ?></td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table>
              <tbody>
                <tr>
                  <td class="font-weight-bold w-25">Lokasi Survey</td>
                  <td class="font-weight-bold">:</td>
                  <td class="w-75"><?= $transaksi['nama_lokasi']; ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Nama barang</td>
                  <td class="font-weight-bold">:</td>
                  <td><?= $transaksi['nama_barang']; ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Jumlah Barang</td>
                  <td class="font-weight-bold">:</td>
                  <td><?= $transaksi['jumlah']; ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Repeat Order</td>
                  <td class="font-weight-bold">:</td>
                  <td><?= $transaksi['isRepeatOrder'] ? 'Ya' : 'Tidak'; ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Hasil Survey</td>
                  <td class="font-weight-bold">:</td>
                  <td><?= $transaksi['hasil_transaksi']; ?></td>
                </tr>

              </tbody>

            </table>
            <hr>
          </div>
          <hr class="border-dark mb-3">
        </div>
        <div class="float-right">
          <a href="/user/transaksi" class="btn btn-primary">Kembali</a>
          <a href="/user/transaksi/export_pdf?id=<?= $transaksi['id_transaksi']; ?>" class="btn btn-success"><i class="fas fa-print mr-2"></i> Download PDF</a>
        </div>
      </div>
    </div>
</section>
<?= $this->include('layouts/templates/script.php') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
<script>
  function cetak() {
    $('#content').printThis({
      debug: false,
      importCSS: true,
      importStyle: true,
      printContainer: true,
      removeInline: false,
      printDelay: 333,
      header: null,
      footer: null,
      formValues: true
    });
  }
</script>
<?= $this->endSection(); ?>