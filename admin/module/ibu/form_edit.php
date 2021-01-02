<!-- main -->
<main class="main main--ml-sidebar-width">
	<div class="row">
		<header class="main__header col-12 mb-2">
			<div class="main__title">
				<h4>Edit Data Ibu</h4>
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
		<?php
		$idIbu = $_GET['id_ibu'];
		$queryEdit = mysqli_query($koneksi, " SELECT * FROM tbl_ibu WHERE id_ibu ='$idIbu'");


		$hasilquery = mysqli_fetch_array($queryEdit);
		$id_ibu = $hasilquery['id_ibu'];
		$nama_ibu = $hasilquery['nama_ibu'];
		$no_telp = $hasilquery['no_telp'];
		$alamat = $hasilquery['alamat'];
		?>



		<div class="col-12">
			<section class="content-header">
				<p>Nama Ibu</p>
				<form class="from-horizontal " action="../admin/module/ibu/aksi_edit.php" method="POST">
					<input type="hidden" name="id_ibu" value="<?php echo $id_ibu; ?>">

					<input type="text" id="namaibu" name="nama_ibu" placeholder="Nama Ibu" class="form form--focus-blue mt-0" value=" <?= $nama_ibu; ?>">
					<br>

					<p>No Telp</p>
					<input type="text" id="NoTelepon" name="no_telp" placeholder="NoTelepon" class="form form--focus-blue mt-0" value=" <?= $no_telp; ?>">
					<br>

					<p>Nama Ibu</p>
					<input type="text" id="alamat" name="alamat" placeholder="alamat" class="form form--focus-blue mt-0" value=" <?= $alamat; ?>">
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