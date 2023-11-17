<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <a href="<?= base_url(); ?>pemusnahan_barang">Pemusnahan Barang</a> / Tambah</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/pemusnahan_barang/tambah') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <div class="panel-heading"><br>
                            <h3 class="panel-title ml-3"><strong><?= $judul ?></strong></h3>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama Barang <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <?php
                                        // Inisialisasi variabel string kosong
                                        $hasilForeach = array();
                                        foreach ($macamBarang as $key => $value) {
                                            // Menambahkan data ke array baru
                                            $hasilForeach[] = array(
                                                'nama_barang' => $value['nama_barang'],
                                                'id_barang' => $value['id_barang']
                                            );
                                        }
                                        ?>
                                        <input type="text" id="searchInput" class="form-control" placeholder="Cari nama barang..." required>
                                        <select id="searchResult" class="form-control" name="id_barang" required></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Pemusnahan Barang <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="date" name="tgl_pemusnahan" id="tgl_pemusnahan" class="form-control" autofocus required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Bukti Pemusnahan <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="file" name="bukti_pemusnahan" id="fileInput" class="form-control" accept=".pdf, .jpeg, .jpg, .png" autofocus required />
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
                                                            <label for="fileInput" class="form-label"></label>
                                                            <div id="filePreview">
                                                                <div class="input-group">
                                                                    <label class="col-md-3 col-xs-12 control-label"></label>
                                                                    <div class="col-md-6 col-xs-12">
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
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Waktu <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="time" name="waktu" class="form-control" required autofocus value="<?php echo date('H:i'); ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Alasan </label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <textarea name="alasan" id="" cols="30" rows="2" class="form-control" autofocus maxlength="100"></textarea>
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
                </div>
        </div>
        </form>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#fileInput').change(function() {
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
                alert('Unsupported file format.');
            }
        });
    });
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
    // Fungsi untuk mengisi nilai input dengan tanggal sekarang
    function setTodayDate() {
        const tglUploadInput = document.getElementById("tgl_pemusnahan");
        // Buat objek tanggal sekarang
        const today = new Date();
        // Format tanggal ke bentuk yang sesuai dengan atribut "date" pada input
        const formattedDate = today.toISOString().split("T")[0];
        // Set nilai input dengan tanggal sekarang
        tglUploadInput.value = formattedDate;
    }
    // Panggil fungsi saat halaman selesai diload
    window.onload = setTodayDate;

    function cari() {
        $typing = document.getElementById('search').value;
        console.log($typing);

        function loadDoc() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("hasil").innerHTML = this.responseText;
                console.log(this.responseText);
            }
            xhttp.open("GET", 'search/' + $typing, true);
            xhttp.send();
        }
        loadDoc();
    }
    window.onload = setTodayDate;

    function validateImageFile() {
        const fileInput = document.getElementById('upload_dokumentasi');
        const file = fileInput.files[0];
        const allowedExtensions = /(\.jpeg|\.jpg|\.png|\.pdf)$/i;
        const maxSize = 10 * 1024 * 1024; // 10 MB
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
</script>
<?= $this->endSection() ?>