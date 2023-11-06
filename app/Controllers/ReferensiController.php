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

	// Fungsi index
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
	// Fungsi tampilan tambah
	public function tambah_biaya()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . '404');
		}
		$data['judul'] = 'Tambah Biaya Peminjaman Ruangan';

		// Mengambil satu baris data yang ada (jika ada)
		$data['model'] = $this->modelReferensi->first();

		echo view('peminjaman_ruangan/tambah_biaya', $data);
	}

	// Fungsi tampilan tambah
	public function tambah_biaya2()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . '404');
		}
		$data['judul'] = 'Tambah Biaya Peminjaman Barang';

		// Mengambil satu baris data yang ada (jika ada)
		$data['model'] = $this->modelReferensi->first();

		echo view('peminjaman_barang/tambah_biaya', $data);
	}

	// Fungsi menambah atau mengedit data ke database
	public function insertData()
	{
		$idReferensi = $this->request->getPost('id_referensi');
		$biaya = $this->request->getPost('biaya');

		// Mengambil satu baris data yang ada (jika ada)
		$existingData = $this->modelReferensi->first();

		if ($existingData) {
			// Jika data sudah ada, update data yang ada
			$data = [
				'id_referensi' => $idReferensi,
				'biaya' => $biaya,
			];
			$this->modelReferensi->update($existingData['id_referensi'], $data);
		} else {
			// Jika data belum ada, tambahkan data baru
			$data = [
				'id_referensi' => $idReferensi,
				'biaya' => $biaya,
			];
			$this->modelReferensi->save($data);
		}

		// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
		session()->setFlashdata('success', 'Data berhasil diedit atau ditambahkan');

		return redirect()->to(base_url() . '/peminjaman_ruangan');
	}

	// Fungsi menambah atau mengedit data ke database
	public function insertData2()
	{
		$idReferensi = $this->request->getPost('id_referensi');
		$biaya = $this->request->getPost('biaya');

		// Mengambil satu baris data yang ada (jika ada)
		$existingData = $this->modelReferensi->first();

		if ($existingData) {
			// Jika data sudah ada, update data yang ada
			$data = [
				'id_referensi' => $idReferensi,
				'biaya' => $biaya,
			];
			$this->modelReferensi->update($existingData['id_referensi'], $data);
		} else {
			// Jika data belum ada, tambahkan data baru
			$data = [
				'id_referensi' => $idReferensi,
				'biaya' => $biaya,
			];
			$this->modelReferensi->save($data);
		}

		// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
		session()->setFlashdata('success', 'Data berhasil diedit atau ditambahkan');

		return redirect()->to(base_url() . '/peminjaman_barang');
	}
}
