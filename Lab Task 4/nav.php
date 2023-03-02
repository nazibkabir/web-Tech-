<nav>
<?php
if (isset($_SESSION['uname'])) {
    echo '<span>Logged in as '.$_SESSION['uname'] .'</span> | ';
    echo '<a href="logout.php">Logout</a>';
} else {
    echo '
  <a href="index.php">Home</a> |
  <a href="login.php">Login</a> |
  <a href="registration.php">Registration</a>
</nav>';
}

