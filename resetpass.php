<?php
require('config.php');
session_start();

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
}); 
$test2 = new mynav();
if (isset($_GET['email'])) {
    $_SESSION['email'] = $_GET['email'];
}
if (isset($_GET['status'])) {
    if (
        $_SERVER["REQUEST_METHOD"]
        == "GET"
    ) {
        $param = ["success", "warning", "danger", "primary", "light"];
        if (
            in_array($_GET['status'], $param)
            && array_key_exists($_GET['code'], $message)
        ) {
            // show alert
            $code = $_GET['code'];
            echo "<div class = 'alert alert-$_GET[status]' role = 'alert'>
            $message[$code]
            </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForgetPassword</title>
    <link rel="stylesheet" href="http://localhost/Myproject/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">Reset Password</h1>
<div class='container my-4'>
        <div class='row justify-content-center'>
        <div class='col-4'>
        <form method="POST"
              action="auth.php">
        <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">New Password</label>
    <input type="password" class="form-control" name="newpassword" id="exampleInputPassword2">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm New Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
   
  <button type="submit" name="resetpass" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</body>
</html>