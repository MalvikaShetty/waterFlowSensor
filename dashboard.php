<!DOCTYPE html>
<html lang="en" xmlns:ng="https://angularjs.org">

<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Water Usage Calculator | BUY NOW!!</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css" type="text/css">	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <!-- Line chart -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://code.angularjs.org/1.2.21/angular.js"></script>
  <script src="https://code.highcharts.com/highcharts.src.js"></script>


  <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-data-adapter.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/dashboard.css" type="text/css">


</head>

<body>

    <div class="navbar">


        <nav>
            <div style="display:flex;text-align:left;color:black;">
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

<!-- Table -->

<h1>My Daily Usage</h1>

<div class=myflex>
<section class="center">
  <div class="table__wrapper">
<?php

include("connection.php");
session_start();
$query = "Select Date, SUM(VolumeOfWater) from Readings GROUP BY Date"; //You don't need a ; like you do in SQL
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


<h1>My Daily Average Usage</h1>
<div class=myflex>
<section class="center">
  <div class="table__wrapper">
<?php

include("connection.php");
session_start();
$query = "Select Date, AVG(AverageUse) from Readings Group by Date"; //You don't need a ; like you do in SQL
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
echo "<td>" . $row['AVG(AverageUse)'] . "</td>";
echo "</tr>";
echo "</tbody>" ; 
}

echo "</table>";
mysqli_close($con);
?>
  </div>
</section>

<div id="containerDailyAvg" class= "lineGraph"></div>
</div>

<h1>My monthly usage</h1>
<div class=myflex>
<section class="center">
<div class="table__wrapper">
<?php

include("connection.php");
session_start();
$query = "Select Date, SUM(VolumeOfWater) from Readings GROUP BY Month(Date)"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);

echo "<table id='basic-data-table' class='table' style='width:75%'>
  <thead>
    <tr>
      <th>Date</th>
      <th>Total Monthly Usage (in l)</th>
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

<div id="containerMonth" class= "lineGraph"></div>
</div>


<br><br>

<?php
include("connection.php");
session_start();
$query = "Select Date, SUM(VolumeOfWater) from Readings GROUP BY Date ORDER BY YEAR(Date) DESC, MONTH(Date) DESC, DAY(DATE) DESC LIMIT 5;
"; //You don't need a ; like you do in SQL
$query1 = "Select Date, AVG(AverageUse) from Readings Group by Date ORDER BY YEAR(Date) DESC, MONTH(Date) DESC, DAY(DATE) DESC LIMIT 5;
"; //You don't need a ; like you do in SQL
$query2 = "Select Date, SUM(VolumeOfWater) from Readings GROUP BY Month(Date) ORDER BY YEAR(Date) DESC, MONTH(Date) DESC, DAY(DATE) DESC LIMIT 5;
"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);
$result1 = mysqli_query($con,$query1);
$result2 = mysqli_query($con,$query2);

$date=[];
$sumDaily=[];
$avgDaily=[];
$sumMonthly=[];

while($row = mysqli_fetch_array($result)){  
  $sumDaily[] =  (int)$row['SUM(VolumeOfWater)'] ;
  $date[] =  $row['Date'];
}

while($row = mysqli_fetch_array($result1)){  
  $avgDaily[] =  (int)$row['AVG(AverageUse)'] ;
  $date[] =  $row['Date'];
}

while($row = mysqli_fetch_array($result2)){  
  $sumMonthly[] =  (int)$row['SUM(VolumeOfWater)'] ;
  $date[] =  $row['Date'];
}
  
  mysqli_close($con);
?>


<h1>Comparing Popular Phone Models</h1>
<div class=myflex>
<section class="center">
  <div class="table__wrapper">
    <table class="table" summary="This is a summary of your rad table contents.">
      <thead>
        <tr>
          <th scope="col">iPhone 6</th>
          <th scope="col">iPhone 6 Plus</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>4.7 in</td>
          <td>5.5 in</td>
      
        </tr>
      
      </tbody>
    </table>
  </div>
</section>

<div id="container" class= "lineGraph"></div>
</div>



<script>
  var chart = new Highcharts.Chart({
  chart: {
    renderTo: 'containerDaily',
    marginBottom: 80
  },
  title: {
      text: 'Daily Water Usage',
  },
  xAxis: {
    categories: <?php echo json_encode($date); ?>,
    labels: {
      rotation: 90
    }
  },

  series: [{
    data: <?php echo json_encode($sumDaily); ?>       
  }]
});

var chart = new Highcharts.Chart({
  chart: {
    renderTo: 'containerDailyAvg',
    marginBottom: 80
  },
  title: {
      text: 'Daily Average Usage',
  },
  xAxis: {
    categories: <?php echo json_encode($date); ?>,
    labels: {
      rotation: 90
    }
  },

  series: [{
    data: <?php echo json_encode($avgDaily); ?>     
  }]
});


var chart = new Highcharts.Chart({
  chart: {
    renderTo: 'containerMonth',
    marginBottom: 80
  },
  title: {
      text: 'Total Monthly Usage ',
  },
  xAxis: {
    categories: ['Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    labels: {
      rotation: 90
    }
  },

  series: [{
    data: <?php echo json_encode($sumMonthly); ?>       
  }]
});


</script>




</body>
  </html>
