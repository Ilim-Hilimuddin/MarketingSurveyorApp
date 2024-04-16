<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
  protected $table = 'barang';
  protected $allowedFields = ['id_transaksi', 'id_user', 'id_barang', 'id_lokasi', 'tgl_transaksi', 'jumlah', 'hasil_transaksi'];
}
