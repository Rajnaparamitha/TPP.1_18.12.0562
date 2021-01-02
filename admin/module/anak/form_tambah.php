

	<!-- main -->
	<main class="main main--ml-sidebar-width">
		<div class="row">
			<header class="main__header col-12 mb-2">
				<div class="main__title">
					<h4>Tambah Data Anak</h4>
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
						<p>Nama Anak</p>
						<form class ="from-horizontal " action="../admin/module/anak/aksi_tambah.php" method="POST">
						<input type="hidden" name = "id_kabupaten" value ="<?php echo $id_kabupaten; ?>">
					<input type = "text" id="namabrand" name= "nama_kabupaten" placeholder = "Nama Anak" class="form form--focus-blue mt-0">
					<p>Jenis Kelamin</p>
						<form class ="from-horizontal " action="../admin/module/anak/aksi_tambah.php" method="POST">
						
					<input type = "text" id="jenkel" name= "jenkel" placeholder = "Jenis Kelamin" class="form form--focus-blue mt-0">
					<p>Tanggal Lahir</p>
						<form class ="from-horizontal " action="../admin/module/anak/aksi_tambah.php" method="POST">
						
					<input type = "date" id="tglLahir" name= "tglLahir" placeholder = "Tanggal Lahir" class="form form--focus-blue mt-0">
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

