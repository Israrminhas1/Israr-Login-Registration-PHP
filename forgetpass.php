<?php
require('config.php');
session_start();
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
}); 
$test2 = new mynav();
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
}?>
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
    <h1 class="text-center">Forget Password</h1>
<div class='container my-4'>
        <div class='row justify-content-center'>
        <div class='col-4'>
<form  method="POST"
              action="auth.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name='email' aria-describedby="emailHelp">
  </div>
 
  <button name='forgetpass' type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</body>
</html>
