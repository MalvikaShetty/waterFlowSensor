<?php

extract($_POST);
include("connection.php");
$rsuser=mysqli_query($con,"select * from WaterSensor.Users where Username='$uname'");
$rsemail=mysqli_query($con,"select * from WaterSensor.Users where Email='$email'");
if (mysqli_num_rows($rsuser)>0)
{
	echo "<br><br><br><div class=head1>Username already Exists</div>";
	exit;
}
else if(mysqli_num_rows($rsemail)>0){
    echo "<br><br><br><div class=head1>Email already Exists</div>";
	exit;
}
session_start();
$_SESSION['hashpass']= password_hash($pass, PASSWORD_DEFAULT);
$query = "INSERT INTO WaterSensor.Users (Username,Password,Email) VALUES('" . $uname . "', '" . password_hash($pass, PASSWORD_DEFAULT) . "', '" . $email . "')";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Your Login ID  $uname Created Sucessfully</div>";
echo "<br><div class=head1>Please Login using your Login ID</div>";
echo "<br><div class=head1><a href=phpLogin.php>Login</a></div>";

mysqli_close($con);
?>
