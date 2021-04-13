<?php

extract($_POST);
include("connection.php");
session_start();
$query = "INSERT INTO logindemo.orders(Firstname,Lastname,NumberOfDevices,PhoneNo,EmailID,CouponCode,Username) VALUES('" . $firstname . "', '" .$lastname . "','".$noOfdev."' ,'".$phone."','" . $email . "','".$couponcode."','" . $_SESSION['username'] . "')";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Your Order Placed Sucessfully</div>";
echo "<br><div class=head1>Click <a href=home.php>here</a> to go back to the home page.</div>";

mysqli_close($con);
?>

<?php
if (isset($_POST['order_id']) && $_POST['order_id']!="") {
 $order_id = $_POST['order_id'];
 $url = "http://localhost/rest/api/".$order_id;
 
 $client = curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 $response = curl_exec($client);
 
 $result = json_decode($response);
 
 echo "<table>";
 echo "<tr><td>Order ID:</td><td>$result->order_id</td></tr>";
 echo "<tr><td>Amount:</td><td>$result->amount</td></tr>";
 echo "<tr><td>Response Code:</td><td>$result->response_code</td></tr>";
 echo "<tr><td>Response Desc:</td><td>$result->response_desc</td></tr>";
 echo "</table>";
}
    ?>