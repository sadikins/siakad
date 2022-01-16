<?php 
	// siswa
	$id_siswakelas = $_GET['id'];
	$semester = $_GET['semester'];

	$ambil= $koneksi->query("SELECT * FROM siswa_kelas 
			LEFT JOIN kelas ON siswa_kelas.id_kelas=kelas.id_kelas
			LEFT JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan
			LEFT JOIN tahun_ajaran ON kelas.id_tahun=tahun_ajaran.id_tahun
			LEFT JOIN siswa ON siswa_kelas.id_siswa=siswa.id_siswa
			WHERE id_siswakelas='$id_siswakelas' ");

	$siswa = $ambil->fetch_assoc();

	$id_kelas=$siswa['id_kelas'];

	// Mapel
	$mapel= array();
	$ambil = $koneksi->query("SELECT * FROM mengajar 
		LEFT JOIN guru ON mengajar.id_guru=guru.id_guru
		LEFT JOIN mapel ON mengajar.id_mapel=mapel.id_mapel
		LEFT JOIN kategori ON mapel.id_kategori=kategori.id_kategori
		WHERE id_kelas='$id_kelas' ");

	while ($tiap=$ambil->fetch_assoc()) {
		// mengajar
		$id_mengajar = $tiap['id_mengajar'];

		$jupuk = $koneksi->query("SELECT * FROM nilai 
			WHERE id_mengajar='$id_mengajar' AND id_siswakelas='$id_siswakelas' ");

		$tiap['nilai'] = $jupuk->fetch_assoc();

		$mapel[]=$tiap;
		// code...
	}


	// echo "<pre>";
	// echo print_r($siswa);
	// echo print_r($mapel);
	// echo "</pre>";




 ?>

 <div class="row">
 	<div class="col-6">
 		<table class="table table-bordered table-hover">
 			<tr class="table-light">
 				<td >Tahun Ajaran</td>
 				<td>: <?php echo $siswa['tahun_ajaran'] ?></td>
 			</tr>
 			<tr>
 				<td>Semester</td>
 				<td>: <?php echo $semester ?></td>
 			</tr>
 			<tr>
 				<td>Kelas</td>
 				<td>: <?php echo $siswa['nama_kelas'] ?></td>
 			</tr>
 			<tr>
 				<td>Jurusan</td>
 				<td>: <?php echo $siswa['nama_jurusan'] ?></td>
 			</tr>
 			<tr>
 				<td>Siswa</td>
 				<td>: <?php echo $siswa['induk_siswa'] ." ".$siswa['nama_siswa'] ?></td>
 			</tr>
 		</table>
 	</div>
 </div>

<div class="table-responsive">
	

 <table class="table table-hover mt-5">
 	<thead class="table-dark">
 		<tr>
	 		<th>No</th>
	 		<th>Mata Pelajaran</th>
	 		<th>Guru</th>
	 		<th>KKM</th>
	 		<th>NH1</th>
	 		<th>NH2</th>
	 		<th>NH3</th>
	 		<th>NH4</th>
	 		<th>NH5</th>
	 		<th>NH6</th>
	 		<th>NH7</th>
	 		<th>NH8</th>
	 		<th>RPH</th>
	 		<th>PTS</th>
	 		<th>PAS</th>
	 		<th>HPAP</th>
	 		<th>PREP</th>
	 		<th>K1</th>
	 		<th>K2</th>
	 		<th>K3</th>
	 		<th>K4</th>
	 		<th>K5</th>
	 		<th>K6</th>
	 		<th>K7</th>
	 		<th>K8</th>
	 		<th>HPAK</th>
	 		<th>PREK</th>
 			
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($mapel as $key => $value): ?>
 			
 		<tr>
 			<td> <?php echo $key+1  ?></td>
 			<td> <?php echo $value['nama_kategori']  ?><br> <?php echo $value['nama_mapel'] ?></td>
 			<td> <?php echo $value['induk_guru']  ?> <br><?php echo $value['nama_guru'] ?></td>
 			<td> <?php echo $value['kkm'] ?> </td>
 			<?php if (!empty($value['nilai'])): ?>
 				
	 		<td> <?php echo $value['nilai']['h1'] ?> </td>
	 		<td> <?php echo $value['nilai']['h2'] ?> </td>
 			<td> <?php echo $value['nilai']['h3'] ?> </td>
	 		<td> <?php echo $value['nilai']['h4'] ?> </td>
	 		<td> <?php echo $value['nilai']['h5'] ?> </td>
	 		<td> <?php echo $value['nilai']['h6'] ?> </td>
	 		<td> <?php echo $value['nilai']['h7'] ?> </td>
	 		<td> <?php echo $value['nilai']['h8'] ?> </td>
	 		<td> <?php echo $value['nilai']['rph'] ?> </td>
	 		<td> <?php echo $value['nilai']['pts'] ?> </td>
	 		<td> <?php echo $value['nilai']['pas'] ?> </td>
	 		<td> <?php echo $value['nilai']['hpap'] ?> </td>
	 		<td> <?php echo $value['nilai']['prep'] ?> </td>
	 		<td> <?php echo $value['nilai']['k1'] ?> </td>
	 		<td> <?php echo $value['nilai']['k2'] ?> </td>
	 		<td> <?php echo $value['nilai']['k3'] ?> </td>
	 		<td> <?php echo $value['nilai']['k4'] ?> </td>
	 		<td> <?php echo $value['nilai']['k5'] ?> </td>
	 		<td> <?php echo $value['nilai']['k6'] ?> </td>
	 		<td> <?php echo $value['nilai']['k7'] ?> </td>
	 		<td> <?php echo $value['nilai']['k8'] ?> </td>
	 		<td> <?php echo $value['nilai']['hpak'] ?> </td>
	 		<td> <?php echo $value['nilai']['prek'] ?> </td>
 			<?php endif ?>
 		</tr>
 		<?php endforeach ?>
 	</tbody>
 </table>
</div> 