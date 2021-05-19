<?php session_start();
 if (isset($_SESSION['loggedin'])) : ?>

<!DOCTYPE html>
<html lang="en" xmlns:ng="https://angularjs.org">

<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Water Usage Calculator | BUY NOW!!</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <!-- Line chart -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://code.angularjs.org/1.2.21/angular.js"></script>
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <link rel="stylesheet" href="css/dashboard.css" type="text/css">


</head>

<body>

    <div class="navbar">


        <nav>
            <div style="display:flex;text-align:left;">
                <p>Welcome&nbsp;</p>
                <p id="userID"><?php
                                
                                $name = $_SESSION['username'];
                                echo $name;
                                ?></p>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()" id="bars" style="margin:-40px 0 0 0;">
                <i class="fa fa-2x fa-bars"></i>
            </a>
            <ul id="menu">

                <div style="flex:1; text-align: right;margin:40px 0 0 0;color:white">
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
                            $sensor = $_SESSION['Sensor']; 
                            $query = "Select SUM(VolumeOfWater) from Readings WHERE Date=CURDATE() AND SensorID = '$sensor'"; //You don't need a ; like you do in SQL
                            $result = mysqli_query($con,$query);
                            // $value = mysqli_fetch_object($result);
                            while($row = mysqli_fetch_array($result)){  
                            if ($row['SUM(VolumeOfWater)'] > 0){
                              echo "<p>" . $row['SUM(VolumeOfWater)'] . ' L' ."</p>" ;
                            }
                            else
                            {echo "<p> 0 L </p>" ;}
                          }
                            mysqli_close($con);
                            ?>
                        </div>
                        <div class="card-back bg-magenta">
                            <p class="title">Praesent varius mi sem</p>
                            <p class="desc">Cras posuere consequat nisl, ut rhoncus odio finibus sit amet. Sed consectetur dapibus.</p>
                            <a href="#today"><p class="link">Details <i class="fa fa-chevron-circle-right"></i></p></a>
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
                            <i class="fa fa-heart fa-3x tile-icon icon-white"></i>
                            <h4>Your Daily Average Usage</h4>
                            <?php
                            include("connection.php");
                            session_start();
                            $sensor = $_SESSION['Sensor'];
                            $query = "Select AVG(SumUse) from (Select Date , SUM(VolumeOfWater) as 'SumUse' from WaterSensor.Readings WHERE SensorID= '$sensor' Group by Date) AS M"; //You don't need a ; like you do in SQL
                            $result = mysqli_query($con,$query);
                            // $value = mysqli_fetch_object($result);  
                            while($row = mysqli_fetch_array($result)){ 
                            echo "<p>" . $row['AVG(SumUse)'] . ' L' . "</p>" ;
                            }
                            mysqli_close($con);
                            ?>
                        </div>
                        <div class="card-back bg-blue">
                            <p class="title">Vestibulum eget sem malesuada</p>
                            <p class="desc">Etiam imperdiet ullamcorper dolor sit amet molestie. Quisque eu nibh in ligula.</p>
                            <a href="#"><p class="link">Details <i class="fa fa-chevron-circle-right"></i></p></a>
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
            <div class="card-front bg-magenta">
                <i class="fa fa-heart fa-3x tile-icon icon-white"></i>
                <h4>Monthly Average Usage</h4>
                <?php
                include("connection.php");
                session_start();
                $sensor = $_SESSION['Sensor'];
                $query = "Select AVG(AverageMonthUse) from (Select Date , SUM(VolumeOfWater) as 'AverageMonthUse' from WaterSensor.Readings Where SensorID = '$sensor' Group by Month(Date)) AS M"; //You don't need a ; like you do in SQL
                $result = mysqli_query($con,$query);
                // $value = mysqli_fetch_object($result);
                while($row = mysqli_fetch_array($result)){  
                echo "<p>" . $row['AVG(AverageMonthUse)'] . ' L' ."</p>" ;
                }
                mysqli_close($con);
                ?>
            </div>
            <div class="card-back bg-magenta">
                <p class="title">Praesent varius mi sem</p>
                <p class="desc">Cras posuere consequat nisl, ut rhoncus odio finibus sit amet. Sed consectetur dapibus.</p>
                <a href="#month"><p class="link">Details <i class="fa fa-chevron-circle-right"></i></p></a>
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

