<?php
include("connection.php");
session_start();
$query = "Select Date, SUM(VolumeOfWater) from Readings GROUP BY Date"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);
if ( ! $result ) {
    echo mysqli_error($con);
    die;
  }
    
  echo json_encode($data); 
  
  mysqli_close($con);
?>