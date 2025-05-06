<?php

if (isset($_POST['login'])) {
    include 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($con, "SELECT * FROM `users` WHERE email='$email' AND password='$password'");

    if(mysqli_num_rows($check)){
        session_start();
        $_SESSION['email']=  $email;
        echo "<script>location.href='home.php'</script>";

    }else{
        echo "<script>alert('wrong username or password')</script>";
    echo "<script>location.href='login.php'</script>";

    }
} else {
    echo "<script>alert('donot access from url')</script>";
    echo "<script>location.href='login.php'</script>";
}
