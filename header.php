<?php
require("timeout.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media_style.css">
    <title>Document</title>
    <style>
        * {
            margin: 0%;
            padding: 0%;
        }

   
    </style>
</head>

<body>
    <header>
        <div class="con">
            <h1>Multi Expense</h1>
           
            <div class="content">
            <i class="material-icons" foraccesskey="desh" >&#xe871;</i>
            <a href="deshboard.php" id="desh"> Dashboard</a>
            </div>

            <div class="content">
                <i class="material-icons">playlist_add</i>
                <a href="add.php">Add Expense</a>
            </div>
            <!-- <a href="">Category</a> -->
            <div class="content">
            <i class="material-icons">history</i>
            <a href="report.php">Transection</a>
            </div>

           
            <div class="content">
            <i class="glyphicon" >&#xe163;</i>
             <a href="logout.php">Logout</a>
            </div>
           
        </div>
    </header>
</body>

</html>