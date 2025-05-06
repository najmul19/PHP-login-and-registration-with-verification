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
            <div class="card-header">
                <h5>Login Form</h5>
            </div>
            <div class="card-body">
               <form action="loginaction.php" method="post">
                <div class="from-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="from-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </div>
               </form>
            </div>
        </div>
      </div>
      </div>
    </div>
</div>




<?php include('index/footer.php') ?>