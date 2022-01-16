<?php 

 include '../config/koneksi.php';

 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title>SMK TRAINIT</title>



    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    
     
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 

    
     <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">


  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">SMK TRAINIT</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <i fill="currentColor" class="bi bi-filter-left"></i>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='dashboard' ? 'active':'' ?>" aria-current="page" href="index.php?halaman=dashboard">
              <i class="bi bi-speedometer pe-2"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='tahun' ? 'active':'' ?>" href="index.php?halaman=tahun">
              <i class="bi bi-calendar2-day pe-2"></i>
              Tahun 
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='guru' ? 'active':'' ?>" href="index.php?halaman=guru">
              <i class="bi bi-mortarboard-fill pe-2"></i>
               Guru
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='siswa' ? 'active':'' ?>" href="index.php?halaman=siswa">
              <i class="bi bi-people-fill pe-2"></i>
              Siswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='jurusan' ? 'active':'' ?>" href="index.php?halaman=jurusan">
             <i class="bi bi-diagram-3-fill pe-2"></i>
               Jurusan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='kelas' ? 'active':'' ?>" href="index.php?halaman=kelas">
              <i class="bi bi-door-open-fill pe-2"></i>
              Kelas
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='kategori' ? 'active':'' ?>" href="index.php?halaman=kategori">
            <i class="bi bi-bookmark-plus pe-2"></i>
             Kategori Pelajaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='mapel' ? 'active':'' ?>" href="index.php?halaman=mapel">
            <i class="bi bi-journal-bookmark-fill pe-2"></i> 
             Mata Pelajaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='mengajar' ? 'active':'' ?>" href="index.php?halaman=mengajar">
              <i class="bi bi-easel pe-2"></i>
              Mengajar
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Laporan</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <!-- <i class="bi bi-folder2-open pe-2"></i> -->
            <i class="bi bi-folder-symlink-fill"></i>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='laporan_nilai' ? 'active':'' ?>" href="index.php?halaman=laporan_nilai">
              <i class="bi bi-file-pdf pe-2"></i>
              Nilai
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $_GET['halaman']=='laporan_siswa' ? 'active':'' ?>" href="index.php?halaman=laporan_siswa">
              <i class="bi bi-graph-up pe-2"></i>
              Statistik Siswa
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 vh-100 pt-5">

      <div class="container">
        
   

      <?php 

        if(isset($_GET['halaman']))

        {
          if($_GET['halaman']=="dashboard")
          {
            include "dashboard.php";

          }elseif($_GET['halaman']=="tahun"){
            include "tahun.php";

          }elseif($_GET['halaman']=="tahun_tambah"){
            include "tahun_tambah.php";

          }elseif($_GET['halaman']=="tahun_ubah"){
            include "tahun_ubah.php";

          }elseif($_GET['halaman']=="tahun_hapus"){
            include "tahun_hapus.php";
  

          }elseif($_GET['halaman']=="guru")
          {
            include "guru.php";

          }
              elseif($_GET['halaman']=="guru_tambah")
          {
            include "guru_tambah.php";

          }
             elseif($_GET['halaman']=="guru_ubah")
          {
            include "guru_ubah.php";

          }
            elseif($_GET['halaman']=="guru_hapus")
          {
            include "guru_hapus.php";

          }
          elseif($_GET['halaman']=="siswa")
          {
            include "siswa.php";

          }  elseif($_GET['halaman']=="siswa_tambah")
          {
            include "siswa_tambah.php";

          }  elseif($_GET['halaman']=="siswa_ubah")
          {
            include "siswa_ubah.php";

          }  elseif($_GET['halaman']=="siswa_hapus")
          {
            include "siswa_hapus.php";


          }elseif($_GET['halaman']=="jurusan")
          
          {
            include "jurusan.php";

          }
          elseif($_GET['halaman']=="jurusan_tambah")
          
          {
            include "jurusan_tambah.php";

          }elseif($_GET['halaman']=="jurusan_ubah")
          
          {
            include "jurusan_ubah.php";

          }
          elseif($_GET['halaman']=="jurusan_hapus")
          {
            include "jurusan_hapus.php";

          }
          elseif($_GET['halaman']=="kelas")
          {
            include "kelas.php";

          }
          elseif($_GET['halaman']=="kelas_tambah")
          {
            include "kelas_tambah.php";

          }
          elseif($_GET['halaman']=="kelas_ubah")
          {
            include "kelas_ubah.php";

          } elseif($_GET['halaman']=="kelas_hapus")
          {
            include "kelas_hapus.php";
          }  
          elseif($_GET['halaman']=="kategori")
          {
            include "kategori.php";

          }
          elseif($_GET['halaman']=="mapel")
          {
            include "mapel.php";

          }
          elseif($_GET['halaman']=="mapel_ubah")
          {
            include "mapel_ubah.php";

          }
           elseif($_GET['halaman']=="mapel_hapus")
          {
            include "mapel_hapus.php";

          }
           elseif($_GET['halaman']=="mapel_tambah")
          {
            include "mapel_tambah.php";

          }
          elseif($_GET['halaman']=="mengajar")
          {
            include "mengajar.php";

          }
          elseif($_GET['halaman']=="mengajar_tambah")
          {
            include "mengajar_tambah.php";

          }elseif($_GET['halaman']=="mengajar_ubah")
          {
            include 'mengajar_ubah.php';
          }
          elseif($_GET['halaman']=="mengajar_hapus")
          {
            include 'mengajar_hapus.php';
          }
          elseif($_GET['halaman']=="laporan_nilai")
          {
            include "laporan_nilai.php";

          }
          elseif($_GET['halaman']=="laporan_siswa")
          {
            include "laporan_siswa.php";

          }
          elseif($_GET['halaman']=="siswa_kelas")
          {
            include "siswa_kelas.php";

          }elseif($_GET['halaman']=="nilai_siswa")
          {
            include "nilai_siswa.php";

          }



        }else{

          if (!isset($_GET['halaman'])) {

           echo "<script>location='index.php?halaman=dashboard'</script>";
          }

        }



       ?>

          </div>
    </main>
  </div>
</div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
