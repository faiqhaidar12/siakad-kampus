<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }
    public function index()
    {
        $data = [
            'title'    => 'Login',
            'isi'     => 'v_Login'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'username' => [
                'label'     => 'Username',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'level' => [
                'label'     => 'Level',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label'     => 'Password',
                'rules'      => 'required',
                'errors'    => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
        ])) {
            //jika valid
            $level = $this->request->getPost('level');
            if ($level == 1) {
                echo 'Admin';
            } elseif ($level == 2) {
                echo 'Mahasiswa';
            } elseif ($level == 3) {
                echo 'Dosen';
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth'));
        }
    }
}
