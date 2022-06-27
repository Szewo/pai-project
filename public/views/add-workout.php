<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GymBro</title>

</head>
<body>
<h1>GymBro Dashboard</h1>
<?php include 'dashboard_navigation.php' ?>
<form class="add-workout" action="/add-workout" method="POST">
    <label>
        <input name="workout_name" type="text" placeholder="workout name"/>
    </label>
    <br>
    <label>
        <input name="workout_date" type="text" placeholder="workout date (YYYY-MM-DD)">
    </label>
    <br>
    <button type="submit"> SUBMIT </button>
</form>

</body>
</html>