<?php
    session_start();
    $account = "Sign in";
    $link = "account/signInPage.php";
    $loggedIn = false;
    if (isset($_SESSION["username"])) {
        $account = "Welcome, " . $_SESSION["username"];
        $link = "";
        $loggedIn = true;
    } 
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
		<h1> Account Information </h1><br>
		<label> Username: </label>
		<input type="text" id="username" name="username" required><br>
		<label> Email: </label>
		<input type="email" id="email" name="email" required><br>
		<label> Phone: </label>
		<input type="tel" id="phone" name="phone" required pattern="\d{3}[\-]\d{3}[\-]\d{4}" title="Example format: 111-111-1111"><br>
		<input type="submit" id="change" value="Submit Changes">
	</form>
	</div>
    <?php 
        $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/footer.php";
        include $IPATH;
    ?>

</body>

</html>
