<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
$firstname = $lastname = $dateofbirth = $gender = $degree = $university = $creditcomplete = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_input($_POST["firstname"]);
  $lastname = test_input($_POST["lastname"]);
  $dateofbirth = test_input($_POST["dateofbirth"]);
  $gender = test_input($_POST["gender"]);
  $degree = test_input($_POST["degree"]);
  $university = test_input($_POST["university"]);
  $creditcomplete = test_input($_POST["creditcomplete"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First Name: <input type="text" name="firstname">
  <br><br>
  Last Name: <input type="text" name="lastname">
  <br><br>
  <label for="dateofbirth">Date of Birth:</label>
  <input type="date" id="dateofbirth" name="dateofbirth">
  <br><br>
  Gender:
  <input type="radio" name="gender" value="Female">Female
  <input type="radio" name="gender" value="Male">Male
  <br><br>
  Degree:
  <input type="checkbox" name="degree" value="Ssc">SSC
  <input type="checkbox" name="degree" value="Hsc">HSC
  <input type="checkbox" name="degree" value="Bsc">BSC
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $firstname;
echo "<br>";
echo $lastname;
echo "<br>";
echo $dateofbirth;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $university;
echo "<br>";
echo $creditcomplete;
echo "<br>";
?>

</body>
</html>