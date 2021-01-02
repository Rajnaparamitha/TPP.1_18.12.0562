<?php

if (!isset($_SESSION)) {
   session_start();
}

include "lib/koneksi.php";
include "lib/config.php";

include "template/header.php";

if (isset($_GET['page'])) {

   if ($_GET['page'] == "home") {
      include "pages/main.php";
   } elseif ($_GET['page'] == "daftar") {
      include "pages/daftar.php";
   } elseif ($_GET['page'] == "login") {
      include "pages/login.php";
   } elseif ($_GET['page'] == "dashboard") {
      include "pages/dashboard.php";
   } elseif ($_GET['page'] == "info") {
      include "pages/info.php";
   } elseif ($_GET['page'] == "kontak") {
      include "pages/kontak.php";
   } else {
      include "pages/main.php";
   }
} else {
   include "pages/main.php";
}
include "template/footer.php";
