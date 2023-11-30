<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\DokumentasiModel;
use App\Models\FakultasModel;
use App\Models\GedungModel;
use App\Models\MaintenanceModel;
use App\Models\PemusnahanBarangModel;
use App\Models\PeminjamanBarangModel;
use App\Models\PeminjamanRuanganModel;
use App\Models\PendanaanModel;
use App\Models\ProdiModel;
use App\Models\RuanganModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $modelBarang;
    protected $modelDokumentasi;
    protected $modelFakultas;
    protected $modelGedung;
    protected $modelMaintenance;
    protected $modelPemusnahanBarang;
    protected $modelPeminjamanBarang;
    protected $modelPeminjamanRuangan;
    protected $modelPendanaan;
    protected $modelProdi;
    protected $modelRuangan;
    protected $modelUser;

    public function __construct()
    {
        $this->modelBarang = new BarangModel();
        $this->modelDokumentasi = new DokumentasiModel();
        $this->modelFakultas = new FakultasModel();
        $this->modelGedung = new GedungModel();
        $this->modelMaintenance = new MaintenanceModel();
        $this->modelPemusnahanBarang = new PemusnahanBarangModel();
        $this->modelPeminjamanBarang = new PeminjamanBarangModel();
        $this->modelPeminjamanRuangan = new PeminjamanRuanganModel();
        $this->modelPendanaan = new PendanaanModel();
        $this->modelProdi = new ProdiModel();
        $this->modelRuangan = new RuanganModel();
        $this->modelUser = new UserModel();
    }

    public function dashboard()
    {
        $data['judul'] = 'Beranda';
        $data['barang'] = $this->modelBarang->findAll();
        $data['barang2'] = $this->modelBarang->findAll();
        $data['pendanaan'] = $this->modelPendanaan->findAll();
        $data['dokumentasi'] = $this->modelDokumentasi->findAll();
        $data['pemusnahan_barang'] = $this->modelPemusnahanBarang->findAll();
        $data['peminjaman_barang'] = $this->modelPeminjamanBarang->findAll();
        $data['peminjaman_ruangan'] = $this->modelPeminjamanRuangan->findAll();
        $data['maintenance'] = $this->modelMaintenance->findAll();
        $data['fakultas'] = $this->modelFakultas->findAll();
        $data['prodi'] = $this->modelProdi->findAll();
        $data['gedung'] = $this->modelGedung->findAll();
        $data['ruangan'] = $this->modelRuangan->findAll();
        $data['user'] = $this->modelUser->findAll();
        return view('dashboard', $data);
    }

    public function index2()
    {
        return view('welcome_message');
    }

    public function about()
    {
        return view('about');
    }

    public function aboutLogin()
    {
        return view('pengembang');
    }

    public function tolak()
    {
        return view('404');
    }

    public function peminjamanBerhasil()
    {
        if (session('status') == "Berhasil") {
            return view('peminjaman_berhasil');
        } elseif (session('status') == "Sukses") {
            return view('peminjaman_berhasil');
        }
        return redirect()->to(base_url('/'));
    }

    public function login()
    {
        return view('login');
    }

    public function login2()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $recaptchaSecretKey = '6LdFjE8oAAAAACgdIZk5pslogTPrVGmlbgUd7q2C';
        $recaptchaResponse = $this->request->getPost('recaptcha_response');
        $recaptchaVerification = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse");
        $recaptchaData = json_decode($recaptchaVerification);
        if (!$recaptchaData->success) {
            $error_message = 'Terjadi kesalahan! Silahkan ulangi lagi';
            return redirect()->back()->withInput()->with('error', $error_message);
        }
        $user = $this->modelUser->where('username', $username)->first();
        if (is_null($user) || !password_verify($password, $user['password_hash'])) {
            $error_message = 'Username atau Password anda salah';
            return redirect()->back()->withInput()->with('error', $error_message);
        }
        $userData = [
            'id_user'       => $user["id_user"],
            'nama'          => $user["nama"],
            'foto'          => $user["foto"],
            'no_identitas'  => $user["no_identitas"],
            'username'      => $user["username"],
            'role_user'     => $user["role_user"],
            'email'         => $user["email"]
        ];
        $this->session->set('isLoggedIn', true);
        $this->session->set('userData', $userData);
        $success_message = 'Login berhasil. Selamat Datang, ' . $user["nama"] . '!';
        return redirect()->to(base_url('dashboard'))->with('success', $success_message);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url() . 'login');
    }
}
