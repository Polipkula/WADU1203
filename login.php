<?php

require_once 'DBC.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = DBC::getConnection();

    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";

    $statement = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statement, 's', $username);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, password_hash($row['password'], PASSWORD_DEFAULT))) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $row['email'];
            $_SESSION['age'] = $row['age'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            header('Location: welcome.php');
            exit;
        } else {
            echo "Nesprávné heslo.";
        }
    } else {
        echo "Uživatel neexistuje.";
    }
}

?>