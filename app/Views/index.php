<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<style>
    /* CSS for mobile responsiveness */
    @media (max-width: 768px) {

        /* Reduce font sizes for better readability */
        .text-xs {
            font-size: 12px;
        }

        /* Adjust breadcrumb font size */
        .breadcrumb {
            /* margin-top: 5px; */
            font-size: 10px;
        }

        /* Reduce the number of cards per row */
        .col-xl-3 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        /* Adjust padding or margins for better spacing */
        .card-body {
            padding: 20px;
        }
    }
</style>
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <?= $judul; ?></li>
    </ol>
</nav>
<div>
    <h4 class="display-9 mt-3">Selamat Datang di Sistem Informasi Inventaris Laboratorium</h4>
    <?php if (session()->has('success')) : ?>
        <div id="custom-toast" class="custom-toast">
            <i class="fas fa-check-circle checkmark-icon"></i>
            <?= session('success') ?>
        </div>
    <?php endif; ?>
</div>
<br>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs  text-success text-uppercase mb-1">Barang</div>
                        <a href="barang">
                            <div class="h5 mb-0  text-gray-800"><?php echo count($barang) ?> Barang</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cubes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs text-success text-uppercase mb-1">Komputer</div>
                        <a href="barang">
                            <div class="h5 mb-0 text-gray-800">
                                <?php
                                $jumlahKomputer = 0; // Inisialisasi variabel untuk menghitung jumlah komputer
                                foreach ($barang as $item) {
                                    if ($item['sub_kategori'] == 'Komputer') {
                                        $jumlahKomputer++;
                                    }
                                }
                                echo $jumlahKomputer . " Komputer";
                                ?>
                            </div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-desktop fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs  text-success text-uppercase mb-1">Pendanaan</div>
                        <a href="pendanaan">
                            <div class="h5 mb-0  text-gray-800"><?php echo count($pendanaan) ?> Jenis Pendanaan</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs  text-success text-uppercase mb-1">
                            Dokumentasi</div>
                        <a href="dokumentasi">
                            <div class="h5 mb-0  text-gray-800"><?php echo count($dokumentasi) ?> Dokumentasi</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs  text-success text-uppercase mb-1">
                            Peminjaman Barang</div>
                        <a href="peminjaman_barang">
                            <div class="h5 mb-0  text-gray-800"><?php echo count($peminjaman_barang) ?> Peminjaman Barang</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs  text-success text-uppercase mb-1">Peminjaman Ruangan</div>
                        <a href="peminjaman_ruangan">
                            <div class="h5 mb-0  text-gray-800"><?php echo count($peminjaman_ruangan) ?> Peminjaman Ruangan</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-handshake fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs  text-success text-uppercase mb-1">Maintenance</div>
                        <a href="maintenance">
                            <div class="h5 mb-0  text-gray-800"><?php echo count($maintenance) ?> Maintenance</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-wrench fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs  text-success text-uppercase mb-1">
                            Pemusnahan Barang</div>
                        <a href="pemusnahan_barang">
                            <div class="h5 mb-0  text-gray-800"><?php echo count($pemusnahan_barang) ?> Pemusnahan Barang</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-trash fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<!-- /top tiles -->
<?= $this->endSection(); ?>