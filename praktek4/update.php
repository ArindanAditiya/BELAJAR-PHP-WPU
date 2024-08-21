<?php
require 'functions.php';

$id_siswa = $_GET["id"];
// ambil data siswa berdasarkan id
$siswa = query("SELECT * FROM data_siswa WHERE id = $id_siswa")[0];

// saat tombol submit diclick
if(isset($_POST["submit"])){
  if(update($_POST) > 0){
    echo "
      <script>
        alert('data berhasil diupdate');
        document.location.href = 'index.php';
      </script>
      ";

  } else{
    echo "
      <script>
        alert('data gagal diupdate');
        document.location.href = 'index.php';
      </script>
    ";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  </head>
  <body>
    <h1 class="text-center mt-3">UBAH DATA</h1>
    <div class="container mt-5">
      <div class="card">
        <div class="card-body">
          <!-- Form goe""s here -->
          <form method="post" action="" class="row g-3">
            <div class="col-12">
              <label for="nama" class="form-label">Nama</label>
              <input value="<?= $siswa["nama"]?>" required name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama" />
            </div>
            <div class="col-12">
              <label for="jurusan" class="form-label">Jurusan</label>
              <input value="<?= $siswa["jurusan"]?>" required name="jurusan" type="text" class="form-control" id="jurusan" placeholder="Masukkan Jurusan" />
            </div>
            <div class="col-12">
              <label for="kelas" class="form-label">Kelas</label>
              <input value="<?= $siswa["kelas"]?>" required name="kelas" type="text" class="form-control" id="kelas" placeholder="Masukkan Kelas" />
            </div>
            <div class="col-12">
              <button name="submit" type="submit" class="btn btn-primary">UBAH DATA</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></>
  </body>
</html>
