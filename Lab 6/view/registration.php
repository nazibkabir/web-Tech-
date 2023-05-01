<?php

@include '../model/config.php';

require '../controller/registrationController.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registration</title>

   <link rel="stylesheet" href="../Asset/Css/style1.css">

</head>
<body>
   <div class="form-container">
   <?php
    include 'firstheader.php';
   ?>
   
<div class="form-container2">

   <form action="" method="post">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" placeholder="Enter your name"><br>
      <input type="email" name="email" placeholder="Enter your email"><br>
      <input type="password" name="password" placeholder="Enter your password"><br>
      <input type="password" name="cpassword" placeholder="Confirm your password"><br>
      <label for="gender" style="font-size:20px; float:left;">Gender</label><br>
      <input type="radio" name="gender" value="Male">
      <label for="male">Male</label>
      <input type="radio" name="gender" value="Female">
      <label for="female" >Female</label>
      <input type="radio" name="gender" value="Other">
      <label for="other">Other</label><br>
      <input type="text" name="address" placeholder="Enter your address"><br>
      <input type="text" name="contact" placeholder="Enter your contact"><br>
      
      <input type="submit" name="submit" value="Register" class="form-btn">
      <p>I already have an account? <a href="login.php">Login</a></p>
   </form>

</div>
</div>

</body>
</html>