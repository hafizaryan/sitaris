<?php

namespace App\Controllers;

use App\Models\MaintenanceModel;
use App\Models\BarangModel;

class MaintenanceController extends BaseController
{

    protected $modelMaintenance;
    protected $modelBarang;
    protected $modelRuangan;

    public function __construct()
    {
        $this->modelMaintenance = new MaintenanceModel();
        $this->modelBarang = new BarangModel();
    }

    public function index()
    {
        if (!isset(session('userData')['username'])) {
            return redirect()->to(base_url() . '/login');
        }
        $data['judul'] = 'Maintenance';
        $data['model'] = $this->modelMaintenance
            ->join('barang', 'barang.id_barang=maintenance.id_barang', 'left')
            ->findAll();
        echo view('/maintenance/index', $data);
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Maintenance';
        $data['macamBarang'] = $this->modelBarang
            ->findAll();
        $temp = [];
        foreach ($data['macamBarang'] as $key => $value) {
            $temp[$value['id_barang']] = $value;
        }
        $data['macamBarang'] = $temp;
        echo view('maintenance/tambah', $data);
    }

    public function insertData()
    {
        $file = $this->request->getFile('bukti');
        $fileName = time() . $file->getClientName();
        if ($file->isValid() && !$file->hasMoved()) {
            $randomName = substr(md5(uniqid()), 0, 4);
            $fileName = $randomName;
        }
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/uploads/maintenance/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            $dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
            $fileName = 'dummy.png';
            copy($dummyImagePath, ROOTPATH . 'public/uploads/d' . $fileName);
            session()->setFlashData('message', 'Gagal Upload');
        }
        $data = array(
            'id_barang' => $this->request->getPost('id_barang'),
            'tgl_maintenance' => $this->request->getPost('tgl_maintenance'),
            'kategori_maintenance' => $this->request->getPost('kategori_maintenance'),
            'biaya' => $this->request->getPost('biaya'),
            'deskripsi_maintenance' => $this->request->getPost('deskripsi_maintenance'),
            'bukti' => $fileName,
            'status' => $this->request->getPost('status'),
        );
        if ($this->modelMaintenance->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
        }
        return redirect()->to(base_url() . '/maintenance');
    }

    public function edit()
    {
        $id = $this->request->uri->getSegment(3);
        $data['id'] = $id;
        $data['judul'] = 'Edit Maintenance';
        $data['model'] = $this->modelMaintenance
            ->where('id_maintenance', $id)
            ->find()[0];
        $data['macamBarang'] = $this->modelBarang
            ->findAll();
        echo view('maintenance/edit', $data);
    }

    public function updateData()
    {
        $data = array(
            'id_maintenance' => $this->request->getPost('id_maintenance'),
            'status' => $this->request->getPost('status'),
        );
        $file = $this->request->getFile('bukti');
        if (isset($file)) {
            $fileName = time() . $file->getClientName();
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move(ROOTPATH . 'public/uploads/maintenance/', $fileName);
                session()->setFlashData('message', 'Berhasil Upload');
                $data['bukti'] = $fileName;
            } else {
                session()->setFlashData('message', 'Gagal Upload');
            }
        }
        if ($this->modelMaintenance->save($data)) {
            session()->setFlashdata('success', 'Data berhasil diedit');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
        }
        return redirect()->to(base_url() . '/maintenance');
    }


    public function delete()
    {
        $id = $this->request->uri->getSegment(3);
        if ($this->modelMaintenance->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
        }
        return redirect()->to(base_url() . '/maintenance');
    }

    public function download($id)
    {
        $berkas = new MaintenanceModel();
        $data = $berkas->find($id);
        if ($data) {
            return redirect()->to(base_url() . 'uploads/maintenance/' . $data['bukti']);
        } else {
            return $this->response->setStatusCode(404);
        }
    }
}