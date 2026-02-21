<?php
session_start();
//iniciar el array
$product = "";
$quantity = 0;
if (!isset($_SESSION['inventory'])) {
    $_SESSION['inventory'] = array('milk' => 0, 'soft drink' => 0);
}

//nombre trabajador
if (!isset($_SESSION['worker'])) {
    $_SESSION['worker'] = '';
}
$name = $_SESSION['worker'];
//guardar nombre e igualarlo a 'worker'
if (isset($_POST['name']) && $_POST['name'] !== '') {
    $name = htmlspecialchars($_POST['name']);
    $_SESSION['worker'] = $name;
}

//guardar producto
if (isset($_POST['add']) || isset($_POST['remove']) || isset($_POST['reset'])) {

    if (isset($_POST['select'])) {
        $product = $_POST['select'];
    }

    if (isset($_POST['number'])) {
        $quantity = $_POST['number'];
    }

    //add
    if (isset($_POST['add']) && $quantity > 0) {
        if ($product === 'milk') {
            $_SESSION['inventory']['milk'] += $quantity;
        }
        if ($product === 'soft drink') {
            $_SESSION['inventory']['soft drink'] += $quantity;
        }
    }
    //remove
    if (isset($_POST['remove']) && $quantity > 0) {
        if ($product === 'milk') {
            if ($_SESSION['inventory']['milk'] >= $quantity) {
                $_SESSION['inventory']['milk'] -= $quantity;
            }
        }

        if ($product === 'soft drink') {
            if ($_SESSION['inventory']['soft drink'] >= $quantity) {
                $_SESSION['inventory']['soft drink'] -= $quantity;
            }
        }
    }

    //reset
    if (isset($_POST['reset'])) {
        $_SESSION['inventory'] = array('milk' => 0, 'soft drink' => 0);
        $_SESSION['worker'] = '';
        $name = '';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Supermarket management</title>
</head>

<body>
    <form action="RA4 Sessions2.php" method="POST">
        <fieldset>
            <legend>Exercise 2 SESSIONS</legend>
            <label for="text">Worker name: </label>
            <input type="text" name="name" value="<?php echo $name; ?>"><br>

            <h3>Choose product:</h3>
            <select name="select" id="select">
                <option value="milk">Milk</option>
                <option value="soft drink">Soft Drink</option>
            </select>

            <h3>Product quantity:</h3>
            <input type="number" name="number"><br><br>
            <button type="submit" value="add" name="add">add</button>
            <button type="submit" value="remove" name="remove">remove</button>
            <button type="submit" value="reset" name="reset">reset</button><br>
            <h3>Inventory:</h3>
            <p>Worker: <?php echo $name; ?></p>
            <p>Units Milk: <?php echo $_SESSION['inventory']['milk']; ?></p>
            <p>Units Soft Drink: <?php echo $_SESSION['inventory']['soft drink']; ?></p>


        </fieldset>

    </form>
</body>

</html>