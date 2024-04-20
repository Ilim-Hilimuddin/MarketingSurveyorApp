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
        <img class="mb-3" style="width: 30%;" src="/dist/img/main-logo.png" alt="">
        <h4>Laporan Hasil Survey</h4>
        <hr>
        <table>
          <tbody>
            <tr>
              <td class="font-weight-bold w-25">Tanggal</td>
              <td class="font-weight-bold">:</td>
              <td class="w-75"><?= $transaksi['tgl_transaksi']; ?></td>
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
        <form class="float-right" action="/user/detail/cetak" method="post">
          <a href="/user/transaksi" class="btn btn-primary">Kembali</a>
          <button type="submit" name="cetak" value=<?= $transaksi['id_transaksi']; ?> class="btn btn-success">Cetak</button>
        </form>
      </div>
    </div>
</section>
<?= $this->include('layouts/templates/script.php') ?>
<?= $this->endSection(); ?>