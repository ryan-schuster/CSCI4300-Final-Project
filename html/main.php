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
    <link rel="stylesheet" href="../css/main.css">
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


    <div id="flex-cont">
        <div id="could-be-cont">
            <h1><em>WHAT COULD YOU BE?</em></h1>
            <h3>The Premise</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar auctor metus a imperdiet. Maecenas consectetur erat vel fringilla iaculis. Vivamus bibendum dignissim nisi. Donec in sem eu dui finibus volutpat. In hac habitasse platea dictumst. Vestibulum sapien orci, feugiat eu mauris in, vulputate dapibus diam. Sed tortor nulla, vestibulum eu consequat non, fermentum quis leo. Sed placerat neque eu enim dignissim ornare. Morbi gravida risus ut nibh placerat, sit amet iaculis leo aliquet. Sed consectetur convallis purus in pellentesque.</p>
            <p> Pellentesque tincidunt lacus a ultricies feugiat. Aenean eleifend, ante vel semper bibendum, urna elit cursus orci, sit amet pellentesque arcu felis nec odio. Duis ullamcorper tristique est vel semper. Integer sed massa a ligula vehicula tempus vel eget erat. In fermentum sit amet felis sed egestas. Nunc mauris nisi, dignissim id sodales at, consequat ut metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc porta gravida arcu, ultrices vestibulum metus porttitor in. Quisque sit amet mauris lorem. Nulla id rhoncus diam. Aenean eget pharetra diam. Ut sodales ipsum vitae tellus semper, ut ultrices neque posuere. </p>
        </div>

        <div id="details">

            <div class ="some-padding" id="the-math">
                <div id="math-svg">
                    <h2>The Math</h2>
                </div>
                <p>Pellentesque tincidunt lacus a ultricies feugiat. Aenean eleifend, ante vel semper bibendum, urna elit cursus orci, sit amet pellentesque arcu felis nec odio. Duis ullamcorper tristique est vel semper. Integer sed massa a ligula vehicula tempus vel eget erat. In fermentum sit amet felis sed egestas. Nunc mauris nisi, dignissim id sodales at, consequat ut metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc porta gravida arcu, ultrices vestibulum metus porttitor in. Quisque sit amet mauris lorem. Nulla id rhoncus diam. Aenean eget pharetra diam. Ut sodales ipsum vitae tellus semper, ut ultrices neque posuere.</p>
            </div>

            <span class="neon-divide"></span>

            <div class ="some-padding" id="the-tracker">
                <div id="diamond-svg">
                    <h2><a href="tracker.php">The Tracker</a></h2>
                </div>
                <p>Pellentesque tincidunt lacus a ultricies feugiat. Aenean eleifend, ante vel semper bibendum, urna elit cursus orci, sit amet pellentesque arcu felis nec odio. Duis ullamcorper tristique est vel semper. Integer sed massa a ligula vehicula tempus vel eget erat. In fermentum sit amet felis sed egestas. Nunc mauris nisi, dignissim id sodales at, consequat ut metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc porta gravida arcu, ultrices vestibulum metus porttitor in. Quisque sit amet mauris lorem. Nulla id rhoncus diam. Aenean eget pharetra diam. Ut sodales ipsum vitae tellus semper, ut ultrices neque posuere.</p>
            </div>

            <span class="neon-divide"></span>

            <div class ="some-padding" id="the-fax">
                <div id="fax-svg">
                    <h2>The Fax</h2>
                </div>
                <p>Pellentesque tincidunt lacus a ultricies feugiat. Aenean eleifend, ante vel semper bibendum, urna elit cursus orci, sit amet pellentesque arcu felis nec odio. Duis ullamcorper tristique est vel semper. Integer sed massa a ligula vehicula tempus vel eget erat. In fermentum sit amet felis sed egestas. Nunc mauris nisi, dignissim id sodales at, consequat ut metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc porta gravida arcu, ultrices vestibulum metus porttitor in. Quisque sit amet mauris lorem. Nulla id rhoncus diam. Aenean eget pharetra diam. Ut sodales ipsum vitae tellus semper, ut ultrices neque posuere.</p>
            </div>

        </div>

    </div>
    
    <?php 
        $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/footer.php";
        include $IPATH;
    ?>

</body>

</html>