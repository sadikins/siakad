<?php 
    
    $id_tahun = $_GET['id'];

    $ambil = $koneksi->query("SELECT * FROM tahun_ajaran WHERE id_tahun='$id_tahun' ");

    $tahun = $ambil->fetch_assoc();

    // echo "<pre>";
    // echo print_r($tahun);
    // echo "</pre>";


 ?>




<h4>Ubah Tahun Ajaran <i class="bi bi-pencil-square ps-2"></i></h4>

<div class="row">
    <div class="container">
        <div class="col-6">
            <form method="post">
    
                <div class="mt-3">
                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                    <input type="text" class="form-control" name="tahun_ajaran" value="<?php echo $tahun['tahun_ajaran'] ?>">

                </div>

                <button class="btn btn-primary my-3 py-2 " name="simpan">Edit Data <i class="bi bi-arrow-right-circle-fill"></i></button>

            </form>
        </div>
    </div>
</div>





<?php 

    if (isset($_POST['simpan'])) {


        $tahun = $_POST['tahun_ajaran'];

        $koneksi->query("UPDATE tahun_ajaran SET tahun_ajaran='$tahun' WHERE id_tahun='$id_tahun'");

        echo "<script>alert('data telah diubah')</script>";
        echo "<script>location='index.php?halaman=tahun'</script>";



    }
    


 ?>