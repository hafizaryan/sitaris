<?php

namespace App\Controllers;

use App\Models\DokumentasiModel;

/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait Dokumentasi.
 */
class DokumentasiController extends BaseController
{

	protected $modelDokumentasi;

	public function __construct()
	{
		// Inisialisasi model-model yang diperlukan
		$this->modelDokumentasi = new DokumentasiModel();
	}

	// Fungsi index digunakan untuk menampilkan data di halaman indeks dokumentasi.
	public function index()
	{
		// Memeriksa apakah username sudah ada dalam data sesi.
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}

		// Data yang akan ditampilkan di halaman indeks.
		$data['judul'] = 'Dokumentasi';
		$data['model'] = $this->modelDokumentasi->findAll();

		// Menampilkan tampilan indeks dokumentasi dengan data yang telah disiapkan.
		echo view('dokumentasi/index', $data);
	}

	// Fungsi tambah digunakan untuk menampilkan halaman tambah dokumentasi.
	public function tambah()
	{
		// Data yang akan ditampilkan di halaman tambah.
		$data['judul'] = 'Tambah Dokumentasi';

		// Menampilkan tampilan tambah dokumentasi dengan data yang telah disiapkan.
		echo view('dokumentasi/tambah', $data);
	}

	// Fungsi insertData digunakan untuk menyimpan data baru dari formulir tambah dokumentasi.
	public function insertData()
	{
		// Mengambil file yang diunggah dari formulir.
		$file = $this->request->getFile('upload_dokumentasi');
		$fileName = time() . $file->getClientName();

		if ($file->isValid() && !$file->hasMoved()) {
			$randomName = substr(md5(uniqid()), 0, 4); // Generate random name
			$fileName = $randomName;
		}

		// Memeriksa apakah file valid dan belum dipindahkan.
		if ($file->isValid() && !$file->hasMoved()) {
			$file->move(ROOTPATH . 'public/uploads/dokumentasi/', $fileName);
			session()->setFlashData('message', 'Berhasil Upload');
		} else {
			// Jika gagal unggah, digunakan gambar dummy.
			$dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
			$fileName = 'dummy.png';
			copy($dummyImagePath, ROOTPATH . 'public/uploads/' . $fileName);
			session()->setFlashData('message', 'Gagal Upload');
		}

		// Data yang akan disimpan dalam basis data.
		$data = array(
			'kategori_dokumentasi' => $this->request->getPost('kategori_dokumentasi'),
			'nama_dokumentasi' => $this->request->getPost('nama_dokumentasi'),
			'upload_dokumentasi' => $fileName,
			'deskripsi' => $this->request->getPost('deskripsi'),
			'nama_file' => $this->request->getPost('nama_file'),
			'tgl_upload' => $this->request->getPost('tgl_upload'),
			'waktu_upload' => $this->request->getPost('waktu_upload'),
			'user_upload' => $this->request->getPost('user_upload'),
		);

		// Menyimpan data baru ke dalam basis data dan mengarahkan kembali ke halaman indeks.
		if ($this->modelDokumentasi->save($data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}
		return redirect()->to(base_url() . 'dokumentasi');
	}

	// Fungsi edit digunakan untuk menampilkan halaman edit dokumentasi.
	public function edit()
	{
		// Mengambil ID dari URI segment untuk mengidentifikasi data yang akan diubah.
		$id = $this->request->uri->getSegment(3);

		// Data yang akan ditampilkan di halaman edit.
		$data['id'] = $id;
		$data['judul'] = 'Edit Dokumentasi';
		$data['url'] = 'dokumentasi/edit';
		$data['key'] = 'id_file';
		$data['model'] = $this->modelDokumentasi->where('id_file', $id)->find()[0];

		// Menampilkan tampilan edit dokumentasi dengan data yang telah disiapkan.
		echo view('dokumentasi/edit', $data);
	}

	// Fungsi updateData digunakan untuk mengupdate data dokumentasi yang sudah ada.
	public function updateData()
	{
		// Mengambil ID dari formulir untuk mengidentifikasi data yang akan diubah.
		$id = $this->request->getPost('id_file');
		$existingData = $this->modelDokumentasi->find($id);

		// Mengambil file yang diunggah dari formulir.
		$file = $this->request->getFile('upload_dokumentasi');
		$fileName = $existingData['upload_dokumentasi'];

		if ($file->isValid() && !$file->hasMoved()) {
			// Generate random name hanya jika ada file yang diunggah.
			$randomName = substr(md5(uniqid()), 0, 4);
			$fileName = $randomName . '.' . $file->getExtension(); // Sertakan ekstensi file
		}

		// Memeriksa apakah file valid dan belum dipindahkan.
		if ($file->isValid() && !$file->hasMoved()) {
			$file->move(ROOTPATH . 'public/uploads/dokumentasi/', $fileName);
			session()->setFlashData('message', 'Berhasil Upload');
		} else {
			session()->setFlashData('message', 'Gagal Upload');
		}

		if ($existingData && $fileName !== null) { // Periksa jika $existingData ada
			$oldFilePath = ROOTPATH . 'public/uploads/dokumentasi/' . $existingData['upload_dokumentasi'];
			if (file_exists($oldFilePath)) {
				unlink($oldFilePath); // Hapus file gambar sebelumnya
			}
		}

		// Data yang akan diupdate dalam basis data.
		$data = array(
			'kategori_dokumentasi' => $this->request->getPost('kategori_dokumentasi'),
			'nama_dokumentasi' => $this->request->getPost('nama_dokumentasi'),
			'deskripsi' => $this->request->getPost('deskripsi'),
			'upload_dokumentasi' => $fileName,
		);

		// Menyimpan data yang sudah diupdate ke dalam basis data dan mengarahkan kembali ke halaman indeks.
		if ($this->modelDokumentasi->update($id, $data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}
		return redirect()->to(base_url() . 'dokumentasi');
	}

	// Fungsi delete digunakan untuk menghapus data dokumentasi.
	public function delete()
	{
		// Mengambil ID dari URI segment untuk mengidentifikasi data yang akan dihapus.
		$id = $this->request->uri->getSegment(3);
		if ($this->modelDokumentasi->delete($id)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil dihapus.');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}

		// Mengarahkan kembali ke halaman indeks setelah menghapus data.
		return redirect()->to(base_url() . 'dokumentasi');
	}

	// Fungsi download digunakan untuk mengunduh dokumen.
	public function download($id)
	{
		// Membuat instance dari DokumentasiModel untuk mengambil data dokumen.
		$berkas = new DokumentasiModel();
		$data = $berkas->find($id);

		if ($data) {
			// Mengarahkan pengguna ke URL dokumen yang akan diunduh.
			return redirect()->to(base_url() . 'uploads/dokumentasi/' . $data['upload_dokumentasi']);
		} else {
			// Berkas tidak ditemukan, atur respon sesuai kebutuhan, misalnya kode status 404.
			return $this->response->setStatusCode(404);
		}
	}
}