<!DOCTYPE html>
<html lang="en" manifest="demo.appcache">

<head>
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
	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<style>
		.left_col {
			position: fixed;
			top: 0;
			left: 0;
			width: min-content;
			height: 100%;
			overflow-y: auto;
		}

		.top_nav {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			z-index: 1000;
		}

		.footer {
			background-color: #F7F7F7;
			border: none;
		}

		.container {
			min-height: 10px !important;
		}

		.tombol {
			padding: 10px 20px;
			border: 1px solid #73879C;
			border-radius: 5px;
			cursor: pointer;
			font-size: medium;
		}

		.dropdown-toggle::after {
			margin-left: 5px;
		}

		.dropdown-menu {
			background-color: #fff !important;
			border: 1px solid #73879C;
			border-radius: 5px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
		}

		.dropdown-item {
			color: #333;
			padding: 10px 20px;
			text-decoration: none;
			display: block;
		}

		.dropdown-item:hover {
			background-color: #73879C;
			color: #fff;
		}

		.footer {
			position: relative;
			bottom: 0;
			width: 100%;
		}

		@media (max-width: 767px) {
			body {
				overflow-x: hidden;
			}

			.nav_menu {
				background: none;
				border-bottom: none;
			}

			.top_nav {
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				background-color: #ffffff;
				z-index: 1000;
				box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
				padding: 10px;
				margin-bottom: 20px;
				transition: background-color 0.3s ease, box-shadow 0.3s ease;
			}

			.right_col {
				padding-top: 60px;
				min-height: calc(100vh - 60px);
			}

			.left_col {
				position: relative;
				width: 100%;
				height: auto;
				overflow: visible;
			}

			.site_title {
				text-align: center;
			}

			.profile {
				text-align: center;
			}

			#sidebar-menu,
			.sidebar-footer {
				display: contents;
			}

			.footer {
				text-align: center;
				padding: 10px;
				background-color: #f7f7f7;
				border-top: 1px solid #ddd;
			}

			.dropdown-menu {
				background-color: #fff;
				border: 1px solid #73879c;
				border-radius: 5px;
				box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
			}

			.tombol {
				position: relative;
				right: -130px;
			}

			.dropdown-item {
				color: #333;
				padding: 5px 10px;
				text-decoration: none;
				display: block;
			}

			.dropdown-item:hover {
				background-color: #73879c;
				color: #fff;
			}

			.navbar {
				display: none;
			}

			#fullscreenButton {
				margin-left: auto;
				padding: 10px;
			}
		}

		.img-circle.profile_img {
			width: 80%;
			height: 80%;
			background: #fff;
			margin-top: 2px;
			z-index: 1000;
			position: inherit;
			margin-top: 20px;
			border: 1px solid rgba(52, 73, 94, 0.44);
			padding: 1px;
		}

		.square_img {
			width: 75px;
			height: 75px;
			object-fit: cover;
		}

		.profile_pic {
			width: 35%;
			float: left;
			margin-top: 10px;
		}
	</style>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="modal fade" id="modalxl" tabindex="-1" role="dialog" aria-labelledby="modalxlLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalxlLabel">Detail</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="<?= base_url(); ?>dashboard" class="site_title mt-4" style="text-align: center;">
							<h4>SI<b>TARIS</b> SI</h4>
						</a>
					</div>
					<div class="clearfix"></div>
					<!-- Foto, Nama, dan NIM -->
					<div class="profile clearfix mb-0">
						<div class="profile_pic">
							<img src="<?= base_url('uploads/foto_profil/' . session('userData')['foto']) ?>" alt="Profile Picture" class="img-circle profile_img square_img" onclick="openImage()" style="width: 60px; height: 60px;">
						</div>
						<div class="profile_info">
							<span>Halo,</span>
							<br>
							<p style="color: #fff;"><?= session('userData')['nama'] ?><br>
								<?= session('userData')['no_identitas'] ?></p>
						</div>
					</div>
					<!-- /Foto, Nama, dan NIM -->
					<!-- Sidebar -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<ul class="nav side-menu">
								<?php if (session('userData')['role_user'] == "Admin") : ?>
									<li><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Beranda </a></li>
									<li><a href="<?= base_url('pendanaan') ?>"><i class="fas fa-dollar"></i> Pendanaan</a></li>
									<li><a href="<?= base_url('barang') ?>"><i class="fas fa-cubes"></i> Barang </a></li>
									<li class=""><a><i class="fas fa-map"></i> Posisi Barang<span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none;">
											<li><a href="<?= base_url('labor_rsi'); ?>"><i class="fas fa-map-pin"></i> Labor RSI</a></li>
											<li><a href="<?= base_url('labor_se'); ?>"><i class="fas fa-map-pin"></i> Labor SE</a></li>
											<li><a href="<?= base_url('labor_int'); ?>"><i class="fas fa-map-pin"></i> Labor INT</a></li>
										</ul>
									</li>
									<li class=""><a><i class="fas fa-retweet"></i> Peminjaman <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none;">
											<li><a href="<?= base_url('peminjaman_barang') ?>"><i class="fas fa-exchange-alt"></i> Peminjaman Barang</a></li>
											<li><a href="<?= base_url('peminjaman_ruangan') ?>"><i class="fas fa-handshake"></i> Peminjaman Ruangan</a></li>
										</ul>
									</li>
									<li><a href="<?= base_url('dokumentasi') ?>"><i class="fas fa-folder-open"></i> Dokumentasi</a></li>
									<li><a href="<?= base_url('maintenance') ?>"><i class="fas fa-wrench"></i> Maintenance</a></li>
									<li><a href="<?= base_url('pemusnahan_barang') ?>"><i class="fas fa-trash"></i> Pemusnahan Barang</a></li>
									<li class=""><a><i class="fas fa-clone"></i> Data Master <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none;">
											<li><a href="<?= base_url('fakultas') ?>"><i class="fas fa-school"></i></i> Fakultas</a></li>
											<li><a href="<?= base_url('prodi') ?>"><i class="fas fa-laptop"></i></i> Program Studi</a></li>
											<li><a href="<?= base_url('gedung') ?>"><i class="fas fa-building"></i> Gedung</a></li>
											<li><a href="<?= base_url('ruangan') ?>"><i class="fas fa-door-open"></i></i> Daftar Ruangan</a></li>
											<li><a href="<?= base_url('user') ?>"><i class="fas fa-users"></i></i> Pengguna</a></li>
										</ul>
									</li>
								<?php elseif (session('userData')['role_user'] == "Kalab") : ?>
									<li><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Beranda </a></li>
									<li><a href="<?= base_url('pendanaan') ?>"><i class="fas fa-dollar"></i> Pendanaan</a></li>
									<li><a href="<?= base_url('barang') ?>"><i class="fas fa-cubes"></i> Barang </a></li>
									<li class=""><a><i class="fas fa-map"></i> Posisi Barang<span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none;">
											<li><a href="<?= base_url('labor_rsi'); ?>"><i class="fas fa-map-pin"></i> Labor RSI</a></li>
											<li><a href="<?= base_url('labor_se'); ?>"><i class="fas fa-map-pin"></i> Labor SE</a></li>
											<li><a href="<?= base_url('labor_int'); ?>"><i class="fas fa-map-pin"></i> Labor INT</a></li>
										</ul>
									</li>
									<li class=""><a><i class="fas fa-retweet"></i> Peminjaman <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none;">
											<li><a href="<?= base_url('peminjaman_barang') ?>"><i class="fas fa-exchange-alt"></i> Peminjaman Barang</a></li>
											<li><a href="<?= base_url('peminjaman_ruangan') ?>"><i class="fas fa-handshake"></i> Peminjaman Ruangan</a></li>
										</ul>
									</li>
									<li><a href="<?= base_url('dokumentasi') ?>"><i class="fas fa-folder-open"></i> Dokumentasi</a></li>
									<li><a href="<?= base_url('maintenance') ?>"><i class="fas fa-wrench"></i> Maintenance</a></li>
									<li><a href="<?= base_url('pemusnahan_barang') ?>"><i class="fas fa-trash"></i> Pemusnahan Barang</a></li>
									<li><a href="<?= base_url('user') ?>"><i class="fas fa-users"></i></i> Pengguna</a></li>
								<?php elseif (session('userData')['role_user'] == "Kaprodi") : ?>
									<li><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Beranda </a></li>
									<li><a href="<?= base_url('pendanaan') ?>"><i class="fas fa-dollar"></i> Pendanaan</a></li>
									<li class=""><a><i class="fas fa-map"></i> Posisi Barang<span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none;">
											<li><a href="<?= base_url('labor_rsi'); ?>"><i class="fas fa-map-pin"></i> Labor RSI</a></li>
											<li><a href="<?= base_url('labor_se'); ?>"><i class="fas fa-map-pin"></i> Labor SE</a></li>
											<li><a href="<?= base_url('labor_int'); ?>"><i class="fas fa-map-pin"></i> Labor INT</a></li>
										</ul>
									</li>
									<li class=""><a><i class="fas fa-retweet"></i> Peminjaman <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none;">
											<li><a href="<?= base_url('peminjaman_barang') ?>"><i class="fas fa-exchange-alt"></i> Peminjaman Barang</a></li>
											<li><a href="<?= base_url('peminjaman_ruangan') ?>"><i class="fas fa-handshake"></i> Peminjaman Ruangan</a></li>
										</ul>
									</li>
									<li><a href="<?= base_url('dokumentasi') ?>"><i class="fas fa-folder-open"></i> Dokumentasi</a></li>
									<li><a href="<?= base_url('maintenance') ?>"><i class="fas fa-wrench"></i> Maintenance</a></li>
									<li><a href="<?= base_url('pemusnahan_barang') ?>"><i class="fas fa-trash"></i> Pemusnahan Barang</a></li>
								<?php elseif (session('userData')['role_user'] == "Sekprodi") : ?>
									<li><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Beranda </a></li>
									<li><a href="<?= base_url('pendanaan') ?>"><i class="fas fa-dollar"></i> Pendanaan</a></li>
									<li class=""><a><i class="fas fa-map"></i> Posisi Barang<span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none;">
											<li><a href="<?= base_url('labor_rsi'); ?>"><i class="fas fa-map-pin"></i> Labor RSI</a></li>
											<li><a href="<?= base_url('labor_se'); ?>"><i class="fas fa-map-pin"></i> Labor SE</a></li>
											<li><a href="<?= base_url('labor_int'); ?>"><i class="fas fa-map-pin"></i> Labor INT</a></li>
										</ul>
									</li>
									<li class=""><a><i class="fas fa-retweet"></i> Peminjaman <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none;">
											<li><a href="<?= base_url('peminjaman_barang') ?>"><i class="fas fa-exchange-alt"></i> Peminjaman Barang</a></li>
											<li><a href="<?= base_url('peminjaman_ruangan') ?>"><i class="fas fa-handshake"></i> Peminjaman Ruangan</a></li>
										</ul>
									</li>
									<li><a href="<?= base_url('dokumentasi') ?>"><i class="fas fa-folder-open"></i> Dokumentasi</a></li>
									<li><a href="<?= base_url('maintenance') ?>"><i class="fas fa-wrench"></i> Maintenance</a></li>
									<li><a href="<?= base_url('pemusnahan_barang') ?>"><i class="fas fa-trash"></i> Pemusnahan Barang</a></li>
								<?php elseif (session('userData')['role_user'] == "Aslab") : ?>
									<li><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Beranda </a></li>
									<li><a href="<?= base_url('barang') ?>"><i class="fas fa-cubes"></i> Barang </a></li>
									<li class=""><a><i class="fas fa-map"></i> Posisi Barang<span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none;">
											<li><a href="<?= base_url('labor_rsi'); ?>"><i class="fas fa-map-pin"></i> Labor RSI</a></li>
											<li><a href="<?= base_url('labor_se'); ?>"><i class="fas fa-map-pin"></i> Labor SE</a></li>
											<li><a href="<?= base_url('labor_int'); ?>"><i class="fas fa-map-pin"></i> Labor INT</a></li>
										</ul>
									</li>
									<li><a href="<?= base_url('dokumentasi') ?>"><i class="fas fa-folder-open"></i> Dokumentasi</a></li>
									<li><a href="<?= base_url('maintenance') ?>"><i class="fas fa-wrench"></i> Maintenance</a></li>
									<li><a href="<?= base_url('pemusnahan_barang') ?>"><i class="fas fa-trash"></i> Pemusnahan Barang</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Beranda" href="/dashboard">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</a>
						<a id="fullscreenButton" data-toggle="tooltip" data-placement="top" title="Full Screen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="About" href="<?= base_url('about'); ?>">
							<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="#" onclick="confirmLogout();">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
				</div>
			</div>
			<!-- Menu hamburger -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle d-md-none">
						<a id="menu_toggle"><i class="fa fa-bars" style="margin-left: 10px;"></i></a>
					</div>
					<!-- Tombol kanan -->
					<nav class="nav navbar-nav" style="color: #73879C;">
						<ul class=" navbar-right">
							<div class="btn-group pull-right" role="group" style="margin-right: 250px; float: right;">
								<button class="tombol" id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-out-alt pull-right ml-3 mt-1"></i>
									<a class="user-profile" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									</a><?= session('userData')['username'] ?>
								</button>
								<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
									<a class="dropdown-item" href="<?= base_url('/user/profil'); ?>">
										<i class="far fa-id-card pull-right"></i> Profil
									</a>
									<a class="dropdown-item" href="#" onclick="confirmLogout();">
										<i class="fas fa-sign-out-alt pull-right"></i> Keluar
									</a>
									</a>
								</div>
							</div>
							<li role="presentation" class="nav-item dropdown open"></li>
						</ul>
					</nav>
				</div>
			</div>
			<br>
			<hr>
			<div class="right_col" style="min-height: 10px !important;" role="main">
				<div class="clearfix"></div>
				<?= $this->renderSection('content') ?>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="pull-left">
			<b>Versi</b> 1.1.2
		</div>
		<div class="pull-right" style="margin-right: 230px;">
			Copyright © <a href="<?= base_url('about'); ?>"><?php echo date('Y') ?></a> Sistem Informasi Inventaris Laboratorium Sistem Informasi
		</div>
		<div class="clearfix"></div>
	</footer>

	<script>
		// Menunggu hingga seluruh dokumen selesai dimuat sebelum menjalankan skrip
		document.addEventListener("DOMContentLoaded", function() {
			// Mengambil elemen tombol fullscreen
			var fullscreenButton = document.getElementById("fullscreenButton");
			// Menambahkan event listener untuk tombol fullscreen
			fullscreenButton.addEventListener("click", toggleFullScreen);

			// Memeriksa apakah mode fullscreen aktif sebelumnya
			var isFullscreen = localStorage.getItem("fullscreen");
			if (isFullscreen === "true") {
				// Memanggil fungsi untuk masuk ke mode fullscreen
				enterFullscreen(document.documentElement);
			}

			// Fungsi untuk mengganti status mode fullscreen
			function toggleFullScreen() {
				var element = document.documentElement; // Seluruh dokumen
				// Memeriksa apakah mode fullscreen sedang aktif
				if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) {
					// Jika aktif, keluar dari mode fullscreen
					exitFullscreen();
				} else {
					// Jika tidak aktif, masuk ke mode fullscreen
					enterFullscreen(element);
				}
			}

			// Fungsi untuk memasuki mode fullscreen
			function enterFullscreen(element) {
				// Menggunakan berbagai metode berbeda untuk meminta mode fullscreen
				if (element.requestFullscreen) {
					element.requestFullscreen();
				} else if (element.webkitRequestFullscreen) {
					element.webkitRequestFullscreen();
				} else if (element.mozRequestFullScreen) {
					element.mozRequestFullScreen();
				} else if (element.msRequestFullscreen) {
					element.msRequestFullscreen();
				}

				// Menyimpan status fullscreen dalam localStorage
				localStorage.setItem("fullscreen", "true");
			}

			// Fungsi untuk keluar dari mode fullscreen
			function exitFullscreen() {
				// Menggunakan berbagai metode berbeda untuk keluar dari mode fullscreen
				if (document.exitFullscreen) {
					document.exitFullscreen();
				} else if (document.webkitExitFullscreen) {
					document.webkitExitFullscreen();
				} else if (document.mozCancelFullScreen) {
					document.mozCancelFullScreen();
				} else if (document.msExitFullscreen) {
					document.msExitFullscreen();
				}

				// Menghapus status fullscreen dari localStorage
				localStorage.removeItem("fullscreen");
			}
		});

		// Fungsi untuk menampilkan gambar yang diperbesar saat diklik
		function openImage() {
			// Membuat elemen <div> untuk lapisan latar belakang gelap
			var overlay = document.createElement("div");
			overlay.style.position = "fixed";
			overlay.style.top = "0";
			overlay.style.left = "0";
			overlay.style.width = "100%";
			overlay.style.height = "100%";
			overlay.style.backgroundColor = "rgba(0, 0, 0, 0.7)";
			overlay.style.zIndex = "9999";

			// Membuat elemen <img> untuk menampilkan foto yang diperbesar
			var enlargedImage = document.createElement("img");
			enlargedImage.src = "<?= base_url('uploads/foto_profil/' . session('userData')['foto']) ?>";
			enlargedImage.style.display = "block";
			enlargedImage.style.margin = "auto";
			enlargedImage.style.maxWidth = "80%";
			enlargedImage.style.maxHeight = "80%";
			enlargedImage.style.position = "absolute";
			enlargedImage.style.top = "50%";
			enlargedImage.style.left = "50%";
			enlargedImage.style.transform = "translate(-50%, -50%)";

			// Menambahkan elemen <img> ke dalam elemen lapisan latar belakang
			overlay.appendChild(enlargedImage);

			// Menambahkan elemen lapisan latar belakang ke dalam elemen body
			document.body.appendChild(overlay);

			// Fungsi untuk menutup tampilan gambar saat diklik
			overlay.onclick = function() {
				document.body.removeChild(overlay);
			};
		}
		// Fungsi untuk konfirmasi logout
		function confirmLogout() {
			Swal.fire({
				title: '<span style="font-size: 20px;">Apakah Anda yakin ingin keluar?</span>',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Ya, keluar!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = "<?php echo base_url('logout') ?>";
				}
			});
		}
	</script>
	<!-- jQuery -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/nprogress/nprogress.js"></script>
	<!-- iCheck -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/iCheck/icheck.min.js"></script>
	<!-- Datatables -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/jszip/dist/jszip.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/pdfmake/build/pdfmake.min.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/pdfmake/build/vfs_fonts.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="<?= base_url() ?>/gentelella-master/build/js/custom.min.js"></script>
</body>

</html>