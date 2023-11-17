<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <a href="<?= base_url(); ?>dokumentas">Dokumentasi</a> / Edit</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/dokumentasi/edit') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading"><br>
                        <h3 class="panel-title ml-3"><strong><?= $judul ?></strong></h3>
                        <input type="hidden" name="id_file" value="<?= $id ?>" class="form-control" />
                    </div>
                    <div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Kategori Dokumentasi</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <select class="form-control" name="kategori_dokumentasi" id="kategori_dokumentasi">
                                                <?php
                                                $enumValues = array("Foto", "Dokumen");
                                                foreach ($enumValues as $enumValue) {
                                                    if ($enumValue === $model['kategori_dokumentasi']) {
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
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama Dokumentasi</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="text" name="nama_dokumentasi" value="<?= $model['nama_dokumentasi'] ?>" class="form-control" maxlength="30" autofocus />
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
                                            <textarea name="deskripsi" id="" cols="30" rows="2" class="form-control" maxlength="100" autofocus><?= $model['deskripsi'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Upload Dokumentasi</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <input type="file" name="upload_dokumentasi" id="upload_dokumentasi" style="width: 100%;" class="form-control" accept=".pdf, .jpeg, .jpg, .png" onchange="validateImageFile()" autofocus />
                                        <div class="input-group">
                                            <embed src="<?= base_url('/uploads/dokumentasi/' . $model['upload_dokumentasi']) ?>" type="application/pdf" width="100%">
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
<script>
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