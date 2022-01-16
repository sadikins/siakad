
<div class="d-flex justify-content-between">
	
	<h4 class="text-muted">Data Guru <i class="bi bi-mortarboard-fill pe-2"></i></h4>

	<a href="index.php?halaman=guru_tambah" class="btn btn-primary btn-sm py-2">Tambah Guru <i class="bi bi-plus"></i></a>
</div>



	
<?php 

 $guru = array();

 $ambil = $koneksi->query("SELECT * FROM guru");

 while($tiap = $ambil->fetch_assoc())
 {
 	$guru[] = $tiap;
 }

 // echo "<pre>";
 // print_r($guru);
 // echo "</pre>";

 ?>

<div class="row">
	
<?php foreach ($guru as $key => $value): ?>

	<div class="col-3 my-3">
		<div class="card h-100">
			<img src="../assets/guru/crop/crop_<?php echo $value['foto_guru'] ?>" alt="" class="card-img-top">
			<div class="card-body">
				<h6 class="card-title"><?php echo $value['nama_guru'] ?></h6>
					<p>NIP: <?php echo $value['induk_guru'] ?></p>
					<a href="index.php?halaman=guru_ubah&id=<?php echo $value['id_guru'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
					<a href="index.php?halaman=guru_hapus&id=<?php echo $value['id_guru'] ?>" class="btn btn-outline-danger btn-sm">Hapus</a>
			</div>
		</div>
	</div>

<?php endforeach ?>
	
</div>


