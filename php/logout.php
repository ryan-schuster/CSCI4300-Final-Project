<?php
    session_start();
    session_destroy();
    header("Location:/CSCI4300-Final-Project/html/main.php");
?>