<?php
session_start();
include_once 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <div class="container">
        <h1>User Data</h1>
        <p><strong>First Name:</strong> <?php echo $_SESSION['first_name']; ?></p>
        <p><strong>Last Name:</strong> <?php echo $_SESSION['last_name']; ?></p>
        <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
        <p><strong>Age:</strong> <?php echo $_SESSION['age']; ?></p>
    </div>

</body>
</html>
