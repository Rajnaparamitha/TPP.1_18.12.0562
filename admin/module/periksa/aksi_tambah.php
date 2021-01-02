<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$namakab = $_POST['nama_kabupaten'];
if ($namakab ==""){  echo "<script> alert ('Data Kabupaten gagal dimasukkan karena data kosong'); window.location ='$admin_url'+ 'adminweb.php?module=tambah_brand';</script>";
    
} else{
$querytambah = mysqli_query($koneksi, "INSERT INTO tbl_kabupaten (nama_kabupaten ) VALUES ('$namakab')");
if ($querytambah){
    echo "<script> alert ('Data Kabupaten Berhasil ditambah'); window.location ='$admin_url'+ 'adminweb.php?module=kabupaten';</script>";
}else {
    echo "<script> alert ('Data Kabupaten gagal ditambah'); window.location ='$admin_url'+ 'adminweb.php?module=kabupaten';</script>";
}
}
?>