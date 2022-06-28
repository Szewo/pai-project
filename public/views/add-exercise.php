<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../../css/add_exercise.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GymBro</title>
    <?php include 'base.php' ?>

</head>
<body>
<div class="container">
    <div class="navigation">
        <i class="fa-solid fa-user user-avatar"></i>
        <h3 class="user-mail"> <?php echo $_SESSION['email'] ?> </h3>
        <button type="submit" class="sign-up-button">USER SETTINGS</button>
        <?php include 'dashboard_navigation.php' ?>
    </div>

    <div class="content-wrapper">
        <div class="header">
            <span class="nav-text-first">GymBro</span> <span class="nav-text-second">Dashboard</span>
        </div>
        <div class="content">
            <div class="add-exercise-container">
                <form action="/exercise/add" method="POST">
                    <label>
                        <h3>Enter exercise name:</h3>
                        <input name="exercise_name" type="text" placeholder="exercise name"/>
                    </label>
                    <label>
                        <h3>Enter exercise sets:</h3>
                        <input name="exercise_sets" type="text" placeholder="exercise sets"/>
                    </label>
                    <label>
                        <h3>Enter exercise repetitions:</h3>
                        <input name="exercise_repetitions" type="text" placeholder="exercise repetitions"/>
                    </label>
                    <label>
                        <h3>Enter exercise weight:</h3>
                        <input name="exercise_weight" type="text" placeholder="exercise weight"/>
                    </label>
                    <label>
                        <h3>Enter exercise break:</h3>
                        <input name="exercise_break" type="text" placeholder="exercise break"/>
                    </label>
                    <label>
                        <input name="exercise_workout_id" type="hidden" value="<?php echo (int) $_REQUEST['id'] ?>"/>
                    </label>
                    <button class="submit-button" type="submit"> SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>