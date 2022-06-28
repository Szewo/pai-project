<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/all_workouts.css">
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
            <h1 class="all-workout-header">Add workout</h1>
            <table>
                <?php if (isset($workouts)): ?>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>VIEW</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                    <?php foreach ($workouts as $workout): ?>
                        <tr>
                            <td><?php echo $workout->getId() ?></td>
                            <td>
                               <?php echo $workout->getName() ?>
                            </td>
                            <td>
                                <a href=<?php echo "http://$_SERVER[HTTP_HOST]/all-workouts/view?id=" . $workout->getId()?>>
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </td>
                            <td>
                                <i class="fa-solid fa-trash-can"></i>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>