<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/view_workouts.css">
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
            <div class="workout-informations">
                <?php if (isset($workout)): ?>
                    Workout name: <?php echo $workout->getName() ?> <br>
                    Workout date: <?php echo $workout->getDate()->format('Y-m-d') ?> <br>
                <?php endif; ?>
                <div class="add-exercise-button-container">
                    <a href="<?php echo "http://$_SERVER[HTTP_HOST]/exercise/add?id=" . $workout->getId() ?>">
                        <button class="add-exercise-button">Add exercise to workout</button>
                    </a>
                </div>
            </div>
            <div class="exercises-information">
                <?php if (isset($exercises)): ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>SETS</th>
                            <th>REPETITIONS</th>
                            <th>WEIGHT</th>
                            <th>BREAK</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        <?php foreach ($exercises as $exercise): ?>
                            <tr>
                                <td>
                                    <?php echo $exercise->getId() ?>
                                </td>
                                <td>
                                    <?php echo $exercise->getName() ?>
                                </td>
                                <td>
                                    <?php echo $exercise->getSets() ?>
                                </td>
                                <td>
                                    <?php echo $exercise->getRepetitions() ?>
                                </td>
                                <td>
                                    <?php echo $exercise->getWeight() ?>
                                </td>
                                <td>
                                    <?php echo $exercise->getBreak() ?>
                                </td>
                                <td>
                                    <a href=<?php echo "http://$_SERVER[HTTP_HOST]/exercise/edit?id=" . $exercise->getId()?>>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href=<?php echo "http://$_SERVER[HTTP_HOST]/exercise/delete?id=" .
                                        $exercise->getId() ."&wid=" . $exercise->getWorkoutId()?>>
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>