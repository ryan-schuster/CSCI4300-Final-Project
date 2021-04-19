<?php
    session_start();
    $guard = false;
    if (isset($_SESSION["error"])) {
        $guard = true;
        unset($_SESSION['error']);
    }
    if (!isset($_SESSION["username"])) {
        header("Location: loginError.html");
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
    $query= "SELECT * FROM goals WHERE daily=0";
    $goals = $db->query($query);
    $db = null;
    $_SESSION["habit"] = false;
?>



<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Achievement adder</title>
        <script src="../../js/account/scripts.js"></script>
        <link href="../../css/registerForm.css" rel="stylesheet">
    </head>
    <body>
        <div>
        <form id="achieve_selecter" action="../../php/goalListAdder.php" method="POST">
        <h1>Choose an Achievement</h1>
        <select name="goalID">
            <?php foreach($goals as $goal) {?>
            <option value= "<?php echo $goal['goalID'];?>"><?php echo $goal['goalName'];?></option>
            <?php } ?>
        </select>
        <input type="submit" id="habitSelectorSubmit" value="Add goal">
        </form>

        <form id="achieve_form" action="../../php/habitAdder.php" onsubmit="return habitAdderCheck()" method="POST">
            <h1>Add an Achievement</h1>
            <div class="formDiv">

                <label for="goalName" class=""><span>Goal Name</span></label><br>
                <input type="text" id="goalName" name="goalName">
                <span id="goalNameErrorHtml"><?php if($guard) {?>
                    <?php echo "Duplicate goal name";?>
                <?php } ?></span>
                
            </div>
            
            <input type="submit" id="habitAdderSubmit" value="Add goal">
            
        </form>
        </div>
    </body>
</html>