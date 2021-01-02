<?php
$id_anak = $_GET['anak'];
$kueryAnak = mysqli_query($koneksi, "SELECT * FROM tbl_anak,tbl_ibu WHERE tbl_ibu.id_ibu = tbl_anak.id_ibu AND tbl_anak.id_anak = $id_anak ");
$anak = mysqli_fetch_array($kueryAnak);
?>

<!-- main box -->
<div class="col-12">
   <section class="main__box">
      <div class="card-body">
         <h3 class="card-title font-weight-bold" style="color: #27AAC6;"><span class="fa fa-male fa-1x"></span>&ensp;<?= $title; ?></h3>
         <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nulla iusto atque perferendis harum a rerum quisquam omnis ullam, optio ut quasi tenetur repellendus numquam.</p> -->
         <hr>


         <div class="text-capitalize">
            <a href="#" class="float-right text-danger" data-toggle="modal" data-target="#deleteAnak">Delete</a>
            <a href="#" class="float-right mr-3" data-toggle="modal" data-target="#editAnak">Edit</a>
            <dd><span class="font-weight-bold">Nama Ibu : </span><?= $anak['id_anak']; ?></dd>
            <dd><span class="font-weight-bold">Nama Anak : </span><?= $anak['nama_anak']; ?></dd>
            <dd><span class="font-weight-bold">Jenis Kelamin : </span><?= $anak['jenkel']; ?> </dd>
            <dd><span class="font-weight-bold">Tanggal lahir : </span><?= date('d M Y', strtotime($anak['tglLahir'])); ?></dd>

            <hr>
         </div>

         <table class="table table--gray">
            <thead>
               <tr>
                  <th width="10">No</th>
                  <th>Usia Anak</th>
                  <th>Berat Anak</th>
                  <th>Tinggi Anak</th>
                  <th>Kondisi</th>
                  <th>Tanggal Periksa</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $n = 1;
               $id_anak = $anak['id_anak'];
               $kueryData = mysqli_query($koneksi, "SELECT * FROM tbl_periksa WHERE id_anak = $id_anak ");
               while ($data = mysqli_fetch_array($kueryData)) {

                  if ($data['result'] == 'Gizi Kurang') {
                     $text = 'text-warning';
                  } elseif ($data['result'] == 'Gizi Baik(Normal)') {
                     $text = 'text-success';
                  } elseif ($data['result'] == 'Gizi Lebih') {
                     $text = 'text-warning';
                  } elseif ($data['result'] == 'Obesitas') {
                     $text = 'text-warning';
                  } else {
                     $text = 'text-dark';
                  }
               ?>
                  <tr>
                     <td class="text-center "><?= $n++; ?></td>
                     <td>Usia Bulan ke <?= $data['bulan']; ?></td>
                     <td><?= $data['berat_anak']; ?> Kg</td>
                     <td><?= $data['panjang_anak']; ?> cm</td>
                     <td>
                        <span class="<?= $text; ?> font-weight-bold"><?= $data['result']; ?></span>

                     </td>
                     <td><?= date('d M Y', strtotime($data['tgl_periksa'])); ?> </td>
                     <td>
                        <a href="<?= $base_url; ?>?page=dashboard&d=detail-anak&anak=<?= $anak['id_anak']; ?>&dt=<?= $data['id_periksa']; ?>" class="btn-sm btn-success text-white text-decoration-none">Detail</a>

                     </td>
                  </tr>
               <?php
               }
               ?>
            </tbody>
         </table>
      </div>

   </section>

</div>
<!-- row -->

<div class="modal fade" id="editAnak" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="<?= $base_url; ?>aksi/aksi_anak.php" method="POST">
         <input type="hidden" name="id_ibu" id="id_ibu" value="<?= $user['id_ibu']; ?>">
         <input type="hidden" name="id_anak" id="id_anak" value="<?= $anak['id_anak']; ?>">
         <div class="modal-content">
            <div class="modal-body">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               <div class="card-body font-weight-bold">
                  <h3 class="card-title font-weight-bold" style="color: #27AAC6;">Edit data anak</h3>
                  <hr>
                  <div class=" form-group">
                     <label>Nama Anak</label>
                     <input type="text" name="nama_anak" class="form" value="<?= $anak['nama_anak']; ?>">
                  </div>
                  <div class="form-group">
                     <label>Jenis Kelamin</label>
                     <select name="jenis_kelamin" class="form">
                        <option value="laki-laki" <?= ($anak['nama_anak'] == 'laki-laki') ? 'selected="selected"' : ''; ?>>Laki Laki</option>
                        <option value="perempuan" <?= ($anak['nama_anak'] == 'perempuan') ? 'selected="selected"' : ''; ?>>Perempuan</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Tanggal Lahir</label>
                     <input type="date" name="ttl" class="form" value="<?= $anak['tglLahir']; ?>">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn--gray" data-dismiss="modal">Batal</button>
               <button type="submit" class="btn btn--blue" name="edit_anak" value="edit_anak">Update</button>
            </div>
         </div>
      </form>
   </div>
</div>

<div class="modal fade" id="deleteAnak" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="<?= $base_url; ?>aksi/aksi_anak.php" method="POST">
         <input type="hidden" name="id_anak" id="id_anak" value="<?= $anak['id_anak']; ?>">
         <div class="modal-content">
            <div class="modal-body">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               <div class="card-body font-weight-bold">
                  <h4 class="card-title font-weight-bold text-danger">Yakin menghapus data anak ?</h4>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn--gray" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn--red" name="delete_anak" value="delete_anak">Hapus</button>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>