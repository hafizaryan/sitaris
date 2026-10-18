# SITARIS - Sistem Informasi Inventaris Laboratorium

SITARIS adalah sistem informasi berbasis web untuk pengelolaan inventaris laboratorium, dikembangkan dengan PHP dan framework CodeIgniter 4. Sistem ini membantu pencatatan barang dan peralatan laboratorium, peminjaman dan pengembalian, peminjaman ruangan, kunjungan pengunjung, perawatan, sampai pembuatan laporan.

Pengembang: Hafiz Aryan Siregar, Indah Nirwana, dan Nasya Amirah Melyani.

## Fitur Utama

- **Pencatatan data inventaris**: data barang dan peralatan laboratorium beserta data pendukung seperti gedung, ruangan, fakultas, dan program studi.
- **Peminjaman dan pengembalian barang**: pemantauan proses pinjam dan kembali barang oleh pengguna laboratorium.
- **Peminjaman ruangan**: pengelolaan jadwal pemakaian ruangan laboratorium.
- **Kunjungan dan pengunjung**: pencatatan kunjungan ke laboratorium.
- **Perawatan (maintenance)**: pelacakan jadwal perawatan dan pemeliharaan barang.
- **Pemusnahan barang**: pencatatan barang yang dimusnahkan.
- **Pendanaan dan referensi**: pengelolaan data pendanaan serta referensi barang.
- **Pembuatan laporan**: laporan inventaris yang dapat dicetak ke PDF menggunakan TCPDF, serta dokumentasi pendukung.
- **Tingkat akses terkontrol**: hak akses berbeda sesuai peran pengguna (admin dan pengguna biasa).

## Teknologi

- PHP 8 dengan framework CodeIgniter 4
- Database MariaDB atau MySQL
- Bootstrap 4, HTML5, dan CSS3 untuk antarmuka
- TCPDF untuk pembuatan dokumen PDF
- Google API Client dan Mailjet API (terdaftar pada `composer.json`) untuk integrasi layanan surat dan Google

## Struktur Folder

- `app/` - kode aplikasi CodeIgniter 4 (Controllers, Models, Views, Config)
- `public/` - document root dan aset publik
- `system/` - inti framework CodeIgniter 4
- `db/` - dump database `man_lab.sql` beserta dokumentasi PDF struktur database
- `writable/` - folder cache, log, dan unggahan
- `tests/` - pengujian PHPUnit
- `spark` - perintah baris perintah CodeIgniter

## Persyaratan Sistem

- PHP 7.4 atau 8.x dengan ekstensi intl, mbstring, dan json
- Composer
- MariaDB atau MySQL

## Cara Menjalankan

1. Clone repositori ini.
2. Instal dependensi:

   ```bash
   composer install
   ```

3. Buat database baru, lalu impor berkas `db/man_lab.sql`.
4. Salin berkas `env` menjadi `.env`, kemudian sesuaikan nilai `CI_ENVIRONMENT`, `app.baseURL`, dan konfigurasi `database.default` (hostname, database, username, password).
5. Jalankan server pengembangan:

   ```bash
   php spark serve
   ```

6. Buka `http://localhost:8080` di browser.

## Lisensi

MIT, lihat berkas `LICENSE`.
