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
    <link rel="stylesheet" href="../css/tracker.css">
    <title>TBD</title>
    <!-- <link rel="shortcut icon" src="../img/qstion.webp">
    <meta charset="utf-8">
    <meta name="description" content="A website offering ways of getting in shape!">
    <meta name="keywords" content="fitness, shape up, strong, muscles, relax"> -->
</head>

<body>

    <!-- Nav Bar import -->
    <?php
    $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/nav-bar.php";
    include $IPATH;
    ?>

    <div id="percent-better-cont">
        <h1>69.96%!</h1>
        <span></span>
        <p id="better-txt"><em>Better Than Before</em></p>
    </div>

    <div id="tracker-boxes-cont">

        <div id="new-achievements-cont">
            <h2>New Achievments</h2>
            <span class="separator"></span>
            <p class="plus">+</p>
            <div class="achieve">
                <div class="circle"></div>
                <p>An incredible thing</p>
            </div>
            <div class="complete-bar">
                <span></span>
                <p><em>Completed Total</em></p>
                <span></span>
            </div>
            <div class="achieved">
                <div class="circle"></div>
                <p>An incredible thing</p>
            </div>
            <div class="achieved">
                <div class="circle"></div>
                <p>An incredible thing</p>
            </div>
        </div>

        <div id="excellent-habits-cont">
            <h2>Excellent Habits</h2>
            <span class="separator"></span>
            <p class="plus">+</p>
            <div class="achieve">
                <div class="circle"></div>
                <p>An incredible thing</p>
            </div>

            <div class="complete-bar">
                <span></span>
                <p><em>Completed Today</em></p>
                <span></span>
            </div>
            <div class="achieved">
                <div class="circle"></div>
                <p>An incredible thing</p>
            </div>
            <div class="achieved">
                <div class="circle"></div>
                <p>An incredible thing</p>
            </div>
        </div>

    </div>

    <div id="test-svg-cont">
        <div id="svg"></div>
    </div>

</body>

</html>