<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title> Water Usage Calculator | BUY NOW!!</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="watersensor-try/css/style.css" type="text/css">

	<style type="text/css">
		*{
				margin: 0;
				padding:0;
				box-sizing: border-box;
			}
			.navbar{
				display: flex;
				align-items: center;
				padding: 20px;
			}
			nav {
				flex: 1;
				text-align: right;
			}
			nav ul{
				display: inline block;
				list-style-type: none;
			}
			nav ul li{
				display: inline-block;
				margin-right:20px;
			}
			.navbar a{
				text-decoration: none;
				color:white;
			}
			nav a:hover{
				color: red;
				border-radius: 30px;
				text-decoration: underline;
			}

			.container{
				max-width: 1300px;
				margin: auto;
				padding-left: 25px;
				padding-right: 25px;
				padding-top: 10px;
			}
			body{
				background: radial-gradient(circle,#fff,#020273);
				font-family: 'Poppins', sans-serif;
			}
			* {box-sizing: border-box;}
			body {font-family: Verdana, sans-serif;}
			.mySlides {display: none;}
			img {vertical-align: middle;}

			/* Slideshow container */
			.slideshow-container {
			  max-width: 1000px;
			  position: relative;
			  margin: auto;
			  padding-top:40px;
			}

			/* Caption text */
			.text {
			  color: #f2f2f2;
			  font-size: 15px;
			  padding: 8px 12px;
			  position: absolute;
			  bottom: 8px;
			  width: 100%;
			  text-align: center;
			}

			/* Number text (1/3 etc) */
			.numbertext {
			  color: #f2f2f2;
			  font-size: 12px;
			  padding: 8px 12px;
			  position: absolute;
			  top: 0;
			}

			/* The dots/bullets/indicators */
			.dot {
			  height: 15px;
			  width: 15px;
			  margin: 0 2px;
			  background-color: #bbb;
			  border-radius: 50%;
			  display: inline-block;
			  transition: background-color 0.6s ease;
			}

			.active {
			  background-color: #717171;
			}

			/* Fading animation */
			.fade {
			  -webkit-animation-name: fade;
			  -webkit-animation-duration: 1.5s;
			  animation-name: fade;
			  animation-duration: 1.5s;
			}

			@-webkit-keyframes fade {
			  from {opacity: .4} 
			  to {opacity: 1}
			}

			@keyframes fade {
			  from {opacity: .4} 
			  to {opacity: 1}
			}

			/* On smaller screens, decrease text size */
			@media only screen and (max-width: 300px) {
			  .text {font-size: 11px}
			}
			p{
				color: #555;
				font-size:20px;
				padding-left: 160px;
			}
			h2 {
				padding-left: 160px;
			}
			.info {
				background-color: white; 
				border: 1px solid;
				border-radius:20px;
				margin:0 50px 50px 50px;
				padding:100px 100px 100px 10px;
				word-wrap: normal;
			}

	</style>

</head>

<body >
		<div class="container">
				<div class="navbar">
				<div style="display:flex;text-align:left;"> 
						<p style="color:white;">Welcome&nbsp;
			       <?php
						session_start();
						$name = $_SESSION['username'];
						echo $name;
						?></p>
			        </div>
					<nav>
						<ul>
							<li> <a href="index.php"> Home </a> </li>
							<li> <a href="AboutPage.php"> About The Product </a> </li>
							<li> <a href="Contacts.php"> Contact us </a> </li>
							<li>
								<?php if (isset($_SESSION['loggedin'])):?>
								<a href="logout.php" id="login"> Log Out </a>
							  <?php else: ?>
							  <a href="phpLogin.php" id="login"> Log In </a>
							  <?php endif; ?>
							</li>
						
						</ul>
					</nav>
				
				</div>
		</div>
		
		<marquee width="100%" direction="right" height="25px" bgcolor="white">
			 ORDER NOW!!!!	&nbsp	ORDER NOW!!!!	&nbsp	ORDER NOW!!!!	&nbsp	ORDER NOW!!!!&nbsp ORDER NOW!!!!&nbsp	ORDER NOW!!!!&nbsp	ORDER NOW!!!!&nbsp
		</marquee>
		
		<div class="slideshow-container">
			<div class="mySlides fade">
			  <div class="numbertext">1 / 3</div>
			  <img src="watersensor-try/img/water.jpg" style="width:95%">
			  <div class="text">Save Water</div>
			</div>

			<div class="mySlides fade">
			  <div class="numbertext">2 / 3</div>
			  <img src="watersensor-try/img/water2.jpg" style="width:95%">
			  <div class="text">Save Water</div>
			</div>

			<div class="mySlides fade">
				<div class="numbertext">3 / 3</div>
				<img src="watersensor-try/img/circuit.jpg" style="width:95%; height:550px;">
				<div class="text">Circuit Diagram</div>
			</div>
			
		</div>
		<br>

		<div style="text-align:center">
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		</div>
		
		<br>
		<div class="info">
				<h2> The product </h2><br>
				<p> Water usage sensor is the most useful domestic product that increases your efficiency economically and environmentally. It gives you an analysis of 
				your water usage on a daily basis. Thus you can reduce your usage to save water and also money. </p><br>
				<h2> How does it work? </h2><br>
				<p> A motor is fitted inside the main pipe of your house. When water flows though the pipe, the readings are sent to Node MCU which sends the data to a mobile 
					application via bluetooth where users can access it.				</p><br>
				<h2> Other details </h2><br>
				<p> Warranty : 1 year <br> No refund policy <br> Free annual servicing </p>
		</div>
		<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
		  }
		  slideIndex++;
		  if (slideIndex > slides.length) {slideIndex = 1}    
		  for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += " active";
		  setTimeout(showSlides, 3000); // Change image every 2 seconds
		}
		</script>
</body>
</html>
