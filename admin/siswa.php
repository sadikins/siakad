

<?php 

	$siswa = array();

	$ambil = $koneksi->query("SELECT * FROM siswa LEFT JOIN tahun_ajaran ON siswa.id_tahun=tahun_ajaran.id_tahun");

	while($tiap = $ambil->fetch_assoc() )
	{
		$siswa[] = $tiap;
	}


 //  echo "<pre>";
 // print_r($siswa);
 //  echo "</pre>";

 ?>

<div class="d-flex justify-content-between">

	<h4 class="text-muted">Data Siswa <i class="bi bi-people-fill ps-2"></i></h4>

	<a href="index.php?halaman=siswa_tambah" class="btn btn-primary btn-sm py-2">Tambah Siswa <i class="bi bi-plus"></i> </a>
	
</div>

 <table class="table table-hover table-bordered mt-3">
 	<thead class="table-dark">
 		<tr>
 			<th>No</th>
 			<th>NIS</th>
 			<th>Nama Siswa</th>
 			<th>Jenis Kelamin</th>
 			<th>Alamat</th>
 			<th>Aksi</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($siswa as $key => $value): ?>
 			
 		<tr>
 			<td><?php echo $key + 1 ?></td>
 			<td><?php echo $value['induk_siswa'] ?></td>
 			<td><?php echo $value['nama_siswa'] ?></td>
 			<td><?php echo $value['kelamin_siswa'] ?></td>
 			<td><?php echo $value['alamat_siswa'] ?></td>
 			<td>
 				<a href="index.php?halaman=siswa_ubah&id=<?php echo $value['id_siswa'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
 				<a href="index.php?halaman=siswa_hapus&id=<?php echo $value['id_siswa'] ?>" class="btn btn-outline-danger btn-sm">Hapus</a>
 			</td>
 		</tr>
 		<?php endforeach ?>
 	</tbody>
 </table>

 


