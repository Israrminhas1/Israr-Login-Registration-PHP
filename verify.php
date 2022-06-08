<?php
require('config.php');
if (isset($_GET['v_code'])) {
    $query = "SELECT * FROM `registered` WHERE `verification_code` = '$_GET[v_code]'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['active'] == 0) {
                $update = "UPDATE `registered` SET `active` = '1' WHERE `email` = '$result_fetch[email]'";
                if (mysqli_query($conn, $update)) {
                    header("location:index.php?status=primary&code=132");
                //  echo "
                    // <script>alert('Email Verfication Successful');
                    // window.location.href = 'index.php'
                    // </script>";
                } else {
                    header("location:index.php?status=primary&code=131");
                    // echo "
                    // <script>alert('email already registered');
                    // window.location.href = 'index.php'
                    // </script>";
                }
            } else {
                header("location:index.php?status=primary&code=131");
                // echo "
            // <script>alert('Already Registered');
            // window.location.href = 'index.php'
            // </script>";
            }
        }
    } else {
        header("location:index.php?status=danger&code=125");
    }
}
