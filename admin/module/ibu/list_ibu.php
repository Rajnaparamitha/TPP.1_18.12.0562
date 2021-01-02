<!-- main -->
<main class="main main--ml-sidebar-width">
	<div class="row">
		<header class="main__header col-12 mb-2">
			<div class="main__title">
				<h4>Data Ibu</h4>
				<ul class="breadcrumb">

				</ul>
			</div>
		</header>

		<div class="col-sm-6">
			<div class="row">
				<div class="col-12">
					<!-- main__box -->
				</div>



			</div><!-- row -->
		</div>




		<div class="col-12">
			<section class="content-header">
				<table class="table table-hover">
					<th>Nama Ibu</th>
					<th>Nomer Wa</th>
					<th>Alamat</th>
					<th style="width: 110px">Aksi</th>
					<?php
					include "../lib/config.php";
					include "../lib/koneksi.php";
					$kueriIbu = mysqli_query($koneksi, "select * from tbl_ibu");
					while ($ibu = mysqli_fetch_array($kueriIbu)) {
					?>
						<tr>
							<td><?php echo $ibu['nama_ibu']; ?></td>
							<td><?php echo $ibu['no_telp']; ?></td>
							<td><?php echo $ibu['alamat']; ?></td>
							<td>
								<div class="btn-group">
									<a href="<?php echo $admin_url; ?>adminweb.php?module=edit_ibu&id_ibu=<?php echo $ibu['id_ibu']; ?>"> <button class="btn btn-secondary"><i class='fa fa-pencil'></i>
										</button></a>
									<a href="<?php echo $admin_url; ?>module/ibu/aksi_hapus.php?id_ibu=<?php echo $ibu['id_ibu']; ?>" onClick="return confirm ('Anda yakin ingin menghapus data ini')"><button class="btn btn-danger"><i class='fa fa-power-off'></i>
										</button>
									</a>
									<!-- class="btn btn-danger"><i class='fa fa-power-off'></i></button></a> -->

								</div>
							</td>
						</tr>
					<?php
					} ?>

				</table>

				<div class="box-footer">
					<br>
					<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_ibu">
						<button class="btn btn-primary">Tambah Data</button></a>
			</section><!-- main__box -->
		</div>
	</div><!-- row -->
</main>