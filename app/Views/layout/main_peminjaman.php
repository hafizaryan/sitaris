<!DOCTYPE html>
<html lang="en">

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
	<link href="<?= base_url() ?>/gentelella-master/vendors/jQuery-Smart-Wizard/styles/smart_wizard.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="<?= base_url() ?>/gentelella-master/build/css/custom.min.css" rel="stylesheet">
	<style>
		/* CSS untuk membuat elemen <footer> transparan */
		footer {
			background-color: #F7F7F7;
			border: none;
		}
	</style>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title" style="text-align: center;"><span>SI<b>TARIS</b> SI</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3></h3>
							<ul class="nav side-menu">
								<li><a href="<?= base_url('peminjaman_barang/pinjam') ?>"><i class="fas fa-exchange-alt"></i> Peminjaman Barang</a></li>
								<li><a href="<?= base_url('peminjaman_ruangan/pinjam') ?>"><i class="fas fa-handshake"></i> Peminjaman Ruangan</a></li>
							</ul>
						</div>
						</ul>
					</div>
					<!-- /sidebar menu -->
						<!-- <div class="sidebar-footer hidden-small">
							<a data-toggle="tooltip" data-placement="top" title="Beranda" href="#">
								<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
							</a>
							<a id="fullscreenButton" data-toggle="tooltip" data-placement="top" title="FullScreen">
								<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="About" href="#">
								<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
								<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
							</a>
						</div> -->
					<!-- /menu footer buttons -->
				</div>
			</div>
			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<br><br>
							<li role="presentation" class="nav-item dropdown open">
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="right_col" role="main">
				<?= $this->renderSection('content') ?>
			</div>
			<footer>
				<b>Versi</b> 1.0.0
				<div class="pull-right">
					@2023 Sistem Informasi Inventaris Laboratorium Sistem Informasi
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>
	<!-- jQuery -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/nprogress/nprogress.js"></script>
	<!-- Smart Wizard -->
	<script src="<?= base_url() ?>/gentelella-master/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
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
	<script src="<?= base_url() ?>/gentelella-master/vendors/validator/multifield.js"></script>
	<script src="<?= base_url() ?>/gentelella-master/vendors/validator/validator.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

	<!-- Custom Theme Scripts -->
	<script src="<?= base_url() ?>/gentelella-master/build/js/custom.min.js"></script>
	<script>
		function confirmLogout() {
			return confirm("Apakah Anda yakin ingin keluar?");
		}
		const fullscreenButton = document.getElementById('fullscreenButton');
		fullscreenButton.addEventListener('click', () => {
			toggleFullScreen();
		});

		function toggleFullScreen() {
			if (!document.fullscreenElement && // untuk mode normal
				!document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
				if (document.documentElement.requestFullscreen) {
					document.documentElement.requestFullscreen();
				} else if (document.documentElement.msRequestFullscreen) {
					document.documentElement.msRequestFullscreen();
				} else if (document.documentElement.mozRequestFullScreen) {
					document.documentElement.mozRequestFullScreen();
				} else if (document.documentElement.webkitRequestFullscreen) {
					document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
				}
			} else { // untuk mode fullscreen
				if (document.exitFullscreen) {
					document.exitFullscreen();
				} else if (document.msExitFullscreen) {
					document.msExitFullscreen();
				} else if (document.mozCancelFullScreen) {
					document.mozCancelFullScreen();
				} else if (document.webkitExitFullscreen) {
					document.webkitExitFullscreen();
				}
			}
		}
	</script>
</body>

</html>