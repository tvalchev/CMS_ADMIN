<?php

function redirect($location){
    header("Location:" . $location);
    //header ("Refresh: 50;URL='$location'"); 
    exit;
}

function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
        return true;
    }

    return false;
}

?>