<?php
    
    $time = time();
    $query = "SELECT * FROM goalslist WHERE $userID=userID";
    $queryAchieve = $db->prepare($query);
    $queryAchieve->execute();
    $result = $queryAchieve->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        if ($row['completed'] == 1) {
            if ($time -  $row['timeStamp'] > 86400) { //checks if it has been a day since check mark
                $row['completed'] = 0;
                $time = $row['timeStamp'];
                $query = $db->prepare("UPDATE goalslist SET
                completed = 0 WHERE $userID=userID AND timeStamp=$time");
                $query->execute();
            }
        }
    }

?>