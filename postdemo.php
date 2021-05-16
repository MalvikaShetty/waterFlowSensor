<?php
include('connection.php');
session_start();
if(!empty($_POST['SensorID'])  && !empty($_POST['VolumeOfWater']))
{

    $sensorId = $_POST['SensorID'];
    $vol = $_POST['VolumeOfWater'];
   

    $sql = "INSERT INTO WaterSensor.Readings (SensorID, VolumeOfWater, Date ,Time)
    
    VALUES ('".$sensorId."', '".$vol."', curdate() , curtime())";

    if ($con->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}


$con->close();
?>
