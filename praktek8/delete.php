
 <html lang="en">
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </head>
    <body>
    <?php
      require "functions.php";
      $id = $_GET["id"];
      
      if(delete($id) > 0){
        alert_check_succesfully("dihapus", "index.php");
      } else{
        alert_check_fail("diihapus", "index.php");
      }
        echo mysqli_affected_rows($conn);
    ?>
    </body>
  </html>  
