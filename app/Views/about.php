<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, dan Kontributor Bootstrap">
    <meta name="generator" content="Hugo 0.112.5">
    <title>Tentang SITARIS SI</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/color-modes.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SITARIS SI | Sistem Informasi Inventaris Laboratorium Sistem Informasi </title>
    <link rel="shortcut icon" type="image/png/jpg" href="<?= base_url() ?>/gentelella-master/production/images/HIMASI.png">

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?= base_url() ?>/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxx" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- NProgress -->
    <link href="<?= base_url() ?>/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url() ?>/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?= base_url() ?>/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>/gentelella-master/build/css/custom.min.css" rel="stylesheet">
    <!-- my script -->
    <script src="gentelella-master/production/js/myscript.js"></script>
    <!-- my css -->
    <link rel="stylesheet" href="gentelella-master\production\css\maps\mystyle.css" class="style">
    <style>
        /* Styles untuk gambar placeholder */
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            /* Pengaturan seleksi teks */
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        /* Styles untuk gambar placeholder pada layar besar */
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Styles untuk divider contoh */
        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        /* Styles untuk garis vertikal contoh */
        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        /* Styles untuk ikon Bootstrap */
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        /* Styles untuk navigasi */
        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: scroll;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            /* Efek scrolling pada perangkat sentuh */
            -webkit-overflow-scrolling: touch;
        }

        /* Styles untuk tombol utama */
        .btn-bd-primary {
            /* Pengaturan warna latar */
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            /* Pengaturan font-weight */
            --bs-btn-font-weight: 600;
            /* Pengaturan warna teks tombol */
            --bs-btn-color: var(--bs-white);
            /* Pengaturan latar tombol */
            --bs-btn-bg: var(--bd-violet-bg);
            /* Pengaturan border tombol */
            --bs-btn-border-color: var(--bd-violet-bg);
            /* Pengaturan warna teks tombol saat hover */
            --bs-btn-hover-color: var(--bs-white);
            /* Pengaturan latar tombol saat hover */
            --bs-btn-hover-bg: #6528e0;
            /* Pengaturan border tombol saat hover */
            --bs-btn-hover-border-color: #6528e0;
            /* Efek bayangan saat fokus pada tombol */
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            /* Pengaturan warna teks tombol saat aktif */
            --bs-btn-active-color: var(--bs-btn-hover-color);
            /* Pengaturan latar tombol saat aktif */
            --bs-btn-active-bg: #5a23c8;
            /* Pengaturan border tombol saat aktif */
            --bs-btn-active-border-color: #5a23c8;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;

        }

        .developer-card {
            border: 1px solid #ccc;
            padding: 10px;
            width: 240px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
            margin: 20px;
        }

        .developer-avatar {
            max-width: 100%;
            border-radius: 50%;
        }

        .developer-info h2 {
            font-size: 1.5rem;
            margin-top: 10px;
        }

        .developer-info p {
            margin-top: 5px;
        }

        body {
            overflow-x: hidden;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .header {
            text-align: center;
            padding: 2rem 0;
            background-color: #343a40;
            color: #ffffff;
        }

        .header h1 {
            font-weight: 300;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .header p {
            font-size: 1.2rem;
        }

        .content {
            text-align: justify;
            font-size: 1.2rem;
            line-height: 1.5;
            margin-bottom: 2rem;
        }

        .developer-card img {
            max-width: 100%;
            border-radius: 50%;
            margin-top: none !important;
        }

        .developer-info h2 {
            font-size: 1.5rem;
            margin-top: 10px;
        }

        .developer-info p {
            margin-top: 5px;
        }

        @media screen and (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .container {
                flex-direction: column;
                align-items: center;
            }

            .developer-card {
                width: 270px;
                height: 270px;
                margin-bottom: 20px;
                padding-bottom: 10px;
            }

            .developer-info h2 {
                font-size: 1.2rem;
                text-align: center;
            }

            .developer-info p {
                text-align: center;
                color: transparent;
            }

            h1 {
                text-align: center;
                font-size: 25px;
            }

            .mt-5,
            .my-5 {
                margin-top: 7rem !important;
            }
        }
    </style>
</head>

<body>
    <main>
        <!-- Bagian Header -->
        <section class=" text-center container">
            <div class="row py-lg-" style="padding-bottom: none !important; margin-bottom: none !important; ">
                <div class=" col-md-9 mx-auto">
                    <h1 class="fw-light mt-5">Tentang Sitaris SI</h1>
                    <br>
                    <h6 style="text-align: justify; text-indent: 40px;">
                        Sistem Informasi Inventaris Laboratorium adalah sebuah platform yang telah dikembangkan dengan menggunakan bahasa pemrograman PHP dan Framework CodeIgniter4. Platform ini dirancang khusus untuk membantu dalam pengelolaan serta pemantauan persediaan barang dan peralatan yang terdapat di laboratorium. Dengan berbagai fitur utama yang disediakan, sistem ini memiliki potensi untuk meningkatkan efisiensi dan produktivitas dalam operasional laboratorium.
                        <h6 style="text-align: justify; text-indent: 40px;"> Fitur-fitur utama yang terdapat dalam sistem ini mencakup pencatatan data, pencarian cepat, peminjaman, pengembalian, perawatan, serta pembuatan laporan. Selain itu, sistem ini juga menawarkan tingkat akses yang terkontrol, memungkinkan pengguna dengan peran yang berbeda untuk mengakses hanya bagian-bagian tertentu dari sistem sesuai dengan wewenang yang dimiliki. </h6>
                        <h6 style="text-align: justify; text-indent: 40px;"> Dengan adanya sistem ini, diharapkan pengelolaan inventaris laboratorium menjadi lebih mudah dan efisien, sehingga memungkinkan staf laboratorium untuk fokus pada tugas-tugas yang lebih penting. Selain itu, laporan yang dihasilkan oleh sistem dapat memberikan wawasan yang berharga untuk pengambilan keputusan yang lebih baik terkait dengan persediaan barang dan peralatan di laboratorium.</h6>
                    </h6>
                    <br>
                </div>
            </div>
        </section>
        <h1 class="fw-light" style="text-align: center;">Dibimbing Oleh</h1>
        <div class="album bg-body-tertiary">
            <div class="container" style="display: flex; justify-content: center;">
                <div class="developer-card" style="align-items: center;">
                    <img src="<?= base_url() ?>/gentelella-master/production/images/kalab.jpg" alt="<?= base_url() ?>/gentelella-master." class="img-circle profile_img">
                    <div class="developer-info">
                        <h2>T. Khairil, M.Kom. <a href="#" target="_blank"><span></span></a> </h2>
                        <p><span><i class="fas fa-envelope"></i><a href="mailto:tengkukhairil@uin-suska.ac.id" target="_blank"> tengkukhairil@uin-suska.ac.id</a></span></p>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="fw-light" style="text-align: center;">Dikembangkan Oleh</h1>
        <div class="album bg-body-tertiary">
            <!-- Kontainer Kartu Developer -->
            <div class="container md-9">
                <div class="developer-card">
                    <img src="<?= base_url() ?>/gentelella-master/production/images/hafiz.jpg" alt="<?= base_url() ?>/gentelella-master." class="img-circle profile_img">
                    <div class="developer-info">
                        <h2>Hafiz Aryan <a href="https://www.linkedin.com/in/hafiz-aryan-siregar-539454214" target="_blank"><span></span></a> </h2>
                        <p><span><i class="fas fa-envelope"></i><a href="mailto:hafizaryansiregar@gmail.com" target="_blank"> hafizaryansiregar@gmail.com</a></span> </p>
                    </div>
                </div>
                <div class="developer-card">
                    <img src="<?= base_url() ?>/gentelella-master/production/images/nasya.jpg" alt="<?= base_url() ?>/gentelella-master." class="img-circle profile_img">
                    <div class="developer-info">
                        <h2>Nasya Amirah <a href="#" target="_blank"><span></span></a> </h2>
                        <p><span><i class="fas fa-envelope"></i><a href="mailto:nasyaamirah30@gmail.com" target="_blank"> nasyaamirah30@gmail.com</a></span> </p>
                    </div>
                </div>
                <div class="developer-card">
                    <img src="<?= base_url() ?>/gentelella-master/production/images/indah.jpg" alt="<?= base_url() ?>/gentelella-master." class="img-circle profile_img">
                    <div class="developer-info">
                        <h2>Indah Nirwana <a href="#" target="_blank"><span></span></a> </h2>
                        <p><span><i class="fas fa-envelope"></i><a href="mailto:indahnirwana30@gmail.com" target="_blank"> indahnirwana30@gmail.com</a></span> </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <br><br>
</body>

</html>
<?= $this->endSection() ?>