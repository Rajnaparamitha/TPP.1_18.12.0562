

	<!-- main -->
	<main class="main main--ml-sidebar-width">
		<div class="row">
			<header class="main__header col-12 mb-2">
				<div class="main__title">
					<h4>Data Anak</h4>
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
					<table class= "table table-hover">
						<th>Nama Anak</th>
						<th>Jenis Kelamin</th>
						<th>Tanggal Lahir</th>
       				<th style="width: 110px">Aksi</th>
					   <?php
    include "../lib/config.php";
    include "../lib/koneksi.php";
    $kuerianak=mysqli_query ($koneksi, "select * from tbl_anak");
    while ($anak=mysqli_fetch_array($kuerianak)){
		?>
					<tr>
						<td><?php echo $anak['nama_anak']; ?></td>
						<td><?php echo $anak['jenkel']; ?></td>
						<td><?php echo $anak['tglLahir']; ?></td>
						<td>
						<div class ="btn-group">
						<!-- <a  href ="<?php echo $admin_url; ?>adminweb.php?module=edit_kabupaten&id_kabupaten=<?php echo $anak ['id_anak']; ?>"> <button class="btn btn-secondary"><i class='fa fa-pencil'></i>
												</button></a> -->
												<a href ="<?php echo $admin_url; ?>module/anak/aksi_hapus.php?id_anak=<?php echo $anak ['id_anak']; ?>"
												onClick="return confirm ('Anda yakin ingin menghapus data ini')"><button class="btn btn-danger"><i class='fa fa-power-off'></i>
												</button>
											</a>
												 <!-- class="btn btn-danger"><i class='fa fa-power-off'></i></button></a> -->
											
						</div>
						</td>
					</tr>
					<?php 
					}?>
				
					</table>
					
					<div class = "box-footer">
						<br>
		<!-- <a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_kabupaten">
		<button class="btn btn-primary">Tambah Data</button></a> -->
					</section><!-- main__box -->
				</div>
			</div><!-- row -->
			</div>
		</div><!-- row -->
	</main>

