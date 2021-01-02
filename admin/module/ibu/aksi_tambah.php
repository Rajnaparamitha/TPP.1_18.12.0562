<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$namaibu = $_POST['nama_ibu'];
$no_telp = $_POST['no_telp'];
$alamat= $_POST['alamat'];

if ($namaibu ==""){  echo "<script> alert ('Data gagal dimasukkan karena data kosong'); window.location ='$admin_url'+ 'adminweb.php?module=tambah_ibu';</script>";
    
} else{
$querytambah = mysqli_query($koneksi, "INSERT INTO tbl_ibu (nama_ibu, no_telp, alamat) VALUES ('$namaibu', '$no_telp', '$alamat')");
if ($querytambah){
    echo "<script> alert ('Data Berhasil ditambah'); window.location ='$admin_url'+ 'adminweb.php?module=ibu';</script>";
}else {
    echo "<script> alert ('Data gagal ditambah'); window.location ='$admin_url'+ 'adminweb.php?module=ibu';</script>";
}
}
