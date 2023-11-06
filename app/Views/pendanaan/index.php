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

<!-- Awal Konten Halaman -->
<div class="container-fluid">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>index">Beranda</a> / <?= $judul; ?></li>
        </ol>
    </nav>

    <!-- Judul Halaman -->
    <h1 class="h5 mt-4 mb-4 ml-1">Sistem Informasi Inventaris Laboratorium</h1>
    <!-- Tampilkan pemberitahuan jika berhasil -->
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

    <!-- Contoh DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #2A3F54;">PENDANAAN</h6>
        </div>

        <div class="card-body">
            <a href="pendanaan/tambah" class="btn btn-success">Tambah Data</a>
            <br><br>
            <div class="table-responsive" style="max-height: 1000px;">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                        <td class="center"><b>NO</b></td>
                            <th>Jenis Pendanaan</th>
                            <th>Keterangan</th>
                            <th class="center-text" width="60px">Aksi</th>
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
                                <td><?= $value["jenis_pendanaan"] ?></td>
                                <td><?= $value["keterangan"] ?></td>
                                <td class="center">
                                    <!-- Tautan Edit dengan ikon -->
                                    <a href="pendanaan/edit/<?= $value["id_pendanaan"] ?>">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </a>

                                    <!-- Tautan Hapus dengan ikon dan dialog konfirmasi -->
                                    <a href="javascript:confirmDelete('pendanaan/hapus/<?= $value["id_pendanaan"] ?>')">
                                        <i class="fas fa-trash fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Konten Halaman -->
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