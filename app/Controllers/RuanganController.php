<?php

namespace App\Controllers;

use App\Models\GedungModel;
use App\Models\RuanganModel;

/**
 * Class RuanganController
 *
 * Controller ini mengelola fitur-fitur terkait ruangan.
 */
class RuanganController extends BaseController
{

	protected $modelGedung;
	protected $modelRuangan;

	public function __construct()
	{
		$this->modelGedung = new GedungModel();
		$this->modelRuangan = new RuanganModel();
	}

	// Fungsi tampilan index ruangan
	public function index()
	{
		// Memeriksa apakah pengguna sudah login atau belum. Jika belum, akan diarahkan ke halaman login.
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}

		$data['judul'] = 'Ruangan';
		$data['model'] = $this->modelRuangan
			->join('gedung', 'gedung.id_gedung = ruangan.id_gedung', 'left')
			->findAll();

		// Menampilkan halaman index dengan data yang diperoleh.
		echo view('/ruangan/index', $data);
	}

	// Fungsi tampilan tambah ruangan
	public function tambah()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		// Data untuk judul halaman tambah ruangan.
		$data['judul'] = 'Tambah Ruangan';

		// Mengambil semua data gedung untuk ditampilkan pada dropdown pada halaman tambah ruangan.
		$data['macamGedung'] = $this->modelGedung
			->findAll();

		$temp = [];
		foreach ($data['macamGedung'] as $key => $value) {
			$temp[$value['id_gedung']] = $value;
		}
		$data['macamGedung'] = $temp;

		// Menampilkan halaman tambah dengan data yang diberikan.
		echo view('ruangan/tambah', $data);
	}

	// Fungsi memasukkan data ke database
	public function insertData()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		// Mendapatkan data dari formulir tambah ruangan yang disubmit.

		$file = $this->request->getFile('gambar_ruangan');
		$fileName = time() . $file->getClientName();

		// Memeriksa apakah file gambar valid dan belum dipindahkan sebelumnya.
		if ($file->isValid() && !$file->hasMoved()) {
			$file->move(ROOTPATH . 'public/uploads/', $fileName);
			session()->setFlashData('message', 'Berhasil Upload');
		} else {
			// Mengisi gambar dummy jika gagal upload
			$dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
			$fileName = 'dummy.png';
			copy($dummyImagePath, ROOTPATH . 'public/uploads/' . $fileName);
			session()->setFlashData('message', 'Gagal Upload');
		}

		$data = array(
			'id_gedung' => $this->request->getPost('id_gedung'),
			'nama_ruangan' => $this->request->getPost('nama_ruangan'),
			'deskripsi_ruangan' => $this->request->getPost('deskripsi_ruangan'),
			'gambar_ruangan' => $fileName,
		);

		// Menyimpan data ruangan ke dalam database melalui modelRuangan.
		if ($this->modelRuangan->save($data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}
		// Mengarahkan pengguna kembali ke halaman index setelah berhasil menyimpan data.
		return redirect()->to(base_url() . '/ruangan');
	}

	// Fungsi tampian edit
	public function edit()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		// Mendapatkan ID ruangan yang akan diedit dari segment URL.
		$id = $this->request->uri->getSegment(3);

		// Data untuk judul halaman edit ruangan.
		$data['id'] = $id;
		$data['judul'] = 'Edit Ruangan';

		// Mendapatkan data ruangan berdasarkan ID dari modelRuangan untuk ditampilkan pada halaman edit.
		$data['model'] = $this->modelRuangan
			->where('id_ruangan', $id)
			->first();

		// Menampilkan halaman edit dengan data yang diperoleh.
		echo view('ruangan/edit', $data);
	}

	// Fungsi update data dalam database
	public function updateData()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		// Mendapatkan data dari formulir edit ruangan yang disubmit.

		$data = array(
			'nama_ruangan' => $this->request->getPost('nama_ruangan'),
			'deskripsi_ruangan' => $this->request->getPost('deskripsi_ruangan'),
		);

		$file = $this->request->getFile('gambar_ruangan');
		if (isset($file)) {
			if ($file->isValid() && !$file->hasMoved()) {
				$fileName = time() . $file->getClientName();
				$file->move(ROOTPATH . 'public/uploads/', $fileName);
				session()->setFlashData('message', 'Berhasil Upload');
				$data['gambar_ruangan'] = $fileName;
			} else {
				session()->setFlashData('message', 'Gagal Upload');
			}
		}

		// Get the ID of the record to be updated from the form
		$id_ruangan = $this->request->getPost('id_ruangan');

		// Update the existing record using the ID
		if ($this->modelRuangan->update($id_ruangan, $data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}
		return redirect()->to(base_url() . '/ruangan');
	}

	// Fungsi menghapus data dari database
	public function delete()
	{
		$role = session('userData')['role_user'];
		
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		// Mendapatkan ID ruangan yang akan dihapus dari segment URL.
		$id = $this->request->uri->getSegment(3);

		// Menghapus data ruangan berdasarkan ID dari modelRuangan.
		if ($this->modelRuangan->delete($id)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil dihapus');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}

		// Mengarahkan pengguna kembali ke halaman index setelah berhasil menghapus data.
		return redirect()->to(base_url() . '/ruangan');
	}
}