<div style="color:red;font-weight:bold">
         <?php
          include("connection.php");
          session_start();
          $sensor = $_SESSION['Sensor'];
          $query = "Select SUM(VolumeOfWater) from Readings WHERE Date=CURDATE() AND SensorID = '$sensor'"; //You don't need a ; like you do in SQL
          $result = mysqli_query($con,$query);
          // $value = mysqli_fetch_object($result);  
          while($row = mysqli_fetch_array($result)){ 
            $exceed = (int)$row['SUM(VolumeOfWater)'] - 10;
            if ($exceed > 0){
              echo "<h1> Alert : You have exceeded today's usage by " . $exceed . ' L' . "</h1>" ;
            } 
            else
            {
              echo '';
            }
          }
          mysqli_close($con);
          ?>  
</div>
<br><br><br>

<?php
include("connection.php");
session_start();
$sensor = $_SESSION['Sensor'];
$query = "Select SensorID,Date, SumDaily from (SELECT ReadingsID, SensorID, Date, SUM(VolumeOfWater) AS SumDaily from WaterSensor.Readings Where SensorID = '$sensor' Group by Date ORDER BY YEAR(Date) DESC, MONTH(Date) DESC, DAY(Date) DESC LIMIT 8) AS M ORDER BY ReadingsID ASC;
"; //You don't need a ; like you do in SQL
$query1 = "Select SensorID,Date, Avg from (SELECT ReadingsID, SensorID, Date, Avg(VolumeOfWater) AS Avg from WaterSensor.Readings Where SensorID = '$sensor' Group by Date ORDER BY YEAR(Date) DESC, MONTH(Date) DESC, DAY(Date) DESC LIMIT 8) AS M ORDER BY ReadingsID ASC
"; //You don't need a ; like you do in SQL
$query2 = "Select SensorID, Date, SumMonth, MONTH(Date) from (SELECT ReadingsID, SensorID, Date, Sum(VolumeOfWater) AS SumMonth from WaterSensor.Readings Where SensorID = '$sensor' Group by MONTH(Date) ORDER BY YEAR(Date) DESC, MONTH(Date) DESC, DAY(Date) DESC LIMIT 8) AS M ORDER BY ReadingsID ASC;
"; //You don't need a ; like you do in SQL
$queryMorning = "Select Date, SUM(VolumeOfWater) from WaterSensor.Readings Where SensorID = '$sensor' AND Time BETWEEN '00:00:00' AND '12:00:00' GROUP BY Date;"; //You don't need a ; like you do in SQL
$queryAfternoon = "Select Date, SUM(VolumeOfWater) from WaterSensor.Readings Where SensorID = '$sensor' AND Time BETWEEN '12:00:00' AND '16:00:00' GROUP BY Date;"; //You don't need a ; like you do in SQL
$queryEvening = "Select Date, SUM(VolumeOfWater) from WaterSensor.Readings Where SensorID = '$sensor' AND Time BETWEEN '16:00:00' AND '20:00:00' GROUP BY Date;"; //You don't need a ; like you do in SQL
$queryNight = "Select Date, SUM(VolumeOfWater) from WaterSensor.Readings Where SensorID = '$sensor' AND Time BETWEEN '20:00:00' AND '00:00:00' GROUP BY Date;"; //You don't need a ; like you do in SQL

$result = mysqli_query($con,$query);
$result1 = mysqli_query($con,$query1);
$result2 = mysqli_query($con,$query2);
$resultMrng = mysqli_query($con,$queryMorning);
$resultAftrn = mysqli_query($con,$queryAfternoon);
$resultEve = mysqli_query($con,$queryEvening);
$resultNight = mysqli_query($con,$queryNight);


$date=[];
$sumDaily=[];
$avgDaily=[];
$sumMonthly=[];
$monthNum =[];
$timeMrng = [];
$timeAftrn = [];
$timeEve = [];
$timeNight = [];


while($row = mysqli_fetch_array($result)){  
  $sumDaily[] =  (int)$row['SumDaily'] ;
  $date[] =  $row['Date'];
}

while($row = mysqli_fetch_array($result1)){  
  $avgDaily[] =  (int)$row['Avg'] ;
  $date[] =  $row['Date'];
}

while($row = mysqli_fetch_array($result2)){  
  $sumMonthly[] =  (int)$row['SumMonth'] ;
  $date[] =  (int)$row['Date'];
  $monthNum[] =$row['MONTH(Date)'];
}

while($row = mysqli_fetch_array($resultMrng)){  
  $timeMrng[] =  (int)$row['SUM(VolumeOfWater)'] ;
  $nonArrayTimeMor = (int)$row['SUM(VolumeOfWater)'] ;
}

while($row = mysqli_fetch_array($resultAftrn)){  
  $timeAftrn[] =  (int)$row['SUM(VolumeOfWater)'] ;
  $nonArrayTimeAft = (int)$row['SUM(VolumeOfWater)'] ;
}

