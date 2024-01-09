<?php
session_start();

// if the user is not active for a long time, the user will be automaticlly logout at the set time
$time = 60*60;
if(isset($_SESSION["last active time"])){
    if((time() - $_SESSION["last active time"])>$time){
        header("location:{$baseurl}logout.php");
        die();
    }
      
}

$_SESSION["last active time"]=time();

if(!isset($_SESSION["logedin"]) || $_SESSION["logedin"]=!true){
    header("location:{$baseurl}login.php");
    exit();
}
header("Refresh:60*60");

?>