<?php
session_start();

include("connect.php");
include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            
            $user_id = random_num(20);
            $query = "insert into [MES_capstone].[dbo].[User_Account] (User_ID,Username,Password) values ('$user_id','$username','$password')";

            sqlsrv_query($conn,$query);
            
            header("Location: login.php");
            die;

        }else{
            echo"Please enter valid information";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/signup.css">
</head>
<body>
    <div class="center">
        <h1>Sign Up</h1>
        <form method="POST">
            <div class="txt_field">
                <input id="username" type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input id="password" type="password" name="password" required>
                <label>Password</label>
            </div>
            <input type="submit" name="submit" value="Sign Up">
            <div class="Login_link">
                 <a href="login.php"> Log In </a>
            </div>
        </form>
    </div>
</body>
</html>