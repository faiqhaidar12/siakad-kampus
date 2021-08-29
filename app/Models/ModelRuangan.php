<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRuangan extends Model
{
    public function alldata()
    {
        return $this->db->table('tbl_ruangan')
            ->join('tbl_gedung', 'tbl_gedung.id_gedung = tbl_ruangan.id_gedung', 'left')
            ->orderBy('tbl_ruangan.id_gedung', 'ASC')
            ->get()->getResult();
    }

    public function add($data)
    {
        $this->db->table('tbl_ruangan')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_ruangan')
            ->where('id_ruangan', $data['id_ruangan'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_ruangan')
            ->where('id_ruangan', $data['id_ruangan'])
            ->delete($data);
    }
}
