<?php

require "includes/db.php";
session_start();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $service_id = $_GET["id"];
    $user_id = $_SESSION['user_id'];

    // Delete the rows from user_items table where item_id and user_id equal to the item_id and user_id we got from the cart page and session
    $query = "DELETE FROM cart WHERE service_id='$service_id' AND user_id='$user_id' ";
    $res = mysqli_query($con, $query);
    header("location:cart.php");
}
?>
