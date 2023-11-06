<?php

namespace App\Controllers;

// namespace App\Models;

use App\Models\BarangModel;
use TCPDF;

// use App\Controllers\Mailjet;
// use App\Controllers\PeminjamanBarangModel;
use App\Models\PeminjamanBarangModel;
use App\Models\ReferensiModel;
use App\Models\UserModel;

// use App\Models\PeminjamanBarangModel as ModelsPeminjamanBarangModel;

use CodeIgniter\Controller;

class PeminjamanBarangController extends BaseController

{
	protected $modelPeminjamanBarang;
	protected $modelBarang;
	protected $modelReferensi;

	// Function ini menginisiasi objek dari model yang dibutuhkan
	public function __construct()
	{
		// Inisiasi objek dari Mailjet Controller
		$this->modelBarang = new BarangModel();

		// Inisiasi objek dari PeminjamanBarangModel
		$this->modelPeminjamanBarang = new PeminjamanBarangModel();
		$this->modelReferensi = new ReferensiModel();
	}
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
		$data['model'] = $this->getDataPeminjaman();

		// Ambil data referensi
		$data['id_referensi'] = $this->modelReferensi
			->findAll();

		echo view('peminjaman_barang/index', $data);
	}

	public function getDataPeminjaman()
	{
		$model = $this->modelPeminjamanBarang
			->join('fakultas', 'fakultas.id_fakultas=peminjaman_barang.id_fakultas', 'left')
			->join('prodi', 'prodi.id_prodi=peminjaman_barang.id_prodi', 'left')
			->findAll();
		$data = [];

		foreach ($model as $key => $value) {
			$idBarangArray = explode(',', $value["id_barang"]);
			$namaBarangArray = $this->modelBarang->whereIn('id_barang', $idBarangArray)->findAll();
			$value["nama_barang"] = $namaBarangArray; // Tambahkan data nama_barang ke $value
			$data[] = $value; // Tambahkan $value ke array $data
		}

		return $data;
	}

	public function tambah()
	{
		$data['judul'] = 'Tambah Peminjaman Barang';
		$data['macamBarang1'] = $this->modelBarang
			->findAll();
		$temp = [];
		foreach ($data['macamBarang1'] as $key => $value) {
			$temp[$value['id_barang']] = $value;
		}
		$data['macamBarang'] = $temp;
		echo view('peminjaman_barang/tambah', $data);
	}

	public function getData()
	{
		$barangModel = new BarangModel();
		$peminjamanBarangModel = new PeminjamanBarangModel();

		$dataBarang =
			$this->modelBarang
			->where('kondisi', 'baik')
			->where('status', '')
			->where('sub_kategori', 'Komputer')
			->find();
		$dataPeminjaman = $peminjamanBarangModel->findAll();

		return json_encode(['dataBarang' => $dataBarang, 'dataPeminjaman' => $dataPeminjaman]);
	}

	public function tambah_internal()
	{

		$data['judul'] = 'Tambah Peminjaman Barang';
		$data['id_fakultas'] = $this->modelFakultas
			->findAll();
		$data['id_prodi'] = $this->modelProdi
			->findAll();
		$data['id_ruangan'] = $this->modelRuangan
			->findAll();
		$data['model'] = $this->modelPeminjamanRuangan
			->join('fakultas', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
			->join('prodi', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
			->join('ruangan', 'ruangan.id_ruangan=peminjaman_ruangan.id_ruangan', 'left')
			->findAll();
		$data['barang'] = $this->modelBarang->findAll();
		echo view('peminjaman_barang/tambah_internal', $data);
	}

	public function tambah_eksternal()
	{
		$data['judul'] = 'Tambah Peminjaman Barang';
		$data['id_fakultas'] = $this->modelFakultas
			->findAll();
		$data['id_prodi'] = $this->modelProdi
			->findAll();
		$data['id_ruangan'] = $this->modelRuangan
			->findAll();
		$data['id_referensi'] = $this->modelReferensi->findAll();
		$data['model'] = $this->modelPeminjamanRuangan
			->join('fakultas', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
			->join('prodi', 'fakultas.id_fakultas=peminjaman_ruangan.id_fakultas', 'left')
			->join('ruangan', 'ruangan.id_ruangan=peminjaman_ruangan.id_ruangan', 'left')
			->findAll();
		$data['barang'] = $this->modelBarang->findAll();
		echo view('peminjaman_barang/tambah_eksternal', $data);
	}

	public function pinjam()
	{
		$data['judul'] = 'Tambah Peminjaman Barang';
		$data['id_barang'] = $this->modelPeminjamanBarang
			->findAll();

		$data['model'] = $this->modelPeminjamanBarang
			->join('barang', 'barang.id_barang=peminjaman_barang.id_barang', 'left')
			->findAll();

		echo view('peminjaman_barang/pinjam', $data);
	}

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

		//Loop melalui data yang dipilih dan edit dalam database
		$idBarang = explode(',', $this->request->getPost('selectedItems'));
		foreach ($idBarang as $id) {
			// Misalnya, kita hanya membutuhkan ID untuk pengeditan
			$this->modelBarang->save([
				'id_barang' => $id,
				'status' => 'diajukan'
			]);
		}

		$barang = $this->request->getPost('selectedItems');
		$data = [
			'id_barang' => $barang,
			'id_fakultas' => $this->request->getPost('id_fakultas'), // Pastikan ini benar
			'id_prodi' => $this->request->getPost('id_prodi'), // Pastikan ini benar
			'tgl_peminjaman' => $this->request->getPost('tanggal_mulai'),
			'tgl_pengembalian' => $this->request->getPost('tanggal_selesai'),
			'asal_peminjam' => $this->request->getPost('asal_peminjam'),
			'organisasi' => $this->request->getPost('organisasi'),
			'nama_peminjam' => $this->request->getPost('nama_peminjam'),
			'email_peminjam' => $this->request->getPost('email_peminjam'),
			'no_hp' => $this->request->getPost('no_hp'),
			'bukti_peminjaman' => $fileName,
			'biaya_peminjaman' => $this->request->getPost('biaya_peminjaman'),
			'keterangan' => $this->request->getPost('keterangan')
		];



		if ($this->modelPeminjamanBarang->save($data)) {
			// Jika penyimpanan berhasiif( $this->input->post('editcustomer') != false )
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
			session()->set('status', 'Berhasil');
		} else {
			// Jika penyimpanan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}
		return redirect()->to(base_url() . 'peminjaman_berhasil');
		// Simpan data peminjaman
	}

	public function konfirmasi()
	{
		$id = $this->request->uri->getSegment(3);
		$this->modelPeminjamanBarang->save([
			'id_peminjaman_barang' => $id,
			'status' => 'konfirmasi'
		]);
		// $this->email();
		return redirect()->to(base_url() . '/peminjaman_barang');
	}

	public function return()
	{
		$id = $this->request->uri->getSegment(3);
		$data['model'] = $this->modelPeminjamanBarang
			->where('id_peminjaman_barang', $id)
			->findAll();
		foreach ($data['model'] as $model) {
			$idBarang = explode(',', $model["id_barang"]);
			$this->modelBarang->save([
				'id_barang' => $idBarang,
				'status' => ''
			]);
		}
		$this->modelPeminjamanBarang->save([
			'id_peminjaman_barang' => $id,
			'status' => 'dikembalikan'
		]);
		return redirect()->to(base_url() . '/peminjaman_barang');
	}

	public function getProdi($categoryId)
	{
		$prodiModel = new \App\Models\ProdiModel();
		$prodi = $prodiModel->where('id_fakultas', $categoryId)->findAll();

		return json_encode($prodi);
	}

	public function email()
	{
		if (isset($_POST['send-email'])) {
			$toEmail = $_POST['to-email'];
			$subject = "Konfirmasi Peminjaman";
			$message = "Terima kasih atas konfirmasinya.";

			$mailjet_api_key = "b1c7cdfc34048c53b27fc385388d367d";
			$mailjet_secret_key = "b422ea49fbec241fc4537ae586a4626c";

			$email_data = [
				'Messages' => [
					[
						'From' => [
							'Email' => 'sitarisdeveloper@email.com',
							'Name' => 'SITARIS DEV'
						],
						'To' => [
							[
								'Email' => $toEmail,
								'Name' => 'Recipient Name'
							]
						],
						'Subject' => $subject,
						'TextPart' => $message
					]
				]
			];

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($email_data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"Content-Type: application/json"
			));
			curl_setopt($ch, CURLOPT_USERPWD, "$mailjet_api_key:$mailjet_secret_key");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$response = curl_exec($ch);

			if ($response === false) {
				echo "Terjadi kesalahan saat mengirim email: " . curl_error($ch);
			} else {
				$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				if ($http_status === 200) {
					$response_data = json_decode($response, true);
					if (isset($response_data['Messages'][0]['Status']) && $response_data['Messages'][0]['Status'] === 'success') {
						echo "Email berhasil dikirim!";
					} else {
						echo "Gagal mengirim email: " . $response;
					}
				} else {
					echo "Terjadi kesalahan HTTP: " . $http_status;
				}
			}

			curl_close($ch);
		}
	}


	public function edit()
	{
		$id = $this->request->uri->getSegment(3);
		$data['id'] = $id;
		$data['judul'] = 'Edit Peminjaman Barang';
		// $data['url'] = 'Peminjaman_barang/ubah';
		// $data['key'] = 'id_musnah';
		$data['model'] = $this->modelPeminjamanBarang
			->where('id_peminjaman_barang', $id)
			->find()[0];
		// print_r($data['model']);
		// exit;

		echo view('peminjaman_barang/edit', $data);
	}

	public function updateData()
	{


		$data = array(
			'id_peminjaman_barang' => $this->request->getPost('id_peminjaman_barang'),
			'id_barang' => $this->request->getPost('id_barang'),
			'tgl_peminjaman' => $this->request->getPost('tgl_peminjaman'),
			'tgl_pengembalian' => $this->request->getPost('tgl_pengembalian'),
			'asal_peminjam' => $this->request->getPost('asal_peminjam'),
			'organisasi' => $this->request->getPost('organisasi'),
			'nama_peminjam' => $this->request->getPost('nama_peminjam'),
			'biaya_peminjaman' => $this->request->getPost('biaya_peminjaman'),
			'keterangan' => $this->request->getPost('keterangan'),
		);


		$file = $this->request->getFile('bukti_peminjaman');
		// print_r($file);
		if (isset($file)) {

			$fileName = time() . $file->getClientName();
			if ($file->isValid() && !$file->hasMoved()) {
				$file->move(ROOTPATH . 'public/uploads/', $fileName);
				session()->setFlashData('message', 'Berhasil Upload');
				$data['bukti_peminjaman'] = $fileName;
			} else {
				session()->setFlashData('message', 'Gagal Upload');
			}
		}

		// print_r($data);
		// exit;

		$this->modelPeminjamanBarang->save($data);
		return redirect()->to(base_url() . '/peminjaman_barang');
	}

	public function delete()
	{
		$id = $this->request->uri->getSegment(3);
		$id = $this->request->uri->getSegment(3);
		$data['model'] = $this->modelPeminjamanBarang
			->where('id_peminjaman_barang', $id)
			->findAll();
		foreach ($data['model'] as $model) {
			$idBarang = explode(',', $model["id_barang"]);
			$this->modelBarang->save([
				'id_barang' => $idBarang,
				'status' => ''
			]);
		}
		$this->modelPeminjamanBarang->save([
			'id_peminjaman_barang' => $id,
			'status' => 'dibatalkan'
		]);
		if ($this->modelPeminjamanBarang->delete($id)) {
			// Jika penghapusan berhasil, tampilkan notifikasi sukses.
			session()->setFlashdata('success', 'Data berhasil dihapus');
		} else {
			// Jika penghapusan gagal, tampilkan notifikasi gagal.
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}
		return redirect()->to(base_url() . '/peminjaman_barang');
	}

	// Mendownload berkas bukti peminjaman ruangan.
	public function download($id)
	{
		$data = $this->modelPeminjamanBarang->find($id);

		if ($data) {
			return redirect()->to(base_url() . 'uploads/peminjaman/' . $data['bukti_peminjaman']);
		} else {
			// Berkas tidak ditemukan, atur respon sesuai kebutuhan
			return $this->response->setStatusCode(404);
		}
	}


	// public function cetak($id)
	//     {
	//         $id = $this->request->uri->getSegment(3);
	//         $data['model'] = $this->modelPeminjamanBarang->where(["id_barang" => $id])->findAll();    

	//         $userModel = new UserModel();
	//         $kalabUsers = $userModel->getUsersByRole('kalab');
	//         $kalabNames = [];
	//         $kalabNips = [];

	//         foreach ($kalabUsers as $user) {
	//             $kalabNames[] = $user['nama'];
	//             $kalabNips[] = $user['no_identitas'];
	//         }

	//         $data['kalabNames'] = $kalabNames;
	//         $data['kalabNips'] = $kalabNips;

	//         $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
	//         $pdf->SetCreator(PDF_CREATOR);
	//         $pdf->SetAuthor('Dea Venditama');
	//         $pdf->SetTitle('Peminjaman Barang');
	//         $pdf->SetSubject('Peminjaman Barang');
	//         $pdf->setPrintHeader(false);
	//         $pdf->setPrintFooter(false);

	//         $pdf->AddPage();
	//         $html = view('peminjaman_barang/cetak', $data);
	//         $pdf->writeHTML($html, true, false, true, false, '');

	//         $this->response->setContentType('application/pdf');
	//         $pdf->Output('Peminjaman Barang.pdf', 'I');
	//     }}

	public function cetak()
	{
		ini_set('max_execution_time', 360); // Ubah menjadi waktu yang sesuai

		$id = $this->request->uri->getSegment(3);
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
		$data['model'] = $this->modelPeminjamanBarang->findAll();

		// Create the TCPDF instance
		$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('SITARIS DEV');
		$pdf->SetTitle('Cetak QR Code');
		$pdf->SetSubject('Barang');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// Add a page with letterhead content
		$pdf->AddPage();

		// Get the view content
		$html = view('peminjaman_barang/cetak', $data);

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
