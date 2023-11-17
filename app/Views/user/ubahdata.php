<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="page-content-wrap">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item active" aria-current="page">Lokasi Akses: <a href="<?= base_url(); ?>dashboard">Beranda</a> / <a href="<?= base_url(); ?>user/profil">Profil</a> / Edit</li>
        </ol>
    </nav>
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
        <div id="custom-toast" style="align-items: center; text-align: center;" class="custom-toast">
            <i class="fas fa-check-circle checkmark-icon"></i>
            <?= session('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger" style="align-items: center; text-align: center;">
            <?= session('error') ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?= base_url('/user/ubahdata') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <div class="panel-heading"><br>
                            <h3 class="panel-title ml-3"><strong><?= $judul ?></strong></h3>
                        </div>
                        <input type="hidden" name="id_user" value="<?= $model['id_user'] ?>" class="form-control" autofocus />
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Role User</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <input readonly name="role_user" value="<?= $model['role_user'] ?>" class="form-control" autofocus required />
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
                                            <input name="no_identitas" value="<?= $model['no_identitas'] ?>" class="form-control" minlength="5" maxlength="50" autofocus readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input name="nama" value="<?= $model['nama'] ?>" class="form-control" minlength="5" maxlength="30" autofocus required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <div>Kosongkan jika tidak ingin mengubah password</div> 
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
                            const passwordInput = document.getElementById("passwordInput");
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
                                    <label class="col-md-3 col-xs-12 control-label">Foto Profil</label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="file" name="foto" id="foto" style="width:100%" class="form-control" accept=".jpeg, .jpg, .png" autofocus onchange="cropImage()" />
                                            <img id="preview-image" src="<?= base_url('/uploads/foto_profil/' . $model['foto']) ?>" width="30%" alt="Gambar" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function cropImage() {
                                const input = document.getElementById('foto');
                                const preview = document.getElementById('preview-image');
                                const file = input.files[0];
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const img = new Image();
                                    img.src = e.target.result;
                                    img.onload = function() {
                                        const canvas = document.createElement('canvas');
                                        const ctx = canvas.getContext('2d');
                                        const aspectRatio = 1;
                                        let width, height, offsetX, offsetY;
                                        if (img.width > img.height) {
                                            width = img.height;
                                            height = img.height;
                                            offsetX = (img.width - img.height) / 2;
                                            offsetY = 0;
                                        } else {
                                            width = img.width;
                                            height = img.width;
                                            offsetX = 0;
                                            offsetY = (img.height - img.width) / 2;
                                        }
                                        canvas.width = width;
                                        canvas.height = height;
                                        ctx.drawImage(img, offsetX, offsetY, width, height, 0, 0, width, height);
                                        preview.src = canvas.toDataURL('image/jpeg');
                                    };
                                };
                                if (file) {
                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>
                        <div class="panel-footer">
                            <input type="submit" value="SIMPAN" class="btn btn-primary pull-right">
                            <input type="button" value="KEMBALI" class="btn btn-danger pull-right" onclick="history.back()">
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
<br><br><br><br>
<script>
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

    function validateFile() {
        const input = document.getElementById('foto');
        const file = input.files[0];
        if (!file) {
            alert('Mohon pilih file terlebih dahulu.');
            return false;
        }
        const allowedExtensions = /(\.jpeg|\.jpg|\.png)$/i;
        if (!allowedExtensions.exec(file.name)) {
            alert('Format file tidak diizinkan. Hanya file JPG, JPEG, dan PNG yang diperbolehkan.');
            input.value = '';
            return false;
        }
        const maxSizeInBytes = 2 * 1024 * 1024;
        if (file.size > maxSizeInBytes) {
            alert('Ukuran file melebihi batas maksimal 2 MB.');
            input.value = '';
            return false;
        }
        return true;
    }

    function validateInput() {
        var userInput = document.getElementById("username");
        var sanitizedInput = userInput.value.replace(/[^A-Za-z0-9]/g, ""); // Menghapus karakter selain huruf dan angka
        userInput.value = sanitizedInput;
    }

    function removeSpaces() {
        var userInput = document.getElementById("passwordInput");
        var sanitizedInput = userInput.value.replace(/\s/g, ""); // Menghapus semua jenis spasi
        userInput.value = sanitizedInput;
    }
</script>
<?= $this->endSection() ?>