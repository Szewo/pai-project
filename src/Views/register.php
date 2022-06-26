<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

</head>
<body>
<h1>GymBro</h1> <br>
<h2>Personal workout planner</h2>
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
    <button type="submit"> SUBMIT </button>
</form>
<form class="sign_up" action="/" method="get">
    <button type="submit">SIGN IN</button>
</form>
</body>
</html>
