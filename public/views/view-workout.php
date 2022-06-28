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
<?php if (isset($workout)): ?>
    <?php echo $workout->getId() ?> <br>
    <?php echo $workout->getName() ?> <br>
    <?php echo $workout->getDate()->format('Y-m-d') ?> <br>
<?php endif; ?>
</body>
</html>