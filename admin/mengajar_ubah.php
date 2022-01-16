 

 <?php 

 	$id_mengajar = $_GET['id'];

 	$ambil= $koneksi->query("SELECT * FROM mengajar WHERE id_mengajar='$id_mengajar' ");

 	$mengajar= $ambil->fetch_assoc();


 // 	echo "<pre>";
	// echo print_r($mengajar);
	// echo "</pre>";

	// guru
	$guru = array();

	$ambil = $koneksi->query("SELECT * FROM guru");

	while ($tiap_guru= $ambil->fetch_assoc()) {

		$guru[]=$tiap_guru;
	}

	// echo "<pre>";
	// echo print_r($guru);
	// echo "</pre>";

	// mapel
	$mapel = array();

	$ambil = $koneksi->query("SELECT * FROM mapel");

	while ($tiap_mapel=$ambil->fetch_assoc()) {

		$mapel[] = $tiap_mapel;		
	}


	// echo "<pre>";
	// echo print_r($mapel);
	// echo "</pre>";

	// Kelas

	$kelas= array();

	$ambil = $koneksi->query("SELECT * FROM kelas");

	while($tiap_kelas=$ambil->fetch_assoc())
	{
		$kelas[]=$tiap_kelas;
	}


	// echo "<pre>";
	// echo print_r($kelas);
	// echo "</pre>";




  ?>


 <h4>Ubah Mengajar <i class="bi bi-pencil-square ps-2"></i></h4>

 <div class="row">
	<div class="container">
		<div class="col-6">
			<form method="post">
				<div class="mt-3">
					<label for="nama_guru" class="form-label">Guru</label>
					<select name="guru" class="form-control" required>
						<option value="">Pilih</option>
						<?php foreach ($guru as $key => $value): ?>
							
						<option value="<?php echo $value['id_guru']?>" <?php echo $mengajar['id_guru'] == $value['id_guru'] ? 'selected' : ''; ?>><?php echo $value['nama_guru'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mt-3">
					<label for="kelas" class="form-label">Kelas</label>
					<select name="kelas" class="form-control" required>
						<option value="">Pilih</option>

						<?php foreach ($kelas as $key => $value): ?>
							<option value="<?php echo $value['id_kelas'] ?>" <?php echo $mengajar['id_kelas'] == $value['id_kelas'] ? 'selected' : '' ?>><?php echo $value['nama_kelas'] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mt-3">
					<label for="mapel" class="form-label">Mata Pelajaran</label>
					<select name="mapel" class="form-control" required>
						<option value="">Pilih</option>

						<?php foreach ($mapel as $key => $value): ?>
							<option value="<?php echo $value['id_mapel'] ?>" <?php echo $mengajar['id_mapel']== $value['id_mapel'] ? 'selected' : '' ?>><?php echo $value['nama_mapel'] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mt-3">
					<label for="kkm" class="form-label">KKM</label>
					<input type="text" name="kkm" class="form-control" value="<?php echo $mengajar['kkm'] ?>">
				</div>
				<div class="mt-3">
					<label for="semester" class="form-label">Semester</label>
					<select name="semester" class="form-control">
						<option value="">Pilihan</option>
						<option value="Genap" <?php echo $mengajar['semester'] == 'Genap' ? 'selected' : ''  ?>>Genap</option>
						<option value="Ganjil" <?php echo $mengajar['semester'] == 'Ganjil' ? 'selected' : ''  ?>>Ganjil</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary btn-sm my-5 py-2" name="simpan">Edit Data <i class="bi bi-arrow-right-circle-fill ps-2"></i></button>

			</form>
		</div>
	</div>
</div>


<?php 

	if(isset($_POST['simpan'])) {

		$guru 		= $_POST['guru'];
		$kelas 		= $_POST['kelas'];
		$mapel 		= $_POST['mapel'];
		$kkm 		= $_POST['kkm'];
		$semester   = $_POST['semester'];


		$koneksi->query("UPDATE mengajar SET id_guru='$guru',id_kelas='$kelas', id_mapel='$mapel',kkm='$kkm',semester='$semester' wHERE id_mengajar='$id_mengajar' ");

		echo "<script>alert('data tersimpan')</script>";
		echo "<script>location='index.php?halaman=mengajar'</script>";


	}


 ?>