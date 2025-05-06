<?php
session_start();
if (isset($_POST['login'])) {
    if(!empty(trim($_POST['email'])) and !empty(trim($_POST['password']))){

    
        include 'connect.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        $check = mysqli_query($con, "SELECT * FROM `users` WHERE email='$email' AND password='$password'");

        if(mysqli_num_rows($check)){
            session_start();
            $_SESSION['email']=  $email;
            echo "<script>location.href='home.php'</script>";

        }else{
            $_SESSION['status'] = "wrong email or password!";
            header("location: login.php");
        }
    } else {
        $_SESSION['status'] = "All fiesld are mandatory!";
        header("location: login.php");
    }
} else {
    echo "<script>alert('donot access from url')</script>";
    echo "<script>location.href='login.php'</script>";
}
