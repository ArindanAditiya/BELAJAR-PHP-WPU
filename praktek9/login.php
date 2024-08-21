<?php
   require "functions.php";

   if( isset($_POST["login"]) ){

      $username = $_POST["username"];
      $password = $_POST["password"];

      $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");

      // cek username
      // gunakan function "mysqli_num_rows()" untuk mengembalikan jumlah row hasil result
      if( mysqli_num_rows($result) === 1 ){
         
         // cek password
         $row = mysqli_fetch_assoc($result);
         if( password_verify($password, $row["password"]) ){
            header("Location: index.php");
            exit;
         }

      }

      $error = true;

   }

?>
<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">

      <title>Login</title>
   </head>
   <body>
      <div class="login">
         <img src="assets/img/login-bg.png" alt="login image" class="login__img">

         <form method="post" action="" class="login__form">
            <h1 class="login__title">Login</h1>

            <div class="login__content">
               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input name="username" type="text" required class="login__input" id="login-email" placeholder=" ">
                     <label for="login-email" class="login__label">Username</label>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input name="password" type="password" required class="login__input" id="login-pass" placeholder=" ">
                     <label for="login-pass" class="login__label">Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                  </div>
               </div>
            </div>

            <div class="login__check">
               <div class="login__check-group">
                  <input type="checkbox" class="login__check-input" id="login-check">
                  <label for="login-check" class="login__check-label">Remember me</label>
               </div>

               <a href="#" class="login__forgot">Forgot Password?</a>
            </div>

            <button name="login" type="submit" class="login__button">Login</button>

            <p class="login__register">
               Don't have an account? <a href="register.php">Register</a>
            </p>
         </form>
      </div>
      
      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>
   </body>
</html>