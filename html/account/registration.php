<?php 
    session_start();
    $guard2 = false;
    if (isset($_SESSION["sameEmail"])) {
        $guard2 = true;
    }
    session_destroy();
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
        <form id="register_form" action="../../php/register.php" onsubmit="return validateForm()" method="POST">
            <h1>Create account</h1>
            <div class="formDiv">
                <label for="name" class=""><span>Your name</span></label><br>
                <input type="text" id="name" name="name">
                <span id="nameErrorHtml"></span>
            </div>
            <div class="formDiv">
                <label for="email" class=""><span>Email</span></label><br>
                <input type="text" id="email" name="email">
                <span id="emailErrorHtml"><?php if($guard2) {?>
                    <?php echo "Email address already in system";?>
                <?php } ?></span>
                
            </div>
            <div class="formDiv">
                <label for="password" class=""><span>Password</span></label><br>
                <input type="password" placeholder="At least 7 characters" name="password" id="password">
                <span id="passwordErrorHtml"></span>
            </div>
            <br>
            <div onClick="callSubmit()" id="change">Create!</div>
                <input type="submit" id="invis-submit">
                <script>
                    function callSubmit() {
                        document.getElementById("invis-submit").click();
                    }
                </script>
        </form>
        </div>
    </body>
</html>