<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
    .row {
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
    }

    .col {
        font-weight: bold;
        flex: 1;
        font-size: medium;
    }

    .col-data {
        flex: 2;
        font-size: medium;
        text-transform: none;
    }

    #image-overlay {
        width: 90%;
        height: 90%;
    }

    th.center-text {
        text-align: center;
    }

    td.center {
        text-align: center;
    }
</style>
<div class="container-fluid">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <?= $judul; ?></li>
        </ol>
    </nav>
    <h1 class="h5 mt-4 mb-4 ml-1 ">Sistem Informasi Inventaris Laboratorium</h1>
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
                    position: "middle",
                    icon: "error",
                    title: "<?= session('error') ?>",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #2A3F54;">PENGGUNA</h6>
        </div>
        <div class="card-body">
            <a href="user/tambah" class="btn btn-success">Tambah Data</a>
            <br><br>
            <div class="table-responsive" style="max-height: 1000px;" overflow-y: auto;">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Level Pengguna</th>
                            <th class="center-text">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($model as $key => $value) {
                            $no++;
                            $showData = true;
                            if (isset($_SESSION['userData']['role_user']) && $_SESSION['userData']['role_user'] === 'Kalab') {
                                if ($value['role_user'] !== 'Aslab') {
                                    $showData = false;
                                }
                            }
                            if (isset($_SESSION['userData']['id_user']) && $value['id_user'] === $_SESSION['userData']['id_user']) {
                                $showData = false;
                            }
                            if ($showData) {
                        ?>
                                <tr>
                                    <td><?= $value["nama"] ?></td>
                                    <td><?= $value["role_user"] ?></td>
                                    <td class="center">
                                        <a href="user/edit/<?= $value["id_user"] ?>">
                                            <i class="fas fa-edit fa-2x"></i>
                                        </a>
                                        <a href="javascript:confirmDelete('user/hapus/<?= $value["id_user"] ?>')">
                                            <i class="fas fa-trash fa-2x"></i>
                                        </a>
                                        <a href data-toggle="modal" data-target="#modalxl" onclick="showModal('<?= $value["nama"] ?>','<?= $value["no_identitas"] ?>','<?= $value["username"] ?>','<?= $value["email"] ?>', '<?= $value["role_user"] ?>')">
                                            <i class="fas fa-info-circle fa-2x" style="color: #5a738e;"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><br><br><br><br>
<div class="clearfix"></div>
<script>
    function showModal(nama, no_identitas, username, email, role_user) {
        document.getElementById('modalxlLabel').innerText = 'Detail';
        var modalBody = document.querySelector('#modalxl .modal-body');
        modalBody.innerHTML = '';
        modalBody.innerHTML += `
        <div class="row">
            <div class="col">Nama</div>
            <div class="col-data">${nama}</div>
        </div>
        <div class="row">
            <div class="col">NIP/NIK/NIM</div>
            <div class="col-data">${no_identitas}</div>
        </div>
        <div class="row">
            <div class="col">Username</div>
            <div class="col-data">${username}</div>
        </div>
        <div class="row">
            <div class="col">Email</div>
            <div class="col-data">${email}</div>
        </div>
        <div class="row">
            <div class="col">Level Pengguna</div>
            <div class="col-data">${role_user}</div>
        </div>
    `;
    }
    document.addEventListener('DOMContentLoaded', function() {
        var toast = document.getElementById('custom-toast');
        if (toast) {
            setTimeout(function() {
                toast.classList.add('show-toast');
            }, 100);
            setTimeout(function() {
                toast.classList.remove('show-toast');
            }, 3000);
        }
    });
</script>
<?= $this->endSection() ?>