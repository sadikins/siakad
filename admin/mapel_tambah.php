
<?php 
	// Kategori
	$kategori = array();


	$ambil = $koneksi->query("SELECT * FROM kategori");

	while($tiap_kategori=$ambil->fetch_assoc()){

		$kategori[]=$tiap_kategori;
	}

	// echo "<pre>";
	// echo print_r($kategori);
	// echo "</pre>";

	// Mapel

	$mapel = array();


	$ambil = $koneksi->query("SELECT * FROM mapel");

	while ($tiap_mapel=$ambil->fetch_assoc()) {

		$mapel[] = $tiap_mapel;
	}


	// echo "<pre>";
	// echo print_r($mapel);
	// echo "</pre>";


 ?>




<h4>Tambah Mata Pelajaran <i class="bi bi-cloud-upload-fill ps-2"></i>  </h4>

<div class="row">
	<div class="container">
		<div class="col-6">
			<form method="post">
				<div class="mt-3">
					<label for="kategori" class="form-label">Kategori</label>
					<select name="kategori" class="form-control">
						<option value="">Pilih</option>
						<?php foreach ($kategori as $key => $value): ?>
						<option value="<?php echo $value['id_kategori'] ?>"><?php 	echo $value['nama_kategori'] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mt-3">
					<label for="mapel" class="form-label">Nama Mata Pelajaran</label>
					<input type="text" name="mapel" class="form-control">
				</div>

				<button type="submit" name="simpan" class="btn btn-sm btn-primary my-5 py-2">Simpan Data <i class="bi bi-arrow-right-circle-fill"></i></button>
			</form>
		</div>
	</div>
</div>


<?php 	

	if (isset($_POST['simpan'])) {

		$kategori = $_POST['kategori'];
		$mapel 	  = $_POST['mapel'];

		$koneksi->query("INSERT INTO mapel (id_kategori, nama_mapel) VALUES ( '$kategori', '$mapel')");

		echo "<script>alert('data tersimpan')</script>";
		echo "<script>location='index.php?halaman=mapel'</script>";
	} 
?>