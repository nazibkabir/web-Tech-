<nav>
<?php
if (isset($_SESSION['uname'])) {
    echo '<span>Logged in as '.$_SESSION['uname'] .'</span> | ';
    echo '<span>Logout</span>';
    } else {
    echo '
  <a href="index.php">Home</a> |
  <a href="login.php">Login</a> |
  <a href="registration.php">Registration</a>
</nav>';
}

