<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php $error = session('error'); ?>
<style>
    .error-message {
        color: red;
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 10px;
        margin-bottom: 20px;
        text-align: center;
    }
</style>
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <a href="<?= base_url(); ?>user">Pengguna</a> / Edit</li>
        </ol>
    </nav>
    <div>
        <?php if ($error) : ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/user/edit') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <div class="panel-heading"><br>
                            <h3 class="panel-title ml-3"><strong><?= $judul ?></strong></h3>
                        </div>
                        <input type="hidden" name="id_user" value="<?= $model['id_user'] ?>" class="form-control" autofocus />
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input name="nama" value="<?= $model['nama'] ?>" class="form-control" minlength="5" maxlength="50" autofocus required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">NIP/NIK/NIM</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input name="no_identitas" value="<?= $model['no_identitas'] ?>" class="form-control" maxlength="50" autofocus required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Username</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input name="username" value="<?= $model['username'] ?>" class="form-control" minlength="5" maxlength="30" oninput="validateInput()" id="username" autofocus required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Password</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="password" id="passwordInput" name="password" class="form-control" autofocus minlength="8" maxlength="30" oninput="removeSpaces()" />
                                            <span class="input-group-addon">
                                                <i id="togglePassword" class="fa fa-eye-slash" aria-hidden="true" style="cursor: pointer;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Ulangi Password</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="password" name="confirmPasswordInput" id="confirmPasswordInput" class="form-control" minlength="8" maxlength="30" oninput="removeSpaces()" />
                                        </div>
                                        <p id="message"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            const confirmPasswordInput = document.getElementById("confirmPasswordInput");
                            const message = document.getElementById("message");
                            function checkPassword() {
                                const password = passwordInput.value;
                                const confirmPassword = confirmPasswordInput.value;
                                if (password === confirmPassword) {
                                    message.textContent = "Kata sandi cocok";
                                    message.style.color = "green";
                                } else {
                                    message.textContent = "Kata sandi tidak cocok!";
                                    message.style.color = "red";
                                }
                            }
                            function removeSpaces() {
                                passwordInput.value = passwordInput.value.replace(/\s/g, "");
                                confirmPasswordInput.value = confirmPasswordInput.value.replace(/\s/g, "");
                            }
                            passwordInput.addEventListener("input", checkPassword);
                            confirmPasswordInput.addEventListener("input", checkPassword);
                        </script>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Email</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input name="email" value="<?= $model['email'] ?>" class="form-control" autofocus />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (session('userData')['role_user'] == "Admin") : ?>
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Level Pengguna</label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <select class="form-control" name="role_user" id="role_user">
                                                <?php
                                                $enumValues = array("Admin", "Kalab", "Kaprodi", "Sekprodi", "Aslab");
                                                foreach ($enumValues as $enumValue) {
                                                    if ($enumValue === $model['role_user']) {
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
                        <?php endif; ?>
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
    const passwordInput = document.getElementById('passwordInput');
    const togglePassword = document.getElementById('togglePassword');
    togglePassword.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePassword.classList.remove('fa-eye-slash');
            togglePassword.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            togglePassword.classList.remove('fa-eye');
            togglePassword.classList.add('fa-eye-slash');
        }
    });

    function validateInput() {
        var userInput = document.getElementById("username");
        var sanitizedInput = userInput.value.replace(/[^A-Za-z0-9]/g, "");
        userInput.value = sanitizedInput;
    }

    function removeSpaces() {
        var userInput = document.getElementById("passwordInput");
        var sanitizedInput = userInput.value.replace(/\s/g, "");
        userInput.value = sanitizedInput;
    }
</script>
<?= $this->endSection() ?>