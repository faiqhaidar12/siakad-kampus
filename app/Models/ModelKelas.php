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
}
