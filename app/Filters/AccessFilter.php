<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AccessFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $userData = session('userData');

        // Daftar rute yang diizinkan tanpa perlu masuk.
        $allowedRoutes = [
            'peminjaman_ruangan/pinjam',
            'pengembang',
            'peminjaman_ruangan/tambah_internal',
            'peminjaman_ruangan/tambah_internal',
            'peminjaman_ruangan/tambah_eksternal',
            'peminjaman_barang/getData',
            'peminjaman_barang/getProdi/1',
            'peminjaman_barang/getProdi/2',
            'peminjaman_barang/getProdi/3',
            'peminjaman_barang/getProdi/4',
            'peminjaman_barang/getProdi/5',
            'peminjaman_barang/getProdi/6',
            'peminjaman_barang/getProdi/7',
            'peminjaman_barang/getProdi/8',
            'peminjaman_barang/getProdi/9',
            'peminjaman_ruangan/tambah',
            'peminjaman_barang/pinjam',
            'peminjaman_barang/internal',
            'peminjaman_barang/kirim',
            'peminjaman_barang/eksternal',
            'peminjaman_barang/tambah',
            'peminjaman_berhasil',
            '/',
            'home'
        ];
        $currentRoute = $request->uri->getPath();

        // Periksa apakah rute saat ini termasuk dalam daftar rute yang diizinkan.
        if (in_array($currentRoute, $allowedRoutes)) {
            return; // Izinkan akses tanpa perlu masuk.
        }

        if (!isset($userData['role_user'])) {
            return redirect()->to(base_url() . 'login');
        }

        // Pembatasan akses untuk Kaprodi dan Sekprodi selain dari data master yang udah difilter di controller
        if ($userData['role_user'] === 'Kaprodi' || $userData['role_user'] === 'Sekprodi') {
            $restrictedPatterns = [
                '/^barang\/tambah$/',
                '/^barang\/edit\/.*$/',
                '/^barang\/hapus\/.*$/',
                '/^maintenance\/tambah$/',
                '/^maintenance\/edit\/.*$/',
                '/^maintenance\/hapus\/.*$/',
                '/^pemusnahan_barang\/tambah$/',
                '/^pemusnahan_barang\/edit\/.*$/',
                '/^pemusnahan_barang\/hapus\/.*$/',
                '/^peminjaman_ruangan\/tambah_biaya*$/'
            ];

            $currentRoute = $request->uri->getPath();

            // Jika pengguna memiliki peran "kaprodi" atau "sekprodi" dan mengakses rute terlarang, arahkan ke halaman tertentu.
            foreach ($restrictedPatterns as $pattern) {
                if (preg_match($pattern, $currentRoute)) {
                    // Menghancurkan sesi pengguna saat mengakses rute terlarang.
                    // session_destroy();

                    // Mengarahkan pengguna ke halaman tolak.
                    header('Location: ' . base_url() . '404');
                    exit;
                }
            }
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Lakukan sesuatu setelah respons dikirim.
    }
}
