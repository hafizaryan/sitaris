<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <a href="<?= base_url(); ?>maintenance">Maintenance</a> / Tambah</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/maintenance/tambah') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading"><br>
                        <h3 class="panel-title ml-3"><strong><?= $judul ?></strong></h3>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nama Barang <span style="color: red;">*</span></label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <?php
                                    $hasilForeach = array();
                                    foreach ($macamBarang as $key => $value) {
                                        $hasilForeach[] = array(
                                            'nama_barang' => $value['nama_barang'],
                                            'id_barang' => $value['id_barang']
                                        );
                                    }
                                    ?>
                                    <input type="text" id="searchInput" class="form-control" placeholder="Cari barang..." required>
                                    <select id="searchResult" class="form-control" name="id_barang"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Tanggal Maintenance <span style="color: red;">*</span></label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <input type="date" name="tgl_maintenance" id="tgl_maintenance" class="form-control" autofocus required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Kategori Maintenance <span style="color: red;">*</span></label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="">
                                        <select class="form-control" required name="kategori_maintenance">
                                            <option value="" disabled selected>Pilih Kategori Maintenance</option>
                                            <?php
                                            $enumValues = array("Perawatan", "Perbaikan");
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
                                <label class="col-md-3 col-xs-12 control-label">Biaya </label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" id="numberInput" onkeyup="formatNumber()" class="form-control" oninput="showRealTimeValue(this.value)" autofocus maxlength="11" />
                                        <input type="hidden" id="result" name="biaya">
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
                                        <textarea name="deskripsi_maintenance" id="" cols="30" rows="2" class="form-control" autofocus maxlength="100"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Bukti <span style="color: red;">*</span></label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <input type="file" name="bukti" id="bukti" class="form-control" accept=".pdf, .jpeg, .jpg, .png" onchange="validateImageFile()" autofocus required />
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
                                                        <label for="bukti" class="form-label"></label>
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
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Status <span style="color: red;">*</span></label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="">
                                        <select class="form-control" name="status" required>
                                            <option value="" disabled selected>Pilih Status</option>
                                            <?php
                                            $enumValues = array("Sedang_Proses", "Selesai");
                                            foreach ($enumValues as $enumValue) {
                                                echo "<option value=\"$enumValue\">$enumValue</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="submit" value="SIMPAN" class="btn btn-primary pull-right">
                        <input type="button" value="KEMBALI" class="btn btn-danger pull-right" onclick="history.back()">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br><br><br><br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bukti').change(function() {
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

    function validateImageFile() {
        const fileInput = document.getElementById('upload_dokumentasi');
        const file = fileInput.files[0];
        const allowedExtensions = /(\.jpeg|\.jpg|\.png|\.pdf)$/i;
        const maxSize = 10 * 1024 * 1024;
        if (!allowedExtensions.exec(file.name)) {
            alert('Dokumentasi harus berupa file dengan format PDF, JPEG atau PNG.');
            fileInput.value = '';
            return false;
        } else if (file.size > maxSize) {
            alert('Ukuran file tidak boleh melebihi 10 MB.');
            fileInput.value = '';
            return false;
        }
        return true;
    }
    const dataArray = <?php echo json_encode($hasilForeach); ?>;
    const searchInput = document.getElementById('searchInput');
    const searchResult = document.getElementById('searchResult');

    function populateSelect(matchedItems) {
        searchResult.innerHTML = matchedItems || '<option value="">Tidak ada hasil yang ditemukan.</option>';
    }

    function performSearch() {
        const searchText = searchInput.value.toLowerCase();
        let matchedItems = '';
        dataArray.forEach(item => {
            if (item.nama_barang.toLowerCase().includes(searchText)) {
                matchedItems += `<option value="${item.id_barang}">${item.nama_barang}</option>`;
            }
        });
        populateSelect(matchedItems);
    }
    searchInput.addEventListener('input', performSearch);

    function setTodayDate() {
        const tglUploadInput = document.getElementById("tgl_maintenance");
        const today = new Date();
        const formattedDate = today.toISOString().split("T")[0];
        tglUploadInput.value = formattedDate;
    }
    window.onload = function() {
        setTodayDate();
    };

    function formatNumber() {
        let input = document.getElementById("numberInput");
        let value = input.value.replace(/\D/g, "");
        if (value.length > 3) {
            let formattedValue = "";
            let remainder = value.length % 3;
            if (remainder > 0) {
                formattedValue = value.substr(0, remainder) + ".";
            }
            for (let i = remainder; i < value.length; i += 3) {
                formattedValue += value.substr(i, 3) + ".";
            }
            formattedValue = formattedValue.slice(0, -1);
            input.value = formattedValue;
        } else {
            input.value = value;
        }
    }

    function showRealTimeValue(value) {
        let resultElement = document.getElementById("result");
        resultElement.value = value.replace(/\D/g, "");
    }
</script>
<?= $this->endSection() ?>