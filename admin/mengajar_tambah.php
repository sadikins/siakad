<?php 

// Mapel

$mapel = array();

$ambil = $koneksi->query("SELECT * FROM mapel");

while ($tiap_mapel=$ambil->fetch_assoc()) {
	
	$mapel[] = $tiap_mapel;
}

// Kelas

$kelas= array();


$ambil = $koneksi->query("SELECT * FROM kelas");

while($tiap_kelas= $ambil->fetch_assoc())
{
	$kelas[]=$tiap_kelas;
}	

// Guru 
 $guru = array();

 $ambil = $koneksi->query("SELECT * FROM guru");

 while($tiap_guru = $ambil->fetch_assoc())
 {
 	$guru[] = $tiap_guru;
 }

 // echo "<pre>";
 // print_r($guru);
 // echo "</pre>";



//  Data mengajar
 $mengajar = array();


 $ambil = $koneksi->query("SELECT * FROM mengajar 
 						   LEFT JOIN guru ON mengajar.id_guru=guru.id_guru
 						   LEFT JOIN mapel ON mengajar.id_mapel=mapel.id_mapel 
 						   LEFT JOIN kategori ON mapel.id_kategori=kategori.id_kategori
 						   LEFT JOIN kelas ON mengajar.id_kelas=kelas.id_kelas
 						   LEFT JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan
 						   LEFT JOIN tahun_ajaran ON kelas.id_tahun=tahun_ajaran.id_tahun ");

while ($tiap_mengajar= $ambil->fetch_assoc()) {

	$mengajar[] = $tiap_mengajar;
}


// echo "<pre>";
// echo print_r($mengajar);
// echo "</pre>";

 ?>

<h4>Tambah Mengajar <i class="bi bi-cloud-upload-fill ps-2"></i> </h4>

<div class="row">
	<div class="container">
		<div class="col-6">
			<form method="post">
				<div class="mt-3">
					<label for="nama_guru" class="form-label">Guru</label>
					<select name="guru" class="form-control" required>
						<option value="">Pilih</option>
						<?php foreach ($guru as $key => $value): ?>
							
						<option value="<?php echo $value['id_guru'] ?>"><?php echo $value['nama_guru'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mt-3">
					<label for="kelas" class="form-label">Kelas</label>
					<select name="kelas" class="form-control" required>
						<option value="">Pilih</option>

						<?php foreach ($kelas as $key => $value): ?>
							<option value="<?php echo $value['id_kelas'] ?>"><?php echo $value['nama_kelas'] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mt-3">
					<label for="mapel" class="form-label">Mata Pelajaran</label>
					<select name="mapel" class="form-control" required>
						<option value="">Pilih</option>

						<?php foreach ($mapel as $key => $value): ?>
							<option value="<?php echo $value['id_mapel'] ?>"><?php echo $value['nama_mapel'] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mt-3">
					<label for="kkm" class="form-label">KKM</label>
					<input type="number" name="kkm" class="form-control">
				</div>
				<div class="mt-3">
					<label for="semester" class="form-label">Semester</label>
					<select name="semester" class="form-control">
						<option value="">Pilihan</option>
						<option value="Genap">Genap</option>
						<option value="Ganjil">Ganjil</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary btn-sm my-5 py-2" name="simpan">Simpan Data <i class="bi bi-arrow-right-circle-fill"></i></button>

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


		$koneksi->query("INSERT INTO mengajar (id_guru,id_kelas,id_mapel,kkm,semester) VALUES ('$guru','$kelas', '$mapel', '$kkm', '$semester') ");

		echo "<script>alert('data tersimpan')</script>";
		echo "<script>location='index.php?halaman=mengajar'</script>";


	}


 ?>