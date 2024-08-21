<?php
    // Connection
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db = "belajarphpwpu";
    $conn = mysqli_connect($hostname, $username, $password, $db);

    // Cek koneksi
    if (!$conn) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    // query fetch data
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query gagal: " . mysqli_error($conn));
        }
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // insert data
    function insert($post){
        global $conn;

        $nama = htmlspecialchars($post["nama"]);
        $jurusan = htmlspecialchars($post["jurusan"]);
        $kelas = htmlspecialchars($post["kelas"]);
        // if(($nama || $jurusan || $kelas) == ""){
        //   die("isikan data dengan benar dlu ");
        // }

        $query = "INSERT  INTO data_siswa VALUES ('', '$nama', '$jurusan', '$kelas')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // delate data
    function delete($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM data_siswa WHERE id = $id");  

        return mysqli_affected_rows($conn);
    }

    function update($data){
        global $conn;
        global $id_siswa;

        $nama = htmlspecialchars($data["nama"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $kelas = htmlspecialchars($data["kelas"]);
        $query = "UPDATE `data_siswa` SET 
                    `nama` = '$nama', 
                    `jurusan` = '$jurusan', 
                    `kelas` = '$kelas' 
                    WHERE `data_siswa`.`id` = $id_siswa;";
        // sqlnya agak beda sama yang ada yang divido
        // yang divedeo malah error

        if (!$query) {
            die("Query gagal: " . mysqli_error($conn));
        }

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
        
    }



















?>
