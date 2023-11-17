<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <a href="<?= base_url(); ?>fakultas">Fakultas</a> / Tambah</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/fakultas/tambah') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="col-md-12"><br>
                                <h3 class="panel-title ml-2"><strong><?= $judul ?></strong></h3>
                            </div>
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama Fakultas <span style="color: red;">*</span></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="input-group">
                                                <input type="text" name="nama_fakultas" class="form-control" maxlength="60" autofocus required />
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
<?= $this->endSection() ?>