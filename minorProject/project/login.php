<?php
    session_start();
    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(!empty($username) && !empty($password))
        {
            $query = "SELECT * FROM user where username='$username' limit 1";
            $result= mysqli_query($con, $query);
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data=mysqli_fetch_assoc($result);
                if($user_data['password']===$password)
                {
                    header("Location: index.php");
                }
            }
        }
        else 
        {
            echo "Please enter some valid information";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav"></div>
    <div class="banner"></div>
    <div class="container1">
    <div class="imgcontainer">
    <img class="bg-image" src="../images/BG-login.jpg" alt="">
    </div>
    <div class="container">
        <div class="logo">
        <img src="../images/somaiya-vidyavihar-brand.svg" alt="">
        </div>
        <h2>Login</h2>
        <form action="#" method="post">
            <div class="input">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</div>
</body>
</html>
