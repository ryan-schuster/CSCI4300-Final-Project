<?php
    session_start();
    $account = "Sign in";
    $link = "account/signInPage.php";
    $loggedIn = false;
    $db;
    $userID;
    if (isset($_SESSION["username"])) {
        $account = "Welcome, " . $_SESSION["username"];
        $userID = $_SESSION["userID"];
        $link = "";
        $loggedIn = true;
        $dsn = 'mysql:host=localhost;dbname=bettereveryday';
        $dbUsername = 'root';
        $dbPassword = '';
        try {
            $db = new PDO($dsn, $dbUsername, $dbPassword);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>An error occurred while connecting to the database: $error_message </p>";
        }
    }
    $userInfo = $db->prepare("SELECT * FROM users WHERE $userID=userID");//has userid, name, email, phone, password, score
    $userInfo->execute();
    $userGoalslistInfo = $db->prepare("SELECT goals.goalName, goalslist.completed, goals.daily FROM goals INNER JOIN goalslist ON 
        goals.goalID=goalslist.goalID WHERE $userID=goalslist.userID");
    $userGoalslistInfo->execute();
    $userPersonalGoalsListInfo = $db->prepare("SELECT goalName, completed, daily FROM personalGoalslist WHERE $userID=userID");
    $userPersonalGoalsListInfo->execute();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../css/account/accountPage.css">
    <title>TBD</title>
    <!-- <link rel="shortcut icon" src="../img/qstion.webp">
    <meta charset="utf-8">
    <meta name="description" content="A website offering ways of getting in shape!">
    <meta name="keywords" content="fitness, shape up, strong, muscles, relax"> -->
</head>

<body>

    <?php 
        $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/nav-bar.php";
        include $IPATH;
    ?>
    <div id="whole">
	<form action="signIn.php" method="post">
        <div id="inner-form-div">
		<h1> Account Information </h1>

        <div>
		<label> Username </label>
		<input type="text" id="username" name="username" required>
        </div>

        <div>
		<label> Email </label>
		<input type="email" id="email" name="email" required>
        </div>

        <div>
		<label> Phone </label>
		<input type="tel" id="phone" name="phone" required pattern="\d{3}[\-]\d{3}[\-]\d{4}" title="Example format: 111-111-1111"><br>
        </div>

		<div onClick="document.forms['search-form'].submit();" id="change">
            Submit Changes
        </div>
	</form>
	</div>
    <?php 
        $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/footer.php";
        include $IPATH;
    ?>

</body>

</html>
