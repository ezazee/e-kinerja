<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterModel extends Model

{
    // <--------------------------------JABATAN----------------------------------->
    public function getJab()
    {
        return $this->db->table('tbl_jabatan')->get()->getResultArray();
    }

    public function tambahJab($data)
    {
        $query = $this->db->table('tbl_jabatan')->insert($data);
        return $query;
    }

    public function updateJab($data, $id_jabatan)
    {
        $query = $this->db->table('tbl_jabatan')->update($data, array('id_jabatan' => $id_jabatan));
        return $query;
    }

    public function deleteJab($id)
    {
        $query = $this->db->table('tbl_jabatan')->delete(array('id_jabatan' => $id));
        return $query;
    }

    // <--------------------------------DEPARTEMEN----------------------------------->

    public function getDept()
    {
        return $this->db->table('tbl_dept')->get()->getResultArray();
    }

    public function tambahDept($data)
    {
        $query = $this->db->table('tbl_dept')->insert($data);
        return $query;
    }

    public function updateDept($data, $id_dept)
    {
        $query = $this->db->table('tbl_dept')->update($data, array('id_dept' => $id_dept));
        return $query;
    }

    public function deleteDept($id)
    {
        $query = $this->db->table('tbl_dept')->delete(array('id_dept' => $id));
        return $query;
    }

    // <--------------------------------KARYAWAN----------------------------------->

    public function get_dept()
    {
        return $this->db->table('tbl_dept')->get()->getResultArray();
    }

    public function get_jabatan()
    {
        return $this->db->table('tbl_jabatan')->get()->getResultArray();
    }

    public function get_akses()
    {
        return $this->db->table('tbl_akses')->get()->getResultArray();
    }

    public function get_karyawan()
    {
        $query = $this->db->table('tbl_peserta a');
        $query->select('a.*, b.nama_jabatan, c.nama_dept');
        $query->join('tbl_jabatan b', 'b.id_jabatan = a.id_jabatan_k', 'left');
        $query->join('tbl_dept c', 'c.id_dept = a.id_dept_k', 'left');

        return $query;
    }

    public function get_edit_karyawan($id)
    {
        $query = $this->db->table('tbl_peserta a');
        $query->select('a.*, b.nama_jabatan, c.nama_dept, d.nama_akses');
        $query->join('tbl_jabatan b', 'b.id_jabatan = a.id_jabatan_k', 'left');
        $query->join('tbl_dept c', 'c.id_dept = a.id_dept_k', 'left');
        $query->join('tbl_akses d', 'd.id_akses = a.role_id', 'left');
        $query->where(['a.id_peserta' => $id]);

        return $query;
    }
    public function tambahKar($data)
    {
        $query = $this->db->table('tbl_peserta')->insert($data);
        return $query;
    }

    public function updateKar($data, $id)
    {
        $query = $this->db->table('tbl_peserta')->update($data, array('id_peserta' => $id));
        return $query;
    }

    public function deletekar($id)
    {
        $query = $this->db->table('tbl_peserta')->delete(array('id_peserta' => $id));
        return $query;
    }


    // <--------------------------------KELUARGA----------------------------------->

    public function getKeluarga()
    {
        $builder = $this->db->table('tbl_keluarga');
        $builder->select('*, nama_kar');
        $builder->join('tbl_karyawan', 'tbl_karyawan.id_kar = tbl_keluarga.id_kar');
        return $builder->get()->getResultArray();
    }

    public function getKaryawan()
    {
        return $this->db->table('tbl_karyawan')->get()->getResult();
    }

    public function saveKeluarga($data)
    {
        $query = $this->db->table('tbl_keluarga')->insert($data);
        return $query;
    }

    public function updateKeluarga($data, $id)
    {
        $query = $this->db->table('tbl_keluarga')->update($data, array('id_kel' => $id));
        return $query;
    }

    public function deleteKeluarga($id)
    {
        $query = $this->db->table('tbl_keluarga')->delete(array('id_kel' => $id));
        return $query;
    }
}
