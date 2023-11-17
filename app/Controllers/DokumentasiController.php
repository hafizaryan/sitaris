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
		$this->modelDokumentasi = new DokumentasiModel();
	}

	public function index()
	{
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}
		$data['judul'] = 'Dokumentasi';
		$data['model'] = $this->modelDokumentasi->findAll();
		echo view('dokumentasi/index', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Tambah Dokumentasi';
		echo view('dokumentasi/tambah', $data);
	}

	public function insertData()
	{
		$file = $this->request->getFile('upload_dokumentasi');
		$fileName = time() . $file->getClientName();
		if ($file->isValid() && !$file->hasMoved()) {
			$randomName = substr(md5(uniqid()), 0, 4);
			$fileName = $randomName;
		}
		if ($file->isValid() && !$file->hasMoved()) {
			$file->move(ROOTPATH . 'public/uploads/dokumentasi/', $fileName);
			session()->setFlashData('message', 'Berhasil Upload');
		} else {
			$dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
			$fileName = 'dummy.png';
			copy($dummyImagePath, ROOTPATH . 'public/uploads/' . $fileName);
			session()->setFlashData('message', 'Gagal Upload');
		}
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
		if ($this->modelDokumentasi->save($data)) {
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}
		return redirect()->to(base_url() . 'dokumentasi');
	}

	public function edit()
	{
		$id = $this->request->uri->getSegment(3);
		$data['id'] = $id;
		$data['judul'] = 'Edit Dokumentasi';
		$data['url'] = 'dokumentasi/edit';
		$data['key'] = 'id_file';
		$data['model'] = $this->modelDokumentasi->where('id_file', $id)->find()[0];
		echo view('dokumentasi/edit', $data);
	}

	public function updateData()
	{
		$id = $this->request->getPost('id_file');
		$existingData = $this->modelDokumentasi->find($id);
		$file = $this->request->getFile('upload_dokumentasi');
		$fileName = $existingData['upload_dokumentasi'];
		if ($file->isValid() && !$file->hasMoved()) {
			$randomName = substr(md5(uniqid()), 0, 4);
			$fileName = $randomName . '.' . $file->getExtension();
		}
		if ($file->isValid() && !$file->hasMoved()) {
			$file->move(ROOTPATH . 'public/uploads/dokumentasi/', $fileName);
			session()->setFlashData('message', 'Berhasil Upload');
		} else {
			session()->setFlashData('message', 'Gagal Upload');
		}
		if ($existingData && $fileName !== null) {
			$oldFilePath = ROOTPATH . 'public/uploads/dokumentasi/' . $existingData['upload_dokumentasi'];
			if (file_exists($oldFilePath)) {
				unlink($oldFilePath);
			}
		}
		$data = array(
			'kategori_dokumentasi' => $this->request->getPost('kategori_dokumentasi'),
			'nama_dokumentasi' => $this->request->getPost('nama_dokumentasi'),
			'deskripsi' => $this->request->getPost('deskripsi'),
			'upload_dokumentasi' => $fileName,
		);
		if ($this->modelDokumentasi->update($id, $data)) {
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}
		return redirect()->to(base_url() . 'dokumentasi');
	}

	public function delete()
	{
		$id = $this->request->uri->getSegment(3);
		if ($this->modelDokumentasi->delete($id)) {
			session()->setFlashdata('success', 'Data berhasil dihapus.');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}
		return redirect()->to(base_url() . 'dokumentasi');
	}

	public function download($id)
	{
		$berkas = new DokumentasiModel();
		$data = $berkas->find($id);
		if ($data) {
			return redirect()->to(base_url() . 'uploads/dokumentasi/' . $data['upload_dokumentasi']);
		} else {
			return $this->response->setStatusCode(404);
		}
	}
}