while($row = mysqli_fetch_array($resultEve)){  
  $timeEve[] =  (int)$row['SUM(VolumeOfWater)'] ;
  $nonArrayTimeEve = (int)$row['SUM(VolumeOfWater)'] ;
}

while($row = mysqli_fetch_array($resultNight)){  
  $timeNight[] =  (int)$row['SUM(VolumeOfWater)'] ;
  $nonArrayTimeNight = (int)$row['SUM(VolumeOfWater)'] ;
}
  
  mysqli_close($con);
?>

<!-- Table -->
<div id = "today"></div>
<h1>My Daily Usage</h1>
<br><br>
<div class=myflex>
<section class="center">
  <div class="table__wrapper">
<?php

include("connection.php");
session_start();
$sensor = $_SESSION['Sensor'];
$query = "Select Date, SUM(VolumeOfWater) from WaterSensor.Readings Where SensorID = '$sensor' GROUP BY Date"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);

echo "<table id='basic-data-table' class='table' style='width:75%'>
  <thead>
    <tr>
      <th>Date</th>
      <th>Total Daily Usage (in l)</th>
      </tr>
  </thead>";


while($row = mysqli_fetch_array($result))
{
echo "<tbody>" ; 
echo "<tr>";
echo "<td>" . $row['Date'] . "</td>";
echo "<td>" . $row['SUM(VolumeOfWater)'] . "</td>";
echo "</tr>";
echo "</tbody>" ; 
}

echo "</table>";
mysqli_close($con);
?>
  </div>
</section>
<div id="containerDaily" class= "lineGraph"></div>
</div>


<h1>My usage based on time </h1>
<br><br>
<div class=myflex>
<section class="center">
  <div class="table__wrapper">
<?php

include("connection.php");
session_start();
$sensor = $_SESSION['Sensor'];
$query = "Select Date, SUM(VolumeOfWater) from WaterSensor.Readings Where SensorID = '#01' AND Time BETWEEN '00:00:00' AND '12:00:00' GROUP
BY Date;"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);

echo "<table id='basic-data-table' class='table' style='width:75%'>
  <thead>
    <tr>
      <th>Date</th>
      <th>Average Daily Usage (in l)</th>
      </tr>
  </thead>";


while($row = mysqli_fetch_array($result))
{
echo "<tbody>" ; 
echo "<tr>";
echo "<td>" . $row['Date'] . "</td>";
echo "<td>" . $row['SUM(VolumeOfWater)'] . "</td>";
echo "</tr>";
echo "</tbody>" ; 
}

echo "</table>";
mysqli_close($con);
?>
  </div>
</section>


<div id="containerPie"></div>

</div>
<br><br>

<div id="month"></div>
<h1>My monthly usage</h1>
<br><br>
<div class=myflex>
<section class="center">
<div class="table__wrapper">
<?php

include("connection.php");
session_start();
$sensor = $_SESSION['Sensor'];
$query = "Select Date, SUM(VolumeOfWater), MONTH(Date) from WaterSensor.Readings Where SensorID = '$sensor' GROUP BY Month(Date)"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);

echo "<table id='basic-data-table' class='table' style='width:75%'>
  <thead>
    <tr>
      <th>Month</th>
      <th>Total Monthly Usage (in l)</th>
      </tr>
  </thead>";


while($row = mysqli_fetch_array($result))
{
echo "<tbody>" ; 
echo "<tr>";
// echo "<td>" . $row['MONTH(Date)'] . "</td>";
// while($row['MONTH(Date)'] <='12')
// {
  if ($row['MONTH(Date)'] == "1"){
    echo "<td>" . 'Jan' . "</td>";
  }
  elseif ($row['MONTH(Date)'] == "2"){
    echo "<td>" . 'Feb' . "</td>";
  }
  elseif ($row['MONTH(Date)'] == "3"){
    echo "<td>" . 'Mar' . "</td>";
  }
  elseif($row['MONTH(Date)'] == "4"){
    echo "<td>" . 'Apr' . "</td>";
  }
  elseif($row['MONTH(Date)'] == "5"){
    echo "<td>" . 'May' . "</td>";
  }
  elseif($row['MONTH(Date)'] == "6"){
    echo "<td>" . 'Jun' . "</td>";
  }
  elseif($row['MONTH(Date)'] == "7"){
    echo "<td>" . 'Jul' . "</td>";
  }
  elseif($row['MONTH(Date)'] == "8"){
    echo "<td>" . 'Aug' . "</td>";
  }
  elseif($row['MONTH(Date)'] == "9"){
    echo "<td>" . 'Sept' . "</td>";
  }
  elseif($row['MONTH(Date)'] == "10"){
    echo "<td>" . 'Oct' . "</td>";
  }
  elseif($row['MONTH(Date)'] == "11"){
    echo "<td>" . 'Nov' . "</td>";
  }
  else{
    echo "<td>" . 'Dec' . "</td>";
  }

// } 

echo "<td>" . $row['SUM(VolumeOfWater)'] . "</td>";
echo "</tr>";
echo "</tbody>" ; 
}

