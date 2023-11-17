<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <a href="<?= base_url(); ?>dokumentasi">Dokumentasi</a> / Tambah</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/dokumentasi/tambah') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <div class="panel-heading"><br>
                            <h3 class="panel-title ml-3"><strong><?= $judul ?></strong></h3>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Kategori Dokumentasi <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <select class="form-control" name="kategori_dokumentasi" required>
                                                <option value="" disabled selected>Pilh Kategori</option>
                                                <?php
                                                $enumValues = array("Foto", "Dokumen");
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
                                    <label class="col-md-3 col-xs-12 control-label">Nama Dokumentasi <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="text" name="nama_dokumentasi" class="form-control" maxlength="50" autofocus required />
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
                                            <textarea name="deskripsi" id="" cols="30" rows="2" class="form-control" maxlength="100" autofocus></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Upload Dokumentasi <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <input type="file" name="upload_dokumentasi" id="fileInput" class="form-control" accept=".pdf, .jpeg, .jpg, .png" autofocus required />
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
                        <input hidden type="date" name="tgl_upload" id="tgl_upload" class="form-control" autofocus />
                        <input hidden type="time" name="waktu_upload" class="form-control" autofocus value="<?php echo date('H:i'); ?>" />
                        <input type="text" name="user_upload" class="form-control" autofocus value="<?php echo session('userData')['nama']; ?>" hidden />
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

    function setTodayDate() {
        const tglUploadInput = document.getElementById("tgl_upload");
        const today = new Date();
        const formattedDate = today.toISOString().split("T")[0];
        tglUploadInput.value = formattedDate;
    }
    window.onload = setTodayDate;

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
</script>
<?= $this->endSection() ?>