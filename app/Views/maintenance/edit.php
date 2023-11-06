<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>index">Beranda</a> / <a href="<?= base_url(); ?>maintenance">Maintenance</a> / Edit</li>
        </ol>
    </nav>
    <!-- START WIDGETS -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/maintenance/edit') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading"><br>
                        <h3 class="panel-title ml-3"><strong><?= $judul ?></strong></h3>
                        <input type="hidden" name="id_maintenance" value="<?= $id ?>" class="form-control" />
                    </div>
                    <div class="col-md-12">
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Status</label>
                                <div class="col-md-6 col-xs-12 control-label">
                                    <div class="">
                                        <select class="form-control" name="status" id="status">
                                            <?php
                                            $enumValues = array("Sedang Proses", "Selesai");
                                            foreach ($enumValues as $enumValue) {
                                                if ($enumValue === $model['status']) {
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