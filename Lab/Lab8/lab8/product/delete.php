<?php

if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
elseif(isset($_GET['id'])) {
    $delete_id = $_GET['id'];
    $delete_pro = "delete from product where id='$delete_id'";
    $run_delete = mysqli_query($con,$delete_pro);
    if ($run_delete) {
        echo "<script>alert('One product has been deleted')</script>";
        echo "<script>window.open('index.php?product=view','_self')</script>";
    }
}

?>
