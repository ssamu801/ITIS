<?php
    include "connect.php";
    $ingredientName = $_POST['ingredient'];
    $qty            = $_POST['qty'];
    $unit           = $_POST['unit'];

    $ingredientID = mysqli_fetch_array(mysqli_query($DBConnect, "SELECT ingredientID FROM ingredient WHERE ingredientName = '$ingredientName';"))[0];
    $defaultUnit = mysqli_fetch_array(mysqli_query($DBConnect, "SELECT unitID FROM unit WHERE type IN (SELECT type FROM unit WHERE unitID = $unit) AND conversion = 1;"));
    $conversion = mysqli_fetch_array(mysqli_query($DBConnect, "SELECT conversion FROM unit WHERE unitID = $unit;"))[0];

    $newQty = round(floatval($qty) * floatval($conversion), 2);

    $insertQuery = mysqli_query($DBConnect, "   INSERT INTO disparity(ingredientID, sQuantity, mQuantity, createdAt) VALUES (
                                                $ingredientID, 
                                                (SELECT quantity 
                                                FROM ingredient 
                                                WHERE ingredientID = $ingredientID), 
                                                $qty, 
                                                NOW());");

    $updateQuery = mysqli_query($DBConnect, "   UPDATE ingredient SET quantity = $qty WHERE ingredientID = '$ingredientID';");
    
    header("Location: viewstock.php");
    exit;
?>