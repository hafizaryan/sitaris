<?php

namespace App\Controllers;

use App\Models\FakultasModel;

/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait Fakultas.
 */
class FakultasController extends BaseController
{

	protected $modelFakultas;

	public function __construct()
	{
		$this->modelFakultas = new FakultasModel();
	}
	// Fungsi index
	public function index()
	{
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}

		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}

		$data['judul'] = 'Fakultas';
		$data['model'] = $this->modelFakultas
			->findAll();

		echo view('/fakultas/index', $data);
	}

	// Fungsi tampilan tambah
	public function tambah()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}

		$data['judul'] = 'Tambah Fakultas';

		echo view('fakultas/tambah', $data);
	}

	// Fungsi menambah data ke database
	public function insertData()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}

		$data = array(
			'id_fakultas' => $this->request->getPost('id_fakultas'),
			'nama_fakultas' => $this->request->getPost('nama_fakultas'),
		);

		// Menyimpan data pendanaan ke dalam database melalui modelPendanaan.
		if ($this->modelFakultas->save($data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}
		return redirect()->to(base_url() . '/fakultas');
	}

	// Fungsi tampilan edit
	public function edit()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}

		$id = $this->request->uri->getSegment(3);

		$data['id'] = $id;
		$data['judul'] = 'Edit Fakultas';
		$data['model'] = $this->modelFakultas
			->where('id_fakultas', $id)
			->find()[0];

		echo view('fakultas/edit', $data);
	}

	// Fungsi update data di database
	public function updateData()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}

		$data = array(
			'id_fakultas' => $this->request->getPost('id_fakultas'),
			'nama_fakultas' => $this->request->getPost('nama_fakultas'),
		);

		if ($this->modelFakultas->save($data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}
		return redirect()->to(base_url() . '/fakultas');
	}

	// Fungsi hapus data dari database
	public function delete()
	{
		$role = session('userData')['role_user'];
		// Jika dalam sesi role_user yang mengakses adalah di bawah ini, arahkan ke halaman 404 
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}

		$id = $this->request->uri->getSegment(3);
		if ($this->modelFakultas->delete($id)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil dihapus');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}
		return redirect()->to(base_url() . '/fakultas');
	}
}
