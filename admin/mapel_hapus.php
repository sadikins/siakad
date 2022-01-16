<?php 

 $id_mapel = $_GET['id'];


 $koneksi->query("DELETE FROM mapel WHERE id_mapel='$id_mapel' ");


 echo"<script>alert('data telah dihapus') </script>";
 echo"<script>location='index.php?halaman=mapel' </script>";


 ?>