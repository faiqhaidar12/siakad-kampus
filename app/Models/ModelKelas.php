<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    public function alldata()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas.id_dosen', 'left')
            ->orderBy('tbl_kelas.id_prodi', 'ASC')
            ->get()->getResultArray();
    }

    public function detail($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas.id_dosen', 'left')
            ->where('id_kelas', $id_kelas)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_kelas')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->delete($data);
    }

    //menampilkan data mahasiswa berdasarkan kelas
    public function mahasiswa($id_kelas)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_mhs.id_prodi', 'left')
            ->orderBy('id_mhs', 'ASC')
            ->where('id_kelas', $id_kelas)
            ->get()->getResultArray();
    }

    //menampilkan mahasiswa blm punya kelas
    public function mhs_tdk_ada_kelas()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_mhs.id_prodi', 'left')
            ->orderBy('id_mhs', 'ASC')
            ->where('id_kelas', null)
            ->get()->getResultArray();
    }

    public function jml_mhs($id_kelas)
    {
        return $this->db->table('tbl_mhs')
            ->where('id_kelas', $id_kelas)
            ->countAllResults();
    }

    public function update_mhs($data)
    {
        $this->db->table('tbl_mhs')
            ->where('id_mhs', $data['id_mhs'])
            ->update($data);
    }
}
