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
$query = "SELECT * FROM goals WHERE daily=0";
$goals = $db->query($query);
$db = null;
$_SESSION["habit"] = false;
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Achievement adder</title>
    <link rel="stylesheet" href="/CSCI4300-Final-Project/css/account/achieveAdderPage.css">
</head>

<body>

    <div id="achieve-cont-1">
        <div id="achieve-cont-2">
            <div>
                <!-- <form id="achieve_selecter" action="../../php/goalListAdder.php" method="POST">
                    <h1>Choose an Achievement</h1>
                    <select name="goalID">
                        <?php/* foreach ($goals as $goal) { ?>
                            <option value="<?php echo $goal['goalID']; ?>"><?php echo $goal['goalName']; ?></option>
                        <?php //} */
                        ?>
                    </select>
                    <input type="submit" id="habitSelectorSubmit" value="Add goal">
                </form> -->

                <form id="achieve_form" action="../../php/goalAdder.php" onsubmit="return habitAdderCheck()" method="POST">
                    <div id="add-achieve-cont">
                        <h1>Add an Achievement</h1>
                        <div id="form-div">

                            <label for="goalName" id="label-goal"><span>Goal Name</span></label><br>
                            <input type="text" id="goalName" name="goalName">
                            <span id="goalNameErrorHtml"><?php if ($guard) { ?>
                                    <?php echo "Duplicate goal name"; ?>
                                <?php } ?></span>

                        </div>
                        <input type="submit" id="habitAdderSubmit" value="Add goal">
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

<script src="/CSCI4300-Final-Project/js/account/script.js"></script>

</html>