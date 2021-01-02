<?php
include "../../lib/koneksi.php";
include "../../lib/config.php";

$username = trim($_POST['username']);
$password = trim($_POST['password']);
// pastikan username dan password adalah berupa huruf atau angka.

if (empty($username) or empty($password)) {
    echo "
    <script> 
    alert('Isi Username dan Password!'); 
        window.location = '../register_pilih.php';
    </script>
    ";
} else {
    $login = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ");
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);
  

    if ($ketemu > 0) {
        session_start();
        $_SESSION['username'] = $r['username'];
        $_SESSION['password'] = $r['password'];
    
  
         //login sebagai admin
         header("location:../adminweb.php?module=home");
       

    }
    else {
        echo    "<script>
        alert('Username Dan Password Salah'); 
                    window.location = '../index.php';
                    </script>";
                }
    }

?>