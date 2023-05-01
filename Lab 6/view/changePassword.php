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
   <title>View Profile</title>

   <link rel="stylesheet" href="../Asset/Css/style2.css">


</head>
<body>
   
<div class="container">
<?php
include 'header.php';
?>

   <div class="content">
   <form action="../controller/changePasswordController.php" method="post">
      <hr>
     	<h3 style="font-size:40px;">Change Password</h3>
      <hr>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error" style="color:red; font-weight:700;"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success" style="color:green; font-weight:700;"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label style="margin-top:5px; font-weight:700;">Old Password</label><br>
     	<input type="password" name="op" placeholder="Old Password" style="boder: none; padding: 3px; margin-bottom:20px; font-weight:700;"><br>

     	<label style="margin-top:5px; font-weight:700;">New Password</label><br>
     	<input type="password" name="np" placeholder="New Password" style="boder: none; padding: 3px; margin-bottom:20px; font-weight:700;"><br>

     	<label style="margin-top:5px; font-weight:700;">Confirm New Password</label><br>
     	<input type="password" name="c_np" placeholder="Confirm New Password" style="boder: none; padding: 3px; margin-bottom:20px; font-weight:700;"><br>

     	<button type="submit" style='margin-top:20px; padding:5px; background:lightsalmon; border:none; border-radius:10px; font-size: 20px; font-weight:900;'>Change</button>
     </form>

    </div>

</div>

</body>
</html>