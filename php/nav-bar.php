<link rel="stylesheet" href="/CSCI4300-Final-Project/css/nav-bar.css">

<head>
    <title>Better Every Day</title>
    <link rel="shortcut icon" src="/CSCI4300-Final-Project/svg/orange-neon-diamond.svg">
</head>

<div id="nav-bar">
        <div id="nav-spacer-white"></div>
        <div id="nav-ul">
            <ul>

                <li><a href="/CSCI4300-Final-Project/html/main.php">Home</a></li>
                <li><a href="/CSCI4300-Final-Project/html/Tracker.php">Tracker</a></li>
                <li>The Specifics
                    <ul>
                        <div class="border">
                            <li><a href="/CSCI4300-Final-Project/html/specifics/your-room.php">Your Room</a></li>
                        </div>
                        <div class="border">
                            <li><a href="/CSCI4300-Final-Project/html/specifics/your-house.php">Your House</a></li>
                        </div>
                        <div class="border">
                            <li><a href="/CSCI4300-Final-Project/html/specifics/your-life.php">Your Life</a></li>
                        </div>
                    </ul>
                </li>
                
                <?php if ($loggedIn) : ?>
                    <li><a href="<?php echo $link;?>"><?php echo $account;?></a>
                        <ul>
                            <div class="border-long">
                                <li><a href="/CSCI4300-Final-Project/html/account/accountPage.php">Account Page</a></li>
                            </div> 
                            <div class="border-long">
                                <li><a href="/CSCI4300-Final-Project/php/logout.php">Logout</a></li>
                            </div>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href="<?php echo $link;?>"><?php echo $account;?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>