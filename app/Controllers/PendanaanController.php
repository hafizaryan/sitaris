<?php

namespace App\Controllers;

use App\Models\PendanaanModel;

/**
 * Class PendanaanController
 * 
 * Controller ini mengelola fitur-fitur terkait pendanaan barang.
 */
class PendanaanController extends BaseController
{

	protected $modelPendanaan;

	public function __construct()
	{
		$this->modelPendanaan = new PendanaanModel();
	}

	// Fungsi tampilan pendanaan index 
	public function index()
	{
		// Memeriksa apakah pengguna sudah login atau belum. Jika belum, akan diarahkan ke halaman login.
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'index');
		}

		// Mengambil data dari modelPendanaan untuk ditampilkan pada halaman index.
		$data['judul'] = 'Pendanaan';
		$data['model'] = $this->modelPendanaan->findAll();

		// Menampilkan halaman index dengan data yang diperoleh.
		echo view('/pendanaan/index', $data);
	}

	// Fungsi tampilan tambah pendanaan 
	public function tambah()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'index');
		}
		// Data untuk judul halaman tambah pendanaan.
		$data['judul'] = 'Tambah Pendanaan Barang';

		// Menampilkan halaman tambah dengan data yang diberikan.
		echo view('pendanaan/tambah', $data);
	}

	// Fungsi memasukkan data ke database
	public function insertData()
	{
		$data = array(
			'jenis_pendanaan' => $this->request->getPost('jenis_pendanaan'),
			'keterangan' => $this->request->getPost('keterangan'),
		);

		// Menyimpan data pendanaan ke dalam database melalui modelPendanaan.
		if ($this->modelPendanaan->save($data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}

		// Mengarahkan pengguna kembali ke halaman index.
		return redirect()->to(base_url() . '/pendanaan');
	}

	// Fungsi tampilan edit
	public function edit()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'index');
		}
		$id = $this->request->uri->getSegment(3);

		// Data untuk judul halaman edit pendanaan.
		$data['id'] = $id;
		$data['judul'] = 'Edit Pendanaan Barang';

		// Mendapatkan data pendanaan berdasarkan ID dari modelPendanaan untuk ditampilkan pada halaman edit.
		$data['model'] = $this->modelPendanaan
			->where('id_pendanaan', $id)
			->find()[0];

		// Menampilkan halaman edit dengan data yang diperoleh.
		echo view('pendanaan/edit', $data);
	}

	// Fungsi mengupdate data yang ada di database
	public function updateData()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'index');
		}
		// Mendapatkan data dari formulir edit pendanaan yang disubmit.

		$data = array(
			'id_pendanaan' => $this->request->getPost('id_pendanaan'),
			'jenis_pendanaan' => $this->request->getPost('jenis_pendanaan'),
			'keterangan' => $this->request->getPost('keterangan'),
		);

		// Menyimpan data pendanaan ke dalam database melalui modelPendanaan.
		if ($this->modelPendanaan->save($data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}

		// Mengarahkan pengguna kembali ke halaman index setelah berhasil menyimpan data yang telah diupdate.
		return redirect()->to(base_url() . 'pendanaan');
	}

	// Fungsi menghapus data yang ada di database
	public function delete()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'index');
		}
		$id = $this->request->uri->getSegment(3);

		// Menghapus data pendanaan berdasarkan ID dari modelPendanaan.
		// $this->modelPendanaan->delete($id);

		if ($this->modelPendanaan->delete($id)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil dihapus');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}

		// Mengarahkan pengguna kembali ke halaman index setelah berhasil menghapus data.
		return redirect()->to(base_url() . '/pendanaan');
	}
}
