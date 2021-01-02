<!-- main box -->
<div class="col-12">
   <section class="main__box">
      <div class="card-body">
         <h3 class="card-title font-weight-bold" style="color: #27AAC6;"><span class="fa fa-male fa-1x"></span>&ensp;<?= $title; ?></h3>
         <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nulla iusto atque perferendis harum a rerum quisquam omnis ullam, optio ut quasi tenetur repellendus numquam.</p> -->
         <hr>
         <a href="#" class="btn btn--blue mb-3" data-toggle="modal" data-target="#addAnak">Tambah data anak</a>

         <table class="table table--gray">
            <thead>
               <tr>
                  <th width="10">No</th>
                  <th>Nama Anak</th>
                  <th width="30">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $n = 1;
               $id_ibu = $user['id_ibu'];
               $kueryAnak = mysqli_query($koneksi, "SELECT * FROM tbl_anak WHERE id_ibu = $id_ibu ");
               while ($anak = mysqli_fetch_array($kueryAnak)) {
               ?>
                  <tr>
                     <td class="text-center "><?= $n++; ?></td>
                     <td><?= $anak['nama_anak']; ?></td>
                     <td>
                        <a href="<?= $base_url; ?>?page=dashboard&d=detail-anak&anak=<?= $anak['id_anak']; ?>" class="btn-sm btn-success text-white text-decoration-none">Detail</a>
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


<div class="modal fade" id="addAnak" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="<?= $base_url; ?>aksi/aksi_anak.php" method="POST">
         <input type="hidden" name="id_ibu" id="id_ibu" value="<?= $user['id_ibu']; ?>">
         <div class="modal-content">
            <div class="modal-body">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               <div class="card-body">
                  <h3 class="card-title">Tambah data anak</h3>
                  <hr>
                  <div class="form-group">
                     <label>Nama Anak</label>
                     <input type="text" name="nama_anak" class="form">
                  </div>
                  <div class="form-group">
                     <label>Jenis Kelamin</label>
                     <select name="jenis_kelamin" class="form">
                        <option selected=""></option>
                        <option value="laki-laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Tanggal Lahir</label>
                     <input type="date" name="ttl" class="form">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn--gray" data-dismiss="modal">Batal</button>
               <button type="submit" class="btn btn--blue" name="tambah_anak">Simpan</button>
            </div>
      </form>
   </div>
</div>