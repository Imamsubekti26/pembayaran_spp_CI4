<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
  protected $table      = 'petugas';
  protected $primaryKey = 'id_petugas';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['username', 'password', 'nama_petugas', 'level'];

  protected $useTimestamps = false;
}