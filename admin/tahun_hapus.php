<?php 
	
	$id_tahun = $_GET['id'];

	$koneksi->query("DELETE FROM tahun_ajaran WHERE id_tahun='$id_tahun' ");

	    echo "<script>alert('data terhapus')</script>";
        echo "<script>location='index.php?halaman=tahun'</script>";


 ?>