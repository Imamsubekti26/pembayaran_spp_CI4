<?php

namespace App\Controllers;

use \App\Models\SiswaModel;
use \App\Models\KelasModel;
use \App\Models\SppModel;


class Siswa extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $request = $this->request->getGet();

        if($request != [] && ($request['cari'] != "" OR $request['kelas'] != "")){
            $where = [];
            $cari = $request['cari'];
            if($request['cari'] != ""){
                $where['nama'] = "`nama` LIKE '%$cari%'";
                $where['nisn'] = "`nisn` LIKE '%$cari%'";
                $where['nis'] = "`nis` LIKE '%$cari%'";
                $where['cari'] = implode(' OR ', $where);
                unset($where['nama']);
                unset($where['nisn']);
                unset($where['nis']);
            }
            
            if($request['kelas'] != ""){
                $where['kelas'] = "`id_kelas` = ".$request['kelas'];
            }

            $where = implode(' && ', $where);
        }

        $siswaModel = new SiswaModel();

        if(isset($where)){
            $siswa = $siswaModel->findWithSearch($where);
        }else{
            $siswa = $siswaModel->findAll();
        }

        $kelas = $this->getKelas();

        for ($j=0; $j < count($siswa) ; $j++) {
            $id_kelas = $siswa[$j]['id_kelas'];
            
            for ($i=0; $i < count($kelas) ; $i++) {
                if($id_kelas == $kelas[$i]['id_kelas']){
                    $siswa[$j]['kelas'] = $kelas[$i]['kode kelas'];
                }
            }

        }

        $data = [
            'data' => $siswa,
            'kelas' => $kelas,
            'get' => $request,
            'flash' => $getFlash
        ];

        return view('siswa/data', $data);
    }
    public function halamanTambah()
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $sppModel = new SppModel();
        $spp = $sppModel->findAll();

        $kelas = $this->getKelas();

        $data = [
            "kelas" => $kelas,
            "spp" => $spp,
            "flash" => $getFlash
        ];

        return view('siswa/tambah', $data);
    }
    public function halamanEdit($id)
    {
        $session = \Config\Services::session();
        $getFlash = $session->getFlashdata('pesan')??false;

        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->find($id);
        $siswa['id_spp'] = json_decode($siswa['id_spp']);

        $sppModel = new SppModel();
        $spp = $sppModel->findAll();

        $kelas = $this->getKelas();

        $data = [
            "data" => $siswa,
            "kelas" => $kelas,
            "spp" => $spp,
            "id" => $id,
            "flash" => $getFlash
        ];
        
        return view('siswa/edit', $data);
    }
    public function aksiTambah()
    {
        $request = \Config\Services::request();
        $getData = $request->getPost();

        $getData['id_kelas'] = $getData['kelas'];
        unset($getData['kelas']);

        $getData['id_spp'] = implode(', ', $getData['spp']);
        $getData['id_spp'] = "[".$getData['id_spp']."]";
        
        unset($getData['spp']);
        
        $siswaModel = new SiswaModel();
        if($siswaModel->find($getData['nisn']) != null){
            return redirect()->back()->with('pesan', 'maaf, data dengan nisn tertera sudah ada');
        }
        $data = $siswaModel->insert($getData); 

        return redirect()->back()->with('pesan', 'berhasil memasukkan data');
    }
    public function aksiEdit($id)
    {
        $request = \Config\Services::request();
        $getData = $request->getPost();

        $getData['id_kelas'] = $getData['kelas'];
        unset($getData['kelas']);

        $getData['id_spp'] = implode(', ', $getData['spp']);
        $getData['id_spp'] = "[".$getData['id_spp']."]";
        
        unset($getData['spp']);
        
        $siswaModel = new SiswaModel();
        $data = $siswaModel->update($id, $getData);

        return redirect()->back()->with('pesan', 'berhasil mengedit data');
    }
    public function aksiHapus($id)
    {
        $siswaModel = new SiswaModel();
        $data = $siswaModel->delete($id);
        return redirect()->to(base_url('siswa'))->with('pesan', 'berhasil menghapus data');
    }
    private function getKelas(){
        $kelasModel = new KelasModel();
        $kelas = $kelasModel->findAll();

        for ($i=0; $i < count($kelas) ; $i++) {
            $tambahan_tahun = date('m') <= 6 ? 1 : 0;
            $tingkatan = date("Y")-$kelas[$i]['angkatan']-$tambahan_tahun;

            switch ($tingkatan) {
                case '0':
                    $tingkatan = "X";
                    break;
                
                case '1':
                    $tingkatan = "XI";
                    break;
                
                case '2':
                    $tingkatan = "XII";
                    break;
                
                case '3':
                    $tingkatan = "XIII";
                    break;
                
                default:
                    $tingkatan = "X";
                    break;
            }

            $kelas[$i]['kode kelas'] = $tingkatan." ".$kelas[$i]['jurusan']." ".$kelas[$i]['kelas'];
        }
        return $kelas;
    }
}
