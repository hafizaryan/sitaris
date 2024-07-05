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

	public function index()
	{
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'dashboard');
		}
		$data['judul'] = 'Pendanaan';
		$data['model'] = $this->modelPendanaan->findAll();
		echo view('/pendanaan/index', $data);
	}

	public function tambah()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'dashboard');
		}
		$data['judul'] = 'Tambah Pendanaan Barang';
		echo view('pendanaan/tambah', $data);
	}

	public function insertData()
{
    // Define the validation rules
    $validationRules = [
        'jenis_pendanaan' => [
            'label' => 'Jenis Pendanaan',
            'rules' => 'required|min_length[3]|strip_tags',
            'errors' => [
                'required' => '{field} harus diisi',
                'min_length' => '{field} minimal 3 karakter',
            ],
        ],
        'keterangan' => [
            'label' => 'Keterangan',
            'rules' => 'required|min_length[3]|strip_tags',
            'errors' => [
                'required' => '{field} harus diisi',
                'min_length' => '{field} minimal 3 karakter',
            ],
        ],
    ];

    // Validate the input data
    if ($this->validate($validationRules)) {
        $data = [
            'jenis_pendanaan' => $this->request->getPost('jenis_pendanaan'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if ($this->modelPendanaan->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
        }
    } else {
        // Get the validation errors
        $errors = $this->validator->getErrors();
        session()->setFlashdata('error', implode(', ', $errors));
    }

    return redirect()->to(base_url() . '/pendanaan');
}

	public function edit()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'dashboard');
		}
		$id = $this->request->uri->getSegment(3);
		$data['id'] = $id;
		$data['judul'] = 'Edit Pendanaan Barang';
		$data['model'] = $this->modelPendanaan
			->where('id_pendanaan', $id)
			->find()[0];
		echo view('pendanaan/edit', $data);
	}

	public function updateData()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'dashboard');
		}
		$data = array(
			'id_pendanaan' => $this->request->getPost('id_pendanaan'),
			'jenis_pendanaan' => $this->request->getPost('jenis_pendanaan'),
			'keterangan' => $this->request->getPost('keterangan'),
		);
		if ($this->modelPendanaan->save($data)) {
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}
		return redirect()->to(base_url() . 'pendanaan');
	}

	public function delete()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'dashboard');
		}
		$id = $this->request->uri->getSegment(3);
		if ($this->modelPendanaan->delete($id)) {
			session()->setFlashdata('success', 'Data berhasil dihapus');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}
		return redirect()->to(base_url() . '/pendanaan');
	}
}