echo "</table>";
mysqli_close($con);
?>
  </div>
</section>

<div id="containerMonth" class= "lineGraph"></div>
</div>


<br><br>

<script>

function myFunction() {
						var x = document.getElementById("menu");
						if (x.style.display === "none") {
							x.style.display = "flex";
						} else {
							x.style.display = "none";
						}
					}

</script>


<script>


  var chart = new Highcharts.Chart({
  chart: {
    renderTo: 'containerDaily',
    marginBottom: 80
  },
  title: {
      text: 'Daily Water Usage (in litres)',
  },
  xAxis: {
    categories: <?php echo json_encode($date); ?>,
    title: {
            text: 'Dates'
          },
    labels: {
      rotation: 0,
      style: {
                color: 'black'
            }
    }
  },

  series: [{
    showInLegend: false,
    data: <?php echo json_encode($sumDaily); ?>       
  }]
});

// var chart = new Highcharts.Chart({
//   chart: {
//     renderTo: 'containerDailyAvg',
//     marginBottom: 80
//   },
//   title: {
//       text: 'Daily Average Usage',
//   },
//   xAxis: {
//     categories: <?php echo json_encode($date); ?>,
//     labels: {
//       rotation: 90
//     }
//   },

//   series: [{
//     data: <?php echo json_encode($avgDaily); ?>     
//   }]
// });


var chart = new Highcharts.Chart({
  chart: {
    renderTo: 'containerMonth',
    marginBottom: 80
  },
  title: {
      text: 'Total Monthly Usage ',
  },
  xAxis: {

    categories:  <?php echo json_encode($monthNum); ?>,
    title: {
            text: 'Months'
          },
    labels: {
      formatter: function() {
          // custom formatter
          if (this.value == "1") {
            return 'Jan';

          } else if (this.value == "2") {
            return 'Feb';
    
          }else if (this.value == "3") {
            return 'Mar';
    
          }else if (this.value == "4") {
            return 'Apr';
    
          }else if (this.value == "5") {
            return 'May';
    
          }else if (this.value == "6") {
            return 'Jun';
    
          }else if (this.value == "7") {
            return 'Jul';
    
          }else if (this.value == "8") {
            return 'Aug';
    
          }else if (this.value == "9") {
            return 'Sept';
    
          }else if (this.value == "10") {
            return 'Oct';
    
          }else if (this.value == "11") {
            return 'Nov';
    
          }else  {
            return 'Dec';
    
          }
        },
      rotation: 0,
      style: {
                color: 'black'
            },
    }
  },

  series: [{
    showInLegend: false,
    data: <?php echo json_encode($sumMonthly); ?>       
  }]
});


// Highcharts.chart('containerPie', {
//     chart: {
//         plotBackgroundColor: null,
//         plotBorderWidth: null,
//         plotShadow: false,
//         type: 'pie'
//     },
//     title: {
//         text: 'My usage during the day'
//     },
//     tooltip: {
//         pointFormat: 'Usage: <b>{point.y:.1f}L</b>'
//     },
//     accessibility: {
//         point: {
//             valueSuffix: 'L'
//         }
//     },
//     plotOptions: {
//         pie: {
//             allowPointSelect: true,
//             cursor: 'pointer',
//             dataLabels: {
//                 enabled: true,
//                 format: '<b>{point.name}</b>:Litres'
//             }
//         }
//     },
//     series: [{
//         name: 'Usage',
//         colorByPoint: true,
//         data: [{
//             name: 'Morning',
//             y: <?php echo $nonArrayTimeMor; ?>,
//             sliced: true,
//             // selected: true
//         }, {
//             name: 'Afternoon',
//             y: <?php echo $nonArrayTimeAft; ?>
//         }, {
//             name: 'Evening',
//             y: <?php echo $nonArrayTimeEve ?>
//         }, {
//             name:  'Night',
//             y: <?php echo json_encode($timeNight); ?>
//         }]
//     }]
// });



</script>


 </body>
</html>
<?php else: ?>
    <html>
      <body>
    <a href="phpLogin.php" id="login"> Please Login first! </a>
      </body>
    </html>
<?php endif; ?>