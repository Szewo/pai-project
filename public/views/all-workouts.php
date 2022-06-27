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
<table>
<?php if (isset($workouts)): ?>
    <tr>
        <th>ID</th>
        <th>NAME</th>
    </tr>
    <?php foreach ($workouts as $workout): ?>
        <tr>
            <td><?php echo $workout->getId() ?></td>
            <td>
                <a href=<?php echo "http://$_SERVER[HTTP_HOST]/all-workouts/view?id=" . $workout->getId()?>><?php echo $workout->getName() ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>
</table>

</body>
</html>