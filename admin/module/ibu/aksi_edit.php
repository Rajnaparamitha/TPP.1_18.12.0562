  <?php
  session_start();
  if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center > untuk mengakses modul ini andha harus login<br>";
    echo "<a href =../../index.php><b>LOGIN</b></a></center>";
  } else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_ibu = $_POST['id_ibu'];
    $nama_ibu = $_POST['nama_ibu'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    if ($nama_ibu == "") {
      echo "<script> alert ('Data gagal diubah karena kosong'); window.location ='$admin_url'+ 'adminweb.php?module=edit_ibu&id_ibu='+'$id_ibu';</script>";
    } else {


      $queryedit = mysqli_query($koneksi, "UPDATE tbl_ibu SET nama_ibu='$nama_ibu', no_telp='$no_telp', alamat='$alamat' WHERE id_ibu='$id_ibu'");

      if ($queryedit) {
        echo "<script> alert ('Data Berhasil diubah'); window.location ='$admin_url'+ 'adminweb.php?module=ibu';</script>";
      } else {
        echo "<script> alert ('Data gagal diubah'); window.location ='$admin_url'+ 'adminweb.php?module=edit_ibu&id_ibu='+'$id_ibu';</script>";
      }
    }
  }


  ?>