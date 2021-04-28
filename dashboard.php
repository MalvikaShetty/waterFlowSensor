<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title> Water Usage Calculator | BUY NOW!!</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
	<link rel="stylesheet" href="css/dashboard.css" type="text/css">

</head>

<body>

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


    <div class="container1">
    <div class="row">
    	<!-- flex-container -->
        <div class="col-md-12 flex-container1">
         
            <!-- flex-item -->
            <div class="flex-item">
            	<div class="flex-item-inner">
                	<!-- card -->
                    <a href="#">
                        <div class="card-front bg-magenta">
                            <i class="fa fa-heart fa-3x tile-icon icon-white"></i>
                            <h4>Today's Usage</h4>
                            <?php
                            include("connection.php");
                            session_start();
                            $query = "Select SUM(VolumeOfWater) from Readings WHERE Date='2020-01-02'"; //You don't need a ; like you do in SQL
                            $result = mysqli_query($con,$query);
                            // $value = mysqli_fetch_object($result);
                            while($row = mysqli_fetch_array($result)){  
                            echo "<p>" . $row['SUM(VolumeOfWater)'] . ' L' ."</p>" ;
                            }
                            mysqli_close($con);
                            ?>
                        </div>
                        <div class="card-back bg-magenta">
                            <p class="title">Praesent varius mi sem</p>
                            <p class="desc">Cras posuere consequat nisl, ut rhoncus odio finibus sit amet. Sed consectetur dapibus.</p>
                            <p class="link">Details <i class="fa fa-chevron-circle-right"></i></p>
                        </div>
                    </a>
                    <!-- /card -->
                </div>
            </div>
            <!-- /flex-item -->
           
            
            <!-- flex-item -->
            <div class="flex-item">
            	<div class="flex-item-inner">
                	<!-- card -->
                	<a href="#">
                        <div class="card-front bg-blue">
                            <i class="fa fa-sun-o fa-3x tile-icon icon-white"></i>
                            <h4>Your Daily Average Usage</h4>
                            <?php
                            include("connection.php");
                            session_start();
                            $query = "Select AVG(AverageUse) from (Select Date , SUM(VolumeOfWater) as 'AverageUse' from Readings Group by Date) AS M"; //You don't need a ; like you do in SQL
                            $result = mysqli_query($con,$query);
                            // $value = mysqli_fetch_object($result);  
                            while($row = mysqli_fetch_array($result)){ 
                            echo "<p>" . $row['AVG(AverageUse)'] . ' L' . "</p>" ;
                            }
                            mysqli_close($con);
                            ?>
                        </div>
                        <div class="card-back bg-blue">
                            <p class="title">Vestibulum eget sem malesuada</p>
                            <p class="desc">Etiam imperdiet ullamcorper dolor sit amet molestie. Quisque eu nibh in ligula.</p>
                            <p class="link">Details <i class="fa fa-chevron-circle-right"></i></p>
                        </div>
                    </a>
                    <!-- /card -->
                </div>
            </div>
            <!-- /flex-item -->
           
        </div>
        <!-- /flex-container -->
    </div>
</div>

<?php

include("connection.php");
session_start();
$query = "Select Date, SUM(VolumeOfWater) from Readings GROUP BY Date"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);

