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
    } 
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
    $userID = $_SESSION["userID"];
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
    <script src="../../js/account/scripts.js"></script>
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
	<form id="register_form" action="../../php/updateAccount.php" onsubmit="return validateForm()" method="POST">
            <h1>Update account</h1>
            <div class="formDiv">
                <label for="name" class=""><span>Your name</span></label><br>
                <input type="text" id="name" name="name">
                <span id="nameErrorHtml" style="color:#ff4f00"></span>
            </div>
            <div class="formDiv">
                <label for="email" class=""><span>Email</span></label><br>
                <input type="text" id="email" name="email">
                <span id="emailErrorHtml"style="color:#ff4f00"></span>
            </div>
            <div class="formDiv">
                <label for="password" class=""><span>Password</span></label><br>
                <input type="password" placeholder="At least 7 characters" name="password" id="password">
                <span id="passwordErrorHtml" style="color:#ff4f00"></span>
            </div>
            <br>
            <input type="submit" id="registerSubmit" value="Update account">
            
        </form>
	</div>
    <?php 
        $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/footer.php";
        include $IPATH;
    ?>

</body>

</html>
