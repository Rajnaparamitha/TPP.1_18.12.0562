<?php
$id_anak = $_GET['anak'];
$kueryAnak = mysqli_query($koneksi, "SELECT * FROM tbl_anak,tbl_ibu WHERE tbl_ibu.id_ibu = tbl_anak.id_ibu AND tbl_anak.id_anak = $id_anak ");
$anak = mysqli_fetch_array($kueryAnak);

$id_periksa = $_GET['dt'];
$kueryPeriksa = mysqli_query($koneksi, "SELECT * FROM tbl_periksa,tbl_anak WHERE tbl_periksa.id_anak = tbl_anak.id_anak AND tbl_periksa.id_periksa = $id_periksa ");
$periksa = mysqli_fetch_array($kueryPeriksa);


if ($periksa['result'] == 'Gizi Kurang') {
   $text = 'text-warning';
} elseif ($periksa['result'] == 'Gizi Baik(Normal)') {
   $text = 'text-success';
} elseif ($periksa['result'] == 'Gizi Lebih') {
   $text = 'text-warning';
} elseif ($periksa['result'] == 'Obesitas') {
   $text = 'text-warning';
} else {
   $text = 'text-dark';
}

?>

<!-- main box -->
<div class="col-12">
   <section class="main__box">
      <div class="card-body">
         <h1 class="card-title text-center font-weight-bold" style="color: #27AAC6;"><?= $title; ?></h1>
        <!--  <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nulla iusto atque perferendis harum a rerum quisquam omnis ullam, optio ut quasi tenetur repellendus numquam.</p> -->
         <hr>
         <div class="row">
            <div class="col-6">
               <div class="text-capitalize">
                  <h3 class="font-weight-bold" style="color: #27AAC6;"><span class="fa fa-male fa-1x"></span>&ensp;Profil</h3>
                  <dd><span class="font-weight-bold">Nama Ibu : </span><?= $anak['nama_ibu']; ?></dd>
                  <dd><span class="font-weight-bold">Nama Anak : </span><?= $anak['nama_anak']; ?></dd>
                  <dd><span class="font-weight-bold">Jenis Kelamin : </span><?= $anak['jenkel']; ?> </dd>
                  <dd><span class="font-weight-bold">Tanggal lahir : </span><?= date('d M Y', strtotime($anak['tglLahir'])); ?></dd>
                  <hr>
               </div>
            </div>
            <div class="col-6">

               <div class="text-capitalize">
                  <h3 class="font-weight-bold" style="color: #27AAC6;"><span class="fa fa-child fa-1x"></span>&ensp;Hasil Periksa</h3>
                  <dd><span class="font-weight-bold">Bulan : </span><?= $periksa['bulan']; ?></dd>
                  <dd><span class="font-weight-bold">Berat badan anak : </span><?= $periksa['berat_anak']; ?> Kg</dd>
                  <dd><span class="font-weight-bold">Tinggi badan anak : </span><?= $periksa['panjang_anak']; ?> Cm </dd>
                  <dd><span class="font-weight-bold">Result : </span><span class="<?= $text; ?> font-weight-bold"><?= $periksa['result']; ?></span></dd>
                  <hr>
               </div>
            </div>
         </div>
         <?php
         include "pages/detail_info.php";
         ?>
      </div>
      <div class="float-right">
         <a href="<?= $base_url; ?>?page=dashboard&d=detail-anak&anak=<?= $id_anak; ?>&edit=<?= $id_periksa; ?>">Edit</a>
      </div>

   </section>
</div>
<!-- row -->