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

	public function index()
	{
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
		echo view('prodi/index', $data);
	}

	public function tambah()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$data['judul'] = 'Tambah Prodi';
		$data['macamFakultas'] = $this->modelFakultas
			->findAll();
		$temp = [];
		foreach ($data['macamFakultas'] as $key => $value) {
			$temp[$value['id_fakultas']] = $value;
		}
		$data['macamFakultas'] = $temp;
		echo view('prodi/tambah', $data);
	}

	public function insertData()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$data = array(
			'id_fakultas' => $this->request->getPost('id_fakultas'),
			'id_prodi' => $this->request->getPost('id_prodi'),
			'nama_prodi' => $this->request->getPost('nama_prodi'),
		);
		if ($this->modelProdi->save($data)) {
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}
		return redirect()->to(base_url() . '/prodi');
	}

	public function edit()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$id = $this->request->uri->getSegment(3);
		$data['id'] = $id;
		$data['judul'] = 'Edit Prodi';
		$data['model'] = $this->modelProdi
			->where('id_prodi', $id)
			->find()[0];
		echo view('prodi/edit', $data);
	}

	public function updateData()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$data = array(
			'id_prodi' => $this->request->getPost('id_prodi'),
			'nama_prodi' => $this->request->getPost('nama_prodi'),
		);
		if ($this->modelProdi->save($data)) {
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}
		return redirect()->to(base_url() . '/prodi');
	}

	public function delete()
	{
		$role = session('userData')['role_user'];
		if ($role == "Aslab" || $role == "Kalab" || $role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . '404');
		}
		$id = $this->request->uri->getSegment(3);
		if ($this->modelProdi->delete($id)) {
			session()->setFlashdata('success', 'Data berhasil dihapus');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}
		return redirect()->to(base_url() . '/prodi');
	}
}
