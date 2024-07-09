<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    td.center {
        align-items: center;
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
            <h6 class="m-0 font-weight-bold" style="color: #2A3F54;">PEMINJAMAN RUANGAN</h6>
        </div>
        <div class="card-body">
            <br>
            <button type="button" class="btn btn-info pull-right " target="_blank" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-print"></i> Cetak</button>
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
            <div class="dropdown-menu">
                <?php
                $uniqueIds = array_unique(array_column($model, 'id_ruangan'));
                foreach ($uniqueIds as $id) {
                    $index = array_search($id, array_column($model, 'id_ruangan'));
                    if ($index !== false) {
                        $nama_ruangan = $model[$index]['nama_ruangan'];
                        echo '<a target="_blank" class="dropdown-item" href="peminjaman_ruangan/cetak/' . $id . '">' . $nama_ruangan . '</a>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="table-responsive" style=" max-height: 1100px !important; overflow-y: auto;">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <td class="center"><b>NO</b></td>
                        <th>Nama Ruangan</th>
                        <th>Asal Peminjam</th>
                        <th>Nama Peminjam</th>
                        <th>Lama Peminjaman</th>
                        <th>Konfirmasi</th>
                        <th class="center-text">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    usort($model, function ($a, $b) {
                        return $b['id_peminjaman_ruangan'] - $a['id_peminjaman_ruangan'];
                    });
                    foreach ($model as $key => $value) {
                        $no++;
                    ?>
                        <tr>
                            <td class="center"><?php echo $no; ?></td>
                            <td><?= $value["nama_ruangan"] ?></td>
                            <td><?= $value["organisasi"] ?></td>
                            <td><?= $value["nama_peminjam"] ?></td>
                            <td><?= $value["lama_peminjaman"] ?> Hari</td>
                            <td>
                                <a href="mailto:<?= $value["email_peminjam"] ?>?subject=Konfirmasi Peminjaman&body=Peminjaman Anda telah berhasil diterima%0D%0A%0D%0ASITARIS DEV%0D%0A%0D%0A[Catatan: Ini adalah pesan otomatis, jangan membalas email ini]" target="_blank">
                                    <button id="konfirmasiButton" class="btn btn-sm btn-warning" type="button" style="color:white">Konfirmasi</button>
                                </a>
                                <script>
                                    var button = document.getElementById("konfirmasiButton");
                                    var confirmationKey = "confirmationStatus";
                                    // Periksa apakah sudah ada status konfirmasi di cookie
                                    var isConfirmed = getCookie(confirmationKey);
                                    if (isConfirmed === "true") {
                                        button.innerText = "Dikonfirmasi";
                                        button.disabled = true;
                                    }
                                    button.addEventListener("click", function() {
                                        if (isConfirmed !== "true") {
                                            button.innerText = "Dikonfirmasi";
                                            button.disabled = true;
                                            // Simpan status konfirmasi di cookie
                                            setCookie(confirmationKey, "true", 365); // Simpan selama satu tahun
                                        }
                                    });
                                    // Fungsi untuk mengatur cookie
                                    function setCookie(name, value, days) {
                                        var expires = "";
                                        if (days) {
                                            var date = new Date();
                                            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                                            expires = "; expires=" + date.toUTCString();
                                        }
                                        document.cookie = name + "=" + value + expires + "; path=/";
                                    }
                                    // Fungsi untuk mendapatkan nilai cookie
                                    function getCookie(name) {
                                        var nameEQ = name + "=";
                                        var ca = document.cookie.split(';');
                                        for (var i = 0; i < ca.length; i++) {
                                            var c = ca[i];
                                            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                                            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                                        }
                                        return null;
                                    }
                                </script>
                            </td>
                            <td class="center" style="width: 120px;">
                                <?php if (session('userData')['role_user'] == "Admin") : ?>
                                    <a href="javascript:confirmDelete('peminjaman_ruangan/hapus/<?= $value["id_peminjaman_ruangan"] ?>')">
                                        <i class="fas fa-trash fa-2x"></i>
                                    </a>
                                <?php elseif (session('userData')['role_user'] == "Kalab") : ?>
                                    <a href="javascript:confirmDelete('peminjaman_ruangan/hapus/<?= $value["id_peminjaman_ruangan"] ?>')">
                                        <i class="fas fa-trash fa-2x"></i>
                                    </a>
                                <?php endif; ?>
                                <a href data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["nama_ruangan"] ?>' , '<?= $value["asal_peminjam"] ?>', '<?= $value["nama_fakultas"] ?>', '<?= $value["nama_prodi"] ?>', '<?= $value["nama_peminjam"] ?>', '<?= $value["email_peminjam"] ?>', '<?= $value["no_hp"] ?>', '<?= date('d', strtotime($value["tgl_peminjaman"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_peminjaman"]))) . ' ' . date('Y', strtotime($value["tgl_peminjaman"])) ?>','<?= $value["lama_peminjaman"] ?>','<?= $value["biaya_peminjaman"] ?>','<?= base_url('/uploads/' . $value['bukti_peminjaman']) ?>', '<?= $value["keterangan"] ?>')">
                                    <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                </a>
                                <a href="/peminjaman_ruangan/download/<?= $value["id_peminjaman_ruangan"] ?>" target="_blank">
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
<br><br>
<div class="clearfix"></div>
<script>
    function showModal(nama_ruangan, asal_peminjam, nama_fakultas, nama_prodi, nama_peminjam, email_peminjam, no_hp, tgl_peminjaman, lama_peminjaman, biaya_peminjaman, bukti_peminjaman, keterangan) {
        document.getElementById('modalxlLabel').innerText = 'Detail';
        var modalBody = document.querySelector('#modalxl .modal-body');
        var modalContent = `
            <div class="row">
                <div class="col">Nama Ruangan</div>
                <div class="col-data">${nama_ruangan}</div>
            </div>
            <div class="row">
                <div class="col">Asal Peminjam</div>
                <div class="col-data">${asal_peminjam}</div>
            </div>
        `;
        if (asal_peminjam === 'Internal') {
            modalContent += `
                <div class="row">
                    <div class="col">Asal Fakultas / Lembaga</div>
                    <div class="col-data">${nama_fakultas}</div>
                </div>
                <div class="row">
                    <div class="col">Asal Prodi / Unit</div>
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
                <div class="col">Lama Peminjaman</div>
                <div class="col-data">${lama_peminjaman} Hari</div>
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
                    <div class="col-data">Rp.${biaya_peminjaman}</div>
                </div>
            `;
        }
        modalBody.innerHTML = modalContent;
    }
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
$tanggal = date('d');
$bulanInggris = date('F');
$bulanIndonesia = bulanIndonesia($bulanInggris);
$tahun = date('Y');
?>
<?= $this->endSection() ?>