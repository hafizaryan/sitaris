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

    public function index()
    {
        if (!isset(session('userData')['username'])) {
            return redirect()->to(base_url() . '/login');
        }
        $role = session('userData')['role_user'];
        if ($role == "Aslab" || $role == "Kaprodi" || $role == "Sekprodi") {
            return redirect()->to(base_url() . '404');
        }
        $alert_message = session()->getFlashdata('alert_message');
        $data['judul'] = 'Pengguna';
        $data['model'] = $this->modelUser->findAll();
        $data['alert_message'] = $alert_message;
        echo view('/user/index', $data);
    }

    public function profil()
    {
        $data['judul'] = 'Profil';
        $data['model'] = $this->modelUser->findAll();
        echo view('/user/profil', $data);
    }

    public function tambah()
    {
        $role = session('userData')['role_user'];
        if ($role == "Aslab" || $role == "Kaprodi" || $role == "Sekprodi") {
            return redirect()->to(base_url() . '404');
        }
        $id = 0;
        $data['id'] = $id;
        $data['judul'] = 'Tambah Pengguna';
        $data['url'] = 'user/tambah';
        $data['key'] = 'id_user';
        $data['id'] = $this->modelUser->find();
        echo view('user/tambah', $data);
    }

    public function insertData()
    {
        $role = session('userData')['role_user'];
        if ($role == "Aslab" || $role == "Kaprodi" || $role == "Sekprodi") {
            return redirect()->to(base_url() . '404');
        }
        $file = $this->request->getFile('foto');
        $fileName = time() . $file->getClientName();
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/uploads/foto_profil/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            $dummyImagePath = ROOTPATH . 'public/gentelella-master/production/images/user.png';
            $fileName = 'user.png';
            copy($dummyImagePath, ROOTPATH . 'public/uploads/foto_profil/' . $fileName);
            session()->setFlashData('message', 'Gagal Upload');
        }
        $nama = $this->request->getPost('nama');
        $no_identitas = $this->request->getPost('no_identitas');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirmPasswordInput');
        $email = $this->request->getPost('email');
        $role_user = $this->request->getPost('role_user');
        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Kata sandi tidak cocok!');
            return redirect()->to(current_url() . '/');
        }
        $existingUser = $this->modelUser->where('username', $username)->first();
        $existingEmail = $this->modelUser->where('email', $email)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Username sudah digunakan.');
        } elseif ($existingEmail) {
            return redirect()->back()->withInput()->with('error', 'Email sudah digunakan.');
        }
        if ($role_user !== 'Admin' && $role_user !== 'Aslab') {
            $existingRoleUser = $this->modelUser->where('role_user', $role_user)->first();
            if ($existingRoleUser) {
                return redirect()->back()->withInput()->with('error', 'Hanya boleh ada satu pengguna dengan peran ' . $role_user . '.');
            }
        }
        $data = array(
            'nama' => $nama,
            'foto' => $fileName,
            'no_identitas' => $no_identitas,
            'username' => $username,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
            'role_user' => $role_user,
        );
        if ($this->modelUser->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data');
        }
        return redirect()->to(base_url() . 'user');
    }

    public function edit()
    {
        $role = session('userData')['role_user'];
        if ($role == "Aslab" || $role == "Kaprodi" || $role == "Sekprodi") {
            return redirect()->to(base_url() . '404');
        }
        $loggedInRole = session('userData')['role_user'];
        $id = $this->request->uri->getSegment(3);
        $userData = $this->modelUser
            ->where('id_user', $id)
            ->find()[0];
        if ($loggedInRole == 'Kalab') {
            if ($userData['role_user'] == 'Aslab') {
                $data['id'] = $id;
                $data['judul'] = 'Edit Pengguna';
                $data['url'] = 'user/edit';
                $data['key'] = 'id_user';
                $data['model'] = $userData;
                echo view('user/edit', $data);
            } else {
                return redirect()->to(base_url() . '404');
            }
        } else {
            $data['id'] = $id;
            $data['judul'] = 'Edit Pengguna';
            $data['url'] = 'user/edit';
            $data['key'] = 'id_user';
            $data['model'] = $userData;
            echo view('user/edit', $data);
        }
    }

    public function ubahData()
    {
        $id = $this->request->uri->getSegment(3);
        $id_pengguna_login = session('userData')['id_user'];
        if ($id == $id_pengguna_login) {
            $data['id'] = $id;
            $data['judul'] = 'Ubah Data';
            $data['url'] = 'user/ubahdata';
            $data['key'] = 'id_user';
            $data['model'] = $this->modelUser
                ->where($data['key'], $id)
                ->find()[0];
            echo view('user/ubahdata', $data);
        } else {
            return redirect()->to('404');
        }
    }

    public function updateData()
    {
        $role = session('userData')['role_user'];
        if ($role == "Aslab" || $role == "Kaprodi" || $role == "Sekprodi") {
            return redirect()->to(base_url() . '404');
        }
        $id = $this->request->getPost('id_user');
        $role_user = $this->request->getPost('role_user');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirmPasswordInput');
        $userData = $this->modelUser->find($id);
        if (!$userData) {
            return redirect()->back()->withInput()->with('error', 'User not found.');
        }
        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Kata sandi tidak cocok!');
            return redirect()->to(current_url() . '/' . $id);
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

    public function gantiData()
    {
        $id = $this->request->getPost('id_user');
        $password = $this->request->getPost('password');
        $file = $this->request->getFile('foto');
        $fileName = null;
        $confirmPassword = $this->request->getPost('confirmPasswordInput');
        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Kata sandi tidak cocok!');
            return redirect()->to(current_url() . '/' . $id);
        }
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = substr(md5(time()), 0, 3) . '.' . $file->getExtension();
            $file->move(ROOTPATH . 'public/uploads/foto_profil/', $fileName);
            session()->setFlashData('message', 'Berhasil Upload');
        } else {
            session()->setFlashData('message', 'Gagal Upload');
        }
        $userData = $this->modelUser->find($id);
        if ($fileName !== null && !empty($userData['foto'])) {
            $oldFilePath = ROOTPATH . 'public/uploads/foto_profil/' . $userData['foto'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $userData = $this->modelUser->find($id);
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
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
        if ($fileName !== null) {
            $data['foto'] = $fileName;
        } else {
            $data['foto'] = $userData['foto'];
        }
        if ($this->modelUser->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diedit');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat mengedit data');
        }
        $userData = [
            'id_user' => $this->request->getPost('id_user'),
            'nama' => $this->request->getPost('nama'),
            'foto' => $data['foto'],
            'no_identitas' => $this->request->getPost('no_identitas'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role_user' => $userData['role_user'],
        ];
        $this->session->set('userData', $userData);
        return redirect()->to(base_url() . 'user/profil');
    }

    public function delete()
    {
        $userData = session('userData');
        $role = $userData['role_user'];
        if ($role == "Admin") {
            $id = $this->request->uri->getSegment(3);
            if ($this->modelUser->delete($id)) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
            } else {
                session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
            }
            return redirect()->to(base_url() . '/user');
        }
        if ($role == "Kalab" && $userData['role_user'] == "Aslab") {
            $id = $this->request->uri->getSegment(3);
            if ($this->modelUser->delete($id)) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
            } else {
                session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
            }
            return redirect()->to(base_url() . '/user');
        } else {
            return redirect()->to(base_url() . '404');
        }
    }
}
