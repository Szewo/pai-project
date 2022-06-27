<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
                <h1>Sign In</h1>
                <h4>Welcome to GymBro app.</h4>
                <div class="message">
                    <?php
                    if(isset($message))
                    {
                        echo $message;
                    }
                    ?>
                </div>
                <form class="login" action="/" method="POST">
                    <label>
                        <input name="email" type="text" placeholder="Email"/>
                    </label>
                    <br>
                    <label>
                        <input name="password" type="password" placeholder="Password">
                    </label>
                    <br>
                    <button type="submit" class="sign-in-button"> SUBMIT </button>
                </form>
                <form action="/register" method="get">
                    <button type="submit" class="sign-up-button">REGISTER NEW ACCOUNT</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>