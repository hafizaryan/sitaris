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

	public function index()
	{
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
		echo view('/ruangan/index', $data);
	}

	public function tambah()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$data['judul'] = 'Tambah Ruangan';
		$data['macamGedung'] = $this->modelGedung
			->findAll();
		$temp = [];
		foreach ($data['macamGedung'] as $key => $value) {
			$temp[$value['id_gedung']] = $value;
		}
		$data['macamGedung'] = $temp;
		echo view('ruangan/tambah', $data);
	}

	public function insertData()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$file = $this->request->getFile('gambar_ruangan');
		$fileName = time() . $file->getClientName();
		if ($file->isValid() && !$file->hasMoved()) {
			$file->move(ROOTPATH . 'public/uploads/', $fileName);
			session()->setFlashData('message', 'Berhasil Upload');
		} else {
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
		if ($this->modelRuangan->save($data)) {
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}
		return redirect()->to(base_url() . '/ruangan');
	}


	public function edit()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$id = $this->request->uri->getSegment(3);
		$data['id'] = $id;
		$data['judul'] = 'Edit Ruangan';
		$data['model'] = $this->modelRuangan
			->where('id_ruangan', $id)
			->first();
		echo view('ruangan/edit', $data);
	}

	public function updateData()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
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
		$id_ruangan = $this->request->getPost('id_ruangan');
		if ($this->modelRuangan->update($id_ruangan, $data)) {
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}
		return redirect()->to(base_url() . '/ruangan');
	}

	public function delete()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$id = $this->request->uri->getSegment(3);
		if ($this->modelRuangan->delete($id)) {
			session()->setFlashdata('success', 'Data berhasil dihapus');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}
		return redirect()->to(base_url() . '/ruangan');
	}
}
