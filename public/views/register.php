<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <?php include 'base.php' ?>
</head>
<body>
<div class="base-container">
    <div class="welcome-screen">
        <h1>GymBro</h1> <br>
        <h2>Personal workout planner</h2>
    </div>
    <div class="sign-in-up-form">
        <div class="login-form">
            <i class="fa-solid fa-unlock login-icon"></i>
            <h1>Sign Up</h1>
            <h4>Welcome to GymBro app.</h4>
            <div class="message">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </div>
            <form class="register" action="/register" method="POST">
                <label>
                    <input name="email" type="text" placeholder="email"/>
                </label>
                <br>
                <label>
                    <input name="password" type="password" placeholder="password">
                </label>
                <br>
                <label>
                    <input name="rep_password" type="password" placeholder="repeat password">
                </label>
                <br>
                <label>
                    <input name="name" type="text" placeholder="name">
                </label>
                <br>
                <label>
                    <input name="surname" type="text" placeholder="surname">
                </label>
                <br>
                <button class='sign-in-button' type="submit"> SUBMIT</button>
            </form>
            <form action="/" method="get">
                <button type="submit" class="sign-up-button">SIGN IN</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
