<?php 

$id = $_GET['id'];

$koneksi->query("DELETE FROM guru WHERE id_guru='$id'");

echo "<script>alert('data terhapus')</script>";
echo "<script>location='index.php?halaman=guru'</script>";

 ?>