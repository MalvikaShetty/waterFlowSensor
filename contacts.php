<!DOCTYPE html>
<html>

<head>

    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />

        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
        <link rel="stylesheet" href="watersensor-try/css/main.css" type="text/css">

        <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
        <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
    </head>

<body>
<div class="header">
<div class="container">
<div class="navbar">
<p>Welcome&nbsp;</p>		
			<p id="userID"><?php
						session_start();
						$name = $_SESSION['username'];
						echo $name;
						?></p>
					
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
<div style="color:white;display:flex;direction:row;justify-content:space-evenly;margin-top:30px;">
<div class="contact-details">
<h3>Contact Number:</h3></br>
<p> 7400235618</p>
</div>
<div class="contact-details">
<h3>Address:</h3></br>
<p> 
Premier Automobiles Road </br>  Opp. HDIL Premier Exotica, </br>  Kurla, w,</br>  Maharashtra 400070
</p>
</div>
<div class="contact-details">
<h3>Email ID:</h3></br>
<p>wateranalyzer@startup.com</p>
</div>
</div>
    <div id='map' style="margin:5% 0 0 25%; width: 70em; height: 50em;"></div>

    <script>
        var map = L.map('map');
        map.addControl(new L.Control.Fullscreen({
            title: {
                'false': 'View Fullscreen',
                'true': 'Exit Fullscreen'
            }
        }));

        map.setView([19.0813, 72.8886], 17);

        const myBasemap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            opacity: 0.5,
        });
        myBasemap.addTo(map);
            DBIT = L.marker([19.0813, 72.8886]).bindPopup('Don Bosco College');
            DBIT.addTo(map);
      
        googleMap = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{ 
            maxZoom: 20, 
            subdomains:['mt0','mt1','mt2','mt3'] });
           
        
        var allLayers = {
            "OpenStreetMap": myBasemap,
            "Google":googleMap
        };

        L.control.layers(allLayers).addTo(map);
     
    </script>
</div>
</body>

</html>
