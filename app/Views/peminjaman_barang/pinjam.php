<?= $this->extend('layout/main_peminjaman') ?>
<?= $this->section('content') ?>
<style>
    .heading {
        font-size: 1.1em;
        text-align: center;
    }

    .media-body {
        font-size: 1.6em;
        text-align: justify;
    }

    @media (max-width: 768px) {
        .media {
            flex-direction: column;
            align-items: center;
        }

        .media img {
            width: 80%;
            margin-bottom: 10px;
        }

        .media-body {
            text-align: center;
            text-align: left;
        }

        .media-body {
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
        }

        .heading {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

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
<div class="page-content-wrap">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center;">Selamat Datang di Sistem Informasi Inventaris Laboratorium</h3>
        </div><br>
        <div class="media">
            <a href="<?= base_url() ?>/gentelella-master/production/images/barang.PNG" target="_blank" class="image-link">
                <img class="mr-3" src="<?= base_url() ?>/gentelella-master/production/images/barang.PNG" width="380px" alt="Generic placeholder image">
            </a>
            <div class="media-body" style="text-align: center;">
                <h4 class="heading">Prosedur Peminjaman Barang Laboratorium Sistem Informasi</h4>
                <ul style="text-align: left;">
                    <li>Pengajuan permohonan peminjaman barang oleh pihak yang berkepentingan.</li>
                    <li>Verifikasi ketersediaan barang pada tanggal dan waktu yang diminta.</li>
                    <li>Konfirmasi peminjaman barang dengan detail tanggal, waktu, dan fasilitas yang disetujui.</li>
                    <li>Penggunaan barang sesuai dengan tujuan dan pengembalian barang setelah penggunaan selesai.</li>
                </ul>
                <br><br>
                <div style="display: flex; justify-content: center;">
                    <a href="internal" class="btn btn" style="align-items: center; margin-right: 50px; background-color: #a4c969; color: white;">
                        <span class="glyphicon glyphicon-send"></span> Pinjam Sebagai Internal
                    </a>
                    <a href="eksternal" class="btn btn" style="align-items: center; background-color: #48b7b0; color: white;">
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
<!-- Magnific Popup -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js?render=6LdFjE8oAAAAAORk5aKHi1UkwcH5UXkIO7gPI0tU"></script>
<script>
    $(document).ready(function() {
        $('.image-link').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });

    function recaptchaCallback(token) {
        document.getElementById("recaptcha_response").value = token;
    }

    grecaptcha.ready(function() {
        grecaptcha.execute('6LdFjE8oAAAAAORk5aKHi1UkwcH5UXkIO7gPI0tU', {
            action: 'login'
        }).then(function(token) {
            recaptchaCallback(token);
        });
    });
</script>
<?= $this->endSection() ?>