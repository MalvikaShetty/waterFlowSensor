<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    Hey Buddy!
    <?php

    session_start();
    $name = $_SESSION['username'];
    echo "Welcome, ";
    echo $name;
    ?>
    <br />
    <br />
    <a href="logout.php" style="border:solid;padding:0.2em;text-decoration: none;">Logout</a>
</body>

</html>