<?php
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    $guard = false;
    if (isset($_POST['userID'])) {
        $userID=($_POST['userID']);
    }
    session_start();
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $db->prepare('DELETE FROM goalslist WHERE userID = :userID;
                                        DELETE FROM personalgoalslist WHERE userID = :userID;
                                        DELETE FROM users WHERE userID = :userID;');
                $query->bindParam(':userID', $userID);
                $query->execute();
                include '../php/logout.php';
                header("Location:../html/main.php");

        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
?>