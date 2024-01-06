<?php
require("timeout.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
    <span class="material-symbols-outlined open" onclick="open">menu</span>
    <!-- <img src="image/menu_FILL0_wght500_GRAD0_opsz24.png" alt="">    -->
    <div class="sidebar">

       <header>
           <h1>Multi-Ex</h1>
           <span class="material-symbols-outlined back" id="back">close</span>
        </header>      
            <div class="content">
            <a href="deshboard.php" id="desh"><i class="material-icons" foraccesskey="desh" >&#xe871;</i> Dashboard</a>
            </div>

            <div class="content">
                <a href="add.php"><i class="material-icons">playlist_add</i>Add Expense</a>
            </div>
            <!-- <a href="">Category</a> -->
            <div class="content">
            <a href="report.php"> <i class="material-icons">history</i>Transection</a>
            </div>

           
            <div class="content">
             <a href="logout.php"> <i class="glyphicon" >&#xe163;</i>Logout</a>
            </div>
           
    </div>
</body>
<!-- <script>
    function side() {
    }
</script> -->
</html>