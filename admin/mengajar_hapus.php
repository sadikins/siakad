<?php 
	
	$id_mengajar = $_GET['id'];


	$ambil= $koneksi->query("DELETE FROM mengajar WHERE id_mengajar='$id_mengajar' ");

	echo "<script>alert('data terhapus')</script>";
    echo "<script>location='index.php?halaman=mengajar'</script>";



 ?>