<?php
require("includes/db.php");
session_start();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $service_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO cart(user_id, service_id) VALUES('$user_id', '$service_id')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: cart.php');
}
?>   