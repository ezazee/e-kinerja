<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    public function update_profile($data, $id)
    {
        return $this->db->table('tbl_peserta')->update($data, array('id_peserta' => $id));
    }
}
