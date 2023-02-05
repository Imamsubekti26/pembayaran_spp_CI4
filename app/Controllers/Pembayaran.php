<?php

namespace App\Controllers;

use \App\Models\SppModel;
use \App\Models\SiswaModel;
use \App\Models\PembayaranModel;
use \App\Models\PetugasModel;

class Pembayaran extends BaseController
{
  public function halamanBayar($id)
  {
    $siswaModel = new SiswaModel();
    $siswa = $siswaModel->select(['nama', 'id_spp'])->find($id);
    $siswa['id_spp'] = json_decode($siswa['id_spp']);

    $sppModel = new SppModel();
    $spp = $sppModel->findAll();

    $total = 0;
    for ($i=0; $i < count($siswa['id_spp']); $i++) { 
        $idspp = $siswa['id_spp'][$i];
        if($idspp != null){
            $total += $spp[$idspp]['nominal'];
        }
    }

    $pembayaranModel = new PembayaranModel();
    $pembayaran = $pembayaranModel->findWithPetugas($id);

    $dibayar = 0;
    for ($i=0; $i < count($pembayaran); $i++) { 
        $pembayaran[$i]['nomor'] = $i+1;
        $dibayar += $pembayaran[$i]['jumlah_bayar'];
    }

    $data = [
        'siswa' => $siswa,
        'spp' => $spp,
        'pembayaran' => $pembayaran,
        'total' => $total,
        'dibayar' => $dibayar,
        'belum_bayar' => $total-$dibayar,
        'id' => $id,
    ];

    return view('pembayaran/data', $data);
  }
  public function aksiBayar($id)
  {
      
  }
}