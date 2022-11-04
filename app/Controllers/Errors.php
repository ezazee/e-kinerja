<?php

namespace App\Controllers;

\Config\Database::connect();

use App\Models\TugasModel;

use CodeIgniter\I18n\Time;

class Errors extends BaseController
{
    protected $helper = [];
    public function __construct()
    {
        helper(['Tanggal']);
        $this->T_mod = new TugasModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Sistem Maintanance',
        ];
        return view('error/maintenis', $data);
    }
}
