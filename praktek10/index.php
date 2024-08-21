<?php
  Require "functions.php";
  $data_siswa = query("SELECT * FROM data_siswa");

  if(isset($_POST["search"])){
    $data_siswa = search($_POST["search_value"]);
  }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Icons Font Owesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <title>belajar php</title>
  </head>
  <body>
    <h1 class="text-center">DATA MAHASISWA</h1>

    <div class="container-xl">
    <a class="btn btn-success mb-3" href="insert.php" role="button">+ Tambah Data</a>
    <br>

    <form  action="" method="post" class="col-6 ">
      <div class="input-group mb-3">
        <input name="search_value" type="text" class="form-control" placeholder="Serach....." aria-label="Recipient's username" aria-describedby="button-addon2" autofocus autocomplete="off">
        <button name="search" class="btn btn-outline-secondary" type="submit" id="button-addon2">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </form>
  
    <br>
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th class="col-1" scope="col">#</th>
            <th class="col-3" scope="col">Foto</th>
            <th class="col-2" scope="col">Nama</th>
            <th class="col-2" scope="col">Jurusan</th>
            <th class="col-2" scope="col">Kelas</th>
            <th class="col-2" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $number = 1 ;?>
          <?php foreach ($data_siswa as $siswa) :?>
          <tr>
            <th scope="row"><?= $number++ ;?></th>
            <td>
              <img src="<?= $siswa["foto"];?>" class=" img-fluid foto" alt="...">
            </td>
            <td><?= $siswa["nama"];?></td>
            <td><?= $siswa["jurusan"];?></td>
            <td><?= $siswa["kelas"];?></td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <a href="update.php?id=<?= $siswa["id"];?>" type="button" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
              <a href="delete.php?id=<?= $siswa["id"];?>"  type="button" class="btn btn-danger" onclick="return confirm('Yakin Dek')"><i class="fa-solid fa-trash"></i></a>
            </div>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
