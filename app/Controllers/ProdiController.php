<?php

namespace App\Controllers;

use App\Models\ProdiModel;
use App\Models\FakultasModel;
use CodeIgniter\Controller;

/**
 * Class ProdiController
 *
 * Controller ini mengelola fitur-fitur terkait program studi (Prodi).
 */
class ProdiController extends BaseController
{

	protected $modelProdi;
	protected $modelFakultas;

	public function __construct()
	{
		$this->modelProdi = new ProdiModel();
		$this->modelFakultas = new FakultasModel();
	}
	
	// Fungsi menampilkan index prodi 
	public function index()
	{
		// Memeriksa apakah pengguna sudah login atau belum. Jika belum, akan diarahkan ke halaman login.
		if (!session('userData')['username']) {
			return redirect()->to(base_url() . '/login');
		}
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$data['judul'] = 'Program Studi';
		$data['model'] = $this->modelProdi
			->join('fakultas AS f', 'f.id_fakultas = prodi.id_fakultas', 'left')
			->findAll();

		// Menampilkan halaman index dengan data yang diperoleh.
		echo view('prodi/index', $data);
	}

	// Fungsi tampilan tambah prodi
	public function tambah()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		// Data untuk judul halaman tambah Prodi.
		$data['judul'] = 'Tambah Prodi';

		// Mengambil semua data fakultas untuk ditampilkan pada dropdown pada halaman tambah Prodi.
		$data['macamFakultas'] = $this->modelFakultas
			->findAll();

		$temp = [];
		foreach ($data['macamFakultas'] as $key => $value) {
			$temp[$value['id_fakultas']] = $value;
		}
		$data['macamFakultas'] = $temp;

		// Menampilkan halaman tambah dengan data yang diberikan.
		echo view('prodi/tambah', $data);
	}

	// Fungsi memasukkan data ke dalam database
	public function insertData()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		// Mendapatkan data dari formulir tambah Prodi yang disubmit.
		$data = array(
			'id_fakultas' => $this->request->getPost('id_fakultas'),
			'id_prodi' => $this->request->getPost('id_prodi'),
			'nama_prodi' => $this->request->getPost('nama_prodi'),
		);

		// Menyimpan data Prodi ke dalam database melalui modelProdi.
		if ($this->modelProdi->save($data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}

		// Mengarahkan pengguna kembali ke halaman index setelah berhasil menyimpan data.
		return redirect()->to(base_url() . '/prodi');
	}

	// Fungsi tampilan edit prodi
	public function edit()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		// Mendapatkan ID Prodi yang akan diedit dari segment URL.
		$id = $this->request->uri->getSegment(3);

		// Data untuk judul halaman edit Prodi.
		$data['id'] = $id;
		$data['judul'] = 'Edit Prodi';

		// Mendapatkan data Prodi berdasarkan ID dari modelProdi untuk ditampilkan pada halaman edit.
		$data['model'] = $this->modelProdi
			->where('id_prodi', $id)
			->find()[0];

		// Menampilkan halaman edit dengan data yang diperoleh.
		echo view('prodi/edit', $data);
	}

	// Fungsi update data yang ada di database
	public function updateData()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		// Mendapatkan data dari formulir edit Prodi yang disubmit.
		$data = array(
			'id_prodi' => $this->request->getPost('id_prodi'),
			'nama_prodi' => $this->request->getPost('nama_prodi'),
		);

		// Menyimpan data Prodi yang telah diupdate ke dalam database melalui modelProdi.
		if ($this->modelProdi->save($data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}

		// Mengarahkan pengguna kembali ke halaman index setelah berhasil menyimpan data yang telah diupdate.
		return redirect()->to(base_url() . '/prodi');
	}

	// Fungsi hapus data dari database
	public function delete()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		// Mendapatkan ID Prodi yang akan dihapus dari segment URL.
		$id = $this->request->uri->getSegment(3);

		// Menghapus data Prodi berdasarkan ID dari modelProdi.
		if ($this->modelProdi->delete($id)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil dihapus');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}

		// Mengarahkan pengguna kembali ke halaman index setelah berhasil menghapus data.
		return redirect()->to(base_url() . '/prodi');
	}
}
