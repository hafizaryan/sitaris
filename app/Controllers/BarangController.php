<?php

namespace App\Controllers;

use TCPDF;
use App\Models\BarangModel;
use App\Models\RuanganModel;
use App\Models\PendanaanModel;
use App\Models\UserModel;

/**
 * Class BarangController
 * 
 * Controller ini mengelola fitur-fitur terkait barang.
 */
class BarangController extends BaseController
{

	protected $modelBarang;
	protected $modelPendanaan;
	protected $modelRuangan;
	protected $modelUser;

	public function __construct()
	{
		// Inisialisasi model-model yang diperlukan
		$this->modelBarang = new BarangModel();
		$this->modelPendanaan = new PendanaanModel();
		$this->modelRuangan = new RuanganModel();
		$this->modelUser = new UserModel();
	}

	// Fungsi Index
	public function index()
	{
		// Cek apakah pengguna telah masuk. Jika tidak, alihkan ke halaman login.
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}

		// Simpan role_user pada session di variabel role 
		$role = session('userData')['role_user'];

		// Jika role_user Kaprodi dan Sekprodi mengakses halaman ini, alihkan ke halaman index 
		if ($role == "Kaprodi" || $role == "Sekprodi") {
			return redirect()->to(base_url() . 'index');
		}

		// Menyiapkan data untuk tampilan halaman index barang
		$data['judul'] = 'Barang';
		$data['data_pendanaan'] = $this->modelPendanaan->findAll();
		$data['model'] = $this->modelBarang
			->join('pendanaan', 'pendanaan.id_pendanaan = barang.id_pendanaan', 'left')
			->join('ruangan', 'ruangan.id_ruangan = barang.id_ruangan', 'left')
			->findAll();

