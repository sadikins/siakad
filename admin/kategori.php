
<?php 

 $kategori = array();


 $ambil = $koneksi->query("SELECT * FROM Kategori");

 while ($tiap = $ambil->fetch_assoc()) {

 	$kategori[] = $tiap;
 }


 ?>

<h4 class="text-muted">Data Kategori Pelajaran <i class="bi bi-bookmark-plus ps-2"></i></h4>

<table class="table table-bordered table-hover mt-3">
	<thead class="table-dark">
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($kategori as $key => $value): ?>
			
		<tr>
			<td> <?php echo $key+1 ?> </td>
			<td><?php echo $value['nama_kategori'] ?> </td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>