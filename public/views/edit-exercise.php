<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../../css/edit-exercise.css">
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
                <?php if (isset($exercise)): ?>
                    <form action="/exercise/edit" method="POST">
                        <label>
                            <h3>Enter exercise name:</h3>
                            <input name="exercise_name" type="text" value="<?php echo $exercise->getName() ?>"/>
                        </label>
                        <label>
                            <h3>Enter exercise sets:</h3>
                            <input name="exercise_sets" type="text" value="<?php echo $exercise->getSets() ?>"/>
                        </label>
                        <label>
                            <h3>Enter exercise repetitions:</h3>
                            <input name="exercise_repetitions" type="text" value="<?php echo $exercise->getRepetitions() ?>"/>
                        </label>
                        <label>
                            <h3>Enter exercise weight:</h3>
                            <input name="exercise_weight" type="text" value="<?php echo $exercise->getWeight() ?>"/>
                        </label>
                        <label>
                            <h3>Enter exercise break:</h3>
                            <input name="exercise_break" type="text" value="<?php echo $exercise->getBreak() ?>"/>
                        </label>
                        <label>
                            <input name="workout_id"
                                   type="hidden"
                                   value="<?php echo $exercise->getWorkoutId() ?>">
                        </label>
                        <label>
                            <input name="exercise_id"
                                   type="hidden"
                                   value="<?php echo $exercise->getId() ?>">
                        </label>
                        <button class="submit-button" type="submit"> SUBMIT</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>