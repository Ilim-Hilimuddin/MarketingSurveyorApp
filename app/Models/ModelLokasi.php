<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
  protected $table = 'lokasi';
  protected $allowedFields = ['id_lokasi', 'nama_lokasi'];

  function cari($data)
  {
    $tabel = $this->table('lokasi');
    $arrKeys = explode(' ', $data);
    for ($i = 0; $i < count($arrKeys); $i++) {
      $tabel->orLike('id_lokasi', $arrKeys[$i]);
      $tabel->orLike('nama_lokasi', $arrKeys[$i]);
    }
    return $tabel;
  }
}
