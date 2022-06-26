<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

</head>
<body>
    <h1>GymBro</h1> <br>
    <h2>Personal workout planner</h2>
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
            <input name="email" type="text" placeholder="email"/>
        </label>
        <br>
        <label>
            <input name="password" type="password" placeholder="password">
        </label>
        <br>
        <button type="submit"> SUBMIT </button>
    </form>
    <form class="sign_up" action="/register" method="get">
        <button type="submit">REGISTER NEW ACCOUNT</button>
    </form>

</body>
</html>