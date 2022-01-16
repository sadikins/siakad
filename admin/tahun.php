

<?php 

	$tahun = array();

	$ambil = $koneksi->query("SELECT * FROM tahun_ajaran");

	while($tiap = $ambil->fetch_assoc() )
	{
		$tahun[] = $tiap;
	}


 //  echo "<pre>";
 // print_r($tahun);
 //  echo "</pre>";

 ?>

 <div class="d-flex justify-content-between">
 	<h4 class="text-muted">Data Tahun <i class="bi bi-calendar2-day pe-2"></i></h4>
 	<a href="index.php?halaman=tahun_tambah" class="btn btn-primary btn-sm py-2">Tambah Tahun <i class="bi bi-plus"></i> </a>
 </div>


 <table class="table table-bordered table-hover mt-3">
 	<thead class="table-dark">
 		<tr>
 			<th>No</th>
 			<th>Tahun Ajaran</th>
 			<th>Aksi</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($tahun as $key => $value): ?>
 			
 		<tr>
 			<td><?php echo $key + 1 ?></td>
 			<td><?php echo $value['tahun_ajaran'] ?></td>
 			<td>
 				<a href="index.php?halaman=tahun_ubah&id=<?php echo $value['id_tahun'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
 				<a href="index.php?halaman=tahun_hapus&id=<?php echo $value['id_tahun'] ?>" class="btn btn-outline-danger btn-sm">Hapus</a>
 			</td>
 		</tr>
 		<?php endforeach ?>
 	</tbody>
 </table>


