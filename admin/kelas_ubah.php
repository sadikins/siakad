<?php 
	// Tahun
	$tahun = array();

	$ambil = $koneksi->query("SELECT * FROM tahun_ajaran");

	while($tiap = $ambil->fetch_assoc() )
	{
		$tahun[] = $tiap;
	}


 //  echo "<pre>";
 // print_r($tahun);
 //  echo "</pre>";

	// Jurusan
	$jurusan = array();


	$ambil = $koneksi->query("SELECT * FROM jurusan");

	while ($tiap = $ambil->fetch_assoc()) {

		$jurusan[]  = $tiap;
	}

	// echo "<pre>";
	// echo print_r($jurusan);
	// echo "</pre>";


	// Id Kelas
	$id_kelas = $_GET['id'];

	$ambil = $koneksi->query("SELECT * FROM kelas WHERE id_kelas='$id_kelas'");

	$kelas= $ambil->fetch_assoc();

	// echo "<pre>";
	// echo print_r($kelas);
	// echo "</pre>";




 ?>


<h4 class="text-muted">Ubah Kelas <i class="bi bi-pencil-square"></i></h4>

<div class="row mt-3">
	<div class="col-4">
		<form action="" method="post">
			<label for="tahun_ajaran" class="mt-3 mb-1">Tahun Ajaran</label>
			<select name="id_tahun" class="form-control" id="tahun_ajaran">
				<option value="" > <span class="text-muted"> Pilih tahun </span> </option>
				<?php foreach ($tahun as $key => $value): ?>
					
				<option value="<?php echo $value['id_tahun'] ?>" <?php echo $kelas['id_tahun'] == $value['id_tahun'] ? 'selected' : '' ?> ><?php echo $value['tahun_ajaran'] ?></option>
				<?php endforeach ?>
			
			</select>
			<label for="jurusan" class="mt-3 mb-1">Jurusan</label>
			<select name="id_jurusan" class="form-control" id="jurusan">
				<option value=""> Pilih jurusan  </option>
				<?php foreach ($jurusan as $key => $value): ?>
					
				<option value="<?php echo $value['id_jurusan'] ?>" <?php echo $kelas['id_jurusan'] == $value['id_jurusan'] ? 'selected' : '' ?>><?php echo $value['nama_jurusan'] ?></option>
				<?php endforeach ?>
			</select>

			<label for="nama_kelas" class="mt-3 mb-1">Nama Kelas</label>
			<input type="text" name="nama_kelas" class="form-control" value="<?php echo $kelas['nama_kelas'] ?>">

			<label for="ruang_kelas" class="mt-3 mb-1">Ruang</label>
			<input type="text" name="ruang_kelas" class="form-control" value="<?php echo $kelas['ruang_kelas'] ?>">

			<label for="jenjang_kelas" class="mt-3 mb-1">Jenjang</label>
			<select name="jenjang_kelas" class="form-control" id="jenjang_kelas">
				<option value=""> Pilih jenjang kelas </option>
				<option value="10" <?php echo $kelas['jenjang_kelas'] == 10 ? 'selected' : '' ?>>X (sepuluh) </option>
				<option value="11" <?php echo $kelas['jenjang_kelas'] == 11 ? 'selected' : '' ?>>XI (sebelas)</option>
				<option value="12" <?php echo $kelas['jenjang_kelas'] == 12 ? 'selected' : '' ?>>XII (dua belas)</option>
			</select>

			<button class="btn btn-primary mt-3" name="simpan">Simpan</button>
	
		</form>
	</div>
</div>


<?php 
	
	if(isset($_POST['simpan'])){

		$id_tahun 	= $_POST['id_tahun'];
		$id_jurusan = $_POST['id_jurusan'];
		$nama 		= $_POST['nama_kelas'];
		$ruangan 	= $_POST['ruang_kelas'];
		$jenjang 	= $_POST['jenjang_kelas'];

		$koneksi->query("UPDATE kelas SET id_tahun='$id_tahun', id_jurusan='$id_jurusan', nama_kelas='$nama', ruang_kelas='$ruangan', jenjang_kelas='$jenjang' WHERE id_kelas='$id_kelas' ");

	echo "<script>alert('data tersimpan')</script>";
	echo "<script>location='index.php?halaman=kelas'</script>";

	}




 ?>