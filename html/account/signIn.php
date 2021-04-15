<?php
    $guard = false;
    if (isset($_SESSION["error"])) {
        $guard = true;
        session_destroy();
    }
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
        <div>
        <form id="signIn_form" action="../../php/signIn.php" onsubmit="return signInCheck()" method="POST">
            <h1>Sign in</h1>
            <div class="formDiv">
                <label for="email" class=""><span>Email</span></label><br>
                <input type="text" id="email" name="email">
                <span id="emailErrorHtmlSignIn"><?php if($guard) {?>
                    <?php echo "Incorrect email and password combo";?>
                <?php } ?></span>
                
            </div>
            <div class="formDiv">
                <label for="password" class=""><span>Password</span></label><br>
                <input type="password" placeholder="At least 7 characters" name="password" id="password">
                <span id="passwordErrorHtmlSignIn"><?php if($guard) {
                    echo "Incorrect email and password combo";
                }?></span>
            </div>
            <input type="submit" id="signInSubmit" value="Sign in">
            
        </form>
        </div>
    </body>
</html>