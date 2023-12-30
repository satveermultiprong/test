<?php
include "config.php";

if(isset($_POST['submit'])){
   $fullname =  $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO admin (fullname, username, email, password) VALUES
    ('$fullname', '$username', '$email', '$password')";

    // $sql = "INSERT INTO admin SET 
    //     (fullname = '$fullname' ,
    //      username = '$username',
    //      email = '$email' ,  
    //      password = '$password')
    //  ";

$result = mysqli_query($con ,$sql);

if($result==true){

header("Location:http://localhost/test/login.php");

exit();
    } else {
        // Handle the error, e.g., display an error message
        echo "Error: " . mysqli_error($con);
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0%;
            padding: 0%;
        }

        .con {
            height: 300px;
            width: 350px;
            background-color: #a4b0be;
            text-align: center;
            justify-content: center;
            align-items: center;
            /* display: flex; */
            top: 200px;
            border: 2px solid black;
            margin-top: 10%;

        }
        label
        {
            font-size: 20px;
        }
        input{
            box-sizing: border-box;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <center>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" >
        <div class="con"><br>
            <h1>Sinup</h1> <br> 
            <label for="fullname" id="name">full name</label>
            <input type="text" name="fullname" id="name" required><br><BR>

                <label for="username" id="username" >Username</label>
            <input type="text" name="username" id="username" required><br><BR>

                <label for="email" id="email">email-id</label>
            <input type="email" name="email" id="" required><br><BR>
    
            <label for="" id="password">Password</label>
            <input type="text" name="password" id="" required><br> <br>
            
            <input type="submit" value="submit" name="submit"><br>
            <a href="login.php">login</a>
    
        </div>
        </form>
        
    </center>

</body>

</html>