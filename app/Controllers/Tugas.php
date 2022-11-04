<?php

namespace App\Controllers;

use App\Models\TugasModel;
use App\Models\Kinerja_model;

class Tugas extends BaseController
{
    protected $helper = [];

    public function __construct()
    {
        helper(['form']);
        helper(['Tanggal']);
        $this->T_mod = new TugasModel();
        $this->K_mod = new Kinerja_model();
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
        $role_id = $builder['role_id'];
        $id_pembuat = session()->get('id');
        $login_id = $builder['id_peserta'];
        $dept = $builder['id_dept_k'];
        $pimpinan = [4];
        $direksi = [3];
        $admin = [1, 2];

        $tugas = $this->T_mod->get_penugas($id_pembuat)->get()->getResultArray();


        if (in_array($role_id, $admin)) {
            $peserta = $db->table('tbl_peserta a')->select('a.*, d.nama_jabatan')->join('tbl_jabatan d', 'd.id_jabatan = a.id_jabatan_k', 'left')->orderBy('nama_peserta', 'asc')->getWhere('id_peserta NOT IN (1,' . $login_id . ')')->getResultArray();
        } else if (in_array($role_id, $direksi)) {
            $peserta = $this->T_mod->get_karyawan_direksi($dept)->get()->getResultArray();
        } else if (in_array($role_id, $pimpinan)) {
            $peserta = $this->T_mod->get_karyawan_pimpinan($dept)->get()->getResultArray();
        } else {
            $peserta = $builder['id_peserta'];
        }

        $data = [
            'pt' => 'PT. GKD',
            'judul' => 'Penugasan Kerja',
            'menu' => 'Penugasan',
            'submenu' => 'Penugasan Kerja',
            'user' => $builder,

            'peserta' => $peserta,
            'tugas' => $tugas,

        ];
        return view('tugas/index', $data);
    }

    function tambah_tugas()
    {
        $nama_tugas = $this->request->getPost('nama_tugas');
        $ket_tugas = $this->request->getPost('ket_tugas');
        $tgl_tugas = $this->request->getPost('tgl_tugas');

        $data = [
            'nama_tugas'     => $nama_tugas,
            'ket_tugas'     => $ket_tugas,
            'tgl_tugas'     => date('Y-m-d', strtotime(str_replace('/', '-', $tgl_tugas))),
            'id_user_tugas'     => $this->request->getPost('id_user_tugas'),
            'tgl_dibuat'     => date("Y-m-d\TH:i:s"),
            'id_pembuat'     => $this->request->getPost('id_pembuat'),
        ];

        $this->T_mod->tambah_tugas($data);
        return redirect()->to(base_url('tugas'))->with('success', 'Penugasan berhasil dibuat !');;
    }

