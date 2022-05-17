<?php

session_start(); //key statement to check session.
include("includes/db.php");
//check the login status. Redirect the un-login users to login page.
if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else{
  
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
        <h2 class="text-center"> Session can302 has value: <?php echo $_SESSION['can302']?> </h2>
        <br>
        <a href="logout.php">
            <button class="btn btn-primary" type="submit" name="logout">Logout</button>
        </a>
    </div><!-- container finish --> 
</body>
</html>
<?php } ?>