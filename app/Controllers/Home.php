<?php

namespace App\Controllers;

\Config\Database::connect();

use App\Models\TugasModel;
use App\Models\HomeModel;

use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    protected $helper = [];
    public function __construct()
    {
        helper(['form']);
        helper(['Tanggal']);
        $this->T_mod = new TugasModel();
        $this->H_mod = new HomeModel();
        $this->cek_login();
    }

    public function index()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }
        $db = db_connect();
        $builder = $this->user_aktif();
        $sekarang = Date('Y-m-d');
        $bulan_ini = Date('m');
        $user_aktif = $builder['id_peserta'];

        $kinerjahari = $db->table('tbl_kinerja')->getWhere(['id_user_kin' => $user_aktif, 'tgl_kin' => $sekarang])->getResultArray();
        $bulan_ini = $db->table('tbl_kinerja')->getWhere(['id_user_kin' => $user_aktif, 'MONTH(tgl_kin)' => $bulan_ini])->getResultArray();
        $tugas = $this->T_mod->get_tugas($user_aktif)->get()->getResultArray();
        $chart = $this->H_mod->chart_dept();


        $data = [
            'judul' => 'Dashboard',
            'menu' => 'Home',
            'user' => $builder,
            'tugas' => $tugas,
            'chart' => $chart,
            'kinerjahari' => $kinerjahari,
            'bulan_ini' => $bulan_ini,

        ];
        return view('home/index', $data);
    }

    public function notif()
    {
        $notif = $this->ambil_notif();

        echo json_encode($notif);
    }

    public function register()

    {

        $data = [

            'judul' => 'Daftar LPK',

        ];



        return view('auth/register', $data);
    }



    //--------------------------------------------------------------------



}
