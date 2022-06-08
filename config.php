
<?php

$message = array("123"=>"Registeration successful-email sent for verification",
 "124"=>"Server down",
  "125"=>"Cannot Run This Query",
  "126"=>"Email already exist",
  "127"=>"Email Not Registered",
  "128"=>"Email Not Verified",
  "129"=>"Incorrect password",
  "130"=>"Successfully login",
  "131"=>"Email Already verified",
  "132"=>"Email Verification Succesfull",
  "133"=>"pending for verification",
  "134"=>"Reset password link has been sent",
  "135"=>"You entered old password, Please enter new password",
  "136"=>"Successfully updated password",
  "137"=>"password did not match"

);
$servername="localhost";
$username="root";
$password="admin123";
$database="dbisrar1";
$conn=mysqli_connect($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>