<?php
    session_start();
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    $guard = false;
    $goalName = $_POST['goalName'];
    $daily = false;
    if ($_SESSION["habit"]) {
        $daily = true;
    } else {
        $daily = false;
    }
    $timeStamp = time();
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare("SELECT goalName FROM goals"); 
        $query->execute();
        $array = $query->fetchAll();
        foreach ($array as $row) {
            if ($row[0] == $goalName) {
                    $guard = true;
            }
        }
            if ($guard) {
                $_SESSION["error"] = "true";
                header("Location:../html/account/habitAdderPage.php"); 
            } else {
                $query = $db->prepare("INSERT INTO personalGoalslist (userID, goalName, daily, timeStamp)
                VALUES (:id, :name, :daily, :timeStamp)");
                $query->bindParam(':id', $_SESSION["userID"]);
                $query->bindParam(':name', $goalName);
                $query->bindParam(':daily', $daily);
                $query->bindParam(':timeStamp', $timeStamp);
                $query->execute();
                header("Location:../html/tracker.php");
            }
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
?>