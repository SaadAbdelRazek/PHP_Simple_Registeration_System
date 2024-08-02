<?php
session_start();
include "connection.php";

// ------------------------------

if(isset($_POST['signup'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);
    $name = stripslashes($name);
    $name = addslashes($name);
    $name = ucwords(strtolower($name));
    $email = stripslashes($email);
    $email = addslashes($email);
    $check_email=mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email'");
    if(mysqli_num_rows($check_email)){
      echo '
      <script>
        alert("This Email is already used before");
      </script>
      ';
    }
    else
    {
    $insert=mysqli_query($con,"INSERT INTO `users` (username,email,password) VALUES ('$name','$email','$password')");
    }
}

// --------------------------------

if(isset($_POST['signin'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);
    $email = stripslashes($email);
    $email = addslashes($email);
    $select=mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email' and `password`='$password'");
    if(mysqli_num_rows($select)>0){
        $_SESSION['email']=$email;
        header('location:index.php');
    }
}

// --------------------------------

?>
<!-- -------------------------------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration System</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<br>
<br>
    <div class="cont">
        <div class="form sign-in">
            <h2>Welcome</h2>
            <form action=""method="POST">
            <label>
                <span>Email</span>
                <input type="email" name="email" />
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="password"/>
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <input type="submit" class="submit" name="signin" value="Sign In">
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Create your Account</h2>
                <form method="POST">
                <label>
                    <span>Name</span>
                    <input type="text" name="name" />
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email"/>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password" />
                </label>
                <input type="submit" class="submit" name="signup" value="Sign Up">
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
</body>
</html>