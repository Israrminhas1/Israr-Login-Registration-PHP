<?php
    require('config.php');
    session_start();
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="http://localhost/Myproject/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
</head>
<body>
<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});
$test = new mynav();
if (
    isset($_SESSION['logged_in'])
    && $_SESSION['logged_in'] == true
) {
    header("location:userdashboard.php");
} else {
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
                echo "<div class='alert alert-$_GET[status]' role='alert'>
                $message[$code]
                </div>";
            }
        }
    }
}

?>
<h1 class="text-center">Register to our website</h1>
    <div class="container my-4">
        <div class="row justify-content-center">
        <div class="col-4">
   
        <form class="row g-3" method='POST' action="auth.php">
        <div class="col-12">
    <label for="inputName" class="form-label">Name</label>
    <input type='text' class='form-control' id='inputName' name="name" placeholder='Enter Name' value="<?php if (isset($_SESSION['name'])){ echo $_SESSION['name']; $_SESSION["name"]="";}?>" >
    <span style="color:red"><?php if (isset($_SESSION['nameError'])){ echo $_SESSION['nameError']; unset($_SESSION['nameError']);}?></span>
  </div>
  <div class='col-12'>
    <label for='inputPhone' class='form-label'>Phone</label>
    <input type='text' class='form-control' id='inputphone' name='phone' placeholder='Enter Your Phone Number' value="<?php if (isset($_SESSION['phone'])){  echo $_SESSION['phone']; $_SESSION["phone"]="";}?>">
    <span style="color:red"><?php if (isset($_SESSION['errorPhone'])){ echo $_SESSION['errorPhone']; unset($_SESSION["errorPhone"]);}?></span>
  </div>
  <div class='col-md-6'>
    <label for='inputEmail4' class='form-label'>Email</label>
    <input type='email' class='form-control' name='email' id='inputEmail4' value="<?php if (isset($_SESSION['email'])){  echo $_SESSION['email']; $_SESSION["email"]="";}?>">
    <span style="color:red"><?php if (isset($_SESSION['emailError'])){ echo $_SESSION['emailError']; unset($_SESSION['emailError']);}?></span>
  </div>
  <div class='col-md-6'>
    <label for='inputPassword4' class='form-label'>Password</label>
    <input type='password' class='form-control' name='password' id='inputPassword4'>
    <span style="color:red"><?php if (isset($_SESSION['errorPassword'])){ echo $_SESSION['errorPassword']; unset($_SESSION["errorPassword"]);}?></span>

  </div>
 
  <div class='col-12'>
      
    <button type='submit' class='btn btn-primary' name='register'>Register</button>
  </div>
  <br>
  <a href='index.php'>Click here to login</a>
</form>
</div>
</div>
  </div>
</body>
</html>