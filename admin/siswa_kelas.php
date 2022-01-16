
<?php 

	$id = $_GET['id'];

	$ambil = $koneksi->query("SELECT * FROM kelas 
		LEFT JOIN tahun_ajaran ON kelas.id_tahun=tahun_ajaran.id_tahun
		LEFT JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan
		WHERE kelas.id_kelas='$id' ");

	$kelas = $ambil->fetch_assoc();

	// echo "<pre>";
	// echo print_r($kelas);
	// echo "</pre>";

	$siswa_kelas = array();

	$ambil = $koneksi->query("SELECT * FROM siswa_kelas 
		LEFT JOIN siswa ON siswa_kelas.id_siswa=siswa.id_siswa
		LEFT JOIN tahun_ajaran ON siswa.id_tahun=tahun_ajaran.id_tahun
		WHERE siswa_kelas.id_kelas='$id' ");

	while ($tiap=$ambil->fetch_assoc()) {

		$siswa_kelas[] = $tiap;
	}

	// echo "<pre>";
	// echo print_r($siswa_kelas);
	// echo "</pre>";

	// Dapatkan siswa yang belum punya kelas
	$siswa = array();
	$id_tahun = $kelas['id_tahun'];

	$ambil = $koneksi->query("SELECT * FROM `siswa` WHERE id_siswa NOT IN(SELECT id_siswa FROM siswa_kelas WHERE id_tahun='$id_tahun') ");

	while($tiap=$ambil->fetch_assoc()){
		$siswa[] = $tiap;
	}

	// echo "<pre>";
	// echo print_r($siswa);
	// echo "</pre>";


?>



	<h4 class="text-muted">Data Siswa </h4>

	<div class="row">
		<div class="col-4">
			<table class="table table-bordered table-hover mt-3">
				<tr>
					<td>Tahun Ajaran</td>
					<td><?php echo $kelas['tahun_ajaran'] ?></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td> <?php echo $kelas['nama_jurusan'] ?></td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td> <?php echo $kelas['nama_kelas'] ?> - <?php echo $kelas['ruang_kelas'] ?> </td>
				</tr>
			</table>
		</div>
	</div>

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary mt-4 " data-toggle="modal" data-target="#exampleModal">
	  Masukkan Siswa
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Masukkan Siswa ke <?php echo $kelas['nama_kelas'] .' - '. $kelas['nama_jurusan'].' - '. $kelas['tahun_ajaran'] ?> </h5>
	        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" >
	          <span aria-hidden="true"></span>
	        </button>
	      </div>
	      <form method="post">
	      <div class="modal-body">
	      	<?php foreach ($siswa as $key => $value): ?>
	      		
	        <input type="checkbox" name="id_siswa[]" value="<?php echo $value['id_siswa'] ?>"> <?php echo $value['induk_siswa']." ".$value['nama_siswa'] ?>  <br>
	      	<?php endforeach ?>
	      </div>
	      <div class="modal-footer">

	        <button type="submit" name="masukkan" class="btn btn-primary">Masukkan</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	<table class="table table-bordered table-hover mt-3">
		<thead class="table-dark">
			<tr>
				<td>NO</td>
				<td>Tahun Masuk</td>
				<td>NIS</td>
				<td>Nama</td>
				<td>Jenis Kelamin</td>
				<td>Aksi</td>
			</tr>
		</thead>
		<tbody>

			<!-- Jika kelas kosong -->
			<?php if (empty($siswa_kelas)) {

				echo '<tr class="text-danger"> 

				<td>#</td> 
				<td>Belum</td> 
				<td>Ada </td>
				<td>Siswa  </td> 
				<td> Terdaftar di kelas ini </td> 

				</tr>  ';
				
			} ?>
				
			<?php foreach ($siswa_kelas as $key => $value): ?>
				
			
			<tr>
				<td> <?php echo $key+1 ?> </td>
				<td> <?php echo $value['tahun_ajaran'] ?> </td>
				<td> <?php echo $value['induk_siswa'] ?> </td>
				<td> <?php echo $value['nama_siswa'] ?> </td>
				<td> <?php echo $value['kelamin_siswa'] ?> </td>
				<td>
					<a href="index.php?halaman=nilai_siswa&id=<?php echo $value['id_siswakelas'] ?>&semester=Ganjil" class="btn btn-outline-info btn-sm">Nilai Ganjil</a>

					<a href="index.php?halaman=nilai_siswa&id=<?php echo $value['id_siswakelas'] ?>&semester=Genap" class="btn btn-outline-info btn-sm">Nilai Genap</a>
				</td>
			</tr>


			<?php endforeach ?>
		</tbody>
	</table>

	<?php 

		if (isset($_POST['masukkan'])) {
			
			// echo "<pre>";
			// echo print_r($_POST);
			// echo "</pre>";

			$id_siswas = $_POST['id_siswa'];
			$id_kelas = $_GET['id'];

			foreach ($id_siswas as $key => $id_siswa) {

				$koneksi->query("INSERT INTO siswa_kelas (id_siswa,id_kelas) VALUES ('$id_siswa','$id_kelas') ");
			}

			echo "<script>alert('data siswa berhasil dimasukkan')</script>";
			echo"<script>location='index.php?halaman=siswa_kelas&id=$id_kelas'</script>";
		}



	 ?>