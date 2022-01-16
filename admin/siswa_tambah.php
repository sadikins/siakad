<?php 

	$tahun = array();

	$ambil = $koneksi->query("SELECT * FROM tahun_ajaran");

	while ($tiap= $ambil->fetch_assoc()) {
		$tahun[] = $tiap;
	}

	// echo "<pre>";
	// echo print_r($tahun);
	// echo "</pre>";


 ?>


<h4 class="text-muted">Tambah Siswa <i class="bi bi-cloud-upload-fill"></i></h4>


<div class="row mt-3">
	<div class="col-md-6">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
				<select name="id_tahun" class="form-control" required>
					<option value="">Pilih Tahun</option>
					<?php foreach ($tahun as $key => $value): ?>
						
					<option value="<?php echo $value['id_tahun'] ?>"><?php echo $value['tahun_ajaran'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="mb-3">
				<label for="induk_siswa" class="form-label">NIS</label>
				<input type="text" class="form-control" name="induk_siswa" required>
			</div>
			<div class="mb-3">
				<label for="password_siswa" class="form-label">Password</label>
				<input type="password" class="form-control" name="password_siswa" required>
			</div>
			<div class="mb-3">
				<label for="nama_siswa" class="form-label">Nama</label>
				<input type="text" name="nama_siswa" class="form-control" required>
			</div>

			<div class="mb-3">
				<label for="kelamin_siswa" class="form-label">Jenis Kelamin</label>
				<select name="kelamin_siswa" id="" class="form-control" required>
					<option value="">Pilihan</option>
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="foto_siswa" class="form-label">Foto</label>
				<input type="file" name="foto_siswa" class="form-control" required>
			</div>
			<div class="mb-3">
				<label for="alamat_siswa" class="form-label">
					Alamat
				</label>
				<textarea name="alamat_siswa" class="form-control" cols="30" rows="3" required></textarea>
			</div>

			<button class="btn btn-primary my-3 py-2 " name="simpan">simpan data <i class="bi bi-arrow-right-circle-fill"></i></button>
		</form>
	</div>
</div>

<?php 


if (isset($_POST['simpan'])) {

	$namafoto = $_FILES['foto_siswa']['name'];
	$lokasifoto = $_FILES['foto_siswa']['tmp_name'];
	
	$namafoto = date("YmdHis").$namafoto;

	move_uploaded_file($lokasifoto, "../assets/siswa/".$namafoto);

	resize_and_crop("../assets/siswa/".$namafoto, "../assets/siswa/crop/crop_".$namafoto, 300, 300);


	$id_tahun 		= $_POST['id_tahun'];
	$induk_siswa 	= $_POST['induk_siswa'];
	$password_siswa = sha1($_POST['password_siswa']);
	$nama_siswa 	= $_POST['nama_siswa'];
	$kelamin_siswa 	= $_POST['kelamin_siswa'];
	// $foto_siswa 	= $_POST['foto_siswa'];
	$alamat_siswa 	= $_POST['alamat_siswa'];

	$koneksi->query("INSERT INTO siswa (id_tahun, induk_siswa, password_siswa, nama_siswa, kelamin_siswa, foto_siswa, alamat_siswa) VALUES ('$id_tahun','$induk_siswa', '$password_siswa','$nama_siswa','$kelamin_siswa','$namafoto','$alamat_siswa') ");

	echo "<script>alert('data tersimpan')</script>";
	echo "<script>location='index.php?halaman=siswa'</script>";

}



 ?>