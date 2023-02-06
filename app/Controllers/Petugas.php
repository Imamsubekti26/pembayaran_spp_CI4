<?php

namespace App\Controllers;

use \App\Models\PetugasModel;

class Petugas extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $petugasModel = new PetugasModel();
        $petugas = $petugasModel->select(['id_petugas', 'username', 'nama_petugas', 'level'])->findAll();

        for ($i=0; $i < count($petugas) ; $i++) {
            $petugas[$i]['nomor'] = $i+1;
        }

        $data = [
            'data' => $petugas,
            'flash' => $getFlash
        ];

        return view('petugas/data', $data);
    }
    public function halamanTambah()
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $data = [
            'flash' => $getFlash
        ];
        return view('petugas/tambah', $data);
    }
    public function halamanEdit($id)
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $petugasModel = new PetugasModel();
        $petugas = $petugasModel->select(['username', 'nama_petugas', 'level'])->find($id);

        $data = [
            "data" => $petugas,
            "id" => $id,
            "flash" => $getFlash
        ];
        return view('petugas/edit', $data);
    }
    public function aksiTambah()
    {
        $request = \Config\Services::request();
        $getData = $request->getPost();

        $petugasModel = new PetugasModel();
        $petugas = $petugasModel->insert($getData);

        return redirect()->back()->with('pesan', 'berhasil memasukkan data');
    }
    public function aksiEdit($id)
    {
        $request = \Config\Services::request();
        $getData = $request->getPost();
        $getData['nama_petugas'] = $getData['nama'];
        unset($getData['nama']);

        $petugasModel = new PetugasModel();

        if($getData['pwd']['lama'] != '' AND $getData['pwd']['baru'] != '' AND $getData['pwd']['confirm'] != ''){
            if($petugasModel->select('password')->find($id)['password'] != $getData['pwd']['lama']){
                return redirect()->back()->with('pesan', 'maaf password lama salah');
            }
            if($getData['pwd']['baru'] != $getData['pwd']['confirm']){
                return redirect()->back()->with('pesan', 'coba ketik ulang password baru anda dengan benar');
            } 
            
            $getData['password'] = $getData['pwd']['baru'];
            unset($getData['pwd']);

            $petugas = $petugasModel->update($id, $getData);
            return redirect()->back()->with('pesan', 'berhasil mengedit data');
        }
        
        $jejak = 0;
        if($getData['pwd']['lama'] == ''){
            $jejak++;
        }
        if($getData['pwd']['baru'] == ''){
            $jejak++;
        }
        if($getData['pwd']['confirm'] == ''){
            $jejak++;
        }
        
        unset($getData['pwd']);

        if($jejak != 0 AND $jejak != 3){
            return redirect()->back()->with('pesan', 'untuk mengubah password, masukkan semua password yang diperlukan ');
        }

        $petugas = $petugasModel->update($id, $getData);
        return redirect()->back()->with('pesan', 'berhasil mengedit data');
    }
    public function aksiHapus($id)
    {
        $petugasModel = new PetugasModel();
        $petugas = $petugasModel->delete($id);

        return redirect()->to(base_url('petugas'))->with('pesan', 'data berhasil dihapus');
    }
}
