<?php

$con = mysqli_connect("localhost", "root", "", "wonderland");
if (mysqli_connect_errno()) { 
    die("Connect to MySQL failed: " . mysqli_connect_error()); 
}

?>