		// Menampilkan tampilan halaman index barang dengan data yang disiapkan
		echo view('/barang/index', $data);
	}

	// Fungsi Index untuk Labor RSI
	public function indexRsi()
	{
		// Cek apakah pengguna telah masuk. Jika tidak, alihkan ke halaman login.
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}

		// Menyiapkan data untuk tampilan halaman index barang (Labor RSI)
		$data['judul'] = 'Barang Labor RSI';
		$data['data_pendanaan'] = $this->modelPendanaan->findAll();
		$data['model'] = $this->modelBarang
			->join('pendanaan', 'pendanaan.id_pendanaan = barang.id_pendanaan', 'left')
			->join('ruangan', 'ruangan.id_ruangan = barang.id_ruangan', 'left')
			->findAll();

		// Menampilkan tampilan halaman index barang (Labor RSI) dengan data yang disiapkan
		echo view('/barang/labor_rsi', $data);
	}

	// Fungsi Index untuk Labor SE
	public function indexSe()
	{
		// Cek apakah pengguna telah masuk. Jika tidak, alihkan ke halaman login.
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}

		// Menyiapkan data untuk tampilan halaman index barang (Labor SE)
		$data['judul'] = 'Barang Labor SE';
		$data['data_pendanaan'] = $this->modelPendanaan->findAll();

		$data['model'] = $this->modelBarang
			->join('pendanaan', 'pendanaan.id_pendanaan = barang.id_pendanaan', 'left')
			->join('ruangan', 'ruangan.id_ruangan = barang.id_ruangan', 'left')
			->findAll();

		// Menampilkan tampilan halaman index barang (Labor SE) dengan data yang disiapkan
		echo view('/barang/labor_se', $data);
	}

	// Fungsi Index untuk Labor INT
	public function indexInt()
	{
		// Cek apakah pengguna telah masuk. Jika tidak, alihkan ke halaman login.
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}

		// Menyiapkan data untuk tampilan halaman index barang (Labor INT)
		$data['judul'] = 'Barang Labor INT';
		$data['data_pendanaan'] = $this->modelPendanaan->findAll();
		$data['model'] = $this->modelBarang

			->join('pendanaan', 'pendanaan.id_pendanaan = barang.id_pendanaan', 'left')
			->join('ruangan', 'ruangan.id_ruangan = barang.id_ruangan', 'left')
			->findAll();

		// Menampilkan tampilan halaman index barang (Labor INT) dengan data yang disiapkan
		echo view('/barang/labor_int', $data);
	}

	// Fungsi Tampilan Tambah
	public function tambah()
	{
		$id = 0;
		$data['id'] = $id;
		$data['judul'] = 'Tambah Barang';
		$data['url'] = 'barang/tambah';
		$data['key'] = 'id_barang';
		$data['model'] = $this->modelBarang
			->find();
		$data['id_barang'] = $this->modelBarang
			->findAll();
		$data['macamPendanaan'] = $this->modelPendanaan
			->findAll();
		$data['macamRuangan'] = $this->modelRuangan
			->findAll();

		echo view('barang/tambah', $data);
	}

	// Fungsi Memasukkan Data ke Database
	public function insertData()
	{
		$file = $this->request->getFile('gambar_barang');
		$originalFileName = $file->getClientName();
		$extension = pathinfo($originalFileName, PATHINFO_EXTENSION);

		if ($file->isValid() && !$file->hasMoved()) {
			$randomName = substr(md5(uniqid()), 0, 4); // Generate random name
			$fileName = $randomName . '.' . $extension;

			$file->move(ROOTPATH . 'public/uploads/', $fileName);
			session()->setFlashData('message', 'Berhasil Upload');
		} else {
			// Mengisi gambar dummy
			$dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
			$fileName = 'dummy.png';
			copy($dummyImagePath, ROOTPATH . 'public/uploads/' . $fileName);
			session()->setFlashData('message', 'Gagal Upload');
		}

		$deskripsi = $this->request->getPost('deskripsi');
		$spek_barang = $this->request->getPost('spek_barang');

		// Memeriksa apakah deskripsi atau spesifikasi kosong, jika iya, ganti dengan '-'
		if (empty($deskripsi)) {
			$deskripsi = '-';
		}

		if (empty($spek_barang)) {
			$spek_barang = '-';
		}

		$data = array(
			'id_pendanaan' => $this->request->getPost('id_pendanaan'),
			'id_ruangan' => $this->request->getPost('id_ruangan'),
			'nama_ruangan' => $this->request->getPost('nama_ruangan'),
			'tahun_barang' => $this->request->getPost('tahun_barang'),
			'kategori_barang' => $this->request->getPost('kategori_barang'),
			'sub_kategori' => $this->request->getPost('sub_kategori'),
			'nama_barang' => $this->request->getPost('nama_barang'),
			'spek_barang' => $spek_barang,
			'kondisi' => $this->request->getPost('kondisi'),
			'tgl_masuk_barang' => $this->request->getPost('tgl_masuk_barang'),
			'gambar_barang' => $fileName,
			'waktu_input' => $this->request->getPost('waktu_input'),
			'deskripsi' => $deskripsi,
			'user_input' => $this->request->getPost('user_input'),
			'user_edit' => $this->request->getPost('user_edit'),
			'tgl_edit' => $this->request->getPost('tgl_edit'),
		);
		
		if ($this->modelBarang->save($data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}

		return redirect()->to(base_url() . 'barang');
	}

	// Fungsi Tampilan Edit
	public function edit()
	{
		$id = $this->request->uri->getSegment(3);
		$data['id'] = $id;
		$data['judul'] = 'Edit Barang';
		$data['url'] = 'barang/edit';
		$data['key'] = 'id_barang';
		$data['model'] = $this->modelBarang
			->where($data['key'], $id)
			->find()[0];

		$data['macamPendanaan'] = $this->modelPendanaan
			->findAll();
		$data['macamRuangan'] = $this->modelRuangan
			->findAll();

		echo view('barang/edit', $data);
	}

	// Fungsi Update Data ke Database
	public function updateData()
	{
		$id = $this->request->getPost('id_barang');
		$existingData = $this->modelBarang->find($id);

		$file = $this->request->getFile('gambar_barang');
		$fileName = $existingData['gambar_barang'];
		if ($file->isValid() && !$file->hasMoved()) {
			$randomName = substr(md5(uniqid()), 0, 4); // Generate random name
			$fileName = $randomName;
		}
		$data = array(
			'id_barang' => $id,
			'id_pendanaan' => $this->request->getPost('id_pendanaan'),
			'id_ruangan' => $this->request->getPost('id_ruangan'),
			'nama_ruangan' => $this->request->getPost('nama_ruangan'),
			'tahun_barang' => $this->request->getPost('tahun_barang'),
			'kategori_barang' => $this->request->getPost('kategori_barang'),
			'sub_kategori' => $this->request->getPost('sub_kategori'),
			'nama_barang' => $this->request->getPost('nama_barang'),
			'spek_barang' => $this->request->getPost('spek_barang'),
			'deskripsi' => $this->request->getPost('deskripsi'),
			'kondisi' => $this->request->getPost('kondisi'),
			'tgl_masuk_barang' => $this->request->getPost('tgl_masuk_barang'),
			'user_edit' => $this->request->getPost('user_edit'),
			'tgl_edit' => $this->request->getPost('tgl_edit'),
		);

		$file = $this->request->getFile('gambar_barang');
		if (isset($file)) {
			if ($file->isValid() && !$file->hasMoved()) {
				$fileName = time() . $file->getClientName();
				$file->move(ROOTPATH . 'public/uploads/', $fileName);
				session()->setFlashData('message', 'Berhasil Upload');
				$data['gambar_barang'] = $fileName;

				// Hapus gambar sebelumnya jika pengguna mengganti gambar
				if ($fileName !== null && !empty($gambarBarang['gambar_barang'])) {
					$oldFilePath = ROOTPATH . 'public/uploads/' . $gambarBarang['gambar_barang'];
					if (file_exists($oldFilePath)) {
						unlink($oldFilePath); // Hapus file gambar sebelumnya
					}
				}
			} else {
				session()->setFlashData('message', 'Gagal Upload');
			}
		}

		if ($this->modelBarang->update($id, $data)) {
			// Jika penyimpanan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil diedit');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
		}
		return redirect()->to(base_url() . '/barang');
	}

	// Fungsi Hapus
	public function delete()
	{
		$id = $this->request->uri->getSegment(3);

		if ($this->modelBarang->delete($id)) {
			// Jika hapus berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil dihapus.');
		} else {
			// Jika hapus gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}

		return redirect()->to(base_url() . '/barang');
	}

	// Fungsi Cetak PDF Ruangan
	public function cetakRuangan($id)
	{

		$id = $this->request->uri->getSegment(3);
		$data['model'] = $this->modelBarang->where(["id_ruangan" => $id])->findAll();
		$modelRuangan = new RuanganModel();
		$data['ruangan'] = $modelRuangan->where('id_ruangan', $id)->findAll();
		$data['ruangan'][0]['nama_ruangan'];
		$userModel = new UserModel();

		// Dapatkan pengguna dengan peran "kalab"
		$kalabUsers = $userModel->getUsersByRole('kalab');

		// Simpan nama-nama pengguna "kalab" dan nomor identitas (NIP)
		$kalabNames = [];
		$kalabNips = [];

		foreach ($kalabUsers as $user) {
			$kalabNames[] = $user['nama'];
			$kalabNips[] = $user['no_identitas'];
		}

		$data['kalabNames'] = $kalabNames;
		$data['kalabNips'] = $kalabNips;

		// Create the TCPDF instance

		$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('SITARIS DEV');
		$pdf->SetTitle('Cetak Ruangan');
		$pdf->SetSubject('Barang');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// Add a page with letterhead content
		$pdf->AddPage();
		// Get the view content
		$html = view('barang/cetak_ruangan', $data);

		// Add the main content
		$pdf->writeHTML($html, true, false, true, false, '');

		// Output the PDF
		$this->response->setContentType('application/pdf');
		$pdf->Output('Laporan Data Inventaris Laboratorium.pdf', 'I');
	}

	// Fungsi Cetak PDF Tahun
	public function cetakTahun($id)
	{
		$id = $this->request->uri->getSegment(3);
		$data['model'] = $this->modelBarang->where(["tahun_barang" => $id])->findAll();
		$userModel = new UserModel();

		// Dapatkan pengguna dengan peran "kalab"
		$kalabUsers = $userModel->getUsersByRole('kalab');

		// Simpan nama-nama pengguna "kalab" dan nomor identitas (NIP)
		$kalabNames = [];
		$kalabNips = [];

		foreach ($kalabUsers as $user) {
			$kalabNames[] = $user['nama'];
			$kalabNips[] = $user['no_identitas'];
		}

		$data['kalabNames'] = $kalabNames;
		$data['kalabNips'] = $kalabNips;

		// Create the TCPDF instance
		$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('SITARIS DEV');
		$pdf->SetTitle('Cetak Tahun');
		$pdf->SetSubject('Barang');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// Add a page with letterhead content
		$pdf->AddPage();

		// Get the view content
		$html = view('barang/cetak_tahun', $data);

		// Add the main content
		$pdf->writeHTML($html, true, false, true, false, '');

		// Output the PDF
		$this->response->setContentType('application/pdf');
		$pdf->Output('Laporan Data Inventaris Laboratorium.pdf', 'I');
	}

	// Fungsi Cetak PDF Pendanaan
	public function cetakPendanaan($id)
	{ {
			$id = $this->request->uri->getSegment(3);
			$tahun_barang = $this->request->getGet('tahun_barang');
			$whereCondition = ["id_pendanaan" => $id];

			if ($tahun_barang) {
				$whereCondition["tahun_barang"] = $tahun_barang;
			}

			$data['model'] = $this->modelBarang->where($whereCondition)->findAll();
			$data['model'] = $this->modelBarang->where($whereCondition)->findAll();
			$modelPendanaan = new PendanaanModel();
			$data['pendanaan'] = $modelPendanaan->where('id_pendanaan', $id)->findAll();
			$data['pendanaan'][0]['id_pendanaan'];
			$userModel = new UserModel();

			// Dapatkan pengguna dengan peran "kalab"
			$kalabUsers = $userModel->getUsersByRole('kalab');

			// Simpan nama-nama pengguna "kalab" dan nomor identitas (NIP)
			$kalabNames = [];
			$kalabNips = [];

			foreach ($kalabUsers as $user) {
				$kalabNames[] = $user['nama'];
				$kalabNips[] = $user['no_identitas'];
			}

			$data['kalabNames'] = $kalabNames;
			$data['kalabNips'] = $kalabNips;

			// Create the TCPDF instance
			$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('SITARIS DEV');
			$pdf->SetTitle('Cetak Pendanaan');
			$pdf->SetSubject('Barang');
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);

			// Add a page with letterhead content
			$pdf->AddPage();

			// Get the view content
			$html = view('barang/cetak_pendanaan', $data);

			// Add the main content
			$pdf->writeHTML($html, true, false, true, false, '');

			// Output the PDF
			$this->response->setContentType('application/pdf');
			$pdf->Output('Laporan Data Inventaris Laboratorium.pdf', 'I');
		}
	}
	// Fungsi Cetak PDF Kategori
	public function cetakKategori($id)
	{

		$id = $this->request->uri->getSegment(3);
		$data['model'] = $this->modelBarang->where(["sub_kategori" => $id])->findAll();
		$userModel = new UserModel();

		// Dapatkan pengguna dengan peran "kalab"
		$kalabUsers = $userModel->getUsersByRole('kalab');

		// Simpan nama-nama pengguna "kalab" dan nomor identitas (NIP)
		$kalabNames = [];
		$kalabNips = [];

		foreach ($kalabUsers as $user) {
			$kalabNames[] = $user['nama'];
			$kalabNips[] = $user['no_identitas'];
		}

		$data['kalabNames'] = $kalabNames;
		$data['kalabNips'] = $kalabNips;
		// Create the TCPDF instance
		$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('SITARIS DEV');
		$pdf->SetTitle('Cetak Kategori');
		$pdf->SetSubject('Barang');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// Add a page with letterhead content
		$pdf->AddPage();
		// Get the view content
		$html = view('barang/cetak_kategori', $data);

		// Add the main content
		$pdf->writeHTML($html, true, false, true, false, '');

		// Output the PDF
		$this->response->setContentType('application/pdf');
		$pdf->Output('Laporan Data Inventaris Laboratorium.pdf', 'I');
	}

	// Fungsi Cetak PDF QR Code
	public function cetakQr()
	{
		ini_set('max_execution_time', 360); // Ubah menjadi waktu yang sesuai

		$this->request->uri->getSegment(3);
		$data['model'] = $this->modelBarang->findAll();

		// Create the TCPDF instance
		$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('SITARIS DEV');
		$pdf->SetTitle('Cetak QR Code');
		$pdf->SetSubject('Barang');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// Add a page with letterhead content
		$pdf->AddPage();

		// Get the view content
		$html = view('barang/cetak_qr', $data);

		$pageWidth = $pdf->getPageWidth();
		$contentWidth = 5500; // Sesuaikan dengan lebar konten Anda
		$xPosition = ($pageWidth - $contentWidth) / 2;

		// Add the main content at centered position
		$pdf->SetXY($xPosition, 0); // Anda dapat mengatur posisi Y sesuai kebutuhan
		$pdf->writeHTML($html, true, false, true, false, '');

		// Output the PDF
		$this->response->setContentType('application/pdf');
		$pdf->Output('Laporan Data Inventaris Laboratorium.pdf', 'I');
	}
}
