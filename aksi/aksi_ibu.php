<?php
include "../lib/koneksi.php";
include "../lib/config.php";

$id_ibu = $_POST['id_ibu'];

if (isset($_POST['edit_ibu'])) {
   $email = trim($_POST['email']);
   $username = trim($_POST['username']);
   $nama_lengkap = trim($_POST['nama_lengkap']);
   $no_hp = trim($_POST['hp']);
   $alamat = trim($_POST['alamat']);

   if (
      empty($username)  or empty($email)
      or empty($nama_lengkap) or empty($no_hp) or empty($alamat)
   ) {
      echo    "<script>alert
      window.location = '$base_url'+'Posyandu/?page=dashboard&d=profile&alert=validate';
          </script>";
   } else {
      $queryEdit = mysqli_query($koneksi, "UPDATE tbl_ibu 
                                       SET username = '$username' , 
                                          email = '$email', 
                                          nama_ibu = '$nama_lengkap', 
                                          no_telp = '$no_hp',
                                          alamat = '$alamat'
                                    WHERE id_ibu = '$id_ibu'");
      if ($queryEdit) {
         $_SESSION['username'] = $username;
         echo    "<script>
            window.location = '$base_url'+'?page=dashboard&d=profile&alert=success';
            </script>";
      } else {
         echo    "<script>
            alert('Data Gagal diupdate'); 
            window.location = '$base_url'+'?page=dashboard&d=profile';
            </script>";
      }
   }
} elseif (isset($_POST['edit_pass'])) {
   $password_lama = trim($_POST['password_lama']);
   $password_baru = trim($_POST['password_baru']);
   if (
      empty($password_lama)  or empty($password_baru)
   ) {
      echo    "<script>alert
      window.location = '$base_url'+'?page=dashboard&d=profile&alert=validate_pass';
          </script>";
   } else {
      $cek = mysqli_query($koneksi, "SELECT * FROM tbl_ibu WHERE id_ibu = '$id_ibu' AND password = '$password_lama' ");
      $ketemu = mysqli_num_rows($cek);

      if ($ketemu > 0) {
         $queryEdit = mysqli_query($koneksi, "UPDATE tbl_ibu SET password = '$password_baru' WHERE id_ibu = '$id_ibu'");
         if ($queryEdit) {
            $_SESSION['password'] = $password_baru;

            echo    "<script>
            window.location = '$base_url'+'?page=dashboard&d=profile&alert=success';
            </script>";
         } else {
            echo    "<script>
            alert('Password gagal disimpan'); 
            window.location = '$base_url'+'?page=dashboard&d=profile';
            </script>";
         }
      } else {
         echo    "<script>
      window.location = '$base_url'+'?page=dashboard&d=profile&alert=pass_fail';
      </script>";
      }
   }
}
