<?php

session_start(); // magic word to start a session.
include("includes/db.php");
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    $get_admin = "SELECT * FROM admin WHERE email='$email' AND passwd='$pass'";
    $run_admin = mysqli_query($con, $get_admin);
    $count = mysqli_num_rows($run_admin);
    if ($count==1) {
        $_SESSION['can302'] = $email; 
        $row_admin = mysqli_fetch_array($run_admin);
        session_regenerate_id();
        echo "<script>alert('Welcome ".$row_admin['nickname']."!')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    }
    else{
        echo "<script>alert('Email or Password is Wrong!')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAN302 Login Demo</title>
    <link rel="stylesheet" href="/can302/styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="/can302/font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/can302/styles/style.css">
    <script src="/can302/js/jquery-331.min.js"></script>
    <script src="/can302/js/bootstrap-337.min.js"></script>
</head>

<body>
    <div class="col-lg-2" style="text-align:center"><!-- container begin -->
    </div>
    <div class="col-lg-8" style="text-align:center"><!-- container begin -->
        <form action="" class="well" method="post"><!-- form begin -->
            <h2 class="form-login-heading text-center"> Admin Login </h2>
            <br>
            <input type="text" class="form-control" placeholder="Email Address" name="email" required>
            <br>
            <input type="password" class="form-control" placeholder="Your Password" name="pass" required>
            <br>
            <button class="btn btn-primary" type="submit" name="login">Login</button>
        </form><!-- form finish -->
    </div><!-- container finish --> 
</body>
</html>
