<?php
/*
1. koneksikan ke database
2. ambil datanya
3. cek apakah berhasil ambil data'
4. ambil seluruh datanya pakai looping 
*/

// membuat koneksi ke database
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $db = "belajarphpwpu";
  $conn = mysqli_connect($hostname, $username, "", $db);
  
  // Mengambil datanya
  $query = "SELECT * FROM data_siswa";
  $result = mysqli_query($conn, $query);

  // cara untuk cek error
  if(!$result){
    echo mysqli_error($conn);
  } else {/*kalau nggk error nggk ngapa ngapain*/}

  // cara-cara ambil data (fetch) data_siswa daru object result
  // mysqli_fetch_row() || numerik
  // mysqli_fetch_assoc() || associative
  // mysqli_fetch_array() || keduanya
  // mysqli_fetch_object()

  while ($siswa = mysqli_fetch_assoc($result)){
    var_dump($siswa);
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

    <title>belajar php</title>
  </head>
  <body>
    <h1 class="text-center">DATA MAHASISWA</h1>

    <div class="container-xl">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Kelas</th>
          </tr>
        </thead>
        <tbody>
          <?php while :?>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
