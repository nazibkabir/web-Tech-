<!DOCTYPE html>
<html>
<?php include 'head.html';?>
<body>

<?php
include 'sidenav.php';
session_start();
include 'nav.php';
// define variables and set to empty values
$userErr = $passErr = "";
$username = $password = "";
$errCount = 0;

if (isset($_SESSION['uname'])) {
    echo "<h1> Welcome ".$_SESSION['uname']."</h1>";

} else{
    header('Location: login.php');
}

?>

<br>
<br>
</body>
<?php include 'footer.php';?>
</html>