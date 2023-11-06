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

    // Menampilkan halaman utama Pemusnahan Barang.
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (!isset(session('userData')['username'])) {
            return redirect()->to(base_url() . '/login');
        }

        // Data yang akan dikirim ke tampilan
        $data['judul'] = 'Pemusnahan Barang';

        // Mengambil data pemusnahan barang dengan join ke tabel barang
        $data['model'] = $this->modelPemusnahanBarang
            ->join('barang', 'barang.id_barang=pemusnahan_barang.id_barang', 'left')
            ->findAll();

        // Menampilkan tampilan pemusnahan barang
        echo view('/pemusnahan_barang/index', $data);
    }

    // Menampilkan halaman tambah Pemusnahan Barang.
    public function tambah()
    {
        // Data yang akan dikirim ke tampilan
        $data['judul'] = 'Tambah Pemusnahan Barang';

        // Mengambil daftar barang
        $data['macamBarang'] = $this->modelBarang
            ->findAll();

        // Menampilkan tampilan tambah pemusnahan barang
        echo view('pemusnahan_barang/tambah', $data);
    }

    // Menyimpan data Pemusnahan Barang ke database.
    public function insertData()
    {
        // Mengambil file yang diupload
        $file = $this->request->getFile('bukti_pemusnahan');
        $fileName = time() . $file->getClientName();
        if ($file->isValid() && !$file->hasMoved()) {
            $randomName = substr(md5(uniqid()), 0, 4); // Generate random name
            $fileName = $randomName;
        }
        // Memindahkan file yang diupload ke folder uploads
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/uploads/pemusnahan_barang/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            // Jika upload gagal, menggunakan gambar dummy
            $dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
            $fileName = 'dummy.png';
            copy($dummyImagePath, ROOTPATH . 'public/uploads/' . $fileName);
            session()->setFlashData('message', 'Gagal Upload');
        }

        // Data yang akan disimpan ke database
        $data = array(
            'id_barang' => $this->request->getPost('id_barang'),
            'tgl_pemusnahan' => $this->request->getPost('tgl_pemusnahan'),
            'bukti_pemusnahan' => $fileName,
            'waktu' => $this->request->getPost('waktu'),
            'alasan' => $this->request->getPost('alasan'),
        );

        // Menyimpan data ke database
        if ($this->modelPemusnahanBarang->save($data)) {
            // Jika penyimpanan berhasil, tampilkan notifikasi sukses.
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
        } else {
            // Jika penyimpanan gagal, tampilkan notifikasi gagal.
            session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
        }

        // Redirect kembali ke halaman Pemusnahan Barang
        return redirect()->to(base_url() . '/pemusnahan_barang');
    }

    // Menampilkan halaman edit Pemusnahan Barang.
    public function edit()
    {
        // Mengambil ID pemusnahan barang dari URL
        $id = $this->request->uri->getSegment(3);

        // Data yang akan dikirim ke tampilan
        $data['id'] = $id;
        $data['judul'] = 'Edit Pemusnahan Barang';

        // Mengambil data pemusnahan barang yang akan diedit
        $data['model'] = $this->modelPemusnahanBarang
            ->where('id_musnah', $id)
            ->find()[0];

        // Menampilkan tampilan edit pemusnahan barang
        echo view('pemusnahan_barang/edit', $data);
    }

    // Mengupdate data Pemusnahan Barang ke database.
    public function updateData()
    {
        // Mengambil ID pemusnahan barang yang akan diupdate
        $id = $this->request->getPost('id_musnah');

        // Mengambil data pemusnahan barang yang sudah ada di database
        $existingData = $this->modelPemusnahanBarang->find($id);

        // Mengambil file yang diupload
        $file = $this->request->getFile('bukti_pemusnahan');
        $fileName = $existingData['bukti_pemusnahan'];
        if ($file->isValid() && !$file->hasMoved()) {
            $randomName = substr(md5(uniqid()), 0, 4); // Generate random name
            $fileName = $randomName;
        }
        // Memindahkan file yang diupload ke folder uploads
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/uploads/pemusnahan_barang/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            session()->setFlashData('message', 'Gagal Upload');
        }

        if ($existingData && $fileName !== null) { // Periksa jika $existingData ada
            $oldFilePath = ROOTPATH . 'public/uploads/pemusnahan_barang/' . $existingData['bukti_pemusnahan'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath); // Hapus file gambar sebelumnya
            }
        }

        // Data yang akan diupdate ke database
        $data = array(
            'id_musnah' => $this->request->getPost('id_musnah'),
            'tgl_pemusnahan' => $this->request->getPost('tgl_pemusnahan'),
            'bukti_pemusnahan' => $file->isValid() && !$file->hasMoved() ? $file->getName() : $existingData['bukti_pemusnahan'],
            'waktu' => $this->request->getPost('waktu'),
            'alasan' => $this->request->getPost('alasan'),
        );

        // Mengupdate data ke database
        if ($this->modelPemusnahanBarang->save($data)) {
            // Jika penyimpanan berhasil, tampilkan notifikasi sukses.
            session()->setFlashdata('success', 'Data berhasil diedit');
        } else {
            // Jika penyimpanan gagal, tampilkan notifikasi gagal.
            session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
        }

        // Redirect kembali ke halaman Pemusnahan Barang
        return redirect()->to(base_url() . '/pemusnahan_barang');
    }

    // Menghapus data Pemusnahan Barang dari database.
    public function delete()
    {
        // Mengambil ID pemusnahan barang yang akan dihapus dari URL
        $id = $this->request->uri->getSegment(3);

        // Menghapus data dari database
        if ($this->modelPemusnahanBarang->delete($id)) {
            // Jika penghapusan berhasil, tampilkan notifikasi sukses.
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            // Jika penghapusan gagal, tampilkan notifikasi gagal.
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
        }

        // Redirect kembali ke halaman Pemusnahan Barang
        return redirect()->to(base_url() . '/pemusnahan_barang');
    }

    // Mengunduh file bukti pemusnahan barang.
    public function download($id)
    {
        // Mengambil data pemusnahan barang berdasarkan ID
        $berkas = new PemusnahanBarangModel();
        $data = $berkas->find($id);

        // Jika data ditemukan, redirect ke URL berkas
        if ($data) {
            return redirect()->to(base_url() . 'uploads/pemusnahan_barang/' . $data['bukti_pemusnahan']);
        } else {
            // Jika data tidak ditemukan, atur respon 404
            return $this->response->setStatusCode(404);
        }
    }
}
