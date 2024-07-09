<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
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
<div class="container-fluid">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <?= $judul; ?></li>
        </ol>
    </nav>
    <h1 class="h5 mt-4 mb-4 ml-1 ">Sistem Informasi Inventaris Laboratorium</h1>
    <?php if (session()->has('success')) : ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    position: "middle",
                    icon: "success",
                    title: "<?= session('success') ?>",
                    showConfirmButton: false,
                    timer: 1000
                });
            });
        </script>
    <?php endif; ?>
    <?php if (session()->has('error')) : ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "<?= session('error') ?>",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #2A3F54;">RUANGAN</h6>
        </div>
        <div class="card-body">
            <a href="ruangan/tambah" class="btn btn-success">Tambah Data</a>
            <br><br>
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="max-height: 1000px;" style="width:100%">
                    <thead>
                        <tr>
                            <td class="center"><b>NO</b></td>
                            <th>Nama Gedung</th>
                            <th>Nama Ruangan</th>
                            <th>Deskripsi Ruangan</th>
                            <th>Gambar Ruangan</th>
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
                                <td><?= $value["nama_gedung"] ?></td>
                                <td><?= $value["nama_ruangan"] ?></td>
                                <td style="text-align: justify; width: 35%;"><?= $value["deskripsi_ruangan"] ?></td>
                                <td class="center">
                                    <img src="<?= base_url('/uploads/' . $value['gambar_ruangan']) ?>" width="100px" alt="gambar" onclick="showImage('<?= base_url('/uploads/' . $value['gambar_ruangan']) ?>')" style="cursor:pointer" />
                                </td>
                                <td class="center" width="80px">
                                    <a href="ruangan/edit/<?= $value["id_ruangan"] ?>">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </a>
                                    <a href="javascript:confirmDelete('ruangan/hapus/<?= $value["id_ruangan"] ?>')">
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
</div><br><br><br><br>
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