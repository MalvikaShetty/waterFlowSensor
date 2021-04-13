<?php
  $host ="3.82.49.231";
  $user ="malvika";
  $password ="malvika11";
  $db ="WaterSensor";

  $con = mysqli_connect($host, $user, $password, $db);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  


?>
