<?php 
session_start();

if (isset($_SESSION['user_name'])) {

    include "../model/config.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: ../view/changePassword.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: ../view/changePassword.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: ../view/changePassword.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	$op = md5($op);
    	$np = md5($np);
        $name = $_SESSION['user_name'];

        $sql = "SELECT password
                FROM user WHERE 
                name='$name' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE user
        	          SET password='$np'
        	          WHERE name='$name'";
        	mysqli_query($conn, $sql_2);
        	header("Location: ../view/changePassword.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: ../view/changePassword.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: change-password.php");
	exit();
}

}else{
     header("Location: index.php");
     exit();
}