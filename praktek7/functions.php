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

    // INSERT DATA AND UPLOAD IMAGE ______________________________________________________________________________
    function insert($post){
        global $conn;

        $foto = "imageUploaded/".upload();
        $nama = htmlspecialchars($post["nama"]);
        $jurusan = htmlspecialchars($post["jurusan"]);
        $kelas = htmlspecialchars($post["kelas"]);

        $query = "INSERT  INTO data_siswa VALUES ('', '$foto', '$nama', '$jurusan', '$kelas')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    //upload image
    function upload(){

        // ambil data
        $namaFile = $_FILES["foto"]["name"];
        $ukuranFile = $_FILES["foto"]["size"];
        $error = $_FILES["foto"]["error"];
        $tmpName = $_FILES["foto"]["tmp_name"];

        // cek apakah tidak ada fotoa yang diupload
        if( $error === 4 ){
            echo"
                <script>
                    alert('Pilihlah foto Terlebihdahulu');
                </script>";
            return false;    
        }

        // cek apakah yang diupload adalah foto
        $extensionValidImage = ["jpg", "jpeg", 'png', 'gif'];
        $extensionImage = explode(".", $namaFile);
        $extensionImage = strtolower(end($extensionImage));

        // cek apakah file yang diupload itu sesuai dengan apa yang telah diterapkan didalam array
        if( !in_array($extensionImage, $extensionValidImage) ){
            echo"
                <script>
                    alert('Yang Anda upload bukan foto ');
                </script>";

            return false;    
        }

        // cek apakah ukuran kebesaran        
        if( $ukuranFile > 10000000 ){
            echo"
                <script>
                    alert('foto yang anda upload terlalu besar');
                </script>"; 

            return false;    
        }

        // lolos pengecekan gambar yang siap diupload
        // generate nama baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= ".";
        $namaFileBaru .= $extensionImage;

        // pindahkan foto ke folder yang diingingkan
        move_uploaded_file($tmpName, "imageUploaded/" . $namaFileBaru );

        return $namaFileBaru;
    }//________________________________________________________________________________________________________________
    function delete($id) {
        global $conn;
    
        // Dapatkan data siswa berdasarkan ID
        $siswa = query("SELECT * FROM data_siswa WHERE id = $id")[0];
    
        // Hapus file gambar dari folder imageUploaded
        deleteFile($siswa['foto']);
    
        // Hapus data dari database
        mysqli_query($conn, "DELETE FROM data_siswa WHERE id = $id");  
    
        return mysqli_affected_rows($conn);
    }
    // delete image
    function deleteFile($filePath) {
        // Cek apakah file ada
        if (file_exists($filePath)) {
            // Hapus file
            unlink($filePath);
        }
    }//________________________________________________________________________________________________________________
    
    // UPDATE
    function update($data) {
        global $conn;
        global $id_siswa;
    
        //gtp{
        // Dapatkan data siswa sebelumnya
        $siswaLama = query("SELECT * FROM data_siswa WHERE id = $id_siswa")[0];
    
        // Cek apakah pengguna mengganti gambar
        if ($_FILES['foto']['error'] !== 4) {
            // Hapus file gambar lama
            deleteFile($siswaLama['foto']);
            
            // Proses upload gambar baru
            $foto = "imageUploaded/" . upload();
        } else {
            // Jika tidak diganti, tetap gunakan gambar lama
            $foto = $siswaLama['foto'];
        }
        // }gpt

        $nama = htmlspecialchars($data["nama"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $kelas = htmlspecialchars($data["kelas"]);
    
        $query = "UPDATE data_siswa SET 
                  foto = '$foto',
                  nama = '$nama', 
                  jurusan = '$jurusan', 
                  kelas = '$kelas' 
                  WHERE id = $id_siswa;";
    
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);         
    }
    
    //________________________________________________________________________________________________________________
    //SEARCH
    function search($value){

        $query = "SELECT * FROM data_siswa WHERE
            nama LIKE  '%$value%' OR
            kelas LIKE  '%$value%' OR
            jurusan LIKE  '%$value%' ";

        return query($query);
    }//________________________________________________________________________________________________________________

    
