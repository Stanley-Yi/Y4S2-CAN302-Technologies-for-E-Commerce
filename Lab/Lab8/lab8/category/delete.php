<?php

if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
elseif(isset($_GET['id'])) {
    $delete_p_cat_id = $_GET['id'];
    $delete_p_cat = "delete from product_category where id='$delete_p_cat_id'";
    $run_p_cat = mysqli_query($con,$delete_p_cat);
    if ($run_p_cat) {
        echo "<script>alert('Delete one product category successfully.')</script>";
        echo "<script>window.open('index.php?category=view','_self')</script>";
    }
}

?>
