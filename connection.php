<?php
  $host ="54.172.58.108";
  $user ="watersensor";
  $password ="watersensor11";
  $db ="WaterSensor";

  $con = mysqli_connect($host, $user, $password, $db);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  


?>
