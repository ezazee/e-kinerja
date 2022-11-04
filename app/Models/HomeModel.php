<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    public function chart_dept()
    {
        $query = $this->db->query('SELECT b.nama_dept AS departemen, COUNT(*) AS total_dept
        FROM tbl_peserta a
        JOIN tbl_dept b ON b.id_dept=a.id_dept_k 
        GROUP BY b.nama_dept');



        // $query = $this->db->table('tbl_peserta a');
        // $query->select('nama_dept AS departemen, COUNT(*) AS total_dept');
        // $query->join('tbl_dept b', 'b.id_dept = a.id_dept_k');
        // $query->groupBy('b.nama_dept');
        foreach ($query->getResult() as $data) {
            $hasil[] = $data;
        }
        return $hasil;
    }
}
