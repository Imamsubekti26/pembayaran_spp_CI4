<?php

namespace App\Controllers;
use \App\Models\SiswaModel;
use \App\Models\PetugasModel;

class Login extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;
        
        if($session->get('status')){
            return redirect()->to(base_url('siswa'));
        }

        $data = [
            "flash" => $getFlash
        ];

        return view('login', $data);
    }

    public function tryLogin()
    {
        $session = \Config\Services::session();

        $request = \Config\Services::request();
        $getData = $request->getPost();

        $siswaModel = new SiswaModel();
        $petugasModel = new PetugasModel();

        $session_set = [
            'status' => 0
        ];

        $cariSiswa = $siswaModel->where([
            'nama' => $getData['username'],
            'nis' => $getData['password']
            ])->first();

        if($cariSiswa == null){
            $cariPetugas = $petugasModel->where([
            'username' => $getData['username'],
            'password' => $getData['password']
            ])->first();

            if($cariPetugas != null){
                // petugas masuk
                $session_data = [
                    'status' => 1,
                    'level' => $cariPetugas['level'],
                    'id' => $cariPetugas['id_petugas']
                ];
                $session->set($session_data);
                
                return redirect()->to(base_url('siswa'));
            }
            
            return redirect()->back()->with('pesan', 'username atau password tidak ditemukan');

        }
        
        // siswa masuk
        $session_data = [
            'status' => 1,
            'level' => 'siswa',
            'id' => $cariSiswa['nisn']
        ];
        $session->set($session_data);
        return redirect()->to(base_url('siswa'));
    }
    public function logout()
    {
        $session = \Config\Services::session();
        $session->remove(['status', 'id', 'level']);

        return redirect()->to(base_url('login'));
    }
}
