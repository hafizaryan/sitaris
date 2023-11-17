<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
    #image-overlay {
        width: 90%;
        height: 90%;
    }

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
<div class="container-fluid">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <?= $judul; ?></li>
        </ol>
    </nav>
    <h1 class="h5 mt-4 mb-4 ml-1 ">Sistem Informasi Inventaris Laboratorium</h1>
    <?php if (session()->has('success')) : ?>
        <div id="custom-toast" class="custom-toast">
            <i class="fas fa-check-circle checkmark-icon"></i>
            <?= session('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #2A3F54;">PEMUSNAHAN BARANG</h6>
        </div>
        <div class="card-body">
            <?php if (session('userData')['role_user'] == "Admin") : ?>
                <a href="pemusnahan_barang/tambah" class="btn btn-success">Tambah Data</a>
            <?php elseif (session('userData')['role_user'] == "Kalab") : ?>
                <a href="pemusnahan_barang/tambah" class="btn btn-success">Tambah Data</a>
            <?php elseif (session('userData')['role_user'] == "Aslab") : ?>
                <a href="pemusnahan_barang/tambah" class="btn btn-success">Tambah Data</a>
            <?php endif; ?>
            <br><br>
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <td class="center"><b>NO</b></td>
                            <th>Nama Barang</th>
                            <th>Tanggal Pemusnahan</th>
                            <th>Waktu</th>
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
                                <td><?= $value["nama_barang"] ?></td>
                                <td><?= date('d', strtotime($value["tgl_pemusnahan"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_pemusnahan"]))) . ' ' . date('Y', strtotime($value["tgl_pemusnahan"])) ?></td>
                                <td><?= date("H:i", strtotime($value["waktu"])) ?> WIB</td>
                                <?php if (session('userData')['role_user'] == "Admin") : ?>
                                    <td class="center">
                                        <a href="pemusnahan_barang/edit/<?= $value["id_musnah"] ?>">
                                            <i class="fas fa-edit fa-2x"></i>
                                        </a>
                                        <a href="javascript:confirmDelete('pemusnahan_barang/hapus/<?= $value["id_musnah"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["alasan"] ?>', '<?= $value["id_musnah"] ?>')">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                    </td>
                                <?php elseif (session('userData')['role_user'] == "Kalab") : ?>
                                    <td class="center">
                                        <a href="pemusnahan_barang/edit/<?= $value["id_musnah"] ?>">
                                            <i class="fas fa-edit fa-2x"></i>
                                        </a>
                                        <a href="javascript:confirmDelete('pemusnahan_barang/hapus/<?= $value["id_musnah"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["alasan"] ?>', '<?= $value["id_musnah"] ?>')">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                    </td>
                                <?php elseif (session('userData')['role_user'] == "Aslab") : ?>
                                    <td class="center">
                                        <a href="pemusnahan_barang/edit/<?= $value["id_musnah"] ?>">
                                            <i class="fas fa-edit fa-2x"></i>
                                        </a>
                                        <a href="javascript:confirmDelete('pemusnahan_barang/hapus/<?= $value["id_musnah"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["alasan"] ?>', '<?= $value["id_musnah"] ?>')">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                    </td>
                                <?php elseif (session('userData')['role_user'] == "Kaprodi") : ?>
                                    <td class="center">
                                        <a href="#" data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["alasan"] ?>', '<?= $value["id_musnah"] ?>')">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                    </td>
                                <?php elseif (session('userData')['role_user'] == "Kaprodi") : ?>
                                    <td class="center">
                                        <a href="#" data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["alasan"] ?>', '<?= $value["id_musnah"] ?>')">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="clearfix"></div>

<script>
    function showModal(alasan, musnahId) {
        document.getElementById('modalxlLabel').innerText = 'Detail';
        var modalBody = document.querySelector('#modalxl .modal-body');
        modalBody.innerHTML = '';

        modalBody.innerHTML += `
    <div class="row">
        <div class="col">Alasan</div>
        <div class="col-data">${alasan}</div>
    </div>
    <div class="row">
        <div class="col">Bukti Pemusnahan</div>
        <div class="col-data">
            <a href="/pemusnahan_barang/download/${musnahId}" target="_blank">
                <i class="fas fa-download fa-lg"></i>
            </a>
        </div>
    </div>
    `;
    }
</script>
<?php
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