<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
    input[readonly] {
        cursor: not-allowed;
    }
</style>
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <a href="<?= base_url(); ?>barang">Barang</a> / Tambah</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/' . $url) ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="col-md-12"><br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title ml-3"><strong><?= $judul ?></strong></h3>
                                <input type="hidden" name="<?= $key ?>" value="<?= $id ?>" class="form-control" />
                            </div>
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Jenis Pendanaan <span style="color: red;">*</span></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="select">
                                                <select name="id_pendanaan" class="form-control" required>
                                                    <option value="" disabled selected>Pilih Jenis Pendanaan</option>
                                                    <?php foreach ($macamPendanaan as $key => $value) { ?>
                                                        <option value="<?= $value['id_pendanaan'] ?>">
                                                            <?= $value['jenis_pendanaan'] ?>
                                                        </option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Ruang <span style="color: red;">*</span></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="select">
                                                <select name="id_ruangan" class="form-control" required>
                                                    <option value="" disabled selected>Pilih Lokasi Barang</option>
                                                    <?php foreach ($macamRuangan as $key => $value) { ?>
                                                        <option value="<?= $value['id_ruangan'] ?>">
                                                            <?= $value['nama_ruangan'] ?>
                                                        </option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tahun Barang <span style="color: red;">*</span></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="select">
                                                <select name="tahun_barang" class="form-control" required>
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
                            </div>
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Kategori Barang <span style="color: red;">*</span></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="input-group">
                                                <select name="kategori_barang" class="form-control" id="kategori_barang" required>
                                                    <option value="" selected disabled>Pilih kategori</option>
                                                    <?php
                                                    $enumValues = array("Alat", "Furnitur", "Media", "Perangkat");
                                                    foreach ($enumValues as $enumValue) {
                                                        echo "<option>$enumValue</option>";
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
                                        <label class="col-md-3 col-xs-12 control-label">Subkategori <span style="color: red;">*</span></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="input-group">
                                                <select name="sub_kategori" class="form-control" id="sub_kategori" required>
                                                    <option value="" disabled selected>Pilih Subkategori</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Merk Barang <span style="color: red;">*</span></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="input-group">
                                                <input type="text" maxlength="30" class="form-control" id="nama_barang" autofocus required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="input-group">
                                                <input type="text" name="nama_barang" maxlength="30" class="form-control" id="kode" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                const tahunBarangSelect = document.querySelector('select[name="tahun_barang"]');
                                const jenisPendanaanSelect = document.querySelector('select[name="id_pendanaan"]');
                                const subKategoriSelect = document.querySelector('select[name="sub_kategori"]');
                                const namaBarangInput = document.getElementById('nama_barang');
                                const kodeInput = document.getElementById('kode');

                                let lastYear = "";
                                let lastSubKategori = "";
                                let usedCounters = {};

                                tahunBarangSelect.addEventListener('change', updateKode);
                                subKategoriSelect.addEventListener('change', updateKode);
                                namaBarangInput.addEventListener('input', updateKode);

                                function updateKode() {
                                    const tahunBarang = tahunBarangSelect.value;
                                    const jenisPendanaan = jenisPendanaanSelect.value;
                                    const subKategori = subKategoriSelect.value;
                                    const namaBarang = namaBarangInput.value;
                                    const formattedSubKategori = subKategori.slice(0, 3).toUpperCase();
                                    const kode = `${tahunBarang}-${jenisPendanaan}.${formattedSubKategori}`;
                                    const randomLetters = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 2).toUpperCase();
                                    const randomDigit = Math.floor(Math.random() * 10);
                                    zzzz
                                    kodeInput.value = `${namaBarang} ${kode}.${randomLetters}${randomDigit}`;
                                }
                            </script>
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Kondisi <span style="color: red;">*</span></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="input-group">
                                                <select name="kondisi" class="form-control" id="kondisi" required>
                                                    <option value="" selected disabled>Pilih Kondisi</option>
                                                    <?php
                                                    $enumValues = array("Baik", "Rusak", "Hilang", "Musnah", "Tak_Layak_Pakai");
                                                    foreach ($enumValues as $enumValue) {
                                                        $displayValue = str_replace("_", " ", $enumValue);
                                                        $databaseValue = $enumValue;
                                                        echo "<option value='$databaseValue'>$displayValue</option>";
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
                                        <label class="col-md-3 col-xs-12 control-label">Spesifikasi Barang</label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="input-group">
                                                <textarea type="text" cols="30" rows="2" value="-" name="spek_barang" class="form-control" autofocus></textarea>
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
                                                <textarea type="text" cols="30" rows="2" name="deskripsi" maxlength="80" class="form-control" autofocus></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tanggal Masuk Barang <span style="color: red;">*</span></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="input-group"> -->
                            <input type="date" hidden name="tgl_masuk_barang" id="tgl_masuk_barang" required class="form-control" autofocus />
                            <!-- </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Gambar</label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="input-group">
                                                <input type="file" name="gambar_barang" id="gambar_barang" class="form-control" accept=".jpeg, .jpg, .png" onchange="validateImageFile()" autofocus />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Pratinjau File</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <div class="col-md-12">
                                                    <div class="panel-body form-group-separated">
                                                        <div class="form-group">
                                                            <div id="previewContainer">
                                                                <label for="gambar_barang" class="form-label"></label>
                                                                <div id="filePreview">
                                                                    <!-- Pratinjau akan ditampilkan di sini -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="time" name="waktu_input" class="form-control" autofocus value="<?php echo date('H:i'); ?>" hidden />
                            <input type="text" name="user_input" class="form-control" autofocus value="<?php echo session('userData')['nama']; ?>" hidden />
                            <input type="date" name="tgl_edit" id="tgl_edit" class="form-control" autofocus hidden />
                            <input type="text" name="user_edit" class="form-control" autofocus value="<?php echo session('userData')['nama']; ?>" hidden />
                            <div class="panel-footer">
                                <div class="col-md-12">
                                    <input type="submit" value="SIMPAN" class="btn btn-primary pull-right">
                                    <input type="button" value="KEMBALI" class="btn btn-danger pull-right" onclick="history.back()">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br><br><br><br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#gambar_barang').change(function() {
            var file = this.files[0];
            var fileType = file.type;
            if (fileType.includes('image')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#filePreview').html('<img src="' + e.target.result + '" class="img-fluid">');
                }
                reader.readAsDataURL(file);
            } else if (fileType.includes('pdf')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#filePreview').html('<embed src="' + e.target.result + '" type="application/pdf" width="100%" height="600px" />');
                }
                reader.readAsDataURL(file);
            } else {
                alert('Format file tidak didukung.');
            }
        });
    });
    const kategoriSelect = document.getElementById('kategori_barang');
    const kategoriOptions = {
        'Alat': ['Cutter', 'Krimping', 'Set_Obeng', 'Toolbox'],
        'Furnitur': ['Air_Conditioner', 'Jam_Dinding', 'Kursi', 'Lemari', 'Loker', 'Meja', 'Rak'],
        'Media': ['GPS_Mobile', 'Layar_Proyektor', 'Livecam', 'Papan_Tulis', 'Proyektor'],
        'Perangkat': ['Access_Point', 'Antena', 'Camera_CCTV', 'Camera_Eksternal', 'CPU', 'Hardisk', 'Kabel', 'Keyboard', 'Komputer', 'LAN_Card', 'LAN_Tester', 'Monitor', 'Modem', 'Mouse', 'Poe_Adapter', 'RAM', 'Router', 'Server', 'Speaker', 'Switch', 'UPS', 'USB_Adapter', 'USB_Wireless', 'Wireless_Card'],
    };

    function updateSubKategoriOptions() {
        subKategoriSelect.innerHTML = '<option>Pilih Sub Kategori</option>';
        const selectedKategori = kategoriSelect.value;
        const subKategoriOptions = kategoriOptions[selectedKategori] || [];
        for (const subKategori of subKategoriOptions) {
            const option = document.createElement('option');
            option.text = subKategori.replace(/_/g, ' ');
            option.value = subKategori;
            subKategoriSelect.appendChild(option);
        }
    }

    kategoriSelect.addEventListener('change', updateSubKategoriOptions);
    updateSubKategoriOptions();

    function setTodayDate() {
        const tglUploadInput = document.getElementById("tgl_masuk_barang");
        const tglEditInput = document.getElementById("tgl_edit");
        const today = new Date();

        const formattedDate = today.toISOString().split("T")[0];
        const formattedDate1 = today.toISOString().split("T")[0];

        tglUploadInput.value = formattedDate;
        tglEditInput.value = formattedDate1;
    }

    window.onload = setTodayDate;

    function validateImageFile() {
        const fileInput = document.getElementById('gambar_barang');
        const file = fileInput.files[0];
        const allowedExtensions = /(\.jpeg|\.jpg|\.png)$/i;
        const maxSize = 10 * 1024 * 1024;
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
<?= $this->endSection() ?>