<?php

session_start();
include "connect.php";
if($_GET['token']) {
    $token = $_GET['token'];
    $verify_query = "SELECT token,verify_status FROM users WHERE token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($con, $verify_query);
    if(mysqli_num_rows($verify_query_run)) {
        $row = mysqli_fetch_array($verify_query_run);
        echo $row['token'];
        if($row['verify_status'] == '0') {
            $clicked_token = $row['verify_status'];
            $update_query = "UPDATE users SET verify_status='1' WHERE token='$clicked_token' LIMIT 1";
            $update_query_run=mysqli_query($con,$update_query);

            if($update_query_run){
                $_SESSION['status'] = "Your email has been verified successfully!";
                header("location: login.php");
            } else {
                $_SESSION['Verification Failed'];
                header("location: login.php");
            }
        } else {
            $_SESSION['status'] = "Email Already Verified. Please Login";
            header("location: login.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "This Token Does not exist";
        header("location: login.php");
    }
} else {
    $_SESSION['status'] = "Not Aloowed";
    header("location: login.php");
}
?>