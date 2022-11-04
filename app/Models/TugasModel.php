<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;


class TugasModel extends Model
{

    public function get_tugas($user_aktif)
    {
        $query = $this->db->table('tbl_tugas');
        $query->select('*');
        $query->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_tugas.id_pembuat');
        $query->where(['id_user_tugas' => $user_aktif]);

        return $query;
    }

    public function get_penugas($id_pembuat)
    {
        $query = $this->db->table('tbl_tugas a');
        $query->select('a.*, b.nama_peserta as nama_pembuat, c.nama_peserta, d.file_tugas');
        $query->join('tbl_peserta b', 'b.id_peserta = a.id_pembuat');
        $query->join('tbl_peserta c', 'c.id_peserta = a.id_user_tugas');
        $query->join('tbl_laporan_tugas d', 'd.id_penugasan = a.id_tugas', 'left');
        $query->orderBy('a.tgl_tugas', 'desc');
        $query->where(['a.id_pembuat' => $id_pembuat]);

        return $query;
    }

    public function get_penerima_tugas($id_penerima_tugas)
    {
        $query = $this->db->table('tbl_tugas a');
        $query->select('a.*, b.nama_peserta as nama_pembuat, c.nama_peserta, d.file_tugas');
        $query->join('tbl_peserta b', 'b.id_peserta = a.id_pembuat');
        $query->join('tbl_peserta c', 'c.id_peserta = a.id_user_tugas');
        $query->join('tbl_laporan_tugas d', 'd.id_penugasan = a.id_tugas', 'left');
        $query->orderBy('a.tgl_tugas', 'desc');
        $query->where(['a.id_user_tugas' => $id_penerima_tugas]);

        return $query;
    }

    public function get_semua_tugas()
    {
        $query = $this->db->table('tbl_tugas a');
        $query->select('a.*, b.nama_peserta as nama_pembuat, c.nama_peserta, d.file_tugas');
        $query->join('tbl_peserta b', 'b.id_peserta = a.id_pembuat');
        $query->join('tbl_peserta c', 'c.id_peserta = a.id_user_tugas');
        $query->join('tbl_laporan_tugas d', 'd.id_penugasan = a.id_tugas', 'left');
        $query->orderBy('a.tgl_tugas', 'desc');


        return $query;
    }

    public function detail_tugas($id_tugas)
    {
        $query = $this->db->table('tbl_tugas a');
        $query->select('a.*, b.nama_peserta as nama_pembuat, c.nama_peserta');
        $query->join('tbl_peserta b', 'b.id_peserta = a.id_pembuat');
        $query->join('tbl_peserta c', 'c.id_peserta = a.id_user_tugas');
        $query->where(['a.id_tugas' => $id_tugas]);

        return $query;
    }

    public function detail_tugas_kinerja($id_tugas)
    {
        $query = $this->db->table('tbl_tugas a');
        $query->select('a.*, d.tgl_kin, d.jam_mulai, d.jam_selesai, d.waktu_kin, d.pekerjaan, d.ket_kin, d.link_file, d.file_tugas');
        $query->join('tbl_laporan_tugas d', 'd.id_penugasan = a.id_tugas');
        $query->where(['a.id_tugas' => $id_tugas]);

        return $query;
    }

    public function tambah_tugas($data)
    {
        $query = $this->db->table('tbl_tugas')->insert($data);
        return $query;
    }
    public function update_status($data2, $id_tugas)
    {
        $query = $this->db->table('tbl_tugas')->update($data2, array('id_tugas' => $id_tugas));
        return $query;
    }

    public function deleteKin($id)
    {
        $query = $this->db->table('tbl_kinerja')->delete(array('id_kinerja' => $id));
        return $query;
    }

    public function tambah_laporan_tugas($data)
    {
        $query = $this->db->table('tbl_laporan_tugas')->insert($data);
        return $query;
    }

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
        $query->where('role_id NOT IN (1,2,3,4)');
        $query->where('a.id_dept_k', $dept);

        return $query;
    }
}
