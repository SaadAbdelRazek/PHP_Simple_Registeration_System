<?php
 session_start();
 include "connection.php";
 if(!isset($_SESSION['email'])){
    header('location:login_signup.php');
 }
 $email=$_SESSION['email'];
 $select_name=mysqli_query($con,"SELECT * FROM `users` where `email`='$email' ");
?>

<!-- ---------------------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
    <p>
        <?php
        $row=mysqli_fetch_assoc($select_name);
               echo 'Welcome Mr :'.'<b>'. $row['username'].'<b>';
        ?>

    </p>
</body>
</html>