<?php

include('connection.php');
session_start();
$username = $_POST['user'];
$password = $_POST['pass'];

$_SESSION['username'] = $username;

// to prevent from mysqli injection  
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sqlSensorID = "select SensorID from WaterSensor.UserSensorID where Username = '$username' LIMIT 1";

$resultSensorID = mysqli_query($con, $sqlSensorID);
$row1 = mysqli_fetch_array($resultSensorID, MYSQLI_ASSOC);

$_SESSION['Sensor'] = $row1['SensorID'];


$sql = "select * from WaterSensor.Users where Username = '$username' LIMIT 1";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$useR = $row['Username'];
$hash= $row['Password'];

if($username=$useR && password_verify($password, $hash)){
        $_SESSION['loggedin']= true;
        header("Location:dashboard.php");
    }
else{
        $_SESSION['error'] = 'Login failed. Invalid username or password.';
        header("Location:phpLogin.php");
    }
 
mysqli_close($con);

?>
