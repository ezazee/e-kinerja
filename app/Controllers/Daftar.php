<?php

namespace App\Controllers;

class Daftar extends BaseController
{
    protected $helper = [];

    public function __construct()
    {
        helper(['form']);
        helper(['Tanggal']);
        $this->cek_login();
    }

    public function index()

    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }

        $db = db_connect();
        $builder = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();
        $provinsi = $db->table('wilayah_provinsi')->get()->getResultArray();
        $data = [
            'judul' => 'Pendaftaran',
            'menu' => 'Pendaftaran',
            'user' => $builder,
            'provinsi' => $provinsi,
        ];
        return view('daftar/daftar', $data);
    }
}
