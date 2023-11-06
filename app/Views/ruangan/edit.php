<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>index">Beranda</a> / <a href="<?= base_url(); ?>prodi">Prodi</a> / Edit</li>
        </ol>
    </nav>
    <!-- START WIDGETS -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/ruangan/edit') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <div class="panel-heading"><br>
                            <h3 class="panel-title ml-3"><strong>Edit Ruangan</strong></h3>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama Ruangan</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="text" name="nama_ruangan" value="<?= $model['nama_ruangan'] ?>" class="form-control" maxlength="50" autofocus>
                                            <input type="hidden" name="id_ruangan" value="<?= $id ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Deskripsi Ruangan</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <textarea name="deskripsi_ruangan" id="" cols="30" rows="2" class="form-control" autofocus><?= $model['deskripsi_ruangan'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Gambar Ruangan</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="file" name="gambar_ruangan" id="gambar_ruangan" style="width:100%" class="form-control" accept=".jpeg, .jpg, .png" onchange="validateImageFile()" autofocus />
                                            <img src="<?= base_url('/uploads/' . $model['gambar_ruangan']) ?>" width="30%" class="mt-2" alt="gambar" />
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
</div>
<script>
    window.onload = setTodayDate;

    function validateImageFile() {
        const fileInput = document.getElementById('gambar_ruangan');
        const file = fileInput.files[0];

        const allowedExtensions = /(\.jpeg|\.jpg|\.png)$/i;
        const maxSize = 10 * 1024 * 1024; // 10 MB

        if (!allowedExtensions.exec(file.name)) {
            alert('Gambar harus berupa file dengan format JPEG atau PNG.');
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