<?php
include "../lib/koneksi.php";
include "../lib/config.php";

$username = trim($_POST['username']);
$pass = trim($_POST['password']);
// pastikan username dan password adalah berupa huruf atau angka.

if (!ctype_alnum($username) or !ctype_alnum($pass)) {
   echo "
    <script> 
         window.location = '$base_url'+'?page=login&alert=validate';
    </script>
    ";
} else {
   $login = mysqli_query($koneksi, "SELECT * FROM tbl_ibu WHERE username = '$username' AND password = '$pass' ");
   $ketemu = mysqli_num_rows($login);
   $r = mysqli_fetch_array($login);

   // Apabila username dan password ditemukan
   if ($ketemu > 0) {
      $status = $r['status'];

      if ($status !== '1') {
         echo "
            <script> 
            window.location = '$base_url'+'?page=login&alert=block';
            </script>
            ";
      } else {
         session_start();
         $_SESSION['username'] = $r['username'];
         $_SESSION['password'] = $r['password'];

         header("location: $base_url?page=dashboard&d=data-anak");
      }
   } else {
      echo "
        <script> 
         window.location = '$base_url'+'?page=login&alert=fail';
        </script>
        ";
   }
}
