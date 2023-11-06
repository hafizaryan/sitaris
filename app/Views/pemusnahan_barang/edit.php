<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>index">Beranda</a> / <a href="<?= base_url(); ?>pemusnahan_barang">Pemusnahan Barang</a> / Edit</li>
        </ol>
    </nav>
    <!-- START WIDGETS -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/pemusnahan_barang/edit') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading"><br>
                        <h3 class="panel-title ml-3"><strong><?= $judul ?></strong></h3>
                        <input type="hidden" name="id_musnah" value="<?= $id ?>" class="form-control" />
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Tanggal Pemusnahan Barang</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <input type="date" name="tgl_pemusnahan" value="<?= $model['tgl_pemusnahan'] ?>" class="form-control" autofocus />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Bukti Pemusnahan</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <input type="file" name="bukti_pemusnahan" class="form-control" style="width:100%" />
                                        <embed src="<?= base_url('/uploads/dokumentasi/' . $model['bukti_pemusnahan']) ?>" type="application/pdf" width="100%" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Waktu</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <input type="time" name="waktu" value="<?= $model['waktu'] ?>" class="form-control" autofocus />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Alasan</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="input-group">
                                        <textarea name="alasan" id="" cols="30" rows="2" class="form-control" autofocus maxlength="100"><?= $model['alasan'] ?></textarea>
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
<!-- END PAGE CONTENT WRAPPER -->
<?= $this->endSection() ?>