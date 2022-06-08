<?php
    require('config.php');
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code)
{ echo $v_code;
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
        require 'PHPMailer/Exception.php';
        
 
$yahoo_mail = new PHPMailer;
 
$yahoo_mail->IsSMTP();
// Send email using Yahoo SMTP server
$yahoo_mail->Host = 'smtp.mail.yahoo.com';
// port for Send email
$yahoo_mail->Port = 465;
$yahoo_mail->SMTPSecure = 'ssl';
$yahoo_mail->SMTPDebug = 1;
$yahoo_mail->SMTPAuth = true;
$yahoo_mail->Username = 'minhasisrar@yahoo.com';
$yahoo_mail->Password = 'cdaatexibzxcufgl';
 
$yahoo_mail->From = 'minhasisrar@yahoo.com';
$yahoo_mail->FromName = 'Israr';// frome name

$yahoo_mail->AddAddress($email);  // Name is optional
 
$yahoo_mail->IsHTML(true); // Set email format to HTML
 
$yahoo_mail->Subject = 'Here is the subject for onlinecode';
$yahoo_mail->Body     = "Thanks for registrations
Click the Link below to verify the email address
<a href='http://localhost/Myproject/verify.php?v_code=$v_code'>Verify</a>'
";

 
if(!$yahoo_mail->Send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $yahoo_mail->ErrorInfo;
exit;
}
else
{
return true;
}
    //     $mail = new PHPMailer(true);

    // try {
    //         //Server settings
    //         $mail->isSMTP();                                            //Send using SMTP
    //         $mail->Host       = 'smtp.mail.yahoo.com';                     //Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //         $mail->Username   = 'minhasisrar@yahoo.com';                     //SMTP username
    //         $mail->Password   = 'Cruv456$';                               //SMTP password
    //         $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    //         $mail->Port       = 465;

    //         //Recipients
    //         $mail->setFrom('minhasisrar@yahoo.com', 'israr minhas');
    //         $mail->addAddress($email);     //Add a recipient



    //         //Content
    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = 'Email Verification From Israr -Login System';
            // $mail->Body    = "Thanks for registrations
            // Click the Link below to verify the email address
            // <a href='http://localhost/Myproject/verify.php?v_code=$v_code'>Verify</a>'
            // ";


    //         $mail->send();
    //         return true;
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }
}
function forgetMail($email)
{
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';
    $mail = new PHPMailer(true);

try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'cruvdown11@gmail.com';                     //SMTP username
        $mail->Password   = 'Israr456$';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('cruvdown11@gmail.com', 'israr minhas');
        $mail->addAddress($email);     //Add a recipient



        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset For Israr -Login System';
        $mail->Body    = "Reset password
        Click the Link below to reset your password
        <a href='http://localhost/Myproject/resetpass.php?email=$email'>Verify</a>'
        ";


        $mail->send();
        return true;
} catch (Exception $e) {
        return false;
}
}
    #Israr Login

if (isset($_POST['login'])) {
    if (empty($_POST['email']) ||  empty($_POST['password']))
    { 
        if (empty($_POST['email'])){
            $_SESSION['errorEmail'] = "Please Enter Email Address";
     
            
            
        }
        if (empty($_POST['password'])){
            $_SESSION['errorPassword'] = "Please Enter Password";
        }
        header("location:index.php");
        }
    else{ $query = "SELECT * FROM `registered` WHERE `email` = '$_POST[email]'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $result_fetch = mysqli_fetch_assoc($result);
                if ($result_fetch['active'] == 1) {
                    if (
                        password_verify($_POST['password'], $result_fetch['password'])
                    ) {
                            $_SESSION['logged_in'] = true;
                            $_SESSION['name'] = $result_fetch['name'];
                            $_SESSION['phone'] = $result_fetch['phone'];
    
                            header("location:index.php?status=success&code=130");
                    } else {
                            header("location:index.php?status=danger&code=129");
                    }
                } else {
                        header("location:index.php?status=danger&code=128");
                }
            } else {
                    header("location:index.php?status=danger&code=127");
            }
        } else {
                header("location:index.php?status=danger&code=125");
        }}
   
}
    #My Registration
    
