<?php
    session_start();
    $guard = false;
    if (isset($_SESSION["error"])) {
        $guard = true;
    }
    unset($_SESSION["error"]);
?>



<!DOCTYPE html>
<html> <!--a button at the bottom of sign in page should led to this page where user can register an account --->
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <script src="../../js/account/scripts.js"></script>
        <link href="../../css/registerForm.css" rel="stylesheet">
    </head>
    <body>
        <div id="align-div">
        <form id="signIn_form" action="../../php/signIn.php" onsubmit="return signInCheck()" method="POST">
            <h1>Sign in</h1>
            <div class="formDiv">
                <label for="email" class=""><span>Email</span></label><br>
                <input type="text" id="email" name="email">
                <span id="emailErrorHtmlSignIn" style="color:#801FCC"><?php if($guard) {?>
                    <?php echo "Incorrect email and password combo";?>
                <?php } ?></span>
                
            </div>
            <div class="formDiv">
                <label for="password" class=""><span>Password</span></label><br>
                <input type="password" placeholder="At least 7 characters" name="password" id="password">
                <span id="passwordErrorHtmlSignIn" style="color:#801FCC; padding-bottom: 1em"><?php if($guard) {
                    echo "Incorrect email and password combo";
                }?></span>
            </div>
            <br>
            <div onClick="callSubmit()" id="change">Sign In</div>
                <input type="submit" id="invis-submit">
                <script>
                    function callSubmit() {
                        document.getElementById("invis-submit").click();
                    }
                </script>
            <p><a href="registration.php">No Account? Create one.</a></p>
            
        </form>
        </div>
    </body>
</html>