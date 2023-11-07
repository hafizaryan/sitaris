<?= $this->extend('layout/main_form') ?>
<?= $this->section('content') ?>
<style>
    p {
        color: grey;
    }

    .body {
        background-color: white !important;
    }
</style>
<!-- PAGE CONTENT WRAPPER -->

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12" style="background-color: white; padding-bottom: 100px;">
            <form class="form-horizontal" method="POST" action="<?= base_url('/peminjaman_ruangan/tambah') ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel panel-default"><br>
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align: center;"><strong>Ajukan Peminjaman Ruangan</strong></h3>
                        </div><br><br>
                        <div class="panel-body form-group-separated" style="padding-left: 65px; ">
                            <div class="col-md-12">
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"></label>
                                        <div class="col-md-6 col-xs-12 control-label">
                                            <div class="input-group">
                                                <input type="text" style="text-align: center;" name="organisasi" placeholder="Data Peminjam Internal" class="form-control" autofocus required readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 20px;">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Fakultas / Lembaga <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <select name="id_fakultas" class="form-control" required id="id_fakultas">
                                            <option value="" disabled selected>Pilih Asal Fakultas / Lembaga</option>
                                            <?php foreach ($id_fakultas as $key => $value) {
                                                if ($value['id_fakultas']) { ?>
                                                    <option value="<?= $value['id_fakultas'] ?>">
                                                        <?= $value['nama_fakultas'] ?>
                                                    </option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Program Studi / Unit <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <select name="id_prodi" class="form-control" required id="id_prodi">
                                            <option value="" disabled selected>Pilih Asal Program Studi / Unit</option>
                                            <?php foreach ($id_prodi as $key => $value) {
                                                if ($value['id_prodi']) { ?>
                                                    <option value="<?= $value['id_prodi'] ?>">
                                                        <?= $value['nama_prodi'] ?>
                                                    </option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" ">
                                <div class=" panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama Organisasi <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="text" name="organisasi" class="form-control" autofocus required />
                                            <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Isi dengan nama organisasi Anda. Contoh: ISNC Research">?</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama Peminjam <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="text" name="nama_peminjam" class="form-control" autofocus required maxlength="50" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Email Peminjam <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="email" name="email_peminjam" class="form-control" autofocus required maxlength="50" />
                                            <span class="input-group-text">@example.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nomor Telepon <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="number" name="no_hp" class="form-control" autofocus required minlength="10" maxlength="14" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label"></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="text" style="text-align: center;" placeholder="Data Peminjaman Ruangan" class="form-control" autofocus required readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nama Ruangan <span style="color: red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select name="id_ruangan" class="form-control" required id="id_ruangan">
                                        <option value="" disabled selected>Pilih Nama Ruangan</option>
                                        <?php foreach ($id_ruangan as $key => $value) {
                                            if ($value['id_ruangan'] != 4) { ?>
                                                <option value="<?= $value['id_ruangan'] ?>">
                                                    <?= $value['nama_ruangan'] ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Rentang Tanggal <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <input type="date" id="tanggal_mulai" class="form-control" autofocus required min="<?php echo date('Y-m-d'); ?>" />
                                            <span class="input-group-addon">Sampai</span>
                                            <input type="date" id="tanggal_selesai" class="form-control" required min="<?php echo date('Y-m-d'); ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Lama Peminjaman </label>
                                    <div class="col-md-6 col-xs-12">
                                        <input type="text" name="lama_peminjaman" id="jumlah_hari" class="form-control" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="pdfPreview" style="display: none;"></div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Surat Peminjaman <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="file" name="bukti_peminjaman" id="bukti_peminjaman" class="form-control" accept=".pdf" onchange="validateImageFile()" autofocus required />
                                            <span class="input-group-addon">
                                                <button type="button" id="previewButton" onclick="showPdfPreview()"><i class="fas fa-eye"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function showPdfPreview() {
                                var fileInput = document.getElementById('bukti_peminjaman');
                                var file = fileInput.files[0];
                                var fileType = file.type;
                                if (fileType.includes('pdf')) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        var pdfData = e.target.result;
                                        var newTab = window.open('', '_blank');
                                        newTab.document.open();
                                        newTab.document.write('<embed src="' + pdfData + '" type="application/pdf" width="100%" height="600px" />');
                                        newTab.document.close();
                                    }

                                    reader.readAsDataURL(file);
                                } else {
                                    alert('Format file harus berupa PDF.');
                                }
                            }
                        </script>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Tujuan Peminjaman <span style="color: red;">*</span></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <textarea name="keterangan" id="" cols="30" rows="2" class="form-control" autofocus required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-body form-group-separated">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label"></label>
                                    <div class="col-md-6 col-xs-12 control-label">
                                        <div class="input-group">
                                            <input type="checkbox" class="mr-1" id="confirmCheckbox">Saya telah memastikan bahwa data yang akan dikirim sudah benar.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input hidden type="text" name="asal_peminjam" class="form-control" autofocus required value="Internal" />
                    <div class="panel-footer" style="margin-right: 20px;">
                        <input type="submit" value="Selesai" class="btn btn-primary pull-right" onclick="return validateForm()">
                        <input type="button" value="Kembali" class="btn btn-danger pull-right" onclick="history.back()">
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // Fungsi ini akan dieksekusi setelah halaman selesai dimuat
    $(document).ready(function() {
        // Ketika elemen dengan ID 'bukti_peminjaman' berubah (file dipilih), fungsi ini akan dijalankan
        $('#bukti_peminjaman').change(function() {
            var file = this.files[0];
            var fileType = file.type;

            // Jika file yang dipilih adalah gambar
            if (fileType.includes('image')) {
                // Buat objek FileReader untuk membaca konten file
                var reader = new FileReader();

                // Ketika pembacaan selesai, tampilkan gambar di elemen dengan ID 'filePreview'
                reader.onload = function(e) {
                    $('#filePreview').html('<img src="' + e.target.result + '" class="img-fluid">');
                }

                // Membaca isi file sebagai URL data (gambar)
                reader.readAsDataURL(file);
            }
            // Jika file yang dipilih adalah PDF
            else if (fileType.includes('pdf')) {
                // Buat objek FileReader untuk membaca konten file
                var reader = new FileReader();

                // Ketika pembacaan selesai, tampilkan PDF di elemen dengan ID 'filePreview'
                reader.onload = function(e) {
                    $('#filePreview').html('<embed src="' + e.target.result + '" type="application/pdf" width="100%" height="600px" />');
                }

                // Membaca isi file sebagai URL data (PDF)
                reader.readAsDataURL(file);
            }
            // Jika format file tidak didukung
            else {
                alert('Format file tidak didukung.');
            }
        });
    });

    // Fungsi untuk memvalidasi apakah checkbox "confirmCheckbox" telah dicentang sebelum mengirimkan data
    function validateForm() {
        var checkbox = document.getElementById("confirmCheckbox");
        if (!checkbox.checked) {
            alert("Mohon Beri Tanda Centang untuk Melanjutkan!");
            return false; // Menghentikan pengiriman data
        }
        return true; // Lanjutkan pengiriman data
    }

    // Fungsi konfirmasi sebelum pergi ke URL tertentu
    function confirm(url) {
        if (confirm("Pastikan data yang anda isi sudah benar?")) {
            window.location.href = url;
        } else {
            return false;
        }
    }

    // Fungsi untuk memvalidasi file gambar yang diunggah
    function validateImageFile() {
        // Mendapatkan elemen input file dengan ID 'bukti_peminjaman'
        const fileInput = document.getElementById('bukti_peminjaman');
        const file = fileInput.files[0];

        // Ekstensi file yang diizinkan adalah PDF
        const allowedExtensions = /(\.pdf)$/i;
        const maxSize = 2 * 1024 * 1024; // Ukuran maksimal 2 MB

        // Validasi ekstensi dan ukuran file
        if (!allowedExtensions.exec(file.name)) {
            alert('File harus berupa file dengan format pdf.');
            fileInput.value = '';
            return false;
        } else if (file.size > maxSize) {
            alert('Ukuran file tidak boleh melebihi 2 MB.');
            fileInput.value = '';
            return false;
        }
        return true;
    }

    // Fungsi untuk memformat angka dengan pemisah ribuan
    function formatNumber() {
        let input = document.getElementById("numberInput");
        let value = input.value.replace(/\D/g, ""); // Menghapus semua karakter non-digit

        // Memformat angka dengan tanda titik sebagai pemisah ribuan
        if (value.length > 3) {
            let formattedValue = "";
            let remainder = value.length % 3; // Menentukan sisa digit pertama
            if (remainder > 0) {
                formattedValue = value.substr(0, remainder) + ".";
            }
            for (let i = remainder; i < value.length; i += 3) {
                formattedValue += value.substr(i, 3) + ".";
            }
            formattedValue = formattedValue.slice(0, -1); // Menghapus titik terakhir
            input.value = formattedValue;
        } else {
            input.value = value;
        }
    }

    // Fungsi untuk menampilkan nilai tanpa format 3-digit pada elemen "result"
    function showRealTimeValue(value) {
        let resultElement = document.getElementById("result");
        resultElement.value = value.replace(/\D/g, ""); // Menampilkan nilai tanpa format 3-digit
    }

    // Mendapatkan elemen input tanggal mulai, tanggal selesai, dan jumlah hari
    const tanggalMulaiInput = document.getElementById('tanggal_mulai');
    const tanggalSelesaiInput = document.getElementById('tanggal_selesai');
    const jumlahHariInput = document.getElementById('jumlah_hari');

    // Menambahkan event listener untuk memperbarui jumlah hari saat tanggal berubah
    tanggalMulaiInput.addEventListener('change', updateJumlahHari);
    tanggalSelesaiInput.addEventListener('change', updateJumlahHari);

    // Fungsi untuk memperbarui jumlah hari berdasarkan tanggal mulai dan tanggal selesai
    function updateJumlahHari() {
        const tanggalMulai = new Date(tanggalMulaiInput.value);
        const tanggalSelesai = new Date(tanggalSelesaiInput.value);

        if (!isNaN(tanggalMulai) && !isNaN(tanggalSelesai)) {
            const timeDiff = Math.abs(tanggalSelesai - tanggalMulai);
            const jumlahHari = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

            jumlahHariInput.value = jumlahHari;
        }
    }

    // Fungsi untuk mengatur nilai tanggal pada elemen input ke tanggal hari ini
    function setTodayDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
        const day = String(today.getDate()).padStart(2, '0');

        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('tanggal_mulai').value = formattedDate;
    }

    // Memanggil fungsi setTodayDate untuk mengatur nilai tanggal pada elemen input
    setTodayDate();
</script>
<script src="https://www.google.com/recaptcha/api.js?render=6LdFjE8oAAAAAORk5aKHi1UkwcH5UXkIO7gPI0tU"></script>
<script>
    function recaptchaCallback(token) {
        document.getElementById("recaptcha_response").value = token;
    }

    // Menjalankan reCAPTCHA v3
    grecaptcha.ready(function() {
        grecaptcha.execute('6LdFjE8oAAAAAORk5aKHi1UkwcH5UXkIO7gPI0tU', {
            action: 'login'
        }).then(function(token) {
            recaptchaCallback(token);
        });
    });
</script>
<?= $this->endSection() ?>