if (isset($_POST['register'])) {
    $nameErr = $emailErr = $phoneErr ="";
$name = $email = $phone = "";
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $_SESSION['nameError']=$nameErr;
      } else {
        $name = test_input($_POST["name"]);
        $_SESSION['name']=$name;
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
          $_SESSION['nameError']=$nameErr;
        }
      }
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $_SESSION['emailError']=$emailErr;
      } else {
        $email = test_input($_POST["email"]);
        $_SESSION['email']=$email;
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $_SESSION['emailError']=$emailErr;
        }
      }
      if (empty($_POST['password'])){
         $_SESSION['errorPassword'] = "Please Enter Password";
        }
    if (empty($_POST['phone'])){
            $phoneErr=" Please Enter phone";
           $_SESSION['errorPhone']=$phoneErr;
    } else {
            $phone = test_input($_POST["phone"]);
            $_SESSION['phone']=$phone;
        if (!preg_match("/^[0-9]*$/", $phone)) {
             $phoneErr="Please Enter Number(0-9)";
          $_SESSION['errorPhone']=$phoneErr;
                }
    }

      if(empty($_POST["name"])
       || !preg_match("/^[a-zA-Z-' ]*$/",$name)  || !preg_match("/^[0-9]*$/", $phone)
       || empty($_POST["email"]) 
       || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($_POST['password']) || empty($_POST['phone'] 
      
       )
       ){
        header("location:register.php");
       }
            // if (empty($_POST['email'])){
            //     $_SESSION['errorEmail'] = "Please Enter Email Address";
        
                
                
            // }
            // if (empty($_POST['password'])){
            //     $_SESSION['errorPassword'] = "Please Enter Password";
            // }
            // if (empty($_POST['phone'])){
            //     $_SESSION['errorPhone'] = "Please Enter Phone";
            // }
            // if (empty($_POST['name'])){
            //     $_SESSION['errorName'] = "Please Enter Your Name";
            // }
            // header("location:register.php");
        
        else{ 
            $user_exist_query = "SELECT * FROM `registered` WHERE `email` = '$_POST[email]'";
            $result = mysqli_query($conn, $user_exist_query);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $result_fetch = mysqli_fetch_assoc($result);
                   if ( $result_fetch['active'] == 1) { #email already exist
                        header("location:register.php?status=warning&code=126");
                    }
                    else
                    {
                        header("location:register.php?status=warning&code=133");
                    }
                   
                } else {
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $v_code = bin2hex(random_bytes(16));
                    $query = "INSERT INTO `registered`(`name`, `phone`, `email`, `password`,`verification_code`, `active`) 
                    VALUES ('$_POST[name]','$_POST[phone]','$_POST[email]','$password','$v_code','0')";
                    if (mysqli_query($conn, $query) &&
                       sendMail($_POST['email'], $v_code)
                    ) {
                        header("location:register.php?status=success&code=123");
                    } else {
                       
                           header("location:register.php?status=danger&code=124");
                    }
                }
            } else {
                header("location:register.php?status=danger&code=125");
            }}
    
}

#My Forgetpass
if (isset($_POST['forgetpass'])) {
    $user_notregistered_query = "SELECT * FROM `registered` WHERE `email` = '$_POST[email]'";
    $result = mysqli_query($conn, $user_notregistered_query);
    if($result)
    {  
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
           if ($result_fetch['email'] == $_POST['email'] && forgetMail($_POST['email'])) { #email is registered
                header("location:index.php?status=warning&code=134");
            }       
        } else {
           
            header("location:forgetpass.php?status=warning&code=127");
        }
    } 
    else{
        echo "
        <script>alert('Cannot Run this Query');
        window.location.href='forgetpass.php'
        </script>;";
    }
}

#resetpass
if (isset($_POST['resetpass']))
{
    $user_emailmatch_query = "SELECT * FROM `registered` WHERE `email` = '$_SESSION[email]'";
    $result = mysqli_query($conn, $user_emailmatch_query);
    if($result)
    {     $result_fetch = mysqli_fetch_assoc($result);
          if (
            $_POST['newpassword']==$_POST["password"]
          ){  if (mysqli_num_rows($result) == 1){
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
     $update = "UPDATE `registered` SET `password` = '$password' WHERE `email` = '$result_fetch[email]'";
    if (mysqli_query($conn, $update)) {
        header("location:index.php?status=primary&code=136");
        unset($_SESSION["email"]);
     }
     else {
     header("location:index.php?status=danger&code=125");
    }
}
           
          }
          else{
           
            header("location:resetpass.php?status=danger&code=137");
          }

    }
    else {
        header("location:index.php?status=danger&code=125");
    }
}
