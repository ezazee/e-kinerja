<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Datatables;
use App\Models\MasterModel;

class Master extends BaseController
{

    protected $helper = [];
    public function __construct()
    {
        helper(['form']);
        helper(['Tanggal']);
        $this->Master_mod = new MasterModel();
        $this->cek_login();
    }

    public function index()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }

        $builder = $this->user_aktif();
        $dept = $this->Master_mod->getDept();
        $user_aktif = $builder['id_peserta'];

        $data = [
            'judul' => 'Departemen',
            'menu' => 'Master',
            'submenu' => 'Departemen',
            'user' => $builder,
            'dept' => $dept,
        ];
        return view('master/index', $data);
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

    function tambahDept()
    {
        $nama_dept = $this->request->getPost('nama_dept');

        $data = [
            'nama_dept'     => $nama_dept,
            'id_created'     => $this->request->getPost('id_login'),
            'date_created'     => date("Y-m-d\TH:i:s"),
            'date_updated'     => date("Y-m-d\TH:i:s"),
        ];



        $this->Master_mod->tambahDept($data);
        return redirect()->to(base_url('/master'))->with('success', 'Data Departemen berhasil di tambah !');
    }

    public function updateDept()
    {
        $nama_dept = $this->request->getPost('nama_dept2');
        $id_dept = $this->request->getPost('id_dept');

        $data = [
            'nama_dept'     => $nama_dept,
            'id_created'     => $this->request->getPost('id_login'),
            'date_updated'     => date("Y-m-d\TH:i:s"),
        ];

        $this->Master_mod->updateDept($data, $id_dept);
        return redirect()->to(base_url('/master'))->with('success', 'Data Departemen berhasil di update !');
    }

    public function deleteDept()
    {
        $id = $this->request->getPost('id_dept2');

        $this->Master_mod->deleteDept($id);
        return redirect()->to(base_url('/master'))->with('success', 'Data Departemen berhasil di hapus !');
    }

    // <--------------------------------JABATAN----------------------------------->

    public function jabatan()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }

        $builder = $this->user_aktif();
        $jabatan = $this->Master_mod->getJab();
        $user_aktif = $builder['id_peserta'];

        $data = [
            'judul' => 'Jabatan',
            'menu' => 'Master',
            'submenu' => 'Jabatan',
            'user' => $builder,
            'jabatan' => $jabatan,
        ];
        return view('master/v_jabatan', $data);
    }

    function tambahJab()
    {
        $nama_jabatan = $this->request->getPost('nama_jabatan');

        $data = [
            'nama_jabatan'     => $nama_jabatan,
            'id_created'     => $this->request->getPost('id_login'),
            'date_created'     => date("Y-m-d\TH:i:s"),
            'date_updated'     => date("Y-m-d\TH:i:s"),
        ];

        $this->Master_mod->tambahJab($data);
        return redirect()->to(base_url('/master/jabatan'))->with('success', 'Data Jabatan berhasil di tambah !');
    }

    public function updateJab()
    {
        $nama_jabatan = $this->request->getPost('nama_jabatan2');
        $id_jabatan = $this->request->getPost('id_jabatan');

        $data = [
            'nama_jabatan'     => $nama_jabatan,
            'id_created'     => $this->request->getPost('id_login'),
            'date_updated'     => date("Y-m-d\TH:i:s"),
        ];

        $this->Master_mod->updateJab($data, $id_jabatan);
        return redirect()->to(base_url('/master/jabatan'))->with('success', 'Data Jabatan berhasil di update !');
    }

    public function deleteJab()
    {
        $id = $this->request->getPost('id_jabatan2');

        $this->Master_mod->deleteJab($id);
        return redirect()->to(base_url('/master/jabatan'))->with('success', 'Data Jabatan berhasil di hapus !');
    }

    // <--------------------------------KARYAWAN----------------------------------->

    public function karyawan()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }

        $builder = $this->user_aktif();

        $karyawan = $this->Master_mod->get_karyawan()->get()->getResultArray();

        $data = [
            'judul' => 'Member GKD',
            'menu' => 'Master',
            'submenu' => 'Member GKD',
            'jabatan' =>  $this->Master_mod->get_jabatan(),
            'dept' =>  $this->Master_mod->get_dept(),
            'akses' =>  $this->Master_mod->get_akses(),
            'user' => $builder,
            'karyawan' => $karyawan,
            'validation' => \Config\Services::validation(),
        ];
        return view('master/v_karyawan', $data);
    }

    public function tambah_karyawan()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }

        $builder = $this->user_aktif();
        $karyawan = $this->Master_mod->get_karyawan()->get()->getResultArray();

        $data = [
            'judul' => 'Form Tambah Member GKD',
            'menu' => 'Master',
            'submenu' => 'Form Tambah Member GKD',
            'jabatan' =>  $this->Master_mod->get_jabatan(),
            'dept' =>  $this->Master_mod->get_dept(),
            'akses' =>  $this->Master_mod->get_akses(),
            'user' => $builder,

            'karyawan' => $karyawan,
            'validation' => \Config\Services::validation(),
        ];
        return view('master/tambah_kar', $data);
    }

    function tambahKar()
    {
        if (!$this->validate([

            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Kolom [{field}] / harus di isi.',
                    'valid_email' => 'Email tidak valid '
                ]
            ],
            'nama_pes' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom [{field}] / harus di isi.'
                ]
            ],
            'hp_pes' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom [{field}] / harus di isi.'
                ]
            ],
        ])) {

            // return redirect()->to('/profil')->withInput()->with('validation', $validation);
            return redirect()->to('/master/karyawan')->withInput();
        }

        $id = $this->request->getPost('id_buat');
        $password_hash = password_hash('qwerty123', PASSWORD_DEFAULT);
        $tgl_masuk = $this->request->getPost('tgl_masuk');

        $data = [
            'no_bpjstku'              => intval($this->request->getPost('no_bpjstku')),
            'no_ktp'              => intval($this->request->getPost('no_ktp')),
            'no_rek'              => intval($this->request->getPost('no_rek')),
            'foto_peserta'         => 'default.jpg',
            'role_id'              => intval($this->request->getPost('akses')),
            'is_active'              => 1,
            'date_created'              => date("Y-m-d\TH:i:s"),
            'date_updated'              => date("Y-m-d\TH:i:s"),
            'password'              => $password_hash,
            'nama_peserta'              => $this->request->getPost('nama_pes'),
            'email_peserta'             => $this->request->getPost('email'),
            'alamat_peserta'              => $this->request->getPost('alamat_pes'),
            'no_hp_peserta'          => $this->request->getPost('hp_pes'),
            'id_jabatan_k'          => intval($this->request->getPost('jabatan')),
            'id_dept_k'          => intval($this->request->getPost('dept')),
            'id_buat'          => intval($id),
            'nip'          => intval($this->request->getPost('no_ktp')),
            'no_kontrak'          => $this->request->getPost('no_kontrak'),
            'tgl_masuk'          => date('Y-m-d', strtotime(str_replace('/', '-', $tgl_masuk))),
        ];

        $this->Master_mod->tambahKar($data);
        return redirect()->to(base_url('/master/karyawan'))->with('success', 'Data Member berhasil ditambah');
    }

    public function update_karyawan($id)
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }

        $builder = $this->user_aktif();
        $karyawan = $this->Master_mod->get_edit_karyawan($id)->get()->getRowArray();

        $data = [
            'judul' => 'Form Update Member GKD',
            'menu' => 'Master',
            'submenu' => 'Form Update Member GKD',
            'jabatan' =>  $this->Master_mod->get_jabatan(),
            'dept' =>  $this->Master_mod->get_dept(),
            'akses' =>  $this->Master_mod->get_akses(),
            'user' => $builder,
            'karyawan' => $karyawan,
            'id' => $id,
            'validation' => \Config\Services::validation(),
        ];
        return view('master/edit_kar', $data);
    }

    function updateKar()
    {
        if (!$this->validate([

            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Kolom [{field}] / harus di isi.',
                    'valid_email' => 'Email tidak valid '
                ]
            ],
            'nama_pes' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom [{field}] / harus di isi.'
                ]
            ],
            'hp_pes' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom [{field}] / harus di isi.'
                ]
            ],
        ])) {

            // return redirect()->to('/profil')->withInput()->with('validation', $validation);
            return redirect()->to('/master/karyawan')->withInput();
        }

        $id = $this->request->getPost('id_buat');
        $id_peserta = $this->request->getPost('id_peserta');
        $tgl_masuk = $this->request->getPost('tgl_masuk');

        $data = [
            'no_bpjstku'              => intval($this->request->getPost('no_bpjstku')),
            'no_ktp'              => intval($this->request->getPost('no_ktp')),
            'no_rek'              => intval($this->request->getPost('no_rek')),
            'role_id'              => intval($this->request->getPost('akses')),
            'date_updated'              => date("Y-m-d\TH:i:s"),
            'nama_peserta'              => $this->request->getPost('nama_pes'),
            'email_peserta'             => $this->request->getPost('email'),
            'alamat_peserta'              => $this->request->getPost('alamat_pes'),
            'no_hp_peserta'          => $this->request->getPost('hp_pes'),
            'id_jabatan_k'          => intval($this->request->getPost('jabatan')),
            'id_dept_k'          => intval($this->request->getPost('dept')),
            'id_buat'          => intval($id),
            'nip'          => intval($this->request->getPost('no_ktp')),
            'no_kontrak'          => $this->request->getPost('no_kontrak'),
            'tgl_masuk'          => date('Y-m-d', strtotime(str_replace('/', '-', $tgl_masuk))),
        ];

        $this->Master_mod->updateKar($data, $id_peserta);
        return redirect()->to(base_url('/master/karyawan'))->with('success', 'Data Member berhasil di update');
    }

    public function deleteKar()
    {
        $id = $this->request->getPost('id_peserta2');

        $this->Master_mod->deleteKar($id);
        return redirect()->to(base_url('/master/karyawan'))->with('success', 'Data karyawan berhasil di hapus !');
    }

    public function detail_karyawan($id)
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }

        $builder = $this->user_aktif();
        $karyawan = $this->Master_mod->get_edit_karyawan($id)->get()->getRowArray();

        $data = [
            'judul' => 'Detail Member GKD',
            'menu' => 'Master',
            'submenu' => 'Detail Member GKD',
            'user' => $builder,
            'karyawan' => $karyawan,
            'id' => $id,
        ];
        return view('master/detail_kar', $data);
    }
}
