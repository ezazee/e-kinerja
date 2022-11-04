<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Laporan extends BaseController
{
    protected $helper = [];
    public function __construct()
    {
        helper(['form']);
        helper(['Tanggal']);
        $this->L_mod = new LaporanModel();
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

        $role_id = $builder['role_id'];
        $login_id = $builder['id_peserta'];
        $dept = $builder['id_dept_k'];
        $pimpinan = [4];
        $direksi = [3];
        $admin = [1, 2];



        if (in_array($role_id, $admin)) {
            $peserta = $db->table('tbl_peserta a')->select('a.*, d.nama_jabatan')->join('tbl_jabatan d', 'd.id_jabatan = a.id_jabatan_k', 'left')->orderBy('nama_peserta', 'asc')->getWhere('id_peserta NOT IN (1,' . $login_id . ')')->getResultArray();
        } else if (in_array($role_id, $direksi)) {
            $peserta = $this->L_mod->get_karyawan_direksi($dept)->get()->getResultArray();
        } else if (in_array($role_id, $pimpinan)) {
            $peserta = $this->L_mod->get_karyawan_pimpinan($dept)->get()->getResultArray();
        } else {
            $peserta = $builder['id_peserta'];
        }


        $kinerja = $db->table('tbl_kinerja')->get()->getResultArray();

        $data = [
            'judul' => 'Laporan Kinerja Harian',
            'menu' => 'Laporan',
            'submenu' => 'Laporan Harian',
            'user' => $builder,
            'kinerja' => $kinerja,
            'peserta' => $peserta,
        ];

        return view('laporan/index', $data);
    }

    function htmlToPDF()
    {
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml('hello world');
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function filter($id_user_kin, $tgl_kin)
    {
        $db = db_connect();

        $user = $db->table('tbl_peserta')->getWhere(['id_peserta' => $id_user_kin])->getRowArray();
        $tgl = $tgl_kin;
        $id_user_kin = $id_user_kin;

        if ($id_user_kin == 0) {
            $kinerja = $db->table('tbl_kinerja')->getWhere(['tgl_kin' => $tgl_kin])->getResultArray();
        } else {
            $kinerja = $db->table('tbl_kinerja')->getWhere(['id_user_kin' => $id_user_kin, 'tgl_kin' => $tgl_kin])->getResultArray();
        }

        $data = [
            'kinerja' => $kinerja,
            'tgl' => $tgl,
            'id_user_kin' => $id_user_kin,
            'user' => $user,
        ];

        return view('laporan/result_lap', $data);
    }

    function laporan_hari_pdf($id_user_kin, $tgl_kin)
    {
        $db = db_connect();

        $user = $db->table('tbl_peserta')->getWhere(['id_peserta' => $id_user_kin])->getRowArray();
        $tgl = $tgl_kin;
        $id_user_kin = $id_user_kin;

        if ($id_user_kin == 0) {
            $kinerja = $db->table('tbl_kinerja')->getWhere(['tgl_kin' => $tgl_kin])->getResultArray();
        } else {
            $kinerja = $db->table('tbl_kinerja')->getWhere(['id_user_kin' => $id_user_kin, 'tgl_kin' => $tgl_kin])->getResultArray();
        }

        $data = [
            'kinerja' => $kinerja,
            'tgl' => $tgl,
            'id_user_kin' => $id_user_kin,
            'user' => $user,
        ];

        setlocale(LC_NUMERIC, "C");
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->set_base_path("/assets/node_modules/bootstrap/dist/css/");
        $dompdf->loadHtml(view('laporan/harian_pdf', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->filename = "laporan-kerja-harian-GKD.pdf";
        $dompdf->render();
        $dompdf->stream($dompdf->filename . ".pdf", array("Attachment" => false));
        exit(0);
    }

    public function laporan_bulan()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }
        $db = db_connect();
        $builder = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();

        $role_id = $builder['role_id'];
        $dept = $builder['id_dept_k'];
        $pimpinan = [4];
        $direksi = [3];
        $admin = [1, 2];



        if (in_array($role_id, $admin)) {
            $peserta = $db->table('tbl_peserta a')->select('a.*, d.nama_jabatan')->join('tbl_jabatan d', 'd.id_jabatan = a.id_jabatan_k', 'left')->orderBy('nama_peserta', 'asc')->getWhere('id_peserta NOT IN (1)')->getResultArray();
        } else if (in_array($role_id, $direksi)) {
            $peserta = $this->L_mod->get_karyawan_direksi($dept)->get()->getResultArray();
        } else if (in_array($role_id, $pimpinan)) {
            $peserta = $this->L_mod->get_karyawan_pimpinan($dept)->get()->getResultArray();
        } else {
            $peserta = $builder['id_peserta'];
        }

        $kinerja = $db->table('tbl_kinerja')->get()->getResultArray();
        $bulan = [
            [
                'id_bulan' => 1,
                'nama_bulan' => 'Januari',
            ],
            [
                'id_bulan' => 2,
                'nama_bulan' => 'Februari',
            ],
            [
                'id_bulan' => 3,
                'nama_bulan' => 'Maret',
            ],
            [
                'id_bulan' => 4,
                'nama_bulan' => 'April',
            ],
            [
                'id_bulan' => 5,
                'nama_bulan' => 'Mei',
            ],
            [
                'id_bulan' => 6,
                'nama_bulan' => 'Juni',
            ],
            [
                'id_bulan' => 7,
                'nama_bulan' => 'Juli',
            ],
            [
                'id_bulan' => 8,
                'nama_bulan' => 'Agustus',
            ],
            [
                'id_bulan' => 9,
                'nama_bulan' => 'September',
            ],
            [
                'id_bulan' => 10,
                'nama_bulan' => 'Oktober',
            ],
            [
                'id_bulan' => 11,
                'nama_bulan' => 'November',
            ],
            [
                'id_bulan' => 12,
                'nama_bulan' => 'Desember',
            ],
        ];

        $data = [
            'judul' => 'Laporan Kinerja Bulanan',
            'menu' => 'Laporan',
            'submenu' => 'Laporan Bulanan',
            'user' => $builder,
            'kinerja' => $kinerja,
            'bulan' => $bulan,
            'peserta' => $peserta,
        ];

        return view('laporan/laporan_bulan', $data);
    }

    public function filter_bulan($id_user_kin, $bulan)
    {
        $db = db_connect();
        $user = $db->table('tbl_peserta')->getWhere(['id_peserta' => $id_user_kin])->getRowArray();


        $id_user_kin = $id_user_kin;

        if ($id_user_kin == 0) {
            $kinerja = $db->table('tbl_kinerja')->getWhere(['MONTH(tgl_kin)' => $bulan])->getResultArray();
        } else {
            $kinerja = $db->table('tbl_kinerja')->getWhere(['id_user_kin' => $id_user_kin, 'MONTH(tgl_kin)' => $bulan])->getResultArray();
        }

        $data = [
            'kinerja' => $kinerja,
            'bulan' => $bulan,
            'id_user_kin' => $id_user_kin,
            'user' => $user,
        ];

        return view('laporan/result_lap_bulan', $data);
    }

    function laporan_bulan_pdf($id_user_kin, $bulan)
    {

        $db = db_connect();

        if ($id_user_kin == 0) {
            $kinerja = $db->table('tbl_kinerja')->getWhere(['MONTH(tgl_kin)' => $bulan])->getResultArray();
        } else {
            $kinerja = $db->table('tbl_kinerja')->getWhere(['id_user_kin' => $id_user_kin, 'MONTH(tgl_kin)' => $bulan])->getResultArray();
        }

        $data = [
            'kinerja' => $kinerja,
            'bulan' => $bulan,
            'id_user_kin' => $id_user_kin,

        ];
        setlocale(LC_NUMERIC, "C");
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->set_base_path("/assets/node_modules/bootstrap/dist/css/");
        $dompdf->loadHtml(view('laporan/bulanan_pdf', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->filename = "laporan-kerja-bulanan-GKD.pdf";
        $dompdf->render();
        $dompdf->stream($dompdf->filename, array("Attachment" => false));
        exit(0);
    }
}
