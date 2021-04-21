<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    session_start();
    $userID = $_SESSION["userID"];
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare("UPDATE users SET userPassword='$password', name='$name', email='$email' WHERE
        $userID = userID");
        $query->execute();
        $_SESSION["username"] = $name;
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
    echo '<script>window.history.go(-1);</script>';
?>