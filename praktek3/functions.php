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

    // query
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
?>
