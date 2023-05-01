<?php
include '../models/connection.php';

$food_id = $_POST["id"];
$food_name = $_POST["food_name"];
$description = $_POST["description"];
$price = $_POST["price"];
$qty = $_POST["qty"];


$sql = "UPDATE food SET food_name = '{$food_name}', description = '{$description}', price = '{$price}', qty = '{$qty}' WHERE id = {$food_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
