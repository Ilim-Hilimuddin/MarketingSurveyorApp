<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'user';
  protected $allowedFields = ['id_role', 'nama_lengkap', 'jenis_kelamin', 'tgl_lahir', 'alamat', 'telepon', 'email', 'password', 'foto'];
}
