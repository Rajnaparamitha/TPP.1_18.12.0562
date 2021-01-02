<!-- main box -->
<div class="col-12">
   <section class="main__box">
      <div class="card-body">
         <h3 class="card-title font-weight-bold" style="color: #27AAC6;"><span class="fa fa-user-md fa-1x"></span>&ensp;<?= $title; ?></h3>
         <!-- <p>Berat anak pada bulan sebelumnya 5kg dengan panjang 30cm status sehat</p> -->
         <hr>

         <?php if (!isset($_POST['id_anak'])) : ?>
            <form action="<?= $base_url; ?>?page=dashboard&d=periksa" method="POST">
               <div class="form-group">
                  <label>Nama Anak</label>
                  <select name="id_anak" class="form">
                     <?php
                     $id_ibu = $user['id_ibu'];
                     $kueryAnak = mysqli_query($koneksi, "SELECT * FROM tbl_anak WHERE id_ibu = $id_ibu ");
                     while ($anak = mysqli_fetch_array($kueryAnak)) {
                     ?>
                        <option value="<?= $anak['id_anak']; ?>"><?= $anak['nama_anak']; ?> </option>
                     <?php
                     }
                     ?>
                  </select>
               </div>
               <div class="form-group ">
                  <button class="form btn btn--blue mt-4" type="submit">Berikutnya</button>
               </div>
            </form>
         <?php else : ?>
            <?php
            $id_anak = $_POST['id_anak'];
            $kueryAnak = mysqli_query($koneksi, "SELECT * FROM tbl_anak WHERE id_anak = $id_anak ");
            $anak = mysqli_fetch_array($kueryAnak)
            ?>
            <form action="<?= $base_url; ?>aksi/aksi_periksa.php" method="POST">
               <input type="hidden" name="id_anak" id="id_anak" value="<?= $anak['id_anak']; ?>">
               <input type="hidden" name="jenkel" class="form border-0" value="<?= $anak['jenkel']; ?>">
               <div class="form-group">
                  <label>Nama Anak</label>
                  <input name="nama_anak" class="form border-0" value="<?= $anak['nama_anak']; ?>" disabled>
               </div>
               <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <input name="jenkel" class="form border-0" value="<?= $anak['jenkel']; ?>" disabled>
               </div>
               <div class="form-group">
                  <label>Cek Usia anak pada Bulan ke</label>
                  <select name="bulan" class="form">
                     <?php
                     $id_anak = $anak['id_anak'];
                     $queryperiksa = mysqli_query($koneksi, "SELECT * FROM tbl_periksa WHERE id_anak = $id_anak ORDER BY bulan DESC LIMIT 1");
                     $cek = mysqli_num_rows($queryperiksa);
                     $periksa = mysqli_fetch_array($queryperiksa);
                     $bulan = ($cek < 0) ? 1 : $periksa['bulan'] + 1;
                     ?>
                     <option value="<?= $bulan; ?>"><?= $bulan; ?> </option>
                  </select>
               </div>

               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>Berat Anak (Kg)</label>
                        <input type="number" name="berat_anak" class="form" placeholder="3.2 Kg" step=0.01>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>Tinggi Anak (cm)</label>
                        <input type="number" name="tinggi_anak" class="form" placeholder="50 cm" step=0.01>
                     </div>
                  </div>
               </div>
               <div class="form-group ">
                  <a href="<?= $base_url; ?>?page=dashboard&d=periksa" class="form btn btn--gray mt-4">Batal</a>
                  <button class="form btn btn--blue mt-4" type="submit">Cek Sekarang</button>
               </div>
            </form>
         <?php endif; ?>
      </div>

   </section>
</div>

<!-- row -->