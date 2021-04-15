<?php
    session_start();
    $account = "Sign in";
    $link = "account/signInPage.php";
    $loggedIn = false;
    if (isset($_SESSION["username"])) {
        $account = "Welcome, " . $_SESSION["username"];
        $link = "";
        $loggedIn = true;
    } else {
        session_destroy();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/main.css">
    <title>TBD</title>
    <!-- <link rel="shortcut icon" src="../img/qstion.webp">
    <meta charset="utf-8">
    <meta name="description" content="A website offering ways of getting in shape!">
    <meta name="keywords" content="fitness, shape up, strong, muscles, relax"> -->
</head>

<body>

    <div id="nav-bar">
        <div id="nav-spacer-white"></div>
        <div id="nav-ul">
            <ul>
                <li><a href="../html/main.php">Home</a></li>
                <li><a href="">Tracker</a></li>
                <li>The Specifics
                    <ul>
                        <div class="border">
                            <li><a href="">Your Room</a></li>
                        </div>
                        <div class="border">
                            <li><a href="">Your House</a></li>
                        </div>
                        <div class="border">
                            <li><a href="">Your Life</a></li>
                        </div>
                    </ul>
                </li>
                
                <?php if ($loggedIn) : ?>
                    <li><a href="<?php echo $link;?>"><?php echo $account;?></a>
                        <ul>
                            <div class="border">
                                <li><a href="accountPage.php">Account Page</a></li>
                            </div>
                            <div class="border">
                                <li><a href="logout.php">Logout</a></li>
                            </div>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href="<?php echo $link;?>"><?php echo $account;?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

</body>

</html>