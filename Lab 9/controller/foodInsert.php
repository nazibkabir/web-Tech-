<?php
include '../models/connection.php';

$food_name = $_POST["food_name"];
$description = $_POST["description"];
$price = $_POST["price"];
$qty = $_POST["qty"];


$sql = "INSERT INTO food(food_name, description, price, qty) VALUES ('{$food_name}','{$description}', '{$price}','{$qty}')";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}


?>
