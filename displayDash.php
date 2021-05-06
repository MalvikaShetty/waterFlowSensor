<?php 
if (isset($_SESSION['loggedin'])){
  header("Location:dashboard.php");
}
else{
  header("Location:phpLogin.php");
}
?>