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
        <div>
        <form id="signIn_form" action="../../php/signIn.php" onsubmit="return signInCheck()" method="POST">
            <h1>Sign in</h1>
            <div class="formDiv">
                <label for="email" class=""><span>Email</span></label><br>
                <input type="text" id="email" name="email">
                <span id="emailErrorHtmlSignIn" style="color:red"><?php if($guard) {?>
                    <?php echo "Incorrect email and password combo";?>
                <?php } ?></span>
                
            </div>
            <div class="formDiv">
                <label for="password" class=""><span>Password</span></label><br>
                <input type="password" placeholder="At least 7 characters" name="password" id="password">
                <span id="passwordErrorHtmlSignIn" style="color:red; padding-bottom: 1em"><?php if($guard) {
                    echo "Incorrect email and password combo";
                }?></span>
            </div>
            <br>
            <input type="submit" id="signInSubmit" value="Sign in" style="background-color: orange;
                width: 100%;
                border-color:#BF7D00">
            <p></p>
            <a href="registration.html">No Account? Create one.</a>
            
        </form>
        </div>
    </body>
</html>