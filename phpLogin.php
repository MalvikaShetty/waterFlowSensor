<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="watersensor-try/css/login.css">
</head>
<body>
<div class="img">
    <div class = "frm">  
        <h1 style="text-align:center;"><a style="color:black;text-decoration:none;"  title="Click here to go to Home" href="index.php">Login</a></h1>  
        <form name="f1" action = "auth.php" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label style="font-weight:600;"> Username: </label>  
                <input class='textbox' type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label style="font-weight:600;"> Password: </label>  
                <input class='textbox' type = "password" id ="pass" name  = "pass" />  
            </p>   
            <p>     
                <input type =  "submit" id = "btn" value = "Login" />  
            </p>  
            <?php
             session_start();
             $err = $_SESSION['error'];
             echo $err;
             session_destroy();
            ?>
        </form>  
        <a href="signup.html" class="createacc" >Click here to create an account now!</a>
    </div>  
    
    <script>  
        function validation()  
        {  
            var id=document.f1.user.value;  
            var ps=document.f1.pass.value;  
            if(id.length=="" && ps.length=="") {  
                alert("User Name and Password fields are empty");  
                return false;  
            }  
            else  
            {  
                if(id.length=="") {  
                    alert("User Name is empty");  
                    return false;  
                }   
                if (ps.length=="") {  
                alert("Password field is empty");  
                return false;  
                }  

            }                             
        }  
    </script>  
    </div>
</body>
</html>
