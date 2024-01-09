<?php
session_start();
unset($_SESSION["last active time"]);
session_destroy();
header("location:{$baseurl}login.php");
?>