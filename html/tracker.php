<?php
session_start();
$account = "Sign in";
$link = "account/signInPage.php";
$loggedIn = false;
$percent = "0.00%!";
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
    $query = "SELECT * FROM users WHERE $userID=userID";
    $userInfo = $db->query($query);
    foreach ($userInfo as $score) {
        $percent = $score['score'];
    }
    $query = "SELECT goals.goalName FROM goalslist INNER JOIN goals
    ON goals.goalID = goalslist.goalID WHERE goals.daily=0 AND $userID=userID AND completed=1";
    $queryAchieveComp = $db->prepare($query);
    $queryAchieveComp->execute();
    $achCompGuard = true;

    $query = "SELECT goals.goalName FROM goalslist INNER JOIN goals
    ON goals.goalID = goalslist.goalID WHERE goals.daily=0 AND $userID=userID AND completed=0";
    $queryAchieve = $db->prepare($query);
    $queryAchieve->execute();
    $achGuard = true;

    $query = "SELECT goals.goalName FROM goalslist INNER JOIN goals
    ON goals.goalID = goalslist.goalID WHERE goals.daily=1 AND $userID=userID AND completed=1";
    $queryHabitComp = $db->prepare($query);
    $queryHabitComp->execute();
    $habitCompGuard = true;

    $query = "SELECT goals.goalName FROM goalslist INNER JOIN goals
    ON goals.goalID = goalslist.goalID WHERE goals.daily=1 AND $userID=userID AND completed=0";
    $queryHabit = $db->prepare($query);
    $queryHabit->execute();
    $habitGuard = true;

    $query = "SELECT goalName, daily, completed FROM personalGoalslist WHERE $userID=userID";
    $personalGL1 = $db->prepare($query);
    $personalGL1->execute();

    $query = "SELECT goalName, daily, completed FROM personalGoalslist WHERE $userID=userID";
    $personalGL2 = $db->prepare($query);
    $personalGL2->execute();

    $query = "SELECT goalName, daily, completed FROM personalGoalslist WHERE $userID=userID";
    $personalGL3 = $db->prepare($query);
    $personalGL3->execute();

    $query = "SELECT goalName, daily, completed FROM personalGoalslist WHERE $userID=userID";
    $personalGL4 = $db->prepare($query);
    $personalGL4->execute();

    $pGuard1 = true;
    $pGuard2 = true;
    $pGuard3 = true;
    $pGuard4 = true;
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
        <h1><?php echo $percent;?></h1>
        <span></span>
        <p id="better-txt"><em>Better Than Before</em></p>
    </div>

    <div id="tracker-boxes-cont">

        <div id="new-achievements-cont">
            <h2>New Achievments</h2>
            <span class="separator"></span>
            <a href="account/achieveAdderPage.php"><p class="plus">+</p></a>
            <?php if ($loggedIn) :?>
            <?php foreach($queryAchieve as $a) {?>
                <div class="achieve">
                    <div class="circle"></div>
                    <p><?php echo $a['goalName'];
                    $achGuard = false;?></p>
                </div>
            <?php }?>
            <?php foreach($personalGL1 as $p) {
                if ($p['daily'] == 0 && $p['completed'] == 0) :?>
                    <div class="achieve">
                        <div class="circle"></div>
                        <p><?php echo $p['goalName'];
                        $pGuard1 = false;?></p>
                    </div>
                <?php endif;}?>
            <?php if ($achGuard && $pGuard1) :?>
                <div class="achieve">
                    <div class="circle"></div>
                    <p>No achievements</p>
                </div>
                <?php endif;?>
            <?php else : ?>
                <div class="achieve">
                    <div class="circle"></div>
                    <p>Try logging in</p>
                </div>
            <?php endif;?>


            <div class="complete-bar">
                <span></span>
                <p><em>Completed Total</em></p>
                <span></span>
            </div>
            <?php if ($loggedIn) :?>
            <?php foreach($queryAchieveComp as $aC) {?>
                <div class="achieved">
                    <div class="circle"></div>
                    <p><?php echo $aC['goalName'];
                    $achCompGuard = false;?></p>
                </div>
            <?php }?>
            <?php foreach($personalGL2 as $p) {
                if ($p['daily'] == 0 && $p['completed'] == 1) :?>
                    <div class="achieved">
                        <div class="circle"></div>
                        <p><?php echo $p['goalName'];
                        $pGuard2 = false;?></p>
                    </div>
                <?php endif;}?>
            <?php if ($achCompGuard && $pGuard2) :?>
                <div class="achieved">
                    <div class="circle"></div>
                    <p>No Achievements</p>
                </div>
                <?php endif;?>
            <?php else : ?>
                <div class="achieved">
                    <div class="circle"></div>
                    <p>Try logging in</p>
                </div>
            <?php endif;?>
        </div>

        <div id="excellent-habits-cont">
            <h2>Excellent Habits</h2>
            <span class="separator"></span>
            <a href="account/habitAdderPage.php"><p class="plus">+</p></a>
            <?php if ($loggedIn) :?>
            <?php foreach($queryHabit as $a) {?>
                <div class="achieve">
                    <div class="circle"></div>
                    <p><?php echo $a['goalName'];
                    $habitGuard = false;?></p>
                </div>
            <?php }?>
            <?php foreach($personalGL3 as $p) {
                if ($p['daily'] == 1 && $p['completed'] == 0) :?>
                    <div class="achieve">
                        <div class="circle"></div>
                        <p><?php echo $p['goalName'];
                        $pGuard3 = false;?></p>
                    </div>
                <?php endif;}?>

                <?php if ($habitGuard && $pGuard3) :?>
                <div class="achieve">
                    <div class="circle"></div>
                    <p>No habits</p>
                </div>
                <?php endif;?>
            <?php else : ?>
                <div class="achieve">
                    <div class="circle"></div>
                    <p>Try logging in</p>
                </div>
            <?php endif;?>
    
            <div class="complete-bar">
                <span></span>
                <p><em>Completed Today</em></p>
                <span></span>
            </div>
            <?php if ($loggedIn) :?>
            <?php foreach($queryHabitComp as $a) {?>
                <div class="achieved">
                    <div class="circle"></div>
                    <p><?php echo $a['goalName'];
                    $habitCompGuard = false;?></p>
                </div>
            <?php }?>
            <?php foreach($personalGL4 as $p) {
                if ($p['daily'] == 1 && $p['completed'] == 1) :?>
                    <div class="achieved">
                        <div class="circle"></div>
                        <p><?php echo $p['goalName'];
                        $pGuard4 = false;?></p>
                    </div>
                <?php endif;}?>
            <?php if ($habitCompGuard && $pGuard4) :?>
                <div class="achieved">
                    <div class="circle"></div>
                    <p>Try completing a goal</p>
                </div>
                <?php endif;?>
            <?php else : ?>
                <div class="achieved">
                    <div class="circle"></div>
                    <p>Try logging in</p>
                </div>
            <?php endif;?>
            </div>
        </div>

    </div>

    <div id="test-svg-cont">
        <div id="svg"></div>
    </div>

</body>

</html>