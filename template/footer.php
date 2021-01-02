<!-- Footer -->
<?php
if (!empty($_GET['page'])) {
   if ($_GET['page'] == 'dashboard') {
      $fo = 'footer--ml-sidebar-width';
   } else {
      $fo = '';
   }
} else {
   $fo = '';
}

?>
<footer class="footer <?= $fo; ?>">
   <p class="mb-2 mb-sm-0">Copyright &copy; Posyandu 2020. All rights reserved</p>
   <p>Version Alpha</p>
</footer>
<!-- Pertama jQuery, kemudian Bootstrap JS, dan Reza Admin JS -->
<script src="<?= $base_url; ?>asset/dist/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?= $base_url; ?>asset/dist/js/bootstrap.min.js"></script>
<script src="<?= $base_url; ?>asset/dist/js/reza-admin.min.js"></script>

</body>

</html>