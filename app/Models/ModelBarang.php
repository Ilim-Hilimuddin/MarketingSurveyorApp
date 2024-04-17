<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
  protected $table = 'barang';
  protected $allowedFields = ['id_barang', 'nama_barang'];

  function cari($data)
  {
    $tabel = $this->table('barang');
    $arrKeys = explode(' ', $data);
    for ($i = 0; $i < count($arrKeys); $i++) {
      $tabel->orLike('id_barang', $arrKeys[$i]);
      $tabel->orLike('nama_barang', $arrKeys[$i]);
    }
    return $tabel;
  }
}
