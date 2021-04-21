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
    <!-- <link rel="stylesheet" href=""> -->
    <title>TBD</title>
    <!-- <link rel="shortcut icon" src="../img/qstion.webp">
    <meta charset="utf-8">
    <meta name="description" content="A website offering ways of getting in shape!">
    <meta name="keywords" content="fitness, shape up, strong, muscles, relax"> -->
    <link rel="stylesheet" href="../../css/specific.css">
</head>

<body>
    <?php
    $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/nav-bar.php";
    include $IPATH;
    ?>


    <div id="centering-div">
        <div id="cont-1">

            <div id="title-cont">
                <h1>Your House</h1>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar auctor metus a imperdiet. Maecenas consectetur erat vel fringilla iaculis. Vivamus bibendum dignissim nisi. Donec in sem eu dui finibus volutpat. In hac habitasse platea dictumst. Vestibulum sapien orci, feugiat eu mauris in, vulputate dapibus diam. Sed tortor nulla, vestibulum eu consequat non, fermentum quis leo. Sed placerat neque eu enim dignissim ornare. Morbi gravida risus ut nibh placerat, sit amet iaculis leo aliquet. Sed consectetur convallis purus in pellentesque.</p>
            </div>
            <span id="divide-span"></span>
            <div id="explore-cont-outer">
                <h2>Explore</h2>
                <div id="explore-cont-inner">
                    <h4><a href="https://www.wisegoals.com/house-goals.html">House Goals</a></h4>
                    <h4><a href="https://www.realhomes.com/us/advice/how-to-prepare-your-house-for-renovation">Home Renovation</a></h4>
                    <h4><a href="https://www.bankrate.com/real-estate/flipping-houses/">House Flipping</a></h4>
                </div>
            </div>

        </div>
    </div>


    <?php
    $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/footer.php";
    include $IPATH;
    ?>

</body>

</html>