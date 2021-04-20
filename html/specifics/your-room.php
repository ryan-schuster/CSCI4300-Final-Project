<?php
    session_start();
    $account = "Sign in";
    $link = "../account/signInPage.php";
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
    <link rel="stylesheet" href="../../css/main.css">
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

<?php 
        $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/footer.php";
        include $IPATH;
    ?>

</body>

</html>