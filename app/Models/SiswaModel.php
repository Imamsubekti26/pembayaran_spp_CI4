<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
  protected $table      = 'siswa';
  protected $primaryKey = 'nisn';

  protected $useAutoIncrement = false;

  protected $allowedFields = ['nis', 'nama', 'id_kelas', 'alamat', 'no_telp', 'id_spp'];

  protected $useTimestamps = false;
  
  public function findWithSearch(String $cari){

    $query = $this->db->query("SELECT * FROM `siswa` WHERE $cari");

    return $query->getResultArray();
    
  }
}