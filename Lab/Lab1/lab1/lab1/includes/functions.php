<?php

//a safe method to recieve post data.
function mypost($str) { 
    $value = !empty($_POST[$str]) ? $_POST[$str] : '';
    return $value;
}       

?>