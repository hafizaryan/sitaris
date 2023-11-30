<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BarangModel;
use App\Models\PemusnahanBarangModel;


/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait Pemusnahan Barang.
 */
class PemusnahanBarangController extends BaseController
{

    protected $modelBarang;
    protected $modelPemusnahanBarang;

    public function __construct()
    {
        $this->modelBarang = new BarangModel();
        $this->modelPemusnahanBarang = new PemusnahanBarangModel();
    }

    public function index()
    {
        if (!isset(session('userData')['username'])) {
            return redirect()->to(base_url() . '/login');
        }
        $data['judul'] = 'Pemusnahan Barang';
        $data['model'] = $this->modelPemusnahanBarang
            ->join('barang', 'barang.id_barang=pemusnahan_barang.id_barang', 'left')
            ->findAll();
        echo view('/pemusnahan_barang/index', $data);
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Pemusnahan Barang';
        $data['macamBarang'] = $this->modelBarang
            ->findAll();
        echo view('pemusnahan_barang/tambah', $data);
    }

    public function insertData()
    {
        $file = $this->request->getFile('bukti_pemusnahan');
        $fileName = time() . $file->getClientName();
        if ($file->isValid() && !$file->hasMoved()) {
            $randomName = substr(md5(uniqid()), 0, 4);
            $fileName = $randomName;
        }
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/uploads/pemusnahan_barang/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            $dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
            $fileName = 'dummy.png';
            copy($dummyImagePath, ROOTPATH . 'public/uploads/' . $fileName);
            session()->setFlashData('message', 'Gagal Upload');
        }
        $data = array(
            'id_barang' => $this->request->getPost('id_barang'),
            'tgl_pemusnahan' => $this->request->getPost('tgl_pemusnahan'),
            'bukti_pemusnahan' => $fileName,
            'waktu' => $this->request->getPost('waktu'),
            'alasan' => $this->request->getPost('alasan'),
        );
        if ($this->modelPemusnahanBarang->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
        }
        return redirect()->to(base_url() . '/pemusnahan_barang');
    }

    public function edit()
    {
        $id = $this->request->uri->getSegment(3);
        $data['id'] = $id;
        $data['judul'] = 'Edit Pemusnahan Barang';
        $data['model'] = $this->modelPemusnahanBarang
            ->where('id_musnah', $id)
            ->find()[0];
        echo view('pemusnahan_barang/edit', $data);
    }

    public function updateData()
    {
        $id = $this->request->getPost('id_musnah');
        $existingData = $this->modelPemusnahanBarang->find($id);
        $file = $this->request->getFile('bukti_pemusnahan');
        $fileName = $existingData['bukti_pemusnahan'];
        if ($file->isValid() && !$file->hasMoved()) {
            $randomName = substr(md5(uniqid()), 0, 4);
            $fileName = $randomName;
        }
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/uploads/pemusnahan_barang/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            session()->setFlashData('message', 'Gagal Upload');
        }
        if ($existingData && $fileName !== null) {
            $oldFilePath = ROOTPATH . 'public/uploads/pemusnahan_barang/' . $existingData['bukti_pemusnahan'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $data = array(
            'id_musnah' => $this->request->getPost('id_musnah'),
            'tgl_pemusnahan' => $this->request->getPost('tgl_pemusnahan'),
            'bukti_pemusnahan' => $file->isValid() && !$file->hasMoved() ? $file->getName() : $existingData['bukti_pemusnahan'],
            'waktu' => $this->request->getPost('waktu'),
            'alasan' => $this->request->getPost('alasan'),
        );
        if ($this->modelPemusnahanBarang->save($data)) {
            session()->setFlashdata('success', 'Data berhasil diedit');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
        }
        return redirect()->to(base_url() . '/pemusnahan_barang');
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);
        if ($this->modelPemusnahanBarang->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
        }
        return redirect()->to(base_url() . '/pemusnahan_barang');
    }

    public function download($id)
    {
        $berkas = new PemusnahanBarangModel();
        $data = $berkas->find($id);
        if ($data) {
            return redirect()->to(base_url() . 'uploads/pemusnahan_barang/' . $data['bukti_pemusnahan']);
        } else {
            return $this->response->setStatusCode(404);
        }
    }
}