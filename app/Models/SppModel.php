<?php

namespace App\Models;

use CodeIgniter\Model;

class SppModel extends Model
{
  protected $table      = 'spp';
  protected $primaryKey = 'id_spp';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['tahun', 'golongan', 'nominal'];

  protected $useTimestamps = false;
  
  public function getTahunOnly(){
    $query = "SELECT DISTINCT `tahun` FROM `spp`";

    $query=$this->db->query($query);
      
    return $query->getResultArray();
  }
}