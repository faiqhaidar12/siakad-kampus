<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTa extends Model
{
    public function alldata()
    {
        return $this->db->table('tbl_ta')
            ->orderBy('id_ta', 'ASC')
            ->get()->getResult();
    }

    public function add($data)
    {
        $this->db->table('tbl_ta')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_ta')
            ->where('id_ta', $data['id_ta'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_ta')
            ->where('id_ta', $data['id_ta'])
            ->delete($data);
    }
}
