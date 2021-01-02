<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$namaanak = $_POST['nama_anak'];
$jenkel = $_POST['jenkel'];
$tglLahir = $_POST['tglLahir'];



if ($namakab ==""){  echo "<script> alert ('Data gagal dimasukkan karena data kosong'); window.location ='$admin_url'+ 'adminweb.php?module=tambah_kabupaten';</script>";
    
} else{
$querytambah = mysqli_query($koneksi, "INSERT INTO tbl_kabupaten (nama_anak ) VALUES ('$namaanak')");
if ($querytambah){
    echo "<script> alert ('Data Berhasil ditambah'); window.location ='$admin_url'+ 'adminweb.php?module=anak';</script>";
}else {
    echo "<script> alert ('Data gagal ditambah'); window.location ='$admin_url'+ 'adminweb.php?module=anak';</script>";
}
}
?>