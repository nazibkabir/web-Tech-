<?php

@include '../model/config.php';
require '../controller/loginController.php';


if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home Page</title>

   <link rel="stylesheet" href="../Asset/Css/style2.css">


</head>
<body>
   
<div class="container">
<?php
include 'header.php';
?>

   <div class="content">
      <h3>Hello,</h3>
      <h1>Welcome <span style="color:lightsalmon;"><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>This Is An User Home Page</p>
   </div>

</div>

</body>
</html>