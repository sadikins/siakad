<?php 

	$id_kelas = $_GET['id'];


	$koneksi->query("DELETE FROM kelas WHERE id_kelas='$id_kelas' ");

	echo "<script> alert('data telah dihapus') </script>";
	echo "<script> location='index.php?halaman=kelas' </script>";


 ?>