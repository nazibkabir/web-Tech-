<?php

@include '../model/config.php';
require '../controller/loginController.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <link rel="stylesheet" href="../Asset/Css/style1.css">

</head>
<body>


<div class="form-container">
<?php
    include 'firstheader.php';
?>
<div class="form-container2">

   <form action="" method="post">
    
      <h3>Login Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" placeholder="Enter your email"><br>
      <input type="password" name="password" placeholder="Enter your password"><br>
      <input type="submit" name="submit" value="login now" class="form-btn"><br>
      <p>I don't have an account? <a href="registration.php">register</a></p>
   </form>
    </div>

</div>

</body>
</html>