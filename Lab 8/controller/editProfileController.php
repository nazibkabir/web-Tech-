<?php
session_start();
error_reporting(E_ALL);

if(isset($_POST['update'])){

        include('../model/config.php');

         $name  =    $_POST['name'];
         $email =    $_POST['email'];
         $address =    $_POST['address'];
         $contact =    $_POST['contact'];

        if(!empty($name) && !empty($email) && !empty($address) && !empty($contact)){

  
            $loggedInUser = $_SESSION['user_name'];
            
            $sql = "UPDATE user SET name = '$name', email ='$email', address ='$address', contact='$contact' WHERE name = '$loggedInUser'";
            $results = mysqli_query($conn,$sql);
            header('Location:../view/home.php');
        exit;
        }
    }
                
        

?>