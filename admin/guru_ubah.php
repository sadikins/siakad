<?php 

	$id_guru = $_GET['id'];
	$ambil= $koneksi->query("SELECT * FROM guru WHERE id_guru=$id_guru");
	$guru = $ambil->fetch_assoc();

// echo "<pre>";
// echo print_r($guru);
// echo "</pre>";

 ?>




<h4 class="text-muted">Ubah Data Guru <i class="bi bi-pencil-square"></i></h4>
<div class="row mt-3">
	<div class="col-md-6">
		

<form class="my-5" action="" method="POST" enctype="multipart/form-data">
	<div class="mb-3">
		<label for="NIP">NIP</label>
		<input type="text" class="form-control" name="nip" value="<?php echo $guru['induk_guru']  ?>" required>
	</div>
	<div class="mb-3">
		<label for="password">Password</label>
		<input type="text" class="form-control" name="password">
		<i class="small text-primary">Kosongkan jika password tidak diubah</i>
	</div>
	<div class="mb-3">
		<label for="nama">Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $guru['nama_guru']  ?>" required>
	</div>
	<div class="mb-3">
		<label for="jenis_kelamin">Jenis_kelamin</label>
		<select class="form-control" name="kelamin_guru">
			<option value="">Pilih</option>
			<option value="Laki_laki" <?php echo $guru['kelamin_guru'] == 'Laki_laki' ? 'selected' : ''; ?>>Laki laki</option>
			<option value="Perempuan" <?php echo $guru['kelamin_guru'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
		</select>
	</div>
	<div class="mb-3">
		<label for="alamat">Alamat</label>
		<textarea name="alamat" class="form-control" id="" cols="10" rows="3"><?php echo $guru['alamat_guru']  ?></textarea>
	</div>
	<div class="mb-3">
		<label for="foto">Foto Lama</label> <br>
		<img src="../assets/guru/crop/crop_<?php echo $guru['foto_guru']  ?>" alt="<?php echo $guru['nama_guru']  ?>">
	</div>
	<div class="mb-3">
		<label for="foto">Foto</label>
		<input type="file" class="form-control" name="foto" value="<?php echo $guru['foto_guru']  ?>">
	</div>
	<button type="submit" class="btn btn-primary mt-3" name="simpan">Simpan</button>
</form>

	</div>
</div>

<?php 

if (isset($_POST['simpan'])) {

	$ps 	= sha1($_POST['password']);
	$nip 	= $_POST['nip'];
	$nama 	= $_POST['nama'];
	$jk 	= $_POST['kelamin_guru'];
	$alamat = $_POST['alamat'];

	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];

	// Jika update Foto 
	if (!empty($lokasifoto)) {
		
		// Edit Foto
		$namafoto = date("YmdHis").$namafoto;
		move_uploaded_file($lokasifoto, "../assets/guru/".$namafoto);
		resize_and_crop("../assets/guru/".$namafoto, "../assets/guru/crop/crop_".$namafoto, 300, 300);

		// Jika password diganti & ganti foto
		if (!empty($_POST['password'])) 
		{
			
			$koneksi->query("UPDATE guru SET 
					induk_guru		='$nip',
					password_guru	='$ps',
					nama_guru		='$nama',
					kelamin_guru	='$jk',
					alamat_guru		='$alamat',
					foto_guru		='$namafoto' WHERE id_guru='$id_guru' ");
		}else{

			// Jika tidak ganti password 
			$koneksi->query("UPDATE guru SET 
					induk_guru='$nip',
					nama_guru='$nama',
					kelamin_guru='$jk',
					alamat_guru='$alamat',
					foto_guru='$namafoto' WHERE id_guru='$id_guru' ");
		}
	}else{

		// Jika Foto tidak diganti tapi ganti password
		if(!empty($_POST['password'])){
			$koneksi->query("UPDATE guru SET 
					induk_guru='$nip',
					password_guru='$ps',
					nama_guru='$nama',
					kelamin_guru='$jk',
					alamat_guru='$alamat'WHERE id_guru='$id_guru' ");

		// Tanpa Foto & Password 
		}else{
			$koneksi->query("UPDATE guru SET 
					induk_guru='$nip',
					nama_guru='$nama',
					kelamin_guru='$jk',
					alamat_guru='$alamat'WHERE id_guru='$id_guru' ");

		}
	}



	echo "<script>alert('data tersimpan')</script>";
	echo "<script>location='index.php?halaman=guru'</script>";
}

 ?>