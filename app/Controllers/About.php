<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        $data = [
            'title'    => 'Apa Itu Siakad Kampus',
            'isi'     => 'admin/v_about'
        ];
        return view('layout/v_wrapper', $data);
    }
}
