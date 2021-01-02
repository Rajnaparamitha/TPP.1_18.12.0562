<?php
include "../lib/koneksi.php";
include "../lib/config.php";




if (isset($_POST['delete_anak'])) {
   $id_anak = $_POST['id_anak'];
   $queryHapusTblCek = mysqli_query($koneksi, "DELETE FROM tbl_periksa WHERE id_anak = '$id_anak'");
   if ($queryHapusTblCek) {
      $queryHapusTblAnak = mysqli_query($koneksi, "DELETE FROM tbl_anak WHERE id_anak = '$id_anak'");
      echo    "<script>
               alert('Data anak berhasil di hapus'); 
               window.location = '$base_url'+'?page=dashboard&d=data-anak';
               </script>";
   }
} else {

   $tgl_input = date("Y-m-d");
   $id_ibu = $_POST['id_ibu'];
   $nama_anak = $_POST['nama_anak'];
   $jenkel = $_POST['jenis_kelamin'];
   $ttl = $_POST['ttl'];

   if (
      empty($nama_anak) or empty($jenkel) or empty($ttl)
   ) {
      $prev_url = $_SERVER['HTTP_REFERER'];
      header("Location: $prev_url");
   } else {

      if (isset($_POST['tambah_anak'])) {

         $querycek = mysqli_query($koneksi, "SELECT * FROM tbl_anak WHERE nama_anak='$nama_anak' AND id_ibu = '$id_ibu'");
         $ketemu = mysqli_num_rows($querycek);
         if ($ketemu > 0) {
            echo    "<script>
               alert('Nama Anak sudah ada!'); 
               window.location = '$base_url'+'?page=dashboard&d=data-anak';
               </script>";
         } else {
            $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_anak (id_ibu,nama_anak,jenkel,tglLahir,tgl_buat) 
         VALUES ('$id_ibu','$nama_anak','$jenkel','$ttl','$tgl_input')");


            if ($querySimpan) {
               echo    "<script>
                     window.location = '$base_url'+'?page=dashboard&d=data-anak';
                     </script>";
            } else {
               echo    "<script>
                     alert('Gagal memasukan data anak!'); 
                     window.location = '$base_url'+'?page=dashboard&d=data-anak';
                     </script>";
            }
         }
      } elseif (isset($_POST['edit_anak'])) {

         $id_anak = $_POST['id_anak'];
         $queryEdit = mysqli_query($koneksi, "UPDATE tbl_anak
      SET nama_anak = '$nama_anak', jenkel = '$jenkel', tglLahir = '$ttl'
      WHERE id_anak = '$id_anak'");
         if ($queryEdit) {
            echo    "<script>
                  window.location = '$base_url'+'?page=dashboard&d=detail-anak&anak=$id_anak';
                  </script>";
         } else {
            echo    "<script>
                  alert('Data Gagal disimpan'); 
                  window.location = '$base_url'+'?page=dashboard&d=detail-anak&anak=$id_anak';
                  </script>";
         }
      }
   }
}
