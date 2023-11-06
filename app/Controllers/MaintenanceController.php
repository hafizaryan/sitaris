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

    // Menampilkan halaman utama Maintenance
    public function index()
    {
        // Memeriksa apakah pengguna sudah masuk
        if (!isset(session('userData')['username'])) {
            return redirect()->to(base_url() . '/login');
        }

        $data['judul'] = 'Maintenance';
        // Mengambil data Maintenance dengan join ke tabel Barang
        $data['model'] = $this->modelMaintenance
            ->join('barang', 'barang.id_barang=maintenance.id_barang', 'left')
            ->findAll();
        echo view('/maintenance/index', $data);
    }

    // Menampilkan halaman tambah Maintenance
    public function tambah()
    {
        $data['judul'] = 'Tambah Maintenance';
        // Mengambil daftar macam Barang
        $data['macamBarang'] = $this->modelBarang
            ->findAll();

        $temp = [];
        // Membentuk array asosiatif untuk mempermudah akses ke data Barang
        foreach ($data['macamBarang'] as $key => $value) {
            $temp[$value['id_barang']] = $value;
        }
        $data['macamBarang'] = $temp;
        echo view('maintenance/tambah', $data);
    }

    // Menyimpan data Maintenance baru
    public function insertData()
    {
        // Mengunggah berkas bukti Maintenance
        $file = $this->request->getFile('bukti');
        $fileName = time() . $file->getClientName();
        if ($file->isValid() && !$file->hasMoved()) {
            $randomName = substr(md5(uniqid()), 0, 4); // Generate random name
            $fileName = $randomName;
        }

        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/uploads/maintenance/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            // Mengisi gambar dummy jika gagal mengunggah
            $dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
            $fileName = 'dummy.png';
            copy($dummyImagePath, ROOTPATH . 'public/uploads/d' . $fileName);
            session()->setFlashData('message', 'Gagal Upload');
        }

        // Menyiapkan data untuk disimpan
        $data = array(
            'id_barang' => $this->request->getPost('id_barang'),
            'tgl_maintenance' => $this->request->getPost('tgl_maintenance'),
            'kategori_maintenance' => $this->request->getPost('kategori_maintenance'),
            'biaya' => $this->request->getPost('biaya'),
            'deskripsi_maintenance' => $this->request->getPost('deskripsi_maintenance'),
            'bukti' => $fileName,
            'status' => $this->request->getPost('status'),
        );

        // Menyimpan data ke database
        if ($this->modelMaintenance->save($data)) {
            // Jika penyimpanan berhasil, tampilkan notifikasi sukses.
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
        } else {
            // Jika penyimpanan gagal, tampilkan notifikasi gagal.
            session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
        }

        return redirect()->to(base_url() . '/maintenance');
    }

    // Menampilkan halaman edit Maintenance
    public function edit()
    {
        $id = $this->request->uri->getSegment(3);
        $data['id'] = $id;
        $data['judul'] = 'Edit Maintenance';

        // Mengambil data Maintenance berdasarkan ID
        $data['model'] = $this->modelMaintenance
            ->where('id_maintenance', $id)
            ->find()[0];

        // Mengambil daftar macam Barang
        $data['macamBarang'] = $this->modelBarang
            ->findAll();

        echo view('maintenance/edit', $data);
    }

    // Mengupdate data Maintenance
    public function updateData()
    {
        // Menyiapkan data untuk diupdate
        $data = array(
            'id_maintenance' => $this->request->getPost('id_maintenance'),
            'status' => $this->request->getPost('status'),
        );

        // Mengunggah berkas bukti Maintenance jika ada
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

        // Mengupdate data di database
        if ($this->modelMaintenance->save($data)) {
            // Jika penyimpanan berhasil, tampilkan notifikasi sukses.
            session()->setFlashdata('success', 'Data berhasil diedit');
        } else {
            // Jika penyimpanan gagal, tampilkan notifikasi gagal.
            session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
        }

        return redirect()->to(base_url() . '/maintenance');
    }

    // Menghapus data Maintenance
    public function delete()
    {
        $id = $this->request->uri->getSegment(3);

        // Menghapus data Maintenance dari database
        if ($this->modelMaintenance->delete($id)) {
            // Jika penghapusan berhasil, tampilkan notifikasi sukses.
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            // Jika penghapusan gagal, tampilkan notifikasi gagal.
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
        }

        return redirect()->to(base_url() . '/maintenance');
    }

    // Mengunduh berkas bukti Maintenance
    public function download($id)
    {
        $berkas = new MaintenanceModel();
        $data = $berkas->find($id);

        if ($data) {
            return redirect()->to(base_url() . 'uploads/maintenance/' . $data['bukti']);
        } else {
            // Berkas tidak ditemukan, atur respon sesuai kebutuhan
            return $this->response->setStatusCode(404);
        }
    }
}
