<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
    <ul class="breadcrumb">
        <li><a href="<?= base_url('/dashboard')?>">Home</a></li>
        <li class="active"><?= $judul ?></li>
    </ul>
    <div class="page-content-wrap">                                             
        <div class="row">
            <div class="col-md-12">                            
                <form class="form-horizontal" method="POST" action="<?= base_url('/peminjaman_barang/edit') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong><?= $judul ?></strong></h3>
                            <input type="hidden" name="id_peminjaman_barang" value="<?= $id ?>" class="form-control"/>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">          
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Peminjaman</label>
                                    <div class="col-md-6 col-xs-12 control-label">     
                                        <div class="input-group">
                                            <input type="date" name="tgl_peminjaman" value="<?= $model['tgl_peminjaman'] ?>" class="form-control" autofocus/>
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">          
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Pengembalian</label>
                                    <div class="col-md-6 col-xs-12 control-label">     
                                        <div class="input-group">
                                            <input type="date" name="tgl_pengembalian" value="<?= $model['tgl_pengembalian'] ?>" class="form-control" autofocus/>
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">          
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Asal Peminjam</label>
                                    <div class="col-md-6 col-xs-12 control-label">     
                                        <div class="input-group">
                                            <input type="text" name="asal_peminjam" value="<?= $model['asal_peminjam'] ?>" class="form-control" autofocus/>
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">          
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Organisasi</label>
                                    <div class="col-md-6 col-xs-12 control-label">     
                                        <div class="input-group">
                                            <input type="text" name="organisasi" value="<?= $model['organisasi'] ?>" class="form-control" autofocus/>
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">          
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama Peminjam</label>
                                    <div class="col-md-6 col-xs-12 control-label">     
                                        <div class="input-group">
                                            <input type="text" name="nama_peminjam" value="<?= $model['nama_peminjam'] ?>" class="form-control" autofocus/>
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">          
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Bukti Peminjaman</label>
                                    <div class="col-md-6 col-xs-12 control-label">     
                                        <div class="input-group">
                                            <input type="file" name="bukti_peminjaman" class="form-control" style="width:100%" />
                                            <br> 
                                            <img src= "<?= base_url('/uploads/'.$model['bukti_peminjaman'])?>" width="50%" alt="Nasya"/>
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">          
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Biaya Peminjaman</label>
                                    <div class="col-md-6 col-xs-12 control-label">     
                                        <div class="input-group">
                                            <input type="text" name="biaya_peminjaman" value="<?= $model['biaya_peminjaman'] ?>" class="form-control" autofocus/>
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">          
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Keterangan</label>
                                    <div class="col-md-6 col-xs-12 control-label">     
                                        <div class="input-group">
                                            <input type="text" name="keterangan" value="<?= $model['keterangan'] ?>" class="form-control" autofocus/>
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>
                        <div class="panel-footer">                        
                            <input type="submit" value="SIMPAN" class="btn btn-primary pull-right">
                            <input type="button" value="CANCEL" class="btn btn-danger pull-right" onclick="history.back()">
                        </div>
                    </div>
                </form>                        
            </div>
        </div>                        
    </div>                          
<?= $this->endSection() ?>
