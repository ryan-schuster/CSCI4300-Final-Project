<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = 000000000;
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare("SELECT email, userPassword, userID, name FROM users"); 
        $query->execute();
        $array = $query->fetchAll();
        $guard = true;
        foreach ($array as $row) {
            if ($row[0] == $email) {
                    $guard = false;
            }
        }
        if ($guard) {
            $query = $db->prepare("INSERT INTO users (name, email, userPassword, phone)
            VALUES (:name, :email, :password, :phone)");
            $query->bindParam(':name', $name);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password);
            $query->bindParam(':phone', $phone);
            $query->execute();
        } else {
            session_start();
            $_SESSION["sameEmail"] = "true";
            header("Location:/CSCI4300-Final-Project/html/account/registration.php");
        }
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
?>
<html>
<head>
<style>

	body {
		background-color: #E8E8E8;
	}

	div{
		margin-left: 455px;
		margin-right: 455px;
		margin-top: 50px;
		background-color: white;
		border-radius: 25px;
	}
	h2{
		text-align: center;
	}
	#success{
		font-size: 55px;
		padding-bottom: 70px;
		margin-bottom: 0px;
	}
	#back, a{
		border-top: 1px solid #801FCC;
		text-decoration-line: none;
		padding-bottom: 25px;
		color: #ff4f00;
		font-size: 30px;
		margin-bottom: 0px;
		padding-top: 20px; 
	}
</style>
<head>
<body>
    <div>
        <h2 id="success">Account Successfully created</h2>
        <a href="../html/main.php"><h2 id="back">Back to home page</h2>
    </div>
    </body>
</html>
