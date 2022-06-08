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
    <title>User - Login and Register</title>
  <link rel="stylesheet" href="http://localhost/Myproject/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
  
</head>
 <body>
 <header>
<?php
if (
    isset($_SESSION['logged_in'])
    && $_SESSION['logged_in'] == true
) {
    header("location:userdashboard.php");
} else {
    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.php';
    });
    $test = new mynav();
    
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
}
?>
</header>
<h1 class="text-center">
    Login to our website
</h1>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-4">
            <form 
              method="POST"
              action="auth.php">
            <div class="mb-3">
                <label 
                for="exampleInputEmail1" 
                class="form-label">
                Email
               </label>
            <input 
            type="email" 
            class="form-control" 
            id="exampleInputEmail1"
            placeholder="E-mail" 
            name="email" 
            aria-describedby="emailHelp">
            <span style="color:red"><?php if (isset($_SESSION['errorEmail'])){ echo $_SESSION['errorEmail']; unset($_SESSION["errorEmail"]);}?></span>
            </div>
        <div class="mb-3">
            <label 
            for="exampleInputPassword1" 
            class="form-label">
            Password
            </label>
            <input 
            type="password" 
            class="form-control"
            id="exampleInputPassword1" 
            placeholder="Password" 
            name="password">
            <span style="color:red"><?php if (isset($_SESSION['errorPassword'])){ echo $_SESSION['errorPassword']; unset($_SESSION["errorPassword"]);}?></span>

        </div>
    <button 
    type="submit" 
    class="btn btn-primary" 
    name="login">
    Login
   </button>
   
<a  href="forgetpass.php">
        Click here for Forget password
    </a>
    <br>
    <a sty href="register.php">
        Click here to register
    </a>
    </form>
    </div>
    </div>
  </div>

</body>
</html>