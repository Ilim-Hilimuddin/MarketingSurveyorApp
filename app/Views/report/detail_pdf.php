<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Hasil Survey</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 0;
      line-height: 1.6;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 5px;
    }

    .header h1 {
      margin: 0;
      font-size: 24px;
    }

    .header p {
      margin: 0;
    }

    .logo {
      width: 100%;
      text-align: center;
      padding: 0;
      border-top: 1px solid #ddd;
      margin: 20px 0 20px 0;
    }

    .logo img {
      width: 25%;
    }

    .report-title {
      text-align: center;
      font-size: 16px;
      margin-top: -45px;
    }

    .report-content {
      clear: both;
      border-top: 1px solid #ddd;
      border-bottom: 1px solid #ddd;
      padding-top: 5px;
      margin-top: -10px;
    }

    .report-content table {
      width: 100%;
      border-collapse: collapse;
    }

    .report-content th,
    .report-content td {
      text-align: left;
      padding: 5px;
    }

    .report-content th {
      width: 25%;
    }

    .report-content td {
      border-bottom: 1px solid #ddd;
    }

    .report-content tr:last-child td {
      border-bottom: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>PT. ABADI SURVEYOR</h1>
      <p>Jl. Cempaka No. 22, Cempaka, Cempaka Putih, Jakarta Pusat, DKI Jakarta 10510</p>
      <p>Telp. 021 - 319 9999 / Fax. 021 - 319 9999</p>
      <p>Email. sales@abdi.com / www.abadi.co.id</p>
      <div class="logo">
        <img src="<?= FCPATH . 'assets\img\logo.png' ?>" width="50px">
      </div>
    </div>
    <div class="report-title">
      <h2>LAPORAN HASIL SURVEY</h2>
    </div>

    <div class="report-content">
      <table>
        <tr>
          <th>Hari/Tanggal</th>
          <?php
          $timestamp = strtotime($data['tgl_transaksi']);
          $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
          $date = $formatter->format($timestamp);
          ?>
          <td>: <?= $date; ?></td>
        </tr>
        <tr>
          <th>Nomor Transaksi</th>
          <td>: <?= $data['id_transaksi']; ?></td>
        </tr>
        <tr>
          <th>Nama Sales</th>
          <td>: <?= $data['nama_sales']; ?></td>
        </tr>
        <tr>
          <th>ID Sales</th>
          <td>: <?= $data['id_user']; ?></td>
        </tr>
        <tr>
          <th>Lokasi Survey</th>
          <td>: <?= $data['nama_lokasi']; ?></td>
        </tr>
        <tr>
          <th>Nama Barang</th>
          <td>: <?= $data['nama_barang']; ?></td>
        </tr>
        <tr>
          <th>Jumlah Barang</th>
          <td>: <?= $data['jumlah']; ?></td>
        </tr>
        <tr>
          <th>Repeat Order</th>
          <td>: <?= $data['isRepeatOrder'] ? 'Ya' : 'Tidak'; ?></td>
        </tr>
        <tr>
          <th>Hasil Survey</th>
          <td>: <?= $data['hasil_transaksi']; ?></td>
        </tr>
      </table>
    </div>
  </div>
</body>

</html>