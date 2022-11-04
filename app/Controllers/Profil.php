<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Profil extends BaseController
{
	protected $helper = [];

	public function __construct()
	{
		helper(['form']);
		helper(['Tanggal']);
		$this->ProfilModel = new ProfilModel();
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
			'judul' => 'Profil',
			'menu' => 'Profil',
			'user' => $builder,
			'validation' => \Config\Services::validation(),
		];

		return view('profil/profil', $data);
	}

	public function update_profile()
	{

		$db = db_connect();
		$data['user'] = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();

		if (!$this->validate([

			'foto' => [
				'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1024]|is_image[foto]',
				'errors' => [
					'is_image' => 'yang anda pilih bukan gambar.',
					'max_size' => 'Ukuran gambar terlalu besar.',
					'mime_in' => 'Ekstensi file harus .jpg, .jpeg, .png.'
				]
			],
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
			return redirect()->to('/profil')->withInput();
		}

		if ($this->request->getFile('foto') != '') {
			if (!empty($data['user']['foto_peserta'])) {
				$old_image = $data['user']['foto_peserta'];
				if ($old_image != 'default.jpg') {
					unlink('assets/images/profile/' . $old_image);
				}
			}
			$avatar = $this->request->getFile('foto');
			$avatar->move('assets/images/profile/');

			$id = $this->request->getPost('id_peserta');

			$data = [
				'foto_peserta' => $avatar->getName(),
				'email_peserta'             => $this->request->getPost('email'),
				'nama_peserta'              => $this->request->getPost('nama_pes'),
				'alamat_peserta'              => $this->request->getPost('alamat_pes'),
				'no_hp_peserta'          => $this->request->getPost('hp_pes'),
			];


			$this->ProfilModel->update_profile($data, $id);
			return redirect()->to(base_url('profil'))->with('success', 'Profile berhasil di update');
		} else {


			$id = $this->request->getPost('id_peserta');

			$data = [

				'email_peserta'             => $this->request->getPost('email'),
				'nama_peserta'              => $this->request->getPost('nama_pes'),
				'alamat_peserta'              => $this->request->getPost('alamat_pes'),
				'no_hp_peserta'          => $this->request->getPost('hp_pes'),
			];

			$this->ProfilModel->update_profile($data, $id);
			return redirect()->to(base_url('profil'))->with('success', 'Profile berhasil di update');
		}
	}

	public function ganti_password()

	{
		$db = db_connect();
		$user = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();
		$data = [
			'judul' => 'Ganti Password',
			'menu' => 'Profil',
			'submenu' => 'Ganti Password',
			'user' => $user,
			'validation' => \Config\Services::validation(),
		];

		echo view('profil/ganti_pw', $data);
	}

	public function update_password()
	{

		if (!$this->validate([

			'current_password' => [
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'Kolom [{field}] / Password sekarang harus di isi.'
				]
			],
			'new_password1' => [
				'rules' => 'required|trim|min_length[3]|matches[new_password2]',
				'errors' => [
					'required' => 'Kolom [{field}] / Password sekarang harus di isi.',
					'min_length' => 'Kolom [{field}] / Password Baru harus lebih dari 3 karakter.',
					'matches' => 'Kolom [{field}] / Konfimasi Password harus sama .',
				]
			],
			'new_password2' => [
				'rules' => 'required|trim|min_length[3]|matches[new_password1]',
				'errors' => [
					'required' => 'Kolom [{field}] / Password sekarang harus di isi.',
					'min_length' => 'Kolom [{field}] / Password Baru harus lebih dari 3 karakter.',
					'matches' => 'Kolom [{field}] / Konfimasi Password harus sama .',
				]
			],


		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/profil/ganti_password')->withInput()->with('validation', $validation);
		}

		$db = db_connect();
		$user = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();
		$current_password = $this->request->getPost('current_password');
		$new_password = $this->request->getPost('new_password1');
		$pass = $user['password'];

		if (!password_verify($current_password, $user['password'])) {
			session()->setFlashdata('gagal', 'Password sekarang salah !');
			return redirect()->to('ganti_password')->withInput();
		} else {
			if ($current_password == $new_password) {
				session()->setFlashdata('gagal', 'Password baru tidak boleh sama dengan password sebelumnya!');
				return redirect()->to('ganti_password')->withInput();
			} else {
				// password sudah ok
				$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
				$db = db_connect();
				$builder = $db->table('tbl_peserta');
				$builder->set('password', $password_hash);
				$builder->where('email_peserta', session()->get('email'));
				$builder->update();

				session()->setFlashdata('success', 'Password berhasil diganti !');

				return redirect()->to('/profil');
			}
		}
	}
}
