<?php
session_start(); // Start the session
if (!isset($_SESSION['numbers'])) {
    $_SESSION['numbers'] = array(10, 20, 30);
}
if (isset($_POST['modify'])) {

    $position = $_POST['position'];
    $value = $_POST['value'];

    $_SESSION['numbers'][$position] = $value;
}
if (isset($_POST['reset'])) {
    unset($_SESSION['numbers']);
    $_SESSION['numbers'] = array(10, 20, 30);
}





?>


<!DOCTYPE html>
<html>

<head>
    <h1>Modify array saved in session</h1>
</head>

<body>

    <form action="RA4 Sessions1.php" method="POST">
        <fieldset style=>
            <legend>Exercise 1 SESSIONS</legend>
            <label for="select">Position to modify:</label>
            <select id="select" name="position">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select><br><br>

            <label for="value">New value:</label>
            <input type="number" name="value"><br><br>
            <button type="submit" value="modify" name="modify">Modify</button>
            <button type="submit" value="average" name="average">Average</button>
            <button type="submit" value="reset" name="reset">Reset</button><br>

            <p><?php echo "Current array: " . implode(", ", $_SESSION['numbers']); ?></p>

            <p><?php if (isset($_POST['average'])) {
                    $average = array_sum($_SESSION['numbers']) / count($_SESSION['numbers']);
                    $average = number_format($average, 2);
                    echo "<p>Average: $average</p>";
                }  ?></p>

        </fieldset>
    </form>
</body>

</html>