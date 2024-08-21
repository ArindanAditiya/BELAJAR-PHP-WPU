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

        if (!$query) {
            die("Query gagal: " . mysqli_error($conn));
        }

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
        
    }

    //search
    function search($value){

        $query = "SELECT * FROM data_siswa WHERE
            nama LIKE  '%$value%' OR
            kelas LIKE  '%$value%' OR
            jurusan LIKE  '%$value%' ";

        return query($query);
    }

    //CEK DATA_______________________________________________________________________________________________________________


    function alert_check_succesfully($messege, $page){
        echo "<div style='width:95%' class='alert alert-success position-absolute top-10 start-50 translate-middle'>
                <div> 
                    <i class='fa-solid fa-check'></i> 
                    <span>Data Berhasil <b>$messege</b></span>
                </div>
            </div>
                
            <script>
                const alertElement = document.getElementsByClassName('alert')[0];
                
                setTimeout(() => {
                    alertElement.style.display = 'none';
                    document.location.href = '$page'; 
                }, 2000);
            </script>";
    }
    function alert_check_fail($massage, $page){
        echo "<div style='width:95%' class='alert alert-warning position-absolute top-10 start-50 translate-middle'>
                    <div> 
                        <i class='fa-solid fa-check'></i> 
                        <span>Data gagal <b>$messege</b></span>
                    </div>
                </div>
                <script>
                    const alertElement = document.getElementsByClassName('alert')[0];

                    setTimeout(() => {
                        alertElement.style.display = 'none';
                        document.location.href = '$page'; 
                    }, 2000);
                </script>";
    }


















?>
