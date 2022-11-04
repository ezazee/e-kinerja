<?php

namespace App\Controllers;

use App\Models\Auth_model;

class Auth extends BaseController
{
    protected $helper = [];

    public function __construct()
    {
        helper(['form']);
        $this->cek_login();
        $this->Auth_model = new Auth_model();
    }

    public function index()
    {
        if ($this->cek_login() == TRUE) {

            return redirect()->to(base_url('home'));
        }
        $data = [
            'judul' => 'Login E-kinerja GKD',
        ];

        return view('auth/index', $data);
    }

    public function login()
    {
        if ($this->cek_login() == TRUE) {
            return redirect()->to('/dashboard');
        }
        echo view('auth/login');
    }

    public function check_login()

    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->Auth_model->check_login($email);
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email_peserta'],
                        'id' => $user['id_peserta'],

                    ];
                    session()->set($data);

                    if ($user['role_id'] == 1) {
                        session()->setFlashdata('success', 'Berhasil login');
                        return redirect()->to(base_url('profil'));
                    } else {
                        return redirect()->to(base_url('home'));
                    }
                } else {
                    session()->setFlashdata('gagal', 'password yang Anda masukan salah !');
                    return redirect()->to(base_url('auth'))->withInput();
                }
            } else {
                session()->setFlashdata('gagal', 'email email belum aktif !');
                return redirect()->to(base_url('auth'))->withInput();
            }
        } else {
            session()->setFlashdata('gagal', 'email tidak terdaftar !');
            return redirect()->to(base_url('auth'))->withInput();
        }
    }

    public function register()
    {
        $data = [
            'judul' => 'Daftar LPK',
        ];
        if ($this->cek_login() == TRUE) {
            return redirect()->to('/dashboard');
        }
        return view('auth/register', $data);
    }

    public function proses_register()
    {
        $validation =  \Config\Services::validation();

        $avatar = $this->request->getFile('foto');
        $avatar->move(ROOTPATH . 'public/assets/images/profile');
        $this->validate([
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,4096]'
        ]);

        $data = [
            'foto_peserta' => $avatar->getName(),
            'email_peserta'             => $this->request->getPost('email'),
            'nama_peserta'              => $this->request->getPost('nama_pes'),
            'alamat_peserta'              => $this->request->getPost('alamat_pes'),
            'no_hp_peserta'          => $this->request->getPost('hp_pes'),


        ];

        $this->Auth_model->register($data);
        $data2 = [

            'email'     => $this->request->getPost('email'),
            'date_created'     => date("Y-m-d\TH:i:s"),
            'role_id'     => 1,
            'is_active'     => 1,
            'password'          => password_hash($this->request->getPost('password1'), PASSWORD_DEFAULT),

        ];
        $this->Auth_model->register_user($data2);
        return redirect()->to(base_url('auth'))->with('success', 'Berhasil daftar, silahkan login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
