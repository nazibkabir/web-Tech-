<?php
include '../models/connection.php';

$sql = "SELECT * FROM food";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <thead>
              <tr>
                <th width="60px">Id</th>
                <th>Food Name</th>
                <th>Food Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th width="90px">Edit</th>
                <th width="90px">Delete</th>
              </tr>
              </thead>';

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tbody><tr><td align='center'>{$row["id"]}</td><td>{$row["food_name"]}</td> <td>{$row["description"]}</td><td>{$row["price"]}</td><td>{$row["qty"]}</td><td align='center'><button class='edit-btn' data-eid='{$row["id"]}'>Edit</button></td><td align='center'><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr></tbody";
              }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
?>
