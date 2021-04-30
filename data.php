<?php
include("connection.php");
session_start();
$query = "Select Date, SUM(VolumeOfWater) from Readings GROUP BY Date"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);
$json=[];
$json2=[];
while($row = mysqli_fetch_array($result)){  
  $json =  $row['SUM(VolumeOfWater)'] ;
  $json2 =  $row['Date'];
}
  echo json_encode($json);
   
  
  mysqli_close($con);
?>