<!-- main box -->
<div class="col-12">
   <section class="main__box">
      <div class="card-body">
         <h3 class="card-title font-weight-bold" style="color: #27AAC6;"><span class="fa fa-user-md fa-1x"></span>&ensp;<?= $title; ?></h3>
         <!-- <p>Berat anak pada bulan sebelumnya 5kg dengan panjang 30cm status sehat</p> -->
         <hr>
         <!-- alert -->
         <?php if (!empty($_GET['alert'])) : ?>
            <?php
            if ($_GET['alert'] == 'success') {
               $alert = 'alert--success';
               $pesan = 'Data berhasil diupdate.';
            } elseif ($_GET['alert'] == 'validate') {
               $alert = 'alert--danger';
               $pesan = 'Data tidak boleh kosong!';
            } elseif ($_GET['alert'] == 'pass_fail') {
               $alert = 'alert--warning';
               $pesan = 'Password tidak valid.';
            } elseif ($_GET['alert'] == 'fail') {
               $alert = 'alert--warning';
               $pesan = 'Username atau Password salah.';
            } elseif ($_GET['alert'] == 'validate_pass') {
               $alert = 'alert--danger';
               $pesan = 'Password tidak boleh kosong!';
            }
            ?>
            <div class="alert <?= $alert; ?>">
               <div class="alert__icon">
                  <span class="fa fa-ban"></span>
               </div>
               <div class="alert__description">
                  <p><?= $pesan; ?></p>
               </div>
               <div class="alert__action">
                  <a class="alert__close-btn">&times;</a>
               </div>
            </div>
            <!-- alert -->
         <?php endif; ?>
         <form action="<?= $base_url; ?>aksi/aksi_ibu.php" method="POST">
            <input type="hidden" name="id_ibu" id="id_ibu" value="<?= $user['id_ibu']; ?>">
            <div class="form-group">
               <label>Nama Ibu</label>
               <input type="text" name="nama_lengkap" class="form" value="<?= $user['nama_ibu']; ?>">
            </div>
            <div class="form-group">
               <label>No Telp</label>
               <input type="text" name="hp" class="form" value="<?= $user['no_telp']; ?>">
            </div>
            <div class="form-group">
               <label>Alamat</label>
               <input type="text" name="alamat" class="form" value="<?= $user['alamat']; ?>">
            </div>
            <div class="form-group">
               <label>Username</label>
               <input type="text" name="username" class="form" value="<?= $user['username']; ?>">
            </div>
            <div class="form-group">
               <label>Email</label>
               <input type="email" name="email" class="form" value="<?= $user['email']; ?>">
            </div>
            <div class="form-group ">
               <button class="form btn btn--blue mt-4" type="submit" name="edit_ibu" value="edit_ibu">Update</button>
               <a class="form btn btn--red mt-4" data-toggle="modal" data-target="#exampleModal">Change Password</a>
            </div>
         </form>
      </div>
   </section>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form action="<?= $base_url; ?>aksi/aksi_ibu.php" method="POST">
            <input type="hidden" name="id_ibu" id="id_ibu" value="<?= $user['id_ibu']; ?>">
            <div class="modal-content">
               <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="card-body font-weight-bold">
                     <h3 class="card-title font-weight-bold" style="color: #27AAC6;">Update password</h3>
                     <hr>
                     <div class=" form-group">
                        <label>Password lama</label>
                        <input type="text" name="password_lama" class="form">
                     </div>
                     <div class=" form-group">
                        <label>Password baru</label>
                        <input type="text" name="password_baru" class="form">
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn--gray" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn--blue" name="edit_pass" value="edit_pass">Change Password</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- row -->