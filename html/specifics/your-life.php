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

$achGoalGuard = false;
$query = "SELECT * FROM goals";
$queryGoalsList = $db->prepare($query);
$queryGoalsList->execute();
$achGoalGuard = true;
?>

<!DOCTYPE html>
<html>

<head>
    <title>TBD</title>
    <!-- <link rel="shortcut icon" src="../img/qstion.webp">
    <meta charset="utf-8">
    <meta name="description" content="A website offering ways of getting in shape!">
    <meta name="keywords" content="fitness, shape up, strong, muscles, relax"> -->
    <link rel="stylesheet" href="../../css/specific.css">
</head>

    <?php   
        $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/nav-bar.php";
        include $IPATH;
    ?>

<div id="centering-div">
        <div id="cont-1">

            <div id="title-cont">
                <h1>Your Life</h1>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar auctor metus a imperdiet. Maecenas consectetur erat vel fringilla iaculis. Vivamus bibendum dignissim nisi. Donec in sem eu dui finibus volutpat. In hac habitasse platea dictumst. Vestibulum sapien orci, feugiat eu mauris in, vulputate dapibus diam. Sed tortor nulla, vestibulum eu consequat non, fermentum quis leo. Sed placerat neque eu enim dignissim ornare. Morbi gravida risus ut nibh placerat, sit amet iaculis leo aliquet. Sed consectetur convallis purus in pellentesque.</p>
            </div>
            <span id="divide-span"></span>
            <div id="explore-cont-outer">
                <h2>Explore</h2>
                <div id="explore-cont-inner">
                    <h4><a href="https://medlineplus.gov/benefitsofexercise.html">Benefits of Exercise</a></h4>
                    <h4><a href="https://www.mindtools.com/page6.html">Personal Goal Setting</a></h4>
                    <h4><a href="https://www.mentalhealth.gov/basics/what-is-mental-health">Mental Health Importance</a></h4>
                </div>
            </div>

        </div>

        <div id="example-cont-overall">
            <div id="separator-cont">
                <span></span>
                <h2>Suggestions</h2>
                <span></span>
            </div>
            <div id="the-suggestions">
                <div id="suggestions-achievements">
                    <?php
                    $count = 4;
                    foreach ($queryGoalsList as $a) {
                        if ($count == 0) break;
                        if($a['daily']) {// do nothing
                        } else {
                            $count--;
                    ?>
                        <div class="achieve clickable" id=<?php echo $a['goalID']; ?>>
                            <p><?php echo $a['goalName'];
                                $achGoalGuard = false; ?>
                            </p>
                        </div>
                    <?php 
                        } // else end
                    } // foreach end
                ?>
                </div>
                <div id="suggestions-habits">
                <?php 
                    $count = 4;
                    foreach($queryGoalsList as $a) {
                        if($count == 0) break;
                        if($a['daily']) {
                            $count--;
                ?>
                        <div class="achieved clickable" id=<?php echo $a['goalID'];?>>
                                <p><?php echo $a['goalName'];
                                    $achGoalGuard = false;?>
                                </p>
                        </div>
                <?php 
                        } // if
                    } // foreach
                    ?>
                </div>
            </div>
            <div id="space-footer"></div>
        </div>

    </div>

<?php 
        $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/footer.php";
        include $IPATH;
    ?>

</html>