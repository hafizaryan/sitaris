<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    /* Tambahkan CSS untuk mempercantik tampilan */
    .row {
        margin-bottom: 10px;
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
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <?= $judul; ?></li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <h1 class="h5 mt-4 mb-4 ml-1 ">Sistem Informasi Inventaris Laboratorium</h1>
    <?php if (session()->has('success')) : ?>
        <div id="custom-toast" class="custom-toast">
            <i class="fas fa-check-circle checkmark-icon"></i>
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tampilkan pemberitahuan jika terjadi kesalahan -->
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #2A3F54;">DOKUMENTASI</h6>
        </div>
        <div class="card-body">
            <a href="dokumentasi/tambah" class="btn btn-success">Tambah Data</a>
            <br><br>
            <div class="table-responsive" style="max-height: 1200px;" overflow-y: auto;">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <td class="center"><b>NO</b></td>
                            <th>Kategori</th>
                            <th>Nama Dokumentasi</th>
                            <th class="center-text">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($model as $key => $value) {
                            $no++;
                        ?>
                            <tr>
                                <td class="center"><?php echo $no; ?></td>
                                <td><?= $value["kategori_dokumentasi"] ?></td>
                                <td><?= $value["nama_dokumentasi"] ?></td>
                                <td class="center">
                                    <?php if (session('userData')['role_user'] == "Admin") : ?><a href="dokumentasi/edit/<?= $value["id_file"] ?>">
                                            <i class="fas fa-edit fa-2x"></i>
                                        </a>
                                        <a href="javascript:confirmDelete('dokumentasi/hapus/<?= $value["id_file"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a>
                                        <a href data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["deskripsi"] ?>','<?= date('d', strtotime($value["tgl_upload"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_upload"]))) . ' ' . date('Y', strtotime($value["tgl_upload"])) ?>','<?= date("H:i", strtotime($value["waktu_upload"])) ?>','<?= $value["user_upload"] ?>',)">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                        <a href="/dokumentasi/download/<?= $value["id_file"] ?>" target="_blank">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                    <?php elseif (session('userData')['role_user'] == "Kalab") : ?>
                                        <a href="dokumentasi/edit/<?= $value["id_file"] ?>">
                                            <i class="fas fa-edit fa-2x"></i>
                                        </a>
                                        <a href="javascript:confirmDelete('dokumentasi/hapus/<?= $value["id_file"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a>
                                        <a href data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["deskripsi"] ?>','<?= date('d', strtotime($value["tgl_upload"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_upload"]))) . ' ' . date('Y', strtotime($value["tgl_upload"])) ?>','<?= date("H:i", strtotime($value["waktu_upload"])) ?>','<?= $value["user_upload"] ?>',)">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                        <a href="/dokumentasi/download/<?= $value["id_file"] ?>" target="_blank">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                    <?php elseif (session('userData')['role_user'] == "Kaprodi") : ?>
                                        <a href="dokumentasi/edit/<?= $value["id_file"] ?>">
                                            <i class="fas fa-edit fa-2x"></i>
                                        </a>
                                        <a href="javascript:confirmDelete('dokumentasi/hapus/<?= $value["id_file"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a>
                                        <a href data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["deskripsi"] ?>','<?= date('d', strtotime($value["tgl_upload"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_upload"]))) . ' ' . date('Y', strtotime($value["tgl_upload"])) ?>','<?= date("H:i", strtotime($value["waktu_upload"])) ?>','<?= $value["user_upload"] ?>',)">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                        <a href="/dokumentasi/download/<?= $value["id_file"] ?>" target="_blank">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <?php elseif (session('userData')['role_user'] == "Sekprodi") : ?>
                                        <a href="dokumentasi/edit/<?= $value["id_file"] ?>">
                                            <i class="fas fa-edit fa-2x"></i>
                                        </a>
                                        <a href="javascript:confirmDelete('dokumentasi/hapus/<?= $value["id_file"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a>
                                        <a href data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["deskripsi"] ?>','<?= date('d', strtotime($value["tgl_upload"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_upload"]))) . ' ' . date('Y', strtotime($value["tgl_upload"])) ?>','<?= date("H:i", strtotime($value["waktu_upload"])) ?>','<?= $value["user_upload"] ?>',)">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                        <a href="/dokumentasi/download/<?= $value["id_file"] ?>" target="_blank">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                    <?php elseif (session('userData')['role_user'] == "Aslab") : ?>
                                        <a href="dokumentasi/edit/<?= $value["id_file"] ?>">
                                            <i class="fas fa-edit fa-2x"></i>
                                        </a>
                                        <!-- <a href="javascript:confirmDelete('dokumentasi/hapus/<?= $value["id_file"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a> -->
                                        <a href data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["deskripsi"] ?>','<?= date('d', strtotime($value["tgl_upload"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_upload"]))) . ' ' . date('Y', strtotime($value["tgl_upload"])) ?>','<?= date("H:i", strtotime($value["waktu_upload"])) ?>','<?= $value["user_upload"] ?>',)">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                        <a href="/dokumentasi/download/<?= $value["id_file"] ?>" target="_blank">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function showModal(deskripsi, tgl_upload, waktu_upload, user_upload) {
            document.getElementById('modalxlLabel').innerText = 'Detail Dokumentasi';
            var modalBody = document.querySelector('#modalxl .modal-body');

            modalBody.innerHTML = `
                        <div class="row">
                        <div class="col">Deskripsi</div>
                        <div class="col-data">${deskripsi}</div>
                        </div>
                        <div class="row">
                        <div class="col">Tanggal Upload</div>
                        <div class="col-data">${tgl_upload}</div>
                        </div>
                        <div class="row">
                        <div class="col">Waktu Upload</div>
                        <div class="col-data">${waktu_upload} WIB</div>
                        </div>
                        <div class="row">
                        <div class="col">User Upload</div>
                        <div class="col-data">${user_upload}</div>
                        </div>
                        
                        `;
        }
    </script>
</div>
<div class="clearfix"></div><br><br><br><br>
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
<!-- /.container -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toast = document.getElementById('custom-toast');

        if (toast) {
            setTimeout(function() {
                toast.classList.add('show-toast');
            }, 100);

            setTimeout(function() {
                toast.classList.remove('show-toast');
            }, 3000);
        }
    });
</script>
<?= $this->endSection() ?>