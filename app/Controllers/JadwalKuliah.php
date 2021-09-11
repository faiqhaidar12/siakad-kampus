<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelProdi;

class JadwalKuliah extends BaseController
{
    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        $this->ModelProdi = new ModelProdi();
    }

    public function index()
    {
        $data = [
            'title'             => 'Jadwal Kuliah',
            'ta_aktif'          => $this->ModelTa->ta_aktif(),
            'prodi'             => $this->ModelProdi->alldata(),
            'isi'               => 'admin/jadwalkuliah/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
}
