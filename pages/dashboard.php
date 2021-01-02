<?php
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
   header("location: $base_url");
}
?>

<aside class="sidebar">
   <ul class="sidebar__nav">
      <li class="sidebar__item <?= ($_GET['d'] == 'periksa') ? 'sidebar__item--active' : ''; ?>">
         <a href="<?= $base_url; ?>?page=dashboard&d=periksa"><span class="fa fa-user-md"></span>&ensp;Periksa </a>
      </li>
      <li class="sidebar__item <?= ($_GET['d'] == 'data-anak' || $_GET['d'] == 'detail-anak') ? 'sidebar__item--active' : ''; ?>">
         <a href="<?= $base_url; ?>?page=dashboard&d=data-anak"><span class="fa fa-male fa-1x"></span>&ensp;Data Anak </a>
      </li>
      <li class="sidebar__item <?= ($_GET['d'] == 'profile') ? 'sidebar__item--active' : ''; ?>">
         <a href="<?= $base_url; ?>?page=dashboard&d=profile"><span class="fa fa-user"></span>&ensp;Biodata Ibu</a>
      </li>
      <li class="sidebar__item">
         <a href="<?= $base_url; ?>aksi/aksi_logout.php"><span class="fa fa-arrow-circle-left"></span>&ensp;Logout</a>
      </li>
   </ul>
</aside>
<!-- main -->
<main class="main main--ml-sidebar-width">
   <div class="row">


      <?php
      if (isset($_GET['d'])) {
         $title = 'Periksa';
         if ($_GET['d'] == "periksa") {
            $title = 'Periksa';
            include "dash/periksa.php";
         } elseif ($_GET['d'] == "data-anak") {
            $title = 'Data Anak';
            include "dash/data_anak.php";
         } elseif ($_GET['d'] == "detail-anak") {
            if (!empty($_GET['dt'])) {
               $title = 'Hasil Pemeriksaan';
               include "dash/result.php";
            } else if (!empty($_GET['edit'])) {
               $title = 'Edit Data Pemeriksaan';
               include "dash/edit_result.php";
            } else {
               $title = 'Detail Anak';
               include "dash/detail_anak.php";
            }
         } elseif ($_GET['d'] == "profile") {
            $title = 'Data Profile';
            include "dash/edit_data_ibu.php";
         } else {
            include "dash/periksa.php";
         }
      } else {
         $title = 'Periksa';
         include "dash/periksa.php";
      }


      ?>


   </div>
</main>