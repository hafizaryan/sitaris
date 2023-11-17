<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>index">Beranda</a> / <a href="<?= base_url(); ?>peminjaman_ruangan">Peminjaman Ruangan</a> / Tambah Biaya</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/peminjaman_ruangan/tambah_biaya') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="col-md-12"><br>
                                <h3 class="panel-title ml-2"><strong><?= $judul ?></strong></h3>
                            </div>
                            <form action="<?= base_url() ?>/peminjaman_ruangan/insertData" method="post">
                                <div class="col-md-12">
                                    <div class="panel-body form-group-separated">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Biaya Peminjaman <span style="color: red;">*</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <input type="number" name="biaya" class="form-control" maxlength="20" autofocus required />
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