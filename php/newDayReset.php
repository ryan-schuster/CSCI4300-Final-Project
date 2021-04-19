<?php

    $query = $db->prepare("UPDATE goalslist SET
    completed = 0 WHERE $userID=userID AND daily=1");
    $query->execute();

    $query = $db->prepare("UPDATE personalGoalslist SET
    completed = 0, WHERE $userID=userID AND daily=1");
    $query->execute();
?>