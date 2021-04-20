<?php
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    session_start();
    $userID = $_SESSION["userID"];
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $db->prepare("UPDATE goalslist INNER JOIN goals ON goals.goalID=goalslist.goalID SET
    completed = 0 WHERE $userID=userID AND goals.daily=1");
    $query->execute();

    $query = $db->prepare("UPDATE personalGoalslist SET
    completed = 0 WHERE $userID=userID AND daily=1");
    $query->execute();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    header("Location:../html/tracker.php");
?>