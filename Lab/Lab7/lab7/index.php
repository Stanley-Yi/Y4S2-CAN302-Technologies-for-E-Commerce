<?php
session_start(); //key statement to check session.
include("includes/db.php");
//check the login status. Redirect the un-login users to login page.
if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else{     //get the info of current admin user.
    $admin = $_SESSION['can302'];
    $get_admin = "select * from admin where email='$admin'";
    $run_admin = mysqli_query($con,$get_admin);
    $row_admin = mysqli_fetch_array($run_admin);
    $nickname = $row_admin['nickname'];
    $admin_id = $row_admin['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAN302</title>
    <link rel="stylesheet" href="/can302/styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="/can302/font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/can302/styles/style.css">
    <script src="/can302/js/jquery-331.min.js"></script>
    <script src="/can302/js/bootstrap-337.min.js"></script>          
</head>
<body>
    <div id="wrapper"><!-- #wrapper begin -->       
    <?php include("includes/frame.php"); ?> <!-- include the nav part in frame.php -->
        <div id="page-wrapper"><!-- #page-wrapper begin, the funciton area is here -->
            <div class="container-fluid"><!-- using container-fluid to gain the max width. include the function part file --> 
                <?php    
                if (isset($_GET['dashboard'])) {
                    include("includes/dashboard.php");
                }  
                elseif (isset($_GET['category'])) {
                    $target = explode('#', $_GET['category'])[0];
                    include("category/$target.php");
                }  
                elseif (isset($_GET['product'])) {
                    $target = explode('#', $_GET['product'])[0];
                    include("product/$target.php");
                }  
                elseif (isset($_GET['profile'])) {
                    include("includes/profile.php");
                }  
                ?>                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->
</body>
</html>
<?php } ?>