<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;


class Meeting_model extends Model
{

    public function tambah_jadwal($data)
    {
        $query = $this->db->table('tbl_jadwal_meeting')->insert($data);
        return $query;
    }

    public function lihat_notulen($id)
    {
        $query = $this->db->table('tbl_notulensi a');
        $query->select('a.*, b.nama_peserta, c.*');
        $query->join('tbl_peserta b', 'b.id_peserta = a.id_created');
        $query->join('tbl_jadwal_meeting c', 'c.id_meeting = a.id_meeting_not');
        $query->where(['a.id_meeting_not' => $id]);

        return $query;
    }

    public function tambah_notulensi($data)
    {
        $query = $this->db->table('tbl_notulensi')->insert($data);
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
