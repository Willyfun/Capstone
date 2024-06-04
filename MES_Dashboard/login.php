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
            $query = "select * from [MES_capstone].[dbo].[User_Account] where Username = '$username'";
            
            $result = sqlsrv_query($conn,$query);
            
            if($result)
            {
                $user_data = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC );
                    
                
                $_SESSION['user_id'] = $user_data['User_ID'];
                header("Location: index.php");
                die;

            }else{
                echo"false";
            }

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
    <link rel="stylesheet" href="./src/css/login.css">
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form  method="POST">
            <div class="txt_field">
                <input id="username" type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input id="password" type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" name="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="signup.php">Signup</a>
            </div>
        </form>
    </div>
</body>
</html>