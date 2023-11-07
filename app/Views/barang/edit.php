<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
    input[readonly] {
        cursor: not-allowed;
    }
</style>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>index">Beranda</a> / <a href="<?= base_url(); ?>barang">Barang</a> / Edit</li>
        </ol>
    </nav>
    <!-- START WIDGETS -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/' . $url) ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading"><br>
                        <h3 class="panel-title ml-3"><strong><?= $judul ?></strong></h3>
                        <input type="hidden" name="<?= $key ?>" value="<?= $id ?>" class="form-control" />
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Jenis Pendanaan</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="select">
                                        <select name="id_pendanaan" class="form-control" required>
                                            <option value="" disabled selected>Pilih Jenis Pendanaan</option>
                                            <?php foreach ($macamPendanaan as $value) { ?>
                                                <option value="<?= $value['id_pendanaan'] ?>" <?= $value['id_pendanaan'] === $model['id_pendanaan'] ? ' selected' : '' ?>>
                                                    <?= $value['jenis_pendanaan'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!-- <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Ruang</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="select">
                                        <select name="id_ruangan" class="form-control" required>
                                            <option value="" disabled selected>Pilih Lokasi Barang</option>
                                            <?php foreach ($macamRuangan as $key => $value) { ?>
                                                <option value="<?= $value['id_ruangan'] ?>" <?= $value['id_ruangan'] === $model['id_ruangan'] ? ' selected' : '' ?>>
                                                    <?= $value['nama_ruangan'] ?>
                                                </option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Tahun Barang</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="select">
                                        <select class="form-control" name="tahun_barang">
                                            <option><?= $model['tahun_barang'] ?></option>
                                            <?php
                                            for ($x = date("Y"); $x >= 2002; $x -= 1) {
                                                echo "<option> $x </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <input type="text" class="form-control" name="id_pendanaan" id="id_pendanaan" value="<?= $model['id_pendanaan'] ?>" readonly hidden />
                    <input type="text" class="form-control" name="id_ruangan" id="id_ruangan" value="<?= $model['id_ruangan'] ?>" readonly hidden />
                    <input type="text" class="form-control" name="tahun_barang" id="tahun_barang" value="<?= $model['tahun_barang'] ?>" readonly hidden />
                    <input type="text" class="form-control" name="kategori_barang" id="kategori_barang" value="<?= $model['kategori_barang'] ?>" readonly hidden />
                    <!-- <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Kategori Barang</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <select class="form-control" name="kategori_barang" id="kategori_barang">
                                            <?php
                                            $enumValues = array("Alat", "Furnitur", "Media", "Perangkat");
                                            foreach ($enumValues as $enumValue) {
                                                if ($enumValue === $model['kategori_barang']) {
                                                    echo "<option selected>$enumValue</option>";
                                                } else {
                                                    echo "<option>$enumValue</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Subkategori</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <select class="form-control" name="sub_kategori" id="sub_kategori">
                                            <option><?= $model['sub_kategori'] ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <?php
                    $sub_kategori = str_replace('_', ' ', $model['sub_kategori']);
                    ?>
                    <input type="text" class="form-control" name="sub_kategori" id="sub_kategori" value="<?= $sub_kategori ?>" readonly hidden />
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Merk Barang</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <input type="text" name="nama_barang" maxlength="50" value="<?= $model['nama_barang'] ?>" class="form-control" id="nama_barang" autofocus required readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Spesifikasi Barang</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <textarea type="text" cols="30" rows="2" name="spek_barang" class="form-control" autofocus><?= $model['spek_barang'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Kondisi</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <select class="form-control" name="kondisi" id="kondisi">
                                            <?php
                                            $enumValues = array("Baik", "Rusak", "Hilang", "Musnah", "Tak_Layak_Pakai");
                                            foreach ($enumValues as $enumValue) {
                                                $displayValue = str_replace("_", " ", $enumValue); // Mengganti garis bawah dengan spasi untuk tampilan
                                                $databaseValue = $enumValue; // Nilai asli dengan garis bawah untuk disimpan ke database
                                                if ($databaseValue === $model['kondisi']) {
                                                    echo "<option value='$databaseValue' selected>$displayValue</option>";
                                                } else {
                                                    echo "<option value='$databaseValue'>$displayValue</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Deskripsi</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <textarea type="text" cols="30" rows="2" name="deskripsi" class="form-control" autofocus><?= $model['deskripsi'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Tanggal Masuk Barang</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <input type="date" hidden name="tgl_masuk_barang" value="<?= $model['tgl_masuk_barang'] ?>" class="form-control" autofocus />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <input type="date" name="tgl_masuk_barang" value="<?= $model['tgl_masuk_barang'] ?>" class="form-control" autofocus hidden />
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Gambar</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <input type="file" name="gambar_barang" id="gambar_barang" style="width:100%" class="form-control" accept=".jpeg, .jpg, .png" onchange="validateImageFile()" autofocus />
                                        <img src="<?= base_url('/uploads/' . $model['gambar_barang']) ?>" width="30%" alt="Gambar" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input hidden type="text" name="user_input" class="form-control" autofocus value="<?= $model['user_input'] ?>" />
                    <input hidden type="text" name="user_edit" class="form-control" autofocus value="<?php echo session('userData')['nama']; ?>" />
                    <input type="date" name="tgl_edit" id="tgl_edit" class="form-control" autofocus hidden />
                    <div class="panel-footer">
                        <input type="submit" value="SIMPAN" class="btn btn-primary pull-right">
                        <input type="button" value="KEMBALI" class="btn btn-danger pull-right" onclick="history.back()">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br><br><br><br>

<?php
// Ambil nilai waktu_input dari $model
$waktu_input = $model['waktu_input'];
// Ubah format waktu_input ke dalam objek DateTime
$dateTime = new DateTime($waktu_input);
// Ambil bagian jam dan menit dari objek DateTime
$jam_dan_waktu = $dateTime->format('H:i');
// Tampilkan nilai jam dan waktu pada input
?>
<script>
    // Ambil elemen input tanggal
    var inputTanggal = document.getElementById("tgl_edit");
    // Dapatkan tanggal sekarang dalam format YYYY-MM-DD
    var tanggalSekarang = new Date().toISOString().split("T")[0];
    // Setel nilai input tanggal ke tanggal sekarang
    inputTanggal.value = tanggalSekarang;
    // Get the select elements
    const kategoriSelect = document.getElementById('kategori_barang');
    // const subKategoriSelect = document.getElementById('sub_kategori');
    const kategoriOptions = {
        'Alat': ['Cutter', 'Krimping', 'Set_Obeng', 'Toolbox'],
        'Furnitur': ['Air_Conditioner', 'Jam_Dinding', 'Kursi', 'Lemari', 'Loker', 'Meja', 'Rak'],
        'Media': ['GPS_Mobile', 'Layar_Proyektor', 'Livecam', 'Papan_Tulis', 'Proyektor'],
        'Perangkat': ['Access_Point', 'Antena', 'Camera_CCTV', 'Camera_Eksternal', 'CPU', 'Hardisk', 'Kabel', 'Keyboard', 'Komputer', 'LAN_Card', 'LAN_Tester', 'Monitor', 'Modem', 'Mouse', 'Poe_Adapter', 'RAM', 'Router', 'Server', 'Speaker', 'Switch', 'UPS', 'USB_Adapter', 'USB_Wireless', 'Wireless_Card'],
    };

    // Fungsi untuk memperbarui opsi Sub Kategori
    function updateSubKategoriOptions() {
        // Menghapus opsi sebelumnya
        subKategoriSelect.innerHTML = '';
        // Mendapatkan nilai Kategori yang dipilih
        const selectedKategori = kategoriSelect.value;
        // Mengambil daftar opsi Sub Kategori berdasarkan Kategori yang dipilih
        const subKategoriOptions = kategoriOptions[selectedKategori] || [];
        // Menambahkan opsi-opsi baru
        for (const subKategori of subKategoriOptions) {
            const option = document.createElement('option');
            option.text = subKategori;
            subKategoriSelect.appendChild(option);
        }
        // Menetapkan opsi yang dipilih sebelumnya
        const selectedSubKategori = '<?= $model['sub_kategori'] ?>';
        // Memeriksa apakah opsi yang dipilih sebelumnya ada dalam daftar opsi Sub Kategori yang baru
        if (subKategoriOptions.includes(selectedSubKategori)) {
            subKategoriSelect.value = selectedSubKategori;
        }
    }
    kategoriSelect.addEventListener('change', updateSubKategoriOptions);
    updateSubKategoriOptions();

    // Fungsi untuk mengisi nilai input dengan tanggal sekarang
    function validateImageFile() {
        const fileInput = document.getElementById('gambar_barang');
        const file = fileInput.files[0];
        const allowedExtensions = /(\.jpeg|\.jpg|\.png)$/i;
        const maxSize = 10 * 1024 * 1024; // 10 MB
        if (!allowedExtensions.exec(file.name)) {
            alert('File harus berupa gambar dengan format JPG, JPEG atau PNG.');
            fileInput.value = '';
            return false;
        } else if (file.size > maxSize) {
            alert('Ukuran file tidak boleh melebihi 10 MB.');
            fileInput.value = '';
            return false;
        }
        return true;
    }
</script>
<!-- END PAGE CONTENT WRAPPER -->
<?= $this->endSection() ?>