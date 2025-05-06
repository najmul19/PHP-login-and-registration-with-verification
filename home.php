<?php 
session_start();
$page_title = "Home Page";
include('index/header.php');
include('index/navbar.php');
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <?php if(isset($_SESSION['email'])): ?>
                        <h2 class="mb-4 text-primary">Welcome to Khabarchuri!</h2>
                        <h5 class="mb-3">Hello, <span class="text-success"><?= htmlspecialchars($_SESSION['email']) ?></span></h5>
                        <a href="logout.php" class="btn btn-danger btn-lg px-4">Logout</a>
                    <?php else: ?>
                        <h4>Please <a href="login.php">log in</a> to view this page.</h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('index/footer.php'); ?>
