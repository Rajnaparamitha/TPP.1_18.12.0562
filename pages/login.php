<main class="main bg-white">
   <div class="container">
      <div class="card shadow">
         <div class="card-body font-weight-bold">
            <form action="<?= $base_url; ?>aksi/aksi_login.php" method="POST">
               <h3 class="card-title font-weight-bold text-center" style="color: #27AAC6;">Login</h3>
               <p class=" text-center">Belum punya akun? <a href="<?= $base_url; ?>?page=daftar">Daftar</a></p>
               <hr>
               <!-- alert -->
               <?php if (!empty($_GET['alert'])) : ?>
                  <?php
                  if ($_GET['alert'] == 'success') {
                     $alert = 'alert--success';
                     $pesan = 'Daftar berhasil, silahkan login.';
                  } elseif ($_GET['alert'] == 'validate') {
                     $alert = 'alert--warning';
                     $pesan = 'Username atau Password tidak boleh kosong.';
                  } elseif ($_GET['alert'] == 'fail') {
                     $alert = 'alert--warning';
                     $pesan = 'Username atau Password salah.';
                  } elseif ($_GET['alert'] == 'block') {
                     $alert = 'alert--danger';
                     $pesan = 'Maaf, Sepertinya akun Anda diblokir hubungi Admin!';
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
                  <label>Username</label>
                  <input type="text" name="username" class="form">
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form">
               </div>
               <div class="form-group ">
                  <button class="form btn btn--blue mt-4" type="submit">Login</button>
               </div>
            </form>
         </div>
      </div>

   </div>
</main>