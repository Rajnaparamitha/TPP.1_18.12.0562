<?php
include "../lib/koneksi.php";
include "../lib/config.php";


$panjang_badana = $_POST['tinggi_anak'];
$berat_badana = $_POST['berat_anak'];
$jenis_kelamin = $_POST['jenkel'];



if ($panjang_badana < 45) {
   $hasil = 'N/A';
} else {
   // misal panjang = 44.698
   //mengambil 2 angka didepan
   $a = substr($panjang_badana, 0, 2); // jadi 44

   //tambah .5 dibelakang angka
   $b = $a . '.5'; //jadi 44.5

   //round pembulat ke atas 44.698 
   $panjang_badan = round($panjang_badana, 1); //jadi 44.7

   //bandingkan apakah 44.7 < 44.5 ?
   if ($panjang_badan < $b) {
      $panjang_badan = $a;
   } elseif ($panjang_badan = $b) {
      $panjang_badan = $b;
   } else {
      $panjang_badan = $a + 1;
   }
   //panjang_badan menjadi 45

   $berat_badan = round($berat_badana, 1);



   $cek = mysqli_query($koneksi, "SELECT * FROM tbl_cek WHERE Panjang_Badan = '$panjang_badan' AND Jenkel = '$jenis_kelamin' LIMIT 1,1 ");
   $result = mysqli_fetch_array($cek);
   if ($berat_badan <= $result['Berat_Badan']) {
      $hasil = 'Gizi Kurang';
   } else {

      $cek = mysqli_query($koneksi, "SELECT * FROM `tbl_cek`  WHERE Panjang_Badan = '$panjang_badan' AND Jenkel = '$jenis_kelamin' LIMIT 4,1 ");
      $result = mysqli_fetch_array($cek);
      if ($berat_badan <= $result['Berat_Badan']) {
         $hasil = 'Gizi Baik(Normal)';
      } else {
         $cek = mysqli_query($koneksi, "SELECT * FROM `tbl_cek`  WHERE Panjang_Badan = '$panjang_badan' AND Jenkel = '$jenis_kelamin' LIMIT 5,1");
         $result = mysqli_fetch_array($cek);
         if ($berat_badan <= $result['Berat_Badan']) {
            $hasil = 'Gizi Lebih';
         } else {
            $cek = mysqli_query($koneksi, "SELECT * FROM `tbl_cek`  WHERE Panjang_Badan = '$panjang_badan' AND Jenkel = '$jenis_kelamin' LIMIT 6,1");
            $result = mysqli_fetch_array($cek);
            if ($berat_badan >= $result['Berat_Badan']) {
               $hasil = 'Obesitas';
            } else {
               $hasil = 'N/A';
            }
         }
      }
   }
}
if ($hasil == 'N/A') {
   echo    "<script>
   alert('Status Kesehatan N/A'); 
   window.location = '$base_url'+'?page=dashboard&d=periksa';
   </script>";
} else {
   if (!empty($_POST['cek_form_home'])) {
      $nama = $_POST['nama'];
      $ttl = $_POST['ttl'];

      echo    "<script>
      window.location = '$base_url'+'?nama=$nama&jenis-kelamin=$jenis_kelamin&ttl=$ttl&bb=$berat_badana&tb=$panjang_badana&result=$hasil#result';
      </script>";



      # code...
   } else {
      $id_anak = $_POST['id_anak'];
      $bulan = $_POST['bulan'];

      if (isset($_POST['edit_result'])) {
         $id_periksa = $_POST['id_periksa'];
         $querySimpan = mysqli_query($koneksi, "UPDATE tbl_periksa
      SET berat_anak = '$berat_badana', panjang_anak = '$panjang_badana', result = '$hasil'
      WHERE id_periksa = '$id_periksa'");
         if ($querySimpan) {
            echo    "<script>
                  window.location = '$base_url'+'?page=dashboard&d=detail-anak&anak=$id_anak&dt=$id_periksa';
                  </script>";
         } else {
            echo    "<script>
                  alert('Data Gagal disimpan'); 
                  window.location = '$base_url'+'?page=dashboard&d=detail-anak&anak=$id_anak&edit=$id_periksa';
                  </script>";
         }
      } else {
         $tgl_daftar = date("Y-m-d");
         $bulan_sekarang = date('m');

         $cek_bulan = mysqli_query($koneksi, "SELECT * FROM tbl_periksa WHERE id_anak = '$id_anak' AND month(tgl_periksa) = '$bulan_sekarang'");
         $cb = mysqli_num_rows($cek_bulan);

         if (empty($cb)) {
            $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_periksa (id_anak,berat_anak,panjang_anak,bulan,result,tgl_periksa) VALUES ('$id_anak','$berat_badana','$panjang_badana','$bulan','$hasil','$tgl_daftar')");

            if ($querySimpan) {
               echo    "<script>
                  window.location = '$base_url'+'?page=dashboard&d=detail-anak&anak=$id_anak';
                  </script>";
            } else {
               echo    "<script>
                  alert('Data Gagal disimpan'); 
                  window.location = '$base_url'+'?page=dashboard&d=periksa';
                  </script>";
            }
         } else {
            echo    "<script>
      alert('Kesehatan anak pada bulan ini sudah diperiksa, coba lagi bulan depan'); 
      window.location = '$base_url'+'?page=dashboard&d=periksa';
      </script>";
         }
      }
   }
}
