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

<section class="center">
  <h1>Comparing Popular Phone Models</h1>
  <div class="table__wrapper">
    <table class="table" summary="This is a summary of your rad table contents.">
      <thead>
        <tr>
          <th scope="row"></th>
          <th scope="col">iPhone 6</th>
          <th scope="col">iPhone 6 Plus</th>
          <th scope="col">Galaxy Note 4</th>
          <th scope="col">HTC One (M8)</th>
          <th scope="col">Samsung Galaxy S5</th>
          <th scope="col">Nokia Lumia 830</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Screen Size</th>
          <td>4.7 in</td>
          <td>5.5 in</td>
          <td>5.7 in</td>
          <td>5 in</td>
          <td>5.1 in</td>
          <td>5 in</td>
        </tr>
      
      </tbody>
    </table>
  </div>
</section>
<section class="center">
  <h1>Your previous usage</h1>
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
      <th>Total Water Usage (l)</th>
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
<br><br>

<!-- <canvas id="myChart" width="20%" height="20"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
      maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script> -->

<?php
include("connection.php");
session_start();
$query = "Select Date, SUM(VolumeOfWater) from Readings GROUP BY Date"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);
$json=[];
$json2=[];
while($row = mysqli_fetch_array($result)){  
  $json[] =  (int)$row['SUM(VolumeOfWater)'] ;
  $json2[] =  $row['Date'];
}
  echo json_encode($json);
  echo json_encode($json2);
  
  mysqli_close($con);
?>

<div id="container" style="height: 400px; width: 500px"></div>

<script>
  var chart = new Highcharts.Chart({
  chart: {
    renderTo: 'container',
    marginBottom: 80
  },
  xAxis: {
    categories: <?php echo json_encode($json2); ?>,
    labels: {
      rotation: 0
    }
  },

  series: [{
    data:<?php echo json_encode($json); ?>        
  }]
});
</script>


</body>
  </html>
