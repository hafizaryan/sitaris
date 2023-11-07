<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    td.center {
        align-items: center;
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
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <?= $judul; ?></li>
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
            <h6 class="m-0 font-weight-bold" style="color: #2A3F54;">PEMINJAMAN BARANG</h6>
        </div>
        <div class="card-body">
            <br>
            <a href="<?= base_url('peminjaman_barang/cetak'); ?>" target="_blank" class="btn btn-info pull-right"><i class="fas fa-file-pdf"></i> Cetak</a>
            <div class="row">
                <div class="col-md-5">
                    <?php foreach ($id_referensi as $referensi) : ?>
                        <div class="input-group">
                            <input type="text" readonly value="Biaya Peminjaman = Rp.<?php echo number_format(floatval($referensi["biaya"]), 0, ',', '.') ?>.- / Hari" name="biaya" class="form-control" maxlength="20" autofocus required />
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-7">
                    <?php if (session('userData')['role_user'] == "Admin") : ?>
                        <a href="peminjaman_ruangan/tambah_biaya" class="btn btn-success"><i class="fas fa-edit fa-md"></i> Edit</a>
                    <?php elseif (session('userData')['role_user'] == "Kalab") : ?>
                        <a href="peminjaman_ruangan/tambah_biaya" class="btn btn-success"><i class="fas fa-edit fa-md"></i> Edit</a>
                    <?php endif; ?>
                </div>
            </div>            
            <div class="table-responsive" style="max-height: 1100px; overflow-y: auto;">
                <table id="datatable" class="table text-center table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Daftar Barang</th>
                            <th>Asal Peminjam</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Konfirmasi</th>
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
                                <td class="text-center"><?php echo $no; ?></td>
                                <td class="text-left">
                                    <ul>
                                        <?php
                                        foreach ($value['nama_barang'] as $idBarang) { ?>
                                            <li><?= $idBarang['nama_barang']; ?></li>
                                        <?php   } ?>
                                    </ul>
                                </td>
                                <td><?= $value["organisasi"] ?></td>
                                <td><?= $value["nama_peminjam"] ?></td>
                                <td><?= date('d', strtotime($value["tgl_peminjaman"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_peminjaman"]))) . ' ' . date('Y', strtotime($value["tgl_peminjaman"])) ?> - <?= date('d', strtotime($value["tgl_pengembalian"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_pengembalian"]))) . ' ' . date('Y', strtotime($value["tgl_pengembalian"])) ?></td>
                                <td>
                                    <?php if ($value["status"] == null) { ?>
                                        <a class="btn btn-sm btn-warning" href="/peminjaman_barang/konfirmasi/<?= $value["id_peminjaman_barang"] ?>" role="button">Konfirmasi</a>
                                    <?php } elseif ($value["status"] == 'konfirmasi') { ?>
                                        <a class="btn btn-sm btn-warning" href="/peminjaman_barang/return/<?= $value["id_peminjaman_barang"] ?>" role="button">Pengembalian Barang</a>
                                    <?php } else { ?>
                                        <p>Peminjaman Selesai</p>
                                    <?php } ?>
                                </td>
                                <td class="center" style="width: 120px;">
                                    <?php if (session('userData')['role_user'] == "Admin") : ?>
                                        <a href="javascript:confirmDelete('peminjaman_barang/hapus/<?= $value["id_peminjaman_barang"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a>
                                    <?php elseif (session('userData')['role_user'] == "Kalab") : ?>
                                        <a href="javascript:confirmDelete('peminjaman_barang/hapus/<?= $value["id_peminjaman_barang"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a>
                                    <?php endif; ?>
                                    <a href data-toggle="modal" data-target="#modalxl" onclick="showModal
                                    (
                                    '<?= $value["asal_peminjam"] ?>', 
                                    '<?= $value["asal_peminjam"] ?>', 
                                    '<?= $value["nama_fakultas"] ?>',
                                    '<?= $value["nama_prodi"] ?>', '<?= $value["nama_peminjam"] ?>', 
                                    '<?= $value["email_peminjam"] ?>', '<?= $value["no_hp"] ?>', 
                                    '<?= date('d', strtotime($value["tgl_peminjaman"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_peminjaman"]))) . ' ' . date('Y', strtotime($value["tgl_peminjaman"])) ?>',
                                    '<?= date('d', strtotime($value["tgl_pengembalian"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_pengembalian"]))) . ' ' . date('Y', strtotime($value["tgl_pengembalian"])) ?>',
                                    '<?= $value["biaya_peminjaman"] ?>',
                                    '<?= base_url('/uploads/' . $value['bukti_peminjaman']) ?>', 
                                    '<?= $value["keterangan"] ?>')">
                                        <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                    </a>
                                    <a href="/peminjaman_barang/download/<?= $value["id_peminjaman_barang"] ?>" target="_blank">
                                        <i class="fas fa-download fa-2x"></i>
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
<br><br>
<!-- /.container-fluid -->
<div class="clearfix"></div>

<script>
    function showModal(nama_barang, asal_peminjam, nama_fakultas, nama_prodi, nama_peminjam, email_peminjam, no_hp, tgl_peminjaman, tgl_pengembalian, biaya_peminjaman, bukti_peminjaman, keterangan) {
        document.getElementById('modalxlLabel').innerText = 'Detail';
        var modalBody = document.querySelector('#modalxl .modal-body');
        var modalContent = `
            <div class="row">
                <div class="col">Asal Peminjam</div>
                <div class="col-data">${asal_peminjam}</div>
            </div>
        `;
        if (asal_peminjam === 'Internal') {
            modalContent += `
                <div class="row">
                    <div class="col">Asal Fakultas</div>
                    <div class="col-data">${nama_fakultas}</div>
                </div>
                <div class="row">
                    <div class="col">Asal Prodi</div>
                    <div class="col-data">${nama_prodi}</div>
                </div>
            `;
        }
        modalContent += `
            <div class="row">
                <div class="col">Nama Peminjam</div>
                <div class="col-data">${nama_peminjam}</div>
            </div>
            <div class="row">
                <div class="col">Email Peminjam</div>
                <div class="col-data">${email_peminjam}</div>
            </div>
            <div class="row">
                <div class="col">Nomor Telepon</div>
                <div class="col-data">${no_hp}</div>
            </div>
            <div class="row">
                <div class="col">Tanggal Peminjaman</div>
                <div class="col-data">${tgl_peminjaman}</div>
            </div>
            <div class="row">
                <div class="col">Tanggal Pengembalian</div>
                <div class="col-data">${tgl_pengembalian}</div>
            </div>
            <div class="row">
                <div class="col">Tujuan Peminjaman</div>
                <div class="col-data">${keterangan}</div>
            </div>
        `;
        if (asal_peminjam === 'Eksternal') {
            modalContent += `
                <div class="row">
                    <div class="col">Biaya Peminjaman</div>
                    <div class="col-data">Rp.${biaya_peminjaman}.-</div>
                </div>
            `;
        }
        modalBody.innerHTML = modalContent;
    }
</script>

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