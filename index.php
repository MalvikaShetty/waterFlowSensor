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
			<div class="row">
				<div class="col-2">
					<h1> Water Usage Analyzer </h1>
					<p> Calculate your water usage and save water! Get your own device now!! </p>
					<a href="AboutPage.php" class="btn" onclick="loadDoc();" id="info"> Know more &#8594 </a>
				</div>
				<div class="col-2">
					<img src="water.jpg">
					<h3> Price - 1000₹ </h3>
				</div>
			</div>
		</div>

		<form method="POST" action="placeOrder.php" onsubmit="return emailValidate();">

			<div class="container2">
				<center>
					<h1> Order Placement Form </h1>
				</center>
				<hr>
				<label> Firstname </label>
				<input type="text" name="firstname" placeholder="Firstname" size="15" required />
				<label> Lastname: </label>
				<input type="text" name="lastname" placeholder="Lastname" size="15" required />
				<div>
					<label>
						Number of Devices
					</label>

					<select id="noOfdev" name="noOfdev" onchange="showCustomer(this.value)" required>
						<option value="0">Choose a number</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<h5 id="txtHint"></h5><br>
				<label>
					Phone :
				</label>
				<input type="text" name="countrycode" placeholder="Country Code" value="+91" size="2" />
				<input type="text" name="phone" placeholder="Phone no." id="tel" size="10"/ required>
				<label for="email"><b>Email</b></label>
				<input type="text" placeholder="Enter Email" name="email" id="email" required>
				<label> Coupon Code (Register or Login to receive discount coupons!!) </label>
				<input type="text" name="couponcode" placeholder="Coupon Code" size="15" />
				<?php if (isset($_SESSION['loggedin'])) : ?>
					<button type="submit" class="submitbtn"> Place Order</button>
				<?php else : ?>
					<button type="text" onclick="pleaseLogin();" class="submitbtn"> Place Order</button>
				<?php endif; ?>

				<script>
					function emailValidate() {
						var mail = document.getElementById("email").value
						var number = document.getElementById("tel").value
						var devices = document.getElementById("noOfdev").value
						var reg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
						if (!mail.match(reg)) {
							alert("Please enter a valid email ID.");
							return false;
						}
						var reg = /^[0-9]+$/;
						if (!number.match(reg)) {
							alert("Please enter only digits");
							return false;
						}
						if (document.getElementById("noOfdev").selectedIndex == 0) {
							alert("Please select number of devices");
							return false;
						}
					}

					function pleaseLogin() {
						window.location.href = 'phpLogin.php'

					}

					function myFunction() {
						var x = document.getElementById("menu");
						if (x.style.display === "none") {
							x.style.display = "flex";
						} else {
							x.style.display = "none";
						}
					}

					// function loadDoc() {
					// 	var xhttp = new XMLHttpRequest();
					// 	var url = "eg.txt";
					// 	xhttp.onreadystatechange = function() {
					// 		if (this.readyState == 4 && this.status == 200) {
					// 			var myArr = JSON.parse(this.responseText);
					// 			myXMLFunction(myArr);
					// 		};

					// 		xhttp.open("GET", url, true);
					// 		xhttp.send();

					// 		function myXMLFunction(arr) {
					// 			var out = "";
					// 			var i;
					// 			for (i = 0; i < arr.length; i++) {
					// 				out += '<a href="' + arr[i].url + '">' + arr[i].display + '</a><br>';
					// 			}
					// 			document.getElementById("info").innerHTML = out;
					// 		}
					// 	}
					// }

					function showCustomer(str) {
						var xhttp;
						if (str == "") {
							document.getElementById("txtHint").innerHTML = "";
							return;
						}
						xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("txtHint").innerHTML = this.responseText;
							}
						};
						xhttp.open("GET", "discount.php?q=" + str, true);
						xhttp.send();
					}
				</script>
</body>
<html>
