<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
    #image-overlay {
        width: 90%;
        height: 90%;
    }

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

    .td {
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

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #2A3F54;">GEDUNG</h6>
        </div>
        <div class="card-body">
            <a href="gedung/tambah" class="btn btn-success">Tambah Data</a>
            <br><br>
            <div class="table-responsive" style="max-height: 1000px;" overflow-y: auto;">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                        <td class="center"><b>NO</b></td>
                            <th>Nama Gedung</th>
                            <th>Deskripsi Gedung</th>
                            <th>Gambar Gedung</th>
                            <th class="center-text" style="width: 80px;">Aksi</th>
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
                                <td><?= $value["nama_gedung"] ?></td>
                                <td style="text-align: justify; width: 35%;"><?= $value["deskripsi_gedung"] ?></td>
                                <td class="center">
                                    <img src="<?= base_url('/uploads/' . $value['gambar_gedung']) ?>" width="100px" alt="gambar" onclick="showImage('<?= base_url('/uploads/' . $value['gambar_gedung']) ?>')" style="cursor:pointer" />
                                </td>
                                <td class="center">
                                    <a href="gedung/edit/<?= $value["id_gedung"] ?>">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </a>
                                    <a href="javascript:confirmDelete('gedung/hapus/<?= $value["id_gedung"] ?>')">
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
<!-- /.container-fluid -->
<div class="clearfix"></div>
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