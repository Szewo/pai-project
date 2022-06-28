<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/edit_workout.css">
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
            <div class="add-workout-form-container">
                <?php if (isset($workout)): ?>
                    <form class="add-workout" action="/all-workouts/edit" method="POST">
                        <label>
                            <h3>Enter workout name:</h3>
                            <input name="workout_name"
                                   type="text"
                                   value="<?php echo $workout->getName() ?>"/>
                        </label>
                        <br>
                        <label>
                            <h3>Enter workout date:</h3>
                            <input name="workout_date"
                                   type="text"
                                   value="<?php echo $workout->getDate()->format('Y-m-d') ?>">
                            <input name="workout_id"
                                   type="hidden"
                                   value="<?php echo $workout->getId() ?>">
                        </label>
                        <br>
                        <button class="submit-button" type="submit"> SUBMIT</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>