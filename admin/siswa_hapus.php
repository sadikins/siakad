<?php 

	
	$id_siswa = $_GET['id'];


	$koneksi->query("DELETE FROM siswa WHERE id_siswa = '$id_siswa' ");


	echo "<script>alert('data terhapus')</script>";
	echo "<script>location='index.php?halaman=siswa'</script>";

 ?>