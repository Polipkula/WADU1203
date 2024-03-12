<?php
session_start();
include_once 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    </div>

</body>
</html>
