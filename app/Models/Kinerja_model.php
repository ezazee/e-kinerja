<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;


class Kinerja_model extends Model
{

    public function tambah_kin($data)
    {
        $query = $this->db->table('tbl_kinerja')->insert($data);
        return $query;
    }
    public function tambah_kin2($data2)
    {
        $query = $this->db->table('tbl_kinerja')->insert($data2);
        return $query;
    }
    public function updateKin($data, $id)
    {
        $query = $this->db->table('tbl_kinerja')->update($data, array('id_kinerja' => $id));
        return $query;
    }

    public function deleteKin($id)
    {
        $query = $this->db->table('tbl_kinerja')->delete(array('id_kinerja' => $id));
        return $query;
    }
}
