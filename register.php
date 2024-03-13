<?php

require_once 'DBC.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $connection = DBC::getConnection(); 
    $sql = "INSERT INTO users (username, password, first_name, last_name, email, age) VALUES (?, ?, ?, ?, ?, ?)";

    $statement = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statement, 'sssssi', $username, $password, $first_name, $last_name, $email, $age);
    mysqli_stmt_execute($statement);

    if (mysqli_stmt_affected_rows($statement) > 0) {
        echo "Registration successful. You can now <a href='index.php'>login</a>.";
    } else {
        echo "Registration failed. Please try again.";
    }

    mysqli_stmt_close($statement);
    mysqli_close($connection);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="background">
  <div class="shape"></div>
  <div class="shape"></div>
</div>
<form action="register.php" method="POST">
  <h3>Register</h3>
  <label for="username">Username</label>
  <input type="text" placeholder="Username" id="username" name="username">
  <label for="password">Password</label>
  <input type="password" placeholder="Password" id="password" name="password">
  <label for="first_name">First Name</label>
  <input type="text" placeholder="First Name" id="first_name" name="first_name">
  <label for="last_name">Last Name</label>
  <input type="text" placeholder="Last Name" id="last_name" name="last_name">
  <label for="email">Email</label>
  <input type="email" placeholder="Email" id="email" name="email">
  <label for="age">Age</label>
  <input type="number" placeholder="Age" id="age" name="age">
  <button type="submit">Register</button>
</form>
</body>
</html>
