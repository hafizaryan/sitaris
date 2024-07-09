<?php
$this->extend('layout/main');
$this->section('content');
?>
<style>
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

    .dropdown-menu {
        max-height: 300px;
        overflow-y: auto;
    }

    @media (max-width: 768px) {
        .btn-group.dropdown {
            margin-top: 10px;
            display: block;
            margin-bottom: 10px;
        }

        .btn-group.dropdown .btn {
            width: 45%;
            text-align: left;
        }

        .btn-group.dropdown .dropdown-menu {
            position: relative;
            width: 100%;
            left: auto;
            right: 0;
        }

        .btn-group.dropdown .dropdown-menu a {
            width: 100%;
        }

        .btn-group.dropdown .dropdown-menu.show {
            display: block;
            position: static;
            width: 100%;
        }

        .btn-group.dropdown .dropdown-menu.show+.btn {
            margin-top: 10px;
        }

        .btn-group.dropdown.pull-right {
            float: none;
        }

        .pull-right {
            float: none !important;
        }
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
            <h6 class="m-0 font-weight-bold" style="color: #2A3F54;">BARANG</h6>
        </div>
        <div class="card-body">
            <?php if (session('userData')['role_user'] == "Admin") : ?>
                <a href="barang/tambah" class="btn btn-success">Tambah Data</a>
            <?php elseif (session('userData')['role_user'] == "Kalab") : ?>
                <a href="barang/tambah" class="btn btn-success">Tambah Data</a>
            <?php elseif (session('userData')['role_user'] == "Aslab") : ?>
                <a href="barang/tambah" class="btn btn-success">Tambah Data</a>
            <?php endif; ?>
            <!-- Tombol dropdown untuk filter berdasarkan QR Code -->
            <div class="btn-group dropdown pull-right mr-2 mb-3">
                <a href="<?= base_url('barang/cetak_qr/'); ?>" target="_blank" class="btn btn-info pull-right"><i class="fas fa-file-pdf"></i> QR</a>
            </div>
            <!-- Tombol dropdown untuk filter berdasarkan Tahun -->
            <div class="btn-group dropdown pull-right mr-2 mb-3">
                <button type="button" class="btn btn-info pull-right " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-pdf"></i> Tahun</button>
                <div class="dropdown-menu">
                    <?php
                    $uniqueTahunBarang = array_unique(array_column($model, 'tahun_barang'));
                    sort($uniqueTahunBarang);
                    foreach ($uniqueTahunBarang as $tahun) {
                        echo '<a class="dropdown-item" target="_blank" href="barang/cetak_tahun/' . $tahun . '">' . $tahun . '</a>';
                    }
                    ?>
                </div>
            </div>
            <!-- Tombol dropdown untuk filter berdasarkan Kondisi -->
            <div class="btn-group dropdown pull-right mr-2 mb-3">
                <button type="button" class="btn btn-info pull-right " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-pdf"></i> Kondisi</button>
                <div class="dropdown-menu">
                    <?php
                    $uniqueKondisiBarang = array_unique(array_column($model, 'kondisi'));
                    sort($uniqueKondisiBarang);
                    foreach ($uniqueKondisiBarang as $kondisi) {
                        $displayValue = str_replace('_', ' ', $kondisi);
                        echo '<a class="dropdown-item" target="_blank" href="barang/cetak_kondisi/' . $kondisi . '">' . $displayValue . '</a>';
                    }
                    ?>
                </div>
            </div>
            <!-- Tombol dropdown untuk filter berdasarkan Kategori -->
            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#cetakModal1">
                <i class="fas fa-file-pdf"></i> Kategori
            </button>
            <div class="modal fade" id="cetakModal1" tabindex="-1" role="dialog" aria-labelledby="cetakModal1Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cetakModal1Label">Cetak Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="sub_kategori">Kategori</label>
                                    <select name="sub_kategori" id="sub_kategori" class="form-control" required>
                                        <?php
                                        $uniqueSubKategori = array_unique(array_column($model, 'sub_kategori'));
                                        sort($uniqueSubKategori);
                                        ?>
                                        <?php foreach ($uniqueSubKategori as $sub_kategori) : ?>
                                            <?php
                                            $displayValue = str_replace('_', ' ', $sub_kategori);
                                            ?>
                                            <option value="<?= $sub_kategori ?>"><?= $displayValue ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_ruangan">Ruangan</label>
                                    <select name="id_ruangan" id="id_ruangan" class="form-control" required>
                                        <option value="">Pilih Ruangan</option>
                                        <?php foreach ($data_ruangan as $data) : ?>
                                            <option value="<?= $data['id_ruangan'] ?>"><?= $data['nama_ruangan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button id="cetakButtonModal1" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tombol dropdown untuk filter berdasarkan Ruangan -->
            <div class="btn-group dropdown pull-right mr-2 mb-3">
                <button type="button" class="btn btn-info pull-right " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-pdf"></i> Ruangan</button>
                <div class="dropdown-menu">
                    <?php
                    $uniqueIds = array_unique(array_column($model, 'id_ruangan'));
                    foreach ($uniqueIds as $id) {
                        $index = array_search($id, array_column($model, 'id_ruangan'));
                        if ($index !== false) {
                            $nama_ruangan = $model[$index]['nama_ruangan'];
                            echo '<a class="dropdown-item" target="_blank" href="barang/cetak_ruangan/' . $id . '">' . $nama_ruangan . '</a> ';
                        }
                    }
                    ?>
                </div>
            </div>
            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#cetakModal">
                <i class="fas fa-file-pdf"></i> Pendanaan
            </button>
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
                                        $uniqueTahunBarang = array_unique(array_column($model, 'tahun_barang'));
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
            <div class="table-responsive" style="max-height: 900px;">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <td class="center"><b>NO</b></td>
                            <th class="center-text">QR</th>
                            <th>Nama Barang</th>
                            <th>Subkategori</th>
                            <th width="220px">Spesifikasi Barang</th>
                            <th class="center-text" width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $no1 = 0;
                        $marginBetweenRows = '10px';
                        usort($model, function ($a, $b) {
                            return $b['id_barang'] - $a['id_barang'];
                        });
                        foreach ($model as $key => $value) {
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
                                <td><?= $value["nama_barang"] ?></td>
                                <td><?= str_replace('_', ' ', $value["sub_kategori"]) ?></td>
                                <td><?= $value["spek_barang"] ?></td>
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
                                    <a href data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["jenis_pendanaan"] ?>','<?= $value["nama_ruangan"] ?>', '<?= $value["tahun_barang"] ?>', '<?= $value["kategori_barang"] ?>', '<?= $value["sub_kategori"] ?>', '<?= $value["nama_barang"] ?>', '<?= $value["spek_barang"] ?>', '<?= $value["kondisi"] ?>','<?= $value["deskripsi"] ?>', '<?= date('d', strtotime($value["tgl_masuk_barang"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_masuk_barang"]))) . ' ' . date('Y', strtotime($value["tgl_masuk_barang"])) ?>', '<?= base_url('/uploads/' . $value['gambar_barang']) ?>', '<?= date("H:i", strtotime($value["waktu_input"])) ?>', '<?= $value["user_input"] ?>','<?= $value["user_edit"] ?>', '<?= date('d', strtotime($value["tgl_edit"])) . ' ' . bulanIndonesia(date('F', strtotime($value["tgl_edit"]))) . ' ' . date('Y', strtotime($value["tgl_edit"])) ?>')">
                                        <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
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
<div class="clearfix"></div>
<script>
    function showModal(jenis_pendanaan, nama_ruangan, tahun_barang, kategori_barang, sub_kategori, nama_barang, spek_barang, kondisi, deskripsi, tgl_masuk_barang, gambar_barang, waktu_input, user_input, user_edit, tgl_edit) {
        document.getElementById('modalxlLabel').innerText = 'Detail Barang';
        var modalBody = document.querySelector('#modalxl .modal-body');
        modalBody.innerHTML = '';
        modalBody.innerHTML += `
                        <div class="row">
                            <div class="col">Jenis Pendanaan</div>
                            <div class="col-data">${jenis_pendanaan}</div>
                        </div>
                        <div class="row">
                            <div class="col">Lokasi Barang</div>
                            <div class="col-data">${nama_ruangan}</div>
                        </div>
                        <div class="row">
                            <div class="col">Tahun Barang</div>
                            <div class="col-data">${tahun_barang}</div>
                        </div>
                        <div class="row">
                            <div class="col">Kategori Barang</div>
                            <div class="col-data">${kategori_barang}</div>
                        </div>
                        <div class="row">
                            <div class="col">Sub Kategori</div>
                            <div class="col-data">${sub_kategori.replace(/_/g, ' ')}</div>
                        </div>
                        <div class="row">
                            <div class="col">Merk Barang</div>
                            <div class="col-data">${nama_barang}</div>
                        </div>
                        <div class="row">
                            <div class="col">Spesifikasi Barang</div>
                            <div class="col-data">${spek_barang}</div>
                        </div>
                        <div class="row">
                            <div class="col">Kondisi</div>
                            <div class="col-data">${kondisi.replace(/_/g, ' ')}</div>
                        </div>
                        <div class="row">
                            <div class="col">Deskripsi</div>
                            <div class="col-data">${deskripsi}</div>
                        </div>
                        <div class="row">
                            <div class="col">Tanggal Input</div>
                            <div class="col-data">${tgl_masuk_barang}</div>
                        </div>
                        
                        <div class="row">
                            <div class="col">Waktu Input</div>
                            <div class="col-data">${waktu_input} WIB </div>
                        </div>
                        <div class="row">
                            <div class="col">Gambar</div>
                            <div class="col-data"> <a href="#" onclick="showImage('${gambar_barang}')">
                            <img src="${gambar_barang}" alt="" srcset="" width="25%"></div></a>
                        </div>
                        <div class="row">
                            <div class="col">Diinput Oleh</div>
                            <div class="col-data">${user_input}</div>
                        </div>
                        <div class="row">
                            <div class="col">Diedit Oleh</div>
                            <div class="col-data">${user_edit}, ${tgl_edit}
                            </div>
                        </div>
                        `;
    }

    document.addEventListener("DOMContentLoaded", function() {
        const cetakButton = document.getElementById("cetakButtonModal");
        const idPendanaanSelect = document.getElementById("id_pendanaan");
        const tahunBarangSelect = document.getElementById("tahun_barang");

        function isAtLeastOneDataFilled() {
            return idPendanaanSelect.value !== "" || tahunBarangSelect.value !== "";
        }

        function updateButtonStatus() {
            cetakButton.disabled = !isAtLeastOneDataFilled();
        }
        updateButtonStatus();
        idPendanaanSelect.addEventListener("change", updateButtonStatus);
        tahunBarangSelect.addEventListener("change", updateButtonStatus);
    });

    document.getElementById("cetakButtonModal").addEventListener("click", function() {
        var id_pendanaan = document.getElementById("id_pendanaan").value;
        var tahun_barang = document.getElementById("tahun_barang").value;
        var url = "barang/cetak_pendanaan/" + id_pendanaan;
        if (tahun_barang) {
            url += "?tahun_barang=" + tahun_barang;
        }
        window.open(url, "_blank");
    });

    document.addEventListener("DOMContentLoaded", function() {
        const cetakButton = document.getElementById("cetakButtonModal1");
        const subKategoriSelect = document.getElementById("sub_kategori");
        const ruanganSelect = document.getElementById("id_ruangan");

        function isAtLeastOneDataFilled() {
            return subKategoriSelect.value !== "" || ruanganSelect.value !== "";
        }

        function updateButtonStatus() {
            cetakButton.disabled = !isAtLeastOneDataFilled();
        }
        updateButtonStatus();
        subKategoriSelect.addEventListener("change", updateButtonStatus);
        ruanganSelect.addEventListener("change", updateButtonStatus);
    });

    document.getElementById("cetakButtonModal1").addEventListener("click", function() {
        var sub_kategori = document.getElementById("sub_kategori").value;
        var id_ruangan = document.getElementById("id_ruangan").value;
        var url = "barang/cetak_kategori/" + sub_kategori;
        if (id_ruangan) {
            url += "?id_ruangan=" + id_ruangan;
        }
        window.open(url, "_blank");
    });

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