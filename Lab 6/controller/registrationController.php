<?php
if(isset($_POST['submit'])){


    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
 
    $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";
 
    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = 'user already exist!';
 
    }else{
 
       if($pass != $cpass){
          $error[] = 'password not matched!';
       }else{
          $insert = "INSERT INTO user (name, email, password, gender, address, contact) VALUES('$name','$email','$pass', '$gender', '$address', '$contact')";
 
          mysqli_query($conn, $insert);
          header('location:../view/login.php');
       }
    }
 
 };
?>