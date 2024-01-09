<?php
session_start(); 
if(!isset($_SESSION["logedin"]) || $_SESSION["logedin"]=!true){
    header("location:{$baseurl}login.php");
    
}else{
    header("Location:{$baseurl}deshboard.php");
    exit();
}
?>
