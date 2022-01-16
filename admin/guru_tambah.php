<h4 class="text-muted">Tambah Guru <i class="bi bi-cloud-upload-fill"></i></h4>
<div class="row mt-3">
	<div class="col-md-6">
		

<form action="" method="POST" enctype="multipart/form-data">
	<div class="mb-3">
		<label for="NIP">NIP</label>
		<input type="text" class="form-control" name="nip" required>
	</div>
	<div class="mb-3">
		<label for="password">Password</label>
		<input type="text" class="form-control" name="password" required>
	</div>
	<div class="mb-3">
		<label for="nama">Nama</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="mb-3">
		<label for="jenis_kelamin">Jenis kelamin</label>
		<select class="form-control" name="kelamin_guru">
			<option value="">Pilih</option>
			<option value="Laki_laki">Laki laki</option>
			<option value="Perempuan">Perempuan</option>
		</select>
	</div>
	<div class="mb-3">
		<label for="alamat">Alamat</label>
		<textarea name="alamat" class="form-control" id="" cols="10" rows="3"></textarea>
	</div>
	<div class="mb-3">
		<label for="foto">Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button type="submit" class="btn btn-primary btn-sm py-2 mt-3" name="simpan">Simpan data <i class="bi bi-arrow-right-circle-fill"></i></button>
</form>

	</div>
</div>

<?php 

if (isset($_POST['simpan'])) {

	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	
	$namafoto = date("YmdHis").$namafoto;

	move_uploaded_file($lokasifoto, "../assets/guru/".$namafoto);

	resize_and_crop("../assets/guru/".$namafoto, "../assets/guru/crop/crop_".$namafoto, 300, 300);

	$ps 	= sha1($_POST['password']);
	$nip 	= $_POST['nip'];
	$nama 	= $_POST['nama'];
	$jk 	= $_POST['kelamin_guru'];
	$alamat = $_POST['alamat'];


	$koneksi->query("INSERT INTO guru (induk_guru, password_guru, nama_guru, kelamin_guru, alamat_guru, foto_guru) VALUES('$nip', '$ps','$nama','$jk','$alamat','$namafoto') ");

	echo "<script>alert('data tersimpan')</script>";
	echo "<script>location='index.php?halaman=guru'</script>";
}

 ?>