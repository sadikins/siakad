
<?php 

	$jurusan = array();


	$ambil = $koneksi->query("SELECT * FROM jurusan");

	while ($tiap = $ambil->fetch_assoc()) {

		$jurusan[]  = $tiap;
	}
// echo "<pre>";
// echo print_r($jurusan);
// echo "</pre>";

 ?>


<div class="d-flex justify-content-between">
	<h4 class="text-muted">Data Jurusan <i class="bi bi-diagram-3-fill ps-2"></i></h4>
	<a href="index.php?halaman=jurusan_tambah" class="btn btn-primary btn-sm py-2">Tambah Jurusan <i class="bi bi-plus"></i> </a>
</div>

<div class="col-md-12">
<table class="table table-bordered table-hover mt-3">
	<thead class="table-dark">
		<tr>
			<th>No</th>
			<th>Nama Jurusan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($jurusan as $key => $value): ?>
	
		<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo $value['nama_jurusan'] ?></td>
			<td>
				<a href="index.php?halaman=jurusan_ubah&id=<?php echo $value['id_jurusan'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
				<a href="index.php?halaman=jurusan_hapus&id=<?php echo $value['id_jurusan'] ?>" class="btn btn-outline-danger btn-sm">Hapus</a>
			</td>
		</tr>
<?php endforeach ?>
	</tbody>
</table>

</div>