<?php
    $query = "SELECT * FROM goalslist WHERE $userID=userID";
    $queryReset = $db->prepare($query);
    $queryReset->execute();

    $query = $db->prepare("UPDATE goalslist SET
    completed = 0 WHERE $userID=userID AND daily=1");
    $query->execute();

    $query = "SELECT * FROM personalGoalslist WHERE $userID=userID";
    $queryReset = $db->prepare($query);
    $queryReset->execute();

    $query = $db->prepare("UPDATE personalGoalslist SET
    completed = 0, WHERE $userID=userID AND daily=1");
    $query->execute();
?>