<?php
require "functions.php";

if( isset($_POST["register"]) ){

   if( register($_POST) > 0 ){
      alert_check_succesfully("Data anda berhasil ditambahkan", "index.php");
   } else {
      alert_check_fail("Data anda gagal ditambahkan", "register.php");
   }

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
      <link rel="stylesheet" href="assets/css/style.css">

      <title>Register</title>
   </head>
   <body>
      <div class="login">
         <img src="assets/img/login-bg.png" alt="login image" class="login__img">

         <form method="post"S action="" class="login__form">
            <h1 class="login__title">Register</h1>

            <div class="login__content">
               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input name="username" type="text" required class="login__input" id="login-email" placeholder=" ">
                     <label for="login-email" class="login__label">Ussername</label>
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
               
               <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input name="password2" type="password" required class="login__input" id="login-pass" placeholder=" ">
                     <label for="login-pass" class="login__label">Password confirmation</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                  </div>
               </div>
            </div>
            <button name="register"type="submit" class="login__button">Register</button>

            <p class="login__register">
               have an account? <a href="login.php">Login</a>
            </p>
         </form>
      </div>
      
      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>
   </body>
</html>