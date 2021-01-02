
  <?php  
session_start();
if (empty($_SESSION['username'])AND empty ($_SESSION['password'])) {
    echo"<center > untuk mengakses modul ini andha harus login<br>";
    echo"<a href =../../index.php><b>LOGIN</b></a></center>";
} else {
  include "../../../lib/config.php";
include "../../../lib/koneksi.php";
$id_anak = $_POST['id_anak'];
$nama_anak = $_POST ['nama_anak'];
$jenkel = $_POST ['jenkel'];
$tglLahir = $_POST ['tglLahir'];

    if ($nama_anak ==""){  echo "<script> alert ('Data gagal diubah karena kosong'); window.location ='$admin_url'+ 'adminweb.php?module=edit_kabupaten&id_anak='+'$id_anak';</script>";
    
    } else{
    
    
    $queryedit =mysqli_query($koneksi, "UPDATE tbl_anak SET nama_anak='$nama_anak', jenkel='$jenkel', tglLahir='$tglLahir' WHERE id_anak='$id_anak'");

    if ($queryedit){
        echo "<script> alert ('Data Berhasil diubah'); window.location ='$admin_url'+ 'adminweb.php?module=anak';</script>";
    }else {
        echo "<script> alert ('Data gagal diubah'); window.location ='$admin_url'+ 'adminweb.php?module=edit_kabupaten&id_anak='+'$id_anak';</script>";
    }
    }
}
    ?>