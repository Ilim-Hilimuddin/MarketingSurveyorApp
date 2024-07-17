<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Transaksi Survey Marketing</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1,
    h2 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    table,
    th,
    td {
      border: 1px solid #ddd;
    }

    th,
    td {
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      overflow: hidden;
    }

    .logo {
      width: 100%;
      text-align: center;
    }

    .logo img {
      width: 25%;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="logo">
      <img src="<?= FCPATH . 'assets\img\logo.png' ?>" width="50px">
    </div>
    <h1>PT. ABADI SURVEYOR</h1>
    <h2>DAFTAR TRANSAKSI SURVEY MARKETING</h2>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Id Transaksi</th>
          <th>Nama Sales</th>
          <th>Barang</th>
          <th>Lokasi</th>
          <th>Tanggal Transaksi</th>
          <th>Jumlah Barang</th>
          <th>Repeat Order</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $key => $value) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value['id_transaksi'] ?></td>
            <td><?= $value['nama_sales'] ?></td>
            <td><?= $value['nama_barang'] ?></td>
            <td><?= $value['nama_lokasi'] ?></td>
            <td><?= $value['tgl_transaksi'] ?></td>
            <td><?= $value['jumlah'] ?></td>
            <td><?= $value['isRepeatOrder'] ? 'Ya' : 'Tidak' ?></td>
            <td><?= $value['hasil_transaksi'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>

</html>