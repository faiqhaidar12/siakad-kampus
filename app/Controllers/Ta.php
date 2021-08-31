<?php

namespace App\Controllers;

use App\Models\ModelTa;

class Ta extends BaseController
{

	public function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
	}

	public function index()
	{
		$data = [
			'title'	=> 'Tahun Akademik',
			'ta' => $this->ModelTa->alldata(),
			'isi' 	=> 'admin/v_ta'
		];
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = [
			'ta' =>  $this->request->getPost('ta'),
			'semester' =>  $this->request->getPost('semester'),
		];
		$this->ModelTa->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		return redirect()->to(base_url('ta'));
	}

	public function edit($id_ta)
	{
		$data = [
			'id_ta' =>  $id_ta,
			'ta' =>  $this->request->getPost('ta'),
			'semester' =>  $this->request->getPost('semester'),
		];
		$this->ModelTa->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Edit !!!');
		return redirect()->to(base_url('ta'));
	}

	public function delete($id_ta)
	{
		$data = [
			'id_ta' =>  $id_ta,
		];
		$this->ModelTa->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Delete !!!');
		return redirect()->to(base_url('ta'));
	}
}
