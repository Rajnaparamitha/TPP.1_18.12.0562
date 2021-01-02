<?php
$id_periksa = $_GET['edit'];
$queryPeriksa = mysqli_query($koneksi, "SELECT * FROM tbl_periksa,tbl_anak WHERE tbl_periksa.id_anak = tbl_anak.id_anak AND id_periksa = $id_periksa");
$data = mysqli_fetch_array($queryPeriksa);
?>

<!-- main box -->
<div class="col-12">
   <section class="main__box">
      <div class="card-body">
         <h3 class="card-title font-weight-bold" style="color: #27AAC6;"><span class="fa fa-user-md fa-1x"></span>&ensp;<?= $title; ?></h3>
         <!-- <p>Berat anak pada bulan sebelumnya 5kg dengan panjang 30cm status sehat</p> -->
         <hr>
         <form action="<?= $base_url; ?>aksi/aksi_periksa.php" method="POST">
            <input type="hidden" name="id_periksa" id="id_periksa" value="<?= $data['id_periksa']; ?>">
            <input type="hidden" name="bulan" id="bulan" value="<?= $data['bulan']; ?>">
            <input type="hidden" name="id_anak" id="id_anak" value="<?= $data['id_anak']; ?>">
            <input type="hidden" name="jenkel" class="form border-0" value="<?= $data['jenkel']; ?>">
            <div class="form-group">
               <label>Nama Anak</label>
               <input name="nama_anak" class="form border-0" value="<?= $data['nama_anak']; ?>" disabled>
            </div>
            <div class="form-group">
               <label>Jenis Kelamin</label>
               <input name="jenkel" class="form border-0" value="<?= $data['jenkel']; ?>" disabled>
            </div>
            <div class="form-group">
               <label>Bulan ke</label>
               <select name="bulan" class="form" disabled>
                  <option><?= $data['bulan']; ?> </option>
               </select>
            </div>

            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                     <label>Berat Anak (Kg)</label>
                     <input type="number" name="berat_anak" class="form" placeholder="3.2 Kg" step=0.01 value="<?= $data['berat_anak']; ?>">
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                     <label>Tinggi Anak (Cm)</label>
                     <input type="number" name="tinggi_anak" class="form" placeholder="50 cm" step=0.01 value="<?= $data['panjang_anak']; ?>">
                  </div>
               </div>
            </div>
            <div class="form-group ">
               <a href="<?= $base_url; ?>?page=dashboard&d=detail-anak&anak=<?= $data['id_anak']; ?>&dt=<?= $data['id_periksa']; ?>" class="form btn btn--gray mt-4">Batal</a>
               <button class="form btn btn--blue mt-4" type="submit" name="edit_result" value="edit_result">Update data pemeriksaan</button>
            </div>
         </form>
      </div>
   </section>
</div>

<!-- row -->