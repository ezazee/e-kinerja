<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    public function get_karyawan_sadmin($dept)
    {
        $query = $this->db->table('tbl_peserta a');
        $query->select('a.*, d.nama_jabatan');
        $query->join('tbl_jabatan d', 'd.id_jabatan = a.id_jabatan_k', 'left');
        $query->orderBy('nama_peserta', 'asc');
        $query->where('id_peserta NOT IN (1)');
        $query->where('a.id_dept_k', $dept);

        return $query;
    }
    public function get_karyawan_direksi($dept)
    {
        $query = $this->db->table('tbl_peserta a');
        $query->select('a.*, d.nama_jabatan');
        $query->join('tbl_jabatan d', 'd.id_jabatan = a.id_jabatan_k', 'left');
        $query->orderBy('nama_peserta', 'asc');
        $query->where('id_peserta NOT IN (1,2,3,4)');
        $query->where('a.id_dept_k', $dept);

        return $query;
    }
    public function get_karyawan_pimpinan($dept)
    {
        $query = $this->db->table('tbl_peserta a');
        $query->select('a.*, d.nama_jabatan');
        $query->join('tbl_jabatan d', 'd.id_jabatan = a.id_jabatan_k', 'left');
        $query->orderBy('nama_peserta', 'asc');
        $query->where('role_id NOT IN (1,2,3)');
        $query->where('a.id_dept_k', $dept);

        return $query;
    }
}
