<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title> Water Usage Calculator | BUY NOW!!</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/main.css" type="text/css">

</head>

<body>

	<div class="header">
		<div class="container">
			<div class="navbar">


				<nav>
					<div style="display:flex;text-align:left;">
						<p>Welcome&nbsp;</p>
						<p id="userID"><?php
										session_start();
										$name = $_SESSION['username'];
										echo $name;
										?></p>
					</div>
					<a href="javascript:void(0);" class="icon" onclick="myFunction()" id="bars" style="margin:-40px 0 0 0;">
						<i class="fa fa-2x fa-bars"></i>
					</a>
					<ul id="menu">

						<div style="flex:1; text-align: right;margin:40px 0 0 0;">
							<li> <a href="index.php"> Home </a> </li>
							<li> <a href="AboutPage.php"> About The Product </a> </li>
							<li> <a href="Contacts.php"> Contact us </a> </li>
							<li>
								<?php if (isset($_SESSION['loggedin'])) : ?>
									<a href="logout.php" id="login"> Log Out </a>
								<?php else : ?>
									<a href="phpLogin.php" id="login"> Log In </a>
								<?php endif; ?>
							</li>
							</div>
						</ul>
				</nav>


			</div>
            <?php

include("connection.php");
session_start();
$query = "SELECT * FROM WaterSensor.Readings"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['SensorID'] . "</td><td>" . $row['Date'] . "</td></tr>" . $row['VolumeOfWater']. "</td></tr>" ;  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($con);
?>
		</div>

	
</body>
<html>
