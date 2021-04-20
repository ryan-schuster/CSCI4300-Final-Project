<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    $guard = false;
    $userID = '';
    $userFullName = '';
    session_start();
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare("SELECT email, userPassword, userID, name FROM users"); 
        $query->execute();
        $array = $query->fetchAll();
        foreach ($array as $row) {
            if ($row[0] == $email && $row[1] == $password) {
                    $guard = true;
                    $userID = $row[2];
                    $userFullName = $row[3];
            }
        }
            if ($guard) {
                $_SESSION["username"] = $userFullName;
                $_SESSION["userID"] = $userID;
                include $_SERVER["DOCUMENT_ROOT"] . '/CSCI4300-Final-Project/html/main.php';
            } else {
                $_SESSION["error"] = "true";
                header("Location:../html/account/signInPage.php"); 
            }
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
?>