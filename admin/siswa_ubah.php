<?php 


// Tahun
$tahun_ajaran = array();

$ambil = $koneksi->query("SELECT * FROM tahun_ajaran");

while ($tiap=$ambil->fetch_assoc()) {

	$tahun[]=$tiap;
}

	// echo "<pre>";
	// echo print_r($tahun);
	// echo "</pre>";


// Siswa
	$id_siswa = $_GET['id'];
	$ambil = $koneksi->query("SELECT * FROM siswa WHERE id_siswa=$id_siswa");

	$siswa = $ambil->fetch_assoc();

	// echo "<pre>";
	// echo print_r($siswa);
	// echo "</pre>";


 ?>

 <h4>Ubah Siswa <i class="bi bi-pencil-square ps-2"></i></h4>

 <div class="row">
 	<div class="container">
 		<div class="col-md-6">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="mt-3">
					<lable class="form-label">Tahun Ajaran</lable>
					<select name="tahun_ajaran" class="form-control">
						<option value="">Pilihan</option>
						<?php foreach ($tahun as $key => $value): ?>
							<option value="<?php echo $value['id_tahun'] ?>" <?php echo $siswa['id_tahun'] == $value['id_tahun'] ? 'selected' : '' ;  ?>><?php echo $value['tahun_ajaran'] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mt-3">
					<label for="induk_siswa" class="from-label">NIS</label>
					<input type="text" name="induk_siswa" class="form-control" value="<?php echo $siswa['induk_siswa'] ?>">
				</div>

				<div class="mt-3">
					<label for="password_siswa" class="form-label">Password</label>
					<input type="text" name="password_siswa" class="form-control">
					<i class="small text-primary">Kosongkan jika password tidak diubah</i>
				</div>

				<div class="mt-3">
					<label for="nama_siswa" class="form-label">Nama Siswa</label>
					<input type="text" name="nama_siswa" class="form-control" value="<?php echo $siswa['nama_siswa'] ?>">
				</div>

				<div class="mt-3">
					<label for="kelamin_siswa">Jenis Kelamin</label>
					<select name="kelamin_siswa" class="form-control">
						<option value="">Pilihan</option>
						<option value="Laki-laki" <?php echo $siswa['kelamin_siswa'] == 'Laki-laki' ? 'selected' : '' ; ?>>Laki-laki</option>
						<option value="Perempuan" <?php echo $siswa['kelamin_siswa'] == 'Perempuan' ? 'selected' : '' ; ?>>Perempuan</option>

					</select>
				</div>

				<div class="mt-4">
					<label for="foto_siswa" class="form-label">Foto</label> <br>
					<img src="../assets/siswa/crop/crop_<?php echo $siswa['foto_siswa'] ?> " alt="<?php echo $siswa['foto_siswa'] ?>" class='img-thumbnail'>
				</div>

				<div class="mt-3">
					<label for="foto_siswa" class="form-label">Ubah Foto</label>
					<input type="file" name="foto_siswa" class="form-control">
				</div>

				<div class="mt-3">
					<label for="alamat_siswa" class="form-label">Alamat</label>
					<textarea name="alamat_siswa" class="form-control" cols="30" rows="5"><?php echo $siswa['alamat_siswa'] ?></textarea>
				</div>

				<button type="submit" name="simpan" class="btn btn-primary btn-sm my-5 py-2"> simpan perubahan <i class="bi bi-arrow-right-circle-fill"></i></button>
			</form>

 		</div>
 	</div>
 </div>

 <?php 

// Jika tombol simpan ditekan
 if(isset($_POST['simpan'])) {

 	$tahun_ajaran 	= $_POST['tahun_ajaran'];
 	$induk_siswa 	= $_POST['induk_siswa'];
 	$password_siswa = sha1($_POST['password_siswa']);
 	$nama_siswa 	= $_POST['nama_siswa'];
 	$kelamin_siswa 	= $_POST['kelamin_siswa'];
 	$alamat_siswa 	= $_POST['alamat_siswa'];

 	// Foto
 	$namafoto 		= $_FILES['foto_siswa']['name'];
 	$lokasifoto 	= $_FILES['foto_siswa']['tmp_name'];


 	// jika ganti foto
 	if (!empty($lokasifoto)) {

 		// Manipulasi foto
	 	$namafoto = date('YmdHis').$namafoto;
	 	move_uploaded_file($lokasifoto, "../assets/siswa/".$namafoto);
	 	resize_and_crop("../assets/siswa/".$namafoto, "../assets/siswa/crop/crop_".$namafoto, 300, 300);


	 	if (!empty($_POST['password_siswa'])) {

	 		// Jika ganti password
	 		$koneksi->query("UPDATE siswa SET 
	 			induk_siswa		= '$induk_siswa',
	 			password_siswa	= '$password_siswa',
	 			nama_siswa		= '$nama_siswa',
	 			kelamin_siswa	= '$kelamin_siswa',
	 			alamat_siswa	= '$alamat_siswa',
	 			foto_siswa		= '$namafoto'
	 			WHERE id_siswa  = '$id_siswa' ");
	 	}else {

	 		// Jika tidak ganti password
	 		$koneksi->query("UPDATE siswa SET 
	 			induk_siswa		= '$induk_siswa',
	 			nama_siswa		= '$nama_siswa',
	 			kelamin_siswa	= '$kelamin_siswa',
	 			alamat_siswa	= '$alamat_siswa',
	 			foto_siswa		= '$namafoto'
	 			WHERE id_siswa  = '$id_siswa' ");
	 	}
	}else {
	 	
	 	if(!empty($_POST['password_siswa'])){
	 		
	 		// Jika tidak ganti foto tapi ganti password
	 		$koneksi->query("UPDATE siswa SET 
	 			induk_siswa		= '$induk_siswa',
	 			password_siswa	= '$password_siswa',
	 			nama_siswa		= '$nama_siswa',
	 			kelamin_siswa	= '$kelamin_siswa',
	 			alamat_siswa	= '$alamat_siswa'
	 			WHERE id_siswa  = '$id_siswa' ");


	 	}else{

	 		// Tidak ganti password dan foto
	 		$koneksi->query("UPDATE siswa SET 
	 			induk_siswa		= '$induk_siswa',
	 			nama_siswa		= '$nama_siswa',
	 			kelamin_siswa	= '$kelamin_siswa',
	 			alamat_siswa	= '$alamat_siswa'
	 			WHERE id_siswa  = '$id_siswa' ");

	 	}

	}

	 	

	 

	 	echo "<script>alert('data tersimpan')</script>";
		echo "<script>location='index.php?halaman=siswa'</script>";



	}

?>