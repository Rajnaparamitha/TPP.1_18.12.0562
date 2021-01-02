<?php
session_start();
if (empty($_SESSION['username'])AND empty ($_SESSION['passuser'])) {
    echo"<center > untuk mengakses modul ini andha harus login<br>";
    echo"<a href =../../index.php><b>LOGIN</b></a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idibu = $_GET ['id_ibu'];
  
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_ibu  WHERE id_ibu='$idibu'");
 

    if ($queryHapus){
        echo "<script> alert ('Data Berhasil dihapus'); window.location ='$admin_url'+ 'adminweb.php?module=ibu';</script>";
    }else {
        echo "<script> alert ('Data gagal dihapus'); window.location ='$admin_url'+ 'adminweb.php?module=ibu';</script>";
    }
}
