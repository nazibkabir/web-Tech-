<?php
include '../models/connection.php';

$food_id = $_POST["id"];

$sql = "SELECT * FROM food WHERE id = {$food_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){

  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
      <td width='90px'>Food Name</td>
      <td><input type='text' id='edit-food_name' value='{$row["food_name"]}'>
          <input type='text' id='edit-id' hidden value='{$row["id"]}'>
      </td>
    </tr>
    <tr>
      <td>Food Description</td>
      <td><input type='text' id='edit-description' value='{$row["description"]}'></td>
    </tr>
    <tr>
      <td>Food Price</td>
      <td><input type='text' id='edit-price' value='{$row["price"]}'></td>
    </tr>
    <tr>
      <td>Food Quantity</td>
      <td><input type='text' id='edit-qty' value='{$row["qty"]}'></td>
    </tr>
    <tr>
      <td></td>
      <td><input type='submit' id='edit-submit' value='save'></td>
    </tr>";

  }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
