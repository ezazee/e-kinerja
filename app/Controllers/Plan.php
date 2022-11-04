<?php

namespace App\Controllers;

class Plan extends BaseController
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

        $data = [
            'judul' => 'Rencana Kerja',
            'menu' => 'Rencana Kerja',
            'submenu' => 'Rencana Kerja',
            'user' => $builder,

        ];
        return view('plan/index', $data);
    }
}
