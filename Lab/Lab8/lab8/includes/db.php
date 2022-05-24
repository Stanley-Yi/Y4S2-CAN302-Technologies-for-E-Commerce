<?php

$con = mysqli_connect("localhost", "root", "", "can302");
if (mysqli_connect_errno($con)) { 
    die("Connect to MySQL failed: " . mysqli_connect_error()); 
}

?>