<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::beranda');
$routes->get('/index', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/about', 'Home::about');
$routes->get('/pengembang', 'Home::aboutLogin');
$routes->get('/404', 'Home::tolak');
$routes->get('/peminjaman_berhasil', 'Home::peminjamanBerhasil');
$routes->post('/login', 'Home::login2');
$routes->get('/logout', 'Home::logout');
// $routes->set404Override(function () {
//     return view('404');
// });

// Penamaan file php dan tabel database menggunakan snake_case
// Penamaan fungsi di Controller menggunakan camelCase

// Barang
$routes->get('/barang', 'BarangController::index');
$routes->get('/labor_rsi', 'BarangController::indexRsi');
$routes->get('/labor_se', 'BarangController::indexSe');
$routes->get('/labor_int', 'BarangController::indexInt');
$routes->get('/barang/tambah', 'BarangController::tambah');
$routes->post('/barang/tambah', 'BarangController::insertData');
$routes->get('/barang/edit/(:any)', 'BarangController::edit');
$routes->post('/barang/edit', 'BarangController::updateData');
$routes->get('/barang/hapus/(:any)', 'BarangController::delete');
$routes->get('/barang/cetak_ruangan/(:num)', 'BarangController::cetakRuangan/$1');
$routes->get('/barang/cetak_pendanaan/(:num)', 'BarangController::cetakPendanaan/$1');
$routes->get('/barang/cetak_tahun/(:num)', 'BarangController::cetakTahun/$1');
$routes->get('/barang/cetak_kategori/(:any)', 'BarangController::cetakKategori/$1');
$routes->get('/barang/cetak_qr', 'BarangController::cetakQr');

// Pemusnahan Barang
$routes->get('/pemusnahan_barang', 'PemusnahanBarangController::index');
$routes->get('/pemusnahan_barang/tambah', 'PemusnahanBarangController::tambah');
$routes->post('/pemusnahan_barang/tambah', 'PemusnahanBarangController::insertData');
$routes->get('/pemusnahan_barang/edit/(:any)', 'PemusnahanBarangController::edit');
$routes->post('/pemusnahan_barang/edit', 'PemusnahanBarangController::updateData');
$routes->get('/pemusnahan_barang/hapus/(:any)', 'PemusnahanBarangController::delete');
$routes->get('/pemusnahan_barang/cetak', 'PemusnahanBarangController::cetak');
$routes->get('/pemusnahan_barang/search(:any)', 'PemusnahanBarangController::search/$1');
$routes->get('/pemusnahan_barang/download/(:any)', 'PemusnahanBarangController::download/$1');

// Pendanaan Barang
$routes->get('/pendanaan', 'PendanaanController::index');
$routes->get('/pendanaan/tambah', 'PendanaanController::tambah');
$routes->post('/pendanaan/tambah', 'PendanaanController::insertData');
$routes->get('/pendanaan/edit/(:any)', 'PendanaanController::edit');
$routes->post('/pendanaan/edit', 'PendanaanController::updateData');
$routes->get('/pendanaan/hapus/(:any)', 'PendanaanController::delete');

//Peminjaman Barang
$routes->get('/peminjaman_barang', 'PeminjamanBarangController::index');
$routes->get('/peminjaman_barang', 'ReferensiController::index');
$routes->get('/peminjaman_barang/getData', 'PeminjamanBarangController::getData');
$routes->post('/peminjaman_barang/getData', 'PeminjamanBarangController::getData');
$routes->get('/peminjaman_barang/internal', 'PeminjamanBarangController::tambah_internal');
$routes->post('/peminjaman_barang/tambah', 'PeminjamanBarangController::insertData');
$routes->get('/peminjaman_barang/eksternal', 'PeminjamanBarangController::tambah_eksternal');
$routes->post('/peminjaman_barang/tambah', 'PeminjamanBarangController::insertData');
$routes->get('/peminjaman_barang/pinjam', 'PeminjamanBarangController::pinjam');
$routes->post('/peminjaman_barang/pinjam', 'PeminjamanBarangController::insertData');
$routes->get('/peminjaman_barang/edit/(:any)', 'PeminjamanBarangController::edit');
$routes->get('/peminjaman_barang/konfirmasi/(:any)', 'PeminjamanBarangController::konfirmasi');
$routes->get('/peminjaman_barang/getProdi/(:num)', 'PeminjamanBarangController::getProdi/$1');
$routes->get('/peminjaman_barang/return/(:any)', 'PeminjamanBarangController::return');
$routes->post('/peminjaman_barang/edit', 'PeminjamanBarangController::updateData');
$routes->get('/peminjaman_barang/hapus/(:any)', 'PeminjamanBarangController::delete');
$routes->get('/peminjaman_barang/detail/(:any)', 'PeminjamanBarangDetailController::detail');
$routes->get('/peminjaman_barang/download/(:any)', 'PeminjamanBarangController::download/$1');
$routes->get('/peminjaman_barang/tambah_biaya', 'ReferensiController::tambah_biaya2');
$routes->post('/peminjaman_barang/tambah_biaya', 'ReferensiController::insertData2');
$routes->get('/peminjaman_barang/cetak', 'PeminjamanBarangController::cetak');

// Dokumentasi Barang
$routes->get('/dokumentasi', 'DokumentasiController::index');
$routes->get('dokumentasi/preview/(:num)', 'DokumentasiController::preview/$1');
$routes->get('public/uploads/(:any)', 'DokumentasiController::showFile/$1');
$routes->get('/dokumentasi/tambah', 'DokumentasiController::tambah');
$routes->post('/dokumentasi/tambah', 'DokumentasiController::insertData');
$routes->get('/dokumentasi/edit/(:any)', 'DokumentasiController::edit');
$routes->post('/dokumentasi/edit', 'DokumentasiController::updateData');
$routes->get('/dokumentasi/hapus/(:any)', 'DokumentasiController::delete');
$routes->get('/dokumentasi/download/(:any)', 'DokumentasiController::download/$1');

// Peminjaman Ruangan
$routes->get('/peminjaman_ruangan', 'PeminjamanRuanganController::index');
$routes->get('/peminjaman_ruangan', 'ReferensiController::index');
$routes->get('/peminjaman_ruangan/pinjam', 'PeminjamanRuanganController::pinjam');
$routes->post('/peminjaman_ruangan/pinjam', 'PeminjamanRuanganController::insertData');
$routes->get('/peminjaman_ruangan/tambah_internal', 'PeminjamanRuanganController::tambah_internal');
$routes->get('/peminjaman_ruangan/tambah_eksternal', 'PeminjamanRuanganController::tambah_eksternal');
$routes->get('/peminjaman_ruangan/tambah_biaya', 'ReferensiController::tambah_biaya');
$routes->post('/peminjaman_ruangan/tambah_biaya', 'ReferensiController::insertData');
$routes->post('/peminjaman_ruangan/tambah', 'PeminjamanRuanganController::insertData');
$routes->get('/peminjaman_ruangan/hapus/(:any)', 'PeminjamanRuanganController::delete');
$routes->get('/peminjaman_ruangan/cetak/(:num)', 'PeminjamanRuanganController::cetak/$1');
$routes->get('/peminjaman_ruangan/download/(:any)', 'PeminjamanRuanganController::download/$1');

// User
$routes->get('/user', 'UserController::index');
$routes->get('/user/profil', 'UserController::profil');
$routes->get('/user/tambah', 'UserController::tambah');
$routes->post('/user/tambah', 'UserController::insertData');
$routes->get('/user/edit/(:num)', 'UserController::edit');
$routes->get('/user/ubahdata/(:num)', 'UserController::ubahData');
$routes->post('/user/edit', 'UserController::updateData');
$routes->post('/user/ubahdata', 'UserController::gantiData');
$routes->get('/user/hapus/(:any)', 'UserController::delete');

// Maintenance
$routes->get('/maintenance', 'MaintenanceController::index');
$routes->get('/maintenance/tambah', 'MaintenanceController::tambah');
$routes->post('/maintenance/tambah', 'MaintenanceController::insertData');
$routes->get('/maintenance/edit/(:any)', 'MaintenanceController::edit');
$routes->post('/maintenance/edit', 'MaintenanceController::updateData');
$routes->get('/maintenance/hapus/(:any)', 'MaintenanceController::delete');
$routes->get('/maintenance/download/(:any)', 'MaintenanceController::download/$1');

// Fakultas
$routes->get('/fakultas', 'FakultasController::index');
$routes->get('/fakultas/tambah', 'FakultasController::tambah');
$routes->post('/fakultas/tambah', 'FakultasController::insertData');
$routes->get('/fakultas/edit/(:any)', 'FakultasController::edit');
$routes->post('/fakultas/edit', 'FakultasController::updateData');
$routes->get('/fakultas/hapus/(:any)', 'FakultasController::delete');

// Program Studi
$routes->get('/prodi', 'ProdiController::index');
$routes->get('/prodi/tambah', 'ProdiController::tambah');
$routes->post('/prodi/tambah', 'ProdiController::insertData');
$routes->get('/prodi/edit/(:any)', 'ProdiController::edit');
$routes->post('/prodi/edit', 'ProdiController::updateData');
$routes->get('/prodi/hapus/(:any)', 'ProdiController::delete');

// Gedung
$routes->get('/gedung', 'GedungController::index');
$routes->get('/gedung/tambah', 'GedungController::tambah');
$routes->post('/gedung/tambah', 'GedungController::insertData');
$routes->get('/gedung/edit/(:any)', 'GedungController::edit');
$routes->post('/gedung/edit', 'GedungController::updateData');
$routes->get('/gedung/hapus/(:any)', 'GedungController::delete');

// Ruangan
$routes->get('/ruangan', 'RuanganController::index');
$routes->get('/ruangan/tambah', 'RuanganController::tambah');
$routes->post('/ruangan/tambah', 'RuanganController::insertData');
$routes->get('/ruangan/edit/(:any)', 'RuanganController::edit');
$routes->post('/ruangan/edit', 'RuanganController::updateData');
$routes->get('/ruangan/hapus/(:any)', 'RuanganController::delete');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
