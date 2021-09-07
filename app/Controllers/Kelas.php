<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelDosen;
use App\Models\ModelProdi;

class Kelas extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelDosen = new ModelDosen();
        $this->ModelProdi = new ModelProdi();
    }

    public function index()
    {
        $data = [
            'title'    => 'Rombongan Kelas',
            'kelas'     => $this->ModelKelas->alldata(),
            'dosen'     => $this->ModelDosen->alldata(),
            'prodi'     => $this->ModelProdi->alldata(),
            'isi'     => 'admin/v_kelas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_kelas' => [
                'label'     => 'Nama Kelas',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_prodi' => [
                'label'     => 'Program Studi',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_dosen' => [
                'label'     => 'Nama Dosen',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'tahun_angkatan' => [
                'label'     => 'Tahun Angkatan',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'nama_kelas' =>  $this->request->getPost('nama_kelas'),
                'id_prodi' =>  $this->request->getPost('id_prodi'),
                'id_dosen' =>  $this->request->getPost('id_dosen'),
                'tahun_angkatan' =>  $this->request->getPost('tahun_angkatan'),
            ];
            $this->ModelKelas->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambah !!!');
            return redirect()->to(base_url('kelas'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelas'));
        }
    }

    public function delete($id_kelas)
    {
        $data = [
            'id_kelas'   => $id_kelas,
        ];
        $this->ModelKelas->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Delete !!!');
        return redirect()->to(base_url('kelas'));
    }
}
