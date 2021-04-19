<?php
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    $guard = false;
    $percent = 0;
    if (isset($_POST['goalID'])) { //goal from goallist
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
        // query to grab %
        $query = "SELECT * FROM users WHERE $userID=userID";
        $userInfo = $db->query($query);
        foreach ($userInfo as $score) {
            $percent = $score['score'];
        }
            if ($guard) {
                $query = $db->prepare("UPDATE personalGoalslist SET 
                completed = 1 WHERE goalName='$goalName' AND userID=$userID");
                print_r($query);
                $query->execute();
                $percent = $percent * 1.01;
            } else {
                $query = $db->prepare("UPDATE goalsList SET 
                completed = 1 WHERE goalId=$goalID AND userID=$userID");
                $query->execute();
                $percent = $percent * 1.01;
            }
            header("Location:../html/tracker.php");
        
            // Update percent better
            $update_percent_query = $db->prepare("UPDATE users 
                set score=$percent WHERE userID=$userID");
            $update_percent_query->execute();

        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
?>