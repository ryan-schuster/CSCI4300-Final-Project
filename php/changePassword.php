<?php
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    $guard = false;
    if (isset($_POST['userPassword'])) {
        $userPassword=($_POST['userPassword']);
    }
    if (isset($_POST['userID'])) {
        $userID=($_POST['userID']);
    }
    session_start();
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $db->prepare('UPDATE users
                                        SET userPassword = :userPassword
                                        WHERE userID = :userID');
                $query->bindParam(':userPassword', $userPassword);
                $query->bindParam(':userID', $userID);
                $query->execute();
                header("Location:../html/accountPage.php");

        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
?>