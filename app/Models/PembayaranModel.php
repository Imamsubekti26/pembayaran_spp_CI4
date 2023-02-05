<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
  protected $table      = 'pembayaran';
  protected $primaryKey = 'id_pembayaran';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['id_petugas', 'nisn', 'tgl_bayar', 'jumlah_bayar'];

  protected $useTimestamps = false;

  public function findWithPetugas(int $id){
    $query = "SELECT `pembayaran`.`id_pembayaran`, `pembayaran`.`tgl_bayar`, `pembayaran`.`jumlah_bayar`, `petugas`.`nama_petugas` FROM `pembayaran` JOIN `petugas` ON `pembayaran`.`id_petugas` = `petugas`.`id_petugas` WHERE `pembayaran`.`nisn` = 00678657";

    $result = $this->db->query($query);

    return $result->getResultArray();
  }
}