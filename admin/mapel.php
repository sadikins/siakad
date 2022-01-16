
<?php 

 $mapel = array();


 $ambil = $koneksi->query("SELECT * FROM mapel LEFT JOIN kategori ON mapel.id_kategori=kategori.id_kategori");

 while ($tiap = $ambil->fetch_assoc()) {

 	$mapel[] = $tiap;
 }


 ?>

 <div class="d-flex justify-content-between">
	<h4 class="text-muted">Data Mata Pelajaran <i class="bi bi-journal-bookmark-fill ps-2"></i> </h4>

	<a href="index.php?halaman=mapel_tambah" class="btn btn-primary btn-sm py-2">Tambah Mata Pelajaran <i class="bi bi-plus"></i> </a>
 	
 </div>


<table class="table table-bordered table-hover mt-3">
	<thead class="table-dark">
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Nama Mata Pelajaran</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($mapel as $key => $value): ?>
			
		<tr>
			<td> <?php echo $key+1 ?> </td>
			<td><?php echo $value['nama_kategori'] ?> </td>
			<td><?php echo $value['nama_mapel'] ?> </td>
			<td>
				<a href="index.php?halaman=mapel_ubah&id=<?php echo $value['id_mapel'] ?>" class="btn btn-outline-warning btn-sm"> Ubah </a>
				<a href="index.php?halaman=mapel_hapus&id=<?php echo $value['id_mapel'] ?>" class="btn btn-outline-danger btn-sm"> Hapus </a>
			</td>
		</tr>				
		<?php endforeach ?>
	</tbody>
</table>


