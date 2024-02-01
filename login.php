<?php
include "config.php";
$msg="";

if(isset($_POST['submit'])){
   
        $username = $_POST['username'];
        $password = md5($_POST['password']);
  
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
            $msg ="Please Enter Valid Username and Password";


        }
       }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media_style.css">
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
<div class="full">


 <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
   <div class="con">
    <div class="top">
        <h3>Login</h3><br>
        
            <label for="username" >Username</label><br>
            <input type="text" name="username" id="username" value="<?php echo $user ?>" ><br><BR>
        
            <label for="password" >Password</label><br>
            <div class="eye">
                  <input type="password" name="password" id="password" value="<?php echo $pass ?>" >
                  <i class="material-icons" id="eyeicon">visibility_off</i><br>
            </div>
          
            <div class="remember">
                <input type="checkbox" name="remember_me" id="remember_me" >
                <!-- <span>remember_me</span> -->
                <label for="remember_me" >Remember me</label><br><br>
            </div>
        </div>
        
         <div class="for">
            <a href="#">Forgot Your Password</a>
         </div>
            <button type="submit" value="submit" name="submit">LOGIN</button><br>
            <hr class="divider">
            <div class="end">
                <span>Need an account?</span>
                <a href="sinup.php">SINUP</a>
            </div>
            <div id="result" ><?php echo $msg ?></div>
    
        </div>
     </form>
</div>
</body>
<script>
    password = document.getElementById("password");
    eyeicon = document.getElementById("eyeicon");
    eyeicon.onclick = function () {
        if (password.type == "password") {
            password.type = "text";  // Use the assignment operator here
            eyeicon.innerHTML = "visibility";
        } else {
            password.type = "password";  // Use the assignment operator here
            eyeicon.innerHTML = "visibility_off";
        }
    }
</script>

</html> 