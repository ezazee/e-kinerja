<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		session();
	}

	public function cek_login()
	{
		$result = true;
		if (session()->get('email') == '') {
			$result = false;
		}
		return $result;
	}
	public function ambil_notif()
	{
		$db = db_connect();
		$builder = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();

		$user_aktif = $builder['id_peserta'];

		$query = $db->table('tbl_notif a');
		$query->select('a.*, b.nama_peserta as nama_pembuat, c.nama_peserta');
		$query->join('tbl_peserta b', 'b.id_peserta = a.id_pembuat');
		$query->join('tbl_peserta c', 'c.id_peserta = a.id_karyawan');
		$query->join('tbl_tugas d', 'd.id_tugas = a.id_tugas_notif');
		$query->orderBy('tgl_notif', 'desc');
		$query->where(['a.id_karyawan' => $user_aktif]);


		return $query->get()->getResultArray();
	}

	public function jml_notif()
	{
		$db = db_connect();
		$builder = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();

		$user_aktif = $builder['id_peserta'];

		$query = $db->table('tbl_notif a');
		$query->select('a.*, b.nama_peserta as nama_pembuat, c.nama_peserta');
		$query->join('tbl_peserta b', 'b.id_peserta = a.id_pembuat');
		$query->join('tbl_peserta c', 'c.id_peserta = a.id_karyawan');
		$query->join('tbl_tugas d', 'd.id_tugas = a.id_tugas_notif');
		$query->orderBy('tgl_notif', 'desc');
		$query->where(['a.id_karyawan' => $user_aktif])->countAllResults();

		return json_encode($query);
	}


	public function user_aktif()
	{
		$db = db_connect();
		$builder = $db->table('tbl_peserta')->getWhere(['email_peserta' => session()->get('email')])->getRowArray();

		return $builder;
	}
}
