<?php
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    $guard = false;
    if (isset($_POST['goalID'])) { //goal from goallist
        $guard = false;
        $goalID=($_POST['goalID']);
    } 
    if (isset($_POST['goalName'])) { //personal goal from personal goal list
        $guard = true;
        $goalName=(trim($_POST['goalName']));
    }
    session_start();
    $userID = $_SESSION["userID"];
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($guard) {
                $query = $db->prepare("UPDATE personalGoalslist SET 
                completed = 1 WHERE goalName='$goalName' AND userID=$userID");
                print_r($query);
                $query->execute();
            } else {
                $query = $db->prepare("UPDATE goalsList SET 
                completed = 1 WHERE goalId=$goalID AND userID=$userID");
                $query->execute();
            }
            header("Location:../html/tracker.php");
        
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
?>