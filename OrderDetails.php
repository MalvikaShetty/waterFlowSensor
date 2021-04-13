<?php
include('connection.php');
session_start();
$uname = $_SESSION['username'];

$result = mysqli_query(
             $con,
             "SELECT * FROM logindemo.orders WHERE Username='$uname';") 
              or die("Error in Selecting " . mysqli_error($connection));

              $emparray = array();
while($row =mysqli_fetch_assoc($result))
    {
      $emparray[] = $row;
    }
echo json_encode($emparray);

//close the db connection
mysqli_close($connection);
?>