

	<!-- main -->
	<main class="main main--ml-sidebar-width">
		<div class="row">
			<header class="main__header col-12 mb-2">
				<div class="main__title">
					<h4>Edit Data Anak</h4>
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
		 $idanak = $_GET ['id_anak'];
		 $queryEdit=mysqli_query ($koneksi, " SELECT * FROM tbl_anak WHERE id_anak='$idanak'");
		 
		
		 $hasilquery=mysqli_fetch_array($queryEdit);
		 $id_anak =$hasilquery['id_anak'];
		 $nama_anak=$hasilquery['nama_anak'];
		 $jenkel=$hasilquery['jenkel'];
		 $tglLahir=$hasilquery['tglLahir'];
		?>
		
		

				<div class="col-12">
					<section class="content-header">
						<p>Nama Anak</p>
						<form class ="from-horizontal " action="../admin/module/anak/aksi_edit.php" method="POST">
						<input type="hidden" name = "id_anak" value ="<?php echo $id_anak; ?>">
					<input type = "text" id="namaanak" name= "nama_anak" placeholder = "Nama Anak" class="form form--focus-blue mt-0" value=" <?= $nama_anak; ?>">
					<br>
					<br>

					<p>Jenis Kelamin</p>
						<form class ="from-horizontal " action="../admin/module/anak/aksi_edit.php" method="POST">
						<input type="hidden" name = "id_kabupaten" value ="<?php echo $id_kabupaten; ?>">
					<input type = "text" id="jenkel" name= "jenkel" placeholder = "Jenis Kelamin" class="form form--focus-blue mt-0" value=" <?= $jenkel; ?>">
					<br>
					<br>
					<p>Tanggal Lahir</p>
						<form class ="from-horizontal " action="../admin/module/anak/aksi_edit.php" method="POST">
						<input type="hidden" name = "id_kabupaten" value ="<?php echo $id_kabupaten; ?>">
					<input type = "date" id="tglLahir" name= "tglLahir" placeholder = "Tanggal Lahir" class="form form--focus-blue mt-0" value=" <?= $tglLahir; ?>">
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

