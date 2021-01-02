<main class="main bg-white">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-4  text-center">
            <img src="<?= $base_url; ?>images/posyandu.png" class="rounded" alt="Cinque Terre">
         </div>
         <div class="col-sm-8 ">
            <div class="card shadow ">
               <div class="card-body font-weight-bold">
                  <form action="<?= $base_url; ?>aksi/aksi_periksa.php" method="POST">
                     <h3 class="card-title font-weight-bold" style="color: #27AAC6;">Cek Pertumbuhan Anak Sekarang(Gratis!)</h3>
                     <hr>
                     <div class="form-group">
                        <label>Nama Anak</label>
                        <input type="text" name="nama" class="form">
                     </div>
                     <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenkel" class="form">
                           <option>Laki-Laki</option>
                           <option>Perempuan</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="ttl" class="form">
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
                        <button class="form btn btn--blue mt-4" type="submit" name="cek_form_home" value="cek_form_home">Cek Sekarang</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php
      if (isset($_GET['result'])) {


         if ($_GET['result'] == 'Gizi Kurang') {
            $text = 'text-warning';
         } elseif ($_GET['result'] == 'Gizi Baik(Normal)') {
            $text = 'text-success';
         } elseif ($_GET['result'] == 'Gizi Lebih') {
            $text = 'text-warning';
         } elseif ($_GET['result'] == 'Obesitas') {
            $text = 'text-warning';
         } else {
            $text = 'text-dark';
         }

      ?>

         <div id="result">
            <h1 class="card-title text-center font-weight-bold" style="color: #27AAC6;">Hasil Pemeriksaaan</h1>
            <!-- <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nulla iusto atque perferendis harum a rerum quisquam omnis ullam, optio ut quasi tenetur repellendus numquam.</p> -->
            <hr>
            <div class="row">
               <div class="col-12">
                  <div class="text-capitalize">
                     <h3 class="font-weight-bold" style="color: #27AAC6;"><span class="fa fa-child fa-1x"></span>&ensp;Hasil Periksa</h3>
                     <dd><span class="font-weight-bold">Nama Anak : </span><?= $_GET['nama']; ?></dd>
                     <dd><span class="font-weight-bold">Jenis Kelamin : </span><?= $_GET['jenis-kelamin']; ?> </dd>
                     <dd><span class="font-weight-bold">Tanggal lahir : </span><?= date('d M Y', strtotime($_GET['ttl'])); ?></dd>
                     <dd><span class="font-weight-bold">Bulan : </span>1</dd>
                     <dd><span class="font-weight-bold">Berat badan anak : </span><?= $_GET['bb']; ?> Kg</dd>
                     <dd><span class="font-weight-bold">Tinggi badan anak : </span><?= $_GET['tb']; ?> Cm </dd>
                     <dd><span class="font-weight-bold">Result : </span><span class="<?= $text; ?> font-weight-bold"><?= $_GET['result']; ?></span></dd>
                     <hr>
                  </div>
               </div>
            </div>
            <?php
            include 'pages/detail_info.php';
            ?>
         </div>
   </div>
<?php
      }  ?>


</main>