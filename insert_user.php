<?php
session_start();
include('connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';
function sendemail_verify($name,$email,$token) {
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mdnajmulislam10992@gmail.com';                     //SMTP username
    $mail->Password   = 'hrnocmjhkyxmrhmu';                               //SMTP password
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mdnajmulislam10992@gmail.com', $name);
    $mail->addAddress($email);
    
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email verification from khabarchuri';
    $email_template = "
    <h2>You have register with khabarchuri </h2>
    <h5>Verify your email address to login with the below given link </h5>
    <br/>
    <br/>
    <a href='http://localhost/login-registration-with-verification/verify-email.php?token=$token'>Click Me </a>
    ";
    $mail->Body    = $email_template;
    $mail->send();
    // echo 'Message has been sent';
}

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $token = md5(rand()); //create random alphanumeric 

    $email_pattern = 
    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email)){
        $_SESSION['status'] = "Email Id Already Exist";
        header("location: register.php");
    } else {
        // insert user
        $query = "INSERT INTO `users`( `name`, `phone`, `email`, `password`, `token`) VALUES ('$name','$phone','$email','$password','$token')";
        $query_check = mysqli_query($con,$query);
        if($query_check) {
            sendemail_verify("$name","$email","$token");
            $_SESSION['status'] = "Registration Successfull.! Please Verify Your Email Address";
            header("location: register.php");
        } else {
            $_SESSION['status'] = "registration Fail";
            header("location: register.php");
        }
    }
}

?>