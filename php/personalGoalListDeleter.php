<?php
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    $guard = false;
    if (isset($_POST['goalName'])) {
        $goalName=($_POST['goalName']);
    }
    session_start();
    $userID = $_SESSION["userID"];
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $db->prepare("DELETE FROM personalgoalslist WHERE goalName = '$goalName' AND userID=$userID");
                $query->execute();
                header("Location:../html/account/accountPage.php");

        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
?>