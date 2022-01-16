<?php 

 $kelas = array();


 $ambil = $koneksi->query("SELECT * FROM kelas 
 						   LEFT JOIN tahun_ajaran ON kelas.id_tahun=tahun_ajaran.id_tahun
 						   LEFT JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");

 while ($tiap = $ambil->fetch_assoc()) {

 	$kelas[] = $tiap;
 }

// echo "<pre>";
// echo print_r($kelas);
// echo "</pre>";

 ?>


<div class="d-flex justify-content-between">
	
	<h4 class="text-muted">Data Kelas <i class="bi bi-door-open-fill ps-2"></i></h4>

	<a href="index.php?halaman=kelas_tambah" class="btn btn-sm py-2 btn-primary">Tambah data <i class="bi bi-plus"></i></a>
</div>

<table class="table table-bordered table-hover mt-3">
	<thead class="table-dark">
		<tr>
			<th>No</th>
			<th>Jurusan</th>
			<th>Tahun Ajaran</th>
			<th>Nama Kelas</th>
			<th>Ruang Kelas</th>
			<th>Jenjang</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($kelas as $key => $value): ?>
			
		<tr>
			<td>  <?php echo $key+1 ?></td>
			<td> <?php echo $value['nama_jurusan'] ?> </td>
			<td> <?php echo $value['tahun_ajaran'] ?> </td>
			<td> <?php echo $value['nama_kelas'] ?> </td>
			<td> <?php echo $value['ruang_kelas'] ?> </td>
			<td> <?php echo $value['jenjang_kelas'] ?> </td>
			<td>
				<a href="index.php?halaman=siswa_kelas&id=<?php echo $value['id_kelas'] ?>" class="btn btn-outline-info btn-sm"> Siswa </a>
				<a href="index.php?halaman=kelas_ubah&id=<?php echo $value['id_kelas'] ?>" class="btn btn-outline-warning btn-sm"> Ubah </a>
				<a href="index.php?halaman=kelas_hapus&id=<?php echo $value['id_kelas'] ?>" class="btn btn-outline-danger btn-sm"> Hapus </a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

