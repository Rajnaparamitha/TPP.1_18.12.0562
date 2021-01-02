<?php
session_start();
if (empty($_SESSION['username'])AND empty ($_SESSION['passuser'])) {
    echo"<center > untuk mengakses modul ini andha harus login<br>";
    echo"<a href =../../index.php><b>LOGIN</b></a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_anak = $_GET ['id_anak'];
  
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_anak  WHERE id_anak='$id_anak'");
 

    if ($queryHapus){
        echo "<script> alert ('Data Berhasil dihapus'); window.location ='$admin_url'+ 'adminweb.php?module=anak';</script>";
    }else {
        echo "<script> alert ('Data gagal dihapus'); window.location ='$admin_url'+ 'adminweb.php?module=anak';</script>";
    }
}
    ?>