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
       <hr>
            <h3 style="font-size:40px;">Edit User Information</h3>
       <hr>
               
                <form action="../controller/editProfileController.php"
                      method="POST">
                    <?php
                        $currentUser = $_SESSION['user_name'];
                        $sql = "SELECT * FROM user WHERE name ='$currentUser'";

                        $result = mysqli_query($conn, $sql);

                        if($result){
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                            <input style="boder: none; padding: 3px; margin-top:20px; font-weight:700;" readonly name="name" value="<?php echo $row['name']; ?>"><br>
                                            <input style="boder: none; padding: 3px; margin-top:20px; font-weight:700;" type="email" name="email" value="<?php echo $row['email']; ?>"><br>
                                            <input style="boder: none; padding: 3px; margin-top:20px; font-weight:700;" type="text" name="address" value="<?php echo $row['address']; ?>"><br>
                                            <input style="boder: none; padding: 3px; margin-top:20px; font-weight:700;" type="text" name="contact" value="<?php echo $row['contact']; ?>"><br>


                                            <input style='margin-top:20px; padding:5px; background:lightsalmon; border:none; border-radius:10px; font-size: 20px; font-weight:900;' type="submit" name="update" value="Update">

                                    <?php
                                }
                            }
                        }


                    ?>
                
                </form>
            </div>

    </div>

</div>

</body>
</html>