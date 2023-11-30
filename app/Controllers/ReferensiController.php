<?php

namespace App\Controllers;

use App\Models\ReferensiModel;

/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait Referensi.
 */
class ReferensiController extends BaseController
{
	protected $modelReferensi;

	public function __construct()
	{
		$this->modelReferensi = new ReferensiModel();
	}

	public function index()
	{
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}
		$data['judul'] = 'Referensi';
		$data['model'] = $this->modelReferensi
			->findAll();
		echo view('/peminjaman_ruangan/index', $data);
	}

	public function tambah_biaya()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . '404');
		}
		$data['judul'] = 'Tambah Biaya Peminjaman Ruangan';
		$data['model'] = $this->modelReferensi->first();
		echo view('peminjaman_ruangan/tambah_biaya', $data);
	}

	public function tambah_biaya2()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . '404');
		}
		$data['judul'] = 'Tambah Biaya Peminjaman Barang';
		$data['model'] = $this->modelReferensi->first();
		echo view('peminjaman_barang/tambah_biaya', $data);
	}

	public function insertData()
	{
		$idReferensi = $this->request->getPost('id_referensi');
		$biaya = $this->request->getPost('biaya');
		$existingData = $this->modelReferensi->first();
		if ($existingData) {
			$data = [
				'id_referensi' => $idReferensi,
				'biaya' => $biaya,
			];
			$this->modelReferensi->update($existingData['id_referensi'], $data);
		} else {
			$data = [
				'id_referensi' => $idReferensi,
				'biaya' => $biaya,
			];
			$this->modelReferensi->save($data);
		}
		session()->setFlashdata('success', 'Data berhasil diedit atau ditambahkan');
		return redirect()->to(base_url() . '/peminjaman_ruangan');
	}

	public function insertData2()
	{
		$idReferensi = $this->request->getPost('id_referensi');
		$biaya = $this->request->getPost('biaya');
		$existingData = $this->modelReferensi->first();
		if ($existingData) {
			$data = [
				'id_referensi' => $idReferensi,
				'biaya' => $biaya,
			];
			$this->modelReferensi->update($existingData['id_referensi'], $data);
		} else {
			$data = [
				'id_referensi' => $idReferensi,
				'biaya' => $biaya,
			];
			$this->modelReferensi->save($data);
		}
		session()->setFlashdata('success', 'Data berhasil diedit atau ditambahkan');
		return redirect()->to(base_url() . '/peminjaman_barang');
	}
}
