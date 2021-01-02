<?php
$sid = session_id();



?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Meta tag wajib -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title>Posyandu</title>

   <!-- Pertama Bootstrap CSS -->
   <link rel="stylesheet" href="<?= $base_url; ?>asset/dist/css/bootstrap.min.css">
   <!-- Kemudian Font Awesome -->
   <link rel="stylesheet" type="text/css" href="<?= $base_url; ?>asset/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
   <!-- dan Reza Admin CSS -->
   <link rel="stylesheet" type="text/css" href="<?= $base_url; ?>asset/dist/css/reza-admin.min.css">
   <!-- Favicon -->
   <link rel="icon" href="<?= $base_url; ?>asset/dist/img/Reza_Admin.ico">
</head>

<body>
   <nav class="navbar navbar-expand-sm navbar--white shadow-sm">
      <a class="navbar-brand" href="<?= $base_url; ?>">
         <img src="<?= $base_url; ?>asset/dist/img/Posyandu.jpg" width="120" alt="logo posyandu">
      </a>
      <button class="navbar-toggler" data-target="#navbarNav1" data-toggle="collapse" type="button">
         <span class="fa fa-navicon"></span>
      </button>
      <!-- link navigasi -->
      <div class="collapse navbar-collapse" id="navbarNav1">
         <ul class="navbar-nav">
            <li class="nav-item <?= (empty($_GET['page'])) ? 'nav-item--active' : ''; ?> "><a class="nav-link" href="<?= $base_url; ?>">Home</a></li>
            <?php if (!empty($_SESSION['username']) and !empty($_SESSION['password'])) : ?>
               <li class="nav-item <?= ($_GET['d'] == 'periksa') ? 'nav-item--active' : ''; ?>"><a class="nav-link" href="<?= $base_url; ?>?page=dashboard&d=periksa">Periksa</a></li>
            <?php endif; ?>
            <li class="nav-item <?= ($_GET['page'] == 'info') ? 'nav-item--active' : ''; ?> "><a class="nav-link" href="<?= $base_url; ?>?page=info">Info Kesehatan</a></li>
         </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav1">
         <?php if (empty($_SESSION['username']) and empty($_SESSION['password'])) : ?>
            <ul class="navbar-nav">
               <!-- navbar avatar -->
               <li class="nav-item navbar__avatar">
                  <a class="nav-link" href="<?= $base_url; ?>?page=daftar">
                     <span>Daftar</span>
                  </a>
               </li>
               <!-- navbar avatar -->
               <li class="nav-item">
                  <a class="nav-link" href="<?= $base_url; ?>?page=login">
                     <span>Login</span>
                  </a>
               </li>
            </ul>
         <?php else : ?>
            <?php
            $user = $_SESSION['username'];
            $queryMember = mysqli_query($koneksi, "SELECT * FROM tbl_ibu WHERE username ='$user' ");
            $user = mysqli_fetch_array($queryMember);
            ?>
            <ul class="navbar-nav">
               <!-- navbar avatar -->
               <li class="nav-item navbar__avatar">
                  <a class="nav-link" href="<?= $base_url; ?>?page=dashboard">
                     <img src="<?= $base_url; ?>images/default.png" alt="avatar image">
                     <span><?= $user['username']; ?></span>
                  </a>
               </li>
               <!-- navbar avatar -->
               <li class="nav-item">
                  <a class="nav-link nav-link--hover-red" href="<?= $base_url; ?>aksi/aksi_logout.php">
                     <span class="fa fa-sign-out"></span> Logout
                  </a>
               </li>
            </ul>
         <?php endif; ?>
      </div>
      <!-- link navigasi -->
   </nav>
   <!-- Content -->