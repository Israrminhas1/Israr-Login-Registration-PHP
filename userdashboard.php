<?php require("config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="http://localhost/Myproject/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <?php
         spl_autoload_register(function ($class) {
             include 'classes/' . $class . '.php';
         });
        if (isset($_SESSION['logged_in'])
         && $_SESSION['logged_in']==true
        ) {
            $test1 = new usernav();
        } else {
             header("location:index.php");
         }
         ?>
        welcome to user dashboard
<a href='logout.php'>Logout</a>
    </header>
</body>
</html>