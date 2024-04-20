<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
  protected $table = 'transaksi';
  protected $allowedFields = ['id_transaksi', 'id_user', 'id_barang', 'id_lokasi', 'tgl_transaksi', 'jumlah', 'isRepeatOrder', 'hasil_transaksi'];

  protected $perPage = 5;
}
