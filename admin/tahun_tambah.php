


<h4 class="text-muted">Tambah Tahun Ajaran <i class="bi bi-cloud-upload-fill"></i></h4>

<form method="post">
	
	<div class="mt-3">
		<label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
		<input type="text" class="form-control" name="tahun_ajaran">

	</div>

	<button class="btn btn-primary my-3 py-2 " name="simpan">simpan data <i class="bi bi-arrow-right-circle-fill"></i></button>

</form>



<?php 

	if (isset($_POST['simpan'])) {


		$tahun = $_POST['tahun_ajaran'];

		$koneksi->query("INSERT INTO tahun_ajaran (tahun_ajaran) VALUES ('$tahun')");

		echo "<script>alert('data tersimpan')</script>";
		echo "<script>location='index.php?halaman=tahun'</script>";



	}
	


 ?>








