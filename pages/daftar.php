<main class="main bg-white">
   <div class="container">
      <div class="card shadow ">
         <div class="card-body font-weight-bold">
            <form action="<?= $base_url; ?>aksi/aksi_daftar.php" method="POST">
               <h3 class="card-title font-weight-bold text-center" style="color: #27AAC6;">Daftar</h3>
               <p class=" text-center">Sudah punya akun? <a href="<?= $base_url; ?>?page=login">Login</a></p>
               <hr>
               <!-- alert -->
               <?php if (!empty($_GET['alert'])) : ?>
                  <?php
                  if ($_GET['alert'] == 'fail_username') {
                     $alert = 'alert--warning';
                     $pesan = 'username sudah digunakan';
                  } elseif ($_GET['alert'] == 'validate') {
                     $alert = 'alert--danger';
                     $pesan = 'Data Harus di Isi Penuh!';
                  } elseif ($_GET['alert'] == 'fail') {
                     $alert = 'alert--danger';
                     $pesan = 'Gagal Daftar.';
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

               <div class="form-group">
                  <label>Nama Ibu</label>
                  <input type="text" name="nama_lengkap" class="form">
               </div>
               <div class="form-group">
                  <label>No Telp</label>
                  <input type="text" name="hp" class="form">
               </div>
               <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form">
               </div>
               <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form">
               </div>
               <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form">

               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form">
               </div>
               <div class="form-group ">
                  <button class="form btn btn--blue mt-4" type="submit">Daftar</button>
               </div>
            </form>
         </div>
      </div>

   </div>
</main>