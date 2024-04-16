<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
  protected $table = 'lokasi';
  protected $allowedFields = ['id_lokasi', 'nama_lokasi'];
}
