<?php

function mydh($remaind, $generator, $prv){
    $prime = 99991;
    if ($prv == 1){
        $remaind = ($remaind * $generator) % $prime;
        return $remaind; 
    }
    else{
        $prv -=1;
        $remaind = ($remaind * $generator) % $prime;   
        return mydh($remaind, $generator, $prv);
    }
}

    
?>