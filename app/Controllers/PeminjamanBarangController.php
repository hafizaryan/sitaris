<?php

namespace App\Controllers;

use App\Models\BarangModel;
use TCPDF;

use App\Models\PeminjamanBarangModel;
use App\Models\ReferensiModel;
use App\Models\UserModel;

class PeminjamanBarangController extends BaseController

{
	protected $modelPeminjamanBarang;
	protected $modelBarang;
	protected $modelReferensi;

	public function __construct()
	{
		$this->modelBarang = new BarangModel();
		$this->modelPeminjamanBarang = new PeminjamanBarangModel();
		$this->modelReferensi = new ReferensiModel();
	}

	public function index()
	{
		if (session('userData')['role_user'] == "Aslab") {
			return redirect()->to(base_url() . 'dashboard');
		}
		if (!isset(session('userData')['username'])) {
			return redirect()->to(base_url() . '/login');
		}
		$data['judul'] = 'Peminjaman Barang';
		$data['model'] = $this->getDataPeminjaman();
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
			$value["nama_barang"] = $namaBarangArray;
			$data[] = $value;
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
		$file = $this->request->getFile('bukti_peminjaman');
		$fileName = time() . $file->getClientName();
		if ($file->isValid() && !$file->hasMoved()) {
			$file->move(ROOTPATH . 'public/uploads/peminjaman/', $fileName);
			session()->setFlashData('message', 'Berhasil Upload');
		} else {
			$dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/dummy.png';
			$fileName = 'dummy.png';
			copy($dummyImagePath, ROOTPATH . 'public/uploads/' . $fileName);
			session()->setFlashData('message', 'Gagal Upload');
		}
		$idBarang = explode(',', $this->request->getPost('selectedItems'));
		foreach ($idBarang as $id) {
			$this->modelBarang->save([
				'id_barang' => $id,
				'status' => 'diajukan'
			]);
		}
		$barang = $this->request->getPost('selectedItems');
		$data = [
			'id_barang' => $barang,
			'id_fakultas' => $this->request->getPost('id_fakultas'),
			'id_prodi' => $this->request->getPost('id_prodi'),
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
			session()->setFlashdata('success', 'Data berhasil ditambahkan');
			session()->set('status', 'Berhasil');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
		}
		return redirect()->to(base_url() . 'peminjaman_berhasil');
	}

	public function konfirmasi()
	{
		$id = $this->request->uri->getSegment(3);
		$this->modelPeminjamanBarang->save([
			'id_peminjaman_barang' => $id,
			'status' => 'konfirmasi'
		]);
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
		$data['model'] = $this->modelPeminjamanBarang
			->where('id_peminjaman_barang', $id)
			->find()[0];
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
			session()->setFlashdata('success', 'Data berhasil dihapus');
		} else {
			session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
		}
		return redirect()->to(base_url() . '/peminjaman_barang');
	}

	public function download($id)
	{
		$data = $this->modelPeminjamanBarang->find($id);
		if ($data) {
			return redirect()->to(base_url() . 'uploads/peminjaman/' . $data['bukti_peminjaman']);
		} else {
			return $this->response->setStatusCode(404);
		}
	}

	public function cetak()
	{
		ini_set('max_execution_time', 360);
		$id = $this->request->uri->getSegment(3);
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
		$data['model'] = $this->modelPeminjamanBarang->findAll();
		$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('SITARIS DEV');
		$pdf->SetTitle('Cetak QR Code');
		$pdf->SetSubject('Barang');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->AddPage();
		$html = view('peminjaman_barang/cetak', $data);
		$pageWidth = $pdf->getPageWidth();
		$contentWidth = 5500;
		$xPosition = ($pageWidth - $contentWidth) / 2;
		$pdf->SetXY($xPosition, 0);
		$pdf->writeHTML($html, true, false, true, false, '');
		$this->response->setContentType('application/pdf');
		$pdf->Output('Laporan Data Inventaris Laboratorium.pdf', 'I');
	}
}
