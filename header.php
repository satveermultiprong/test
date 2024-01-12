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
    <nav>
        <span class="material-symbols-outlined open" onclick="toggleSidebar()">menu</span>
        <h2>Multi-Expense</h2>

    </nav>
    <div class="sidebar" id="sidebar">
        <a href="deshboard.php"> <h1>Multi-Expense</h1></a>
           
            <div class="content">
            <a href="deshboard.php" id="desh"><i class="material-icons" foraccesskey="desh" >&#xe871;</i> Dashboard</a>
            </div>

            <div class="content">
                <a href="add.php"><i class="material-icons">playlist_add</i>Add Expense</a>
            </div>
            
            <div class="content">
                <a href="manage_categories.php"><i class="material-icons">category</i>Categories</a>
            </div>
            <!-- <a href="">Category</a> -->
            <div class="content">
            <a href="report.php"> <i class="material-icons">history</i>Transactions</a>
            </div>

           
            <div class="content">
             <a href="logout.php"> <i class="material-icons" >logout</i>Logout</a>
            </div>
           
    </div>
</body>
<script>
     function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        var toggleButton = document.querySelector('.open');

        if (sidebar.style.left === "0px" || sidebar.style.left === "") {
            sidebar.style.left = "-50vw";
            toggleButton.textContent = 'menu';
        } else {
            sidebar.style.left = "0";
            toggleButton.textContent = 'close';
        }
    }
</script>
</html>