<?= $this->extend('layout/main1') ?>
<!-- Bagian 'content' dimulai -->
<?= $this->section('content') ?>
<style>
    .heading {
        font-size: 1.1em;
        text-align: center;
    }

    .media-body {
        font-size: 1.6em;
        text-align: justify;

        /* Anda bisa menyesuaikan ukuran font sesuai keinginan */
    }

    /* Tambahkan kode CSS berikut untuk membuat tampilan responsif */
    @media (max-width: 768px) {
        .media {
            flex-direction: column;
            align-items: center;
        }

        .media img {
            width: 80%;
            /* Sesuaikan lebar gambar sesuai kebutuhan */
            margin-bottom: 10px;
        }

        .media-body {
            text-align: center;
            text-align: left;

        }

        /* Gaya umum */
        .media-body {
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
        }

        .heading {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        /* Responsif pada layar berukuran kecil */
        @media (max-width: 768px) {
            .media-body {
                flex-direction: column;
                align-items: center;
                padding: 10px;
            }

            .heading {
                font-size: 1.2rem;
            }
        }

    }
</style>
<!-- PAGE CONTENT WRAPPER -->
<?php if (session()->has('success')) : ?>
    <div id="custom-toast" class="custom-toast">
        <i class="fas fa-check-circle checkmark-icon"></i>
        <?= session('success') ?>
    </div>
<?php endif; ?>
<div class="page-content-wrap">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center;">Selamat Datang di Sistem Informasi Inventaris Laboratorium</h3>
        </div><br>
        <div class="media">
            <a href="<?= base_url() ?>/gentelella-master/production/images/alur.PNG" target="_blank" class="image-link">
                <img class="mr-3" src="<?= base_url() ?>/gentelella-master/production/images/alur.PNG" width="380px" alt="Generic placeholder image">
            </a>
            <div class="media-body" style="text-align: center;">
                <h4 class="heading">Prosedur Peminjaman Ruangan Laboratorium Sistem Informasi</h4>
                <ul style="text-align: left;">
                    <li>Pengajuan permohonan peminjaman ruangan oleh pihak yang berkepentingan.</li>
                    <li>Verifikasi ketersediaan ruangan pada tanggal dan waktu yang diminta.</li>
                    <li>Konfirmasi peminjaman ruangan dengan detail tanggal, waktu, dan fasilitas yang disetujui.</li>
                    <li>Penggunaan ruangan sesuai dengan tujuan dan pengembalian ruangan setelah penggunaan selesai.</li>
                </ul>
                <br><br>
                <div style="display: flex; justify-content: center;">
                    <a href="tambah_internal" class="btn btn" style="align-items: center; margin-right: 50px; background-color: #a4c969; color: white;">
                        <span class="glyphicon glyphicon-send"></span> Pinjam Sebagai Internal
                    </a>
                    <a href="tambah_eksternal" class="btn btn" style="align-items: center; background-color: #48b7b0; color: white;">
                        <span class="glyphicon glyphicon-send"></span> Pinjam Sebagai Eksternal
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 pull-left">
        </div>
    </div>
</div>
</div>

<!-- Add Bootstrap JS and jQuery links here (you need to include these scripts) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Bagian 'content' berakhir -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function() {
        $('.image-link').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
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