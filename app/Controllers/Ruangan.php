<?php

namespace App\Controllers;

use App\Models\ModelRuangan;
use App\Models\ModelGedung;

class Ruangan extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelRuangan = new ModelRuangan();
        $this->ModelGedung = new ModelGedung();
    }

    public function index()
    {
        $data = [
            'title'     => 'Ruangan',
            'ruangan'  => $this->ModelRuangan->alldata(),
            'isi'       => 'admin/ruangan/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Add Ruangan',
            'gedung'  => $this->ModelGedung->alldata(),
            'isi'       => 'admin/ruangan/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function insert()
    {
        if ($this->validate([
            'id_gedung' => [
                'label'     => 'Gedung',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'id_gedung' =>  $this->request->getPost('id_gedung'),
                'ruangan' =>  $this->request->getPost('ruangan'),
            ];
            $this->ModelRuangan->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to(base_url('ruangan'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('ruangan/add'));
        }
    }
}
