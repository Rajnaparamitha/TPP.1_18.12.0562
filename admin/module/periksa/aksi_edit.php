
  <?php  
session_start();
if (empty($_SESSION['username'])AND empty ($_SESSION['password'])) {
    echo"<center > untuk mengakses modul ini andha harus login<br>";
    echo"<a href =../../index.php><b>LOGIN</b></a></center>";
} else {
  include "../../../lib/config.php";
include "../../../lib/koneksi.php";
$id_kabupaten = $_POST['id_kabupaten'];
$nama_kabupaten = $_POST ['nama_kabupaten'];
    if ($nama_kabupaten ==""){  echo "<script> alert ('Data Kabupaten gagal diubah karena kosong'); window.location ='$admin_url'+ 'adminweb.php?module=edit_kabupaten&id_kabupaten='+'$id_kabupaten';</script>";
    
    } else{
    
    
    $queryedit =mysqli_query($koneksi, "UPDATE tbl_kabupaten SET nama_kabupaten='$nama_kabupaten' WHERE id_kabupaten='$id_kabupaten'");

    if ($queryedit){
        echo "<script> alert ('Data Kabupaten Berhasil diubah'); window.location ='$admin_url'+ 'adminweb.php?module=kabupaten';</script>";
    }else {
        echo "<script> alert ('Data Kabupaten gagal diubah'); window.location ='$admin_url'+ 'adminweb.php?module=edit_kabupaten&id_kabupaten='+'$id_kabupaten';</script>";
    }
    }
}
    ?>