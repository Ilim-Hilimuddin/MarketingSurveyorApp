<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
  protected $table = 'transaksi';
  protected $allowedFields = ['id_transaksi', 'id_user', 'id_barang', 'id_lokasi', 'tgl_transaksi', 'jumlah', 'isRepeatOrder', 'hasil_transaksi'];

  protected $perPage = 5;

  public function getSurveyData()
  {
    $query = $this->db->query("
          SELECT l.nama_lokasi, COUNT(t.id_lokasi) AS total
          FROM transaksi t
          JOIN lokasi l ON t.id_lokasi = l.id_lokasi
          WHERE MONTH(t.tgl_transaksi) = MONTH(CURRENT_DATE()) 
            AND YEAR(t.tgl_transaksi) = YEAR(CURRENT_DATE())
          GROUP BY l.nama_lokasi
      ");
    return $query->getResultArray();
  }
}
