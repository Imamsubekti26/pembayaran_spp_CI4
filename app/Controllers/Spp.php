<?php

namespace App\Controllers;

use \App\Models\SppModel;
use \App\Models\SiswaModel;
use \App\Models\PembayaranModel;


class Spp extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;
        
        $request = $this->request->getGet() != [] &&  $this->request->getGet()['tahun'] != "all"? $this->request->getGet() : false;

        $sppModel = new SppModel();
        $tahun = $sppModel->getTahunOnly();

        if ($request){
            $spp = $sppModel->where('tahun', $request['tahun'])->findAll();
        } else {
            $spp = $sppModel->findAll();
        }

        for ($i=0; $i < count($spp) ; $i++) {
            $spp[$i]['nomor'] = $i+1;
        }

        $data = [ 
            "judul" => "Data SPP",
            "spp" => $spp,
            "tahun" => $tahun,
            "flash" => $getFlash
        ];

        return view('spp/data', $data);
    }
    public function halamanTambah()
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $data = [
            "flash" => $getFlash
        ];

        return view('spp/tambah', $data);
    }
    public function halamanEdit($id)
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $sppModel = new SppModel();
        $spp = $sppModel->find($id);

        $data = [
            'data' => $spp,
            'id' => $id,
            'flash' => $getFlash
        ];

        return view('spp/edit', $data);
    }
    public function aksiTambah()
    {
        $request = \Config\Services::request();
        $getData = $request->getPost();

        // dd($getData);
        $sppModel = new SppModel();
        $data = $sppModel->insert($getData);

        return redirect()->back()->with('pesan', 'berhasil memasukkan data');
    }
    public function aksiEdit($id)
    {
        $request = \Config\Services::request();
        $getData = $request->getPost();

        $sppModel = new SppModel();
        $data = $sppModel->update($id, $getData);
        
        return redirect()->back()->with('pesan', 'berhasil mengedit data');
    }
    public function aksiHapus($id)
    {
        $sppModel = new SppModel();
        $data = $sppModel->delete($id);

        return redirect()->to(base_url('spp'))->with('pesan', 'data berhasil dihapus');
    }
}
