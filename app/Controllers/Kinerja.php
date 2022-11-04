<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Datatables;
use App\Models\Kinerja_model;

class Kinerja extends BaseController
{

    protected $helper = [];

    public function __construct()

    {

        helper(['form']);

        helper(['Tanggal']);
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

        $user_aktif = $builder['id_peserta'];
        $kinerja = $db->table('tbl_kinerja')->orderBy('tgl_kin', 'desc')->getWhere(['id_user_kin' => $user_aktif])->getResultArray();

        $data = [
            'judul' => 'Kinerja',
            'menu' => 'Kinerja',

            'kinerja' => $kinerja,
            'user' => $builder,
        ];
        return view('kinerja/v_kinerja', $data);
    }

    public function validasi()
    {
        $json = array();
        if (!$this->validate([

            'waktu_kin' => [
                'rules' => 'required|trim|max_length[4]',
                'errors' => [
                    'required' => 'Kolom [{field}] / harus di isi.',
                    'max_length' => 'Kolom [{field}] / Maksimal 4 karakter.',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/profil/ganti_password')->withInput()->with('validation', $validation);
        }
    }

    public function json()
    {
        $datatables = new Datatables;
        $datatables->table('tbl_kinerja')->select('id_kinerja', 'tgl_kin', 'jam_mulai', 'jam_selesai', 'pekerjaan', 'ket_kin', 'id_user_kin', 'dibuat_kin', 'update_kin');
        // Memproduksi query SELECT name, address FROM users;
        echo $datatables->draw();
        // Automatically return json
    }

    function tambah_kin()
    {
        $pekerjaan = $this->request->getPost('pekerjaan');
        $link_file = $this->request->getPost('link_file');
        $ket_kin = $this->request->getPost('ket_kin');
        $tgl_kin = $this->request->getPost('tgl_kin');


        $data = [
            'pekerjaan'     => $pekerjaan,
            'link_file'     => $link_file,
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

        $this->K_mod->tambah_kin($data);
        return redirect()->to(base_url('kinerja'))->with('success', 'Data Pekerjaan berhasil di tambah !');
    }

    public function update()
    {
        $id = $this->request->getPost('id_kinerja');
        $pekerjaan = $this->request->getPost('pekerjaan2');
        $link_file = $this->request->getPost('link_file2');
        $ket_kin = $this->request->getPost('ket_kin2');
        $tgl_kin = $this->request->getPost('tgl_kin2');


        $data = [
            'pekerjaan'     => $pekerjaan,
            'link_file'     => $link_file,
            'ket_kin'     => $ket_kin,
            'jam_mulai'     => $this->request->getPost('jam_mulai2'),
            'jam_selesai'     => $this->request->getPost('jam_selesai2'),
            'tgl_kin'     => date('Y-m-d', strtotime(str_replace('/', '-', $tgl_kin))),
            'waktu_kin'     => $this->request->getPost('waktu_kin2'),
            'id_user_kin'     => $this->request->getPost('id_user_kin2'),
            'nama_user_kin'     => $this->request->getPost('nama_user_kin2'),
            'update_kin'     => date("Y-m-d\TH:i:s"),
        ];

        $this->K_mod->updateKin($data, $id);
        return redirect()->to(base_url('kinerja'))->with('success', 'Data Pekerjaan berhasil di edit !');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_kinerja2');
        $this->K_mod->deleteKin($id);
        return redirect()->to(base_url('kinerja'))->with('success', 'Data Pekerjaan berhasil di edit !');
    }
}
