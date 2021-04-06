<?php

include('connection.php');
session_start();
$username = $_POST['user'];  
$password = $_POST['pass'];  
  
    // to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  
  
    $sql = "select * from user where Username = '$username' and Password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    $_SESSION['username']=$username;
    

    if($count == 1){  
        header("Location:home.php");
        echo "<h1><center> Login successful </center></h1>";  
    }  
    else{  
        $_SESSION['error']='Login failed. Invalid username or password.';
        header("Location:phpLogin.php");
    } 

    mysqli_close($con);    

// if(isset($_POST["username"])){

//     $uname = $_POST["user"];
//     $password = $_POST["pass"];

//     $sql = "SELECT * FROM user WHERE username='".$uname."'AND password='".$password."' limit 1";

//     $result =mysqli_query($conn,$sql);

//     if(mysqli_stmt_num_rows($result)==1){
//         header("Location:home.html");
//         exit();
//     }
//     else{
//         header("Location:phpLogin.html");
//         exit();
//     }
//   }

?>