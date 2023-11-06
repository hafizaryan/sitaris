<?php

namespace App\Controllers;

use App\Models\PeminjamanRuanganModel;
use TCPDF;
use App\Models\RuanganModel;
use App\Models\ReferensiModel;
use App\Models\UserModel;

/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait Peminjaman Ruangan.
 */
class PeminjamanRuanganController extends BaseController
{
    protected $modelPeminjamanRuangan;
    protected $modelRuangan;
    protected $modelReferensi;

    public function __construct()
    {
        $this->modelPeminjamanRuangan = new PeminjamanRuanganModel();
        $this->modelRuangan = new RuanganModel();
        $this->modelReferensi = new ReferensiModel();
    }

    //  Menampilkan halaman utama Peminjaman Ruangan.
    public function index()
    {
        if (session('userData')['role_user'] == "Aslab") {
            return redirect()->to(base_url() . 'index');
        }
        // Cek apakah pengguna sudah login
        if (!isset(session('userData')['username'])) {
            return redirect()->to(base_url() . '/login');
        }

        $data['judul'] = 'Peminjaman Ruangan';

        // Ambil data peminjaman ruangan dengan join ke tabel lain
        $data['model'] = $this->modelPeminjamanRuangan
            ->join('fakultas', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
            ->join('prodi', 'prodi.id_prodi=peminjaman_ruangan.id_prodi', 'left')
            ->join('ruangan', 'ruangan.id_ruangan=peminjaman_ruangan.id_ruangan', 'left')
            ->findAll();

        // Ambil data referensi
        $data['id_referensi'] = $this->modelReferensi
            ->findAll();

        echo view('peminjaman_ruangan/index', $data);
    }

    // Menampilkan halaman form untuk menambah peminjaman ruangan.
    public function pinjam()
    {
        $data['judul'] = 'Tambah Peminjaman Ruangan';

        // Ambil data fakultas, prodi, dan ruangan
        $data['id_fakultas'] = $this->modelFakultas->findAll();
        $data['id_prodi'] = $this->modelProdi->findAll();
        $data['id_ruangan'] = $this->modelRuangan->findAll();

        // Ambil data peminjaman ruangan dengan join ke tabel lain
        $data['model'] = $this->modelPeminjamanRuangan
            ->join('fakultas', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
            ->join('prodi', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
            ->join('ruangan', 'ruangan.id_ruangan=peminjaman_ruangan.id_ruangan', 'left')
            ->findAll();

        echo view('peminjaman_ruangan/pinjam', $data);
    }

    // Menampilkan halaman form untuk menambah peminjaman ruangan internal.
    public function tambah_internal()
    {
        $data['judul'] = 'Tambah Peminjaman Ruangan';

        // Ambil data fakultas, prodi, dan ruangan
        $data['id_fakultas'] = $this->modelFakultas->findAll();
        $data['id_prodi'] = $this->modelProdi->findAll();
        $data['id_ruangan'] = $this->modelRuangan->findAll();

        // Ambil data peminjaman ruangan dengan join ke tabel lain
        $data['model'] = $this->modelPeminjamanRuangan
            ->join('fakultas', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
            ->join('prodi', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
            ->join('ruangan', 'ruangan.id_ruangan=peminjaman_ruangan.id_ruangan', 'left')
            ->findAll();

        echo view('peminjaman_ruangan/tambah_internal', $data);
    }

    // halaman form untuk menambah peminjaman ruangan eksternal.
    public function tambah_eksternal()
    {
        $data['judul'] = 'Tambah Peminjaman Ruangan';

        // Ambil data fakultas, prodi, ruangan, dan referensi
        $data['id_fakultas'] = $this->modelFakultas->findAll();
        $data['id_prodi'] = $this->modelProdi->findAll();
        $data['id_ruangan'] = $this->modelRuangan->findAll();
        $data['id_referensi'] = $this->modelReferensi->findAll();

        // Ambil data peminjaman ruangan dengan join ke tabel lain
        $data['model'] = $this->modelPeminjamanRuangan
            ->join('fakultas', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
            ->join('prodi', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
            ->join('ruangan', 'ruangan.id_ruangan=peminjaman_ruangan.id_ruangan', 'left')
            ->findAll();

        echo view('peminjaman_ruangan/tambah_eksternal', $data);
    }

    // Menyimpan data peminjaman ruangan ke dalam database.
    public function insertData()
    {
        // Mendapatkan file bukti peminjaman
        $file = $this->request->getFile('bukti_peminjaman');
        $fileName = time() . $file->getClientName();

        if ($file->isValid() && !$file->hasMoved()) {
            // Jika file valid, pindahkan ke folder uploads
            $file->move(ROOTPATH . 'public/uploads/peminjaman/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            // Jika gagal, gunakan gambar dummy
            $dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
            $fileName = 'dummy.png';
            copy($dummyImagePath, ROOTPATH . 'public/uploads/' . $fileName);
            session()->setFlashData('message', 'Gagal Upload');
        }

        // Data peminjaman yang akan disimpan
        $data = [
            'id_fakultas' => $this->request->getPost('id_fakultas'),
            'id_prodi' => $this->request->getPost('id_prodi'),
            'id_ruangan' => $this->request->getPost('id_ruangan'),
            'asal_peminjam' => $this->request->getPost('asal_peminjam'),
            'organisasi' => $this->request->getPost('organisasi'),
            'nama_peminjam' => $this->request->getPost('nama_peminjam'),
            'email_peminjam' => $this->request->getPost('email_peminjam'),
            'no_hp' => $this->request->getPost('no_hp'),
            'tgl_peminjaman' => $this->request->getPost('tgl_peminjaman'),
            'lama_peminjaman' => $this->request->getPost('lama_peminjaman'),
            'bukti_peminjaman' => $fileName,
            'biaya_peminjaman' => $this->request->getPost('biaya_peminjaman'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if ($this->modelPeminjamanRuangan->save($data)) {
            // Jika penyimpanan berhasil, tampilkan notifikasi sukses.
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            session()->set('status', 'Sukses');
        } else {
            // Jika penyimpanan gagal, tampilkan notifikasi gagal.
            session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
        }
        return redirect()->to(base_url() . 'peminjaman_berhasil');
    }

    // Menghapus data peminjaman ruangan.
    public function delete()
    {
        if (session('userData')['role_user'] == "Aslab") {
            return redirect()->to(base_url() . 'index');
        }
        $id = $this->request->uri->getSegment(3);
        if ($this->modelPeminjamanRuangan->delete($id)) {
            // Jika penghapusan berhasil, tampilkan notifikasi sukses.
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            // Jika penghapusan gagal, tampilkan notifikasi gagal.
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
        }
        return redirect()->to(base_url() . '/peminjaman_ruangan');
    }

    // Cetak data peminjaman ruangan dalam bentuk PDF.
    public function cetak($id)
    {
        $id = $this->request->uri->getSegment(3);
        $data['model'] = $this->modelPeminjamanRuangan->where(["id_ruangan" => $id])->findAll();
        $modelRuangan = new RuanganModel();
        $data['ruangan'] = $modelRuangan->where('id_ruangan', $id)->findAll();
        $data['ruangan'][0]['nama_ruangan'];

        $userModel = new UserModel();
        $kalabUsers = $userModel->getUsersByRole('kalab');
        $kalabNames = [];
        $kalabNips = [];

        foreach ($kalabUsers as $user) {
            $kalabNames[] = $user['nama'];
            $kalabNips[] = $user['no_identitas'];
        }

        $data['kalabNames'] = $kalabNames;
        $data['kalabNips'] = $kalabNips;

        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dea Venditama');
        $pdf->SetTitle('Peminjaman Ruangan');
        $pdf->SetSubject('Peminjaman Ruangan');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();
        $html = view('peminjaman_ruangan/cetak', $data);
        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');
        $pdf->Output('Peminjaman Ruangan.pdf', 'I');
    }

    // Mendownload berkas bukti peminjaman ruangan.
    public function download($id)
    {
        $berkas = new PeminjamanRuanganModel();
        $data = $berkas->find($id);

        if ($data) {
            return redirect()->to(base_url() . 'uploads/peminjaman/' . $data['bukti_peminjaman']);
        } else {
            // Berkas tidak ditemukan, atur respon sesuai kebutuhan
            return $this->response->setStatusCode(404);
        }
    }
}
