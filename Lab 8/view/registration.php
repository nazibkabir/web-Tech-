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

   <form action="" method="post" id="myForm">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" id="name" placeholder="Enter your name"><br>
      <input type="text" name="email" id="email" placeholder="Enter your email"><br>
      <input type="password" id="password" name="password" placeholder="Enter your password"><br>
      <input type="password" name="cpassword" placeholder="Confirm your password"><br>
      <label for="gender" style="font-size:20px; float:left;">Gender</label><br>
      <input type="radio" name="gender" value="Male">
      <label for="male">Male</label>
      <input type="radio" name="gender" value="Female">
      <label for="female" >Female</label>
      <input type="radio" name="gender" value="Other">
      <label for="other">Other</label><br>
      <input type="text" id="address" name="address" placeholder="Enter your address"><br>
      <input type="text" id="contact" name="contact" placeholder="Enter your contact"><br>
      
      <input type="submit" name="submit" value="Register" class="form-btn">
      <p>I already have an account? <a href="login.php">Login</a></p>
   </form>

</div>
</div>

</body>
</html>
<script>
  const myForm = document.getElementById('myForm');

  myForm.addEventListener('submit', function (event) {
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const phoneInput = document.getElementById('contact');
    const addressInput = document.getElementById('address');

    // Check for empty fields
    if (nameInput.value.trim() === '' ||
      emailInput.value.trim() === '' ||
      passwordInput.value.trim() === '' ||
      addressInput.value.trim() === '' ||
      phoneInput.value.trim() === '') {
      alert('Please fill in all fields.');
      event.preventDefault();
      return;
    }

    // Check name field
    const nameRegex = /^[a-zA-Z ]{2,30}$/;
    if (!nameRegex.test(nameInput.value)) {
      alert('Please enter a valid name (2-30 letters, no numbers or special characters).');
      event.preventDefault();
      return;
    }

    // Check email field
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailInput.value)) {
      alert('Please enter a valid email address.');
      event.preventDefault();
      return;
    }

    // Check password field
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
    if (!passwordRegex.test(passwordInput.value)) {
      alert('Please enter a valid password (8+ characters, at least one uppercase letter, one lowercase letter, one number, and one special character).');
      event.preventDefault();
      return;
    }

    // Check phone number field
    const phoneRegex = /^\d{11}$/;
    if (!phoneRegex.test(phoneInput.value)) {
      alert('Please enter a valid 11-digit phone number (numbers only, no dashes or spaces).');
      event.preventDefault();
      return;
    }
  });

</script>