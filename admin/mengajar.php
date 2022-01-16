<?php 


 $mengajar = array();


 $ambil = $koneksi->query("SELECT * FROM mengajar 
 						   LEFT JOIN guru ON mengajar.id_guru=guru.id_guru
 						   LEFT JOIN mapel ON mengajar.id_mapel=mapel.id_mapel 
 						   LEFT JOIN kategori ON mapel.id_kategori=kategori.id_kategori
 						   LEFT JOIN kelas ON mengajar.id_kelas=kelas.id_kelas
 						   LEFT JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan
 						   LEFT JOIN tahun_ajaran ON kelas.id_tahun=tahun_ajaran.id_tahun ");

while ($tiap= $ambil->fetch_assoc()) {

	$mengajar[] = $tiap;
}


// echo "<pre>";
// echo print_r($mengajar);
// echo "</pre>";

 ?>
<div class="d-flex justify-content-between">
	
<h4 class="text-muted">Data Mengajar <i class="bi bi-easel ps-2"></i> 	</h4>
<a href="index.php?halaman=mengajar_tambah" class="btn btn-primary btn-sm py-2"> Tambah Mengajar <i class="bi bi-plus"></i> </a>
</div>

<table class="table table-bordered table-hover mt-3">
	<thead class="table-dark">
		<tr>
			<th>No</th>
			<th>Nama Guru</th>
			<th>Mata Pelajaran</th>
			<th>Kelas</th>
			<th>KKM</th>
			<th>Semeseter</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($mengajar as $key => $value): ?>
			
		<tr>
			<td> <?php echo $key+1 ?> </td>
			<td> <?php echo $value['nama_guru'] ?> <br> <i class="small"> <?php echo $value['induk_guru'] ?> </i></td>
			<td> <?php echo $value['nama_mapel'] ?> <br> <i class="small"> <?php echo $value['nama_kategori'] ?> </i></td>
			<td> <?php echo $value['nama_kelas'] ?> <br>  
				<i class="small"> <?php echo $value['nama_jurusan'] ?> </i> <br>
				<i class="small"> <?php echo $value['ruang_kelas'] ?> </i> <br>
				<i class="small"> <?php echo $value['tahun_ajaran'] ?> </i>
			</td>
			<td> <?php echo $value['kkm'] ?></td>
			<td> <?php echo $value['semester'] ?></td>
			<td>
				<a href="index.php?halaman=mengajar_ubah&id=<?php echo $value['id_mengajar'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
				<a href="index.php?halaman=mengajar_hapus&id=<?php echo $value['id_mengajar'] ?>" class="btn btn-outline-danger btn-sm">Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>