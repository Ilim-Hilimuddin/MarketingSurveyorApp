<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
  protected $table = 'barang';
  protected $allowedFields = ['id_barang', 'nama_barang'];
}
