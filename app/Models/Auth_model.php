<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends Model
{
    protected $table = "user";

    public function check_login($email)
    {
        $builder = $this->db->table('tbl_peserta');
        $builder->where(array('email_peserta' => $email));

        return $builder->get()->getRowArray();
    }

    public function register($data)
    {
        return $this->db->table('tbl_peserta')->insert($data);
    }
    public function register_user($data2)
    {
        return $this->db->table('user')->insert($data2);
    }
}
