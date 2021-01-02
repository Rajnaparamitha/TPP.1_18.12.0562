<!-- main -->
<main class="main main--ml-sidebar-width">
	<div class="row">
		<header class="main__header col-12 mb-2">
			<div class="main__title">
				<h4>Tambah Data Ibu</h4>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="../index.html">Home</a></li>
					<li class="breadcrumb-item active">Forms</li>
				</ul>
			</div>
		</header>

		<div class="col-sm-6">
			<div class="row">
				<div class="col-12">
				</div>
			</div><!-- row -->
		</div>



		<div class="col-12">
			<section class="content-header">
				<p>Nama Ibu</p>
				<form class="from-horizontal " action="../admin/module/ibu/aksi_tambah.php" method="POST">
					<input type="hidden" name="id_ibu" value="<?php echo $id_ibu; ?>">
					<input type="text" id="namaibu" name="nama_ibu" placeholder="Masukkan nama Ibu" class="form form--focus-blue mt-0">
					<br>
					<br>
					<p>No Telepon</p>
					<form class="from-horizontal " action="../admin/module/ibu/aksi_tambah.php" method="POST">
						<input type="text" id="no_telp" name="no_telp" placeholder="Masukkan no telepon" class="form form--focus-blue mt-0">
						<br>
						<br>
						<p>Alamat</p>
						<form class="from-horizontal " action="../admin/module/ibu/aksi_tambah.php" method="POST">

							<input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" class="form form--focus-blue mt-0">
							<br>
							<br>
							<div class="box-footer">
								<button type="submit" class="btn btn-primary pull-right">Simpan</button>
							</div>

			</section>
			</form>
		</div>
	</div><!-- row -->
	</div>
	</div><!-- row -->
</main>