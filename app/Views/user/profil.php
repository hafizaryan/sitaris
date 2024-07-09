<?= $this->extend('layout/main') ?>
<style>
    .custom-toast {
        position: fixed;
        top: 80px;
        right: -100%;
        background-color: #26B99A;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: right 0.5s ease-in-out;
        z-index: 9999;
    }

    .show-toast {
        right: 34px;
    }
</style>
<?= $this->section('content') ?>
<div class="x_panel">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <?= $judul; ?></li>
        </ol>
    </nav>
    <div class="x_title" style="border-bottom: none;"><br>
        <h3 style="text-align: center;">Profil Pengguna</h3>
        <div class="clearfix"></div>
    </div>
    <style>
        #custom-toast {
            align-items: center;
            text-align: center;
            background-color: #26B99A;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        input[readonly] {
            cursor: not-allowed;
        }
    </style>
    <?php if (session()->has('success')) : ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    position: "middle",
                    icon: "success",
                    title: "<?= session('success') ?>",
                    showConfirmButton: false,
                    timer: 1000
                });
            });
        </script>
    <?php endif; ?>
    <?php if (session()->has('error')) : ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "<?= session('error') ?>",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    <?php endif; ?>
    <?php foreach ($model as $key => $value) {
        if ((isset($_SESSION['userData']['id_user']) && $_SESSION['userData']['id_user'] === $value['id_user'])) { ?>
            <div class="x_content" style="display: block;">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input readonly type="text" id="first-name" value="<?= $value["nama"] ?>" required="required" class="form-control parsley-success" data-parsley-id="5">
                            <ul class="parsley-errors-list" id="parsley-id-5"></ul>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIP/NIK/NIM
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input readonly type="text" id="first-name" value="<?= $value["no_identitas"] ?>" required="required" class="form-control parsley-success" data-parsley-id="5">
                            <ul class="parsley-errors-list" id="parsley-id-5"></ul>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input readonly type="text" id="first-name" value="<?= $value["username"] ?>" required="required" class="form-control parsley-success" data-parsley-id="5">
                            <ul class="parsley-errors-list" id="parsley-id-5"></ul>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input readonly type="text" id="last-name" value="<?= $value["email"] ?>" required="required" class="form-control parsley-success" data-parsley-id="7">
                            <ul class="parsley-errors-list" id="parsley-id-7"></ul>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="level">Level Pengguna
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input readonly type="text" id="level" value="<?= $value["role_user"] ?>" required="required" class="form-control parsley-success" data-parsley-id="7">
                            <ul class="parsley-errors-list" id="parsley-id-7"></ul>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="/user/ubahdata/<?= $value["id_user"] ?>" class="btn btn-success pull-right"> <i class="fas fa-edit fa-md"></i> Edit Profil</a>
                        </div>
                    </div>
                </form>
            </div>
    <?php }
    } ?>
</div><br><br><br>
<div class="clearfix"></div>
<?= $this->endSection() ?>