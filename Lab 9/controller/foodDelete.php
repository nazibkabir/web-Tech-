<?php

include '../models/connection.php';


$food_id = $_POST["id"];


$sql = "DELETE FROM food WHERE id = {$food_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
