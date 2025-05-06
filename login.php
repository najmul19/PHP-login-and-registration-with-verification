<?php 
$page_title = "Login Page";
include('index/header.php');
include('index/navbar.php');
?>


<div class="py-5">
    <div class="container">
      <div class="row justify-content-center">
      <div class="col-md-8">
        <?php
            if(isset($_SESSION['status'])){
                 ?>
                 <div class="alert">
                    <h5><?=$_SESSION['status'];?></h5>
                 </div>
                 <?php
                 unset($_SESSION['status']);
            } 
        ?>
      <div class="card shadow">
            <div class="card-header text-center">
                <h5>Login Form</h5>
            </div>
            <div class="card-body">
               <form action="loginaction.php" method="post">
                <div class="from-group mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="from-group mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary form-control" name="login">Login</button>
                    </div>
                   <div class="text-center">
                        <small>New this page? </small> <span class="text-primary"> <a href="register.php">Register</a></span>
                   </div>
               </form>
            </div>
        </div>
      </div>
      </div>
    </div>
</div>




<?php include('index/footer.php') ?>