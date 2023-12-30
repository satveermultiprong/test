<?php
session_start();
$time = 60*60;
if(isset($_SESSION["last active time"])){
    if((time() - $_SESSION["last active time"])>$time){
        header("location:http://localhost/test/logout.php");
        die();
    }
      
}

$_SESSION["last active time"]=time();

if(!isset($_SESSION["logedin"]) || $_SESSION["logedin"]=!true){
    header("location:http://localhost/test/login.php");
    exit();
}
header("Refresh:60*60");

?>