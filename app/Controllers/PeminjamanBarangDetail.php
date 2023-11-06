<?php

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait .
 */
class PeminjamanBarangDetailController extends BaseController
{
	public function index()
	{
		if (!isset(session('userData')['username'])){
			return redirect()->to(base_url().'/login');
		}
		$data['model'] = $this->modelPeminjamanBarangDetail
		->join('barang', 'barang.id_barang=peminjaman_barang_detail.id_barang','left')
			->findAll();
		// print_r($data);
		// exit;
		echo view('/peminjaman_barang_detail/index', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Tambah Peminjaman Barang Detail';
        $id = $this->req->uri->getSegment(3);

		$data['id'] = $id;
		$data['macamBarang'] = $this->modelBarang2
			->join('barang_tambah', 'barang_tambah.id_barang_tambah=barang2.id_barang_tambah')
			->findAll();

            $data['id_peminjaman_barang'] = $id;
			$temp =[];
			foreach ($data['macamBarang'] as $key => $value) {
				# code...
				$temp[$value ['id_barang']] = $value;
			}
			$data['macamBarang'] = $temp;

		echo view('peminjaman_barang_detail/tambah', $data);
	}

	public function insertData()
	{
		// $file = $this->request->getFile('bukti_peminjaman');
		// $fileName = time() . $file->getClientName();
		// if ($file->isValid() && !$file->hasMoved()) {
		// 	$file->move(ROOTPATH . 'public/uploads/', $fileName);
		// 	session()->setFlashData('message', 'Berhasil Upload');
		// } else {
		// 	session()->setFlashData('message', 'Gagal Upload');
		// }
        $id = $this->req->uri->getSegment(3);

		$data['id'] = $id;
		$data = array(
			'id_peminjaman_barang' => $this->request->getPost('id_peminjaman_barang'),
			'id_barang' => $this->request->getPost('id_barang_tambah'),
		);


		$this->modelPeminjamanBarangDetail->save($data);
		return redirect()->to(base_url() . '/peminjaman_barang2/detail/'.$this->request->getPost('id_peminjaman_barang'));
	}

	public function edit()
	{
		$id = $this->req->uri->getSegment(3);

		$data['id'] = $id;
		$data['judul'] = 'Edit Peminjaman Barang Detail';
		// $data['url'] = 'Peminjaman_barang/ubah';
		// $data['key'] = 'id_musnah';
		$data['model'] = $this->modelPeminjamanBarangDetail
			->where('id_pinjam_detail', $id)
			->find()[0];
		// print_r($data['model']);
		// exit;

		echo view('peminjaman_barang_detail/edit', $data);
	}

	public function updateData()
	{
		$data = array(
			'id_peminjaman_barang' => $this->request->getPost('id_peminjaman_barang'),
			'id_barang' => $this->request->getPost('id_barang'),
		);

		// $file = $this->request->getFile('bukti_peminjaman');
		// // print_r($file);
		// if (isset($file)){

		// 	$fileName = time() . $file->getClientName();
		// 	if ($file->isValid() && !$file->hasMoved()) {
		// 		$file->move(ROOTPATH . 'public/uploads/', $fileName);
		// 		session()->setFlashData('message', 'Berhasil Upload');
		// 		$data['bukti_peminjaman'] = $fileName;
				
		// 	} else {
		// 		session()->setFlashData('message', 'Gagal Upload');
		// 	}
		// }

		// print_r($data);
		// exit;

		$this->modelPeminjamanBarangDetail->save($data);
		return redirect()->to(base_url() . '/peminjaman_barang_detail');
	}

	public function delete()
	{
		$id = $this->req->uri->getSegment(3);
		$this->modelPeminjamanBarangDetail->delete($id);
		return redirect()->to(base_url() . '/peminjaman_barang_detail');
	}
	public function detail()
	{
		$id = $this->req->uri->getSegment(3);

		$data['id'] = $id;
		$data['judul'] = 'Detail Peminjaman Barang 2';
		// $data['url'] = 'Peminjaman_barang/ubah';
		// $data['key'] = 'id_musnah';
		$data['model'] = $this->modelPeminjamanBarangDetail
			->join('barang2', 'barang2.id_barang=peminjaman_barang_detail.id_barang')
			->where('id_peminjaman_barang', $id)
			->findAll();

		$data['model2'] = $this->modelPeminjamanBarang2
			->where('id_peminjaman_barang', $id)
			->find()[0];
		// print_r($data['model2']);
		// exit;
		
		$data['id_peminjaman_barang'] = $id;
		// print_r($data['model']);
		// exit;

		echo view('peminjaman_barang2/detail', $data);
	}
}