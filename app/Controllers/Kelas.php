<?php

namespace App\Controllers;
use \App\Models\KelasModel;

class Kelas extends BaseController
{

    
    public function index()
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $kelasModel = new KelasModel();
        $kelas = $kelasModel->findAll();

        for ($i=0; $i < count($kelas) ; $i++) {
            $tambahan_tahun = date('m') <= 6 ? 1 : 0;
            $kelas[$i]['tingkatan'] = date("Y")-$kelas[$i]['angkatan']-$tambahan_tahun;
            $kelas[$i]['nomor'] = $i+1;

            switch ($kelas[$i]['tingkatan']) {
                case '0':
                    $kelas[$i]['tingkatan'] = "X";
                    break;
                
                case '1':
                    $kelas[$i]['tingkatan'] = "XI";
                    break;
                
                case '2':
                    $kelas[$i]['tingkatan'] = "XII";
                    break;
                
                case '3':
                    $kelas[$i]['tingkatan'] = "XIII";
                    break;
                
                default:
                    $kelas[$i]['tingkatan'] = "X";
                    break;
            }
        }
        $data = [
            "judul" => "Data Kelas",
            "kelas" => $kelas,
            "flash" => $getFlash
        ];
        
        return view('kelas/data', $data);
    }
    public function halamanTambah()
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $data = [
            "tahun_ini" => date('Y'),
            "flash" => $getFlash
        ];

        return view('kelas/tambah', $data);
    }
    public function halamanEdit($id)
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $kelasModel = new KelasModel();
        $kelas = $kelasModel->find($id);

        $data = [
            'data' => $kelas,
            'id' => $id,
            'flash' => $getFlash
        ];

        return view('kelas/edit', $data);
    }
    public function aksiTambah()
    {
        $request = \Config\Services::request();
        $getData = $request->getPost();

        // dd($getData);
        $kelasModel = new KelasModel();
        $data = $kelasModel->insert($getData);

        return redirect()->back()->with('pesan', 'berhasil memasukkan data');
    }
    public function aksiEdit($id)
    {

        $request = \Config\Services::request();
        $getData = $request->getPost();

        $kelasModel = new KelasModel();
        $data = $kelasModel->update($id, $getData);

        // dd($data);
        return redirect()->back()->with('pesan', 'berhasil mengupdate data');
    }
    public function aksiHapus($id)
    {
        $kelasModel = new KelasModel();
        $data = $kelasModel->delete($id);

        return redirect()->to(base_url('kelas'))->with('pesan', 'data berhasil dihapus');
    }
}
