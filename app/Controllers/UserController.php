<?php

namespace App\Controllers;

use App\Models\UserModel;

/**
 * Class UserController
 *
 * Controller ini mengelola fitur-fitur terkait pengguna (user).
 */
class UserController extends BaseController
{

    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new UserModel();
    }

    // Fungsi tampilan index
    public function index()
    {
        // Memeriksa apakah pengguna sudah login atau belum. Jika belum, akan diarahkan ke halaman login.
        if (!isset(session('userData')['username'])) {
            return redirect()->to(base_url() . '/login');
        }
        $role = session('userData')['role_user'];

        if ($role == "Aslab" || $role == "Kaprodi" || $role == "Sekprodi") {
            return redirect()->to(base_url() . '404');
        }

        // Cek apakah ada pesan alert yang dikirimkan dari halaman ubahData.
        $alert_message = session()->getFlashdata('alert_message');

        
        // Data untuk halaman index pengguna (user).
        $data['judul'] = 'Pengguna';
        $data['model'] = $this->modelUser->findAll();
        $data['alert_message'] = $alert_message; // Mengirimkan pesan alert ke tampilan.

        // Menampilkan halaman index dengan data yang diperoleh.
        echo view('/user/index', $data);
    }

    // Fungsi halaman profil user
    public function profil()
    {
        // Memeriksa apakah pengguna sudah login atau belum. Jika belum, akan diarahkan ke halaman login.


        // Data untuk halaman profil pengguna (user).
        $data['judul'] = 'Profil';
        $data['model'] = $this->modelUser->findAll();

        // Menampilkan halaman profil dengan data yang diperoleh.
        echo view('/user/profil', $data);
    }

    // Fungsi tampilan tambah user 
    public function tambah()
    {
        $role = session('userData')['role_user'];

        if ($role == "Aslab" || $role == "Kaprodi" || $role == "Sekprodi") {
            return redirect()->to(base_url() . '404');
        }
        // Data untuk halaman tambah pengguna (user).
        $id = 0;
        $data['id'] = $id;
        $data['judul'] = 'Tambah Pengguna';
        $data['url'] = 'user/tambah';
        $data['key'] = 'id_user';
        $data['id'] = $this->modelUser->find();

        // Menampilkan halaman tambah dengan data yang diberikan.
        echo view('user/tambah', $data);
    }

    // Fungsi memasukkan data ke database
    public function insertData()
    {
        $role = session('userData')['role_user'];

        if ($role == "Aslab" || $role == "Kaprodi" || $role == "Sekprodi") {
            return redirect()->to(base_url() . '404');
        }

        // Mendapatkan data dari formulir tambah pengguna (user) yang disubmit.
        $file = $this->request->getFile('foto');
        $fileName = time() . $file->getClientName();

        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/uploads/foto_profil/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            // Mengisi gambar dummy
            $dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/user.png';
            $fileName = 'user.png';
            copy($dummyImagePath, ROOTPATH . 'public/uploads/foto_profil/' . $fileName);
            session()->setFlashData('message', 'Gagal Upload');
        }

        $nama = $this->request->getPost('nama');
        $no_identitas = $this->request->getPost('no_identitas');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirmPasswordInput'); // Ganti dengan nama yang sesuai dengan input konfirmasi kata sandi
        $email = $this->request->getPost('email');
        $role_user = $this->request->getPost('role_user');

        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Kata sandi tidak cocok!');
            return redirect()->to(current_url() . '/'); // Menambahkan / dan ID pengguna ke URL saat ini
        }
        // Cek apakah username atau email sudah ada di database
        $existingUser = $this->modelUser->where('username', $username)->first();
        $existingEmail = $this->modelUser->where('email', $email)->first();

        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Username sudah digunakan.');
        } elseif ($existingEmail) {
            return redirect()->back()->withInput()->with('error', 'Email sudah digunakan.');
        }

        // Jika peran bukan "Admin", cek apakah sudah ada pengguna dengan peran yang sama
        if ($role_user !== 'Admin' && $role_user !== 'Aslab') {

            $existingRoleUser = $this->modelUser->where('role_user', $role_user)->first();
            if ($existingRoleUser) {
                return redirect()->back()->withInput()->with('error', 'Hanya boleh ada satu pengguna dengan peran ' . $role_user . '.');
            }
        }

        // Menyiapkan data untuk disimpan
        $data = array(
            'nama' => $nama,
            'foto' => $fileName,
            'no_identitas' => $no_identitas,
            'username' => $username,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
            'role_user' => $role_user,
        );

        // Menyimpan data pengguna ke dalam database melalui modelUser.
        if ($this->modelUser->save($data)) {
            // Jika penyimpanan berhasil, tampilkan notifikasi sukses.
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
        } else {
            // Jika penyimpanan gagal, tampilkan notifikasi gagal.
            session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
        }

        // Mengarahkan pengguna kembali ke halaman index setelah berhasil menyimpan data.
        return redirect()->to(base_url() . 'user');
    }

    public function edit()
    {

        $role = session('userData')['role_user'];
        if ($role == "Aslab" || $role == "Kaprodi" || $role == "Sekprodi") {
            return redirect()->to(base_url() . '404');
        }
        // Mendapatkan peran pengguna yang sedang login (role_user).
        $loggedInRole = session('userData')['role_user'];

        // Mendapatkan ID pengguna (user) yang akan diubah dari segment URL.
        $id = $this->request->uri->getSegment(3);

        // Mendapatkan data pengguna berdasarkan ID dari modelUser untuk ditampilkan pada halaman edit.
        $userData = $this->modelUser
            ->where('id_user', $id)
            ->find()[0];

        // Memeriksa apakah pengguna yang sedang login adalah Kalab.
        if ($loggedInRole == 'Kalab') {
            // Jika Kalab, maka periksa peran pengguna yang akan diubah.
            if ($userData['role_user'] == 'Aslab') {
                // Pengguna Kalab hanya dapat mengedit pengguna dengan peran Aslab.
                $data['id'] = $id;
                $data['judul'] = 'Edit Pengguna';
                $data['url'] = 'user/edit';
                $data['key'] = 'id_user';
                $data['model'] = $userData;

                // Menampilkan halaman edit dengan data yang diperoleh.
                echo view('user/edit', $data);
            } else {
                // Jika pengguna yang akan diubah bukan Aslab, mungkin Anda ingin melakukan tindakan lain, seperti mengarahkan ke halaman 404.
                return redirect()->to(base_url() . '404');
            }
        } else {
            // Jika pengguna yang sedang login bukan Kalab, maka tampilkan semua, karena selain kalab yang boleh akses adalah admin.
            $data['id'] = $id;
            $data['judul'] = 'Edit Pengguna';
            $data['url'] = 'user/edit';
            $data['key'] = 'id_user';
            $data['model'] = $userData;

            // Menampilkan halaman edit dengan data yang diperoleh.
            echo view('user/edit', $data);
        }
    }

    // Fungsi tampilan ubah data bagi user yang ingin mengganti data 
    public function ubahData()
    {
        // Mendapatkan ID pengguna (user) yang akan diubah dari segment URL.
        $id = $this->request->uri->getSegment(3);

        // Mendapatkan ID pengguna yang sedang login.
        $id_pengguna_login = session('userData')['id_user'];

        // Periksa apakah ID pengguna yang akan diubah sesuai dengan ID pengguna yang sedang login.
        if ($id == $id_pengguna_login) {
            // Data untuk halaman edit pengguna (user).
            $data['id'] = $id;
            $data['judul'] = 'Ubah Data';
            $data['url'] = 'user/ubahdata';
            $data['key'] = 'id_user';

            // Mendapatkan data pengguna berdasarkan ID dari modelUser untuk ditampilkan pada halaman edit.
            $data['model'] = $this->modelUser
                ->where($data['key'], $id)
                ->find()[0];

            // Menampilkan halaman edit dengan data yang diperoleh.
            echo view('user/ubahdata', $data);
        } else {
            // ID pengguna yang akan diubah tidak sesuai dengan ID pengguna yang sedang login, arahkan ke halaman 404.
            return redirect()->to('404'); // Gantilah '404' dengan URL yang sesuai dengan implementasi Anda untuk halaman 404.
        }
    }

    // Fungsi update data ke database yang dilakukan oleh admin atau kalab
    public function updateData()
    {
        $role = session('userData')['role_user'];

        if ($role == "Aslab" || $role == "Kaprodi" || $role == "Sekprodi") {
            return redirect()->to(base_url() . '404');
        }
        $id = $this->request->getPost('id_user');
        $role_user = $this->request->getPost('role_user');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirmPasswordInput'); // Ganti dengan nama yang sesuai dengan input konfirmasi kata sandi

        $userData = $this->modelUser->find($id);

        if (!$userData) {
            // Handle case where user data doesn't exist
            return redirect()->back()->withInput()->with('error', 'User not found.');
        }
        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Kata sandi tidak cocok!');
            return redirect()->to(current_url() . '/' . $id); // Menambahkan / dan ID pengguna ke URL saat ini
        }
        $hashedPassword = $userData['password_hash'];

        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($role_user !== 'Admin' && $role_user !== 'Aslab') {
            $existingRoleUser = $this->modelUser
                ->where('role_user', $role_user)
                ->where('id_user', '!=', $id)
                ->first();

            if ($existingRoleUser) {
                return redirect()->back()->withInput()->with('error', 'Level pengguna ' . $role_user . ' hanya boleh 1.');
            }
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'no_identitas' => $this->request->getPost('no_identitas'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password_hash' => $hashedPassword,
            'role_user' => $role_user,
        ];

        if ($this->modelUser->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diedit.');
        } else {
            session()->setFlashdata('error', 'Error saat edit data.');
        }

        return redirect()->to(base_url() . '/user');
    }

    // Fungsi untuk mengubah data user secara mandiri
    public function gantiData()
    {
        // Mendapatkan data dari formulir edit pengguna (user) yang disubmit.
        $id = $this->request->getPost('id_user');
        $password = $this->request->getPost('password');
        $file = $this->request->getFile('foto');
        $fileName = null; // Inisialisasi variabel nama file
        $confirmPassword = $this->request->getPost('confirmPasswordInput'); // Ganti dengan nama yang sesuai dengan input konfirmasi kata sandi

        // Memanggil fungsi checkPassword() untuk memeriksa apakah kata sandi cocok
        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Kata sandi tidak cocok!');
            return redirect()->to(current_url() . '/' . $id); // Menambahkan / dan ID pengguna ke URL saat ini
        }

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = substr(md5(time()), 0, 3) . '.' . $file->getExtension();
            $file->move(ROOTPATH . 'public/uploads/foto_profil/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            session()->setFlashData('message', 'Gagal Upload');
        }
        $userData = $this->modelUser->find($id);

        // Hapus gambar sebelumnya jika pengguna mengganti gambar
        if ($fileName !== null && !empty($userData['foto'])) {
            $oldFilePath = ROOTPATH . 'public/uploads/foto_profil/' . $userData['foto'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath); // Hapus file gambar sebelumnya
            }
        }

        // Ambil data pengguna dari database berdasarkan ID
        $userData = $this->modelUser->find($id);

        // Jika pengguna ingin mengubah password, hash password baru
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            // Jika tidak ada perubahan password, gunakan password yang ada di database
            $hashedPassword = $userData['password_hash'];
        }

        $data = array(
            'id_user' => $this->request->getPost('id_user'),
            'nama' => $this->request->getPost('nama'),
            'no_identitas' => $this->request->getPost('no_identitas'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password_hash' => $hashedPassword,
        );

        // Hanya update foto jika ada file yang diunggah
        if ($fileName !== null) {
            $data['foto'] = $fileName;
        } else {
            // Jika tidak ada gambar yang diunggah, gunakan foto dari model sebelumnya
            $data['foto'] = $userData['foto'];
        }

        // Melakukan pembaruan data pengguna (user) ke dalam database melalui modelUser berdasarkan ID.
        if ($this->modelUser->update($id, $data)) {
            // Jika penyimpanan berhasil, tampilkan notifikasi sukses.
            session()->setFlashdata('success', 'Data berhasil diedit');
        } else {
            // Jika penyimpanan gagal, tampilkan notifikasi gagal.
            session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
        }

        // Mengarahkan pengguna kembali ke halaman index setelah berhasil mengupdate data.
        $userData = [
            'id_user' => $this->request->getPost('id_user'),
            'nama' => $this->request->getPost('nama'),
            'foto' => $data['foto'], // Menggunakan foto terbaru atau yang ada sebelumnya
            'no_identitas' => $this->request->getPost('no_identitas'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role_user' => $userData['role_user'],
        ];

        $this->session->set('userData', $userData);

        // Redirect ke halaman profil setelah melakukan perubahan data
        return redirect()->to(base_url() . 'user/profil');
    }

    // Fungsi untuk menghapus data dalam database
    public function delete()
    {
        $userData = session('userData');
        $role = $userData['role_user'];

        // Periksa apakah pengguna adalah admin
        if ($role == "Admin") {
            $id = $this->request->uri->getSegment(3);
            if ($this->modelUser->delete($id)) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
            } else {
                session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
            }
            // Mengarahkan pengguna kembali ke halaman index setelah berhasil menghapus data.
            return redirect()->to(base_url() . '/user');
        }

        // Periksa apakah pengguna adalah Kalab dan role_user adalah Aslab
        if ($role == "Kalab" && $userData['role_user'] == "Aslab") {
            $id = $this->request->uri->getSegment(3);
            if ($this->modelUser->delete($id)) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
            } else {
                session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
            }
            // Mengarahkan pengguna kembali ke halaman index setelah berhasil menghapus data.
            return redirect()->to(base_url() . '/user');
        } else {
            return redirect()->to(base_url() . '404');
        }
    }
}
