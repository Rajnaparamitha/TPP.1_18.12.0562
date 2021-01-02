<?php
include "../lib/koneksi.php";
include "../lib/config.php";


$tgl_daftar = date("Y-m-d");
$active = '1';
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$pass = trim($_POST['password']);
$nama_lengkap = trim($_POST['nama_lengkap']);
$no_hp = trim($_POST['hp']);
$alamat = trim($_POST['alamat']);



$querycek = mysqli_query($koneksi, "SELECT * FROM tbl_ibu WHERE username='$username'");
$ketemu = mysqli_num_rows($querycek);
if ($ketemu > 0) {
   echo    "<script>alert
    window.location = '$base_url'+'?page=daftar&alert=fail_username';
    </script>";
} else {

   if (
      empty($username) or empty($pass) or empty($email)
      or empty($nama_lengkap) or empty($no_hp) or empty($alamat)
   ) {
      echo    "<script>alert
          window.location = '$base_url'+'?page=daftar&alert=validate';
          </script>";
   } else {
      $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_ibu (username,password,email,nama_ibu,no_telp,alamat,status,tgl_daftar) 
          VALUES ('$username','$pass','$email','$nama_lengkap','$no_hp','$alamat','$active','$tgl_daftar')");


      if ($querySimpan) {
         echo    "<script>alert
          window.location = '$base_url'+'?page=login&alert=success';
          </script>";
      } else {
         echo    "<script>alert
          window.location = '$base_url'+'?page=daftar&alert=fail';
          </script>";
      }
   }
}
