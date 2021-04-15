<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare("INSERT INTO users (name, email, userPassword)
        VALUES (:name, :email, :password)");
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
?>
<html>
<body>
    <div style="margin-left: 455px;
    margin-right: 455px;
    margin-top: 50px; 
    border:lightgrey .5px solid; background-color:#ffc04c">
        <h2 style="text-align: center;">Account Successfully created</h2>
        <br>
        <a href="../html/account/signIn.php"><h2 style="text-align:center;">Sign in</h2>
    </div>
    </body>
</html>
