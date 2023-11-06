<?php

namespace App\Controllers;

use App\Models\GedungModel;

/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait Gedung.
 */
class GedungController extends BaseController
{

	protected $modelGedung;

	public function __construct()
	{
		$this->modelGedung = new GedungModel();
	}

	// Fungsi menampilkan index
	public function index()
	{
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$data['judul'] = 'Gedung';
		$data['model'] = $this->modelGedung
			->findAll();

		echo view('/gedung/index', $data);
	}

	// Fungsi tampilan tambah
	public function tambah()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$data['judul'] = 'Tambah gedung';

		echo view('gedung/tambah', $data);
	}

	// Fungsi memasukkan data ke Database
	public function insertData()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$file = $this->request->getFile('gambar_gedung');
		$fileName = time() . $file->getClientName();
		if ($file->isValid() && !$file->hasMoved()) {
			$file->move(ROOTPATH . 'public/uploads/', $fileName);
			session()->setFlashData('message', 'Berhasil Upload');
		} else {
			// Mengisi gambar dummy
			$dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
			$fileName = 'dummy.png';
			copy($dummyImagePath, ROOTPATH . 'public/uploads/' . $fileName);
			session()->setFlashData('message', 'Gagal Upload');
		}

		$data = array(
			'nama_gedung' => $this->request->getPost('nama_gedung'),
			'deskripsi_gedung' => $this->request->getPost('deskripsi_gedung'),
			'gambar_gedung' => $fileName,
		);

		if ($this->modelGedung->save($data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}
		return redirect()->to(base_url() . '/gedung');
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
		$data['judul'] = 'Edit Gedung';
		$data['model'] = $this->modelGedung->where('id_gedung', $id)->find()[0];
		echo view('gedung/edit', $data);
	}

	// Fungsi update data ke Database
	public function updateData()
	{
		$role = session('userData')['role_user'];

		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$id = $this->request->getPost('id_gedung');
		$data = array(
			'nama_gedung' => $this->request->getPost('nama_gedung'),
			'deskripsi_gedung' => $this->request->getPost('deskripsi_gedung'),
		);

		$file = $this->request->getFile('gambar_gedung');

		if (isset($file)) {
			$fileName = time() . $file->getClientName();
			if ($file->isValid() && !$file->hasMoved()) {
				$file->move(ROOTPATH . 'public/uploads/', $fileName);
				session()->setFlashData('message', 'Berhasil Upload');
				$data['gambar_gedung'] = $fileName;
			} else {
				session()->setFlashData('message', 'Gagal Upload');
			}
		}

		$modelGedung = $this->modelGedung->find($id);
		if (!$modelGedung) {
			session()->setFlashData('message', 'Data Gedung not found.');
			return redirect()->to(base_url() . '/gedung');
		}

		$updatedData = array_merge($modelGedung, $data);
		if ($this->modelGedung->update($id, $updatedData)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}
		return redirect()->to(base_url() . '/gedung');
	}

	// Fungsi hapus data dari database
	public function delete()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}

		$id = $this->request->uri->getSegment(3);
		if ($this->modelGedung->delete($id)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil dihapus');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}
		return redirect()->to(base_url() . '/gedung');
	}
}
