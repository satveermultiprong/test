<?php
include "config.php";
$msg="";

if(isset($_POST['submit'])){
   
        $username = $_POST['username'];
    $password = $_POST['password'];
  
   $sql = "select * from admin WHERE username = '$username' AND password = '$password' " ;

   $result = mysqli_query($con ,$sql);

if(mysqli_num_rows($result)>0){
    session_start();
   $_SESSION["logedin"] = "true";
   $_SESSION["last active time"] = time();

// remember me  functionlity

   if(isset($_POST["remember_me"])){
    setcookie("username",$_POST["username"],time()+60*60*24);
    setcookie("password",$_POST["password"],time()+ 60*60*24);
   }
   else{
    setcookie("username",$_post["username"],time()-60*60*24);
    setcookie("password",$_POST["password"],time()-60*60*24);
   }
//.........................................
    header("Location:{$baseurl}/deshboard.php");
    
    exit();
         }else {
            // $_SESSION["error"] = "username and password is not match";
            $msg ="please enter valid username and password";
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
    <?php
    if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        $user = $_COOKIE["username"];
        $pass = $_COOKIE["password"];
    }
    else{
        $user = "";
        $pass = "";
    }
    ?>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="con">
            <h1>Login</h1> <br> <br>
           
            <label for="username" >Username</label><br>
            <input type="text" name="username" id="username" value="<?php echo $user ?>" ><br><BR>
    
            <label for="password" >Password</label><br>
            <input type="password" name="password" id="password" value="<?php echo $pass ?>"><br> <br>

            <input type="checkbox" name="remember_me" id="remember_me" >
            <label for="remember_me" >Remember me</label><br><br>

            <button type="submit" value="submit" name="submit">Submit</button><br>
            <a href="sinup.php">sinup</a>
            <div id="result" ><?php echo $msg ?></div>
    
        </div>
                </form>
        
</body>

</html> 