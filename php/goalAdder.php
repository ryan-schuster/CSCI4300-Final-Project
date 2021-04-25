<?php
    session_start();
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    $guard = false;
    $goalName = $_POST['goalName'];
    $daily = false;
    $userID = $_SESSION["userID"];
    if ($_SESSION["habit"]) {
        $daily = true;
    } else {
        $daily = false;
    }
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare("SELECT goalName FROM personalGoalsList WHERE $userID=userID"); 
        $query->execute();
        $array = $query->fetchAll();
        foreach ($array as $row) {
            if ($row[0] == $goalName) {
                    $guard = true;
            }
        }
        $query = $db->prepare("SELECT goals.goalName FROM goalsList INNER JOIN goals ON
        goals.goalID=goalsList.goalID INNER JOIN users ON goalsList.userID=users.userID WHERE $userID=goalsList.userID"); 
        $query->execute();
        $array = $query->fetchAll();
        foreach ($array as $row) {
            if ($row[0] == $goalName) {
                    $guard = true;
            }
        }
            if ($guard) {
                $_SESSION["error"] = "true";
                if ($_SESSION["habit"]) {
                    header("Location:../html/account/habitAdderPage.php"); 
                } else {
                    header("Location:../html/account/achieveAdderPage.php");
                }
            } else {
                $query = $db->prepare("INSERT INTO personalGoalslist (userID, goalName, daily)
                VALUES (:id, :name, :daily)");
                $query->bindParam(':id', $_SESSION["userID"]);
                $query->bindParam(':name', $goalName);
                $query->bindParam(':daily', $daily);
                $query->execute();
                header("Location:../html/tracker.php");
            }
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
?>