    public function data_tugas()

    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }

        $db = db_connect();
        $id_penerima_tugas = session()->get('id');

        $penerima_tugas = $this->T_mod->get_penerima_tugas($id_penerima_tugas)->get()->getResultArray();

        $builder = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();

        $data = [
            'pt' => 'PT. GKD',
            'judul' => 'Data Tugas Kerja',
            'menu' => 'Tugas',
            'submenu' => 'Data Tugas Kerja',
            'user' => $builder,
            'penerima_tugas' => $penerima_tugas,

        ];
        return view('tugas/data_tugas', $data);
    }

    public function semua_tugas()

    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }

        $db = db_connect();
        $id_penerima_tugas = session()->get('id');

        $semua_tugas = $this->T_mod->get_semua_tugas()->get()->getResultArray();

        $builder = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();

        $data = [
            'pt' => 'PT. GKD',
            'judul' => 'Data Semua Tugas',
            'menu' => 'Tugas',
            'submenu' => 'Data Semua Tugas',
            'user' => $builder,
            'semua_tugas' => $semua_tugas,

        ];
        return view('tugas/semua_tugas', $data);
    }

    public function detail_tugas($id_tugas)
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }
        $db = db_connect();

        $builder = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();
        $user_aktif = $builder['id_peserta'];

        $detail_tugas = $this->T_mod->detail_tugas($id_tugas)->get()->getRowArray();

        $detail_tugas_kinerja = $this->T_mod->detail_tugas_kinerja($id_tugas)->get()->getRowArray();

        $data = [
            'judul' => 'Detail Penugasan',
            'menu' => 'Penugasan',
            'submenu' => 'Detail Penugasan',
            'detail_tugas_kinerja' => $detail_tugas_kinerja,
            'detail_tugas' => $detail_tugas,
            'user' => $builder,
        ];

        return view('tugas/detail_tugas', $data);
    }

    public function lihat_tugas($id_tugas)
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }
        $db = db_connect();

        $builder = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();
        $user_aktif = $builder['id_peserta'];

        $detail_tugas = $this->T_mod->detail_tugas($id_tugas)->get()->getRowArray();

        $detail_tugas_kinerja = $this->T_mod->detail_tugas_kinerja($id_tugas)->get()->getRowArray();

        $data = [
            'judul' => 'Lihat Laporan Tugas',
            'menu' => 'Tugas',
            'submenu' => 'Lihat Laporan Tugas',
            'detail_tugas_kinerja' => $detail_tugas_kinerja,
            'detail_tugas' => $detail_tugas,
            'user' => $builder,
        ];

        return view('tugas/lihat_tugas_kar', $data);
    }

    public function detail_tugas_kar($id_tugas)
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }
        $db = db_connect();

        $builder = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();
        $user_aktif = $builder['id_peserta'];

        $detail_tugas = $this->T_mod->detail_tugas($id_tugas)->get()->getRowArray();

        $data = [
            'judul' => 'Detail Penugasan',
            'menu' => 'Penugasan',
            'submenu' => 'Detail Penugasan',
            'id_tugas' => $id_tugas,
            'detail_tugas' => $detail_tugas,
            'user' => $builder,
            'validation' => \Config\Services::validation(),
        ];

        return view('tugas/detail_tugas_kar', $data);
    }
    function buat_laporan_tugas()
    {
        if (!$this->validate([

            'file_tugas' => [
                'rules' => 'ext_in[file_tugas,png,jpg,pdf,doc,docx,xls,xlsx,ppt,pptx]|max_size[file_tugas,2048]',
                'errors' => [
                    'ext_in' => 'Ekstensi File harus .png, .jpg, .pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx .',
                    'max_size' => 'Ukuran File terlalu besar, max_size 2048KB/2MB.',

                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom pekerjaan harus di isi.'
                ]
            ],
            'tgl_kin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Tanggal tugas harus di isi.'
                ]
            ],
            'jam_mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Jam Mulai harus di isi.'
                ]
            ],
            'jam_selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Jam Selesai harus di isi.'
                ]
            ],
            'waktu_kin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Waktu Kinerja harus di isi.'
                ]
            ],
            'ket_kin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Keterangan harus di isi.'
                ]
            ],
        ])) {

            $id_tugas = $this->request->getPost('id_tugas');
            // return redirect()->to('/profil')->withInput()->with('validation', $validation);
            return redirect()->to('/tugas/detail_tugas_kar/' . $id_tugas)->withInput();
        }

        if ($this->request->getFile('file_tugas') != '') {
            $file_tugas = $this->request->getFile('file_tugas');


            $nama_file = $file_tugas->getName();
            $id_tugas = $this->request->getPost('id_tugas');
            $id_user_kin = $this->request->getPost('id_user_kin');
            $save_dokumen = $id_tugas . '_' . $id_user_kin . '_' . $nama_file;
            $file_tugas->move('assets/upload/dokumen', $save_dokumen);

            $pekerjaan = $this->request->getPost('pekerjaan');
            $ket_kin = $this->request->getPost('ket_kin');
            $tgl_kin = $this->request->getPost('tgl_kin');
            $link_file = $this->request->getPost('link_file');


            $data = [
                'pekerjaan'     => $pekerjaan,
                'file_tugas'     => $save_dokumen,
                'link_file'     => $link_file,
                'ket_kin'     => $ket_kin,
                'id_penugasan'     => $id_tugas,
                'jam_mulai'     => $this->request->getPost('jam_mulai'),
                'jam_selesai'     => $this->request->getPost('jam_selesai'),
                'tgl_kin'     => date('Y-m-d', strtotime(str_replace('/', '-', $tgl_kin))),
                'waktu_kin'     => $this->request->getPost('waktu_kin'),
                'id_user_kin'     => $id_user_kin,
                'nama_user_kin'     => $this->request->getPost('nama_user_kin'),
                'dibuat_kin'     => date("Y-m-d\TH:i:s"),
                'update_kin'     => date("Y-m-d\TH:i:s"),
            ];
            $this->T_mod->tambah_laporan_tugas($data);

            $data2 = [
                'pekerjaan'     => $pekerjaan,
                'link_file'     => $link_file,
                'id_tugas_kinerja'     => $id_tugas,
                'ket_kin'     => $ket_kin,
                'jam_mulai'     => $this->request->getPost('jam_mulai'),
                'jam_selesai'     => $this->request->getPost('jam_selesai'),
                'tgl_kin'     => date('Y-m-d', strtotime(str_replace('/', '-', $tgl_kin))),
                'waktu_kin'     => $this->request->getPost('waktu_kin'),
                'id_user_kin'     => $this->request->getPost('id_user_kin'),
                'nama_user_kin'     => $this->request->getPost('nama_user_kin'),
                'dibuat_kin'     => date("Y-m-d\TH:i:s"),
                'update_kin'     => date("Y-m-d\TH:i:s"),
            ];

            $this->K_mod->tambah_kin2($data2);

            $db = db_connect();
            $builder = $db->table('tbl_tugas');
            $builder->set('status_tugas', 2);
            $builder->where('id_tugas', $id_tugas);
            $builder->update();

            return redirect()->to(base_url('/tugas/data_tugas'))->with('success', 'Laporan tugas berhasil di kirim !');
        } else {
            $id_tugas = $this->request->getPost('id_tugas');
            $id_user_kin = $this->request->getPost('id_user_kin');
            $pekerjaan = $this->request->getPost('pekerjaan');
            $ket_kin = $this->request->getPost('ket_kin');
            $tgl_kin = $this->request->getPost('tgl_kin');
            $link_file = $this->request->getPost('link_file');


            $data = [
                'pekerjaan'     => $pekerjaan,
                'link_file'     => $link_file,
                'ket_kin'     => $ket_kin,
                'id_penugasan'     => $id_tugas,
                'jam_mulai'     => $this->request->getPost('jam_mulai'),
                'jam_selesai'     => $this->request->getPost('jam_selesai'),
                'tgl_kin'     => date('Y-m-d', strtotime(str_replace('/', '-', $tgl_kin))),
                'waktu_kin'     => $this->request->getPost('waktu_kin'),
                'id_user_kin'     => $id_user_kin,
                'nama_user_kin'     => $this->request->getPost('nama_user_kin'),
                'dibuat_kin'     => date("Y-m-d\TH:i:s"),
                'update_kin'     => date("Y-m-d\TH:i:s"),
            ];
            $this->T_mod->tambah_laporan_tugas($data);

            $data2 = [
                'pekerjaan'     => $pekerjaan,
                'link_file'     => $link_file,
                'id_tugas_kinerja'     => $id_tugas,
                'ket_kin'     => $ket_kin,
                'jam_mulai'     => $this->request->getPost('jam_mulai'),
                'jam_selesai'     => $this->request->getPost('jam_selesai'),
                'tgl_kin'     => date('Y-m-d', strtotime(str_replace('/', '-', $tgl_kin))),
                'waktu_kin'     => $this->request->getPost('waktu_kin'),
                'id_user_kin'     => $this->request->getPost('id_user_kin'),
                'nama_user_kin'     => $this->request->getPost('nama_user_kin'),
                'dibuat_kin'     => date("Y-m-d\TH:i:s"),
                'update_kin'     => date("Y-m-d\TH:i:s"),
            ];

            $this->K_mod->tambah_kin2($data2);

            $db = db_connect();
            $builder = $db->table('tbl_tugas');
            $builder->set('status_tugas', 2);
            $builder->where('id_tugas', $id_tugas);
            $builder->update();

            return redirect()->to(base_url('/tugas/data_tugas'))->with('success', 'Laporan tugas berhasil di kirim !');
        }
    }

    function terima_tugas($id_tugas)
    {
        $db = db_connect();
        $builder = $db->table('tbl_tugas');
        $builder->set('status_tugas', 1);
        $builder->where('id_tugas', $id_tugas);
        $builder->update();

        return redirect()->to(base_url('/tugas/data_tugas'))->with('success', 'status tugas berhasil di update !');
    }

    function tugas_disetujui($id_tugas)
    {
        $db = db_connect();
        $builder = $db->table('tbl_tugas');
        $builder->set('status_tugas', 3);
        $builder->where('id_tugas', $id_tugas);
        $builder->update();

        return redirect()->to(base_url('/tugas'))->with('success', 'status tugas berhasil di setujui !');;
    }
}
