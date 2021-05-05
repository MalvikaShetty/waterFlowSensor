<?php 
if (!isset($_SESSION['loggedin'])){
  header("Location:phpLogin.php");
}
else{
  header("Location:dashboard.php");
}
?>