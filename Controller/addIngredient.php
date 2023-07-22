<?php 
    include "connect.php";

    $ingredientName = $_POST['ingredientName'];
    $qty            = $_POST['qty'];
    $unit           = $_POST['unit'];
    $multiplier     = $_POST['multiplier'];

    $defaultUnit = mysqli_fetch_array(mysqli_query($DBConnect, "SELECT unitID FROM unit WHERE type IN (SELECT type FROM unit WHERE unitID = $unit) AND conversion = 1;"));
    $conversion = mysqli_fetch_array(mysqli_query($DBConnect, "SELECT conversion FROM unit WHERE unitID = $unit;"))[0];

    $newQty = round(floatval($qty) * floatval($conversion) * intval($multiplier), 2);

    $query = mysqli_fetch_array(mysqli_query($DBConnect, "SELECT quantity FROM ingredient WHERE ingredientName = '$ingredientName'"))[0];
    $roundQty = round($query + $newQty, 2);

    mysqli_query($DBConnect, "  UPDATE ingredient SET quantity = $roundQty  WHERE ingredientName = '$ingredientName';");

    mysqli_query($DBConnect, "  INSERT INTO replenish(ingredientID, quantity, boughtDate) 
                                VALUES ((SELECT ingredientID FROM ingredient WHERE ingredientName = '$ingredientName'), 
                                $newQty,
                                NOW());");

    header("Location: viewstock.php");
    exit;
?>