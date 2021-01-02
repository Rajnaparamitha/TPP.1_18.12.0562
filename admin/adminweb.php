<?php
session_start();

if (empty($_SESSION['username']) and empty($_SESSION['pasword'])) {
	echo "<center>Untuk mengakses modul, Anda harus login </br>";
	echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else {
	include "../lib/config.php";
	include "../lib/koneksi.php";

	$r['username'] = $_SESSION['username'];
	$user = $r['username'];

	$queryAdmin = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username ='$user' ");

	$hasilQuery = mysqli_fetch_array($queryAdmin);
	//   $username    = $hasilQuery['username'];
	//   $nama_admin  = $hasilQuery['nama']; 
	//   $foto_profil = $hasilQuery ['foto_profil'];



	// $querybrand=mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_brand FROM tbl_brand");
	// $hasilbrand=mysqli_fetch_array($querybrand);
	// $jumlahbrand=$hasilbrand['jumlah_brand'];
?>




	<!DOCTYPE html>
	<html lang="en">

	<head>
		<!-- Require meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Dashboard . Reza Admin</title>

		<!-- Social network metas -->
		<meta name="author" content="@FikkriReza">
		<meta name="description" content="Open source responsive admin template with Bootstrap framework">

		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@FikkriReza">
		<meta name="twitter:creator" content="@FikkriReza">

		<meta property="fb:app_id" content="801699283982913">
		<meta property="og:url" content="https://rezafikkri.github.io/Reza-Admin">
		<meta property="og:title" content="Dashboard . Reza Admin">
		<meta property="og:description" content="Open source responsive admin template with Bootstrap framework">
		<meta property="og:image" content="https://rezafikkri.github.io/Reza-Admin/dist/img/rezaadmin.jpg">

		<!-- Bootstrap CSS first -->
		<link rel="stylesheet" href="dist/css/bootstrap.min.css">
		<!-- then Font Awesome -->
		<link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">
		<!-- and Reza Admin CSS -->
		<link rel="stylesheet" type="text/css" href="dist/css/reza-admin.min.css">
		<!-- Favicon -->
		<link rel="icon" href="dist/img/Reza_Admin.ico">
	</head>

	<body>
		<!-- navbar -->
		<nav class="navbar navbar-expand-sm navbar--white">
			<a class="navbar__sidebar-toggler" href="#"><span class="fa fa-bars"></span></a>
			<a class="navbar-brand ml-3" href="index.html">
				<h3>Admin PosyanduKu</h3>
			</a>
			<button class="navbar-toggler" data-target="#navbarNav" data-toggle="collapse" type="button">
				<span class="fa fa-navicon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
				<ul class="navbar-nav">

					<li class="nav-item navbar__avatar dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
							<img src="dist/img/reza.jpg" alt="avatar image">
							<span>Admin</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="" class="dropdown-item">Settings Account</a>
							<div class="dropdown-divider"></div>
							<a href="../aksi/aksi_logout.php" class="dropdown-item dropdown-item--hover-red">Logout <span class="fa fa-sign-out"></span></a>
						</div>
					</li>
				</ul>
			</div>
		</nav>

		<!-- sidebar -->
		<aside class="sidebar">
			<ul class="sidebar__nav">
				<li class="sidebar__item sidebar__item--active"><a class="nav-link" href="adminweb.php?module=home"><span class="fa fa-home"></span> Dashboard</a></li>

				<li class="sidebar__item"><a href="adminweb.php?module=ibu"><span class="fa fa-th-large"></span> Data Ibu</a></li>

				<li class="sidebar__item"><a href="adminweb.php?module=anak"><span class="fa fa-th-large"></span> Data Anak</a></li>
				<li class="sidebar__item"><a href="adminweb.php?module=ibu"><span class="fa fa-bar-chart-o"></span> Data Periksa</a></li>



				<!-- <li class="sidebar__item"><a class="sidebar__btn-dropdown" href="#"><span class="fa fa-building"></span> Cetak Laporan</a>
					<ul class="sidebar__dropdown">
						<li class="sidebar__dropdown-item"><a href="login.html">Data User </a></li>
						<li class="sidebar__dropdown-item"><a href="register.html">Data produk</a></li>

					</ul>
				</li> -->


				</li>

				<li class="sidebar__item sidebar__item--header mt-3">Important for read</li>

			</ul>
		</aside>


		<?php
		if ($_GET['module'] == 'home') {
			include "module/home/home.php";
		} elseif ($_GET['module'] == 'ibu') {
			include "module/ibu/list_ibu.php";
		} elseif ($_GET['module'] == 'tambah_ibu') {
			include "module/ibu/form_tambah.php";
		} elseif ($_GET['module'] == 'edit_ibu') {
			include "module/ibu/form_edit.php";
		} elseif ($_GET['module'] == 'anak') {
			include "module/anak/list_anak.php";
		} elseif ($_GET['module'] == 'tambah_anak') {
			include "module/anak/form_tambah.php";
		} elseif ($_GET['module'] == 'edit_anak') {
			include "module/anak/form_edit.php";


			// } elseif ($_GET['module'] == 'merek') {
			//     include "module/merek/list_merek.php";
			// } elseif ($_GET['module'] == 'tambah_merek') {
			//     include "module/merek/form_tambah_merek.php";
			// } elseif ($_GET['module'] == 'edit_merek') {
			//     include "module/merek/form_edit_merek.php";


			// } elseif ($_GET['module'] == 'produk') {
			//   include "module/produk/list_produk.php";
			// } elseif ($_GET['module'] == 'tambah_produk') {
			//   include "module/produk/form_tambah_produk.php";
			// } elseif ($_GET['module'] == 'edit_produk') {
			//   include "module/produk/form_edit_produk.php";




			// } elseif ($_GET['module'] == 'kurir') {
			//   include "module/kurir/list_kurir.php";
			// } elseif ($_GET['module'] == 'tambah_kurir') {
			//   include "module/kurir/form_tambah_kurir.php";
			// } elseif ($_GET['module'] == 'edit_kurir') {
			//   include "module/kurir/form_edit.php";


			// } elseif ($_GET['module'] == 'kota') {
			//   include "module/kota/list_kota.php";
			// } elseif ($_GET['module'] == 'tambah_kota') {
			//   include "module/kota/form_tambah_kota.php";
			// } elseif ($_GET['module'] == 'edit_kota') {
			//   include "module/kota/form_edit.php";


			// } elseif ($_GET['module'] == 'member') {
			//   include "module/member/list_member.php";
			// } elseif ($_GET['module'] == 'tambah_kota') {
			//   include "module/kota/form_tambah_member.php";
			// } elseif ($_GET['module'] == 'edit_member') {
			//   include "module/member/form_edit.php";                    

			// } elseif ($_GET['module'] == 'pesanan') {
			//   include "module/pesanan/list_pesanan.php";
			// } elseif ($_GET['module'] == 'detail_pesanan') {
			//   include "module/pesanan/detail_pesanan.php";
			// } elseif ($_GET['module'] == 'aksi_kirim') {
			//   include "module/pesanan/aksi_kirim.php";   


			// } elseif ($_GET['module'] == 'pesanan_kirim') {
			//   include "module/pesanan/list_pesanan_kirim.php";
			// } elseif ($_GET['module'] == 'detail_pesanan_kirim') {
			//   include "module/pesanan/detail_pesanan_kirim.php";




			// } elseif ($_GET['module'] == 'penjualan') {
			//   include "module/penjualan/list_penjualan.php";
			// } elseif ($_GET['module'] == 'detail_penjualan') {
			//   include "module/penjualan/detail_penjualan.php";




			// } elseif ($_GET['module'] == 'biaya') {
			//   include "module/biayakirim/list_biaya_kirim.php";
			// } elseif ($_GET['module'] == 'tambah_biaya') {
			//   include "module/biayakirim/form_tambah_biaya.php";
			// } elseif ($_GET['module'] == 'edit_biaya') {
			//   include "module/biayakirim/form_edit.php";

		} else {
			include "module/home/home.php";
		}

		?>

		<!-- main -->


		<!-- footer -->
		<footer class="footer footer--ml-sidebar-width">

		</footer>

		<!-- jQuery first, then Bootstrap JS, and Reza Admin JS-->
		<script src="dist/js/jquery-3.5.1.slim.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script src="dist/js/reza-admin.min.js"></script>

		<!-- Optional Javascript -->
		<script src="plugins/Chart.js/Chart.min.js"></script>

		<script type="text/javascript">
			// visitor charts
			const visitorChart = document.querySelector("#visitor_chart").getContext('2d');
			let configVisitorChart = {
				type: 'line',
				data: {
					labels: ['Sunday, 11', 'Monday, 12', 'Tuesday, 13', 'Wednesday, 14', 'Thursday, 15', 'Friday, 16'],
					datasets: [{
						label: 'Visitors',
						data: [10, 6, 7, 5, 1, 14],
						fill: 'origin',
						backgroundColor: 'rgba(37,151,224,.7)',
						borderColor: '#2597e0'
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false,
					},
					tooltips: {
						titleFontFamily: 'sans-serif',
						bodyFontFamily: 'sans-serif',
						backgroundColor: '#fff',
						titleFontColor: '#333',
						bodyFontColor: '#333',
						borderColor: '#e2e2e2',
						borderWidth: '1',
					}
				}
			}
			new Chart(visitorChart, configVisitorChart);

			// browser usage
			const browserUsageChart = document.querySelector("#browser_usage_chart").getContext('2d');
			let configBrowserUsageChart = {
				type: 'pie',
				data: {
					labels: ['Chrome', 'Mozilla', 'Uc Browser', 'Opera Mini'],
					datasets: [{
						data: [10, 6, 7, 5],
						backgroundColor: [
							"#1bd741",
							"#2597e0",
							"#f9a022",
							"#dd2525"
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: true
					},
					tooltips: {
						titleFontFamily: 'sans-serif',
						bodyFontFamily: 'sans-serif',
						backgroundColor: '#fff',
						titleFontColor: '#333',
						bodyFontColor: '#333',
						borderColor: '#e2e2e2',
						borderWidth: '1',
					}
				}
			}
			new Chart(browserUsageChart, configBrowserUsageChart);

			// show more btn
			const showMoreBtn = document.querySelector("a.show-more-btn");
			if (showMoreBtn !== null) {
				showMoreBtn.addEventListener('click', function(e) {
					// not aktifkan fungsi default link
					e.preventDefault();

					let targetShowBtnMore = e.target;
					if (!targetShowBtnMore.classList.contains("show-more-btn")) targetShowBtnMore = e.target.parentElement;
					if (targetShowBtnMore.classList.contains("show-more-btn")) {
						targetShowBtnMore.nextElementSibling.classList.remove("d-none");
						setTimeout(function() {
							targetShowBtnMore.nextElementSibling.classList.add("d-none");
						}, 1000);
					}
				});
			}
		</script>
	</body>

	</html>
<?php
}
?>