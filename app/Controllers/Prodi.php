<?php

namespace App\Controllers;

use App\Models\ModelProdi;
use App\Models\ModelFakultas;

class Prodi extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelProdi = new ModelProdi();
        $this->ModelFakultas = new ModelFakultas();
    }

    public function index()
    {
        $data = [
            'title'     => 'Program Studi',
            'prodi'     => $this->ModelProdi->alldata(),
            'isi'       => 'admin/prodi/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Add Program Studi',
            'fakultas'  => $this->ModelFakultas->alldata(),
            'isi'       => 'admin/prodi/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function edit($id_prodi)
    {
        $data = [
            'title'     => 'Edit Program Studi',
            'fakultas'  => $this->ModelFakultas->alldata(),
            'prodi'     => $this->ModelProdi->detail_Data($id_prodi),
            'isi'       => 'admin/prodi/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'id_fakultas' => [
                'label'     => 'Fakultas',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'kode_prodi' => [
                'label'     => 'Kode program Studi',
                'rules'      => 'required|is_unique[tbl_prodi.kode_prodi]',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} Sudah Ada, Input Kode Lain !!!'
                ]
            ],
            'prodi' => [
                'label'     => 'Program Studi',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jenjang' => [
                'label'     => 'Jenjang',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'id_fakultas' =>  $this->request->getPost('id_fakultas'),
                'kode_prodi' =>  $this->request->getPost('kode_prodi'),
                'prodi' =>  $this->request->getPost('prodi'),
                'jenjang' =>  $this->request->getPost('jenjang'),

            ];
            $this->ModelProdi->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to(base_url('prodi'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/add'));
        }
    }

    public function update($id_prodi)
    {
        if ($this->validate([
            'id_fakultas' => [
                'label'     => 'Fakultas',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'prodi' => [
                'label'     => 'Program Studi',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jenjang' => [
                'label'     => 'Jenjang',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'id_prodi' => $id_prodi,
                'id_fakultas' =>  $this->request->getPost('id_fakultas'),
                'kode_prodi' =>  $this->request->getPost('kode_prodi'),
                'prodi' =>  $this->request->getPost('prodi'),
                'jenjang' =>  $this->request->getPost('jenjang'),

            ];
            $this->ModelProdi->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Edit !!!');
            return redirect()->to(base_url('prodi'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/edit/' . $id_prodi));
        }
    }

    public function delete($id_prodi)
    {
        $data = [
            'id_prodi'   => $id_prodi,
        ];
        $this->ModelProdi->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Delete !!!');
        return redirect()->to(base_url('prodi'));
    }
}
