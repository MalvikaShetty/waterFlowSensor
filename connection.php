<?php
  $host ="localhost";
  $user ="IOTsensor";
  $password ="sensorIOT";
  $db ="WaterSensor";

  $con = mysqli_connect($host, $user, $password, $db);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  


?>
