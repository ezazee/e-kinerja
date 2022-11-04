<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Datatables;
use App\Models\Meeting_model;

class Meeting extends BaseController
{
    protected $helper = [];
    public function __construct()
    {
        helper(['form']);
        helper(['Tanggal']);
        $this->M_mod = new Meeting_model();
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
        $notulen = $db->table('tbl_notulensi')->orderBy('tgl_notulensi', 'desc')->get()->getResultArray();
        $peserta = $db->table('tbl_peserta a')->select('a.*, d.nama_jabatan')->join('tbl_jabatan d', 'd.id_jabatan = a.id_jabatan_k', 'left')->orderBy('nama_peserta', 'asc')->get()->getResultArray();
        $data = [
            'judul' => 'Notulensi',
            'menu' => 'Notulensi',
            'notulen' => $notulen,
            'user' => $builder,
            'peserta' => $peserta,
        ];
        return view('notulen/index', $data);
    }

    public function jadwal()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }
        $db = db_connect();
        $builder = $this->user_aktif();
        $user_aktif = $builder['id_peserta'];
        $meeting = $db->table('tbl_jadwal_meeting a')->orderBy('tgl_meeting', 'desc')->get()->getResultArray();
        $peserta = $db->table('tbl_peserta a')->select('a.*, d.nama_jabatan')->join('tbl_jabatan d', 'd.id_jabatan = a.id_jabatan_k', 'left')->orderBy('nama_peserta', 'asc')->get()->getResultArray();

        $data = [
            'judul' => 'Jadwal Meeting',
            'menu' => 'Meeting',
            'submenu' => 'Jadwal Meeting',
            'meeting' => $meeting,
            'user' => $builder,
            'peserta' => $peserta,
        ];
        return view('meeting/v_jadwal', $data);
    }

    function tambah_jadwal()
    {
        $nama_meeting = $this->request->getPost('nama_meeting');
        $tgl_meeting = $this->request->getPost('tgl_meeting');
        $waktu_mulai = $this->request->getPost('waktu_mulai');
        $waktu_selesai = $this->request->getPost('waktu_selesai');
        $user_ikut = $this->request->getPost('partisipan');
        $partisipan = implode(", ", $user_ikut);

        $data = [
            'nama_meeting'     => $nama_meeting,
            'waktu_selesai'     => $waktu_selesai,
            'waktu_mulai'     => $waktu_mulai,
            'partisipan'     => $partisipan,
            'waktu_mulai'     => $this->request->getPost('waktu_mulai'),
            'waktu_selesai'     => $this->request->getPost('waktu_selesai'),
            'point_meeting'     => $this->request->getPost('point_meeting'),
            'tgl_meeting'     => date('Y-m-d', strtotime(str_replace('/', '-', $tgl_meeting))),
            'pembuat_meeting'     => $this->request->getPost('pembuat_meeting'),
            'nama_pembuat_meeting'     => $this->request->getPost('nama_pembuat_meeting'),
            'date_created'     => date("Y-m-d\TH:i:s"),
        ];

        $this->M_mod->tambah_jadwal($data);
        return redirect()->to(base_url('meeting/jadwal'))->with('success', 'Jadwal Meeting berhasil di tambah !');
    }

    public function tambah_notulensi($id = null)
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }
        $db = db_connect();
        if (!empty($id)) {
            $meeting = $db->table('tbl_jadwal_meeting a')->orderBy('tgl_meeting', 'desc')->getWhere(['id_meeting' => $id])->getRowArray();
        } else {
            $meeting = NULL;
        }

        $builder = $this->user_aktif();

        $db = db_connect();
        $notulen = $db->table('tbl_notulensi')->orderBy('tgl_notulensi', 'desc')->get()->getResultArray();
        $peserta = $db->table('tbl_peserta a')->select('a.*, d.nama_jabatan')->join('tbl_jabatan d', 'd.id_jabatan = a.id_jabatan_k', 'left')->orderBy('nama_peserta', 'asc')->get()->getResultArray();
        $data = [
            'judul' => 'Form Notulensi',
            'menu' => 'Meeting',
            'notulen' => $notulen,
            'submenu' => 'Form Notulensi',
            'user' => $builder,
            'peserta' => $peserta,
            'meeting' => $meeting,
            'validation' => \Config\Services::validation(),
        ];
        return view('notulen/tambah_not', $data);
    }

    function insert_notulen()
    {
        $tgl_notulensi = $this->request->getPost('tgl_notulensi');
        $jam_mulai = $this->request->getPost('jam_mulai');
        $id_meeting = $this->request->getPost('id_meeting');
        $jam_selesai = $this->request->getPost('jam_selesai');
        $user_ikut = $this->request->getPost('partisipan_not');
        $partisipan_not = implode(", ", $user_ikut);

        $data = [
            'jam_selesai'     => $jam_selesai,
            'id_meeting_not'     => $id_meeting,
            'jam_mulai'     => $jam_mulai,
            'partisipan_not'     => $partisipan_not,
            'hasil_notulen'     => $this->request->getPost('hasil_notulen'),
            'todo_notulen'     => $this->request->getPost('todo_notulen'),
            'tgl_notulensi'     => date('Y-m-d', strtotime(str_replace('/', '-', $tgl_notulensi))),
            'id_created'     => $this->request->getPost('id_created'),
            'date_created'     => date("Y-m-d\TH:i:s"),
        ];

        $this->M_mod->tambah_notulensi($data);

        if (!empty($id_meeting)) {
            $db = db_connect();
            $builder = $db->table('tbl_jadwal_meeting');
            $builder->set('status_meeting', 1);
            $builder->where('id_meeting', $id_meeting);
            $builder->update();
        }
        return redirect()->to(base_url('meeting/jadwal'))->with('success', 'Notulensi Meeting berhasil di tambah !');
    }

    function lihat_notulensi($id)
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('success', 'Silahkan Login dulu!');
            return redirect()->to(base_url('auth'));
        }
        $builder = $this->user_aktif();

        $db = db_connect();
        $notulen = $this->M_mod->lihat_notulen($id)->get()->getRowArray();

        $peserta = $db->table('tbl_peserta a')->select('a.*, d.nama_jabatan')->join('tbl_jabatan d', 'd.id_jabatan = a.id_jabatan_k', 'left')->orderBy('nama_peserta', 'asc')->get()->getResultArray();

        $data = [
            'judul' => 'Notulensi Meeting',
            'menu' => 'Meeting',
            'notulen' => $notulen,
            'submenu' => 'Notulensi Meeting',
            'user' => $builder,
            'peserta' => $peserta,
            'validation' => \Config\Services::validation(),
        ];
        return view('notulen/lihat_not', $data);
    }

    public function json()
    {
        $datatables = new Datatables;
        $datatables->table('tbl_kinerja')->select('id_kinerja', 'tgl_kin', 'jam_mulai', 'jam_selesai', 'pekerjaan', 'ket_kin', 'id_user_kin', 'dibuat_kin', 'update_kin');
        // Memproduksi query SELECT name, address FROM users;
        echo $datatables->draw();
        // Automatically return json
    }
}
