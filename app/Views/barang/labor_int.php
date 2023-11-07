<?php
// Extends layout/main.php untuk mengatur layout halaman
$this->extend('layout/main');

// Mulai bagian konten
$this->section('content');
?>
<style>
    .dropdown-menu {
        max-height: 300px;
        overflow-y: auto;
    }

    .row {
        margin-bottom: 5px;
        display: flex;
        justify-content: space-between;
    }

    .col {
        font-weight: bold;
        flex: 1;
        font-size: medium;
    }

    .col-data {
        flex: 2;
        font-size: medium;
        text-transform: capitalize;
    }

    #image-overlay {
        width: 90%;
        height: 90%;
    }

    th.center-text {
        text-align: center;
    }

    td.center {
        text-align: center;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>index">Beranda</a> / <?= $judul; ?></li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <h1 class="h5 mt-4 mb-4 ml-1 ">Sistem Informasi Inventaris Laboratorium</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #2A3F54;">BARANG LABOR INT</h6>
        </div>
        <div class="card-body">
            <!-- Tombol dropdown untuk filter berdasarkan QR Code -->
            <div class="btn-group dropdown pull-right mr-2 mb-3">
                <a href="<?= base_url('barang/cetak_qr/'); ?>" target="_blank" class="btn btn-info pull-right"><i class="fas fa-file-pdf"></i> QR</a>
            </div>
            <!-- Tombol dropdown untuk filter berdasarkan Tahun -->
            <div class="btn-group dropdown pull-right mr-2 mb-3">
                <button type="button" class="btn btn-info pull-right " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-pdf"></i> Tahun</button>
                <div class="dropdown-menu">
                    <?php
                    // Mengumpulkan tahun_barang yang unik dari model
                    $uniqueTahunBarang = array_unique(array_column($model, 'tahun_barang'));
                    // Mengurutkan tahun_barang secara ascending
                    sort($uniqueTahunBarang);

                    foreach ($uniqueTahunBarang as $tahun) {
                        echo '<a class="dropdown-item" target="_blank" href="barang/cetak_tahun/' . $tahun . '">' . $tahun . '</a>';
                    }
                    ?>
                </div>
            </div>
            <!-- Tombol dropdown untuk filter berdasarkan Kategori -->
            <div class="btn-group dropdown pull-right mr-2 mb-3">
                <button type="button" class="btn btn-info pull-right " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-pdf"></i> Kategori</button>
                <div class="dropdown-menu">
                    <?php
                    // Memilih sub kategori yang unik dari model
                    $uniqueIds = array_unique(array_column($model, 'sub_kategori'));
                    foreach ($uniqueIds as $id) {
                        // Cari indeks pertama dari elemen dengan 'sub_kategori' yang sesuai
                        $index = array_search($id, array_column($model, 'sub_kategori'));

                        // Jika indeks ditemukan, tampilkan 'id_ruangan' dan 'nama_ruangan'
                        if ($index !== false) {
                            $sub_kategori = $model[$index]['sub_kategori'];

                            // Mengganti underscore (_) dengan spasi
                            $sub_kategori_display = str_replace('_', ' ', $sub_kategori);

                            // Tampilkan link dengan teks yang sudah diformat
                            echo '<a class="dropdown-item" target="_blank" href="barang/cetak_kategori/' . $id . '">' . $sub_kategori_display . '</a> ';
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- Tombol dropdown untuk filter berdasarkan Ruangan -->
            <div class="btn-group dropdown  mr-2 mb-3">
                <div class="btn-group dropdown pull-right mr-2 mb-3">
                    <a href="<?= base_url('barang/cetak_ruangan/2'); ?>" target="_blank" class="btn btn-info pull-right"><i class="fas fa-print"></i> Cetak</a>
                </div>
            </div>
            <!-- Button untuk membuka modal -->
            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#cetakModal">
                <i class="fas fa-file-pdf"></i> Pendanaan
            </button>
            <!-- Modal -->
            <div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="cetakModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cetakModalLabel">Cetak Pendanaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <?php
                                // Memilih ID pendanaan yang unik dari model
                                $uniqueIds = array_unique(array_column($model, 'id_pendanaan'));
                                foreach ($uniqueIds as $id) {
                                    // Cari indeks pertama dari elemen dengan 'id_pendanaan' yang sesuai
                                    $index = array_search($id, array_column($model, 'id_pendanaan'));

                                    // Jika indeks ditemukan, tampilkan 'id_ruangan' dan 'nama_ruangan'
                                    if ($index !== false) {
                                        $jenis_pendanaan = $model[$index]['jenis_pendanaan'];
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <label for="id_pendanaan">Jenis Pendanaan</label>
                                    <select name="id_pendanaan" id="id_pendanaan" class="form-control" required>
                                        <?php foreach ($data_pendanaan as $data) : ?>
                                            <option value="<?= $data['id_pendanaan'] ?>"><?= $data['jenis_pendanaan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_barang">Tahun</label>
                                    <select name="tahun_barang" id="tahun_barang" class="form-control" required>
                                        <option value="">Pilih Tahun Pendanaan</option>
                                        <?php
                                        // Mengumpulkan tahun_barang yang unik dari model
                                        $uniqueTahunBarang = array_unique(array_column($model, 'tahun_barang'));
                                        // Mengurutkan tahun-barang secara ascending
                                        sort($uniqueTahunBarang);
                                        ?>
                                        <?php foreach ($uniqueTahunBarang as $tahun) : ?>
                                            <option value="<?= $tahun ?>"><?= $tahun ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button id="cetakButtonModal" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tombol tak bisa ditekan jika data kosong -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const cetakButton = document.getElementById("cetakButtonModal");
                    const idPendanaanSelect = document.getElementById("id_pendanaan");
                    const tahunBarangSelect = document.getElementById("tahun_barang");

                    // Fungsi untuk memeriksa apakah setidaknya satu data terisi
                    function isAtLeastOneDataFilled() {
                        return idPendanaanSelect.value !== "" || tahunBarangSelect.value !== "";
                    }

                    // Fungsi untuk mengatur status tombol
                    function updateButtonStatus() {
                        cetakButton.disabled = !isAtLeastOneDataFilled();
                    }

                    // Panggil fungsi pertama kali dan juga setiap kali input berubah
                    updateButtonStatus();
                    idPendanaanSelect.addEventListener("change", updateButtonStatus);
                    tahunBarangSelect.addEventListener("change", updateButtonStatus);
                });
            </script>

            <script>
                document.getElementById("cetakButtonModal").addEventListener("click", function() {
                    var id_pendanaan = document.getElementById("id_pendanaan").value;
                    var tahun_barang = document.getElementById("tahun_barang").value;

                    var url = "barang/cetak_pendanaan/" + id_pendanaan;

                    if (tahun_barang) {
                        url += "?tahun_barang=" + tahun_barang;
                    }

                    window.open(url, "_blank");
                });
            </script>
            <div class="table-responsive" style="max-height:1250px; overflow-y: auto;">
                <!-- Tabel untuk menampilkan data -->
                <table id="datatable" class="table table-striped table-bordered" style="width:250%">
                    <thead>
                        <tr>
                            <td class="center"><b>NO</b></td>
                            <th class="center-text">QR</th>
                            <th>Pendanaan</th>
                            <th>Nama Barang</th>
                            <th>Spesifikasi Barang</th>
                            <th>Gambar</th>
                            <th>Tahun</th>
                            <th>Kategori</th>
                            <th>Subkategori</th>
                            <th>Kondisi</th>
                            <th>Tanggal Masuk Barang</th>
                            <th>Waktu Input</th>
                            <th>Deskripsi</th>
                            <th>Diinputkan Oleh</th>
                            <th>Diedit Oleh</th>
                            <th>Tanggal diedit</th>
                            <th class="center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($model as $key => $value) {
                            if ($value["id_ruangan"] == 2) { // Filter data hanya untuk id_ruangan = 1
                                $no++;
                        ?>
                                <tr>
                                    <td class="center"><?php echo $no; ?></td>
                                    <td class="center">
                                        <?php $qrData = "Tahun " . $value["tahun_barang"]  .  " Merk " . $value["nama_barang"] . " Spesifikasi " . $value["spek_barang"];
                                        $centerImageUrl = "";
                                        $qrCodeImageUrl = "https://quickchart.io/qr?text=" . urlencode($qrData) . "&centerImageUrl=" . urlencode($centerImageUrl);
                                        ?>
                                        <a href="<?= $qrCodeImageUrl ?>" target="_blank">
                                            <img width="40px" src="<?= $qrCodeImageUrl ?>" alt="QR Code" loading="lazy">
                                        </a>
                                    </td>
                                    <td><?= $value["jenis_pendanaan"] ?></td>
                                    <td><?= $value["nama_barang"] ?></td>
                                    <td style="width: 250px;"><?= $value["spek_barang"] ?></td>
                                    <td class="center">
                                        <img src="<?= base_url('/uploads/' . $value['gambar_barang']) ?>" width="50px" alt="gambar" onclick="showImage('<?= base_url('/uploads/' . $value['gambar_barang']) ?>')" style="cursor:pointer" loading="lazy" />
                                    </td>
                                    <td><?= $value["tahun_barang"] ?></td>
                                    <td><?= $value["kategori_barang"] ?></td>
                                    <td><?= str_replace('_', ' ', $value["sub_kategori"]) ?></td>
                                    <td><?= str_replace('_', ' ', $value["kondisi"]) ?></td>
                                    <td><?= date('d', strtotime($value["tgl_masuk_barang"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_masuk_barang"]))) . ' ' . date('Y', strtotime($value["tgl_masuk_barang"])) ?></td>
                                    <td><?= $value["waktu_input"] ?></td>
                                    <td><?= $value["deskripsi"] ?></td>
                                    <td><?= $value["user_input"] ?></td>
                                    <td><?= $value["user_edit"] ?></td>
                                    <td><?= date('d', strtotime($value["tgl_edit"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_edit"]))) . ' ' . date('Y', strtotime($value["tgl_edit"])) ?></td>
                                    <td class="center">
                                        <?php if (session('userData')['role_user'] == "Admin") : ?>
                                            <a href="barang/edit/<?= $value["id_barang"] ?>"><i class="fas fa-edit fa-2x"></i> </a>
                                            <a href="javascript:confirmDelete('barang/hapus/<?= $value["id_barang"] ?>')"><i class="fas fa-trash fa-2x"></i></a>
                                        <?php elseif (session('userData')['role_user'] == "Kalab") : ?>
                                            <a href="barang/edit/<?= $value["id_barang"] ?>"><i class="fas fa-edit fa-2x"></i> </a>
                                            <a href="javascript:confirmDelete('barang/hapus/<?= $value["id_barang"] ?>')"><i class="fas fa-trash fa-2x"></i></a>
                                        <?php elseif (session('userData')['role_user'] == "Aslab") : ?>
                                            <a href="barang/edit/<?= $value["id_barang"] ?>"><i class="fas fa-edit fa-2x"></i> </a>
                                            <a href="javascript:confirmDelete('barang/hapus/<?= $value["id_barang"] ?>')"><i class="fas fa-trash fa-2x"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Letakkan script ini di bawah kode HTML yang memiliki gambar yang ingin ditampilkan -->
                <script>
                    // Ambil semua elemen gambar dengan class "center"
                    const images = document.querySelectorAll('td.center img');

                    // Tambahkan event listener untuk setiap elemen gambar
                    images.forEach(image => {
                        image.addEventListener('click', function() {
                            // Dapatkan URL gambar dari atribut "src"
                            const imageUrl = this.getAttribute('src');

                            // Buat elemen gambar baru untuk ditampilkan
                            const enlargedImage = document.createElement('img');
                            enlargedImage.setAttribute('src', imageUrl);
                            enlargedImage.style.width = '100%'; // Atur lebar gambar sesuai kebutuhan

                            // Buat elemen div untuk overlay hitam latar belakang
                            const overlay = document.createElement('div');
                            overlay.style.position = 'fixed';
                            overlay.style.top = ' 100';
                            overlay.style.left = '100';

                            overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
                            overlay.style.zIndex = '9999';
                            overlay.style.display = 'flex';
                            overlay.style.justifyContent = 'center';
                            overlay.style.alignItems = 'center';

                            // Tambahkan elemen gambar ke dalam elemen overlay
                            overlay.appendChild(enlargedImage);

                            // Tambahkan overlay ke dalam body dokumen
                            document.body.appendChild(overlay);

                            // Tambahkan event listener untuk menyembunyikan overlay ketika gambar di klik kembali
                            overlay.addEventListener('click', function() {
                                document.body.removeChild(overlay);
                            });
                        });
                    });
                </script>
                <!-- Fungsi JavaScript -->
                <script>
                    // Fungsi untuk konfirmasi hapus data
                    function confirmDelete(url) {
                        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                            window.location.href = url;
                        } else {
                            return false;
                        }
                    }
                    // Fungsi untuk menampilkan gambar dalam tampilan overlay
                    function showImage(src) {
                        // Membuat elemen div overlay
                        var overlay = document.createElement("div");
                        overlay.id = "overlay";
                        overlay.style.position = "fixed";
                        overlay.style.top = 0;
                        overlay.style.left = 0;
                        overlay.style.width = "100%";
                        overlay.style.height = "100%";
                        overlay.style.backgroundColor = "rgba(0,0,0,0.7)";
                        overlay.style.zIndex = 99999;
                        overlay.style.display = "flex";
                        overlay.style.alignItems = "center";
                        overlay.style.justifyContent = "center";

                        // Menambahkan event onclick untuk menghapus overlay saat di-klik
                        overlay.onclick = function() {
                            document.body.removeChild(overlay);
                        };

                        // Membuat elemen gambar
                        var img = new Image();
                        img.id = "image-overlay";
                        img.src = src;
                        img.style.maxWidth = "90%"; // Maksimal lebar 90% dari layar
                        img.style.maxHeight = "90vh"; // Maksimal tinggi 90% dari tinggi viewport
                        img.style.objectFit = "contain"; // Memastikan gambar sesuai proporsinya

                        // Menambahkan gambar ke dalam overlay dan overlay ke dalam body
                        overlay.appendChild(img);
                        document.body.appendChild(overlay);
                    }
                </script>
            </div>
        </div>
    </div>
</div>
<br><br>
<!-- /.container-fluid -->
<!-- Modal Detail Barang -->
<?php
// Fungsi untuk mengubah nama bulan bahasa Inggris menjadi bahasa Indonesia
function bulanIndonesia($bulan)
{
    $bulan = strtolower($bulan);
    switch ($bulan) {
        case 'january':
            return 'Januari';
        case 'february':
            return 'Februari';
        case 'march':
            return 'Maret';
        case 'april':
            return 'April';
        case 'may':
            return 'Mei';
        case 'june':
            return 'Juni';
        case 'july':
            return 'Juli';
        case 'august':
            return 'Agustus';
        case 'september':
            return 'September';
        case 'october':
            return 'Oktober';
        case 'november':
            return 'November';
        case 'december':
            return 'Desember';
        default:
            return $bulan;
    }
}
// Mengubah format tanggal menjadi format Indonesia
$tanggal = date('d');
$bulanInggris = date('F');
$bulanIndonesia = bulanIndonesia($bulanInggris);
$tahun = date('Y');
?>
<!-- Selesai bagian konten -->
<?= $this->endSection() ?>