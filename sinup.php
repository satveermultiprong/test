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

header("Location:{$baseurl}login.php");

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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
  
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
            
            <button type="submit" value="submit" name="submit">Submit</button><br>
            <a href="login.php">login</a>
    
        </div>
        </form>
        

</body>

</html>