echo "<table border='1'>
<tr>
<th>Date</th>
<th>Volume in Litres</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Date'] . "</td>";
echo "<td>" . $row['SUM(VolumeOfWater)'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>



<!-- https://codepen.io/jlalovi/details/bIyAr -->
<div class="container">
    <!-- DONUT CHART BLOCK (LEFT-CONTAINER) -->
    <div class="donut-chart-block block">
      <h2 class="titular">OS AUDIENCE STATS</h2>
      <div class="donut-chart">
        <!-- PORCIONES GRAFICO CIRCULAR
        ELIMINADO #donut-chart
        MODIFICADO CSS de .donut-chart -->
        <div id="porcion1" class="recorte">
          <div class="quesito ios" data-rel="21"></div>
        </div>
        <div id="porcion2" class="recorte">
          <div class="quesito mac" data-rel="39"></div>
        </div>
        <div id="porcion3" class="recorte">
          <div class="quesito win" data-rel="31"></div>
        </div>
        <div id="porcionFin" class="recorte">
          <div class="quesito linux" data-rel="9"></div>
        </div>
        <!-- FIN AÑADIDO GRÄFICO -->
        <p class="center-date">JUNE<br><span class="scnd-font-color">2013</span></p>
      </div>
      <ul class="os-percentages horizontal-list">
        <li>
          <p class="ios os scnd-font-color">iOS</p>
          <p class="os-percentage">21<sup>%</sup></p>
        </li>
        <li>
          <p class="mac os scnd-font-color">Mac</p>
          <p class="os-percentage">39<sup>%</sup></p>
        </li>
        <li>
          <p class="linux os scnd-font-color">Linux</p>
          <p class="os-percentage">9<sup>%</sup></p>
        </li>
        <li>
          <p class="win os scnd-font-color">Win</p>
          <p class="os-percentage">31<sup>%</sup></p>
        </li>
      </ul>
    </div>
    <!-- LINE CHART BLOCK (LEFT-CONTAINER) -->
    <div class="line-chart-block block">
      <div class="line-chart">
        <div class='grafico'>
          <ul class='eje-y'>
            <li data-ejeY='30'></li>
            <li data-ejeY='20'></li>
            <li data-ejeY='10'></li>
            <li data-ejeY='0'></li>
          </ul>
          <ul class='eje-x'>
            <li>Apr</li>
            <li>May</li>
            <li>Jun</li>
          </ul>
          <span data-valor='25'>
            <span data-valor='8'>
              <span data-valor='13'>
                <span data-valor='5'>
                  <span data-valor='23'>
                    <span data-valor='12'>
                      <span data-valor='15'>
                      </span></span></span></span></span></span></span>
        </div>
  
      </div>
      <ul class="time-lenght horizontal-list">
        <li><a class="time-lenght-btn" href="#14">Week</a></li>
        <li><a class="time-lenght-btn" href="#15">Month</a></li>
        <li><a class="time-lenght-btn" href="#16">Year</a></li>
      </ul>
      <ul class="month-data clear">
        <li>
          <p>APR<span class="scnd-font-color"> 2013</span></p>
          <p><span class="entypo-plus increment"> </span>21<sup>%</sup></p>
        </li>
        <li>
          <p>MAY<span class="scnd-font-color"> 2013</span></p>
          <p><span class="entypo-plus increment"> </span>48<sup>%</sup></p>
        </li>
        <li>
          <p>JUN<span class="scnd-font-color"> 2013</span></p>
          <p><span class="entypo-plus increment"> </span>35<sup>%</sup></p>
        </li>
      </ul>
    </div>
    <div class="bar-chart-block block">
      <h2 class='titular'>By Country <span>*1000</span></h2>
      <div class='grafico bar-chart'>
<?php
include("connection.php");
session_start();
$query = "SELECT * FROM WaterSensor.Readings"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);
  
    
        echo "<ul class='eje-y'>";
        while($row = mysqli_fetch_array($result)){  
         echo "<li>" . $row['Date'] . "</li>" ;
        }

         echo "</ul>";
         while($row = mysqli_fetch_array($result)){ 
         echo "<ul class='eje-x'>";
          echo "<li>" . $row['VolumeOfWater']. "</i>";
         }
        echo "</ul>";
    
  
  mysqli_close($con);
?>
  </div>
  </div>
  </div>
  <p class='nota-final'>Este pen es sólo para que <strong>@jlalovi</strong> complemente con los gráficos <a href='https://codepen.io/jlalovi/details/bIyAr'>el suyo</a>.</p>
  </body>
  </html>
